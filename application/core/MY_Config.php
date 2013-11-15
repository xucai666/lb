<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package     CodeIgniter
 * @author      ExpressionEngine Dev Team
 * @copyright   Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license     http://codeigniter.com/user_guide/license.html
 * @link        http://codeigniter.com
 * @since       Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter Config Class
 *
 * This class contains functions that enable config files to be managed
 *
 * @package     CodeIgniter
 * @subpackage  Libraries
 * @category    Libraries
 * @author      ExpressionEngine Dev Team
 * @link        http://codeigniter.com/user_guide/libraries/config.html
 */
class MY_Config  extends CI_Config {
   

   
    // --------------------------------------------------------------------

    /**
     * Site URL
     * Returns base_url . index_page [. uri_string]
     *
     * @access  public
     * @param   string  the URI string
     * @return  string
     */
    function site_url($uri = '')
    {

        if ($uri == '' ||$uri == '/')
        {

            return $this->slash_item('base_url').$this->item('index_page');
        }

        if ($this->item('enable_query_strings') == FALSE)
        {
            $suffix = ($this->item('url_suffix') == FALSE) ? '' : $this->item('url_suffix');
            return $this->slash_item('base_url').$this->slash_item('index_page').$this->_uri_string($uri).$suffix;
        }
        else
        {

            if(is_array($uri)){
               return  $this->slash_item('base_url').$this->item('index_page').'?'.$this->_uri_string($uri);
            }
            elseif(strpos($uri,'=')!==false){
                return $this->slash_item('base_url').$this->item('index_page').'?'.$uri;
            }else{
                 $urs = explode('/',$uri);
                 if(count($urs)==1){
                     $u['c'] = $uri;
                     $u['m'] = 'index';
                 }else{
                     $u['m'] = end($urs);
                     $u['c'] = prev($urs);
                     $d = implode('/',array_slice($urs,0,-2));
                 }
                 $u['d'] = $d?$d:'front';
                 $uri_str = http_build_query($u);
                 return $this->slash_item('base_url').$this->item('index_page').'?'.$uri_str;
            }
            
        }
    }

    
}

// END CI_Config class

/* End of file Config.php */
/* Location: ./system/core/Config.php */
