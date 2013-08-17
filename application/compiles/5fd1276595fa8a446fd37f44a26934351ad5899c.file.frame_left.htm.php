<?php /* Smarty version Smarty-3.1.14, created on 2013-08-17 12:53:46
         compiled from "application\templates\backend\blue\frame_left.htm" */ ?>
<?php /*%%SmartyHeaderCode:15724520f6936651138-87403807%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5fd1276595fa8a446fd37f44a26934351ad5899c' => 
    array (
      0 => 'application\\templates\\backend\\blue\\frame_left.htm',
      1 => 1376744019,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15724520f6936651138-87403807',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_520f693676e218_59558611',
  'variables' => 
  array (
    'item_lang' => 0,
    'header_html' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520f693676e218_59558611')) {function content_520f693676e218_59558611($_smarty_tpl) {?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<title><?php echo $_smarty_tpl->tpl_vars['item_lang']->value['sys_backend'];?>
</title> 
<?php echo $_smarty_tpl->tpl_vars['header_html']->value['css'];?>

<?php echo $_smarty_tpl->tpl_vars['header_html']->value['js'];?>

<script  type="text/javascript" >
	function trigger_menu(){
		$("#menubar .category").on("click",function(){
			$(this).next().toggle();
		});
	
	}	
</script>
</head>
<BODY >
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" id='mytb1' >
  <tr>
    <td valign="top" >
		<table class="alpha">
		  <tr>
			<td valign="top" class="menu" id="menubar">
			
			
			
			</td>
		  </tr>
		</table>
	</td>
  </tr>
 
</table>

</body>
</html><?php }} ?>