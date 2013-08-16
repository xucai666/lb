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
        $this->myauth->execute_auth();		
		$this->load->model("Modules_model",'im');
		$this->load->model("Fields_model",'fm');
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
	 		 
		$data = array('detail_total'=>count($detail),'detail'=>$detail,'main'=>$main,'f_ids'=>$f_ids,'query_types'=>$this->mycache->cache_fetch('query_types'));
		$this->mypage->load_backend_view('modules_add',$data);
	}

	function action_save(){
		$post_detail = $this->input->post('detail');
		$post_main = $this->input->post('main');
		$data = array('main'=>$post_main,'detail'=>$this->myform->post_to_set($post_detail),'query_types'=>$this->mycache->cache_fetch('query_types'));
		try{
			if(array_search(1,$post_detail['r_primary'])===false){
				throw new Exception("请添加主键字段");
				
			}
			$this->form_validation->set_rules($this->im->valid_config($data));
			if($this->form_validation->run()){
				$flag = $this->db->select("*")->from('module')->where('m_tb',$data['main']['m_tb'])->where_not_in('m_id',$data['main']['m_id'])->count_all_results();
				if($flag) throw new Exception('保存失败，表格已经存在');
				$rs = $this->mydb->save($data,$this->im->save_config());
				//create table
				$this->im->create_table($data);
				//create tag
				$this->im->create_tag($rs);
				$this->im->create_menu($rs);
				$this->mypage->backend_redirect('modules/action_list','保存成功');
			}else{	
				
				$f_ids = $this->fm->fetch_select();
				$data = array_merge($data,array('f_ids'=>$f_ids));
				$this->mypage->load_backend_view('modules_add',$data);
			}

		}catch(EXCEPTION $e){
		
			$this->mypage->backend_redirect('javascript:history.go(-1);',$e->getMessage());
		}

	}


	function action_del(){
		try{
			$m_id = $this->input->post('m_id');
            $m_id = $m_id?$m_id:$this->uri->segment(4);
            if(!is_array($m_id)){
            	$m_id = array($m_id);
            }
			if(empty($m_id)) throw new Exception('参数错误');
            //judgment from module table
            $tn = 0;
            $ts = $this->db->select('m_tb,m_name',false)->from('module')->where_in('m_id',$m_id)->get()->result_array();
           	foreach($ts as $t){
           		$tn += $this->db->from($t['m_tb'])->count_all_results();
           		$m_names[] = $t['m_name'];
           	}

           	if($tn>0){
           		throw new Exception('删除失败，请先清除模型下的数据');
           	}
           	
           	//delete from tag template
           	$this->db->from('templates')->where('t_type',4)->where_in('t_name',$m_names);
           	$this->db->delete();

           	//drop tables 
			$drops =  $this->im->drop_table_sql($m_id);
			$this->mydb->delete($m_id,$this->im->save_config());
			foreach($drops as $v):
				$this->db->query($v);
			endforeach;
			//page redirect
			$this->mypage->backend_redirect('modules/action_list','删除成功');
		}catch(EXCEPTION $e){
			$this->mypage->backend_redirect('modules/action_list',$e->getMessage());
		}
	}

	function action_list(){
		$f_ids = $this->fm->fetch_select();
		$m_type = $this->input->get('m_type');
		$this->db->select('*',false)->from('module')->like('m_name',$this->input->get('m_name'))->like('m_tb',$this->input->get('m_tb'))->order_by('m_id','desc');
		if($m_type) $this->db->where('m_type',$m_type);
		$data = $this->mydb->fetch_all(15);
		$data['f_ids'] = $f_ids;
		$this->mypage->load_backend_view('modules_list',$data);
	}
}
?>