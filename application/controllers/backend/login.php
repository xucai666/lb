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
			$this->init_page->backend_redirect('d=backend&c=login&m=center');
		}			
		$this->load->helper('form');	
		$this->init_page->fetch_css(array('login'));	
		$this->init_page->load_backend_view("login");
		
		
	}	
	

	
	function chklogin(){	
		try{
			
		  	  
			  $this->load->library('encrypt');		
			  $this->form_validation->set_rules('user_name',$this->m_lang->username, 'required|callback_user_name_check');
			  $this->form_validation->set_rules('user_pass', $this->m_lang->password, 'required|callback_user_pass_check');
			  $this->form_validation->set_rules('captcha', $this->m_lang->captcha, 'required|callback_user_captcha_check');
			  if ($this->form_validation->run() == FALSE){
			  	$tpl_name = 'login';
			  	$this->init_page->load_backend_view($tpl_name);
			  	
			  }
			  else{				  	
				  	$select_config  = array(
			 			'primary_id'=>'admin_user',
			 			'primary_val'=>$this->input->get_post("user_name"),
			 			'table_name'=>$this->init_db->table('admins'),
		 			);	
		 			
			  		$login_info_temp = $this->db->select('a.*,b.rights',false)->from($this->init_db->table('admins').' as a')->join($this->init_db->table('roles').' as b','a.group_id=b.role_id','`')
			  		->where('a.admin_user','\''.$this->input->get_post("user_name").'\'',false)->get()->result_array();
			  		$login_info = $login_info_temp[0];
			  		$this->init_auth->process_login(array("user_name"=>$login_info['admin_user'],"user_id"=>$login_info['admin_id']));
			  		$this->init_page->pop_redirect(null,site_url("d=backend&c=login&m=center"),'parent');
			  }
			
		}catch(Exception $e){
			show_error($e->getMessage());
		}		
		  
		 
	}
	
	/**
	 * 中心
	 */
	function center(){	
	
			$this->init_auth->execute_auth();

			//检查锁屏状态
			$lock_screen = $this->session->userdata('lock_screen');	
			if(isset($lock_screen) && $lock_screen==1) {
				$this->init_auth->process_logout(array('user_name','user_id'),'c=admin&m=index');	
			}

			$this->init_page->fetch_js('artdialog/jquery.artDialog','view',getRootUrl('js','backend'));	
			
			$this->lang->load("item_backend",lang_get());
			
			$data['lang_sys']  = $this->lang->language;
			$data['lang_all_options'] = $this->Common_model->lang_all();
			$data['rights_options'] = $this->init_auth->fetch_rights_menus($this->init_auth->db_user('group_id'),true);

		

			$lang_link  = $this->init_cache->cache_fetch("lang_type",null,$lang_show);	
			$data['lang_link']  = $lang_link[$lang_show];
			$config = &get_config();
			
			$data['user_info'] = $this->init_auth->db_user();

			if(config_item('weather')):
				//ip and weather
				$weather = null;
				if($this->init_cache->cache_exists('weather')){			
					$f_info = $this->init_cache->cache_info('weather');			
					$diff = $this->Common_model->DateDiff('d',date("Y-m-d",$f_info['mtime']),date('Y-m-d'));
					//非当天数据，重新生成缓存	
					if($diff>0){
						$this->init_cache->cache_delete('weather');
					}else{
						$weather = $this->init_cache->cache_fetch('weather');
					}
				}
				if(empty($weather)){				
					$ips = array('city'=>'厦门');
					$wc = @file_get_contents("http://sou.qq.com/online/get_weather.php?callback=Weather&city=".$ips['city']);
					$weather = json_decode(substr($wc,8,-2),true);
					$this->init_cache->cache_create($weather,'weather');
					
				}	
				$data['weather'] = $weather;
			endif;
			$this->init_page->fetch_css('style',null,getRootUrl('css','backend'));
			$this->init_page->load_backend_view("center",$data);
	}
	
	//验证用户名
	function user_name_check($str)
	{
		
		$group_id = $this->input->get_post('group_id');
		$user_flag = $this->db->select('count(1) as user_flag',false)->from($this->init_db->table('admins'))->where('admin_user',$str)
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
		
	
		 
		$db_temp = $this->db->select('admin_pass',false)->from($this->init_db->table('admins'))->where('admin_user',$this->input->get_post('user_name'))->get()->result_array();
		$admin_pass = $db_temp[0]['admin_pass'];
		if(empty($admin_pass)) {
			$this->form_validation->set_message('user_pass_check','');
			return false;
		}
		$de_str = $this->init_page->my_encrypt($admin_pass,"DECODE");	
			
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
 	function user_captcha_check(){ 	
 		if(strtolower($this->session->userdata('captcha_backend'))!=strtolower($this->input->get_post('captcha'))){
 			$this->form_validation->set_message('user_captcha_check',$this->m_lang->inp_pardon.'，'.$this->m_lang->inp_error);
			return FALSE;
 			
 		}
 		return true; 		
 	}
 
 
 	
 	
	function left()
	{
		$this->init_auth->execute_auth();		
		$this->init_page->fetch_css('style_left',null,getRootUrl('css','backend'));
		
		//加载公共语言包
		$this->lang->load('item_backend', lang_get());
		$data['lang'] = $this->lang->language;
		
		$this->init_page->load_backend_view("frame_left",$data);
		
		
	}	
	
	
	
 
 
 	function test(){
 		phpinfo();
 		exit;
 	}

 	function main_index(){
 		$this->init_page->load_backend_view("main_index",$data);
 	}
 	
 	function  main_top(){
 		$data['lang_all_options'] = $this->Common_model->lang_all();
 		$data['rights_options'] = $this->init_auth->fetch_rights_menus($this->init_auth->db_user('group_id'),true);
 		
		$data['user_info'] = $this->init_auth->db_user();

 		$this->init_page->load_backend_view("main_top",$data);
 	}

	function  main_left(){
		$data['rights_options'] = $this->init_auth->fetch_rights_menus($this->init_auth->db_user('group_id'),true);
		$this->init_page->load_backend_view("main_left",$data);

 	}

 

 	function  main_foot(){
 		$this->init_page->load_backend_view("main_foot",$data);
 	}

 	function adminindex(){
 		$data['user_info'] = $this->init_auth->db_user();
 		$this->load->model('Logs_model');
 		$data['last_login'] = $this->Logs_model->last_login();
 		$this->load->model('Modules_model','mm');
 		$data['stat'] = $this->mm->stat();
 		$this->init_page->load_backend_view("adminindex",$data);
 	}
 	
	function main_center(){
 		$this->init_page->load_backend_view("main_center",$data);
 	}



 	/**
	 * 锁屏
	 */
	function public_lock_screen() {
		
		$this->session->set_userdata('lock_screen', '1');
		echo $this->session->userdata('lock_screen');
		exit;
	}

	function public_login_screenlock() {		
		
		

		$rs = $this->db->select('admin_pass',false)->from('admins')->where('admin_user',$this->input->get_post('lock_user'))->get()->first_row('array');
		$admin_pass = $rs['admin_pass'];
		
		$de_str = $this->init_page->my_encrypt($admin_pass,"DECODE");	
			
		if ($this->input->get_post('lock_password') != $de_str)
		{
			
			exit('2');
		}
		else
		{
			$this->session->set_userdata('lock_screen', '0');
			exit('1');
			
		}

		
	}

	function action_captcha(){
		$this->load->library('checkcode');
		$checkcode = $this->checkcode;
		$checkcode->code_len = 4;
		$checkcode->width = 130;
		$checkcode->height = 20;
		$checkcode->font_size =14;
		$checkcode->background = "#ffffff";
		$this->session->set_userdata('captcha_backend', $checkcode->get_code());
		$checkcode->doimage();	
		
	}



	
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */