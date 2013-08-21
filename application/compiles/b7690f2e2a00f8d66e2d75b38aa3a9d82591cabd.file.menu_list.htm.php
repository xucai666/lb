<?php /* Smarty version Smarty-3.1.14, created on 2013-08-21 08:19:11
         compiled from "application\templates\backend\blue\menu_list.htm" */ ?>
<?php /*%%SmartyHeaderCode:32499521477ff7cd6e9-00814478%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b7690f2e2a00f8d66e2d75b38aa3a9d82591cabd' => 
    array (
      0 => 'application\\templates\\backend\\blue\\menu_list.htm',
      1 => 1376922166,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32499521477ff7cd6e9-00814478',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dir_backend' => 0,
    'lang_menu' => 0,
    'site_url' => 0,
    'img_url' => 0,
    'lang_type' => 0,
    'lang_sys' => 0,
    'item_lang' => 0,
    'list' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_521477ff8eef84_38182529',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_521477ff8eef84_38182529')) {function content_521477ff8eef84_38182529($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="nav_title" align="left" ><?php echo $_smarty_tpl->tpl_vars['lang_menu']->value['menu']['list'];?>
</div>
<div  align="right"><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/backend/menu/action_add"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/add_<?php echo $_smarty_tpl->tpl_vars['lang_type']->value;?>
.png"  /></a></div>
<div class="search">
</div>
<table class="mytable">
	<thead>
	<tr >
		<th><?php echo $_smarty_tpl->tpl_vars['lang_sys']->value['menu']['label_menu'];?>
</th>	
		<th><?php echo $_smarty_tpl->tpl_vars['item_lang']->value['operate'];?>
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
		<td  class="td_left"><a href="javascript:;" class="link_indent_<?php echo $_smarty_tpl->tpl_vars['v']->value['r_level'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['r_title'];?>
</a></td>	
		<td>
			<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
		

			\$attrs  = array(
				"class"=>"link_mod",
			);
			echo anchor("backend/menu/action_add/".\$template->tpl_vars["v"]->value["r_id"],"&nbsp;",\$attrs);
			
			\$attrs  = array(
				"class"=>"link_del",
				"onclick"=>"return confirm('确定删除?');",
			);
			
			echo anchor("backend/menu/action_del/".\$template->tpl_vars["v"]->value["r_id"],"&nbsp;",\$attrs);
			
			
			<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


			<?php echo anchor("backend/menu/action_add?pid=".((string)$_smarty_tpl->tpl_vars['v']->value['r_id']),"&nbsp;","class='link_add'");?>

			
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