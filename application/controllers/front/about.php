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
class About extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		
	
		
		

	}
	
	/**
	 * 普通用户登录
	 */
	function index()
	{
		// add breadcrumbs
		$this->load->library('Breadcrumb');
		$this->breadcrumb->append_crumb('Home', '/');
		$this->breadcrumb->append_crumb('About', 'about');
		$this->breadcrumb->output();
		$this->init_page->load_front_view('about',$data);
	}	
	
	
	
		
	
	
	
	
 
	
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */