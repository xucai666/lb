<?php /* Smarty version Smarty-3.1.14, created on 2013-09-05 00:12:56
         compiled from "application\templates\front\corcms\zh\search.htm" */ ?>
<?php /*%%SmartyHeaderCode:3092352275c085d0fb1-58771595%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fc9d4da903e9dc07a426a4bfba0474de43cf4483' => 
    array (
      0 => 'application\\templates\\front\\corcms\\zh\\search.htm',
      1 => 1377394205,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3092352275c085d0fb1-58771595',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dir_front' => 0,
    'img_url' => 0,
    'list' => 0,
    'item' => 0,
    'page_link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52275c08781bf7_84589004',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52275c08781bf7_84589004')) {function content_52275c08781bf7_84589004($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<table width="992" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td width="246" valign="top">
      
      <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/nav.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

      <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/left_contact.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

      
    <td valign="top">


      <table width="743" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="3"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/daohanhh_09.jpg" width="3" height="28" /></td>
        <td width="743" style="background:url(<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/daohanhh_11.jpg) repeat-x; padding-left:20px; " class="hong">
            信息检索
        
        </td>
        <td width="3"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/daohanhh_13.jpg" width="3" height="28" /></td>
      </tr>
      <tr>
  <td width="691" colspan="3" class="bian1 search_list" valign="top">
       <div align="center">
       
            </div> 

        <ul >

      <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
            <li><a href='<?php echo $_smarty_tpl->tpl_vars['item']->value['url'];?>
' target="_blank"><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</a></li>
        <?php } ?>

        
     </ul>
    
  
 <div align="center" class="page"> <?php echo $_smarty_tpl->tpl_vars['page_link']->value;?>
</div>
  
        </td>
      </tr>
    </table></td>
  </tr>
</table>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>