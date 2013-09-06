<?php /* Smarty version Smarty-3.1.14, created on 2013-09-06 15:49:34
         compiled from "application\templates\backend\corcms\mdata_view_front.htm" */ ?>
<?php /*%%SmartyHeaderCode:1645229890eb28498-47809564%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a865fb7bea6998af17138795702d7e370b80c603' => 
    array (
      0 => 'application\\templates\\backend\\corcms\\mdata_view_front.htm',
      1 => 1378449120,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1645229890eb28498-47809564',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dir_backend' => 0,
    'theme' => 0,
    't_id' => 0,
    'primary' => 0,
    'id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5229890ebd2835_34566856',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5229890ebd2835_34566856')) {function content_5229890ebd2835_34566856($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<legend><div class="nav_title">模型数据&raquo;<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
</div></legend>

<?php echo func_tag(array('t_id'=>$_smarty_tpl->tpl_vars['t_id']->value,'where'=>((string)$_smarty_tpl->tpl_vars['primary']->value)."=".((string)$_smarty_tpl->tpl_vars['id']->value),'html_type'=>'detail'),$_smarty_tpl);?>
	
<div align="center"><?php echo create_button(array('type'=>'close','url'=>"javascript:window_close();"),$_smarty_tpl);?>
</div>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>