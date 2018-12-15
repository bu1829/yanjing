<?php
namespace Common\Model;
use Think\Model;
/**
 * 抢购模型
 */
class ActivityRushModel extends BaseModel{
	/**
     * 首页限时抢购列表
     */
    public function rushBuyList(){
    	$Rush = D("ActivityRush");
    	$where['a.status']=1;
    	//$where['a.rush_num']=array("EGT",1);
    	//$where['a.start_time']=array("ELT",time());
    	//$where['a.end_time']=array("EGT",time());
    	$where['b.status']=1;
    	/* $where['b.stock']=array("EGT",1); */
    	$list=$Rush->cache(true,HCT)
    			   ->table("win_activity_rush a")
    			   ->field("a.id,picture,b.price,a.rush_price,a.start_time")
    			   ->join("win_goods as b on a.gid=b.id")
    			   ->where($where)
    			   ->order("a.sort")
				   ->limit("0,6")    	
				   ->select();
    	return $list;
    }
}