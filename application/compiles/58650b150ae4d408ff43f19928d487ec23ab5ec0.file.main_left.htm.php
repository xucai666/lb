<?php /* Smarty version Smarty-3.1.14, created on 2013-09-02 15:28:41
         compiled from "application\templates\backend\x6cms\main_left.htm" */ ?>
<?php /*%%SmartyHeaderCode:9930522490cd54dbf6-15147914%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '58650b150ae4d408ff43f19928d487ec23ab5ec0' => 
    array (
      0 => 'application\\templates\\backend\\x6cms\\main_left.htm',
      1 => 1378135711,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9930522490cd54dbf6-15147914',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_522490cd6619e5_49437441',
  'variables' => 
  array (
    'css_url' => 0,
    'img_url' => 0,
    'js_url' => 0,
    'rights_options' => 0,
    'key' => 0,
    'item' => 0,
    'item1' => 0,
    'item2' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_522490cd6619e5_49437441')) {function content_522490cd6619e5_49437441($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>X6CMS2.2(20130305) - 小六网络科技</title>
<meta name="author" content="小六网络科技" />
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['css_url']->value;?>
backend_style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['css_url']->value;?>
style.css" />
<link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
images/favicon.ico" />
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
jquery.min.js"></script>
<script type="text/javascript">
var baseurl = "<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
";
var siteaurl = "<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
index.php?/admin";
var siteurl = "<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
index.php?";
</script>
</head><body><style>
body{background:#F7FBFC;overflow-x:hidden;overflow-y:auto;}



</style>
		
		 <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['rights_options']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>

			<table  class="left_menu" cellpadding=0 cellspacing=0 id="purview_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
">
	<tr><td><b class="mtop"><?php echo $_smarty_tpl->tpl_vars['item']->value['r_title'];?>
</b></td></tr>
<?php  $_smarty_tpl->tpl_vars['item1'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item1']->_loop = false;
 $_smarty_tpl->tpl_vars['key1'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['item']->value['detail']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item1']->key => $_smarty_tpl->tpl_vars['item1']->value){
$_smarty_tpl->tpl_vars['item1']->_loop = true;
 $_smarty_tpl->tpl_vars['key1']->value = $_smarty_tpl->tpl_vars['item1']->key;
?> 	
		<tr><td onclick="seton(this,'<?php echo realUrl($_smarty_tpl->tpl_vars['item1']->value['r_url']);?>
');" class="category">
		<span><a href="javascript:void(0)" ><?php echo $_smarty_tpl->tpl_vars['item1']->value['r_title'];?>
</a></span>


		<?php if ($_smarty_tpl->tpl_vars['item1']->value['detail']){?>	
				<ul class="hide detail" >
					<?php  $_smarty_tpl->tpl_vars['item2'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item2']->_loop = false;
 $_smarty_tpl->tpl_vars['key2'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['item1']->value['detail']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item2']->key => $_smarty_tpl->tpl_vars['item2']->value){
$_smarty_tpl->tpl_vars['item2']->_loop = true;
 $_smarty_tpl->tpl_vars['key2']->value = $_smarty_tpl->tpl_vars['item2']->key;
?> 
							<?php if ($_smarty_tpl->tpl_vars['item2']->value['r_url']){?>
								<li >
									<a href="<?php echo realUrl($_smarty_tpl->tpl_vars['item2']->value['r_url']);?>
" target="main"><?php echo $_smarty_tpl->tpl_vars['item2']->value['r_title'];?>
</a>	
								</li> 															
							<?php }?>								
					<?php } ?>
				</ul>
															
		<?php }?>	




		</td></tr>
		

		<?php } ?>

		</table>

		<?php } ?>
			
<script type="text/javascript">
	function setTab(tid){
		$("#purview_"+tid).find('td').each(function(){
			$(this).removeClass("on");
		});
		$("table").hide();
		$("#purview_"+tid).show();
	}
	function seton(t,url) {
		$(t).parent().parent().find('td').each(function(){
			$(this).removeClass("on");
		});
		$(t).addClass("on");
		parent.main.location.href=url;
	}

	
	$(function($){

		//stop bubble first
		$(".category").children("ul").on('click', "li", function(e) {
			   e.stopPropagation();
		});
	
		$(".category").click(function(e){

			$(this).children("ul").toggle();
		});


	})

	

	setTab("0");
</script>
</body></html><?php }} ?>