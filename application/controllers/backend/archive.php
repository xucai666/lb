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
class Archive extends CI_Controller{
	function __construct(){
		parent::__construct();
		//验证登陆
		$this->cor_auth->execute_auth();
		$this->load->model('Archive_model'); 
		$this->act = 'archive';	
		$this->im = $this->Archive_model;
		$this->lang->load('item_backend_archive',lang_get());	
		$this->m_lang = $this->lang->language;
		$this->tpl->assign('lang_archive',$this->m_lang);
		
	}

	
	/**
	 * 添加
	 */
	function action_add(){
		

		$class_id = $this->input->get('info_class');
		
		$class_info = array(
			'class_theme'=>$this->cor_cache->cache_fetch($this->act.'_class',$class_id),
		);	
					
		//查询
		$sql_arr = array(
			'table_name'=>$this->cor_db->table('infos'),
			'fields'=>'*',
			'primary_id'=>'info_class',
			'primary_val'=>$class_id,
		);	
		$main = $this->cor_db->fetch_one($sql_arr);
		$main['info_class'] = $class_id;
		$data = array(
			'main'=>$main,
			'editor'=>$data['editor']  = $this->Common_model->editor($main['info_content']),
			'class_info'=>$class_info,
		);
		
		$this->cor_page->load_backend_view(strtolower($this->act).'_add',$data);		
	}
	
	
	
	/**
	 * 保存
	 */
	 function action_save(){
	 	try{
	 		
	 		//数据
	 		$main = $this->input->post('main'); 	
	 		$class_id = $main['info_class'];		 	
			$class_info = array(
				'class_theme'=>$this->cor_cache->cache_fetch($this->act.'_class',$class_id),
			);
			$data  = array(
				'main'=>$main,
				'class_info'=>$class_info,
			);
	 		
		 	//验证
		 	$this->form_validation->set_rules($this->im->validator());
		 	if($this->form_validation->run()==true){	
		 		$db_config = $this->im->db_config();		 		 		
		 		$data_var = $this->cor_db->save($data,$db_config);
		 		
		 		$this->cor_page->pop_redirect('已保存',site_url('backend/archive/action_add/?info_class='.$class_id));
		 	}else{
				$data['editor']  = $this->Common_model->editor($main['info_content']);
		 		$this->cor_page->load_backend_view(strtolower($this->act).'_add',$data);
		 	}
	 		
	 	}catch(Exception $e){
	 		$this->cor_page->backend_redirect($this->act.'/action_add',$e->getMessage());
	 	}			
	 }
	
}
?>