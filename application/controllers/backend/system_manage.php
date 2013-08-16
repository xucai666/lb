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
 
class System_manage extends CI_Controller{
	function __construct(){		
		parent::__construct();
		//验证登陆
		$this->myauth->execute_auth();
		$this->load->model('Admins_model');
		$this->im = $this->Admins_model;
		$this->load->library('encrypt');	
		$this->lang->load("item_backend_sys",$this->Common_model->lang_get());
		$this->m_lang = $this->lang->language;	
		$this->tpl->assign('lang_sys',$this->m_lang);
		
	}
	
	/**
	 * 修改密码
	 */
	function change_password(){
		$data = array('main'=>$this->Admins_model->fetch_detail(get_cookie('user_id')));
		$this->mypage->load_backend_view('admins_change_password',$data);
	}
	
	/**
	 *退出系统
	 */
	function exit_system(){		
		$this->myauth->process_logout(array('user_name','user_id'),'/admin');		
	}
	
	/*
	  *退出系统
	 */
	function relogin(){		
		$this->myauth->process_logout(array('user_name','user_id'),"admin");		
	}
	
	
	/**
	 * 修改密码
	 */
	function save_pass(){		
		$rules = $this->Admins_model->validator_pwd();
		$this->form_validation->set_rules($rules);
		$data = array('main'=>$this->input->post('main'));
		if($this->form_validation->run()==false){		
			$this->mypage->load_backend_view('admins_change_password',$data);
		}else{
			$save_data = array('main'=>array(
				'admin_pass'=>$this->mypage->my_encrypt($data['main']['new_password'],"ENCODE"),
				'admin_id'=>$data['main']['admin_id'],
			));			
			$this->mydb2->save($save_data,$this->Admins_model->db_config());
			$this->mypage->backend_redirect('system_manage/exit_system','修改成功，需要重新登陆系统');
		}
	}
	
	/**
 	 *检查密码是否一致 
 	 */
 	function confirm_password_check($str){
 		$main  = $this->input->post('main');
 		if($main['confirm_password']!=$main['new_password']){
 			$this->form_validation->set_message("confirm_password_check","两次输入的密码不一致！");
 			return false;
 		}else{
 			return true;
 		}
 	}
 	
 	/**
 	 *检查旧密码输入是否正确 
 	 */
 	function old_password_check($str){
 		$main_form  = $this->input->post('main');
 		$main_db = $this->Admins_model->fetch_detail($main_form['admin_id']);
 		$db_pass = $this->mypage->my_encrypt($main_db['admin_pass'],"DECODE");
 		if($db_pass != $main_form['old_password']){
 			$this->form_validation->set_message("old_password_check","旧密码输入不正确!");
 			return false;
 		}else{
 			return true;
 		}
 	}
 	
 	
 	/* 备份数据库
 	 */
 	function db_backup(){
 		try{
 			$this->load->dbutil();
 			$backup = $this->dbutil->backup();
 			$this->load->helper('file');
 			$file_name = 'ci_db'.date("Y-m-d-H-i-s").'.gz';
 			//保存路径
 			$save_dir = FCPATH.'backup\\'.$this->Common_model->lang_get().'\\';
 			$save_dir = str_replace("\\",'/',$save_dir);
 			$this->Common_model->mkdirs($save_dir);
 			$backup_file = $save_dir.$file_name;
			write_file($backup_file, $backup); 	
			$words_return[]='成功备份到目录&nbsp;'.$save_dir;		
			//发往email			
			if($this->config->item('backup_email')){		
				$this->load->library('email');
				$this->email->from('yehua365@163.com');		
				$this->email->to('conqweal@163.com');		
				$this->email->subject("数据备份".$file_name);
				$this->email->message("数据备份".$file_name);
				$this->email->attach($backup_file);
				$this->email->send();			
				$this->email->clear();	
				$words_return[]='成功发送到邮箱';			
			}			
		
			//直接下载
			if($this->config->item('backup_to_download')){
				$this->load->helper('download');
				force_download($file_name, $backup);
			}			
			$this->mypage->pop_redirect(implode(',',(array)$words_return),site_url("backend/system_manage/db_backup_list"));
 
 		}catch(Exception $e){
 			show_error($e->getMessage());
 		}	
 		
 	}	
 	
 	
 	
 	
 	/**
 	 * 备份列表
 	 */
 	function db_backup_list(){
 		$this->load->helper("file");
 		$this->load->helper('number');
 	    $data = $this->mycache->cache_fetch('sys_config');
 	    $data['files'] = get_dir_file_info('backup/'.$this->Common_model->lang_get().'/',false);
 		$this->mypage->load_backend_view('db_backup_list',$data);
 		
 	}
 	
 	
 	
 	
 	
 	/**
 	 * 基本配置
 	 */
 	function basic_config(){
 		$this->load->helper('directory'); 	
 		$styles = directory_map($this->config->item('template_dir').DIRECTORY_SEPARATOR.'backend',1);
 			
		$data = $this->mycache->cache_fetch('sys_config');
		
		$data['styles'] = $styles;
 		$this->mypage->load_backend_view('config_save',$data);
 		
 	}
 	
 	/**
 	 * 保存配置
 	 */
 	
 	function action_config_save(){
		$arr = array(
			'optimize'=>$this->input->post('optimize'),
			'smtp'=>$this->input->post('smtp'),
			'contact'=>$this->input->post('contact'),
			'develop'=>$this->input->post('develop'),
		);		
 		$this->mycache->cache_create($arr,'sys_config'); 
 		
 		$this->mypage->pop_redirect('保存成功',site_url("backend/system_manage/basic_config"));
 				
 	}
 	
 	
 	
 	/**
 	 * 执行sql语句
 	 */	
 	function action_execute_sql(){
 		$this->mypage->load_backend_view('sys_execute_sql');
 		
 	}
 	
 	
 	
 	function action_execute_sql_submit(){
 		$sql = $this->input->post("sql");
 		$sql = $this->mydb2->adjust_sql_str($sql);
 		if(empty($sql)){
 			$this->mypage->pop_redirect('请输入要执行的sql语句',site_url("backend/system_manage/action_execute_sql"));
 		} 
 		$query = $this->db->query($sql);
 		if ($query->num_rows() > 0){
		
		   $data['qr']  = var_export($query->result(),true);
			
		} 
		$data['qr_afr'] = mysql_affected_rows();
		
 		$this->mypage->load_backend_view('sys_execute_sql',$data);
 		
 	}
 	
 	/**
 	 * 更新缓存
 	 */
 	 function action_clear_cache(){
 	 	//清除模板编译
 	 	$this->tpl->clearCompiledTemplate();
 	 	//清除模板缓存
 	 	//$this->tpl->clearAllCache();
 	 	$this->mycache->clear_pages();
 	 	//clear rights config
 	 	$this->mycache->cache_delete('admin_rights_config');
 		$this->mypage->pop_redirect('缓存更新成功！','javascript:parent.location.reload();');
 	}


	/**
	 * [action_helper_docs description]
	 * @return [type] [description]
	 */
 	function action_helper_docs(){
 			$this->load->helper("file");
 			$data = array('ls'=>get_dir_file_info(getcwd().'/docs'));
 			$this->mypage->load_backend_view('helper_docs',$data);
 	}
 	
 	
}

 
?>
