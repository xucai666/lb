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
 
class Commission_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	/**
	 * 入库配置
	 * @return [type]
	 */
	function db_config(){
		return array(
			'main'=>array(
				'table_name'=>$this->cor_db->table('commission'),
				'primary_key'=>'comm_id',
			)
		);
	}
	
	

		

	
	/**
	 * [validator description]
	 * @return [type]
	 */
	function validator(){	 
		return  array(
			array(
 					"field"=>"main[comm_contact]",	
 					"label"=>"联系人",	
 					"rules"=>"required|max_length[100]",	
 			
 			),
			array(
 					"field"=>"main[phone]",	
 					"label"=>"电话",	
 					"rules"=>"required|max_length[100]",	
 			
 			),
 			
 			array(
 					"field"=>"main[email]",	
 					"label"=>"邮件",	
 					"rules"=>"required|max_length[100]",	
 			
 			),
 			
 		
 			array(
 					"field"=>"main[comm_remarks]",	
 					"label"=>"房源描述",	
 					"rules"=>"required",	
 			
 			),
 			
 		
 			
 			
 			);		 				 					
	 		 
	}
	 	
	 	
	 	
	
 	
 	
	
	
}