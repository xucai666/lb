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

class Category extends CI_Controller{
	function __construct(){
		parent::__construct();
		//验证登陆
		$this->init_auth->execute_auth();
		$config = &get_config();
		$this->init_page->fetch_css(array('backend_category'),'view',$this->init_page->getRes('css','backend'));
		$this->load->model('Category_model');	
		$this->act = 'category';	
		$this->lang->load('item_backend_category', lang_get());	 
		$this->tpl->assign('lang_category',$this->lang->language);	 		 
	}
	
	/**
	 * 方法说明
	 */
	 function action_add(){
 		try{
 			
 			$c_id = $this->input->get_post('c_id');
 			if($c_id){ 	
	 			$main = $this->Category_model->detail($this->input->get_post('c_id'),'byid');
	 			$parent_cat  = $this->Category_model->fetch_parent($main['c_sn']);

	 			$cat = $this->Category_model->fetch_category_option(null,$parent_cat['c_sn'],$main['c_sn']);
	 		
 			}else{
 				$c_parent = $this->input->get_post('c_parent');
				$c_parent = $c_parent?$c_parent:$this->input->get_post('parent');
 				$cat = $this->Category_model->fetch_category_option($c_parent,$c_parent);
 				
 			}	
 			$data = array(
				'catgory'=>$cat,
				'main'=>$main,
 			);
	 		$this->init_page->load_backend_view(strtolower($this->act).'_add',$data);
	 	
	 		
	 	}catch(Exception $e){
	 		$this->init_page->backend_redirect('category/action_list',$e->getMessage());
	 	}			
	 }
	
	/* 
	 * 保存
	 */
	 function action_save(){
	 	//数据
	 	$main = $this->input->get_post('main');
	 	$c_sn = $main['c_sn'];
	 	$parent_cat = $this->input->get_post('parent_cat');
	 	try{
	 		
 			$data = array(
				'catgory'=>$this->Category_model->fetch_category_option(null,$parent_cat),
				'main'=>$main,
 			);
		 	//验证
		 	$this->form_validation->set_rules($this->Category_model->validator());
		 	if($this->form_validation->run()==true){	
		 		
		 		//处理分类编码
		 		
		 		$data['main']['c_sn']  = $this->Category_model->fetch_new_sn($main['c_sn'],$parent_cat);
		 		
		 		//更新子类的识别码
		 		
		 		if(strcmp($data['main']['c_sn'],$main['c_sn'])!=0&&$main['c_id']){
		 			$sql = "update ".$this->init_db->table('category')." set c_sn=concat('".$data['main']['c_sn']."',right(c_sn,length(c_sn)-".strlen($main['c_sn']).")) " .
		 					",c_level  =(length(c_sn)/2-1)" .
		 					"where c_sn like '".$main['c_sn']."_%'";
		 			$this->db->query($sql);
		 		}
		 		$data['main']['c_level'] = intval(strlen($data['main']['c_sn'])/2-1);
		 		$this->init_db->save($data,$this->Category_model->db_config());
		 		
		 		//扩展更新
		 		
		 		$this->Category_model->ext_save($main['c_sn'],$data['main']['c_sn']);
		 		$this->init_page->pop_redirect('已保存',site_url("d=backend&c=category&m=action_list&parent=".$parent_cat));
		 	}else{
		 		$this->init_page->load_backend_view(strtolower($this->act).'_add',$data);
		 	}
	 		
	 	}catch(Exception $e){
	 		$this->init_page->backend_redirect('category/action_list?parent='.$parent_cat,$e->getMessage());
	 	}			
	 }
	 
	 /**
	 * 方法说明
	 */
	 function action_list(){
	 	try{
	 		$c_parent = $this->input->get_post('parent');
 			$data = $this->Category_model->fetch_list($c_parent); 	
	 		$this->init_page->load_backend_view(strtolower($this->act).'_list',$data);
		 	
	 		
	 	}catch(Exception $e){
	 		$this->init_page->backend_redirect('category/action_list',$e->getMessage());
	 	}			
	 }
	 
	 
	 /**
	 * 方法说明
	 */
	 function action_del(){
	 	try{
 			$main = $this->db->select('*',false)->from('category')->where('c_id',$this->input->get_post('c_id'))->get()->first_row('array');
 			//验证是否可删除
 			$del_ok = $this->Category_model->valid_del($main['c_sn']);
 			
 			if(empty($del_ok)) throw new Exception('相关信息未删除，分类不可删除');
			$this->init_db->delete($this->input->get_post('c_id'),$this->Category_model->db_config());
			
			//扩展处理
			
			$this->Category_model->ext_del($main['c_sn']);
			$this->init_page->pop_redirect('已删除',site_url("d=backend&c=category&m=action_list"));
		 	
	 		
	 	}catch(Exception $e){
	 		
	 		$this->init_page->backend_redirect('category/action_list',$e->getMessage());
	 	}			
	 }
	
	
	
	
}
?>
