<?php /* Smarty version Smarty-3.1.14, created on 2013-09-06 15:46:31
         compiled from "application\templates\backend\corcms\center.htm" */ ?>
<?php /*%%SmartyHeaderCode:1529352298857245532-30319367%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '090fca48abdcc9955687f2ca28fbdccf222355c0' => 
    array (
      0 => 'application\\templates\\backend\\corcms\\center.htm',
      1 => 1378168916,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1529352298857245532-30319367',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'img_url' => 0,
    'css_url' => 0,
    'js_url' => 0,
    'site_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_522988572c0936_61381401',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_522988572c0936_61381401')) {function content_522988572c0936_61381401($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
favicon.ico" />
<style>* { padding:0; margin:0; }
html, body { height:100%; border:none 0; }
iframe { width:100%; height:100%; border:none 0; }
</style><title>Cor.CMS后台管理中心 - Powered by Cor.CMS v1.0(20130901)</title>
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['css_url']->value;?>
style.css" />
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
core.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
/artdialog/jquery.artDialog.js?skin=default"></script>
</head><body>
<iframe src="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/backend/login/main_index" name="ifr_main"></iframe></body></html>
<?php }} ?>