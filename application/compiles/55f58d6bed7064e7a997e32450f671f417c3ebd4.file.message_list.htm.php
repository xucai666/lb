<?php /* Smarty version Smarty-3.1.14, created on 2013-08-29 03:35:44
         compiled from "application\templates\backend\blue\message_list.htm" */ ?>
<?php /*%%SmartyHeaderCode:9021521ec190ef8976-97303930%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '55f58d6bed7064e7a997e32450f671f417c3ebd4' => 
    array (
      0 => 'application\\templates\\backend\\blue\\message_list.htm',
      1 => 1376782096,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9021521ec190ef8976-97303930',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dir_backend' => 0,
    'lang_message' => 0,
    'site_url' => 0,
    'list' => 0,
    'item' => 0,
    'img_url' => 0,
    'page_link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_521ec19166fee5_94502011',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_521ec19166fee5_94502011')) {function content_521ec19166fee5_94502011($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script language='javascript'>

	function CPos(x, y)
	{
		this.x = x;
		this.y = y;
	}
	
	function GetObjPos(ATarget)
	{
		var target = ATarget;
		var pos = new CPos(target.offsetLeft, target.offsetTop);
		var target = target.offsetParent;
		while (target)
		{
			pos.x += target.offsetLeft;
			pos.y += target.offsetTop;
			target = target.offsetParent
		}
		return pos;
	}
	
	
	function showimg(event_obj){
		var pos = GetObjPos(event_obj);
		var obj_id = 'people_container';
		var obj = document.getElementById(obj_id);	
		obj.style.left = parseInt(pos.x + 100)+'px';		
		obj.style.top = parseInt(pos.y - 80)+'px';	
		document.getElementById('showbigimg').innerHTML = $(event_obj).next().html();		
		obj.style.display = 'block';
		//clearTimeout(setTimeout(function(){obj.style.display = 'none';},3000)-1);
		
	}
</script>


<div class="nav_title" align="left" >&nbsp;<?php echo $_smarty_tpl->tpl_vars['lang_message']->value['theme_list'];?>
</div>
<iframe src="" style="display:none" name="_myiframe"></iframe>


<div   id="people_container" style="position:absolute;display:none"  >
	<div style="background-image:url(images/left_big_line1.gif);width:28px;height:228px;float:left;"></div><div id="showbigimg" style="	background-color:#efefef;width:300px;height:224px;border:1px solid #80BDCB;float:left; border-left:0px;" ></div>
</div>

<table class="search"  style="width:100%">
<tr><td>
	<form action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/backend/message/action_list/" method="get">   
    <?php echo $_smarty_tpl->tpl_vars['lang_message']->value['name'];?>
：
        <input type="text" name="ms_name" value="<?php echo $_GET['ms_name'];?>
" />

    <?php echo $_smarty_tpl->tpl_vars['lang_message']->value['tel'];?>
：
        <input type="text" name="ms_tel" value="<?php echo $_GET['ms_tel'];?>
" />
        
  
    <?php echo $_smarty_tpl->tpl_vars['lang_message']->value['email'];?>
：
        <input type="text" name="ms_email" value="<?php echo $_GET['ms_email'];?>
" />      
        

	 <?php echo create_button(array('type'=>'search'),$_smarty_tpl);?>

	</form>

</td>
</tr>
</table>



   
   
  <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>


    <table width="100%" border="0" cellpadding="3" class="mytable" style="margin-top:20px;">


  <tr style="height:30px!important; background-color:#f1f1f1">
    <th align="right">问：</th>
    <td colspan="3" align="left"><a href='#' onmouseout="$('#people_container').hide();" onmouseover="showimg(this);" ><?php echo $_smarty_tpl->tpl_vars['item']->value['ms_title'];?>
</a>
		&nbsp;&nbsp;
		<?php echo $_smarty_tpl->tpl_vars['item']->value['ms_content'];?>

		&nbsp;&nbsp;
		<?php echo $_smarty_tpl->tpl_vars['item']->value['ms_date'];?>
&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['item']->value['ms_ip'];?>

		&nbsp;&nbsp;
       <a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/backend/message/action_del?ms_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['ms_id'];?>
" onclick="return confirm('确定删除?');"><img name="" src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/del.png"  alt="" /></a>    </div> 

    <div style="display:none;margin-left:50px;">
	    <li>公司名称：<?php echo $_smarty_tpl->tpl_vars['item']->value['ms_company'];?>
</li>
	    <li>联系人：<?php echo $_smarty_tpl->tpl_vars['item']->value['ms_name'];?>
</li>
	    <li>电话：<?php echo $_smarty_tpl->tpl_vars['item']->value['ms_tel'];?>
</li>
	    <li>传真：<?php echo $_smarty_tpl->tpl_vars['item']->value['ms_fax'];?>
</li>
	    <li>E-mail：<?php echo $_smarty_tpl->tpl_vars['item']->value['ms_email'];?>
</li>
    </div><br>
	

    
    
    </td>
    </tr>
    
     
    
  <tr>
  
  
    <th align="right"></th>
    <td colspan="3" align="left">&nbsp;</td>
    </tr>
  <tr>
    <th align="right">答：</th>
    <td colspan="3" align="left"><form action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/backend/message/action_save" method="post" name="form1" target="_myiframe" id="form1">
      <textarea name="main[ms_feedback]" cols="50" rows="5" id="main[ms_feedback]"><?php echo $_smarty_tpl->tpl_vars['item']->value['ms_feedback'];?>
</textarea>
        <label>
        <input name="main[ms_id]" type="hidden" id="main[ms_id]"  value="<?php echo $_smarty_tpl->tpl_vars['item']->value['ms_id'];?>
"/>
        <input name="is_feed" type="hidden" id="is_feed" value="1" />
       
        </label>
		
		<?php echo create_button(array('type'=>'save'),$_smarty_tpl);?>

    </form>      <label></label></td>
  </tr>
  <tr>
    <th align="right">显示：</th>
    <td colspan="3" align="left">
	
	<a href="javascript:;"  class="<?php if ($_smarty_tpl->tpl_vars['item']->value['ms_valid']){?>yes<?php }else{ ?>no<?php }?>"    alt=""  onclick="ajax_change_state(this,'message','ms_id','<?php echo $_smarty_tpl->tpl_vars['item']->value['ms_id'];?>
','ms_valid');">&nbsp;</a>

	
	</td>
  </tr>
</table>



<?php } ?>
<div class="page_link">
	<?php echo $_smarty_tpl->tpl_vars['page_link']->value;?>

</div>



<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>