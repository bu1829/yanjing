<?php
namespace Common\Api;
use Think\Controller;
use Org\Net\Upload;
header("content-type:text/html;charset=utf-8");
/**
 * upload.php
 *
 * Copyright 2013, Moxiecode Systems AB
 * Released under GPL License.
 *
 * License: http://www.plupload.com/license
 * Contributing: http://www.plupload.com/contributing
 */

#!! 注意
#!! 此文件只是个示例，不要用于真正的产品之中。
#!! 不保证代码安全性。

#!! IMPORTANT:
#!! this file is just an example, it doesn't incorporate any security checks and
#!! is not recommended to be used in production environment as it is. Be sure to
#!! revise it and customize to your needs.


// Make sure file is not cached (as it happens for example on iOS devices)
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
/**
 * 百度webupload
 * @author xuxiaowen
*/
class WebuploadApi extends Controller{
    
    /**
     * @param string $uploadDir  上传的路径
     * @param string $model      模型名称
     * @param string $name       图片字段的名字
     * @param array  $data       要上传的数据数组
     * @param int    $status     是否要插入数据库   1为插入数据库 2为不插入数据库3修改
     * @param int    $water      水印类型 1文字 2图片 3全部
     * @param array  $where      要修改的条件
     * @param int    $model2     第二个模型名称
     */
    
    public function upload($uploadDir,$model,$name,$data,$status,$water,$where,$model2){
        // Support CORS
        // header("Access-Control-Allow-Origin: *");
        // other CORS headers if any...
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            exit; // finish preflight CORS requests here
        }
        
        if ( !empty($_REQUEST[ 'debug' ]) ) {
            $random = rand(0, intval($_REQUEST[ 'debug' ]) );
            if ( $random === 0 ) {
                header("HTTP/1.0 500 Internal Server Error");
                exit;
            }
        }
        
        // header("HTTP/1.0 500 Internal Server Error");
        // exit;
        
        // 5 minutes execution time
        @set_time_limit(5 * 60);
        
        // Uncomment this one to fake upload time
        // usleep(5000);
        
        // Settings
        // $targetDir = ini_get("upload_tmp_dir") . DIRECTORY_SEPARATOR . "plupload";
        $targetDir = 'upload_tmp';
        
        $cleanupTargetDir = true; // Remove old files
        $maxFileAge = 5 * 3600; // Temp file age in seconds
        
        
        // Create target dir
        /* if (!file_exists($targetDir)) {
            @mkdir($targetDir);
        } */
        
        createFolder($targetDir);
        
        // Create target dir
        /* if (!file_exists($uploadDir)) {
            @mkdir($uploadDir);
        } */
        createFolder($uploadDir);
        
        // Get a file name
        $a=uniqid();
        if (isset($_REQUEST["name"])) {
            $fileName = $_REQUEST["name"];
        } elseif (!empty($_FILES)) {
            $fileName = $_FILES["file"]["name"];
        } else {
            $fileName = uniqid("file_");
        }
        
        $num=strrpos($fileName,".");
        
        $newfilename= substr($fileName,$num);
        $filePath = $targetDir.$a.$newfilename;
        $uploadPath = $uploadDir.$a.$newfilename;
        
        
        //保存图片路径
        $picturePath=substr($uploadPath,1);
        
        
        // Chunking might be enabled
        $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
        $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 1;
        
        
        // Remove old temp files
        if ($cleanupTargetDir) {
            if (!is_dir($targetDir) || !$dir = opendir($targetDir)) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
            }
        
            while (($file = readdir($dir)) !== false) {
                $tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;
        
                // If temp file is current file proceed to the next
                if ($tmpfilePath == "{$filePath}_{$chunk}.part" || $tmpfilePath == "{$filePath}_{$chunk}.parttmp") {
                    continue;
                }
        
                // Remove temp file if it is older than the max age and is not the current file
                if (preg_match('/\.(part|parttmp)$/', $file) && (@filemtime($tmpfilePath) < time() - $maxFileAge)) {
                    @unlink($tmpfilePath);
                }
            }
            closedir($dir);
        }
        
        
        // Open temp file
        if (!$out = @fopen("{$filePath}_{$chunk}.parttmp", "wb")) {
            die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
        }
        
        if (!empty($_FILES)) {
            if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"])) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
            }
        
            // Read binary input stream and append it to temp file
            if (!$in = @fopen($_FILES["file"]["tmp_name"], "rb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
            }
        } else {
            if (!$in = @fopen("php://input", "rb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
            }
        }
        
        while ($buff = fread($in, 4096)) {
            fwrite($out, $buff);
        }
        
        @fclose($out);
        @fclose($in);
        
        rename("{$filePath}_{$chunk}.parttmp", "{$filePath}_{$chunk}.part");
        
        $index = 0;
        $done = true;
        for( $index = 0; $index < $chunks; $index++ ) {
            if ( !file_exists("{$filePath}_{$index}.part") ) {
                $done = false;
                break;
            }
        }
        if ( $done ) {
            if (!$out = @fopen($uploadPath, "wb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
            }
        
            if ( flock($out, LOCK_EX) ) {
                for( $index = 0; $index < $chunks; $index++ ) {
                    if (!$in = @fopen("{$filePath}_{$index}.part", "rb")) {
                        break;
                    }
        
                    while ($buff = fread($in, 4096)) {
                        fwrite($out, $buff);
                    }
        
                    @fclose($in);
                    @unlink("{$filePath}_{$index}.part");
                }
        
                flock($out, LOCK_UN);
            }
            @fclose($out);
        }
        
        $newfilename=strtolower($newfilename);//转为小写
        if($newfilename==".jpg" || $newfilename==".jpeg" || $newfilename==".png" || $newfilename==".bmp" || $newfilename==".gif"){
            //水印设置
            $image = new \Think\Image();
            $waterPicture =C('WATER_PICTURE') ? C('WATER_PICTURE') : "/Public/Water/l.png";
            $word=C("WORD") ? C("WORD") : "wincms";//水印文字
            $font=C("FONT") ? C("FONT") : "10";//水印字号
            $color=C("COLOR") ? C("COLOR") : "#383d37";//水印文字颜色
            $wordlocate=C("WORD_LOCATE") ? C("WORD_LOCATE") : "9";//水印文字写入位置（右下角）
            $picturelocate=C("PICTURE_LOCATE") ? C("PICTURE_LOCATE") : "1";//图片水印写入位置（左上角）
            $alpha=C("ALPHA") ? C("ALPHA") : "80";//透明度（0~100）0为透明100为不透明
            
            switch($water){
                case 1:
                    $re=$image->open("./".$picturePath)->text($word,'./Public/Water/1.ttf',$font,$color,$wordlocate)->save("./".$picturePath);
                    break;
                case 2:
                    $image->open("./".$picturePath)->water('.'.$waterPicture,$picturelocate,C("ALPHA"))->save("./".$picturePath);
                    break;
                case 3:
                    $re=$image->open("./".$picturePath)->text($word,'./Public/Water/1.ttf',$font,$color,$wordlocate)->save("./".$picturePath);
                    $image->open("./".$picturePath)->water('.'.$waterPicture,$picturelocate,C("ALPHA"))->save("./".$picturePath);
                    break;
            }
            
            //生成缩略图
            //$image->open("./".$picturePath)->thumb(C("AVATAR_WIDTH"), C("AVATAR_HEIGHT"),\Think\Image::IMAGE_THUMB_FILLED)->save("./".$picturePath);
        }
        
        if($status==1){
            //保存到数据库
            $Model=M("$model");
            
            
            if ($model!=""){
                $Model2=M("$model2");
                $count=$Model->where($data)->count();
                if($count==0){
                    $Model2->where($data)->save(array("thumbnail"=>$picturePath));
                }
            }
            
            $data["$name"]=$picturePath;
            $Model->add($data);
            die('{"jsonrpc" : "2.0", "result" : null, "id" : "id"}');
        }elseif($status==2){//不保存到数据库
            $data['filename']=$picturePath;
            $this->ajaxReturn($data);
        }elseif($status==3){//修改操作
            $Model=M("$model");
            $info=$Model->where($where)->find();
            //保存到数据库
            $data["$name"]=$picturePath;
            $re=$Model->where($where)->save($data);
            if($re){
               unlink(".".$info["$name"]);
               $arr['status']="success";
               $arr['filename']=$picturePath;
            }else{
               $arr['status']="fail";
            }
           $this->ajaxReturn($arr);
        }
    }
    
}