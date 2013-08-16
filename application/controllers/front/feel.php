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
class Feel extends CI_Controller {

	function __construct()
	{
		parent::__construct();	
		//
	}
	
	/**
	 * 普通用户登录
	 */
	function index()
	{
		$like_sn = $this->input->get('info_class_sn'); 
 		$like_sn = $like_sn?$like_sn:'0105';
 	
		$this->db->select("a.*",false)->from($this->mydb->table('feel').' as a ')
		->like('a.pro_class_sn',$like_sn)
		->where('a.pro_pic<>','\'\'',false)
		->order_by("pro_order","desc");
		$data = $this->mydb->fetch_all();
			
 		//分类目录
 		$category = $this->db->query("select * from ".$this->mydb->table('category')." where c_sn like '0105_%' order by c_order desc ")->result_array();
 	
		
		$data = array_merge($data,
 			array(
				'category'=>$category,
 			)
 		); 
 		
		$this->mypage->load_front_view("feel",$data);
		
		
		
		
		
		
	}	
	
	//显示明细
	function show_archives(){
		$main = $this->db->query("select * from ".$this->mydb->table('feel').' as a left join '.$this->mydb->table('category').' as b on a.pro_class_sn=b.c_sn'." where a.pro_id=".$this->input->get("id"))->first_row('array');
		
		//分类目录
 		$category = $this->db->query("select * from ".$this->mydb->table('category')." where c_sn like '0105_%' order by c_order desc ")->result_array();
		$data = array(
				'category'=>$category,
				'main'=>$main,
 		);
 		
 		
		$this->mypage->load_front_view("feel_detail",$data);
	}
	
	

	
	
 
	
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */