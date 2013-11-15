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
  * @version   1 .0$
  * @link      http://phpsysinfo.sourceforge.net
  */
 class Test extends CI_Controller{
	function __construct(){
		parent::__construct();
		
	}
	
	/**
	 * [index description]
	 * @return [type] [description]
	 */
	function index(){	
		phpinfo();
		exit;
	}

	
	

	
}
?>
