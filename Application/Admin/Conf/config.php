<?php
return array(
    /* 模板相关配置 */
    'TMPL_PARSE_STRING' 	=>       array(
    	'__IMAGES__'    	=>       __ROOT__ . '/Public/' . MODULE_NAME . '/images',
        '__IMG__'       	=>       __ROOT__ . '/Public/' . MODULE_NAME . '/img',
        '__CSS__'       	=>       __ROOT__ . '/Public/' . MODULE_NAME . '/css',
        '__JS__'        	=>       __ROOT__ . '/Public/' . MODULE_NAME . '/js',
        '__CIMAGES__'   	=>       __ROOT__ . '/Public/Common/images',
        '__CCSS__'      	=>       __ROOT__ . '/Public/Common/css',
        '__CJS__'       	=>       __ROOT__ . '/Public/Common/js',
    ),

	//权限设置
	'AUTH_CONFIG'       	=>       array(
		'AUTH_ON'       	=>       true, // 认证开关
		'AUTH_TYPE'     	=>       1, // 认证方式，1为实时认证；2为登录认证。
		'AUTH_GROUP'    	=>       'win_auth_group', // 用户组数据表名
		'AUTH_GROUP_ACCESS' =>   	 'win_auth_group_access', // 用户-用户组关系表
		'AUTH_RULE'     	=>       'win_auth_rule', // 权限规则表
		'AUTH_USER'     	=>       'win_admin', // 用户信息表
		'AUTH_SUPERADMIN'	=>       array('1','16'),//超级管理员
		'NOT_AUTH_MODULE'	=>       'Public,Avatar',//无需认证模块
		'NOT_AUTH_ACTION'	=>       'avatar,icon,checkPassword,upload,checkCode,sendCode,checkUnbundlingCode,sendUnbundlingCode,unbundlingEmail,changeStatusOne,checkOnly,deleteOldFileOne,changeSort,notfind,checkBusiness,getExcel,warn,checksizeprice,getMessageNum,search',//无需认证操作也就是方法
	),
	'SM_AUTH'               =>       array('1','16','17','18'),

    'LOGIN'              	=>       'winshop',//判断是否登录的
    'STATUS'             	=>       'status,recommend,show,state,expert,painting,is_new,is_hot,is_best,is_masteropus,is_enquiry,enquiring,is_top,is_discount,day_recommend,is_activity',//指定changeStatusOne要修改的字段

    'TMPL_ACTION_ERROR'     =>  'Public:jump', // 默认错误跳转对应的模板文件
    'TMPL_ACTION_SUCCESS'   =>  'Public:jump', // 默认成功跳转对应的模板文件
     
    'TMPL_L_DELIM'          =>        '<{',   //模板引擎普通标签开始标记
    'TMPL_R_DELIM'          =>        '}>',   //模板引擎普通标签结束标记
    
    //'TMPL_EXCEPTION_FILE'   =>  'Public:notfind', // 异常页面的模板文件

    //'配置项'=>'配置值'
	// RBAC认证配置信息
    /*
	'RBAC_SUPERADMIN'=>'admin',//超级管理员名称，对应user表中的一个
	'ADMIN_AUTH_KEY'=>'superadmin',//超级管理员识别
	'USER_AUTH_ON'=>true,//是否需要认证
	'USER_AUTH_TYPE'=>1,//认证类型 1为登录后才认证，2为实时认证
	'USER_AUTH_KEY'=>'user_id' ,//认证识别号,可以自己取名字,登录用户的id
	'LOGIN'=>'xuxiaowen',//判断是否登录的
	//'REQUIRE_AUTH_MODULE'=>  //需要认证模块
	'NOT_AUTH_MODULE'=>'Public,Avatar',//无需认证模块
    'NOT_AUTH_Action'=>'changeStatusOne,checkOnly,deleteOldFileOne,changeSort,notfind,checkBusiness,getExcel,warn,checksizeprice',//无需认证操作也就是方法
	//'USER_AUTH_GATEWAY'=>'' //认证网关,此处可以不用
	// 'RBAC_DB_DSN'=>'mysql://root:root@localhost:3306/jiajiayong'  数据库连接DSN,公用的，可以不用
	'RBAC_ROLE_TABLE'=>'win_role',// 角色表名称
	'RBAC_USER_TABLE'=>'win_role_user',//用户表名称
	'RBAC_ACCESS_TABLE'=>'win_access',//权限表名称
	'RBAC_NODE_TABLE'=>'win_node', //节点表名称
	*/
		
);
