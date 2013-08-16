	//全选
	function checkAll(){
		var checked = $('#check_all').prop("checked");	
		var all_check;
		if(checked){
			all_check = true;
			
		}else{
			all_check=false;
		}
		$('[id="rights"]').prop("checked",all_check);
		
	}