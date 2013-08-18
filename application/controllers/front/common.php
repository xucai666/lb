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
		
		$this->load->model('Common_model');
		
	}
	
	


  
  /**
   * ajax调用区域
   */
  function region(){  
    $pid = $this->input->get("pid");
    $pid = $pid?$pid:0;
    $list = $this->db->query("SELECT region_id, region_name from ".$this->mydb->table('ecs_region')." where parent_id=" .$pid )->result_array();
    if($list) {
      echo "&nbsp;<select name='area[]' onchange='region(this)'>";
      echo "<option value='0'>请选择</option>";
      foreach( $list as $l ) {
        echo "<option value=\"{$l['region_id']}\">{$l['region_name']}</option>";
      } 
    }
    echo "</select>";
    echo "<span></span>";     
  }
 	


  function insert(){
    $array = $this->input->post();
    $tb = array_shift($array);
    $this->db->insert($tb,$array);
    echo 'true';
  }


 	
 	
 	
}
?>