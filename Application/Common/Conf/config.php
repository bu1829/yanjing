<?php
return array(
	//'配置项'=>'配置值'
	
	'APP_SITE'              => 		'http://www.tao-yibao.cn',//APP端地址
	'WEB_SITE'              => 		'http://www.taoyib.com',  //WEB端地址

    /*数据库设置 */
    'DB_TYPE'               =>      'mysql',             // 数据库类型
    'DB_HOST'               =>      '127.0.0.1',         // 服务器地址
    'DB_NAME'               =>      'glasses',         // 数据库名
    'DB_USER'               =>      'root',          // 用户名
    'DB_PWD'                =>      'root', // 密码
    'DB_PORT'               =>      '3306',              // 端口
    'DB_PREFIX'             =>      'gls_',              // 数据库表前缀

    /*邮件设置 */
    'MAIL_HOST'   			=>		'smtp.exmail.qq.com',   //smtp服务器的名称
    'MAIL_SMTPAUTH' 		=>		TRUE,     			    //启用smtp认证
    'MAIL_USERNAME' 		=>		'xuxiaowen@tao-yibao.com',//你的邮箱名
    'MAIL_FROM' 			=>		'xuxiaowen@tao-yibao.com',//发件人地址
    'MAIL_FROMNAME'			=>		'淘艺宝',				//发件人姓名
    'MAIL_PASSWORD' 		=>		'Ai5278071',			//邮箱密码
    'MAIL_CHARSET' 			=>		'utf-8',				//设置邮件编码
    'MAIL_ISHTML' 			=>		TRUE, 					// 是否HTML格式邮件
 
    'DEFAULT_FILTER'        =>  	'', // 默认参数过滤方法 用于I函数...不过滤

    'PUSH_APNS_PRODUCTION'  =>      array('apns_production'=>true),


    /*银联手机控件支付*/
    'APP_MER_ID'            =>      '777290058110048',//测试环境
    //'APP_MER_ID'            =>      '898111959710121',//生产环境

    /*银联网关支付*/
    'PC_MER_ID'             =>      '777290058110048',//测试环境
    //'PC_MER_ID'             =>      '898111959710121',//生产环境
);