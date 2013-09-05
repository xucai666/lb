<?php /* Smarty version Smarty-3.1.14, created on 2013-09-05 10:19:04
         compiled from "application\templates\backend\corcms\product_list.htm" */ ?>
<?php /*%%SmartyHeaderCode:96065227ea1842fb13-64986253%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c461b1ecfb85049003ffd306ae43d5c1883d241d' => 
    array (
      0 => 'application\\templates\\backend\\corcms\\product_list.htm',
      1 => 1374504056,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '96065227ea1842fb13-64986253',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dir_backend' => 0,
    'class_info' => 0,
    'site_url' => 0,
    'img_url' => 0,
    'lang_type' => 0,
    'lang_products' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5227ea184bb672_47957326',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5227ea184bb672_47957326')) {function content_5227ea184bb672_47957326($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="nav_title" align="left" ><?php echo $_smarty_tpl->tpl_vars['class_info']->value['class_theme'];?>
</div>
<div  align="right"><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/backend/product/action_add/?parent_class=<?php echo $_GET['parent_class'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/add_<?php echo $_smarty_tpl->tpl_vars['lang_type']->value;?>
.png"  /></a></div>

<table class="search">
<tr>
<td>
	<form id="form_search" action="" method="get">
    <?php echo $_smarty_tpl->tpl_vars['lang_products']->value['category'];?>
：
    <select name="search_class">
    <?php echo $_smarty_tpl->tpl_vars['class_info']->value['class_select'];?>

    </select>
    
    <?php echo $_smarty_tpl->tpl_vars['lang_products']->value['title'];?>
： 
    <input type="text" name="pro_title" value="<?php echo $_GET['pro_title'];?>
" />
	<input type="hidden" name="parent_class" value="<?php echo $_GET['parent_class'];?>
">
	<input type="submit" name="submit" value="<?php echo $_smarty_tpl->tpl_vars['lang_products']->value['query'];?>
" />
	</form>

</td>
</tr>
</table>

<p>&nbsp;</p>

<div id="ajax_content">

</div>


<script language="JavaScript">
	overclass($('#archives ul'));
	//全选动作
	function chkall2(obj){			
		
		if($(obj).prop('checked')==true){
			$('.pro_ids').prop('checked',true);			
		}else{
			$('.pro_ids').prop('checked',false);
		}
	
	}
	
	//删除确认
	function chkdel2(){
		if($('.pro_ids:checked').size()>0){
			if(confirm('确定删除?')){
				return true;
			}else{
				return false;	
			}
			
		}else{
			alert('请选择');	
			return false;
		}
	}
	
	
	//load default list data

	ajaxLoadList("backend/product/action_ajax_list?parent_class=<?php echo $_GET['parent_class'];?>
");
	
	//delete record
	function delRecord(url,obj){
		if(confirm('<?php echo $_smarty_tpl->tpl_vars['lang_products']->value['confirm_delete'];?>
')){
			$.get(url,delok(obj));
		}
	}
	
	function delok(r){
		$(r).parents("tr:first").remove();
		alert('删除成功');
	}
	//ajax search form
	var options = {
	    target:     '#ajax_content',
	    url:        '<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/backend/product/action_ajax_list/',
	    dataType:        null,
	    clearForm: false,
	 	resetForm: false ,
	    success: function(responseText,statusText) {
	    }
	};
	 $('#form_search').ajaxForm(options);
</script>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>