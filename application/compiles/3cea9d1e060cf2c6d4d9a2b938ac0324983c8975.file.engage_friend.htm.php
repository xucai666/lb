<?php /* Smarty version Smarty-3.1.14, created on 2013-08-15 09:04:11
         compiled from "application\templates\front\blue\zh\engage_friend.htm" */ ?>
<?php /*%%SmartyHeaderCode:17888520c875ec91853-63635328%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3cea9d1e060cf2c6d4d9a2b938ac0324983c8975' => 
    array (
      0 => 'application\\templates\\front\\blue\\zh\\engage_friend.htm',
      1 => 1376557450,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17888520c875ec91853-63635328',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_520c875f172870_85792781',
  'variables' => 
  array (
    'dir_front' => 0,
    'img_url' => 0,
    'site_url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520c875f172870_85792781')) {function content_520c875f172870_85792781($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<table width="992" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top:13px;">
  <tr>
    <td><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/ban_05.jpg" width="992" height="178" /></td>
  </tr>
</table>
<table width="992" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top:13px;">
  <tr>
    <td width="246" valign="top">
    
     <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/left_about.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

     <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/left_contact.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    
      
    <td valign="top">
  <h1>职位推荐</h1>
    
                <form action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/front/engage/action_email?eg_id=<?php echo $_GET['eg_id'];?>
" method="post" name="einput" id="einput">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tbody>
                    <tr>
                      <td colspan="7">
                        如果您希望把 资深产品经理 职位介绍给您的朋友：
请输入您朋友的电子邮件地址： 
                        <input name="email" id="email" />
                        <label>
                          <input type="submit" name="button" id="button" value="发送邮件" />
                        </label>


                      </td>
                    </tr>
                   
                  </tbody>
                </table>
              </form>
  </td>
  </tr>
</table>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php }} ?>