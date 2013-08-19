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
class Dynamic extends CI_Controller {

	function __construct()
	{
		parent::__construct();		
		//启用缓存显示,key is action name,val is view name
		$act2view = array(
			'index'=>'dynamic',
			'view'=>'dynamic_view',
			'archives_list'=>'about_news',
		);
		

		$this->mypage->view_cache_all($act2view);
		$this->load->library('Breadcrumb');

	}
	
	/**
	 * 普通用户登录
	 */
	function index()
	{	
	
			
		
		// add breadcrumbs
		$this->breadcrumb->append_crumb('Home', '/');
		$this->breadcrumb->append_crumb('Dynamic', 'front/dynamic');
		$this->breadcrumb->output();

		$this->mypage->load_front_view("dynamic",$data);
		
		
	}	
	
	
	
	//显示信息
	function view(){
		//加载语言包
		// add breadcrumbs
		$this->breadcrumb->append_crumb('Home', '/');
		$this->breadcrumb->append_crumb('Dynamic', 'front/dynamic');
		$this->breadcrumb->append_crumb('View', 'front/dynamic/view');
		$this->breadcrumb->output();
	
		$this->mypage->load_front_view("dynamic_view",$data);
	}
	
	
	
	
	
 
	
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */