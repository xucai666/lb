<?php /* Smarty version Smarty-3.1.14, created on 2013-08-22 15:57:57
         compiled from "application\templates\backend\blue\login.htm" */ ?>
<?php /*%%SmartyHeaderCode:2000852163505168bb2-46350285%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a064f65af7646eeec9d1a022f1f30631f7752dfa' => 
    array (
      0 => 'application\\templates\\backend\\blue\\login.htm',
      1 => 1376732926,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2000852163505168bb2-46350285',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'item_lang' => 0,
    'css_url' => 0,
    'js_url' => 0,
    'site_url' => 0,
    'img_url' => 0,
    'lang_login' => 0,
    'dir_backend' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_521635052f15c4_91935166',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_521635052f15c4_91935166')) {function content_521635052f15c4_91935166($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<TITLE><?php echo $_smarty_tpl->tpl_vars['item_lang']->value['sys_backend'];?>
</TITLE> 
<META http-equiv=Content-Type content="text/html; charset=utf-8"> 
<?php echo func_insert_css(array('file'=>"backend_style",'catalog'=>((string)$_smarty_tpl->tpl_vars['css_url']->value)),$_smarty_tpl);?>

<?php echo func_insert_js(array('file'=>"jquery-1.9.1.min,core",'path'=>((string)$_smarty_tpl->tpl_vars['js_url']->value)),$_smarty_tpl);?>

</head>

<body>
<form action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/backend/login/chklogin" target="_parent" method="post"> 
    
  


<table width="500" height="313" border="0" cellpadding="0" cellspacing="0" align="center">
  <tr>
    <td colspan="3"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/logins_r1_c6.png" width="184" height="60" /></td>
  </tr>
  <!-- fwtable fwsrc="未命名-1.png" fwbase="login_panel.png" fwstyle="Dreamweaver" fwdocid = "1613780109" fwnested="0" -->
  <tr>
    <td width="25" height="312"><img name="login_panel_r1_c1" src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/login_panel_r1_c1.png" width="25" height="312" border="0" id="login_panel_r1_c1" alt="" /></td>
    <td valign="top" background="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/login_panel_r1_c3.png"><table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td height="69" align="right" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td align="right"><img name="login_panel_r5_c6" src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/login_panel_r5_c6.png" width="83" height="26" border="0" id="login_panel_r5_c6" alt="" /></td>
            <td width="185" height="69" align="right" valign="top"><img name="login_panel_r1_c9" src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/login_panel_r1_c9.png" width="185" height="69" border="0" id="login_panel_r1_c9" alt="" /></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="center"><table border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td height="45">
              <?php echo $_smarty_tpl->tpl_vars['lang_login']->value['username'];?>
：            </td>
            <td height="45"><label>
                <INPUT  id=txtUserName name="user_name" size="15">
              </label><?php echo type_error(array('obj'=>"user_name"),$_smarty_tpl);?>
</td>
          </tr>
          <tr>
            <td height="45"><?php echo $_smarty_tpl->tpl_vars['lang_login']->value['password'];?>
：</td>
            <td height="45"> <INPUT  id=txtUserPassword type="password"  size="15"
                name="user_pass">
        <?php echo type_error(array('obj'=>"user_pass"),$_smarty_tpl);?>
</td>
          </tr>
          <tr>
            <td height="45">&nbsp;</td>
            <td height="45"><input type="image" src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/logins_r9_c7.png" width="126" height="40" /></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
    <td width="32" height="312">
  
  
  <img name="login_panel_r1_c10" src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/login_panel_r1_c10.png" width="22" height="312" border="0" id="login_panel_r1_c10" alt="" /></td>
  </tr>
</table>

    
     
</form>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>