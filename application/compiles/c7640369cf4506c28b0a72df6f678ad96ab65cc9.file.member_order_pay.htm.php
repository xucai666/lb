<?php /* Smarty version Smarty-3.1.14, created on 2013-08-23 10:18:27
         compiled from "application\templates\front\blue\zh\member_order_pay.htm" */ ?>
<?php /*%%SmartyHeaderCode:47552172ce949d876-61052300%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c7640369cf4506c28b0a72df6f678ad96ab65cc9' => 
    array (
      0 => 'application\\templates\\front\\blue\\zh\\member_order_pay.htm',
      1 => 1377253105,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '47552172ce949d876-61052300',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52172ce96450c7_94872815',
  'variables' => 
  array (
    'dir_front' => 0,
    'main' => 0,
    'status' => 0,
    'stats' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52172ce96450c7_94872815')) {function content_52172ce96450c7_94872815($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>



<table width="992" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td width="246" valign="top">
    
     <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/left_member.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

     <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/left_contact.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    
      
    <td valign="top" class="product_cart">
        <h1 align="center">客户订单明细</h1>
        <h4><em>订单基本信息</em></h4>
        <table>
          <thead>
          <tr>
          <th>订单号</th>
          <th>状态</th>
          <th>日期</th>
          <th>总金额</th>
          <th>总件数</th>
         
         
          </tr>
          </thead>
        
           <tr>
          <td><?php echo $_smarty_tpl->tpl_vars['main']->value['order_no'];?>
</td>
          <td><?php echo $_smarty_tpl->tpl_vars['status']->value[$_smarty_tpl->tpl_vars['main']->value['status']];?>
</td>
          <td><?php echo $_smarty_tpl->tpl_vars['main']->value['order_date'];?>
</td>
          <td><?php echo $_smarty_tpl->tpl_vars['stats']->value['sub'];?>
</td>
          
          <td><?php echo $_smarty_tpl->tpl_vars['stats']->value['p_stat'];?>
</td>
         
         </tr>

        </table> 

         <h4><em>收货信息</em></h4>

          <table>
          <thead>
          <tr>
          <th>联系人</th>
          <th>手机/电话</th>
          <th>地址</th>
          <th>E-mail</th>
          <th>备注</th>
         
         
          </tr>
          </thead>
        
           <tr>
          <td><?php echo $_smarty_tpl->tpl_vars['main']->value['contact'];?>
</td>
          <td><?php echo $_smarty_tpl->tpl_vars['main']->value['mobile'];?>
</td>
          <td><?php echo $_smarty_tpl->tpl_vars['main']->value['address'];?>
</td>
          
          <td><?php echo $_smarty_tpl->tpl_vars['main']->value['email'];?>
</td>
          <td><?php echo $_smarty_tpl->tpl_vars['main']->value['remarks'];?>
</td>
         
         </tr>

        </table> 

        

        <div align="center" style="margin:50px;"><?php echo create_button(array('type'=>"pay",'url'=>"javascript:history.back(1);"),$_smarty_tpl);?>
</div>
      
    </td>
  </tr> 
</table>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>