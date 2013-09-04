<?php /* Smarty version Smarty-3.1.14, created on 2013-09-04 22:44:24
         compiled from "application\templates\backend\corcms\main_top.htm" */ ?>
<?php /*%%SmartyHeaderCode:1466752274748af7223-85028331%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '69164d1440cda3085cad42aa7f3faaff147ae8ac' => 
    array (
      0 => 'application\\templates\\backend\\corcms\\main_top.htm',
      1 => 1378170872,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1466752274748af7223-85028331',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'css_url' => 0,
    'img_url' => 0,
    'js_url' => 0,
    'user_info' => 0,
    'rights_options' => 0,
    'key' => 0,
    'item' => 0,
    'site_url' => 0,
    'lang_all_options' => 0,
    'lang_type' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52274748bd7ea8_81528221',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52274748bd7ea8_81528221')) {function content_52274748bd7ea8_81528221($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include 'E:\\phpnow\\htdocs\\lb\\application\\libraries\\Smarty-3.1.14\\libs\\plugins\\function.html_options.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cor.CMS - Conqweal</title>
<meta name="author" content="conqweal" />
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
	<tr><td rowspan="2" width="150"><div class="logo"><a href="<?php echo site_url();?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
x6cms.gif" width=150></a></div></td>
	<td height="40"><div class="nav">&nbsp;&nbsp;&nbsp;&nbsp;欢迎您！<?php echo $_smarty_tpl->tpl_vars['user_info']->value['admin_user'];?>
<i>|</i> [<?php echo $_smarty_tpl->tpl_vars['user_info']->value['role_name'];?>
]  <i>|</i> [<a href="<?php echo site_url('/backend/system_manage/exit_system');?>
" target="_top"><?php echo lang("exit");?>
</a>]</div></td>
	<td align="right"><div class="nav">
<a href="<?php echo site_url();?>
" target="_blank">浏览站点</a>
<i>|</i>


<a href="<?php echo base_url('user_guide/index.html');?>
" target="_blank">在线手册</a>
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
		<td align="right"><div class="nav">当前编辑:


		 <?php if (config_item('lang_multiple')){?>

					<select onChange="parent.location.href='<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/backend/common/lang_set/?lang='+this.value+'&url=<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/backend/login/center/';" >
					<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lang_all_options']->value,'selected'=>$_smarty_tpl->tpl_vars['lang_type']->value),$_smarty_tpl);?>

					</select>
		
		  <?php }?>		

		  &nbsp;&nbsp;</div></td>
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