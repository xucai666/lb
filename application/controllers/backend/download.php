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
class Download extends CI_Controller{
	function __construct(){
		parent::__construct();
		//验证登陆
		$this->init_auth->execute_auth();
		$this->load->model(array('Download_model','Category_model'));
 		$this->act = 'download';
 		$this->im = $this->Download_model;
 		$this->lang->load('item_backend_download',lang_get());	
 		$this->m_lang = $this->lang->language;
		$this->tpl->assign('lang_download',$this->m_lang);
	}

	
	/**
	 * 添加
	 */
	function action_add(){
		//查询
		$info_id = $this->input->get('info_id');
		$parent_class = $this->input->get('parent_class');
		if($info_id){
			$main = $this->db->select('*')->from('infos')->where('info_id',$info_id)->get()->first_row('array');
			
		}else{
			
			$main['info_class_sn'] = $parent_class;
		}
		
		$this->load->model('Product_model');
		$pro_options  = $this->Product_model->product_select();		
		
		$parent_class_info = $this->Category_model->detail($parent_class,'bysn');
		$class_select  = $this->Category_model->fetch_category_option($parent_class,$main['info_class_sn']);
		
		$soft_class_select  = $this->Category_model->fetch_category_option('0107',$main['info_soft_class_sn']);
		
		$select_soft_language = $this->init_cache->cache_fetch("select_language_soft");		
		
		
		$class_info = array(
			'class_theme'=>$parent_class_info['c_title'],
			'parent_class'=>$parent_class_info['c_sn'],
			'class_select'=>$class_select,
			'soft_class_select'=>$soft_class_select,
			'select_soft_language'=>$select_soft_language,
			
		);	
		
		
		$data = array(
			'main'=>$main,
			'editor'=>$data['editor']  = $this->Common_model->editor($main['info_content']),
			'class_info'=>$class_info,
			'pro_options'=>$pro_options,
			'pro_select'=>explode(',',$main['pro_id']),
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
			$parent_class = $this->input->post('parent_class');
			$parent_class_info = $this->Category_model->detail($parent_class,'bysn');
			$class_select  = $this->Category_model->fetch_category_option($parent_class,$parent_class);
			$class_info = array(
				'class_theme'=>$parent_class_info['c_title'],
				'parent_class'=>$parent_class_info['c_sn'],
				'class_select'=>$class_select,
			);			
	 		
			$data  = array(
				'main'=>$main,
				'class_info'=>$class_info,
			);
	 		
		 	//验证
		 	$this->form_validation->set_rules($this->im->validator());
		 	if($this->form_validation->run()==true){	
		 		
		 		
		 	//图片上传 
		 		
		 	 $file_config = config_item('download_files');
			 $root_path = $file_config['upload_path'].'/';
			 $file_upload_path_ext = date('Y-m-d')."/";
			 $file_upload_path = $root_path.$file_upload_path_ext.'/';
			 $file_config['upload_path']	  =  $file_upload_path;	
			 $this->Common_model->mkdirs($file_upload_path);
			 $this->load->library('upload', $file_config);				
			 if($_FILES['file1']['size']>0){
				if ( ! $this->upload->do_upload("file1")){	
				  	throw new Exception($this->upload->display_errors());
				  }else{
						 $files_info = $this->upload->data();
						 

						 @unlink('../../'.$main['info_soft_url']);
						$data['main']['info_soft_url'] = str_replace(str_replace("\\","/",FCPATH),'',$files_info['full_path']);
				 }				 	
			 }			
			 
		 		$db_config = $this->im->db_config(); 
		 		$data['main']['pro_id'] = implode(",",$data['main']['pro_id']);
		 		$data_var = $this->init_db->save($data,$db_config);
		 		$this->init_page->pop_redirect('已保存',site_url('backend/'.$this->act.'/action_list/?parent_class='.$parent_class));
		 	}else{
				$data['editor']  = $this->Common_model->editor($main['info_content']);
		 		$this->init_page->load_backend_view(strtolower($this->act).'_add',$data);
		 	}
	 		
	 	}catch(Exception  $e){
	 		$this->init_page->backend_redirect($this->act.'/action_add?parent_class='.$parent_class,$e->getMessage());
	 	}			
	 }
	
	
	
	//新闻列表
	
	function action_list(){
		$parent_class = $this->input->get('parent_class');
		$search_class = $this->input->get('search_class');
		$parent_class_info = $this->Category_model->detail($parent_class,'bysn');
		$class_select  = $this->Category_model->fetch_category_option($parent_class,$search_class);
		$class_info = array(
				'class_theme'=>$parent_class_info['c_title'],
				'parent_class'=>$parent_class_info['c_sn'],
				'class_select'=>$class_select,
		);		
					
		$this->init_page->fetch_css(array('backend_download'));
		$this->db->select("a.*,b.c_title",false)->from('infos as a')
		->join('category as b','a.info_class_sn=b.c_sn')
		->like('a.info_class_sn',$parent_class,'after')
		->like('a.info_class_sn',$search_class,'after');
		
		$query_pro_id = $this->input->get('pro_id');
		$query_pro_id && $this->db->where("pro_id",$query_pro_id,false);

		$this->db->order_by("info_id","desc");
		
		
		$data = $this->init_db->fetch_all();	
		$this->load->model("Product_model");
		$pro_options  = $this->Product_model->product_select();			
		
		
		$data = array_merge($data,
		array(
			'class_info'=>$class_info,
			'product_options'=>$pro_options,
			'product_select'=>$this->input->get('pro_id'),
		)
		);	
		$pro_all = implode(',',(array)array_re_index($data['list'],'pro_id','pro_id'));
		if($pro_all){
			$pro_list = $this->db->query("select pro_title,pro_id from ".$this->init_db->table('products')." where pro_id in(".$pro_all.")")->result_array();
			$pro_name_all = array_re_index($pro_list,'pro_id','pro_title');
			foreach($data['list'] as &$v) $v['pro_name'] = $pro_name_all[$v['pro_id']];
		}
		$this->init_page->load_backend_view(strtolower($this->act)."_list",$data);
		
	}
	
	
	function action_del(){
		try{			
			$id = $this->input->post("info_id");
			$id = $id?$id:$this->input->get("info_id");				
			$parent_class = $this->input->get('parent_class');		
			$this->db->where_in('info_id',$id);
	 		$this->db->delete($this->init_db->table('infos'));			
			$this->init_page->pop_redirect('已删除',site_url('backend/'.$this->act.'/action_list/?parent_class='.$parent_class));
		}catch(Exception $e){			
			show_error($e->getMessage());
		}
	
	}
	
	
	
	
	
	
 	
 	
 
 	
	
}
?>