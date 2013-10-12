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
	
	/**
	 * 入库参数配置
	 */
	function db_config(){
		return array(
			'main'=>array(
				'table_name'=>$this->cor_db->table('advs'),
				'primary_key'=>'adv_id',
			),
			
			'detail'=>array(
				'table_name'=>$this->cor_db->table('adv_detail'),
				'primary_key'=>'detail_id',
			)
		);
	}
	
	
	
		

	
	
	/**
	 * 校验 
	 */
	function validator(){	 
		return  array(
		
			array(
 					"field"=>"main[adv_title]",	
 					"label"=>"分类",	
 					"rules"=>"required|max_length[100]",	
 			
 			),
 		
 			array(
 					"field"=>"main[adv_w]",	
 					"label"=>"广告宽度",	
 					"rules"=>"required|max_length[100]",	
 			
 			),
 		
 			
 			array(
 					"field"=>"main[adv_h]",	
 					"label"=>"广告高度",	
 					"rules"=>"required|max_length[100]",	
 			
 			),
 		
 			
 		
 		
 			
 			
 			);		 				 					
	 		 
	}
	 	
	 	
	 	
	 
	//查询列表
	function fetch_list(){	
			$rs = $this->db->select('a.*,count(b.detail_id) as pic_stat',false)
 			->from($this->cor_db->table('advs').' as a ')
 			->like('a.adv_title',$this->input->get('adv_title'))
 			->join($this->cor_db->table('adv_detail').' as b','a.adv_id=b.adv_id','left')
 			->group_by('a.adv_id')
 			->order_by('a.adv_id','desc');
 			return $this->cor_db->fetch_all();
	}	
	 	
	
	
	function do_upload($main){	
		$config = config_item('advs_files');
		$this->Common_model->mkdirs($config['upload_path']);
		$this->load->library('upload');						
		$detail = $this->input->post('detail');	
		$main = $this->input->post('main');	
		$file_s = $_FILES;
			
		//重整数组	
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

		//重新构造文件数组		
		$_FILES = $file_s_new;	
		foreach((array)$_FILES as $key=>$v){
			$index = $key;
			@unlink($this->input->post('adv_pic_'.$index));	
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
			'detail'=>$this->cor_form->post_to_set($detail),
		);
	}	
	
 	
 	
 	
//广告显示

function showadv($id,$type='backend'){	
	if(empty($id)) return false;
	$main = $this->cor_db->fetch_value( "SELECT * from ".$this->cor_db->table("advs")." where adv_id='".$id."'" );
	if($main['adv_type']==1){	
		//$this->cor_page->fetch_js('jquery.Slider','view',$this->cor_page->getRes('js',$type));
		$detail = $this->db->query( "SELECT * from ".$this->cor_db->table("adv_detail")." where adv_type=1 and adv_id='".$id."'" )->result_array();
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
	
	}else{	

		$detail = $this->db->query( "SELECT * from ".$this->cor_db->table("adv_detail")." where adv_type=2 and   adv_id='".$id."'" )->first_row("array");
		$reval  = js_url('jquery-1.9.1.min','front')."\n";
		$reval .= js_url('swfobject','front')."\n";
		$reval .= "<table><tr><td>";		
		$reval .= "\n";
		$reval .= '<div id="flash_'.$detail['detail_id'].'"></div><script>swfobject.embedSWF("'.base_url().$detail['adv_pic'].'", "flash_'.$detail['detail_id'].'", "'.$main[adv_w].'", "'.$main[adv_h].'", "9.0.0", "expressInstall.swf");</script>';
		$reval .= "</td>\n";
		$reval .= "</tr>\n";
		$reval .= "</table>\n";

	}
	
	return $reval;
	
}
 	
 	
	
	
}