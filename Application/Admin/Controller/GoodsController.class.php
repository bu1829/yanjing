<?php
namespace Admin\Controller;
use Common\Api\CommonApi;
/**
 * 商品管理
 */
class GoodsController extends AdminController{

	public function __construct(){
		parent::__construct();
	}

	
	

/********************************商品开始*********************************************************/
    /**
     * 商品列表
     * @author xuxiaowen
     */
    public function goodsList(){
        $action=I("get.action");
        if($action=="list"){
            $meta_title="菜单列表";
            $btn="btn-primary";
            $order = 'a.add_time desc';
        }else if($action=="sort"){
            $meta_title="菜单排序";
            $btn="btn-success";
            $order = 'a.is_new desc,a.is_best desc,a.sort asc,a.add_time desc';
        }else{
            $meta_title="菜单列表";
            $btn="btn-primary";
            $order = 'a.add_time desc';
        }

        $this->action=$action;
        $this->btn=$btn;
    	//选择
    	$this->types=I("get.types");
    	
        $keyword=I("get.keyword");//关键字
        if(!empty($keyword)){
            //$where['name|description|detail|price']=array("like","%$keyword%");
            $where['a.name']=array("like","%$keyword%");
            $this->keyword=$keyword;
        }
        
        $start_time=I("get.start_time");//添加开始日期
        $end_time=I("get.end_time");//添加结束日期
        if(!empty($start_time) & !empty($end_time)){
        	$start_time=strtotime($start_time." 00:00:00");
        	$end_time=strtotime($end_time." 23:59:59");
        	$where['a.add_time']=array(array("EGT",$start_time),array("ELT",$end_time));
        }
        
        
        $status=I("get.status");//上下架状态
        if($status=="0" || $status=="1"){
        	$where['a.status']=$status;
        	$this->status=$status;
        }

        //是否精品
        $is_best=I("get.is_best");
        if($is_best=="0" || $is_best=="1"){
            $where['a.is_best']=$is_best;
            $this->is_best=$is_best;
        }

        //是否为询价商品
        $is_enquiry=I("get.is_enquiry");
        if($is_enquiry=="0" || $is_enquiry=="1"){
            $where['a.is_enquiry']=$is_enquiry;
            $this->is_enquiry=$is_enquiry;
        }

        //是否已售
        $is_sell=I("get.is_sell");
        if($is_sell=="0" || $is_sell=="1"){
            $where['a.is_sell']=$is_sell;
            $this->is_sell=$is_sell;
        }

        $artist = M('artist')->field('id,name')->select();
        $cats = M('goods_category')->field('id,name')->select();
        $subs = M('goods_subject')->field('id,name')->select();

        $this->artist = $artist;
        $this->cats = $cats;
        $this->subs = $subs;

        //作者
        $artist_id = I("get.artist_id");
        if($artist_id>0){
            $where['a.artist_id'] = $artist_id;
            $this->artist_id = $artist_id;
        }

        //分类
        $cat_id = I("get.cat_id");
        if($cat_id>0){
            $where['a.cat_id'] = $cat_id;
            $this->cat_id = $cat_id;
        }

        //题材
        $sub_id = I("get.sub_id");
        if($sub_id>0){
            $where['a.sub_id'] = $sub_id;
            $this->sub_id = $sub_id;
        }

        //新品
        $is_new=I("get.is_new");
        if($is_new=="0" || $is_new=="1"){
            $where['a.is_new']=$is_new;
            $this->is_new=$is_new;
        }

        //精品
        $is_best=I("get.is_best");
        if($is_best=="0" || $is_best=="1"){
            $where['a.is_best']=$is_best;
            $this->is_best=$is_best;
        }

        //是否为折扣商品
        $is_discount=I("get.is_discount");
        if($is_discount=="0" || $is_discount=="1"){
            $where['a.is_discount']=$is_discount;
            $this->is_discount=$is_discount;
        }

        //活动
        $is_activity=I("get.is_activity");
        if($is_activity=="0" || $is_activity=="1"){
            $where['a.is_activity']=$is_activity;
            $this->is_activity=$is_activity;
        }
        
        
        $meta_title="商品列表";
        $p = NULL == I('get.p') ? 1 : I('get.p');
        
        //$this->lists("goods",$where,"add_time desc","","*");//echo M('goods')->getLastSql();exit;
        $count = M('goods')->table('win_goods a')
                ->field('a.*,b.name as artist_name,c.name as cat_name,d.name as sub_name')
                ->join('win_artist as b on a.artist_id=b.id')
                ->join('win_goods_category as c on a.cat_id=c.id')
                ->join('win_goods_subject as d on a.sub_id=d.id')
                ->where($where)
                ->count();// 查询满足要求的总记录数
        $num = 20;
        $Page=new \Think\Page($count,$num);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        
        $show=$Page->show();// 分页显示输出
        // dump($show);exit;
        $list = M('goods')->table('win_goods a')
                ->field('a.*,b.name as artist_name,c.name as cat_name,d.name as sub_name')
                ->join('win_artist as b on a.artist_id=b.id')
                ->join('win_goods_category as c on a.cat_id=c.id')
                ->join('win_goods_subject as d on a.sub_id=d.id')
                ->where($where)
                ->limit(($p-1)*$num,$num)
                //->limit($Page->firstRow.','.$Page->listRows)
                ->order($order)
                ->select();
        $gids = M('goods')->table('win_goods a')
                ->field('a.id')
                ->join('win_artist as b on a.artist_id=b.id')
                ->join('win_goods_category as c on a.cat_id=c.id')
                ->join('win_goods_subject as d on a.sub_id=d.id')
                ->where($where)
                ->select();
        $gids = arr2str($gids);
        $this->assign('p',$p);
        $this->assign('count',$count);// 总数
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('gids',$gids);
        
        $this->meta_title=$meta_title;
        $this->display();
    }
    
   
    
    
    /**
     * 获得商品的规格和属性（目前只有属性）ajax
     * @author xuxiaowen
     */
    public function getGoodsOther(){
    	$id=I("post.id");//类型id
    	$gid=I("post.gid");//商品id
    	
    	$Type=M("goods_type");
    	$info=$Type->where(array("id"=>$id))->find();
    	if(empty($info)){
    		$data=array("msg"=>"不存在此类型","flag"=>404);
    		$this->ajaxReturn($data);
    	}else{
	    	//获得所有的属性
	    	$Attribute=M("goods_attribute");
	    	
	    	if($gid>0){//说明是修改商品
	    		//查找商品的商品类型
	    		$info=M("goods")->where(array("id"=>$gid))->find();
	    		$good_type=$info['goods_type'];
	    	}
	    	
	    	$list=$Attribute->where(array("tid"=>$id))->order("sort")->select();
	    	if(!empty($info) && $good_type==$id){//修改商品
	    		$c="";
	    		foreach ($list as $k=>$v){
	    			$arr=M("single_goods_attribute")->where(array("gid"=>$gid,"aid"=>$v['id']))->find();
	    			$attribute_val=$arr['attribute_val'];
	    			$write_type=$v['write_type'];
	    			if($write_type==1){//手动录入
	    				$a="<div class='form-group'><font class='col-sm-3 control-label'>".$v['name']."：</font><div class='col-sm-8'><input type='text' value='".$attribute_val."' class='btn-sm btn-white' name='attribute[]'/><input type='hidden' value='".$v['id']."'  name='title[]'/></div></div>";
	    			}elseif($write_type==2){//列表选择
    					$a="<div class='form-group'><font class='col-sm-3 control-label'>".$v['name']."：</font><div class='col-sm-8'><input type='hidden' value='".$v['id']."'  name='title[]'/><select name='attribute[]' class='btn-sm btn-white'>";
    					$val=parse_config_attr($v['val']);
    					$b="";
    					foreach($val as $kk=>$vv){
    						if($attribute_val==$vv){
    							$b.="<option selected value='".$vv."'>".$vv."</option>";
    						}else{
    							$b.="<option value='".$vv."'>".$vv."</option>";
    						}
    						
    					}
    					$a.=$b."</select></div></div>";
	    			}elseif($write_type==3){//多行文本框
	    		
	    			}
	    			$c.=$a;
	    		}
	    	}else{
	    		$c="";
	    		foreach ($list as $k=>$v){
	    			$write_type=$v['write_type'];
	    			if($write_type==1){//手动录入
	    				$a="<div class='form-group'><font class='col-sm-3 control-label'>".$v['name']."：</font><div class='col-sm-8'><input type='text' value='' class='btn-sm btn-white' name='attribute[]'/><input type='hidden' value='".$v['id']."'  name='title[]'/></div></div>";
	    			}elseif($write_type==2){//列表选择
	    				if($v['val']!=""){
	    					$a="<div class='form-group'><font class='col-sm-3 control-label'>".$v['name']."：</font><div class='col-sm-8'><input type='hidden' value='".$v['id']."'  name='title[]'/><select name='attribute[]' class='btn-sm btn-white'>";
	    					$val=parse_config_attr($v['val']);
	    					$b="";
	    					foreach($val as $kk=>$vv){
	    						$b.="<option value='".$vv."'>".$vv."</option>";
	    					}
	    					$a.=$b."</select></div></div>";
	    				}
	    			}elseif($write_type==3){//多行文本框
	    				 
	    			}
	    			$c.=$a;
	    		}
	    	}
	    	
	    	
	    	$data=array("msg"=>"成功","flag"=>1,"attribute"=>$c);
	    	$this->ajaxReturn($data);
    	}
    }
    
    
    /**
     * ajax上传商品图片
     * @author xuxiaowen
     */
    /**
     * ajax上传商品图片
     * @author xuxiaowen
     */
    public function ajaxuploadpicture(){
        $picname = $_FILES['mypic']['name'];
        $picsize = $_FILES['mypic']['size'];
        if ($picname != "") {
            if ($picsize > 1024000) {
                echo '图片大小不能超过1M';
                exit;
            }
            //$type = strstr($picname, '.');
            $type = $_FILES['mypic']['type'];
            if ($type != "image/gif" && $type != "image/jpg" && $type != "image/png" && $type != "image/bmp" && $type != "image/jpeg" ) {
                echo '图片格式不对！';
                exit;
            }
            $rand = uni(3,5);
            $pics = date("YmdHis") . $rand . '.' . substr($type,6);
            //上传路径
            $pic_path = "Public/Upload/Goods/Pics/". $pics;
            move_uploaded_file($_FILES['mypic']['tmp_name'], $pic_path);
        }
        $size = round($picsize/1024,2);
        $arr = array(
                'rand'=>$rand,
                'name'=>$picname,
                'pic'=>"/Public/Upload/Goods/Pics/".$pics,
                'size'=>$size
        );
        echo json_encode($arr);
    }
    
    /**
     * 删除ajax上传的图片
     * @author xuxiaowen
     */
    public function delimg(){
    	$pic=I("post.picture");//图片地址
    	$id=I("post.id");//旧图片id
        $pic_type = I('post.pic_type');
    	$name=I("post.name");//是否是删除已经上传的
    	if(unlink(".".$pic)){
    		echo "ok";
    		if($name=="old"){
    			//M("goods_picture")->where(array("id"=>$id))->delete();
                M("goods_picture")->where(array("id"=>$id))->save(array($pic_type=>''));
    		}
    	}else{
    		echo "no";
    	}
    }
    
    /**
     * 删除已上传的艺术顾问评论（ ajax）
     * @author xuxiaowen
     */
    public function delComment(){
    	$id=I("post.id");
    	$re=M("goods_expert_comment")->where(array("id"=>$id))->delete();
    	if($re){
    		echo "success";
    	}else{
    		echo "fail";
    	}
    }
    
    
    
    
    /**
     * 商品自动验证
     * @author xuxiaowen
     */
    protected $goods_rule=array(
    		array("name","1,255","商品名称，255字符以内",1,"length"),
    		array("cat_id","require","商品分类，必须选择1111",1),
            //array("sub_id","require","商品题材，必须选择",1),
    		//array("second_cate","require","商品二级分类，必须选择",1),
    		array("price","is_numeric","商品价格，不符合规范",1,"function"),
    		array("market_price","is_numeric","市场价格，不符合规范",2,"function"),
    		array("rate","is_numeric","年华率，不符合规范",2,"function"),
    		array("sort","number","排序，必须为整数",1),
    		array("status","0,1","状态参数错误",1,"in"),
    );
    
    /**
     * 商品添加
     * @author xuxiaowen
     */
    public function goodsAdd(){
        if(IS_POST){
            $Goods=M("goods");
            $picture=$_FILES['picture']['name'];
            if(empty($picture)){
                $this->error("请上传图片");
            }else{
                if($Goods->validate($this->goods_rule)->create()){
                	// $goods_no=empty(I("post.goods_no"))?date("YmdHis",time()):I("post.goods_no");//商品货号
                    
                	$img=I("post.img");//商品相册，数组
                	//var_dump($img);exit;
                	
                    $Model=new CommonApi();
                    //水印
                    //$water=I("post.water");
                    $_POST['add_time']=time();
                    $_POST['update_time']=time();
                    $re=$Model->upload("Goods",date("Ymd"), "goods","1","","id",array("picture","certificate"),1,array("800,800","thumb"));
                   ;
                    if($re){
                        
                    	
                    	//添加商品相册
                    	if(!empty($img)){
              //       		$Goodspic=M("goods_picture");
              //       		foreach ($img as $k=>$v){
	             //        		$a=strstr($v,".");
			        			// if($a!=""){
              //                       $Goodspic->add(array("gid"=>$re,"picture"=>$v));
			        			// }
              //       		}
                       
                            $pic_arr['gid'] = $re;
                            $pic_arr['pic_11'] = $img[0];
                            $pic_arr['pic_over_11'] = $img[1];
                            $pic_arr['pic_21'] = $img[2];
                            $pic_arr['pic_spec1'] = $img[3];
                            $pic_arr['pic_spec2'] = $img[4];
                            $pic_arr['pic_spec3'] = $img[5];
                            $pic_arr['pic_scene'] = $img[6];
                    	}

                        
                        $Goodspic = M('goods_picture');
                        $Goodspic->add($pic_arr);
                    	
                    	
                    	//添加专家点评
                    	$expert=I("post.expert");//所有专家
                    	$comment=I("post.comment");//所有的评论
                    	 
                    	$Comment=M("goods_expert_comment");
                    	foreach($comment as $k=>$v){
                    		$con=trim($v);
                    		if(!empty($con)){//这是值
                    			$eid=$expert[$k];
                    			$data=array(
                    					"gid"=>$re,
                    					"eid"=>$eid,
                    					"comment"=>$v,
                    			);
                    			$Comment->add($data);
                    		}
                    	}
                    	
                        $this->success("添加成功",U('Goods/goodsList/action/list'));
                    }else{
                        $this->error("添加失败");
                    }
                }else{
                    $this->error($Goods->getError());
                }
            }
        }else{
        	$this->cats = M("goods_category")->select();//商品分类
            $this->subs = M("goods_subject")->select(); //商品题材
        	
            $this->meta_title="商品添加";
            $this->display("goods");
        }
    }
    
    
    /**
     * 商品修改
     * @author xuxiaowen
     */
    public function goodsEdit($id){
        
        $Goods = M("goods");
        $Goodspic = M("goods_picture");
        $Category = M('goods_category');
        $Subject = M('goods_subject');
        //是否存在此商品
        $info = $Goods->where(array('id'=>$id))->find();
        if(!$info){
            $this->error("不存在此商品"); exit;
        }
        $Comment=M("goods_expert_comment");
        // dump($_POST);exit;
        if(IS_POST){
            if(!in_array(UID,array(1,17,25))){
                $this->redirect("Auth/warn");
            }
            if($Goods->validate($this->goods_rule)->create()){
            	
            	$gid=I("post.id");//商品id
            	$img=I("post.img");//商品相册，数组
            	//dump($img);exit;
                $Model=new CommonApi();
                //水印
                $where['id']=$gid;
                //$water=I("post.water");
                $_POST['update_time']=time();
                $re = $Model->upload("Goods",date("Ymd"), "goods","2","","id",array("picture","certificate"),1,array("800,800","thumb"),"*","false",$where);
                
                if($re){
                	//添加商品相册
                        if(!empty($img)){
              //            $Goodspic=M("goods_picture");
              //            foreach ($img as $k=>$v){
                 //             $a=strstr($v,".");
                                // if($a!=""){
              //                       $Goodspic->add(array("gid"=>$re,"picture"=>$v));
                                // }
              //            }
                            $Goodspic = M('goods_picture');
                            $pics = $Goodspic->where(array('gid'=>$gid))->find();
                            if($pics){
                                // $pic_arr['gid'] = $gid;
                                // $pic_arr['pic_11'] = $img[0] == NULL ? $pics['pic_11'] : $img[0];
                                // $pic_arr['pic_over_11'] = $img[1] == NULL ? $pics['pic_over_11'] : $img[1];
                                // $pic_arr['pic_21'] = $img[2] == NULL ? $pics['pic_21'] : $img[2];
                                // $pic_arr['pic_spec1'] = $img[3] == NULL ? $pics['pic_spec1'] : $img[3];
                                // $pic_arr['pic_spec2'] = $img[4] == NULL ? $pics['pic_spec2'] : $img[4];
                                // $pic_arr['pic_spec3'] = $img[5] == NULL ? $pics['pic_spec3'] : $img[5];
                                $pic_arr['pic_scene'] = $img[0];// == NULL ? $pics['pic_scene'] : $img[0];
                                $Goodspic->where(array('gid'=>$gid))->save(array('pic_scene'=>$pic_arr['pic_scene']));
                            }else{
                                $pic_arr['gid'] = $gid;
                                $pic_arr['pic_11'] = $img[0];
                                $pic_arr['pic_over_11'] = $img[1];
                                $pic_arr['pic_21'] = $img[2];
                                $pic_arr['pic_spec1'] = $img[3];
                                $pic_arr['pic_spec2'] = $img[4];
                                $pic_arr['pic_spec3'] = $img[5];
                                $pic_arr['pic_scene'] = $img[6];
                                $Goodspic->add($pic_arr);
                            }

                            
                        }
                        //dump($pic_arr);exit;
            	    // $Goodspic = M('goods_picture');
                 //    if(!$pics){
                 //        $Goodspic->add($pic_arr);
                 //    }else{
                 //        $Goodspic->where(array('gid'=>$gid))->save(array('pic_scene'=>$pic_arr['pic_scene']));//echo $Goodspic->getLastSql();exit;
                 //    }
                    


            		//修改旧的专家点评
            		$expertold=I("post.expertold");//所有的评论id
            		$commentold=I("post.commentold");//所有的评论
            		foreach($commentold as $k=>$v){
            			$con=trim($v);
            			if(!empty($con)){//这是值
            				$id=$expertold[$k];
            				$Comment->where(array("id"=>$id,"gid"=>$gid))->save(array("comment"=>$v));
            			}
            		}
            		
            		
            		//添加新的专家点评
            		$expert=I("post.expert");//所有专家
            		$comment=I("post.comment");//所有的评论
            		
            		foreach($comment as $k=>$v){
            			$con=trim($v);
            			if(!empty($con)){//这是值
            				$eid=$expert[$k];
            				$data=array(
            						"gid"=>$gid,
            						"eid"=>$eid,
            						"comment"=>$v,
            				);
            				$Comment->add($data);
            			}
            		}
                	
                    $this->success("修改成功",U('Goods/goodsList/action/list'));
                }else{
                    $this->error("修改失败");
                }
            }else{
                $this->error($Goods->getError());
            }
        }else{
            /* 获取数据 */
            $data = $Goods->field(true)->find($id);
            if(false === $data){
                $this->error('获取数据错误');
            }else{
                $this->assign('data', $data);
            }
            
            $this->cat_id = $data['cat_id'];
            $this->sub_id = $data['sub_id'];
            //商品相册
            $this->pictures = $Goodspic->where(array("gid"=>$id))->find();
            //dump($this->pictures);exit;
            $gid = $data['id'];
			//专家点评
			$this->experts = $Comment
                            ->table("win_goods_expert_comment a")
					        ->field("b.id as eid,b.picture,b.name,a.*")
				            ->join("win_expert as b on a.eid=b.id")
				            ->where(array("a.gid"=>$gid))
				            ->order("a.sort")
				            ->select();

            
            $this->cats = $Category->select();//商品分类
            $this->subs = $Subject->select();//商品题材
            $artist_id=$data['artist_id'];//当前艺术家
            if($artist_id>=1){
            	$this->artist = M("artist")->where(array("id"=>$artist_id))->find();
            }
            $this->meta_title = "商品修改";
            $this->display("goods");
        }
    }
    


  
    
    /**
     * 删除商品（一个）
     * @author xuxiaowen
     */
    public function goodsDeleteOne(){
        $id=I("get.id");
        if($id && is_numeric($id)){
        	//判断有没有抢购商品
        	$list=M("activity_rush")->where(array("gid"=>$id))->select();
        	if(!empty($list)){
        		$this->error("该商品有关联的抢购商品，无法删除！");
        		exit;
        	}
        	
        	//判断是否有订单
        	$goods=M("order_goods")->where("gid=$id")->select();
        	if(!empty($goods)){
        		$this->error("该商品有订单，无法删除！");
        		exit;
        	}
        	
            $where['id']=$id;
            $re=M("goods")->where($where)->delete();
            if($re>0){
            	//删除商品图片集
            	$where2['gid']=$id;
            	M("goods_picture")->where($where2)->delete();
            	 
            	//删除商品属性
            	M("single_goods_attribute")->where($where2)->delete();
            	
                $this->success("删除成功");
            }else{
                $this->error("删除失败");
            }
        }else{
            $this->error("参数错误");
        }
    
    }
    
    /**
     * 商品操作（禁用、启用、删除）
     * @author      xuxiaowen
     */
    public function goodsHandle(){
        $handle=I("post.handle");
        $ids=I("post.check");
        $Goods=M("goods");
        if(empty($ids)){
            $this->error("请选择要操作的数据");
        }else{
            $ids=implode(",", $ids);
            $where['id']=array("in",$ids);
            switch ($handle){
                case 1:
                    $this->changeStatusMore("1",$where,"goods");
                    break;
                case 0:
                    $this->changeStatusMore("0",$where,"goods");
                    break;
                case 2:
                	$Goods=M("goods");
                	$goodsids=explode(",", $ids);
                    //删除商品
                    $Rush=M("activity_rush");
                    foreach ($goodsids as $k=>$v){
                    	$gid=$v;
                    	$where2['id']=$gid;
                    	$list=$Rush->where(array("gid"=>$gid))->select();//判断有没有抢购商品
                    	//判断是否有订单
                    	$goods=M("order_goods")->where("gid=$gid")->select();
                    	if(empty($list) && empty($goods)){
                    		$re=$Goods->where($where2)->delete();
                    		if($re){
                    			//删除商品图片集
                    			$where3['gid']=$gid;
                    			M("goods_picture")->where($where3)->delete();
                    			 
                    			//删除商品属性
                    			M("single_goods_attribute")->where($where3)->delete();
                    		}
                    	}
                    }
                    $this->success("删除成功");
                    break;
                case 3:
                    $res = $Goods->where(array('id'=>array('in',$ids)))->save(array('is_discount'=>1));
                    if(null!==$res){
                        $this->success("打折成功！");
                    }else{
                        $this->error("打折失败！");
                    }
                    break;
                case 4:
                    $res = $Goods->where(array('id'=>array('in',$ids)))->save(array('is_discount'=>0,'discount_price'=>0));
                    if(null!==$res){
                        $this->success("取消成功！");
                    }else{
                        $this->error("取消失败！");
                    }
                    break;

                case 5:
                    $res = $Goods->where(array('status'=>1))->save(array('is_discount'=>1));
                    if(null!==$res){
                        $this->success("打折成功！");
                    }else{
                        $this->error("打折失败！");
                    }
                    break;
                case 6:
                    $res = $Goods->where(array('status'=>1))->save(array('is_discount'=>0,'discount_price'=>0));
                    if(null!==$res){
                        $this->success("取消成功！");
                    }else{
                        $this->error("取消失败！");
                    }
                    break;
                default:
                    $this->error("参数错误");
                    break;
            }
        }
    }
    /********************************商品结束*********************************************************/
    
    
    
    
    
    
    
    
    
    
    
    /********************************商品评论开始*********************************************************/
    
    /**
     * 商品评论
     * @author xuxiaowen
     */
    public function goodsComment(){
    	$keyword=I("keyword");
    	if($keyword){
    		$where['a.content|b.username|c.name']=array("like","%$keyword%");
    		$this->keyword=$keyword;
    	}
    	
    	//商品id
    	$gid=I("gid");
    	if($gid){
    		$where['a.gid']=$gid;
    	}
    	
    	
    	
    	$Comment=M("goods_comment");
    	$count = $Comment
				    	 ->table("win_goods_comment a")
				    	 ->join("win_user as b on a.user_id=b.user_id")
				    	 ->join("win_goods as c on a.gid=c.id")
				    	 ->where($where)
				    	 ->count();// 查询满足要求的总记录数
    	
    	$num = C('HOME_ROW_NUM') > 0 ? C('HOME_ROW_NUM') : 10;
    	
    	$Page=new \Think\Page($count,$num);// 实例化分页类 传入总记录数和每页显示的记录数(25)
    	$show=$Page->show();// 分页显示输出
    	
    	$list=$Comment
			    	  ->table("win_goods_comment a")
			    	  ->field("a.id,a.user_id,a.score,a.content,a.add_time,b.username,c.name,c.id as gid")
			    	  ->join("win_user as b on a.user_id=b.user_id")
					  ->join("win_goods as c on a.gid=c.id")
			    	  ->where($where)
			    	  ->order("a.add_time")
			    	  ->limit($Page->firstRow.','.$Page->listRows)
			    	  ->select();
    	
    	$this->assign('list',$list); // 赋值数据集
        $this->assign('page',$show); // 赋值分页输出
    	
    	
    	$this->meta_title="商品评论";
    	$this->display();
    }

    /**
     * 商品留言
     * @author xuxiaowen
     */
    // public function goodsWords(){
    //     $keyword=I("keyword");
    //     if($keyword){
    //         $where['a.content|b.username|c.name']=array("like","%$keyword%");
    //         $this->keyword=$keyword;
    //     }
        
    //     //商品id
    //     $gid=I("gid");
    //     if($gid){
    //         $where['a.gid']=$gid;
    //     }
        
        
        
    //     $GoodsWords=M("goods_words");
    //     $count = $GoodsWords
    //                      ->table("win_goods_words a")
    //                      ->join("win_goods as c on a.gid=c.id")
    //                      ->where($where)
    //                      ->count();// 查询满足要求的总记录数
        
    //     $num = C('HOME_ROW_NUM') > 0 ? C('HOME_ROW_NUM') : 10;
        
    //     $Page=new \Think\Page($count,$num);// 实例化分页类 传入总记录数和每页显示的记录数(25)
    //     $show=$Page->show();// 分页显示输出
        
    //     $list=$Comment
    //                   ->table("win_goods_words a")
    //                   ->field("a.id,a.user_id,a.score,a.content,a.status,a.add_time,c.name,c.id as gid")
    //                   ->join("win_goods as c on a.gid=c.id")
    //                   ->where($where)
    //                   ->order("a.add_time")
    //                   ->limit($Page->firstRow.','.$Page->listRows)
    //                   ->select();
        
    //     $this->assign('list',$list); // 赋值数据集
    //     $this->assign('page',$show); // 赋值分页输出
        
        
    //     $this->meta_title="商品评论";
    //     $this->display();
    // }
    
    
    /**
     * 商品评价详情
     * @author xuxiaowen
     */
    public function commentInfo(){
    	$id=I("id");
    	$order_id=I("order_id");
    	$gid=I("gid");
    	if($id){
    		$where['a.id']=$id;
    	}
    	
    	if($order_id){
    		$where['a.order_id']=$order_id;
    	}
    	
    	if($gid){
    		$where['a.gid']=$gid;
    	}
    	
    	
    	$Comment=M("comment");
    	$data=$Comment
				      ->table("win_comment a")
				      ->field("a.id,a.user_id,a.score,a.content,a.status,a.add_time,b.username,c.name,c.id as gid,c.picture")
				      ->join("win_user as b on a.user_id=b.user_id")
				      ->join("win_goods as c on a.gid=c.id")
				      ->where($where)
				      ->find();
    	$this->data=$data;
    	$this->meta_title="商品评论详情";
    	$this->display();
    }
    
    
    /**
     * 删除商品评论（一条）
     * @author xuxiaowen
     */ 
    public function deleteCommentOne(){
    	$id=I("id");
    	$Comment=M("comment");
    	$re=$Comment->where(array("id"=>$id))->delete();
    	if($re){
    		echo "success";
    	}else{
    		echo "删除失败！";
    	}
    }
    //商品留言
    public function goodsWords(){
        
        //商品id
        $gid=I("gid");
        if($gid){
            $where['a.goods_id']=$gid;
        }
        
        
        
        $Words = M("goods_words");
        $count = $Words->count();
                         // ->table("win_comment a")
                         // ->join("win_user as b on a.user_id=b.user_id")
                         // ->join("win_goods as c on a.gid=c.id")
                         // ->where($where)
                         // ->count();// 查询满足要求的总记录数
        
        // $num = C('HOME_ROW_NUM') > 0 ? C('HOME_ROW_NUM') : 10;
        $num = 10;
        $Page=new \Think\Page($count,$num);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show=$Page->show();// 分页显示输出
        
        $list = $Words
                    ->table('win_goods_words a')
                    ->field('a.*,b.name,c.username')
                    ->join('win_goods b on a.goods_id=b.id')
                    ->join('win_user c on c.user_id=a.user_id')
                    ->limit($Page->firstRow.','.$Page->listRows)
                    ->order('a.add_time desc')
                    ->select();

                      // ->table("win_comment a")
                      // ->field("a.id,a.user_id,a.score,a.content,a.status,a.add_time,b.username,c.name,c.id as gid")
                      // ->join("win_user as b on a.user_id=b.user_id")
                      // ->join("win_goods as c on a.gid=c.id")
                      // ->where($where)
                      // ->order("a.add_time")
                      // ->limit($Page->firstRow.','.$Page->listRows)
                      // ->select();
        //dump($list);exit;
        $this->assign('list',$list); // 赋值数据集
        $this->assign('page',$show); // 赋值分页输出
        
        
        $this->meta_title="商品留言";
        $this->display();
    }

    //商品留言详情
    public function wordsInfo(){
        $id=I("id");
        //$gid=I("gid");
        // if($id){
        //     $where['a.id']=$id;
        // }
        
        // if($order_id){
        //     $where['a.order_id']=$order_id;
        // }
        
        // if($gid){
        //     $where['a.gid']=$gid;
        // }
        
        
        $Words = M("goods_words");
        $data = $Words
                      ->table("win_goods_words a")
                      ->field("a.*,b.username,c.name,c.thumb")
                      ->join("win_user as b on a.user_id=b.user_id")
                      ->join("win_goods as c on a.goods_id=c.id")
                      ->where(array('a.id'=>$id))
                      ->find();
        $this->data=$data;
        $this->meta_title="商品评论详情";
        $this->display();
    }

    public function revert(){
        $words_id = I("post.words_id");
        $revert = I("post.revert");
        $info = M('goods_words')->field('revert')->where(array('id'=>$words_id))->find();
        if(!empty($info['revert'])){
            echo "该留言已经有回复内容";exit;
        }
        if($revert==''){
            echo '回复内容不能为空';
        }
        $res = M('goods_words')->where(array('id'=>$words_id))->save(array('revert'=>$revert,'revert_time'=>time()));
        if($res){
            echo 'success';
        }
    }
    
    
    /**
     * 评论操作(启用、禁用、删除)
     * @author xuxiaowen
     */
    /**
     * 广告操作（禁用、启用、删除）
     * @author      xuxiaowen
     */
    public function commentHandle(){
    	$handle=I("post.handle");
    	$ids=I("post.check");
    	if(empty($ids)){
    		$this->error("请选择要操作的数据");
    	}else{
    		$ids=implode(",", $ids);
    		$where['id']=array("in",$ids);
    		switch ($handle){
    			case 1:
    				$this->changeStatusMore("1",$where,"comment");
    				break;
    			case 0:
    				$this->changeStatusMore("0",$where,"comment");
    				break;
    			case 2:
    				//删除图片
    				$re=M("comment")->where($where)->delete();
    				if($re){
    					$this->success("删除成功");
    				}else{
    					$this->error("删除失败");
    				}
    				break;
    			default:
    				$this->error("参数错误");
    				break;
    		}
    	}
    }
    
    
    
    /********************************商品评论结束*********************************************************/
    
    //商品相册
    public function changePicSort(){
        // $gid = I('get.gid');
        // $GoodsPic = M('goods_picture');
        // $list = M('goods')->field('id,name')->where(array('id'=>$gid))->find();

        // $pics = $GoodsPic->where(array('gid'=>$gid))->select();
        // $list['picture'] = $pics;var_dump($list);exit;
        // $this->display('goodspics');
        
        $gid = I('get.gid');
        //$pic_id = I('get.pic_id');
       //$this->goods = M('goods')->field('id,name')->where(array('id'=>$gid))->find();
        $this->pics = M('goods_picture')->where(array('gid'=>$gid))->find();
        //dump($this->pics);exit;
        // if($pic_id){
        //     echo 123;
        // }
        $this->display('goodspics');

    }

    /**
     * 修改商品销售状态（ajax）
     * @author xuxiaowen
     */
    public function updateSell(){
        $id=I("post.id");//商品id
        $stock=I("post.is_sell");//库存
        
        $re=M("goods")->where(array("id"=>$id,'is_sell'=>0))->save(array("is_sell"=>1));
        if($re){
            echo "success";
        }else{
            echo "修改失败！";
        }
    }
    //测试~~~
    public function test(){

        $list = M('goods')->field('id,thumb,thumb_w,thumb_h')->select();
        foreach($list as $key=>$val){
            $size[] = getimagesize('.'.$val['thumb']);
            $res = M('goods')->where(array('id'=>$val['id']))->save(array('thumb_w'=>$size[$key][0],'thumb_h'=>$size[$key][1]));
        }
        // $sql = "select id,name,thumb from win_goods order by id ";
        // $res = M('goods')->query($sql);
        // $arr = array();
        // foreach($res as $key=>$val){
        //     $size = getimagesize('.'.$val['thumb']);//dump($size);exit;
        //     if($size[0]!=800 && $size[0]!=799){
        //         $arr[] = $val['id'];
        //     }
        // }
        // $arr = implode(',',$arr);
        // dump($arr);
    }



    /**
     * 折扣商品列表
     * @author xuxiaowen
     */
    public function disGoodsList(){
        $action=I("get.action");
        if($action=="list"){
            $meta_title="菜单列表";
            $btn="btn-primary";
            $order = 'a.add_time desc';
        }else if($action=="sort"){
            $meta_title="菜单排序";
            $btn="btn-success";
            $order = 'a.is_new desc,a.is_best desc,a.sort asc,a.add_time desc';
        }else{
            $this->error('参数错误');exit;
        }

        $this->action=$action;
        $this->btn=$btn;
        //选择
        $this->types=I("get.types");
        
        $keyword=I("get.keyword");//关键字
        if(!empty($keyword)){
            //$where['name|description|detail|price']=array("like","%$keyword%");
            $where['a.name']=array("like","%$keyword%");
            $this->keyword=$keyword;
        }
        
        $start_time=I("get.start_time");//添加开始日期
        $end_time=I("get.end_time");//添加结束日期
        if(!empty($start_time) & !empty($end_time)){
            $start_time=strtotime($start_time." 00:00:00");
            $end_time=strtotime($end_time." 23:59:59");
            $where['a.add_time']=array(array("EGT",$start_time),array("ELT",$end_time));
        }
        
        $where['a.is_discount'] = 1;
        $where['a.is_enquiry'] = 0;
        $status=I("get.status");//上下架状态
        if($status=="0" || $status=="1"){
            $where['a.status']=$status;
            $this->status=$status;
        }

        //是否精品
        $is_best=I("get.is_best");
        if($is_best=="0" || $is_best=="1"){
            $where['a.is_best']=$is_best;
            $this->is_best=$is_best;
        }

       
        //是否已售
        $is_sell=I("get.is_sell");
        if($is_sell=="0" || $is_sell=="1"){
            $where['a.is_sell']=$is_sell;
            $this->is_sell=$is_sell;
        }

        $artist = M('artist')->field('id,name')->select();
        $cats = M('goods_category')->field('id,name')->select();
        $subs = M('goods_subject')->field('id,name')->select();

        $this->artist = $artist;
        $this->cats = $cats;
        $this->subs = $subs;

        //作者
        $artist_id = I("get.artist_id");
        if($artist_id>0){
            $where['a.artist_id'] = $artist_id;
            $this->artist_id = $artist_id;
        }

        //分类
        $cat_id = I("get.cat_id");
        if($cat_id>0){
            $where['a.cat_id'] = $cat_id;
            $this->cat_id = $cat_id;
        }

        //题材
        $sub_id = I("get.sub_id");
        if($sub_id>0){
            $where['a.sub_id'] = $sub_id;
            $this->sub_id = $sub_id;
        }

        //新品
        $is_new=I("get.is_new");
        if($is_new=="0" || $is_new=="1"){
            $where['a.is_new']=$is_new;
            $this->is_new=$is_new;
        }

        //活动
        $is_activity=I("get.is_activity");
        if($is_activity=="0" || $is_activity=="1"){
            $where['a.is_activity']=$is_activity;
            $this->is_activity=$is_activity;
        }
        
        
        $meta_title="商品列表";
        $p = NULL == I('get.p') ? 1 : I('get.p');
        
        //$this->lists("goods",$where,"add_time desc","","*");//echo M('goods')->getLastSql();exit;
        $count = M('goods')->table('win_goods a')
                ->field('a.*,b.name as artist_name,c.name as cat_name,d.name as sub_name')
                ->join('win_artist as b on a.artist_id=b.id')
                ->join('win_goods_category as c on a.cat_id=c.id')
                ->join('win_goods_subject as d on a.sub_id=d.id')
                ->where($where)
                ->count();// 查询满足要求的总记录数
        $num = 20;
        $Page=new \Think\Page($count,$num);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        
        $show=$Page->show();// 分页显示输出
        // dump($show);exit;
        $list = M('goods')->table('win_goods a')
                ->field('a.*,b.name as artist_name,c.name as cat_name,d.name as sub_name')
                ->join('win_artist as b on a.artist_id=b.id')
                ->join('win_goods_category as c on a.cat_id=c.id')
                ->join('win_goods_subject as d on a.sub_id=d.id')
                ->where($where)
                ->limit(($p-1)*$num,$num)
                //->limit($Page->firstRow.','.$Page->listRows)
                ->order($order)
                ->select();

        $gids = M('goods')->table('win_goods a')
                ->field('a.id')
                ->join('win_artist as b on a.artist_id=b.id')
                ->join('win_goods_category as c on a.cat_id=c.id')
                ->join('win_goods_subject as d on a.sub_id=d.id')
                ->where($where)
                ->select();
        $gids = arr2str($gids);
        $this->assign('p',$p);
        $this->assign('count',$count);// 总数
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('gids',$gids);
        
        $this->meta_title=$meta_title;
        $this->display();
    }


    /**
     * 商品打折
     */
    public function goodsDiscount(){
        $Goods = M('goods');
        $handle=I("post.handle");
        $gids = I("post.gids");
        
        $ids=I("post.check");
        if(empty($ids)){
            $this->error("请选择要操作的数据");
        }

        $ids=implode(",", $ids);
        $where['id']=array("in",$ids);
        $data = $Goods->field('id,price,discount_price')->where($where)->select();
        foreach($data as $key=>$val){
            $res = $Goods->where(array('id'=>$val['id']))->save(array('discount_price'=>round($val['price']*$handle/10,2)));
        }
        
        if($res!==null){
            $this->success("修改成功");
        }else{
            $this->success("修改失败");
        }
        
    }

    //修改折扣价
    public function changeGoodsDisprice(){
        $id=I("post.id");
        $discount_price=I("post.dis_price");//要修改的价格
        $Goods=M("goods");
        $data=$Goods->where(array('id'=>$id))->find();
        if(!$data){
            echo "不存在此商品";
        }
        if($discount_price <= 0 || !is_numeric($discount_price)){
            echo "价格数据错误";
        }

        $res = $Goods->where(array("id"=>$id))->save(array("discount_price"=>$discount_price));
        if($res){
            echo "success";
        }else{
            echo "修改失败！";
        }
    }




    public function fullCourt(){
        $gids = I('gids');
        $res = M('goods')->where(array('id'=>array('in',($gids))))->save(array('is_discount'=>1));
        if(null!==$res){
            echo 'success';
        }else{
            echo 'error';
        }
    }

    public function cancelFullCourt(){
        $gids = I('gids');
        $res = M('goods')->where(array('id'=>array('in',($gids))))->save(array('is_discount'=>0,'discount_price'=>0));
        if(null!==$res){
            echo 'success';
        }else{
            echo 'error';
        }
    }

    public function setDiscountrate(){
        $gids = I('gids');
        $rate = I('rate');
        $Goods = M('goods');
        if(empty($gids)){
            $this->error("请选择要操作的数据");
        }

        $ids=implode(",", $gids);
        $where['id']=array("in",$gids);
        $data = $Goods->field('id,price,discount_price')->where($where)->select();
        foreach($data as $key=>$val){
            $res = $Goods->where(array('id'=>$val['id']))->save(array('discount_price'=>round($val['price']*$rate/10,2)));
        }
        
        if(null!==$res){
            echo 'success';
        }else{
            echo 'error';
        }

    }




    public function goodsSellList(){
        //是否已售
        $is_sell=I("get.is_sell");
        if($is_sell=="0" || $is_sell=="1"){
            $where['is_sell']=$is_sell;
            $this->is_sell=$is_sell;
        }
        
        $meta_title="商品列表";
        $p = NULL == I('get.p') ? 1 : I('get.p');
        
        //$this->lists("goods",$where,"add_time desc","","*");//echo M('goods')->getLastSql();exit;
        $count = M('goods')->where($where)->count();// 查询满足要求的总记录数
        $num = 20;
        $Page=new \Think\Page($count,$num);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        
        $show=$Page->show();// 分页显示输出
        // dump($show);exit;
        $list = M('goods')->table('win_goods a')
                ->field('a.id,a.name as goods_name,b.name as artist_name,a.is_sell')
                ->join('win_artist as b on a.artist_id=b.id')
                ->where($where)
                ->limit(($p-1)*$num,$num)
                ->order($order)
                ->select();
        
        $this->assign('p',$p);
        $this->assign('count',$count);// 总数
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        //$this->assign('gids',$gids);
        
        $this->meta_title=$meta_title;
        $this->display('goods_sell');
    }

    public function goodsSellExport(){
        $is_sell=I("get.is_sell");
        if($is_sell=="0" || $is_sell=="1"){
            $where['a.is_sell']=$is_sell;
            $this->is_sell=$is_sell;
        }
        $Model=M("goods");

        $goods=$Model
        ->table("win_goods a")
        ->field("a.id,a.name as goods_name,b.name as artist_name,a.is_sell,a.certificate")
        ->join("win_artist as b on b.id=a.artist_id")
        ->where($where)
        ->order("a.artist_id asc")
        ->select();

        
        //dump($goods);exit;
        $data = array();
        foreach ($goods as $k=>$v){
            $data[$k][goods_name] = $v['goods_name'];
            $data[$k][artist_name] = $v['artist_name'];
            if($v['certificate']){
                $data[$k][certificate] = 'www.tao-yibao.com' . $v['certificate'];
            }else{
                $data[$k][certificate] = '';
            }
            
            

            $is_sell = $v[is_sell];
            switch ($is_sell) {
                case "0":
                    $is_sell = "未售";
                    break;
                case "1":
                    $is_sell = "已售";
                    break;
                default:
                    $is_sell = "";
                    break;
            }

            $data[$k][is_sell] = $is_sell;
            
        }
    
        foreach ($data as $k=>$v){
            if($k == 'goods_name'){
                $headArr[]='商品名称';
            }
            if($k == 'artist_name'){
                $headArr[]='作家';
            }
            
            if($k == 'certificate'){
                $headArr[]='画籍证书';
            }
            if($k == 'is_sell'){
                $headArr[]='销售状态';
            }

        }
    
        $filename="商品销售状态.xls";
        
        
        $arr=array(
                array("letter"=>"A","width"=>30),//编号
                array("letter"=>"B"),//订单ID
                array("letter"=>"C","width"=>90),//订单号
                array("letter"=>"D"),//订单号
                );
        
        
        //$arr=array("A"=>10,"B"=>20,"C"=>15,"D"=>10,"E"=>20,"F"=>20,"G"=>50,"H"=>50,"I"=>20,"J"=>30,"K"=>30);//列数宽度
        getExcel($filename,$headArr,$data,$arr);
    }

    
}//类的结束