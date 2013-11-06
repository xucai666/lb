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
	$init_db  =  &get_init_db();
	$CI = & get_instance();	

	if( $id <= 1 ) $id=53;
	$html = "";
	while( $id > 1 ) {	
	
		$a = $CI->db->select('*',false)->from('ecs_region')->where('region_id',$id)->get()->first_row('array');
		
		$html = get_area_help( $a['parent_id'], $id ) ."<span>&nbsp;" .$html."</span>";
		$id = $a['parent_id'];
	}
	return $html;
}






//性别

function func_sex($array){
	$ci = &get_instance();	
	extract($array);
	$init_cache  =  &get_init_cache();
	$cache = $init_cache->cache_fetch('sex');
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
	$init_cache  =  &get_init_cache();
	$cache = $init_cache->cache_fetch('select_language_soft');
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
	$init_cache  =  &get_init_cache();
	$cache = $init_cache->cache_fetch('work_year');
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
	return $ci->init_page->fetch_css($file,'loadview',$catalog);
	
}

/**
 * 添加js
 */

function func_insert_js($array){
	extract($array);
	$ci = &get_instance();
	$file = explode(",",$file);
	$path = $path?$path:'js';
	return $ci->init_page->fetch_js($file,'loadview',$path);	
}



/**
 * 底部信息
 */
function func_bottom_info(){
			$init_db  =  &get_init_db();
			$ds->_reset_select();		
			$detail =   $this->db->select('*',false)->from('infos')->where('info_class','-4')->get()->first_row('array');
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
	extract($parameter);
	$where = $where?$where:"1=1";
	$id = $id?$id:$CI->uri->segment(3);
	$r =  $CI->Common_model->get_nav($tb,$id,$title_field,$where);
	if($r){
		foreach($r as $k=>$v){
			$rl[$k] = anchor(current($v),'['.$CI->lang->language[$k].']&nbsp;'.msubstr(strip_tags(next($v)),0,20,''),"title='".strip_tags(current($v))."'");
		}
		
		return str_replace(array('%Prev','%Next'),$rl,$html);
	
	}
}

//button
function create_button($array){
	extract($array);
	$CI = & get_instance();
	$title = lang('button_'.$type);
	if($url){
		if(strpos($url, 'javascript')!==false){
			$html = '<input type="button" onclick="'.$url.'" class="button_bg" id="'.$id.'" value="'.$title.'" />';
		}elseif(strpos($url, 'http:')!==false){
			$html = '<input type="button" onclick="self.location.href=\''.$url.'\'" class="button_bg" id="'.$id.'" value="'.$title.'" />';
		}else{
			$html = '<input type="button" onclick="self.location.href=\''.site_url($url).'\'"  class="button_bg" id="'.$id.'" value="'.$title.'" />';
		}
	}else{
	 	 $html ='<input type="submit" class="button_bg no-border"  id="'.$id.'"  value="'.$title.'"  '.$ext.'    />';
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
	$r_name = $array['name'];
	$r_value = $array['value'];
	$r_ext_prop = $array['ext_prop'];
	$r_desc = $array['desc'];
	
	$html = array_shift($array);

	$html = htmlspecialchars_decode($html);
	
	$html = str_replace("%name",$r_name,$html);
	$html = str_replace("%value",$r_value,$html);
	$html = str_replace("%ext_prop",$r_ext_prop,$html);
	$html = str_replace("%desc",$r_desc,$html);


	$html = str_replace("%id",str_replace(array('[',']'), array('_','_'), $r_name),$html);
	
	/**$html = preg_replace("/<\?php(.*?)\?>/ies","eval(stripcslashes('\\1'))",$html);**/


	$html='?'.'>'.($html);
	ob_start();
	eval($html);
	$html = ob_get_contents();
	ob_end_clean();	


	//select options 
	if(preg_match("/<select/", $html)){
		$html = preg_replace("/value=\"".$r_value."\"/", "value=\"$r_value\" selected=\"selected\"", $html);
	}

	//radio
	if(preg_match("/<input type=\"radio\"/", $html)){
		$html = preg_replace("/value=\"".$r_value."\" /", "value=\"$r_value\" checked=\"checked\"", $html);
		
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
		/**
		 * $v = preg_replace("/<\?php(.*?)\?>/ies","eval(stripcslashes('\1'))",$v);
		 */
		
	$v='?'.'>'.($v);
	ob_start();
	eval($v);
	$v = ob_get_contents();
	ob_end_clean();	
	endforeach;
	
	
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
	$init_page = &get_init_page();
	return $init_page->my_encrypt($string,$direction);
}
/**
 * 分类树，往上推含自身
 * @param  [type] $params [description]
 * @return [type]         [description]
 */
function tree_full_ids($id){

	$CI = &get_instance();
	$CI->load->model('Tree_model');
	return $CI->Tree_model->fetch_belong_ids($id);
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

/**
 * [ci_uri description]
 * @param  [type] $array [description]
 * @return [type]        [description]
 */
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


// put these function somewhere in your application
function db_get_template ($tpl_name, &$tpl_source, &$smarty_obj)
{
    // do database call here to fetch your template,
    // populating $tpl_source with actual template contents
    $tpl_source = "This is the template text";
    // return true on success, false to generate failure notification
    return true;
}

function db_get_timestamp($tpl_name, &$tpl_timestamp, &$smarty_obj)
{
    // do database call here to populate $tpl_timestamp
    // with unix epoch time value of last template modification.
    // This is used to determine if recompile is necessary.
    $tpl_timestamp = time(); // this example will always recompile!
    // return true on success, false to generate failure notification
    return true;
}

function db_get_secure($tpl_name, &$smarty_obj)
{
    // assume all templates are secure
    return true;
}

function db_get_trusted($tpl_name, &$smarty_obj)
{
    // not used for templates
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
        $CI = & get_instance();	    
        
        // absolute path prevents "template not found" errors
        $this->setTemplateDir(config_item('template_dir'));
        $this->setCompileDir(config_item('compile_dir'));
        $this->setCacheDir(config_item('cache_dir'));


        
        //use CI's cache folder        
        $this->left_delimiter = config_item('left_delimiter');
		$this->right_delimiter = config_item('right_delimiter');
		
		//vars assign
        
        $lang_type = lang_get();
        
      
        $this->assign("base_url", base_url('/')); // so we can get the full path to CI easily
        $this->assign("site_url", site_url('/')); // so we can get the full path to CI easily
        //backend path,js,css,img  ect.     
		//template path

		$sys_config = $CI->init_cache->cache_fetch('sys_config','develop',lang_get());
		if($sys_config['debug']) $CI->output->enable_profiler(true);			
        $this->assign("dir_front", config_item('template_dir').'front/'.$sys_config['template'].'/'.$lang_type); // so we can get the full path to CI easily
        $this->assign("dir_backend", config_item('template_dir').'backend/'); // so we can get the full path to CI easily
        $ci_config  = &get_config();
        $this->assign('ci_config',$ci_config);
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
        $this->registerPlugin("function","func_get_nav","func_get_nav");  //灵动标签
        $this->registerPlugin("function","ci_form_error","ci_form_error");  //灵动标签
        $this->registerPlugin("function","ci_anchor","ci_anchor");  //灵动标签




 

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
       return parent::display($resource_name);        
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

