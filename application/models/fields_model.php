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
class Fields_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function  save_config(){
		return array('main'=>array(
				'table_name'=>'module_fields',
				'primary_key'=>'f_id'
			));

	}

	function valid_config(){
		return array(
					array(
						'field'=>'main[f_name]',
						'label'=>'字段名称',
						'rules'=>'required',
					),					
					array(
						'field'=>'main[f_html]',
						'label'=>'html代码',
						'rules'=>'required',
					),
				);
	}

	//options
	function fetch_select(){
		return $this->myform->array_re_index($this->db->select("*",false)->from('module_fields')->get()->result_array(),'f_id','f_name');
	}

	//detail
	function detail($f_id,$key=null){
		$cf = array(
				'primary_val'=>$f_id,
				'primary_id'=>'f_id',
				'table_name'=>'module_fields',
			);
		$ds = $this->mydb->fetch_one($cf);
		return $key?$ds[$key]:$ds;
	}



}




?>