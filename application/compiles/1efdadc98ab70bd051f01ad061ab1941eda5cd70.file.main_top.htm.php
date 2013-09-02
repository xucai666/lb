<?php /* Smarty version Smarty-3.1.14, created on 2013-09-02 15:40:02
         compiled from "application\templates\backend\x6cms\main_top.htm" */ ?>
<?php /*%%SmartyHeaderCode:23002522490cd5745e3-09052416%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1efdadc98ab70bd051f01ad061ab1941eda5cd70' => 
    array (
      0 => 'application\\templates\\backend\\x6cms\\main_top.htm',
      1 => 1378136189,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23002522490cd5745e3-09052416',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_522490cd663ac8_60373631',
  'variables' => 
  array (
    'css_url' => 0,
    'img_url' => 0,
    'js_url' => 0,
    'rights_options' => 0,
    'key' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_522490cd663ac8_60373631')) {function content_522490cd663ac8_60373631($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>X6CMS2.2(20130305) - 小六网络科技</title>
<meta name="author" content="小六网络科技" />
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['css_url']->value;?>
style.css" />
<link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
favicon.ico" />
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
jquery.min.js"></script>


</head><body><style>body{height:100%;background:#E2E9EA;}</style>
<div id="main_top">
<div id="header" class="header" >
<table width="100%" height="80" border="0" cellpadding="0" cellspacing="1">
	<tr><td rowspan="2" width="150"><div class="logo"><a href="http://localhost/x6cms/" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
x6cms.gif" width=150></a></div></td>
	<td height="40"><div class="nav">&nbsp;&nbsp;&nbsp;&nbsp;欢迎您！admin<i>|</i> [超级管理员]  <i>|</i> [<a href="http://localhost/x6cms/index.php?/admin/main/logout" target="_top">退出</a>]</div></td>
	<td align="right"><div class="nav">
<a href="http://localhost/x6cms/" target="_blank">浏览站点</a>
<i>|</i>
<a href="http://bbs.x6cms.com" target="_blank">技术论坛</a>
<i>|</i>
<a href="http://www.x6cms.com/shouce" target="_blank">在线手册</a>
 &nbsp;&nbsp;</div></td>
	</tr>
	<tr>
		<td valign="bottom"><div class="topmenu"><ul>


	 <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['rights_options']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>	
<li onClick="setLeft(<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
);return false;"><span class="topmenufunc" id="topmenufunc_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><b><?php echo $_smarty_tpl->tpl_vars['item']->value['r_title'];?>
</b></span></li>
<?php } ?>

</ul></div></td>
		<td align="right"><div class="nav">当前编辑:<select name="editlang" id="editlang" onchange="setLang(this)">
				<option value="zh_cn" selected>简体中文</option>
				<option value="en" >English</option>
				</select>&nbsp;&nbsp;</div></td>
	</tr>
</table>
</div>
</div>
<script type="text/javascript">
function setLeft(tid){
	parent.menu.setTab(tid);
	$(".topmenufunc").removeClass('current');
	$("#topmenufunc_"+tid).addClass('current');
}

$(function($){
	$(".topmenufunc").removeClass('current');
	$("#topmenufunc_0").addClass('current');
})

</script>
<script>
//var throughBox = $.dialog.through;
	//var myDialog = throughBox({title:'xx',lock:true});
	//myDialog.content('zzzzzzz');

	

</script>

</body></html><?php }} ?>