<?php /* Smarty version Smarty-3.1.14, created on 2013-09-05 10:19:13
         compiled from "application\templates\backend\corcms\product_add.htm" */ ?>
<?php /*%%SmartyHeaderCode:105155227ea214dfdb0-71816916%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '466303863a2f203580ebde1b312799c3dcebdd5e' => 
    array (
      0 => 'application\\templates\\backend\\corcms\\product_add.htm',
      1 => 1374106817,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '105155227ea214dfdb0-71816916',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dir_backend' => 0,
    'site_url' => 0,
    'class_info' => 0,
    'lang_products' => 0,
    'main' => 0,
    'base_url' => 0,
    'editor' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5227ea215b1ab6_89841201',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5227ea215b1ab6_89841201')) {function content_5227ea215b1ab6_89841201($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'E:\\phpnow\\htdocs\\lb\\application\\libraries\\Smarty-3.1.14\\libs\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<form action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/backend/product/action_save" method="post" enctype="multipart/form-data" name="form1" id="form1" onsubmit="return validator(this);">
  <table border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td  colspan="2" align="left" class="nav_title"><?php echo $_smarty_tpl->tpl_vars['class_info']->value['class_theme'];?>
</td>
    </tr>
    <tr>
      <td height="40" align="right">
      <?php echo $_smarty_tpl->tpl_vars['lang_products']->value['category'];?>

      
      ：</td>
      <td height="40">   
      <select name="main[pro_class_sn]">   
      <?php echo $_smarty_tpl->tpl_vars['class_info']->value['class_select'];?>

      </select>
      &nbsp;</td>
    </tr>
    <tr>
      <td height="40" align="right"> <?php echo $_smarty_tpl->tpl_vars['lang_products']->value['title'];?>
：</td>
      <td height="40"><label>
        <input name="main[pro_title]" type="text" id="main[pro_title]" size="50" value="<?php echo $_smarty_tpl->tpl_vars['main']->value['pro_title'];?>
"  valid='required' errmsg='<?php echo $_smarty_tpl->tpl_vars['lang_products']->value['inp_title'];?>
' />
        <?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
echo form_error("main[pro_title]"); <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

      </label></td>
    </tr>
    <tr>
      <td height="40" align="right"><?php echo $_smarty_tpl->tpl_vars['lang_products']->value['goods_pic'];?>
：</td>
      <td height="40" align="left"><label>
        <input type="file" name="file1" id="file1" />
        <input type="hidden" name="main[pro_pic]" id="main[pro_pic]" value="<?php echo $_smarty_tpl->tpl_vars['main']->value['pro_pic'];?>
" />
        
        
        
          </label><br />
(600px×832px)
          
          <?php if ($_smarty_tpl->tpl_vars['main']->value['pro_pic']){?>
         <div class="clear"> <img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['main']->value['pro_pic'];?>
" width="120" height="80" /> </div>
          <?php }?>
           </td>
    </tr>
    <tr>
      <td height="40" align="right"><?php echo $_smarty_tpl->tpl_vars['lang_products']->value['order'];?>
：</td>
      <td height="40"><label>
        <input name="main[pro_order]" type="text" id="main[pro_order]" size="12"  value="<?php echo $_smarty_tpl->tpl_vars['main']->value['pro_order'];?>
" />
      </label>
      <?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
echo form_error("main[pro_date]"); <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

      
      </td>
    </tr>
    
    
    <tr>
      <td height="40" align="right" valign='top'><?php echo $_smarty_tpl->tpl_vars['lang_products']->value['p_intr'];?>
：</td>
      <td height="300" valign='top'>
        <textarea name="main[pro_content]"  cols="45" rows="5"   errmsg="<?php echo $_smarty_tpl->tpl_vars['lang_products']->value['inp_content'];?>
" id="content"   valid="custom" custom="getContentValue"     style="display:none" ><?php echo $_smarty_tpl->tpl_vars['main']->value['pro_content'];?>
</textarea>
        <?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
echo form_error("main[pro_content]"); <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
    
        <?php echo $_smarty_tpl->tpl_vars['editor']->value;?>

          </td>
    </tr>
    
    <tr>
      <td height="20" align="right">&nbsp;</td>
      <td height="20" align="right">
         <input name="main[pro_date]" readonly="readonly" type="hidden" id="main[pro_date]" size="12"  value="<?php echo smarty_modifier_date_format(time(),"%Y-%m-%d");?>
" class="Wdate" onfocus="WdatePicker();"/>
        
        
        <input name="parent_class" type="hidden" id="parent_class" value="<?php echo $_smarty_tpl->tpl_vars['class_info']->value['parent_class'];?>
" />
        
        
        
        
        <input name="main[pro_id]" type="hidden"  value="<?php echo $_smarty_tpl->tpl_vars['main']->value['pro_id'];?>
" />
        <input type="hidden" name="op_from" value="<?php echo $_GET['op_from'];?>
">
        <?php echo create_button(array('type'=>'save'),$_smarty_tpl);?>

     </td>
    </tr>
  </table>
</form>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>