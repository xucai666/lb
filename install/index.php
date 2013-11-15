<?php
function directory_map($source_dir, $directory_depth = 0, $hidden = FALSE)
	{
		if ($fp = @opendir($source_dir))
		{
			$filedata	= array();
			$new_depth	= $directory_depth - 1;
			$source_dir	= rtrim($source_dir, DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR;

			while (FALSE !== ($file = readdir($fp)))
			{
				// Remove '.', '..', and hidden files [optional]
				if ( ! trim($file, '.') OR ($hidden == FALSE && $file[0] == '.'))
				{
					continue;
				}

				if (($directory_depth < 1 OR $new_depth > 0) && @is_dir($source_dir.$file))
				{
					$filedata[$file] = directory_map($source_dir.$file.DIRECTORY_SEPARATOR, $new_depth, $hidden);
				}
				else
				{
					$filedata[] = $file;
				}
			}

			closedir($fp);
			return $filedata;
		}

		return FALSE;
	}

if(file_exists('install.lock')){
	$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME'];
	$url = substr($url,0,-9);
	$url .= '../index.php';
	header("location:".$url);
}




?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
function setDb(v){
	document.getElementById('db_name').value=v.substr(0,v.lastIndexOf("."));
}
$(document).ready(function(){
		$('.install_m').click(function(){
			$('#form1').attr('action',$(this).val());
		})
		
});
</script>
</head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<body>
	<center><h4>系统安装</h4></center>
<form method="post" action="index_2.php" id="form1">
<table width="100%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#999999">
<tr>
<td align="right" bgcolor="#FFFFFF">访问URL：</td>
<td align="left" bgcolor="#FFFFFF"><label>
<input name="base_url" size="80" type="text" id="base_url"  value='<?php echo dirname(dirname("http://".$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME']));?>' />
</label>（如：http://localhost/lb/）</td>
</tr><tr>
<tr>
<td align="right" bgcolor="#FFFFFF">安装数据方式:</td>
<td align="left" bgcolor="#FFFFFF">
	<input type="radio" class="install_m" name="install_method" value='index_2.php' checked="checked">msyql
	<input type="radio" class="install_m" name="install_method"  value='index_3.php'>msyqli


</td>
</tr>
<td align="right" bgcolor="#FFFFFF">数据库地址：</td>
<td align="left" bgcolor="#FFFFFF"><label>
<input name="db_host" type="text" id="db_host" value="localhost" />
</label></td>
</tr>

<tr>
<td align="right" bgcolor="#FFFFFF">数据库账号：</td>
<td align="left" bgcolor="#FFFFFF"><input name="db_user" type="text" id="db_user" value="root" /></td>
</tr>
<tr>
<td align="right" bgcolor="#FFFFFF">数据库密码:</td>
<td align="left" bgcolor="#FFFFFF"><input name="db_password" type="text" id="db_password" /></td>
</tr>

<tr>
<td align="right" bgcolor="#FFFFFF">使用文件:</td>
<td align="left" bgcolor="#FFFFFF">
	<select name="db_file" onchange="setDb(this.value);">
		<option>请选择</option>
	<?php
		$dirs = directory_map(dirname(dirname(__file__)).DIRECTORY_SEPARATOR.'database',1);
		
		foreach($dirs as $v){
			$select =$v == 'lb_cn.sql' ? 'selected=true':'';
			echo '<option value='.$v.' '.$select.'  >'.$v.'</option>';
		}
	?>
	</select></td>
</tr>

<tr>
<td align="right" bgcolor="#FFFFFF">数据库:</td>
<td align="left" bgcolor="#FFFFFF"><input name="db_name" type="text" id="db_name" value="lb_cn" /></td>
</tr>

<tr>
<td align="right" bgcolor="#FFFFFF">表前缀:</td>
<td align="left" bgcolor="#FFFFFF"><input name="db_prefix" type="text" id="db_prefix" value='corcms_' /></td>
</tr>


</table>
<p>

<div align="center">

<input type="submit" name="Submit" value="提交" />
</div>

</p>
</form>




</body>

</html>