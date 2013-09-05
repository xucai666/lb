<?php /* Smarty version Smarty-3.1.14, created on 2013-09-05 08:39:15
         compiled from "application\templates\backend\corcms\main_index.htm" */ ?>
<?php /*%%SmartyHeaderCode:309455227d2b3bafc92-54156610%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '57bca995376f3e9a04397d23c80716afd9138e67' => 
    array (
      0 => 'application\\templates\\backend\\corcms\\main_index.htm',
      1 => 1378167634,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '309455227d2b3bafc92-54156610',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'site_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5227d2b3d684c3_57301596',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5227d2b3d684c3_57301596')) {function content_5227d2b3d684c3_57301596($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cor.CMS - Conqweal</title>
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