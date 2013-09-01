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
class Pictures_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	/**
	 * 入库参数配置
	 */
	function db_config(){
		return array(
			'main'=>array(
				'table_name'=>$this->cor_db->table('pictures'),
				'primary_key'=>'p_id',
			)
		);
	}
	
	
	
	
	
	
	 /* 入库参数配置
	 */
	function db_pictures_model_config(){
		return array(
			'main'=>array(
				'table_name'=>$this->cor_db->table('pictures_config'),
				'primary_key'=>'m_id',
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
	 * 列出模块
	 */
	 
	 
	function list_head(){
		$this->db->select('b.*,a.m_name,a.m_class,a.m_id');
		$this->db->from($this->cor_db->table('pictures_config as a'));
		$this->db->join($this->cor_db->table('pictures as b'),'a.m_id=b.p_key','left');
		return $this->cor_db->fetch_all();
		
		
	}	
	
	
	
	
	/**
	 * 存档
	 */
	function save_single($post){
		$post['main']['p_date'] = date('Y-m-d');
		return $this->cor_db->save($post,$this->db_config());
	}


	
	
	 /*	
	 * 列出模块
	 */
	 
	 
	function list_index(){
		$this->db->select('a.*,b.m_name,b.m_class,b.m_id');
		$this->db->from($this->cor_db->table('pictures as a'));
		$this->db->join($this->cor_db->table('pictures_config as b'),'b.m_class=a.p_type','left');
		$this->db->where('m_class','index_rotation');
		$this->db->order_by('a.p_sort','asc');
		$list = $this->db->get()->result_array();
		return array('list'=>$list,'stat'=>count($list));
		
		
	}
	
	/**
	 * 头部图片信息
	 */
	function find_top($m_id){
		$this->db->select('b.*,a.m_name,a.m_class,a.m_id');
		$this->db->from($this->cor_db->table('pictures_config as a'));
		$this->db->join($this->cor_db->table('pictures as b'),'a.m_id=b.p_key','left');
		$this->db->where('a.m_id',$m_id);
		$top  = $this->db->get()->first_row('array');
		$top = config_item('base_url')."/swfupload/uploads/".$top['p_thumb'];
		return $top;
			
	
	}	
	 	
	
 	
 	
	
	
}