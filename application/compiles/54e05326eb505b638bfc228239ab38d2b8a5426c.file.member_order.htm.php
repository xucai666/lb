<?php /* Smarty version Smarty-3.1.14, created on 2013-08-25 15:18:54
         compiled from "application\templates\front\blue\zh\member_order.htm" */ ?>
<?php /*%%SmartyHeaderCode:23525521a1f45524b14-39711198%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '54e05326eb505b638bfc228239ab38d2b8a5426c' => 
    array (
      0 => 'application\\templates\\front\\blue\\zh\\member_order.htm',
      1 => 1377443921,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23525521a1f45524b14-39711198',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_521a1f456377c5_29430446',
  'variables' => 
  array (
    'dir_front' => 0,
    'list' => 0,
    'item' => 0,
    'status' => 0,
    'stats' => 0,
    'page_link' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_521a1f456377c5_29430446')) {function content_521a1f456377c5_29430446($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>



<table width="992" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td width="246" valign="top">
    
     <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/left_member.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

     <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/left_contact.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    
      
    <td valign="top" class="product_cart">
        <h1 align="center">客户订单列表</h1>
        <table>
          <thead>
          <tr>
          <th>订单号</th>
          <th>状态</th>
          <th>日期</th>
          <th>总金额</th>
          <th>总件数</th>
         
          <th>操作</th>
          </tr>
          </thead>
          <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
           <tr>
          <td><?php echo $_smarty_tpl->tpl_vars['item']->value['order_no'];?>
</td>
          <td><?php echo $_smarty_tpl->tpl_vars['status']->value[$_smarty_tpl->tpl_vars['item']->value['status']];?>
</td>
          <td><?php echo $_smarty_tpl->tpl_vars['item']->value['order_date'];?>
</td>
          <td><?php echo $_smarty_tpl->tpl_vars['stats']->value[$_smarty_tpl->tpl_vars['item']->value['order_id']]['sub'];?>
</td>
          
          <td><?php echo $_smarty_tpl->tpl_vars['stats']->value[$_smarty_tpl->tpl_vars['item']->value['order_id']]['p_stat'];?>
</td>
          <td align="center">
          <?php echo create_button(array('type'=>'view','url'=>"front/member/action_order_detail/".((string)$_smarty_tpl->tpl_vars['item']->value['order_id'])),$_smarty_tpl);?>


           <?php echo create_button(array('type'=>'pay','url'=>"alipay/index/".((string)$_smarty_tpl->tpl_vars['item']->value['order_id'])),$_smarty_tpl);?>



          </td>
          </tr>
          <?php } ?>

        </table> 

        <div clas="page"><?php echo $_smarty_tpl->tpl_vars['page_link']->value;?>
</div>
      
    </td>
  </tr> 
</table>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>