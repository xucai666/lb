<?php /* Smarty version Smarty-3.1.14, created on 2013-08-17 09:52:25
         compiled from "application\templates\front\blue\zh\nav.htm" */ ?>
<?php /*%%SmartyHeaderCode:1038520f47d97a5635-23265979%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5c850e164df724a1559652af49f899c153d119d' => 
    array (
      0 => 'application\\templates\\front\\blue\\zh\\nav.htm',
      1 => 1376463431,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1038520f47d97a5635-23265979',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'img_url' => 0,
    'module_select' => 0,
    'modules' => 0,
    'key' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_520f47d97ff337_58833240',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520f47d97ff337_58833240')) {function content_520f47d97ff337_58833240($_smarty_tpl) {?><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script language='javascript' type='text/javascript'>
function trunNav(num){
	var navNum = 7;				// 菜单数
	var navName = "nav";			// 菜单名(去除id后面的序号的名称)
	var navContent = "navContent";// 内容名(去除id后面的序号的名称)

	for (i=1; i<=navNum; i++){
		if (i==num){
			document.getElementById(navName + i).style.background = "url(<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/index_22.jpg)";	// 鼠标经过时图片
			document.getElementById(navName + i).style.color = "#305490";
			document.getElementById(navName + i).style.fontSize = "14";
			/*没有切换内容不需要这两个背景document.getElementById(navContent + i).style.display = "";	// 显示选中菜单的内容*/
		}else{
			document.getElementById(navName + i).style.background = "url()";	// 还原成原来的图片
			document.getElementById(navName + i).style.color = "#333333";
			/*document.getElementById(navContent + i).style.display = "none";	// 关闭没选中菜单的内容*/
			document.getElementById(navName + i).style.fontSize = "12";
		}
	}
}
</script>

<script language='javascript' type='text/javascript'>
// 默认显示的菜单
function resetNav(){
	trunNav('<?php echo $_smarty_tpl->tpl_vars['module_select']->value;?>
');	// 默认菜单
}
</script>

    <script language='javascript' type='text/javascript'>
resetNav();	// 默认第一个菜单为选中项
</script>

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
" onmouseover="trunNav(<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
)" onmouseout="resetNav()"  ><?php echo ci_anchor(array('title'=>$_smarty_tpl->tpl_vars['item']->value['title'],'segment'=>"front/search/index/".((string)$_smarty_tpl->tpl_vars['key']->value)),$_smarty_tpl);?>
</li>
        <?php } ?>
      </ul>    
         
         
        </td>
      </tr>
    </table><?php }} ?>