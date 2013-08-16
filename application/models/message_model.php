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
 class Message_model extends CI_Model{

	function __construct(){
		parent::__construct();
	}
	
	/**
	 * 入库参数配置
	 */
	function db_config(){		
		return array(
			'main'=>array(
				'table_name'=>$this->mydb->table('message'),
				'primary_key'=>'ms_id',
			),
		
		);
	}
	
	
	/**
	 * 编辑器
	 */
	function editor($v,$i='content'){
		empty($this->fckeditor) && $this->load->library('FCKeditor');
		$config = array(
				'i'=>$i,
	 			't'=>'Basic',
	 			'v'=>$v,
	 			'w'=>'600',
	 			'h'=>'400',
	 			'ToolbarStartExpanded'=>0,
		);
		return  $this->fckeditor->CreateHtml($config);

	}
		

	
	
	/**
	 * 校验 
	 */
	function validator(){	 
		return  array(
		
			array(
 					"field"=>"main[msg_name]",	
 					"label"=>"姓名",	
 					"rules"=>"required|max_length[100]",	
 			
 			),
 		
 			array(
 					"field"=>"main[msg_content]",	
 					"label"=>"留言内容",	
 					"rules"=>"required|max_length[100]",	
 			
 			),
 		 			
 			
 			);		 				 					
	 		 
	}
	 	
	 	
	 	
}
?>
