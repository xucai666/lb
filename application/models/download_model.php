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
class Download_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	/**
	 * 入库参数配置
	 */
	function db_config(){
		return array(
			'main'=>array(
				'table_name'=>$this->cor_db->table('infos'),
				'primary_key'=>'info_id',
			)
		);
	}
	
	
	/**
	 * 编辑器
	 */
	function editor($v,$i='content'){
		empty($this->fckeditor) && $this->load->library('FCKeditor');
		$config = array(
				'i'=>$i,
	 			't'=>'Default',
	 			'v'=>$v,
	 			'w'=>'600',
	 			'h'=>'400',
	 			'ToolbarStartExpanded'=>1,
	 			'DefaultLanguage'=>lang_get()=='english'?'en':'zh-cn',
		);
		return  $this->fckeditor->CreateHtml($config);

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
 			
 		
 			
 			
 			);		 				 					
	 		 
	}
	 	
	 
	 
	 
	/**
	 * 产品明细
	 */
	function download_for_product($pro_id){
		$list = $this->db->query("select * from ".$this->cor_db->table("infos")." where pro_id REGEXP '".$pro_id."' ")->result_array();
		foreach($list as $v) $list_2[$v['info_class_sn']][]=$v;
		return $list_2;		
	}
	 	
	 	
	 
	 /**
	  * 显示左边分类
	  */	
	 function download_left(){
	 	$sql  = "select * from ".$this->cor_db->table("category")." where c_sn like '0105_%' and c_sn<>'010505' order by c_sn asc,c_id asc";
		$list = $this->db->query($sql)->result_array();
		return $list;	
	 	
	 }	
	 	
	 
	 

	
 	
 	
	
	
}