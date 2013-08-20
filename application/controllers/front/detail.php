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
class Detail extends CI_Controller {

	function __construct()
	{
		parent::__construct();	
		//启用缓存显示,key is action name,val is view name
		$act_to_view = array(
			'index'=>'detail',
		);
		$this->cor_page->view_cache_all($act_to_view);		
	}
	
	/**
	 * 普通用户登录
	 */
	function index()
	{
		$config = array(
 				'table_name'=>$this->cor_db->table('infos'),
 				'primary_id'=>'info_id',
 				'primary_val'=>$this->input->get('info_id'),
 			);
 		$about  = $this->cor_db->fetch_one($config);
 		$develop = $this->db->select('a.*,b.c_title')
 		->from($this->cor_db->table('infos'.' as a '))
 		->like('a.info_class_sn','0102')
 		->join($this->cor_db->table('category').' as b','a.info_class_sn=b.c_sn','left')
 		->order_by('a.info_class_sn','asc')
 		->order_by('b.c_order','desc')->get()->result_array();
 		foreach($develop as $v){
 			$list[$v['info_class_sn']]['c_title'] = $v['c_title'];
 			$list[$v['info_class_sn']]['detail'][] = $v;
 		
 		}
 		
 		$sql =		"select info_id,info_title,'上一篇' as type  from (select info_id,info_title from ".$this->cor_db->table('infos') ." where info_class_sn like '010702%' and info_id>".$about['info_id']." order by info_id asc limit 1) as b  

						union all 
						select info_id,info_title,'下一篇' as type  from (select info_id,info_title from ".$this->cor_db->table('infos') ." where info_class_sn like '010702%' and info_id<".$about['info_id']." order by info_id desc limit 1) as a
					";
 		$nav = $this->db->query($sql)->result_array();
 	
 		$data = array(
 			'about'=>$about,
 			'devp'=>$list,
 			'nav'=>$nav, 			
 		);

 		$this->db->query("update ".$this->cor_db->table('infos')." set info_view=info_view+1 where info_id=".$this->input->get('info_id'));
 	
		$this->cor_page->load_front_view("detail",$data);
		
		
	}	
	

	
	
 
	
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */