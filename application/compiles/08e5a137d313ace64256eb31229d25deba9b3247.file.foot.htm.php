<?php /* Smarty version Smarty-3.1.14, created on 2013-09-03 03:57:57
         compiled from "application\templates\backend\corcms\foot.htm" */ ?>
<?php /*%%SmartyHeaderCode:528552255e451b6002-83976745%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '08e5a137d313ace64256eb31229d25deba9b3247' => 
    array (
      0 => 'application\\templates\\backend\\corcms\\foot.htm',
      1 => 1378102531,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '528552255e451b6002-83976745',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'invoke' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52255e451cec53_61295910',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52255e451cec53_61295910')) {function content_52255e451cec53_61295910($_smarty_tpl) {?>
<div id="sys_base_url" class="hide"><?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
echo base_url();<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</div>

<?php echo $_smarty_tpl->tpl_vars['invoke']->value;?>

</body>
</html><?php }} ?>