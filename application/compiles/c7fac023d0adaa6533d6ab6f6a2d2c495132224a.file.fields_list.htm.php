<?php /* Smarty version Smarty-3.1.14, created on 2013-08-19 10:42:27
         compiled from "application\templates\backend\blue\fields_list.htm" */ ?>
<?php /*%%SmartyHeaderCode:181065211098e34fd29-29433765%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c7fac023d0adaa6533d6ab6f6a2d2c495132224a' => 
    array (
      0 => 'application\\templates\\backend\\blue\\fields_list.htm',
      1 => 1376908945,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '181065211098e34fd29-29433765',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5211098e517817_44170458',
  'variables' => 
  array (
    'dir_backend' => 0,
    'img_url' => 0,
    'lang_type' => 0,
    'fields_types' => 0,
    'list' => 0,
    'item' => 0,
    'page_link' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5211098e517817_44170458')) {function content_5211098e517817_44170458($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include 'E:\\phpnow\\htdocs\\lb\\application\\libraries\\Smarty-3.1.14\\libs\\plugins\\function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="nav_title">字段模板管理</div>
<div  align="right"><a href="<?php echo func_site_url(array('segments'=>'/backend/fields/action_add'),$_smarty_tpl);?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/add_<?php echo $_smarty_tpl->tpl_vars['lang_type']->value;?>
.png"  /></a></div>

<table class='search'>
	<tr><td>
		<form action='<?php echo func_site_url(array('segments'=>"backend/fields/action_list"),$_smarty_tpl);?>
' method="get">
			字段类型：
			<select name="f_type">
				<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['fields_types']->value,'selected'=>$_GET['f_type']),$_smarty_tpl);?>

			</select>
			字段名称：
			<input type="text" name="f_name" value="<?php echo $_GET['f_name'];?>
">
			
			<?php echo create_button(array('type'=>"search"),$_smarty_tpl);?>

			<input type="text" name="%name" value="%value" class="auto_id">
			<input type="text" id="autoComplete_tag" value="" rel="backend/common/action_autocomplete_admins2">

			<input type="text" name="%name" value="%value" class="auto_id">

			<input type="text" id="autoComplete_tag3" value="" rel="backend/common/action_autocomplete_admins3">
			


			<script language='javascript'>


			function load_autocomplete(_auto_obj){

	  	
			
			var cache = {};
				

					_auto_obj.autocomplete({
						autoFocus:true,
						
					     source: function( request, response ) {
					     	
					     var ran_index = Math.round(Math.random()*100000);
						_auto_url = site_url+_auto_obj.attr('rel');
				        var term = request.term;
				        if ( term in cache ) {
				          response( cache[term] );
				          return;
				        }
				        
				        $.getJSON(_auto_url, request, function( data, status, xhr ) {
				          cache[term] = data;
				          response( data );
				        });
				      },
					      minLength: 1,
					      delay:400,
					     
					      response: function( event, ui ) {	_auto_obj.prevAll('input.auto_id').val('').val('');}, 
					      focus: function( event, ui ) {	_auto_obj.prevAll('input.auto_id').val(ui.item.id);},

					    });

			}
  $(function() {
    

  load_autocomplete($('#autoComplete_tag'));
  load_autocomplete($('#autoComplete_tag3'));



  });
  </script>


		</form>
	</td></tr>
</table>

  <form id="form2" method="post" action="<?php echo func_site_url(array('segments'=>'/backend/fields/action_del'),$_smarty_tpl);?>
" onsubmit="return chkdel2();">   
<table class='mytable'>
	<thead>
<tr>
	<th>
		<?php echo create_button(array('type'=>'delete','ext'=>''),$_smarty_tpl);?>
		
		<input type="checkbox" id="chkall"  value="1" onclick="CheckAll(this.form);">
	</th>
	<th>编号</th>
	<th>名称</th>
	<th>字段类型</th>
	<th >操作</th>

</tr>
	</thead>
<tbody>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>	
<tr>
	<td>
		<input type="checkbox" class="ids"  name="f_id[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['f_id'];?>
">
	</td>
	<td><?php echo $_smarty_tpl->tpl_vars['item']->value['f_id'];?>
</td>
	<td><?php echo $_smarty_tpl->tpl_vars['item']->value['f_name'];?>
</td>
	<td><?php echo $_smarty_tpl->tpl_vars['fields_types']->value[$_smarty_tpl->tpl_vars['item']->value['f_type']];?>
</td>
	<td >
		<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
		

			\$attrs  = array(
				"class"=>"link_mod",
			);
			echo anchor("backend/fields/action_add/".\$template->tpl_vars['item']->value['f_id'],"&nbsp;",\$attrs);
			
			\$attrs  = array(
				"class"=>"link_del",
				"onclick"=>"return confirm('确定删除?');",
			);
			
			echo anchor("backend/fields/action_del/".\$template->tpl_vars['item']->value['f_id'],"&nbsp;",\$attrs);
			
			
			<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

			<?php echo ci_anchor(array('segment'=>"backend/fields/action_view/".((string)$_smarty_tpl->tpl_vars['item']->value['f_id']),'title'=>"&nbsp;",'attrs'=>"target:_blank,class:link_view"),$_smarty_tpl);?>


	</td>
</tr>
<?php } ?>
</tbody>	
</table>
</form>
<div class="page_link">
	<?php echo $_smarty_tpl->tpl_vars['page_link']->value;?>

</div>

<script language="JavaScript">
	//删除确认
	function chkdel2(){
		if($('.ids:checked').size()>0){
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
</script>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>