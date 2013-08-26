<?php /* Smarty version Smarty-3.1.14, created on 2013-08-26 03:09:38
         compiled from "application\templates\front\blue\en\about.htm" */ ?>
<?php /*%%SmartyHeaderCode:8744521ac6f233da04-10733701%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9a003cc22ac43cf1c67cc8daa5290d9bac5af7d0' => 
    array (
      0 => 'application\\templates\\front\\blue\\en\\about.htm',
      1 => 1377056285,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8744521ac6f233da04-10733701',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dir_front' => 0,
    'ci_uri' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_521ac6f2513c52_69649348',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_521ac6f2513c52_69649348')) {function content_521ac6f2513c52_69649348($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>



<table width="992" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td width="246" valign="top">
    
  	 <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/left_about.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

  	 <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/left_contact.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    
      
    <td valign="top">
	
		<?php echo func_tag_detail(array('t_id'=>24,'where'=>"f_id=".((string)(($tmp = @$_smarty_tpl->tpl_vars['ci_uri']->value[3])===null||$tmp==='' ? 2 : $tmp))),$_smarty_tpl);?>

	</td>
  </tr>
</table>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>