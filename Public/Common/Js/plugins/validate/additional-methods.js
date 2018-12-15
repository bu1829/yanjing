/**
 * 自己添加的js验证
 * @author xuxiaowen
 */
/**
 * 以下是登录验证码校对
 */
jQuery.validator.addMethod("checkcode", function(value, element) {    //用jquery ajax的方法验证电话是不是已存在  
    var flag = 1;  
    $.ajax({  
        type:"post",  
        url:Admin+"admin.php/Public/checkCode",  
        async:false,                                             //同步方法，如果用异步的话，flag永远为1  
        data:{'code':value},  
        success: function(msg){  
             if(msg == '2'){  
                 flag = 0;  
             }  
             alert(msg)
        }  
    });  

    if(flag == 0){  
        return false;  
    }else{  
        return true;  
    }  
}, "请输入正确的验证码"); 



var ajax_url=Admin+"admin.php/Admin/checkOnly";
/**
 * 以下与角色相关的
 */
//验证角色的唯一性
jQuery.validator.addMethod("rolenamesame", function(value, element) {    //用jquery ajax的方法验证电话是不是已存在  
    var flag = 1;  
    $.ajax({  
        type:"POST",  
        url:ajax_url,  
        async:false,                                             //同步方法，如果用异步的话，flag永远为1  
        data:{'tablename':'auth_group','fieldname':'title','value':value},  
        success: function(msg){  
             if(msg == '2'){  
                 flag = 0;  
             }  
        }  
    });  

    if(flag == 0){  
        return false;  
    }else{  
        return true;  
    }  
}, "该角色名称已经存在"); 


/**
 * 以下是与用户相关的
 */
//验证用户名
jQuery.validator.addMethod("username", function(value, element) {   
    var tel = /^\w{4,20}$/i;
    return this.optional(element) || (tel.test(value));
}, "用户名4-20位，可由数字、字母、下划线组成");

//验证用户名的唯一性
jQuery.validator.addMethod("usernamesame", function(value, element) {    //用jquery ajax的方法验证电话是不是已存在  
    var flag = 1;  
    $.ajax({  
        type:"POST",  
        url:ajax_url,  
        async:false,                                             //同步方法，如果用异步的话，flag永远为1  
        data:{'tablename':'user','fieldname':'username','value':value},  
        success: function(msg){  
             if(msg == '2'){  
                 flag = 0;  
             }  
        }  
    });  

    if(flag == 0){  
        return false;  
    }else{  
        return true;  
    }  
}, "该用户名已经存在"); 


//验证密码
jQuery.validator.addMethod("password", function(value, element) {   
    var tel = /^[\\~!@#$%^&*()-_=+|{}\[\],.?\/:;\'\"\d\w]{6,20}$/;
    return this.optional(element) || (tel.test(value));
}, "密码6-20位,由数字、字母、符号组成");


//验证个性域名的唯一性
jQuery.validator.addMethod("domainnamesame", function(value, element) {    //用jquery ajax的方法验证电话是不是已存在  
    var flag = 1;  
    if(value!=""){
    	$.ajax({  
            type:"POST",  
            url:ajax_url,  
            async:false,                                             //同步方法，如果用异步的话，flag永远为1  
            data:{'tablename':'user','fieldname':'domain_name','value':value},  
            success: function(msg){  
                 if(msg == '2'){  
                     flag = 0;  
                 }  
            }  
        }); 
    }

    if(flag == 0){  
        return false;  
    }else{  
        return true;  
    }  
}, "该个性域名已经存在");



//验证邮箱的唯一性
jQuery.validator.addMethod("emailsame", function(value, element) {    //用jquery ajax的方法验证电话是不是已存在  
    var flag = 1;  
    if(value!=""){
    	$.ajax({  
            type:"POST",  
            url:ajax_url,  
            async:false,                                             //同步方法，如果用异步的话，flag永远为1  
            data:{'tablename':'user','fieldname':'email','value':value},  
            success: function(msg){  
                 if(msg == '2'){  
                     flag = 0;  
                 }  
            }  
        }); 
    }

    if(flag == 0){  
        return false;  
    }else{  
        return true;  
    }  
}, "该邮箱已经存在");

//验证邮箱的唯一性（后台管理员）
jQuery.validator.addMethod("adminemailsame", function(value, element) {    //用jquery ajax的方法验证电话是不是已存在  
    var flag = 1;  
    if(value!=""){
    	$.ajax({  
            type:"POST",  
            url:ajax_url,  
            async:false,                                             //同步方法，如果用异步的话，flag永远为1  
            data:{'tablename':'admin','fieldname':'email','value':value},  
            success: function(msg){  
                 if(msg == '2'){  
                     flag = 0;  
                 }  
            }  
        }); 
    }

    if(flag == 0){  
        return false;  
    }else{  
        return true;  
    }  
}, "该邮箱已经存在");


jQuery.validator.addMethod("phone", function(value, element) {   
    var tel = /^1[3|4|5|7|8][0-9]\d{8}$/;
    return this.optional(element) || (tel.test(value));
}, "请填写正确的手机号码");

//验证手机的唯一性
jQuery.validator.addMethod("phonesame", function(value, element) {    //用jquery ajax的方法验证电话是不是已存在  
    var flag = 1;  
    if(value!=""){
    	$.ajax({  
            type:"POST",  
            url:ajax_url,  
            async:false,                                             //同步方法，如果用异步的话，flag永远为1  
            data:{'tablename':'user','fieldname':'phone','value':value},  
            success: function(msg){  
                 if(msg == '2'){  
                     flag = 0;  
                 }  
            }  
        }); 
    }

    if(flag == 0){  
        return false;  
    }else{  
        return true;  
    }  
}, "该手机号已经存在");

//验证手机的唯一性
jQuery.validator.addMethod("adminphonesame", function(value, element) {    //用jquery ajax的方法验证电话是不是已存在  
    var flag = 1;  
    if(value!=""){
    	$.ajax({  
            type:"POST",  
            url:ajax_url,  
            async:false,                                             //同步方法，如果用异步的话，flag永远为1  
            data:{'tablename':'admin','fieldname':'phone','value':value},  
            success: function(msg){  
                 if(msg == '2'){  
                     flag = 0;  
                 }  
            }  
        }); 
    }

    if(flag == 0){  
        return false;  
    }else{  
        return true;  
    }  
}, "该手机号已经存在");

//验证手机的唯一性
jQuery.validator.addMethod("minephone", function(value, element) {    //用jquery ajax的方法验证电话是不是已存在  
    var flag = 1;  
    if(value!=""){
    	$.ajax({  
            type:"POST",  
            url:ajax_url,  
            async:false,                                             //同步方法，如果用异步的话，flag永远为1  
            data:{'tablename':'user','fieldname':'phone','value':value},  
            success: function(msg){  
                 if(msg == '2'){  
                     flag = 0;  
                 }  
            }  
        }); 
    }

    if(flag == 0){  
        return false;  
    }else{  
        return true;  
    }  
}, "该手机号已经存在");


jQuery.validator.addMethod("ip", function(value, element) {   
    var ip = /^((25[0-5]|2[0-4]\d|[01]?\d\d?)($|(?!\.$)\.)){4}$/;
    return this.optional(element) || (ip.test(value));
}, "请填写合法的ip");


//检查禁止ip的唯一性
//验证ip的唯一性
jQuery.validator.addMethod("ipsame", function(value, element) {    //用jquery ajax的方法验证电话是不是已存在  
    var flag = 1;  
    if(value!=""){
    	$.ajax({  
            type:"POST",  
            url:ajax_url,  
            async:false,                                             //同步方法，如果用异步的话，flag永远为1  
            data:{'tablename':'ipban','fieldname':'ip','value':value},  
            success: function(msg){  
                 if(msg == '2'){  
                     flag = 0;  
                 } 
            }  
        }); 
    }

    if(flag == 0){  
        return false;  
    }else{  
        return true;  
    }  
}, "该ip已经存在");


/**
 * 以下是与身份认证相关的
 */

//验证中文名称
jQuery.validator.addMethod("china", function(value, element) {   
    var   zw= /^([\u4E00-\u9FA5])*$/;
    return this.optional(element) || (zw.test(value));
}, "只能输入中文");


jQuery.validator.addMethod("china_english", function(value, element) {   
    var   ce= /^[a-zA-Z0-9_\u4e00-\u9fa5]+$/;
    return this.optional(element) || (ce.test(value));
}, "只能含有汉字、字母、数字、下划线");

jQuery.validator.addMethod("english", function(value, element) {   
    var   ce= /^[a-zA-Z0-9_]+$/;
    return this.optional(element) || (ce.test(value));
}, "只能含有字母、数字、下划线");


//验证用户名
jQuery.validator.addMethod("idnumber", function(value, element) {   
    var tel = /^(\d{15}$|^\d{18}$|^\d{17}(\d|X|x))$/;
    return this.optional(element) || (tel.test(value));
}, "身份证号不符合规范");






//验证提现金额
jQuery.validator.addMethod("price", function(value, element) {   
    var tel1 = /^[0-9][0-9]{0,9}[\.][0-9]{1,2}$/;
    var tel2 = /^[0-9][0-9]{0,9}$/;
    return this.optional(element) || (tel1.test(value)) || (tel2.test(value));
}, "请输入正确的金额");


//检查旧手机号的验证码
jQuery.validator.addMethod("tel_code", function(value, element) {    //用jquery ajax的方法验证电话是不是已存在  
  var flag = 1;  
  if(value!=""){
  	$.ajax({  
          type:"POST",  
          url:Admin+"index.php/Account/checkTelCode",  
          async:false,                                             //同步方法，如果用异步的话，flag永远为1  
          data:{'tel_code':value},  
          success: function(msg){  
               if(msg == '2'){  
                   flag = 0;  
               } 
          }  
      }); 
  }

  if(flag == 0){  
      return false;  
  }else{  
      return true;  
  }  
}, "验证码有误");


//检查旧手机号的验证码
jQuery.validator.addMethod("new_tel_code", function(value, element) {    //用jquery ajax的方法验证电话是不是已存在  
  var flag = 1;  
  if(value!=""){
  	$.ajax({  
          type:"POST",  
          url:Admin+"index.php/Account/checkNewTelCode",  
          async:false,                                             //同步方法，如果用异步的话，flag永远为1  
          data:{'new_tel_code':value},  
          success: function(msg){  
               if(msg == '2'){  
                   flag = 0;  
               } 
          }  
      }); 
  }

  if(flag == 0){  
      return false;  
  }else{  
      return true;  
  }  
}, "验证码有误");




//验证菜单名称是否存在（添加）
jQuery.validator.addMethod("menutitlesame", function(value, element) {    //用jquery ajax的方法验证电话是不是已存在  
    var flag = 1;  
    if(value!=""){
    	$.ajax({  
            type:"POST",  
            url:ajax_url,  
            async:false,                                             //同步方法，如果用异步的话，flag永远为1  
            data:{'tablename':'menu','fieldname':'title','value':value},  
            success: function(msg){  
                 if(msg == '2'){  
                     flag = 0;  
                 }  
            }  
        }); 
    }

    if(flag == 0){  
        return false;  
    }else{  
        return true;  
    }  
}, "该菜单名称已经存在");


//验证权限中文名称是否存在（添加）
jQuery.validator.addMethod("nodetitlesame", function(value, element) {    //用jquery ajax的方法验证电话是不是已存在  
    var flag = 1;  
    if(value!=""){
    	$.ajax({  
            type:"POST",  
            url:ajax_url,  
            async:false,                                             //同步方法，如果用异步的话，flag永远为1  
            data:{'tablename':'auth_rule','fieldname':'title','value':value},  
            success: function(msg){  
                 if(msg == '2'){  
                     flag = 0;  
                 }  
            }  
        }); 
    }

    if(flag == 0){  
        return false;  
    }else{  
        return true;  
    }  
}, "该中文名称已经存在");



