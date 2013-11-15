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
class Advs_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function db_config(){
		return array(
			'main'=>array(
				'table_name'=>$this->init_db->table('advs'),
				'primary_key'=>'adv_id',
			),
			
			'detail'=>array(
				'table_name'=>$this->init_db->table('adv_detail'),
				'primary_key'=>'detail_id',
			)
		);
	}
	
	
	
		

	

	function validator(){	 
		return  array(
		
			array(
 					"field"=>"main[adv_title]",	
 					"label"=>"鍒嗙被",	
 					"rules"=>"required|max_length[100]",	
 			
 			),
 		
 			array(
 					"field"=>"main[adv_w]",	
 					"label"=>"骞垮憡瀹藉害",	
 					"rules"=>"required|max_length[100]",	
 			
 			),
 		
 			
 			array(
 					"field"=>"main[adv_h]",	
 					"label"=>"骞垮憡楂樺害",	
 					"rules"=>"required|max_length[100]",	
 			
 			),
 		
 			
 		
 		
 			
 			
 			);		 				 					
	 		 
	}
	 	
	 	
	 	
	 

	function fetch_list(){	
			$rs = $this->db->select('a.*,count(b.detail_id) as pic_stat',false)
 			->from($this->init_db->table('advs').' as a ')
 			->like('a.adv_title',$this->input->get_post('adv_title'))
 			->join($this->init_db->table('adv_detail').' as b','a.adv_id=b.adv_id','left')
 			->group_by('a.adv_id')
 			->order_by('a.adv_id','desc');
 			return $this->init_db->fetch_all();
	}	
	 	
	
	
	function do_upload($main){	
		$config = config_item('advs_files');
		$this->Common_model->mkdirs($config['upload_path']);
		$this->load->library('upload');						
		$detail = $this->input->get_post('detail');	
		$main = $this->input->get_post('main');	
		$file_s = $_FILES;
			
			
		foreach($file_s['detail']['name']['img'] as $k=>$v){
			if($file_s['detail']['size']['img'][$k]==0) continue;
			$file_s_new[$k] = array(
				'name'=>$v,
				'type'=>$file_s['detail']['type']['img'][$k],
				'tmp_name'=>$file_s['detail']['tmp_name']['img'][$k],
				'error'=>$file_s['detail']['error']['img'][$k],
				'size'=>$file_s['detail']['size']['img'][$k],							
			);		
				
		}	

		
		$_FILES = $file_s_new;	
		foreach((array)$_FILES as $key=>$v){
			$index = $key;
			@unlink($this->input->get_post('adv_pic_'.$index));	
			$this->upload->initialize($config);		
			if(!$this->upload->do_upload($key)){	

				$error = $this->upload->display_errors();
				if("<p>404</p>"!=$error)	throw new Exception($error);				
			}else{
			
				$rs  =  $this->upload->data();			
				$detail['adv_pic'][$index] =  str_replace(str_replace("\\","/",FCPATH),'',$rs['full_path']);
			}				
			
		}	
		
		return array(
			'main'=>$main,
			'detail'=>$this->init_form->post_to_set($detail),
		);
	}	
	
 	
 	
 	
//show adv

function showadv($id,$type='backend'){	
	if(empty($id)) return false;
	$main = self::adv_main($id);
	return call_user_func(array($this,"adv_type".$main['adv_type']),$id);
	
	
}

function  adv_main($id){
	return   $this->init_db->fetchArray("SELECT * from ".$this->init_db->table("advs")." where adv_id=?",array($id));
	
}
//轮显广告
function adv_type1($id){
	$main = self::adv_main($id);
	$detail = $this->db->query( "SELECT * from ".$this->init_db->table("adv_detail")." where adv_type=1 and adv_id='".$id."'" )->result_array();
		$reval = js_url('jquery-1.9.1.min','front')."\n";
		$reval .= js_url('jquery.Slider','front')."\n";
		$reval  .= "<table   ><tr><td >";
		$reval .= "\n";
		$reval .= "<style type=\"text/css\"> \n";
		$reval .= "<!--\n";
		$reval .= ".Slider1_$id {\n";
		$reval .= "	position:relative;\n";
		$reval .= "	width:".$main['adv_w']."px;\n";
		$reval .= "	height:".$main['adv_h']."px;\n";
		$reval .= "}\n";
		$reval .= ".Slider1_$id ul {\n";
		$reval .= "	position:relative;\n";
		$reval .= "	list-style:none;\n";
		$reval .= "	margin:0;\n";
		$reval .= "	padding:0;\n";
		$reval .= "}\n";
		$reval .= ".Slider1_$id ul li {\n";
		$reval .= "	position:absolute;left:0;\n";
		$reval .= "	display:none;\n";
		$reval .= "}\n";
		$reval .= ".Slider1_$id ul li.selected {\n";
		$reval .= "	display:block;\n";
		$reval .= "}\n";
		$reval .= ".Slider1_$id dl {\n";
		$reval .= "	position:absolute;\n";
		$reval .= "	bottom:4px;\n";
		$reval .= "	right:4px;\n";
		$reval .= "	z-index:11;\n";
		$reval .= "}\n";
		$reval .= ".Slider1_$id dl dd{\n";
		$reval .= "	float:left;\n";
		$reval .= "	margin:0 0 0 2px;\n";
		$reval .= "	width:15px;\n";
		$reval .= "	height:15px;\n";
		$reval .= "	cursor:pointer;\n";
		$reval .= "	font:Arial;\n";
		$reval .= "	background-color:#FFFFFF;\n";
		$reval .= "	color:#9F9F9F;\n";
		$reval .= "	font-size:12px;\n";
		$reval .= "	text-align:center;\n";
		$reval .= "	line-height:15px;\n";
		$reval .= "	border:1px solid #DCDCDC;\n";
		$reval .= "}\n";
		$reval .= ".Slider1_$id dl dd.selected {\n";
		$reval .= "	background-color:#C00100;\n";
		$reval .= "	border:1px solid #A00100;\n";
		$reval .= "	color:white;\n";
		$reval .= "	font-size:13px;\n";
		$reval .= "	font-weight:bold;\n";
		$reval .= "}\n";
		$reval .= ".Slider1_$id ul img {border:0;}\n";
		$reval .= "\n";
		$reval .= "\n";
		$reval .= "-->\n";
		$reval .= "</style> \n";
		
		$reval .= "\n";
		$reval .= "<div class=\"Slider1_$id\" id=\"Slide1_$id\"> \n";
		$reval .= "	<ul style='width:".$main['adv_w']."px;height:".$main['adv_h']."px' > \n";
		$reval .= "      \n";
		$reval .= "         \n";
		
		foreach($detail as $k=>$v):
		
		$reval .= "		<li       \n";
		if($k==0){
			$reval .= "		class=\"selected\" >      \n";
		}else{
			
			$reval .= "		>      \n";
		}
		$reval .= "			<a   href=\"".$v['adv_url']."\" target=\"_blank\" title=\"".$v['adv_title']."\">	<img src=\"".base_url().$v['adv_pic']."\" width=\"".$main['adv_w']."\" height=\"".$main['adv_h']."\" class=\"myimg\" /></a> \n";
		$reval .= "		</li> \n";
		$reval .= "       \n";
		$reval .= "	  \n";
		$reval .= "         \n";

	
	
	endforeach;

	
	
	$reval .= "			\n";
	
	$reval .= "	</ul></div> \n";
	$reval .= "\n";

	$reval .= "	<script language=\"javascript\"> \n";
	$reval .= "        $(function() {\n";
	$reval .= "            $('#Slide1_$id').Slider({width: ".$main['adv_w'].",height: ".$main['adv_h']."});         \n";
	$reval .= "        });\n";
	$reval .= "    </script> \n";
	$reval .= "</td> \n";
	$reval .= "</tr> \n";
	$reval .= "</table> \n";

	return $reval;
}

/**
 * FLASH广告
 * @return [type] [description]
 */
function adv_type2($id){
		$main = $this->adv_main($id);
		$detail = $this->db->query( "SELECT * from ".$this->init_db->table("adv_detail")." where adv_type=2 and   adv_id='".$id."'" )->first_row("array");
		$reval  = js_url('jquery-1.9.1.min','front')."\n";
		$reval .= js_url('swfobject','front')."\n";
		$reval .= "<table><tr><td>";		
		$reval .= "\n";
		$reval .= '<div id="flash_'.$detail['detail_id'].'"></div><script>swfobject.embedSWF("'.base_url().$detail['adv_pic'].'", "flash_'.$detail['detail_id'].'", "'.$main[adv_w].'", "'.$main[adv_h].'", "9.0.0", "expressInstall.swf");</script>';
		$reval .= "</td>\n";
		$reval .= "</tr>\n";
		$reval .= "</table>\n";
		return $reval;
}

//对联广告
function adv_type3($id){
	$main = $this->adv_main($id);
	$detail = $this->init_db->fetchAll( "SELECT * from ".$this->init_db->table("adv_detail")." where adv_type=3 and   adv_id='".$id."'" );
	list($lft,$rt) = $detail;
	$reval  = "";
	$reval  = js_url('jquery-1.9.1.min','front')."\n";
	$reval .= "<script type=\"text/javascript\">\n";
	$reval .= "$(document).ready(function(){\n";
	$reval .= "	var duilian = $(\"div.duilian\");\n";
	$reval .= "	var duilian_close = $(\"a.duilian_close\");\n";
	$reval .= "	\n";
	$reval .= "	var window_w = $(window).width();\n";
	$reval .= "	if(window_w>1000){duilian.show();}\n";
	$reval .= "	$(window).scroll(function(){\n";
	$reval .= "		var scrollTop = $(window).scrollTop();\n";
	$reval .= "		duilian.stop().animate({top:scrollTop+130});\n";
	$reval .= "	});\n";
	$reval .= "	duilian_close.click(function(){\n";
	$reval .= "		$(this).parent().hide();\n";
	$reval .= "		return false;\n";
	$reval .= "	});\n";
	$reval .= "	\n";
	$reval .= "	\n";
	$reval .= "});\n";
	$reval .= "</script>\n";
	$reval .= "<style>\n";
	$reval .= "/*下面是对联广告的css代码*/\n";
	$reval .= ".duilian{top:130px;position:absolute; width:102px; overflow:hidden; display:none;}\n";
	$reval .= ".duilian_left{ left:6px;}\n";
	$reval .= ".duilian_right{right:6px;}\n";
	$reval .= ".duilian_con{border:#CCC solid 1px; width:100px; height:300px; overflow:hidden;}\n";
	$reval .= ".duilian_close{ width:100%; height:24px; line-height:24px; text-align:center; display:block; font-size:13px; color:#555555; text-decoration:none;}\n";
	$reval .= "</style>\n";
	$reval .= "<div class=\"duilian duilian_left\">\n";
	$reval .= "	<div class=\"duilian_con\">			<a   href=\"".$v['adv_url']."\" target=\"_blank\" title=\"".$v['adv_title']."\">	<img src=\"".base_url().$lft['adv_pic']."\" width=\"".$main['adv_w']."\" height=\"".$main['adv_h']."\" class=\"myimg\" /></a> \n</div>\n";
	$reval .= "    <a href=\"#\" class=\"duilian_close\">X关闭</a>\n";
	$reval .= "</div>\n";
	if($rt){
		$reval .= "<div class=\"duilian duilian_right\">\n";
		$reval .= "	<div class=\"duilian_con\">			<a   href=\"".$v['adv_url']."\" target=\"_blank\" title=\"".$v['adv_title']."\">	<img src=\"".base_url().$rt['adv_pic']."\" width=\"".$main['adv_w']."\" height=\"".$main['adv_h']."\" class=\"myimg\" /></a> \n</div>\n";
		$reval .= "    <a href=\"#\" class=\"duilian_close\">X关闭</a>\n";
		$reval .= "</div>\n";
	}
	return $reval;
	
}
 
 /**
  * [adv_types description]
  * @return [type] [description]
  */
 function adv_types($key=null){
 	$types =  array(
 		'1'=>'轮显广告',
 		'2'=>'FLASH广告',
 		'3'=>'对联广告',
 	);
 	return $key ? $types[$key]:$types;
 }	
 	
	
	
}