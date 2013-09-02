<?php /* Smarty version Smarty-3.1.14, created on 2013-09-02 13:21:15
         compiled from "application\templates\backend\x6cms\page_redirect.htm" */ ?>
<?php /*%%SmartyHeaderCode:856522490cb890350-95454063%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c15f18a992a0c7c3e22c78e22375ee612893c43c' => 
    array (
      0 => 'application\\templates\\backend\\x6cms\\page_redirect.htm',
      1 => 1376964166,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '856522490cb890350-95454063',
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
  'unifunc' => 'content_522490cb958a04_16541341',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_522490cb958a04_16541341')) {function content_522490cb958a04_16541341($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
'><?php echo $_smarty_tpl->tpl_vars['item_lang']->value['cor_page_remarks'];?>
...</a><br/><br/></div>");
setTimeout('JumpUrl()',<?php echo $_smarty_tpl->tpl_vars['time_page_redirect']->value;?>
);</script>
</center>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>



<?php }} ?>