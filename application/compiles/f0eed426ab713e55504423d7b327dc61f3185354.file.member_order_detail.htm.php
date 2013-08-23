<?php /* Smarty version Smarty-3.1.14, created on 2013-08-23 09:32:22
         compiled from "application\templates\front\blue\zh\member_order_detail.htm" */ ?>
<?php /*%%SmartyHeaderCode:151352171e842ff809-78461884%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f0eed426ab713e55504423d7b327dc61f3185354' => 
    array (
      0 => 'application\\templates\\front\\blue\\zh\\member_order_detail.htm',
      1 => 1377250323,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '151352171e842ff809-78461884',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52171e84459086_85507514',
  'variables' => 
  array (
    'dir_front' => 0,
    'main' => 0,
    'status' => 0,
    'stats' => 0,
    'list' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52171e84459086_85507514')) {function content_52171e84459086_85507514($_smarty_tpl) {?><?php if (!is_callable('smarty_function_math')) include 'E:\\phpnow\\htdocs\\lb\\application\\libraries\\Smarty-3.1.14\\libs\\plugins\\function.math.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>



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

        <h4><em>订购明细</em></h4>
        <table>
          <thead>
          <tr>
          <th>品名</th>
          <th>单价</th>
          <th>数量</th>
          <th>金额</th>
         
         
          </tr>
          </thead>
          <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
            <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['p_name'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['p_price'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['p_qty'];?>
</td>
            
            <td><?php echo smarty_function_math(array('equation'=>"a+b",'a'=>$_smarty_tpl->tpl_vars['item']->value['p_qty'],'b'=>$_smarty_tpl->tpl_vars['item']->value['p_price']),$_smarty_tpl);?>
</td>
           
           </tr>
         <?php } ?>

        </table> 

        <div align="center" style="margin:50px;"><?php echo create_button(array('type'=>"back",'url'=>"javascript:history.back(1);"),$_smarty_tpl);?>
</div>
      
    </td>
  </tr> 
</table>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>