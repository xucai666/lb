<?php /* Smarty version Smarty-3.1.14, created on 2013-08-31 07:45:08
         compiled from "application\templates\front\blue\zh\email_template.htm" */ ?>
<?php /*%%SmartyHeaderCode:736752219f04447743-20354801%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e643856bee13800cc20891add1fb5b55a472ebd1' => 
    array (
      0 => 'application\\templates\\front\\blue\\zh\\email_template.htm',
      1 => 1376557641,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '736752219f04447743-20354801',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52219f04498c24_06987819',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52219f04498c24_06987819')) {function content_52219f04498c24_06987819($_smarty_tpl) {?><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table width="702" border="0" cellspacing="0" cellpadding="0">
            <tbody>
              <tr>
                <td height="1" colspan="7" bgcolor="#FFC751"></td>
              </tr>
              <tr>
                <td height="1" colspan="7"></td>
              </tr>
              <tr>
                <td height="24" colspan="7" bgcolor="#FFAD00">    <strong>{eg_pos}</strong> [ 职位编号：{eg_id}]</td>
              </tr>
              <tr>
                <td height="1" colspan="7"></td>
              </tr>
              <tr>
                <td height="1" colspan="7" bgcolor="#FFC751"></td>
              </tr>
              <tr>
                <td height="30" colspan="7" align="center"><table width="97%" border="0" cellspacing="0" cellpadding="0">
                  <tbody>
                    <tr>
                      <td><p><br />
                        电子邮箱：eg_email<br />
                        发布日期：eg_date <br />
                        工作地点eg_area} <br />
                        招聘人数：eg_people<br />
                        学        历：eg_edu <br />
                        工作年限：eg_years  <br />
                        外语要求：eg_eng  <br />
                        <br />
                        <strong>任职资格： </strong><br />
                       eg_content
                        </p>
                        <p>&gt;&gt;<a href="eg_link"> 详情点此链接</a></p></td>
                    </tr>
                   
                  </tbody>
                </table></td>
              </tr>
            </tbody>
          </table>
<?php }} ?>