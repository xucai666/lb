<?php
/*
 * Smarty plugin
 * -------------------------------------------------------------
 * File:     modifier.output_true.php
 * Type:     modifier
 * Name:     output_true
 * Purpose:  Call CodeIgniter helpers from within Smarty.
 * -------------------------------------------------------------
 */
function smarty_modifier_output_true($string, $string_true,$string_false)
{
  
   return $string?$string_true:$string_false;
}
?>