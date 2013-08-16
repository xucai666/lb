<?php /* Smarty version Smarty-3.1.14, created on 2013-08-16 14:04:30
         compiled from "application\templates\backend\blue\center.htm" */ ?>
<?php /*%%SmartyHeaderCode:29287520e316e71d057-21388147%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '774b00c614ab3096d91e0b8fcc91c562c3e35f4a' => 
    array (
      0 => 'application\\templates\\backend\\blue\\center.htm',
      1 => 1376043272,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29287520e316e71d057-21388147',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'item_lang' => 0,
    'header_html' => 0,
    'img_url' => 0,
    'rights_options' => 0,
    'key' => 0,
    'item' => 0,
    'item1' => 0,
    'site_url' => 0,
    'item2' => 0,
    'ci_config' => 0,
    'lang_all_options' => 0,
    'lang_type' => 0,
    'weather' => 0,
    'user_info' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_520e3170ad2d66_20281365',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520e3170ad2d66_20281365')) {function content_520e3170ad2d66_20281365($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include 'E:\\phpnow\\htdocs\\lb\\application\\libraries\\Smarty-3.1.14\\libs\\plugins\\function.html_options.php';
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<title><?php echo $_smarty_tpl->tpl_vars['item_lang']->value['sys_backend'];?>
</title> 
<?php echo $_smarty_tpl->tpl_vars['header_html']->value['css'];?>

<?php echo $_smarty_tpl->tpl_vars['header_html']->value['js'];?>


<script language="javascript">
$(window).load(function(){
	$('#menu_0 a:first').trigger('click');
});
</script>

<style>
	.main_left {table-layout:auto; background:url(<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/left_bg.gif)}
	.main_left_top{ background:url(<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/left_menu_bg.gif); padding-top:2px !important; padding-top:5px;}
	.main_left_title{text-align:left; padding-left:15px; font-size:14px; font-weight:bold; color:#fff;}
	.left_iframe{HEIGHT: 92%; VISIBILITY: inherit;WIDTH: 180px; background:transparent;}
	.main_iframe{HEIGHT: 92%; VISIBILITY: inherit; WIDTH:100%; Z-INDEX: 1}
	table { font-size:12px; font-family : tahoma, 宋体, fantasy; }
	td { font-size:12px; font-family : tahoma, 宋体, fantasy;}
</style>
<script language="javascript">
	var status = 1;
	var Menus = new DvMenuCls;
	document.onclick=Menus.Clear;
	function switchSysBar(){
	     if (1 == window.status){
			  window.status = 0;
	          switchPoint.innerHTML = '<img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/left.gif">';
	          document.all("frmTitle").style.display="none"
	     }
	     else{
			  window.status = 1;
	          switchPoint.innerHTML = '<img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/right.gif">';
	          document.all("frmTitle").style.display=""
	     }
	}
</SCRIPT>

<!--导航部分-->
<div class="top_table">
<div class="top_table_leftbg">
	<div class="system_logo"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/logo_up.gif"></div>
	<div class="menu">
	
		<ul>


 <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['rights_options']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>

			<li id="menu_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"  onClick="getleftbar(this);"><a href="javascript:;" target='_self'><?php echo $_smarty_tpl->tpl_vars['item']->value['r_title'];?>
</a>
			<div class="menu_childs" onMouseOut="Menus.Hide(0);">
				<ul>
				<?php  $_smarty_tpl->tpl_vars['item1'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item1']->_loop = false;
 $_smarty_tpl->tpl_vars['key1'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['item']->value['detail']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item1']->key => $_smarty_tpl->tpl_vars['item1']->value){
$_smarty_tpl->tpl_vars['item1']->_loop = true;
 $_smarty_tpl->tpl_vars['key1']->value = $_smarty_tpl->tpl_vars['item1']->key;
?> 
						
						<li>
							<?php if (mb_substr($_smarty_tpl->tpl_vars['item1']->value['r_url'],0,4,'utf8')=='http'){?>
								<a href="<?php if ($_smarty_tpl->tpl_vars['item1']->value['r_url']=='event'){?>javascript:;<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item1']->value['r_url'];?>
<?php }?>"  <?php echo $_smarty_tpl->tpl_vars['item1']->value['r_js_action'];?>
  title="<?php echo $_smarty_tpl->tpl_vars['item1']->value['r_title'];?>
" target="frmright"><?php echo $_smarty_tpl->tpl_vars['item1']->value['r_title'];?>
</a></li>
							<?php }else{ ?>
								<a href="<?php if ($_smarty_tpl->tpl_vars['item1']->value['r_url']=='event'){?>javascript:;<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['item1']->value['r_url'];?>
<?php }?>"  <?php echo $_smarty_tpl->tpl_vars['item1']->value['r_js_action'];?>
  title="<?php echo $_smarty_tpl->tpl_vars['item1']->value['r_title'];?>
" target="frmright"><?php echo $_smarty_tpl->tpl_vars['item1']->value['r_title'];?>
</a></li>
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['item1']->value['detail']){?>	
								<ul>
								<?php  $_smarty_tpl->tpl_vars['item2'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item2']->_loop = false;
 $_smarty_tpl->tpl_vars['key2'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['item1']->value['detail']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item2']->key => $_smarty_tpl->tpl_vars['item2']->value){
$_smarty_tpl->tpl_vars['item2']->_loop = true;
 $_smarty_tpl->tpl_vars['key2']->value = $_smarty_tpl->tpl_vars['item2']->key;
?> 
									<?php if ($_smarty_tpl->tpl_vars['item2']->value['r_url']){?>
										<li>
										<?php if (mb_substr($_smarty_tpl->tpl_vars['item2']->value['r_url'],0,4,'utf8')=='http'){?>
											<a href="<?php if ($_smarty_tpl->tpl_vars['item2']->value['r_url']=='event'){?>javascript:;<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item2']->value['r_url'];?>
<?php }?>"  <?php echo $_smarty_tpl->tpl_vars['item2']->value['r_js_action'];?>
  title="<?php echo $_smarty_tpl->tpl_vars['item2']->value['r_title'];?>
" target="frmright"><?php echo $_smarty_tpl->tpl_vars['item2']->value['r_title'];?>
</a></li>
										<?php }else{ ?>
											<a href="<?php if ($_smarty_tpl->tpl_vars['item2']->value['r_url']=='event'){?>javascript:;<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['item2']->value['r_url'];?>
<?php }?>"  <?php echo $_smarty_tpl->tpl_vars['item2']->value['r_js_action'];?>
  title="<?php echo $_smarty_tpl->tpl_vars['item2']->value['r_title'];?>
" target="frmright"><?php echo $_smarty_tpl->tpl_vars['item2']->value['r_title'];?>
</a></li>
										<?php }?>
									</li> 
						
									<?php }?>	

								<?php } ?>
								</ul>
							<?php }?>	
							
						 </li>
							
						
				<?php } ?>
				</ul>
			</div>
			<div class="menu_div"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/menu01_right.gif" style="vertical-align:bottom;"></div></li>
 <?php } ?>
			<?php if ($_smarty_tpl->tpl_vars['ci_config']->value['lang_multiple']){?>
			<li style="float:right;">   
			  <DIV style="DISPLAY: block; HEIGHT: 54px;text-align:right;color:#ffffff!important;padding-right:20px;">选择语种:
			    <select style="color:#ff0000!important" onChange="parent.location.href='<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/backend/common/lang_set/?lang='+this.value+'&url=<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/backend/login/center/';" >
			    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lang_all_options']->value,'selected'=>$_smarty_tpl->tpl_vars['lang_type']->value),$_smarty_tpl);?>

			    </select>
    
   			  </DIV>
  		  </li>
		<?php }?>
		</ul>
	</div>
</div>
</div>
<div style="height:24px; background:#337ABB;"></div>
<!--导航部分结束-->

<TABLE border=0 cellPadding=0 cellSpacing=0 height="92%" width="100%" style="background:#337ABB;">
<TBODY>
<TR>
  <TD align=middle id=frmTitle vAlign=top name="fmTitle" class="main_left">
	<table width="180" border="0" cellspacing="0" cellpadding="0" class="main_left_top">
	  <tr height="32">
	    <td valign="top"></td>
	    <td class="main_left_title" id="leftmenu_title">功能菜单</td>
	    <td valign="top" align="right"></td>
	  </tr>
	</table>
	<IFRAME frameBorder=0 id=frmleft name=frmleft src="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/backend/login/left" class="left_iframe" allowTransparency="true" ></IFRAME>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr height="32">
	    <td valign="top"></td>
	    <td valign="bottom" align="center"></td>
	    <td valign="top" align="right"></td>
	  </tr>
	</table>
  </td>
  <TD bgColor=#337ABB style="WIDTH: 10px">
	   <TABLE border=0 cellPadding=0 cellSpacing=0 height="100%">
	    <TBODY>
	    <TR>
	     <TD onclick=switchSysBar() style="HEIGHT: 100%">
	     <SPAN class=navPoint id=switchPoint title="关闭/打开左栏"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/right.gif"></SPAN>
	     </TD>
	    </TR>
	    </TBODY>
	   </TABLE>
     </TD>
  <TD bgcolor="#ffffff" width="100%" vAlign=top>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#C4D8ED">
	  <tr height="32">
	    <td valign="top" width="10" background="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/bg2.gif"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/teble_top_left.gif" alt="" /></td>
	    <td background="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/bg2.gif"width="28" ><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/arrow.gif" alt="" align="absmiddle" /></td>
	    <td background="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/bg2.gif"><span style="float:left"></span><span style="float:left;width:500px;" id="dvbbsannounce">
<script type="text/javascript">
	function show(){
	var aa=new Date();
	bb=aa.getFullYear()+"年"+(aa.getMonth()+1)+"月"+aa.getDate()+"日\r";
	bb+="星期"+'日一二三四五六'.charAt(aa.getDay())+"\r"+aa.getHours()+"时";
	bb+=aa.getMinutes()+"分"+aa.getSeconds()+"秒";
	document.all.cc.innerHTML=bb+'&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['weather']->value['future']['name'];?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['weather']->value['future']['wea_0'];?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['weather']->value['real']['temperature'];?>
&#8451;';
	setTimeout("show()",1000)
	}
</script>
<body onload=show()>
<div id=cc></div></span></td>
		<td background="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/bg2.gif" style="text-align:right; color: #135294; "><?php echo $_smarty_tpl->tpl_vars['user_info']->value['admin_user'];?>
(<?php echo $_smarty_tpl->tpl_vars['user_info']->value['role_name'];?>
) | <a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/backend/login/center" target='_top'>后台首页</a> | <a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
" target="_blank">网站首页</a> | <a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/backend/system_manage/exit_system" target="_top">退出</a> </td>
	    <td align="right" valign="top" background="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/bg2.gif" width="28" ><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/teble_top_right.gif" alt="" /></td>
	    <td align="right" width="16" bgcolor="#337ABB"></td>
	  </tr>
	</table>
	<IFRAME frameBorder=0 id=frmright name=frmright scrolling=yes src="" class="main_iframe"></IFRAME>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:#C4D8ED;">
	<tr>
	<td><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/teble_bottom_left.gif" alt="" width="5" height="6" /></td>
	<td align="right"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/teble_bottom_right.gif" alt="" width="5" height="6" /></td>
	<td align="right" width="16" bgcolor="#337ABB"></td>
	</tr>
	</table>
</TD>
</TR>
</TBODY>
</TABLE>

</body>
</html><?php }} ?>