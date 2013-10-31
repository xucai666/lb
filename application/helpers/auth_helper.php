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
 
if(!function_exists('my_encrypt')){
	 function my_encrypt($string=null, $operation) { 
		 	if(empty($string)) return '';
		 	if(empty($operation)) show_error('加密类型未设置');
		 	$key  = config_item('encryption_key');	
			$keylength = strlen($key);
			$string = $operation == 'DECODE' ? base64_decode($string) : $string;
			$coded = '';		
			for($i = 0; $i < strlen($string); $i += $keylength) {
			
				$coded .= substr($string, $i, $keylength) ^ $key;
				//substr 类似于.net中substring
			}	
			
			$coded = $operation == 'ENCODE' ? str_replace('=', '', base64_encode($coded)) : $coded;
			return $coded;
		 		
	}
}


if(!function_exists('init_base64_encode')){
	 function init_base64_encode($string) { 
		 	return my_encrypt($string, 'ENCODE');
		 		
	}
}

if(!function_exists('init_base64_decode')){
	 function init_base64_decode($string) { 
		 	return my_encrypt($string, 'DECODE');
		 		
	}
}

?>