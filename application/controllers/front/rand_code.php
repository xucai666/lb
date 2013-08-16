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
 class Rand_code extends CI_Controller{
 	function __construct(){
 		 parent::__construct();
	}
	
	function show_code(){		
		  /***验证码**/
		  $this->load->model('Vcode_model');
		  $this->Vcode_model->make_img();
		  $this->session->set_userdata('vcode', $this->vcode_model->vcode);
		  $this->Vcode_model->show_img();
	}
 	
 }
?>
