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
 class Invoke {
 	private static $instance;
 	
 	function __construct($db_conn=null){
 		
 		//new instance
 		
 		 		
 		self::$instance = $this;
 		
 	}

 	/**
 	 * [开发日志]
 	 * @return [string] [触发右下弹窗]
 	 */
 	function run(){
 		$CI = &get_instance();
 		$CI->init_page->fetch_css(array('invoke'),null,$CI->init_page->getRes('css','backend'));	
 		$CI->init_page->fetch_js(array('invoke'),null,$CI->init_page->getRes('js','backend'));	
 		$reval  = "";
		$reval .= "\n";
	
		$reval .= "\n";
		$reval .= "<div id=\"online_qq_layer\">\n";
		$reval .= "	<div id=\"online_qq_tab\">\n";
		$reval .= "		<a id=\"floatShow\" style=\"display:block;\" href=\"javascript:void(0);\">收缩</a> \n";
		$reval .= "		<a id=\"floatHide\" style=\"display:none;\" href=\"javascript:void(0);\">展开</a>\n";
		$reval .= "	</div>\n";
		$reval .= "	<div id=\"onlineService\">\n";
		$reval .= "		<div class=\"onlineMenu\">\n";
		$reval .= "			<h3 class=\"tQQ\">QQ在线客服</h3>\n";
		$reval .= '			<textarea id="invoke" style="width:100px;height:250px;overflow-y:visible;display:block;border:none;" onselectstart="return false;" >test</textarea>';
		$reval .= "		</div>\n";
		$reval .= "		<div class=\"btmbg\"></div>\n";
		$reval .= "	</div>\n";
		$reval .= "</div>\n";


 		
 		return $reval;
 	}
 	
 
 } 
 
 function &get_invoke(){	
	return Invoke::get_invoke();
}