<?php /* Smarty version Smarty-3.1.14, created on 2013-08-16 02:50:41
         compiled from "application\templates\backend\blue\logs_list.htm" */ ?>
<?php /*%%SmartyHeaderCode:10166520d93814561e4-15665534%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd490128c3a99c2edf8ad1b47fa701c6ef7225ab3' => 
    array (
      0 => 'application\\templates\\backend\\blue\\logs_list.htm',
      1 => 1376495507,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10166520d93814561e4-15665534',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dir_backend' => 0,
    'base_url' => 0,
    'lang_log' => 0,
    'site_url' => 0,
    'log_types' => 0,
    'log_type_default' => 0,
    'list' => 0,
    'item' => 0,
    'page_link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_520d9381e0b488_86003751',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520d9381e0b488_86003751')) {function content_520d9381e0b488_86003751($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include 'E:\\phpnow\\htdocs\\lb\\application\\libraries\\Smarty-3.1.14\\libs\\plugins\\function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script language="javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/js/jquery.form.js?v2.43"></script>
<div class="nav_title" align="left" >&nbsp;<?php echo $_smarty_tpl->tpl_vars['lang_log']->value['theme_list'];?>
</div>

<table class="search"   style="width:100%">
<tr><td>
	<form action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/backend/logs/action_list/" method="get">   
    <?php echo $_smarty_tpl->tpl_vars['lang_log']->value['operator'];?>
：
        <input type="text" name="log_user" value="<?php echo $_GET['log_user'];?>
" />

    <?php echo $_smarty_tpl->tpl_vars['lang_log']->value['module_name'];?>
：
    
    <label>
      <select name="log_type" id="log_type">
      <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['log_types']->value,'selected'=>$_smarty_tpl->tpl_vars['log_type_default']->value),$_smarty_tpl);?>

      </select>
    </label>
    
        
        
  
    <?php echo $_smarty_tpl->tpl_vars['lang_log']->value['date'];?>
：
        <input type="text" name="log_date" size="10" readonly="readonly" onclick="WdatePicker()" class="Wdate" value="<?php echo $_GET['log_date'];?>
" />      
        

	<input type="submit" name="submit" value="<?php echo $_smarty_tpl->tpl_vars['lang_log']->value['query'];?>
" />
	</form>

</td>
</tr>
</table>
<br />


<form id="form1" name="form1" method="post" action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/backend/logs/action_del">


<table width="100%" class="mytable" >
  <thead>
<tr>
 
  <th><?php echo $_smarty_tpl->tpl_vars['lang_log']->value['select'];?>
</th>
   <th>编号</th>
  <th><?php echo $_smarty_tpl->tpl_vars['lang_log']->value['operator'];?>
</th>
  <th><?php echo $_smarty_tpl->tpl_vars['lang_log']->value['module_name'];?>
</th>
  <th><?php echo $_smarty_tpl->tpl_vars['lang_log']->value['content'];?>
</th>
  <th><?php echo $_smarty_tpl->tpl_vars['lang_log']->value['date'];?>
</th>
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
      <input name="log_ids[]" type="checkbox" id="log_ids" class="log_ids" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['log_id'];?>
" />
    </label></td>
    <td align="center"><?php echo $_smarty_tpl->tpl_vars['item']->value['log_id'];?>
&nbsp;</td>
    <td align="center"><?php echo $_smarty_tpl->tpl_vars['item']->value['log_user'];?>
&nbsp;</td>
    <td align="center"><?php echo $_smarty_tpl->tpl_vars['item']->value['log_type_str'];?>
&nbsp;</td>
    <td align="left"><?php echo nl2br($_smarty_tpl->tpl_vars['item']->value['log_desc']);?>
&nbsp;</td>
    <td align="center"><?php echo $_smarty_tpl->tpl_vars['item']->value['log_date'];?>
&nbsp;</td>
  </tr>



<?php } ?>
</table>

<div align="center">
  <label>
    <input type="button" name="button2" id="button2" value="<?php echo $_smarty_tpl->tpl_vars['lang_log']->value['select_all'];?>
" onclick='$(".log_ids").attr("checked",true);' />
    <input type="submit" name="button" id="button" value="<?php echo $_smarty_tpl->tpl_vars['lang_log']->value['del'];?>
" onclick="return confirm('<?php echo $_smarty_tpl->tpl_vars['lang_log']->value['del_confirm'];?>
')" />
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