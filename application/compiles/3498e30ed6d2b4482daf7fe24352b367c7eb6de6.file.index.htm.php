<?php /* Smarty version Smarty-3.1.14, created on 2013-08-24 03:28:16
         compiled from "application\templates\front\blue\en\index.htm" */ ?>
<?php /*%%SmartyHeaderCode:25040521771a13dd5e1-40992278%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3498e30ed6d2b4482daf7fe24352b367c7eb6de6' => 
    array (
      0 => 'application\\templates\\front\\blue\\en\\index.htm',
      1 => 1377253960,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25040521771a13dd5e1-40992278',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_521771a1662b18_56154404',
  'variables' => 
  array (
    'optimize' => 0,
    'header_html' => 0,
    'img_url' => 0,
    'site_url' => 0,
    'next_lang' => 0,
    'lang_type' => 0,
    'pics' => 0,
    'key' => 0,
    'base_url' => 0,
    'item' => 0,
    'dir_front' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_521771a1662b18_56154404')) {function content_521771a1662b18_56154404($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $_smarty_tpl->tpl_vars['optimize']->value['title'];?>
</title>
<meta name="Keywords" content="<?php echo $_smarty_tpl->tpl_vars['optimize']->value['meta'];?>
" />
<meta name="Description" content="<?php echo $_smarty_tpl->tpl_vars['optimize']->value['description'];?>
" />
<?php echo $_smarty_tpl->tpl_vars['header_html']->value['css'];?>

<?php echo $_smarty_tpl->tpl_vars['header_html']->value['js'];?>

</head>
<body>
<table width="991" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="3"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/top_02.jpg" width="3" height="95" /></td>
    <td style="background:url(<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/top_04.jpg) repeat-x"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/logo_02.jpg" width="248" height="95" style="margin-left:20px;" /></td>
        <td>
      
       

        
       
      
         <form id="form1" name="form1" method="post" action="<?php echo func_site_url(array('segments'=>'search'),$_smarty_tpl);?>
" >
         <ul class="index_top_right">
           
             <li>
             <a href="<?php echo ($_smarty_tpl->tpl_vars['site_url']->value).($_smarty_tpl->tpl_vars['next_lang']->value);?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/lang_change.gif">&nbsp;<?php echo $_smarty_tpl->tpl_vars['lang_type']->value;?>
</a>
            
          
         </li>
         <li class="top_search_li" > 
            <input type="text" name="title" id="textfield"   class="input" /> 
            <input type="image" src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/sousuo_07.jpg"  border="0"/>
            </li>

            <li class="account_link">
            <?php if (get_cookie("member")){?>
            <a href="<?php echo site_url("front/member/action_member_center");?>
">

            你好,<?php echo func_my_encrypt(get_cookie("member"),'DECODE');?>
, 会员中心</a>

            <?php }else{ ?>
            <a href="<?php echo site_url("front/member/action_register");?>
">注册</a><a href="<?php echo site_url("front/member/index");?>
">登陆</a>
            
            <?php }?>


            </li>
           
        </ul>

          </form>
        
        
        
        </td>
      </tr>
    </table></td>
    <td width="3"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/top_06.jpg" width="3" height="95" /></td>
  </tr>
</table>
<table width="991" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>
    <SCRIPT type='text/javascript'>
function selectTag(showContent,selfObj,str){
	// 操作标签
	var tag = document.getElementById("top_dhlm").getElementsByTagName("li");
	var taglength = tag.length;
	for(i=0; i<taglength; i++){
		tag[i].className = "";
	}
	selfObj.parentNode.className = "selectTag"+str;
	// 操作内容
	for(i=0; j=document.getElementById("top_dhlmContent"+i); i++){
		j.style.display = "none";
	}
	document.getElementById(showContent).style.display = "block";
}
</SCRIPT>



    <div id="top_flash">
		<script>
            var widths=991;
            var heights=470;	
            var counts=parseInt("<?php echo $_smarty_tpl->tpl_vars['pics']->value['stat'];?>
");
			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['pics']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
            img<?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
=new Image ();
            url<?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
=new Image ();
            url<?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
.src='<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/swfupload/uploads/<?php echo $_smarty_tpl->tpl_vars['item']->value['p_thumb'];?>
';
            img<?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
.src='<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/swfupload/uploads/<?php echo $_smarty_tpl->tpl_vars['item']->value['p_thumb'];?>
';
			
			<?php } ?>
            var nn=1; 
            var key=0; 
            function change_img() 
            {if(key==0){key=1;} 
            else if(document.all) 
            {document.getElementById("pic1").filters[0].Apply();document.getElementById("pic1").filters[0].Play(duration=2);} 
            eval('document.getElementById("pic1").src=img'+nn+'.src'); 
            eval('document.getElementById("url").href=url'+nn+'.src'); 
            for (var i=1;i<=counts;i++){document.getElementById("xxjdjj"+i).className='axx';} 
            document.getElementById("xxjdjj"+nn).className='bxx'; 
            nn++;if(nn>counts){nn=1;} 
            tt=setTimeout('change_img()',6000);}
            function changeimg(n){nn=n;window.clearInterval(tt);change_img();} 
            document.write('<style>'); 
            document.write('.axx{padding:1px 7px;border-left:#cccccc 1px solid;}'); 
            document.write('a.axx:link,a.axx:visited{text-decoration:none;color:#fff;line-height:12px;font:9px sans-serif;background-color:#666;}'); 
            document.write('a.axx:active,a.axx:hover{text-decoration:none;color:#fff;line-height:12px;font:9px sans-serif;background-color:#999;}'); 
            document.write('.bxx{padding:1px 7px;border-left:#cccccc 1px solid;}'); 
            document.write('a.bxx:link,a.bxx:visited{text-decoration:none;color:#fff;line-height:12px;font:9px sans-serif;background-color:##66CC33;}'); 
            document.write('a.bxx:active,a.bxx:hover{text-decoration:none;color:#fff;line-height:12px;font:9px sans-serif;background-color:##66CC33;}'); 
            document.write('</style>'); 
            document.write('<div style="width:'+widths+'px;height:'+heights+'px;overflow:hidden;text-overflow:clip;">'); 
            document.write('<div><a id="url"><img id="pic1" style="border:0px;filter:progid:dximagetransform.microsoft.wipe(gradientsize=1.0,wipestyle=4, motion=forward)" width='+widths+' height='+heights+' /></a></div>'); 
            document.write('<div style="filter:alpha(style=1,opacity=10,finishOpacity=0);background: #888888;width:100%-2px;text-align:right;top:-12px;position:relative;margin:1px;height:12px;padding:0px;margin:0px;border:0px;">'); 
          
			for(var i=1;i<counts+1;i++){document.write('<a href="javascript:changeimg('+i+');" id="xxjdjj'+i+'" class="axx" target="_self">'+i+'</a>');} 
            document.write('</div></div>'); 
            change_img(); 
        </script>
	</div>
    </td>
  </tr>
</table>
<table width="991" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <?php echo func_tag(array('t_id'=>44),$_smarty_tpl);?>

    <td style="background:url(<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/daohan_25.jpg) repeat-x">&nbsp;</td>
    <td width="2"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/daohan_27.jpg" width="2" height="33" /></td>
  </tr>
</table>
<table width="991" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td width="652" valign="top"><table width="642" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="142" ><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/about_09.jpg" width="142" height="28" /></td>
        <td width="496" style="background:url(<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/about_11.jpg) repeat-x">&nbsp;</td>
        <td width="4"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/about_13.jpg" width="4" height="28" /></td>
      </tr>
      <tr>
        <td colspan="3"><table width="642" height="168" border="0" cellspacing="0" cellpadding="0" style="margin-top:3px; background-color:#f7f7f7" class="bian">
          <tr>
            <td><span class="tutu"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/tu_05.jpg" width="268"  border="0" style="margin-top:5px; margin-left:5px; float:left"/></span></td>
            <td style="padding-left:8px; padding-right:8px; line-height:18px;" class="link_qq">
            <a  href="<?php echo func_site_url(array('segments'=>'about'),$_smarty_tpl);?>
">
            <?php echo func_tag(array('t_id'=>24,'where'=>"f_id=2",'html_type'=>'style1'),$_smarty_tpl);?>

            </a>
            </td>
          </tr>
        </table></td>
      </tr>
    </table></td>
    <td><table width="339" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="175"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/new_09.jpg" width="175" height="28" /></td>
        <td  style="background:url(<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/new_11.jpg) repeat-x">&nbsp;</td>
        <td width="3"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/new_13.jpg" width="3" height="28" /></td>
      </tr>
      <tr>
        <td colspan="3"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="bian" style="background-color:#f7f7f7; margin-top:3px;">
          <tr>
            <td style="line-height:30px; padding-top:7px; padding-bottom:8px;">
            <?php echo func_tag(array('t_id'=>46,'html_type'=>"style1",'page_size'=>5),$_smarty_tpl);?>

            </td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>





<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>