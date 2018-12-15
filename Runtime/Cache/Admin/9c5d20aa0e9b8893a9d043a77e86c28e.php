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
<body class="gray-bg">
     
        <style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover,{color:blue;}</style><div style="padding: 24px 48px;"> <h1>( ^_^ )</h1><p>欢迎来到 <b>好视力眼镜</b>！</p>
</body>
</html>