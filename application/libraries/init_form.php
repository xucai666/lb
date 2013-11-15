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
 class Init_form{
 	private static $instance;
 	function __construct(){
 		self::$instance = $this; 		
 	}
 	
 	public static function &get_init_form(){ 		
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
	
	function get_post(){
		$CI = &get_instance();
		$r = $gets  = $posts = array();
		$gets = $CI->input->get();
		$posts = $CI->input->post();
		if($posts && $gets){
			$r =  array_merge($gets,$posts);
		}elseif($gets && empty($posts)){
			$r = $gets;
		}elseif(empty($gets) && $posts){
			$r = $posts;
		}
		
		return $r;
	}
	
	
	/**
	 * 取表单明细最大索引
	 */
	function array_max_index($detail){
		return max(array_keys(end($detail)));
	}	 
 	
 }
 
function &get_init_form(){	
	return init_form::get_init_form();
}