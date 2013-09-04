<?php /* Smarty version Smarty-3.1.14, created on 2013-09-04 14:53:34
         compiled from "application\templates\backend\corcms\lang_trans.htm" */ ?>
<?php /*%%SmartyHeaderCode:261605226d8ee48fad3-68993180%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c74cde125c501ef1271de9f1f01bb460596d8ab' => 
    array (
      0 => 'application\\templates\\backend\\corcms\\lang_trans.htm',
      1 => 1376848119,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '261605226d8ee48fad3-68993180',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dir_backend' => 0,
    'img_url' => 0,
    'ci_config' => 0,
    'status' => 0,
    'list' => 0,
    'item' => 0,
    'key' => 0,
    'page_link' => 0,
    'page_size' => 0,
    'count' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5226d8ee5efc86_18899782',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5226d8ee5efc86_18899782')) {function content_5226d8ee5efc86_18899782($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include 'E:\\phpnow\\htdocs\\lb\\application\\libraries\\Smarty-3.1.14\\libs\\plugins\\function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="nav_title">多语言翻译</div>
<div  align="right">

	<a href="<?php echo func_site_url(array('segments'=>'/backend/system_manage/action_lang_import'),$_smarty_tpl);?>
" onclick="return confirm('重新载入将清空已翻译数据？');"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/import_lang.png"  /></a>

	<a href="<?php echo func_site_url(array('segments'=>'/backend/system_manage/action_lang_export'),$_smarty_tpl);?>
" onclick="return confirm('确定导出？');"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/export_lang.png"  /></a>


</div>

<table class='search'>
	<tr><td>
		<form action='<?php echo func_site_url(array('segments'=>"backend/system_manage/action_lang_trans"),$_smarty_tpl);?>
' method="get">
			关键字：
		
			<input type="text" name="lang_val" value="<?php echo $_GET['lang_val'];?>
">
			语种：
		
			<select name="lang_type">
				<option value=''>请选择</option>
				<?php echo smarty_function_html_options(array('values'=>$_smarty_tpl->tpl_vars['ci_config']->value['support_language'],'output'=>$_smarty_tpl->tpl_vars['ci_config']->value['support_language'],'selected'=>$_GET['lang_type']),$_smarty_tpl);?>

			</select>

			状态:
			<select name="status">
				<option value='-1'>请选择</option>
				<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['status']->value,'selected'=>$_GET['status']),$_smarty_tpl);?>

			</select>
			<?php echo create_button(array('type'=>"search"),$_smarty_tpl);?>

			<?php echo create_button(array('type'=>"trans",'url'=>"javascript:run=0;next_trans();;"),$_smarty_tpl);?>

		</form>
	</td></tr>
</table>

  <form id="form2" method="post" action="<?php echo func_site_url(array('segments'=>'/backend/system_manage/action_del'),$_smarty_tpl);?>
" onsubmit="return chkdel2();">   
<table class='mytable'>
	<thead>
<tr>
	
	<th>编号</th>
	<th>下标</th>
	<th>值</th>
	<th>来源</th>
	<th>类型</th>
	<th >操作</th>

</tr>
	</thead>
<tbody>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>	
<tr>
	
	<td><?php echo $_smarty_tpl->tpl_vars['item']->value['lang_id'];?>
</td>
	<td><?php echo $_smarty_tpl->tpl_vars['item']->value['lang_key'];?>
</td>
	<td><?php echo $_smarty_tpl->tpl_vars['item']->value['lang_val'];?>
</td>
	<td><?php echo $_smarty_tpl->tpl_vars['item']->value['lang_file'];?>
</td>
	<td><?php echo $_smarty_tpl->tpl_vars['item']->value['lang_type'];?>
</td>
	<td >
		
			<span id="trans_status_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
">
				<?php if ($_smarty_tpl->tpl_vars['item']->value['is_trans']){?><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/yes.gif" /><?php }else{ ?><a class="a_trans" href="javascript:;" onclick="single_trans('<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
');return false;"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/no.gif" border="0" /></a><?php }?>
				
			</span>	&nbsp;
			<script  id="js_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" type="text/javascript"  translink="<?php echo func_site_url(array('segments'=>"backend/system_manage/action_trans"),$_smarty_tpl);?>
?type=auto&lang_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['lang_id'];?>
&run=<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" ></script>
			<script language="javascript" type="text/javascript">var js_id_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
 = "<?php echo $_smarty_tpl->tpl_vars['item']->value['lang_id'];?>
";</script>

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




<script type="text/javascript">
	var run=0;	
	var page_size = +("<?php echo $_smarty_tpl->tpl_vars['page_size']->value;?>
");
	var next_page = (+getquerystring('per_page'))+page_size;
	var total_page = +("<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
");
	
	function next_trans(){	
		var obj = document.getElementById('js_'+run);
		if(run==page_size ||  obj==undefined){
			if(next_page>total_page) next_page = 0;
			var lnk = location.href;
			 lnk = replace_url_param(lnk,"per_page",next_page);
			
			 lnk = replace_url_param(lnk,"auto",1);
			
			
			 location.href = lnk;
			 return false;
		}		
		var ps = jQuery('#trans_status_'+run).position();
		document.body.scrollTop = parseInt(ps.top)-180;		
						
		if(obj!=undefined) {	
			document.getElementById('trans_status_'+run).innerHTML='<img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/loader.gif" />';		
			obj.src  = obj.getAttribute('translink')+'&rnd='+Math.random();		
					
		}	


		run++;



		
	}
	

	function resetrun(){
		run = 0;
		clearTimeout(setTimeout(function(){next_trans();},1000)-1);		
	}
	
	
	function single_trans(run_key){
		try{
			
			document.getElementById('trans_status_'+run_key).innerHTML='<img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/loader.gif" />';		
			var obj = document.getElementById('js_'+run_key);	
			var url  = obj.getAttribute('translink').replace('type=auto','type=once');
			obj.src = url+'&rnd='+Math.random();					
		}catch(e){
			alert(e.description);
		}		
		
	}


 function replace_url_param(url,name,val){
 
	var s ;
	var reg = new RegExp(name+"=([^&]*)(&|$)","ig");
	var h = reg.exec(url);
	if(!h){

		if(url.substr(-1, 1)=='&'){
			url = url.substr(0, url.length-1);
		}
			
		s = (url.indexOf("?")=="-1")?'?'+name+"="+val:"&"+name+"="+val;
		s = url+s;
		
		
	}else{
		s = url.replace(h[0],name+'='+val+h[2])
	}

	return s;
  }



function getquerystring(name1) {
var reg = new RegExp("(^|&)" + name1 + "=([^&]*)(&|$)"); 



var r = window.location.search.substr(1).match(reg);


if (r!=null) return unescape(r[2]); return null;
}


jQuery(document).ready(function($) {
	if(location.href.indexOf("auto=1",0)!="-1"){
		resetrun();
	}
});

</script>


<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>