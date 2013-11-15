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
    $pid = $this->input->get_post("pid");
    $pid = $pid?$pid:0;
    $list = $this->db->query("SELECT region_id, region_name from ".$this->init_db->table('ecs_region')." where parent_id=" .$pid )->result_array();
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
    $this->Common_model->set_uid();
    $uid =  $this->Common_model->get_uid();
    $array = $this->init_form->get_post();
    $pic = $array['p_pic'];
    $array['p_pic'] = $uid;
    $tb = array_shift($array);
    //insert into product table
    $this->db->insert($tb,$array);
    //insert image table
    $this->db->insert('module_images',array('i_url'=>$pic,'i_uid'=>$uid,'i_table'=>$this->db->dbprefix.'module_product'));
    echo 'true';
  }


 	
 	
 	
}
?>