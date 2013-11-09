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
class Tree extends CI_Controller{
	function __construct(){
		parent::__construct();
		//auth login		
        $this->init_auth->execute_auth();
		$this->load->model("Tree_model",'im');

	}

	function index(){
		$data = array('treeIds'=>$this->init_cache->cache_fetch('treeIds'));
		$this->init_page->load_backend_view('tree_select',$data);
	}
	


	function action_root_add(){		
		$treeId = $this->uri->segment(4);
		$main = array();
		if($treeId){
			$main = $this->im->tree_detail($treeId);
		}
		$data = array('main'=>$main);
		$this->init_page->load_backend_view('tree_root_add',$data);


	}


	function action_root_save(){
		$main = $this->input->post('main');				
		$data = array('main'=>$main);
		try{
			$this->form_validation->set_rules($this->im->valid_config());
			if($this->form_validation->run()){
				if($main['id']){					
					//edit
					$this->im->edit_tree_root_node($main[id],$main[code],$main[name]);
				}else{					
					//add
					$main['id'] = $this->im->add_tree_root_node($main[code],$main[name]);
				}
				$this->db->where('id',$main['id']);
				$this->db->update('tree_node',$main);

				//create  tree cache
		 	 	$treeIds = $this->init_form->array_re_index($this->db->select('treeId,name')->from('tree_node')->where('pid',0)->get()->result_array(),'treeId','name');
		 	 	$this->init_cache->cache_create($treeIds,'treeIds');
			
				$this->init_page->backend_redirect('tree/index','保存成功');
			}else{
				$data = array_merge(array('pids'=>$this->im->fetch_select()),$data);				
				$this->init_page->load_backend_view('tree_root_add',$data);
			}

		}catch(EXCEPTION $e){
			$this->init_page->backend_redirect('tree/index',$e->getMessage());
		}

	}



	function action_root_set(){
		$this->im->set_root($this->uri->segment(4));
		$this->init_page->backend_redirect('tree/action_list');

	}







	function action_add(){
		
		$pids = $this->im->fetch_select();
		$id = $this->uri->segment(4);
		$main = array();
		if($id){
			$main = $this->im->detail($id);
		}
		$data = array('main'=>$main,'pids'=>$pids);
		$this->init_page->load_backend_view('tree_add',$data);
	}

	function action_save(){
		$main = $this->input->post('main');
		$main = php_escape($main);
		$main['treeId'] = $this->im->detail($main[pid],'treeId');
		$data = array('main'=>$main);
		try{
			$this->form_validation->set_rules($this->im->valid_config());
			if($this->form_validation->run()){
				if($main['id']){
					//edit
					$this->im->edit_tree_node($main[id],$main[pid],$main[code],$main[name]);
				}else{
					//add
					$main['id'] = $this->im->add_tree_node($main[pid],$main[code],$main[name]);
				}
				$this->db->where('id',$main['id']);
				$this->db->update('tree_node',$main);
				//create cache
				$this->im->cache_create();

				//save ok
				$this->init_page->backend_redirect('tree/action_list','保存成功');
			}else{
				$data = array_merge(array('pids'=>$this->im->fetch_select()),$data);				
				$this->init_page->load_backend_view('tree_add',$data);
			}

		}catch(EXCEPTION $e){
			$this->init_page->backend_redirect('tree/action_list',$e->getMessage());
		}

	}


	function action_del(){
		try{
			$id = $this->input->post('id');
            $id = $id?$id:$this->uri->segment(4);
			if(empty($id)) throw new Exception('参数错误');
			foreach((array)$id as $item){
				$this->im->delete_tree_node($item);
			}
			
			$this->init_page->backend_redirect('tree/action_list','删除成功');
		}catch(EXCEPTION $e){
			$this->init_page->backend_redirect($_SERVER['HTTP_REFERER'],$e->getMessage());
		}
	}

	function action_list(){
		$data = $this->im->fetch_cache();
		$this->init_page->load_backend_view('tree_list',$data);
	}



}
?>