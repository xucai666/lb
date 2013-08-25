<?php
/**
  * start page for webaccess
  *
  * PHP version 5
  *
  * @category  PHP
  * @package   Modle
  * @author    yehua <150672834@.com>
  * @copyright 2013 conqweal
  * @license   http://opensource.org/licenses/gpl-2.0.php GNU General Public License
  * @version   1.0$
  * @link      http://phpsysinfo.sourceforge.net
  */
class Search_model  extends CI_Model{

	/**
	 * [__construct description]
	 */
	function __construct(){	
		parent::__construct();
		// $this->load->helper("timecount");	
	}
	
	/**
	 * [get_url description]
	 * @param  [type] $key [description]
	 * @return [type]      [description]
	 */
	function get_url($m){
		$ar = $this->url_define();
		return site_url($ar[$m['tb']].$m['id']);
	}

	/**
	 * [url_define description]
	 * @return [type] [description]
	 */
	function url_define(){
		return array(
			'mysys_module_news'=>'dynamic/view/',
			'mysys_module_product'=>'product/view/',
			
		);
	}
	
}









	
	
	
		

?>