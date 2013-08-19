<?php /* Smarty version Smarty-3.1.14, created on 2013-08-19 14:57:26
         compiled from "application\templates\backend\blue\page_redirect.htm" */ ?>
<?php /*%%SmartyHeaderCode:1145252123256b70445-88804905%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '926c21d0586ad8183cf0cf42f8c1aa662847750f' => 
    array (
      0 => 'application\\templates\\backend\\blue\\page_redirect.htm',
      1 => 1373382989,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1145252123256b70445-88804905',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dir_backend' => 0,
    'url' => 0,
    'msg' => 0,
    'item_lang' => 0,
    'time_page_redirect' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52123256c01554_86508117',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52123256c01554_86508117')) {function content_52123256c01554_86508117($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<center>
<script>
      var pgo=0;
      function JumpUrl(){
        if(pgo==0){ location='<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
'; pgo=1; }
      }
document.write("<br/><div style='width:400px;padding-top:4px;height:24;font-size:10pt;border-left:1px solid #b9df92;border-top:1px solid #b9df92;border-right:1px solid #b9df92;background-color:#f0f0f0;'>系统提示信息：</div>");
document.write("<div style='width:400px;height:100;font-size:10pt;border:1px solid #b9df92;background-color:#ffffff'><br/><br/>");
document.write("<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
");
document.write("<br/><br/><a href='<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
'><?php echo $_smarty_tpl->tpl_vars['item_lang']->value['mypage_remarks'];?>
...</a><br/><br/></div>");
setTimeout('JumpUrl()',<?php echo $_smarty_tpl->tpl_vars['time_page_redirect']->value;?>
);</script>
</center>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>



<?php }} ?>