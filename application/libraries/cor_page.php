<?php
 if (!defined('BASEPATH')) show_error('No direct script access allowed');
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
class Cor_page{	
	private static $instance;
	public $load_config_css = 1;

	public function __construct()
	{
		self::$instance =& $this;
		$this->initial();

		
	}


		
	public static function &get_cor_page()
	{
		return self::$instance;
	}

	function initial(){		
		$this->header_html=array('js'=>null,'css'=>null);
		$config = &get_config();		
		$this->config = $config;
		
		$CI = & get_instance();	
		if(empty($CI->Common_model)){
			$CI->load->model('Common_model');
		}
		
 		
		//current lang		
		
		$this->lang_type = lang_get();
	
		//current theme


		$sys_config = $CI->cor_cache->cache_fetch('sys_config','develop',lang_get());
		
				
		$this->backend_theme = $sys_config['template'];


		$this->front_theme = $sys_config['template'];
		
		
	}
	
	/**
	*@key 文件类型
	*@type 前后台
	*@return 文件路径
	**/
	function getRes($key,$type='front',$cat=''){
		 return getRootUrl($key,$type,$cat);
	}
	/**
	 * 获取按钮
	 */
	function fetchButton($img){
		return img_url($img.'.gif','backend');
	}
	


	/**
	 * 后台view,load
	 */
	function load_backend_view($view,$data=null,$return=0){	
			global $OUT;
			
			$this->load_language('backend');
			
			$this->fetch_js($this->config['backend_default_js'],'config',getRootUrl('js','backend'));
				
						
			$this->load_config_css && $this->fetch_css($this->config['backend_default_css'],'config',getRootUrl('css','backend'));
			
			$CI = & get_instance();	
			$tpl = &get_tpl();
			$cache = &get_cor_cache();
			$config =& get_config(); 
			


			//关闭缓存
			$tpl->caching = 0;
			$tpl->cache_lifetime = 0;
			

			
			$tpl->assign("lang_type",$this->lang_type);	
	 		$tpl->assign('js_url',js_url(null,'backend')); 
	 		$tpl->assign('css_url',css_url(null,'backend')); 
	 		$tpl->assign('img_url',img_url(null,'backend')); 	
	 		$tpl->assign('theme_url',theme_url('backend')); 	
			
			//debug mode
			$sys_config = $cache->cache_fetch('sys_config','develop',lang_get());
			
			if($sys_config['time_page_redirect']){ 				
				$tpl->assign('time_page_redirect',$sys_config['time_page_redirect']);
			}

			if($sys_config['debug']==1 && !in_array($CI->router->fetch_class(),array('login'))){
					$CI->load->library('invoke');	
					$tpl->assign('invoke',$CI->invoke->run());									
			}
			
			$data['header_html'] = $this->header_html;
			
			if(is_array($view)){
				
				foreach($view as $v){
					
					$content = $tpl->fetch_page_content('backend/'.$this->backend_theme.'/'.$v,$data);
					$OUT->append_output($content);
					
				}
			}else{

				$content = $tpl->fetch_page_content('backend/'.$this->backend_theme.'/'.$view,$data);
				$OUT->append_output($content);	
				
			}
			if($return==1){
				return $OUT->get_output();
			}
			$OUT->_display($content); 
			exit;
					
	}	

	function get_view_path($v,$type){
		if (strpos($v, '.') === false) {
            $v .= '.htm';
        } 
		return $type=='backend'?$type.'/'.$this->front_theme.'/'.$v:$type.'/'.$this->front_theme.'/'.$this->lang_type.'/'.$v;
	}

	//cache for single view
	function view_cache($v,$type='front'){
		$CI = & get_instance();	
		$tpl_path = $this->get_view_path($v,$type);
		$cache_id = $this->get_cache_id();
		if($CI->tpl->isCached($tpl_path,$cache_id)){
			 $CI->tpl->display($tpl_path,$cache_id);
			 exit;
		}

	}

	//caching for views
	function view_cache_all($act_to_view){
		$CI = & get_instance();	
		$act_current = $CI->router->fetch_method();
	    if(in_array($act_current, array_keys($act_to_view))){
	    	$this->view_cache($act_to_view[$act_current]);
	    }else{
	    	$CI->tpl->caching = 0;
	    }

	}

	//cache unique id
	function get_cache_id(){
		return md5($this->GetCurUrl());
	}


	function clear_page_cache($v){
		$CI = &get_instance();
		$CI->tpl->clearCache($this->get_view_path($v,'front'),$this->get_cache_id());
	}
	/*
	 * 前台view,load
	 */	
	function load_front_view($view,$data=null,$cache=0){
			global $OUT;	
			$CI = & get_instance();	
			$tpl = &get_tpl();
			$cache = &get_cor_cache();
			$config =& get_config(); 
			
			$this->load_language('front');
			
			$this->fetch_js($config['front_default_js'],'config',getRootUrl('js','front'));
			
			$this->load_config_css && $this->fetch_css($config['front_default_css'],'config',getRootUrl('css','front'));	
		
			
			
			$module = $CI->input->get('module');
			
			$module = $module?$module:1;				
			
			$tpl->assign("module_select",$module);	
			
			$lang_link  = $cache->cache_fetch("lang_type",$this->lang_type);			
			
			$data['lang_link']  = $lang_link[$lang_type];	
			
			
			//预加载配置信息
			$sys_config = $cache->cache_fetch('sys_config');	
			
			$data = array_merge($data,$sys_config);
			
			$tpl->assign("lang_type",$this->lang_type);	
			
			
	 		$tpl->assign("lang_type",$this->lang_type);	
	 		$tpl->assign('js_url',js_url(null,'front')); 
	 		$tpl->assign('css_url',css_url(null,'front')); 
	 		$tpl->assign('img_url',img_url(null,'front')); 	
	 		$tpl->assign('theme_url',theme_url('front')); 



			$data['header_html'] = $this->header_html;	
			if(is_array($view)){
				foreach($view as $v){
					 $tpl->view($this->get_view_path($v,'front'),$data);
					
			    }
		   }else{
				     $tpl->view($this->get_view_path($view,'front'),$data);
				
		   }
	}	
	
	
	//获得当前的脚本网址 
	function GetCurUrl() 
	{ 
		if(!empty($_SERVER["REQUEST_URI"])) 
		{ 
		$scriptName = $_SERVER["REQUEST_URI"]; 
		$nowurl = $scriptName; 
		} 
		else 
		{ 
		$scriptName = $_SERVER["PHP_SELF"]; 
		if(empty($_SERVER["QUERY_STRING"])) 
		{ 
		$nowurl = $scriptName; 
		} 
		else 
		{ 
		$nowurl = $scriptName."?".$_SERVER["QUERY_STRING"]; 
		} 
		} 
		if(substr($nowurl,0,1)=='/'){
			$nowurl = substr($nowurl,1);
		}
		return $nowurl;
	} 
	
	/**
	 * make html
	 */
	function MakeHtmlFile($file_name, $content) {      
        //目录不存在就创建  
        if (!file_exists (dirname($file_name))) {  
            if (!@mkdir (dirname($file_name), 0777)) {  
                die($file_name."目录创建失败！");  
            }  
        }  
                      
        if(!$fp = fopen($file_name, "w")){  
            echo "文件打开失败！";  
            return false;  
        }  
 
        if(!fwrite($fp, $content)){  
            echo "文件写入失败！";  
            fclose($fp);  
            return false;  
        }  
        fclose($fp); 
        chmod($file_name,0666); 
    }
	
	/**
	 * 加载js
	 */
	function fetch_js($js,$from='view',$catalog='js'){
			if(empty($js)) return '';
			$html_all_js = '';
			if(is_array($js)){					
				foreach($js as $v){				
					$html_all_js .= '<script language="JavaScript" type="text/javascript" src="'.$catalog.'/'.$v.'.js"></script>'.chr(13);		
													
				}					
			}else{
					$html_all_js = '<script language="JavaScript" type="text/javascript" src="'.$catalog.'/'.$js.'.js"></script>'.chr(13);
			}	
			
			if($from == 'config'){
				
				$this->header_html['js'] = $this->fetch_js_var().$html_all_js.$this->header_html['js'];
				
			}else{			
				$this->header_html['js'] .= $html_all_js;

				
			}		

			return $html_all_js;
		
	}
	
	
	function fetch_js_var(){
		$str  =   "<script language='javascript'>\n";
		$str .=   "var url_root ='".base_url()."';\n";
		$str .=   "var site_url='".site_url()."';\n";
		
		foreach(array('js','img','css') as $k){
			foreach(array('front','backend') as $v){
				$str .=   "var ${k}_${v}='".getRootUrl($k,$v)."';\n";
			}
		}
		
		$str .=   "</script>\n";
		return $str;
	}
	
	/**
	 * 加载样式
	 */
	function fetch_css($css,$from='view',$catelog=''){	
		if(empty($css)) return '';
		$html_all_css = '';	
		if(empty($css)) return '';
		if(is_array($css)){
			foreach($css as $value){
				$html_all_css .= "<link href=\"".$catelog.$value.".css\" rel=stylesheet > ".chr(13);
			}
			
		}else{
			$html_all_css = "<link href=\"".$catelog.$css.".css\" rel=stylesheet > ".chr(13);
		}	
		if($from=='config'){
			$this->header_html['css'] = $html_all_css.$this->header_html['css'];
		}else{	
		
			$this->header_html['css'] .= $html_all_css;
		}
		return $html_all_css;
		
		
	}
	
	
	
	 	
	 function my_encrypt($string=null, $operation) { 
	 	return my_encrypt($string,$operation);
	 		
	}
		
		
		
		
		
	/**
	 * 跳转
	 */
	function front_redirect($url,$msg=null){	
		if(preg_match("/javascript/",$url)||preg_match("/http/",$url)){
			$url_new = $url;
			
		}else{
			if(!preg_match("/front/",$url)){
				$url = 'front/'.$url;
			}			
			$url_new = site_url($url);
		}
		$data = array('url'=>$url_new,'msg'=>$msg);	
		if(empty($msg)){
			redirect($url);
		} else{
			$this->load_front_view('page_redirect',$data);	
		}
		
		
	}
	
		
	/**
	 * 跳转
	 */
	function backend_redirect($url,$msg=null,$view='page_redirect'){	

		if(preg_match("/javascript/",$url)||preg_match("/http/",$url)){
			$url_new = $url;
			
		}else{
			if(!preg_match("/backend/",$url)){
				$url = 'backend/'.$url;
			}			
			$url_new = site_url($url);
		}
		$data = array('url'=>$url_new,'msg'=>$msg);
		if(empty($msg)){
			redirect($url);
		} else{
			$this->load_backend_view($view,$data);	
		}
		
		

	}
	
	
	/**
	 * 跳转
	 */
	function backend_redirects($url_array,$msg=null){	
		foreach($url_array as $k=>$url){
			if(preg_match("/javascript/",$url)||preg_match("/http/",$url)){
				$url_new = $url;
			}else{
				if(!preg_match("/backend/",$url)){
					$url = 'backend/'.$url;
				}			
				$url_new = site_url($url);
			}	
			$url_array[$k] = $url_new;
		}
		$data = array('urls'=>$url_array,'msg'=>$msg);
		$this->load_backend_view('page_redirects',$data);	
	}
	
	
	/**
	 * js跳转 
	 */
	function pop_redirect($msg,$url,$target="self"){
		$this->backend_redirect($url,$msg);
	}
	
	
	

	
	/**
	 * 跳转
	 */
	function msg_redirect($url,$msg){	
		$data = array('url'=>$url,'msg'=>$msg);
		$this->loadview('page_redirect',$data);			
	}
	
	
	
	
	/**
	 * 数组转成url
	 */
	function array_to_url($array){			
		$link='?1=1';
		$split ='&';
		if(empty($array)) return '?1=1';				
		foreach($array as $k=>$v){
			if(in_array($k,array('1','per_page'))) continue;
			$link .= $split.$k.'='.$v;				
		}
		return $link;
	}
	
	/**
	 * 加载thickbox
	 */
	function load_thickbox(){
		$this->fetch_css(array('thickbox'),'view',getRootUrl('css','backend'));
 		$this->fetch_js(array('thickbox'),'view',getRootUrl('js','backend'));
	}
	
	/**
	 * 关闭窗口
	 */
	function window_close(){
		echo "<script language='javascript' charset='utf-8'>window.close();</script>";
		exit();
	}
	
	/**
	 * thickbox关闭窗口
	 */
	function thickbox_close($msg){
		echo "<script language='javascript' charset='utf-8'>parent.tb_remove();parent.location.reload();</script>";
		exit();
	}
	

	/**
	 * load default language
	 * @param  string $type flag for front or backend
	 * @void return      
	 */
	 function load_language($type='backend'){
	 	$CI = & get_instance();				
	 	$CI->lang->load('item_'.$type, lang_get());	 
		$CI->tpl->assign('item_lang',$CI->lang->language);	 		 	
	 }
	
}

/**
 * javascript alert
 */
function myalert($msg){
	echo "<script language='javascript'>alert('".$msg."');</script>";
	exit();
}


function &get_cor_page()
{
	return cor_page::get_cor_page();
}





