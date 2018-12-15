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
</head>

<body>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        
        <ol class="breadcrumb" style="margin-top:20px;">
            <li>数据管理</li>
            <li><strong><?php echo ($meta_title); ?></strong></li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="alert alert-success alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
      	  温馨提示：请及时做好数据库备份，防止数据丢失无法恢复。
      	 <!-- <div style="padding:5px 0px;">系统自动备份时间为	<font style='color:#a40000'>每日凌晨2:00</font></div> -->
    </div>
	<!-- <div style="margin-bottom:10px;">
	<a href="<?php echo U('Authority/roleAdd');?>" class="btn btn-sm btn-primary" type="submit">角色添加</a>
	</div> -->
	<form action="" method="post">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                
                <div class="ibox-content">
                    <div class="row">
                        <!-- <div class="col-sm-4 m-b-xs">
                            <button class="deletemore btn btn-sm btn-danger" type="button">删除选中</button>
                             <a onclick="del('<?php echo U('Database/newBackup');?>','确定添加备份么？','3','添加')" class="btn btn-sm btn-success">添加新备份</a>
                        </div> -->

                        <div class="col-sm-4 m-b-xs">
                            <button class="deletemore btn btn-sm btn-danger" type="button">删除选中</button>
                             <!-- <a onclick="del('<?php echo U('Database/newBackup');?>','确定添加备份么？','3','添加')" class="btn btn-sm btn-success">添加新备份</a> -->

                             <a href="<?php echo U('Database/newBackup');?>" class="btn btn-sm btn-success">添加新备份</a>
                        </div>


                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                	<th><input type="checkbox" class="choseall"></th>
                                    <th>序号</th>
                                    <th>文件名</th>
                                    <th>文件大小</th>
                                    <th>备份时间</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            <?php if(!empty($lists)): if(is_array($lists)): foreach($lists as $key=>$row): if($key > 1): ?><tr class="database<?php echo ($key); ?>">
	                                    	<td><input type="checkbox" class='i-checks' name="check[]" title="<?php echo ($key); ?>" value="<?php echo ($row); ?>"></td>
	                                        <td><?php echo ($key-1); ?></td>
	                                        <td style="text-align: left"><a title="点击下载"  onclick="del('<?php echo U('Database/downloadData',array('file'=>$row));?>','确定下载此备份数据库么？','3','下载')"><?php echo ($row); ?></a></td>
	                                        <td><?php echo (getfilesize($row,$datadir)); ?></td>
	                                        <td><?php echo (getfiletime($row,$datadir)); ?></td>
	                                        <td>
	                                            <!-- <a class="btn btn-xs  btn-success" onclick="del('<?php echo U('Database/downloadData',array('file'=>$row));?>','确定下载此备份数据库么？','3','下载')">下载</a> -->

	                                            <a class="btn btn-xs  btn-success" href="<?php echo U('Database/downloadData',array('file'=>$row));?>">下载</a>
	                                            <a class="btn btn-xs  btn-info" onclick="del('<?php echo U('Database/databaseHandle',array('action'=>'RL','file'=>$row));?>','确定将数据库还原到当前备份吗？请务必谨慎操作。','3','还原')">还原</a>
	                                            <a id="<?php echo ($key); ?>" rel="<?php echo ($row); ?>" class="btn btn-xs  btn-danger deleteone">删除</a>
	                                        </td>
	                                    </tr><?php endif; endforeach; endif; ?>
	                            <?php else: ?>
	                            <tr>
	                                <td colspan="7">没有找到相关数据。</td>
	                            </tr><?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
<script type="text/javascript">
function deletedatabase(row,key){
	$(".layui-layer-btn1").trigger("click");
	//数据
	var info = {
		file:row,
		action:"Del",
    };
	$.ajax({
		url:"/index.php/Database/delData",
		type:"post",
		dataType:"json",
		data:info,
		success:function(re){
			var msg=re.msg;
			if(re.flag==1){
				$(".database"+key).remove();
			}
			layer.msg(msg);
		},
		beforeSend:function(){
			$("#"+key).html("正在删除 <i class='fa fa-spinner'></i>");
		},
		error:function(){
			layer.msg("异常，稍后重试！");
		}
	})
}
$().ready(function(){
	$(".deleteone").click(function(){//删除一个备份
		var row=$(this).attr("rel");
	    var key=$(this).attr("id");
 		layer.confirm('确定删除么？', {
			icon:3,btn: ['确定','取消'] //按钮
		}, function(){
			deletedatabase(row,key);
		});
	})
	
	/* 删除选中*/
	$(".deletemore").on('click',function(){
		var a=true;
		var s=''; 
    	$('input[name="check[]"]:checked').each(function(){
    		s+=$(this).val()+','; 
    	})
    	len=s.length;
    	if(len>0){
    		if(confirm("确定删除选中么？")){
	    		//s=s.substring(0,len-1); 
	    		//location.href="/index.php/Webset/deletemoread/ids/"+s;
	    		$('input[name="check[]"]:checked').each(function(){
	    			var row=$(this).val();
	    		    var key=$(this).attr("title");
	    		    deletedatabase(row,key);
	    		})
	    		return true;
    		}else{
    			return false;
    		}
    	}else{
    		layer.alert('请选择要删除的备份文件！', {
    			icon: 0,
    		    skin: 'layui-layer-molv' //样式类名
    		    ,closeBtn: 0
    		});
    		return false;
    	}
	})
})
</script>
</body>
</html>