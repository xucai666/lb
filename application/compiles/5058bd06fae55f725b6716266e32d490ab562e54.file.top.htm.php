<?php /* Smarty version Smarty-3.1.14, created on 2013-09-03 03:57:57
         compiled from "application\templates\backend\corcms\top.htm" */ ?>
<?php /*%%SmartyHeaderCode:1705252255e45186a09-42035663%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5058bd06fae55f725b6716266e32d490ab562e54' => 
    array (
      0 => 'application\\templates\\backend\\corcms\\top.htm',
      1 => 1378122869,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1705252255e45186a09-42035663',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'item_lang' => 0,
    'header_html' => 0,
    'base_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52255e4519ef31_11713359',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52255e4519ef31_11713359')) {function content_52255e4519ef31_11713359($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" /> 
<title><?php echo $_smarty_tpl->tpl_vars['item_lang']->value['sys_backend'];?>
</title> 
<?php echo $_smarty_tpl->tpl_vars['header_html']->value['css'];?>

<?php echo $_smarty_tpl->tpl_vars['header_html']->value['js'];?>

<base href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
" />
<base target="_self" />
</head>  
<body > 
<?php }} ?>