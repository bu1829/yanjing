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
                <a href="<?php echo U('Lens/userList');?>" class="btn btn-xs btn-info">客户列表</a>
					         <a href="<?php echo U('Lens/userLensAdd');?>" class="btn btn-xs btn-primary">新增配镜</a>
                </div>
            </div>
            
            
            <div class="wrapper wrapper-content animated fadeInRight">
            	<div style="margin-bottom:10px;">
				    <form action='' method='get' id='signupForm'>
				    <div style="margin-bottom:20px;">
				    
                                    
            <!-- <div class=" m-b-xs">
                <span>客户<font class="lens_l" style="font-weight:bold;color:red"><?php echo ($user["name"]); ?></font>的配镜信息：</span>
            </div> -->
                                    
				    </div>
				    </form>
			    </div>
            	<form action="<?php echo U('Goods/goodsHandle');?>" method="post">
             
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            
                            <div class="ibox-content">
                                
                                <div class="table-responsive">
                                	


<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="form-group">
<center>
    <div style="left">配镜时间：<?php echo ($v["gls_time"]); ?>|<a href="<?php echo U('Lens/userLensEdit',array('id'=>$v['id']));?>">[修改]</a></div>
    <table style="width: 900px;height: 240px" border="3" cellpadding="0" cellspacing="0">
       <tr>
           <th>姓名</th>
           <td><?php echo ($v["name"]); ?></td>
           <th>性别</th>
           <td><?php echo ($v["sex"]); ?></td>
           <th>地址</th>
           <td colspan="2"><?php echo ($v["address"]); ?></td>
           <th>电话</th>
           <td><?php echo ($v["mobile"]); ?></td>
       </tr>
       <tr>
           <th>年龄</th>
           <td><?php echo ($v["age"]); ?></td>
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
           <td><?php echo ($v["f_r_ballmirror"]); ?></td>
           <td><?php echo ($v["f_r_columnmirror"]); ?></td>
           <td><?php echo ($v["f_r_shaftposition"]); ?></td>
           <td><?php echo ($v["f_r_correcteyesight"]); ?></td>
           <th>镜架</th>
           <td colspan="2"><?php echo ($v["gls_frame"]); ?></td>
       </tr>
       <tr>
           <th>左</th>
           <td><?php echo ($v["f_l_ballmirror"]); ?></td>
           <td><?php echo ($v["f_l_columnmirror"]); ?></td>
           <td><?php echo ($v["f_l_shaftposition"]); ?></td>
           <td><?php echo ($v["f_l_correcteyesight"]); ?></td>
           <th>镜片</th>
           <td colspan="2"><?php echo ($v["lens"]); ?></td>
       </tr>
       <tr>
           <th rowspan="2">近用</th>
           <th>右</th>
           <td><?php echo ($v["n_r_ballmirror"]); ?></td>
           <td><?php echo ($v["n_r_columnmirror"]); ?></td>
           <td><?php echo ($v["n_r_shaftposition"]); ?></td>
           <td><?php echo ($v["n_r_correcteyesight"]); ?></td>
           <th>瞳距</th>
           <td><?php echo ($v["pupil_distance"]); ?>mm</td>
           <th>金额</th>
       </tr>
       <tr>
           <th>左</th>
           <td><?php echo ($v["n_l_ballmirror"]); ?></td>
           <td><?php echo ($v["n_l_columnmirror"]); ?></td>
           <td><?php echo ($v["n_l_shaftposition"]); ?></td>
           <td><?php echo ($v["n_l_correcteyesight"]); ?></td>
           <th>瞳高</th>
           <td><?php echo ($v["pupil_hight"]); ?>mm</td>
           <td><?php echo ($v["total_price"]); ?></td>
       </tr>
   </table>                                       
</center>
</div><?php endforeach; endif; else: echo "" ;endif; ?>


                                       
                                    
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
    	
    	
    	//确认选择参与抢购的商品
   		$(".add").click(function(){
       		var gid=$(this).attr("rel");
       		var name=$(this).attr("name");
       		var price=$(this).attr("id");
       		window.parent.call_back(gid,name,price);
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
       	
       	//专家推荐
       	$(".expert").click(function(){
       		var id=$(this).attr("id");//这是数据id
       		var status=$(this).attr("name");//这是当前状态 0禁用1正常
       		changeStatusOne('goods','id',id,status,"expert");
       	})  
       	
        //名画推荐
       	$(".painting").click(function(){
       		var id=$(this).attr("id");//这是数据id
       		var status=$(this).attr("name");//这是当前状态 0禁用1正常
       		changeStatusOne('goods','id',id,status,"painting");
       	})  
       	
        //是否新品
       	$(".is_new").click(function(){
       		var id=$(this).attr("id");//这是数据id
       		var status=$(this).attr("name");//这是当前状态 0禁用1正常
       		changeStatusOne('goods','id',id,status,"is_new");
       	})  

        //是否精品
        $(".is_best").click(function(){
          var id=$(this).attr("id");//这是数据id
          var status=$(this).attr("name");//这是当前状态 0禁用1正常
          changeStatusOne('goods','id',id,status,"is_best");
        })
       	
        //是否热销
       	$(".is_hot").click(function(){
       		var id=$(this).attr("id");//这是数据id
       		var status=$(this).attr("name");//这是当前状态 0禁用1正常
       		changeStatusOne('goods','id',id,status,"is_hot");
       	})  
        //是否代表作
        $(".is_masteropus").click(function(){
          var id=$(this).attr("id");//这是数据id
          var status=$(this).attr("name");//这是当前状态 0禁用1正常
          changeStatusOne('goods','id',id,status,"is_masteropus");
        })

        //是否是询价商品
        $(".is_enquiry").click(function(){
          var id=$(this).attr("id");//这是数据id
          var status=$(this).attr("name");//这是当前状态 0禁用1正常
          changeStatusOne('goods','id',id,status,"is_enquiry");
        })

        //是否询价中
        $(".enquiring").click(function(){
          var id=$(this).attr("id");//这是数据id
          var order_status = $(this).attr("order_status");
          var status=$(this).attr("name");//这是当前状态 0禁用1正常
          if(1==order_status && 1==status){
               alert('该商品已经下单！');return;
          }
          changeStatusOne('goods','id',id,status,"enquiring");
        })

        //是否是折扣商品
        $(".is_discount").click(function(){
          var id=$(this).attr("id");//这是数据id
          var status=$(this).attr("name");//这是当前状态 0禁用1正常
          changeStatusOne('goods','id',id,status,"is_discount");
        })

        //是否活动
        $(".is_activity").click(function(){
          var id=$(this).attr("id");//这是数据id
          var status=$(this).attr("name");//这是当前状态 0禁用1正常
          changeStatusOne('goods','id',id,status,"is_activity");
        })








    })
    </script>
</body>

</html>