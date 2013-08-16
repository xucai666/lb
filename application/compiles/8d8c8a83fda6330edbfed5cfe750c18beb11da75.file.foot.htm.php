<?php /* Smarty version Smarty-3.1.14, created on 2013-08-16 02:50:41
         compiled from "application\templates\backend\blue\foot.htm" */ ?>
<?php /*%%SmartyHeaderCode:31502520d93814297d3-56555222%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8d8c8a83fda6330edbfed5cfe750c18beb11da75' => 
    array (
      0 => 'application\\templates\\backend\\blue\\foot.htm',
      1 => 1375420143,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31502520d93814297d3-56555222',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'invoke' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_520d93814bf582_01866836',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520d93814bf582_01866836')) {function content_520d93814bf582_01866836($_smarty_tpl) {?>
<div id="sys_base_url" class="hide"><?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
echo base_url();<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</div>

<?php echo $_smarty_tpl->tpl_vars['invoke']->value;?>

</body>
</html><?php }} ?>