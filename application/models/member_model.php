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
        'main'=>array(
          'table_name'=>$this->init_db->table('module_member'),
          'primary_key'=>'m_id',
        )
      ); 
    }


    function valid_save_rule(){
      return array(
         array(
          'field'=>'main[m_user]',
          'label'=>'用户名',
          'rules'=>'required|callback_valid_m_user_exists',
         ),
         array(
          'field'=>'main[m_pass]',
          'label'=>'密码',
          'rules'=>'required|min_length[6]|callback_valid_password_repeat',
         ), array(
          'field'=>'m_pass_repeat',
          'label'=>'密码',
          'rules'=>'required|min_length[6]',
         ),  
         array(
          'field'=>'main[m_email]',
          'label'=>'邮箱',
          'rules'=>'required|valid_email',
         ),  
         array(
          'field'=>'main[m_name]',
          'label'=>'称呼',
          'rules'=>'required',
         ),
        
      );
    }

    function valid_save_rule_update(){
      return array(
        
         array(
          'field'=>'main[m_pass]',
          'label'=>'密码',
          'rules'=>'min_length[6]|callback_valid_password_repeat',
         ),  
         array(
          'field'=>'main[m_email]',
          'label'=>'邮箱',
          'rules'=>'required|valid_email',
         ),  
         array(
          'field'=>'main[m_name]',
          'label'=>'称呼',
          'rules'=>'required',
         ),
        
      );
    }

    function valid_login_rule(){
      return array(
        array(
          'field'=>'m_user',
          'label'=>'用户名',
          'rules'=>'required|callback_valid_login_m_user',
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

    function auth_login(){
   
      if(!get_cookie('member')){
         $this->init_page->front_redirect('member/index','请先登陆');
         exit;

      }
    }

    function  detail($m_user){

      return $this->db->select('*',false)->from('module_member')->where('m_user',$m_user)->get()->first_row('array');
    }

}
?>