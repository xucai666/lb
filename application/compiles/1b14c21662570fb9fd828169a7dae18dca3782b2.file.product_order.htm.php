<?php /* Smarty version Smarty-3.1.14, created on 2013-08-21 05:38:26
         compiled from "application\templates\front\blue\zh\product_order.htm" */ ?>
<?php /*%%SmartyHeaderCode:9870521442fb0d2da3-81871497%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1b14c21662570fb9fd828169a7dae18dca3782b2' => 
    array (
      0 => 'application\\templates\\front\\blue\\zh\\product_order.htm',
      1 => 1377063480,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9870521442fb0d2da3-81871497',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_521442fb2020a6_27400934',
  'variables' => 
  array (
    'dir_front' => 0,
    'site_url' => 0,
    'img_url' => 0,
    'main' => 0,
    'list' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_521442fb2020a6_27400934')) {function content_521442fb2020a6_27400934($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript">
$(document).ready(function($) {
    $(".opt_num").click(function(event) {
    /* Act on the event */
    var o_num  = (+$(this).siblings('.opt_num1').val());
    var l_num = o_num+(+$(this).attr('rel'));
    l_num = l_num<0?0:l_num;
    $(this).siblings('.opt_num1').val(l_num).trigger('change');

  });
    $('.opt_num1').change(function(event) {

      /* Act on the event */
       $.ajax({
          url: site_url+'/product/good_cart_update/'+$(this).parents("tr:first").find('#rowid').val(),
          type: 'POST',
          dataType: 'text',
          data: {qty: $(this).val()},
        })
        .done(function() {
        })
        
        
      });
});
</script>

<table width="992" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td width="246" valign="top">
    
  	 <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/left_about.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

  	 <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/left_contact.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    
      
    <td valign="top">
	 <div class="product_cart">
		<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/product/order_save">

     <div>
       <img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/checkout-title.gif"><*号位必填项>
     </div>
     <div>
       <h3>收货人信息</h3>
       <ul>
         <li>称呼：<input type="text"  size="10" name="main[contact]" value="<?php echo $_smarty_tpl->tpl_vars['main']->value['contact'];?>
"/>*
          <?php echo ci_form_error(array('k'=>'main[contact]'),$_smarty_tpl);?>

          </li>
         <li>手机：<input type="text" name="main[mobile]"  size="15" value="<?php echo $_smarty_tpl->tpl_vars['main']->value['mobile'];?>
" />*
           <?php echo ci_form_error(array('k'=>'main[mobile]'),$_smarty_tpl);?>

         </li>
         <li>邮箱：<input type="text" name="main[email]" size="25" value="<?php echo $_smarty_tpl->tpl_vars['main']->value['email'];?>
" />* <?php echo ci_form_error(array('k'=>'main[email]'),$_smarty_tpl);?>

         </li>
         <li>地址：<input type="text" name="main[address]" size="50"  value="<?php echo $_smarty_tpl->tpl_vars['main']->value['address'];?>
"/>*  <?php echo ci_form_error(array('k'=>'main[address]'),$_smarty_tpl);?>

         </li>
       </ul>
     </div>
    
     <div>
       <H3>收货人备注</H3>
       <ul>
         <li><textarea name="main[remarks]"><?php echo $_smarty_tpl->tpl_vars['main']->value['remarks'];?>
</textarea> <?php echo ci_form_error(array('k'=>'main[remarks]'),$_smarty_tpl);?>
</li>
       </ul>
     </div>


        <table >
   
         <tr>
        
       <thead> <th>编号</th>
        <th>名称</th>
        <th>单价</th>
        <th>图片</th>
        <th>数量</th>
        <th>金额</th>
       
      </thead>
    
      </tr>
      <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
        <tr class='tr_center'>
        
        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
        <td style="width:150px;"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
</td>
        <td><img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['p_pic'];?>
" width="80" /></td>
        <td class="opt2">
           <?php echo $_smarty_tpl->tpl_vars['item']->value['qty'];?>


        </td>
        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['subtotal'];?>

        </td>
      
      </tr>
        <?php } ?>  
    </table>
    <div class="opt">
      <?php echo create_button(array('type'=>"settle"),$_smarty_tpl);?>
<?php echo create_button(array('type'=>"continue",'url'=>"javascript:window_close();"),$_smarty_tpl);?>

    </div>
  </form>
</div>
	</td>
  </tr>
</table>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>