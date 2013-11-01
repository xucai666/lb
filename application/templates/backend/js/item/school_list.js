	//全选
	function checkAll(){
		var checked = $(this).attr("checked");
		var all_check;
		if(checked){
			all_check = true;
			
		}else{
			all_check=false;
		}
		$('[id="ids"]').attr("checked",all_check);
		
	}
	
	
	//检查是否选中
	function checkSelect(){	
		var check_size = $('[id="ids"]:checked').size();
		if(check_size==0){
				$('#dialog').show().dialog();
				return false;
		}	
		
		return true;		
	}
	
	

		
	
	
	$(document).ready(function(){
		$('#check_all').bind('click',checkAll);
		
		//触发提交
		$('#op_type').bind('change',function(){	
			$('#form1').submit();
			
		});
				
		
		//提交修改，删除
		$('#btn_update,#btn_delete').click(function(){			
			if(checkSelect()==true){					
				$('#op_type').val($(this).attr("op_type"))	
				var dialog_obj = '#dialog_delete';
				if($('#op_type').val()=='delete'){				
						$(dialog_obj).show().dialog({
						title:"删除确认：",
						buttons:[{
							text:'确定',
							iconCls:'icon-ok',
							handler:function(){		
								$('#op_type').trigger("change");
								$(dialog_obj).dialog('close');
							}
						},{
							text:'取消',
							handler:function(){								
								$(dialog_obj).dialog('close');
							}
						}]
					});
					
				}else{
					$('#op_type').trigger("change");

				}
				
				
			
			}else{
				return false;
			}
		});
		
		
	
		
	})
	
	
	
	
	
	

	