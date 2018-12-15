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
.single-picture-div{float:left;margin:10px}
.single-picture{width:80px;height:80px;}
#picture{margin-bottom:40px;}
#fileupload{width:80px;height:80px;margin-left:0px;position:absolute;top:10px;opacity:0;z-index:999;}
.delimg{position:relative;left:-60px;bottom:-55px;}
.expert-info{margin-bottom:15px;}
.expert-avatar{width:30px;height:30px;margin-right:10px;}
.expert-name{font-weight:bold;margin-right:10px;}
.delcomment{cursor:pointer;}

</style>
<!-- <link rel="stylesheet" href="/Public/Home/css/goods_details.css"> -->
<script src="/Public/Home/js/e-smart-zoom-jquery.min.js"></script>
<script>
 $(function() {
	 changeSort("goods_picture","id","sort");
	 //默认显示
	 
	 changeSort("goods_expert_comment","id","sort","sortable2");
	 //默认显示
 });
</script>
</head>

<body>
    <div>
        <div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10" id="biaoti">
                    <ol class="breadcrumb" style="margin-top:20px;">
                        <li>
                            	镜片管理
                        </li>
                        <li>
                            <strong><?php echo ($meta_title); ?></strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2" id="fubiaoti">
					<a href="<?php echo U('Lens/lensList');?>" class="btn btn-xs btn-info">镜片列表</a>
                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                
                <div class="row">
                    
                    <div class="col-lg-12">
                    
                    	<div class="panel blank-panel">

                            <div class="panel-heading">
                                <div class="panel-title m-b-md">
                                    <h4><?php echo ($meta_title); ?></h4>
                                </div>
                                <div class="panel-options">
                                    <ul class="nav nav-tabs">
                                    	<!-- <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><li class="<?php if(($key) == "基本设置"): ?>active<?php endif; ?>">
										<a href="#<?php echo ($key); ?>"  data-toggle="tab">
												<?php echo ($key); ?>
										</a>
										</li><?php endforeach; endif; else: echo "" ;endif; ?> -->
										
										<li class="active">
											<a href="#basic"  data-toggle="tab">
												基本信息
											</a>
										</li>
										
										
									</ul>
									
									<form id="signupForm5" action=""  method="post" class="form-horizontal m-t" enctype="multipart/form-data" onsubmit="return check()">
									<div class="tab-content">
										<div class="tab-pane active" id="basic">
											 
											
		                                    <div class="form-group">
		                                        <label class="col-sm-2 control-label"><font class="text-danger">*</font> 镜片名称：</label>
		                                        <div class="col-sm-4">
		                                            <input  name="name" value="<?php echo ($data["name"]); ?>" class="form-control" type="text" maxlength="255">
		                                        </div>
		                                    </div>

		                                    <div class="form-group">
		                                        <label class="col-sm-2 control-label"><font class="text-danger">*</font> 镜片编号：</label>
		                                        <div class="col-sm-4">
		                                            <input  name="len_no" value="<?php echo ($data["lens_no"]); ?>" class="form-control" type="text" maxlength="255">
		                                        </div>
		                                    </div>

		                                    <div class="form-group">
		                                        <label class="col-sm-2 control-label"><font class="text-danger">*</font> 镜片类型：</label>
		                                        <div class="col-sm-4">
		                                            <input  name="category" value="<?php echo ($data["category"]); ?>" class="form-control" type="text" maxlength="255">
		                                        </div>
		                                    </div>

		                                    <div class="form-group">
		                                        <label class="col-sm-2 control-label"><font class="text-danger">*</font> 镜片品牌：</label>
		                                        <div class="col-sm-4">
		                                            <input  name="brand" value="<?php echo ($data["brand"]); ?>" class="form-control" type="text" maxlength="255">
		                                        </div>
		                                    </div>

		                                    <div class="form-group">
		                                        <label class="col-sm-2 control-label"><font class="text-danger">*</font> 镜片度数：</label>
		                                        <div class="col-sm-4">
		                                            <input  name="degree" value="<?php echo ($data["degree"]); ?>" class="form-control" type="text" maxlength="255">
		                                        </div>
		                                    </div>

		                                    <div class="form-group">
		                                        <label class="col-sm-2 control-label"><font class="text-danger">*</font> 镜片材质：</label>
		                                        <div class="col-sm-4">
		                                            <input  name="material" value="<?php echo ($data["material"]); ?>" class="form-control" type="text" maxlength="255">
		                                        </div>
		                                    </div>

		                                    <div class="form-group">
		                                        <label class="col-sm-2 control-label"><font class="text-danger">*</font> 镜片颜色：</label>
		                                        <div class="col-sm-4">
		                                            <input  name="color" value="<?php echo ($data["color"]); ?>" class="form-control" type="text" maxlength="255">
		                                        </div>
		                                    </div>

		                                    <div class="form-group">
		                                        <label class="col-sm-2 control-label"><font class="text-danger">*</font> 镜片库存：</label>
		                                        <div class="col-sm-4">
		                                            <input  name="inventory" value="<?php echo ($data["inventory"]); ?>" class="form-control" type="text" maxlength="255">
		                                        </div>
		                                    </div>

		                                    <div class="form-group">
		                                        <label class="col-sm-2 control-label"><font class="text-danger">*</font> 镜片价格：</label>
		                                        <div class="col-sm-4">
		                                            <input  name="price" value="<?php echo ($data["price"]); ?>" class="form-control" type="text" maxlength="255">
		                                        </div>
		                                    </div>
		                                    
										</div>
										
								 	
								 	<div class="form-group">
                                        <label class="col-sm-2 control-label"></label>
                                        <div class="col-sm-10">
                                        	<input  type="hidden" value="<?php echo ($data["id"]); ?>" name="id"/>
                                            <button class="btn btn-sm btn-primary" type="submit">保存</button>
                                          	<button class="btn btn-sm btn-warning" type="reset">重置</button>
                                        </div>
                                    </div>
                                    
		                                    
								 	</form>
                                </div>
                            </div>
                        </div>
	                </div>
	                
                </div>

            </div>
            <!--上传图片  -->
            <script type="text/javascript">
    $().ready(function(){
    	//上传图片
    	var picture_max_size="<?php echo ($CONFIG["PICTURE_MAX_SIZE"]); ?>";
    	var picture_max_size=parseInt(picture_max_size) / 1024;
    	$(".inputimg").each(function(){
			//点击某一张的input框
			upload(this,"","",picture_max_size);
		})//each结束
    })
</script>
            <!--上传图片  -->
        </div>
    </div>
    <!-- 放置缩略图显示的 -->
    <div style="display:none;padding:0px;" class="open1">
	<img src="" alt="" class="fancybox-image carousel-inne img-rounded img-responsive openimg1"/>
	</div>
	<!-- 放置画籍证书显示的 -->
    <div style="display:none;padding:0px;" class="open2">
	<img src="" alt="" class="fancybox-image carousel-inne img-rounded img-responsive openimg2"/>
	</div>
	<script type="text/javascript" src="/Public/Common/js/jquery.form.js"></script>
	<script type="text/javascript">
		function check(){
		 var gid="<?php echo ($data["id"]); ?>";//商品id
		 
		var reg1 = /^[0-9]{0,9}[\.][0-9]{1,2}$/;
	    var reg2 = /^[0-9]{0,9}$/;
		
		
		//商品名称
		var name=$("[name='name']").val();
		if(name==""){
			layer.msg("请输入镜片名称");
			$("[name='name']").focus();
			return false;
		}

		//库存量
	    var stock=$("[name='inventory']").val();
	    if(stock==""){
	    	layer.msg("请输入镜片库存量");
			$("[name='inventory']").focus();
			return false;
	    }
	    
    	if(!reg2.test(stock)){
	    	layer.msg("请输入合法的库存量");
			$("[name='inventory']").focus();
			return false;
		}
	    
		
		
		//商品价格
	    var price=$("[name='price']").val();
	    if(price==""){
	    	layer.msg("请输入镜片价格");
			$("[name='price']").focus();
			return false;
	    }
	    
	    if(!reg1.test(price) && !reg2.test(price)){
	    	layer.msg("请输入合法的镜片价格");
			$("[name='price']").focus();
			return false;
		}
	    
	   
	    
	    
		
		
		return true;
	}
	</script>
</body>
<!-- <script src="/Public/Home/js/goods_details.js"></script> -->
</html>