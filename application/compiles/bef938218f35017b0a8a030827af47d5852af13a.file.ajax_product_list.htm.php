<?php /* Smarty version Smarty-3.1.14, created on 2013-09-05 10:19:04
         compiled from "application\templates\backend\corcms\ajax_product_list.htm" */ ?>
<?php /*%%SmartyHeaderCode:306675227ea18b653a7-01354531%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bef938218f35017b0a8a030827af47d5852af13a' => 
    array (
      0 => 'application\\templates\\backend\\corcms\\ajax_product_list.htm',
      1 => 1376725539,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '306675227ea18b653a7-01354531',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'site_url' => 0,
    'img_url' => 0,
    'lang_products' => 0,
    'list' => 0,
    'item' => 0,
    'base_url' => 0,
    'page_link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5227ea18c2b334_13440084',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5227ea18c2b334_13440084')) {function content_5227ea18c2b334_13440084($_smarty_tpl) {?>	<div id='pros'>
	<form id="form2" method="post" action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/backend/product/action_del/?parent_class=<?php echo $_GET['parent_class'];?>
">   
	  
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="mytable">
		<thead>
	  <tr >
	    <th align="center">
		<input type="image" name="submit" src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/button_del.gif" onclick="return chkdel2();"  >
	    <input type="checkbox" id="chkall"  value="1" onclick="chkall2(this);">
	    </th>
	    <th align="center"><?php echo $_smarty_tpl->tpl_vars['lang_products']->value['title'];?>
&nbsp;</th>
	    <th align="center"><?php echo $_smarty_tpl->tpl_vars['lang_products']->value['goods_pic'];?>
&nbsp;</th>
	    <th align="center"><?php echo $_smarty_tpl->tpl_vars['lang_products']->value['category'];?>
&nbsp;</th>
	    <th align="center"><?php echo $_smarty_tpl->tpl_vars['lang_products']->value['visit'];?>
&nbsp;</th>
	    <th align="center"><?php echo $_smarty_tpl->tpl_vars['lang_products']->value['date'];?>
&nbsp;</th>
	    <th align="center"><?php echo $_smarty_tpl->tpl_vars['lang_products']->value['order'];?>
&nbsp;</th>
	    <th align="center"><?php echo $_smarty_tpl->tpl_vars['lang_products']->value['operate'];?>
&nbsp;</th>
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
	      <td align="center">  <input type="checkbox" class="pro_ids"  name="pro_id[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['pro_id'];?>
">&nbsp;</td>
	    <td align="left"><?php echo $_smarty_tpl->tpl_vars['item']->value['pro_title'];?>
&nbsp;</td>
	    <td align="center"> <?php if ($_smarty_tpl->tpl_vars['item']->value['pro_pic']){?>
	        <div > <img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['pro_pic'];?>
" width="120" height="80" /> </div>
	   
	      <?php }?>&nbsp;</td>
	    <td align="center"><?php echo $_smarty_tpl->tpl_vars['item']->value['c_title'];?>
&nbsp;</td>
	    <td align="center"><?php echo $_smarty_tpl->tpl_vars['item']->value['pro_view'];?>
&nbsp;</td>
	    <td align="center"><?php echo $_smarty_tpl->tpl_vars['item']->value['pro_date'];?>
&nbsp;</td>
	    <td align="center"><?php echo $_smarty_tpl->tpl_vars['item']->value['pro_order'];?>
&nbsp;</td>
	    <td align="center"> <a  title="<?php echo $_smarty_tpl->tpl_vars['lang_products']->value['view'];?>
"   href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/backend/product/action_add/?pro_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['pro_id'];?>
&parent_class=<?php echo $_GET['parent_class'];?>
" > 
	      <img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/mod1.gif" border="0" > </a> 
	      <a  title="<?php echo $_smarty_tpl->tpl_vars['lang_products']->value['delete'];?>
" href="javascript:;" onclick="delRecord('<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/backend/product/action_del/?pro_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['pro_id'];?>
&parent_class=<?php echo $_GET['parent_class'];?>
',this);"> 
	      <img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/del1.gif" border="0" > </a> &nbsp;</td>
	  </tr>
	  <?php } ?>
	</table>
	
	  
	  </form>
	</div>
	<div class="page_link">
		<?php echo $_smarty_tpl->tpl_vars['page_link']->value;?>

	</div>

<?php }} ?>