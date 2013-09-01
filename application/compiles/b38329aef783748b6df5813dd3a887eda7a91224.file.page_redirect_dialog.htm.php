<?php /* Smarty version Smarty-3.1.14, created on 2013-09-01 12:38:22
         compiled from "application\templates\backend\blue\page_redirect_dialog.htm" */ ?>
<?php /*%%SmartyHeaderCode:189075223352ca57c76-22661343%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b38329aef783748b6df5813dd3a887eda7a91224' => 
    array (
      0 => 'application\\templates\\backend\\blue\\page_redirect_dialog.htm',
      1 => 1378039097,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '189075223352ca57c76-22661343',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5223352caf7e12_98156089',
  'variables' => 
  array (
    'dir_backend' => 0,
    'url' => 0,
    'msg' => 0,
    'item_lang' => 0,
    'time_page_redirect' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5223352caf7e12_98156089')) {function content_5223352caf7e12_98156089($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<center>
<script>
      var pgo=0;
      function JumpUrl(){
        if(pgo==0){ location='<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
'; pgo=1; }
      }
document.write("<div style='width:400px;height:100;font-size:10pt;background-color:#ffffff'><br/><br/>");
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