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
		
	
		
		//启用缓存显示,key is action name,val is view name
		$act2view = array(
			'index'=>'about',
			'contact'=>'contact',
		);

		$this->cor_page->view_cache_all($act2view);
		

	}
	
	/**
	 * 普通用户登录
	 */
	function index()
	{
	
	

		$this->cor_page->load_front_view('about',$data);
	}	
	
	
	
		
	
	
	
	
	
	//新闻列表
	function archives_list(){			
		
		$this->cor_page->load_front_view("about_news",$data);
		
	}	

	
	
 
	
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */