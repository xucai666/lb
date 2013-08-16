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
class Friendlink extends CI_Controller{
	function __construct(){
		parent::__construct();
		//验证登陆
		$this->myauth->execute_auth();
		$this->load->model(array('Friendlink_model','Category_model')); 
		$this->act  = 'friendlink';
		$this->im = $this->Friendlink_model;
		$this->table = $this->mydb->table('friendlink');
		$this->lang->load('item_backend_friendlink',$this->Common_model->lang_get());
	}

	
	/**
	 * 添加
	 */
	function action_add(){
		
		//查询
		$link_id = $this->input->get('link_id');
		$parent_class = $this->input->get('parent_class');
		if($link_id){
			$sql_arr = array(
				'table_name'=>$this->table,
				'fields'=>'*',
				'primary_id'=>'link_id',
				'primary_val'=>$link_id,
			);	
				
			$main = $this->mydb->fetch_one($sql_arr);				
			
		}
		
		$data = array(
			'main'=>$main,
			'editor'=>$data['editor']  = $this->im->editor($main['link_content']),
		);
		$this->mypage->load_backend_view(strtolower($this->act).'_add',$data);		
	}
	
	
	
	/**
	 * 保存
	 */
	 function action_save(){
	 	try{
	 		
	 		//数据
	 		$main = $this->input->post('main'); 		 		
			$data  = array(
				'main'=>$main,
			);
	 		
		 	//验证
		 	$this->form_validation->set_rules($this->im->validator());
		 	if($this->form_validation->run()==true){	
		 		//图片上传 
		 		
		 	 $file_config = $this->config->item('link_files');
			 $root_path = $file_config['upload_path'].'/';
			 $file_upload_path_ext = date('Y-m-d')."/";
			 $file_upload_path = $root_path.$file_upload_path_ext.'/';
			 $file_config['upload_path']	  =  $file_upload_path;	
			 $this->Common_model->mkdirs($file_upload_path);
			 $this->load->library('upload', $file_config);				
			 if($_FILES['file1']['size']>0){
				if ( ! $this->upload->do_upload("file1")){						 
						 $this->mypage->backend_redirect($this->act.'/action_add?',$this->upload->display_errors('<p>', '</p>'));				
				  }else{
						 $files_info = $this->upload->data();
						 @unlink('../../'.$main['link_pic']);
						$data['main']['link_pic'] = str_replace(str_replace("\\","/",FCPATH),'',$files_info['full_path']);;
				 }				 	
			 }			
			 
	 		$this->mydb->save($data,$this->im->db_config());
	 		$this->mypage->pop_redirect('已保存',site_url('backend/'.$this->act.'/action_list/'));
		 	}else{
				$data['editor']  = $this->im->editor($main['link_content']);
		 		$this->mypage->load_backend_view(strtolower($this->act).'_add',$data);
		 	}
	 		
	 	}catch(Exception $e){
	 		$this->mypage->backend_redirect($this->act.'/action_add?',$e->getMessage());
	 	}			
	 }
	
	
	
	//链接列表
	
	function action_list(){
					
		$this->mypage->fetch_css(array('backend_link'));
		$this->db->select("a.*",false)->from($this->table.' as a ')
		->like('a.link_title',$this->input->get('link_title'))
		->order_by("link_id","desc");
		$data = $this->mydb->fetch_all(15);	
		$this->mypage->load_backend_view(strtolower($this->act)."_list",$data);
		
	}
	
	
	function action_del(){
		try{			
			$id  = $this->input->get("link_id");	
			$this->db->where('link_id',$id);
	 		$this->db->delete($this->table);			
			$this->mypage->pop_redirect('已删除',site_url('backend/'.$this->act.'_list'));
		}catch(Exception $e){			
			show_error($e->getMessage());
		}
	
	}
	
	
	

	
	


	
	
 	
 	
 
 	
	
}
?>