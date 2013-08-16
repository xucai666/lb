<?php /* Smarty version Smarty-3.1.14, created on 2013-08-15 10:07:33
         compiled from "application\templates\backend\blue\engage_apply_list.htm" */ ?>
<?php /*%%SmartyHeaderCode:12441520c87a07303d9-81668861%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4df9c7c6e51b34478e8c8f5e9bb4c0c84892b2e1' => 
    array (
      0 => 'application\\templates\\backend\\blue\\engage_apply_list.htm',
      1 => 1376561251,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12441520c87a07303d9-81668861',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_520c87a100f104_77830249',
  'variables' => 
  array (
    'dir_backend' => 0,
    'lang_engage' => 0,
    'list' => 0,
    'item' => 0,
    'site_url' => 0,
    'img_url' => 0,
    'page_link' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520c87a100f104_77830249')) {function content_520c87a100f104_77830249($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="nav_title" align="left" ><?php echo $_smarty_tpl->tpl_vars['lang_engage']->value['theme_apply'];?>
</div>
<div  align="right"></div>


<table class='mytable'>
  <thead>
  <tr>
    <td class="l1"><?php echo $_smarty_tpl->tpl_vars['lang_engage']->value['sn'];?>
</td>
    <td class="l2"><?php echo $_smarty_tpl->tpl_vars['lang_engage']->value['name'];?>
</td>
    <td class="l3"><?php echo $_smarty_tpl->tpl_vars['lang_engage']->value['tel'];?>
</td>
    <td class="l4"><?php echo $_smarty_tpl->tpl_vars['lang_engage']->value['email'];?>
</td>
    <td class="l5"><?php echo $_smarty_tpl->tpl_vars['lang_engage']->value['apply_job'];?>
</td>
   
    <td class="l6"><?php echo $_smarty_tpl->tpl_vars['lang_engage']->value['date'];?>
</td>
     <td class="l8"><?php echo $_smarty_tpl->tpl_vars['lang_engage']->value['operate'];?>
</td>
  </tr>
 </thead>
  <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
<tr  class="mouse_pointer">
       <td class="l1"><?php echo $_smarty_tpl->tpl_vars['item']->value['apply_id'];?>
&nbsp;</td>
       <td class="l2"><?php echo $_smarty_tpl->tpl_vars['item']->value['contact'];?>
&nbsp;</td>
       <td class="l3"><?php echo $_smarty_tpl->tpl_vars['item']->value['mobile'];?>
&nbsp;</td>
       <td class="l4"><?php echo $_smarty_tpl->tpl_vars['item']->value['email'];?>
&nbsp;</td>
       <td class="l5"><?php echo $_smarty_tpl->tpl_vars['item']->value['eg_pos_str'];?>
&nbsp;</td>
       <td class="l6"><?php echo $_smarty_tpl->tpl_vars['item']->value['apply_date'];?>
&nbsp;</td>
   
   
    <td class="l8"> 
      
      <a  title="<?php echo $_smarty_tpl->tpl_vars['lang_engage']->value['apply_view'];?>
"   href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/backend/engage/action_apply_view/?apply_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['apply_id'];?>
&parent_class=<?php echo $_GET['parent_class'];?>
" > 
      <img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/view.png" border="0" > </a> 
      
      <a  title="<?php echo $_smarty_tpl->tpl_vars['lang_engage']->value['apply_delete'];?>
" href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/backend/engage/action_apply_del/?apply_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['apply_id'];?>
&parent_class=<?php echo $_GET['parent_class'];?>
" onclick="return confirm('<?php echo $_smarty_tpl->tpl_vars['lang_engage']->value['apply_confirm_delete'];?>
?');"> 
      <img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/del1.gif" border="0" > </a> 
      </td>
  </tr>

<?php } ?>
</table>



<div class="page_link">
	<?php echo $_smarty_tpl->tpl_vars['page_link']->value;?>

</div>
<script language="JavaScript">
	overclass($('#archives ul'));
</script>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>