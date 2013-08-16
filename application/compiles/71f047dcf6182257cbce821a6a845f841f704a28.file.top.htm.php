<?php /* Smarty version Smarty-3.1.14, created on 2013-08-15 07:11:30
         compiled from "application\templates\front\blue\zh\top.htm" */ ?>
<?php /*%%SmartyHeaderCode:474520c7f22d2fef3-69349120%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '71f047dcf6182257cbce821a6a845f841f704a28' => 
    array (
      0 => 'application\\templates\\front\\blue\\zh\\top.htm',
      1 => 1376474579,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '474520c7f22d2fef3-69349120',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'optimize' => 0,
    'header_html' => 0,
    'img_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_520c7f230ed0d3_03291097',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520c7f230ed0d3_03291097')) {function content_520c7f230ed0d3_03291097($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
            
                        
                   
            
               <form id="form1" name="form1" method="get" action="<?php echo func_site_url(array('segments'=>'front/search'),$_smarty_tpl);?>
"  style="margin:0">
        <table width="188" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px; margin-right:10px;">
  <tr>
            <td align="right">
            
            <input type="text" name="title" value="<?php echo $_POST['title'];?>
" id="textfield"  style="width:155px; height:18px; border:0; line-height:18px;" class=" input" /> </td>
            <td align="left"><input type="image" src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/sousuo_07.jpg" width="30" height="19" style=" margin-bottom:1px;" border="0"/></td>
          </tr>
      </table>

        
        
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
</table><?php }} ?>