	(function($) {  
    $.fn.PreviewImage = function(options) {  
        var Default = {  
            ImageClientId: "",  
            MaxWidth: 300,  
            MaxHeight: 300  
        };  
        $.extend(true, Default, options);  
        return this.each(function() {  
            if (Default.ImageClientId != "") {  
                $(this).unbind("change");  
                $(this).change(function() { 
	                var patn = /\.jpg$|\.jpeg$|\.gif$|\.png$|\.bmp$/i;
					if(!patn.test($(this).val())) {	
						alert("格式错误，请重新选择");
						return false;
					}			
                    if ($(this).val() == "") {  
                        $("#" + Default.ImageClientId).parent("div").hide();  
                        return;  
                    }  
                    else {  
                        $("#" + Default.ImageClientId).parent("div").show();  
                    }  
                    if ($.browser.msie) {  
                        $("#" + Default.ImageClientId).attr("src", $(this).val());  
                    }  
                    else {  
                        $("#" + Default.ImageClientId).attr("src", $(this)[0].files[0].getAsDataURL());  
                    }  
                    if ($.browser.msie && $.browser.version > 6) {  
                        $("#" + Default.ImageClientId).hide();  
                        $("#" + Default.ImageClientId).parent("div").css({ 'z-index': '999',  
                            'filter': 'progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)',  
                            'max-width': Default.MaxWidth + 'px', 'max-height': Default.MaxHeight + 'px',  
                            'width': Default.MaxWidth + 'px', 'height': Default.MaxHeight + 'px'  
                        });  
                        var div = $("#" + Default.ImageClientId).parent("div")[0];  
                        div.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = $("#" + Default.ImageClientId).attr("src");  
                    }  
                });  
  
                $("#" + Default.ImageClientId).load(function() {  
                    var image = new Image();  
                    image.src = $(this).attr("src");                  
				    $(this).attr("width", Default.MaxWidth);  
                    $(this).attr("height", Default.MaxHeight);  
                    $(this).attr("alt", Default.MaxWidth + "x" + Default.MaxHeight);  
                });  
            }  
        });  
    };  
})(jQuery); 









//ajax__加载报名单位
function loadSignCompany(url,city_id,obj_return){
	var reval;	
	$(obj_return+" option").each(function(){
		$(this).remove();
	
	})
	$.ajax({
	  type: "GET",
	  url: url+"?1=1&city_id="+city_id,
	  dataType: "json",
	  success:function(msg){	
		  	$.each(msg, function(i,item){
		  		 reval = '<option value="'+i+'">';
		  		 reval += item;
		  		 reval += '</option>';
		  		 $(reval).appendTo($(obj_return));
		  		
			  });  
	  }
	  
	});
}	




//ajax__所属省级代理
function load_parent_agent(url,province_id,obj_return){
	var reval;	
	$(obj_return+" option").each(function(){
		$(this).remove();
	
	})
	$.ajax({
	  type: "GET",
	  url: url+"?1=1&province_id="+province_id,
	  dataType: "json",
	  success:function(msg){	
		  	$.each(msg, function(i,item){
		  		 reval = '<option value="'+i+'">';
		  		 reval += item;
		  		 reval += '</option>';
		  		 $(reval).appendTo($(obj_return));
		  		
			  });  
			  $('#parent_agent_id').trigger('change');
	  }
	  
	});
	
	
	
}	


//ajax__所属授权机构
function load_sub_agent(url,parent_agent_id,obj_return){
	var reval;	
	$(obj_return+" option").each(function(){
		$(this).remove();
	
	})
	$.ajax({
	  type: "GET",
	  url: url+"?1=1&parent_agent_id="+parent_agent_id,
	  dataType: "json",
	  success:function(msg){	
		  	$.each(msg, function(i,item){
		  		 reval = '<option value="'+i+'">';
		  		 reval += item;
		  		 reval += '</option>';
		  		 $(reval).appendTo($(obj_return));
		  		
			  });  
	  }
	  
	});	
	
}	




//ajax__加载主考院校
function load_exam_school(url,province_id,obj_return){
	var reval;	
	$(obj_return).find("option").each(function(){
		$(this).remove();
	
	})
	$.ajax({
	  type: "GET",
	  url: url+"?1=1&province_id="+province_id,
	  dataType: "json",
	  success:function(msg){
		  	
		  	$.each(msg, function(i,item){
		  		 reval = '<option value="'+i+'">';
		  		 reval += item;
		  		 reval += '</option>';
		  		 $(reval).appendTo($(obj_return));
		  		
			  });  
	  }
	  
	});
}





$(function() {
			$(".datepicker").datepicker({
				pickerClass:"my-picker",
				autoSize:"false",
				
				dateFormat:"yy-mm-dd",monthNames:['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月']
			,
			dayNamesMin:['日', '一', '二', '三', '四', '五', '六']
			
			});
	});
