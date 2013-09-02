<?php /* Smarty version Smarty-3.1.14, created on 2013-09-02 13:40:34
         compiled from "application\templates\backend\x6cms\admins_change_password.htm" */ ?>
<?php /*%%SmartyHeaderCode:316675224916bb288b4-41949615%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eebc2034ad5149032bd0208a4deba612cd0091fb' => 
    array (
      0 => 'application\\templates\\backend\\x6cms\\admins_change_password.htm',
      1 => 1378129222,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '316675224916bb288b4-41949615',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5224916bc59878_33101980',
  'variables' => 
  array (
    'dir_backend' => 0,
    'main' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5224916bc59878_33101980')) {function content_5224916bc59878_33101980($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="nav_title">修改密码</div>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

	
	echo form_open("backend/system_manage/save_pass");
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<table class="mytable" >
<tr><td class="right">用户名：</td><td class="left"><?php echo $_smarty_tpl->tpl_vars['main']->value['admin_user'];?>

<input type="hidden" name="main[admin_user]" value="<?php echo $_smarty_tpl->tpl_vars['main']->value['admin_user'];?>
">

</td></tr>
<tr><td class="right">旧密码：</td><td class="left"><input type="password" name="main[old_password]">
<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
 echo form_error("main[old_password]","<div id='error_span' class='red_font'>","</div>");<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


</td></tr>
<tr><td class="right">新密码：</td><td class="left"><input type="password" name="main[new_password]">
<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
 echo form_error("main[new_password]","<div id='error_span' class='red_font'>","</div>");<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

</td></tr>
<tr><td class="right">密码确认：</td><td class="left"><input type="password" name="main[confirm_password]">
<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
 echo form_error("main[confirm_password]","<div id='error_span' class='red_font'>","</div>");<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

</td></tr>
</table>
<center>

<input type="hidden" name="main[admin_id]" value="<?php echo $_smarty_tpl->tpl_vars['main']->value['admin_id'];?>
">

<?php echo create_button(array('type'=>'save'),$_smarty_tpl);?>



</center>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>