<?php /* Smarty version Smarty-3.1.14, created on 2013-08-18 17:51:23
         compiled from "application\templates\backend\blue\friendlink_list.htm" */ ?>
<?php /*%%SmartyHeaderCode:50425211099bb19a35-74169125%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a3c6de95e2d213dbaf8d811d4fdaaefcc11bef18' => 
    array (
      0 => 'application\\templates\\backend\\blue\\friendlink_list.htm',
      1 => 1374504372,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '50425211099bb19a35-74169125',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dir_backend' => 0,
    'site_url' => 0,
    'img_url' => 0,
    'lang_type' => 0,
    'list' => 0,
    'item' => 0,
    'base_url' => 0,
    'page_link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5211099bcbc924_86618949',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5211099bcbc924_86618949')) {function content_5211099bcbc924_86618949($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="nav_title" align="left" >友情链接</div>
<div  align="right"><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/backend/friendlink/action_add"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/add_<?php echo $_smarty_tpl->tpl_vars['lang_type']->value;?>
.png"  /></a></div>


<div class="search"><form action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/backend/friendlink/action_list/" method="get">
    
    站点名称： 
      <input type="text" name="link_title" value="<?php echo $_GET['link_title'];?>
" />
	<input type="hidden" name="parent_class" value="<?php echo $_GET['parent_class'];?>
">
	<input type="submit" name="submit" value="查询" />
	</form>


</div>

<table class='mytable'>
  <tr>
    <th class="l1">编号</th>
    <th class="l2">站点名称</th>
    <th class="l3">图片</th>   
    <th class="l4">链接地址</th>    
    <th class="l5">添加日期</th>
     <th class="l8">操作</th>
  </tr>

  <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
<tr  class="mouse_pointer" >
  	   <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['link_id'];?>
</td>
       <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['link_title'];?>
</td>
        <td >
         <?php if ($_smarty_tpl->tpl_vars['item']->value['link_pic']){?>
         <div > <img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
uploads/link/<?php echo $_smarty_tpl->tpl_vars['item']->value['link_pic'];?>
" width="120" height="80" /> </div>
   
         <?php }?>&nbsp;
        </td>  
       <td ><a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['link_url'];?>
" target='_blank'><?php echo $_smarty_tpl->tpl_vars['item']->value['link_url'];?>
</a></td>
    <td >&nbsp;<?php echo $_smarty_tpl->tpl_vars['item']->value['link_date'];?>
</td>
   
  
   
    <td  > 
      
        <a  title="查看链接"   href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/backend/friendlink/action_add/?link_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['link_id'];?>
&parent_class=<?php echo $_GET['parent_class'];?>
" > 
      <img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/mod1.gif" border="0" > </a> 
      
      <a  title="删除链接" href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/backend/friendlink/action_del/?link_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['link_id'];?>
&parent_class=<?php echo $_GET['parent_class'];?>
" onclick="return confirm('确定删除?');"> 
      <img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/del1.gif" border="0" > </a> 
    
     
      </td>
  </tr>

<?php } ?>



</table>
<div class="page_link">
	<?php echo $_smarty_tpl->tpl_vars['page_link']->value;?>

</div>
<script language="JavaScript">
	overclass($('#archives ul'));
	
</script>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>