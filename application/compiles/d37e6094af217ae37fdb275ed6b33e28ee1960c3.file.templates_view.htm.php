<?php /* Smarty version Smarty-3.1.14, created on 2013-08-19 11:59:57
         compiled from "application\templates\backend\blue\templates_view.htm" */ ?>
<?php /*%%SmartyHeaderCode:15813521208bd3fe199-49572131%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd37e6094af217ae37fdb275ed6b33e28ee1960c3' => 
    array (
      0 => 'application\\templates\\backend\\blue\\templates_view.htm',
      1 => 1376781220,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15813521208bd3fe199-49572131',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dir_backend' => 0,
    'main' => 0,
    'templates_type' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_521208bd4e9060_19593057',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_521208bd4e9060_19593057')) {function content_521208bd4e9060_19593057($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript">SyntaxHighlighter.all();</script>
<center>
<div class="nav_title" style="width:800px;text-align:left;">万能标签效果预览</div>
<table class="mytable" style="width:800px;" >
	<tr>
		<td>标签编号：</td>
		<td>
			
			<?php echo $_smarty_tpl->tpl_vars['main']->value['t_id'];?>

		</td>
		
	</tr>
<tr>
		<td>标签名称：</td>
		<td>
			
			<?php echo $_smarty_tpl->tpl_vars['main']->value['t_name'];?>

		</td>
		
	</tr>

	<tr>
		<td>类型：</td>
		<td>
			<?php echo $_smarty_tpl->tpl_vars['templates_type']->value[$_smarty_tpl->tpl_vars['main']->value['t_type']];?>

		</td>
		
	</tr>
	<tr>
		<td >数据表：</td>
		<td >
				<?php echo $_smarty_tpl->tpl_vars['main']->value['t_db_name'];?>

		
		</td>
		
	</tr>
	<tr>
		<td style="width:150px">效果：</td>
		<td style="height:350px;">
		


		 <div id="tab_area">
    
	    	
	        <ul class="tabs">
	            <li><a href="javascript:;" title="content_1" class="tab active">列表页</a></li>
	            <li><a href="javascript:;" title="content_2" class="tab">内页</a></li>
	            <li><a href="javascript:;" title="content_3" class="tab">样式1</a></li>
	            <li><a href="javascript:;" title="content_4" class="tab">样式2</a></li>
	            <li><a href="javascript:;" title="content_5" class="tab">样式3</a></li>
	            <li><a href="javascript:;" title="content_6" class="tab">样式4</a></li>
	        </ul>
        
	        <div id="content_1" class="content">
	     
				<pre class="brush:php;toolbar:false;" >
					      <?php echo func_tag(array('t_id'=>$_smarty_tpl->tpl_vars['main']->value['t_id'],'html_type'=>"list",'escape'=>true),$_smarty_tpl);?>

				</pre>
	        	
	        </div>
	        <div id="content_2" class="content">
	        	<pre class="brush:php;toolbar:false;"><?php echo func_tag(array('t_id'=>$_smarty_tpl->tpl_vars['main']->value['t_id'],'html_type'=>"detail"),$_smarty_tpl);?>
</pre>
	        </div>
	        <div id="content_3" class="content">
	        	<pre class="brush:php;toolbar:false;"><?php echo func_tag(array('t_id'=>$_smarty_tpl->tpl_vars['main']->value['t_id'],'html_type'=>"style1"),$_smarty_tpl);?>
</pre>
	        </div>
	        <div id="content_4" class="content">
	        	<pre class="brush:php;toolbar:false;"><?php echo func_tag(array('t_id'=>$_smarty_tpl->tpl_vars['main']->value['t_id'],'html_type'=>"style2"),$_smarty_tpl);?>
</pre>
	        </div>
	        <div id="content_5" class="content">
	        	<pre class="brush:php;toolbar:false;"><?php echo func_tag(array('t_id'=>$_smarty_tpl->tpl_vars['main']->value['t_id'],'html_type'=>"style3"),$_smarty_tpl);?>
</pre>
	        </div>
	        <div id="content_6" class="content">
	        	<pre class="brush:php;toolbar:false;"><?php echo func_tag(array('t_id'=>$_smarty_tpl->tpl_vars['main']->value['t_id'],'html_type'=>"style4"),$_smarty_tpl);?>
</pre>
	        </div>


		</td>
		
	</tr>
	
	<tr>
		<td colspan="3" align="center">
		<?php echo create_button(array('type'=>'close','url'=>"javascript:window_close();"),$_smarty_tpl);?>

		
	</td></tr>
	

</table>
</center>



<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_backend']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>