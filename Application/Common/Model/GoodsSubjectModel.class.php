<?php
namespace Common\Model;
use Think\Model;
/**
 * 商品题材模型
 */
class GoodsSubjectModel extends Model{
	/**
	 * 题材自动验证
	 */
	protected $_validate=array(
		array('name','2,100','题材名称必须是4-100个字符',1,'length')
	);
}