<?php /* Smarty version Smarty-3.1.14, created on 2013-08-22 15:57:30
         compiled from "application\templates\front\blue\zh\product.htm" */ ?>
<?php /*%%SmartyHeaderCode:28648521634ea79b137-23017119%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '023877ecb77c1efce4bcc61177c2ab518ade10fa' => 
    array (
      0 => 'application\\templates\\front\\blue\\zh\\product.htm',
      1 => 1377097657,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28648521634ea79b137-23017119',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dir_front' => 0,
    'img_url' => 0,
    'ci_uri' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_521634ea945511_89980839',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_521634ea945511_89980839')) {function content_521634ea945511_89980839($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<table width="992" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td width="246" valign="top">
    <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/left_product.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
    </td>
    
    <td valign="top" aign="right">&nbsp;</td>
    <td valign="top" aign="right">
    
    <table     border="0" cellspacing="0" cellpadding="0" >
      <tr>
       
        <td  style="background:url(<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/daohanhh_11.jpg) repeat-x; padding-left:20px; height:25px" class="hong" width="746">
      <?php echo func_tag(array('t_id'=>49,'where'=>("id=").(((($tmp = @end(explode(",",base64_decode($_smarty_tpl->tpl_vars['ci_uri']->value[3]))))===null||$tmp==='' ? 2 : $tmp))),'html_type'=>'detail'),$_smarty_tpl);?>


        </td>
       
      </tr>
      <tr>
        <td  class="bian1" style="padding-left:25px;"><table height="400" border="0" cellspacing="0" cellpadding="0" >
          <tr>
           <td  valign="top"  align="center"  class="product">
            <ul>
	         	 <?php echo func_tag(array('t_id'=>40,'where'=>"p_pid like '".((string)base64_decode($_smarty_tpl->tpl_vars['ci_uri']->value[3]))."%' and p_name like '%".((string)$_REQUEST['p_name'])."%'"),$_smarty_tpl);?>

            </ul>
			  </td>
			  
             </tr>
          
        </table>
		<div class="page" align="center">

 <?php echo func_tag_pager(array('t_id'=>40,'where'=>"p_pid like '".((string)base64_decode($_smarty_tpl->tpl_vars['ci_uri']->value[3]))."%' and p_name like '%".((string)$_REQUEST['p_name'])."%'"),$_smarty_tpl);?>


    </div>		</td>
      </tr>
    </table></td>
  </tr>
</table>



 
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>