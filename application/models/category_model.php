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
 class Category_model  extends CI_Model{

	function __construct(){
	
		parent::__construct();		
		$this->table  = $this->cor_db->table('category');
		$this->lang->load('item_backend_category', lang_get());	 
		$this->tpl->assign('lang_category',$this->lang->language);			
	}
	
	 /* 保存管理员参数
	 */
	 function db_config(){
	 	return array(
	 		'main'=>array(
	 			'table_name'=>$this->table,
	 			'primary_key'=>'c_id',	 			
	 		),
	 	);
	 }
	 
	 function validator(){
	 	return  array(
			array(
 					"field"=>"main[c_title]",	
 					"label"=>"标题",	
 					"rules"=>"required|max_length[100]",	
 			
 			),
 			
 			
 			);		 	
	 }
	 
	 	//取子类数组
	function _db_category($sn,$w=null,$level_cut=0,$include_parent=1){
		if($include_parent){			
			$like = " and c_sn like '".$sn."%' ";
		}else{
			
			$like = " and c_sn like '".$sn."_%' ";
		}
		return $this->db->query("select *,(c_level+".$level_cut.") as c_level from ".$this->table." where 1=1 $like  $w  order by c_sn asc")->result_array();
		
	}
	
	

	
	
	
	//调用分类
	public function fetch_category($sn=null){
		$category  = $this->_db_category($sn);		
		return $this->cor_form->array_re_index($category,'c_sn','c_title');
		
	}
	
	
	
		
	//调用分类
	public function fetch_category_option($sn=null,$sel='01',$modify_c_sn=null,$level_cut=0,$include_parent=1){
		$category  = $this->_db_category($sn,null,$level_cut,$include_parent);
		return $this->category_to_option($category,$sel,$modify_c_sn);
		
	}
	
	//数组转option
	function category_to_option($category,$sel='01',$modify_c_sn=null){
		$str[] = "<option value='01' >".$this->lang->language['select']."</option>";
		foreach($category as $v){
			if($modify_c_sn && substr($v['c_sn'],0,strlen($modify_c_sn))==$modify_c_sn) continue;
			
			$selected = $v['c_sn']==$sel&&$sel?'selected':'';
			$str[] = "<option value='".$v['c_sn']."' $selected >".str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|',$v['c_level']).'—'.$v['c_title'].'</option>';
		}
		return implode('\n',$str);		
		
	}
	
	
	//取上一级
	function fetch_parent($sub){
		if(empty($sub)) return null;
		
		$sql = "select * from ".$this->table." where '".$sub."' regexp c_sn order by c_level desc limit 1,1 ";
		return  $this->cor_db->fetch_value($sql);
		
	}
	
	
	//取新分类编号
	function fetch_new_sn($cur_sn,$parent){
		if(strcmp(substr($cur_sn,0,-2),$parent)!=0){
			$level = intval(strlen($parent)/2);
			$sql = "select  max(c_sn) as new_c_sn  from ".$this->table." where c_sn like '".$parent."_%' and c_level=".$level;
			$new_c_sn =  $this->cor_db->fetch_value($sql,'new_c_sn');
			$new_c_sn = $new_c_sn?$new_c_sn+1:$parent.'01';	
			$len = (strlen($parent)+2);	
			$new_c_sn = sprintf("%0".$len."s",$new_c_sn);
			return $new_c_sn;
		}else{
			return $cur_sn;		
		}
	}
	
	//取分类信息,通过id或者c_sn标记
	function detail($val,$type='byid',$key=null){
		$primary_id = $type=='byid'?'c_id':'c_sn';
		$config = array(
			'table_name'=>$this->cor_db->table('category'),
			'primary_id'=>$primary_id,
			'primary_val'=>$val,
		);
	
		$rs =   $this->cor_db->fetch_one($config);
		return  $key?$rs[$key]:$rs;
	}
	
	
	//查询列表
	function fetch_list($c_parent=null){
			$this->db->select('*,left(c_sn,length(c_sn)-2) as c_parent',false)
 			->from($this->cor_db->table('category'));
 			$c_parent && $this->db->like('c_sn',$c_parent,'after');
 			$this->db->order_by('c_sn','asc')
 			->order_by('c_order','desc');
 			$rs = $this->db->get()->result_array();
 			$rs_parent = $this->cor_form->array_re_index($rs,'c_parent','c_id');
			foreach($rs as &$v){
				$v['more'] = $rs_parent[$v['c_sn']]?1:0;
			}
			
			return $data = array(
				'list'=>$rs,
			);
	}
	
	
	//分类变动扩展更新
	function ext_save($org_sn,$new_sn){
		
		
		
	}
	
	
		//分类变动扩展更新
	function ext_del($c_sn){
		
		
		
	}
	
	
	//验证是否可删除
	function valid_del(){
		
		return true;
		
	}
	

}



?>
