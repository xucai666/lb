<?php /* Smarty version Smarty-3.1.14, created on 2013-09-03 15:57:57
         compiled from "application\templates\backend\corcms\logs_login_list.htm" */ ?>
<?php /*%%SmartyHeaderCode:2131752260577cdd2f2-92535445%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5417e6796e126b33c38e5e83f5acfa3ffea85a32' => 
    array (
      0 => 'application\\templates\\backend\\corcms\\logs_login_list.htm',
      1 => 1378223869,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2131752260577cdd2f2-92535445',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52260577df41c6_66744914',
  'variables' => 
  array (
    'dir_backend' => 0,
    'lang_log' => 0,
    'site_url' => 0,
    'list' => 0,
    'item' => 0,
    'page_link' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52260577df41c6_66744914')) {function content_52260577df41c6_66744914($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="nav_title" align="left" >&nbsp;<?php echo $_smarty_tpl->tpl_vars['lang_log']->value['theme_list'];?>
</div>

<table class="search"   style="width:100%">
<tr><td>
	<form action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/backend/logs/action_login_log/" method="get">   
    <?php echo $_smarty_tpl->tpl_vars['lang_log']->value['operator'];?>
：
        <input type="text" name="login_user" value="<?php echo $_GET['login_user'];?>
" />

    <?php echo $_smarty_tpl->tpl_vars['lang_log']->value['module_name'];?>
：
    
    
  
    <?php echo $_smarty_tpl->tpl_vars['lang_log']->value['date'];?>
：
        <input type="text" name="login_time" size="10" readonly="readonly" onclick="WdatePicker()" class="Wdate" value="<?php echo $_GET['login_time'];?>
" />      
        

        <?php echo create_button(array('type'=>'search'),$_smarty_tpl);?>

	</form>

</td>
</tr>
</table>
<br />


<form id="form1" name="form1" method="post" action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/backend/logs/action_login_del">


<table width="100%" class="mytable" >
  <thead>
<tr>
 
  <th>
    <input type="checkbox" onclick="$('.login_ids').prop('checked',$(this).prop('checked'));" />
    <?php echo create_button(array('type'=>'delete'),$_smarty_tpl);?>
</th>
   <th>编号</th>
  <th><?php echo $_smarty_tpl->tpl_vars['lang_log']->value['operator'];?>
</th>
  <th>登陆时间</th>
  <th>浏览器</th>
  <th>IP</th>
  </tr>
</thead>
   
  <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
  <tr>
     
    <td align="center"><label>
      <input name="login_ids[]" type="checkbox" id="login_ids" class="login_ids" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['login_id'];?>
" />
    </label></td>
    <td align="center"><?php echo $_smarty_tpl->tpl_vars['item']->value['login_id'];?>
&nbsp;</td>
    <td align="center"><?php echo $_smarty_tpl->tpl_vars['item']->value['login_user'];?>
&nbsp;</td>
    <td align="center"><?php echo $_smarty_tpl->tpl_vars['item']->value['login_time'];?>
&nbsp;</td>
    <td align="left"><?php echo $_smarty_tpl->tpl_vars['item']->value['login_client'];?>
&nbsp;</td>
    <td align="center"><?php echo $_smarty_tpl->tpl_vars['item']->value['login_ip'];?>
&nbsp;</td>
  </tr>



<?php } ?>
</table>

<div align="center">
  <label>
  

  </label>
</div>

</form>
<div class="page_link">
	<?php echo $_smarty_tpl->tpl_vars['page_link']->value;?>

</div>
<script language="JavaScript">
	overclass($('#archives ul'));
</script>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>