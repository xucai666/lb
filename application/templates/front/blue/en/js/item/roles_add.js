	//全选
	function checkAll(){
		var checked = $('#check_all').attr("checked");	
		var all_check;
		if(checked){
			all_check = true;
			
		}else{
			all_check=false;
		}
		$('[id="rights"]').attr("checked",all_check);
		
	}