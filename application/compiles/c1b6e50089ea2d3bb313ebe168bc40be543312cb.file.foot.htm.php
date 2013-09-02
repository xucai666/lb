<?php /* Smarty version Smarty-3.1.14, created on 2013-09-02 13:21:15
         compiled from "application\templates\backend\x6cms\foot.htm" */ ?>
<?php /*%%SmartyHeaderCode:26006522490cb9d07e4-77427687%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c1b6e50089ea2d3bb313ebe168bc40be543312cb' => 
    array (
      0 => 'application\\templates\\backend\\x6cms\\foot.htm',
      1 => 1378102531,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26006522490cb9d07e4-77427687',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'invoke' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_522490cb9f5e96_74504714',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_522490cb9f5e96_74504714')) {function content_522490cb9f5e96_74504714($_smarty_tpl) {?>
<div id="sys_base_url" class="hide"><?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
echo base_url();<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</div>

<?php echo $_smarty_tpl->tpl_vars['invoke']->value;?>

</body>
</html><?php }} ?>