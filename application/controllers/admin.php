<?php
/**
  * start page for webaccess
  *
  * PHP version 5
  *
  * @category  PHP
  * @package   Controller
  * @author    yehua <150672834@.com>
  * @copyright 2013 conqweal
  * @license   http://opensource.org/licenses/gpl-2.0.php GNU General Public License
  * @version   1.0$
  * @link      http://phpsysinfo.sourceforge.net
  */
 class Admin extends CI_Controller{
	function __construct(){
		parent::__construct();
		
		
	}
	
	/**
	 * [index description]
	 * @return [type] [description]
	 */
	function index(){		
		redirect("d=backend&c=login&m=index");
	}
	
	
	/**
	 * 转到英文版
	 */
	
	function en(){
		redirect("d=backend&c=common&m=lang_set?lang=en&url=".site_url("admin"));
		
	}
	
	
	/**
	 * 转到中文版
	 */
	
	function zh(){
		redirect("d=backend&c=common&m=lang_set?lang=zh&url=".site_url("admin"));
		
	}
	
	
	
}
?>
