function muitwo(){
	mui.init
	({
	  pullRefresh: 
	  {
	    container: '#pullrefresh2',
	    up: {
	      contentrefresh: '玩命加载中..',
	      contentnomore:'没有更多数据了',//可选，请求完毕若没有更多数据时显示的提醒内容；
	      callback: pullupRefresh2
	    }
	  }
	});
	    
	var count = 0;
	/*
	 * 上拉加载具体业务实现
	 */
	function pullupRefresh2() 
	{
	 setTimeout(function() {
		   var p=++count;//分页
		   $.ajax({
				  url:"http://192.168.1.90/weixiao/phone.php/Travel/more2/types/2/p/"+p,
				  type:"post",
				  dataType:"json",
				  success:function(obj){
					  console.log(obj);
					  var countnum=eval(obj).length;//当前分页的数目
					  var rowNum="<{$CONFIG.HOME_ROW_NUM}>";//设置的分页显示条数
				      mui2('#pullrefresh22').pullRefresh().endPullupToRefresh(countnum<rowNum);
					  $.each(obj, function (n, value) { 
						  var a=value['content'];
			              $(".view2").append(a);
			          });
				  }
			  })   
	  }, 1000);
	}
	    
	if (mui2.os.plus) {
	  mui2.plusReady(function() {
	    setTimeout(function() {
	      mui2('#pullrefresh2').pullRefresh().pullupLoading();
	    }, 1000);

	  });
	} else 
	{ 
	  mui2.ready(function() {
	    mui2('#pullrefresh2').pullRefresh().pullupLoading();
	  });
	}
}


