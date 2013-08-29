<?php /* Smarty version Smarty-3.1.14, created on 2013-08-29 03:29:20
         compiled from "application\templates\backend\blue\frame_left.htm" */ ?>
<?php /*%%SmartyHeaderCode:10052521ec01049ce26-66144721%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5fd1276595fa8a446fd37f44a26934351ad5899c' => 
    array (
      0 => 'application\\templates\\backend\\blue\\frame_left.htm',
      1 => 1376756316,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10052521ec01049ce26-66144721',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'item_lang' => 0,
    'header_html' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_521ec010566b29_58255848',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_521ec010566b29_58255848')) {function content_521ec010566b29_58255848($_smarty_tpl) {?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<title><?php echo $_smarty_tpl->tpl_vars['item_lang']->value['sys_backend'];?>
</title> 
<?php echo $_smarty_tpl->tpl_vars['header_html']->value['css'];?>

<?php echo $_smarty_tpl->tpl_vars['header_html']->value['js'];?>

<script  type="text/javascript" >
	/**
	 * [trigger_menu description]
	 * @return {[type]} [description]
	 */
	function trigger_menu(){
		//stop bubble first
		$("#menubar .category").children("ul").on('click', "li", function(e) {
			   e.stopPropagation();
		});
	
		$("#menubar .category").click(function(e){
			$(this).children("ul").toggle();
		});

	}	
</script>
</head>
<BODY >

<div class="menu" id="menubar">

</div>

</body>
</html><?php }} ?>