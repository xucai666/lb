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
	  * member register valid
	  * @return [type] [description]
	  */
 	function action_register_update(){
 		try{
 			$this->form_validation->set_error_delimiters('<span id="error_span">', '</span>');
	 		$data = array('main'=>$this->input->post('main'));
	 		if($data['main']['m_pass']){
	 			$data['main']['m_pass'] = base64_encode($data['main']['m_pass']);
	 		}else{
	 			unset($data['main']['m_pass']);
	 		}	 		
	 		$this->form_validation->set_rules($this->im->valid_save_rule_update());
 		    if($this->form_validation->run()){
 		    	$this->db->where('m_user',$this->cor_page->my_encrypt(get_cookie('member'),'DECODE'));
 		    	$this->db->update('module_member',$data['main']);
		 		$this->cor_page->front_redirect('member/action_member_center','资料更新成功');

 		    }else{
 		    	$this->cor_page->load_front_view('member_center',$data);
 		    }
 		}catch(Exception $e){
	 		$this->cor_page->front_redirect('member/action_member_center',$e->getMessage());
 			
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

	 function valid_password_repeat($val){
	 		if($val || $this->input->post('m_pass_repeat')){
		 		if($this->input->post('m_pass_repeat')!=$val){
		 			return false;
		 		}else{
		 			return true;
		 		}
	 		}else{
	 			return true;
	 		}
	 		
	 }

	 
	 function action_exit(){
	 	delete_cookie('member');
	 	$this->cor_page->front_redirect('member/index','已退出');
	 }

	 function action_order(){
	 	$this->db->select('*',false)->from('order_main');
	 	$this->db->where('member',$this->cor_page->my_encrypt(get_cookie('member'),'DECODE'));
	 	$this->db->order_by('order_id','desc');
	 	$data = $this->cor_db->fetch_all();
	 	$ids  = $this->cor_form->array_re_index($data['list'],'order_id','order_id');
	 	$stats = $this->cor_form->array_re_index($this->db->select('sum(1) as p_stat,sum(p_qty*p_price ) as sub,order_id',false)->from('order_detail')->group_by('order_id')->get()->result_array(),'order_id');
	 	$data = array_merge($data,array('stats'=>$stats,'status'=>$this->cor_cache->cache_fetch('order_status')));	
	 	$this->cor_page->load_front_view('member_order',$data);
	 }

	 function action_order_detail(){
	 	$stats = $this->db->select('sum(1) as p_stat,sum(p_qty*p_price ) as sub',false)->from('order_detail')->where('order_id',$this->uri->segment(4))->get()->first_row('array');
	 	$config = array(
	 		'table_name'=>'order_main',
	 		'primary_id'=>'order_id',
	 		'primary_val'=>$this->uri->segment(4),
	 	);
	 	$main = $this->cor_db->fetch_one($config);
	 	$list = $this->db->select('*',false)->from('order_detail')->where('order_id',$this->uri->segment(4))->get()->result_array();
	 	$data = array('stats'=>$stats,'main'=>$main,'list'=>$list,'status'=>$this->cor_cache->cache_fetch('order_status'));
	 	$this->cor_page->load_front_view('member_order_detail',$data);
	 }

	 function action_order_pay(){
	 	$stats = $this->db->select('sum(1) as p_stat,sum(p_qty*p_price ) as sub',false)->from('order_detail')->where('order_id',$this->uri->segment(4))->get()->first_row('array');
	 	$config = array(
	 		'table_name'=>'order_main',
	 		'primary_id'=>'order_id',
	 		'primary_val'=>$this->uri->segment(4),
	 	);
	 	$main = $this->cor_db->fetch_one($config);
	 	$main = $this->cor_db->fetch_one($config);
	 	$data = array('stats'=>$stats,'main'=>$main);
	 	$this->cor_page->load_front_view('member_order_pay',$data);
	 }


	}
/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */