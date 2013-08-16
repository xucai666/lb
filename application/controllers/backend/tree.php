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
        $this->myauth->execute_auth();
		$this->load->model("Tree_model",'im');
		
	}

	function index(){
		$data = array('treeIds'=>$this->mycache->cache_fetch('treeIds'));
		$this->mypage->load_backend_view('tree_select',$data);
	}

	function action_root_set(){
		$this->im->set_root($this->uri->segment(4));
		$this->mypage->backend_redirect('tree/action_list');

	}

	function action_add(){
		
		$pids = $this->im->fetch_select();
		$id = $this->uri->segment(4);
		$main = array();
		if($id){
			$main = $this->im->detail($id);
		}
		$data = array('main'=>$main,'pids'=>$pids);
		$this->mypage->load_backend_view('tree_add',$data);
	}

	function action_save(){
		$main = $this->input->post('main');
		$main['treeId'] = $this->im->detail($main[pid],'treeId');
		$data = array('main'=>$main);
		try{
			$this->form_validation->set_rules($this->im->valid_config());
			if($this->form_validation->run()){
				if($main['id']){
					//edit
					$this->db->query("CALL editTreeNode(".$main[id].",".$main[pid].",'".$main[code]."','".$main[name]."',@resultCode,@resultMsg)");	
				}else{
					//add
					$this->db->query("CALL addTreeNode(".$main[pid].",'".$main[code]."','".$main[name]."',@resultCode,@resultMsg)");	
					$main['id'] = $this->db->insert_id();
				}
				$this->db->where('id',$main['id']);
				$this->db->update('tree_node',$main);
			
				$this->mypage->backend_redirect('tree/action_list','保存成功');
			}else{
				$data = array_merge(array('pids'=>$this->im->fetch_select()),$data);				
				$this->mypage->load_backend_view('tree_add',$data);
			}

		}catch(EXCEPTION $e){
			$this->mypage->backend_redirect($_SREVER['HTTP_REFERER'],$e->getMessage());
		}

	}


	function action_del(){
		try{
			$id = $this->input->post('id');
            $id = $id?$id:$this->uri->segment(4);
			if(empty($id)) throw new Exception('参数错误');
			foreach((array)$id as $item){
				$this->db->query("CALL deleteTreeNode(".$item.",@resultCode,@resultMsg)");
			}
			
			$this->mypage->backend_redirect('tree/action_list','删除成功');
		}catch(EXCEPTION $e){
			$this->mypage->backend_redirect($_SERVER['HTTP_REFERER'],$e->getMessage());
		}
	}

	function action_list(){
		$this->db->select('id,treeId,pid',false)->select('LEVEL,CONCAT(REPEAT("|-",LEVEL),NAME) as name',false)->from('tree_node')->where('treeId',$this->im->get_root())->like('name',$this->input->get('name'))->order_by('leftId','asc');
		if($treeId) $this->db->where('treeId',$treeId);
		$data = $this->mydb->fetch_all(15);
		$data['treeIds'] = $treeIds;
		$this->mypage->load_backend_view('tree_list',$data);
	}
}
?>