$(function(){
	firstClose(0);
	function firstClose(l){
		var length = $(".td_click").length;
		for(var i=0 ;i<length ;i++){
			var id = $(".td_click").eq(i).attr("id");
			var ids = id.split("_");
			var level = parseInt(ids[0]);
			var col_id= parseInt(ids[1]);
			var pid=parseInt(ids[2]);
			$(".aa"+pid).hide();
			$(".a"+pid).prepend("<i class='aa"+pid+" fa fa-plus-square'></i>");
			if(level != l){
				$(".td_click").eq(i).parent("tr").css("display","none");
			}
		}
	}
	$(".td_click").click(function(event){
		event.preventDefault();
		var id = $(this).attr("id");
		var ids = id.split("_");
		var level = parseInt(ids[0]);
		var length = $(".td_click").length;
		var this_num = $(".td_click").index(this);
		var opens = [];
		var closes = [];
		for(var i = this_num+1;i<length;i++){
			var another_id = $(".td_click").eq(i).attr("id");
			var another_ids = another_id.split("_");
			var another_id1 = parseInt(another_ids[0]);
			
			var id0 = parseInt(ids[0]);
			var id1 = parseInt(ids[0]) + 1;
			var id2 = parseInt(another_ids[2]);
			
			if(id2>0){
				$(".aa"+id2).hide();
				$(".aa"+id0+id2).hide();
			}
			
			
			if(another_id1 > id0){
				if($("#"+another_id).parent("tr").css("display") == "none"){
					$(".a"+id2).prepend("<i class='aa"+id0+id2+" fa fa-minus-square'></i>");
					closes.push(i);
				}else{
					$(".a"+id2).prepend("<i class='aa"+id0+id2+" fa fa-plus-square'></i>");
					opens.push(i);
				}
			}else{
				break;
			}
		}
		
		if(opens.length > 0){
			for(var j = 0;j<opens.length;j++){
				$(".td_click").eq(opens[j]).parent("tr").css("display","none");
			}
		}else if(closes.length > 0){
			for(var j = 0;j<closes.length;j++){
				var close_id  = $(".td_click").eq(closes[j]).attr("id");
				var close_ids = close_id.split("_");
				var close_id1 = parseInt(close_ids[0]);
				if(level + 1 == close_id1){
					$(".td_click").eq(closes[j]).parent("tr").css("display"," ");
				}
			}
		}
	});
});