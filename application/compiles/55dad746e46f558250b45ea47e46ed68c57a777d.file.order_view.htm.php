<?php /* Smarty version Smarty-3.1.14, created on 2013-09-04 01:44:15
         compiled from "application\templates\backend\corcms\order_view.htm" */ ?>
<?php /*%%SmartyHeaderCode:1525052268d1242f384-77333033%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '55dad746e46f558250b45ea47e46ed68c57a777d' => 
    array (
      0 => 'application\\templates\\backend\\corcms\\order_view.htm',
      1 => 1378259052,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1525052268d1242f384-77333033',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52268d12658e60_43099288',
  'variables' => 
  array (
    'dir_backend' => 0,
    'main' => 0,
    'status' => 0,
    'detail' => 0,
    'item' => 0,
    'amount_total' => 0,
    'p_count' => 0,
    'p_num' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52268d12658e60_43099288')) {function content_52268d12658e60_43099288($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="nav_title" align="left" >订单查看</div>
<div  align="right"></div>
<h2>订单状态</h2>

<em><?php echo $_smarty_tpl->tpl_vars['status']->value[$_smarty_tpl->tpl_vars['main']->value['status']];?>
</em>
<h2>收货信息</h2>


<table width="100%" border="0" cellspacing="0" cellpadding="0" class="mytable">
    
  <tr>
    <td>
    
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="20%"  align="right">联系人：</td>
                <td  ><?php echo $_smarty_tpl->tpl_vars['main']->value['contact'];?>
&nbsp;</td>
              </tr>
              <tr>
                <td  align="right">手机：</td>
                <td ><?php echo $_smarty_tpl->tpl_vars['main']->value['mobile'];?>
&nbsp;</td>
              </tr>
               <tr>
                <td  align="right">E-mail：</td>
                <td ><?php echo $_smarty_tpl->tpl_vars['main']->value['email'];?>
&nbsp;</td>
              </tr> 
              
              
              <tr>
                <td  align="right">收货地址：</td>
                <td ><?php echo $_smarty_tpl->tpl_vars['main']->value['address'];?>
&nbsp;</td>
              </tr>
              <tr>
                <td  align="right">附注：</td>
                <td ><?php echo $_smarty_tpl->tpl_vars['main']->value['remarks'];?>
&nbsp;</td>
              </tr>
            </table>
    
    
    
    </td>
  </tr>
</table>
    <h2>订单明细</h2>
    <table class="mytable">
  
         <tr>
        
       <thead> <th>编号</th>
        <th>名称</th>
        <th>单价</th>
        <th>图片</th>
        <th>数量</th>
        <th>金额</th>
       
      </thead>
    
      </tr>
          </tr>      
             <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['detail']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                  
                     <tr class='tr_center'>
        
        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['p_id'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['p_name'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['p_price'];?>
</td>
        <td><img src="<?php echo current(explode(",",$_smarty_tpl->tpl_vars['item']->value['p_pic']));?>
" width="80" /></td>
        <td class="opt2">
           <?php echo $_smarty_tpl->tpl_vars['item']->value['p_qty'];?>


        </td>
        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['sub_total'];?>

        </td>
               
        </tr>     
           <?php } ?>   
         </table>
    
  
    </td>
  </tr>
</table>
 <h2>合计</h2>
 <hr>
 订购总额：<span class="red_font"><?php echo $_smarty_tpl->tpl_vars['amount_total']->value;?>
</span>，
 产品种类：<span class="red_font"><?php echo $_smarty_tpl->tpl_vars['p_count']->value;?>
</span>，
 订购总数：<span class="red_font"><?php echo $_smarty_tpl->tpl_vars['p_num']->value;?>
</span>，
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

  <div align="center" style="margin:20px 0px 0px 0px;" class="noprint">
   <?php if ($_smarty_tpl->tpl_vars['main']->value['status']==0){?>
   <?php echo create_button(array('type'=>"payed",'url'=>"backend/product/action_order_status_change?order_id=".((string)$_smarty_tpl->tpl_vars['main']->value['order_id'])."&status=1"),$_smarty_tpl);?>

   <?php }?>
   <?php if ($_smarty_tpl->tpl_vars['main']->value['status']==1){?>
   <?php echo create_button(array('type'=>"shipped",'url'=>"backend/product/action_order_status_change?order_id=".((string)$_smarty_tpl->tpl_vars['main']->value['order_id'])."&status=2"),$_smarty_tpl);?>

   <?php }?>

   <?php if ($_smarty_tpl->tpl_vars['main']->value['status']==2){?>
   <?php echo create_button(array('type'=>"receipt",'url'=>"backend/product/action_order_status_change?order_id=".((string)$_smarty_tpl->tpl_vars['main']->value['order_id'])."&status=3"),$_smarty_tpl);?>

   <?php }?>

   <?php echo create_button(array('type'=>"print",'url'=>"javascript:window.print();"),$_smarty_tpl);?>

   <?php echo create_button(array('type'=>"back",'url'=>"backend/product/action_order"),$_smarty_tpl);?>

    </div><?php }} ?>