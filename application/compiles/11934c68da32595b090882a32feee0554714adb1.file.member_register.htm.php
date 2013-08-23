<?php /* Smarty version Smarty-3.1.14, created on 2013-08-23 01:00:04
         compiled from "application\templates\front\blue\zh\member_register.htm" */ ?>
<?php /*%%SmartyHeaderCode:201905216abab607c95-39730117%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '11934c68da32595b090882a32feee0554714adb1' => 
    array (
      0 => 'application\\templates\\front\\blue\\zh\\member_register.htm',
      1 => 1377219582,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '201905216abab607c95-39730117',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5216abab702437_36392159',
  'variables' => 
  array (
    'dir_front' => 0,
    'main' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5216abab702437_36392159')) {function content_5216abab702437_36392159($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>



<table width="992" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td width="246" valign="top">
    
     <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/left_about.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

     <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/left_contact.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    
      
    <td valign="top" class="login">
        <h1 align="center">用户注册</h1>
        
       <form method="post" action="<?php echo site_url('front/member/action_register_save');?>
">
       <ul>
           <li><h3 >注意：*号位必填项</h3></li>
           <li>用户名：<input type="text" name="main[m_user]" value="<?php echo $_smarty_tpl->tpl_vars['main']->value['m_user'];?>
"/>*<?php echo form_error("main[m_user]");?>
</li>
           <li> 密&nbsp;&nbsp;码：<input type="password" name="main[m_pass]" />*<?php echo form_error("main[m_pass]");?>
</li>

           <li> 手&nbsp;&nbsp;机：<input type="text" name="main[m_mobile]"  value="<?php echo $_smarty_tpl->tpl_vars['main']->value['mobile'];?>
" /><?php echo form_error("main[m_mobile]");?>
</li>
           <li> 邮&nbsp;&nbsp;箱：<input type="text" name="main[m_email]" value="<?php echo $_smarty_tpl->tpl_vars['main']->value['email'];?>
" />*<?php echo form_error("main[m_email]");?>
</li>
           <li> 称&nbsp;&nbsp;呼：<input type="text" name="main[m_name]" value="<?php echo $_smarty_tpl->tpl_vars['main']->value['m_name'];?>
" />*<?php echo form_error("main[m_name]");?>
</li>
          

       </ul>
        
     <div align="center"> <?php echo create_button(array('type'=>'register'),$_smarty_tpl);?>
</div>
    
    
      </form>
    </td>
  </tr> 
</table>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>