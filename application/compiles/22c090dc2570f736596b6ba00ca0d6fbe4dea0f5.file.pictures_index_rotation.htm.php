<?php /* Smarty version Smarty-3.1.14, created on 2013-09-05 12:29:30
         compiled from "application\templates\backend\corcms\pictures_index_rotation.htm" */ ?>
<?php /*%%SmartyHeaderCode:17504522808aa8adc85-33064812%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '22c090dc2570f736596b6ba00ca0d6fbe4dea0f5' => 
    array (
      0 => 'application\\templates\\backend\\corcms\\pictures_index_rotation.htm',
      1 => 1375923550,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17504522808aa8adc85-33064812',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dir_backend' => 0,
    'list' => 0,
    'key' => 0,
    'base_url' => 0,
    'site_url' => 0,
    'item' => 0,
    'img_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_522808aa9aaa21_38195501',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_522808aa9aaa21_38195501')) {function content_522808aa9aaa21_38195501($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="nav_title" align="left" >图片管理</div>
<script type="text/javascript">
	 <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
		var upload_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
;
		 <?php } ?>	
		 var upload_1000;
		window.onload = function() {				
		  <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
		 	upload_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
 = new SWFUpload({
				// Backend Settings
				upload_url: "<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/swfupload/upload.php",
				post_params: {"p_type":"index_rotation","p_tb":"pictures_config",'p_key':'1'},
				// File Upload Settings
				file_size_limit : "1024",	// 100MB
				file_types : "*.jpg;*.gif",
				file_types_description : "*.jpg;*.gif",
				file_upload_limit : "1",
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
				upload_complete_handler : uploadComplete_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
,
				// Button Settings
				button_image_url : "<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/swfupload/images/TestImageNoText_65x29.png",
				button_placeholder_id : "spanButtonPlaceholder_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
",
				
				button_text: '上&nbsp;&nbsp;传',
				button_width: 100,
				button_height: 30,		
				button_text_left_padding: 10,
				button_text_top_padding: 3,					
				// Flash Settings
				flash_url : "<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/swfupload/api/swfupload.swf",
				custom_settings : {
					progressTarget : "fsUploadProgress_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
",
					cancelButtonId : "btnCancel_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"
					
				
				},
				// Debug Settings
				debug: false
			});
			function uploadComplete_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
(file, serverData){
				
				$('#show_img_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
').html('<img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/swfupload/uploads/'+file.name+'" width="100" />');
			
				
				$.ajax({
				   type: "POST",
				   url: '<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/backend/pictures/action_index_rotation_save',
				   data: {"p_type":"index_rotation","p_tb":"pictures_config",'p_key':'1','p_id':$('#p_id_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
').val(),'p_thumb':file.name},
				   dataType:"json",
				   success: function(msg){	
				  
				   		$('#p_id_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
').val(msg.main.p_id);
				   }
				}); 
			}
					
			<?php } ?>
			
			
			upload_1000 = new SWFUpload({
				// Backend Settings
				upload_url: "<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/swfupload/upload.php",
				post_params: {"p_type":"index_rotation","p_tb":"pictures_config",'p_key':'1'},
				// File Upload Settings
				file_size_limit : "1024",	// 100MB
				file_types : "*.jpg;*.gif",
				file_types_description : "*.jpg;*.gif",
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
				upload_complete_handler : uploadComplete_1000,
				queue_complete_handler : queueComplete, 
				
				
				// Button Settings
				button_image_url : "<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/swfupload/images/TestImageNoText_65x29.png",
				button_placeholder_id : "spanButtonPlaceholder_1000",
				button_text: '批量上传',
				button_width: 120,
				button_height: 30,		
				button_text_left_padding: 10,
				button_text_top_padding: 3,	
				// Flash Settings
				flash_url : "<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/swfupload/api/swfupload.swf",
				custom_settings : {
					progressTarget : "fsUploadProgress_1000",
					cancelButtonId : "btnCancel_1000"
					
				
				},
				// Debug Settings
				debug: false
			});
			function uploadComplete_1000(file, serverData){
			
				$.ajax({
				   type: "POST",
				   url: '<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/backend/pictures/action_index_rotation_save',
				   data: {"p_type":"index_rotation","p_tb":"pictures_config",'p_key':'1','p_thumb':file.name},
				   dataType:"json",
				   success: function(msg){	
				  	
				   		
				   }
				}); 
			}
			
			
			
			
				
		}
		
		
		
		 function queueComplete(){
					//alert('图片全部上传完毕！');
					self.location.reload();
			}
			
			
		 function save_sort(p_index){	
		    var p_id = $('#p_id_'+p_index).val();
			if(p_id>0){
				$.ajax({
				   type: "POST",
				   url: '<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/backend/pictures/action_sort_save',
				   data: {"p_sort":$('#p_sort_'+p_index).val(),'p_id':p_id},
				   dataType:"json",
				   success: function(msg){					  
				   		
				   }
				});
			 
				
			}else{
				return false;
				}
			 
		}	 
</script>




<div class="search">
        注意：图片请控制在986×543，这样不会变形,图片越大，排序越前，批量上传支持一次传多张图片
          <div class="fieldset flash" id="fsUploadProgress_1000">
            
            
            
            </div>
          
          <div>
            <span id="spanButtonPlaceholder_1000">
              
            </span>
            <input type="hidden" id="p_id_1000" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['p_id'];?>
">
            <input id="btnCancel_1000" type="hidden" value="Cancel" onclick="cancelQueue(upload_1000);" disabled="disabled" style="margin-left: 2px; height: 22px; font-size: 8pt;" />
          </div>
  </div> 


<form  method="post" enctype="multipart/form-data"  name="form1" id="form1">

  <table width="600"  class="mytable">
   <thead> <tr>
      <th align="center">上传图片</th>
      <th width="100" align="center">排序</th>
      <th width="100" align="center">操作</th>
    </tr></thead>
    
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
    <tr>
      <td align="center">  
        
        <div id='show_img_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
'>
        <?php if ($_smarty_tpl->tpl_vars['item']->value['p_thumb']){?>
          <img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/swfupload/uploads/<?php echo $_smarty_tpl->tpl_vars['item']->value['p_thumb'];?>
" width="100" />
           <?php }?>
          </div>
       
        
        <div>
          <div class="fieldset flash" id="fsUploadProgress_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
">
            
            
            
            </div>
          
          <div>
            <span id="spanButtonPlaceholder_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
">
              
            </span>
            <input type="hidden" id="p_id_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['p_id'];?>
">
            <input id="btnCancel_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" type="hidden" value="Cancel" onclick="cancelQueue(upload_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
);" disabled="disabled" style="margin-left: 2px; height: 22px; font-size: 8pt;" />
            </div>
        </div>                    
      </td>
      <td align="center">
      
      <input type="text"  value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['item']->value['p_sort'])===null||$tmp==='' ? '0' : $tmp);?>
"  onchange="save_sort('<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
');" id="p_sort_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" size="6" maxlength="4" style="border:0px">
      
      &nbsp;</td>
      <td align="center">
      <?php if ($_smarty_tpl->tpl_vars['item']->value['p_id']){?>
      <a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/backend/pictures/action_del_index_rotation/?p_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['p_id'];?>
" onclick='return confirm("确定删除?");'> <img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/del.png"></a>
      <?php }?>
      &nbsp;</td>
    </tr>
    <?php } ?>

    </table>
    
    
    
    
     
      
        
        
    
    
 
</form>		
      

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>