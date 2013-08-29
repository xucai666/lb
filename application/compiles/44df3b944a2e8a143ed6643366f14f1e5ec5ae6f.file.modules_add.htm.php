<?php /* Smarty version Smarty-3.1.14, created on 2013-08-29 03:37:39
         compiled from "application\templates\backend\blue\modules_add.htm" */ ?>
<?php /*%%SmartyHeaderCode:31480521ec203adf5f6-23989009%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '44df3b944a2e8a143ed6643366f14f1e5ec5ae6f' => 
    array (
      0 => 'application\\templates\\backend\\blue\\modules_add.htm',
      1 => 1376702177,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31480521ec203adf5f6-23989009',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dir_backend' => 0,
    'main' => 0,
    'subs' => 0,
    'detail' => 0,
    'k' => 0,
    'f_ids' => 0,
    'v' => 0,
    'query_types' => 0,
    'detail_total' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_521ec203e33c83_14129607',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_521ec203e33c83_14129607')) {function content_521ec203e33c83_14129607($_smarty_tpl) {?><?php if (!is_callable('smarty_function_ci_helper')) include 'E:\\phpnow\\htdocs\\lb\\application\\libraries\\Smarty-3.1.14\\libs\\plugins\\function.ci_helper.php';
if (!is_callable('smarty_function_html_options')) include 'E:\\phpnow\\htdocs\\lb\\application\\libraries\\Smarty-3.1.14\\libs\\plugins\\function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<fieldset>
<legend><div class="nav_title"><?php echo smarty_function_ci_helper(array('name'=>"language",'function'=>"lang",'param1'=>"modules_manage"),$_smarty_tpl);?>
</div></legend>


<form  name="form1" id="form1" method="post" action="<?php echo func_site_url(array('segments'=>'backend/modules/action_save'),$_smarty_tpl);?>
">
<table>
	

	<tr>
		<td><?php echo smarty_function_ci_helper(array('name'=>"language",'function'=>"lang",'param1'=>"modules_input_name"),$_smarty_tpl);?>
:</td>
		<td>
			<input size="80" type="text" name="main[m_name]" id="main[m_name]" value="<?php echo $_smarty_tpl->tpl_vars['main']->value['m_name'];?>
">
			<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

				echo form_error("main[m_name]","<span id='error_span'>","</span>");
			<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

		</td>
		<td></td>
	</tr>
	<tr>
		<td><?php echo lang("modules_input_sub_module");?>
:</td>
		<td>
			<select name="main[m_sub]">
				<option value=""><?php echo lang('modules_input_select');?>
</option>
				<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['subs']->value,'selected'=>$_smarty_tpl->tpl_vars['main']->value['m_sub']),$_smarty_tpl);?>

			</select>
		</td>
		<td></td>
	</tr>
	<tr>
		<td><?php echo lang('modules_input_tb');?>
：</td>
		<td>
			<textarea  name="main[m_tb]" ><?php echo $_smarty_tpl->tpl_vars['main']->value['m_tb'];?>
</textarea>
		<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

				echo form_error("main[m_tb]","<span id='error_span'>","</span>");
		<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

		</td>
		<td></td>
	</tr>
	<tr>
		<td><?php echo lang('modules_input_desc');?>
:</td>
		<td>
			<input size="80" type="text" name="main[m_desc]" value="<?php echo $_smarty_tpl->tpl_vars['main']->value['m_desc'];?>
">
			<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

				echo form_error("main[m_desc]","<span id='error_span'>","</span>");
			<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

		</td>
		<td></td>
	</tr>
	
	<tr>
		<td><?php echo lang('modules_input_related_fields');?>
:</td>
		<td>
			<table class="mytable">
				<thead>
					<tr>
						<th><?php echo lang('modules_input_field_type');?>
</th>
						<th><?php echo lang('modules_input_field_name');?>
</th>
						<th><?php echo lang('modules_input_field_alias');?>
</th>
						<th><?php echo lang('modules_input_field_length');?>
</th>
						<th><?php echo lang('modules_input_field_input_value');?>
</th>
						<th><?php echo lang('modules_input_field_output_value');?>
</th>
						<th><?php echo lang('modules_input_field_primary');?>
</th>
						<th><?php echo lang('modules_input_field_query_able');?>
</th>
						<th><?php echo lang('modules_input_field_valid');?>
</th>
						<th><?php echo lang('modules_input_field_desc');?>
</th>					
						<th><?php echo lang('modules_input_field_opt');?>
</th>					
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
					<td>
						<select name="detail[f_id][<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
]">
							<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['f_ids']->value,'selected'=>$_smarty_tpl->tpl_vars['v']->value['f_id']),$_smarty_tpl);?>

						</select>
						<?php echo ci_form_error(array('k'=>"detail[f_id][".((string)$_smarty_tpl->tpl_vars['k']->value)."]"),$_smarty_tpl);?>

					</td>
					<td><input type="text" name="detail[r_name][<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
]" value='<?php echo $_smarty_tpl->tpl_vars['v']->value['r_name'];?>
'>
						<?php echo ci_form_error(array('k'=>"detail[r_name][".((string)$_smarty_tpl->tpl_vars['k']->value)."]"),$_smarty_tpl);?>

					</td>	
					<td><input type="text" name="detail[r_alias][<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
]" value='<?php echo $_smarty_tpl->tpl_vars['v']->value['r_alias'];?>
'>
						<?php echo ci_form_error(array('k'=>"detail[r_alias][".((string)$_smarty_tpl->tpl_vars['k']->value)."]"),$_smarty_tpl);?>

					</td>
					<td><input type="text" size="5" onkeyup="value=this.value.replace(/\D+/g,'')"   name="detail[r_length][<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
]" maxlength="3" value='<?php echo (($tmp = @$_smarty_tpl->tpl_vars['v']->value['r_length'])===null||$tmp==='' ? 150 : $tmp);?>
'>
						<?php echo ci_form_error(array('k'=>"detail[r_length][".((string)$_smarty_tpl->tpl_vars['k']->value)."]"),$_smarty_tpl);?>

					</td>
					<td>
						<input type="text" size="5" name="detail[r_default][<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['v']->value['r_default'], ENT_QUOTES, 'UTF-8', true);?>
">
						
					</td>
					<td>
						<input type="text" size="5" name="detail[r_output][<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
]" value="<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['v']->value['r_output'])===null||$tmp==='' ? '' : $tmp), ENT_QUOTES, 'UTF-8', true);?>
">
						
					</td>
					<td>
						<input type="checkbox" class="primary" <?php if ($_smarty_tpl->tpl_vars['v']->value['r_primary']){?>checked<?php }?>   onclick="$(this).next().val($(this).prop('checked')==true?1:0);$('.primary').not(this).prop('checked',false).next().val(0);$('input.r_valid').not(this).show();$(this).parents('tr:first').find('.r_valid').css('display',$(this).prop('checked')?'none':'block');">	
						<input type="hidden" name="detail[r_primary][<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
]"  value="<?php echo $_smarty_tpl->tpl_vars['v']->value['r_primary'];?>
">

						
					</td>
					<td>
						
						<select name="detail[r_queryable][<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
]">
						<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['query_types']->value,'selected'=>$_smarty_tpl->tpl_vars['v']->value['r_queryable']),$_smarty_tpl);?>

						</select>
					</td>
					<td>

					<input type="text" class="r_valid" size="5" name="detail[r_valid][<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['r_valid'];?>
" style="display:<?php if ($_smarty_tpl->tpl_vars['v']->value['r_primary']){?>none<?php }?>">
						
					</td>
					<td><input type="text" name="detail[r_desc][<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['r_desc'];?>
">
						
					</td>
								
					<td>
					<input type="hidden" name="detail[r_id][<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['r_id'];?>
" />
					
					<a href="javascript:;"  target="_self" onclick="core_copy($(this),'input','')" class="link_add">&nbsp;</a>
					<a href="javascript:;"  id="delete_link"  class="link_del <?php if ($_smarty_tpl->tpl_vars['k']->value==0){?>hide<?php }?>"    target="_self" onclick="core_drop($(this))" >&nbsp;</a>

					</td>					
				</tr>
		<?php } ?>

			</table>
		</td>
		<td></td>
	</tr>

	
	<tr>
		<td colspan="3" align="center">
		<?php echo create_button(array('type'=>'save'),$_smarty_tpl);?>

		<input size="80" type="hidden" name="main[m_id]" value="<?php echo $_smarty_tpl->tpl_vars['main']->value['m_id'];?>
">
		<input type="hidden" id="total_detail" value="<?php echo $_smarty_tpl->tpl_vars['detail_total']->value;?>
" />	

	</td></tr>

</table>
</form>	
</fieldset>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>