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
class Templates_model extends CI_Model{
	function __construct(){
		parent::__construct();
		
		  
	}
	

	function db_config(){
		return array(
			'main'=>array(
				'table_name'=>'templates',
				'primary_key'=>'t_id',
				)
			);
	}
	
	function validator_save(){
		$config = array(
			array(
				'label'=>'模板名称',
				'field'=>'main[t_name]',
				'rules'=>'required',
			),
			array(
				'label'=>'模板代码',
				'field'=>'main[t_html]',
				'rules'=>'required',
			),	
			array(
				'label'=>'表格名称',
				'field'=>'main[t_db_name]',
				'rules'=>'required',
			)
			
		);
		return $config;
	}
	
	
	
	
	
}
?>