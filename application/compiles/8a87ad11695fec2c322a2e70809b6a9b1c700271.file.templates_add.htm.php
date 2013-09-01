<?php /* Smarty version Smarty-3.1.14, created on 2013-09-01 01:25:26
         compiled from "application\templates\backend\blue\templates_add.htm" */ ?>
<?php /*%%SmartyHeaderCode:284505222978603f912-02152654%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a87ad11695fec2c322a2e70809b6a9b1c700271' => 
    array (
      0 => 'application\\templates\\backend\\blue\\templates_add.htm',
      1 => 1376792720,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '284505222978603f912-02152654',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dir_backend' => 0,
    'template_types' => 0,
    'main' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_522297862243e6_50587955',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_522297862243e6_50587955')) {function content_522297862243e6_50587955($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include 'E:\\phpnow\\htdocs\\lb\\application\\libraries\\Smarty-3.1.14\\libs\\plugins\\function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<fieldset>
<legend><div class="nav_title">模板维护</div></legend>

<form  name="form1" id="form1" method="post" action="<?php echo func_site_url(array('segments'=>'backend/templates/action_save'),$_smarty_tpl);?>
">
<table>
	<tr>
		<td>模板分类：</td>
		<td>
			<select name="main[t_type]">
				<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['template_types']->value,'selected'=>$_smarty_tpl->tpl_vars['main']->value['t_type']),$_smarty_tpl);?>

			</select>
			<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

				echo form_error("main[t_type]","<span id='error_span'>","</span>");
			<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

		</td>
		<td></td>
	</tr>

	<tr>
		<td>名称：</td>
		<td>
			<input size="80" type="text" name="main[t_name]" id="main[t_name]" value="<?php echo $_smarty_tpl->tpl_vars['main']->value['t_name'];?>
">
			<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

				echo form_error("main[t_name]","<span id='error_span'>","</span>");
			<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

		</td>
		<td></td>
	</tr>
	<tr>
		<td>模板代码：</td>
		<td>
			




		 <div id="tab_area">
    
    	
        <ul class="tabs">
            <li><a href="javascript:;" title="content_1" class="tab active">列表页</a></li>
            <li><a href="javascript:;" title="content_2" class="tab">内页</a></li>
            <li><a href="javascript:;" title="content_3" class="tab">样式1</a></li>
            <li><a href="javascript:;" title="content_4" class="tab">样式2</a></li>
            <li><a href="javascript:;" title="content_5" class="tab">样式3</a></li>
            <li><a href="javascript:;" title="content_6" class="tab">样式4</a></li>
        </ul>
        
        <div id="content_1" class="content">
        	<textarea  name="main[t_html]" class='tag_textarea'><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['main']->value['t_html'], ENT_QUOTES, 'UTF-8', true);?>
</textarea>
		<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

				echo form_error("main[t_html]","<span id='error_span'>","</span>");
		<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>




        </div>
        <div id="content_2" class="content">
        	<textarea  name="main[t_html_detail]"  class='tag_textarea'><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['main']->value['t_html_detail'], ENT_QUOTES, 'UTF-8', true);?>
</textarea>
		<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

				echo form_error("main[t_html_detail]","<span id='error_span'>","</span>");
		<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>




        </div>
    	 <div id="content_3" class="content">
        	<textarea  name="main[t_html_style1]" class='tag_textarea' ><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['main']->value['t_html_style1'], ENT_QUOTES, 'UTF-8', true);?>
</textarea>		
        </div>    	 
        <div id="content_4" class="content">
        	<textarea  name="main[t_html_style2]"  class='tag_textarea'><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['main']->value['t_html_style2'], ENT_QUOTES, 'UTF-8', true);?>
</textarea>		
        </div>       
         <div id="content_5" class="content">
        	<textarea  name="main[t_html_style3]" class='tag_textarea'><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['main']->value['t_html_style3'], ENT_QUOTES, 'UTF-8', true);?>
</textarea>		
        </div>        
        <div id="content_6" class="content">
        	<textarea  name="main[t_html_style4]" class='tag_textarea'><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['main']->value['t_html_style4'], ENT_QUOTES, 'UTF-8', true);?>
</textarea>		
        </div>
    
    </div>



		</td>
		<td>（如：%name,%value，有几个字段就写几个）</td>
	</tr>
	<tr>
		<td>表格名称：</td>
		<td>
			<input size="80" type="text" name="main[t_db_name]" value="<?php echo $_smarty_tpl->tpl_vars['main']->value['t_db_name'];?>
">
			<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

				echo form_error("main[t_db_name]","<span id='error_span'>","</span>");
			<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

		</td>
		<td>（如：infos as a）</td>
	</tr>
	<tr>
		<td>查询字段：</td>
		<td>
			<input size="80" type="text" name="main[t_db_fields]" value="<?php echo $_smarty_tpl->tpl_vars['main']->value['t_db_fields'];?>
">
			<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

				echo form_error("main[t_db_fields]","<span id='error_span'>","</span>");
			<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

		</td>
		<td>（如：a.info_id,a.info_title,a.info_content,a.info_date）</td>
	</tr>
	<tr>
		<td>联合查询：</td>
		<td>
			<input size="80" type="text" name="main[t_db_join]" value="<?php echo $_smarty_tpl->tpl_vars['main']->value['t_db_join'];?>
">
			<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

				echo form_error("main[t_db_join]","<span id='error_span'>","</span>");
			<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

		</td>
		<td>（如：admins as b,b.admin_id=a.info_user,left;admins as c,c.admin_id=a.info_user,left）</td>
	</tr>
	<tr>
		<td>查询条件：</td>
		<td>
			<input size="80" type="text" name="main[t_db_where]" value="<?php echo $_smarty_tpl->tpl_vars['main']->value['t_db_where'];?>
">
			
			<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

				echo form_error("main[t_db_where]","<span id='error_span'>","</span>");
			<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


		</td>
		<td></td>
	</tr>
	<tr>
		<td>分组查询：</td>
		<td>
			<input size="80" type="text" name="main[t_db_group]" value="<?php echo $_smarty_tpl->tpl_vars['main']->value['t_db_group'];?>
">
			<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

				echo form_error("main[t_db_group]","<span id='error_span'>","</span>");
			<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

		</td>
		<td></td>
	</tr>
	<tr>
		<td>排序：</td>
		<td>
			<input size="80" type="text" name="main[t_db_order]" value="<?php echo $_smarty_tpl->tpl_vars['main']->value['t_db_order'];?>
">
			<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

				echo form_error("main[t_db_order]","<span id='error_span'>","</span>");
			<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

		</td>
		<td>（如：a.info_title asc,a.info_order desc）</td>
	</tr>
	<tr>
		<td>查询记录数：</td>
		<td>
			<input size="80" type="text" name="main[t_db_limit]" value="<?php echo $_smarty_tpl->tpl_vars['main']->value['t_db_limit'];?>
">
			<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

				echo form_error("main[t_db_limit]","<span id='error_span'>","</span>");
			<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

		</td>
		<td></td>
	</tr>
	
	
	<tr>
		<td colspan="3" align="center">
		<?php echo create_button(array('type'=>'save'),$_smarty_tpl);?>

		<input size="80" type="hidden" name="main[t_id]" value="<?php echo $_smarty_tpl->tpl_vars['main']->value['t_id'];?>
">
	</td></tr>

</table>
</form>	

   




</fieldset>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>