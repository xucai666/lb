<?php /* Smarty version Smarty-3.1.14, created on 2013-09-02 07:06:10
         compiled from "application\templates\backend\blue\sys_execute_sql.htm" */ ?>
<?php /*%%SmartyHeaderCode:27604522438e26f4d42-58187329%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5dbd227fca92fd728250069f58968f2d16afa4d7' => 
    array (
      0 => 'application\\templates\\backend\\blue\\sys_execute_sql.htm',
      1 => 1376782483,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27604522438e26f4d42-58187329',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'css_url' => 0,
    'site_url' => 0,
    'qr_afr' => 0,
    'qr' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_522438e278f1a6_95792863',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_522438e278f1a6_95792863')) {function content_522438e278f1a6_95792863($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<?php echo func_insert_css(array('file'=>"backend_style",'catalog'=>((string)$_smarty_tpl->tpl_vars['css_url']->value)),$_smarty_tpl);?>

</head>

 <body>
 <form id="form1" name="form1" method="post" action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/backend/system_manage/action_execute_sql_submit">
   <table width="100%" border="0" cellspacing="3" cellpadding="3">
     <tr>
       <td>粘贴sql语句：</td>
       <td><label for="sql"></label>
       <textarea name="sql" cols="60" rows="10" id="sql"></textarea></td>
     </tr>
     <tr>
       <td colspan="2" align="center">
	   
	   <?php echo create_button(array('type'=>'save'),$_smarty_tpl);?>

	   </td>
     </tr>
   </table>
 </form>
<hr>
Affect Rows:<?php echo $_smarty_tpl->tpl_vars['qr_afr']->value;?>

 <div style="border:1px dashed  #cccccc">
	 <pre>
		 <?php echo $_smarty_tpl->tpl_vars['qr']->value;?>

	 </pre>
 </div>
 </body>
</html>
<?php }} ?>