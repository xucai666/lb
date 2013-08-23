<?php /* Smarty version Smarty-3.1.14, created on 2013-08-22 23:57:24
         compiled from "application\templates\front\blue\zh\page_redirect.htm" */ ?>
<?php /*%%SmartyHeaderCode:13775216a564a51e50-94009076%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b2e7c055084c5414b333e9745fd0bd9e6633dda' => 
    array (
      0 => 'application\\templates\\front\\blue\\zh\\page_redirect.htm',
      1 => 1376964166,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13775216a564a51e50-94009076',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'optimize' => 0,
    'url' => 0,
    'header_html' => 0,
    'base_url' => 0,
    'item_lang' => 0,
    'msg' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5216a564bda2f2_14863007',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5216a564bda2f2_14863007')) {function content_5216a564bda2f2_14863007($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<meta http-equiv="refresh" content="3;URL=<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
" />

<?php echo $_smarty_tpl->tpl_vars['header_html']->value['css'];?>

<?php echo $_smarty_tpl->tpl_vars['header_html']->value['js'];?>



<base href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
" />
</head>  <body> 
<center>
<style>div{line-height:160%;}</style>

<br /><div style='width:450px;padding:0px;border:1px solid #92C7E1;'><div style='text-align:left;padding:6px;font-size:12px;border-bottom:1px solid #92C7E1;color:#ffffff;background:#365678 url(/plus/img/wbg.gif);'><b><?php echo $_smarty_tpl->tpl_vars['item_lang']->value['cor_page_theme'];?>
</b></div>
<div style='height:130px;font-size:10pt;background:#ffffff'><br />
<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

<br /><a href='<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
'> <?php echo $_smarty_tpl->tpl_vars['item_lang']->value['cor_page_remarks'];?>
...</a><br/></div>

</body>
</html><?php }} ?>