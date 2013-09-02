<?php /* Smarty version Smarty-3.1.14, created on 2013-09-02 14:42:06
         compiled from "application\templates\backend\x6cms\roles_list.htm" */ ?>
<?php /*%%SmartyHeaderCode:170615224a3be157363-40429070%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6b8d4ec64a669c7d86ec196c8512be29e9ae047c' => 
    array (
      0 => 'application\\templates\\backend\\x6cms\\roles_list.htm',
      1 => 1378101686,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '170615224a3be157363-40429070',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dir_backend' => 0,
    'lang_roles' => 0,
    'site_url' => 0,
    'img_url' => 0,
    'lang_type' => 0,
    'list' => 0,
    'v' => 0,
    'key' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5224a3be2b1311_15025808',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5224a3be2b1311_15025808')) {function content_5224a3be2b1311_15025808($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="nav_title" align="left" ><?php echo $_smarty_tpl->tpl_vars['lang_roles']->value['rights_config'];?>
</div>
<div  align="right"><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/backend/roles/action_add"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/add_<?php echo $_smarty_tpl->tpl_vars['lang_type']->value;?>
.png"  /></a></div>
<div class="search">
</div>
<table class="mytable">
	<thead>
	<tr >
		<th><?php echo $_smarty_tpl->tpl_vars['lang_roles']->value['role'];?>
</th>	
		<th><?php echo $_smarty_tpl->tpl_vars['lang_roles']->value['operate'];?>
</th>
	</tr>
</thead>
	<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
	<tr class="tr_center">
		<td ><?php echo $_smarty_tpl->tpl_vars['v']->value['role_name'];?>
</td>	
		<td>
		
		<?php if ($_smarty_tpl->tpl_vars['key']->value!=config_item("admin_role_id")){?>

			<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
 
			
			\$attrs  = array(
				'class'=>'link_mod',
			);
			echo anchor('backend/roles/action_add/'.\$template->tpl_vars['v']->value['role_id'],'&nbsp;',\$attrs);
			
			\$attrs  = array(
				'class'=>'link_del',
			);
			
			echo anchor('backend/roles/action_del/'.\$template->tpl_vars['v']->value['role_id'],'&nbsp;',\$attrs);
			
			
			 <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

			
		<?php }?>				
		</td>
	
	</tr>
	<?php } ?>
</table>
<div class="margin_25 center">
	<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
 echo $page_link;<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

</div>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>