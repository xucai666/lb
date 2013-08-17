<?php /* Smarty version Smarty-3.1.14, created on 2013-08-17 15:47:37
         compiled from "application\templates\backend\blue\templates_list.htm" */ ?>
<?php /*%%SmartyHeaderCode:19460520f9b19431a86-92519364%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e60bcf59e69d115b26c4b5d08a772351bb5ab0d1' => 
    array (
      0 => 'application\\templates\\backend\\blue\\templates_list.htm',
      1 => 1376019223,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19460520f9b19431a86-92519364',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dir_backend' => 0,
    'img_url' => 0,
    'lang_type' => 0,
    'template_types' => 0,
    'list' => 0,
    'item' => 0,
    'page_link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_520f9b195f0fb5_66170527',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520f9b195f0fb5_66170527')) {function content_520f9b195f0fb5_66170527($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include 'E:\\phpnow\\htdocs\\lb\\application\\libraries\\Smarty-3.1.14\\libs\\plugins\\function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="nav_title">模板管理</div>
<div  align="right"><a href="<?php echo func_site_url(array('segments'=>'/backend/templates/action_add'),$_smarty_tpl);?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/add_<?php echo $_smarty_tpl->tpl_vars['lang_type']->value;?>
.png"  /></a></div>

<table class='search'>
	<tr><td>
		<form action='<?php echo func_site_url(array('segments'=>"backend/templates/action_list"),$_smarty_tpl);?>
' method="get">
			模板分类：
			<select name="t_type">
				<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['template_types']->value,'selected'=>$_GET['t_type']),$_smarty_tpl);?>

			</select>

			模板名称：
			<input type="text" name="t_name" value="<?php echo $_GET['t_name'];?>
">
			表格：
			<input type="text" name="t_db_name" value="<?php echo $_GET['t_db_name'];?>
">
			<?php echo create_button(array('type'=>"search"),$_smarty_tpl);?>

		</form>
	</td></tr>
</table>

  <form id="form2" method="post" action="<?php echo func_site_url(array('segments'=>'/backend/templates/action_del'),$_smarty_tpl);?>
" onsubmit="return chkdel2();">   
<table class='mytable'>
	<thead>
<tr>
	<th>
		<?php echo create_button(array('type'=>'delete','ext'=>''),$_smarty_tpl);?>
		
		<input type="checkbox" id="chkall"  value="1" onclick="CheckAll(this.form);">
	</th>
	<th>编号</th>
	<th>名称</th>
	<th>分类</th>
	<th>数据表</th>
	<th>操作</th>

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
		<input type="checkbox" class="ids"  name="t_id[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['t_id'];?>
">
	</td>
	<td><?php echo $_smarty_tpl->tpl_vars['item']->value['t_id'];?>
</td>
	<td><?php echo $_smarty_tpl->tpl_vars['item']->value['t_name'];?>
</td>
	<td><?php echo $_smarty_tpl->tpl_vars['template_types']->value[$_smarty_tpl->tpl_vars['item']->value['t_type']];?>
</td>
	<td><?php echo $_smarty_tpl->tpl_vars['item']->value['t_db_name'];?>
</td>
	<td align='center'>
		<?php echo ci_anchor(array('segment'=>"backend/templates/action_copy/".((string)$_smarty_tpl->tpl_vars['item']->value['t_id']),'attrs'=>"class:link_copy",'title'=>"&nbsp;"),$_smarty_tpl);?>

		<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
		

			\$attrs  = array(
				"class"=>"link_mod",
			);
			echo anchor("backend/templates/action_add/".\$template->tpl_vars['item']->value['t_id'],"&nbsp;",\$attrs);
			
			\$attrs  = array(
				"class"=>"link_del",
				"onclick"=>"return confirm('确定删除?');",
			);
			
			echo anchor("backend/templates/action_del/".\$template->tpl_vars['item']->value['t_id'],"&nbsp;",\$attrs);
			
			
			<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

			<?php echo ci_anchor(array('segment'=>"backend/templates/action_view/".((string)$_smarty_tpl->tpl_vars['item']->value['t_id']),'title'=>"&nbsp;",'attrs'=>"target:_blank,class:link_view"),$_smarty_tpl);?>



	</td>
</tr>
<?php } ?>
</tbody>	
</table>
</form>
<div class="page_link">
	<?php echo $_smarty_tpl->tpl_vars['page_link']->value;?>

</div>

<script language="JavaScript">
	//删除确认
	function chkdel2(){
		if($('.ids:checked').size()>0){
			if(confirm('确定删除?')){
				return true;
			}else{
				return false;	
			}
			
		}else{
			alert('请选择');	
			return false;
		}
	}
</script>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>