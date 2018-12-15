<?php
namespace Admin\Model;
use Think\Model;

/**
 * 菜单模型
 * @author xuxiaowen
 */

class MenuModel extends Model {

	protected $_validate = array(
			array('title','require','菜单名称必须填写',1),
			array('title','1,100','菜单名称100字符以内',self::MUST_VALIDATE,"length"),
			array('title','','菜单名称已经存在',self::MUST_VALIDATE,"unique"),
			array('sort','number','排序只能为数字',self::MUST_VALIDATE),
			array('status','0,1','显示状态选择错误',self::MUST_VALIDATE,"in"),
	);

}