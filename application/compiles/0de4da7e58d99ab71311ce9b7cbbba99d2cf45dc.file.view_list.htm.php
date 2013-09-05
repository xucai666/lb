<?php /* Smarty version Smarty-3.1.14, created on 2013-09-05 08:42:23
         compiled from "application\templates\backend\corcms\view_list.htm" */ ?>
<?php /*%%SmartyHeaderCode:41015227d36f58e460-10675738%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0de4da7e58d99ab71311ce9b7cbbba99d2cf45dc' => 
    array (
      0 => 'application\\templates\\backend\\corcms\\view_list.htm',
      1 => 1378007487,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '41015227d36f58e460-10675738',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dir_backend' => 0,
    'base_url' => 0,
    'root_path' => 0,
    'root_path_parent' => 0,
    'list' => 0,
    'item' => 0,
    'page_link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5227d36f64bc47_36040082',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5227d36f64bc47_36040082')) {function content_5227d36f64bc47_36040082($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'E:\\phpnow\\htdocs\\lb\\application\\libraries\\Smarty-3.1.14\\libs\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<style>
/* -- SWFUpload Object Styles ------------------------------- */
.swfupload {
	
	position: absolute;
	z-index:1;


}

div.flash {
	width: 375px;
	margin: 10px 5px;
	border-color: #D9E4FF;
	-moz-border-radius-topleft : 5px;
	-webkit-border-top-left-radius : 5px;
    -moz-border-radius-topright : 5px;
    -webkit-border-top-right-radius : 5px;
    -moz-border-radius-bottomleft : 5px;
    -webkit-border-bottom-left-radius : 5px;
    -moz-border-radius-bottomright : 5px;
    -webkit-border-bottom-right-radius : 5px;
}
</style>

<script>
var upload_view;
$(function($){

	upload_view = new SWFUpload({
				// Backend Settings
				upload_url: "<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/swfupload/upload.php",
				post_params: {"test":"1","save_path":"<?php echo $_smarty_tpl->tpl_vars['root_path']->value;?>
"},
				// File Upload Settings
				file_size_limit : "1024",	// 100MB
				file_types : "*.jpg;*.gif;*.png;*.css;*.js;*.htm;*.swf",
				file_types_description : "JPG Images;GIF Images;PNG Images;CSS;JS;HTM;SWF",
				file_upload_limit : "15",
				file_queue_limit : "0",
				// Event Handler Settings (all my handlers are in the Handler.js file)
				file_dialog_start_handler : fileDialogStart,
				file_queued_handler : fileQueued,
				file_queue_error_handler : fileQueueError,
				file_dialog_complete_handler : fileDialogComplete,
				upload_start_handler : uploadStart,
				upload_progress_handler : uploadProgress,
				upload_error_handler : uploadError,
				upload_success_handler : uploadSuccess,
				upload_complete_handler : uploadComplete_view,
				queue_complete_handler : queueComplete, 
				// Button Settings
				button_placeholder_id : "spanButtonPlaceholder_view",
			   
				button_width: 80,
				button_height: 20,
				
				button_window_mode: SWFUpload.WINDOW_MODE.TRANSPARENT,
				button_cursor: SWFUpload.CURSOR.HAND,


				// Flash Settings
				flash_url : "<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/swfupload/api/swfupload.swf",
				custom_settings : {
					progressTarget : "fsUploadProgress_view",
					cancelButtonId : "btnCancel_view"
				},
				// Debug Settings
				debug: false
			});
			function uploadComplete_view(file, serverData){

			}

})


 function queueComplete(){
			
			self.location.reload();
	}
			


</script>
<div class="nav_title">视图管理</div>


<table class='search'>
	<tr><td>
		<form action='<?php echo func_site_url(array('segments'=>"backend/templates/view_list"),$_smarty_tpl);?>
' method="get">
			
			名称：
			<input type="text" name="t_name" value="<?php echo $_GET['t_name'];?>
">
			
			<input type="hidden" name="root_path"  value="<?php echo $_smarty_tpl->tpl_vars['root_path']->value;?>
"/>
			<?php echo create_button(array('type'=>"search"),$_smarty_tpl);?>

			<?php echo create_button(array('type'=>"prev",'url'=>"backend/templates/view_list/".((string)$_smarty_tpl->tpl_vars['root_path_parent']->value)),$_smarty_tpl);?>


            <span id="spanButtonPlaceholder_view"></span>

           
			<?php echo create_button(array('type'=>"upload",'id'=>"btnUpload"),$_smarty_tpl);?>

           
            <input id="btnCancel_view" type="hidden" value="Cancel" onclick="cancelQueue(upload_view);" disabled="disabled" style="margin-left: 2px; height: 22px; font-size: 8pt;" />
       
			<div class="fieldset flash" id="fsUploadProgress_view"> </div>
			
		</form>
		
	</td></tr>
</table>


<form id="form2" method="post" >   
<table class='mytable'>
	<thead>
<tr>
	
	
	<th>文件名</th>
	<th>修改日期</th>
	<th>大小</th>
	<th>操作</th>

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

		<?php echo ci_anchor(array('segment'=>$_smarty_tpl->tpl_vars['item']->value['href'],'attrs'=>"target:".((string)$_smarty_tpl->tpl_vars['item']->value['target']).",class:".((string)$_smarty_tpl->tpl_vars['item']->value['css_name']),'title'=>$_smarty_tpl->tpl_vars['item']->value['name']),$_smarty_tpl);?>

	</td>
	<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['date'],"%Y-%m-%d %H:%I:%S");?>
</td>
	<td><?php echo $_smarty_tpl->tpl_vars['item']->value['size'];?>
</td>
	<td align='center'>
		
		<?php echo ci_anchor(array('segment'=>"backend/templates/view_add/".((string)my_encrypt($_smarty_tpl->tpl_vars['item']->value['server_path'],'ENCODE')),'attrs'=>"class:link_mod ".((string)$_smarty_tpl->tpl_vars['item']->value['edit_able'])),$_smarty_tpl);?>

	</td>
</tr>
<?php } ?>
</tbody>	
</table>

</form>
<div class="page_link">
	<?php echo $_smarty_tpl->tpl_vars['page_link']->value;?>

</div>


<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>