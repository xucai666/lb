<?php /* Smarty version Smarty-3.1.14, created on 2013-08-18 17:51:25
         compiled from "application\templates\backend\blue\order_list.htm" */ ?>
<?php /*%%SmartyHeaderCode:202275211099d6e9016-72605485%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '479b9a310ea7db709e4ed6c1bb6ea4553181b2ea' => 
    array (
      0 => 'application\\templates\\backend\\blue\\order_list.htm',
      1 => 1376124452,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '202275211099d6e9016-72605485',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dir_backend' => 0,
    'site_url' => 0,
    'list' => 0,
    'item' => 0,
    'img_url' => 0,
    'page_link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5211099d8687b3_74433220',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5211099d8687b3_74433220')) {function content_5211099d8687b3_74433220($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="nav_title" align="left" >订单管理</div>
<div  align="right"></div>

<div class="search">
	<form action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/backend/product/action_order/" method="get">
    订单编号：
      <input name="order_no" type="text" id="order_no" value="<?php echo $_GET['order_no'];?>
" size="15" />
联系人：
<input name="contact" type="text" id="contact" value="<?php echo $_GET['contact'];?>
" />
    &nbsp;手机：
    <label>
      <input name="mobile" type="text" id="mobile" size="15"  value="<?php echo $_GET['mobile'];?>
"/>
    </label>
   
<?php echo create_button(array('type'=>"search"),$_smarty_tpl);?>

	</form>


</div>

<table class="mytable">
  <thead>
  <tr>
    <th>订单编号</th>
   
    <th>联系人</th>
    
    <th>手机</th>
    <th>E-mail</th>
    <th>订单日期</th>
     <th>操作</th>
  </tr>
  </thead>

  <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
<tr  class="tr_center">
       <td class="l1"><?php echo $_smarty_tpl->tpl_vars['item']->value['order_no'];?>
</td>
       <td class="l2"><?php echo $_smarty_tpl->tpl_vars['item']->value['contact'];?>
</td>
    <td class="l3"><?php echo $_smarty_tpl->tpl_vars['item']->value['mobile'];?>
</td>
    <td class="l4"><?php echo $_smarty_tpl->tpl_vars['item']->value['email'];?>
</td>
     <td class="l5"><?php echo $_smarty_tpl->tpl_vars['item']->value['order_date'];?>
</td>
  
   
    <td class="l8"> 
      
      <a  title="查看申请"   href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/backend/product/action_order_view/?order_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['order_id'];?>
&parent_class=<?php echo $_GET['parent_class'];?>
" > 
      <img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/view.png" border="0" > </a> 
      
      <a  title="删除申请" href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/backend/product/action_order_del/?order_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['order_id'];?>
&parent_class=<?php echo $_GET['parent_class'];?>
" onclick="return confirm('确定删除?');"> 
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
	overclass($('.mytable tr'));
</script>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>