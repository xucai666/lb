<?php /* Smarty version Smarty-3.1.14, created on 2013-08-17 09:55:31
         compiled from "application\templates\front\blue\zh\left_message.htm" */ ?>
<?php /*%%SmartyHeaderCode:16178520f48935e7006-47237239%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06ca12fe274efe0f709f42728f0fe40938d24c24' => 
    array (
      0 => 'application\\templates\\front\\blue\\zh\\left_message.htm',
      1 => 1295185552,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16178520f48935e7006-47237239',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'img_url' => 0,
    'site_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_520f48936296a5_18257658',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520f48936296a5_18257658')) {function content_520f48936296a5_18257658($_smarty_tpl) {?><table width="233" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="3"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/daohanhh_09.jpg" width="3" height="28" /></td>
        <td width="212" style="background:url(<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/daohanhh_11.jpg) repeat-x; padding-left:15px;" class="hong">在线留言</td>
        <td width="3"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/daohanhh_13.jpg" width="3" height="28" /></td>
      </tr>
      <tr>
        <td colspan="3" class="bian1" ><table width="231" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px; margin-bottom:17px;">
          <tr>
            <td height="30" valign="bottom" style="padding-bottom:3px;" class="link_pa"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/jiantou_05.jpg" width="6" height="9" style="margin-left:20px; margin-right:15px;"  /><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/front/message">我要留言</a></td>
          </tr>
          <tr>
            <td><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/huitiao_05.jpg" width="227" height="1" /></td>
          </tr>
          <tr>
             <td height="30" valign="bottom" style="padding-bottom:3px;" class="link_pa"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/jiantou_05.jpg" width="6" height="9" style="margin-left:20px; margin-right:15px;" /><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/front/message/action_list">留言列表</a></td>
          </tr>
          <tr>
            <td><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/huitiao_05.jpg" width="227" height="1" /></td>
          </tr>
        </table></td>
      </tr>
    </table><?php }} ?>