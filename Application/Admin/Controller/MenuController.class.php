<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * 菜单控制器
 * @author xuxiaowen
 */
class MenuController extends  AdminController{
	
	/**
	 * 选择图标
	 * @author xuxiaowen
	 */
	public function icon(){
		$this->display();
	}
	
	
	
	/**
	 * 菜单列表
	 * @author xuxiaowen
	 */
	public function index(){
		$action=I("get.action");
		if($action=="list"){
			$meta_title="菜单列表";
			$btn="btn-primary";
		}else if($action=="sort"){
			$meta_title="菜单排序";
			$btn="btn-success";
		}else{
			$this->error("参数错误");
			exit();
		}
		 
		$Node=M("menu");
		$cat = $Node->where(array('pid'=>0))->order("sort")->select();
		$data=getCatSon($cat, 'menu', 'title', 'id',"sort");
		
		$this->list=$data;
		$this->meta_title=$meta_title;
		$this->action=$action;
		$this->btn=$btn;
		$this->display();
	}
	
	
	
	/**
	 * 添加菜单
	 * @author xuxiaowen
	 */
	public function add(){
		if(IS_POST){
			$Menu=D("menu");
			if(!$Menu->create()){
				$this->error($Menu->getError());
			}else{
				if($Menu->add()){
					$this->success("添加成功");
				}else{
					$this->error("添加失败");
				}
			}
		}else{
			$id=I("get.id");
			 
			if($id && is_numeric($id)){
				//获得权限前面的名称
				$info=M("menu")->where(array("id"=>$id))->find();
				$data=array("pid"=>$id,"url"=>$info['url']."/");
				$this->data=$data;
			}
			
			 
			$cat = M("menu")->where(array('pid'=>0))->select();
			$data=getCatSon($cat, 'menu', 'title', 'id');
			$this->cat=$data;
			 
			$this->meta_title="添加菜单";
			$this->display();
		}
	}
	
	/**
	 * 修改菜单
	 * @author xuxiaowen
	 */
	public function edit(){
		$Menu=D("menu");
		if(IS_POST){
			if(!$Menu->create()){
				$this->error($Menu->getError());
			}else{
				if($Menu->save()){
	                $this->success("修改成功",U("Menu/index",array('action'=>'list')));
	            }else{
	                $this->error("修改失败");
	            }
			}
		}else{
			$id=I("get.id");
	
			$cat = $Menu->where(array('pid'=>0))->select();
            $this->cat=getCatSon($cat, 'menu', 'title', 'id');

            $data=$Menu->where(array("id"=>$id))->find();
            $this->assign('data', $data);
	
			$this->meta_title="修改菜单";
			$this->display("add");
		}
	}
	
	/**
	 * 删除一个菜单
	 * @author xuxiaowen
	 */
	public function deleteOne(){
		$id=I("get.id");
		$where['pid|id']=$id;
		$re=M("menu")->where($where)->delete();
		if($re){
			$this->success("删除成功");
		}else{
			$this->error("删除失败");
		}
	}
}