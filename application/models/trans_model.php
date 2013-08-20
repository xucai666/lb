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
class Trans_model extends CI_Model{
	function __construct(){
		parent::__construct();
		  
	}

function get_translate_fields(){	
	return array('lang_val');

}	


function detail($id,$ke=null){
	$cf = array(
		'table_name'=>'lang',
		'primary_id'=>'lang_id',
		'primary_val'=>$id,
	);
	return $this->cor_db->fetch_one($cf,$key);
}



/**
 * 
 * 标准翻译产品，不支持长内容
 * 
 * **/
function batch_trans($lang_id, $run) {
		$this->single_trans($lang_id,$run);

	
		echo "next_trans();";
	
}


/**
 * 
 * 单个产品翻译 ,支持长内容，牺牲效率，单个翻译用
 * 
**/
function single_trans($lang_id,$run) {
	@header("content-type:text/html;charset=utf-8");
	try{
		$tag = "<456789>";
		$tag_close = "</456789>";
		$rs = $this->detail($lang_id);
		if($rs['is_trans']==1){
			echo $this->msg($run,'yes');
			return false;
		} 
	    foreach($rs as $key=>$v){
	    	if(in_array($key, $this->get_translate_fields())){
	    		$inputs[$key] = $v;
	    	}
	    }
		$out_string = $this->bingtrans(implode($tag,$inputs),$this->get_lang_code('zh','alias'),$this->get_lang_code($rs['lang_type'],'alias'));
		$outputs  = explode($tag,str_replace($tag_close,'',$out_string));
		foreach($outputs as $v){
			if(empty($v)) throw new Exception("err1", 1);
		}
		if(count($inputs)!= count($outputs)){
			throw new Exception("err2", 1);
		}
		$updates = array_merge(array_combine(array_keys($inputs), $outputs),array('is_trans'=>1));

		$this->db->where('lang_id',$lang_id);
		$this->db->update('lang',$updates);
		echo $this->msg($run,'yes');
	}catch(Exception $e){
		echo $this->msg($run,'no',$e->getMessage());
	}
}


function msg($run,$type,$msg=null){
	return  ("document.getElementById('trans_status_" . $run . "').innerHTML = '<img src=\"".getRootUrl('img','backend')."\/".$type.".gif\"  title=\"" . $msg . "\" />';");

}

 function bingtrans($string, $from = '', $to = 'en', $key = '867A7FD35B9E90629C594E45909078C2CA6F7F52') {
    $from = $from != "-" ? $from : "";
    $opts['http'] = array('method' => "POST", 'content' => $string, 'timeout'=>60,);
    $context = stream_context_create($opts);
    $url = "http://api.microsofttranslator.com/V1/Http.svc/Translate?appId=$key&from=$from&to=$to&contentType=text%2Fhtml";
    $html = preg_replace('/^(\xef\xbb\xbf)/', '', @file_get_contents($url,false,$context));

    if (!empty($html)) {
        return $html;
    }
}


/**
 * 语言种类，别名和简码转换
 * @param  [type] $lang [description]
 * @param  string $type name=>将别名转成代码,code=>从代码找到别名
 * @return [type]       [description]
 */
function get_lang_code($lang=null,$type='alias'){
	$ar =  array(
		'en'=>'en',
		'zh-CHS'=>'zh',
	);
	if($lang && $type=='alias'){
		return array_search($lang,$ar);
		
	}elseif($lang && $type=='code'){
		return $ar[$lang];
	}elseif(empty($lang) && $type=='alias'){
		return array_flip($ar);
	}else{
		return $ar;
	}	
}





	
}
?>