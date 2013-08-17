<?php
/**
 * Smarty plugin
 *
 * @package Smarty
 * @subpackage PluginsFunction
 * Smarty {ci_helper} function plugin
 *
 * Type:     function<br>
 * Name:     ci_helper<br>
 * Purpose:  Prints the dropdowns for time selection
 *
 * @link http://www.smarty.net/manual/en/language.function.html.select.time.php {html_select_time}
 *          (Smarty online manual)
 * @author Roberto Berto <roberto@berto.net>
 * @author Monte Ohrt <monte AT ohrt DOT com>
 * @param array                    $params   parameters
 * @param Smarty_Internal_Template $template template object
 * @return string
 * @uses smarty_make_timestamp()
 */
function smarty_function_ci_helper($params, $template)
{
     if ( ! function_exists( 'get_instance') ) 
    {
        return 'Can\'t get CI instance';
    }

    if ( ! function_exists( $params['function']) ) 
    {
        $CI = get_instance();
        $CI->load->helper( $params['name'] );
    }

    $func = $params['function'];
    unset( $params['function'] );
    unset( $params['name'] );
    return call_user_func_array( $func, array_values( $params ) );
}

?>