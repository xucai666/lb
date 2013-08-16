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
        $this->myauth->execute_auth();
		$this->load->model("Fields_model",'im');
	}

	function action_add(){
		$fields_types = $this->mycache->cache_fetch('fields_types');
		$f_id = $this->uri->segment(4);
		$main = array();
		if($f_id){
			$main = $this->im->detail($f_id);
		}
		
		$data = array('main'=>$main,'fields_types'=>$fields_types);
		$this->mypage->load_backend_view('fields_add',$data);
	}

	function action_save(){
		$data = array('main'=>$this->input->post('main'));
		try{
			$this->form_validation->set_rules($this->im->valid_config());
			if($this->form_validation->run()){
				$this->mydb->save($data,$this->im->save_config());
				$this->mypage->backend_redirect('fields/action_list','保存成功');
			}else{				
				$this->mypage->load_backend_view('fields_add',$data);
			}

		}catch(EXCEPTION $e){
			$this->mypage->backend_redirect($_SREVER['HTTP_REFERER'],$e->getMessage());
		}

	}


	function action_del(){
		try{
			$f_id = $this->input->post('f_id');
            $f_id = $f_id?$f_id:$this->uri->segment(4);
			if(empty($f_id)) throw new Exception('参数错误');
			$this->mydb->delete($f_id,$this->im->save_config());
			$this->mypage->backend_redirect('fields/action_list','删除成功');
		}catch(EXCEPTION $e){
			$this->mypage->backend_redirect($_SERVER['HTTP_REFERER'],$e->getMessage());
		}
	}

	function action_list(){
		$fields_types = $this->mycache->cache_fetch('fields_types');
		$f_type = $this->input->get('f_type');
		$this->db->select('*',false)->from('module_fields')->like('f_name',$this->input->get('f_name'))->order_by('f_id','desc');
		if($f_type) $this->db->where('f_type',$f_type);
		$data = $this->mydb->fetch_all(15);
		$data['fields_types'] = $fields_types;
		$this->mypage->load_backend_view('fields_list',$data);
	}


	function action_view(){
		$fields_types = $this->mycache->cache_fetch('fields_types');
		$data = array('main'=>$this->im->detail($this->uri->segment(4)),'fields_types'=>$fields_types);
		$this->mypage->load_backend_view('fields_view',$data);
	}
}
?>