<?php /* Smarty version Smarty-3.1.14, created on 2013-08-17 12:14:46
         compiled from "application\templates\backend\blue\mdata_list.htm" */ ?>
<?php /*%%SmartyHeaderCode:27752520f6936e64530-65581354%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fe333cb911d33c55256918497a4e010f83e199be' => 
    array (
      0 => 'application\\templates\\backend\\blue\\mdata_list.htm',
      1 => 1376730339,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27752520f6936e64530-65581354',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dir_backend' => 0,
    'theme' => 0,
    'img_url' => 0,
    'lang_type' => 0,
    'querys' => 0,
    'v' => 0,
    'k' => 0,
    'fields' => 0,
    'f' => 0,
    'list' => 0,
    'primary' => 0,
    'item' => 0,
    'page_link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_520f6937133163_97983227',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520f6937133163_97983227')) {function content_520f6937133163_97983227($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="nav_title">模型数据&raquo;<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
</div>
<div  align="right"><a href="<?php echo func_site_url(array('segments'=>'/backend/mdata/action_add'),$_smarty_tpl);?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/add_<?php echo $_smarty_tpl->tpl_vars['lang_type']->value;?>
.png"  /></a></div>
<?php if ($_smarty_tpl->tpl_vars['querys']->value){?>
<table class='search'>
	<tr><td>
		<form action='<?php echo func_site_url(array('segments'=>"backend/mdata/action_list"),$_smarty_tpl);?>
' method="get">
			<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['querys']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
				<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
:<?php echo func_vsprintf(array('html'=>$_smarty_tpl->tpl_vars['v']->value['html'],'name'=>$_smarty_tpl->tpl_vars['k']->value,'value'=>implode(',',(array)$_GET[$_smarty_tpl->tpl_vars['k']->value])),$_smarty_tpl);?>

			<?php } ?>
			<?php echo create_button(array('type'=>"search"),$_smarty_tpl);?>

		</form>
	</td></tr>
</table>
<?php }?>

  <form id="form2" method="post" action="<?php echo func_site_url(array('segments'=>'/backend/mdata/action_del'),$_smarty_tpl);?>
" onsubmit="return chkdel2();">   
<table class='mytable'>
	<thead>
<tr>
	<th>
		<?php echo create_button(array('type'=>'delete','ext'=>''),$_smarty_tpl);?>
		
		<input type="checkbox" id="chkall"  value="1" onclick="CheckAll(this.form);">
	</th>
	
	<?php  $_smarty_tpl->tpl_vars['f'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['f']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['fields']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['f']->key => $_smarty_tpl->tpl_vars['f']->value){
$_smarty_tpl->tpl_vars['f']->_loop = true;
?>	
	<th><?php echo $_smarty_tpl->tpl_vars['f']->value['r_alias'];?>
</th>
	<?php } ?>	
	
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
		<input type="checkbox" class="ids"  name="<?php echo $_smarty_tpl->tpl_vars['primary']->value;?>
[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['primary']->value];?>
">
	</td>
	
	<?php  $_smarty_tpl->tpl_vars['f'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['f']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['fields']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['f']->key => $_smarty_tpl->tpl_vars['f']->value){
$_smarty_tpl->tpl_vars['f']->_loop = true;
?>	
	<td><?php echo $_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['f']->value['r_name']];?>
</td>
	<?php } ?>	
	<td>
			<?php echo ci_anchor(array('segment'=>"backend/mdata/action_add/".((string)$_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['primary']->value]),'attrs'=>"class:link_mod"),$_smarty_tpl);?>

			<?php echo ci_anchor(array('segment'=>"backend/mdata/action_del/".((string)$_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['primary']->value]),'attrs'=>"class:link_del,onclick:return confirm('确定删除?');"),$_smarty_tpl);?>


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