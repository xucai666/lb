<?php /* Smarty version Smarty-3.1.14, created on 2013-09-05 08:52:13
         compiled from "application\templates\backend\corcms\mdata_select.htm" */ ?>
<?php /*%%SmartyHeaderCode:155725227d5bd03f9d5-75705396%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e10c60df58fbbd1209423e81a78b383b4d022b45' => 
    array (
      0 => 'application\\templates\\backend\\corcms\\mdata_select.htm',
      1 => 1375537307,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '155725227d5bd03f9d5-75705396',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dir_backend' => 0,
    'list' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5227d5bd0a23f4_88993689',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5227d5bd0a23f4_88993689')) {function content_5227d5bd0a23f4_88993689($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="nav_title">模型数据</div>


  
<table class='mytable'>
	<thead>
<tr>
	<th>
	请选择
	</th>
	
	

</tr>
	</thead>
<tbody>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>	
<tr>
	<td>
		<a href="<?php echo func_site_url(array('segments'=>"backend/mdata/action_set_module/".((string)$_smarty_tpl->tpl_vars['item']->value['m_id'])),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['m_name'];?>
<<?php echo $_smarty_tpl->tpl_vars['item']->value['m_stat'];?>
></a>
	</td>
	
</tr>
<?php } ?>
</tbody>	
</table>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>