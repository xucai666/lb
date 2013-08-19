<?php /* Smarty version Smarty-3.1.14, created on 2013-08-19 04:05:15
         compiled from "application\templates\backend\blue\fields_view.htm" */ ?>
<?php /*%%SmartyHeaderCode:139405211997bc98c76-39537045%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '014fbf68b25924898c6a9c38eaf955b95b1fa3c7' => 
    array (
      0 => 'application\\templates\\backend\\blue\\fields_view.htm',
      1 => 1376004585,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '139405211997bc98c76-39537045',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dir_backend' => 0,
    'main' => 0,
    'fields_types' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5211997bd3d942_24125749',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5211997bd3d942_24125749')) {function content_5211997bd3d942_24125749($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<center>
<div class="nav_title" style="width:60%;text-align:left;">HTML字段效果预览</div>
<table class="mytable" style="width:60%;" >
	<tr>
		<td>字段类型：</td>
		<td>
			
			<?php echo $_smarty_tpl->tpl_vars['fields_types']->value[$_smarty_tpl->tpl_vars['main']->value['f_type']];?>

		</td>
		
	</tr>

	<tr>
		<td>字段名称：</td>
		<td>
			<?php echo $_smarty_tpl->tpl_vars['main']->value['f_name'];?>

		</td>
		
	</tr>
	<tr>
		<td style="width:150px">html代码预览：</td>
		<td style="height:350px;">
			<?php echo func_tag_input_html(array('f_id'=>$_smarty_tpl->tpl_vars['main']->value['f_id'],'name'=>"name",'value'=>"value"),$_smarty_tpl);?>

		
		</td>
		
	</tr>
	
	<tr>
		<td colspan="3" align="center">
		<?php echo create_button(array('type'=>'close','ext'=>"onclick='window.close();';"),$_smarty_tpl);?>

		
	</td></tr>
	

</table>
</center>



<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>