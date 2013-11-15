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
 class Menu extends CI_Controller{
 	function __construct(){
 		parent::__construct();
 		//验证登陆
		$this->init_auth->execute_auth();
		$this->load->model('Menu_model');
		$this->im = $this->Menu_model;
		$this->load->library('encrypt');	
		$this->lang->load("item_backend_menu",lang_get());
		$this->m_lang = $this->lang->language;	
		$this->tpl->assign('lang_menu',$this->m_lang);
		//只调用中文数据库 	
 		$this->ds = $this->init_db->getDs();
		

 	}
 	function action_list(){

 		$this->ds->select('*')->from('system_rights')->order_by('r_code','ASC')->order_by('r_order','asc');
 		$data = $this->init_db->fetch_all(115); 			
 		foreach($data['list'] as  $k=>$v){
 			if(in_array($v['r_id'],array(43,44))) unset($data['list'][$k]);
 		}
 		$this->init_page->load_backend_view('menu_list',$data);
 	}
	
	 	
 	function action_add(){
 		
 		$m_id = $this->input->get_post('r_id');

 		

		if($m_id){
			$main = $this->db->select('*',false)->from('system_rights')->where('r_id',$m_id)->get()->first_row('array');
			$main['checked'] = $main['r_display']?"checked=checked":"";	
			
		}else{

			$main['checked'] = "checked=checked";
			$main['r_pid'] =  $this->input->get_post('pid');
			
		}
		//parent menu	
 		$db_menus = $this->init_auth->getAuthMenu();
 		foreach($db_menus['list'] as $k=>$v){
 			if(in_array($v['r_id'],array(43,44))) continue;
 			$new_menus[$v['r_id']] = str_repeat('|一',count(explode(',',$v['r_code']))).$v['r_title'];
 		}
 		$data['parent_menus'] = $new_menus;
 		$data['main'] = $main;
 		$this->init_page->load_backend_view('menu_add',$data);
 	}
 	
 	
 	function action_save(){
 		try{
 			//验证
		 	$this->form_validation->set_rules($this->im->validator_rights());
		 	$main = $this->input->get_post('main');
		 	if($this->form_validation->run()==true):	
		 		if($main['r_id']):
		 			$main['r_display'] = $main['r_display']?1:0;
		 		endif;

		 		//query old r_code
		 		if($main['r_id']){
		 			$r_code_old = $this->init_db->fetchColumn('select r_code from '.$this->init_db->table('system_rights').' where r_id=?',array($main['r_id']));
		 		}
		 		//update self r_code
		 		if($main['r_pid']):
			 		$sql = 'select  r_code  from  '.$this->init_db->table('system_rights','r_code').' where r_id=?';
			 		$r_code_parent = $this->init_db->fetchColumn($sql,array($main['r_pid']));
		 		endif;


		 		$save_data['main'] = $main;
		 		$save = $this->init_db->save($save_data,$this->im->db_menu_config());
		 		$m_id  = $save['main']['r_id'];
		 		
		 		
		 		$r_code_new = $r_code_parent?$r_code_parent.','.$m_id:$m_id;
		 		$this->ds->where('r_id',$m_id);
		 		$this->ds->update($this->init_db->table('system_rights'),array('r_code'=>$r_code_new,'r_level'=>intval(substr_count($r_code_new,','))+1));
		 		//if change r_pid,update childeren r_code
		 		if($r_code_old!=$r_code_new):
			 		$sql = "update ".$this->init_db->table('system_rights')." set r_code = replace(r_code,'$r_code_old','$r_code_new') where r_code like '".$r_code_old."_%'";
			 		$this->ds->query($sql);
		 		endif;
		 		
		 		//create cache
		 		
			 	$this->ds->select('*')->from($this->init_db->table('system_rights'))->order_by('r_code','asc')->order_by('r_order','asc');
		   		$data = $this->init_db->fetch_all(250);
		   				
		   		$this->init_cache->cache_create($data,'admin_rights_config');
	   		
	   		
	   		
		 		$this->init_page->backend_redirect('menu/action_list','保存成功');
		 	else:
			 	//parent menu	
		 		$db_menus = $this->init_auth->getAuthMenu();
		 		foreach($db_menus['list'] as $k=>$v){
		 			if(in_array($v['r_id'],array(43,44))) continue;
		 			$new_menus[$v['r_id']] = str_repeat('|一',count(explode(',',$v['r_code']))).$v['r_title'];
		 		}
				$data = array('main'=>$main,'parent_menus'=>$new_menus);
		 		$this->init_page->load_backend_view('menu_add',$data);
		 	endif;	
 			
 		}catch(Exception $e){
 			$this->init_page->backend_redirect('menu/action_list',$e->getMessage());	
 		}
 		
 	}
 	
 	function action_del(){
 		$this->init_db->delete($this->input->get_post('r_id'),$this->im->db_menu_config());
 		$this->init_page->backend_redirect('menu/action_list','删除成功');
 	}
 }
?>
