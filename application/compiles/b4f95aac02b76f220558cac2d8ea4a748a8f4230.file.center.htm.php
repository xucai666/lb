<?php /* Smarty version Smarty-3.1.14, created on 2013-09-02 13:21:16
         compiled from "application\templates\backend\x6cms\center.htm" */ ?>
<?php /*%%SmartyHeaderCode:9495522490cced8db7-01901027%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b4f95aac02b76f220558cac2d8ea4a748a8f4230' => 
    array (
      0 => 'application\\templates\\backend\\x6cms\\center.htm',
      1 => 1378126955,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9495522490cced8db7-01901027',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'js_url' => 0,
    'site_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_522490cd064fa7_89683218',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_522490cd064fa7_89683218')) {function content_522490cd064fa7_89683218($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>X6CMS后台管理中心 - Powered by X6CMS 2.2(20130305)</title>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
core.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
/artdialog/jquery.artDialog.js"></script>
</head>
<FRAMESET FRAMEBORDER=0 framespacing=0 border=1 rows="85,*,22">
<FRAME SRC="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/backend/login/main_top" name="main_top" FRAMEBORDER=0 NORESIZE SCROLLING='no' marginwidth=0 marginheight=0>
<FRAMESET FRAMEBORDER=0  framespacing=0 border=0 cols="150,12,*" id="frame-body">
<FRAME SRC="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/backend/login/main_left" FRAMEBORDER=0 id="main_left" name="menu">
<FRAME src="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/backend/login/main_center" id="main_center" name="main_center" frameborder="no" scrolling="no">
<FRAME SRC="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/backend/login/adminindex" FRAMEBORDER=0 id="main_main" name="main">

</FRAMESET>
<FRAME SRC="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/backend/login/main_foot"  name="footer1" FRAMEBORDER=0 NORESIZE SCROLLING='no' marginwidth=0 marginheight=0>
</FRAMESET>
<noframes><body>
</body></noframes>
</html><?php }} ?>