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
 class Logs extends CI_Controller{
	function __construct(){
		parent::__construct();
		//验证是否登陆 
		$this->myauth->execute_auth();
		$this->load->model("Logs_model",'im');
		$this->lang->load('item_backend_log',$this->Common_model->lang_get());	
		$this->m_lang = $this->lang->language;
		
		$this->tpl->assign('lang_log',$this->m_lang);

				
	}
	

	//日志列表
	function action_list(){	
		
		//css	
		$this->mypage->fetch_css(array('backend_logs'));
		
		//js
		
		$this->db->select("a.*",false)->from($this->mydb->table('log').' as a ')	
		->like('a.log_user',$this->input->get('log_user'))		
		->like('a.log_type',$this->input->get('log_type'))		
		->order_by("log_id","desc");
		$this->input->get('log_date') && $this->db->like('a.log_date',$this->input->get('log_date'),'after');
		$data = $this->mydb->fetch_all();	
		$cache_log_types = $this->mycache->cache_fetch("log_types");
		foreach($data['list'] as &$v){
			$v['log_type_str'] = $cache_log_types[$v['log_type']];
		}
		$data = array_merge($data,array(
				'log_types'=>$this->mycache->cache_fetch('log_types'),
				'log_type_default'=>$this->input->get('log_type'),
			)		
		);
		
		$this->mypage->load_backend_view("logs_list",$data);
		
	}
	
	
	//删除
	function action_del(){
		try{
			$ids = $this->input->post('log_ids');
			if(empty($ids)){				
				throw new Exception($this->m_lang['unselect']);
			}
			$this->db->where_in("log_id",$ids);
			$this->db->delete($this->mydb->table('log'));
			$this->mypage->backend_redirect('logs/action_list',$this->m_lang['del_ok']);
			
		}catch(Exception $e){
	 		$this->mypage->backend_redirect('logs/action_list',$e->getMessage());
	 	}	
		
	}
}
?>
