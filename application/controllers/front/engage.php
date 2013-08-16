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
		//启用缓存显示,key is action name,val is view name
		$act2view = array(
			'index'=>'engage',
			'detail'=>'engage_detail',
		);
		$this->mypage->view_cache_all($act2view);
		
	}
	
	/**
	 * 普通用户登录
	 */
	function index()
	{
		
	 		
 		$this->db->select("a.*",false)->from($this->mydb->table('engage').' as a ')
 		->where('a.eg_pos<>','\'\'',false)
 		
		->order_by("eg_id","desc");
		$data = $this->mydb->fetch_all();		
		

		$this->mypage->load_front_view("engage",$data);
			
		
	}	
	
	
	
	/**
	 * 普通用户登录
	 */
	function detail()
	{
		if($this->input->get("eg_id")){		
				$sql_arr = array(
					'table_name'=>$this->mydb->table('engage'),
					'fields'=>'*',
					'primary_id'=>'eg_id',
					'primary_val'=>$this->input->get("eg_id"),
				);	
				$main = $this->mydb->fetch_one($sql_arr);
				$edu_level = $this->mycache->cache_fetch('edu_level');
		}
					
		
 	 	$data = array(
				
				'edu_level'=>$edu_level,
				'main'=>$main,
 			);
 		
 						
		$this->mypage->load_front_view("engage_detail",$data);		
		
	}	
	
	

	
	/**
	 * 普通用户登录
	 */
	function action_friend()
	{
	
					
		$this->mypage->load_front_view("engage_friend",$data);		
		
	}	
	
	
	//发送邮件
	
	
	function action_email(){
		try{
		

			$eg_id = $this->input->get('eg_id');
			if($eg_id){		
				$sql_arr = array(
					'table_name'=>$this->mydb->table('engage'),
					'fields'=>'*',
					'primary_id'=>'eg_id',
					'primary_val'=>$this->input->get("eg_id"),
				);	
				$main = $this->mydb->fetch_one($sql_arr);
				$edu_level = $this->mycache->cache_fetch('edu_level');
				
				$email = $this->input->post("email");
				
				$this->load->library('email');

			    $this->email->clear();	
			    $this->email->from($this->config->item('email_from'));
			    $this->email->to($email);
		
			    $this->email->subject('你的朋友向您推荐职位'.$main['eg_pos']);
			    $sys_config = $this->mycache->cache_fetch('sys_config','develop',$this->Common_model->lang_get());

			    $tpl_dir = $config['template_dir'].'front/'.$sys_config['template'].'/'.$this->Common_model->lang_get().'/';
			 
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
			  		'eg_link'=>site_url('/front/engage/detail/?eg_id='.$eg_id),			  	
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
				
				
				
				$this->mypage->front_redirect("front/engage/",'邮件已经发送');		
				
		}
			
			
			
		}catch(Exception $e){
			
				$this->mypage->front_redirect("javascript:history.go(-1);",$e->getMessage());		
			
		}
		
		
		
	}
	
	
	//职位申请
	function action_apply(){	
		
		$this->mypage->fetch_js(array('jscript','common'),'view',$this->mypage->getRes('js','front'));
		$this->load->model('Engage_model');
		
		$eg_id = $this->input->get('eg_id');
		
		$sql_arr = array(
					'table_name'=>$this->mydb->table('engage'),
					'fields'=>'eg_pos',
					'primary_id'=>'eg_id',
					'primary_val'=>$eg_id,
		);	
		$engage = $this->mydb->fetch_one($sql_arr);
		
		$b_place = $this->Common_model->func_get_province();
	
		
		$data = array(
		
			'eg_id'=>$eg_id,
			'area'=> get_area($area_id), //地区
			'editor'=> $this->Engage_model->editor(null,'apply_text'),
			'engage'=> $engage,
			'work_year'=>$this->mycache->cache_fetch('work_year'),
			'sex'=>$this->mycache->cache_fetch('sex'),
			'b_place'=>$b_place,
			
		);	
		
		
		$this->mypage->load_front_view("engage_apply",$data);		
		
	}
	
	
	//职位申请
	function action_apply2(){
		
		$eg_id = $this->input->get('eg_id');
		$data = array(
		
			'eg_id'=>$eg_id,
			'editor'=> $this->Engage_model->editor(null,'apply_text'),
		);		
		$this->mypage->load_front_view("engage_apply2",$data);		
		
	}
	
	
	
	
	
	//职位申请
	function action_apply_save(){		
		try{
			$this->load->model('Engage_model');
			$main = $this->input->post('main');
			$main['l_place'] = $this->Common_model->fetchPostArrea($this->input->post('area'));
			$data = array(			
				'eg_id'=>$eg_id,
				
				'main'=>array_merge($main,array('apply_date'=>date('Y-m-d'))),
							
				
			);	
			
			
			
			//图片上传 
		 		
		 	 $file_config = $this->config->item('eg_files');
		 	
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
			 			
			
			$this->mydb->save($data,$this->Engage_model->db_config_apply())	;			
			
			$this->mypage->front_redirect("front/engage/",'应聘信息已经提交');	
			
		
		}catch(Exception $e){
			
				$this->mypage->front_redirect("javascript:history.go(-1);",$e->getMessage());		
			
		}
			
		
		
		
	}


	
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */