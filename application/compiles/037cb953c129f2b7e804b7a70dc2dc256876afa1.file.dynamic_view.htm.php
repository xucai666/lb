<?php /* Smarty version Smarty-3.1.14, created on 2013-09-05 00:12:58
         compiled from "application\templates\front\corcms\zh\dynamic_view.htm" */ ?>
<?php /*%%SmartyHeaderCode:2859452275c0a930f82-24675309%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '037cb953c129f2b7e804b7a70dc2dc256876afa1' => 
    array (
      0 => 'application\\templates\\front\\corcms\\zh\\dynamic_view.htm',
      1 => 1377057599,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2859452275c0a930f82-24675309',
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
  'unifunc' => 'content_52275c0a9b10f5_90778598',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52275c0a9b10f5_90778598')) {function content_52275c0a9b10f5_90778598($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<table width="992" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td width="246" valign="top">
      
      <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/left_archive.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

      <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/left_contact.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

      
      
    <td   valign="top">
    <?php echo func_tag_detail(array('t_id'=>46,'where'=>"n_id=".((string)$_smarty_tpl->tpl_vars['ci_uri']->value[3])),$_smarty_tpl);?>


    </td>
  </tr>
</table>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>