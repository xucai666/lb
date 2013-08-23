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
class Member extends CI_Controller {

	function __construct()
	{
		parent::__construct();		
		//启用缓存显示,key is action name,val is view name
		$act2view = array(
			'index'=>'member_login',
			'action_register'=>'member_register',
		);
		
		$this->cor_page->view_cache_all($act2view);
		//initial Breadcrumb
		$this->load->library('Breadcrumb');
		$this->load->model('Member_model','im');
		$this->lang->load('item_front_member');

	}
	
	 /**
	  * login page
	  * @return [type] [description]
	  */
	 function index(){
	 // add breadcrumbs
		$this->breadcrumb->append_crumb('Home', '/');
		$this->breadcrumb->append_crumb('Member', 'Login');
		$this->breadcrumb->output();
	 	$this->cor_page->load_front_view('member_login');
	 }

	 /**
	  * action login valie
	  * @return [type] [description]
	  */
	 function action_login(){
	 	$this->load->model('Common_model','cm');
	 	try{
	 		$this->form_validation->set_error_delimiters('<span id="error_span">', '</span>');
	 		$data = $this->input->post();	 		
	 		$this->form_validation->set_rules($this->im->valid_login_rule());
	 		if($this->form_validation->run()){
			    $cookie = array(
                   'name'   => 'member',
                   'value'  => $this->cor_page->my_encrypt($data['m_user'],'ENCODE'),
                   'expire' => '86500',
                   'domain' => '',
                   'path'   => '/',
                   'prefix' => 'mysys_',
                );
	 			set_cookie($cookie);
	 			$this->cor_page->front_redirect('member/action_member_center','登陆成功');
	 		}else{

	 			$this->cor_page->load_front_view('member_login',$data);
	 		}
	 	}catch(Exception $e){
	 		$this->cor_page->front_redirect('member/index',$e->getMessage());
	 	  	
	 	}
	 }

	 /**
	  * member register
	  * @return [type] [description]
	  */
	 function action_register(){
	 	// add breadcrumbs
		$this->breadcrumb->append_crumb('Home', '/');
		$this->breadcrumb->append_crumb('Member', 'Register');
		$this->breadcrumb->output();
	 	$this->cor_page->load_front_view('member_register');

	 }

	 /**
	  * member register valid
	  * @return [type] [description]
	  */
 	function action_register_save(){
 		try{
 			$this->form_validation->set_error_delimiters('<span id="error_span">', '</span>');
	 		$data = array('main'=>$this->input->post('main'));
	 		$data['main']['m_pass'] = base64_encode($data['main']['m_pass']);
	 		$this->form_validation->set_rules($this->im->valid_save_rule());
 		    if($this->form_validation->run()){
 		    	$db_config = $this->im->db_config();
	 			$this->cor_db->save($data,$db_config);
		 		$this->cor_page->front_redirect('member/index','注册成功，请登陆');

 		    }else{
 		    	$this->cor_page->load_front_view('member_register',$data);
 		    }
 		}catch(Exception $e){
	 		$this->cor_page->front_redirect('member/register',$e->getMessage());
 			
 		}

	 }

	 /**
	  * member center
	  * @return [type] [description]
	  */
	 function action_member_center(){
	 	$this->im->auth_login();
	 	// add breadcrumbs
		$this->breadcrumb->append_crumb('Home', '/');
		$this->breadcrumb->append_crumb('Member', 'Center');
		$this->breadcrumb->output();
		$this->db->select('*')->from('module_member')->where('m_user',$this->cor_page->my_encrypt(get_cookie('member'),'DECODE'));
 		$rs = $this->db->get()->first_row('array');
 		$data = array('main'=>$rs);
 		
	 	$this->cor_page->load_front_view('member_center',$data);
	 }


	 function action_captcha(){
	 	$this->load->model('Common_model','cm');
	 	$this->cm->show_captcha();
	 	exit;
	 }

	 function valid_login_m_user($val){
	 	
 		$this->db->select('*')->from('module_member')->where('m_user',($val));
 		$rs = $this->db->get()->first_row('array');
 		if($rs){
 			return true;
 		}else{
 			
 			return false;
 		}
	 }

	 function valid_login_m_pass($val){
 		$this->db->select('*')->from('module_member')->where('m_user',$this->input->post('m_user'));
 		$rs = $this->db->get()->first_row('array');
 		
 		if(base64_encode($val) == $rs['m_pass']){

 			return true;
 		}else{
 			return false;
 		}


	 }

	 function valid_login_m_captcha($val){
	 
	 	if(strtolower($val) == strtolower($this->cm->get_captcha())){
	 		return true;
	 	}else{
	 		return false;
	 	}
	 }

	 function valid_m_user_exists($val){
		$this->db->select('*')->from('module_member')->where('m_user',$val);
 		$rs = $this->db->get()->first_row('array');
 		if(!$rs){
 			return true;
 		}else{
 			return false;
 		}
	 }

	 
	 function action_exit(){
	 	delete_cookie('mysys_member');
	 	$this->cor_page->front_redirect('/');
	 }


	}
/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */