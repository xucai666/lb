<?php /* Smarty version Smarty-3.1.14, created on 2013-09-05 12:19:17
         compiled from "application\templates\backend\corcms\mdata_add.htm" */ ?>
<?php /*%%SmartyHeaderCode:32305522806459b4ef5-65048716%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd63de435cc31a396d9e5fe1e2f375052c5f6e26e' => 
    array (
      0 => 'application\\templates\\backend\\corcms\\mdata_add.htm',
      1 => 1378168996,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32305522806459b4ef5-65048716',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dir_backend' => 0,
    'theme' => 0,
    'fields' => 0,
    'v' => 0,
    'html' => 0,
    'main' => 0,
    'dt_mid' => 0,
    'dt_fields' => 0,
    'item' => 0,
    'detail' => 0,
    'dt_primary' => 0,
    'k' => 0,
    'detail_total' => 0,
    'primary' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52280645ad8225_54555406',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52280645ad8225_54555406')) {function content_52280645ad8225_54555406($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="nav_title">模型数据&raquo;<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
</div>
<form  name="form1" id="form1" method="post" action="<?php echo func_site_url(array('segments'=>'backend/mdata/action_save'),$_smarty_tpl);?>
">
<table class="table_ctl" >
	<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['fields']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
	 <tr>
		<td  ><?php echo $_smarty_tpl->tpl_vars['v']->value['r_alias'];?>
：</td>
		<td>
			
		<?php echo func_vsprintf(array('html'=>$_smarty_tpl->tpl_vars['html']->value[$_smarty_tpl->tpl_vars['v']->value['f_id']],'name'=>"main[".((string)$_smarty_tpl->tpl_vars['v']->value['r_name'])."]",'value'=>htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['main']->value[$_smarty_tpl->tpl_vars['v']->value['r_name']])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['v']->value['r_default'] : $tmp), ENT_QUOTES, 'UTF-8', true)),$_smarty_tpl);?>

		<?php echo ci_form_error(array('k'=>"main[".((string)$_smarty_tpl->tpl_vars['v']->value['r_name'])."]"),$_smarty_tpl);?>

			
		</td>
		
	</tr>
	<?php } ?>

	<?php if ($_smarty_tpl->tpl_vars['dt_mid']->value){?>
	<tr>
		<td>附表：</td>
		<td>
			<table class="mytable">
				<thead>
					<tr>
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['dt_fields']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
						<th><?php echo $_smarty_tpl->tpl_vars['item']->value['r_alias'];?>
</th>
						<?php } ?>
										
						<th>操作</th>					
					</tr>
			    </thead>
				
				<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['detail']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
				<tr>
					
					
					<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['dt_fields']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
					<td>

			<?php echo func_vsprintf(array('html'=>$_smarty_tpl->tpl_vars['html']->value[$_smarty_tpl->tpl_vars['item']->value['f_id']],'name'=>"detail[".((string)$_smarty_tpl->tpl_vars['item']->value['r_name'])."][".((string)$_smarty_tpl->tpl_vars['k']->value)."]",'value'=>htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['v']->value[$_smarty_tpl->tpl_vars['item']->value['r_name']])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['item']->value['r_default'] : $tmp), ENT_QUOTES, 'UTF-8', true)),$_smarty_tpl);?>

					<?php echo ci_form_error(array('k'=>"detail[".((string)$_smarty_tpl->tpl_vars['item']->value['r_name'])."][".((string)$_smarty_tpl->tpl_vars['k']->value)."]"),$_smarty_tpl);?>


					</td>
					<?php } ?>
					
								
					<td>

					<input type="hidden" name="detail[<?php echo $_smarty_tpl->tpl_vars['dt_primary']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value[$_smarty_tpl->tpl_vars['dt_primary']->value];?>
" />
					
					<a href="javascript:;"  target="_self" onclick="core_copy($(this),'input','')" class="link_add">&nbsp;</a>
					<a href="javascript:;"  id="delete_link"  class="link_del <?php if ($_smarty_tpl->tpl_vars['k']->value==0){?>hide<?php }?>"    target="_self" onclick="core_drop($(this))" >&nbsp;</a>

					</td>					
				</tr>
		<?php } ?>


			</table>
			<input type="hidden" id="total_detail" value="<?php echo $_smarty_tpl->tpl_vars['detail_total']->value;?>
" />
		</td>
		
	</tr>
	<?php }?>
	<tr>
		<td colspan="2" align="center">
		<?php echo create_button(array('type'=>'save','ext'=>'style="display:none"'),$_smarty_tpl);?>

		
		<input size="80" type="hidden" name="main[<?php echo $_smarty_tpl->tpl_vars['primary']->value;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['main']->value[$_smarty_tpl->tpl_vars['primary']->value];?>
">
	</td></tr>

</table>
</form>	

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>