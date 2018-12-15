<?php
namespace Admin\Controller;
use Common\Api\CommonApi;
use Think\Controller;
/**
 * 商品管理
 */
class LensController extends AdminController{

	public function __construct(){
		parent::__construct();
	}

	
	

/********************************商品开始*********************************************************/
    /**
     * 商品列表
     * @author xuxiaowen
     */
    public function lensList(){
        //选择
        $this->types=I("get.types");
        $this->lr = I("get.lr");//dump($this->lr);exit;
        if($this->types=="chose"){
            $where['inventory'] = array("gt",0);
        }
        $where['is_del'] = 0;
        $keyword=I("get.keyword");//关键字
        if(!empty($keyword)){
            //$where['name|description|detail|price']=array("like","%$keyword%");
            $where['name']=array("like","%$keyword%");
            $this->keyword=$keyword;
        }
        
        $meta_title="镜片列表";
        $p = NULL == I('get.p') ? 1 : I('get.p');
        
        
        $count = M('lens')
                ->where($where)
                ->count();// 查询满足要求的总记录数
        $num = 20;
        $Page=new \Think\Page($count,$num);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        
        $show=$Page->show();// 分页显示输出
        // dump($show);exit;
        $list = M('lens')
                ->where($where)
                ->limit(($p-1)*$num,$num)
                //->limit($Page->firstRow.','.$Page->listRows)
                ->order("add_time desc")
                ->select();
        // dump($list);exit;
        $this->assign('p',$p);
        $this->assign('count',$count);// 总数
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('gids',$gids);
        
        $this->meta_title=$meta_title;
        $this->display();
    }
    
    
    /**
     * 新增镜片
     */
    public function lensAdd(){
        if(IS_POST){
            $Lens = M("lens");
            $result = $Lens->where(array("name"=>$_POST['name']))->find();
            if($result){
                $this->error("该镜片已经存在");
            }
        	$_POST['lens_no']=I("post.lens_no")==null?date("YmdHis",time()):I("post.lens_no");//镜片货号
            $_POST['add_time']=time();
            $_POST['update_time']=time();
            $re=$Lens->add($_POST);
           
            if($re){
                $this->success("添加成功",U('Lens/lensList'));
            }else{
                $this->error("添加失败");
            }
           
            
        }else{
            $this->meta_title="镜片添加";
            $this->display("lens");
        }
    }
    
    
    /**
     * 修改镜片
     */
    public function lensEdit($id){
        if(IS_POST){
            $Lens = M("lens");
            $Lens = M("lens");
            $result = $Lens->where(array("name"=>$_POST['name'],"id"=>array("neq",$id)))->find();
            if($result){
                $this->error("该镜片已经存在");
            }
            //$_POST['lens_no']=I("post.lens_no")==null?date("YmdHis",time()):I("post.lens_no");//镜片货号
            
            $_POST['update_time']=time();
            $re=$Lens->where(array("id"=>$id))->save($_POST);
           
            if($re!==false){
                $this->success("修改成功",U('Lens/lensList'));
            }else{
                $this->error("修改失败");
            }
           
            
        }else{
            $this->data = M('lens')->where(array('id'=>$id))->find();
            $this->meta_title="镜片修改";
            $this->display("lens");
        }
    }
    
    //删除镜片
    public function lensDel($id){
        $res = M("lens")->where(array('id'=>$id))->save(array('is_del'=>1));
        if($res){
            $this->success("删除成功",U('Lens/lensList'));
        }else{
            $this->error("删除失败",U('Lens/lensList'));
        }
    }
  
  
    //新增配镜
    public function userLensAdd(){
        $User = M("user");
        $UserLens = M("user_lens");
            
        if(IS_POST){
            // dump($_POST);exit;
            if($_POST['is_new_user']==1){
                if($_POST['name']=="")
                    $this->error("请填写客户姓名");
                
            }else{
                if(!$_POST['user_id'])
                    $this->error("请选择一个客户");
                
            }
            // if(empty($_POST['lens_l_id']) && empty($_POST['lens_r_id'])){
            //     $this->error("请至少选择一只眼镜");
            // }
            // if($_POST['lens_l_id']==$POST['lens_r_id']){
            //     $num = M("lens")->field("inventory")->where(array("id"=>$_POST['lens_l_id']))->find();
            //     if($num['inventory']<2){
            //         $this->error("镜片库存不足");
            //     }
            // }else{
            //     $num_l = M("lens")->field("inventory")->where(array("id"=>$_POST['lens_l_id']))->find();
            //     $num_r = M("lens")->field("inventory")->where(array("id"=>$_POST['lens_r_id']))->find();
            //     if($num_l && $num_l['inventory']<1){
            //         $this->error("左眼镜片库存不足");
            //     }
            //     if($num_r && $num_r['inventory']<1){
            //         $this->error("右眼镜片库存不足");
            //     }
            // }


            if($_POST['is_new_user']==1){
                $udata = [
                    'name' => $_POST['name'],
                    'age' => $_POST['age'],
                    'sex' => $_POST['sex'],
                    'address' => $_POST['address'],
                    'mobile' => $_POST['mobile'],
                    'add_time' => time()
                ];
                $res1 = $User->add($udata);
            }else{
                $uinfo = $User->field("user_id")->where(array('user_id'=>$_POST['user_id']))->find();
                $res1 = $uinfo['user_id'];
            }

            
            if($res1){
                $_POST['user_id'] = $res1;
                // if($_POST['lens_l_id'] && $_POST['lens_r_id']){
                //     $_POST['lens_id'] = "L:".$_POST['lens_l_id'].","."R:".$_POST['lens_r_id'];
                //     $res_l = M("lens")->where(array("id"=>$_POST["lens_l_id"]))->setDec("inventory",1);
                //     $res_r = M("lens")->where(array("id"=>$_POST["lens_r_id"]))->setDec("inventory",1);
                // }elseif($_POST['lens_l_id'] && !$_POST['lens_r_id']){
                //     $_POST['lens_id'] = "L:".$_POST['lens_l_id'];
                //     $res_l = M("lens")->where(array("id"=>$_POST["lens_l_id"]))->setDec("inventory",1);
                //     $res_r = TRUE;
                // }elseif(!$_POST['lens_l_id'] && $_POST['lens_r_id']){
                //     $_POST['lens_id'] = "R:".$_POST['lens_r_id'];
                //     $res_l = TRUE;
                //     $res_r = M("lens")->where(array("id"=>$_POST["lens_r_id"]))->setDec("inventory",1);
                // }
                
                $_POST['add_time']=time();
                $res2 = $UserLens->add($_POST);
                if($res2){
                    $this->success("添加成功",U('Lens/userList'));
                }else{
                    $this->error("添加失败");
                }
            }else{
                $this->error("添加失败！！");
            }
            
            
        }else{
            $this->meta_title="新增配镜";
            $this->display("user_lens");
        }
    }


    //编辑配镜
    public function userLensEdit($id){
        $User = M("user");
        $UserLens = M("user_lens");
        if(IS_POST){
            // if(empty($_POST['lens_l_id']) && empty($_POST['lens_r_id'])){
            //     $this->error("请至少选择一只眼镜");
            // }
            // if($_POST['lens_l_id']==$POST['lens_r_id']){
            //     $num = M("lens")->field("inventory")->where(array("id"=>$_POST['lens_l_id']))->find();
            //     if($num['inventory']<2){
            //         $this->error("镜片库存不足");
            //     }
            // }else{
            //     $num_l = M("lens")->field("inventory")->where(array("id"=>$_POST['lens_l_id']))->find();
            //     $num_r = M("lens")->field("inventory")->where(array("id"=>$_POST['lens_r_id']))->find();
            //     if($num_l && $num_l['inventory']<1){
            //         $this->error("左眼镜片不足");
            //     }
            //     if($num_r && $num_r['inventory']<1){
            //         $this->error("右眼镜片不足");
            //     }
            // }


            // if($_POST['is_new_user']==1){
            //     $_POST['add_time'] = time();
            //     $res1 = $User->add($_POST);
            // }else{
            //     $uinfo = $User->field("user_id")->where(array('user_id'=>$_POST['user_id']))->find();
            //     $res1 = $uinfo['user_id'];
            // }

            // $uinfo = $UserLens->field("user_id")->where(array('id'=>$id))->find();
            // $res1 = $User->where(array('user_id'=>$uinfo['user_id']))->save();
            // if($res1!==false){
            //     // $_POST['user_id'] = $res1;
            //     if($_POST['lens_l_id'] && $_POST['lens_r_id']){
            //         $_POST['lens_id'] = "L:".$_POST['lens_l_id'].","."R:".$_POST['lens_r_id'];
            //         $res_l = M("lens")->where(array("id"=>$_POST["lens_l_id"]))->setDec("inventory",1);
            //         $res_r = M("lens")->where(array("id"=>$_POST["lens_r_id"]))->setDec("inventory",1);
            //     }elseif($_POST['lens_l_id'] && !$_POST['lens_r_id']){
            //         $_POST['lens_id'] = "L:".$_POST['lens_l_id'];
            //         $res_l = M("lens")->where(array("id"=>$_POST["lens_l_id"]))->setDec("inventory",1);
            //         $res_r = TRUE;
            //     }elseif(!$_POST['lens_l_id'] && $_POST['lens_r_id']){
            //         $_POST['lens_id'] = "R:".$_POST['lens_r_id'];
            //         $res_l = TRUE;
            //         $res_r = M("lens")->where(array("id"=>$_POST["lens_r_id"]))->setDec("inventory",1);
            //     }
                
            //     $_POST['add_time']=time();
                $res2 = $UserLens->where(array('id'=>$id))->save($_POST);
                if($res2){
                    $this->success("修改成功",U('Lens/lensList'));
                }else{
                    $this->error("修改失败");
                }
            // }
            
           
            
            
        }else{
            $data = $UserLens->where(array("id"=>$id))->find();
            $uinfo = $User->where(array('user_id'=>$data['user_id']))->find();
            $data['name'] = $uinfo['name'];
            $data['age'] = $uinfo['age'];
            $data['sex'] = $uinfo['sex'] == 1 ? '男' : '女';
            $data['mobile'] = $uinfo['mobile'];
            $data['address'] = $uinfo['address'];
            $data['lens_id'] = explode(',',$data['lens_id']);
            $lenth = sizeof($data['lens_id']);
            
            if($lenth==2){
                $l = M("lens")->field("name")->where(array('id'=>substr($data['lens_id'][0],2)))->find();
                $data['lens_l_name'] = $l['name'];
                $r = M("lens")->field("name")->where(array('id'=>substr($data['lens_id'][1],2)))->find();
                $data['lens_r_name'] = $r['name'];
            }elseif($lenth==1){
                if(substr($data['lens_id'],0,1)=="L"){
                    $l = M("lens")->field("name")->where(array('id'=>substr($data['lens_id'][0],2)))->find();
                    $data['lens_l_name'] = $l['name'];
                }elseif(substr($data['lens_id'],0,1)=="R"){
                    $r = M("lens")->field("name")->where(array('id'=>substr($data['lens_id'][1],2)))->find();
                    $data['lens_r_name'] = $r['name'];
                }
            }
            
            $this->data = $data;
            $this->meta_title="编辑配镜";
            $this->display();
        }
    }


    //配镜客户列表
    public function userList(){
        //选择
        $this->types=I("get.types");
        $User = M("user");
        $where = array();
        $keyword=I("get.keyword");//关键字
        if(!empty($keyword)){
            //$where['name|description|detail|price']=array("like","%$keyword%");
            $where['name']=array("like","%$keyword%");
            $this->keyword=$keyword;
        }
        $p = NULL == I('get.p') ? 1 : I('get.p');
        $count = $User->where($where)->count();// 查询满足要求的总记录数
        $num = 20;
        $Page=new \Think\Page($count,$num);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        
        $show=$Page->show();// 分页显示输出
        $this->meta_title="客户列表";
        $this->p = $p;
        $this->count = $count;
        $this->page = $show;
        $this->list  = $User->where($where)->limit(($p-1)*$num,$num)->order("add_time desc")->select();
        
        $this->display();
    }
    

    //客户配镜详情
    public function userLensInfo($user_id){
        $UserLens = M("user_lens");
        $this->user = M("user")->field("name")->where(array('user_id'=>$user_id))->find();
        $where['user_id'] = $user_id;
        $p = NULL == I('get.p') ? 1 : I('get.p');
        $count = $UserLens->where($where)->count();// 查询满足要求的总记录数
        $num = 20;
        $Page=new \Think\Page($count,$num);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        
        $show=$Page->show();// 分页显示输出
        $this->meta_title="客户配镜列表";
        $this->p = $p;
        $this->count = $count;
        $this->page = $show;
        $list  = $UserLens->where($where)->limit(($p-1)*$num,$num)->order("add_time desc")->select();
        foreach($list as $key=>$val){
            $lr = $UserLens->field("lens_id")->where(array('id'=>$val['id']))->find();
            $lens_id = explode(',',$lr['lens_id']);
            $lenth = sizeof($lens_id);

            if($lenth==2){
                $l = M("lens")->field("name")->where(array('id'=>substr($lens_id[0],2)))->find();
                $list[$key]['lens_l_name'] = $l['name'];
                $r = M("lens")->field("name")->where(array('id'=>substr($lens_id[1],2)))->find();
                $list[$key]['lens_r_name'] = $r['name'];
            }elseif($lenth==1){
                if(substr($data['lens_id'],0,1)=="L"){
                    $l = M("lens")->field("name")->where(array('id'=>substr($lens_id[0],2)))->find();
                    $list[$key]['lens_l_name'] = $l['name'];
                }elseif(substr($data['lens_id'],0,1)=="R"){
                    $r = M("lens")->field("name")->where(array('id'=>substr($lens_id[1],2)))->find();
                    $list[$key]['lens_r_name'] = $r['name'];
                }
            }
        }
        $this->list = $list;
        $this->display();
    }

    //修改客户信息
    public function userEdit($user_id){
        if(IS_POST){
            $res = M("user")->where(array("user_id"=>$user_id))->save($_POST);
            if($res){
                $this->success("修改成功",U("Lens/userList"));
            }else{
                $this->error("修改失败");
            }
        }else{
            $this->data = M("user")->where(array("user_id"=>$user_id))->find();
            $this->display();
        }
        
    }

    // //修改客户配镜信息
    // public function userLensEdit(){
    //     $this->display();
    // }
    
}//类的结束