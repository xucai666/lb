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
class Member_model extends CI_Model{
  	function __construct(){
  		parent::__construct();
  	}


    function  db_config(){
      return array(
        'table_name'=>$this->cor_db->table('module_member'),
        'primary_key'=>'m_id',
      );
    }


    function valid_save_rule(){
      return array(
         array(
          'field'=>'main[m_name]',
          'label'=>'用户名',
          'rules'=>'required|callback_valid_m_name_exists',
         ),
         array(
          'field'=>'main[m_pass]',
          'label'=>'密码',
          'rules'=>'required|min_length:6',
         ),
        
      );
    }

    function valid_login_rule(){
      return array(
        array(
          'field'=>'m_name',
          'label'=>'用户名',
          'rules'=>'required|callback_valid_login_m_name',
        ),
        array(
          'field'=>'m_pass',
          'label'=>'密码',
          'rules'=>'required|callback_valid_login_m_pass',
        ),
        array(
          'field'=>'m_captcha',
          'label'=>'验证码',
          'rules'=>'required|callback_valid_login_m_captcha',
        ),
      );
    }

}
?>