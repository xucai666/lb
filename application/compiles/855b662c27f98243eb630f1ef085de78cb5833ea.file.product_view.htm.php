<?php /* Smarty version Smarty-3.1.14, created on 2013-08-21 15:53:04
         compiled from "application\templates\front\blue\zh\product_view.htm" */ ?>
<?php /*%%SmartyHeaderCode:206115214c1e41e8336-75609052%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '855b662c27f98243eb630f1ef085de78cb5833ea' => 
    array (
      0 => 'application\\templates\\front\\blue\\zh\\product_view.htm',
      1 => 1377100381,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '206115214c1e41e8336-75609052',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5214c1e427fdb3_19315696',
  'variables' => 
  array (
    'dir_front' => 0,
    'ci_uri' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5214c1e427fdb3_19315696')) {function content_5214c1e427fdb3_19315696($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<table width="992" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td width="246" valign="top">
    <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/left_product.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    
    
    <td valign="top"> 

    	<?php echo func_tag(array('t_id'=>"40",'html_type'=>"detail",'where'=>"p_id=".((string)$_smarty_tpl->tpl_vars['ci_uri']->value[3])),$_smarty_tpl);?>
 

    </td>
  </tr>
</table>
<div id="test_slideshowHolder">xx</div>
<script>
$(function($){
	
	
$('#slideshowHolder').hide();
$('#slideshowHolder').iwin({w:800,h:600,align:"center",valign:"middle",modal:true,dbl_click_trigger:"picwin"});


})

function picwin(){
	


    $('#slideshowHolder').jqFancyTransitions({
 effect: 'zipper', // wave, zipper, curtain
      
        width:$(window).width(),
        height:$(window).height(),
        strips: 15, // number of strips
       
        navigation: false, // prev and next navigation buttons
        links: false // show images as links

});


}
</script

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>