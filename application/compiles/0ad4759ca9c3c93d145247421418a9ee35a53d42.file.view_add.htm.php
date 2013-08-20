<?php /* Smarty version Smarty-3.1.14, created on 2013-08-20 03:46:52
         compiled from "application\templates\backend\blue\view_add.htm" */ ?>
<?php /*%%SmartyHeaderCode:206275212e6ac78b345-53937642%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0ad4759ca9c3c93d145247421418a9ee35a53d42' => 
    array (
      0 => 'application\\templates\\backend\\blue\\view_add.htm',
      1 => 1375409113,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '206275212e6ac78b345-53937642',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dir_backend' => 0,
    'main' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5212e6ac89ccc8_05930902',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5212e6ac89ccc8_05930902')) {function content_5212e6ac89ccc8_05930902($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<fieldset>
<legend><div class="nav_title">模板维护</div></legend>

<form  name="form1" id="form1" method="post" action="<?php echo func_site_url(array('segments'=>'backend/templates/view_save'),$_smarty_tpl);?>
">
<table>
	

	<tr>
		<td>名称：</td>
		<td>
			
			<?php echo $_smarty_tpl->tpl_vars['main']->value['t_name'];?>


		</td>
		<td></td>
	</tr>
	<tr>
		<td>模板代码：</td>
		<td>
			<textarea  name="main[t_html]" style="width:800px;height:400px"  ><?php echo $_smarty_tpl->tpl_vars['main']->value['t_html'];?>
</textarea>
		<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

				echo form_error("main[t_html]","<span id='error_span'>","</span>");
		<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

		</td>
		<td></td>
	</tr>
	
	<tr>
		<td colspan="3" align="center">
		<?php echo create_button(array('type'=>'save'),$_smarty_tpl);?>

		<input size="80" type="hidden" name="main[t_file]"  value="<?php echo $_smarty_tpl->tpl_vars['main']->value['t_file'];?>
">
	</td></tr>

</table>
</form>	
</fieldset>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>