/**
 * 头像裁剪公用的
 */
    var g_oJCrop = null;  
    $(function(){  
        
        $(".jcrop-keymgr").css("display","none");
        //移动到头像上，显示“删除”按钮
        /*$("#current_avatar").mouseover(function(){
            $("#deleteavatar").show();
        })
        
        $("#current_avatar").mouseleave(function(){
            $("#deleteavatar").hide();
        })*/
        
        
        new qq.FileUploader({  
            element: document.getElementById('upload_avatar'),  
            action: ajax_upload_avatar, 
            multiple: false,  
            disableDefaultDropzone: true,  
            allowedExtensions: ["jpg", "jpeg", "png", "gif"],  
            uploadButtonText: '选择头像图片',  
            onComplete: function(id, fileName, json) {  
                //var data = $.parseJSON(json);
                //var data = eval('('+json+')');
                if(json.success)
                {
                    if(g_oJCrop!=null) g_oJCrop.destroy();
                    
                    $("#crop_tmp_avatar").val(json.tmp_avatar);
                    $("#crop_container").show();
                    $("#btn_save_crop").show();
                    $("#crop_target, #crop_preview").html('<img src="'+json.tmp_avatar+'">');

                    $('#crop_target img').Jcrop({
                        allowSelect: false,
                        onChange: updatePreview,
                        onSelect: updatePreview,
                        aspectRatio: width/height,
                        minSize:[width, height]
                    },function(){
                        g_oJCrop = this;
                        
                        var bounds = g_oJCrop.getBounds();
                        var x1,y1,x2,y2;
                        if(bounds[0]/bounds[1] > width/height)
                        {
                            y1 = 0;
                            y2 = bounds[1];

                            x1 = (bounds[0] - width * bounds[1]/height)/2
                            x2 = bounds[0]-x1;
                        }
                        else
                        {
                            x1 = 0;
                            x2 = bounds[0];
                            
                            y1 = (bounds[1] - width * bounds[0]/height)/2
                            y2 = bounds[1]-y1;
                        }
                        g_oJCrop.setSelect([x1,y1,x2,y2]);
                    });
                }
                else
                {
                    //alert(json.description);
                    layer.confirm(json.description, {icon: 5}, function(index){
                        layer.close(index);
                    });
                }
                
            }  
        });  
  
    });  
  
  
    function updatePreview(c)  
    {  
        $('#crop_x1').val(c.x);  
        $('#crop_y1').val(c.y);  
        $('#crop_x2').val(c.x2);  
        $('#crop_y2').val(c.y2);  
        $('#crop_w').val(c.w);  
        $('#crop_h').val(c.h);  
  
        if (parseInt(c.w) > 0)  
        {  
            var bounds = g_oJCrop.getBounds();  
  
            var rx = width / c.w;  
            var ry = height / c.h;  
              
            $('#crop_preview img').css({  
                width: Math.round(rx * bounds[0]) + 'px',  
                height: Math.round(ry * bounds[1]) + 'px',  
                marginLeft: '-' + Math.round(rx * c.x) + 'px',  
                marginTop: '-' + Math.round(ry * c.y) + 'px'  
            });  
        }  
    };  
  
  
  
    function saveCropAvatar()  
    {  
        if($("#crop_tmp_avatar").val()=="")  
        {  
            layer.confirm('您没有上传头像', {icon: 5}, function(index){
                layer.close(index);
            });
            return false;  
        }  
          
        $.ajax({  
            type: "POST",  
            url:ajax_crop,  
            data: $("#form_crop_avatar").serialize(),  
            dataType: "json",  
            success: function(json)  
            {  
                if(json.success)  
                {  
                    $("#crop_tmp_avatar").val("");  
                    $("#crop_container").hide();  
                    $(".qq-upload-list").hide();
                    $("#btn_save_crop").hide();
                    //头像换掉
                    $(".avatar").attr("src",json.avatar);
                    $("#avatar").attr("src",json.avatar);
                }  
                else  
                {  
                    //alert(json.description);  
                    layer.confirm(json.description, {icon: 5}, function(index){
                        layer.close(index);
                    });
                }  
            }  
        });  
    }  