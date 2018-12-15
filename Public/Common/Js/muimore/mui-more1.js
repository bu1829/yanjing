function mui1(){
	mui.init
	({
	  pullRefresh: 
	  {
	    container: '#pullrefresh',
	    up: {
	      callback: pullupRefresh1
	    }
	  }
	});
	    
	var count = 0;
	/*
	 * 上拉加载具体业务实现
	 */
	function pullupRefresh1() 
	{
	 setTimeout(function() {
		   var p=++count;//分页
		   $.ajax({
				  url:"http://192.168.1.90/weixiao/phone.php/Travel/more2/types/1/p/"+p,
				  type:"post",
				  dataType:"json",
				  success:function(obj){
					  if(obj==null){
						  mui('#pullrefresh').pullRefresh().endPullupToRefresh(0<2); 
					  }else{
						  var countnum=eval(obj).length;//当前分页的数目
					      mui('#pullrefresh').pullRefresh().endPullupToRefresh(countnum<2);
						  $.each(obj, function (n, value) { 
							  var a=value['content'];
				              $(".view").append(a);
				          }); 
					  }
				  }
			  })   
	  }, 1000);
	}

	if (mui.os.plus) {
	  mui.plusReady(function() {
	    setTimeout(function() {
	      mui('#pullrefresh').pullRefresh().pullupLoading();
	    }, 1000);

	  });
	} else 
	{ 
	  mui.ready(function() {
	    mui('#pullrefresh').pullRefresh().pullupLoading();
	  });
	}
}