<?php /* Smarty version Smarty-3.1.14, created on 2013-09-01 00:19:01
         compiled from "application\templates\backend\blue\roles_add.htm" */ ?>
<?php /*%%SmartyHeaderCode:24132522285b3962000-31142525%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fe718d283f00ecc055cd547f8426eaf0e27e84ae' => 
    array (
      0 => 'application\\templates\\backend\\blue\\roles_add.htm',
      1 => 1377994731,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24132522285b3962000-31142525',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_522285b3ca56f5_21416608',
  'variables' => 
  array (
    'dir_backend' => 0,
    'lang_roles' => 0,
    'site_url' => 0,
    'main' => 0,
    'rights_options' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_522285b3ca56f5_21416608')) {function content_522285b3ca56f5_21416608($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<fieldset>
<legend><?php echo $_smarty_tpl->tpl_vars['lang_roles']->value['rights_config'];?>
</legend>
<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/backend/roles/action_save"> 

<table class="center" width="100%">
<tr  >
	<td  colspan="2" align="left">
    角色名称：<input type="text" size="25" name="main[role_name]" value="<?php echo $_smarty_tpl->tpl_vars['main']->value['role_name'];?>
">
	
	</td>
</tr>



<tr >
	<td width="94" align="left" valign="top" ><?php echo $_smarty_tpl->tpl_vars['lang_roles']->value['rights_config'];?>
：</td><td class="td_left">	
		<ul  class="rights_options">	
		 <?php echo $_smarty_tpl->tpl_vars['rights_options']->value;?>

		</ul>	
	
	</td>
</tr>
<tr><td width="94" align="left"></td><td class="td_left">

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="check_all" id="check_all" onclick="checkAll();" ><?php echo $_smarty_tpl->tpl_vars['lang_roles']->value['select_all'];?>
</td></tr>


</table>
<center>

<input type="hidden" name="main[role_id]" value="<?php echo $_smarty_tpl->tpl_vars['main']->value['role_id'];?>
">
<?php echo create_button(array('type'=>'save'),$_smarty_tpl);?>

</center>

</form>
</fieldset>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>