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
class Index extends CI_Controller {

  function __construct()
  {
    parent::__construct();

    
    
  }
  
  /**
   * 普通用户登录
   */
  function index()
  {
    
    
    //图片轮显    
    $this->load->model('Pictures_model'); 
    $data['pics'] = $this->Pictures_model->list_index(); 
    $this->load->model('Advs_model');
    $langs = config_item('support_language');
    function filter_same($v){
      $CI = &get_instance();
      return $v==lang_get()?false:true;
    }
    $next_lang = current(array_filter($langs,'filter_same'));


    $data =  array_merge($data,array('next_lang'=>$next_lang));
    
    $this->init_page->load_front_view("index",$data);
  } 



 /**
   * 普通用户登录
   */
  function top_login()
  {
        

    $this->init_page->load_front_view("top_login");
  } 


  
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */