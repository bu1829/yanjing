<?php
namespace Admin\Controller;
use Think\Controller;
use Common\Api\UserApi;
use Common\Api\CommonApi;
header("content-type:text/html;charset=utf-8");
/**
 * 后台首页控制器
 * @author xuxiaowen
 **/
class PublicController 	extends  Controller{
    

	/**
     * 初始化(配置文件)
     * @author  xuxiaowen
     */
    public function _initialize(){
        // $config=S("CONFIG_DATA");
        // if(!$config){
        //     $config=getConfigData();
        //     S("CONFIG_DATA",$config);
        // }
        // C($config); //添加到配置
        // $this->CONFIG=$config;//将所有配置放置到页面
    }

    
    /**
     *验证码 
     *@author   xuxiaowen
     */
    Public function verify(){
       $Model=new CommonApi();
       $Model->verify();
    }
    
    
    /**
     * 检测验证码正确性(ajax)
     * @author   xuxiaowen
     */
    public  function  checkVerify(){
        $code=I("post.code");
        if($code==$_SESSION['code']){
            echo "right";
        }else{
            echo "wrong";
        }
    }
    
    
    /**
     * 登录
     * @author      xuxiaowen
     */
    public function login(){
        $User=M("admin");
        if(IS_POST){
            
            
                    
                        $username=I("post.username");
                        $password=md10(I("post.password"));
                        $where['_string']="(username='$username')  OR (email='$username') OR (phone='$username')";
                        $where['role']=1;
                        
                        //查找是否存在此账号
                        $account=$User->where($where)->find();
                        if(empty($account)){
                            echo "不存在此账号";
                            exit;
                        }
                        $where['password']=$password;
                        
                        $data=$User->field("password",true)
                            ->where($where)
                            ->find();dump($data);exit;
                            if(!empty($data) && is_array($data)){
                                $arr['last_login_time']=time();
                                $arr['last_login_ip']=get_client_ip();
                                $arr['login']=$data['login']+1;
                                $arr['session_id']=session_id();
                                $arr['last_login_location']=getLastLocation();     
                                
                                $User->field("last_login_ip,last_login_location,last_login_time,login,session_id")->where(array("user_id"=>$data['user_id']))->save($arr);
                                session("authName",$data['username']);//管理员用户名
                                session(C("USER_AUTH_KEY"),$data['user_id']);//管理员id
                                session('login_state',C('LOGIN'));//已经登陆标识
                                
                                //选中了自动登录
                                if(I("post.check")=="1"){
                                	$cookie_username=base64_encode($data['username']);//用户名
                                	$cookie_userid=base64_encode($data['user_id']);//用户id
                                	cookie("username",array("1",$cookie_username,$cookie_userid),60*60*24*7);
                                }else{
                                	cookie("username",array("1",$cookie_username,$cookie_userid),-3600);
                                }
                                //插入登录记录
                                login($data['user_id'],1,2);
                                echo "success";
                            }else{
                                echo "密码不正确";
                            }
           
        }else{
        	$arr=cookie("username");
        	$checked=$arr['0'];//选中状态
        	$action=I("get.action");
        	if($action!="out"){
        		if(!empty($arr)){
        			if($checked=="1"){
        				$username=base64_decode($arr['1']);//用户名
        				$userid=base64_decode($arr['2']);//用户id
        				//查找是否存在此用户
        				$data=$User->field("username,user_id,login")->where(array("username"=>$username,"user_id"=>$userid))->find();
        				if(!empty($data)){
        					$arr['last_login_time']=time();
        					$arr['last_login_ip']=get_client_ip();
        					$arr['login']=$data['login']+1;
        					$arr['session_id']=session_id();
        					$arr['last_login_location']=getLastLocation();
        					$User->field("last_login_ip,last_login_location,last_login_time,login,session_id")->where(array("user_id"=>$data['user_id']))->save($arr);
        					
        					session("authName",$data['username']);//管理员用户名
        					session(C("USER_AUTH_KEY"),$data['user_id']);//管理员id
        					session("login_state",C("LOGIN"));//已经登陆标识
        					
        					//插入登录记录
        					login($data['user_id'],1,2);
        					$this->redirect("Index/index");
        				}else{
        					$this->redirect("Public/login",array("action"=>"out"));
        				}
        			}
        		}
        	}
        	$this->check=$checked;
        	$this->meta_title="登录";
            $this->display();
        }
    }
    
    
    /**
     * 注销用户 消除session
     * @author      xuxiaowen
     */
    public function out(){
        unset($_SESSION['authName']);
        unset($_SESSION[C("USER_AUTH_KEY")]);
        unset($_SESSION['ADMIN_AUTH_KEY']);
        unset($_SESSION["login_state"]);
        $this->redirect("Public/login",array('action'=>'out'));
    }
    
    
    /**
     * 锁定屏幕
     * @author xuxiaowen 
     */
    public function lockscreen(){
       $_SESSION['lock']="locked";//锁定屏幕状态
       
       $user_id=$_SESSION[C("USER_AUTH_KEY")];
       //获得用户头像
       $userinfo=M("admin")->where(array("user_id"=>$user_id))->find();
       //默认的头像
       $default_avatar=C("DEFAULT_AVATAR") ? C("DEFAULT_AVATAR") :"/Public/Common/images/avatar.jpg";
       
       $avatar=$userinfo['avatar'];//当前用户的头像
       if(empty($avatar)){
           $avatar=$default_avatar;
       }

       $this->avatar=$avatar;
       $this->meta_title='已锁定';
       $this->display();
      
   }
    
   /**
    * 解锁|重新登陆（ajax）
    * author xuxiaowen
    */
   public function unlock(){
           $username=$_SESSION['authName'];//用户名
           if(empty($username)){
               echo "timeout";//已经超时
               exit;
           }
           $passowrd=I("post.password");
           if(preg_match("/^[\\~!@#$%^&*()-_=+|{}\[\],.?\/:;\'\"\d\w]{6,20}$/",$passowrd)){
               $where['username']=$username;
               $password=md10(I("post.password"));
               $where['password']=$password;
               $data=M("admin")->where($where)->find();
               if(!empty($data)){
                   $arr=array(
                      "last_login_time"=>time(),
                      "session_id"=>session_id(),
                   );
                   M("admin")->where($where)->save($arr);
                   $_SESSION[C('USER_AUTH_KEY')]=$data['user_id'];//登录标示
                   $_SESSION['lock']="unlock";//解锁
                   $_SESSION['login_state']=C("LOGIN");//登录
                   echo "right";
               }else{
                   echo "登录失败！";
               }
           }else{
               echo  "密码不符合规范";//密码不符合规范
           }
   }
   
   
   /**
    * 重新登录
    * @author xuxiaowen
    */
   public function relogin(){
       //判断是不是被别人顶下来的
       $islogin=$_SESSION['islogin'];
       if($islogin=='other'){
           //获得用户头像
           $user_id=$_SESSION[C("USER_AUTH_KEY")];
           //获得用户头像
           $userinfo=M("admin")->where(array("user_id"=>$user_id))->find();
           //默认的头像
           $default_avatar=C("DEFAULT_AVATAR") ? C("DEFAULT_AVATAR") :"/Public/Common/images/avatar.jpg";
           
           $avatar=$userinfo['avatar'];//当前用户的头像
           if(empty($avatar)){
               $avatar=$default_avatar;
           }
           $this->data=$userinfo;
           $this->avatar=$avatar;
           $this->meta_title='被迫下线';
           $this->display();
       }else{
           $this->redirect("Index/index");
       }
   }
    
    /*******************************找回密码**********************************************/
    /**
     * 查看找回密码功能是否开启
     * @author  xuxiaowen
     */
    public function findPassword(){
        //是否允许找回密码
        $find=C("ADMIN_FIND_PASSWORD");
        $ADMIN_FIND_PASSWORD=$find;
        if($ADMIN_FIND_PASSWORD=="1"){
            return true;
        }else{
            return false;
        }
    }
    
    /**
     * 填写用户名
     * @author  xuxiaowen
     */
    public function checkAccount(){
        if($this->findPassword()){
            if(IS_POST){
                $this->user=$_POST;
                $User=M("admin");
                $rule=array(
                    array("username","/^\w{4,20}$/i","用户名4-20位，可由数字、字母、符号组成",1,"regex"),
                );
                if($User->validate($rule)->create()){
                    $verify = new \Think\Verify();
                    $a=$verify->check(I("post.code"),"");
                    if(!$a){
                        $this->error="验证码错误";
                        $this->meta_title="填写用户名";
                        $this->display();
                    }else{
                        $username=I("post.username");
                        $data=$User->field("email")->where(array("username"=>$username,"role"=>1))->find();
                        if(!empty($data)){
                            if(!empty($data['email'])){
                                if(preg_match("/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/", $data['email'])){
                                    session("email",$data['email']);
                                    $this->redirect("checkEmail");
                                }else{
                                    $this->error="邮箱绑定错误";
                                    $this->meta_title="填写用户名";
                                    $this->display();
                                }
                            }else{
                                $this->error="没有绑定邮箱";
                                $this->meta_title="填写用户名";
                                $this->display();
                            }
                        }else{
                            $this->error="不存在此用户";
                            $this->meta_title="填写用户名";
                            $this->display();
                        }
                    }
                }else{
                    $this->error=$User->getError();
                    $this->meta_title="填写用户名";
                    $this->display();
                }
            }else{
                $this->meta_title="填写用户名";
                $this->display();
            }
        }else{
            $this->redirect("Public/login");
        }
    }
    
    /**
     * 发送验证码，设置新密码
     */
    public function  checkEmail(){
        if($this->findPassword()){
            $email=session("email");
            if(!empty($email)){
                if(IS_POST){
                    $this->user=$_POST;
                    $emailcode=I("post.emailcode");
                    $User=M("admin");
                    $rule=array(
                        array("password","/^[\\~!@#$%^&*()-_=+|{}\[\],.?\/:;\'\"\d\w]{6,20}$/","密码6-20位,由数字、字母、符号组成",1,"regex"),
                    );
                    if($emailcode!=session("code")){
                        $this->email=$email;
                        $this->error="验证码错误";
                        $this->meta_title="修改密码";
                        $this->display();
                    }else{
                        if($User->validate($rule)->create()){
                            $arr=array("password"=>md10(I("post.password")),"update_time"=>time());
                            $re=$User->field("password,update_time")->where(array("email"=>$email))->save($arr);
                            if($re){
                                //修改成功;
                                session("state",null);
                                session("finshed","ok");
                                session("email",NULL);
                                session("code",NULL);
                                $this->redirect("finshed");
                            }else{
                                $this->email=$email;
                                $this->error="修改失败";
                                $this->meta_title="修改密码";
                                $this->display();
                            }
                        }else{
                            $this->email=$email;
                            $this->error=$User->getError();
                            $this->meta_title="修改密码";
                            $this->display();
                        }
                    }
                }else{
                    $this->email=$email;
                    $this->meta_title="修改密码";
                    $this->display();
                }
            }else{
                $this->redirect("checkAccount","",1,"请先填写账号信息");
            }
        }else{
            $this->redirect("Public/login");
        }
    }
    
    /**
     * 验证邮箱的状态（ajax）
     * @author  xuxiaowen
     */
    public function checkCode(){
        $email=session("email");
        if(!preg_match("/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/", $email)){
            //邮箱地址错误
            echo "wrong";
        }else{
            //邮箱地址正确
            $code=S("CODE".session_id());
            if(!$code){
                $code=$_SESSION['code']=code6();
                $_SESSION['email']=$email;
                S("CODE".session_id(),$code,60);
                $_SESSION['state']="right";
                echo "ok";
            }else{
                echo "outtime";
            }
        }
    }
    
    
    /**
     * 发送六位随机验证码（ajax）
     * @author  xuxiaowen
     */
    public function sendCode(){
        if($_SESSION['state']=="right"){
            $email=session("email");
            $code=$_SESSION['code'];
            if(sendMail("$email", "【远邦集团】您正在通过邮箱找回密码，验证码为$code","验证码为$code,千万不要泄露该验证码，打死也不要说。")){
                echo "success";
            }else{
                echo  "fail";
            }
        }else{
            echo "feifa";
        }
    }
    
    /**
     * 验证完成
     * @author  xuxiaowen
     */
    public function finshed(){
        if($this->findPassword()){
            if(session("finshed")=="ok"){
                $this->meta_title="成功找回";
                session("finshed",null);
                $this->display();
            }else{
                $this->redirect("Public/login");
            }
        }else{
            $this->redirect("Public/login");
        }
    }
}