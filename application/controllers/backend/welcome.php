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
class Welcome extends CI_Controller{
	function __construct(){
		parent::__construct();
		//验证登陆
		$this->cor_auth->execute_auth();
	}


	/**
	 * 方法说明
	 */
	 function index(){
	 	try{
		 		$this->cor_page->load_backend_view('welcome');
		 	
	 		
	 	}catch(Exception $e){
	 		$this->cor_page->load_backend_view('page_redirect',$e->getMessage());
	 	}			
	 }
	
}
