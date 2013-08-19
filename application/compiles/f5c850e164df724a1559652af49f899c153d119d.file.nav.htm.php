<?php /* Smarty version Smarty-3.1.14, created on 2013-08-19 03:52:18
         compiled from "application\templates\front\blue\zh\nav.htm" */ ?>
<?php /*%%SmartyHeaderCode:15840521195cf507940-58945121%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5c850e164df724a1559652af49f899c153d119d' => 
    array (
      0 => 'application\\templates\\front\\blue\\zh\\nav.htm',
      1 => 1376884334,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15840521195cf507940-58945121',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_521195cf545b49_29461849',
  'variables' => 
  array (
    'img_url' => 0,
    'modules' => 0,
    'key' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_521195cf545b49_29461849')) {function content_521195cf545b49_29461849($_smarty_tpl) {?><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	

<table width="233" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="3"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/daohanhh_09.jpg" width="3" height="28" /></td>
        <td width="212" style="background:url(<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/daohanhh_11.jpg) repeat-x; padding-left:15px;" class="hong">分类</td>
        <td width="3"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/daohanhh_13.jpg" width="3" height="28" /></td>
      </tr>
      <tr>
        <td colspan="3" class="bian1 search_nav" >
          	<ul>
    
      <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['modules']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
        <li id="nav<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"   ><?php echo ci_anchor(array('title'=>$_smarty_tpl->tpl_vars['item']->value['title'],'segment'=>"front/search/index/".((string)$_smarty_tpl->tpl_vars['key']->value)),$_smarty_tpl);?>
</li>
        <?php } ?>
      </ul>    
         
         
        </td>
      </tr>
    </table><?php }} ?>