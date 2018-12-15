/* This file is created by MySQLReback 2018-12-15 22:00:36 */
/* 创建表结构 `gls_admin` */ 
DROP TABLE IF EXISTS `gls_admin`;/* MySQLReback Separation */ CREATE TABLE `gls_admin` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL COMMENT '用户名称',
  `password` varchar(100) NOT NULL COMMENT '管理员密码',
  `avatar` varchar(255) NOT NULL DEFAULT '' COMMENT '头像',
  `email` varchar(30) NOT NULL DEFAULT '' COMMENT '邮箱',
  `phone` varchar(30) NOT NULL DEFAULT '' COMMENT '手机',
  `reg_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '注册时间',
  `login` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '登录次数',
  `last_login_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `last_login_ip` varchar(100) NOT NULL DEFAULT '' COMMENT '最后登陆ip',
  `last_login_location` varchar(100) NOT NULL DEFAULT '' COMMENT '最后登录地址',
  `session_id` varchar(255) NOT NULL DEFAULT '' COMMENT '判断是否登录的session_id',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `reg_ip` varchar(100) NOT NULL COMMENT '注册ip',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`) USING BTREE,
  KEY `reg_time` (`reg_time`) USING BTREE,
  KEY `email` (`email`) USING BTREE,
  KEY `phone` (`phone`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;/* MySQLReback Separation */ 
/* 插入数据 `gls_admin` */ 
INSERT INTO `gls_admin` VALUES ('1','admin','9bb5a22fb53fc255d5d2d49f5095522a','','1369615591@qq.com','','1496744455','116','1521247027','127.0.0.1','--','5eikp2fv0qoedh49v1brtpoba1','1503397255','47.93.19.26');/* MySQLReback Separation *//* 创建表结构 `gls_lens` */ 
DROP TABLE IF EXISTS `gls_lens`;/* MySQLReback Separation */ CREATE TABLE `gls_lens` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `name` varchar(32) NOT NULL DEFAULT '' COMMENT '镜片名称',
  `category` varchar(32) NOT NULL DEFAULT '' COMMENT '镜片分类',
  `brand` varchar(32) NOT NULL DEFAULT '' COMMENT '镜片品牌',
  `degree` varchar(32) NOT NULL DEFAULT '' COMMENT '镜片度数',
  `material` varchar(32) NOT NULL DEFAULT '' COMMENT '镜片材质',
  `color` varchar(32) NOT NULL DEFAULT '' COMMENT '颜色',
  `lens_no` varchar(64) NOT NULL DEFAULT '' COMMENT '镜片编号',
  `inventory` int(10) NOT NULL DEFAULT '0' COMMENT '库存',
  `price` decimal(8,2) NOT NULL DEFAULT '0.00' COMMENT '镜片价格',
  `add_time` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `update_time` int(10) NOT NULL DEFAULT '0' COMMENT '修改时间',
  `is_del` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0未删除1删除',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1近用2远用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;/* MySQLReback Separation */ 
/* 创建表结构 `gls_menu` */ 
DROP TABLE IF EXISTS `gls_menu`;/* MySQLReback Separation */ CREATE TABLE `gls_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '标题',
  `icon` varchar(50) DEFAULT NULL COMMENT '图标',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上级ID',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '链接地址',
  `sort` int(10) unsigned NOT NULL DEFAULT '100' COMMENT '排序',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '状态',
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`) USING BTREE,
  KEY `pid` (`pid`) USING BTREE,
  KEY `status` (`status`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;/* MySQLReback Separation */ 
/* 插入数据 `gls_menu` */ 
INSERT INTO `gls_menu` VALUES ('1','配镜系统','','0','Lens','9','1'),('2','客户列表','','1','Lens/userList','100','1'),('4','新增配镜','','1','Lens/userLensAdd','0','1'),('5','数据备份','','1','Database/database','100','1');/* MySQLReback Separation *//* 创建表结构 `gls_table` */ 
DROP TABLE IF EXISTS `gls_table`;/* MySQLReback Separation */ CREATE TABLE `gls_table` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `name` varchar(30) NOT NULL COMMENT '数据表名',
  `size` varchar(255) NOT NULL DEFAULT '0' COMMENT '数据大小',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `optimize_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '优化时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;/* MySQLReback Separation */ 
/* 插入数据 `gls_table` */ 
INSERT INTO `gls_table` VALUES ('1','gls_admin','136B','2018-03-15 10:00:00','0'),('2','gls_lens','116B','2018-03-15 11:41:41','0'),('3','gls_table','0B','2018-03-16 09:49:52','0'),('4','gls_user','72B','2018-03-15 14:19:35','0'),('5','gls_user_lens','252B','2018-03-15 17:33:18','0');/* MySQLReback Separation *//* 创建表结构 `gls_user` */ 
DROP TABLE IF EXISTS `gls_user`;/* MySQLReback Separation */ CREATE TABLE `gls_user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '客户ID',
  `name` varchar(16) NOT NULL DEFAULT '' COMMENT '姓名',
  `age` tinyint(1) NOT NULL DEFAULT '0' COMMENT '年龄',
  `sex` varchar(3) NOT NULL DEFAULT '' COMMENT '性别',
  `mobile` char(11) NOT NULL DEFAULT '' COMMENT '手机号',
  `address` varchar(255) NOT NULL DEFAULT '' COMMENT '地址',
  `add_time` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `update` int(10) NOT NULL DEFAULT '-1' COMMENT '修改时间',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;/* MySQLReback Separation */ 
/* 插入数据 `gls_user` */ 
INSERT INTO `gls_user` VALUES ('1','步国栋','28','男','13716826781','北京市朝阳区','1544879377','-1'),('2','步李鑫','28','女','13716826781','北京市朝阳区','1544879817','-1');/* MySQLReback Separation *//* 创建表结构 `gls_user_lens` */ 
DROP TABLE IF EXISTS `gls_user_lens`;/* MySQLReback Separation */ CREATE TABLE `gls_user_lens` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `lens_id` varchar(255) NOT NULL DEFAULT '' COMMENT '镜片ID',
  `gls_frame` varchar(255) NOT NULL DEFAULT '' COMMENT '镜架',
  `lens` varchar(255) NOT NULL DEFAULT '' COMMENT '镜片',
  `pupil_hight` varchar(16) NOT NULL DEFAULT '' COMMENT '瞳高',
  `pupil_distance` varchar(16) NOT NULL DEFAULT '' COMMENT '瞳距',
  `total_price` decimal(8,2) NOT NULL DEFAULT '0.00' COMMENT '总金额',
  `gls_time` date NOT NULL DEFAULT '0000-00-00' COMMENT '配镜时间',
  `add_time` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `f_r_ballmirror` varchar(255) DEFAULT NULL COMMENT '远用-右-球镜',
  `f_r_columnmirror` varchar(255) DEFAULT NULL COMMENT '远用-右-柱镜',
  `f_r_shaftposition` varchar(255) DEFAULT NULL COMMENT '远用-右-轴位',
  `f_r_correcteyesight` varchar(255) DEFAULT NULL COMMENT '远用-右-矫正视力',
  `f_l_ballmirror` varchar(255) DEFAULT NULL COMMENT '远用-近-球镜',
  `f_l_columnmirror` varchar(255) DEFAULT NULL COMMENT '远用-近-柱镜',
  `f_l_shaftposition` varchar(255) DEFAULT NULL COMMENT '远用-近-轴位',
  `f_l_correcteyesight` varchar(255) DEFAULT NULL COMMENT '远用-近-矫正视力',
  `n_r_ballmirror` varchar(255) DEFAULT NULL COMMENT '近用-右-球镜',
  `n_r_columnmirror` varchar(255) DEFAULT NULL COMMENT '近用-右-柱镜',
  `n_r_shaftposition` varchar(255) DEFAULT NULL COMMENT '近用-右-轴位',
  `n_r_correcteyesight` varchar(255) DEFAULT NULL COMMENT '近用-右-矫正视力',
  `n_l_ballmirror` varchar(255) DEFAULT NULL COMMENT '近用-左-球镜',
  `n_l_columnmirror` varchar(255) DEFAULT NULL COMMENT '近用-左-柱镜',
  `n_l_shaftposition` varchar(255) DEFAULT NULL COMMENT '近用-左-轴位',
  `n_l_correcteyesight` varchar(255) DEFAULT NULL COMMENT '近用-左-矫正视力',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;/* MySQLReback Separation */ 
/* 插入数据 `gls_user_lens` */ 
INSERT INTO `gls_user_lens` VALUES ('1','1','','一个好的镜架','一个好的镜片','123','123','140.00','2018-12-07','1544879064','1','2','3','4','5','6','7','8','','','','','','','',''),('2','1','','','','123','123','110.00','2018-12-15','1544879591','1','2','3','4','5','6','7','8','','','','','','','',''),('3','2','','','','','','110.00','2018-12-14','1544879817','','','','','','','','','','','','','','','','');/* MySQLReback Separation */