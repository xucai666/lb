<?php /* Smarty version Smarty-3.1.14, created on 2013-09-03 07:03:04
         compiled from "application\templates\backend\corcms\adminindex.htm" */ ?>
<?php /*%%SmartyHeaderCode:1303352255e469be6f5-87549648%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9b58c5f9cee58ee20026cabb2a1cddb56b18b909' => 
    array (
      0 => 'application\\templates\\backend\\corcms\\adminindex.htm',
      1 => 1378191773,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1303352255e469be6f5-87549648',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52255e46a183e9_61432838',
  'variables' => 
  array (
    'css_url' => 0,
    'js_url' => 0,
    'user_info' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52255e46a183e9_61432838')) {function content_52255e46a183e9_61432838($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cor.CMS - Conqweal</title>
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['css_url']->value;?>
style.css" />
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
jquery.min.js"></script>
</head><body><div id="main_head" class="main_head" style="height:35px;">
<table class="menu">
<tr><td>
<a href="###" class="current">后台首页</a></td></tr>
</table>
</div>
<div id="main_head" style="padding-top:35px;">
<table cellSpacing=0 width="100%" class="content_list">
<tr><th width="50%" align="left" colspan="2">个人资料</th><th align="left" colspan="2" width="50%">系统信息</th></tr>
<tr><td width="15%">用户名</td><td width="35%"><?php echo $_smarty_tpl->tpl_vars['user_info']->value['admin_user'];?>
</td><td width="15%">Cor.CMS版本</td><td width="35%">v1.0</td></tr>
<tr><td width="15%">用户组</td><td width="35%"><?php echo $_smarty_tpl->tpl_vars['user_info']->value['role_name'];?>
</td><td width="15%">运行环境</td><td width="35%"><?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
echo $_SERVER['SERVER_SOFTWARE'];<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</td></tr>
<tr><td width="15%">最后登录时间</td><td width="35%">2013-09-02 15:42:23</td><td width="15%">上传许可</td><td width="35%"><?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
echo ini_get('upload_max_filesize');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</td></tr>
<tr><td width="15%">最后登录ip</td><td width="35%">127.0.0.1</td><td width="15%">MYSQL版本</td><td width="35%"><?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
echo mysql_get_server_info();<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</td></tr>
<tr><td width="15%">登录次数</td><td width="35%">309</td><td width="15%">剩余空间</td><td width="35%"><?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
 echo round((@disk_free_space(".")/(1024*1024)),2).'M';<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</td></tr>
<tr><th width="50%" align="left" colspan="4">网站统计</th>
	</tr>

<tr><td width="15%">下载模型</td><td width="35%">4</td><td width="50%"  style="padding:0;" colspan="4" rowspan="6"></td></tr>


</table>
</div>
</body></html><?php }} ?>