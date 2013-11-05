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
class Common_model  extends CI_Model{

	/**
	 * [__construct description]
	 */
	function __construct(){	
		parent::__construct();
		// $this->load->helper("timecount");
	}
	
	/**
	 * 城市名称
	 * @param  [type] $p_id 上级ID
	 * @return [type]
	 */
	function getArea($p_id){		
		$this->db->select('region_id,region_name',false)->from("ecs_region");
		if($p_id>0){			
			$this->db->where("parent_id",$p_id);			
		}else{
			$this->db->where("parent_id",0,false);
		}
		$list = $this->db->order_by("region_name","asc")->get()->result_array();
		$ar = $this->init_form->indexArrayByKey($list,'region_id','region_name');		
		return $ar;
		
	}
	
	/**
	 * 取area最终值
	 */
	function fetchPostArrea($area){
		sort($area);	
		$area2 = array_pop($area);
		return $area2;
	}
		
	
	/**
	 * 下属分类
	 * @param  [type] $class_id 分类ID
	 * @return [type]
	 */
	function fetchClass($class_id){
		static $ar;
		$class_rs= $this->db->select("cc_id")->from($this->init_db->mytable('class_category'))
		->where("cc_parent_id",$class_id)
		->get()->result_array();
		$ar[$class_id] = $class_id;
		if(is_array($class_rs)){
			foreach($class_rs as $v){
				$ar[$v['cc_id']] = $v['cc_id'];
				$this->fetchClass($v['cc_id']);
			}
		
		}		
		return $ar;		
	}	
		
		
	//创建多级目录	
	function mkdirs($dir){  
		if(!is_dir($dir)){  
			if(!$this->mkdirs(dirname($dir))){  
				return false;  
			}  
			if(!mkdir($dir,0777)){  
				return false;  
			}  
		}  
		return true;  
	}  
	
	
	function getBackendSession(){		
	    session_start();		
		return  $_SESSION[session_id()];

	}
	
	
	
	//省份
	function func_get_province() {
		$CI  =  &get_instance();	
		$a = $CI->db->select( "region_id, region_name, parent_id",false)->from("ecs_region")->where ("parent_id",1)->get()->result_array();
		$select = $this->init_form->array_re_index($a,'region_id','region_name');
		return $select;
	}
	
	
	
	
	
	function lang_all(){
		return $this->init_cache->cache_fetch('lang_type',null,lang_get());		
	}
	
	
	
	
	//下载文件
	function download($file_path){	
	    ob_clean();
		$ua = $_SERVER["HTTP_USER_AGENT"];
		$filename = $file_path;
		$encoded_filename =  basename($file_path);
		$encoded_filename = urlencode($encoded_filename);
		$encoded_filename = str_replace("+", "%20", $encoded_filename);
		header('Content-Type: application/octet-stream');
		if (preg_match("/MSIE/", $ua)) {  
		header('Content-Disposition: attachment; filename="' . $encoded_filename . '"');
		} else if (preg_match("/Firefox/", $ua)) {  
		header('Content-Disposition: attachment; filename*="utf8\'\'' . $filename . '"');
		} else {  
		header('Content-Disposition: attachment; filename="' . $filename . '"');
		}
       readfile($file_path);
	}
	
	//文件大小
	function file_size_stat($file_path){
		$size = filesize($file_path);
		if($size>1024){
			$size_stat = ceil($size/1024).'K';			
		}elseif($size>1024*1024){
			
			$size_stat = ceil($size/1024/1024).'M';			
		}else{
			
			$size_stat = $size;
		}		
		return $size_stat;
		
	}

	function file_size($size){
	    $file_type = array( 'K', 'M', 'G' );
	    for ( $t = 0; $size > 1024; $t++ ){
	        $size /= 1024;
	        $file_size = round ( $size, 1 ) . ' ' . $file_type[ $t ] . 'B';
	    }
	    if(empty($file_size)) return 0;
	    else return $file_size;
	}

	

	
	 function bcdiv2( $first, $second, $scale = 0 )
    {
        $res = $first / $second;
        return round( $res, $scale );
    }
    
    
	//日期相差
	function DateDiff($part, $begin, $end){
		$diff = strtotime($end) - strtotime($begin);
		switch($part){
			case "y": $retval = $this->bcdiv2($diff, (60 * 60 * 24 * 365)); break;
			case "m": $retval = $this->bcdiv2($diff, (60 * 60 * 24 * 30)); break;
			case "w": $retval = $this->bcdiv2($diff, (60 * 60 * 24 * 7)); break;
			case "d": $retval = $this->bcdiv2($diff, (60 * 60 * 24)); break;
			case "h": $retval = $this->bcdiv2($diff, (60 * 60)); break;
			case "n": $retval = $this->bcdiv2($diff, 60); break;
			case "s": $retval = $diff; break;
		}
			return $retval;
	}
	
   


	//日期添加
	function DateAdd($part, $number, $date){
		$date_array = getdate(strtotime($date));
		$hor = $date_array["hours"];
		$min = $date_array["minutes"];
		$sec = $date_array["seconds"];
		$mon = $date_array["mon"];
		$day = $date_array["mday"];
		$yar = $date_array["year"];
		switch($part){
		case "y": $yar += $number; break;
		case "q": $mon += ($number * 3); break;
		case "m": $mon += $number; break;
		case "w": $day += ($number * 7); break;
		case "d": $day += $number; break;
		case "h": $hor += $number; break;
		case "n": $min += $number; break;
		case "s": $sec += $number; break;
		}
		return date("Y-m-d H:i:s", mktime($hor, $min, $sec, $mon, $day, $yar));
	}


	//save invoke
	function ajax_invoke_save($data){
		try{
			$db_config = array(
				'main'=>array(
					'table_name'=>$this->init_db->table('invoke'),
					'primary_key'=>'i_url',
				)
			);
			 return $this->init_db->save($data,$db_config);
		}catch(Exception $e){
			throw new Exception('save error');
		}		
	}

	function tag($parameter){
	 	$init_db  =  &get_init_db();	
	 	$ds = $init_db->getDs();
	 	$CI = &get_instance();
		extract($parameter);
		//查询模板，返回值由模板设定	


		$rs = $this->db->select('*',false)->from('templates')->where('t_id',$t_id)->get()->first_row('array');
		if(!$rs['t_enable']){
			return false;
		}

		
		//template html
		$html_field = (empty($html_type) || $html_type=='list')?'t_html':'t_html_'.$html_type;		
		$template = $template?$template:$rs[$html_field];

		//convert to db_parameter

		$db_ar = array(
			'from'=>$from?$from:$rs['t_db_name'],
			'select'=>$select?$select:$rs['t_db_fields'],
			'where'=>$where?$where:$rs['t_db_where'],
			'group'=>$group?$group:$rs['t_db_group'],
			'order'=>$order?$order:$rs['t_db_order'],
			'join'=>$join?$join:$rs['t_db_join'],
			'page_size'=>$page_size?$page_size:$rs['t_db_limit'],
		);
		
			
		extract($db_ar);

		//查询字段
		
		$select = $select?$select:implode(',',$init_db->getDs()->list_fields($rs['t_db_name']));
		
			
		//查询条件
		
		$where = stripslashes($where);
		
		
		//分页  
		
		
		//排序

		$select && $ds->select($select,false);
		$where  && $ds->ar_where[0] = $where;
		$group  && $ds->ar_groupby[0] = $group;		
		$order  && $ds->ar_orderby[0] = $order;		

		$ds->from($from);

		//联合查询
		if($join){
			$join_ar = explode(';',$join);
			foreach($join_ar as $v){
				$v1 = explode(',',$v);
				list($join_tb,$join_conditoin,$join_type) = $v1;
				$ds->join($join_tb,$join_conditoin,$join_type);
			}
			
		}
		
		$limit_from = $page_size>0 ? $_GET['per_page']:0;
		$limit_from  = $html_type=='detail'?0:$limit_from;	
		
		$params = array( 		
			'limit_to'=>$page_size?$page_size:config_item('per_page'),
			'limit_from'=>$limit_from,
		); 	 		
		$config['base_url'] = 		current_url().$link_str;
		if(!isset($params['limit_from'])) $params['limit_from'] = 0;	
		$ds->limit($params['limit_to'],$params['limit_from']);
		//to html
		$q = $ds->get();
		$ls = $q->result_array();

		//free 
		$q->free_result();
		$ds->_reset_select();

		if(!function_exists("walk_fn_key")){
		 	function walk_fn_key(&$v,$key,$p){
		 		$v = $p.$v;
		 	}
 		}
 		if(!function_exists("walk_fn_val")){
		 	function walk_fn_val(&$v,$key){
		 		$v = htmlspecialchars($v);
		 	}
 		}
 		$reval = array();
		foreach($ls as $k=>$item):
	 		$t= array_keys($item);
	 		//fields name add % will  be replace
	 		array_walk($t, 'walk_fn_key','%');
	 		array_walk($item, 'walk_fn_val');
		 	$reval[$k] = str_replace($t, $item,$template);	
		endforeach;	
		//transpate php tags
		$str_r = implode('',$reval);
		if(strpos($str_r, '<?php')!==false){
			$str_r='?'.'>'.($str_r);
			ob_start();
			eval($str_r);
			$str_r = ob_get_contents();
			ob_end_clean();	

		}
		
		return  array('template'=>$template,'data'=>$ls,'html'=>htmlspecialchars_decode($str_r));
 
	}



	function tag_pager($parameter){
		$init_db  =  &get_init_db();	
	 	$init_page = &get_init_page();
	 	$ds = $init_db->getDs();
	 	$CI = &get_instance();

		extract($parameter);
		//查询模板，返回值由模板设定
		
	
		$rs = $this->db->select('*',false)->from('templates')->where('t_id',$t_id)->get()->first_row('array');


		if(!$rs['t_enable']){
			return false;
		}
		
		//convert to db_parameter
		$db_ar = array(
			'from'=>$from?$from:$rs['t_db_name'],
			'select'=>$select?$select:$rs['t_db_fields'],
			'where'=>$where?$where:$rs['t_db_where'],
			'group'=>$group?$group:$rs['t_db_group'],
			'order'=>$order?$order:$rs['t_db_order'],
			'join'=>$join?$join:$rs['t_db_join'],
			'page_size'=>$page_size?$page_size:$rs['t_db_limit'],
		);
				
		extract($db_ar);

		//查询字段
		
		$select = $select?$select:implode(',',$init_db->getDs()->list_fields($rs['t_db_name']));
		
			
		//查询条件
		
		$where = stripslashes($where);
		
		
		//分页  
		
		$page_size = $page_size?$page_size:config_item('per_page');
		
		//排序

		$select && $ds->select($select,false);
		$where  && $ds->ar_where[0] = $where;
		$group  && $ds->ar_groupby[0] = $group;		
		$order  && $ds->ar_orderby[0] = $order;		

		$ds->from($from);

		//联合查询
		if($join){
			$join_ar = explode(';',$join);
			foreach($join_ar as $v){
				$v1 = explode(',',$v);
				list($join_tb,$join_conditoin,$join_type) = $v1;
				$ds->join($join_tb,$join_conditoin,$join_type);
			}
			
		}
		
		$limit_from = $_GET['per_page']; 		
		$link_str = $init_page->array_to_url($_GET);		
		$params = array( 		
			'limit_to'=>$page_size,
			'limit_from'=>$limit_from,
		); 	 		
		$config['base_url'] = 		current_url().$link_str;
		
		$sql_count =  $ds->_compile_select();
		$dsq= $ds->query("select count(1) as total from ($sql_count) as t ");
		$count = $dsq->first_row('array');
		//free
		$dsq->free_result();
		$ds->_reset_select();

		$config['per_page'] = $page_size; 			
		$config['total_rows'] = $count['total'];  		
		$CI->pagination->initialize($config); 
		if($ajax){
			$pager = $CI->pagination->create_ajax_links();
		}else{
			$pager  = $CI->pagination->create_links(); 
		}
		
		return $pager; 
	}


	/**
	 * 编辑器
	 */
	function editor($v,$i='content',$tool_bar='Basic',$w=600,$h=400){
			return   $this->ckeditor($v,$i,$tool_bar,$w,$h);
	}

	
	/**
	 * ckeditor
	 * @param  [type] $v        [description]
	 * @param  string $i        [description]
	 * @param  string $tool_bar [description]
	 * @return [type]           [description]
	 */
	function ckeditor($v,$i='content',$tool_bar='Basic',$w=600,$h=400){
		if(!function_exists('display_ckeditor')){
			$this->load->helper('ckeditor');
		}

		$cfg = array(
		
			//ID of the textarea that will be replaced
			'id' 	=> 	$i,
			'path'	=>	'js/ckeditor',
			'value'	=>	$v,
			
						//Optionnal values
			'config' => array(
				'width' 	=> 	$w,	//Setting a custom width
				'height' 	=> 	$h,	//Setting a custom height
				'toolbar' 	=> 	$tool_bar,
			 	'skin'		=>	'kama',		
			),
			//Replacing styles from the "Styles tool"
			/**'styles' => array(
			
				//Creating a new style named "style 1"
				'style 1' => array (
					'name' 		=> 	'Blue Title',
					'element' 	=> 	'h2',
					'styles' => array(
						'color' 			=> 	'Blue',
						'font-weight' 		=> 	'bold'
					)
				),
				
				//Creating a new style named "style 2"
				'style 2' => array (
					'name' 		=> 	'Red Title',
					'element' 	=> 	'h2',
					'styles' => array(
						'color' 			=> 	'Red',
						'font-weight' 		=> 	'bold',
						'text-decoration'	=> 	'underline'
					)
				)				
			),**/
		
			
		);
		return display_ckeditor($cfg);

	}


	function set_uid(){

		$this->uid = uniqid();
	}

	function get_uid(){
		return $this->uid;
	}

	/**
	 * [get_nav 导航，上一页，下一页]
	 * @param  [type] $tb          [description]
	 * @param  [type] $id          [description]
	 * @param  [type] $title_field [description]
	 * @param  string $where       [description]
	 * @return [type]              [description]
	 */
	function get_nav($tb,$id,$title_field,$where='1=1'){

		if(!is_numeric($id)) return false;
		$tb = $this->init_db->table($tb);
		$primary = $this->init_db->primary($tb);
		$url = $this->uri->uri_string();
		$url =  substr($url,0,strrpos($url,"/")+1);
		$sq = <<<EOT
	SELECT concat('$url',$primary) as url,'Prev' as nav_title,`$title_field` FROM (SELECT *  FROM  $tb   WHERE  $where and  $primary>$id ORDER BY $primary asc LIMIT 1) AS t1 
			UNION   ALL 
		SELECT concat('$url',$primary) as url,'Next' as nav_title,`$title_field` FROM (SELECT  *  FROM  $tb   WHERE   $where and  $primary<$id ORDER BY $primary desc  LIMIT 1) AS t2
EOT;
		return $this->init_form->array_re_index($this->init_db->fetchAll($sq),'nav_title',array('url',$title_field));
	}

	/**
	 * [debug 测试，默认追加模式]
	 * @return [type] [description]
	 */
	function debug($mode='a'){
		$h =fopen(FCPATH.'/debug/debug.txt',$mode);
 		if($h){
 			fwrite($h,"test\n");
 			fclose($h);
 		}
		
	}

	/**
	 * show captacha
	 * @return [type] [description]
	 */
	function show_captcha(){
		$this->load->helper('imgCode');
		$imgcode=new imgcode();
		$imgcode->image(1);
	}

	/**
	 * fetch captcha code 
	 * @return [type] [description]
	 */
	function get_Captcha(){
		@session_start();
		return $_SESSION['IMGCODE'];
	}

	function fetch_images($uid,$thumb=false){
		if(strpos($uid, '.')!==false && strpos($uid, ',')===false) return $uid;
		if(empty($uid)) return false;
		$uid_convert = explode(',',$uid);
		$img_field = $thumb?"REPLACE(i_url,'images','_thumbs/Images') as i_url ":'i_url';
		$rs = $this->db->select("i_id,".$img_field,false)->from('module_images')->where_in('i_uid',$uid_convert)->order_by('i_id','asc')->get()->result_array();
		$rs  = $this->init_form->array_re_index($rs,'i_id','i_url');
		return implode(',',$rs);
	}

	function delete_images($uid){
		$uid_convert = explode(',',$uid);
		$ls = $this->db->select('i_url',false)->from('module_images')->where_in('i_uid',$uid_convert)->order_by('i_id','asc')->get()->first_row('array');
		foreach($ls as $v){
			@unlink(realpath(str_replace(base_url(), '', $v)));
		}
	}

	/**
	 * 返回网站相对路径
	 * @return [type] [description]
	 */
	function get_real_url(){
		$r =  realpath($_SERVER['DOCUMENT_ROOT']);
		$r = str_replace( $r,'',realpath(dirname(__file__)));
		$r = str_replace(DIRECTORY_SEPARATOR,'/', $r).'/';
		return  'http://'.$_SERVER['HTTP_HOST'].$r;
	}


}
//class end









	
	
	
		

?>