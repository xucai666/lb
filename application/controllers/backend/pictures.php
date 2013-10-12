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
class Pictures extends CI_Controller{
	function __construct(){
		parent::__construct();
		//验证登陆
		$this->cor_auth->execute_auth();
		$this->load->model('Pictures_model'); 
		$this->act = 'pictures';	
		$this->im = $this->Pictures_model;
		
	}


	



	function action_head(){
		$this->cor_page->fetch_js('swfupload','loadview','swfupload/api');
		$this->cor_page->fetch_js(array('fileprogress','handlers','swfupload.queue'),'loadview','swfupload/js');
		$this->db->where('m_class','head');
		$data = $this->im->list_head();
		$this->cor_page->load_backend_view(strtolower($this->act)."_head.htm",$data);
		
	}

	/**
	 * 保存上传文件
	 */
	function action_head_save(){
		$post['main'] = array(
			'p_type'=>$this->input->post('p_type'),
			'p_tb'=>$this->input->post('p_tb'),
			'p_key'=>$this->input->post('p_key'),
			'p_thumb'=>$this->input->post('p_thumb'),
			'p_sort'=>$this->input->post('p_sort'),
		);
		//删除旧文件
		$this->db->where('p_key',$this->input->post('p_key'));
		$this->db->where('p_type',$this->input->post('p_type'));
		$this->db->delete($this->cor_db->table('pictures'));
		$this->im->save_single($post);
		exit(0);
	}
	
	
	
	function action_index_rotation(){
		$this->cor_page->fetch_js('swfupload','loadview',base_url().'/swfupload/api');
		$this->cor_page->fetch_js(array('fileprogress','handlers','swfupload.queue'),'loadview',base_url().'swfupload/js');
		$this->db->where('m_class','index_rotation');
		$data = $this->im->list_index();
		$data['list'] = array_pad($data['list'],3,array());
		$this->cor_page->load_backend_view(strtolower($this->act)."_index_rotation.htm",$data);
		
	}
	
	 /* 保存上传文件
	 */
	function action_index_rotation_save(){
		$post['main'] = array(
			'p_type'=>$this->input->post('p_type'),
			'p_tb'=>$this->input->post('p_tb'),
			'p_key'=>$this->input->post('p_key'),
			'p_thumb'=>$this->input->post('p_thumb'),
			'p_sort'=>$this->input->post('p_sort'),
		);
		//删除旧文件
		$this->db->where('p_id',$this->input->post('p_id'));
		$this->db->where('p_type',$this->input->post('p_type'));
		$this->db->delete($this->cor_db->table('pictures'));
		$data = $this->im->save_single($post);
		echo json_encode($data);
		exit(0);
	}
	
	/**
	 * 保存排序
	 */
	function action_sort_save(){
		$post['main'] = array(
			'p_id'=>$this->input->post('p_id'),
			'p_sort'=>$this->input->post('p_sort'),
		);
		$data = $this->im->save_single($post);
		exit();
	}
	
 	/**
 	 * 删除图片
 	 */
 	function action_del_index_rotation(){
 		$this->db->where('p_id',$this->input->get('p_id'));
		$this->db->delete($this->cor_db->table('pictures'));
		$this->cor_page->backend_redirect('pictures/action_index_rotation');
 		
 	}
 	
 
 	
	
}
?>