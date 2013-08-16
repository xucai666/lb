<?php /* Smarty version Smarty-3.1.14, created on 2013-08-16 14:20:30
         compiled from "application\templates\backend\blue\frame_left.htm" */ ?>
<?php /*%%SmartyHeaderCode:3781520e352e356091-26274849%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5fd1276595fa8a446fd37f44a26934351ad5899c' => 
    array (
      0 => 'application\\templates\\backend\\blue\\frame_left.htm',
      1 => 1360149345,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3781520e352e356091-26274849',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'item_lang' => 0,
    'header_html' => 0,
    'rights_options' => 0,
    'item' => 0,
    'item1' => 0,
    'site_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_520e352e987971_05624287',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520e352e987971_05624287')) {function content_520e352e987971_05624287($_smarty_tpl) {?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<title><?php echo $_smarty_tpl->tpl_vars['item_lang']->value['sys_backend'];?>
</title> 
<?php echo $_smarty_tpl->tpl_vars['header_html']->value['css'];?>

<?php echo $_smarty_tpl->tpl_vars['header_html']->value['js'];?>

</head>
<BODY >
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" id='mytb1' >
  <tr>
    <td valign="top" style="padding-top:10px; ">
		<table class="alpha">
		  <tr>
			<td valign="top" class="menu" id="menubar">
			
			 <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['rights_options']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>			
				<?php  $_smarty_tpl->tpl_vars['item1'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item1']->_loop = false;
 $_smarty_tpl->tpl_vars['key1'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['item']->value['detail']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item1']->key => $_smarty_tpl->tpl_vars['item1']->value){
$_smarty_tpl->tpl_vars['item1']->_loop = true;
 $_smarty_tpl->tpl_vars['key1']->value = $_smarty_tpl->tpl_vars['item1']->key;
?> 
					<?php if ($_smarty_tpl->tpl_vars['item1']->value['url']){?>
						<li><a href="<?php if ($_smarty_tpl->tpl_vars['item1']->value['url']=='event'){?>javascript:;<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['item1']->value['url'];?>
<?php }?>"  <?php echo $_smarty_tpl->tpl_vars['item1']->value['js_action'];?>
  title="<?php echo $_smarty_tpl->tpl_vars['item1']->value['title'];?>
" target="frmright"><?php echo $_smarty_tpl->tpl_vars['item1']->value['title'];?>
</a></li>
					<?php }?> 	
				<?php } ?>				
			
 			<?php } ?>	
			
			
			</td>
		  </tr>
		</table>
	</td>
  </tr>
 
</table>

</body>
</html><?php }} ?>