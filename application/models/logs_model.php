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
				'table_name'=>$this->mydb->table('log'),
				'primary_key'=>'log_id',
			),
		
		);
	}
	
	
	/**
	 * 日志添加
	 */
	function log_insert($array){	
		
	
		$this->db->insert($this->mydb->table('log'),$array);
		
		
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
		
		$this->db->select("a.*",false)->from($this->mydb->table('log').' as a ')	
		->order_by("log_id","desc")->limit(5);
		$list = $this->db->get()->result_array();			
		return $list;		
		
		
	}
	
	
	
	
	
	/**
	 * 日志对象转换
	 */
	
	function log_obj_convert($code){
		$obj = array(
			'010201'=>'2',
			'010202'=>'2',
			'0103'=>'3',
			'010402'=>'4',
			'010501'=>'5',
			'010502'=>'5',
			'010503'=>'5',
			'010504'=>'5',
			'010505'=>'5',
			'010601'=>'6',
			'010602'=>'6',
			'010603'=>'6',
			'010604'=>'6',
			'010605'=>'6',		
			'0108'=>'10',		
			'-1'=>'1',		
			'-29'=>'4',		
			'-30'=>'4',		
			'-31'=>'4',		
			'-32'=>'4',		
			'-33'=>'4',		
			'-34'=>'6',		
			'-35'=>'6',		
			'-36'=>'6',		
			'-37'=>'6',		
			'-38'=>'6',		
			'-111'=>'1',		
		);
		return $obj[$code];
		
	}
	
	
}


?>
