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
 class Cor_cache{
 	
 	
 	private static $instance;
 	function __construct(){
 		self::$instance =& $this;
 		

 	}
 	
 	public static function &get_cor_cache(){ 	
 		return self::$instance;
 	}
 		
 	
 	/**
 	 * 生成json缓存文件
 	 */
 	function cache_create_for_combox($config){ 
 		if(empty($config)){ 			
 			show_error("参数配置不正确");
 		}	 		
 		extract($config);	
 		$db = &get_cor_db(); 		
 		$dd = $db->from($table_name)
 		->select($fields)->get()->result_array(); 	
 		$this->cache_create($dd,$cache_name);
 		
 	}
 	
 	
 	
 	/**
 	 * 生成缓存文件
 	 */
 	function cache_create_for_db($config){
 		$db = &get_cor_db(); 
 		if(empty($config)){ 			
 			show_error("参数配置不正确");
 		}	 		
 		extract($config);	 		
 		$dd_temp = $db->from($table_name)
 		->select($fields)->get()->result_array(); 	
 		cache_create($dd_temp,$cache_name);
 	}
 	
 	
 	/**
 	 * 生成缓存文件
 	 */
 	function cache_create($array,$cache_name,$file_ext='.php'){ 
 		if(empty($array)){ 			
 			return null;
 		}	
 		$this->cache_delete($cache_name);
 		$ci = & get_instance();	
 		$lang = lang_get(); 	 		
 		$handle = fopen(FCPATH.FOLDER_CACHE.'/'.$lang.'/'.$cache_name.$file_ext,'w');
 		if(!$handle){
 			show_error("不能打开文件，路径".FOLDER_CACHE_STATIC);
 		}
 		$cache_str = '';
 		$split_str = ''; 		
 		if(!fwrite($handle,"<?php return ".var_export($array,true).";?>")){
 			show_error("无法写入文件，路径".FOLDER_CACHE_STATIC);
 		}	
 		
 	}
 	
 	
 	
 	
 	
 	/**
 	 * 取字典
 	 */
 	function cache_fetch($name,$index=null,$lang=null,$file_ext='.php'){
 		try{
 			$ci = & get_instance();	
	 		$lang = $lang?$lang:lang_get(); 
	 		$file = FCPATH.FOLDER_CACHE.'/'.$lang.'/'.$name.$file_ext;
	 		if(!file_exists($file))  throw new Exception($name.'缓存文件已丢失，请创建！');
	 		$cache_return = @require($file);
	 		
	 		return $index?$cache_return[$index]:$cache_return;
 			
 		}catch(Exception $e){
 			show_error($e->getMessage());
 		}
 	}
 	
 	
 	
 		
 	/**
 	 * 判断catch是否存在
 	 */
 	function cache_exists($name,$lang='zh',$file_ext='.php'){
 			$ci = & get_instance();	
	 		$lang = lang_get(); 
	 		$file = FCPATH.FOLDER_CACHE.'/'.$lang.'/'.$name.$file_ext;
	 		return file_exists($file) ? true:false;
 	}
 	
 	
 	function cache_delete($cache_name,$file_ext='.php'){
 		$ci = & get_instance();	 
 		$lang = lang_get(); 
 		@unlink(FCPATH.FOLDER_CACHE.'/'.$lang.'/'.$cache_name.$file_ext);
 	}	
 	
 	 /* 判断catch是否存在
 	 */
 	function cache_info($name,$lang='zh',$file_ext='.php'){
 			$ci = & get_instance();	
	 		$lang = lang_get(); 
	 		$f_info = null;
	 		$file = FCPATH.FOLDER_CACHE.'/'.$lang.'/'.$name.$file_ext;
	 		if(file_exists($file)){
	 			$h = fopen($file,'r');
	 			$f_info = fstat($h);
	 			fclose($h);
	 			
	 		}
	 		return $f_info;
 	}
 	
 	/**
 	 * 清除页面缓存
 	 */
 	function clear_pages(){
 		 $config = &get_config();
 		 $path = $config['cache_path'];
 		 $this->delFileUnderDir($path);
 	}
 	
 	/**
 	 * 递归删除目录
 	 */
 	function delFileUnderDir( $dirName)  
	{  
		if ( $handle = opendir( "$dirName" ) ) {  
		   while ( false !== ( $item = readdir( $handle ) ) ) {  
			   if ( $item != "." && $item != ".." ) {  
				   if ( is_dir( "$dirName/$item" ) ) {  
				         $this->delFileUnderDir( "$dirName/$item" );  
				   } else {  
				   		unlink( "$dirName/$item" );
				   }  
			   }  
		   }  
		   closedir( $handle );  
		}  
	}  


	function make_dir($pathname, $mode = null) {  
	    is_dir($pathname) or mkdir($pathname, $mode, true);  
	    return realpath($pathname);  
	}  
	 	
 	
 		
 }
  
 function &get_cor_cache(){	
	return Cor_cache::get_cor_cache();
} 
	
?>
