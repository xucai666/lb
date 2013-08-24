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
class Fields extends CI_Controller{
	function __construct(){
		parent::__construct();
		//auth login
        $this->cor_auth->execute_auth();
		$this->load->model("Fields_model",'im');
		$this->lang->load('item_backend_fields',lang_get());


	}

	function action_add(){
		$fields_types = $this->cor_cache->cache_fetch('fields_types');
		$f_id = $this->uri->segment(4);
		$main = array();
		if($f_id){
			$main = $this->im->detail($f_id);
		}
		
		$data = array('main'=>$main,'fields_types'=>$fields_types);
		$this->cor_page->load_backend_view('fields_add',$data);
	}

	function action_save(){
		$data = array('main'=>$this->input->post('main'));
		try{
			$this->form_validation->set_rules($this->im->valid_config());
			if($this->form_validation->run()){
				$rs = $this->cor_db->save($data,$this->im->save_config());
				//insert log
				$log_cf = $this->im->save_config();
				$this->load->model('Logs_model');	
		 		$this->Logs_model->log_insert(array(
		 			'log_table'=>$log_cf['main']['table_name'],
		 			'log_table_id'=>$rs['main'][$log_cf['main']['primary_key']],
		 			'log_user'=>$this->cor_auth->fetch_auth('user_name'),
		 			'log_date'=>date("Y-m-d H:i:s"),
		 			'log_sql'=>trim(implode("\n",(array)$this->db->sql_log)),
		 			'log_type'=>'10',
		 			'log_desc'=>sprintf('%s field %s success.',$rs['sys_db_type'],$rs['main']['f_name']),
		 		));

				$this->cor_page->backend_redirect('fields/action_list',lang('fields_save_ok'));
			}else{				
				$this->cor_page->load_backend_view('fields_add',$data);
			}

			


		}catch(EXCEPTION $e){
			$this->cor_page->backend_redirect($_SREVER['HTTP_REFERER'],$e->getMessage());
		}

	}


	function action_del(){
		try{
			$f_id = $this->input->post('f_id');
            $f_id = $f_id?$f_id:$this->uri->segment(4);
			if(empty($f_id)) throw new Exception(lang('fields_parameter_error'));
			$rs = $this->cor_db->delete($f_id,$this->im->save_config());
			//insert log
			$log_cf = $this->im->save_config();
			$this->load->model('Logs_model');	
	 		$this->Logs_model->log_insert(array(
	 			'log_table'=>$log_cf['main']['table_name'],
	 			'log_table_id'=>$rs[$log_cf['main']['primary_key']],
	 			'log_user'=>$this->cor_auth->fetch_auth('user_name'),
	 			'log_date'=>date("Y-m-d H:i:s"),
	 			'log_sql'=>trim(implode("\n",(array)$this->db->sql_log)),
	 			'log_type'=>'10',
	 			'log_desc'=>sprintf('delete field %s success.',$rs['f_name']),
	 		));

			$this->cor_page->backend_redirect('fields/action_list',lang('fields_delete_ok'));
		}catch(EXCEPTION $e){
			$this->cor_page->backend_redirect($_SERVER['HTTP_REFERER'],$e->getMessage());
		}
	}

	function action_list(){
		$fields_types = $this->cor_cache->cache_fetch('fields_types');
		$f_type = $this->input->get('f_type');
		$f_media = $this->input->get('f_media');
		$this->db->select('*',false)->from('module_fields')->like('f_name',$this->input->get('f_name'));
		if($f_type) $this->db->where('f_type',$f_type);
		if($f_media) $this->db->where('f_media',$f_media-1);
		$this->db->order_by('f_id','desc');
		$data = $this->cor_db->fetch_all(15);
		$data['fields_types'] = $fields_types;
		$data['medias'] = array(2=>'是',1=>'否');
		$this->cor_page->load_backend_view('fields_list',$data);
	}


	function action_view(){
		$fields_types = $this->cor_cache->cache_fetch('fields_types');
		$data = array('main'=>$this->im->detail($this->uri->segment(4)),'fields_types'=>$fields_types);
		$this->cor_page->load_backend_view('fields_view',$data);
	}
}
?>