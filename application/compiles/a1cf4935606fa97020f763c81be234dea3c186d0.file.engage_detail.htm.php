<?php /* Smarty version Smarty-3.1.14, created on 2013-08-21 04:00:22
         compiled from "application\templates\front\blue\zh\engage_detail.htm" */ ?>
<?php /*%%SmartyHeaderCode:28570521351132ebaf5-37096019%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a1cf4935606fa97020f763c81be234dea3c186d0' => 
    array (
      0 => 'application\\templates\\front\\blue\\zh\\engage_detail.htm',
      1 => 1377056287,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28570521351132ebaf5-37096019',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52135113463701_44147622',
  'variables' => 
  array (
    'dir_front' => 0,
    'main' => 0,
    'edu_level' => 0,
    'site_url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52135113463701_44147622')) {function content_52135113463701_44147622($_smarty_tpl) {?>


<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>



<table width="992" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td width="246" valign="top">
    
     <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/left_about.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

     <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/left_contact.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    
      
    <td valign="top">
  
       <table width="100%" border="1" cellspacing="0" cellpadding="0">
            
              <tr>
                <td height="24" colspan="7" align="left" bgcolor="#e8e8e8">    <strong><?php echo $_smarty_tpl->tpl_vars['main']->value['eg_pos'];?>
</strong> [ 职位编号：<?php echo $_smarty_tpl->tpl_vars['main']->value['eg_id'];?>
 ]</td>
              </tr>
            
                        <tr>
                          <td width="25%" height="40" align="right">电子邮箱：</td>
                          <td width="75%" align="left">&nbsp;<?php echo $_smarty_tpl->tpl_vars['main']->value['eg_email'];?>
</td>
                        </tr>
                        <tr>
                          <td height="40" align="right">发布日期：</td>
                          <td align="left">&nbsp;<?php echo $_smarty_tpl->tpl_vars['main']->value['eg_date'];?>
</td>
                        </tr>
                        <tr>
                          <td height="40" align="right">工作地点：</td>
                          <td align="left">&nbsp;<?php echo func_get_area_str(array('id'=>$_smarty_tpl->tpl_vars['main']->value['eg_area']),$_smarty_tpl);?>
</td>
                        </tr>
                        <tr>
                          <td height="40" align="right"> 招聘人数：</td>
                          <td align="left">&nbsp;<?php echo $_smarty_tpl->tpl_vars['main']->value['eg_people'];?>
</td>
                        </tr>
                        <tr>
                          <td height="40" align="right">学    历：</td>
                          <td align="left">&nbsp;<?php echo $_smarty_tpl->tpl_vars['edu_level']->value['eg_edu'];?>
</td>
                        </tr>
                        <tr>
                          <td height="40" align="right">工作年限：</td>
                          <td align="left">&nbsp;<?php echo $_smarty_tpl->tpl_vars['edu_level']->value['eg_years'];?>
</td>
                        </tr>
                        <tr>
                          <td height="40" align="right">外语要求：</td>
                          <td align="left">&nbsp;<?php echo $_smarty_tpl->tpl_vars['edu_level']->value['eg_eng'];?>
</td>
                        </tr>
                        <tr>
                          <td height="40" align="right"> 任职资格：</td>
                          <td height="200" align="left">&nbsp;<?php echo $_smarty_tpl->tpl_vars['edu_level']->value['eg_content'];?>
</td>
                        </tr>
                      </table>
                        ［<a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/engage/action_apply/?eg_id=<?php echo $_GET['eg_id'];?>
">申请此职位</a>］ ［<a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/engage/action_friend/?eg_id=<?php echo $_GET['eg_id'];?>
">推荐给朋友</a>］
  </td>
  </tr>
</table>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>