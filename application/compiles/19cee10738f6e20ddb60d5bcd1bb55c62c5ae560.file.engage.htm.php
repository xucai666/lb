<?php /* Smarty version Smarty-3.1.14, created on 2013-09-03 05:41:32
         compiled from "application\templates\front\corcms\zh\engage.htm" */ ?>
<?php /*%%SmartyHeaderCode:179795225768cbb5225-18729936%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '19cee10738f6e20ddb60d5bcd1bb55c62c5ae560' => 
    array (
      0 => 'application\\templates\\front\\corcms\\zh\\engage.htm',
      1 => 1377934578,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '179795225768cbb5225-18729936',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dir_front' => 0,
    'list' => 0,
    'site_url' => 0,
    'item' => 0,
    'page_link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5225768ccabf07_07889533',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5225768ccabf07_07889533')) {function content_5225768ccabf07_07889533($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>



<table width="992" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td width="246" valign="top">
    
  	 <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/left_about.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

  	 <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/left_contact.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    
      
    <td valign="top" >
	
		<?php echo func_tag_detail(array('t_id'=>24,'where'=>"f_id=5"),$_smarty_tpl);?>



 <table width="100%"  >
              <tbody>
                <tr style="background-color:#FFF">
                  <td width="38%" height="25" align="center" style="color:#CB2110;"><strong>职位名称</strong></td>
                  <td width="20%" align="center"  style="color:#CB2110;"><strong>工作地点</strong></td>
                  <td width="19%" align="center"  style="color:#CB2110;"><strong>区域分部</strong></td>
                  <!--td width="12%" align="center" ><strong>公司部门</strong></td-->
                  <td width="8%" align="center" style="color:#CB2110;" ><strong>人数</strong></td>
                  <td width="15%" align="center"  style="color:#CB2110;"><strong>发布日期</strong></td>
                </tr>
                
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                
                <tr onmouseover="overclass(this);" style="cursor:pointer" onclick="self.location.href='<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/engage/detail/?eg_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['eg_id'];?>
'">
                  <td height="25" align="center" ><?php echo $_smarty_tpl->tpl_vars['item']->value['eg_pos'];?>
</td>
                  <td align="center" ><?php echo func_get_area_str(array('id'=>$_smarty_tpl->tpl_vars['item']->value['eg_area']),$_smarty_tpl);?>
</td>
                  <td align="center" ><?php echo $_smarty_tpl->tpl_vars['item']->value['eg_zone'];?>
</td>
                  <!--td align="center" --><!--$item.eg_part}--><!--/td-->
                  <td align="center" ><?php echo $_smarty_tpl->tpl_vars['item']->value['eg_people'];?>
</td>
                  <td align="center" ><?php echo $_smarty_tpl->tpl_vars['item']->value['eg_addtime'];?>
</td>
                </tr>
                <?php } ?>
                
                
              </tbody>
            </table>
            <div class="quotes"><?php echo $_smarty_tpl->tpl_vars['page_link']->value;?>
&nbsp;</div>          
          
          </td>
        </tr>
      </table>
	</td>
  </tr>
</table>



      
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>