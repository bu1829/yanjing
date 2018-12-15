  
function muimore3(pull,view,url,rowNum){
	var pull = arguments[0] ? arguments[0] : "pullrefresh"; 
	var view = arguments[1] ? arguments[1] : "view"; 
	mui.init
	  ({
	    pullRefresh: 
	    {
	      container: '#'+pull,
	      up: {
	        contentrefresh: '正在加载中..',
	        contentnomore:'没有更多数据了',//可选，请求完毕若没有更多数据时显示的提醒内容；
	        callback: pullupRefresh
	      }
	    }
	  });
	      
	  var count = 0;
	  /*
	   * 上拉加载具体业务实现
	   */
	  function pullupRefresh() 
	  {
	   setTimeout(function() {
		   var p=++count;//分页
		   $.ajax({
				  url:url+p,
				  type:"post",
				  dataType:"json",
				  success:function(obj){
					  //console.log(obj);
					  if(obj==null){
						  mui('#'+pull).pullRefresh().endPullupToRefresh(0<rowNum); 
					  }else{
						  var countnum=eval(obj).length;//当前分页的数目
					      mui('#'+pull).pullRefresh().endPullupToRefresh(countnum<rowNum);
						  $.each(obj, function (n, value) { 
							  var a=value['content'];
				              $("."+view).append(a);
				          }); 
					  }
				  }
			  })   
	    }, 1000);
	  }
	      
	  if (mui.os.plus) {
	    mui.plusReady(function() {
	      setTimeout(function() {
	        mui('#'+pull).pullRefresh().pullupLoading();
	      }, 1000);

	    });
	  } else 
	  { 
	    mui.ready(function() {
	      mui('#'+pull).pullRefresh().pullupLoading();
	    });
	  }
}

