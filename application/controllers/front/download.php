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
class Download extends CI_Controller {

	function __construct()
	{
		parent::__construct();	
		$this->load->model('Download_model');
		$this->im = $this->Download_model;
	
	}
	
	/**
	 * 普通用户登录
	 */
	function index()
	{
		$config = array(
 				'table_name'=>$this->mydb->table('infos'),
 				'primary_id'=>'info_class',
 				'primary_val'=>'-33',
 			);
 		$about  = $this->mydb->fetch_one($config);
 		$develop = $this->db->select('a.*,b.c_title')
 		->from($this->mydb->table('infos'.' as a '))
 		->like('a.info_class_sn','0102')
 		->join($this->mydb->table('category').' as b','a.info_class_sn=b.c_sn','left')
 		->order_by('a.info_class_sn','asc')
 		->order_by('b.c_order','desc')->get()->result_array();
 		foreach($develop as $v){
 			$list[$v['info_class_sn']]['c_title'] = $v['c_title'];
 			$list[$v['info_class_sn']]['detail'][] = $v;
 		
 		}
 	
 		$data = array(
 			'about'=>$about,
 			'devp'=>$list,
 		);
 		
 		$data['download_class_left'] = $this->im->download_left();
 
 
		$this->mypage->load_front_view("download",$data);
		
		
	}	
	
	
	
	
	
	
	
	
	/* 普通用户登录
	 */
	function contact()
	{
		$config = array(
 				'table_name'=>$this->mydb->table('infos'),
 				'primary_id'=>'info_class',
 				'primary_val'=>'-1',
 			);
 		$about  = $this->mydb->fetch_one($config);
 		$develop = $this->db->select('a.*,b.c_title')
 		->from($this->mydb->table('infos'.' as a '))
 		->like('a.info_class_sn','0102')
 		->join($this->mydb->table('category').' as b','a.info_class_sn=b.c_sn','left')
 		->order_by('a.info_class_sn','asc')
 		->order_by('b.c_order','desc')->get()->result_array();
 		foreach($develop as $v){
 			$list[$v['info_class_sn']]['c_title'] = $v['c_title'];
 			$list[$v['info_class_sn']]['detail'][] = $v;
 		
 		}
 	
 		$data = array(
 			'about'=>$about,
 			'devp'=>$list,
 		);
 		
 
		$this->mypage->load_front_view("contact",$data);
		
		
	}	
	
	
	
	
	//显示信息
	function show_archives(){
		$cache = $this->mycache->cache_fetch('archives_class');
		$info_class = $this->input->get('info_class');
		$data['nav_title'] = $cache[$info_class];		
		$data['main'] = $this->db->query('select * from '.$this->mydb->table('infos').' where info_class='.$info_class)->first_row('array');
		
		
		
		$this->mypage->load_front_view("about_archives",$data);
		
	}
	
	
	//新闻列表
	function archives_list(){		
		$parent_class = $this->input->get('c_sn');
		$parent_class = $parent_class?$parent_class:'010501';
		$this->db->select("a.*,b.c_title",false)->from($this->mydb->table('infos').' as a ')
		->join($this->mydb->table('category').' as b ','a.info_class_sn=b.c_sn')
		->like('a.info_class_sn',$parent_class,'after')
		->order_by("info_id","desc");
		$data = $this->mydb->fetch_all();	
		
		foreach($data['list'] as &$v){
			$v['info_file_size'] = $this->Common_model->file_size_stat(FCPATH.'/'.$v['info_soft_url']); 
		}	
		$data = array_merge($data,
		array(
			'class_info'=>$class_info,
		)
		);	
		
		$data['download_class_left'] = $this->im->download_left();
		
		
		$this->mypage->load_front_view("download_list",$data);
		
	}	




	/**
	 * 普通用户登录
	 */
	function view()
	{
		$config = array(
 				'table_name'=>$this->mydb->table('infos'),
 				'primary_id'=>'info_id',
 				'primary_val'=>$this->input->get("info_id"),
 			);
 		$about  = $this->mydb->fetch_one($config);
 		
 	
 	
 		
 		$data['download_class_left'] = $this->im->download_left();
 		
 		
 		$this->load->model("Category_model");
 		$about['class_name'] = $this->Category_model->detail($about['info_class_sn'],'by_c_sn','c_title');
 		$about['soft_class_name'] = $this->Category_model->detail($about['info_soft_class_sn'],'by_c_sn','c_title');
		$about['file_size']  = $this->Common_model->file_size_stat(FCPATH.'/'.$about['info_soft_url']);
		 	
 		
 		$data = array(
 			'about'=>$about,
 		);
 		$data['download_class_left'] = $this->im->download_left();
		$this->mypage->load_front_view("download_view",$data);
		
		
	}	
	
	
	

	/**
	 * 下载
	 */
	function view2()
	{
		$config = array(
 				'table_name'=>$this->mydb->table('infos'),
 				'primary_id'=>'info_id',
 				'primary_val'=>$this->input->get("info_id"),
 			);
 		$about  = $this->mydb->fetch_one($config); 	
 		
 		$this->db->query("update ".$this->mydb->table('infos')." set info_download_times=info_download_times+1 where info_id=".$about['info_id']."");
 		$this->Common_model->download(base_url().'/'.$about['info_soft_url']);	
 		exit();		
	}	
	
 
	
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */