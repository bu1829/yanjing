<?php
namespace Common\Api;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
/**
 * 公用的用户相关的
 * @author xuxiaowen
 */
class UserApi extends Controller {
    
    /**
     * 判断当前ip是否是禁用的，则禁止登录和注册
     * @author  xuxiaowen
     */
    public function ipban(){
        $current_ip=get_client_ip();//当前ip
        $current_time=time();//当前时间戳
        $where['ip']=$current_ip;
        $where['status']=0;
        $where['end_time']=array("EGT",$current_time);
        //查找是否有禁用的ip
        $data=M("ipban")->field("id")->where($where)->find();
        if(!empty($data)){
            return true;
        }else{
            return false;
        }
    }
}