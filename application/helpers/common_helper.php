<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Code Igniter
 *
 * An open source application development framework for PHP 4.3.2 or newer
 *
 * @package		CodeIgniter
 * @author		Rick Ellis
 * @copyright	Copyright (c) 2006, pMachine, Inc.
 * @license		http://www.codeignitor.com/user_guide/license.html 
 * @link		http://www.codeigniter.com
 * @since		Version 1.0
 * @filesource
 */
 
if(!function_exists('display_size')){
		
	function display_size($file_size){ 

	
		//文件大于等于1073741824时用g表示 

		if($file_size >= 1073741824) 

		{ 

		$file_size = round($file_size / 1073741824 * 100) / 100 . "G"; 

		} 

		//文件>= 1048576 && <1073741824 时用m表示 

		elseif($file_size >= 1048576) 

		{ 

		$file_size = round($file_size / 1048576 * 100) / 100 . "M"; 

		} 

		//文件>= 1024 && <1048576 时用k表示 

		elseif($file_size >= 1024) 

		{ 

		$file_size = round($file_size / 1024 * 100) / 100 . "K"; 

		} 

		//文件 <1024 时用b表示 

		else{ 

		$file_size = $file_size . "B"; 

		} 

		return $file_size; 

	} 


}





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


if(!function_exists('msubstr')){
	function msubstr($string, $start, $end,$tail='...') {
		$spac = mb_detect_encoding($string) == 'UTF-8' ? 3 : 2;
		$len = strlen($string);
		$loop = 0;
		$st = 0;
		
		//get start positon
		for ($i = 0; $i < $len; $i++) {
			$loop++;
			if ($loop > $start)
				break;

			if (ord(substr($string, $i, 1)) > 0xa0) {
				$st += $spac;
				$i += $spac -1;
			} else {
				$st += 1;
			}

		}

		$loop = 0;
		$ed = 0;
		
		//get end positon
		for ($i = $st; $i < $len; $i++) {
			$loop++;
			if ($loop > $end)
				break;

			if (ord(substr($string, $i, 1)) > 0xa0) {
				$ed += $spac;
				$i += $spac -1;
			} else {
				$ed += 1;
			}

		}

		$str = substr($string, $st, $ed);

		if ($ed + $st < $len)
			$str .= $tail;
		return $str;
	}
}


/**
 * 截取中文，按中文占位返回
 * @param [type] $sourcestr   [description]
 * @param [type] $startlength [description]
 * @param [type] $cutlength   [description]
 * @param string $tail        [description]
 */
function FSubstr($sourcestr, $startlength, $cutlength,$tail='...') 
{ 
   $returnstr=''; 
   $i=0; 
   $n=0; 
   $str_length=strlen($sourcestr);            //字符串的字节数 
   while (($n<$cutlength) and ($i<=$str_length))
   { 
      $temp_str=substr($sourcestr,$i,1); 
      $ascnum=Ord($temp_str);               //得到字符串中第$i位字符的ascii码 
      if ($ascnum>=224) {                  //如果ASCII位高与224，
         $returnstr=$returnstr.substr($sourcestr,$i,3);  //根据UTF-8编码规范，将3个连续的字符计为单个字符         
         $i=$i+3;                           //实际Byte计为3
         $n++;                             //字串长度计1
      } elseif ($ascnum>=192){              //如果ASCII位高与192，
         $returnstr=$returnstr.substr($sourcestr,$i,2);  //根据UTF-8编码规范，将2个连续的字符计为单个字符 
         $i=$i+2;                           //实际Byte计为2
         $n++;                            //字串长度计1
      } elseif ($ascnum>=65 && $ascnum<=90){       //如果是大写字母，
         $returnstr=$returnstr.substr($sourcestr,$i,1); 
         $i=$i+1;                           //实际的Byte数仍计1个
         $n++;                            //但考虑整体美观，大写字母计成一个高位字符
      } else {                              //其他情况下，包括小写字母和半角标点符号，
         $returnstr=$returnstr.substr($sourcestr,$i,1); 
         $i=$i+1;                           //实际的Byte数计1个
         $n=$n+0.5;                        //小写字母和半角标点等与半个高位字符宽...
      } 
      
   if ($n <= $startlength){
    $returnstr = '';
    continue;
   }
    }
    
    if ($str_length>$cutlength){
       $returnstr = $returnstr . $tail;          //超过长度时在尾处加上省略号
    }
    return $returnstr; 
}


/**
 * 混淆防采集
 * @param [type] $body [description]
 */
function RndString($body)
{
  //最大间隔距离(如果在检测不到p标记的情况下，加入混淆字串的最大间隔距离)
  $maxpos = 1024;
  //font 的字体颜色
  $fontColor = "#FFFFFF";
  //div span p 标记的随机样式
  $st1 = chr(mt_rand(ord('A'),ord('Z'))).chr(mt_rand(ord('a'),ord('z'))).chr(mt_rand(ord('a'),ord('z'))).mt_rand(100,999);
  $st2 = chr(mt_rand(ord('A'),ord('Z'))).chr(mt_rand(ord('a'),ord('z'))).chr(mt_rand(ord('a'),ord('z'))).mt_rand(100,999);
  $st3 = chr(mt_rand(ord('A'),ord('Z'))).chr(mt_rand(ord('a'),ord('z'))).chr(mt_rand(ord('a'),ord('z'))).mt_rand(100,999);
  $st4 = chr(mt_rand(ord('A'),ord('Z'))).chr(mt_rand(ord('a'),ord('z'))).chr(mt_rand(ord('a'),ord('z'))).mt_rand(100,999);
  $rndstyle[1]['value'] = ".{$st1} { display:none; }";
  $rndstyle[1]['name'] = $st1;
  $rndstyle[2]['value'] = ".{$st2} { display:none; }";
  $rndstyle[2]['name'] = $st2;
  $rndstyle[3]['value'] = ".{$st3} { display:none; }";
  $rndstyle[3]['name'] = $st3;
  $rndstyle[4]['value'] = ".{$st4} { display:none; }";
  $rndstyle[4]['name'] = $st4;
  $mdd = mt_rand(1,4);
  //以后内容如果你不懂其含义，请不要改动
  //---------------------------------------------------
  $rndstyleValue = $rndstyle[$mdd]['value'];
  $rndstyleName = $rndstyle[$mdd]['name'];
  $reString = "<style> $rndstyleValue </style>\r\n";
  //附机标记
  $rndem[1] = 'font';
  $rndem[2] = 'div';
  $rndem[3] = 'span';
  $rndem[4] = 'p';
  //读取字符串数据
  $fp = fopen(realpath(dirname(__FILE__).'/../resources/downmix.php'),'r');
  $start = 0;
  $totalitem = 0;
  while(!feof($fp)){
	   $v = trim(fgets($fp,128));
	   if($start==1){
		    if(ereg("#end#",$v)) break;
		    if($v!=""){ $totalitem++; $rndstring[$totalitem] = ereg_replace("#,","",$v); }
	   }
	   if(ereg("#start#",$v)){ $start = 1; }
  }
  fclose($fp);
  //处理要防采集的字段
  $bodylen = strlen($body) - 1;
  $prepos = 0;
  for($i=0;$i<=$bodylen;$i++){
  	if($i+2 >= $bodylen || $i<50) $reString .= $body[$i];
  	else{
  	  @$ntag = strtolower($body[$i].$body[$i+1].$body[$i+2]);
  	  if($ntag=='</p' || ($ntag=='<br' && $i-$prepos>$maxpos) ){
  	  	 $dd = mt_rand(1,4);
  	  	 $emname = $rndem[$dd];
  	  	 $dd = mt_rand(1,$totalitem);
  	  	 $rnstr = $rndstring[$dd];
  	  	 if($emname!='font') $rnstr = " <$emname class='$rndstyleName'>$rnstr</$emname> ";
  	  	 else  $rnstr = " <font color='$fontColor'>$rnstr</font> ";
  	  	 $reString .= $rnstr.$body[$i];
  	  	 $prepos = $i;
  	  }
  	  else $reString .= $body[$i];
    }
  }
  unset($body);
  return $reString;
}//函数结束

?>