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
class Mdata extends CI_Controller{
	function __construct(){
		parent::__construct();
		//auth login
        $this->myauth->execute_auth();		
		$this->load->model("Modules_model",'m');
		$this->load->model("Fields_model",'f');
		$this->load->model("Mdata_model",'im');
		$this->lang->load('item_backend_mdata',$this->Common_model->lang_get());
		
		
		

	}

	function index(){
		$data = $this->im->select_list();
		$this->mypage->load_backend_view('mdata_select',$data);
	}

	function action_set_module(){
		$this->im->set_mid($this->uri->segment(4));
		$this->mypage->backend_redirect('mdata/action_list');
	}


	function action_add(){

		$id = $this->uri->segment(4);
		$module_id = $this->im->get_mid();
		//fetch fileds

		$main = array();
		if($id){
			$main = $this->im->detail($id);
			
		}

		$detail = $this->im->details($id);

		//all fields
		$fields = $this->m->details($module_id,array('r_primary'=>'0'));	

	
		
		//primary key
		$primary = $this->m->fetch_primary($module_id,'r_name');


		

		//fields html
		$fields_html = $this->m->fetch_f_html();
		

		$data = array('ops'=>array(1=>1,2=>2,3=>3),'main'=>$main,'fields'=>$fields,'html'=>$fields_html,'primary'=>$primary);
		$data = array_merge($data,array('theme'=>$this->m->main($module_id,'m_name')));

		//detail
		$dt_mid = $this->m->main($module_id,'m_sub');
		$dt_fields = $this->m->details($dt_mid,array('r_primary'=>'0'));	

		//detail primary key
		$dt_primary = $this->m->fetch_primary($dt_mid,'r_name');

		$data = array_merge($data,array('dt_fields'=>$dt_fields,'dt_primary'=>$dt_primary,'detail'=>$detail,'detail_total'=>count($detail),'dt_mid'=>$dt_mid));
		
		$this->mypage->load_backend_view('mdata_add',$data);
	}

	function action_save(){
		$main = $this->input->post('main');
		$detail = $this->myform->post_to_set($this->input->post('detail'));

		
		$data = array('main'=>$main,'detail'=>$detail);
		try{
			$rules = $this->im->valid_config($data);
			$this->form_validation->set_rules($rules);

			if($this->form_validation->run()==false && $rules){
				$module_id = $this->im->get_mid();
				//all fields
				$fields = $this->m->details($module_id,array('r_primary'=>'0'));
				//primary key
				$primary = $this->m->fetch_primary($module_id,'r_name');

				//fields html
				$fields_html = $this->m->fetch_f_html();
				
				$data = array('main'=>$main,'fields'=>$fields,'html'=>$fields_html,'primary'=>$primary);

				//detail
				$dt_mid = $this->m->main($module_id,'m_sub');
				$dt_fields = $this->m->details($dt_mid,array('r_primary'=>'0'));	

				//detail primary key
				$dt_primary = $this->m->fetch_primary($dt_mid,'r_name');

				$data = array_merge($data,array('dt_fields'=>$dt_fields,'dt_primary'=>$dt_primary,'detail'=>$detail,'detail_total'=>count($detail),'dt_mid'=>$dt_mid));	

				
				$this->mypage->load_backend_view('mdata_add',$data);
				
			}else{	
				
				$rs = $this->mydb->save($data,$this->im->save_config());

				//insert log
				$log_cf = $this->im->save_config();
				$this->load->model('Logs_model');	
		 		$this->Logs_model->log_insert(array(
		 			'log_table'=>$log_cf['main']['table_name'],
		 			'log_table_id'=>$rs['main'][$log_cf['main']['primary_key']],
		 			'log_user'=>$this->myauth->fetch_auth('user_name'),
		 			'log_date'=>date("Y-m-d H:i:s"),
		 			'log_sql'=>trim(implode("\n",(array)$this->db->sql_log)),
		 			'log_type'=>'12',
		 			'log_desc'=>sprintf('module %s,%s ID %s success',$this->m->main($this->im->get_mid(),'m_name'),$rs['sys_db_type'],$rs['main'][$log_cf['main']['primary_key']]),
		 		));

				$this->mypage->backend_redirect('mdata/action_list','保存成功');
			}

		}catch(EXCEPTION $e){
			$this->mypage->backend_redirect($_SREVER['HTTP_REFERER'],$e->getMessage());
		}

	}


	function action_del(){
		try{
			$primary = $this->m->fetch_primary($this->im->get_mid(),'r_name');
			$ids = $this->input->post($primary);
            $ids = $ids?$ids:$this->uri->segment(4);
			if(empty($ids)) throw new Exception('参数错误');
			$rs = $this->mydb->delete($ids,$this->im->save_config());

			//insert log
			$log_cf = $this->im->save_config();
			$this->load->model('Logs_model');	
	 		$this->Logs_model->log_insert(array(
	 			'log_table'=>$log_cf['main']['table_name'],
	 			'log_table_id'=>$rs[$log_cf['main']['primary_key']],
	 			'log_user'=>$this->myauth->fetch_auth('user_name'),
	 			'log_date'=>date("Y-m-d H:i:s"),
	 			'log_sql'=>trim(implode("\n",(array)$this->db->sql_log)),
	 			'log_type'=>'12',
	 			'log_desc'=>sprintf('module %s,delete  %s success.',$this->m->main($this->im->get_mid(),'m_name'),$rs[$log_cf['main']['primary_key']]),
	 		));


			$this->mypage->backend_redirect('mdata/action_list','删除成功');
		}catch(EXCEPTION $e){
			$this->mypage->backend_redirect($_SERVER['HTTP_REFERER'],$e->getMessage());
		}
	}

	function action_list(){
		$query  = $this->input->get();
		$size = 15;
		$data = $this->im->fetch_list($size,$query);

		$data = array_merge($data,array('theme'=>$this->m->main($this->im->get_mid(),'m_name')));
		
		$this->mypage->load_backend_view('mdata_list',$data);
	}
}
?>