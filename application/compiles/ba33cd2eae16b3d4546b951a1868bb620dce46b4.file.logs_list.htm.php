<?php /* Smarty version Smarty-3.1.14, created on 2013-09-03 15:50:45
         compiled from "application\templates\backend\corcms\logs_list.htm" */ ?>
<?php /*%%SmartyHeaderCode:22460522605554043d0-37075360%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ba33cd2eae16b3d4546b951a1868bb620dce46b4' => 
    array (
      0 => 'application\\templates\\backend\\corcms\\logs_list.htm',
      1 => 1378128066,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22460522605554043d0-37075360',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dir_backend' => 0,
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
  'unifunc' => 'content_5226055556a025_47844100',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5226055556a025_47844100')) {function content_5226055556a025_47844100($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include 'E:\\phpnow\\htdocs\\lb\\application\\libraries\\Smarty-3.1.14\\libs\\plugins\\function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
        <option value=''>请选择</option>
        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['log_types']->value,'selected'=>$_smarty_tpl->tpl_vars['log_type_default']->value),$_smarty_tpl);?>

      </select>
    </label>
    
        
        
  
    <?php echo $_smarty_tpl->tpl_vars['lang_log']->value['date'];?>
：
        <input type="text" name="log_date" size="10" readonly="readonly" onclick="WdatePicker()" class="Wdate" value="<?php echo $_GET['log_date'];?>
" />      
        

        <?php echo create_button(array('type'=>'search'),$_smarty_tpl);?>

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
 
  <th>
    <input type="checkbox" onclick="$('.log_ids').prop('checked',$(this).prop('checked'));" />
    <?php echo create_button(array('type'=>'delete'),$_smarty_tpl);?>
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