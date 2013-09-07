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

	
		//�ļ����ڵ���1073741824ʱ��g��ʾ 

		if($file_size >= 1073741824) 

		{ 

		$file_size = round($file_size / 1073741824 * 100) / 100 . "G"; 

		} 

		//�ļ�>= 1048576 && <1073741824 ʱ��m��ʾ 

		elseif($file_size >= 1048576) 

		{ 

		$file_size = round($file_size / 1048576 * 100) / 100 . "M"; 

		} 

		//�ļ�>= 1024 && <1048576 ʱ��k��ʾ 

		elseif($file_size >= 1024) 

		{ 

		$file_size = round($file_size / 1024 * 100) / 100 . "K"; 

		} 

		//�ļ� <1024 ʱ��b��ʾ 

		else{ 

		$file_size = $file_size . "B"; 

		} 

		return $file_size; 

	} 


}





/**
	 * �˵�ѡ��
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
	
	
	
//�˵�����	
	
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
		$html .= "<select name='".$select_name."' onchange='region(this)'><option value='0'>��ѡ��</option>";
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
 * ��ȡ���ģ�������ռλ����
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
   $str_length=strlen($sourcestr);            //�ַ������ֽ��� 
   while (($n<$cutlength) and ($i<=$str_length))
   { 
      $temp_str=substr($sourcestr,$i,1); 
      $ascnum=Ord($temp_str);               //�õ��ַ����е�$iλ�ַ���ascii�� 
      if ($ascnum>=224) {                  //���ASCIIλ����224��
         $returnstr=$returnstr.substr($sourcestr,$i,3);  //����UTF-8����淶����3���������ַ���Ϊ�����ַ�         
         $i=$i+3;                           //ʵ��Byte��Ϊ3
         $n++;                             //�ִ����ȼ�1
      } elseif ($ascnum>=192){              //���ASCIIλ����192��
         $returnstr=$returnstr.substr($sourcestr,$i,2);  //����UTF-8����淶����2���������ַ���Ϊ�����ַ� 
         $i=$i+2;                           //ʵ��Byte��Ϊ2
         $n++;                            //�ִ����ȼ�1
      } elseif ($ascnum>=65 && $ascnum<=90){       //����Ǵ�д��ĸ��
         $returnstr=$returnstr.substr($sourcestr,$i,1); 
         $i=$i+1;                           //ʵ�ʵ�Byte���Լ�1��
         $n++;                            //�������������ۣ���д��ĸ�Ƴ�һ����λ�ַ�
      } else {                              //��������£�����Сд��ĸ�Ͱ�Ǳ����ţ�
         $returnstr=$returnstr.substr($sourcestr,$i,1); 
         $i=$i+1;                           //ʵ�ʵ�Byte����1��
         $n=$n+0.5;                        //Сд��ĸ�Ͱ�Ǳ���������λ�ַ���...
      } 
      
   if ($n <= $startlength){
    $returnstr = '';
    continue;
   }
    }
    
    if ($str_length>$cutlength){
       $returnstr = $returnstr . $tail;          //��������ʱ��β������ʡ�Ժ�
    }
    return $returnstr; 
}


/**
 * �������ɼ�
 * @param [type] $body [description]
 */
function RndString($body)
{
  //���������(����ڼ�ⲻ��p��ǵ�����£���������ִ������������)
  $maxpos = 1024;
  //font ��������ɫ
  $fontColor = "#FFFFFF";
  //div span p ��ǵ������ʽ
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
  //�Ժ���������㲻���京�壬�벻Ҫ�Ķ�
  //---------------------------------------------------
  $rndstyleValue = $rndstyle[$mdd]['value'];
  $rndstyleName = $rndstyle[$mdd]['name'];
  $reString = "<style> $rndstyleValue </style>\r\n";
  //�������
  $rndem[1] = 'font';
  $rndem[2] = 'div';
  $rndem[3] = 'span';
  $rndem[4] = 'p';
  //��ȡ�ַ�������
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
  //����Ҫ���ɼ����ֶ�
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
}//��������

?>