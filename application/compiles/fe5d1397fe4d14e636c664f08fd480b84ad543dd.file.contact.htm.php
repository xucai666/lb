<?php /* Smarty version Smarty-3.1.14, created on 2013-08-24 03:29:03
         compiled from "application\templates\front\blue\en\contact.htm" */ ?>
<?php /*%%SmartyHeaderCode:275135218287fb277c9-18401413%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fe5d1397fe4d14e636c664f08fd480b84ad543dd' => 
    array (
      0 => 'application\\templates\\front\\blue\\en\\contact.htm',
      1 => 1377056285,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '275135218287fb277c9-18401413',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dir_front' => 0,
    'img_url' => 0,
    'contact' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5218287fc8b374_32695639',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5218287fc8b374_32695639')) {function content_5218287fc8b374_32695639($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<table width="992" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td width="246" valign="top"><table width="233" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="3"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/daohanhh_09.jpg" width="3" height="28" /></td>
        <td width="212" style="background:url(<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/daohanhh_11.jpg) repeat-x; padding-left:15px;" class="hong">联系我们</td>
        <td width="3"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/daohanhh_13.jpg" width="3" height="28" /></td>
      </tr>
      <tr>
        <td colspan="3" class="bian1" ><table width="231" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px; margin-bottom:17px;">
          <tr>
            <td height="30" valign="bottom" style="padding-bottom:3px;" class="link_pa"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/jiantou_05.jpg" width="6" height="9" style="margin-left:20px; margin-right:15px;"  /><a href="#">联系方式</a></td>
          </tr>
          <tr>
            <td><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/huitiao_05.jpg" width="227" height="1" /></td>
          </tr>
        </table></td>
      </tr>
    </table>
      <p><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/3d_05.jpg" width="230" height="156" style="margin-top:25px;" /></p>
    <td valign="top"><table width="742" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="3"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/daohanhh_09.jpg" width="3" height="28" /></td>
        <td width="687" style="background:url(<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/daohanhh_11.jpg) repeat-x; padding-left:20px; " class="hong">联系方式</td>
        <td width="3"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/daohanhh_13.jpg" width="3" height="28" /></td>
      </tr>
      <tr>
        <td width="691" colspan="3" class="bian1" style="line-height:24px; padding-top:30px; padding-bottom:30px; padding-left:10px; padding-right:10px;">
             地 址：<?php echo $_smarty_tpl->tpl_vars['contact']->value['addr'];?>
<br />
             电 话：<?php echo $_smarty_tpl->tpl_vars['contact']->value['tel'];?>
<br /> 
             传 真：<?php echo $_smarty_tpl->tpl_vars['contact']->value['fax'];?>
 
          </td>
      </tr>
    </table></td>
  </tr>
</table>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>