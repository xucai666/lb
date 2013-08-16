<?php /* Smarty version Smarty-3.1.14, created on 2013-08-16 02:54:49
         compiled from "application\templates\backend\blue\admins_add.htm" */ ?>
<?php /*%%SmartyHeaderCode:22831520d9479564648-97017258%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '07ea99aa69f94bc0450ca1dd9c7c8ad83e302327' => 
    array (
      0 => 'application\\templates\\backend\\blue\\admins_add.htm',
      1 => 1359256087,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22831520d9479564648-97017258',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dir_backend' => 0,
    'lang_admins' => 0,
    'site_url' => 0,
    'main' => 0,
    'group_options' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_520d9479df97e7_41801980',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520d9479df97e7_41801980')) {function content_520d9479df97e7_41801980($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include 'E:\\phpnow\\htdocs\\lb\\application\\libraries\\Smarty-3.1.14\\libs\\plugins\\function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<fieldset>
<legend><?php echo $_smarty_tpl->tpl_vars['lang_admins']->value['theme_add'];?>
</legend>
<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/backend/admins/action_save"   onsubmit="return validator(this);"/>

<table class="center" width="80%">
<tr>
	<td class="right"><?php echo $_smarty_tpl->tpl_vars['lang_admins']->value['username'];?>
：</td><td class="left">
	<input type="text" name="main[admin_user]" valid="required"  errmsg="<?php echo $_smarty_tpl->tpl_vars['lang_admins']->value['inp_username'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['main']->value['admin_user'];?>
" 
    <?php if ($_smarty_tpl->tpl_vars['main']->value['admin_id']){?>
    	readonly="true" style="background-color:#cccccc;"
    <?php }?> 
    >
	  <?php echo type_error(array('obj'=>'main[admin_user]'),$_smarty_tpl);?>

	</td>
</tr>



<tr>
	<td class="right"><?php echo $_smarty_tpl->tpl_vars['lang_admins']->value['role'];?>
：</td><td class="left">
		<select name="main[group_id]" >
				<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['group_options']->value,'selected'=>$_smarty_tpl->tpl_vars['main']->value['group_id']),$_smarty_tpl);?>

		</select>		
	
	</td>
</tr>

<tr>
	<td class="right"><?php echo $_smarty_tpl->tpl_vars['lang_admins']->value['name'];?>
：</td><td class="left">
	<input type="text" name="main[name]" value="<?php echo $_smarty_tpl->tpl_vars['main']->value['name'];?>
">
	
	</td>
</tr>



<tr>
	<td class="right"><?php echo $_smarty_tpl->tpl_vars['lang_admins']->value['tel'];?>
：</td><td class="left">
	<input type="text" name="main[tel]" value="<?php echo $_smarty_tpl->tpl_vars['main']->value['tel'];?>
">
	
	</td>
</tr>
<tr>
	<td class="right"><?php echo $_smarty_tpl->tpl_vars['lang_admins']->value['mobile'];?>
：</td><td class="left">
	<input type="text" name="main[mobile]" value="<?php echo $_smarty_tpl->tpl_vars['main']->value['mobile'];?>
">
	
	</td>
</tr>
<tr>
	<td class="right"><?php echo $_smarty_tpl->tpl_vars['lang_admins']->value['qq'];?>
：</td><td class="left">
	<input type="text" name="main[qq]" value="<?php echo $_smarty_tpl->tpl_vars['main']->value['qq'];?>
">
	
	</td>
</tr>
<tr>
	<td class="right"><?php echo $_smarty_tpl->tpl_vars['lang_admins']->value['email'];?>
：</td><td class="left">
	<input type="text" name="main[email]" value="<?php echo $_smarty_tpl->tpl_vars['main']->value['email'];?>
">
	
	</td>
</tr>
<tr><td class="right"><?php echo $_smarty_tpl->tpl_vars['lang_admins']->value['password'];?>
：</td><td class="left"><input type="password" name="main[admin_pass]" id="admin_pass"  >
<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
 echo form_error("main[admin_pass]","<div id='error_span' class='red_font'>","</div>");<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

</td></tr>
<tr><td class="right"><?php echo $_smarty_tpl->tpl_vars['lang_admins']->value['password_confirm'];?>
：</td><td class="left"><input type="password" name="confirm_password" valid='equal' equalName="main[admin_pass]" errmsg="<?php echo $_smarty_tpl->tpl_vars['lang_admins']->value['inp_password_confirm_error'];?>
">
<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
 echo form_error("confirm_password","<div id='error_span' class='red_font'>","</div>");<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

</td>

</tr>
</table>
<center>

<input type="hidden" name="main[admin_id]" value="<?php echo $_smarty_tpl->tpl_vars['main']->value['admin_id'];?>
">

<?php echo create_button(array('type'=>'save'),$_smarty_tpl);?>

<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

	

	echo form_close();
	echo form_fieldset_close();
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

</center>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>