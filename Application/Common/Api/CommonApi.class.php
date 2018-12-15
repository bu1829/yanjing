<?php
namespace Common\Api;
use Think\Controller;
use Org\Net\Upload;
header("content-type:text/html;charset=utf-8");
/**
 * 公用的所有
 * @author xuxiaowen
 */
class CommonApi extends Controller{
    public $Imgurl="/Public/Upload/";
    
    
    /**
     * 上传文件公用的方法
     * @author xuxiaowen
     * @param  string  $subName    子目录名字
     * @param  string  $style      目录格式，如年月日
     * @param  string  $model      实例化模型
     * @param  int     $state      1添加，2修改
     * @param  int     $water      0无水印 1文字 2图片 3全部
     * @param  string  $idFielde   id的字段名称
     * @param  array   $file       文件的字段名称
     * @param  int     $deleteold  是否删除老文件，1为删除，2为不删除
     * @param  array   $thumb      生成缩略图
     * @param  string  $field      所要查找的字段
     * @param  string  $field_bool 所要查找的字段的布尔型，默认false为查询$field中的。
     * @param  array   $where      所要修改的条件
     * @param  int     $maxSize    附件上传大小
     * @param  array   $exts       附件上传类型
     * @param  array   $picturefield  要存入数据库的图片的字段名字，一般是跟图片的字段一样的，但是不排除不一样。
     *
     */
    public function upload($subName,$style,$model,$state=1,$water='0',$idField="id",$file=array("picture"),$deleteold=1,$thumb,$field="*",$field_bool=false,$where,$maxSize,$exts=array('gif','png','jpg','bmp','jpeg','webp'),$picturefield=""){

        //判断是否上传了意外的尺寸
        if(empty($maxSize)){
            //判断是图片还是视频
            $picture_exts=array('gif','png','jpg','bmp');
            if($exts==$picture_exts){
                //说明就是图片
                //echo "图片";
                $maxSize =C('PICTURE_MAX_SIZE') ? C('PICTURE_MAX_SIZE') : "2097152";
            }
            
            $video_exts=array('mp4');
            if($exts==$video_exts){
                //说明是视频
                //echo "视频";
                $maxSize =C('VIDEO_MAX_SIZE') ? C('VIDEO_MAX_SIZE') : "20971520";
            }
        }
        
        foreach($file as $k=>$v){
            $name=$_FILES["$v"]['name'];//是否上传文件了
            if(!empty($name)){
                $a="1";//上传了图片
                break;
            }
        }
        
        $Model=M("$model");
    
    
        if($a!=1){
            switch($state){
                case 1:
                    $re=$Model->add();
                    return $re;
                    /* if($re){
                        $this->success("保存成功");
                    }else{
                        $this->error("保存失败");
                    } */
                    break;
                case 2:
                    $re=$Model->field("$field",$field_bool)->where($where)->save($_POST);
                    return $re;
                    break;
            }
        }elseif($a==1){
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize=$maxSize; //设置附件上传大小
            $upload->exts=$exts; // 设置附件上传类型
            $upload -> savePath = 'Upload/';
            $upload -> rootPath = './Public/';
            $upload->autoSub  = true;//开启子目录
            $upload->subName=$subName."/".$style;//子目录名字
            $upload->saveName = array('uniqid','');//上传文件名字不变。
            $upload->replace=true;//同名文件覆盖
            $info=$upload->upload();
            if(!$info){
                //错误信息
                $this->error($upload->getError());
            }else{
                foreach($file as $k=>$v){
                    $name=$_FILES["$v"]['name'];//是否上传文件了
    
                    if(!empty($name)){
                        //成功
                        $p=$this->Imgurl.$subName."/".$style."/".$info[$v]['savename'];
                        if(!empty($picturefield)){
                            $_POST[$picturefield]=$p;
                        }else{
                            $_POST[$v]=$p;
                        }
                        
                        //水印设置
                        $image = new \Think\Image();
                        $waterPicture =C('WATER_PICTURE') ? C('WATER_PICTURE') : "/Public/Water/win-shop.png";
                        $word=C("WORD") ? C("WORD") : "win-shop";//水印文字
                        $font=C("FONT") ? C("FONT") : "10";//水印字号
                        $color=C("COLOR") ? C("COLOR") : "#383d37";//水印文字颜色
                        $wordlocate=C("WORD_LOCATE") ? C("WORD_LOCATE") : "9";//水印文字写入位置（右下角）
                        $picturelocate=C("PICTURE_LOCATE") ? C("PICTURE_LOCATE") : "1";//图片水印写入位置（左上角）
                        $alpha=C("ALPHA") ? C("ALPHA") : "80";//透明度（0~100）0为透明100为不透明 
                        
                        switch($water){
                            case 1:
                                $re=$image->open("./".$p)->text($word,'./Public/Water/1.ttf',$font,$color,$wordlocate)->save("./".$p);
                                break;
                            case 2:
                                $image->open("./".$p)->water('.'.$waterPicture,$picturelocate,C("ALPHA"))->save("./".$p);
                                break;
                            case 3:
                                $re=$image->open("./".$p)->text($word,'./Public/Water/1.ttf',$font,$color,$wordlocate)->save("./".$p);
                                $image->open("./".$p)->water('.'.$waterPicture,$picturelocate,C("ALPHA"))->save("./".$p);
                                break;
                        }
                        
                        
                        //生成缩略图
                        if(!empty($thumb) && $v=='picture'){
                            $aa=explode(",", $thumb[0]);
                            $p2=$this->Imgurl.$subName."/".$style."/"."thumb_".$kk.$info[$v]['savename'];
                            $size = getimagesize("./".$p);
                            $h = ($size[1]/$size[0])*$aa[0];
                            
                            $image->open("./".$p)->thumb("$aa[0]", $h)->save("./".$p2);
                            $_POST['thumb_w'] = $aa[0];
                            $_POST['thumb_h'] = $h;
                            $_POST[$thumb[1]]=$p2;
                            $Model->$thumb[1]=$p2;
                        }
                        
                        $Model->$v=$p;
                    }
                }
    
                if($state==1){
                    $re=$Model->add($_POST);
                    return $re;
                    /* if($re){
                        $this->success("保存成功");
                    }else{
                        $this->error("保存失败");
                    } */
                }elseif($state==2){
                    if($deleteold==1){
                        //删除老照片
                        foreach($file as $k=>$v){
                            $name=$_FILES["$v"]['name'];//是否上传文件了
                            $where2[$idField]=array("eq",$where[$idField]);
                            if(!empty($name)){
                                delete($model, $where, array("$v"));
                            }
                        } 
                    }
                    $re=$Model->field("$field",$field_bool)->where($where)->save($_POST);
                    return $re;
                }
            }
        }
    }
    
    
    /**
     *验证码 
     *@author   xuxiaowen
     */
    Public function verify(){
        $Verify = new \Think\Verify();
        $Verify->useCurve = false;
        $Verify->fontSize = 12;
        $Verify->length   = 4;
        $Verify->codeSet = '0123456789';
        $Verify->imageW = 85;
        $Verify->imageH = 30;
        //$Verify->expire = 600;
        $Verify->entry();
    }
    
    
    /**
     * 生成二维码的
     * @param      string      $url       生成的链接地址
     * @param      string      $path      生成的路径
     * @param      string      $filename  生成的图片名称
     * @param      number      $level     容错级别
     * @param      number      $size      生成图片大小
     */
    public function qrcode($url,$path,$filename,$level=3,$size=3){
        Vendor('phpqrcode.phpqrcode');
        $errorCorrectionLevel =intval($level) ;//容错级别
        $matrixPointSize = intval($size);//生成图片大小
        //生成二维码图片
        //echo $_SERVER['REQUEST_URI'];
        $object = new \QRcode();
        //$path="Public/Upload/Code/".UID."/";
        createFolder($path);
        //$filename='1.png';
        $a=$object->png($url, $path.$filename, $errorCorrectionLevel, $matrixPointSize,2);
    }
   
     /**
     * 传输json
     * @param  $msg   提示信息
     * @param  $flag  标识
     * @author xuxiaowen
     */
    public function json($msg,$flag = '0')
    {
        $data=array(
            'msg'=>$msg,
            'flag'=>$flag,
        );
        $this->ajaxReturn($data,"json");
    }
    
    
    /**
     * 获得所有的数据。分页和不分页（不适合有join的）
     * @param  string          $model  模型名
     * @param  array           $where  查询条件
     * @param  string|array    $order  排序条件
     * @param  int             $cache  是否采用缓存 1采用 2不采用
     * @param  int             $num    每页显示的页数
     * @param  string          $field  所要查找的字段
     * @param  string          $field_bool  所要查找的字段的布尔型，默认false为查询$field中的。
     * @param  int             $state  1为分页，2为不分页返回所有数据
     * @author xuxiaowen  <xuxiaowen@yuanbon.com>
     */
    public function lists($model,$where="",$order='sort',$cache=1,$num='',$field="*",$field_bool=false,$state=1,$limit=""){
    	 
    	if(is_string($model)){//模型
    		$Model=M($model);
    	}
    
    	if($cache==1){
    		$a=true;
    	}else{
    		$a=false;
    	}
    
    	if($state==1){//分页
    		$count = $Model->cache($a,HCT)->where($where)->count();// 查询满足要求的总记录数
    		 
    		if($num==''){
    			$num = C('HOME_ROW_NUM') > 0 ? C('HOME_ROW_NUM') : 10;
    		}
    		$Page=new \Think\Page($count,$num);// 实例化分页类 传入总记录数和每页显示的记录数(25)
    		$show=$Page->show();// 分页显示输出
    
    		$list=$Model->cache($a,HCT)
			    		->field($field,$field_bool)
			    		->where($where)
			    		->order($order)
			    		->limit($Page->firstRow.','.$Page->listRows)
			    		->select();
    		$this->page=$show;
    	}else{//不分页
    		$list=$Model->cache($a,HCT)
			    		->field($field,$field_bool)
			    		->where($where)
			    		->order($order)
			    		->limit($limit)
			    		->select();
    	}
    
    	return $list;
    }
}