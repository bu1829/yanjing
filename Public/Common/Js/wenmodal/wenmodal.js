/**
 * 
 */
//居中效果
function resize(){
	$(".wen-modal").css({ 
        left: ($(window).width() - $(".wen-modal").outerWidth())/2, 
        top: 20
	});
}
		
$().ready(function(){
	//居中效果
	resize();
	$(window).resize(function () { 
			resize();
	});
	
	//关闭当前窗口
	$(".wen-modal-close").click(function(){
		$(".wen-modal").fadeOut();
		$(".wen-dropdown").fadeOut();
	})
})