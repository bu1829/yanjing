<?php
namespace Admin\Model;
use	Think\Model;
header("content-type:text/html;charset=utf-8");
/**
 * 配置模型
 * @author xuxiaowen
 *
 */
class ConfigModel extends  Model{
    //命名范围
    /* 	protected $_scope=array(
     "default"=>array(
     'where'=>array("id"=>1),
     ),
     "agreement"=>array(
     'field'=>"useragreement,businessagreement",
     ),
     "question"=>array(
     'field'=>"question",
     ),
     "aboutus"=>array(
     'field'=>"telphone,wechat,sina,website",
     ),
    ); */
    // 批量验证
    //protected $patchValidate=true;
    
    //验证配置的自动验证
    protected $_validate=array(
        array('name','1,30',"请输入配置标识,1-30位字符",self::MUST_VALIDATE,"length",self::MODEL_BOTH),
        array('name','',"请输入唯一的配置标识",self::MUST_VALIDATE,"unique",self::MODEL_BOTH),
        array('title','1,30',"请输入配置标题,1-30位字符",self::MUST_VALIDATE,"length",self::MODEL_BOTH),
        array('sort','number',"请输入数字",self::MUST_VALIDATE,self::MODEL_BOTH),
        array('sort','0,65535',"请输入0到65535的整数",self::MUST_VALIDATE,"between",self::MODEL_BOTH),
        array('types','0,1,2,3,4,5,6',"配置类型参数错误",self::MUST_VALIDATE,"in",self::MODEL_BOTH),
        array('status','0,1',"状态参数错误",self::MUST_VALIDATE,"in",self::MODEL_BOTH),
    );
    
    
    protected $_auto = array(
        array('name', 'strtoupper', self::MODEL_BOTH, 'function'),
        array('add_time', NOW_TIME, self::MODEL_INSERT),
        array('update_time', NOW_TIME, self::MODEL_BOTH),
    );
    
}