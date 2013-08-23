<?php /* Smarty version Smarty-3.1.14, created on 2013-08-23 01:20:53
         compiled from "application\templates\front\blue\zh\member_login.htm" */ ?>
<?php /*%%SmartyHeaderCode:161045216a2e4d403f2-12314151%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c01d90af9ac5c00f0fc126ff4f7b125718217cde' => 
    array (
      0 => 'application\\templates\\front\\blue\\zh\\member_login.htm',
      1 => 1377220820,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '161045216a2e4d403f2-12314151',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5216a2e4d44d21_06543385',
  'variables' => 
  array (
    'dir_front' => 0,
    'm_user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5216a2e4d44d21_06543385')) {function content_5216a2e4d44d21_06543385($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>



<table width="992" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td width="246" valign="top">
    
     <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/left_about.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

     <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/left_contact.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    
      
    <td valign="top" class="login">
        <h1 align="center">用户登陆</h1>
       <form method="post" action="<?php echo site_url('front/member/action_login');?>
">
       <ul>
           <li>用户名：<input type="text" name="m_user" value="<?php echo $_smarty_tpl->tpl_vars['m_user']->value;?>
"/><?php echo form_error("m_user");?>
</li>
           <li> 密&nbsp;&nbsp;码：<input type="password" name="m_pass" /><?php echo form_error("m_pass");?>
</li>
           <li>验证码：<input type="text" name="m_captcha" /><img src="<?php echo site_url('front/member/action_captcha');?>
" /><?php echo form_error("m_captcha");?>
</li>
         

       </ul>
        
     <div align="center"> <?php echo create_button(array('type'=>'login'),$_smarty_tpl);?>
</div>
    
    
      </form>
    </td>
  </tr> 
</table>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>