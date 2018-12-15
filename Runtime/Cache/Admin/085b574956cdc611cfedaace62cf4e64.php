<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
       <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1,minimum-scale=1,user-scalable=no">
    <meta name="renderer" content="webkit">
    <title><?php echo ($meta_title); ?>|<?php echo ($CONFIG["WEB_SITE_TITLE"]); ?></title>
    <meta name="keywords" content="<?php echo ($CONFIG["WEB_SITE_KEYWORDS"]); ?>">
    <meta name="description" content="<?php echo ($CONFIG["WEB_SITE_DESCRIPTION"]); ?>">
    
<!-- css -->
    <!-- commcom css -->
    <link href="/Public/Common/css/bootstrap.min.css?v=3.4.0" rel="stylesheet">
    <link href="/Public/Admin/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="/Public/Common/js/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="/Public/Common/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">
    <link href="/Public/Admin/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
    <!-- /common css -->
    
    <!-- 阿里图标 -->
    <link href="/Public/Common/ali/jifen/iconfont.css" rel="stylesheet"><!-- 积分兑换-->
    <link href="/Public/Common/ali/yanzheng/iconfont.css" rel="stylesheet"><!-- 验证-->
    <!-- 阿里图标 -->
    
    
    <!-- normal css -->
    <link href="/Public/Admin/css/animate.css" rel="stylesheet">
    <link href="/Public/Admin/css/style.css?v=2.2.0" rel="stylesheet">
    <!-- /normal css -->
    
    <!-- 自己写的css -->
    <link href="/Public/Common/css/upload.css" rel="stylesheet"> 
    <!-- /自己写的css -->  
<!-- /css -->


<!-- js --> 
    <script src="/Public/Common/js/jquery-2.1.0.min.js"></script><!-- jquery -->
    
    <!-- 放在bootstrap前面            是因为 和boot 本身的 提示标签冲突 -->
    <!-- jQuery UI 拖拽 -->
    <link href="/Public/Common/js/jquery-ui-1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet">
    <script src="/Public/Common/js/jquery-ui-1.11.4/jquery-ui.min.js"></script>
    <!-- /放在bootstrap前面 -->
    
    
    <!-- common js -->
    <script src="/Public/Common/js/bootstrap.min.js?v=3.4.0"></script>
    <!-- /common js -->
    
    
    <!-- normal js -->
    <!-- <script src="/Public/Admin/js/hplus.js?v=2.2.0"></script> -->
    <!-- /normal js -->
 
    <!-- 自己写的js -->
    <script src="/Public/Common/js/common.js"></script><!-- 公共 -->
    <script src="/Public/Common/js/upload.js"></script><!-- 上传  -->
    <script src="/Public/Common/js/gettime.js"></script><!-- 获得时间 -->
    <!-- /自己写的js -->
    
<!-- /js -->      
    
<!-- common -->

    <!-- 加载更多 -->
    <!-- <script src='/Public/Common/js/jquery.more.js'></script> -->


    <!-- 图片覆盖层 -->
    <link href="/Public/Common/js/plugins/fancybox/jquery.fancybox.css" rel="stylesheet">
    <script src="/Public/Common/js/fancybox/jquery.fancybox.js"></script>
    
    
    <!-- 全选框 -->
    <link href="/Public/Common/js/plugins/iCheck/custom.css" rel="stylesheet">
    <script src="/Public/Common/js/plugins/iCheck/icheck.min.js"></script>
    
    
    <!-- 验证-->
    <script src="/Public/Common/js/plugins/validate/jquery.validate.min.js"></script>
    <script src="/Public/Common/js/plugins/validate/additional-methods.js"></script>

    
    <!-- 提醒通知 -->
    <script src="/Public/Common/js/plugins/toastr/toastr.min.js"></script>
    <link href="/Public/Common/js/plugins/toastr/toastr.min.css" rel="stylesheet">
    
    
    <!-- 删除的 -->
    <script src="/Public/Common/js/plugins/layer/layers.js" type="text/javascript"></script>
    <script src="/Public/Common/js/popup/popup.js"></script>
    
    
    <!--  验证密码强度的css-->
    <link href="/Public/Common/js/plugins/password/password.css" rel="stylesheet">
    <script src="/Public/Common/js/plugins/password/password.js"></script>
    
    
    <!-- 颜色选择器 -->
    <link rel="stylesheet" type="text/css" href="/Public/Common/js/color/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Common/js/color/css/colpick.css"/>
    <script src="/Public/Common/js/color/js/colpick.js" type="text/javascript"></script>
    
    
    <!-- <script src="/Public/Common/js/plugins/pace/pace.min.js"></script> -->
    
    
    
    
    <!-- Flot -->
    <script src="/Public/Common/js/plugins/flot/jquery.flot.js"></script>
    <script src="/Public/Common/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="/Public/Common/js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="/Public/Common/js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="/Public/Common/js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="/Public/Common/js/plugins/flot/jquery.flot.symbol.js"></script>
    
    
    <!-- Peity -->
    <script src="/Public/Common/js/plugins/peity/jquery.peity.min.js"></script>
    <script src="/Public/Common/js/demo/peity-demo.js"></script>
    
    
    <!-- Jvectormap -->
    <script src="/Public/Common/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="/Public/Common/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    
    
    <!-- EayPIE -->
    <script src="/Public/Common/js/plugins/easypiechart/jquery.easypiechart.js"></script>
    
    
    <!-- Sparkline -->
    <script src="/Public/Common/js/plugins/sparkline/jquery.sparkline.min.js"></script>
    
    
    <!-- Sparkline demo data  -->
    <script src="/Public/Common/js/demo/sparkline-demo.js"></script>
    
    <!--时间插件 -->
    <script type="text/javascript" src="/Public/Common/js/plugins/laydate/laydate.js"></script>
    
    
    <script src="/Public/Common/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="/Public/Common/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="/Public/Admin/js/hplus.min.js"></script>
    <script type="text/javascript" src="/Public/Common/js/contabs.min.js"></script>
    
<!-- /common -->


<script>
/* 如果不通过验证 标题显示错误颜色 */
$.validator.setDefaults({
    highlight: function (element) {
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    },
    success: function (element) {
        element.closest('.form-group').removeClass('has-error').addClass('has-success');
    },
    errorElement: "span",
   /*  errorClass: "help-block m-b-none",
    validClass: "help-block m-b-none" */
});

$(document).ready(function () {
    
    //标签提示
    $("[data-toggle='tooltip']").tooltip();
    
    
    /* 全选  */
    $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
    });
    
    /* 图片点击 */
    $('.fancybox').fancybox({
        openEffect: 'none',
        closeEffect: 'none'
    });
    
});
</script>
   <style>
	.nav>li>a i {margin-right:0px;}
   </style>
</head>

<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
    <div id="wrapper">
        <!--左侧导航开始-->
        <nav class="navbar-default navbar-static-side" role="navigation">
<div class="nav-close"><i class="fa fa-times-circle"></i>
</div>
<div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                
                	<li class="nav-header">
                        <div class="dropdown profile-element">
                            <span>
                            <a class="fancybox avatar" title="<?php echo ($personal["username"]); ?>" href="<?php if($personal["avatar"] != null): ?><?php echo ($personal["avatar"]); else: ?><?php echo ($default_avatar); endif; ?>" title="">
                            <img alt="image"  class="img-circle menu_avatar" style="width:64px;height:64px;" src="<?php if($personal["avatar"] != null): ?><?php echo ($personal["avatar"]); else: ?><?php echo ($default_avatar); endif; ?>" />
                            </a>
                            </span>
                            <!-- <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear">
                               <span class="block m-t-xs"><strong class="font-bold"><?php echo ($personal["username"]); ?></strong></span>
                                <span class="text-muted text-xs block"><?php echo ($personal["title"]); ?><b class="caret"></b></span>
                                </span>
                            </a> -->
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <!-- <li class="J_tabShowActive">
		                          <a><i class="fa fa-user">&nbsp;</i><?php echo ($personal["username"]); ?></a>
		                        </li>
		                        <li class="divider"></li> -->
		                        <li class="J_tabCloseAll">
		                          <a class="J_menuItem" href="<?php echo U('Personal/avatar');?>"><i class="fa fa-photo">&nbsp;</i>头像修改</a>
		                        </li>
		                        <li class="J_tabCloseAll">
		                          <a class="J_menuItem" href="<?php echo U('Personal/password');?>"><i class="fa fa-key">&nbsp;</i>密码修改</a>
		                        </li>
		                        <li class="J_tabCloseAll">
		                          <a class="J_menuItem" href="<?php echo U('Personal/email');?>"><i class="fa fa-envelope-o">&nbsp;</i>邮箱修改</a>
		                        </li>
		                        <li class="divider"></li>
		                        <li class="J_tabCloseAll">
		                          <a  target="_blank" href="tencent://message/?uin=1002131415&Site=&menu=yes"><i class="fa fa-qq">&nbsp;</i>联系我们</a>
		                        </li>
		                        <li class="J_tabCloseAll">
		                          <a  onclick="del('<?php echo U('Public/out');?>','您确定退出系统么？','3','退出')"><i class="fa fa-sign-out"></i>&nbsp;退出系统</a>
		                        </li>
                            </ul>
                        </div>
                        <div class="logo-element">
                        	<span>
                        	<a class="fancybox avatar" title="<?php echo ($personal["username"]); ?>" href="<?php if($personal["avatar"] != null): ?><?php echo ($personal["avatar"]); else: ?><?php echo ($default_avatar); endif; ?>" title="">
                            <img alt="image"  class="img-circle menu_avatar" style="width:40px;height:40px;" src="<?php if($personal["avatar"] != null): ?><?php echo ($personal["avatar"]); else: ?><?php echo ($default_avatar); endif; ?>" />
                            </a>
                            </span>
                        </div>
                    </li>
                    <!-- <li class="nav-header">
                        <div class="dropdown profile-element">
                        	<span>
                        	<a class="fancybox avatar" title="<?php echo ($personal["username"]); ?>" href="<?php if($personal["avatar"] != null): ?><?php echo ($personal["avatar"]); else: ?><?php echo ($default_avatar); endif; ?>" title="">
                            <img alt="image"  class="img-circle menu_avatar" style="width:64px;height:64px;" src="<?php if($personal["avatar"] != null): ?><?php echo ($personal["avatar"]); else: ?><?php echo ($default_avatar); endif; ?>" />
                            </a>
                            </span>
                            <a href="javascript:">
                               <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo ($personal["username"]); ?></strong>
                               </span>  <span class="text-muted text-xs block"><?php echo ($personal["title"]); ?></span></span>
                            </a>
                        </div>
                        <div class="logo-element">
                        	<i class="fa fa-search" style="color:#999;"></i>
                        	<span>
                        	<a class="fancybox avatar" title="<?php echo ($personal["username"]); ?>" href="<?php if($personal["avatar"] != null): ?><?php echo ($personal["avatar"]); else: ?><?php echo ($default_avatar); endif; ?>" title="">
                            <img alt="image"  class="img-circle menu_avatar" style="width:40px;height:40px;" src="<?php if($personal["avatar"] != null): ?><?php echo ($personal["avatar"]); else: ?><?php echo ($default_avatar); endif; ?>" />
                            </a>
                            </span>
                        </div>
                    </li> -->
                    
					<li class="nav-header" style="border:0px solid red;margin-top:-20px;padding:20px 10px;">
						<div class="dropdown profile-element">
						<input name='keyword' type="text" placeholder="搜索菜单" class="form-control" style="border:none;border-radius:5px;background:#2F4050;font-size:13px;"/>
                        	<i class="fa fa-search search" style="color:#999;position:absolute;top:10px;right:10px;cursor:pointer;"></i>
                        	<script>
                        		$().ready(function(){
                        			$("[name='keyword']").blur(function(){
                        				$(this).css("background","#2F4050");
                        			})
                        			$("[name='keyword']").focus(function(){
                        				$(this).css("background","white");
                        			})
                        			
                        			$(".search").click(function(){
                        				var keyword=$("[name='keyword']").val();
                        				if(keyword){
                        					//iframe0.location.href="<?php echo U('User/index');?>";
                        					var info = {
                        							keyword:keyword,
										    };
                        					
                        					$.ajax({
                        						url:"/index.php/Index/search",
                        						dataType: "json",
                        						data:info,
                        						type:"post",
                        						success:function(re){
                        							var flag=re.flag;
                        							var msg=re.msg;
                        							if(flag==1){
                        								iframe0.location.href="/index.php/"+msg;
                        							}else{
                        								layer.msg(msg);
                        							}
                        						}
                        					})
                        				}
                        			})
                        		})
                        	</script>
                        </div>
                        <div class="logo-element" style="border:0px solid red;margin:-18px;">
                        	<i class="fa fa-search" style="color:white;cursor:pointer;"></i>
                        </div>
					</li>
					
					
					<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
                    	<?php if($v["hasson"] == 'has'): ?><a><i class="<?php echo ((isset($v["icon"]) && ($v["icon"] !== ""))?($v["icon"]):'fa fa-circle'); ?>"></i> <span class="nav-label"><?php echo ($v["title"]); ?></span><span class="fa arrow"></span></a>
                    	<?php else: ?>
                    		<a class="J_menuItem"  href="<?php echo U('index/home');?>" data-id="<?php echo U('Index/home');?>"><i class="<?php echo ((isset($v["icon"]) && ($v["icon"] !== ""))?($v["icon"]):'fa fa-circle'); ?>"></i> <span class="nav-label"><?php echo ($v["title"]); ?></span></a><?php endif; ?>
                    	
                    	<?php if($v["hasson"] == 'has'): ?><ul class="nav nav-second-level">
	                    		<?php if(is_array($v["sons"])): $i = 0; $__LIST__ = $v["sons"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><li>
	                            	<a class="J_menuItem" href="/index.php/<?php echo ($vv["url"]); ?>"><i class="<?php echo ((isset($vv["icon"]) && ($vv["icon"] !== ""))?($vv["icon"]):'fa fa-circle-o'); ?>"></i> <?php echo ($vv["title"]); ?></a>
	                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
	                        </ul><?php endif; ?>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    
                   
                    


                    


                  

                   

                </ul>
            </div>
</nav>


        <!--左侧导航结束-->
        <!--右侧部分开始-->
        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header" style="width:auto;margin-right:10px;">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="javascript:">
                    <i class="fa fa-list"></i> 
                    </a>
                        <!-- <form role="search" class="navbar-form-custom" method="post" action="">
                            <div class="form-group">
                                <input type="text" placeholder="请输入您需要查找的内容 …" class="form-control" name="top-search" id="top-search">
                            </div>
                        </form> -->
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                    	
                    	
                    	<li>
                            <a id="refresh" title="刷新">
                                <i class="fa fa-refresh"></i>
                            </a>
                            <script>
                            $().ready(function(){
                            	$("#refresh").click(function(){
                            		var src=$(".active.J_menuTab").attr('data-id');//获取当前链接的。
                            		$(".J_iframe").each(function(){
                            			if(this.style.display != 'none'){
                            				var name=$(this).attr('name');
                            				window.frames[name].location.reload();
                            			}
                            		})
                            	})
                            })
                            </script>
                        </li>
                        
                        <li>
                            <a id="refresh" title="后退" onclick="javascript:history.back(-1);">
                                <i class="fa fa-arrow-left"></i>
                            </a>
                        </li>
                    
                    	<li>
                            <a class="dropdown count-info J_menuItem" data-toggle="dropdown" href="<?php echo U('Message/receiveList');?>">
                                <i class="fa fa-bell"></i> 
                                <?php if($noReadNum > 0): ?><span class="label label-danger noread" title="已接收"><?php echo ($noReadNum); ?></span><?php endif; ?>
                            </a>
                        </li>
                        
                   		<li>
			    	         <a onclick="del('<?php echo U('Public/lockscreen');?>','确定锁定系统么？','3','锁定','暂不锁定')"  title="锁定">
				             	<i class="fa fa-lock"></i>
				             </a>
				        </li>
				        <li>
			             <a class="clean"  title="清除缓存">
			             	<i class="fa fa-trash"></i> <!-- 清理 -->
			             </a>
			             <div class="clean-warn" style="display:none;">
			             <div class="clean-loading sk-spinner sk-spinner-circle">
                                <div class="sk-circle1 sk-circle"></div>
                                <div class="sk-circle2 sk-circle"></div>
                                <div class="sk-circle3 sk-circle"></div>
                                <div class="sk-circle4 sk-circle"></div>
                                <div class="sk-circle5 sk-circle"></div>
                                <div class="sk-circle6 sk-circle"></div>
                                <div class="sk-circle7 sk-circle"></div>
                                <div class="sk-circle8 sk-circle"></div>
                                <div class="sk-circle9 sk-circle"></div>
                                <div class="sk-circle10 sk-circle"></div>
                                <div class="sk-circle11 sk-circle"></div>
                                <div class="sk-circle12 sk-circle"></div>
                            </div>
			             </div>
			             <script type="text/javascript">
			             $().ready(function(){
			            	 $(".clean").click(function(){
			            		 layer.confirm('清理缓存么?', {
			            				icon:3,btn: ['清理','不了'] //按钮
			            			}, function(){
			            				$.ajax({
			            					url:"/index.php/Index/cleanCache",
			            					type:"post",
			            					beforeSend:function(){
			            						$a=$(".clean-warn").html();
			            						$(".layui-layer-dialog .layui-layer-padding").css("padding","20px")
			            						$(".layui-layer-content").html($a+"<p style='text-align:center;'>玩命清理中</p>");
			            						$(".layui-layer-btn").hide();
			            					},
			            					success:function(re){
			            						if(re=="success"){
			            							layer.msg("清理成功！");
			            						}else{
			            							layer.msg("清理失败！");
			            						}
			            						$(".layui-layer-btn1").trigger("click");
			            					}
			            				})
			            			});
			            	 })
			             })
			             </script>
			        	</li>
                        <li>
				             <a title="退出" onclick="del('<?php echo U('Public/out');?>','您确定退出系统么？','3','退出')">
				                 <i class="fa fa-sign-out"></i>
				             </a>
				        </li>
                        <!-- <li class="dropdown hidden-xs">
                            <a class="right-sidebar-toggle" aria-expanded="false">
                                <i class="fa fa-gears"></i> 设置
                            </a>
                        </li> -->
                    </ul>
                </nav>
            </div>
            <div class="row content-tabs" style="display:block;">
                <!-- <button class="roll-nav roll-left J_tabLeft"><i class="fa fa-chevron-left"></i>
                </button> -->
                <nav class="page-tabs J_menuTabs">
                    <div class="page-tabs-content">
                        <a href="javascript:;" class="active J_menuTab" data-id="<?php echo U('Index/home');?>">导航页</a>
                    </div>
                </nav>
                <!-- <button class="roll-nav roll-right J_tabRight" style="right:80px;"><i class="fa fa-chevron-right"></i>
                </button> -->
                <!-- <div class="btn-group roll-nav roll-right" style="right:0px;"> -->
                    <!-- <button class="dropdown J_tabClose" data-toggle="dropdown">关闭操作<span class="caret"></span>

                    </button> -->
                    <!-- <ul role="menu" class="dropdown-menu dropdown-menu-right">
                        <li class="J_tabShowActive"><a>定位当前选项卡</a>
                        </li>
                        <li class="divider"></li>
                        <li class="J_tabCloseAll"><a>关闭全部选项卡</a>
                        </li>
                        <li class="J_tabCloseOther"><a>关闭其他选项卡</a>
                        </li>
                    </ul>
                </div> -->
            </div>
            <div class="row J_mainContent content" id="content-main" >
                <iframe class="J_iframe" name="iframe0" width="100%" height="100%" src="<?php echo U('Index/home');?>" frameborder="0" data-id="<?php echo U('Index/home');?>" seamless></iframe>
            </div>
            <div class="footer">
                <div class="pull-right">&copy; 好视力眼镜<a href="" target="_blank"></a>
                </div>
            </div>
        </div>
        <!--右侧部分结束-->
        <!--右侧边栏开始-->
        <div id="right-sidebar">
            <div class="sidebar-container">
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane active">
                        <div class="skin-setttings">
                            <div class="title">主题设置</div>
                            <div class="setings-item">
                                <span>收起左侧菜单</span>
                                <div class="switch">
                                    <div class="onoffswitch">
                                        <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="collapsemenu">
                                        <label class="onoffswitch-label" for="collapsemenu">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="setings-item">
                                <span>固定顶部</span>

                                <div class="switch">
                                    <div class="onoffswitch">
                                        <input type="checkbox" name="fixednavbar" class="onoffswitch-checkbox" id="fixednavbar">
                                        <label class="onoffswitch-label" for="fixednavbar">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="setings-item">
                                <span>
                        固定宽度
                    </span>

                                <div class="switch">
                                    <div class="onoffswitch">
                                        <input type="checkbox" name="boxedlayout" class="onoffswitch-checkbox" id="boxedlayout">
                                        <label class="onoffswitch-label" for="boxedlayout">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>

            </div>
        </div>
    </div>
<!-- 这是提醒的方法 -->
     <script type="text/javascript">
  //       $(function () {
  //       	setInterval("getRemindNum()", 24*3600);//获得提醒数量
  //       })
        
  //       //获得提醒的数量
  //       function getRemindNum(){
  //       	$.ajax({
  //   			url:'/index.php/Message/getMessageNum',
  //   			type:'post',
  //   			data:'json',
  //   			success:function(json){
  //   				$(".noread").html(json.noread);//未读数量
  //   				for (var i = 0; i < json.message.length; i++) {
  //   					$("#music").html("<audio src='/Public/Common/music/order.mp3'  autoplay='autoplay'></audio>");
  //   					var sid=json.message[i]['sid'];
  //   					var title=json.message[i]['title'];
  //   					var url=json.message[i]['url'];
  //   				    var msg=json.message[i]['content'];
  //   				    var content=msg.substring(0,50);
    				    
  //   				    if(url==""){
  //   				    	var title="<a style='color:white;' title='查看详情' href='/index.php/Message/messageInfo/action/receive/sid/"+sid+".html' target='_blank'>"+title+"</a>";
  //       				    var content="<a style='color:white;' title='查看详情' href='/index.php/Message/messageInfo/action/receive/sid/"+sid+".html' target='_blank'>"+content+"</a>";	
  //   				    }else{
  //   				    	var title="<a class='J_menuItem' style='color:white;' title='查看详情' href='"+url+"' target='_blank'>"+title+"</a>";
  //       				    var content="<a class='J_menuItem' style='color:white;' title='查看详情' href='"+url+"' target='_blank'>"+content+"</a>";
  //   				    }
  //   				    remind(title,content);
  //   				}
  //   			}
  //   		})//ajax的结束
  //       }
        
  //       //执行提醒
  //       function remind(title,msg,timeOut){
  //       	 var i = -1;
  //            var toastCount = 0;
  //            var $toastlast;
  //            var remind_type="<?php echo ($CONFIG["REMIND_TYPE"]); ?>";//提醒类型
  //            var remind_position="<?php echo ($CONFIG["REMIND_POSITION"]); ?>";//提醒位置
  //            var showEasing="<?php echo ($CONFIG["SHOWEASING"]); ?>";//显示动画
  //            var hideEasing="<?php echo ($CONFIG["HIDEEASING"]); ?>";//隐藏动画
  //            var showMethod="<?php echo ($CONFIG["SHOWMETHOD"]); ?>";//显示方法
  //            var hideMethod="<?php echo ($CONFIG["HIDEMETHOD"]); ?>";//隐藏方法
  //            var timeOut="<?php echo ($CONFIG["TIMEOUT"]); ?>";//超时
  //            var extendedTimeOut="<?php echo ($CONFIG["EXTENDEDTIMEOUT"]); ?>";//延长时间
  //            var isprogressbar="<?php echo ($CONFIG["PROGRESSBAR"]); ?>";//是否显示进度条
  //            if(isprogressbar=="true"){
  //           	 isprogressbar=true; 
  //            }else if(isprogressbar=="false"){
  //           	 isprogressbar=false; 
  //            }
             
  //            var iscloseButton= "<?php echo ($CONFIG["CLOSEBUTTON"]); ?>";//是否显示关闭按钮
  //            if(iscloseButton=="true"){
  //           	 iscloseButton=true; 
  //            }else if(iscloseButton=="false"){
  //           	 iscloseButton=false; 
  //            }
             
  //            var toastIndex = toastCount++;
  //            toastr.options = {
  //                closeButton: iscloseButton,
  //                debug: true,
  //                progressBar:  isprogressbar,
  //                positionClass: remind_position,
  //                onclick: null
  //            };
             
  //            toastr.options.showDuration = remind_type;
  //            toastr.options.hideDuration =remind_position;
  //            toastr.options.showEasing = showEasing;
  //            toastr.options.hideEasing = hideEasing;
  //            toastr.options.showMethod = showMethod;
  //            toastr.options.hideMethod = hideMethod;
  //            toastr.options.timeOut = timeOut;
  //            toastr.options.extendedTimeOut = extendedTimeOut;
  //            var $toast = toastr[remind_type](msg, title); // Wire up an event handler to a button in the toast, if it exists
  //            $toastlast = $toast;
		// }
    </script>
</body>
</html>