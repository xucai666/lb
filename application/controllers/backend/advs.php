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
class Advs extends CI_Controller{
	function __construct(){
		parent::__construct();
		//验证登陆
		$this->init_auth->execute_auth();
		$this->load->model('Advs_model'); 
		$this->load->model('Category_model'); 
		$this->parent_cat = $this->input->get('parent_cat');
		$this->parent_cat_detail  =$this->Category_model->detail($this->parent_cat,'c_sn');
		$this->im = $this->Advs_model;
		$this->act = 'Advs';

	}

	
	/**
	 * 添加
	 */
	function action_add(){
		//查询
		$adv_id = $this->input->get('adv_id');
		if($adv_id){
			$main = $this->db->select('*')->from('advs')->where('adv_id',$this->input->get('adv_id'))->get()->first_row('array');
			$detail = $this->db->query("select * from ".$this->init_db->table('adv_detail')." where adv_id=".$adv_id)->result_array();
		}else{
			
			$main['adv_type'] = 1;
		}
		$detail = array_pad((array)$detail,2,'');
		
		$adv_show = $this->im->showadv($adv_id);	
		$data = array(
			'main'=>$main,
			'detail'=>$detail,
			'total_size'=>count($detail),
			'editor'=> $this->Common_model->editor($main['info_content']),
			'adv_show'=> $adv_show,
		);		
		$this->init_page->load_backend_view(strtolower($this->act).'_add',$data);		
	}
	
	
	
	/**
	 * 保存
	 */
	 function action_save(){
	 	try{		 	
	 		 //数据
	 		$main = $this->input->post('main');	
	 		$detail = $this->input->post('detail');	
	 		$data['main'] = $main;
		 	//验证
		 	$this->form_validation->set_rules($this->im->validator());
		 	if($this->form_validation->run()==true){
		 		//上传文件	
		 		$data = $this->im->do_upload($main);
		 		$rs = $this->init_db->save($data,$this->im->db_config());
		 		$main  = $rs['main'];
		 		$adv_id = $main['adv_id'];
				$adv_show = $this->im->showadv($adv_id);	

				$adv_show =  "document.write('".str_replace(array("\r","\n"),array('',''),addslashes($adv_show))."');";
				MakeHtmlFile(FCPATH.config_item('html_root').'/js/zh_'.$adv_id.'.js',$adv_show);	
		 		$this->init_page->pop_redirect('已保存',site_url('backend/advs/action_list/?parent_cat='.$main['info_class_sn']));
		 	}else{
		 	
		 		$data['detail'] = array_pad((array)$this->init_form->post_to_set($detail),2,'');
		 		
				$data['editor']  = $this->Common_model->editor($main['info_content']);
		 		$this->init_page->load_backend_view('advs_add',$data);
		 	}

	 	}catch(Exception $e){
	 		$this->init_page->backend_redirect('javascript:history.go(-1);',$e->getMessage());
	 	}			
	 }
	
	 function action_view(){
	 	 $adv_id   = $this->input->get('adv_id');
	 	 $data['adv_url'] = base_url().config_item('html_root').'/js/zh_'.$adv_id.'.js';
		 $this->init_page->load_backend_view('advs_view',$data);	
	 }
	 
	 /*
	  *  * 方法说明
	 */
	 function action_list(){
	 	try{
	 		//分类
 			
 			$data = $this->im->fetch_list();
	 		$this->init_page->load_backend_view(strtolower($this->act).'_list',$data);
		 	
	 		
	 	}catch(Exception $e){
	 		$this->init_page->backend_redirect('advs/action_list/',$e->getMessage());
	 	}			
	 }
	
	
	
	

	 
	 /**
	 * 方法说明
	 */
	 function action_del(){
	 	try{
			$this->init_db->delete($this->input->get('adv_id'),$this->im->db_config());
			$this->init_page->pop_redirect('已删除',site_url('backend/advs/action_list/'));
		 	
	 		
	 	}catch(Exception $e){
	 		
	 		$this->init_page->backend_redirect('advs/action_list/',$e->getMessage());
	 	}			
	 }
	
	
 	
 	
 
 	
	
}
?>