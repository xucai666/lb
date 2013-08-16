<?php /* Smarty version Smarty-3.1.14, created on 2013-08-15 10:10:49
         compiled from "application\templates\backend\blue\menu_add.htm" */ ?>
<?php /*%%SmartyHeaderCode:9804520ca929381d31-49948722%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '04be9a7345b1aeb0f79240f1bcf138246c0e3b32' => 
    array (
      0 => 'application\\templates\\backend\\blue\\menu_add.htm',
      1 => 1374740504,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9804520ca929381d31-49948722',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dir_backend' => 0,
    'lang_roles' => 0,
    'site_url' => 0,
    'parent_menus' => 0,
    'main' => 0,
    'cust_names' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_520ca9297c7274_44069957',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520ca9297c7274_44069957')) {function content_520ca9297c7274_44069957($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include 'E:\\phpnow\\htdocs\\lb\\application\\libraries\\Smarty-3.1.14\\libs\\plugins\\function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<fieldset>
<legend><?php echo $_smarty_tpl->tpl_vars['lang_roles']->value['rights_config'];?>
</legend>
<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/backend/menu/action_save"> 

<table class="center" width="100%">
<tr  >
	<td  colspan="2" align="left" valign="top">
	
    上级菜单：
    <select name='main[r_pid]' style='width:150px;' size='15'>
    <option value=''>请选择</option>
	<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['parent_menus']->value,'selected'=>$_smarty_tpl->tpl_vars['main']->value['r_pid'],'output'=>$_smarty_tpl->tpl_vars['cust_names']->value),$_smarty_tpl);?>

	</select>
	</td>
</tr>



<tr >
	<td width="94" align="left" valign="top" >名称：</td><td class="td_left">	
		<input type="text" name="main[r_title]" value="<?php echo $_smarty_tpl->tpl_vars['main']->value['r_title'];?>
" size="50"/>
		<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
echo form_error("main[r_title]","<div id='error_span' class='red_font'>","</div>"); <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

	</td>
</tr>


<tr >
	<td width="94" align="left" valign="top" >排序</td><td class="td_left">	
		<input type="text" name="main[r_order]" value="<?php echo $_smarty_tpl->tpl_vars['main']->value['r_order'];?>
" size="10" />
		<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
echo form_error("main[r_order]","<div id='error_span' class='red_font'>","</div>"); <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

	</td>
</tr>


<tr >
	<td width="94" align="left" valign="top" >链接</td><td class="td_left">	
		<input type="text" name="main[r_url]" value="<?php echo $_smarty_tpl->tpl_vars['main']->value['r_url'];?>
" size="100" />
	</td>
</tr>


<tr >
	<td width="94" align="left" valign="top" >显示</td><td class="td_left">	
		<input type="checkbox" name="main[r_display]" value="1" <?php echo $_smarty_tpl->tpl_vars['main']->value['checked'];?>
 />
	</td>
</tr>



</table>
<center>

<input type="hidden" name="main[r_id]" value="<?php echo $_smarty_tpl->tpl_vars['main']->value['r_id'];?>
">
<?php echo create_button(array('type'=>'save'),$_smarty_tpl);?>

</center>

</form>
</fieldset>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>