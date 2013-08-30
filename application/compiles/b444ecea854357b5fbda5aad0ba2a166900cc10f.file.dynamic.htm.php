<?php /* Smarty version Smarty-3.1.14, created on 2013-08-30 07:12:58
         compiled from "application\templates\front\blue\zh\dynamic.htm" */ ?>
<?php /*%%SmartyHeaderCode:24427522045fae21675-31757581%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b444ecea854357b5fbda5aad0ba2a166900cc10f' => 
    array (
      0 => 'application\\templates\\front\\blue\\zh\\dynamic.htm',
      1 => 1377056163,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24427522045fae21675-31757581',
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
  'unifunc' => 'content_522045fb0b3443_50914941',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_522045fb0b3443_50914941')) {function content_522045fb0b3443_50914941($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<table width="992" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td width="246" valign="top">
      
      <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/left_archive.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

      <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/left_contact.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

      
      
    <td valign="top" width="746">


      <table  border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="3"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/daohanhh_09.jpg" width="3" height="28" /></td>
        <td  width="740" style="background:url(<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/daohanhh_11.jpg) repeat-x; " class="hong">
      <?php echo func_tag(array('t_id'=>48,'where'=>("id=").(((($tmp = @end(explode(",",base64_decode($_smarty_tpl->tpl_vars['ci_uri']->value[3]))))===null||$tmp==='' ? 8 : $tmp))),'html_type'=>'detail'),$_smarty_tpl);?>

        
        </td>
        <td width="3"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/daohanhh_13.jpg" width="3" height="28" /></td>
      </tr>
      <tr>
  <td  colspan="3" class="bian1">
 <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px; margin-bottom:14px;">
 
    <?php echo func_tag(array('t_id'=>46,'where'=>"n_pid like '".((string)base64_decode($_smarty_tpl->tpl_vars['ci_uri']->value[3]))."%' "),$_smarty_tpl);?>

    
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