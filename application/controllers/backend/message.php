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
 class Message extends CI_Controller{
	function __construct(){
		parent::__construct();
		//验证登陆
		$this->myauth->execute_auth();
		$this->load->model("Message_model");
		$this->act  = 'message';
		$this->im = $this->Message_model;
		$this->lang->load("item_backend_message",$this->Common_model->lang_get());
		$this->tpl->assign('lang_message',$this->lang->language);
	}
	

	//留言列表
	function action_list(){	
		
		//css	
		$this->mypage->fetch_css(array('backend_message'));
		
		//js
		$this->db->select("a.*",false)->from('message as  a ')	
		->like('a.ms_name',$this->input->get('ms_name'),'after')
		->like('a.ms_tel',$this->input->get('ms_tel'),'after')
		->like('a.ms_mobile',$this->input->get('ms_mobile'),'after')
		->like('a.ms_email',$this->input->get('ms_email'),'after')		
		->order_by("a.ms_id","desc");
		
		$data = $this->mydb->fetch_all(5);	
		$data = array_merge($data,array()		
		);
		$this->mypage->load_backend_view(strtolower($this->act)."_list",$data);
		
	}
	
	
 	/* 保存
	 */
	 function action_save(){
	 	try{
	 		
	 		//数据
	 		$main = $this->input->post('main'); 		 	
	 		$data =  array(
	 			'main'=>$main,
	 		);			
	 		$this->input->post('is_feed') &&  $data['main']['ms_feed_date'] = date('Y-m-d H:i:s');
	 		
	 		$this->mydb->save($data,$this->im->db_config());
	 		//echo "保存成功";
	 		if($this->input->post('is_feed')) myalert('保存成功!');
	 		$this->mypage->pop_redirect('保存成功',"javascript:;");	 	
	 		
	 	}catch(Exception $e){
	 		$this->mypage->pop_redirect($e->getMessage(),"javascript:;");	 
	 	}			
	 }
		
	/**
	 * 删除
	 */
	function action_del(){
		
		try{
	 		$this->db->where("ms_id",$this->input->get('ms_id'));
			$this->db->delete($this->mydb->table("message"));
	 		$this->mypage->backend_redirect($this->act.'/action_list','删除成功');	 	
	 		
	 	}catch(Exception $e){
	 		$this->mypage->pop_redirect($e->getMessage(),"javascript:;");	
	 		$this->mypage->backend_redirect($this->act.'/action_list',$e->getMessage());	  
	 	}				
		
		
	}	
		
	
	
	
	
}
?>
