/*
* 作者：fifthmouse
* 说明：弹出窗口
* 帮助：查看弹出层设置参数地址：http://layer.layui.com/api.html
* 引用：js/layer/layer.js
* 备注：弹出窗口使用的是iframe，如果想用DOM，请修改一下两个参数：
* 	type: 1,
*	content: $('#id') //这里content是一个DOM
*	并且讲对应的iframe页面body中的代码，复制到对应的页面中去。
*	关闭窗口请参考 http://layer.layui.com/api.html#layer.close
*/


/*
* 用途：弹出窗口
* 涉及页面：专家主页 show/index.html
*/

$('#closeIframe').click(function(){
	parent.layer.msg('申请成功，请等待知嘛匠的反馈！');
	parent.layer.close(index);
});



/*
 * 用途：撤销订单页面
 * 涉及页面：专家主页 member/order/consult-info.html
 */
$('.revocation').click(function(){
	layer.confirm('你真的要撤销此订单么？', {icon: 3}, function(index){
		layer.close(index);
	});
});

/*$('.revocation2').click(function(){
	var index=layer.open({
		type: 2,
		title: false,
		closeBtn:2,
		area:['550px', '480px'],
		move: false,
		scrollbar: false,
		content: 'consult-revocation-popup.html'
	});
	parent.layer.iframeAuto(index);
});

$('.revocation2').click(function(){
	$.post('../member/order/consult-revocation-popup.html #popup', {}, function(str){
		layer.open({
			type: 1,
			title: false,
			closeBtn:2,
			area:'550px',
			move: false,
			content: str; //注意，如果str是object，那么需要字符拼接。
		});
	});
});
 */

/**
 * 以下是订单相关
 */

/**
 * 专家
 */
/*专家接受用户订单*/
$('.acceptorder').click(function(){
	layer.open({
		type: 1,
		title: false,
		closeBtn:2,
		area:'90%',
		move: false,
		content: $('#accept') //这里content是一个DOM
	});
});



$('.revocation2').click(function(){
	layer.open({
		type: 1,
		title: false,
		closeBtn:2,
		area:'550px',
		move: false,
		content: $('#popup') //这里content是一个DOM
	});
});

$(".close-popup").on("click",function(){
	//var index = layer.open();
	layer.closeAll();
});
$(".submit-revocation").on("click",function(){
	//var index = layer.open();
	layer.closeAll();
});

/*
 * 用途：弹出窗口
 * 涉及页面：评论页面 member/comment/index.html
 */
$('.open-comment').on('click', function(){
	var index=layer.open({
		type: 2,
		title: false,
		closeBtn:2,
		area:['550px', '480px'],
		move: false,
		scrollbar: false,
		content: 'add.html'
	});
	parent.layer.iframeAuto(index);
});
/*
 * 用途：弹出窗口
 * 涉及页面：金芝麻 充值 member/money/pay.html
 */
$('.popup-pay').on('click', function(){
	layer.open({
		type: 1,
		title: false,
		closeBtn:2,
		area:'450px',
		move: false,
		content: $('#popup') //这里content是一个DOM
	});
});

/*
 * 用途：增、删、改文件夹弹窗
 * 涉及页面：主页管理-作品集 member/set-show/gallery.html
 */
$(function(){
	/*弹窗效果方法依赖于layer.ext.js，默认不会加载，必须进行以下配置才可使用*/
	layer.config({
		extend: 'extend/layer.ext.js'
	});
});

/*$('#gallery-add-folder').on('click', function(){
	新建文件夹弹窗
	layer.prompt({
		formType: 0,
		title: '请输入文件夹名称'
	}, function(value, index, elem){
		alert(value); //得到value
		layer.close(index);
	});
});


$('.folder-name-edit').on('click', function(){
	修改文件夹弹窗
	layer.prompt({
		formType: 0,
		value:"文件夹名称",
		title: '请输入文件夹名称'
	}, function(value, index, elem){
		alert(value); //得到value
		layer.close(index);
	});
});*/


$('.folder-delete').on('click', function(){
	/*删除文件夹*/
	layer.confirm('你真的要删除该文件夹么？删除文件夹后，文件也同时会被删除。', {
		btn: ['删除','取消'] //按钮
	}, function(){
		layer.prompt({
			formType: 0,
			value:"文件夹名称",
			title: '请输入该文件夹名称'
		}, function(value, index, elem){
			alert(value); //得到value
			layer.close(index);
		});
	});
});

//删除标签
$('.tag-delete').on('click', function(){
    /*删除标签*/
	var id=$(this).attr("id");//要删除的id
    layer.confirm('你真的要删除该标签么？删除后权重数也会被删除。', {
        btn: ['删除','取消'] //按钮
    }, function(){
        layer.prompt({
            formType: 0,
            title: '请输入要删除的该标签名称'
        }, function(value, index, elem){
            location.href="labelDelete/name/"+value+"/id/"+id;
        });
    });
});


/*约见他*/
$('.meet').on('click', function(){
});




$('#open-qr-code').on('click', function(){
	layer.open({
		type: 1,
		title: false,
		area: '160px',
		shadeClose: true,
		content: $('#qr-code-box')
	});
});





/*
 * 用途：关闭父级窗口
 */

//关闭已点菜单
$("#close-menu").on("click",function(){
	var index = parent.layer.getFrameIndex(window.name); //获取当前窗体索引
	parent.$("#selected-menu").toggleClass("disabled");
	parent.layer.close(index);
});
//自定义关闭按钮
$(".close-window").on("click",function(){
	var index = parent.layer.getFrameIndex(window.name); //获取当前窗体索引
	parent.layer.close(index);
});


//提交
$(".btn-submit").on("click",function(){
	var index = parent.layer.getFrameIndex(window.name); //获取当前窗体索引
	parent.layer.close(index);
});
//取消
$(".btn-cancel").on("click",function(){
	var index = parent.layer.getFrameIndex(window.name); //获取当前窗体索引
	parent.layer.close(index);
});

