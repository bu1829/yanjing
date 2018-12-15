
//建立一個可存取到該file的url
/*function getObjectURL(file) {
	var url = null ; 
	if (window.createObjectURL!=undefined) { // basic
		url = window.createObjectURL(file) ;
	} else if (window.URL.createObjectURL!=undefined) { // mozilla(firefox)
		url = window.URL.createObjectURL(file) ;
	} else if (window.URL.webkitURL!=undefined) { // webkit or chrome
		url = window.webkitURL.createObjectURL(file) ;
	}
	return url;
}*/

function getObjectURL(file) {
  	if (window.navigator.userAgent.indexOf("Chrome") >= 1 || window.navigator.userAgent.indexOf("Safari") >= 1) {
    	return window.webkitURL.createObjectURL(file);
  	} else {
    	return window.URL.createObjectURL(file);
  	}
}

/**
 * 
 * @param ele   
 * @param maxsize  单位kb
 * @param remark   多大的，如2M
 */
function upload(ele,maxsize,remark,picture_max_size){
	var maxsize = arguments[1] ? arguments[1] : picture_max_size;
	//系统的提示
	if(picture_max_size<1){
		var picture_remark=(picture_max_size * 1000).toFixed(0)+"B";
	}else if(picture_max_size<1024){
		var picture_remark=picture_max_size+"K";
	}else if(picture_max_size>=1024){
		var picture_remark=(picture_max_size / 1024).toFixed(0)+"M";
	}
	var remark = arguments[2] ? arguments[2] : picture_remark; 
	$(ele).change(function(){
		var num=$(this).attr("id");//第几张图片
		var name=$(this).val();
		var a=name.lastIndexOf(".");
		var file=name.substr(a).toLowerCase();
		if(file!=".jpg" && file!=".jpeg" && file!=".bmp" && file!=".png" && file!=".gif"){
			$(this).val(""); //清空刚才上传的图片 
			layer.confirm('只支持.jpg.bmp.png.gif格式的图片', {icon: 5}, function(index){
				layer.close(index);
			});
		}else{
			//判断上传的大小
			var size=(this.files[0].size / 1024).toFixed(2);//控制在2M以内
			if(size>maxsize){
				$(this).val(""); //清空刚才上传的图片 
				layer.confirm('请上传小于'+remark+'的图片', {icon: 5}, function(index){
					layer.close(index);
				});
			}else{
				var objUrl = getObjectURL(this.files[0]) ;
				//console.log("objUrl = "+objUrl) ;
				if (objUrl) {
					$(".yulan"+num).empty(); //清空内容 
					$(".yulan"+num).css("background","white"); //预览背景变为白色 
					$(".yulan"+num).append("<img style='width:100px;height:100px;' src='"+objUrl+"'>");//放置图片
					//$(".picture"+num).attr("href",objUrl); //放置图片的链接 
					$(".openimg"+num).attr("src",objUrl); //显示图片显示
					$(".detail"+num).css("display","block"); //覆盖层出现 
					$(this).css("display","none");//上传图片的按钮消失  
					$(".haswater").show();//水印设置出现
				} 
			}
		}	
	})
}
$().ready(function(){
	     //图片的设置大小
		/* 每一张照片*/
		/*$(".inputimg").each(function(){
			//点击某一张的input框
			upload(this);
		})//each结束
		*/	
		$(".close").each(function(){	
			$(this).click(function(){
				var num=$(this).attr("rel");
				$(".inputimg"+num).val(""); //清空刚才上传的图片 
				$(".haswater").hide();//水印设置隐藏
				$(".yulan"+num).empty(); //清空预览内容 
				$(".yulan"+num).css("background","url("+Admin+"/Public/Common/images/upload.png)"); //恢复预览背景 
				$(".detail"+num).css("display","none"); //覆盖层消失 
				$(".inputimg"+num).css("display","block");//显示上传按钮 
			})
		})
		
		//点击预览
		$('.picture').on('click', function(){
			var num=$(this).attr("id");
			layer.open({
				type: 1,
				title: false,
				shadeClose: true,
				content: $('.open'+num)
			});
		});

})