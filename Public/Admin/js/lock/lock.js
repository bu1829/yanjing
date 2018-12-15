//锁屏以及被迫下线的
		//获得时间
		function submit(){
			//验证密码
    		var password=$("[name='password']").val();
    		reg=/^[\\~!@#$%^&*()-_=+|{}\[\],.?\/:;\'\"\d\w]{6,20}$/;
    		if(!reg.test(password)){
    			layer.msg("密码不符合规范");
    			return false;
    		}
    		
    		$.ajax({
    			 url: Admin+"admin.php/Public/unLock",
                 type: "post",
                 data:"password="+password,
                 success:function(msg){
                	 if(msg == "timeout"){
                		 //登陆超时
                		 del("login",'登录超时，请重新登录','5','重新登录','关闭');
                		 return false;
                	 }else if (msg == "right") {
                		 layer.msg("登录成功");
                         location.href=Admin+"admin.php/Index/index.html";
                     }else{
                        layer.msg(msg);
                     }
                 },
                 beforeSend:function(){
                	 $(".go").html("登录中...");
                 },
                 complete:function(){
                	 $(".go").html("登录");
                 },
                 error:function(){
                	 layer.msg("异常！");
                 }
    		})
		}

		function getTime()
        {
            var today=new Date();
            var h=today.getHours();
            var m=today.getMinutes();
            var s=today.getSeconds();
            // add a zero in front of numbers<10
            m=checkTime(m);
            s=checkTime(s);
            document.getElementById('showtime').innerHTML=h+":"+m+":"+s;
            t=setTimeout(function(){getTime()},500);
        }

        function checkTime(i)
        {
            if (i<10)
            {
                i="0" + i;
            }
            return i;
        }
        
        //以下为官方示例
        $().ready(function () {
        	$(document).keyup(function(event){
      		  if(event.keyCode ==13){
      			  submit();
      		  }
        	});
      	
	      	$(".go").click(function(){
	      		submit();
	      	})
        });