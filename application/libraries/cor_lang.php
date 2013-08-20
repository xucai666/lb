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
 class Cor_lang {
 	private static $instance;
 	
 	function __construct($db_conn=null){
 		$CI = &get_instance();
 		if(!$CI->Common_model){
 			$CI->load->model('Common_model');
 		} 
 		
 		$CI->db = $CI->load->database(lang_get(),true);
    
 		$CI->load->library('cor_db');
 				
 		$CI->cor_db->setDs($CI->db);

 	}
 	 
 	
 	 	 	 
 	public static function &get_cor_lang(){ 	
 		return self::$instance;
 	}
 		
 	 
 	
 
 } 
 
 function &get_cor_lang(){	
	return cor_lang::get_cor_lang();
} 
	


 
 
?>
