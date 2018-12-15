<?php
namespace Common\Api;
use Think\Controller;
use Vendor\ThinkImage\ThinkImage;
use Common\Api\CommonApi;
use Think\Image\Driver\Gd2;
use Think\Upload;
header ( "content-type:text/html;charset=utf-8" );
/**
 * 头像上传
 * @author xuxiaowen
*/
class AvatarApi extends Controller {
    
    /**
     * 获得图片上传临时路径
     * @author xuxiaowen
     * @param $user_id int 会员id
     * @param $role int  1后台 Header  2普通会员Avatar
     * @return string
     */
    public function getPath($user_id,$role){
    	if($role==1){
    		$path="./Public/Upload/Header/".$user_id."/";
    	}else{
    		$path="./Public/Upload/Avatar/".$user_id."/";
    	}
        return $path;
    }
    
    /**
     * ajax 上传头像图片
     * @author xuxiaowen
     * @param $user_id int 会员id
     * @param $role int  1后台 Header  2普通会员Avatar
     */ 
    public function ajax_upload_avatar($user_id,$role)
    {
        /*头像裁切尺寸*/
        $width = C('AVATAR_WIDTH') ? C('AVATAR_WIDTH') : 200;//头像要裁剪的宽度
        $height= C("AVATAR_HEIGHT") ? C("AVATAR_HEIGHT") :200 ;//头像要裁剪的高度
        
        /*最大图片尺寸，过大时将自动按比例缩小，防止超大图片撑破页面*/
        $max_width=C("AVATAR_MAX_WIDTH") ? C("AVATAR_MAX_WIDTH") :1024;//头像要裁剪的高度
        $max_height=C("AVATAR_MAX_HEIGHT") ? C("AVATAR_MAX_HEIGHT") :1024;//头像要裁剪的高度
        
        $max_size=C("MAX_UPLOAD_SIZE") ? C("MAX_UPLOAD_SIZE") :2097152;//上传最大限制(5M)
        
        vendor ( 'Org.Net' );
        $uploader=new \Org\Net\Upload(array("gif","bmp","jpg","jpeg","png"),$max_size);
        
        $result = $uploader->upload($this->getPath($user_id,$role));// 先保存到临时文件夹
        $reponse=new \stdClass();
        if( isset($result['success']) && $result['success'] )
        {
            $src_path = $this->getPath($user_id,$role).$uploader->get_real_name();
            $gd=new Gd2();
            $gd->open( $src_path );
            if( $gd->is_image() )
            {
                if( $gd->get_width() < $width )
                {
                    $reponse->success = false;	// 传递给 file-uploader 表示服务器端已处理
                    $reponse->description = '您上传的图片宽度('.$gd->get_width().'像素)过小！最小需要'.$width.'像素。';
                }
                else if( $gd->get_height() < $height )
                {
                    $reponse->success = false;	// 传递给 file-uploader 表示服务器端已处理
                    $reponse->description = '您上传的图片高度('.$gd->get_height().'像素)过小！最小需要'.$height.'像素。';
                }
                else
                {
                    $reponse->success = true;
                    $reponse->tmp_avatar = substr($src_path,1);
    
                    if($gd->get_width()>$max_width || $gd->get_height() > $max_height)
                    {
                        // 图片过大时按比例缩小，防止超大图片撑破页面
                        $gd->resize_to($max_width, $max_height, 'scale');
                        $gd->save_to( $src_path );
                    }
                }
            }
        }
        else if( isset($result['error']) )
        {
            $reponse->success = false;
            $reponse->description = $result['error'];
        }
    
        header('Content-type: application/json');
        echo json_encode($reponse);
    }
    
    
    /**
     *  ajax 裁切头像图片
     *  @param $user_id int 会员id
     *  @param $role int  1后台 Header  2普通会员Avatar
     */
    public function ajax_crop($user_id,$role)
    {
        /*头像裁切尺寸*/
        $width = C('AVATAR_WIDTH') ? C('AVATAR_WIDTH') : 200;//头像要裁剪的宽度
        $height= C("AVATAR_HEIGHT") ? C("AVATAR_HEIGHT") :200 ;//头像要裁剪的高度
        
        
        $tmp_avatar = $_POST['tmp_avatar'];
        $x1 = $_POST['x1'];
        $y1 = $_POST['y1'];
        $x2 = $_POST['x2'];
        $y2 = $_POST['y2'];
        $w = $_POST['w'];
        $h = $_POST['h'];
    
        $reponse = new \stdClass();
    
        $src_path = ".".$tmp_avatar;
        if(!file_exists($src_path))
        {
            $reponse->success = false;
            $reponse->description = '未找到图片文件';
        }
        else
        {
            $gd=new Gd2();
            $gd->open( $src_path );
            if( $gd->is_image() )
            {
                $gd->crop($x1, $y1, $w, $h);
                $gd->resize_to($width, $height, 'scale_fill');
    
                $avatar_name = date('YmdHis').'_'.md5(uniqid()).'.'.$gd->get_type();
                $gd->save_to($this->getPath($user_id,$role).$avatar_name);
                
                
                //水印设置
                $water=C("AVATAR_WATER") ? C("AVATAR_WATER") :0;
                $image = new ThinkImage();
                $waterPicture =C('WATER_PICTURE') ? C('WATER_PICTURE') : "/Public/Water/l.png";
                $picture=$this->getPath($user_id,$role).$avatar_name;
                switch($water){
                    case 1:
                        $re=$image->open($picture)->text(C("WORD"),'./Public/Water/1.ttf',C("FONT"),C("COLOR"),C("WORD_LOCATE"))->save($picture);
                        break;
                    case 2:
                        $image->open($picture)->water('.'.$waterPicture,C("PICTURE_LOCATE"),C("ALPHA"))->save($picture);
                        break;
                    case 3:
                        $re=$image->open($picture)->text(C("WORD"),'./Public/Water/1.ttf',C("FONT"),C("COLOR"),C("WORD_LOCATE"))->save($picture);
                        $image->open($picture)->water('.'.$waterPicture,C("PICTURE_LOCATE"),C("ALPHA"))->save($picture);
                        break;
                }
                
                
                //setcookie('avatar', $avatar_name, time()+86400*30);	// 本示例程序仅在 cookie 中保存
                /*
                                                 实际应用中会有更多 保存头像代码
                */
                @unlink($src_path);
                
                //删除原来的头像
                if($role==1){
                	$info=M("admin")->field("avatar")->where(array("user_id"=>$user_id))->find();
                }else{
                	$info=M("user")->field("avatar")->where(array("user_id"=>$user_id))->find();
                }
                if($info['avatar']!=""){
                	unlink("./".$info['avatar']);
                }
                
                
                //将头像保存到数据库
                $header=substr($this->getPath($user_id,$role).$avatar_name,1);
                if($role==1){
                	M("admin")->field("avatar")->where(array("user_id"=>$user_id))->save(array("avatar"=>$header));
                }else{
                	M("user")->field("avatar")->where(array("user_id"=>$user_id))->save(array("avatar"=>$header));
                }

                $reponse->success = true;
                $reponse->avatar = $header;
                $reponse->description = '';
            }
            else
            {
                $reponse->success = false;
                $reponse->description = '该图片文件不是有效的图片';
            }
        }
    
        header('Content-type: application/json');
        echo json_encode($reponse);
    }
    
}