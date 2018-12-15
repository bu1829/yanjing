<?php
namespace Common\Model;
use Think\Model;
/**
 * 商品分类模型
 */
class GoodsCategoryModel extends Model{
	/**
	 * 分类自动验证
	 */
	protected $_validate=array(
		array('name','2,100','分类名称必须是4-100个字符',1,'length'),
		// array("sort","number","排序，必须为整数",1),
		// array("water","0,1,2,3","水印参数错误",2,"in"),
		// array("status","0,1","显示状态参数错误",1,"in"),
	);
}