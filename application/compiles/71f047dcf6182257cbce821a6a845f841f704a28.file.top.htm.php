<?php /* Smarty version Smarty-3.1.14, created on 2013-09-01 01:26:07
         compiled from "application\templates\front\blue\zh\top.htm" */ ?>
<?php /*%%SmartyHeaderCode:13033522297af4615f3-11053386%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '71f047dcf6182257cbce821a6a845f841f704a28' => 
    array (
      0 => 'application\\templates\\front\\blue\\zh\\top.htm',
      1 => 1377396204,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13033522297af4615f3-11053386',
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
  'unifunc' => 'content_522297af59ccd7_68649108',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_522297af59ccd7_68649108')) {function content_522297af59ccd7_68649108($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
            
                        
                   
            
              <form id="form1" name="form1" method="get" action="<?php echo func_site_url(array('segments'=>'search'),$_smarty_tpl);?>
" >
         <ul class="index_top_right">
           
             <li>
             <a href="<?php echo ($_smarty_tpl->tpl_vars['site_url']->value).($_smarty_tpl->tpl_vars['next_lang']->value);?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/lang_change.gif">&nbsp;<?php echo $_smarty_tpl->tpl_vars['lang_type']->value;?>
</a>
            
          
         </li>
         <li class="top_search_li" > 
            <input type="text" name="title" id="textfield"   class="input" value="<?php echo $_GET['title'];?>
"/> 
            <input type="submit"  class="top_search_button" value="" />
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


         <table width="552" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px; margin-right:18px;">
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