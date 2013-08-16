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

	 if ( ! function_exists('css_url'))
	 {
	 	
	 	/**
	 	 * css路径
	 	 * @param  string $uri     css文件名
	 	 * @param  string $type    类型，front=>前后，backend=>后台
	 	 * @param  string $catalog 指定路径
	 	 * @return string          
	 	 */
	     function css_url($uri=null,$type='front',$catalog=null)
	     {

	         if(empty($uri)) return theme_url($type)."/css/";
	         $catalog = $catalog ? $catalog:theme_url($type)."/css/";
	         $str= "<link rel='stylesheet' type='text/css' href='".$catalog.$uri.".css' media='all'>";
	         return $str;
	     }
	 }
	 //---------------------------------
	 if ( ! function_exists('js_url'))
	 {
	 	/**
	 	 * 脚本路径
	 	 * @param  string $uri     js文件名
	 	 * @param  string $type    类型，front=>前后，backend=>后台
	 	 * @param  string $catalog 指定路径
	 	 * @return string          
	 	 */
	     function js_url($uri=null,$type='front',$catalog=null)
	     {
	         if(empty($uri)) return theme_url($type)."/js/";
	         $catalog = $catalog ? $catalog:theme_url($type)."/js/";  
	         $str= "<script type='text/javascript' src='".$catalog.$uri.".js' ></script>";
	         return $str;
	     }
	 }


	 //---------------------------------
	 if ( ! function_exists('img_url'))
	 {
	 	
	 	/**
	 	 * 图片路径
	 	 * @param  string $uri     文件名称，包括扩展名
	 	 * @param  string $type    类型，front=>前后，backend=>后台
	 	 * @param  string $catalog 指定目录
	 	 * @return string          
	 	 */
	     function img_url($uri=null,$type='front',$catalog=null)
	     {
	         if(empty($uri)) return theme_url($type)."/images/";
	         $catalog = $catalog ? $catalog:theme_url($type)."/images/";
	         $str= "<img src='".$catalog.$uri."' />";
	         return $str;
	     }
	 }

	 //---------------------------------
	 if ( ! function_exists('theme_url'))
	 {
	 	/**
	 	 * 模板路径
	 	 * @param  string $type 类型，front=>前后，backend=>后台
	 	 * @param  string $lang 语种目录
	 	 * @return string      
	 	 */
	     function theme_url($type='front',$lang=null)
	     {
	         $CI =& get_instance();
	         $lang = $lang?$lang:$CI->Common_model->lang_get();
	         $c_f = $CI->mycache->cache_fetch('sys_config');
	         $c_theme = $c_f['develop']['template'];
	         $path = base_url($CI->config->item('template_dir').$type."/".$c_theme);
	         $path = ($type == 'front')? $path.'/'.$lang:$path;
	         return $path . '/';
	     }
	 }

	  //---------------------------------
	 if ( ! function_exists('getRootUrl'))
	 {

		/**
		 * url根路径
		 * @param  string $key  类型，img=>图片,css->样式,js=>脚本,theme=>模板
		 * @param  string $type front=>前台,backend=>后台
		 * @return string       
		 */
	 	function getRootUrl($key,$type='front'){
			$full_key  = $key.'_url';	
			return  $full_key(null,$type);		
		}

	 }