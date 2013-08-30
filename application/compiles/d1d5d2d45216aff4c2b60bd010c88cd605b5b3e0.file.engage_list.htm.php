<?php /* Smarty version Smarty-3.1.14, created on 2013-08-29 23:37:51
         compiled from "application\templates\backend\blue\engage_list.htm" */ ?>
<?php /*%%SmartyHeaderCode:20739521fdb4f7ac2b8-46454823%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd1d5d2d45216aff4c2b60bd010c88cd605b5b3e0' => 
    array (
      0 => 'application\\templates\\backend\\blue\\engage_list.htm',
      1 => 1376550457,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20739521fdb4f7ac2b8-46454823',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dir_backend' => 0,
    'lang_engage' => 0,
    'img_url' => 0,
    'lang_type' => 0,
    'search' => 0,
    'list' => 0,
    'item' => 0,
    'site_url' => 0,
    'page_link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_521fdb4f9e65e5_97151515',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_521fdb4f9e65e5_97151515')) {function content_521fdb4f9e65e5_97151515($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>



          
<div class="nav_title"><?php echo $_smarty_tpl->tpl_vars['lang_engage']->value['theme_manage'];?>
</div>
<div  align="right"><a href="<?php echo func_site_url(array('segments'=>'/backend/engage/action_add'),$_smarty_tpl);?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/add_<?php echo $_smarty_tpl->tpl_vars['lang_type']->value;?>
.png"  /></a></div>

<table class='search'>
  <tr><td>
    <form action='<?php echo func_site_url(array('segments'=>"backend/engage/action_list"),$_smarty_tpl);?>
' method="get">
  
      

            <?php echo $_smarty_tpl->tpl_vars['lang_engage']->value['pos'];?>
：
                <input type="text" size="50" name="eg_pos" value="<?php echo $_smarty_tpl->tpl_vars['search']->value['eg_pos'];?>
">

                      
      <?php echo create_button(array('type'=>"search"),$_smarty_tpl);?>

    </form>
  </td></tr>
</table>



              <table width="98%" class="mytable" border="0" align="center" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                  <th height="25"><div align="center"><strong><?php echo $_smarty_tpl->tpl_vars['lang_engage']->value['sn'];?>
</strong></div></th>
              <th align="center" ><strong><?php echo $_smarty_tpl->tpl_vars['lang_engage']->value['pos'];?>
</strong></th>
                  <th ><div align="center"><strong><?php echo $_smarty_tpl->tpl_vars['lang_engage']->value['date'];?>
</strong></div></th>
                  <th align="center" ><div><strong><?php echo $_smarty_tpl->tpl_vars['lang_engage']->value['operate'];?>
</strong></div></th>
                </tr>
              </thead>
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                <tr onmouseover="setChildTagsMouseoverColor(this,'#C8E3FF','#ffffff');">
                  <td height="25" align="left"><div align="center">
                    <?php echo $_smarty_tpl->tpl_vars['item']->value['eg_id'];?>

                  </div></td>
                <td align="left"><?php echo $_smarty_tpl->tpl_vars['item']->value['eg_pos'];?>
&nbsp;</td>
                  <td align="left"><div title="2010-06-24 08:52" align="center">
                    <?php echo $_smarty_tpl->tpl_vars['item']->value['pub_date'];?>

                  </div></td>
                  <td align="center" ><div><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/backend/engage/action_del?eg_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['eg_id'];?>
"  onclick="return confirm('<?php echo $_smarty_tpl->tpl_vars['lang_engage']->value['confirm_delete'];?>
')" target="_self"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/del1.gif" width="16" height="16" border="0" /></a> <a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/backend/engage/action_add?eg_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['eg_id'];?>
" ><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/mod1.gif" width="16" height="16" border="0" /></a></div></td>
                </tr>
                <?php } ?>
              </table>
              <center>
                <?php echo $_smarty_tpl->tpl_vars['page_link']->value;?>

            </center>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>