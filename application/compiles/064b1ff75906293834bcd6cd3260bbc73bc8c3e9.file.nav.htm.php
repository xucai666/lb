<?php /* Smarty version Smarty-3.1.14, created on 2013-09-04 14:42:20
         compiled from "application\templates\front\corcms\zh\nav.htm" */ ?>
<?php /*%%SmartyHeaderCode:147045226d64cc40852-82375871%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '064b1ff75906293834bcd6cd3260bbc73bc8c3e9' => 
    array (
      0 => 'application\\templates\\front\\corcms\\zh\\nav.htm',
      1 => 1376994822,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '147045226d64cc40852-82375871',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'img_url' => 0,
    'modules' => 0,
    'key' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5226d64cc7c677_56281846',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5226d64cc7c677_56281846')) {function content_5226d64cc7c677_56281846($_smarty_tpl) {?><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	

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
"   ><?php echo ci_anchor(array('title'=>$_smarty_tpl->tpl_vars['item']->value['title'],'segment'=>"search/index/".((string)$_smarty_tpl->tpl_vars['key']->value)),$_smarty_tpl);?>
</li>
        <?php } ?>
      </ul>    
         
         
        </td>
      </tr>
    </table><?php }} ?>