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
 class Engage extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		
	}
	
	/**
	 * 普通用户登录
	 */
	function index()
	{
		
	 	// add breadcrumbs
		$this->load->library('Breadcrumb');
		$this->breadcrumb->append_crumb('Home', '/');
		$this->breadcrumb->append_crumb('Engage', 'engage');
		$this->breadcrumb->output();	
 		$this->db->select("a.*",false)->from($this->init_db->table('engage').' as a ')
 		->where('a.eg_pos<>','\'\'',false)
 		
		->order_by("eg_id","desc");
		$data = $this->init_db->fetch_all();		
		

		$this->init_page->load_front_view("engage",$data);
			
		
	}	
	
	
	
	/**
	 * 普通用户登录
	 */
	function detail()
	{
		if($this->input->get_post("eg_id")){		
				$main = $this->db->select('*',false)->from('engage')->where('eg_id',$this->input->get_post('eg_id'))->get()->first_row('array');
				$edu_level = $this->init_cache->cache_fetch('edu_level');
		}
					
		
 	 	$data = array(
				
				'edu_level'=>$edu_level,
				'main'=>$main,
 			);
 		
 						
		$this->init_page->load_front_view("engage_detail",$data);		
		
	}	
	
	

	
	/**
	 * 普通用户登录
	 */
	function action_friend()
	{
	
					
		$this->init_page->load_front_view("engage_friend",$data);		
		
	}	
	
	
	//发送邮件
	
	
	function action_email(){
		try{
		

			$eg_id = $this->input->get_post('eg_id');
			if($eg_id){		
				
				$main = $this->db->select('*',false)->from('engage')->where('eg_id',$this->input->get_post('eg_id'))->get()->first_row('array');
				$edu_level = $this->init_cache->cache_fetch('edu_level');
				
				$email = $this->input->get_post("email");
				
				$this->load->library('email');

			    $this->email->clear();	
			    $this->email->from(config_item('email_from'));
			    $this->email->to($email);
		
			    $this->email->subject('你的朋友向您推荐职位'.$main['eg_pos']);
			    $sys_config = $this->init_cache->cache_fetch('sys_config','develop',lang_get());

			    $tpl_dir = config_item('template_dir').'/front/'.$sys_config['template'].'/'.lang_get().'/';
			
			    $email_temp = $this->tpl->fetch($tpl_dir.'email_template.htm');
			  
			  	$replace_flag = array(
			  		'eg_email'=>$main['eg_email'],
			  		'eg_pos'=>$main['eg_pos'],
			  		'eg_id'=>$main['eg_id'],
			  		'eg_date'=>$main['eg_date'],
			  		'eg_area'=>get_area_str($main['eg_area']),
			  		'eg_people'=>$main['eg_people'],
			  		'eg_edu'=>$edu_level[$main['eg_edu']],
			  		'eg_years'=>$main['eg_years'],
			  		'eg_eng'=>$main['eg_eng'],
			  		'eg_content'=>$main['eg_content'],			  	
			  		'eg_link'=>site_url('/engage/detail/?eg_id='.$eg_id),			  	
			  	);		  	
			  	
			  	//替换
			  	foreach($replace_flag as $k=>$v){
			  		$email_temp = str_replace("$k",$replace_flag[$k],$email_temp);
			  		
			  	}
			  
			    $this->email->message($email_temp);
			    if ( ! $this->email->send())
				{	
							
				   throw new Exception('邮件发送错误');
				}else{
					
					
				}
				
				
				
				$this->init_page->front_redirect("engage/",'邮件已经发送');		
				
		}
			
			
			
		}catch(Exception $e){
			
				$this->init_page->front_redirect("javascript:history.go(-1);",$e->getMessage());		
			
		}
		
		
		
	}
	
	
	//职位申请
	function action_apply(){	
		
		$this->init_page->fetch_js(array('jscript','common'),'view',$this->init_page->getRes('js','front'));
		$this->load->model('Engage_model');
		
		$eg_id = $this->input->get_post('eg_id');
		
		
		$engage = $this->db->select('*',false)->from('engage')->where('eg_id',$eg_id)->get()->first_row('array');
		
		$b_place = $this->Common_model->func_get_province();

		
		$data = array(
		
			'eg_id'=>$eg_id,
			'area'=> get_area($area_id), //地区
			'editor'=> $this->Common_model->editor(null,'apply_text'),
			'engage'=> $engage,
			'work_year'=>$this->init_cache->cache_fetch('work_year'),
			'sex'=>$this->init_cache->cache_fetch('sex'),
			'b_place'=>$b_place,
			
		);	
		
		
		$this->init_page->load_front_view("engage_apply",$data);		
		
	}
	
	
	//职位申请
	function action_apply2(){
		
		$eg_id = $this->input->get_post('eg_id');
		$data = array(
		
			'eg_id'=>$eg_id,
			'editor'=> $this->Engage_model->editor(null,'apply_text'),
		);		
		$this->init_page->load_front_view("engage_apply2",$data);		
		
	}
	
	
	
	
	
	//职位申请
	function action_apply_save(){		
		try{
			$this->load->model('Engage_model');
			$main = $this->input->get_post('main');
			$main['l_place'] = $this->Common_model->fetchPostArrea($this->input->get_post('area'));
			$data = array(			
				'eg_id'=>$eg_id,
				
				'main'=>array_merge($main,array('apply_date'=>date('Y-m-d'))),
							
				
			);	
			
			
			
			//图片上传 
		 		
		 	 $file_config = config_item('eg_files');
		 	
			 $root_path = $file_config['upload_path'].'/';
			 $file_upload_path_ext = date('Y-m-d')."/";
			 $file_upload_path = $root_path.$file_upload_path_ext.'/';
			 $file_config['upload_path']	  =  $file_upload_path;	
			 $this->Common_model->mkdirs($file_upload_path);
			 $this->load->library('upload', $file_config);		
			 if($_FILES['file1']['size']>0){
			
				if ( ! $this->upload->do_upload("file1")){	
					
						 throw new Exception('文件上传错误,注意上传格式');			
				  }else{
						 $files_info = $this->upload->data();
						 @unlink('../../'.$main['pro_pic']);
						$data['main']['apply_file'] = $file_upload_path.$files_info['file_name'];
				 }				 	
			 }			
			 			
			
			$this->init_db->save($data,$this->Engage_model->db_config_apply())	;			
			
			$this->init_page->front_redirect("d=front&c=engage&m=index",'应聘信息已经提交');	
			
		
		}catch(Exception $e){
			
				$this->init_page->front_redirect("javascript:history.go(-1);",$e->getMessage());		
			
		}
			
		
		
		
	}


	
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */