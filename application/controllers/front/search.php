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
class Search extends CI_Controller {

	function __construct()
	{
		parent::__construct();	
		$this->load->model('Search_model','im');
		
 	
	}
	
	/**
	 * 普通用户登录
	 */
	function index()
	{
	
		$page_size = 15;

		//modules 
		$modules = array(
			'1'=>array('title'=>'新闻动态',),
			'2'=>array('title'=>'产品展示'),
			
		);

		$module_slt = $this->uri->segment(3)?$this->uri->segment(3):implode(',',array_keys($modules));

	
		$query = $this->db->query("CALL  proc_all('".$this->input->get("title")."','".$module_slt."','".(int)$this->input->get('per_page')."',".$page_size.")");  
		$ls = $query->result_array();
		$ct = $ls[0]['rt'];



		$this->init_db->set_page_link($page_size,$ct,null);

		$page_link  = $this->init_db->get_page_link();
		foreach($ls as &$v){
			$v['url'] = $this->im->get_url($v);
		}

		
		$data = array('list'=>$ls,'count'=>$ct,'page_link'=>$page_link,'modules'=>$modules);
	
	
		$this->db->reconnect();


		$this->init_page->load_front_view("search",$data);
		
	}	
	
	
	
	
	
 
	
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */