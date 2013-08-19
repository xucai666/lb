<?php /* Smarty version Smarty-3.1.14, created on 2013-08-19 03:48:08
         compiled from "application\templates\front\blue\zh\dynamic_view.htm" */ ?>
<?php /*%%SmartyHeaderCode:1175652117843d50575-70079154%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7fa62a317207c00680215361da4eacca5cc99b85' => 
    array (
      0 => 'application\\templates\\front\\blue\\zh\\dynamic_view.htm',
      1 => 1376884006,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1175652117843d50575-70079154',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52117843df4dd5_71371385',
  'variables' => 
  array (
    'dir_front' => 0,
    'img_url' => 0,
    'breadcrumb' => 0,
    'ci_uri' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52117843df4dd5_71371385')) {function content_52117843df4dd5_71371385($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<table width="992" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/ban_05.jpg" width="992" height="178" /></td>
  </tr>
</table>
<?php echo $_smarty_tpl->tpl_vars['breadcrumb']->value;?>

<table width="992" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td width="246" valign="top">
      
      <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/left_archive.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

      <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/left_contact.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

      
      
    <td   valign="top"><?php echo func_tag_detail(array('t_id'=>46,'where'=>"n_id=".((string)$_smarty_tpl->tpl_vars['ci_uri']->value[4])),$_smarty_tpl);?>
</td>
  </tr>
</table>




<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>