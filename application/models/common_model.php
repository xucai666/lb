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
		$ar = $this->cor_form->indexArrayByKey($list,'region_id','region_name');		
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
		$class_rs= $this->db->select("cc_id")->from($this->cor_db->mytable('class_category'))
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
		$select = $this->cor_form->array_re_index($a,'region_id','region_name');
		return $select;
	}
	
	
	
	
	
	function lang_all(){
		return $this->cor_cache->cache_fetch('lang_type',null,lang_get());		
	}
	
	//语种切换链接
	function lang_get_link(){
		$langs =  $this->lang_all();
		$lang_current = lang_get();
		foreach($langs as $v){
			if($v == $lang_current) continue;
			$lang_cache[$v] = $this->cor_cache->cache_fetch('lang_type',null,$v);
			
		}	
		return $lang_cache;		
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
					'table_name'=>$this->cor_db->table('invoke'),
					'primary_key'=>'i_url',
				)
			);
			 return $this->cor_db->save($data,$db_config);
		}catch(Exception $e){
			throw new Exception('save error');
		}		
	}

	function tag($parameter){
	 	$cor_db  =  &get_cor_db();	
	 	$ds = $cor_db->getDs();
	 	$CI = &get_instance();

		extract($parameter);
		//查询模板，返回值由模板设定
	
		$config = array(
				'fileds'=>'*',
				'table_name'=>'templates',
				'primary_id'=>'t_id',
				'primary_val'=>$t_id,
			);

		$rs = $cor_db->fetch_one($config);

		
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
		
		$select = $select?$select:implode(',',$cor_db->getDs()->list_fields($rs['t_db_name']));
		
			
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
			'limit_to'=>$page_size?$page_size:$CI->config->item('per_page'),
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
			
			

			$str_r = preg_replace("/<\?php(.*?)\?>/ies","eval(stripcslashes('\\1'))",$str_r);


			//$str_r = $this->replace_php_tags($str_r);

			

		}
		
		return  array('template'=>$template,'data'=>$ls,'html'=>htmlspecialchars_decode($str_r));
 
	}



	function tag_pager($parameter){
		$cor_db  =  &get_cor_db();	
	 	$cor_page = &get_cor_page();
	 	$ds = $cor_db->getDs();
	 	$ci_conf = &get_config();
	 	$CI = &get_instance();

		extract($parameter);
		//查询模板，返回值由模板设定
		
		$config = array(
				'fileds'=>'*',
				'table_name'=>'templates',
				'primary_id'=>'t_id',
				'primary_val'=>$t_id,
			);
		$rs = $cor_db->fetch_one($config);
				
		
		
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
		
		$select = $select?$select:implode(',',$cor_db->getDs()->list_fields($rs['t_db_name']));
		
			
		//查询条件
		
		$where = stripslashes($where);
		
		
		//分页  
		
		$page_size = $page_size?$page_size:$ci_conf['per_page'];
		
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
		$link_str = $cor_page->array_to_url($_GET);		
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
	 * [replace_php_tags description]
	 * @param  [type] $str [description]
	 * @return [type]      [description]
	 */
	function replace_php_tags($str){
		preg_match_all("/<\?php(.*?)\?>/ies", $str, $matches);	
		
		$j=count($matches[1]);
	
		for($i=0;$i<$j;$i++){ 
			$t = $matches[1][$i];
			$str = str_replace($matches[0][$i], eval(stripcslashes($t)), $str);
		} 
		return $str; 
	}

	/**
	 * 编辑器
	 */
	function editor($v,$i='content',$tool_bar='Basic'){
		empty($this->fckeditor) && $this->load->library('FCKeditor');
		$config = array(
				'i'=>$i,
	 			't'=>$tool_bar,
	 			'v'=>$v,
	 			'w'=>'600',
	 			'h'=>'400',
	 			'ToolbarStartExpanded'=>1,
	 			'DefaultLanguage'=>lang_get()=='english'?'en':'zh-cn',
		);
		return  $this->fckeditor->CreateHtml($config);

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
		$tb = $this->cor_db->table($tb);
		$primary = $this->cor_db->primary($tb);
		$url = $this->uri->uri_string();
		$url =  substr($url,0,strrpos($url,"/")+1);
		$sq = <<<EOT
	SELECT concat('$url',$primary,'.htm') as url,'Prev' as nav_title,`$title_field` FROM (SELECT *  FROM  $tb   WHERE  $where and  $primary<$id ORDER BY $primary DESC LIMIT 1) AS t1 
			UNION   ALL 
		SELECT concat('$url',$primary,'.htm') as url,'Next' as nav_title,`$title_field` FROM (SELECT  *  FROM  $tb   WHERE   $where and  $primary>$id ORDER BY $primary ASC  LIMIT 1) AS t2
EOT;
		return $this->cor_form->array_re_index($this->cor_db->fetch_values($sq),'nav_title',array('url',$title_field));
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
	 * [getBanner description]
	 * @return [type] [description]
	 */
 	function getBanner(){
 		
 	}


}
//class end


//functions
/**
	 * 菜单选择
	 */
	function tree_options_deal($class_arr,$id,$index,$m)
	{	
		
		static $options;
		$n = str_pad('',$m,'-',STR_PAD_RIGHT);
		$n = str_replace("-","&nbsp;&nbsp;",$n);
		for($i=0;$i<count($class_arr);$i++){
		
			if($class_arr[$i][2]==$id){
				if($class_arr[$i][0]==$index||(is_array($index)&&in_array($class_arr[$i][0],$index))){
					$options.= "        <option value=\"".$class_arr[$i][0]."\" selected=\"selected\">".$n."|--".$class_arr[$i][1]."</option>\n";
				}else{
					$options.= "        <option value=\"".$class_arr[$i][0]."\">".$n."|--".$class_arr[$i][1]."</option>\n";
				}
				
				tree_options_deal($class_arr,$class_arr[$i][0],$index,$m+1);
				
			}
			
		}
		return $options;
		
	}


	function category_options($id=0,$index=0,$m=0){		
		$CI = &get_instance();
 		$tree_db = $CI->db->select('cc_id,cc_title,cc_parent_id',false)->from($cor_db->mytable('class_category'),false)->order_by('cc_id','asc')->order_by('sort','asc')->get()->result_array();
		
		foreach($tree_db as $k=>$v){
		
			$tree_temp[$k] = array($v['cc_id'],$v['cc_title'],$v['cc_parent_id']);
			
			
		}
		return tree_options_deal($tree_temp,$id,$index,$m);
		
	}
	
	
	
//菜单处理	
	
function get_area($id) {
	$cor_db  =  &get_cor_db();
	if( $id <= 1 ) return get_area_help( 1, 0 );
	$html = "";
	while( $id > 1 ) {	
		$sql_arr = array(
			'table_name'=>'ecs_region',
			'fields'=>'region_id, region_name,parent_id',
			'primary_id'=>'region_id',
			'primary_val'=>$id,
		);	
		
		$a = $cor_db->fetch_one($sql_arr);			
		$html = get_area_help( $a['parent_id'], $id ) ."<span>&nbsp;" .$html."</span>";
		$id = $a['parent_id'];
	}
	return $html;
}
function get_area_help( $pid, $id ,$select_name='area[]') {
	$CI  =  &get_instance();
	$html = "";
	$a = $CI->db->select( "region_id, region_name, parent_id",false)->from("ecs_region")->where ("parent_id",$pid)->get()->result_array();
	if( $a ) {
		$html .= "<select name='".$select_name."' onchange='region(this)'><option value='0'>请选择</option>";
		foreach( $a as $aa ) {
			$s = $id == $aa['region_id'] ? ' selected' : '';
			$html .= "<option value='{$aa['region_id']}'{$s}>{$aa['region_name']}</option>";
		}
		$html .= "</select>";
	}
	return $html;
}
function get_area_show( $id ) {
	$CI  =  &get_instance();
	$area = array();
	while( $id > 1 ) {
		
		$a = $CI->db->select( "region_id, region_name, parent_id")->from("ecs_region")->where("region_id",$id)->get()->result_array();
		$a = array_pop($a);		
		$id = $a['parent_id'];		
		$area[] = $a;
	}
	
	return $area;
}

function get_area_str( $id ) {
	$area = get_area_show( $id );	
	$i = 0;
	$aa = '';
	do {
		$aa = $area[$i]['region_name'] .($i ? '&nbsp;' : '').$aa;
		++$i;
	} while( $i < count( $area ) );
	return $aa;
}









	
	
	
		

?>