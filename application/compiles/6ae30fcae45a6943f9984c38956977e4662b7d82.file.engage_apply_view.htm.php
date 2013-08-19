<?php /* Smarty version Smarty-3.1.14, created on 2013-08-18 17:51:46
         compiled from "application\templates\backend\blue\engage_apply_view.htm" */ ?>
<?php /*%%SmartyHeaderCode:14590521109b27515c5-37497091%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6ae30fcae45a6943f9984c38956977e4662b7d82' => 
    array (
      0 => 'application\\templates\\backend\\blue\\engage_apply_view.htm',
      1 => 1376561668,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14590521109b27515c5-37497091',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dir_backend' => 0,
    'main' => 0,
    'base_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_521109b28b5797_48435658',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_521109b28b5797_48435658')) {function content_521109b28b5797_48435658($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<table width="100%" height="457" border="0" cellpadding="0" cellspacing="0" >
          <tr>
            <td align="right" valign="top"><table width="753" height="51" border="0" align="center" cellpadding="0" cellspacing="0" style="	border-bottom-width: 1px;
	border-bottom-style: dashed;
	border-bottom-color: #CCCCCC;">
              <tr>
                <td width="50" bgcolor="#FFFFFF">&nbsp;</td>
                  <td width="703" bgcolor="#FFFFFF"><a style="font-size:26px; line-height:28px; font-weight:bold;">查看应聘简历</a></td>
              </tr>
              </table>
              <div class="member_center_theme1"></div>
             
              <table width="850" border="0" align="center" cellpadding="0" cellspacing="0" class="mytable">
                <tr>
                  <td width="218" height="50" align="right" valign="middle">应聘职位*：</td>
                  <td height="50" colspan="3" align="left" valign="middle"><?php echo $_smarty_tpl->tpl_vars['main']->value['eg_pos_str'];?>
&nbsp;</td>
                </tr>
                <tr>
                  <td height="50" align="right" valign="middle">姓名*：</td>
                  <td width="328" height="50" align="left" valign="middle"><?php echo $_smarty_tpl->tpl_vars['main']->value['contact'];?>
&nbsp;</td>
                  <td width="111" height="50" align="right" valign="middle">Email*</td>
                  <td width="193" height="50" align="left" valign="middle">&nbsp;</td>
                </tr>
                <tr>
                  <td height="50" align="right" valign="middle" nowrap="nowrap">出生日期*：</td>
                  <td height="50" align="left" valign="middle" nowrap="nowrap">
                    <?php echo $_smarty_tpl->tpl_vars['main']->value['b_year'];?>
年 
                    
                     <?php echo $_smarty_tpl->tpl_vars['main']->value['b_month'];?>
月 
                    
                  <?php echo $_smarty_tpl->tpl_vars['main']->value['b_day'];?>
 日</td>
                  <td height="50" align="right" valign="middle">性别*</td>
                  <td height="50" align="left" valign="middle"><?php echo func_sex(array('sex'=>$_smarty_tpl->tpl_vars['main']->value['sex']),$_smarty_tpl);?>
&nbsp;</td>
                </tr>
                <tr>
                  <td height="50" align="right" valign="middle">居住地*：</td>
                  <td height="50" align="left" valign="middle">
                 
                  <?php echo func_get_area_str(array('id'=>$_smarty_tpl->tpl_vars['main']->value['l_place']),$_smarty_tpl);?>

                    &nbsp;</td>
                  <td height="50" align="right" valign="middle">户口*</td>
                  <td height="50" align="left" valign="middle"><?php echo func_get_area_str(array('id'=>$_smarty_tpl->tpl_vars['main']->value['b_place']),$_smarty_tpl);?>
&nbsp;</td>
                </tr>
                <tr>
                  <td height="50" align="right" valign="middle">工作年限*：</td>
                  <td height="50" colspan="3" align="left" valign="middle">
                  
                  <?php echo func_work_year(array('work_year'=>$_smarty_tpl->tpl_vars['main']->value['work_year']),$_smarty_tpl);?>
&nbsp;</td>
                </tr>
                <tr>
                  <td height="50" align="right" valign="middle">联系电话/手机*：</td>
                  <td height="50" colspan="3" align="left" valign="middle"><?php echo $_smarty_tpl->tpl_vars['main']->value['mobile'];?>
&nbsp;</td>
                </tr>
                <tr>
                  <td height="50" align="right" valign="middle">简历文件*：</td>
                  <td height="50" colspan="3" align="left" valign="middle">
                  <?php if ($_smarty_tpl->tpl_vars['main']->value['apply_file']){?>
                  <label><br />
                    <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/uploads/engage/<?php echo $_smarty_tpl->tpl_vars['main']->value['apply_file'];?>
" target="_blank">点击浏览</a></label>
                  
                  <?php }?>
                  
                  
                  
                  </td>
                </tr>
                <tr>
                  <td height="50" align="right" valign="top">备注：</td>
                  <td height="150" colspan="3" align="left" valign="top"><?php echo $_smarty_tpl->tpl_vars['main']->value['remarks'];?>
&nbsp;</td>
                </tr>
              </table>
              <div align="center" ><?php echo create_button(array('type'=>"back",'url'=>"javascript:window_back();"),$_smarty_tpl);?>
</div>
             
             </td>
          </tr>
        </table>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
        <?php }} ?>