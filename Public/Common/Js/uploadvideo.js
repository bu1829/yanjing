$().ready(function(){
	/*视频1*/
		$(".video1").change(function(){
			var name=$(this).val();
			var a=name.lastIndexOf(".");
			var file=name.substr(a).toLowerCase();
			if(file!=".mp4"){
				layer.confirm('只支持.mp4格式的视频', {icon: 5}, function(index){
					layer.close(index);
				});
				$(this).val("");/* 清空刚才上传的图片 */
			}else{
				
			}	
		}) ;
		
	
		/*视频2*/
		$(".video2").change(function(){
			var name=$(this).val();
			var a=name.lastIndexOf(".");
			var file=name.substr(a).toLowerCase();
			if(file!=".mp4"){
				layer.confirm('只支持.mp4格式的视频', {icon: 5}, function(index){
					layer.close(index);
				});
				$(this).val("");/* 清空刚才上传的图片 */
			}else{
				
			}	
		}) ;	
})