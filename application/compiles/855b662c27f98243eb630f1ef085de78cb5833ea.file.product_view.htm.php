<?php /* Smarty version Smarty-3.1.14, created on 2013-08-22 15:57:35
         compiled from "application\templates\front\blue\zh\product_view.htm" */ ?>
<?php /*%%SmartyHeaderCode:19762521634ef13e244-28758344%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '855b662c27f98243eb630f1ef085de78cb5833ea' => 
    array (
      0 => 'application\\templates\\front\\blue\\zh\\product_view.htm',
      1 => 1377119709,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19762521634ef13e244-28758344',
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
  'unifunc' => 'content_521634ef20b673_93119105',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_521634ef20b673_93119105')) {function content_521634ef20b673_93119105($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<table width="992" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td width="246" valign="top">
    <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/left_product.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    
    
    <td valign="top"> 

    	<?php echo func_tag(array('t_id'=>"40",'html_type'=>"style2",'where'=>"p_id=".((string)$_smarty_tpl->tpl_vars['ci_uri']->value[3])),$_smarty_tpl);?>
 

    </td>
  </tr>
</table>


<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>