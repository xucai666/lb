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
class Archives_model extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->c_sn = '0101';
	}
	
	/**
	 * [入库参数]
	 * @return [type]
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
	 * [编辑器]
	 * @param  [type] $v
	 * @param  string $i
	 * @return [type]
	 */
	function editor($v,$i='content'){
		empty($this->fckeditor) && $this->load->library('FCKeditor');
		$config = array(
				'i'=>$i,
	 			't'=>'Basic',
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
	 * @return [type]
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
	 * 读取明细
	 * @param  [type] $primary_val
	 * @param  string $select
	 * @return [type]
	 */
	function read($primary_val,$select='*'){
		if(empty($primary_val)) return false;
		$db_config = $this->db_config();	
		return   $this->db->select($select,false)->from($db_config['main']['table_name'])->where($db_config['main']['primary_key'],$primary_val)->limit(1)->get()->first_row('array');
	} 	
	 	

/**
 * 读取全部
 * @param  string $select
 * @return [type]
 */
   function read_all($select='*'){
   		$db_config = $this->db_config();	
   		$this->db->select($select);
 		$this->db->from($db_config['main']['table_name']);
 		$this->db->order_by($db_config['main']['primary_key'],'desc');
 		$db_list = $this->db->get()->result_array(); 
		return array(
			'stat'=>count($db_list),
			'list'=>$db_list,
		) ;		
 		
   }
	 	
	 	
/**
 * 显示左边产品分类
 * @return [type]
 */
	function archive_class_left(){
				
		$sql  = "select * from ".$this->cor_db->table("category")." where c_sn like '".$this->c_sn."_%' order by c_sn asc,c_level asc ";
		$list = $this->db->query($sql)->result_array();
		return $list;	
	
	}
	 	
	/**
	 * 显示导航
	 * @param  [type] $id
	 * @return [type]
	 */
	function archive_content_nav($id){
		$sq = "SELECT (SELECT b.c_sn   FROM mysys_category  AS b  WHERE   a.info_class_sn   LIKE  CONCAT(b.c_sn,'%') ORDER BY b.c_sn ASC LIMIT 1)  AS  parent_sn  FROM mysys_infos AS a WHERE a.info_id=".$id;
		$p_sn = $this->cor_db->fetch_value($sq,'parent_sn');
		$tb = $this->cor_db->table('infos');
		$sq = <<<EOT
	SELECT *,'Prev' as nav_title FROM (SELECT *  FROM  $tb   WHERE info_class_sn like '$p_sn%' and info_id<$id ORDER BY info_id DESC LIMIT 1) AS t1 
			UNION   ALL 
		SELECT *,'Next' as nav_title FROM (SELECT  *  FROM  $tb   WHERE info_class_sn like '$p_sn%' and  info_id>$id ORDER BY info_id ASC  LIMIT 1) AS t2

EOT;

		return $this->cor_db->fetch_values($sq);
	}
 	
 	
	
	
}