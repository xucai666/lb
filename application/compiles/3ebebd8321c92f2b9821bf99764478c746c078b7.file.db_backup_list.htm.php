<?php /* Smarty version Smarty-3.1.14, created on 2013-09-02 13:23:53
         compiled from "application\templates\backend\x6cms\db_backup_list.htm" */ ?>
<?php /*%%SmartyHeaderCode:8941522491697efe01-23066891%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3ebebd8321c92f2b9821bf99764478c746c078b7' => 
    array (
      0 => 'application\\templates\\backend\\x6cms\\db_backup_list.htm',
      1 => 1376725558,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8941522491697efe01-23066891',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dir_backend' => 0,
    'site_url' => 0,
    'files' => 0,
    'key' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52249169958dd5_93868988',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52249169958dd5_93868988')) {function content_52249169958dd5_93868988($_smarty_tpl) {?><?php if (!is_callable('smarty_function_math')) include 'E:\\phpnow\\htdocs\\lb\\application\\libraries\\Smarty-3.1.14\\libs\\plugins\\function.math.php';
if (!is_callable('smarty_modifier_date_format')) include 'E:\\phpnow\\htdocs\\lb\\application\\libraries\\Smarty-3.1.14\\libs\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="nav_title" align="left" >数据库备份</div>


<div style='margin:20px 20px 20px 20px;'>&gt&gt<a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/backend/system_manage/db_backup">点此立即备份</a></div>


<div style='width:500px;height:300px;overflow:auto'>

  

<table class="mytable">
	<thead>
	<tr>
		<th>序号</th>
		<th>文件名</th>
		<th>大小</th>
		<th>日期</th>
	</tr>
</thead>
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['files']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['foo']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['foo']['index']++;
?>
	<tr>
		<td align='center'><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['foo']['index']+1;?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
</td>
		<td align='center'><?php echo smarty_function_math(array('equation'=>"round(x,2)",'x'=>((string)$_smarty_tpl->tpl_vars['item']->value['size']/1024/1024)),$_smarty_tpl);?>
 M</td>
		<td align='center'><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['date'],"%Y-%m-%d");?>
</td>
	</tr>
	<?php } ?>
</table>
</div>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>