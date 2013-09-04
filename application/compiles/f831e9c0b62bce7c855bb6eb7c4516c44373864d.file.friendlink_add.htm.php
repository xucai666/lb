<?php /* Smarty version Smarty-3.1.14, created on 2013-09-04 22:58:45
         compiled from "application\templates\backend\corcms\friendlink_add.htm" */ ?>
<?php /*%%SmartyHeaderCode:2028652274aa508c2f9-94241922%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f831e9c0b62bce7c855bb6eb7c4516c44373864d' => 
    array (
      0 => 'application\\templates\\backend\\corcms\\friendlink_add.htm',
      1 => 1374106816,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2028652274aa508c2f9-94241922',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dir_backend' => 0,
    'site_url' => 0,
    'main' => 0,
    'editor' => 0,
    'class_info' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52274aa5169fc6_34813859',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52274aa5169fc6_34813859')) {function content_52274aa5169fc6_34813859($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'E:\\phpnow\\htdocs\\lb\\application\\libraries\\Smarty-3.1.14\\libs\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<form action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/backend/friendlink/action_save" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td  colspan="2" align="left" class="nav_title">友情链接 添加/修改</td>
    </tr>
    <tr>
      <td height="40" align="right">站点名称：</td>
      <td height="40"><label>
        <input name="main[link_title]" type="text" id="main[link_title]" size="50" value="<?php echo $_smarty_tpl->tpl_vars['main']->value['link_title'];?>
"  />
        <?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
echo form_error("main[link_title]"); <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

      </label></td>
    </tr>
    <tr>
      <td height="40" align="right">站点LOGO：</td>
      <td height="40" align="left"><label>
        <input type="file" name="file1" id="file1" />
        <input type="hidden" name="main[link_pic]" id="main[link_pic]" value="<?php echo $_smarty_tpl->tpl_vars['main']->value['link_pic'];?>
" />
        
        
        
          </label>
          <?php if ($_smarty_tpl->tpl_vars['main']->value['link_pic']){?>
         <div class="clear"> <img src="uploads/products/<?php echo $_smarty_tpl->tpl_vars['main']->value['link_pic'];?>
" width="120" height="80" /> </div>
          <?php }?>
           </td>
    </tr>
    <tr>
      <td height="40" align="right">站点url：</td>
      <td height="40" align="left"><label>
        <input name="main[link_url]" type="text" id="main[link_url]" size="50" value="<?php echo $_smarty_tpl->tpl_vars['main']->value['link_url'];?>
" />
      </label></td>
    </tr>
    <tr>
      <td height="40" align="right">备注：</td>
      <td height="400"><label>
        <textarea name="main[link_content]"  cols="45" rows="5"   errmsg="请输入培训对象" id="content"   valid="custom" custom="getContentValue"     style="display:none" ><?php echo $_smarty_tpl->tpl_vars['main']->value['link_content'];?>
</textarea>
                      <?php echo $_smarty_tpl->tpl_vars['editor']->value;?>
</textarea>
      </label>
        <?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
echo form_error("main[link_content]",'
        <div id="error_span" class="red_font">','</div>'); <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
      </td>
    </tr>
    <tr>
      <td height="40" align="right">&nbsp;</td>
      <td height="40" align="right"><label>
       
       
         <input name="main[link_date]" readonly="readonly" type="hidden" id="main[link_date]" size="12"  value="<?php echo smarty_modifier_date_format(time(),"%Y-%m-%d");?>
" class="Wdate" onfocus="WdatePicker();"/>
        
        
        <input name="parent_class" type="hidden" id="parent_class" value="<?php echo $_smarty_tpl->tpl_vars['class_info']->value['parent_class'];?>
" />
        
        
        
        
        <input name="main[link_id]" type="hidden"  value="<?php echo $_smarty_tpl->tpl_vars['main']->value['link_id'];?>
" />
        <input type="submit" name="button" id="button" value="提交" />
      </label></td>
    </tr>
  </table>
</form>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>