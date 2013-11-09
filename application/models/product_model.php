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
class Product_model extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->c_sn = '0102'; //产品基类
	}
	
	/**
	 * 入库参数配置
	 */
	function db_config(){
		return array(
			'main'=>array(
				'table_name'=>$this->init_db->table('products'),
				'primary_key'=>'pro_id',
			)
		);
	}
	
	
	
	
	function db_config_order(){
		return array(
			'main'=>array(
				'table_name'=>$this->init_db->table('order_main'),
				'primary_key'=>'order_id',
			),
			'detail'=>array(
				'table_name'=>$this->init_db->table('order_detail'),
				'primary_key'=>'detail_id',
			)
		);
	}
	
	
	
	
	

		

	
	
	/**
	 * 校验 
	 */
	function validator_order(){	 
		return  array(
			array(
 					"field"=>"main[contact]",	
 					"label"=>"联系人",	
 					"rules"=>"required",	
 			
 			),
 		
 			array(
 					"field"=>"main[address]",	
 					"label"=>"联系地址",	
 					"rules"=>"required",	
 			
 			),
 				
 			array(
 					"field"=>"main[mobile]",	
 					"label"=>"手机号码",	
 					"rules"=>"required|integer|exact_length[11]",	
 			
 			),
 			array(
 					"field"=>"main[email]",	
 					"label"=>"邮箱地址",	
 					"rules"=>"required|valid_email",	
 			
 			),
 			array(
 					"field"=>"main[remarks]",	
 					"label"=>"备注",	
 					"rules"=>"max_length[150]",	
 			
 			),
 			
 			
 			
 			);		 				 					
	 		 
	}
	
	
	/**
	 * 校验 
	 */
	function validator(){	 
		return  array(
			array(
 					"field"=>"main[pro_title]",	
 					"label"=>"标题",	
 					"rules"=>"required|max_length[100]",	
 			
 			),
 		
 			array(
 					"field"=>"main[pro_content]",	
 					"label"=>"文章内容",	
 					"rules"=>"required",	
 			
 			),
 			
 			
 			array(
 					"field"=>"main[pro_date]",	
 					"label"=>"发布日期",	
 					"rules"=>"required",	
 			
 			),
 			
 			
 			);		 				 					
	 		 
	}
	
	
	
	//显示左边产品 
	
	function product_left(){
				
		$sql  = "select * from ".$this->init_db->table("products")." order by pro_id desc limit 8 ";
		$list = $this->db->query($sql)->result_array();
		return $list;	
	
	
	}
	
	
	//显示左边产品分类 
	
	function product_class_left(){
				
		$sql  = "select * from ".$this->init_db->table("category")." where c_sn like '".$this->c_sn."%' order by c_sn asc,c_level asc ";
		$list = $this->db->query($sql)->result_array();
		return $list;	
	
	}
	
	
	
	
		//显示左边产品 
	
	function product_select(){
				
		$sql  = "select * from ".$this->init_db->table("products")." order by pro_id desc";
		$list = $this->db->query($sql)->result_array();
		$list = $this->init_form->array_re_index($list,'pro_id','pro_title');
		return $list;	
	
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
	 * [count_products description]
	 * @param  [type] $pid [description]
	 * @return [type]      [description]
	 */
 	function count_products($pid){
 		$this->load->model('Tree_model');
 		$cid = $this->Tree_model->fetch_belong_ids($pid);
 		$this->db->like('p_pid',$cid,'after');
 		$this->db->where('p_state > ','0');
 		$this->db->from('module_product'); 		
 		return $this->db->count_all_results();
 	}

 	/**
 	 * [first_img description]
 	 * @param  [type] $pid [description]
 	 * @return [type]      [description]
 	 */
 	function first_img($pid){
 		$this->load->model('Tree_model');
 		$cid = $this->Tree_model->fetch_belong_ids($pid);
 		$this->db->like('p_pid',$cid,'after');
 		$this->db->from('module_product');
 		$this->db->order_by('p_pid','asc');
 		$rs =  $this->db->get()->first_row('array');
 		if($rs){
 			$img = current(explode(',',$this->Common_model->fetch_images($rs['p_pic'],1)));

 		}
 		return $img;

 	}
 	
	
	
}