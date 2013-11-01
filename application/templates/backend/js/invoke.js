$(function($){
	
	$.ajax({
			   type: "POST",
			   url: site_url +"/backend/common/ajax_invoke_get",
			   data: {i_url:encodeURIComponent(location.href)},
			   success: function(msg){
			   	

			     	$("#invoke").val((msg));
			   }
	});

	
	$("#invoke").on({
		
		change:function(){
			
			var T = $(this);

			$.ajax({
			   type: "POST",
			   url: site_url +"/backend/common/ajax_invoke_save",
			   data: {i_content:$("#invoke").val(),i_url:encodeURIComponent(location.href)},
			   success: function(msg){
			     	T.css("border","none");
			   }
			});
		},
		dblclick:function(){
			$(this).css("border","1px solid #ff0000");
			$(this).attr('contentEditable',true);
			$(this).attr('onselectstart',true);
			return false;
		}
	});

	//right layer
	$("#floatShow").bind("click",function(){
	
		$("#onlineService").animate({width:"show", opacity:"show"}, "normal" ,function(){
			$("#onlineService").show();

		});
		
		$("#floatShow").attr("style","display:none");
		$("#floatHide").attr("style","display:block");
		
		return false;
	});
	
	$("#online_qq_tab").bind("click",function(){
	
		$("#onlineService").animate({width:"hide", opacity:"hide"}, "normal" ,function(){
			$("#onlineService").hide();
		});
		
		$("#floatShow").attr("style","display:block");
		$("#floatHide").attr("style","display:none");
		
		return false;
	});
  

})

	

