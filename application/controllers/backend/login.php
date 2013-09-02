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
class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
			
		$this->lang->load('item_backend_login',lang_get());
		$cur_lang = $this->lang->language;
		$this->tpl->assign('lang_login',$cur_lang);
		$this->m_lang = (object)$cur_lang;
		
		
	}
	
	function index()
	{
		if(get_cookie('user_id')){
			$this->cor_page->backend_redirect('login/center');
		}			
		$this->load->helper('form');	
		$this->cor_page->fetch_css(array('login'));	
		$this->cor_page->load_backend_view("login");
		
		
	}	
	

	
	function chklogin(){	
		try{
			
		  	  
			  $this->load->library('encrypt');		
			  $this->form_validation->set_rules('user_name',$this->m_lang->username, 'required|callback_user_name_check');
			  $this->form_validation->set_rules('user_pass', $this->m_lang->password, 'required|callback_user_pass_check');
			  if ($this->form_validation->run() == FALSE){
			  	$tpl_name = 'login';
			  	$this->cor_page->load_backend_view($tpl_name);
			  	
			  }
			  else{				  	
				  	$select_config  = array(
			 			'primary_id'=>'admin_user',
			 			'primary_val'=>$this->input->post("user_name"),
			 			'table_name'=>$this->cor_db->table('admins'),
		 			);	
		 			
			  		$login_info_temp = $this->db->select('a.*,b.rights',false)->from($this->cor_db->table('admins').' as a')->join($this->cor_db->table('roles').' as b','a.group_id=b.role_id','`')
			  		->where('a.admin_user','\''.$this->input->post("user_name").'\'',false)->get()->result_array();
			  		$login_info = $login_info_temp[0];
			  		$this->cor_auth->process_login(array("user_name"=>$login_info['admin_user'],"user_id"=>$login_info['admin_id']));
			  		$this->cor_page->pop_redirect($this->m_lang->inp_login_ok.$ucsynlogin,site_url("backend/login/center"),'parent');
			  }
			
		}catch(Exception $e){
			show_error($e->getMessage());
		}		
		  
		 
	}
	
	/**
	 * 中心
	 */
	function center(){	
			$this->cor_auth->execute_auth();
			$this->cor_page->fetch_js('artdialog/jquery.artDialog','view',getRootUrl('js','backend'));	
			$this->lang->load("item_backend",lang_get());
			$data['lang_sys']  = $this->lang->language;
			$data['lang_all_options'] = $this->Common_model->lang_all();
			$data['rights_options'] = $this->cor_auth->fetch_rights_menus($this->cor_auth->db_user('group_id'),true);

		

			$lang_link  = $this->cor_cache->cache_fetch("lang_type",null,$lang_show);	
			$data['lang_link']  = $lang_link[$lang_show];
			$config = &get_config();
			$theme = $this->cor_page->backend_theme;
			
			$data['user_info'] = $this->cor_auth->db_user();

			if(config_item('weather')):
				//ip and weather
				$weather = null;
				if($this->cor_cache->cache_exists('weather')){			
					$f_info = $this->cor_cache->cache_info('weather');			
					$diff = $this->Common_model->DateDiff('d',date("Y-m-d",$f_info['mtime']),date('Y-m-d'));
					//非当天数据，重新生成缓存	
					if($diff>0){
						$this->cor_cache->cache_delete('weather');
					}else{
						$weather = $this->cor_cache->cache_fetch('weather');
					}
				}
				if(empty($weather)){				
					$ips = array('city'=>'厦门');
					$wc = @file_get_contents("http://sou.qq.com/online/get_weather.php?callback=Weather&city=".$ips['city']);
					$weather = json_decode(substr($wc,8,-2),true);
					$this->cor_cache->cache_create($weather,'weather');
					
				}	
				$data['weather'] = $weather;
			endif;
			$this->cor_page->fetch_css('style',null,getRootUrl('css','backend'));
			$this->cor_page->load_backend_view("center",$data);
	}
	
	//验证用户名
	function user_name_check($str)
	{
		
		$group_id = $this->input->post('group_id');
		$user_flag = $this->db->select('count(1) as user_flag',false)->from($this->cor_db->table('admins'))->where('admin_user',$str)
		->where('group_id in','(1,2,3,4)',false)->get()->first_row('array');
		if ($user_flag['user_flag']==0)
		{
			$this->form_validation->set_message('user_name_check', $this->m_lang->inp_error);
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
 
 
	//验证密码
	function user_pass_check($str)
	{
		
	
		 
		$db_temp = $this->db->select('admin_pass',false)->from($this->cor_db->table('admins'))->where('admin_user',$this->input->post('user_name'))->get()->result_array();
		$admin_pass = $db_temp[0]['admin_pass'];
		if(empty($admin_pass)) {
			$this->form_validation->set_message('user_pass_check','');
			return false;
		}
		$de_str = $this->cor_page->my_encrypt($admin_pass,"DECODE");	
			
		if ($str != $de_str)
		{
			$this->form_validation->set_message('user_pass_check',$this->m_lang->inp_error);
			return FALSE;
		}
		else
		{
			
			return TRUE;
		}
	}
	
 	//验证码
 	function sys_valid_code_check(){ 	
 		return true;	
 		if($this->session->userdata('sys_valid_code')!=$this->input->post('sys_valid_code')){
 			$this->form_validation->set_message('sys_valid_code_check',$this->m_lang->inp_pardon.'，'.$this->m_lang->inp_error);
			return FALSE;
 			
 		}
 		return true; 		
 	}
 
 
 	function top()
	{
	
		$this->cor_auth->execute_auth();		
		$data['user_info'] = $this->cor_auth->db_user();	
		$this->lang->load("item_backend",lang_get());
		$data['lang_sys']  = $this->lang->language;
		$data['lang_all_options'] = $this->Common_model->lang_all();

		$this->cor_page->load_backend_view("frame_top",$data);
		
		
	}	
 	
 	
	function left()
	{
		$this->cor_auth->execute_auth();		
		$theme = config_item('backend_theme');
		$this->cor_page->fetch_css('style_left',null,getRootUrl('css','backend'));
		
		//加载公共语言包
		$this->lang->load('item_backend', lang_get());
		$data['lang'] = $this->lang->language;
		
		$this->cor_page->load_backend_view("frame_left",$data);
		
		
	}	
	
	
	
 	function right()
	{
		
		$theme = config_item('backend_theme');
		$this->cor_page->fetch_css('main',null,base_url().'templates/backend/'.$theme.'/css/');
		$this->cor_page->fetch_js(array('Main'),null,base_url().'templates/backend/'.$theme.'/js/');
		$this->cor_page->load_backend_view("frame_right");
		
	}	
 
 
 	function test(){
 		phpinfo();
 		exit;
 	}

 	function main_index(){
 		$this->cor_page->load_backend_view("main_index",$data);
 	}
 	
 	function  main_top(){
 		$data['rights_options'] = $this->cor_auth->fetch_rights_menus($this->cor_auth->db_user('group_id'),true);
 		$this->cor_page->load_backend_view("main_top",$data);
 	}

	function  main_left(){
		$data['rights_options'] = $this->cor_auth->fetch_rights_menus($this->cor_auth->db_user('group_id'),true);
		$this->cor_page->load_backend_view("main_left",$data);

 	}

 	function  main_right(){
 		$this->cor_page->load_backend_view("main_right",$data);
 	}


 	function  main_foot(){
 		$this->cor_page->load_backend_view("main_foot",$data);
 	}

 	function adminindex(){
 		$this->cor_page->load_backend_view("adminindex",$data);
 	}
 	
	function main_center(){
 		$this->cor_page->load_backend_view("main_center",$data);
 	}


	
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */