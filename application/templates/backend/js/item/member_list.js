		
	$(document).ready(function(){
		
		
		//提交修改，删除
		$('.link_del').click(function(){			
				var link_obj  = $(this);
				var dialog_obj = '#dialog_delete';
						
					$(dialog_obj).show().dialog({
					title:"删除确认：",
					buttons:[{
						text:'确定',
						iconCls:'icon-ok',
						handler:function(){	
							
							$(dialog_obj).dialog('close');
							self.location.href = $(link_obj).attr("href");
						}
					},{
						text:'取消',
						handler:function(){
							$(dialog_obj).dialog('close');
						}
					}]
				});
				
				return false;
				
				
		
		});
		
		
	
					
		
	})
	
	
	
	
	
	

	