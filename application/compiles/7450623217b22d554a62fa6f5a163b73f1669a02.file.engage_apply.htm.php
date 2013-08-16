<?php /* Smarty version Smarty-3.1.14, created on 2013-08-15 07:28:40
         compiled from "application\templates\front\blue\zh\engage_apply.htm" */ ?>
<?php /*%%SmartyHeaderCode:13940520c81f2f24b84-84697381%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7450623217b22d554a62fa6f5a163b73f1669a02' => 
    array (
      0 => 'application\\templates\\front\\blue\\zh\\engage_apply.htm',
      1 => 1376551612,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13940520c81f2f24b84-84697381',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_520c81f33f7637_09961340',
  'variables' => 
  array (
    'dir_front' => 0,
    'img_url' => 0,
    'site_url' => 0,
    'engage' => 0,
    'sex' => 0,
    'b_place' => 0,
    'work_year' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520c81f33f7637_09961340')) {function content_520c81f33f7637_09961340($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include 'E:\\phpnow\\htdocs\\lb\\application\\libraries\\Smarty-3.1.14\\libs\\plugins\\function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<table width="992" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top:13px;">
  <tr>
    <td><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
/ban_05.jpg" width="992" height="178" /></td>
  </tr>
</table>
<table width="992" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top:13px;">
  <tr>
    <td width="246" valign="top">
    
     <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/left_about.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

     <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/left_contact.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    
      
    <td valign="top">
  
   <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <form action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/front/engage/action_apply_save" method="post" enctype="multipart/form-data" name="form1" id="form1" onsubmit="return validator(this)">
                <tr>
                  <td height="40" align="right" valign="top"><font color="red">*</font>&nbsp;</td>
                  <td height="40" colspan="3" align="left" valign="middle"><b>号为必填项，请发送简历时，务必注明应聘职位，不注明者视为无效简历！
                    <br />联系人：人事部 </b>
&nbsp;</td>
                </tr>
                <tr>
                 <td height="40" align="right" valign="middle">应聘职位：</td>
                 <td height="40" colspan="3" align="left" valign="middle">
                 <input name="main[eg_pos_str]" type="text" id="eg_pos_str" size="50" valid="required" errmsg='请输入应聘职位' value="<?php echo $_smarty_tpl->tpl_vars['engage']->value['eg_pos'];?>
"/>
                 <font color="red">*</font> </td>
               </tr>
              
               <tr>
                 <td height="40" align="right" valign="middle">姓名：</td>
                 <td height="40" align="left" valign="middle">
                 <input name="main[contact]" id="main[contact]" value="" maxlength="20" valid="required" errmsg='请输入姓名' />
                 <font color="red">*</font></td>
                 <td height="40" align="right" valign="middle">Email：</td>
                 <td height="40" align="left" valign="middle">
                 <input name="main[email]" id="main[email]" value="" size="20" maxlength="100"  valid="required|isEmail"  errmsg='请输入email|邮件格式不对'/>
                 <font color="red">*</font></td>
               </tr>
               <tr>
                 <td height="40" align="right" valign="middle" nowrap="nowrap">出生日期：</td>
                 <td height="40" align="left" valign="middle" nowrap="nowrap">
                 <select name="main[b_year]" id="main[b_year]" >
                   <option value="" selected="selected" >----</option>
                   <option value="2000">2000</option>
                   <option value="1999">1999</option>
                   <option value="1998">1998</option>
                   <option value="1997">1997</option>
                   <option value="1996">1996</option>
                   <option value="1995">1995</option>
                   <option value="1994">1994</option>
                   <option value="1993">1993</option>
                   <option value="1992">1992</option>
                   <option value="1991">1991</option>
                   <option value="1990">1990</option>
                   <option value="1989">1989</option>
                   <option value="1988">1988</option>
                   <option value="1987">1987</option>
                   <option value="1986">1986</option>
                   <option value="1985">1985</option>
                   <option value="1984">1984</option>
                   <option value="1983">1983</option>
                   <option value="1982">1982</option>
                   <option value="1981">1981</option>
                   <option value="1980">1980</option>
                   <option value="1979">1979</option>
                   <option value="1978">1978</option>
                   <option value="1977">1977</option>
                   <option value="1976">1976</option>
                   <option value="1975">1975</option>
                   <option value="1974">1974</option>
                   <option value="1973">1973</option>
                   <option value="1972">1972</option>
                   <option value="1971">1971</option>
                   <option value="1970">1970</option>
                   <option value="1969">1969</option>
                   <option value="1968">1968</option>
                   <option value="1967">1967</option>
                   <option value="1966">1966</option>
                   <option value="1965">1965</option>
                   <option value="1964">1964</option>
                   <option value="1963">1963</option>
                   <option value="1962">1962</option>
                   <option value="1961">1961</option>
                   <option value="1960">1960</option>
                   <option value="1959">1959</option>
                   <option value="1958">1958</option>
                   <option value="1957">1957</option>
                   <option value="1956">1956</option>
                   <option value="1955">1955</option>
                   <option value="1954">1954</option>
                   <option value="1953">1953</option>
                   <option value="1952">1952</option>
                   <option value="1951">1951</option>
                   <option value="1950">1950</option>
                   <option value="1949">1949</option>
                   <option value="1948">1948</option>
                   <option value="1947">1947</option>
                   <option value="1946">1946</option>
                   <option value="1945">1945</option>
                   <option value="1944">1944</option>
                   <option value="1943">1943</option>
                   <option value="1942">1942</option>
                   <option value="1941">1941</option>
                   <option value="1940">1940</option>
                   
        
                                
      
      
                 </select>
                   年 
                   <select name="main[b_month]" id="main[b_month]">
                     
          
                        
          
          
                     <option value="" selected="selected">----</option>
                     
          
                        
          
          
                     <option value="1">1</option>
                     <option value="2">2</option>
                     <option value="3">3</option>
                     <option value="4">4</option>
                     <option value="5">5</option>
                     <option value="6">6</option>
                     <option value="7">7</option>
                     <option value="8">8</option>
                     <option value="9">9</option>
                     <option value="10">10</option>
                     <option value="11">11</option>
                     <option value="12">12</option>
                     
          
                                  
        
        
                   </select>
                   月 
                   <select name="main[b_day]" id="main[b_day]">
                     
          
                        
          
          
                     <option value="" selected="selected">----</option>
                     
          
                        
          
          
                     <option value="1">1</option>
                     <option value="2">2</option>
                     <option value="3">3</option>
                     <option value="4">4</option>
                     <option value="5">5</option>
                     <option value="6">6</option>
                     <option value="7">7</option>
                     <option value="8">8</option>
                     <option value="9">9</option>
                     <option value="10">10</option>
                     <option value="11">11</option>
                     <option value="12">12</option>
                     <option value="13">13</option>
                     <option value="14">14</option>
                     <option value="15">15</option>
                     <option value="16">16</option>
                     <option value="17">17</option>
                     <option value="18">18</option>
                     <option value="19">19</option>
                     <option value="20">20</option>
                     <option value="21">21</option>
                     <option value="22">22</option>
                     <option value="23">23</option>
                     <option value="24">24</option>
                     <option value="25">25</option>
                     <option value="26">26</option>
                     <option value="27">27</option>
                     <option value="28">28</option>
                     <option value="29">29</option>
                     <option value="30">30</option>
                     <option value="31">31</option>
                     
          
                                  
        
        
                   </select>
                   日 <font color="red">*</font></td>
                 <td height="40" align="right" valign="middle">性别：</td>
                 <td height="40" align="left" valign="middle">
                 <select name="main[sex]" id="main[sex]">
                   <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['sex']->value,'selected'=>1),$_smarty_tpl);?>

                 </select>
                 <font color="red">*</font></td>
               </tr>
               <tr>
                 <td height="40" align="right" valign="middle">居住地：</td>
                 <td height="40" align="left" valign="middle">
                 <?php echo func_get_areat(array('id'=>"0"),$_smarty_tpl);?>
 <font color="red">*</font></td>
                 <td height="40" align="right" valign="middle">户口：</td>
                 <td height="40" align="left" valign="middle">
                 <select name="main[b_place]" id="main[b_place]" valid='required' errmsg='请选择户口'>
                   <option value="00" selected="selected">请选择</option>
              <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['b_place']->value),$_smarty_tpl);?>
  
                 </select>
                 <font color="red">*</font>
                 </td>
               </tr>
               <tr>
                 <td height="40" align="right" valign="middle">工作年限：</td>
                 <td height="40" colspan="3" align="left" valign="middle"><select name="main[work_year]" id="main[work_year]" valid='required' errmsg='请选择工作年限'>
                   
        
                      
        
        
                   <option value="" selected="selected">--请选择--</option>
                   
             <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['work_year']->value),$_smarty_tpl);?>

                        
                 </select> <font color="red">*</font></td>
               </tr>
               <tr>
                 <td height="40" align="right" valign="middle">联系电话/手机：</td>
                 <td height="40" colspan="3" align="left" valign="middle"><label>
                   <input name="main[mobile]" type="text" id="main[mobile]" size="15" maxlength="12" valid="required"  errmsg='请输入电话或者手机号码' />
                 </label>
                 <font color="red">*</font></td>
               </tr>
             
               <tr>
                 <td height="60" align="right" valign="middle">上传简历：</td>
                 <td colspan="3" align="left" valign="middle"><label>
<input type="file" name="file1" id="file1"  />
<br />
注意：只能上传.txt,xls,doc格式的文件 </label></td>
               </tr>
                 <tr>
                 <td height="40" align="right" valign="middle">备注：</td>
                 <td colspan="3" align="left" valign="middle"><label>
                   <textarea name="main[remarks]" id="main[remarks]" cols="45" rows="5"></textarea>
                 </label></td>
               </tr>
               
               <tr>
                 <td height="40" align="right" valign="middle">&nbsp;</td>
                 <td colspan="3" align="left" valign="middle">
                     <input type="hidden" name="main[eg_id]" id="eg_id"  value="<?php echo $_GET['eg_id'];?>
"/> 
              <input type="submit" name="button" id="button" /></td>
               </tr>
             
      </form>
             </table>
  </td>
  </tr>
</table>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['dir_front']->value)."/foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php }} ?>