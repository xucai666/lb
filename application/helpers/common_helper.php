<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Code Igniter
 *
 * An open source application development framework for PHP 4.3.2 or newer
 *
 * @package		CodeIgniter
 * @author		Rick Ellis
 * @copyright	Copyright (c) 2006, pMachine, Inc.
 * @license		http://www.codeignitor.com/user_guide/license.html 
 * @link		http://www.codeigniter.com
 * @since		Version 1.0
 * @filesource
 */
 
if(!function_exists('display_size')){
		
	function display_size($file_size){ 

	
		//文件大于等于1073741824时用g表示 

		if($file_size >= 1073741824) 

		{ 

		$file_size = round($file_size / 1073741824 * 100) / 100 . "G"; 

		} 

		//文件>= 1048576 && <1073741824 时用m表示 

		elseif($file_size >= 1048576) 

		{ 

		$file_size = round($file_size / 1048576 * 100) / 100 . "M"; 

		} 

		//文件>= 1024 && <1048576 时用k表示 

		elseif($file_size >= 1024) 

		{ 

		$file_size = round($file_size / 1024 * 100) / 100 . "K"; 

		} 

		//文件 <1024 时用b表示 

		else{ 

		$file_size = $file_size . "B"; 

		} 

		return $file_size; 

	} 


}





/**
	 * 菜单选择
	 */
	function tree_options_deal($class_arr,$id,$index,$m)
	{	
		
		static $options;
		$n = str_pad('',$m,'-',STR_PAD_RIGHT);
		$n = str_replace("-","&nbsp;&nbsp;",$n);
		for($i=0;$i<count($class_arr);$i++){
		
			if($class_arr[$i][2]==$id){
				if($class_arr[$i][0]==$index||(is_array($index)&&in_array($class_arr[$i][0],$index))){
					$options.= "        <option value=\"".$class_arr[$i][0]."\" selected=\"selected\">".$n."|--".$class_arr[$i][1]."</option>\n";
				}else{
					$options.= "        <option value=\"".$class_arr[$i][0]."\">".$n."|--".$class_arr[$i][1]."</option>\n";
				}
				
				tree_options_deal($class_arr,$class_arr[$i][0],$index,$m+1);
				
			}
			
		}
		return $options;
		
	}


	function category_options($id=0,$index=0,$m=0){		
		$CI = &get_instance();
 		$tree_db = $CI->db->select('cc_id,cc_title,cc_parent_id',false)->from($cor_db->mytable('class_category'),false)->order_by('cc_id','asc')->order_by('sort','asc')->get()->result_array();
		
		foreach($tree_db as $k=>$v){
		
			$tree_temp[$k] = array($v['cc_id'],$v['cc_title'],$v['cc_parent_id']);
			
			
		}
		return tree_options_deal($tree_temp,$id,$index,$m);
		
	}
	
	
	
//菜单处理	
	
function get_area($id) {
	$cor_db  =  &get_cor_db();
	if( $id <= 1 ) return get_area_help( 1, 0 );
	$html = "";
	while( $id > 1 ) {	
		$sql_arr = array(
			'table_name'=>'ecs_region',
			'fields'=>'region_id, region_name,parent_id',
			'primary_id'=>'region_id',
			'primary_val'=>$id,
		);	
		
		$a = $cor_db->fetch_one($sql_arr);			
		$html = get_area_help( $a['parent_id'], $id ) ."<span>&nbsp;" .$html."</span>";
		$id = $a['parent_id'];
	}
	return $html;
}

function get_area_help( $pid, $id ,$select_name='area[]') {
	$CI  =  &get_instance();
	$html = "";
	$a = $CI->db->select( "region_id, region_name, parent_id",false)->from("ecs_region")->where ("parent_id",$pid)->get()->result_array();
	if( $a ) {
		$html .= "<select name='".$select_name."' onchange='region(this)'><option value='0'>请选择</option>";
		foreach( $a as $aa ) {
			$s = $id == $aa['region_id'] ? ' selected' : '';
			$html .= "<option value='{$aa['region_id']}'{$s}>{$aa['region_name']}</option>";
		}
		$html .= "</select>";
	}
	return $html;
}

function get_area_show( $id ) {
	$CI  =  &get_instance();
	$area = array();
	while( $id > 1 ) {
		
		$a = $CI->db->select( "region_id, region_name, parent_id")->from("ecs_region")->where("region_id",$id)->get()->result_array();
		$a = array_pop($a);		
		$id = $a['parent_id'];		
		$area[] = $a;
	}
	
	return $area;
}

function get_area_str( $id ) {
	$area = get_area_show( $id );	
	$i = 0;
	$aa = '';
	do {
		$aa = $area[$i]['region_name'] .($i ? '&nbsp;' : '').$aa;
		++$i;
	} while( $i < count( $area ) );
	return $aa;
}


if(!function_exists('msubstr')){
	function msubstr($string, $start, $end,$tail='...') {
		$spac = mb_detect_encoding($string) == 'UTF-8' ? 3 : 2;
		$len = strlen($string);
		$loop = 0;
		$st = 0;
		
		//get start positon
		for ($i = 0; $i < $len; $i++) {
			$loop++;
			if ($loop > $start)
				break;

			if (ord(substr($string, $i, 1)) > 0xa0) {
				$st += $spac;
				$i += $spac -1;
			} else {
				$st += 1;
			}

		}

		$loop = 0;
		$ed = 0;
		
		//get end positon
		for ($i = $st; $i < $len; $i++) {
			$loop++;
			if ($loop > $end)
				break;

			if (ord(substr($string, $i, 1)) > 0xa0) {
				$ed += $spac;
				$i += $spac -1;
			} else {
				$ed += 1;
			}

		}

		$str = substr($string, $st, $ed);

		if ($ed + $st < $len)
			$str .= $tail;
		return $str;
	}
}
?>