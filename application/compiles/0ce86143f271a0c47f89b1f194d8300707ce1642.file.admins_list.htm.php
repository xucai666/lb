<?php /* Smarty version Smarty-3.1.14, created on 2013-09-01 00:09:27
         compiled from "application\templates\backend\blue\admins_list.htm" */ ?>
<?php /*%%SmartyHeaderCode:19071522285b7a87b84-09647129%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0ce86143f271a0c47f89b1f194d8300707ce1642' => 
    array (
      0 => 'application\\templates\\backend\\blue\\admins_list.htm',
      1 => 1376725480,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19071522285b7a87b84-09647129',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dir_backend' => 0,
    'lang_admins' => 0,
    'img_url' => 0,
    'lang_type' => 0,
    'list' => 0,
    'v' => 0,
    'group_options' => 0,
    'current_role_id' => 0,
    'current_admin_id' => 0,
    'page_link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_522285b7da0f88_86311061',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_522285b7da0f88_86311061')) {function content_522285b7da0f88_86311061($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="mytheme1" align="left" ><?php echo $_smarty_tpl->tpl_vars['lang_admins']->value['theme_manage'];?>
</div>

<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

	$attr  = array('method'=>'get');
	echo form_open("backend/admins/action_list",$attr);
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<div  align="right"><a href="<?php echo func_site_url(array('segments'=>'/backend/admins/action_add'),$_smarty_tpl);?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/add_<?php echo $_smarty_tpl->tpl_vars['lang_type']->value;?>
.png"  /></a></div>
<table  align="center" class="search" >
<tr>
	<td>
	<?php echo $_smarty_tpl->tpl_vars['lang_admins']->value['username'];?>
：
	</td>
	<td>
		<input type="text" name="admin_user"  value="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
 echo set_value(null,$_GET['admin_user']); <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
"/>
	</td>
	<td>
	<?php echo $_smarty_tpl->tpl_vars['lang_admins']->value['name'];?>
：
	</td>
	<td>
	<input type="text" name="name"  value="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
 echo set_value(null,$_GET['name']); <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
"/>
	</td>
	<td>
	<?php echo $_smarty_tpl->tpl_vars['lang_admins']->value['mobile'];?>
：
	</td>
	<td>
	<input type="text" name="mobile" value="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
 echo set_value(null,$_GET['mobile']); <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
"  />
	</td>

	<td>
	
		<?php echo create_button(array('type'=>'search'),$_smarty_tpl);?>

	</td>
</tr>
</table>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

	echo form_close();
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>



<table class="mytable" width="100%">
	<thead>
	<tr >
		<th><?php echo $_smarty_tpl->tpl_vars['lang_admins']->value['username'];?>
</th>
		<th><?php echo $_smarty_tpl->tpl_vars['lang_admins']->value['name'];?>
</th>
		<th><?php echo $_smarty_tpl->tpl_vars['lang_admins']->value['role'];?>
</th>
		<th><?php echo $_smarty_tpl->tpl_vars['lang_admins']->value['mobile'];?>
</th>
		<th><?php echo $_smarty_tpl->tpl_vars['lang_admins']->value['tel'];?>
</th>
		<th><?php echo $_smarty_tpl->tpl_vars['lang_admins']->value['qq'];?>
</th>
		<th><?php echo $_smarty_tpl->tpl_vars['lang_admins']->value['email'];?>
</th>
		<th><?php echo $_smarty_tpl->tpl_vars['lang_admins']->value['operate'];?>
</th>
	</tr>
	</thead>
	<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
	<tr class="tr_center">
		<td><?php echo $_smarty_tpl->tpl_vars['v']->value['admin_user'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['group_options']->value[$_smarty_tpl->tpl_vars['v']->value['group_id']]['role_name'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['v']->value['mobile'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['v']->value['tel'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['v']->value['qq'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['v']->value['email'];?>
</td>
		<td>
			<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
 
			\$attrs  = array(
				'class'=>'link_view',
				'target'=>'_blank',
			);
			echo anchor('backend/admins/action_view/'.\$template->tpl_vars["v"]->value["admin_id"],'&nbsp;',\$attrs);
			 <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

			

            	<?php if ($_smarty_tpl->tpl_vars['v']->value['group_id']>=$_smarty_tpl->tpl_vars['current_role_id']->value||$_smarty_tpl->tpl_vars['current_admin_id']->value==$_smarty_tpl->tpl_vars['v']->value['admin_id']){?>	
				<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
 				
				\$attrs  = array(
					'class'=>'link_mod',
				);
				echo anchor('backend/admins/action_add/'.\$template->tpl_vars["v"]->value["admin_id"],'&nbsp;',\$attrs);
				<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

				<a  href='<?php echo func_site_url(array('segments'=>"backend/admins/action_delete/".((string)$_smarty_tpl->tpl_vars['v']->value['admin_id'])),$_smarty_tpl);?>
' onclick="return confirm('<?php echo $_smarty_tpl->tpl_vars['lang_admins']->value['delete_confirm'];?>
')" class="link_del">&nbsp;</a>
                <?php }?>
           
			
			
		</td>
	
	</tr>
	<?php } ?>
</table>
<div class="margin_25 center">
	<?php echo $_smarty_tpl->tpl_vars['page_link']->value;?>

</div>
<div class="hide" id="dialog_delete" icon="icon-save" style="padding:5px;width:400px;height:150px;">
		<div class="center margin_25"><?php echo $_smarty_tpl->tpl_vars['lang_admins']->value['delete_confirm'];?>
</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>