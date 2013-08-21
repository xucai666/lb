<?php /* Smarty version Smarty-3.1.14, created on 2013-08-21 07:15:54
         compiled from "application\templates\front\blue\zh\product_cart.htm" */ ?>
<?php /*%%SmartyHeaderCode:927052143e8bf19276-09789594%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '724c00f6309e5bdfc88a47682afe776e1f7e6403' => 
    array (
      0 => 'application\\templates\\front\\blue\\zh\\product_cart.htm',
      1 => 1377069352,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '927052143e8bf19276-09789594',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52143e8c0d7935_92894321',
  'variables' => 
  array (
    'dir_front' => 0,
    'site_url' => 0,
    'list' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52143e8c0d7935_92894321')) {function content_52143e8c0d7935_92894321($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript">
$(document).ready(function($) {
    $(".opt_num").click(function(event) {
    /* Act on the event */
    var o_num  = (+$(this).siblings('.opt_num1').val());
    var l_num = o_num+(+$(this).attr('rel'));
    l_num = l_num<1?1:l_num;
    $(this).siblings('.opt_num1').val(l_num).trigger('change');

  });
    $('.opt_num1').change(function(event) {
      if($(this).val()<1){
        $(this).val(1);
      }
      /* Act on the event */
       $.ajax({
          url: site_url+'/product/good_cart_update/'+$(this).parents("tr:first").find('#rowid').val(),
          type: 'POST',
          dataType: 'text',
          data: {qty: $(this).val()},
        })
        .done(function() {
        });
        $(this).parent().next().find('span.sub').text($(this).val()*$(this).parent().prev().prev().find('span.price').text());

        
        
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
/product/good_cart_update">
        <table >
   
         <tr>
        
       <thead> <th>编号</th>
        <th>名称</th>
        <th>单价</th>
        <th>图片</th>
        <th>数量</th>
        <th>金额</th>
        <th>操作</th>
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
        <td><span class="price"><?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
</span></td>
        <td><img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['p_pic'];?>
" width="80" /></td>
        <td class="opt2">
          <a href="###" class="opt_num" rel="-1">-</a>
          <input type="text" class="opt_num1" maxlength="2" name="detail[qty][]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['qty'];?>
">
           <a href="###" class="opt_num" rel="1">+</a>

        </td>
        <td>
          <span class="sub"><?php echo $_smarty_tpl->tpl_vars['item']->value['subtotal'];?>
</span>
          <input type="hidden" id="rowid" name="detail[rowid][]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['rowid'];?>
">
        </td>
       <td>
           <?php echo ci_anchor(array('segment'=>"product/good_cart_delete/".((string)$_smarty_tpl->tpl_vars['item']->value['rowid']),'attrs'=>"class:link_del"),$_smarty_tpl);?>
 

        </td>
      
      </tr>
        <?php } ?>  
    </table>
    <div class="opt">
      <?php echo create_button(array('type'=>"settle",'url'=>"product/order_create"),$_smarty_tpl);?>
<?php echo create_button(array('type'=>"continue",'url'=>"javascript:window_close();"),$_smarty_tpl);?>

    </div>
  </form>
</div>
	</td>
  </tr>
</table>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>