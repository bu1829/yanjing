/**
 * 
 */
$(function() {  
    setInterval("time()", 1000);  
});  	
function time(){
	var mydate= new Date();
	var year=mydate.getFullYear();//四位的年
	var month=mydate.getMonth()+1;//月份
		if(month<10){
			var month="0"+month;
		}
	var date=mydate.getDate();//日
		if(date<10){
			var date="0"+date;
		}
	var hours=mydate.getHours();//小时
		if(hours<10){
			var hours="0"+hours;
		}
		
	var minutes=mydate.getMinutes();//分钟
		if(minutes<10){
			var minutes="0"+minutes;
		}
	var seconds=mydate.getSeconds();//秒钟
		if(seconds<10){
			var seconds="0"+seconds;
		}
		
	var day=mydate.getDay();//星期几
		if(day==0){
			var day="星期日";
		}else if(day==1){
			var day="星期一";
		}else if(day==2){
			var day="星期二";
		}else if(day==3){
			var day="星期三";
		}else if(day==4){
			var day="星期四";
		}else if(day==5){
			var day="星期五";
		}else if(day==6){
			var day="星期六";
		}

	var time=year+"年"+month+"月"+date+"日"+"&nbsp;"+day+"&nbsp;"+hours+":"+minutes+":"+seconds;
	$(".time").html(time);
}


