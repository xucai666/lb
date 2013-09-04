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
class friendlink_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	/**
	 * 入库参数配置
	 */
	function db_config(){
		return array(
			'main'=>array(
				'table_name'=>$this->cor_db->table('friendlink'),
				'primary_key'=>'link_id',
			)
		);
	}
	
	

	
	
	
	
		

	
	
	/**
	 * 校验 
	 */
	function validator(){	 
		return  array(
			array(
 					"field"=>"main[link_title]",	
 					"label"=>"标题",	
 					"rules"=>"required|max_length[100]",	
 			
 			),
 		
 		
 			
 			array(
 					"field"=>"main[link_date]",	
 					"label"=>"发布日期",	
 					"rules"=>"required",	
 			
 			),
 			
 			
 			);		 				 					
	 		 
	}
	 	
	 	
	 	
	
 	
 	
	
	
}