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
 class Mylang {
 	private static $instance;
 	
 	function __construct($db_conn=null){
 		$CI = &get_instance();
 		if(!$CI->Common_model){
 			$CI->load->model('Common_model');
 		} 
 		
 		$CI->db = $CI->load->database($CI->Common_model->lang_get(),true);
    
 		$CI->load->library('mydb');
 				
 		$CI->mydb->setDs($CI->db);

 	}
 	 
 	
 	 	 	 
 	public static function &get_mylang(){ 	
 		return self::$instance;
 	}
 		
 	 
 	
 
 } 
 
 function &get_mylang(){	
	return Mylang::get_mylang();
} 
	


 
 
?>
