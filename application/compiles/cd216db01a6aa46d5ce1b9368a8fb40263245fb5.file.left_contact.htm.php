<?php /* Smarty version Smarty-3.1.14, created on 2013-08-26 03:09:31
         compiled from "application\templates\front\blue\en\left_contact.htm" */ ?>
<?php /*%%SmartyHeaderCode:31695521ac6eb62a173-74525860%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd216db01a6aa46d5ce1b9368a8fb40263245fb5' => 
    array (
      0 => 'application\\templates\\front\\blue\\en\\left_contact.htm',
      1 => 1376875966,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31695521ac6eb62a173-74525860',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'img_url' => 0,
    'contact' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_521ac6eb680ae8_52620790',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_521ac6eb680ae8_52620790')) {function content_521ac6eb680ae8_52620790($_smarty_tpl) {?><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table width="233" border="0" cellspacing="0" cellpadding="0" >
        <tr>
          <td width="3"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/daohanhh_09.jpg" width="3" height="28" /></td>
          <td width="212" style="background:url(<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/daohanhh_11.jpg) repeat-x; padding-left:15px;" class="hong">联系我们</td>
          <td width="3"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/daohanhh_13.jpg" width="3" height="28" /></td>
        </tr>
        <tr>
          <td colspan="3" class="bian1" style="line-height:16px; padding:10px;"><p>地 址：<?php echo $_smarty_tpl->tpl_vars['contact']->value['addr'];?>
</p>
            <p>电 话：<?php echo $_smarty_tpl->tpl_vars['contact']->value['tel'];?>
 </p>
          <p>传 真：<?php echo $_smarty_tpl->tpl_vars['contact']->value['fax'];?>
</p></td>
        </tr>
      </table><?php }} ?>