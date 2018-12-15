<?php
namespace Common\Model;
use Think\Model;
/**
 * 商品留言模型
 */
class GoodsWordsModel extends Model{
	//留言自动验证
	protected $_validate = array(
		array('words','1,5','留言字数不能超过5个字',1,'length')
		);
}