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
class Modules extends CI_Controller{
	function __construct(){
		parent::__construct();
		//auth login
        $this->init_auth->execute_auth();		
		$this->load->model("Modules_model",'im');
		$this->load->model("Fields_model",'fm');
		$this->lang->load('item_backend_modules',lang_get());

	}

	function action_add(){
		$f_ids = $this->fm->fetch_select();
		$m_id = $this->uri->segment(4);
		if($m_id){
			$main = $this->im->main($m_id);
			
			$detail = $this->im->details($m_id);
			
			
		}else{			
			$t = 2;
			$main = array();
 			$detail = array_fill(0,$t,array('f_id'=>'','r_name'=>'','r_desc'=>'','r_value'=>'','main_id'=>'','detail_id'=>''));
	 	}
	 	
	 	
	 
		$data = array('detail_total'=>count($detail),'detail'=>$detail,'main'=>$main,'f_ids'=>$f_ids,'query_types'=>$this->init_cache->cache_fetch('query_types'),'subs'=>$this->im->subs($m_id));
		$this->init_page->load_backend_view('modules_add',$data);
	}

	function action_save(){
		$post_detail = $this->input->post('detail');
		$post_main = $this->input->post('main');
		$data = array('main'=>$post_main,'detail'=>$this->init_form->post_to_set($post_detail),'query_types'=>$this->init_cache->cache_fetch('query_types'));
		try{
			
			$this->form_validation->set_rules($this->im->valid_config($data));

			if($this->form_validation->run()){
				$flag = $this->db->select("*")->from('module')->where('m_tb',$data['main']['m_tb'])->where_not_in('m_id',$data['main']['m_id'])->count_all_results();
				if($flag) throw new Exception(lang('modules_valid_table'));

				$rs = $this->init_db->save($data,$this->im->save_config());

				//create table
				$this->im->create_table($data);
				//create sub module column
				
				$this->im->create_sub($rs);

				//create tag
				$this->im->create_tag($rs);


				$this->im->create_menu($rs);

				//insert log
				$log_cf = $this->im->save_config();
				$this->load->model('Logs_model');	

		 		$this->Logs_model->log_insert(array(
		 			'log_table'=>$log_cf['main']['table_name'],
		 			'log_table_id'=>$rs['main'][$log_cf['main']['primary_key']],
		 			'log_user'=>$this->init_auth->fetch_auth('user_name'),
		 			'log_date'=>date("Y-m-d H:i:s"),
		 			'log_sql'=>trim(implode("\n",(array)$this->db->sql_log)),
		 			'log_type'=>'11',
		 			'log_desc'=>sprintf('%s module %s success.',$rs['sys_db_type'],$rs['main']['m_name']),
		 		));

				$this->init_page->backend_redirect('modules/action_list',lang('modules_success_save'));
			}else{	
				
				$f_ids = $this->fm->fetch_select();
				$data = array_merge($data,array('f_ids'=>$f_ids));
				$this->init_page->load_backend_view('modules_add',$data);
			}

		}catch(EXCEPTION $e){
		
			$this->init_page->backend_redirect('javascript:history.go(-1);',$e->getMessage());
		}

	}


	function action_del(){
		try{
			$m_id = $this->input->post('m_id');
            $m_id = $m_id?$m_id:$this->uri->segment(4);
            if(!is_array($m_id)){
            	$m_id = array($m_id);
            }
			if(empty($m_id)) throw new Exception(lang('modules_error_parameter'));
            //judgment from module table
            $tn = 0;
            $ts = $this->db->select('m_tb,m_name',false)->from('module')->where_in('m_id',$m_id)->get()->result_array();
           	foreach($ts as $t){
           		if($this->db->table_exists($t['m_tb'])){
	           		$tn += $this->db->from($t['m_tb'])->count_all_results();
	           		$m_names[] = $t['m_name'];
           		}
           	}

           	if($tn>0){
           		throw new Exception(lang('modules_error_delete'));
           	}
           	
           	//delete from tag template
           	$this->db->from('templates')->where('t_type',4)->where_in('t_name',$m_names);
           	$this->db->delete();

           	//drop tables 
			$drops =  $this->im->drop_table_sql($m_id);
			//delete module
			$rs = $this->init_db->delete($m_id,$this->im->save_config());
			foreach($drops as $v):
				$this->db->query($v);
			endforeach;

			//delete menu
			$this->db->_reset_select();
			$this->db->where_in('r_title',$m_names);
			$this->db->where('r_type',1);
			$this->db->delete("system_rights");
			$this->db->_reset_select();

			//insert log
			$log_cf = $this->im->save_config();
			$this->load->model('Logs_model');	
	 		$this->Logs_model->log_insert(array(
	 			'log_table'=>$log_cf['main']['table_name'],
	 			'log_table_id'=>$rs[$log_cf['main']['primary_key']],
	 			'log_user'=>$this->init_auth->fetch_auth('user_name'),
	 			'log_date'=>date("Y-m-d H:i:s"),
	 			'log_sql'=>trim(implode("\n",(array)$this->db->sql_log)),
	 			'log_type'=>'11',
	 			'log_desc'=>sprintf('delete module %s success.',$rs['m_name']),
	 		));


			//page redirect
			$this->init_page->backend_redirect('modules/action_list',lang('modules_success_delete'));
		}catch(EXCEPTION $e){
			$this->init_page->backend_redirect('modules/action_list',$e->getMessage());
		}
	}

	function action_list(){
		$f_ids = $this->fm->fetch_select();
		$m_type = $this->input->get('m_type');
		$this->db->select('*',false)->from('module')->like('m_name',$this->input->get('m_name'))->like('m_tb',$this->input->get('m_tb'))->order_by('m_id','desc');
		if($m_type) $this->db->where('m_type',$m_type);
		$data = $this->init_db->fetch_all(15);
		$data['f_ids'] = $f_ids;
		$this->init_page->load_backend_view('modules_list',$data);
	}
}
?>