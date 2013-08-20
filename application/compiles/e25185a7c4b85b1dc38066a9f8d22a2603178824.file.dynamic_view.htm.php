<?php /* Smarty version Smarty-3.1.14, created on 2013-08-20 02:10:00
         compiled from "application\templates\front\blue\en\dynamic_view.htm" */ ?>
<?php /*%%SmartyHeaderCode:70915212cff8be7e74-05666998%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e25185a7c4b85b1dc38066a9f8d22a2603178824' => 
    array (
      0 => 'application\\templates\\front\\blue\\en\\dynamic_view.htm',
      1 => 1376875966,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '70915212cff8be7e74-05666998',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dir_front' => 0,
    'img_url' => 0,
    'ci_uri' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5212cff8cd92e5_19522346',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5212cff8cd92e5_19522346')) {function content_5212cff8cd92e5_19522346($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<table width="992" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/ban_05.jpg" width="992" height="178" /></td>
  </tr>
</table>
<table width="992" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td width="246" valign="top">
      
      <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/left_archive.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

      <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/left_contact.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

      
      
    <td valign="top"><?php echo func_tag_detail(array('t_id'=>46,'where'=>"n_id=".((string)$_smarty_tpl->tpl_vars['ci_uri']->value[4])),$_smarty_tpl);?>
</td>
  </tr>
</table>




<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>