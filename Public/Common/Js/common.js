/**
 * 放置公用的js
 */

	var Admin="/"
	var no="<img src='"+Admin+"Public/Common/images/no.png'/>";
		
		//去掉空格的方法
		function trim(str) {
		    return str.replace(/(^\s*)|(\s*$)/g, "");
		}
		
		//正则验证的方法
		function reg(reg,value){
			return reg.test(value);
		}
	
		//验证邮箱
		function email(value){
			var reg=/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
			return reg.test(value)
		}
		//提示失败的方法
		function no(str){
			return "&nbsp;<img src='"+Admin+"Public/Common/images/no.png'/>"+str;
		}
		
		
		//提示成功的方法
		function yes(str){
			return "&nbsp;<img src='"+Admin+"Public/Common/images/yes.png'/>"+str;
		}
		
		/**
		 * 修改禁用状态（一条数据，ajax）
		 * @author xuxiaowen
		 * @param   string  model     实力模型数据表名字
		 * @param   string  field     要修改的数据id的字段名称
		 * @param   int     id        要修改的id
		 * @param   int     status    当前状态，0为禁用    1为正常 
		 * @param   string  editfield 要修改的字段名称，默认为 status
		 */
		function changeStatusOne(model,field,id,status,editfield){
			var editfield = arguments[4] ? arguments[4] : "status"; 
			$.ajax({
	   			url:Admin+"admin.php/Admin/changeStatusOne",
	   			type:"post",
	   			data:"model="+model+"&field="+field+"&id="+id+"&status="+status+"&editfield="+editfield,
	   			success:function(re){
	   				var a=editfield+id;
	   				if(re==0){
	   					$("."+a).attr("name","1");
	   					if(editfield=="enquiring"){
	   						$("."+a).html("<img src='"+Admin+"Public/admin/img/enquiring.png'/>");
	   					}else{
	   						$("."+a).html("<img src='"+Admin+"Public/admin/img/yes.gif'/>");
	   					}
	   					
	   				}else if(re==1){
	   					$("."+a).attr("name","0");
	   					if(editfield=="enquiring"){
	   						$("."+a).html("<img src='"+Admin+"Public/admin/img/unenquiring.png'/>");
	   					}else{
	   						$("."+a).html("<img src='"+Admin+"Public/admin/img/no.gif'/>");
	   					}
	   					//$("."+a).html("<img src='"+Admin+"Public/admin/img/no.gif'/>");
	   				}
	   			}
			})//ajax的结束
		}
		//申请成为业务员
		function toSalesman(id,status,role){
			$.ajax({
	   			url:Admin+"admin.php/Admin/toSalesman",
	   			type:"post",
	   			data:"&id="+id+"&status="+status+"&role="+role,
	   			success:function(re){
	   				var a=role+id;
	   				if(re==0){
	   					$("."+a).attr("name","3");
	   					$("."+a).html("<img src='"+Admin+"Public/admin/img/yes.gif'/>");
	   				}else if(re==1){
	   					$("."+a).attr("name","1");
	   					$("."+a).html("<img src='"+Admin+"Public/admin/img/no.gif'/>");
	   				}
	   			}
			})
		}
		
		/**
		 * 修改禁用状态（商户端，一条数据，ajax）
		 * @author xuxiaowen
		 * @param   string  model     实力模型数据表名字
		 * @param   string  field     要修改的数据id的字段名称
		 * @param   int     id        要修改的id
		 * @param   int     status    当前状态，0为禁用    1为正常 
		 * @param   string  editfield 要修改的字段名称，默认为 status
		 */
		function changeStatusOneB(model,field,id,status,editfield){
			var editfield = arguments[4] ? arguments[4] : "status"; 
			$.ajax({
	   			url:Admin+"shop.php/Shop/changeStatusOneB",
	   			type:"post",
	   			data:"model="+model+"&field="+field+"&id="+id+"&status="+status+"&editfield="+editfield,
	   			success:function(re){
	   				var a=editfield+id;
	   				if(re==0){
	   					$("."+a).attr("name","1");
	   					$("."+a).html("<img src='"+Admin+"Public/admin/img/yes.gif'/>");
	   				}else if(re==1){
	   					$("."+a).attr("name","0");
	   					$("."+a).html("<img src='"+Admin+"Public/admin/img/no.gif'/>");
	   				}
	   			}
			})//ajax的结束
		}
		
		/**
		 * 修改数据排序的（ajax）
		 * @author  xuxiaowen
		 * @param   string  model     实力模型数据表名字
		 * @param   string  idfield   id的字段名字
		 * @param   string  sortfield 排序的字段名字
		 * @param   string  id的值 
		 */
		function changeSort(model,idfield,sortfield,sortable){
				var sortable = arguments[3] ? arguments[3] : "sortable"; 
			    //这是动画效果
			    $( "#"+sortable ).sortable({ revert: true });
				var revert = $('#'+sortable).sortable('option', 'revert');
			    $('#'+sortable).sortable('option', 'revert', true);
			    
			    //这是获取排序后的id上传到数据库
			    $( "#"+sortable ).sortable({update:function(){
			    	var ids="";
			    	$("#"+sortable+" .one").each(function() {
			    	   ids += $(this).attr("name") + ",";
			        });
			    	$.ajax({
			    		url:Admin+"admin.php/Admin/changeSort",
			    		type:"post",
			    		data:"model="+model+"&idfield="+idfield+"&sortfield="+sortfield+"&ids="+ids,
			    		success:function(re){
			    		}
			    	})
			    }});
			    $( "#"+sortable ).disableSelection();
		}
		
		
		/**
		 * 修改数据排序的（商户端）（ajax）
		 * @author  xuxiaowen
		 * @param   string  model     实力模型数据表名字
		 * @param   string  idfield   id的字段名字
		 * @param   string  sortfield 排序的字段名字
		 */
		function changeSortB(model,idfield,sortfield){
			    //这是动画效果
			    $( "#sortable" ).sortable({ revert: true });
				var revert = $('#sortable').sortable('option', 'revert');
			    $('#sortable').sortable('option', 'revert', true);
			    
			    //这是获取排序后的id上传到数据库
			    $( "#sortable" ).sortable({update:function(){
			    	var ids="";
			    	$("#sortable tr").each(function() {
			    	   ids += $(this).attr("name") + ",";
			        });
			    	$.ajax({
			    		url:Admin+"shop.php/Shop/changeSort",
			    		type:"post",
			    		data:"model="+model+"&idfield="+idfield+"&sortfield="+sortfield+"&ids="+ids,
			    		success:function(re){
			    		}
			    	})
			    }});
			    $( "#sortable" ).disableSelection();
		}
		
		/**
		 * 删除旧图片（一张，ajax）
		 * @author xuxiaowen
		 * @param   string  model  实力模型数据表名字
		 * @param   string  idfield  id的字段名字
		 * @param      int  id     要删除的id
		 * @param   string  name   要删除的文件的字段名称
		 * @param   string  cache  要清除缓存的s方法名字  
		 */
		function deleteOldFileOne(model,idfield,id,name,cache){
			$.ajax({
				url:Admin+"admin.php/Admin/deleteOldFileOne",
				type:"post",
				data:"model="+model+"&idfield="+idfield+"&id="+id+"&name="+name+"&cache="+cache,
				success:function(re){
					if(re=="success"){
						$("."+name).hide();
						$("."+name+id).hide();
						//删除头像的话，将menu的头像也删除，换成原装的。
						layer.confirm('删除成功', {icon: 6}, function(index){
							layer.close(index);
						});
					}else if(re=="fail"){
						//alert("删除失败");
						layer.confirm('删除失败', {icon: 5}, function(index){
							layer.close(index);
						});
					}else if(re=="noexsits"){
						//alert("不存在此文件");
						layer.confirm('不存在此文件', {icon: 7}, function(index){
							layer.close(index);
						});
					}
				}
			})
		}
		
		
		/**
		 * form表单查询（解决嵌套form表单的问题）
		 * @author xuxiaowen
		 * @param  string 	action1   第1个action
		 * @param  string 	action2   第2个action
		 * @param  string 	method1   第1个提交方式method1
		 * @param  string 	method2   第2个提交方式method2
		 */
		function form(action1,action2,method1,method2){
			$("#submit1").click(function(){
	       		$(".submitform").attr("action",action1);
	       		$(".submitform").attr("method",method1);
	       	})
	       	
	       	$("#submit2").click(function(){
	       		
	       		if(trim($("#search").val())==""){
	       			$("#search").focus();
	       			return false;
	       		}
	       		$(".submitform").attr("action",action2);
	       		$(".submitform").attr("method",method2);
	       	})
		}

/**
 *计时器
 */
function run1(){
	var s = document.getElementById("time");
	if(s.innerHTML == 0){
		document.getElementById("emailcode").innerHTML = "重发邮箱验证码";
	    window.flag = true;
	    return false;
	}
	setTimeout("run1()", 1000);
    s.innerHTML = s.innerHTML * 1 - 1;
}

//后台改变验证码
function admin_change_code(){
	var newcode=Admin+"admin.php/Public/verify/"+Math.random();
	//验证码清空
	$("[name='code']").focus();
	$("[name='code']").val("");
	$(".code-state").html("");
	$("#login").val("2");
	$(".code").attr("src",newcode);
}

function home_change_code(){
	var newcode=Admin+"index.php/Public/verify/"+Math.random();
	//验证码清空
	$(".homecode").attr("src",newcode);
}

//计算文件的大小
function getfilesize(size){
	// 单位自动转换函数
    var kb = 1024;         // Kilobyte
    var mb = 1024 * kb;   // Megabyte
    var gb = 1024 * mb;   // Gigabyte
    var tb = 1024 * gb;   // Terabyte
    
    if (size < kb) {
        return size +" B";
    } else if (size < mb) {
        return (size / kb).toFixed(2) + " KB";
    } else if (size < gb) {
        return (size / mb).toFixed(2) +" MB";
    } else if (size < tb) {
        return (size / gb).toFixed(2) +" GB";
    } else {
        return (size / tb) +" TB";
    }
}

/***********************以下是layer插件*****************************************/
/*
 *删除公用的（a标签的）
 */
function del(href,action,icon,btn1,btn2){
	var action = arguments[1] ? arguments[1] : "您确定删除么？"; 
	var icon = arguments[2] ? arguments[2] : 3; 
	var btn1 = arguments[3] ? arguments[3] : "确定"; 
	var btn2 = arguments[4] ? arguments[4] : "取消"; 
	layer.confirm(action, {icon: icon,btn:[btn1,btn2]}, function(index){
		$(".layui-layer-btn1").trigger("click");
		location.href=href;
	});
}


$().ready(function(){
	    //后台改变验证码(登陆和找回密码检测用户名)
		$(".code").click(function(){
			admin_change_code();
		})	
		
		 //后台改变验证码(登陆和找回密码检测用户名)
		$(".homecode").click(function(){
			home_change_code();
		})	
		
		//个人中心---删除头像
		$("#deleteavatar").click(function(){
			layer.confirm('你确定删除头像么？', {icon: 3}, function(index){
				deleteOldFileOne("user","user_id","0","avatar","Personal");
				layer.close(index);
			});
		})
		
		//网站设置----删除图片
		$(".delconfigpicture").click(function(){
			var id=$(this).attr("rel");
			layer.confirm('你确定删除此图片么？', {icon: 3}, function(index){
				deleteOldFileOne("config","id",id,"val","CONFIG_DATA");
				layer.close(index);
			});
		})
		
		
		//实现全选的操作(发送站内信的时候，通过标签搜索的)
		$(".chosealllabel").click(function(){
			
			var a=$(this).prop("checked");
			if(a){
				$("[name='label_user_id[]']").prop("checked",true);
			}else{
				$("[name='label_user_id[]']").prop("checked",false);
			}
		})
	
	

		//实现全选的操作（几个页面可以共用）选中的时候，按钮可以点击，不选中，按钮无法点击
		$(".choseall").click(function(){
			var a=$(this).prop("checked");
			if(a){
				$(this).css("background","url("+Admin+"Public/Common/images/checked.png)");
				$("[name='check[]']").prop("checked",true);
				$(".icheckbox_square-green").addClass("checked");
			}else{
				$(this).css("background","white");
				$("[name='check[]']").prop("checked",false);
				$(".icheckbox_square-green").removeClass("checked");
			}
		})
	
	
		//实现删除全部的操作提醒(公用)
		$(".deleteall").click(function(){
			if(confirm("确定清空所有么？")){
				return true;
			}else{
				return false;
			}
		})
		
		
		//确定操作。
		$(".ok").click(function(){
			if(confirm("确定么？确定后无法撤销，请谨慎操作！")){
				return true;
			}else{
				return false;
			}
		})
		
		
		
		//实现全部操作提醒(公用)
		$(".handleall").click(function(){
			if(confirm("确定执行此操作么？")){
				return true;
			}else{
				return false;
			}
		})
		
		
	
	/* 删除所选   通过按钮*/
	$(".deletechosebysubmit").on('click',function(){
		var a=true;
		var s=''; 
    	$('input[name="check[]"]:checked').each(function(){
    		s+=$(this).val()+','; 
    	})
    	len=s.length;
    	if(len>0){
    		if(confirm("确定确定执行此操作么？")){
	    		//s=s.substring(0,len-1); 
	    		//location.href="__APP__/Webset/deletemoread/ids/"+s;
	    		return true;
    		}else{
    			return false;
    		}
    	}else{
    		layer.alert('请选择您要操作的内容', {
    			icon: 0,
    		    skin: 'layui-layer-molv' //样式类名
    		    ,closeBtn: 0
    		});
    		return false;
    	}
	})
	
	/* 保存权限*/
	$(".submitaccess").click(function(){
		var a=true;
		var s=''; 
    	$('input[name="access[]"]:checked').each(function(){
    		s+=$(this).val()+','; 
    	})
    	len=s.length;
    	if(len>0){
    		if(confirm("确定分派这些权限么？")){
	    		//s=s.substring(0,len-1); 
	    		//location.href="__APP__/Webset/deletemoread/ids/"+s;
	    		return true;
    		}else{
    			return false;
    		}
    	}else{
    		layer.alert('请勾选您要分派的权限！', {
    			icon: 0,
    		    skin: 'layui-layer-molv' //样式类名
    		    ,closeBtn: 0
    		});
    		return false;
    	}
	})
})//ready的结束

