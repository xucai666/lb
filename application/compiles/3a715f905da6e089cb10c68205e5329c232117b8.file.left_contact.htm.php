<?php /* Smarty version Smarty-3.1.14, created on 2013-09-04 22:48:12
         compiled from "application\templates\front\corcms\zh\left_contact.htm" */ ?>
<?php /*%%SmartyHeaderCode:192325227482cec6b90-90258955%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3a715f905da6e089cb10c68205e5329c232117b8' => 
    array (
      0 => 'application\\templates\\front\\corcms\\zh\\left_contact.htm',
      1 => 1376875968,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '192325227482cec6b90-90258955',
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
  'unifunc' => 'content_5227482ceeae99_89947590',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5227482ceeae99_89947590')) {function content_5227482ceeae99_89947590($_smarty_tpl) {?><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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