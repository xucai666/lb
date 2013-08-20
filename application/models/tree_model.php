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
class Tree_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function  save_config(){
		return array('main'=>array(
				'table_name'=>'tree_node',
				'primary_key'=>'id'
			));

	}

	function valid_config(){
		return array(
					array(
						'field'=>'main[name]',
						'label'=>'字段名称',
						'rules'=>'required',
					)					
					
				);
	}

	/**
	 * [fetch_select 模块内使用]
	 * @param  [type] $treeId  [description]
	 * @param  string $v_field [description]
	 * @return [type]          [description]
	 */
	function fetch_select($treeId=null,$v_field='name'){
		$treeId = $treeId?$treeId:$this->get_root();
		return $this->cor_form->array_re_index($this->db->select("id,name as init_name",false)->select('LEVEL,CONCAT(REPEAT("|-",LEVEL),NAME) as name',false)->from('tree_node')->where('treeId',$treeId)->order_by('leftId','asc')->get()->result_array(),'id',$v_field);
	}

	/**
	 * [fetch_select_query 模块外使用]
	 * @param  [type] $treeId [description]
	 * @return [type]         [description]
	 */
	function fetch_select_query($treeId=null){
		$treeId = $treeId?$treeId:$this->get_root();
		$ls =  $this->cor_form->array_re_index($this->db->select("id,name as init_name,leftId,rightId",false)->select('LEVEL,CONCAT(REPEAT("|-",LEVEL),NAME) as name',false)->from('tree_node')->where('treeId',$treeId)->order_by('leftId','asc')->get()->result_array(),'id');
		$ls_new = array();
		foreach($ls as $v){
			$ds = $this->db->select("group_concat(id) as ids",false)->from('tree_node')->where('treeId',$treeId)->where('leftId <= '.$v[leftId].' and rightId >= '.$v[rightId])->get()->first_row('array');
			$ls_new[$ds[ids]] = $v[name];
		}
		return $ls_new;

	}

	function fetch_belong_ids($id){
		$ds = $this->detail($id);
		$r = $this->db->select("group_concat(id) as ids",false)->from('tree_node')->where('treeId',$ds[treeId])->where('leftId <= '.$ds[leftId].' and rightId >= '.$ds[rightId])->get()->first_row('array');
		return  $r[ids];
	}

	//detail
	function detail($id,$key=null){
		$cf = array(
				'primary_val'=>$id,
				'primary_id'=>'id',
				'table_name'=>'tree_node',
			);
		$ds = $this->cor_db->fetch_one($cf);
		return $key?$ds[$key]:$ds;
	}




	function get_root(){

		return get_cookie('tree_root_id');
	}

	function set_root($id){
		$cookie = array(
               'name'   => 'tree_root_id',
               'value'  => $id,
               'expire' => '86500',
               'domain' => '',
               'path'   => '/'
              
           );	
		set_cookie($cookie);
		
	}


}




?>