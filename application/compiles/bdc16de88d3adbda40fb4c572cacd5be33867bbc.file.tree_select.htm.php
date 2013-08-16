<?php /* Smarty version Smarty-3.1.14, created on 2013-08-16 04:26:34
         compiled from "application\templates\backend\blue\tree_select.htm" */ ?>
<?php /*%%SmartyHeaderCode:29520520da9fa1d71e7-74045889%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bdc16de88d3adbda40fb4c572cacd5be33867bbc' => 
    array (
      0 => 'application\\templates\\backend\\blue\\tree_select.htm',
      1 => 1375707407,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29520520da9fa1d71e7-74045889',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dir_backend' => 0,
    'treeIds' => 0,
    'key' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_520da9fa42f5e5_92786723',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520da9fa42f5e5_92786723')) {function content_520da9fa42f5e5_92786723($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['treeIds']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>	
<tr>
	<td>
		<a href="<?php echo func_site_url(array('segments'=>"backend/tree/action_root_set/".((string)$_smarty_tpl->tpl_vars['key']->value)),$_smarty_tpl);?>
">
			<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</a>
	</td>
	
</tr>
<?php } ?>
</tbody>	
</table>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>