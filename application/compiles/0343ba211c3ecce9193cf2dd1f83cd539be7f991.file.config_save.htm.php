<?php /* Smarty version Smarty-3.1.14, created on 2013-08-24 13:58:51
         compiled from "application\templates\backend\blue\config_save.htm" */ ?>
<?php /*%%SmartyHeaderCode:93105218bc1b7288a2-99630943%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0343ba211c3ecce9193cf2dd1f83cd539be7f991' => 
    array (
      0 => 'application\\templates\\backend\\blue\\config_save.htm',
      1 => 1373353251,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '93105218bc1b7288a2-99630943',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dir_backend' => 0,
    'lang_sys' => 0,
    'site_url' => 0,
    'develop' => 0,
    'styles' => 0,
    'optimize' => 0,
    'contact' => 0,
    'smtp' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5218bc1b91a246_65182204',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5218bc1b91a246_65182204')) {function content_5218bc1b91a246_65182204($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include 'E:\\phpnow\\htdocs\\lb\\application\\libraries\\Smarty-3.1.14\\libs\\plugins\\function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
  
  
<fieldset>
<legend><?php echo $_smarty_tpl->tpl_vars['lang_sys']->value['basic_config'];?>
</legend>  
        
<form action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/backend/system_manage/action_config_save" method="post" enctype="multipart/form-data" name="form1" id="form1" onsubmit="return validator(this)">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" >
     <tr>
      <td width="31%" height="20" align="left" bgcolor="#f1f1f1">&nbsp;&nbsp;&nbsp;开发配置</td>
      <td width="69%" height="20" bgcolor="#f1f1f1">&nbsp;</td>
    </tr>
    <tr>
      <td height="40" align="right">开启调试模式：</td>
      <td height="40"><input name="develop[debug]" type="checkbox" id="develop[debug]" value="1" <?php if ($_smarty_tpl->tpl_vars['develop']->value['debug']){?>checked="true" <?php }?> /></td>
    </tr>

     <tr>
      <td height="40" align="right">选择模板</td>
      <td height="40"><select name="develop[template]" id="develop[template]">
      <?php echo smarty_function_html_options(array('values'=>$_smarty_tpl->tpl_vars['styles']->value,'output'=>$_smarty_tpl->tpl_vars['styles']->value,'selected'=>$_smarty_tpl->tpl_vars['develop']->value['template']),$_smarty_tpl);?>



      </select></td>
    </tr>

<tr>
      <td height="40" align="right">页面跳转等待时间</td>
      <td height="40"><input name="develop[time_page_redirect]" type="text" id="develop[time_page_redirect]" size="5" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['develop']->value['time_page_redirect'])===null||$tmp==='' ? '3000' : $tmp);?>
" />ms</td>
    </tr>


    <tr>
      <td width="31%" height="20" align="left" bgcolor="#f1f1f1">&nbsp;&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['lang_sys']->value['opt'];?>
</td>
      <td width="69%" height="20" bgcolor="#f1f1f1">&nbsp;</td>
    </tr>
    <tr>
      <td height="40" align="right"><?php echo $_smarty_tpl->tpl_vars['lang_sys']->value['opt_title'];?>
：</td>
      <td height="40"><input name="optimize[title]" type="text" id="optimize[title]" size="50" value="<?php echo $_smarty_tpl->tpl_vars['optimize']->value['title'];?>
" /></td>
    </tr>
    <tr>
      <td height="40" align="right"><?php echo $_smarty_tpl->tpl_vars['lang_sys']->value['opt_meta'];?>
：</td>
      <td height="40"><input name="optimize[meta]" type="text" id="optimize[meta]" size="50" value="<?php echo $_smarty_tpl->tpl_vars['optimize']->value['meta'];?>
"  /></td>
    </tr>
    <tr>
      <td height="40" align="right"><?php echo $_smarty_tpl->tpl_vars['lang_sys']->value['opt_des'];?>
：</td>
      <td height="40"><textarea name="optimize[description]" cols="50" rows="4" id="optimize[description]"><?php echo $_smarty_tpl->tpl_vars['optimize']->value['description'];?>
</textarea></td>
    </tr>
    
    
     <tr>
      <td height="20" align="left" bgcolor="#f1f1f1">&nbsp;&nbsp;&nbsp;联系我们</td>
      <td height="20" bgcolor="#f1f1f1">&nbsp;</td>
    </tr>
    
    
    <tr>
      <td height="20" align="right" >地址：</td>
      <td height="20" ><input name="contact[addr]" type="text" id="contact[addr]" value="<?php echo $_smarty_tpl->tpl_vars['contact']->value['addr'];?>
" size="50"/></td>
    </tr>
    <tr>
      <td height="20" align="right" >&nbsp;&nbsp;&nbsp;电话：</td>
      <td height="20" ><label for="textfield"></label>
        <input type="text" name="contact[tel]"  value="<?php echo $_smarty_tpl->tpl_vars['contact']->value['tel'];?>
" /></td>
    </tr>
    <tr>
      <td height="20" align="right" >&nbsp;&nbsp;传真：</td>
      <td height="20" ><label for="textfield"></label>
        <input type="text" name="contact[fax]"  value="<?php echo $_smarty_tpl->tpl_vars['contact']->value['fax'];?>
" /></td>
    </tr>
    <tr>
      <td height="20" align="right" >&nbsp;&nbsp;&nbsp;E-mail：</td>
      <td height="20" ><label for="textfield"></label>
        <input type="text" name="contact[email]"  value="<?php echo $_smarty_tpl->tpl_vars['contact']->value['email'];?>
" /></td>
    </tr>
    
    
    <!--
    
    <tr>
      <td height="20" align="left" bgcolor="#f1f1f1">&nbsp;&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['lang_sys']->value['smt_config'];?>
</td>
      <td height="20" bgcolor="#f1f1f1">&nbsp;</td>
    </tr>
    <tr>
      <td height="40" align="right"><?php echo $_smarty_tpl->tpl_vars['lang_sys']->value['smt_host'];?>
：</td>
      <td height="40"><label>
        <input type="text" name="smtp[host]" id="smtp[host]" value="<?php echo $_smarty_tpl->tpl_vars['smtp']->value['host'];?>
" />
      </label></td>
    </tr>
    <tr>
      <td height="40" align="right"><?php echo $_smarty_tpl->tpl_vars['lang_sys']->value['smt_user'];?>
：</td>
      <td height="40"><input type="text" name="smtp[user]" id="smtp[user]" value="<?php echo $_smarty_tpl->tpl_vars['smtp']->value['user'];?>
" /></td>
    </tr>
    <tr>
      <td height="40" align="right"><?php echo $_smarty_tpl->tpl_vars['lang_sys']->value['smt_pass'];?>
：</td>
      <td height="40"><input type="text" name="smtp[password]" id="smtp[password]"  value="<?php echo $_smarty_tpl->tpl_vars['smtp']->value['password'];?>
" /></td>
    </tr>
    <tr>
      <td height="40" align="right"><?php echo $_smarty_tpl->tpl_vars['lang_sys']->value['smtp_from'];?>
：</td>
      <td height="40"><input type="text" name="smtp[email_from]" id="smtp[email_from]" value="<?php echo $_smarty_tpl->tpl_vars['smtp']->value['email_from'];?>
" /></td>
    </tr>
   -->
   
    <tr>
      <td height="40" align="right">&nbsp;</td>
      <td height="40">
	  
	  <?php echo create_button(array('type'=>'save'),$_smarty_tpl);?>

	  
	  </td>
    </tr> 
   
  </table>
</form>
</fieldset>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>