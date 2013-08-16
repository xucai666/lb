<?php
if (!defined('BASEPATH')) show_error('No direct script access allowed'); 
/**
  * start page for webaccess
  *
  * PHP version 5
  *
  * @category  PHP
  * @package   Library
  * @author    yehua <150672834@.com>
  * @copyright 2013 conqweal
  * @license   http://opensource.org/licenses/gpl-2.0.php GNU General Public License
  * @version   1.0$
  * @link      http://phpsysinfo.sourceforge.net
  */
 class Myform{
 	private static $instance;
 	function __construct(){
 		self::$instance = $this; 		
 	}
 	
 	public static function &get_myform(){ 		
 		return self::$instance;
 	}
 	
 	/**
 	 * 将表单数组转为数据库查询出的结构形式
 	 */
 	function post_to_set($form_detail){ 
 		try{ 			
	 		if(empty($form_detail)){
	 			throw new Exception("无数据提交");
	 		}	
	 		$detail_temp = null;		 		 		 		
	 		foreach($form_detail as $k=>$v){ 
	 			foreach($v as $k1=>$v1){	 				
	 				$new_form_detail[$k1][$k] = $v1;
	 				
	 			}
	 			
	 		}	 		
	 		return $new_form_detail;
 			
 		}catch(Exception $e){ 			
 			
 		}
 		
 		
 	}
 	
 	
 	/**
	 * 将数组合并成字符串
	 *
	 * @param array $arrays
	 * @return string
	 */
	function array_to_str($arrays,$split=','){
		$split = '';
		$strval = '';
		if(empty($arrays)) return null;
		foreach ($arrays as $v){
			if(!empty($v))
			{
				$strval.=$split.$v;
				$split=',';
			}
		}
		return $strval;
	}
	
	/**
	 * 数组重组
	 */
	function array_re_index($array,$key,$field_value=null){
		
		if(empty($array)) return array();
		$new_array = array();
		foreach($array as $k=>$v){
			if(empty($v[$key])) continue;
			if(is_array($field_value)){
				$temp_v = array();
				foreach($field_value as $v1){					
					$new_array[$v[$key]][$v1] = $v[$v1];
				}				
				
			}elseif($field_value==null){
				$new_array[$v[$key]]  = $v;
			}else{
				$new_array[$v[$key]]  = $v[$field_value];
				
			}
			
		}
		
		return $new_array;
		
		
	}
	
	/**
	 * 取表单明细最大索引
	 */
	function array_max_index($detail){
		return max(array_keys(end($detail)));
	}	 
 	
 }
 
 
 
function &get_myform(){	
	return Myform::get_myform();
} 
?>
