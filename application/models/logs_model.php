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
 class Logs_model extends CI_Model{

	function __construct(){
		parent::__construct();
	}
	
	
	 /* 入库参数配置
	 */
	function db_config(){		
		return array(
			'main'=>array(
				'table_name'=>$this->init_db->table('log'),
				'primary_key'=>'log_id',
			),
		
		);
	}
	
	
	/**
	 * 日志添加
	 */
	function log_insert($array){	
		
	
		$this->db->insert('log',$array);
		
		
		
	}
	


	
	/**
	 * 日志清除
	 */
	function log_clear(){
		
		
	}
	
	
	/**
	 * 日志 列表
	 */
	function log_list(){	
		
		$this->db->select("a.*",false)->from($this->init_db->table('log').' as a ')	
		->order_by("log_id","desc")->limit(5);
		$list = $this->db->get()->result_array();			
		return $list;		
		
		
	}


	function last_login(){
		$stat = $this->db->from('log_login')->where('login_user',$this->init_auth->fetch_auth('user_name'))->count_all_results();
		$last = $this->db->select('*',false)->from('log_login')->where('login_user',$this->init_auth->fetch_auth('user_name'))->order_by('login_id','desc')->limit(1,1)->get()->first_row('array');
		return array('last'=>$last,'stat'=>$stat);
	}
	
	
	
	
	
}


?>
