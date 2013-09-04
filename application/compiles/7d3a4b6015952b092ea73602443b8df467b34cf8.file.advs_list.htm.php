<?php /* Smarty version Smarty-3.1.14, created on 2013-09-04 01:49:45
         compiled from "application\templates\backend\corcms\advs_list.htm" */ ?>
<?php /*%%SmartyHeaderCode:1769522691b9341864-70065592%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7d3a4b6015952b092ea73602443b8df467b34cf8' => 
    array (
      0 => 'application\\templates\\backend\\corcms\\advs_list.htm',
      1 => 1375923417,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1769522691b9341864-70065592',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dir_backend' => 0,
    'site_url' => 0,
    'img_url' => 0,
    'lang_type' => 0,
    'list' => 0,
    'item' => 0,
    'page_link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_522691b94ffa63_91360087',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_522691b94ffa63_91360087')) {function content_522691b94ffa63_91360087($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="nav_title" align="left" >广告列表</div>
<div  align="right"><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/backend/advs/action_add/"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/add_<?php echo $_smarty_tpl->tpl_vars['lang_type']->value;?>
.png"  /></a></div>

<div class="search">
	<form action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/backend/advs/action_list" method="get">
    名称： 
    <input type="text" name="adv_title" value="<?php echo $_GET['adv_title'];?>
" />
	
  <?php echo create_button(array('type'=>'search'),$_smarty_tpl);?>

	</form>


</div>

<table width="100%"  class="mytable">
  <thead>
  <tr>
    <th>名称&nbsp;</th>
    <th>编号</th>
    <th>性质</th>
    <th>图片张数&nbsp;</th>
    <th>规格&nbsp;</th>
    <th>到期时间&nbsp;</th>
    <th>浏览&nbsp;</th>
    <th>操作&nbsp;</th>
  </tr>
</thead>
 
  <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?> 
  <tr>
    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['adv_title'];?>
&nbsp;</td>
    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['adv_id'];?>
&nbsp;</td>
    <td>
    <?php if ($_smarty_tpl->tpl_vars['item']->value['adv_type']==1){?>图片<?php }else{ ?>flash<?php }?>
    </td>
    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['pic_stat'];?>
&nbsp;</td>
    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['adv_w'];?>
×<?php echo $_smarty_tpl->tpl_vars['item']->value['adv_h'];?>
px&nbsp;</td>
    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['adv_exp_date'];?>
&nbsp;</td>
    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['adv_visit'];?>
&nbsp;</td>
    <td> <?php if ($_smarty_tpl->tpl_vars['item']->value['more']==0){?>
      <a  title="删除广告" href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/backend/advs/action_del/?adv_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['adv_id'];?>
" onclick="return confirm('确定删除?');"> 
      <img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/del1.gif" border="0" > </a> 
      <?php }?>
      <a  title="修改广告" href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/backend/advs/action_add/?adv_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['adv_id'];?>
"> 
      <img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/mod1.gif" border="0"  > </a>&nbsp;</td>
  </tr>
  <?php } ?>
</table>


 
<div class="page_link">
	<?php echo $_smarty_tpl->tpl_vars['page_link']->value;?>

</div>
<script language="JavaScript">
	overclass($('#adv ul'));
</script>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>