<?php /* Smarty version Smarty-3.1.14, created on 2013-08-21 03:41:01
         compiled from "application\templates\front\blue\zh\message.htm" */ ?>
<?php /*%%SmartyHeaderCode:2006052134a0c1bf3b0-73007065%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd1722a81ed772567b0c0bc9b1c8698f0db641d48' => 
    array (
      0 => 'application\\templates\\front\\blue\\zh\\message.htm',
      1 => 1377056454,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2006052134a0c1bf3b0-73007065',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52134a0c2d1f20_50855361',
  'variables' => 
  array (
    'dir_front' => 0,
    'img_url' => 0,
    'site_url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52134a0c2d1f20_50855361')) {function content_52134a0c2d1f20_50855361($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<table width="992" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td width="246" valign="top">
     	    <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/left_message.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

 
	        <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/left_contact.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	  
	  
    <td valign="top"><table width="742" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="3"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/daohanhh_09.jpg" width="3" height="28" /></td>
        <td width="685" style="background:url(<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/daohanhh_11.jpg) repeat-x; padding-left:20px; " class="hong">我要留言</td>
        <td width="3"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/daohanhh_13.jpg" width="3" height="28" /></td>
      </tr>
      <tr>
  <td width="691" colspan="3" ></td>
      </tr>
    </table>
      <table width="742" border="0" cellspacing="0" cellpadding="0" class="bian1">
        <tr>
          <td><form id="form1" name="form1" method="post" action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/message/save" onsubmit="return validator(this)">
            <table width="500" border="0" cellspacing="0" cellpadding="0" style="margin-left:43px">
              <tr>
                <td width="91" height="40">您的姓名：</td>
                <td colspan="2"><input name="main[ms_name]" type="text" id="main[ms_name]"  valid="required" errmsg="请输入尊称" style="width:188; height:20px; border:solid 1px #c8c8c8; line-height:20px;"/></td>
              </tr>
              <tr>
                <td height="40">电子邮件：</td>
                <td colspan="2"><input type="text" name="main[ms_email]" id="email" valid="required|isEmail" errmsg="请输入电子邮件，方便联系|电子邮件地址格式不正确"  /></td>
              </tr>
              <tr>
                <td height="40">留言标题：</td>
                <td colspan="2"><input type="text" name="main[ms_title]" id="ms_title"  style="width:188; height:20px; border:solid 1px #c8c8c8;line-height:20px;"/></td>
              </tr>
              <tr>
                <td height="40">留言内容：</td>
                <td colspan="2"><textarea name="main[ms_content]" id="main[ms_content]" cols="45" rows="5" valid="required" errmsg="请输入留言内容"></textarea></td>
              </tr>
              <tr>
                <td height="40">验证码：</td>
				
              
            <td width="125" valign="top">
			
			
	
             
				 
				 
				 <table cellspacing="0" cellpadding="0">
                   <tr>
                     <td><input name="captcha" type="text" id="captcha"   size="10" valid='required' errmsg='请输入验证码'/></td>
                     <td>&nbsp;</td>
                     <td>
					 
					   <a href="javascript:;"  >
           		 <img id='captcha1' src='<?php echo func_site_url(array('segments'=>"message/show_captcha"),$_smarty_tpl);?>
'/>            </a>
            <script language="javascript">
			$('#captcha1').bind('click',function(){
				
				$(this).attr('src','<?php echo func_site_url(array('segments'=>"message/show_captcha"),$_smarty_tpl);?>
/?rnd='+Math.random());
				
				
				})
				</script>	
					 </td>
                   </tr>
</table>
				 
							</td>	
              </tr>
              <tr>
                <td height="44" colspan="3" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td ><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td align="right" width="250"><input type="submit" name="1" id="1" value="提交" style="margin-right:20px;" /></td>
                            <td><input type="submit" name="2" id="2" value="重置" /></td>
                          </tr>
                      </table></td>
                    </tr>
                </table></td>
              </tr>
            </table>
                    </form>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>