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
 class Engage  extends CI_Controller{

	function __construct(){
	
		parent::__construct();
		//验证登陆
		$this->cor_auth->execute_auth();
		$this->cor_page->fetch_js(array('jscript','common'),'view',$this->cor_page->getRes('js','backend'));
		$this->load->model(array('Engage_model','Category_model'));
		$this->im = $this->Engage_model;
		$this->act = "engage";
		$this->lang->load('item_backend_engage',lang_get());
		$this->tpl->assign('lang_engage',$this->lang->language);
	}


	function action_add(){	
		if($this->input->get("eg_id")){		
				$sql_arr = array(
					'table_name'=>$this->cor_db->table('engage'),
					'fields'=>"*",
					'primary_id'=>'eg_id',
					'primary_val'=>$this->input->get("eg_id"),
				);	
				$main = $this->cor_db->fetch_one($sql_arr);
		}
		//分类
		$class_select =  $this->Category_model->fetch_category_option('0106',$main['eg_job_class']);	
		
 		$area_id = $main['eg_area']>0?$main['eg_area']:518;		
 		$area = get_area($area_id); 

 		 //编辑器
 		 $this->load->library('FCKeditor');	 		
 		 $ed_config  = array(
 			'eg'=>array(
 				'i'=>'eg_content',
	 			't'=>'Basic',
	 			'w'=>'600',
	 			'h'=>'250',
	 			'v'=>$main['eg_content'],
	 			'ToolbarStartExpanded'=>0,
	 			'DefaultLanguage'=>lang_get()=='en'?'en':'zh-cn',
 			
 			),
 			
 		); 			
 		
 		$data = array(		
			'area'=>$area, 	
			'main'=>$main,				
			'edu_options'=>$this->cor_cache->cache_fetch('edu_level'),				
			'class_select'=>$class_select,				
			'editor'=>array(
				'eg_content'=>$this->fckeditor->CreateHtml($ed_config['eg']),
			),
 		
 		); 		
		$this->cor_page->load_backend_view(strtolower($this->act)."_add",$data);
	}


	function action_save(){	
		try{			
			$form_array = $this->input->post('main');	
			//$area = $this->Common_model->fetchPostArrea($this->input->post('area'));	
			$data['main'] = array_merge($form_array,
				array(
						'eg_addtime'=>date('Y-m-d H:i:s'),
						//'eg_area'=>$area,
				)
			);
			$this->cor_db->save($data,$this->im->save_config());
			$this->cor_page->pop_redirect('已保存',site_url('backend/'.$this->act.'/action_list'));
		}catch(Exception $e){			
			show_error($e->getMessage());
		}
		
		
		
	}
	
	
	function action_list(){
		
		//查询条件
		$search = array(
			'eg_pos'=>$this->input->get('eg_pos'),
		);
		$search['eg_pos'] && $this->db->like('eg_pos',$search['eg_pos']);
		
		$this->db->select("a.*,date_format(a.eg_addtime,'%Y-%m-%d') as pub_date,b.c_title",false)->from($this->cor_db->table('engage').' as a ')
		->join($this->cor_db->table('category').' as b','a.eg_job_class=b.c_sn','left')
		->order_by("a.eg_id","desc");
		
		$data = $this->cor_db->fetch_all();	
			
		$this->cor_page->load_backend_view(strtolower($this->act)."_list",array_merge($data,array('search'=>$search)));
	}
	

	function action_del(){
		try{			
			$id  = $this->input->get("eg_id");			
			$this->db->where('eg_id',$id);
	 		$this->db->delete($this->cor_db->table('engage'));			
			$this->cor_page->backend_redirect("backend/'.$this->act.'/action_list","删除成功");
		}catch(Exception $e){			
			show_error($e->getMessage());
		}
	
	}
	
	
	//应聘
	function action_apply(){			
					
		$this->cor_page->fetch_css(array('backend_apply2'));
		$this->db->select("a.*",false)->from($this->cor_db->table('engage_apply').' as a ')
		->order_by("apply_id","desc");
		$data = $this->cor_db->fetch_all();	
		$data = array_merge($data,
		array(
		)
		);		
		
		
		$this->cor_page->load_backend_view(strtolower($this->act)."_apply_list",$data);
		
				
		
	}
	
	//查看简历
	function action_apply_view(){
		$this->cor_page->fetch_css('table');
		$id  = $this->input->get("apply_id");			
		if($id){		
				$sql_arr = array(
					'table_name'=>$this->cor_db->table('engage_apply'),
					'fields'=>'*',
					'primary_id'=>'apply_id',
					'primary_val'=>$id,
				);	
				$main = $this->cor_db->fetch_one($sql_arr);
				
				$sql_arr = array(
					'table_name'=>$this->cor_db->table('engage'),
					'fields'=>'eg_pos',
					'primary_id'=>'eg_id',
					'primary_val'=>$main['eg_id'],
				);	
				$engage = $this->cor_db->fetch_one($sql_arr);
				$main['eg_pos'] = $engage['eg_pos'];
		
				
		}
		
		
			
		$this->cor_page->load_backend_view(strtolower($this->act)."_apply_view",array('main'=>$main));
		
	
	}
	
	//删除简历
	function action_apply_del(){
		try{			
			$id  = $this->input->get("apply_id");			
			$this->db->where('apply_id',$id);
	 		$this->db->delete($this->cor_db->table('engage_apply'));			
			$this->cor_page->pop_redirect('已删除',site_url('backend/engage/action_apply'));
		}catch(Exception $e){			
			show_error($e->getMessage());
		}
	
	}
	
	
	

}
?>
