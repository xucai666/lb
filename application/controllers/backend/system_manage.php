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
		$this->init_auth->execute_auth();
		$this->load->model('Admins_model');
		$this->im = $this->Admins_model;
		$this->load->library('encrypt');	
		$this->lang->load("item_backend_sys",lang_get());
		$this->m_lang = $this->lang->language;	
		$this->tpl->assign('lang_sys',$this->m_lang);
	}
	
	/**
	 * 修改密码
	 */
	function change_password(){
		$data = array('main'=>$this->Admins_model->fetch_detail(get_cookie('user_id')));
		$this->init_page->load_backend_view('admins_change_password',$data);
	}
	
	/**
	 *退出系统
	 */
	function exit_system(){		
		$this->init_auth->process_logout(array('user_name','user_id'),'/admin');		
	}
	
	/*
	  *退出系统
	 */
	function relogin(){		
		$this->init_auth->process_logout(array('user_name','user_id'),"admin");		
	}
	
	
	/**
	 * 修改密码
	 */
	function save_pass(){		
		$rules = $this->Admins_model->validator_pwd();
		$this->form_validation->set_rules($rules);
		$data = array('main'=>$this->input->post('main'));
		if($this->form_validation->run()==false){		
			$this->init_page->load_backend_view('admins_change_password',$data);
		}else{
			$save_data = array('main'=>array(
				'admin_pass'=>$this->init_page->my_encrypt($data['main']['new_password'],"ENCODE"),
				'admin_id'=>$data['main']['admin_id'],
			));			
			$this->init_db->save($save_data,$this->Admins_model->db_config());
			$this->init_page->backend_redirect('system_manage/exit_system','修改成功，需要重新登陆系统');
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
 		$db_pass = $this->init_page->my_encrypt($main_db['admin_pass'],"DECODE");
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
 			$save_dir = FCPATH.'backup\\'.lang_get().'\\';
 			$save_dir = str_replace("\\",'/',$save_dir);
 			$this->Common_model->mkdirs($save_dir);
 			$backup_file = $save_dir.$file_name;
			write_file($backup_file, $backup); 	
			$words_return[]='成功备份到目录&nbsp;'.$save_dir;		
			//发往email			
			if(config_item('backup_email')){		
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
			if(config_item('backup_to_download')){
				$this->load->helper('download');
				force_download($file_name, $backup);
			}			
			$this->init_page->pop_redirect(implode(',',(array)$words_return),site_url("backend/system_manage/db_backup_list"));
 
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
 	    $data = $this->init_cache->cache_fetch('sys_config');
 	    $data['files'] = get_dir_file_info('backup/'.lang_get().'/',false);
 		$this->init_page->load_backend_view('db_backup_list',$data);
 		
 	}
 	
 	
 	
 	
 	
 	/**
 	 * 基本配置
 	 */
 	function basic_config(){
 		$this->load->helper('directory'); 	
 		$styles = directory_map(config_item('template_dir').DIRECTORY_SEPARATOR.'front',1);
 			
		$data = $this->init_cache->cache_fetch('sys_config');
		$data['kefu_type'] = $this->init_cache->cache_fetch('kefu_type');
		
		$data['styles'] = $styles;
 		$this->init_page->load_backend_view('config_save',$data);
 		
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
 		$this->init_cache->cache_create($arr,'sys_config'); 
 		
 		$this->init_page->pop_redirect('保存成功',site_url("backend/system_manage/basic_config"));
 				
 	}
 	
 	
 	
 	/**
 	 * 执行sql语句
 	 */	
 	function action_execute_sql(){
 		$this->init_page->load_backend_view('sys_execute_sql');
 		
 	}
 	
 	
 	
 	function action_execute_sql_submit(){
 		$sql = $this->input->post("sql");
 		$sql = $this->init_db->adjust_sql_str($sql);
 		if(empty($sql)){
 			$this->init_page->pop_redirect('请输入要执行的sql语句',site_url("backend/system_manage/action_execute_sql"));
 		} 
 		$query = $this->db->query($sql);
 		if ($query->num_rows() > 0){
		
		   $data['qr']  = var_export($query->result(),true);
			
		} 
		$data['qr_afr'] = mysql_affected_rows();
		
 		$this->init_page->load_backend_view('sys_execute_sql',$data);
 		
 	}
 	
 	/**
 	 * 更新缓存
 	 */
 	 function action_clear_cache(){
 	 	//清除模板编译
 	 	$this->tpl->clearCompiledTemplate();
 	 	$this->tpl->clearAllCache();
 	 	//清除模板缓存
 	 	//$this->tpl->clearAllCache();
 	 	$this->init_cache->clear_pages();
 	 	//clear rights config
 	 	$this->init_cache->cache_delete('admin_rights_config');
 	 	
 	 	//create  tree cache
 	 	$treeIds = $this->init_form->array_re_index($this->db->select('treeId,name',false)->from('tree_node')->where('pid',0)->get()->result_array(),'treeId','name');
 	 	$this->init_cache->cache_create($treeIds,'treeIds');
		//create  channel cache
 	 	$channel = $this->init_form->array_re_index($this->db->select('*',false)->from('module_channel')->get()->result_array(),'c_id');
 	 	$this->init_cache->cache_create($channel,'channel');	//create  channel cache
 	 	//channel type
 	 	$channel_types = $this->init_form->array_re_index($this->db->select('code,treeId,name',false)->from('tree_node')->where(array('treeId'=>3,'pid >'=>0))->get()->result_array(),'code','name');
 	 
 	 	$this->init_cache->cache_create($channel_types,'channel_types');



 		$this->init_page->pop_redirect('缓存更新成功！','javascript:parent.location.reload();');
 	}


	/**
	 * [action_helper_docs description]
	 * @return [type] [description]
	 */
 	function action_helper_docs(){
 			$this->load->helper("file");
 			$data = array('ls'=>get_dir_file_info(getcwd().'/docs'));
 			$this->init_page->load_backend_view('helper_docs',$data);
 	}
 	
 	/**
 	 * 翻译
 	 * @return [type] [description]
 	 */
 	function action_lang_trans(){
 		$this->db->select('*',false)->from('lang');
 		$this->input->get('lang_type') && $this->db->where('lang_type',$this->input->get('lang_type'));
 		$this->input->get('lang_val') && $this->db->like('lang_val',$this->input->get('lang_val'));
 		$this->input->get('lang_key') && $this->db->like('lang_key',$this->input->get('lang_key'));
 		
 		if(isset($_GET['status']) && $_GET['status']!="-1"){
 			$this->db->where('is_trans',$this->input->get('status'));
 			if(empty($_GET['status'])) $this->db->or_where('is_trans is null');
 		}
 		$this->db->order_by('lang_id','asc');
 		$page_size = 15;
 		$data = $this->init_db->fetch_all($page_size);
 		$status = array(
 			'1'=>'已翻译',
 			'0'=>'未翻译',
 		);
 		$data = array_merge($data,array('status'=>$status,'page_size'=>$page_size));
 		$this->load->model('Trans_model','it');
		$this->init_page->load_backend_view('lang_trans',$data);
 	}
 	
 	/**
 	 * 导入
 	 * @return [type] [description]
 	 */
 	function action_lang_import(){
 		$this->load->helper('file');
 		$path = APPPATH.'language/zh/';
 		$lang_files = get_filenames($path);
 		//empty
 		//$this->db->truncate('lang');
 		foreach($lang_files as $v){
 			if(strpos($v, 'lang.php')!==false){
 				$lang = null;
 				include_once($path.$v);
 				foreach((array)$lang as $k1=>$v1){

 					$e = $this->init_db->fetchArray('select lang_id from '.$this->db->dbprefix.'lang where lang_key=\'?\' and lang_file=\'?\'',array($k1,$v));
 					if($e) continue;
 					foreach(config_item('support_language') as $v2){
 						$data = array('lang_type'=>$v2,'lang_file'=>$v,'lang_key'=>$k1,'lang_val'=>is_array($v1)?implode('|',$v1):$v1,'is_trans'=>$v2=='zh'?1:0); 
 						
 						$this->db->insert('lang',$data);
 						
 					}
 				}

 			}
 		}

 		$this->init_page->backend_redirect('system_manage/action_lang_trans','导入完毕');

		
 	}
 	
 	/**
 	 * 导出
 	 * @return [type] [description]
 	 */
 	function action_lang_export(){

 		$this->load->helper('file');
 		$path = APPPATH.'language/';
 		
 		$ls = $this->db->select('*',false)->from('lang')->where("lang_type !='zh'")->order_by('lang_id','asc')->get()->result_array();
 		if(!count($ls)){
 			$this->init_page->backend_redirect('system_manage/action_lang_trans','操作失败，无数据');
 		}
 		foreach($ls as $v){
 			$file = $path.$v['lang_type'].'/'.$v['lang_file'];
 			$data[$file][$v['lang_key']] = $v['lang_val'];
 		}
 		
 		foreach($data as $key=>$v){
 			write_file($key,"<?php\n \$lang = ".var_export($v,true).";\n?>");
 		}

 		$this->init_page->backend_redirect('system_manage/action_lang_trans','导出完毕');
		
 	}

 	/**
 	 * [action_trans_batch description]
 	 * @return [type] [description]
 	 */
 	function action_trans(){
 		$this->load->model('Trans_model','it');
	    if($_REQUEST['type']=='auto'){
	  		 $this->it->batch_trans($_GET['lang_id'],$_GET['run']);
	  		 exit();
	  	}
	  	if($_REQUEST['type']=='once'){
	  		  $this->it->single_trans($_GET['lang_id'],$_GET['run']);
	  		 exit();
	  	}

 	}


   function action_regexp_test(){
	    $post = $this->input->post();
	    if($post){
			$isMagic = @ini_get("magic_quotes_gpc");
			if($isMagic) foreach($post AS $key => $value) $$key = stripslashes($value);
			else foreach($post AS $key => $value) $$key = $value;
			if($reggo==0){
			   $rs = preg_replace("/$testrule/$testmode",$rpvalue,$testtext);
			   echo "<xmp>[".$rs."]</xmp>";
		    }else{
			  	 $backarr = array();
			  	 preg_match_all("/$testrule/$testmode",$testtext,$backarr);
			  	 echo "<xmp>";
			  	 foreach($backarr as $k=>$v){
			  	 	  echo "$k";
			  	 	  if(!is_array($v)) echo " - $v \r\n";
			  	 	  else{
			  	 	  	 echo " Array \r\n";
			  	 	  	 foreach($v as $kk=>$vv){ echo "----$kk - $vv \r\n"; }
			  	 	  }
			 }
		  	echo "</xmp>";
	    }
			exit();
	    }


   		$this->init_page->load_backend_view("regexp_test");
   }


   function action_create_html(){
   		$channel = $this->init_cache->cache_fetch('channel');
   		foreach($channel as $k=>$v){
   			if($v['c_html'] && empty($v['c_external'])){  	
   				MakeHtmlFile(FCPATH.config_item('html_root').'/'.$v['c_dir'].lang_url().'/'.$v['c_url'].'.htm',file_get_contents(site_url('/front/'.$v['c_url'])));
   			}
   		}
   		$this->init_page->pop_redirect('html生成完毕','javascript:parent.location.reload();');
   		
   }


 	
}

 
?>
