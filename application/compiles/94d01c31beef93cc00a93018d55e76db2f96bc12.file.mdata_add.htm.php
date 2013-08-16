<?php /* Smarty version Smarty-3.1.14, created on 2013-08-16 04:39:54
         compiled from "application\templates\backend\blue\mdata_add.htm" */ ?>
<?php /*%%SmartyHeaderCode:25485520dad1ae16e44-12801398%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '94d01c31beef93cc00a93018d55e76db2f96bc12' => 
    array (
      0 => 'application\\templates\\backend\\blue\\mdata_add.htm',
      1 => 1375249886,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25485520dad1ae16e44-12801398',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dir_backend' => 0,
    'theme' => 0,
    'fields' => 0,
    'v' => 0,
    'html' => 0,
    'main' => 0,
    'primary' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_520dad1b41a492_59391987',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520dad1b41a492_59391987')) {function content_520dad1b41a492_59391987($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<fieldset>
<legend><div class="nav_title">模型数据&raquo;<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
</div></legend>
<form  name="form1" id="form1" method="post" action="<?php echo func_site_url(array('segments'=>'backend/mdata/action_save'),$_smarty_tpl);?>
">
<table>
	<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['fields']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
	 <tr>
		<td><?php echo $_smarty_tpl->tpl_vars['v']->value['r_alias'];?>
：</td>
		<td>
			
		<?php echo func_vsprintf(array('html'=>$_smarty_tpl->tpl_vars['html']->value[$_smarty_tpl->tpl_vars['v']->value['f_id']],'name'=>"main[".((string)$_smarty_tpl->tpl_vars['v']->value['r_name'])."]",'value'=>htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['main']->value[$_smarty_tpl->tpl_vars['v']->value['r_name']])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['v']->value['r_default'] : $tmp), ENT_QUOTES, 'UTF-8', true)),$_smarty_tpl);?>

		<?php echo ci_form_error(array('k'=>"main[".((string)$_smarty_tpl->tpl_vars['v']->value['r_name'])."]"),$_smarty_tpl);?>

			
		</td>
		<td></td>
	</tr>
	<?php } ?>
	
	<tr>
		<td colspan="3" align="center">
		<?php echo create_button(array('type'=>'save'),$_smarty_tpl);?>

		<input size="80" type="hidden" name="main[<?php echo $_smarty_tpl->tpl_vars['primary']->value;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['main']->value[$_smarty_tpl->tpl_vars['primary']->value];?>
">
	</td></tr>

</table>
</form>	
</fieldset>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>