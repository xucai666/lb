<?php /* Smarty version Smarty-3.1.14, created on 2013-09-04 22:56:43
         compiled from "application\templates\backend\corcms\fields_add.htm" */ ?>
<?php /*%%SmartyHeaderCode:2390752274a2b929f02-62445238%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7fffac6ff9382aeda3d4e92e420aec9760601ec6' => 
    array (
      0 => 'application\\templates\\backend\\corcms\\fields_add.htm',
      1 => 1377338272,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2390752274a2b929f02-62445238',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dir_backend' => 0,
    'fields_types' => 0,
    'main' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52274a2ba29843_16569762',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52274a2ba29843_16569762')) {function content_52274a2ba29843_16569762($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_helper')) include 'E:\\phpnow\\htdocs\\lb\\application\\libraries\\Smarty-3.1.14\\libs\\plugins\\modifier.helper.php';
if (!is_callable('smarty_function_html_options')) include 'E:\\phpnow\\htdocs\\lb\\application\\libraries\\Smarty-3.1.14\\libs\\plugins\\function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<fieldset>
<legend><div class="nav_title"><?php echo smarty_modifier_helper("fields_fields_manage",'language','lang');?>
</div></legend>

<form  name="form1" id="form1" method="post" action="<?php echo func_site_url(array('segments'=>'backend/fields/action_save'),$_smarty_tpl);?>
">
<table>
	<tr>
		<td><?php echo smarty_modifier_helper("fields_field_type",'language','lang');?>
：</td>
		<td>
			<select name="main[f_type]">
				<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['fields_types']->value,'selected'=>$_smarty_tpl->tpl_vars['main']->value['f_type']),$_smarty_tpl);?>

			</select>
			<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

				echo form_error("main[f_type]","<span id='error_span'>","</span>");
			<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

		</td>
		<td></td>
	</tr>

	<tr>
		<td><?php echo smarty_modifier_helper("fields_field_name",'language','lang');?>
：</td>
		<td>
			<input size="80" type="text" name="main[f_name]" id="main[f_name]" value="<?php echo $_smarty_tpl->tpl_vars['main']->value['f_name'];?>
">
			<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

				echo form_error("main[f_name]","<span id='error_span'>","</span>");
			<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

		</td>
		<td></td>
	</tr>
	<tr>
		<td><?php echo smarty_modifier_helper("field_html",'language','lang');?>
：</td>
		<td>
			<textarea  name="main[f_html]" style="width:800px;height:400px"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['main']->value['f_html'], ENT_QUOTES, 'UTF-8', true);?>
</textarea>
		<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

				echo form_error("main[f_html]","<span id='error_span'>","</span>");
		<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

		</td>
		<td></td>
	</tr>
	
	<tr>
		<td><?php echo smarty_modifier_helper("fields_field_name",'language','lang');?>
：</td>
		<td>
			<input type="checkbox" name="f_media" value="1" <?php if ($_smarty_tpl->tpl_vars['main']->value['f_media']){?>checked<?php }?> onclick='$(this).next().val($(this).prop("checked")==true?1:0);'>
			<input size="80" type="hidden" name="main[f_media]" id="main[f_media]" value="<?php echo $_smarty_tpl->tpl_vars['main']->value['f_media'];?>
">
			<?php echo form_error("main[f_media]");?>

		</td>
		<td></td>
	</tr>


	
	<tr>
		<td colspan="3" align="center">
		<?php echo create_button(array('type'=>'save'),$_smarty_tpl);?>

		<input size="80" type="hidden" name="main[f_id]" value="<?php echo $_smarty_tpl->tpl_vars['main']->value['f_id'];?>
">
	</td></tr>

</table>
</form>	
</fieldset>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>