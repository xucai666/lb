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
class Modules_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function  save_config(){

		return array(
			'main'=>array(
				'table_name'=>'module',
				'primary_key'=>'m_id'
			),
			'detail'=>array(
				'table_name'=>'module_relations',
				'primary_key'=>'r_id'
			),
		);




	}

	function valid_config($info){
	
		$config = array();

 		array_push($config,array(
				'field'=>'main[m_name]',
				'label'=>'模块名称',
				'rules'=>'required',
			),array(
				'field'=>'main[m_tb]',
				'label'=>'模块数据表',
				'rules'=>'required',
			)			
			
 		);
 		//fields types
 		$f_types = $this->fetch_f_types();
 		foreach($info['detail'] as $k=>$v){ 			
 			array_push($config,
	 			array(
	 				"field"=>"detail[r_name][$k]",
	 				"label"=>"字段名称",
	 				"rules"=>"required",
	 			),	
	 			array(
	 				"field"=>"detail[r_alias][$k]",
	 				"label"=>"别名",
	 				"rules"=>"required",
	 			)		
	 		 		
	 		 			
 			);
 			//add valid fields
 			if(in_array(strtoupper($f_types[$v['f_id']]),array('VARCHAR','INT'))){

				array_push($config,
		 			array(
		 				"field"=>"detail[r_length][$k]",
		 				"label"=>"字段长度",
		 				"rules"=>"required",
		 			)
		 		 		
		 		 			
	 			);
 			
 			} 


 		}
 		
 		return $config;
 		
	}


	function details($m_id,$where=null){
		$dt =  $this->db->select('*',false)->from('module_relations')->where('m_id',$m_id);
		if(is_array($where)) $this->db->where($where);
		$dt = $this->db->order_by('r_id','asc')->get()->result_array();
		return array_pad($dt,1,array());
	}

	function main($m_id,$key=null){
		$cf = array(
				'primary_val'=>$m_id,
				'primary_id'=>'m_id',
				'table_name'=>'module',
			);
		$ds = $this->mydb->fetch_one($cf);
		return  $key?$ds[$key]:$ds;
	}

	/**
	* list all
	**/
	function all(){
		return $this->db->select("*",false)->from('module')->order_by('m_id','asc')->get()->result_array();
	}

	function fetch_f_types(){
		//fields types
		$fields_types_c = $this->mycache->cache_fetch('fields_types');
		$ds = $this->db->select('f_id,f_type',false)->from('module_fields')->get()->result_array();
		foreach($ds as $v):
			$fields_types[$v[f_id]] = $fields_types_c[$v[f_type]];
		endforeach;
		return $fields_types;
	}


	function fetch_f_html(){
		//fields types		
		$ds = $this->db->select('f_id,f_html',false)->from('module_fields')->get()->result_array();
		foreach($ds as $v):
			$html[$v[f_id]] = $v[f_html];
		endforeach;
		return $html;
	}



	function fetch_primary($m_id,$key){
		$dt =  $this->db->select('*',false)->from('module_relations')->where('r_primary',1)->where('m_id',$m_id)->get()->first_row('array');
		return $key?$dt[$key]:$dt;
	}

	//create table
	function create_table($info){
		try{
			$this->load->dbforge();
			//fetch types from config
			$fields_types =  $this->fetch_f_types();
			//table name
			$tb = $this->db->dbprefix.$info[main][m_tb];
			//junge if exists
			$tb_exists =  $this->db->table_exists($tb);
			if($tb_exists){
				//alter table
				$fields_ds = $this->db->field_data($tb);
				foreach($fields_ds as $field){
  						$fields[] = $field->name;
  						if($field->primary_key) $primary = $field->name;
				}
				//change
				$changes = array();
				foreach($info[detail] as $v):
					$new_columns[] = $v[r_name];
					if(in_array(strtoupper($fields_types[$v[f_id]]),array('VARCHAR','INT'))){
							$ext_len = " ( ".$v[r_length]." )";	
						}else{
							$ext_len = "";
					}
					if(in_array($v[r_name], $fields)){
						//modify first
						
						if($v['r_primary'] && ($primary!=$v[r_name])){
							if($primary) $changes[] = " DROP  PRIMARY KEY ";
							$ext_pri = 'AUTO_INCREMENT PRIMARY KEY';
							$changes[] =" CHANGE   `$v[r_name]` `$v[r_name]`  ".strtoupper($fields_types[$v[f_id]]).$ext_len."  NOT NULL ".$ext_pri." COMMENT  '".$v[r_desc]."' ";
						}elseif($v['r_primary']){
							
							continue;
						}else{
							
							$ext_pri = '';
							$changes[] =" CHANGE   `$v[r_name]` `$v[r_name]`  ".strtoupper($fields_types[$v[f_id]]).$ext_len."  NOT NULL ".$ext_pri." COMMENT  '".$v[r_desc]."' ";
						}
					    
					}else{
						
						//add new
						if($v['r_primary']){
							if($primary) $changes[] = ' DROP PRIMARY KEY IF EXISTS ';
							$ext_pri = 'AUTO_INCREMENT PRIMARY KEY';
						}else{
							$ext_pri ='';
						}
					   $changes[] =" ADD  `$v[r_name]` ".strtoupper($fields_types[$v[f_id]]).$ext_len."  NOT NULL ".$ext_pri."  COMMENT  '".$v[r_desc]."' ";
					}
					
				endforeach;
				//delete
				
				$diff = array_diff($fields,$new_columns);
				foreach ((array)$diff as $key => $value) {
					$changes[] =" DROP $value ";
				}
				$reval = "ALTER TABLE `$tb` ";
				if($changes){
					$change = implode(',', $changes);
					$reval .= $change;
				}
				$this->db->query($reval);
			}
			else{
				//create table 
				$reval  = "";
				$reval .= "CREATE TABLE if not exists   `".$tb."` (";
				$columns = array();
				foreach($info[detail] as $v):
					if($v['r_primary']){
						$ext_pri = 'AUTO_INCREMENT PRIMARY KEY';
					}else{
						$ext_pri ='';
					}
					if(in_array(strtoupper($fields_types[$v[f_id]]),array('VARCHAR','INT'))){
						$ext_len = " ( ".$v[r_length]." )";	
					}else{
						$ext_len = "";
					}
					$columns[] = "`$v[r_name]` ".strtoupper($fields_types[$v[f_id]]).$ext_len." NOT NULL $ext_pri  COMMENT  '".$v[r_desc]."'";
				endforeach;
				$reval .= implode(",",$columns);
				$reval .= ") ENGINE = MYISAM ;";
				$this->db->query($reval);
			}
		}catch(EXCEPTION $e){
			throw new EXCEPTION($e->getMessage());
		}
	}


	//creat drop sql
	function  drop_table_sql($m_id){

		$sql = "select m_tb from ".$this->db->dbprefix."module where m_id in(".implode(',',$m_id).")";
		$vs = $this->mydb->fetch_values($sql);
		$sq = array();
		foreach($vs as $v){
			$sq[] = 'drop table if exists  '.$this->db->dbprefix.$v[m_tb].' ';
		}
		return $sq;
	}

	//create tag
	function create_tag($info){
		$t_name = $info['main']['m_name'];
		$t_db_name = $info['main']['m_tb'];
		$t_mid = $info['main']['m_id'];
		$t_db_fields = array_keys($this->myform->array_re_index($info['detail'],'r_name','r_name'));
		$t = ($this->db->select('t_id',false)->from('templates')->where('t_type',4)->where('t_mid',$t_mid)->get()->first_row('array'));
		$t_id = $t['t_id'];
		$data = array(
				't_name'=>$t_name,
				't_db_name'=>$t_db_name,
				't_db_fields'=>implode(',',$t_db_fields),
				't_html'=>"<ul>".str_repeat("<li>%s</li>",count($t_db_fields))."</ul>",
				't_type'=>4,
				't_mid'=>$t_mid,
			);
		if(empty($t_id)){
			$this->db->insert('templates',$data);
		}else{
			unset($data['t_html'],$data['t_mid']);
			$this->db->where('t_id',$t_id);
			$this->db->update('templates',$data);
		}
	}


	//create tag
	function create_menu($info){
		$t_name = $info['main']['m_name'];
		$t_db_name = $info['main']['m_tb'];
		$t_mid = $info['main']['m_id'];
		$r_t = ($this->db->select('r_id',false)->from('system_rights')->where('r_type',1)->where('r_pid',0)->get()->first_row('array'));
		$root_id = $r_t['r_id'];
		$t = ($this->db->select('r_id',false)->from('system_rights')->where('r_type',1)->where('r_name',$t_name)->get()->first_row('array'));
		$r_id = $t['r_id'];
		$data = array(
				'r_name'=>$t_name,
				'r_title'=>$t_name,
				'r_type'=>1,
				'r_level'=>2,
				'r_pid'=>$root_id,
				'r_order'=>1,
				'r_display'=>1,
				'r_url'=>'backend/mdata/action_set_module/'.$t_mid,
			);
		if(empty($r_id)){
			$this->db->insert('system_rights',$data);
			$new_id = $this->db->insert_id();
			$this->db->where('r_id',$new_id);
			$data = array('r_code'=>$root_id.','.$new_id);
			$this->db->update('system_rights',$data);
		}else{
			$this->db->where('r_id',$r_id);
			$data = array_merge($data,array('r_code'=>$root_id.','.$r_id));
			$this->db->update('system_rights',$data);
		}
	}

}




?>