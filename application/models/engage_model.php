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
 class Engage_model extends CI_Model{

	function __construct(){
		parent::__construct();
	}
	
	function save_config(){
		return array(
			'main'=>array(
				'table_name'=>$this->init_db->table('engage'),
				'primary_key'=>'eg_id',
			
			),		
		);
		
	}
	
	
	function db_config_apply(){
		return array(
			'main'=>array(
				'table_name'=>$this->init_db->table('engage_apply'),
				'primary_key'=>'apply_id',
			
			),		
		);
		
	}
	
	
	

		
}
?>
