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
		$this->init_auth->execute_auth();
		$this->init_page->fetch_js(array('jscript','common'),'view',$this->init_page->getRes('js','backend'));
		$this->load->model(array('Engage_model','Category_model'));
		$this->im = $this->Engage_model;
		$this->act = "engage";
		$this->lang->load('item_backend_engage',lang_get());
		$this->tpl->assign('lang_engage',$this->lang->language);
	}


	function action_add(){	
		if($this->input->get("eg_id")){		
				
				$main = $this->db->select('*',false)->from('engage')->where('eg_id',$this->input->get('eg_id'))->get()->first_row('array');
		}
		//分类
		$class_select =  $this->Category_model->fetch_category_option('0106',$main['eg_job_class']);	
		
 		$area_id = $main['eg_area']>0?$main['eg_area']:518;		
 		$area = get_area($area_id); 
 		 	
 		
 		$data = array(		
			'area'=>$area, 	
			'main'=>$main,				
			'edu_options'=>$this->init_cache->cache_fetch('edu_level'),				
			'class_select'=>$class_select,				
			'editor'=>array(
				'eg_content'=>$this->Common_model->editor($main['eg_content'],'eg_content'),
			),
 		
 		); 		
		$this->init_page->load_backend_view(strtolower($this->act)."_add",$data);
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
			$this->init_db->save($data,$this->im->save_config());
			$this->init_page->pop_redirect('已保存',site_url('backend/'.$this->act.'/action_list'));
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
		
		$this->db->select("a.*,date_format(a.eg_addtime,'%Y-%m-%d') as pub_date,b.c_title",false)->from($this->init_db->table('engage').' as a ')
		->join($this->init_db->table('category').' as b','a.eg_job_class=b.c_sn','left')
		->order_by("a.eg_id","desc");
		
		$data = $this->init_db->fetch_all();	
			
		$this->init_page->load_backend_view(strtolower($this->act)."_list",array_merge($data,array('search'=>$search)));
	}
	

	function action_del(){
		try{			
			$id  = $this->input->get("eg_id");			
			$this->db->where('eg_id',$id);
	 		$this->db->delete($this->init_db->table('engage'));			
			$this->init_page->backend_redirect("backend/'.$this->act.'/action_list","删除成功");
		}catch(Exception $e){			
			show_error($e->getMessage());
		}
	
	}
	
	
	//应聘
	function action_apply(){			
					
		$this->init_page->fetch_css(array('backend_apply2'));
		$this->db->select("a.*",false)->from($this->init_db->table('engage_apply').' as a ')
		->order_by("apply_id","desc");
		$data = $this->init_db->fetch_all();	
		$data = array_merge($data,
		array(
		)
		);		
		
		
		$this->init_page->load_backend_view(strtolower($this->act)."_apply_list",$data);
		
				
		
	}
	
	//查看简历
	function action_apply_view(){
		$this->init_page->fetch_css('table');
		$id  = $this->input->get("apply_id");			
		if($id){		
				$sql_arr = array(
					'table_name'=>$this->init_db->table('engage_apply'),
					'fields'=>'*',
					'primary_id'=>'apply_id',
					'primary_val'=>$id,
				);	

				$main = $this->db->select('*')->from('engage_apply')->where('apply_id',$id)->get()->first_row('array');
				$sql_arr = array(
					'table_name'=>$this->init_db->table('engage'),
					'fields'=>'eg_pos',
					'primary_id'=>'eg_id',
					'primary_val'=>$main['eg_id'],
				);	
				
			
				$engage = $this->db->select('eg_pos')->from('engage_apply')->where('eg_id',$main['eg_id'])->get()->first_row('array');

				$main['eg_pos'] = $engage['eg_pos'];
		
				
		}
		
		
			
		$this->init_page->load_backend_view(strtolower($this->act)."_apply_view",array('main'=>$main));
		
	
	}
	
	//删除简历
	function action_apply_del(){
		try{			
			$id  = $this->input->get("apply_id");			
			$this->db->where('apply_id',$id);
	 		$this->db->delete($this->init_db->table('engage_apply'));			
			$this->init_page->pop_redirect('已删除',site_url('backend/engage/action_apply'));
		}catch(Exception $e){			
			show_error($e->getMessage());
		}
	
	}
	
	
	

}
?>
