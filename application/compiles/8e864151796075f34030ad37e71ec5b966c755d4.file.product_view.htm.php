<?php /* Smarty version Smarty-3.1.14, created on 2013-09-06 15:38:03
         compiled from "application\templates\front\corcms\zh\product_view.htm" */ ?>
<?php /*%%SmartyHeaderCode:118505229865b9564a9-78891943%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8e864151796075f34030ad37e71ec5b966c755d4' => 
    array (
      0 => 'application\\templates\\front\\corcms\\zh\\product_view.htm',
      1 => 1377932357,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '118505229865b9564a9-78891943',
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
  'unifunc' => 'content_5229865b9e8953_11661558',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5229865b9e8953_11661558')) {function content_5229865b9e8953_11661558($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<table width="992" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td width="246" valign="top">
    <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/left_product.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    
    
    <td valign="top" > 

    	<?php echo func_tag(array('t_id'=>"40",'html_type'=>"style2",'where'=>"p_id=".((string)$_smarty_tpl->tpl_vars['ci_uri']->value[3])),$_smarty_tpl);?>
 

    </td>
  </tr>
</table>


<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>