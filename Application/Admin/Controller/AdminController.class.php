<?php
namespace Admin\Controller;
use Think\Auth;

use Think\Controller;
session_start();
header("content-type:text/html;charset=utf-8");
class  AdminController extends Controller{
	public function __construct(){
		parent::__construct();
	}
    public $Imgurl="/Public/Upload/";
  
	/**
	 * 登陆的验证
	 * @author     xuxiaowen
	 */
    public function _initialize(){
        // if($_SESSION['login_state']!=C('LOGIN')){
        //     $this->redirect("Public/login");
        // }
        // else{
            //判断是否锁定了屏幕
            // if($_SESSION['lock']=="locked"){
            // 	$this->redirect("Public/lockscreen");
            // 	exit;
            // }
        	
        	//判断这个方法存在不存在
            define("UID",$_SESSION[C("USER_AUTH_KEY")]);//保存用户id
            define("UNAME",$_SESSION['authName']);//保存用户名
            
            
            //获得时间
            // $this->TIME=gettime();
            // $config=S("CONFIG_DATA");
            // if(!$config){
            //     $config=getConfigData();
            //     S("CONFIG_DATA",$config);
            // }
            // C($config); //添加到配置
            // $this->CONFIG=$config;//将所有配置放置到页面
            
            
            // if(C("ADMIN_CACHE_TIME")){//后台台网站操作的缓存时间
            //     define("ACT",C("ADMIN_CACHE_TIME"));
            // }
            
            //设置的同一账号只能在一台电脑登陆
            // $onlyloginadmin=C("ONLY_LOGIN_ADMIN") ? C("ONLY_LOGIN_ADMIN") : 1;
            // if($onlyloginadmin=="1"){
            //     if(is_other_login_admin()){
            //         $this->redirect("Public/relogin");
            //         exit;
            //     }
            // }
            
            
            
            // $AuthConfig=C('AUTH_CONFIG');
            // //查找是否是超级管理员
            // if(!in_array(UID, $AuthConfig['AUTH_SUPERADMIN'])){
            // 	//以下是无需验证的
            // 	$notAuth=in_array(CONTROLLER_NAME,explode(',', $AuthConfig['NOT_AUTH_MODULE']))||in_array(ACTION_NAME,explode(',', $AuthConfig['NOT_AUTH_ACTION']));
            // 	if(!$notAuth){
            // 		import('ORG.Util.Auth');//加载类库(auth权限认证)
            // 		$auth=new Auth();
            // 		$url=strtolower(CONTROLLER_NAME.'/'.ACTION_NAME);
            // 		if(!$auth->check($url,UID)){
            // 			//$this->redirect("Auth/warn");
            // 			//$this->error("权限不足！");
            // 		}else{
            // 			//echo "有权限";
            // 		}
            // 	}
            // }
            
            
        // }
    }
    
	
	
	
	
	
	
	
	
	/**
	
	
	
	/**
	 * 公共的修改禁用状态的ajax方法(一条)-----必须规定要修改的字段，否则会胡乱修改，在配置文件中设置
	 * @author xuxiaowen
	 * @param   string  $model     实力模型数据表名字
	 * @param   string  $field     要修改的数据id的字段名称
	 * @param   int     $id        要修改的id
	 * @param   int     $status    当前状态，0为禁用    1为正常 
	 * @param   string  editfield  要修改的字段名称，默认为 status
	 */
	public function changeStatusOne(){
	    $model=I("post.model");//要修改的数据表名称
	    $field=I("post.field");//要修改的数据id的字段名称
	    $id=I("post.id");//要修改的id
	    $status=I("post.status");//当前状态，0为禁用    1为正常 */
	    $editfield=I("post.editfield");//要修改的字段名称，默认为 status
	    
	    //判断是否在要修改的字段的范围内
	    $into=C("STATUS");
	    $arr=explode(",", $into);
	    if(!in_array($editfield, $arr)){
	        echo "faile";
	        exit;
	    }
	    
 	    $where=array($field=>$id);
	    
	    $Model=M("$model");
	    
        if($status==0){
            $data=array("$editfield"=>1);
           
        }elseif($status==1){
             $data=array("$editfield"=>0);
        }else{
             echo "only";
             exit;
        }
        $re=$Model->field("$editfield")->where($where)->save($data);
       
        if($re>0){
            if($model=="config"){
                S('CONFIG_DATA',null);
            }
            echo $status;
        }else{
            echo "faile";
        }
	}
	


	/**
	 *公共的修改禁用状态的方法(多条)
	 *@author xuxiaowen
	 *     
	 *@param  int   $status     设置的状态，0禁用 1启用   
	 *@param  array $where      设置的条件
	 *@param        $Model      默认的控制器，其实就是数据库名称
	 */
	public function changeStatusMore($status,$where,$Model=CONTROLLER_NAME){
	       $data=array("status"=>$status,"update_time"=>time());
	       switch ($status){
	           case 0:
	               $re=M("$Model")->where($where)->save($data);
	           break;
	           case 1:
	               $re=M("$Model")->where($where)->save($data);
	           break;
	           default:
	               $this->error("参数错误");
	           break;
	       }
	       if($re>0){
	           if($Model=="Config"){
	               S('CONFIG_DATA',null);
	           }
	           $this->success("修改成功");
	       }else{
	           $this->success("修改失败");
	       }
	}
	
	/**
	 * 获得所有的数据。分页和不分页（不适合有join的）
	 * @param  string          $model  模型名
	 * @param  array           $where  查询条件
	 * @param  string|array    $order  排序条件
	 * @param  int             $num    每页显示的页数
	 * @param  string          $field  所要查找的字段
	 * @param  string          $field_bool  所要查找的字段的布尔型，默认false为查询$field中的。
	 * @param  int             $state  1为分页，2为不分页返回所有数据
	 * @author xuxiaowen  <xuxiaowen@yuanbon.com>
	 */
	protected function lists ($model,$where="",$order='sort',$num="",$field="*",$field_bool=false,$state=1){
	    if(is_string($model)){
	        $Model=M($model);
	    }
	   
	    $count = $Model->where($where)->count();// 查询满足要求的总记录数
	    $this->count=$count;
	    if($num==''){
	        $num = C('ADMIN_ROW_NUM') > 0 ? C('ADMIN_ROW_NUM') : 10;
	    }
	 
	    $Page=new \Think\Page($count,$num);// 实例化分页类 传入总记录数和每页显示的记录数(25)
	    $show=$Page->show();// 分页显示输出
	    
	    if($state==1){
	        $list=$Model
            	        ->field($field,$field_bool)
            	        ->where($where)
            	        ->order($order)
            	        ->limit($Page->firstRow.','.$Page->listRows)
            	        ->select();
	        $this->assign('count',$count);// 总数
	        $this->assign('list',$list);// 赋值数据集
	        $this->assign('page',$show);// 赋值分页输出
	    }else if($state==2){
	        $list=$Model
	                    ->field($field,$field_bool)
            	        ->where($where)
            	        ->order($order)
            	        ->select();
	    }
	    return $list;
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
	 * 传输json 数组
	 * @author xuxiaowen
	 */
	public function jsonArr($list){
		if(!empty($list)){
			$arr['msg']="请求成功";
			$arr['flag']="200";
			$arr['response']=$list;
		}else{
			$arr['msg']="已加载全部";
			$arr['flag']="204";
		}
		$this->ajaxReturn($arr,"json");
	}

	//申请成为业务员
	public function toSalesman(){
	    $id=I("post.id");
	    $status=I("post.status");
	    $code = getInviteCode();
	    if(1==$status){
	    	$re=M('user')->where(array('user_id'=>$id))->save(array('role'=>3,'invitecode'=>$code));
	    }elseif(3==$status){
	    	$re=M('user')->where(array('user_id'=>$id))->save(array('role'=>1,'invitecode'=>0));
	    }else{
	    	echo "only";
            exit;
	    }
	    
        $status = $status == 1 ? 0 : 1;
        if($re>0){
            echo $status;
        }else{
            echo "faile";
        }
	}

	
}//类的结束