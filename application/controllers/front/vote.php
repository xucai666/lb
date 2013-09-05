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
class Vote extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
	
	}
	
	/**
	 * 普通用户登录
	 */
	function index()
	{

	

		$this->cor_page->load_front_view('vote_list',$data);
	}	
	
	
	
	
	
	
	/**
	 * 投票
	 */
	function view()
	{

	

		$this->cor_page->load_front_view('vote_view',$data);
	}	
	
	
	
		
	
	
	
	
	
	//新闻列表
	function action_save(){	
		$this->db->where('vd_id',$this->input->post('vd_item'));
		$this->db->set('vd_stat', 'vd_stat+1', FALSE);
		$this->db->update('module_vote_detail');
		$this->cor_page->front_redirect('front/vote/view');
		
	}	

	
	
 
	
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */