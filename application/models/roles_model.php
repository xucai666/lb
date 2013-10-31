<?php
/**
  * start page for webaccess
  *
  * PHP version 5
  *
  * @category  PHP
  * @package   Modle
  * @author    yehua <150672834@.com>
  * @copyright 2013 conqweal
  * @license   http://opensource.org/licenses/gpl-2.0.php GNU General Public License
  * @version   1.0$
  * @link      http://phpsysinfo.sourceforge.net
  */
class Roles_model extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->ds = $this->init_db->getDs();	
	}
	
	/**
	 * 管理员明细
	 */
	function fetch_detail($admin_id){
		$db_temp  = $this->ds->select('*')->from($this->init_db->table('admins'))->where('admin_id',1)->get()->result_array();
		return $db_temp[0];
	}
	
	/**
	 * 配置验证规则
	 */
	function validator(){
		$config = array(
			array(
				'label'=>'用户名',
				'field'=>'main[admin_user]',
				'rules'=>'required|callback_admin_user_check',
			),	
			array(
				'label'=>'确认密码',
				'field'=>'confirm_password',
				'rules'=>'callback_confirm_password_check',
			),
		);
		return $config;
	}
	
	
	/**
	 * 保存管理员参数
	 */
	 function db_config(){
	 	return array(
	 		'main'=>array(
	 			'table_name'=>$this->init_db->table('roles'),
	 			'primary_key'=>'role_id',	 			
	 		),
	 	);
	 }
	 
	 
	 /**
	  * 权限参数
	  */
	  function get_rights_item(){
	  	return $this->init_auth->get_rights_item();
	  }
	  
	  
	  
	  function fetch_roles_list(){
	  		
	  	$this->ds->select("*",false)->from($this->init_db->table('roles'))
		->order_by("role_id","asc");
		
		$data = $this->init_db->fetch_all(15);	
		
		foreach($data['list'] as $v){
			$list[$v['role_id']] = $v;
		}
		$this->ds->_reset_select();
		
		return $list;
	  }
	
	
	
	
}
?>