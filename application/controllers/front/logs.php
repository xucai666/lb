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
class Logs extends CI_Controller {

	function __construct()
	{
		parent::__construct();	
		
	
	}
	
	/**
	 * 普通用户登录
	 */
	function index()
	{
		$this->db->select("a.*",false)->from($this->cor_db->table('log').' as a ')	
		->like('a.log_user',$this->input->get('log_user'))		
		->like('a.log_type',$this->input->get('log_type'))		
		->order_by("log_id","desc");
		$data = $this->cor_db->fetch_all();	
		$data = array_merge($data,
		array()
		);	
		$this->cor_page->load_front_view("logs",$data);
		
	}	
	
 
	
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */