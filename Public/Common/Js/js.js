$(function(){
    /* $(".rotate_img").mouseover(function(){		  
			$(".rotate_on").css("height","290px").mouseover(function(){
				$(".rotate_top").slideDown("3000").stop(true,true);
			});	
			$(".rotate_on").mouseout(function(){
			     $(".rotate_top").css("display","none");
		    });
		 });*/
		 $(".rotate_img").mouseover(function(){
			 $(".div_scroll").css("display","block");
			 $('.div_scroll').scroll_absolute({arrows:true});
		 }); 
		 $(".div_scroll").mouseover(function(){
			$(this).css("display","block");		 
		 });
		 $(".div_scroll").mouseout(function(){			 
			 $(".div_scroll").css("display","none");
		 });
		 
		
	    $(".con01 ul li .rsp").hide();	
	    $(".con01 ul li").hover(function(){
	    	$(this).find(".rsp").stop().fadeTo(500,1)
		    $(this).find(".text").stop().animate({left:'0'}, {duration: 500})
     	},
    	function(){
		    $(this).find(".rsp").stop().fadeTo(500,0)
		    $(this).find(".text").stop().animate({left:'100%'}, {duration: "slow"})
	     	$(this).find(".text").animate({left:'-100%'}, {duration: 0})
	    });
		
/*		randOn();
function randOn(){
	var numY = 7;
	var $yLi = $(".Y").children("li");
	$yLi.removeClass("on");
	var lengthY = $yLi.length;
	var arrY = createRandom(numY,0,lengthY-1);
	for(var i =0;i<arrY.length;i++){
		$yLi.eq(arrY[i]).addClass("on");
	}
	
	var numB = 10;
	var $yLi = $(".B").children("li");
	$yLi.removeClass("on");
	var lengthB = $yLi.length;
	var arrB = createRandom(numB,0,lengthB-1);
	for(var i =0;i<arrB.length;i++){
		$yLi.eq(arrB[i]).addClass("on");
	}
	
	var numO = 10;
	var $yLi = $(".O").children("li");
	$yLi.removeClass("on");
	var lengthO = $yLi.length;
	var arrO = createRandom(numO,0,lengthO-1);
	for(var i =0;i<arrO.length;i++){
		$yLi.eq(arrO[i]).addClass("on");
	}
	
	var numN = 9;
	var $yLi = $(".N").children("li");
	$yLi.removeClass("on");
	var lengthN = $yLi.length;
	var arrN = createRandom(numN,0,lengthN-1);
	for(var i =0;i<arrN.length;i++){
		$yLi.eq(arrN[i]).addClass("on");
	}
	
	setTimeout(randOn,4000); 
}
*/
//alert(numY);
/*
num 要产生多少个随机数
from 产生随机数的最小值
to 产生随机数的最大值
*/
/*function createRandom(num ,from ,to )
{
	var arr=[];
	for(var i=from;i<=to;i++)
		arr.push(i);
	arr.sort(function(){
		return 0.5-Math.random();
	});
	arr.length=num;
	return arr;
}*/

    
    
	
	
    /*function showTime()
    {
    $(".Y").children("li").addClass("on");
    $(".Y").siblings().children("li").remove("on");
    }
    setInterval ("showTime()", 3000);*/



//右侧按钮
$("#leftsead a").hover(function(){
		if($(this).prop("className")=="youhui"){
			$(this).children("img.hides").show();
		}else{
			$(this).children("img.hides").show();
			$(this).children("img.shows").hide();
			$(this).children("img.hides").animate({marginRight:'0px'},'slow'); 
		}
	},function(){ 
		if($(this).prop("className")=="youhui"){
			$(this).children("img.hides").hide('slow');
		}else{
			$(this).children("img.hides").animate({marginRight:'-143px'},'slow',function(){$(this).hide();$(this).next("img.shows").show();});
		}
	});

	$("#top_btn").click(function(){if(scroll=="off") return;$("html,body").animate({scrollTop: 0}, 600);});
	
//在线留言
	var _userAgent = window.navigator.userAgent.toLowerCase();
	if(_userAgent.indexOf('android')<0 && _userAgent.indexOf('iphone')<0 &&  _userAgent.indexOf('ipad')<0 )
	{ 
			$('#ico_pp_a').click(function(){
				$('#pop_ly_id_div').show();	
				$('.shade').fadeIn(100);					  
			})
		
			
			$('#pop_ly_id_div dl dt span').click(function(){
				$("#pop_ly_id_div").hide();
				$('.shade').fadeOut(100);
			})			
			
			
			
	}
});


	


