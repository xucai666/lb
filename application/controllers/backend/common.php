<?php
/**
  * start page for webaccess
  *
  * PHP version 5
  *
  * @category  PHP
  * @package   Controller
  * @author    yehua <150672834@.com>
  * @copyright 2013 conqweal
  * @license   http://opensource.org/licenses/gpl-2.0.php GNU General Public License
  * @version   1.0$
  * @link      http://phpsysinfo.sourceforge.net
  */
class Common extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		//验证登陆
		$this->cor_auth->execute_auth();
		$this->load->model('Common_model');
		
	}	
	
	/**
	 * 设置语种 
	 */
	function lang_set(){	
		lang_set($this->input->get('lang'));
		$url = $this->input->get("url");	
		$url = $url?$url:$_SERVER['HTTP_REFERER'];	
		header("location:".$url."");
		exit();
	}
	
	
	/**
	 * 创建zip文件
	 */
	function create_zip(){
		$this->load->library('zip');
		$this->zip->read_dir(FCPATH);
		$this->zip->archive("site.zip");
		$this->zip->download(FCPATH."/site.zip");
		
	}
	
	/**
 	 * ajax更改状态
 	 * 1 表示名称，2字段名称，3字段值
 	 */
 	function ajax_change_state(){
 		try{			
			extract($_GET);
	 		//更新状态
	 		$to_update = array($change_key=>$change_val);
	 	 	$this->db->update($tb,$to_update,array($key=>$val));
	 		echo 1;
	 		exit();
	
		}catch(Exception $e){
			echo $e->getMessage();
		}
 		
 	}
 	
 	//save invoke
 	function ajax_invoke_save(){
 		try{

	 		$data = array(
		 			'main'=>array(
		 				'i_url'=>urldecode($this->input->post("i_url")),
		 				'i_content'=>mysql_real_escape_string($this->input->post("i_content"))
		 			)
	 		);
	 		$this->Common_model->ajax_invoke_save($data);
	 		echo 1;
	 		exit;

 		}catch(Exception $e){
 			echo $e->getMessage();
 		}
 		
 		
 	}

 	//get invoke
 	function ajax_invoke_get(){
 		$rs = $this->db->get_where('invoke',array('i_url'=>urldecode($this->input->post('i_url'))))->first_row();
 		echo stripcslashes($rs->i_content);
 		exit;		
 	}
	

	function action_autocomplete_admins(){
		$ls = $this->db->select('admin_id as id,admin_user as label',false)->from('admins');
		$term = $this->input->get('term');
		$term && $this->db->like('admin_user',$term,'after');
		$ls =  $this->db->get()->result_array();
		echo json_encode($ls);
		exit;
	}
 	


 	//picture id
 	function ajax_imgid_get(){
 		$rs = $this->db->get_where('module_images',"i_url like '%".urldecode($this->input->post('i_url'))."'")->first_row();
 		echo $rs->i_uid;
 		exit;	
 	}

 	function ajax_img_del(){
 		$url = urldecode($this->input->post('url'));
	 	$this->db->from('module_images')->where('i_url',$url);
	 	$this->db->delete();
		$f =  realpath(str_replace(base_url().'/', '', $url));
		@unlink($f);
		@unlink(str_replace('images', '_thumbs'.DIRECTORY_SEPARATOR.'Images', $f));
		exit;
 	}

 	//拼音
 	function ajax_pinyin(){
 		$this->load->helper('pinyin');
 		echo GetPinyin($this->input->post('str'));
 		exit;
 	}
 }