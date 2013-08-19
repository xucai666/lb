<?php /* Smarty version Smarty-3.1.14, created on 2013-08-18 17:51:40
         compiled from "application\templates\backend\blue\engage_add.htm" */ ?>
<?php /*%%SmartyHeaderCode:16000521109ac76a290-55435130%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6644619df8df639b6fb13b01dbf0c4c617d56858' => 
    array (
      0 => 'application\\templates\\backend\\blue\\engage_add.htm',
      1 => 1376550045,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16000521109ac76a290-55435130',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dir_backend' => 0,
    'lang_engage' => 0,
    'main' => 0,
    'edu_options' => 0,
    'editor' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_521109ac9a6680_02299807',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_521109ac9a6680_02299807')) {function content_521109ac9a6680_02299807($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'E:\\phpnow\\htdocs\\lb\\application\\libraries\\Smarty-3.1.14\\libs\\plugins\\modifier.date_format.php';
if (!is_callable('smarty_function_html_options')) include 'E:\\phpnow\\htdocs\\lb\\application\\libraries\\Smarty-3.1.14\\libs\\plugins\\function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<table width="100%" height="457" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td valign="top"><table width="753" height="51" border="0" align="center" cellpadding="0" cellspacing="0" style="	border-bottom-width: 1px;
	border-bottom-style: dashed;
	border-bottom-color: #CCCCCC;">
              <tr>
                <td width="50" bgcolor="#FFFFFF">&nbsp;</td>
                  <td width="703" bgcolor="#FFFFFF"><a style="font-size:26px; line-height:28px; font-weight:bold;"><?php echo $_smarty_tpl->tpl_vars['lang_engage']->value['theme_add'];?>
</a></td>
              </tr>
              </table>
              <div class="member_center_theme1"></div>
              <form action="<?php echo func_site_url(array('segments'=>"backend/engage/action_save"),$_smarty_tpl);?>
" method="post" name="form1" id="form1" onsubmit="return validator(this);">
              <table width="100%" align="center" cellpadding="0" cellspacing="0" class="edit">
                  <tr>
                    <td width="20%" height="20" align="right" class="l"><?php echo $_smarty_tpl->tpl_vars['lang_engage']->value['pos'];?>
</td>
                    <td width="4%" height="20">&nbsp;</td>
                    <td width="76%" height="20"><input name="main[eg_pos]" type="text" id="main[eg_pos]" value="<?php echo $_smarty_tpl->tpl_vars['main']->value['eg_pos'];?>
" size="25"  valid="required" errmsg="<?php echo $_smarty_tpl->tpl_vars['lang_engage']->value['inp_pos'];?>
"  /></td>
                </tr>
                  <tr>
                    <td height="20" align="right" valign="top" ><?php echo $_smarty_tpl->tpl_vars['lang_engage']->value['date'];?>
</td>
                    <td height="20" valign="top">&nbsp;</td>
                    <td height="20" valign="top">
                      <input name="main[eg_addtime]" type="text" class="Wdate"  style="width:90px"  onfocus="WdatePicker()" value="<?php echo smarty_modifier_date_format((($tmp = @$_smarty_tpl->tpl_vars['main']->value['eg_addtime'])===null||$tmp==='' ? time() : $tmp),"%Y-%m-%d");?>
" size="12" readonly="readonly" valid="required" errmsg="<?php echo $_smarty_tpl->tpl_vars['lang_engage']->value['inp_date'];?>
" />
                   </td>
                </tr>
                  <tr>
                    <td height="20" align="right" class="l"><?php echo $_smarty_tpl->tpl_vars['lang_engage']->value['eg_number'];?>
</td>
                    <td height="20">&nbsp;</td>
                    <td height="20"><label>
                      <input name="main[eg_people]" type="text" id="main[eg_people]" size="4"  value="<?php echo $_smarty_tpl->tpl_vars['main']->value['eg_people'];?>
"/>
                    </label></td>
                  </tr>
                  <tr>
                    <td height="20" align="right" class="l"><?php echo $_smarty_tpl->tpl_vars['lang_engage']->value['edu'];?>
</td>
                    <td height="20">&nbsp;</td>
                    <td height="20"><label>
                      <select name="main[eg_edu]" id="main[eg_edu]">
                      <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['edu_options']->value,'selected'=>$_smarty_tpl->tpl_vars['main']->value['eg_edu']),$_smarty_tpl);?>

                      	
                      </select>
                    </label></td>
                  </tr>
                  <tr>
                    <td height="20" align="right" class="l"><?php echo $_smarty_tpl->tpl_vars['lang_engage']->value['job_year'];?>
</td>
                    <td height="20">&nbsp;</td>
                    <td height="20"><input name="main[eg_years]" type="text" id="main[eg_years]" size="10" value="<?php echo $_smarty_tpl->tpl_vars['main']->value['eg_years'];?>
" /></td>
                  </tr>
                  <tr>
                    <td height="20" align="right" class="l"><?php echo $_smarty_tpl->tpl_vars['lang_engage']->value['foregin_lang'];?>
</td>
                    <td height="20">&nbsp;</td>
                    <td height="20"><input type="text" name="main[eg_eng]" id="main[eg_eng]"  value="<?php echo $_smarty_tpl->tpl_vars['main']->value['eg_eng'];?>
"/></td>
                </tr>
                  <tr>
                    <td height="20" align="right" class="l"><?php echo $_smarty_tpl->tpl_vars['lang_engage']->value['qualify'];?>
</td>
                    <td height="20">&nbsp;</td>
                    <td height="20"><textarea name="main[eg_content]" cols="50" rows="4"  id="eg_content" style="display:none" valid='custom' custom='getContentValue' errmsg='<?php echo $_smarty_tpl->tpl_vars['lang_engage']->value['inp_content'];?>
'><?php echo $_smarty_tpl->tpl_vars['main']->value['eg_content'];?>
</textarea>
                       <?php echo $_smarty_tpl->tpl_vars['editor']->value['eg_content'];?>

                    </td>
                </tr>
                  <tr>
                    <td height="20" align="right" valign="top" class="l"><?php echo $_smarty_tpl->tpl_vars['lang_engage']->value['contact_way'];?>
</td>
                    <td height="20" valign="top">&nbsp;</td>
                    <td height="20" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="50" align="right"><?php echo $_smarty_tpl->tpl_vars['lang_engage']->value['contact'];?>
</td>
                        <td>&nbsp;</td>
                        <td height="50"><input name="main[eg_contact]" type="text" id="main[eg_contact]" value="<?php echo $_smarty_tpl->tpl_vars['main']->value['eg_contact'];?>
" size="20"  valid="required" errmsg="<?php echo $_smarty_tpl->tpl_vars['lang_engage']->value['inp_contact'];?>
" />
                          &nbsp;<span class="red1">*</span></td>
                        <td height="50" align="right"><span class="l"><?php echo $_smarty_tpl->tpl_vars['lang_engage']->value['tel'];?>
</span></td>
                        <td>&nbsp;</td>
                        <td height="50"><input name="main[eg_tel]" type="text" id="main[eg_tel]" value="<?php echo $_smarty_tpl->tpl_vars['main']->value['eg_tel'];?>
" size="20"   valid="required" errmsg="<?php echo $_smarty_tpl->tpl_vars['lang_engage']->value['inp_tel'];?>
" />
                          &nbsp;<span class="red1">*</span></td>
                      </tr>
                      <tr>
                        <td height="50" align="right"><span class="l"><?php echo $_smarty_tpl->tpl_vars['lang_engage']->value['email'];?>
</span></td>
                        <td>&nbsp;</td>
                        <td height="50"><input name="main[eg_email]" type="text" id="main[eg_email]" value="<?php echo $_smarty_tpl->tpl_vars['main']->value['eg_email'];?>
" size="20" />
                          &nbsp;</td>
                        <td height="50" align="right">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td height="50">&nbsp;</td>
                      </tr>
                      <tr>
                        <td height="50" align="right"><span class="l"><?php echo $_smarty_tpl->tpl_vars['lang_engage']->value['url'];?>
</span></td>
                        <td></td>
                        <td height="50" colspan="4"><input name="main[eg_url]" type="text" id="main[eg_url]" value="<?php echo $_smarty_tpl->tpl_vars['main']->value['eg_url'];?>
" size="50"    />
                          &nbsp;<span class="red1">*</span></td>
                      </tr>
                    </table></td>
                </tr>
                  <tr>
                    <td height="20" align="right" class="l">&nbsp;</td>
                    <td height="20">&nbsp;</td>
                    <td height="20" align="left"><span style="text-align:center">
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input name="main[eg_id]" type="hidden" id="main[eg_id]" value="<?php echo $_smarty_tpl->tpl_vars['main']->value['eg_id'];?>
" />
                      <input type="submit" name="Submit" value="<?php echo $_smarty_tpl->tpl_vars['lang_engage']->value['submit'];?>
"  />
                    </span></td>
                </tr>
                  <tr>
                    <td colspan='3' style='text-align:center'>&nbsp;</td>
                  </tr>
                </table>
              </form>
              <p>&nbsp;</p>
            <p>&nbsp;</p></td>
          </tr>
        </table>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
        <?php }} ?>