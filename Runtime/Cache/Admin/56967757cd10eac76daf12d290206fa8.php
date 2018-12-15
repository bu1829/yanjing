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
					<a href="<?php echo U('Lens/userList');?>" class="btn btn-xs btn-info">客户列表</a>
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
										

		                                    <div class="form-group">
		                                        <label class="col-sm-2 control-label"><font class="text-danger">*</font> 类型：</label>
		                                        <div class="col-sm-3">
		                                         	<div class="radio radio-success" style="float:left;margin-right:10px;">
		                                                <input type="radio" name="type" id="type1" value="1" checked=''>
		                                                <label for="type1">
		                                                  	  近用
		                                                </label>
		                                            </div>
		                                            
		                                            <div class="radio radio-danger" style="float:left;">
		                                                <input type="radio" name="type" id="type2" value="2">
		                                                <label for="type2">
		                                               		   远用
		                                                </label>
		                                            </div>
		                                        </div>
		                                    </div>
									

		                                    <div class="form-group">
		                                        <label class="col-sm-2 control-label"> 左眼镜片：</label>
		                                        <div class="col-sm-2">
		                                        	<button type="button" class="btn btn-sm btn-info choselens_l">选择镜片</button>
		                                        	
		                                        	<?php if($data["lens_l_name"] != null): if($artist["picture"] != null): ?><img class="img-circle expert-avatar art" src="<?php echo ($artist["picture"]); ?>"/><?php endif; ?>
			                                        	<font class="lens_l" style="font-weight:bold;"><?php echo ($data["lens_l_name"]); ?> </font>
				                                        <!-- <i class="fa fa-close lens_l"></i> --><?php endif; ?>
			                                        
			                                        <input type="hidden" name="lens_l_id" value="<?php echo ($data["lens_i_id"]); ?>"> 
		                                            <!-- <select name="arter_id" class="btn-sm btn-white">
		                                            	<option value="">请选择</option>
		                                            	<?php if(is_array($artist)): $i = 0; $__LIST__ = $artist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option id="artist<?php echo ($v["id"]); ?>" value="<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
		                                            </select> -->
		                                        </div>
		                                    </div>

		                                    <div class="form-group">
		                                        <label class="col-sm-2 control-label"> 右眼镜片：</label>
		                                        <div class="col-sm-2">
		                                        	<button type="button" class="btn btn-sm btn-info choselens_r">选择镜片</button>
		                                        	
		                                        	<?php if($data["lens_r_name"] != null): if($artist["picture"] != null): ?><img class="img-circle expert-avatar art" src="<?php echo ($artist["picture"]); ?>"/><?php endif; ?>
			                                        	<font class="lens_r" style="font-weight:bold;"><?php echo ($data["lens_r_name"]); ?> </font>
				                                        <!-- <i class="fa fa-close lens_r"></i> --><?php endif; ?>
			                                        
			                                        <input type="hidden" name="lens_r_id" value="<?php echo ($data["lens_r_id"]); ?>"> 
		                                            <!-- <select name="arter_id" class="btn-sm btn-white">
		                                            	<option value="">请选择</option>
		                                            	<?php if(is_array($artist)): $i = 0; $__LIST__ = $artist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option id="artist<?php echo ($v["id"]); ?>" value="<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
		                                            </select> -->
		                                        </div>
		                                    </div>
											 
											
		                                    <div class="form-group">
		                                        <label class="col-sm-2 control-label"><font class="text-danger">*</font> 裸眼视力：</label>
		                                        <div class="col-sm-4">
		                                            <input  name="naked_eyesight" value="<?php echo ($data["naked_eyesight"]); ?>" class="form-control" type="text" maxlength="255">
		                                        </div>
		                                    </div>

		                                    <div class="form-group">
		                                        <label class="col-sm-2 control-label"><font class="text-danger">*</font> 球镜：</label>
		                                        <div class="col-sm-4">
		                                            <input  name="ball_mirror" value="<?php echo ($data["ball_mirror"]); ?>" class="form-control" type="text" maxlength="255">
		                                        </div>
		                                    </div>

		                                    <div class="form-group">
		                                        <label class="col-sm-2 control-label"><font class="text-danger">*</font> 柱镜：</label>
		                                        <div class="col-sm-4">
		                                            <input  name="column_mirror" value="<?php echo ($data["column_mirror"]); ?>" class="form-control" type="text" maxlength="255">
		                                        </div>
		                                    </div>

		                                    <div class="form-group">
		                                        <label class="col-sm-2 control-label"><font class="text-danger">*</font> 轴位：</label>
		                                        <div class="col-sm-4">
		                                            <input  name="shaft_position" value="<?php echo ($data["shaft_position"]); ?>" class="form-control" type="text" maxlength="255">
		                                        </div>
		                                    </div>

		                                    <div class="form-group">
		                                        <label class="col-sm-2 control-label"><font class="text-danger">*</font> 矫正视力：</label>
		                                        <div class="col-sm-4">
		                                            <input  name="correct_eyesight" value="<?php echo ($data["correct_eyesight"]); ?>" class="form-control" type="text" maxlength="255">
		                                        </div>
		                                    </div>

		                                    <div class="form-group">
		                                        <label class="col-sm-2 control-label"><font class="text-danger">*</font> 原镜度：</label>
		                                        <div class="col-sm-4">
		                                            <input  name="original_mirror_degrees" value="<?php echo ($data["original_mirror_degrees"]); ?>" class="form-control" type="text" maxlength="255">
		                                        </div>
		                                    </div>

		                                    <div class="form-group">
		                                        <label class="col-sm-2 control-label"><font class="text-danger">*</font> 瞳高：</label>
		                                        <div class="col-sm-4">
		                                            <input  name="pupil_hight" value="<?php echo ($data["pupil_hight"]); ?>" class="form-control" type="text" maxlength="255">
		                                        </div>
		                                    </div>

		                                    <div class="form-group">
		                                        <label class="col-sm-2 control-label"><font class="text-danger">*</font> 瞳距：</label>
		                                        <div class="col-sm-4">
		                                            <input  name="pupil_distance" value="<?php echo ($data["pupil_distance"]); ?>" class="form-control" type="text" maxlength="255">
		                                        </div>
		                                    </div>

		                                    <div class="form-group">
		                                        <label class="col-sm-2 control-label"><font class="text-danger">*</font> 瞳高规格：</label>
		                                        <div class="col-sm-4">
		                                            <input  name="pupil_hight_sp" value="<?php echo ($data["pupil_hight_sp"]); ?>" class="form-control" type="text" maxlength="255">
		                                        </div>
		                                    </div>

		                                    <div class="form-group">
		                                        <label class="col-sm-2 control-label"><font class="text-danger">*</font> 瞳距规格：</label>
		                                        <div class="col-sm-4">
		                                            <input  name="pupil_distance_sp" value="<?php echo ($data["pupil_distance_sp"]); ?>" class="form-control" type="text" maxlength="255">
		                                        </div>
		                                    </div>

		                                    <div class="form-group">
		                                        <label class="col-sm-2 control-label"><font class="text-danger">*</font> 镜架价格：</label>
		                                        <div class="col-sm-4">
		                                            <input  name="frame_price" value="<?php echo ($data["frame_price"]); ?>" class="form-control" type="text" maxlength="255">
		                                        </div>
		                                    </div>

		                                    <div class="form-group">
		                                        <label class="col-sm-2 control-label"><font class="text-danger">*</font> 镜片价格：</label>
		                                        <div class="col-sm-4">
		                                            <input  name="lens_price" value="<?php echo ($data["lens_price"]); ?>" class="form-control" type="text" maxlength="255">
		                                        </div>
		                                    </div>

		                                    <div class="form-group">
		                                        <label class="col-sm-2 control-label"><font class="text-danger">*</font> 优惠价格：</label>
		                                        <div class="col-sm-4">
		                                            <input  name="pref_price" value="<?php echo ($data["pref_price"]); ?>" class="form-control" type="text" maxlength="255">
		                                        </div>
		                                    </div>

		                                    <div class="form-group">
		                                        <label class="col-sm-2 control-label"><font class="text-danger">*</font> 总价格：</label>
		                                        <div class="col-sm-4">
		                                            <input  name="total_price" value="<?php echo ($data["total_price"]); ?>" class="form-control" type="text" maxlength="255">
		                                        </div>
		                                    </div>


		                                    <!-- <div class="form-group">
		                                        <label class="col-sm-2 control-label"><font class="text-danger">*</font> 配镜时间：</label>
		                                        <div class="col-sm-4">
		                                            <input  name="gls_time" value="<?php echo ($data["gls_time"]); ?>" class="form-control" type="text" maxlength="255">
		                                        </div>
		                                    </div> -->


		                                    <div style="margin-bottom:20px;">
								            	<label class="col-sm-2 control-label" style="margin-left:-10px;"><font class="text-danger">*</font> 配镜时间：</label>
								                <input name='gls_time' value='<?php echo ($data["gls_time"]); ?>' class="laydate-icon btn-sm btn-white" id="start"/ style="height:30px;margin-left:15px;">
												<script>
													laydate({
													    elem: '#start',
													    istime: false,
													    format: 'YYYY-MM-DD', // 分隔符可以任意定义，该例子表示只显示年月
													    festival: true, //显示节日
													    choose: function(datas){ //选择日期完毕的回调
													    }
													});
													laydate.skin("molv");
												</script>

		                                    

		                                    
		                                    
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
	function call_back_user(id,name,mobile){//选客户片返回
		 $("[name='user_id']").val(id);
		 $(".user").remove();
		 $(".choseuser").after('<font class="user" style="font-weight:bold;color:red">'+name+mobile+' </font>');
		 reset();
		 layer.closeAll('iframe');
	}


	function call_back_lens_l(id,name){//选择镜片返回
		 $("[name='lens_l_id']").val(id);
		 $(".lens_l").remove();
		 $(".choselens_l").after('<font class="lens_l" style="font-weight:bold;color:red">'+name+' </font>');
		 reset();
		 layer.closeAll('iframe');
	}

	function call_back_lens_r(id,name){//选择镜片返回
		 $("[name='lens_r_id']").val(id);
		 $(".lens_r").remove();
		 $(".choselens_r").after('<font class="lens_r" style="font-weight:bold;color:red">'+name+' </font>');
		 reset();
		 layer.closeAll('iframe');
	}
	
	/*重置艺术家*/
	function reset(){
		$(".fa-close").click(function(){
			layer.confirm('确定删除吗？', {
				icon:7,btn: ['删除','取消'] //按钮
			}, function(){
				$("[name='artist_id']").val("");
	    		$(this).remove();
	    		$(".art").remove();
	    		$(".layui-layer-btn1").trigger("click");
			});
    	})
	}
	
	
	
	
	
	
    $().ready(function(){
    	 $("#is_new_user<?php echo ($data["is_new_user"]); ?>").prop("checked","checked");//状态
    	 $("#artist<?php echo ($data["arter_id"]); ?>").prop("selected","selected");//艺术家
    	 $("#goods_type<?php echo ($data["goods_type"]); ?>").prop("selected","selected");//商品类型
    	 $("#first<?php echo ($data["first_cate"]); ?>").prop("selected","selected");//商品一级分类
    	 $("#second<?php echo ($data["second_cate"]); ?>").prop("selected","selected");//商品二级分类
    	 $("#is_enquiry<?php echo ($data["is_enquiry"]); ?>").prop("checked","checked");
    	 
    	 //delComment();//删除评论
    	 reset();//重置艺术家
    	 
    	 var gid="<?php echo ($data["id"]); ?>";//商品id
    	 
    	 
    	//选择客户
    	$(".choseuser").click(function(){
    		layer.open({
    			  type: 2,
    			  title: '选择客户',
    			  shadeClose: true,
    			  shade: 0.8,
    			  area: ['80%', '90%'],
    			  content: '/index.php/Lens/userList/types/chose' //iframe的url
   			}); 
    	})
    	 
    	 
    	// //选择左镜片
    	// $(".choselens_l").click(function(){
    	// 	layer.open({
    	// 		  type: 2,
    	// 		  title: '选择镜片',
    	// 		  shadeClose: true,
    	// 		  shade: 0.8,
    	// 		  area: ['80%', '90%'],
    	// 		  content: '/index.php/Lens/LensList/types/chose/lr/l' //iframe的url
   		// 	}); 
    	// })

    	// //选择右镜片
    	// $(".choselens_r").click(function(){
    	// 	layer.open({
    	// 		  type: 2,
    	// 		  title: '选择镜片',
    	// 		  shadeClose: true,
    	// 		  shade: 0.8,
    	// 		  area: ['80%', '90%'],
    	// 		  content: '/index.php/Lens/LensList/types/chose/lr/r' //iframe的url
   		// 	}); 
    	// })
    	
    	 
    	 
    })





    $(".newuser").click(function(){
	        $(".new_user").show();
	        $(".old_user").hide();
	    })

	     $(".olduser").click(function(){
	        $(".old_user").show();
	        $(".new_user").hide();
	    })



	function check(){
		 var gid="<?php echo ($data["id"]); ?>";//商品id
		 
		
		
		// //商品名称
		// var name=$("[name='name']").val();
		// if(name==""){
		// 	layer.msg("请输入商品名称");
		// 	$("[name='name']").focus();
		// 	return false;
		// }

		
		//商品价格
		var reg1 = /^[0-9]{0,9}[\.][0-9]{1,2}$/;
	    var reg2 = /^[0-9]{0,9}$/;
	    var price=$("[name='price']").val();

	    var is_new_user = $("[name='is_new_user']").val();
	    // if(is_new_user==1){
	    // 	alert(1);
	    // }else{
	    // 	alert(0);
	    // }
	  //   if(price==""){
	  //   	layer.msg("请输入商品价格");
			// $("[name='price']").focus();
			// return false;
	  //   }
	    
	 //    if(!reg1.test(price) && !reg2.test(price)){
	 //    	layer.msg("请输入合法的商品价格");
		// 	$("[name='price']").focus();
		// 	return false;
		// }
	    
	    
	    //库存量
	  //   var stock=$("[name='stock']").val();
	  //   if(stock!=""){
	  //   	if(!reg2.test(stock)){
		 //    	layer.msg("请输入合法的库存量");
			// 	$("[name='stock']").focus();
			// 	return false;
			// }
	  //   }
	    
		
		return true;
	}


    </script>


	
</body>
<!-- <script src="/Public/Home/js/goods_details.js"></script> -->
</html>