<?php
//使用mysqli导入，速度更快，需要PHP.INI开启mysqli支持
@set_time_limit(300);
header("Content-Type:text/html;charset=UTF-8");
//当前目录
$dl = DIRECTORY_SEPARATOR;
$dir  = dirname(__file__).$dl ;
//根目录
$base_dir = dirname($dir).$dl;
//数据库配置文件
$config_file = $base_dir.$dl.'application'.$dl.'config'.$dl.'database.php';
extract($_POST);		

define('CFG_DB_HOST',$db_host);				
define('CFG_DB_USER',$db_user);        			
define('CFG_DB_PASSWORD',$db_password);  			
define('CFG_DB_ADAPTER','mysql');    			
define('CFG_DB_NAME',$db_name);	
define('CFG_DB_PREFIX',$db_prefix);	
define('DB_FILE',$base_dir.'database'.$dl.$db_file);
//update database config file
update_config('hostname',CFG_DB_HOST,'string');
update_config('username',CFG_DB_USER,'string');
update_config('password',CFG_DB_PASSWORD,'string');
update_config('database',CFG_DB_NAME,'string');
update_config('dbprefix',CFG_DB_PREFIX,'string');

update_config('base_url',$base_url,'string','config.php');

$connect = mysql_connect(CFG_DB_HOST,CFG_DB_USER,CFG_DB_PASSWORD) or die(mysql_error())	;
$sql2 = "CREATE DATABASE if not exists `".CFG_DB_NAME."` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;";		
mysql_query($sql2) or die(mysql_error());	

if (!function_exists('mysqli_connect')) {
  	die('请安装mysqli，否则无法完成数据导入！');
}  

$mysqli = new mysqli(CFG_DB_HOST, CFG_DB_USER, CFG_DB_PASSWORD, CFG_DB_NAME);

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

//替换表前缀
$query  = file_get_contents(DB_FILE);
$query  = preg_replace("/mysys_/",CFG_DB_PREFIX,$query);	
/* execute multi query */
echo multiQuery($query);exit;
if ($mysqli->multi_query($query)) {
    echo '数据导入完成！';
}else{
	echo '数据导入异常！';
}
@fopen("install.lock", 'w');
sleep(2);
//安装完成，跳转
echo "<script>location.href='".$base_url."'</script>";
@header("location:".$base_url);
/* close connection */
$mysqli->close();


function update_config($ini, $value,$type="string",$file='database.php'){ 
	global $config_dir;
	if(!file_exists($config_dir.$file)) return false; 
	$dlr = file_get_contents($config_dir.$file); 
	$dlr2=""; 
	if($type=="int"){ 
		$dlr2 = preg_replace("/".preg_quote($ini)."']\s*=.*;/", $ini."'] = ".$value.";",$dlr); 
	} 
	else{ 
		$dlr2 = preg_replace("/".preg_quote($ini)."']\s*=.*;/",$ini."'] = \"".$value."\";",$dlr); 
	} 
	file_put_contents($config_dir.$file, $dlr2); 
} 

?>