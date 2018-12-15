//锁屏以及被迫下线的
		//获得时间
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
        	//设置默认选项的
            // validate the comment form when it is submitted
            $("#commentForm").validate();

            // validate signup form on keyup and submit
            $("#signupForm").validate({
                rules: {
                	 password: {
                         required: true,
                         password: true,
                         remote: {
                             url: Admin+"shop.php/Public/unLock",
                             type: "post",
                             data: {
                                 password: function () {
                                     return $("[name='password']").val();　　　　//这个是取要验证的密码
                                 }
                             },
                             dataFilter: function (msg) {　　　　//判断控制器返回的内容
                            	 if(msg == "timeout"){
                            		 //登陆超时
                            		 del("login",'登录超时，请重新登录','5','重新登录','关闭');
                            		 return false;
                            	 }else if (msg == "right") {
                                     return true;
                                 }else if(msg == "wrong") {
                                     return false;
                                 }
                             }
                         }
                     },
                },
                messages: {
                	password: {
                        required:"<font style='color:#a40000'>6-20位，由数字、字母、符号组成</font>",
                        password:"<font style='color:#a40000'>6-20位，由数字、字母、符号组成</font>",
                        remote:"<font style='color:#a40000'>密码不正确</font>",
                    },
                },
                onfocus: true,　　　　
                onkeyup: false,　　　　//这个地方要注意，修改去控制器验证的事件。
                onsubmit: true
            });
        });/**
 * 
 */