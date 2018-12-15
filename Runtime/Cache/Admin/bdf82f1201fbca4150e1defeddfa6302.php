<?php if (!defined('THINK_PATH')) exit();?>    <meta charset="utf-8">
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
            <div class="wrapper wrapper-content animated fadeInRight white-bg">
                
                <div class="row">
                    
                    <div class="col-lg-12">
                    
                    	<div class="panel blank-panel">

                            <div class="panel-heading">
                                <div class="panel-options">

									<form id="signupForm5" action=""  method="post" class="form-horizontal m-t" enctype="multipart/form-data" onsubmit="return check()">
									<div class="tab-content">
										<div class="tab-pane active" id="basic">

									<?php if($data == null): ?><div class="form-group">
		                                        <label class="col-sm-2 control-label"><font class="text-danger">*</font> 是否为新用户：</label>
		                                        <div class="col-sm-3">
		                                         	<div class="radio radio-success" style="float:left;margin-right:10px;">
		                                                <input type="radio" name="is_new_user" id="is_new_user1" value="1"  class="newuser" checked="">
		                                                <label for="is_new_user1">
		                                                  	  是
		                                                </label>
		                                            </div>
		                                            
		                                            <div class="radio radio-danger" style="float:left;">
		                                                <input type="radio" name="is_new_user" id="is_new_user0" value="0"  class="olduser">
		                                                <label for="is_new_user0">
		                                               		   否
		                                                </label>
		                                            </div>
		                                        </div>
		                                    </div>

										<div class="new_user" style="display:show;">

		                                </div><?php endif; ?>




										<div class="old_user" style="display:none;">
		                                	<div class="form-group">
		                                        <label class="col-sm-2 control-label"> 用户：</label>
		                                        <div class="col-sm-2">
		                                        	<button type="button" class="btn btn-sm btn-info choseuser">选择用户</button>
		                                        	
		                                        	<?php if($artist != null): if($artist["picture"] != null): ?><img class="img-circle expert-avatar art" src="<?php echo ($artist["picture"]); ?>"/><?php endif; ?>
			                                        	<font class="art" style="font-weight:bold;"><?php echo ($artist["name"]); ?> </font>
				                                        <i class="fa fa-close art"></i><?php endif; ?>
			                                        
			                                        <input type="hidden" name="user_id" value="<?php echo ($data["user_id"]); ?>"> 
		                                            
		                                        </div>
		                                    </div>
										</div>

		                                    

<div class="form-group">
	<center>
          <table width="80%" height="35%" border="1" cellpadding="0" cellspacing="0">
             <tr>
                 <th>姓名</th>
                 <td><input type="text" id="name" name="name" value="<?php echo ($data["name"]); ?>" 
                 style="border:none;outline:none;width:80px;height:40px;"></td>
                 <th>性别</th>
                 <td><input type="text" id="sex" name="sex" value="<?php echo ($data["sex"]); ?>"style="border:none;outline:none;width:80px;height:40px;"></td>
                 <th>地址</th>
                 <td colspan="2"><input type="text" id="address" name="address" value="<?php echo ($data["address"]); ?>" style="border:none;outline:none;width:240px;height:40px;"></td>
                 <th>电话</th>
                 <td><input type="text" id="mobile" name="mobile" value="<?php echo ($data["mobile"]); ?>" style="border:none;outline:none;width:160px;height:40px;"></td>
             </tr>
             <tr>
                 <th>年龄</th>
                 <td><input type="text" id="age" name="age" value="<?php echo ($data["age"]); ?>" style="border:none;outline:none;width:80px;height:40px;"></td>
                 <th>球镜</th>
                 <th>柱镜</th>
                 <th>轴位</th>
                 <th>矫正视力</th>
                 <td></td>
                 <td colspan="2"></td>
             </tr>
             <tr>
                 <th rowspan="2">远用</th>
                 <th>右</th>
                 <td><input type="text" name="f_r_ballmirror" value="<?php echo ($data["f_r_ballmirror"]); ?>" style="border:none;outline:none;width:80px;height:30px;"></td>
                 <td><input type="text" name="f_r_columnmirror" value="<?php echo ($data["f_r_columnmirror"]); ?>" style="border:none;outline:none;width:80px;height:30px;"></td>
                 <td><input type="text" name="f_r_shaftposition" value="<?php echo ($data["f_r_shaftposition"]); ?>" style="border:none;outline:none;width:80px;height:30px;"></td>
                 <td><input type="text" name="f_r_correcteyesight" value="<?php echo ($data["f_r_correcteyesight"]); ?>" style="border:none;outline:none;width:160px;height:30px;"></td>
                 <th>镜架</th>
                 <td colspan="2"><input type="text" name="gls_frame" value="<?php echo ($data["gls_frame"]); ?>" style="border:none;outline:none;width:300px;height:31px;"></td>
             </tr>
             <tr>
                 <th>左</th>
                 <td><input type="text" name="f_l_ballmirror" value="<?php echo ($data["f_l_ballmirror"]); ?>" style="border:none;outline:none;width:80px;height:30px;"></td>
                 <td><input type="text" name="f_l_columnmirror" value="<?php echo ($data["f_l_columnmirror"]); ?>" style="border:none;outline:none;width:80px;height:30px;"></td>
                 <td><input type="text" name="f_l_shaftposition" value="<?php echo ($data["f_l_shaftposition"]); ?>" style="border:none;outline:none;width:80px;height:30px;"></td>
                 <td><input type="text" name="f_l_correcteyesight" value="<?php echo ($data["f_l_correcteyesight"]); ?>" style="border:none;outline:none;width:160px;height:30px;"></td>
                 <th>镜片</th>
                 <td colspan="2"><input type="text" name="lens" value="<?php echo ($data["lens"]); ?>" style="border:none;outline:none;width:300px;height:31px;"></td>
             </tr>
             <tr>
                 <th rowspan="2">近用</th>
                 <th>右</th>
                 <td><input type="text" name="n_r_ballmirror" value="<?php echo ($data["n_r_ballmirror"]); ?>" style="border:none;outline:none;width:80px;height:30px;"></td>
                 <td><input type="text" name="n_r_columnmirror" value="<?php echo ($data["n_r_columnmirror"]); ?>" style="border:none;outline:none;width:80px;height:30px;"></td>
                 <td><input type="text" name="n_r_shaftposition" value="<?php echo ($data["n_r_shaftposition"]); ?>" style="border:none;outline:none;width:80px;height:30px;"></td>
                 <td><input type="text" name="n_r_correcteyesight" value="<?php echo ($data["n_r_correcteyesight"]); ?>" style="border:none;outline:none;width:160px;height:30px;"></td>
                 <th>瞳距</th>
                 <td><input type="text" name="pupil_distance" value="<?php echo ($data["pupil_distance"]); ?>" style="border:none;outline:none;width:80px;height:31px;">mm</td>
                 <th>金额</th>
             </tr>
             <tr>
                 <th>左</th>
                 <td><input type="text" name="n_l_ballmirror" value="<?php echo ($data["n_l_ballmirror"]); ?>" style="border:none;outline:none;width:80px;height:30px;"></td>
                 <td><input type="text" name="n_l_columnmirror" value="<?php echo ($data["n_l_columnmirror"]); ?>" style="border:none;outline:none;width:80px;height:30px;"></td>
                 <td><input type="text" name="n_l_shaftposition" value="<?php echo ($data["n_l_shaftposition"]); ?>" style="border:none;outline:none;width:80px;height:30px;"></td>
                 <td><input type="text" name="n_l_correcteyesight" value="<?php echo ($data["n_l_correcteyesight"]); ?>" style="border:none;outline:none;width:160px;height:30px;"></td>
                 <th>瞳高</th>
                 <td><input type="text" name="pupil_hight" value="<?php echo ($data["pupil_hight"]); ?>" style="border:none;outline:none;width:80px;height:31px;">mm</td>
                 <td><input type="text" name="total_price" value="<?php echo ($data["total_price"]); ?>" style="border:none;outline:none;width:80px;height:31px;"></td>
             </tr>
         </table>                                       
     </center>
</div>		                                    
											 

		                                    


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
	function call_back_user(id,name,sex,address,mobile,age){//选客户片返回
		 $("[name='user_id']").val(id);
		 $(".user").remove();
		 $(".choseuser").after('<font class="user" style="font-weight:bold;color:red">'+name+' </font>');
		 $("#name").val(name);
		 $("#sex").val(sex);
		 $("#address").val(address);
		 $("#mobile").val(mobile);
		 $("#age").val(age);
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
    	 
    	 
    	//选择左镜片
    	$(".choselens_l").click(function(){
    		layer.open({
    			  type: 2,
    			  title: '选择镜片',
    			  shadeClose: true,
    			  shade: 0.8,
    			  area: ['80%', '90%'],
    			  content: '/index.php/Lens/LensList/types/chose/lr/l' //iframe的url
   			}); 
    	})

    	//选择右镜片
    	$(".choselens_r").click(function(){
    		layer.open({
    			  type: 2,
    			  title: '选择镜片',
    			  shadeClose: true,
    			  shade: 0.8,
    			  area: ['80%', '90%'],
    			  content: '/index.php/Lens/LensList/types/chose/lr/r' //iframe的url
   			}); 
    	})
    	
    	 
    	 
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
		var is_new_user = $("[name='is_new_user']").val();
		var name=$("[name='name']").val();
		if(name==''){
			layer.msg("请填写客户姓名");
			$("[name='name']").focus();
			return false;
		}
		// var mobile=$("[name='mobile']").val();
		// if(name==''){
		// 	layer.msg("请填写正确的手机号码");
		// 	$("[name='mobile']").focus();
		// 	return false;
		// }

		var gls_time=$("[name='gls_time']").val();
		if(gls_time==''){
			layer.msg("请选择正确的配镜时间");
			$("[name='gls_time']").focus();
			return false;
		}

		return true;





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

	    
		
		return true;
	}

    </script>