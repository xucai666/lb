<?php /* Smarty version Smarty-3.1.14, created on 2013-09-01 02:44:18
         compiled from "application\templates\backend\blue\tree_add.htm" */ ?>
<?php /*%%SmartyHeaderCode:96465222aa02cd0a18-82456933%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e7b535d999ca7382c929ff6581a27d26516a8e5b' => 
    array (
      0 => 'application\\templates\\backend\\blue\\tree_add.htm',
      1 => 1375709374,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '96465222aa02cd0a18-82456933',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dir_backend' => 0,
    'pids' => 0,
    'main' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5222aa02ddec84_20894677',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5222aa02ddec84_20894677')) {function content_5222aa02ddec84_20894677($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include 'E:\\phpnow\\htdocs\\lb\\application\\libraries\\Smarty-3.1.14\\libs\\plugins\\function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<fieldset>
<legend><div class="nav_title">分类增加/修改</div></legend>

<form  name="form1" id="form1" method="post" action="<?php echo func_site_url(array('segments'=>'backend/tree/action_save'),$_smarty_tpl);?>
">
<table>
	<tr>
		<td>上级分类：</td>
		<td>
			<select name="main[pid]">
				<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['pids']->value,'selected'=>$_smarty_tpl->tpl_vars['main']->value['pid']),$_smarty_tpl);?>

			</select>
			<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

				echo form_error("main[pid]","<span id='error_span'>","</span>");
			<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

		</td>
		<td></td>
	</tr>

	<tr>
		<td>分类名称：</td>
		<td>
			<input size="80" type="text" name="main[name]" id="main[name]" value="<?php echo $_smarty_tpl->tpl_vars['main']->value['name'];?>
">
			<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

				echo form_error("main[name]","<span id='error_span'>","</span>");
			<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

		</td>
		<td></td>
	</tr>
	<tr>
		<td>编码：</td>
		<td>
				<input size="80" type="text" name="main[code]" id="main[code]" value="<?php echo $_smarty_tpl->tpl_vars['main']->value['code'];?>
">
			<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

				echo form_error("main[code]","<span id='error_span'>","</span>");
			<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

		</td>
		<td></td>
	</tr>
	<tr>
		<td>图片：</td>
		<td>
			<?php echo func_tag_input_html(array('f_id'=>21,'name'=>"main[pic]",'value'=>$_smarty_tpl->tpl_vars['main']->value['pic']),$_smarty_tpl);?>

		</td>
		<td></td>
	</tr>
	
	
	
	<tr>
		<td colspan="3" align="center">
		<?php echo create_button(array('type'=>'save'),$_smarty_tpl);?>

		<input size="80" type="hidden" name="main[id]" value="<?php echo $_smarty_tpl->tpl_vars['main']->value['id'];?>
">
	</td></tr>

</table>
</form>	
</fieldset>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>