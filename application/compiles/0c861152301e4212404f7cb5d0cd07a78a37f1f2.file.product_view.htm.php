<?php /* Smarty version Smarty-3.1.14, created on 2013-09-04 12:36:01
         compiled from "application\templates\front\blue\en\product_view.htm" */ ?>
<?php /*%%SmartyHeaderCode:213065226b8b1ddfc22-41803026%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0c861152301e4212404f7cb5d0cd07a78a37f1f2' => 
    array (
      0 => 'application\\templates\\front\\blue\\en\\product_view.htm',
      1 => 1377119709,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '213065226b8b1ddfc22-41803026',
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
  'unifunc' => 'content_5226b8b1eaf412_42445020',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5226b8b1eaf412_42445020')) {function content_5226b8b1eaf412_42445020($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


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