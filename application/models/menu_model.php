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
class Menu_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	/**
	 * 管理员明细
	 */
	function fetch_detail($admin_id){
		$db_temp  = $this->db->select('*')->from($this->init_db->table('admins'))->where('admin_id',$admin_id)->get()->result_array();
		return $db_temp[0];
	}
	
	/**
	 * 配置验证规则
	 */
	function validator_user(){
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
	 * 修改密码配置验证规则
	 */
	function validator_pwd(){
		$config = array(
			array(
				'label'=>'旧密码',
				'field'=>'main[old_password]',
				'rules'=>'required|callback_old_password_check',
			),
			array(
				'label'=>'新密码',
				'field'=>'main[new_password]',
				'rules'=>'required',
			),
			array(
				'label'=>'确认密码',
				'field'=>'main[confirm_password]',
				'rules'=>'required|callback_confirm_password_check',
			),
		);
		return $config;
	}
	
	
		
	/**
	 * 保存菜单规则
	 */
	function validator_rights(){
		$config = array(
			array(
				'label'=>'菜单名称',
				'field'=>'main[r_title]',
				'rules'=>'required',
			),
			array(
				'label'=>'排序',
				'field'=>'main[r_order]',
				'rules'=>'required',
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
	 			'table_name'=>$this->init_db->table('admins'),
	 			'primary_key'=>'admin_id',	 			
	 		),
	 	);
	 }
	 
	 /* 保存管理员参数
	 */
	 function db_menu_config(){
	 	return array(
	 		'main'=>array(
	 			'table_name'=>$this->init_db->table('system_rights'),
	 			'primary_key'=>'r_id',	 			
	 		),
	 	);
	 }
	
	
}
?>