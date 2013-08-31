<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

//require "Smarty-2.6.20/libs/Smarty.class.php";
require "Smarty-3.1.14/libs/Smarty.class.php";

/**
* @file system/application/libraries/tpl.php
*/
//php tag
function smarty_php_tag($params, $content, $template, &$repeat)
{

   $content = stripcslashes($content);
   eval($content);
   return '';
}

//网址
function func_site_url($array){
	extract($array);	
	$CI = & get_instance();	
    if($CI->config->item('lang_multiple') && !preg_match("/backend/", $segments)){
    	$lang_type = lang_get();
    	$segments = $lang_type.'/'.$segments;
    
    }
	return site_url($segments);
}

//网址
function func_base_url($array){
	extract($array);	
	return base_url($segments);
}

//显示错误
function type_error($array){
	extract($array);
 	echo form_error($obj,'<div id="error_span" class="red_font">','</div>'); 
}

//字符重复
function type_repeat($array){
	extract($array);
 	return str_repeat($str,$times); 
}



function func_get_area_str( $array ) {
	extract($array);
	$area = get_area_show($id);	
	
	$i = 0;
	$aa = '';
	do {
		$aa = $area[$i]['region_name'] .($i ? '&nbsp;' : '').$aa;
		++$i;
	} while( $i < count( $area ) );
	return $aa;
}

//菜单处理	
	
function func_get_areat($array) {
	extract($array);
	$cor_db  =  &get_cor_db();
	if( $id <= 1 ) $id=53;
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






//性别

function func_sex($array){
	$ci = &get_instance();	
	extract($array);
	$cor_cache  =  &get_cor_cache();
	$cache = $cor_cache->cache_fetch('sex');
	if($sex){
		 return $cache[$sex];
		
	}elseif($ass){		
		$ci->tpl->assign('pri_sex_select',$cache);
	}else{
		
		return $cache;
	}
	
	
}


//语言

function func_soft_language($array){
	$ci = &get_instance();	
	extract($array);
	$cor_cache  =  &get_cor_cache();
	$cache = $cor_cache->cache_fetch('select_language_soft');
	if($select_soft_language){
		 return $cache[$select_soft_language];
		
	}elseif($ass){		
		$ci->tpl->assign('pri_sex_select',$cache);
	}else{
		
		return $cache;
	}
	
	
}







//性别

function func_work_year($array){
	extract($array);
	$cor_cache  =  &get_cor_cache();
	$cache = $cor_cache->cache_fetch('work_year');
	return $cache[$work_year];
	
}

//编码转换

function func_iconv($array){
	extract($array);	
	return iconv($from,$to,$str);
	
	
}
/**
 * 添加css
 */

function func_insert_css($array){
	extract($array);
	$ci = &get_instance();
	$file = explode(",",$file);
	return $ci->cor_page->fetch_css($file,'loadview',$catalog);
	
}

/**
 * 添加js
 */

function func_insert_js($array){
	extract($array);
	$ci = &get_instance();
	$file = explode(",",$file);
	$path = $path?$path:'js';
	return $ci->cor_page->fetch_js($file,'loadview',$path);	
}



/**
 * 底部信息
 */
function func_bottom_info(){
			$cor_db  =  &get_cor_db();
			$ds->_reset_select();		
			$sql_paramater = array(
				'table_name'=>$cor_db->table('infos'),
				'primary_id'=>'info_class',
				'primary_val'=>'-4',
			);
			$detail =   $cor_db->fetch_one($sql_paramater);	
			$ds->_reset_select();			
			echo $detail['info_content'];
}







/*
 * Created on 2011-1-18
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 /**
  * 万能标签
  */

 function func_tag($parameter){
 	$CI = &get_instance();
 	$r = $CI->Common_model->tag($parameter);
 	return $parameter['escape']?htmlspecialchars($r['html']):$r['html'];
 }


 /**
  * 万能标签，明细记录
  */

 function func_tag_detail($parameter){

	$CI = &get_instance();
	
	if(preg_match("/=\?/",$parameter['where'])){
		$parameter['where']  = str_replace("=?", "=".$CI->uri->segment(3), $parameter['where']);
	}	
 	
 	$parameter[html_type] = 'detail';
 
 	return func_tag($parameter);
 }



 
/**
*万能标签-分页
**/ 
function func_tag_pager($parameter){
 	$CI = &get_instance();
	return $CI->Common_model->tag_pager($parameter); 
 }
 

function func_get_nav($parameter){
	$CI = &get_instance();
	$CI->load->helper('msubstr');
	extract($parameter);
	$where = $where?$where:"1=1";
	$id = $id?$id:$CI->uri->segment(3);
	$r =  $CI->Common_model->get_nav($tb,$id,$title_field,$where);
	foreach($r as $k=>$v){
		$rl[$k] = anchor(current($v),'['.$CI->lang->language[$k].']&nbsp;'.msubstr(strip_tags(next($v)),0,20,''),"title='".strip_tags(current($v))."'");
	}
	

	return str_replace(array('%Prev','%Next'),$rl,$html);
}

//button
function create_button($array){
	extract($array);
	$CI = & get_instance();
	$title = lang('button_'.$type);
	if($url){
		if(strpos($url, 'javascript')!==false || strpos($url, 'http:')!==false){
			$html = '<a href="'.$url.'" class="button_bg" id="'.$id.'" >'.$title.'</a>';
		}else{
			$html = '<a href="'.site_url($url).'" class="button_bg" id="'.$id.'">'.$title.'</a>';
		}
	}else{
	 	 $html ='<input type="submit" class="button_bg no-border"  id="'.$id.'"  value="'.$title.'" '.$ext.'    />';
	}
	return $html;

}

/**
 * [tag_input_html 视图中直接调用tag，并允许定义表单控件名称]
 * @param  [type] $parameter [description]
 * @return [type]            [description]
 */
function func_tag_input_html($parameter){
	extract($parameter);
	$CI = &get_instance();
	$CI->load->model('Fields_model');
	$html = $CI->Fields_model->detail($f_id,'f_html');
	return func_vsprintf(array('html'=>$html,'name'=>$name,'value'=>$value));

}

/**
 * [func_vsprintf description]
 * @param  [type] $array [description]
 * @return [type]        [description]
 */
function func_vsprintf($array){
	
	$html = array_shift($array);

	$html = htmlspecialchars_decode($html);
	
	$html = str_replace("%name",$array[name],$html);
	$html = str_replace("%value",$array[value],$html);
	$html = str_replace("%id",str_replace(array('[',']'), array('_','_'), $array[name]),$html);
	
	$html = preg_replace("/<\?php(.*?)\?>/ies","eval(stripcslashes('\\1'))",$html);

	//select options 
	if(preg_match("/<select/", $html)){
		$html = preg_replace("/value=\"".$array[value]."\"/", "value=\"$array[value]\" selected=\"selected\"", $html);
	}

	//radio
	if(preg_match("/<input type=\"radio\"/", $html)){
		$html = preg_replace("/value=\"".$array[value]."\" /", "value=\"$array[value]\" checked=\"checked\"", $html);
		
	}

	//checkbox
	if(preg_match("/<input type=\"checkbox\"/", $html)){
		$vs = explode(",",$array['value']);
		foreach($vs as $v):
			$html = preg_replace("/value=\"".$v."\" /", "value=\"$v\" checked=\"checked\"", $html);
		endforeach;
		
	}

	foreach($array as &$v):
		if(is_array($v)){
			foreach($v as $k1=>$v1){
				$v[$k1] =htmlspecialchars_decode($v1);
			}
		}else{

			$v =htmlspecialchars_decode($v);
		}
		$v = preg_replace("/<\?php(.*?)\?>/ies","eval(stripcslashes('\\1'))",$v);
	endforeach;
	
	
	//$html = str_replace("%name",$array[name],$html);
	//$html = str_replace("%value",$array[value],$html);
	
	return $html;	
}

/**
 * [func_state ajax_change_state class]
 * @param  [type] $array [description]
 * @return [type]        [description]
 */
function func_state($array){
	extract($array);
	return $state==1 ? 'yes':'no';
}

function func_my_encrypt($string=null,$direction){
	$cor_page = &get_cor_page();
	return $cor_page->my_encrypt($string,$direction);
}

//form_error
function ci_form_error($array){
	extract($array);		
	return form_error($k,"<span id='error_span'>","</span>");
}

function ci_anchor($array){
	extract($array);	
	$attrs = explode(',',$attrs);
	foreach($attrs as $v){
	
		list($k1,$v1) = explode(':',$v);
		$attrs_new[$k1] = $v1;
	}
	$title = $title?$title:'&nbsp;';
	return anchor($segment,$title,$attrs_new);
}

//form_error
function ci_uri($array=null){
	$CI = &get_instance();	
	if($array){
		extract($array);	
		return $CI->uri->segment($n);
	}else{
		return $CI->uri->segment_array();
	}
	
}

function ci_router($key=''){	
	$CI = &get_instance();
	$router = array('controller'=>$CI->router->fetch_class(),'method'=>$CI->router->fetch_method());;
	
	if($key){

		return $router[$key];
	}
	
	return $router;
}

/**
  * start page for webaccess
  *
  * PHP version 5
  *
  * @category  PHP
  * @package   Library
  * @author    yehua <150672834@.com>
  * @copyright 2013 conqweal
  * @license   http://opensource.org/licenses/gpl-2.0.php GNU General Public License
  * @version   1.0$
  * @link      http://phpsysinfo.sourceforge.net
  */
class tpl extends Smarty
{
	private static $instance;
	
    function __construct()
    {    	
        parent::__construct();
        self::$instance = $this;
        $config =& get_config();   
        $CI = & get_instance();	    
        
        // absolute path prevents "template not found" errors
        $this->setTemplateDir($config['template_dir']);
        $this->setCompileDir($config['compile_dir']);
        $this->setCacheDir($config['cache_dir']);


        //是否需要启用缓存
		$config = &get_config();
		$config['view_caching']			&&	$this->caching = $config['view_caching'];
		$config['view_cache_lifetime'] 	&&	$this->cache_lifetime=$config['view_cache_lifetime'];
		
        
        //use CI's cache folder        
        $this->left_delimiter = $config['left_delimiter'];
		$this->right_delimiter = $config['right_delimiter'];
		
		//vars assign
        
        $lang_type = lang_get();
      
        $this->assign("base_url", base_url()); // so we can get the full path to CI easily
        $this->assign("site_url", site_url()); // so we can get the full path to CI easily
        //backend path,js,css,img  ect.     
		//template path

		$sys_config = $CI->cor_cache->cache_fetch('sys_config','develop',lang_get());
		if($sys_config['debug']) $CI->output->enable_profiler(true);			
        $this->assign("dir_front", $config['template_dir'].'front/'.$sys_config['template'].'/'.$lang_type); // so we can get the full path to CI easily
        $this->assign("dir_backend", $config['template_dir'].'backend/'.$sys_config['template'].'/'); // so we can get the full path to CI easily
        $this->assign('ci_config',$config);
        $this->assign('ci_uri',ci_uri());
      
        //function registerpri
        $this->registerPlugin('block', 'php', 'smarty_php_tag');
        
        $this->registerPlugin("function","type_error","type_error");   
        $this->registerPlugin("function","type_repeat","type_repeat");   
        $this->registerPlugin("function","func_get_area_str","func_get_area_str");   
        $this->registerPlugin("function","func_get_areat","func_get_areat");   
        $this->registerPlugin("function","func_sex","func_sex");   
        $this->registerPlugin("function","func_work_year","func_work_year");   
        $this->registerPlugin("function","func_iconv","func_iconv");   
        $this->registerPlugin("function","func_soft_language","func_soft_language");   
        $this->registerPlugin("function","insert_css","func_insert_css");   
        $this->registerPlugin("function","insert_js","func_insert_js");   
        $this->registerPlugin("function","func_site_url","func_site_url"); 
        $this->registerPlugin("function","func_base_url","func_base_url"); 
        $this->registerPlugin("function","func_bottom_info","func_bottom_info"); 
        $this->registerPlugin("function","tag","func_tag");  //灵动标签
        $this->registerPlugin("function","tag_pager","func_tag_pager");  //灵动标签
        $this->registerPlugin("function","tag_detail","func_tag_detail");  //灵动标签
        $this->registerPlugin("function","tag_input_html","func_tag_input_html");  //灵动标签
        $this->registerPlugin("function","create_button","create_button");  //灵动标签
        $this->registerPlugin("function","func_vsprintf","func_vsprintf");  //灵动标签
        $this->registerPlugin("function","func_state","func_state");  //灵动标签
        $this->registerPlugin("function","ci_form_error","ci_form_error");  //灵动标签
        $this->registerPlugin("function","ci_anchor","ci_anchor");  //灵动标签
        $this->registerPlugin("function","func_get_nav","func_get_nav");  //灵动标签
     

        
 		
    }

  
	public static function &get_tpl(){ 	
 		return self::$instance;
 	}
    
    /**
    * @param $resource_name string
    * @param $params array holds params that will be passed to the template
    * @desc loads the template
    */
    function view($resource_name, $params = array())   {  

        if (strpos($resource_name, '.') === false) {
            $resource_name .= '.htm';
        }     
         if(!$this->isCached($resource_name)) {
        
	        if (is_array($params) && count($params)) {
	            foreach ($params as $key => $value) {
	                $this->assign($key, $value);
	            }
	        }
         }
        
        // check if the template file exists.
        if (!is_file($this->getTemplateDir(0). $resource_name)) {
            show_error("template: [$resource_name] cannot be found.");
        }
       	//cache id
       $cor_page = &get_cor_page();
       return parent::display($resource_name,$cor_page->get_cache_id());
        
    }
    
    /**
    * @param $resource_name string
    * @param $params array holds params that will be passed to the template
    * @desc loads the template
    */
    function fetch_page_content($resource_name, $params = array())   {    	
        if (strpos($resource_name, '.') === false) {
            $resource_name .= '.htm';
        }
         if(!$this->isCached($resource_name)) {
         
	        if (is_array($params) && count($params)) {
	            foreach ($params as $key => $value) {
	                $this->assign($key, $value);
	            }
	        }
         }
         
         
        // check if the template file exists.
        if (!is_file($this->getTemplateDir(0). $resource_name)) {
            show_error("template: [$resource_name] cannot be found.");
        }

       return parent::fetch($resource_name);
        
    }
    
    
} // END class smarty_library

function &get_tpl(){	
	return tpl::get_tpl();
} 
	


?>