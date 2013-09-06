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
	 * 普通用户登录
	 */
	function single()
	{
		$v_id = $this->uri->segment(4);

		$data =array('v_id'=>$v_id);
		$this->cor_page->load_front_view('vote_list_single',$data);
	}	
	


	
	
	/**
	 * 投票
	 */
	function view()
	{	
		$v_id = $this->uri->segment(4);
		$data =array('v_id'=>$v_id);
		$this->cor_page->load_front_view('vote_view',$data);
	}	
	
	
	
	//新闻列表
	function action_save(){	
		$posts = $this->input->post('vd_item');
		if(!($posts)){
			@header("content-type:text/html;charset=utf-8");
			echo "<script>top.art.dialog.tips('您还没有选择');setTimeout(function(){history.back(1)},1000);</script>";
	 		exit;
		}
		$this->db->where_in('vd_id',$posts);
		$this->db->set('vd_stat', 'vd_stat+1', FALSE);
		$this->db->update('module_vote_detail');
		if(get_cookie('voted')){
			@header("content-type:text/html;charset=utf-8");
			echo "<script type='text/javascript' charset='UTF-8'>top.art_dialog_close('你已经投过票了.');</script>";
	 		exit;
		}
		$cookie = array(
                   'name'   => 'voted',
                   'value'  => '1',
                   'expire' => time()+3600,
                   'domain' => '',
                   'path'   => '/',
               ); 
       	
        set_cookie($cookie);  
		$this->cor_page->front_redirect('vote/view');
	}	

	
	
 
	
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */