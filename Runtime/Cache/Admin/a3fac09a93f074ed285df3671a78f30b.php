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
<script>
 $(function() {
   $("#<?php echo ($action); ?>").addClass("<?php echo ($btn); ?>");
   var action="<?php echo ($action); ?>";
   if(action=="sort"){
     changeSort("goods","id","sort");
   } 
   
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
					<a href="<?php echo U('Lens/userLensAdd');?>" class="btn btn-xs btn-primary">新增配镜</a>
                </div>
            </div>
            
            
            <div class="wrapper wrapper-content animated fadeInRight">
            	<div style="margin-bottom:10px;">
				    <form action='' method='get' id='signupForm'>
				    <div style="margin-bottom:20px;">
				    
				    

            <!-- 页数：
            <input placeholder="页数" class="btn-sm btn-white" name="p" value="<?php echo ($p); ?>"> -->

            <input placeholder="请输入客户姓名查询" class="btn-sm btn-white" name="keyword" value="<?php echo ($keyword); ?>">
				    <button class="btn btn-sm btn-info" type="submit">查询</button>
				    </div>
				    </form>
			    </div>
            	<form action="<?php echo U('Goods/goodsHandle');?>" method="post">
              <!-- <div style="margin-bottom:10px;">
              <a id="list" href="<?php echo U('Goods/goodsList',array('action'=>'list'));?>" class="btn btn-sm" type="submit">列表</a>
              <a id="sort" href="<?php echo U('Goods/goodsList',array('action'=>'sort'));?>" class="btn btn-sm" type="submit">排序</a>
              
              </div> -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            
                            <div class="ibox-content">
                                <div class="row">
                                    
                                    <div class="col-sm-1 m-b-xs">
                                        <button class="deletechosebysubmit btn btn-sm btn-primary" type="submit">操作</button>
                                    </div>
                                    
                                </div>
                                <div class="table-responsive">
                                	<?php if($types == 'chose-order-goods'): ?><a class="btn btn-sm btn-info addOrder">
                                            	确认选择
                                    </a>&nbsp;<?php endif; ?>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <?php if($action == sort): ?><th></th><?php endif; ?>
                                                <th><input type="checkbox" class="choseall" name=""></th>
                                                <th>ID</th>
                                                <th>客户姓名</th>
                                                <th>年龄</th>
                                                <th>性别</th>
                                                <th>手机号</th>
                                                <th>住址</th>
                                                <th>添加时间</th>
                                                <th>操作</th>
                                            </tr>
                                        </thead>
                                        <tbody id="sortable">
                                        
                                        	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr class="grade0 one" name="<?php echo ($v["id"]); ?>" <?php if($action == sort): ?>style="cursor:move;"<?php endif; ?>>

                                              <?php if($action == sort): ?><td id="0_<?php echo ($v["id"]); ?>" class="td_click">
                                                <i class="fa fa-arrows"></i>
                                                </td><?php endif; ?>
                                                
                                                <td style="padding-top:10px;">
                                                    <input type="checkbox"  class='i-checks' value="<?php echo ($v["id"]); ?>" name="check[]">
                                                </td>
                                                
                                                
                                                <td>
                                                	<?php echo ($v["user_id"]); ?>
                                                </td>
                                                
                                                <td>
                                                	<?php echo ($v["name"]); ?>
                                                </td>

                                                <td>
                                                    <?php echo ($v["age"]); ?>
                                                </td>

                                                <td>
                                                    <?php echo ($v["sex"]); ?>
                                                </td>

                                                <!-- <td>
                                                <?php if($v["sex"] == 1): ?>男
                                                <?php elseif($v["sex"] == 2): ?>
                                                女
                                                <?php else: ?>
                                                未知<?php endif; ?>
                                                </td> -->

                                                <td>
                                                    <?php echo ($v["mobile"]); ?>
                                                </td>
                                                
                                                <td style="padding-top:10px;">
                                                		<?php echo ($v["address"]); ?>
                                                </td>

                                                <td style="padding-top:10px;">
                                                  <?php echo (date("Y-m-d H:i:s",$v["add_time"])); ?>
                                                </td>
                                                

                                                <td style="padding-top:10px;">
                                                	<a data-toggle="tooltip" data-placement="top" title="配镜详情" class="btn btn-sm btn-success" href="<?php echo U('Lens/userLensInfo',array('user_id'=>$v['user_id']));?>">
                                                	<i class="fa fa-commenting-o"></i>&nbsp;
                                                	</a>&nbsp;
                                                	<a data-toggle="tooltip" data-placement="top" title="修改信息" class="btn btn-sm btn-info" href="<?php echo U('Lens/userEdit',array('user_id'=>$v['user_id']));?>">
                                                	<i class="fa fa-edit"></i>&nbsp;
                                                	</a>&nbsp;
                                                	<!-- <a data-toggle="tooltip" data-placement="top" title="删除" class="btn btn-sm btn-danger" onclick="del('<?php echo U('Lens/lensDel',array('id'=>$v[id]));?>','您确定删除此镜片么？','3')">
                                                	<i class="fa fa-trash-o"></i>
                                                	</a> -->

                                                  <?php if($types == 'chose'): ?><a class="btn btn-sm btn-primary add" user_id="<?php echo ($v["user_id"]); ?>" name="<?php echo ($v["name"]); ?>" sex="<?php echo ($v["sex"]); ?>" address="<?php echo ($v["address"]); ?>" mobile="<?php echo ($v["mobile"]); ?>" age="<?php echo ($v["age"]); ?>">
                                                  确认选择
                                                  </a>&nbsp;<?php endif; ?>
                                                  
                                                </td>
                                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </tbody>
                                    </table>
                                    <!-- <?php if($types == 'chose-order-goods'): ?><a class="btn btn-sm btn-info addOrder">
                                            	确认选择
                                    </a>&nbsp;<?php endif; ?> -->
                                </div>
                                <div class="text-center">
                                    <?php if($page != null): echo ($page); ?>
                                    <?php else: ?>
                                    	共<?php echo ($count); ?>条记录<?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <script>
    $().ready(function(){
      $("#status<?php echo ($status); ?>").prop("selected","selected");
      $("#is_best<?php echo ($is_best); ?>").prop("selected","selected");
      $("#is_enquiry<?php echo ($is_enquiry); ?>").prop("selected","selected");
      $("#is_sell<?php echo ($is_sell); ?>").prop("selected","selected");
      $("#artist_id<?php echo ($artist_id); ?>").prop("selected","selected");
      $("#cat_id<?php echo ($cat_id); ?>").prop("selected","selected");
      $("#sub_id<?php echo ($sub_id); ?>").prop("selected","selected");
      $("#is_new<?php echo ($is_new); ?>").prop("selected","selected");
      $("#is_best<?php echo ($is_best); ?>").prop("selected","selected");
      $("#is_discount<?php echo ($is_discount); ?>").prop("selected","selected");
    	
    	//修改库存
    	$(".is_sell").change(function(){
    		var id=$(this).attr("id");//商品id
    		//var is_sell=$(this).val();//新库存
       //alert(123);
    		//if(is_sell==0){
    			$.ajax({
        			url:"/index.php/Goods/updateSell",
        			type:"post",
        			//data:"id="+id+"&is_sell="+is_sell,
              $data:"id="+id,
        			success:function(re){
        				if(re!="success"){
        					layer.msg(re);
        				}
        			},
        			error:function(){
        				layer.msg("错误,稍后重试！");
        			}
        		})
    		// }else{
    		// 	$(this).focus();
    		// 	layer.msg("库存数只能为数字！");
    		// }
    	})
    	
    	
    	//确认选择配镜的客户
   		$(".add").click(function(){
       		var user_id=$(this).attr("user_id");
       		var name=$(this).attr("name");
          var sex=$(this).attr("sex");
          var address=$(this).attr("address");
       		var mobile=$(this).attr("mobile");
          var age=$(this).attr("age");
       		window.parent.call_back_user(user_id,name,sex,address,mobile,age);
       	})
       	
       	//确认选择参与添加订单
   		$(".addOrder").click(function(){
   			/* var ids="";
       	 	$("[name='check[]']:checked").each(function(){
       	   		var a=$(this).val();
       	   		if(ids!=""){
       	   			ids+=","+a;
       	   		}else{
       	   			ids+=a;
       	   		}
       	  	}); */
       		
       		var gid=$(this).attr("id");
       		var name=$(this).attr("name");
       		var price=$(this).attr("price");
       		var is_sell=$(this).attr("is_sell");
            var enquiry_price = $(this).attr("enquiry_price");
       		//is_sell=is_sell-1;
       		// $(this).attr("title",is_sell);
       	  	// console.log(is_sell);
       		window.parent.call_back_goods(gid,name,price,is_sell,enquiry_price);
       	})
    	
    	
    	//上下架
    	$(".status").click(function(){
       		var id=$(this).attr("id");//这是数据id
       		var status=$(this).attr("name");//这是当前状态 0禁用1正常
       		changeStatusOne('goods','id',id,status);
       	})   
       	
       	


    })
    </script>
</body>

</html>