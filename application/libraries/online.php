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
 class Online {
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
		$cfg = $CI->init_cache->cache_fetch('sys_config');

 		$CI->init_page->fetch_css(array('online'),null,$CI->init_page->getRes('css','front'));	
 		$CI->init_page->fetch_js(array('online'),null,$CI->init_page->getRes('js','front'));	
 		$reval  = "<div class='online_qq'>";
		$reval .= "\n";
		$reval .= "<div id=\"online_qq_layer\">\n";
		$reval .= "	<div id=\"online_qq_tab\">\n";
		$reval .= "		<a id=\"floatShow\" style=\"display:block;\" href=\"javascript:void(0);\">收缩</a> \n";
		$reval .= "		<a id=\"floatHide\" style=\"display:none;\" href=\"javascript:void(0);\">展开</a>\n";
		$reval .= "	</div>\n";
		$reval .= "	<div id=\"onlineService\">\n";
		$reval .= "		<div class=\"onlineMenu\">\n";
		$reval .= "			<h3 class=\"tQQ\">QQ在线客服</h3>\n";
		$reval .= "			<ul>\n";
		$reval .= "				<li class=\"tli zixun\">在线咨询</li>\n";
		$qqs = explode(',', $cfg['contact']['qq']);
		foreach($qqs as $q){
		
			$qc = "<a target='_blank' href='http://wpa.qq.com/msgrd?v=3&uin=".$q."&site=qq&menu=yes'><img border='0' src='http://wpa.qq.com/pa?p=2:".$q.":41 &amp;r=0.22914223582483828' alt='点击这里' /></a>";

			$reval .= "				<li>".$qc."</li>\n";

		}
		$reval .= "			</ul>\n";
		$reval .= "		</div>\n";
		$reval .= "		<div class=\"onlineMenu\">\n";
		$reval .= "			<h3 class=\"tele\">QQ在线客服</h3>\n";
		$reval .= "			<ul>\n";
		$reval .= "				<li class=\"tli phone\">400-517-517</li>\n";
		$reval .= "				<li class=\"last\"><a class=\"newpage\" href=\"#\">新版调查</a></li>\n";
		$reval .= "			</ul>\n";
		$reval .= "		</div>\n";
		$reval .= "		<div class=\"btmbg\"></div>\n";
		$reval .= "	</div>\n";
		$reval .= "</div>\n";
		$reval .= "</div>\n";



 		
 		return $reval;
 	}
 	
 
 } 
 
 function &get_online(){	
	return Online::get_online();
}