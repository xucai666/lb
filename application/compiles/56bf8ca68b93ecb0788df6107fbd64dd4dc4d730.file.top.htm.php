<?php /* Smarty version Smarty-3.1.14, created on 2013-08-26 03:09:31
         compiled from "application\templates\front\blue\en\top.htm" */ ?>
<?php /*%%SmartyHeaderCode:1705521ac6eb3f7860-40328020%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '56bf8ca68b93ecb0788df6107fbd64dd4dc4d730' => 
    array (
      0 => 'application\\templates\\front\\blue\\en\\top.htm',
      1 => 1377254573,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1705521ac6eb3f7860-40328020',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'optimize' => 0,
    'header_html' => 0,
    'img_url' => 0,
    'site_url' => 0,
    'next_lang' => 0,
    'lang_type' => 0,
    'breadcrumb' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_521ac6eb54a5e1_78621375',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_521ac6eb54a5e1_78621375')) {function content_521ac6eb54a5e1_78621375($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" /> 
<title><?php echo $_smarty_tpl->tpl_vars['optimize']->value['title'];?>
</title>
<meta name="Keywords" content="<?php echo $_smarty_tpl->tpl_vars['optimize']->value['meta'];?>
" />
<meta name="Description" content="<?php echo $_smarty_tpl->tpl_vars['optimize']->value['description'];?>
" />

<?php echo $_smarty_tpl->tpl_vars['header_html']->value['css'];?>

<?php echo $_smarty_tpl->tpl_vars['header_html']->value['js'];?>


</head> 
 <body> 
<table width="992" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="3"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/top_02.jpg" width="3" height="95" /></td>
    <td style="background:url(<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/top_04.jpg) repeat-x"><table width="985" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td valign="top">
        
        <img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/logo_02.jpg" width="237" height="95" style="margin-left:27px;" /></td>
        <td width="552"><table width="552" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="552" align="right" style="position:relative" >
            
                        
                   
            
              <form id="form1" name="form1" method="post" action="<?php echo func_site_url(array('segments'=>'search'),$_smarty_tpl);?>
" >
         <ul class="index_top_right">
           
             <li>
             <a href="<?php echo ($_smarty_tpl->tpl_vars['site_url']->value).($_smarty_tpl->tpl_vars['next_lang']->value);?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/lang_change.gif">&nbsp;<?php echo $_smarty_tpl->tpl_vars['lang_type']->value;?>
</a>
            
          
         </li>
         <li class="top_search_li" > 
            <input type="text" name="title" id="textfield"   class="input" /> 
            <input type="image" src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/sousuo_07.jpg"  border="0"/>
            </li>

            <li class="account_link">
            <?php if (get_cookie("member")){?>
            <a href="<?php echo site_url("front/member/action_member_center");?>
">

            你好,<?php echo func_my_encrypt(get_cookie("member"),'DECODE');?>
, 会员中心</a>

            <?php }else{ ?>
            <a href="<?php echo site_url("front/member/action_register");?>
">注册</a><a href="<?php echo site_url("front/member/index");?>
">登陆</a>
            
            <?php }?>


            </li>
           
        </ul>

          </form>
        
            
            </td>
          </tr>
          <tr>
            <td>


         <table width="552" border="0" cellspacing="0" cellpadding="0" style="margin-top:14px; margin-right:18px;">
              <tr>
                <?php echo func_tag(array('t_id'=>44),$_smarty_tpl);?>

              </tr>
            </table>
</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
    <td width="3"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/top_06.jpg" width="3" height="95" /></td>
  </tr>

</table>


<table width="992" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td>

    <?php echo func_tag(array('t_id'=>44,'html_type'=>"detail",'where'=>(("c_url like '").((ci_router('controller')))).(("%'")),'page_size'=>"1"),$_smarty_tpl);?>


    </td>
  </tr>
</table>
<?php echo $_smarty_tpl->tpl_vars['breadcrumb']->value;?>

<?php }} ?>