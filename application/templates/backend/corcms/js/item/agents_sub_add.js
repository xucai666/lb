	//加载城市
	function   load_city_ext(url,parent_agent_id,obj_return){		
		var reval;	
		$(obj_return).find("option").each(function(){
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
	
