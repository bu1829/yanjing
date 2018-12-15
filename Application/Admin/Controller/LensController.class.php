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
            if($_POST['is_new_user']==1){
                if($_POST['name']=="")
                    $this->error("请填写客户姓名");
                
            }else{
                if(!$_POST['user_id'])
                    $this->error("请选择一个客户");
                
            }

            M()->startTrans();
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

            $_POST['user_id'] = $res1;
            $_POST['add_time']=time();
            $res2 = $UserLens->add($_POST);
            if($res1 && $res2){
                M()->commit();
                $this->success("添加成功",U('Lens/userList'));
            }else{
                M()->rollback();
                $this->error("添加失败");
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
        $data = $UserLens->table('gls_user_lens ul')
            ->join('gls_user as u on ul.user_id=u.user_id')
            ->where(array('ul.id'=>$id))
            ->find();
        if(IS_POST){
            $udata = [
                'name' => $_POST['name'],
                'age' => $_POST['age'],
                'sex' => $_POST['sex'],
                'address' => $_POST['address'],
                'mobile' => $_POST['mobile'],
                'add_time' => time()
            ];
            M()->startTrans();
            $res1 = $User->where(array('user_id'=>$data['user_id']))->save($udata);
            $res2 = $UserLens->where(array('id'=>$id))->save($_POST);
            if($res1 && $res2){
                M()->commit();
                $this->success("修改成功",U('Lens/userLensInfo',array('user_id'=>$data['user_id'])));
            }else{
                M()->rollback();
                $this->error("修改失败");   
            }
        }else{
            $this->data = $data;
            $this->meta_title="编辑配镜";
            $this->display('user_lens');
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
        $this->list  = $User
        ->where($where)
        ->limit(($p-1)*$num,$num)
        ->order("add_time desc")
        ->select();
        
        $this->display();
    }
    

    //客户配镜详情
    public function userLensInfo($user_id){
        $this->meta_title="客户配镜详情";
        $UserLens = M("user_lens");
        $where['u.user_id'] = $user_id;
        $list = $UserLens->table('gls_user_lens ul')
                ->join('gls_user as u on u.user_id=ul.user_id')
                ->field('ul.*,u.name,u.age,u.sex,u.mobile,u.address')
                ->where($where)
                ->order('ul.gls_time desc')
                ->select();
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