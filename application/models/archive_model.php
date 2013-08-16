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
class Archive_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	/**
	 * 入库参数配置
	 */
	function db_config(){
		return array(
			'main'=>array(
				'table_name'=>$this->mydb->table('infos'),
				'primary_key'=>'info_id',
			)
		);
	}
	
	
	

	
	
	/**
	 * 校验 
	 */
	function validator(){	 
		return  array(
			array(
 					"field"=>"main[info_title]",	
 					"label"=>"标题",	
 					"rules"=>"required|max_length[100]",	
 			
 			),
 		
 			array(
 					"field"=>"main[info_content]",	
 					"label"=>"文章内容",	
 					"rules"=>"required",	
 			
 			),
 			
 			
 			array(
 					"field"=>"main[info_date]",	
 					"label"=>"发布日期",	
 					"rules"=>"required",	
 			
 			),
 			
 			
 			);		 				 					
	 		 
	}
	 	
	 	
		 	
	 	
	/**
	 * 
	 * read single info
	 * 
	 */ 	
	function read($primary_val,$select='*'){
		if(empty($primary_val)) return false;
		$db_config = $this->db_config();	
		return   $this->db->select($select,false)->from($db_config['main']['table_name'])->where($db_config['main']['primary_key'],$primary_val)->limit(1)->get()->first_row('array');
	} 	
	 	 	
	 	
	 	
	 	
	/**
	 * 
	 * read single info
	 * 
	 */ 	
	function read_by_key($key,$val,$select='*'){
		if(empty($val)||empty($key)) show_error('params not correct!');
		$db_config = $this->db_config();		
		return   $this->db->select($select,false)->from($db_config['main']['table_name'])->where($key,$val)->limit(1)->get()->first_row('array');
	} 	 	
	 	
	 	
	
 	
 	
	
	
}