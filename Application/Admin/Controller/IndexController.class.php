<?php
namespace Admin\Controller;
use Common\Api\CommonApi;
use Think\Controller;
//header("content-type:text/html;charset=utf-8");
class IndexController extends AdminController {
 
    /**
     * 首页
     * @author xuxiaowen
     */
    public function index(){
      //默认的头像
      $default_avatar=C("DEFAULT_AVATAR") ? C("DEFAULT_AVATAR") :"/Public/Common/images/avatar.jpg";
      $this->default_avatar=$default_avatar;
      
      //用户信息
      // $Personal=$this->getPersonal();
      // $this->personal=$Personal;
      // $rules=explode(",",$Personal['rules']);
      
      //是否是超级管理员
      $AuthConfig=C('AUTH_CONFIG');
      //查找是否是超级管理员
      $super=in_array(UID, $AuthConfig['AUTH_SUPERADMIN']);
      
      
      //菜单选项
      $Menu=M("menu");
      $list=$Menu->where(array("status"=>1,"pid"=>0))->order("sort")->select();
      //查找菜单是否有权限，有权限的就显示，没有权限的就不显示
      //$Rule=M("auth_rule");
      foreach ($list as $k=>$v){
        $toptitle=$v['title'];
        //$topinfo=$Rule->where(array("title"=>$toptitle))->find();
        
        
        //如果是设定的管理员，那么就拥有全部权限，不用再查找
        // if($super){//设定管理员
        //   $pid=$v['id'];
        //   $infos=$Menu->where(array("status"=>1,"pid"=>$pid))->order("sort")->select();
        //   if(!empty($infos)){
        //     $list[$k]['hasson']="has";
        //   }else{
        //     $list[$k]['hasson']="no";
        //   }
        //   $list[$k]['sons']=$infos;
        // }else{//判断是否有权限
          // if(!in_array($topinfo['id'],$rules)){
          //     unset($list[$k]);
          // }else{
            $pid=$v['id'];
            $infos=$Menu->where(array("status"=>1,"pid"=>$pid))->order("sort")->select();
            if(!empty($infos)){
              //查找是否含有权限
              foreach($infos as $kk=>$vv){
                $title=$vv['title'];
                $pid=$vv['pid'];
                //$info=$Rule->where(array("title"=>$title))->find();
                if(empty($info)){
                  //unset($infos[$kk]);
                }else{
                  $id=$info['id'];
                  if(in_array($id,$rules)){
                    $infos[$kk]['auth']="yes";
                  }
                }
              }
            }
            if(!empty($infos)){
              $list[$k]['hasson']="has";
            }else{
              $list[$k]['hasson']="no";
            }
            $list[$k]['sons']=$infos;
          // }
        // }
        
      }
      $this->list=$list;
      // dump($list);exit;
      $this->meta_title="主页";
      $this->display();
    }
    
  
  
    
   
    
    
    
    
}//结束