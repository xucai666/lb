<?php /* Smarty version Smarty-3.1.14, created on 2013-09-02 14:02:44
         compiled from "application\templates\backend\blue\helper_docs.htm" */ ?>
<?php /*%%SmartyHeaderCode:1769852249a8499d190-56666942%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ef6fa5509779d36ede1470e7bd837651b99636fc' => 
    array (
      0 => 'application\\templates\\backend\\blue\\helper_docs.htm',
      1 => 1375420055,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1769852249a8499d190-56666942',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dir_backend' => 0,
    'ls' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52249a84a8c4e2_61004203',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52249a84a8c4e2_61004203')) {function content_52249a84a8c4e2_61004203($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="nav_title">帮助文档</div>



<form id="form2" method="post" >   
<table class='mytable'>
	<thead>
<tr>
	
	
	<th>文件名</th>
	

</tr>
	</thead>
<tbody>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ls']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>	
<tr>
	
	<td>

		<?php echo ci_anchor(array('segment'=>"docs/".((string)$_smarty_tpl->tpl_vars['item']->value['name']),'attrs'=>"target:".((string)$_smarty_tpl->tpl_vars['item']->value['target']),'title'=>$_smarty_tpl->tpl_vars['item']->value['name']),$_smarty_tpl);?>

	</td>
	
</tr>
<?php } ?>
</tbody>	
</table>

</form>


<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>