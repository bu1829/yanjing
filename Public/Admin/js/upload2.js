
//建立一個可存取到該file的url
function getObjectURL(file) {
	var url = null ; 
	if (window.createObjectURL!=undefined) { // basic
		url = window.createObjectURL(file) ;
	} else if (window.URL.createObjectURL!=undefined) { // mozilla(firefox)
		url = window.URL.createObjectURL(file) ;
	} else if (window.URL.webkitURL!=undefined) { // webkit or chrome
		url = window.webkitURL.createObjectURL(file) ;
	}
	return url;
}


$().ready(function(){
		/* 每一张照片*/
		$(".inputimg").each(function(){
			//点击某一张的input框
			$(this).change(function(){
				var num=$(this).attr("id");//第几张图片
				//$(this).attr("id","10");
				var name=$(this).val();
				var a=name.lastIndexOf(".");
				var file=name.substr(a).toLowerCase();
				if(file!=".jpg" && file!=".bmp" && file!=".png" && file!=".gif"){
					alert("只支持.jpg.bmp.png.gif格式的图片");
					$(this).val(""); 清空刚才上传的图片 
				}else{
					var objUrl = getObjectURL(this.files[0]) ;
					console.log("objUrl = "+objUrl) ;
					if (objUrl) {
						$(".yulan"+num).empty(); //清空内容 
						$(".yulan"+num).css("background","white"); //预览背景变为白色 
						$(".yulan"+num).append("<img style='width:100px;height:100px;' src='"+objUrl+"'>");//放置图片
						$(".picture"+num).attr("href",objUrl); //放置图片的链接 
						$(".detail"+num).css("display","block"); //覆盖层出现 
						$(this).css("display","none");//上传图片的按钮消失  
					} 
				}	
				
			})
		})//each结束
		
		$(".close").each(function(){	
			$(this).click(function(){
				var num=$(this).attr("rel");
				$(".inputimg"+num).val(""); //清空刚才上传的图片 
				$(".yulan"+num).empty(); //清空预览内容 
				$(".yulan"+num).css("background","url("+Admin+"Public/Admin/images/upload.png)"); //恢复预览背景 
				$(".detail"+num).css("display","none"); //覆盖层消失 
				$(".inputimg"+num).css("display","block");//显示上传按钮 
			})
		})
	   
	
	
	
	
		/*$("#file1").change(function(){
			var name=$(this).val();
			var a=name.lastIndexOf(".");
			var file=name.substr(a).toLowerCase();
			if(file!=".jpg" && file!=".bmp" && file!=".png" && file!=".gif"){
				alert("只支持.jpg.bmp.png.gif格式的图片");
				$(this).val(""); 清空刚才上传的图片 
			}else{
				var objUrl = getObjectURL(this.files[0]) ;
				console.log("objUrl = "+objUrl) ;
				if (objUrl) {
					 $("#img0").attr("src", objUrl) ; 
					$(".file1").empty(); 清空内容 
					$(".file1").css("background","white"); 预览背景变为白色 
					$(".file1").append("<img style='width:100px;height:100px;' src='"+objUrl+"'>");放置图片
					$(".picture1").attr("href",objUrl); 放置图片的链接 
					$(".file11").css("display","block"); 覆盖层出现 
					$("#file1").css("display","none");上传图片的按钮消失  
				} 
			}	
		}) ;
		
		//点击 x号 关闭
		$(".close1").click(function(){
			$("#file1").val(""); 清空刚才上传的图片 
			$(".file1").empty(); 清空预览内容 
			$(".file1").css("background","url("+Common+"Public/common/images/upload.png)"); 恢复预览背景 
			$(".file11").css("display","none"); 覆盖层消失 
			$("#file1").css("display","block");显示上传按钮 
		})*/
		
		
		
	

		

		
		
		
		
})