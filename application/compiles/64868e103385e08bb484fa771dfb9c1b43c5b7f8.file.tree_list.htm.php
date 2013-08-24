<?php /* Smarty version Smarty-3.1.14, created on 2013-08-24 04:58:24
         compiled from "application\templates\backend\blue\tree_list.htm" */ ?>
<?php /*%%SmartyHeaderCode:2292952183d70bd0eb6-84005026%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '64868e103385e08bb484fa771dfb9c1b43c5b7f8' => 
    array (
      0 => 'application\\templates\\backend\\blue\\tree_list.htm',
      1 => 1375931727,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2292952183d70bd0eb6-84005026',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dir_backend' => 0,
    'img_url' => 0,
    'lang_type' => 0,
    'list' => 0,
    'item' => 0,
    'page_link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52183d70df44a8_82607953',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52183d70df44a8_82607953')) {function content_52183d70df44a8_82607953($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="nav_title">分类管理</div>
<div  align="right"><a href="<?php echo func_site_url(array('segments'=>'/backend/tree/action_add'),$_smarty_tpl);?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/add_<?php echo $_smarty_tpl->tpl_vars['lang_type']->value;?>
.png"  /></a></div>

<table class='search'>
	<tr><td>
		<form action='<?php echo func_site_url(array('segments'=>"backend/tree/action_list"),$_smarty_tpl);?>
' method="get">
			
			分类名称：
			<input type="text" name="name" value="<?php echo $_GET['name'];?>
">
			
			<?php echo create_button(array('type'=>"search"),$_smarty_tpl);?>

		</form>
	</td></tr>
</table>

  <form id="form2" method="post" action="<?php echo func_site_url(array('segments'=>'/backend/tree/action_del'),$_smarty_tpl);?>
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
	<th>Pid</th>
	<th>操作</th>

</tr>
	</thead>
<tbody>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>	
<?php if ($_smarty_tpl->tpl_vars['item']->value['pid']==0){?>
<?php continue 1?>
<?php }?>
<tr>
	<td>
		<input type="checkbox" class="ids"  name="id[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
	</td>
	<td><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
	<td><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</td>
	<td><?php echo $_smarty_tpl->tpl_vars['item']->value['pid'];?>
</td>
	<td align='center'>
		<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
		

			\$attrs  = array(
				"class"=>"link_mod",
			);
			echo anchor("backend/tree/action_add/".\$template->tpl_vars['item']->value['id'],"&nbsp;",\$attrs);
			
			\$attrs  = array(
				"class"=>"link_del",
				"onclick"=>"return confirm('确定删除?');",
			);
			
			echo anchor("backend/tree/action_del/".\$template->tpl_vars['item']->value['id'],"&nbsp;",\$attrs);
			
			
			<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


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