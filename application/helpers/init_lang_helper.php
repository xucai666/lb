<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP .. or newer
 *
 * @package		CodeIgniter
 * @author		Conqweal
 * @copyright	Copyright (c)  2013 , Fluxystar, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @version		Version 1.0
 * @filesource
 */

 if ( ! function_exists('lang_set'))
	 {
	 
	 /**
	 * 设置语种 
	 */
	function lang_set($lang){	
	echo $lang;
		$cookie = array(
               'name'   => 'lang',
               'value'  => $lang,
               'expire' => '86500',
               'domain' => '',
               'path'   => '/',
           );	
		set_cookie($cookie);
	}

}

	/**
	 * 设置语种 
	 */
	
	
	//获取语种
	
	 if ( ! function_exists('lang_get'))
	 {
	 
	function lang_get(){
		$lang = isset($_GET['lang'])?$_GET['lang']:get_cookie('lang');		
		$lang = $lang?$lang:config_item('language');		
		return $lang;			
	}	
		
	 }




	//获取语种
	
	 if ( ! function_exists('lang_url'))
	 {
	 
		function lang_url(){
			if(config_item('lang_multiple')){
				$lang = get_cookie('lang');
				$lang_get = $_GET['lang'];		
				$lang = $lang_get?$lang_get:$lang;	
				$lang = $lang?$lang:config_item('language');	
			}else{
				$lang =  '';
			}			
			return '/'.$lang.'/';			
		}	
		
	 }

	 /**
 * [next_lang description]
 * @param  [type] $key [description]
 * @return [type]      [description]
 */
function next_lang($vSearch){
        	$lang =config_item('support_language');
        	$i = 0;
        	if($lang[count($lang)-1] == $vSearch) return current($lang);
        	foreach($lang as $k=>$v){
        		if($i==1){
        			return $v;
        		}
        		if($v==$vSearch){
        			$i++;
        		}
        		
        	}
}