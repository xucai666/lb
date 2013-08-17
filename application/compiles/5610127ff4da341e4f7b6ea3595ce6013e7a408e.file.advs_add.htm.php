<?php /* Smarty version Smarty-3.1.14, created on 2013-08-17 15:59:20
         compiled from "application\templates\backend\blue\advs_add.htm" */ ?>
<?php /*%%SmartyHeaderCode:8982520f9dd8f3f567-03929952%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5610127ff4da341e4f7b6ea3595ce6013e7a408e' => 
    array (
      0 => 'application\\templates\\backend\\blue\\advs_add.htm',
      1 => 1376744515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8982520f9dd8f3f567-03929952',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dir_backend' => 0,
    'site_url' => 0,
    'main' => 0,
    'adv_show' => 0,
    'detail' => 0,
    'item' => 0,
    'key' => 0,
    'img_url' => 0,
    'editor' => 0,
    'total_size' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_520f9dd9216f38_32741001',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520f9dd9216f38_32741001')) {function content_520f9dd9216f38_32741001($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<form action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/backend/advs/action_save" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr> 
      <td height="24"  colspan="2" align="left" class="nav_title"> 添加/修改广告
      
     
       </td>
    </tr>
    <tr> 
      <td height="40" align="right">广告名称：</td>
      <td height="40"><label> <input name="main[adv_title]" type="text" id="main[adv_title]" size="50" value="<?php echo $_smarty_tpl->tpl_vars['main']->value['adv_title'];?>
"  /> 
        
        </label>
		<?php echo type_error(array('obj'=>"main[adv_title]"),$_smarty_tpl);?>

        </td>
    </tr>
    <tr> 
      <td height="40" align="right">广告特征：</td>
      <td height="40">宽 
        <input name="main[adv_w]" type="text" id="main[adv_w]" value="<?php echo $_smarty_tpl->tpl_vars['main']->value['adv_w'];?>
" size="8">
		<?php echo type_error(array('obj'=>"main[adv_w]"),$_smarty_tpl);?>

        px×高 
        <input name="main[adv_h]" type="text" id="main[adv_h]" value="<?php echo $_smarty_tpl->tpl_vars['main']->value['adv_h'];?>
" size="8">
		<?php echo type_error(array('obj'=>"main[adv_h]"),$_smarty_tpl);?>

        px
		
		
		</td>
    </tr>
    <?php if ($_smarty_tpl->tpl_vars['main']->value['adv_id']){?>
       <input type="hidden"   name="main[adv_type]" id="radio2" value="<?php echo $_smarty_tpl->tpl_vars['main']->value['adv_type'];?>
"/>
       <tr >
        <td height="40" align="right">效果预览：</td>
        <td height="40">
       
       <?php echo $_smarty_tpl->tpl_vars['adv_show']->value;?>


        
        &nbsp;</td>
      </tr>
    <?php }else{ ?>
      <tr>
      <td height="40" align="right">广告类别：</td>
      <td height="40"><label>
        <input type="radio"  class="adv_type" name="main[adv_type]" id="radio2" value="1"  />
        图片
        <input type="radio"  class="adv_type" name="main[adv_type]" id="radio" value="2"  />
      Flash</label></td>
    </tr>

    <?php }?>
  
    
    
    <tbody id="tbody_flash" style="display:none">
    <tr>
      <td height="40" align="right" valign="top">上传Flash：</td>
      <td>
      
     		<input name="detail[img][0]" type="file" size="15"   >
            <input name="detail[adv_pic][0]" type="hidden"   value="<?php echo $_smarty_tpl->tpl_vars['detail']->value[0]['adv_pic'];?>
" >           
            <input name="detail[detail_id][0]"  id="detail_id" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value[0]['detail_id'];?>
"   >   
           	<input type="hidden" name="detail[adv_type][0]" value="2" >     
      
      
      </td>
    </tr>
    </tbody>
    <tbody id="tbody_pic" style="display:none">
    <tr>
      <td height="40" align="right" valign="top">
      上传图片： <br /></td>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="mytable">
              <thead>
              <tr>
        	<th>预览</th>
        	<th width="150" align="center">上传</th>
        	<th align="center">链接</th>
        	<th>广告说明</th>
        	<th>操作</th>
        </tr>
      </thead>
	       <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['detail']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>  
           
          <tr>
	        <td>
	          <?php if ($_smarty_tpl->tpl_vars['item']->value['adv_pic']){?>
	          <img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['adv_pic'];?>
" width="100" height="80" class="myimg" />
	          <?php }?>
            </td>
          <td align="center">
            <input name="detail[img][<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
]" type="file" size="15"   >
            <input name="detail[adv_pic][<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
]" type="hidden"   value="<?php echo $_smarty_tpl->tpl_vars['item']->value['adv_pic'];?>
" >           
            <input name="detail[detail_id][<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
]"  id="detail_id" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['detail_id'];?>
"   >  
            <input name="detail[adv_type][<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
]" type="hidden"  value="1"   >
          </td>
          <td align="center"><input type="text"  name="detail[adv_url][<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['adv_url'];?>
"/></td>
          <td align="center">
            <input type="text" name="detail[adv_title][<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
]"   value="<?php echo $_smarty_tpl->tpl_vars['item']->value['adv_title'];?>
" id="adv_title" />
          </td>
          <td align="center">         
            
            <a id="copyfile_a"  href="javascript:;" onclick="core_copy(this,'#detail_id','copy_ext');"><img  title="添加" add1.png"  src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/add1.png" ></a>
            
            <a id="delete_link"  href="javascript:;" onclick="core_drop(this,'#detail_id','copy_ext');"  class=" <?php if ($_smarty_tpl->tpl_vars['key']->value==0){?>hide<?php }?>"  ><img  title="删除"    src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/del1.gif" ></a>
            
            </td>
          </tr>
        
            <?php } ?>
            
        </table>
   
            </td>
          </tr>
      </table></td>
    </tr>
  	</tbody>
   
    <tr> 
      <td height="40" align="right">到期时间：</td>
      <td height="40"><input name="main[adv_exp_date]" readonly="readonly" type="text" id="main[adv_exp_date]" size="12"  value="<?php echo $_smarty_tpl->tpl_vars['main']->value['adv_exp_date'];?>
" class="Wdate" onfocus="WdatePicker();"/></td>
    </tr>
    <tr> 
      <td height="40" align="right">发布日期：</td>
      <td height="40"><label> 
        <input name="main[adv_cr_date]" readonly="readonly" type="text" id="main[adv_cr_date]" size="12"  value="<?php echo $_smarty_tpl->tpl_vars['main']->value['adv_cr_date'];?>
" class="Wdate" onfocus="WdatePicker();"/>
        </label> 
      <?php echo type_error(array('obj'=>"main[adv_date]"),$_smarty_tpl);?>

      </td>
    </tr>
    <tr> 
      <td height="40" align="right">描述：</td>
      <td height="400"><label> 
        <textarea name="main[adv_desc]"  cols="45" rows="5"   errmsg="请输入培训对象" id="content"   valid="custom" custom="getContentValue"     style="display:none" ><?php echo $_smarty_tpl->tpl_vars['main']->value['adv_desc'];?>
</textarea>
        <?php echo $_smarty_tpl->tpl_vars['editor']->value;?>
</textarea>
        </label> 
      
      </td>
    </tr>
    <tr> 
      <td height="40" align="right">&nbsp;</td>
      <td height="40" align="center">
            <input type="hidden" name="total_detail" id="total_detail"  value="<?php echo $_smarty_tpl->tpl_vars['total_size']->value;?>
"/>
            <input name="main[adv_id]" type="hidden"  value="<?php echo $_smarty_tpl->tpl_vars['main']->value['adv_id'];?>
" />
            <?php echo create_button(array('type'=>'save'),$_smarty_tpl);?>


    </tr>
  </table>
</form>
<script language="JavaScript">
	function copy_ext(obj){
		var p_obj = $(obj).parents("tr:first");		
		p_obj.find('.myimg').remove();
	}
	
	//显示上传区域,flash,pic
	function show_upload(adv_type){

		$("#tbody_flash,#tbody_pic").hide();
		if(adv_type==1){
      $("#tbody_pic").show(); 
		
		}else{
			$("#tbody_flash").show();	
     
		}
	}
	
	//默认显示
	show_upload("<?php echo $_smarty_tpl->tpl_vars['main']->value['adv_type'];?>
");
	$(document).ready(function(){
		$(".adv_type").on("click",function(){
				show_upload($(this).val());							 
		})						   
	})
</script>


<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>