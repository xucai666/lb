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
		$lang = get_cookie('lang');
		$lang_get = $_GET['lang'];		
		$lang = $lang_get?$lang_get:$lang;	
		$lang = $lang?$lang:config_item('language');		
		return $lang;			
	}	
		
	 }