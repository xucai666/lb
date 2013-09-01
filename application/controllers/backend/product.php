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
class Product extends CI_Controller{
	function __construct(){
		parent::__construct();
		//验证登陆
		$this->cor_auth->execute_auth();
		$this->load->model(array('Product_model','Category_model')); 
		//load css,js
				
		//config controll name		
		$this->act  = 'product';
		
		//config model name
		$this->im = $this->Product_model;
		
		//load language for views
		$this->lang->load("item_backend_products",lang_get());
		$this->m_lang = $this->lang->language;
		$this->tpl->assign('lang_products',$this->lang->language);
		
	}

	
	/**
	 * 添加
	 */
	function action_add(){
		//查询
		$pro_id = $this->input->get('pro_id');
		
		$parent_class = $this->input->get('parent_class');
		
		
		$pro_id?$main = $this->im->read($pro_id):$main['pro_class_sn'] = $parent_class;
		
		$parent_class_info = $this->Category_model->detail($parent_class,'bysn');
		
		$class_select  = $this->Category_model->fetch_category_option($parent_class,$main['pro_class_sn']);
		
		$class_info = array(
			'class_theme'=>$parent_class_info['c_title'],
			'parent_class'=>$parent_class_info['c_sn'],
			'class_select'=>$class_select,
		);	
	
		$data = array(
			'main'=>$main,
			'editor'=>$this->im->editor($main['pro_content'],'content'),
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
		 		
		 	 $file_config = config_item('pro_files');
		 	 
			 $root_path = $file_config['upload_path'].'/';
			 
			 $file_upload_path_ext = date('Y-m-d')."/";
			 
			 $file_upload_path = $root_path.$file_upload_path_ext.'/';
			 
			 $file_config['upload_path']	  =  $file_upload_path;	
			 
			 $this->Common_model->mkdirs($file_upload_path);
			 
			 $this->load->library('upload', $file_config);		
			 		
			 if($_FILES['file1']['size']>0){
				if ( ! $this->upload->do_upload("file1")){						 
						 throw new Exception('文件上传失败');			
				  }else{
						 $files_info = $this->upload->data();
						 @unlink('../../'.$main['pro_pic']);
						$data['main']['pro_pic'] = str_replace(str_replace("\\","/",FCPATH),'',$files_info['full_path']);
				 }				 	
			 }		
			 	
			$db_config = $this->im->db_config();
			
	 		$data_var = $this->cor_db->save($data,$db_config);	
 			$back_url = "product/action_add/?parent_class=".$parent_class."&pro_id=".$data_var['main']['pro_id'];
	 		
	 		$this->cor_page->backend_redirects(array($this->cor_page->fetchButton('j_edit')=>$back_url,$this->cor_page->fetchButton('j_add')=>'product/action_add?parent_class='.$parent_class,$this->cor_page->fetchButton('j_list')=>'product/action_list?parent_class='.$parent_class),'产品资料更新完毕.');
		 	}else{
				$data['editor']  = $this->im->editor($main['pro_content']);
		 		$this->cor_page->load_backend_view(strtolower($this->act).'_add',$data);
		 	}
	 		
	 	}catch(Exception $e){
	 		$this->cor_page->backend_redirect($_SERVER['HTTP_REFERER'],$e->getMessage());
	 	}			
	 }
	
	
	
	//产品列表
	
	function action_list(){
		$this->cor_page->fetch_js('jquery.form','loadview',$this->cor_page->getRes('js','backend'));
		$parent_class = $this->input->get('parent_class');
		$search_class = $this->input->get('search_class');
		$parent_class_info = $this->Category_model->detail($parent_class,'bysn');
		$class_select  = $this->Category_model->fetch_category_option($parent_class,$search_class);
		$class_info = array(
				'class_theme'=>$parent_class_info['c_title'],
				'parent_class'=>$parent_class_info['c_sn'],
				'class_select'=>$class_select,
		);		
			

		$this->db->select("a.*,b.c_title",false)->from('products as a')
		->join('category as b','a.pro_class_sn=b.c_sn')
		->like('a.pro_class_sn',$parent_class,'after')
		->like('a.pro_class_sn',$search_class,'after')
		->like('a.pro_title',$this->input->get('pro_title'))
		->order_by("pro_id","desc");
		$data = $this->cor_db->fetch_all(12);	
		$data = array_merge($data,
		array(
			'class_info'=>$class_info,
		)
		);	
		$this->cor_page->load_backend_view(strtolower($this->act)."_list",$data);
		
	}
	
	
	//产品列表
	
	function action_ajax_list(){
		$parent_class = $this->input->get('parent_class');
		$search_class = $this->input->get('search_class');
		$parent_class_info = $this->Category_model->detail($parent_class,'bysn');
		$class_select  = $this->Category_model->fetch_category_option($parent_class,$search_class);
		$class_info = array(
				'class_theme'=>$parent_class_info['c_title'],
				'parent_class'=>$parent_class_info['c_sn'],
				'class_select'=>$class_select,
		);		
					
		$this->cor_page->fetch_css(array('backend_pro'));
		$this->db->select("a.*,b.c_title",false)->from($this->cor_db->table('products').' as a ')
		->join('category as b','a.pro_class_sn=b.c_sn')
		->like('a.pro_class_sn',$parent_class,'after')
		->like('a.pro_class_sn',$search_class,'after')
		->like('a.pro_title',$this->input->get('pro_title'))
		->order_by("pro_id","desc");
		$data = $this->cor_db->fetch_all(12,true);	
		$data = array_merge($data,
		array(
			'class_info'=>$class_info,
		)
		);	
		$this->cor_page->load_backend_view("ajax_product_list",$data);
		
	}
	
	
	
	function action_del(){
		try{	
			$id = $this->input->post("pro_id");
			$id = $id?$id:$this->input->get("pro_id");
						
			$parent_class = $this->input->get('parent_class');		
			$this->db->where_in('pro_id',$id);
	 		$this->db->delete($this->cor_db->table('products'));			
			$this->cor_page->pop_redirect('已删除',site_url('backend/'.$this->act.'/action_list/?parent_class='.$parent_class));
		}catch(Exception $e){			
			show_error($e->getMessage());
		}
	
	}
	
	
	
	//订单管理
	function action_order(){		
	
						
		$this->cor_page->fetch_css(array('backend_order'),'view',$this->cor_page->getRes('css','backend').'item/');
		$this->db->select("a.*",false)->from($this->cor_db->table('order_main').' as a ')
		->like('a.order_no',$this->input->get('order_no'))
		->like('a.contact',$this->input->get('contact'))
		->like('a.mobile',$this->input->get('mobile'))
		->order_by("order_id","desc");
		$data = $this->cor_db->fetch_all();	
		
		$data = array_merge($data,
		array('status'=>$this->cor_cache->cache_fetch('order_status'),
		)
		);			
		
		$this->cor_page->load_backend_view("order_list",$data);
		
		
	}
	
	



	//订单删除
	function action_order_del(){
		$config = array(
			'table_name'=>'order_main',
			'primary_id'=>'order_id',
			'primary_val'=>$this->input->get('order_id'),

		);		
		$dt = $this->cor_db->fetch_one($config);
		if($dt['status']>0){

			$this->cor_page->pop_redirect('订单状态变更，不允许删除',site_url('backend/'.$this->act.'/action_order/'));

		}else{
		$this->cor_db->delete($this->input->get('order_id'),$this->im->db_config_order());	
		$this->cor_page->pop_redirect('已删除',site_url('backend/'.$this->act.'/action_order/'));
		
		}
		
		
	}
	
	//订单查看
	function action_order_view(){
		$this->cor_page->fetch_css(array('backend_order'),'view',$this->cor_page->getRes('css','backend').'item/');
		$this->cor_page->fetch_css(array('table'));
		$order_id = $this->input->get("order_id");
		$sql_arr = array(
			'table_name'=>$this->cor_db->table('order_main'),
			'fields'=>'*',
			'primary_id'=>'order_id',
			'primary_val'=>$order_id,
		);	
		$main = $this->cor_db->fetch_one($sql_arr);
		$detail = $this->db->query('select a.*,b.p_pic,(a.p_price*a.p_qty) as sub_total from '.$this->cor_db->table('order_detail').' as a left join '.$this->cor_db->table('module_product').' as b  on a.p_id=b.p_id where a.order_id='.$order_id)
		->result_array();
		$amount_total = 0;
		$p_count = 0;
		$p_num = 0;

		foreach($detail as $v){
				$amount_total += $v[p_price]*$v[p_qty];
				$p_count++;
				$p_num += $v[p_qty];
		}
		
		$data = array(		
			'main'=>$main,
			'detail'=>$detail,
			'p_num'=>$p_num,
			'p_count'=>$p_count,
			'amount_total'=>$amount_total,
			'status'=>$this->cor_cache->cache_fetch('order_status'),
		);
		
		$this->cor_page->load_backend_view("order_view",$data);
	}
	
	
	
	function action_order_status_change(){
		$this->db->where('order_id',$this->input->get('order_id'));
		$this->db->update('order_main',array('status'=>$this->input->get('status')));
		$this->cor_page->backend_redirect($_SERVER['HTTP_REFERER'],'订单状态更新成功');
	}


	
	
 	
 	
 
 	
	
}
?>