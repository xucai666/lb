<?php /* Smarty version Smarty-3.1.14, created on 2013-08-20 02:09:53
         compiled from "application\templates\front\blue\en\dynamic.htm" */ ?>
<?php /*%%SmartyHeaderCode:145145212cff1dad3a7-49934873%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8411bcff968f2cfc987f914a8e46195525c8978a' => 
    array (
      0 => 'application\\templates\\front\\blue\\en\\dynamic.htm',
      1 => 1376875966,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '145145212cff1dad3a7-49934873',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dir_front' => 0,
    'img_url' => 0,
    'ci_uri' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5212cff20094e5_13663079',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5212cff20094e5_13663079')) {function content_5212cff20094e5_13663079($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<table width="992" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/ban_05.jpg" width="992" height="178" /></td>
  </tr>
</table>
<table width="992" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td width="246" valign="top">
      
      <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/left_archive.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

      <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/left_contact.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

      
      
    <td valign="top">


      <table width="743" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="3"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/daohanhh_09.jpg" width="3" height="28" /></td>
        <td width="743" style="background:url(<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/daohanhh_11.jpg) repeat-x; padding-left:20px; " class="hong">
      <?php echo func_tag(array('t_id'=>48,'where'=>("id=").(((($tmp = @end(explode(",",base64_decode($_smarty_tpl->tpl_vars['ci_uri']->value[4]))))===null||$tmp==='' ? 8 : $tmp))),'html_type'=>'detail'),$_smarty_tpl);?>

        
        </td>
        <td width="3"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/daohanhh_13.jpg" width="3" height="28" /></td>
      </tr>
      <tr>
  <td width="691" colspan="3" class="bian1">
 <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px; margin-bottom:14px;">
 
    <?php echo func_tag(array('t_id'=>46,'where'=>"n_pid like '".((string)base64_decode($_smarty_tpl->tpl_vars['ci_uri']->value[4]))."%' "),$_smarty_tpl);?>

    
  </table>
  
  <div align="center" class="page"> <?php echo func_tag_pager(array('t_id'=>46),$_smarty_tpl);?>
</div>


  
        </td>
      </tr>
    </table></td>
  </tr>
</table>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>