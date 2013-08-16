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
class Mdata_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function  save_config(){
		return array('main'=>array(
				'table_name'=>$this->m->main($this->get_mid(),'m_tb'),
				'primary_key'=>$this->m->fetch_primary($this->get_mid(),'r_name')
			));

	}

	function valid_config($info){
		$config = array();
		$fields = $this->m->details($this->get_mid(),array('r_primary'=>'0'));
		foreach($fields as $v):
				if(empty($v[r_valid])) continue;
				array_push($config,array(
					"field"=>"main[$v[r_name]]",	
 					"label"=>$v[r_alias],	
 					"rules"=>$v[r_valid],		
				)
		);
		endforeach;
		
		return $config;
	}

	


	function get_mid(){

		return get_cookie('m_id');
	}

	function set_mid($id){
		$cookie = array(
               'name'   => 'm_id',
               'value'  => $id,
               'expire' => '86500',
               'domain' => '',
               'path'   => '/'
              
           );	
		set_cookie($cookie);
		
	}

	function fetch_list($size,$query=null){
		//config table
		$tb = $this->m->main($this->get_mid(),'m_tb');
	    $query_types = $this->mycache->cache_fetch('query_types');
		//config fields
		$fields_r = $this->m->details($this->get_mid());
		
		//fields html
		$fields_html = $this->m->fetch_f_html();


		foreach($fields_r as $k=>$v){
		if($v['r_primary']) $primary = $v['r_name'];
			if($v['r_queryable']){
				if(is_array($query[$v['r_name']])){
					foreach($query[$v['r_name']] as $v1):
						$this->db->or_where("FIND_IN_SET('$v1',$v[r_name])>0",NULL,'or');
					endforeach;	
				}else{
					$this->db->like($v['r_name'],$query[$v['r_name']],$query_types[$v[r_queryable]]);
				}
				
				$querys[$v['r_name']] = array('name'=>$v['r_alias'],'html'=>$fields_html[$v['f_id']]);
			}
			//数据列表页面，隐藏未配置输出格式的字段
			if(empty($v['r_output'])) unset($fields_r[$k]);
		}
		$fields_out = $this->myform->array_re_index($fields_r,'r_name','r_output');
		$this->db->select(implode(',',array_keys($fields_out)),false)->from($tb)->order_by($primary.' desc');

		$ls = $this->mydb->fetch_all($size);

		
		//按输出格式对数据处理后再输出
		foreach($ls['list'] as $k=>$v){

			foreach($v as $k1=>$v1){
				if($fields_out[$k1]){	
					$t = str_replace("%value",$v1,$fields_out[$k1]);
					$t = htmlspecialchars_decode($t);
					$t = preg_replace("/<\?php(.*?)\?>/ies", "eval(stripcslashes('\\1'))", $t);
					$v[$k1] = $t;
				}
			}
			$ls['list'][$k] = $v;
		}
	
		return array_merge($ls,array('fields'=>$fields_r,'querys'=>$querys,'primary'=>$primary));
	}

	//detail
	function detail($id){
		$cf = array(
				'primary_val'=>$id,
				'primary_id'=>$this->m->fetch_primary($this->get_mid(),'r_name'),
				'table_name'=>$this->m->main($this->get_mid(),'m_tb'),
		);
		$ds =  $this->mydb->fetch_one($cf);

		return $ds;
	}


	/**
	 * [select_list description]
	 * @return [type] [description]
	 */
	function select_list(){
		$list = $this->m->all();
		foreach($list as $k=>&$v){
			if($v[m_lock]){
				unset($list[$k]);
				continue;
				
			}
			$v['m_stat'] = $this->db->count_all_results($v['m_tb']);
		}
		return array('list'=>$list);
	}


}




?>