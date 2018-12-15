var Index="/hzpfirst/index.php/Feedback/insertFeedback";
$(document).ready(function(){
	//ajax提交
	$("#feedback").click(function(){
		//标题
		var title=$("[name='title']").val();
		if(title.length<1 ||title.length>30){
			$("#title").html("<font color='red'>*必填</font>");
			$("[name='title']").focus();
			return false;
		}else{
			$("#title").html("<font color='green'>可以</font>");
		}
		
		//姓名
		var name=$("[name='name']").val();
		if(name.length<1 ||name.length>30){
			$("#name").html("<font color='red'>*必填</font>");
			$("[name='name']").focus();
			return false;
		}else{
			$("#name").html("<font color='green'>可以</font>");
		}
		
		
		//电话
		var phone=$("[name='phone']").val();
		if(phone.length<1 ||phone.length>30){
			$("#phone").html("<font color='red'>*必填</font>");
			$("[name='phone']").focus();
			return false;
		}else{
			$("#phone").html("<font color='green'>可以</font>");
		}
		
		

		//内容
		var content=$("[name='content']").val();
		if(content.length<10){
			$("#content").html("<font color='red'>*最少输入10位</font>");
			$("[name='content']").focus();
			return false;
		}else{
			$("#content").html("<font color='green'>可以</font>");
		}

		//验证码
		var feedcode=$("[name='feedcode']").val();
		if(feedcode.length!=4){
			$("#feedcode").html("<font color='red'>*请输入四位验证码</font>");
			$("[name='feedcode']").focus();
			return false;
		}else{
			$("#feedcode").html("");
		}
		
		
		$.ajax({
			url:Index,
			type:"post",
			data:"title="+title+"&name="+name+"&phone="+phone+"&content="+content+"&feedcode="+feedcode,
			success:function(re){
				if(re=="wrong"){
					alert("验证码错误！");
				}else if(re=="success"){
					alert("提交成功，感谢您的留言！");
					$("[name='title']").val("");
					$("[name='name']").val("");
					$("[name='phone']").val("");
					$("[name='email']").val("");
					$("[name='content']").val("");
					$("[name='feedcode']").val("");
					window.location.reload();
				}else if(re=="fail"){
					alert("提交失败，请您重新提交！");
				}
			}
		});//ajax的结束
		
		
	})
	
	
	
	
	
	
});//ready的结束