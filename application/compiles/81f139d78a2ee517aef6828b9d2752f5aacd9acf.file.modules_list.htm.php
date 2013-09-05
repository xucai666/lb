<?php /* Smarty version Smarty-3.1.14, created on 2013-09-05 12:20:10
         compiled from "application\templates\backend\corcms\modules_list.htm" */ ?>
<?php /*%%SmartyHeaderCode:8495228067a1f4073-65924588%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '81f139d78a2ee517aef6828b9d2752f5aacd9acf' => 
    array (
      0 => 'application\\templates\\backend\\corcms\\modules_list.htm',
      1 => 1376757027,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8495228067a1f4073-65924588',
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
  'unifunc' => 'content_5228067a2bf6b7_62609685',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5228067a2bf6b7_62609685')) {function content_5228067a2bf6b7_62609685($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="nav_title">模型管理</div>
<div  align="right"><a href="<?php echo func_site_url(array('segments'=>'/backend/modules/action_add'),$_smarty_tpl);?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/add_<?php echo $_smarty_tpl->tpl_vars['lang_type']->value;?>
.png"  /></a></div>

<div class='search'>
	
		<form action='<?php echo func_site_url(array('segments'=>"backend/modules/action_list"),$_smarty_tpl);?>
' method="get">
			<li>
			模块名称：
			<input type="text" name="m_name" value="<?php echo $_GET['m_name'];?>
">			
			数据表：
			<input type="text" name="m_tb" value="<?php echo $_GET['m_tb'];?>
">
			</li>
			<li><?php echo create_button(array('type'=>"search"),$_smarty_tpl);?>
</li>
		</form>
	
</div>

  <form id="form2" method="post" action="<?php echo func_site_url(array('segments'=>'/backend/modules/action_del'),$_smarty_tpl);?>
" onsubmit="return chkdel2();">   
<table class='mytable'>
	<thead>
<tr>
	<th class="float_left">
		<input type="checkbox" id="chkall"  value="1" onclick="CheckAll(this.form);">
		<?php echo create_button(array('type'=>'delete','ext'=>''),$_smarty_tpl);?>

	</th>
	<th>编号</th>
	<th>模型名称</th>
	<th>数据表</th>
	<th>模块介绍</th>
	<th>锁定</th>
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
		<input type="checkbox" class="ids"  name="m_id[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['m_id'];?>
">
	</td>
	<td><?php echo $_smarty_tpl->tpl_vars['item']->value['m_id'];?>
</td>
	<td><?php echo $_smarty_tpl->tpl_vars['item']->value['m_name'];?>
</td>
	<td><?php echo $_smarty_tpl->tpl_vars['item']->value['m_tb'];?>
</td>
	<td><?php echo $_smarty_tpl->tpl_vars['item']->value['m_desc'];?>
</td>
	<td>
		<a href="javascript:;" class="<?php echo func_state(array('state'=>(($tmp = @$_smarty_tpl->tpl_vars['item']->value['m_lock'])===null||$tmp==='' ? 0 : $tmp)),$_smarty_tpl);?>
" onclick="$.when(ajax_change_state(this,'module','m_id','<?php echo $_smarty_tpl->tpl_vars['item']->value['m_id'];?>
','m_lock')).then(function(x){ajax_change_val('system_rights','r_title','<?php echo $_smarty_tpl->tpl_vars['item']->value['m_name'];?>
','r_display',x==1?0:1)}).done(function(){location.reload()});">&nbsp;</a>

		


</td>
	<td align='center'>
			<?php if (!$_smarty_tpl->tpl_vars['item']->value['m_lock']){?>
			<?php echo ci_anchor(array('segment'=>"backend/modules/action_add/".((string)$_smarty_tpl->tpl_vars['item']->value['m_id']),'title'=>"&nbsp;",'attrs'=>"class:link_mod"),$_smarty_tpl);?>

			<?php echo ci_anchor(array('segment'=>"backend/modules/action_del/".((string)$_smarty_tpl->tpl_vars['item']->value['m_id']),'title'=>"&nbsp;",'attrs'=>"class:link_del,onclick:return confirm('确定删除?');"),$_smarty_tpl);?>

			<?php }?>
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