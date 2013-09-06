<?php /* Smarty version Smarty-3.1.14, created on 2013-09-06 15:46:31
         compiled from "application\templates\backend\corcms\adminindex.htm" */ ?>
<?php /*%%SmartyHeaderCode:1059052298857a7e735-05474913%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9b58c5f9cee58ee20026cabb2a1cddb56b18b909' => 
    array (
      0 => 'application\\templates\\backend\\corcms\\adminindex.htm',
      1 => 1378256665,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1059052298857a7e735-05474913',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'css_url' => 0,
    'js_url' => 0,
    'user_info' => 0,
    'last_login' => 0,
    'stat' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52298857c0a501_85665813',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52298857c0a501_85665813')) {function content_52298857c0a501_85665813($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<tr><td width="15%">上次登录时间</td><td width="35%"><?php echo $_smarty_tpl->tpl_vars['last_login']->value['last']['login_time'];?>
</td><td width="15%">上传许可</td><td width="35%"><?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
echo ini_get('upload_max_filesize');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</td></tr>
<tr><td width="15%">上次登录ip</td><td width="35%"><?php echo $_smarty_tpl->tpl_vars['last_login']->value['last']['login_ip'];?>
&lt<?php echo $_smarty_tpl->tpl_vars['last_login']->value['last']['login_client'];?>
&gt</td><td width="15%">MYSQL版本</td><td width="35%"><?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
echo mysql_get_server_info();<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</td></tr>
<tr><td width="15%">登录次数</td><td width="35%"><?php echo $_smarty_tpl->tpl_vars['last_login']->value['stat'];?>
</td><td width="15%">剩余空间</td><td width="35%"><?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
 echo display_size(@disk_free_space("."));<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</td></tr>
<tr><th width="50%" align="left" colspan="4">网站统计</th>
	</tr>

<tr>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['stat']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['item']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['item']->iteration++;
?>
<td><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['item']->value['stat'];?>
</td>
	
<?php if ((!($_smarty_tpl->tpl_vars['item']->iteration % 2))&&($_smarty_tpl->tpl_vars['item']->iteration!=$_smarty_tpl->tpl_vars['item']->total)){?>
	<?php echo "</tr><tr>";?>

<?php }?>

<?php } ?>

</tr>


</table>
</div>
</body></html><?php }} ?>