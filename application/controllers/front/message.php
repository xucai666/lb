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
class Message extends CI_Controller {

	function __construct()
	{
		parent::__construct();	
		//
		$this->load->model('Message_model');
		$this->im = $this->Message_model;
		
	
	}
	
	/**
	 * 普通用户登录
	 */
	function index()
	{
		
 		
		$this->cor_page->load_front_view("message",$data);
		
	}	
	
	
	function action_list(){
		//clear cache
		$this->db->select("a.*",false)->from($this->cor_db->table('message').' as a ')	
		->where('a.ms_valid',"1")
		->order_by("ms_id","desc");
		$data = $this->cor_db->fetch_all(5);	
		$data = array_merge($data,array()	
		);		
		
		
		$this->cor_page->load_front_view("message_list",$data);
		
	}	
	
	
	function show_captcha(){
	
		$this->load->helper('imgCode');
		$imgcode=new imgcode();
		
		$imgcode->image(1);
		
		
	}	
	
	/**
	 *保存
	 */
	function save(){
		
		try{
	 		
		 	@session_start();
			if(strtolower($_SESSION['IMGCODE'])!=strtolower($this->input->post('captcha'))){
				throw new Exception('验证码输入错误');
				
			}
			$this->load->model('Message_model');
			$this->load->helper('date');
			$_POST['main']['ms_date'] = date("Y-m-d H:i:s");
			$_POST['main']['ms_ip'] = $this->input->ip_address();
			$this->cor_db->save($_POST,$this->Message_model->db_config());
			$this->cor_page->front_redirect('message','留言提交成功!');
	 		
	 	}catch(Exception $e){
	 		$this->cor_page->pop_redirect($e->getMessage(),"javascript:history.back(1);");	
	 		//$this->cor_page->backend_redirect($this->act.'/action_list',$e->getMessage());	  
	 	}			
		
		
	}
	
	

	

 
	
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */