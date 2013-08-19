<?php /* Smarty version Smarty-3.1.14, created on 2013-08-19 01:18:57
         compiled from "application\templates\backend\blue\top.htm" */ ?>
<?php /*%%SmartyHeaderCode:43405211097298b737-87124686%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '924ed22b8fb161b4fd48e375a1d5f9cf1174fe96' => 
    array (
      0 => 'application\\templates\\backend\\blue\\top.htm',
      1 => 1376873985,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '43405211097298b737-87124686',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_521109729af5c6_15989082',
  'variables' => 
  array (
    'item_lang' => 0,
    'header_html' => 0,
    'base_url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_521109729af5c6_15989082')) {function content_521109729af5c6_15989082($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" /> 
<title><?php echo $_smarty_tpl->tpl_vars['item_lang']->value['sys_backend'];?>
</title> 
<?php echo $_smarty_tpl->tpl_vars['header_html']->value['css'];?>

<?php echo $_smarty_tpl->tpl_vars['header_html']->value['js'];?>

</head>  
<base href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
" />
<body > 
<?php }} ?>