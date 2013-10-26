<?php
 
$filename  = dirname(__FILE__).'/data.txt';
 
// 消息都储存在这个文件中
$msg = isset($_GET['msg']) ? $_GET['msg'] : '';
 
if ($msg != ''){
	file_put_contents($filename,$msg);
	die();
}
 
// 不停的循环，直到储存消息的文件被修改
$lastmodif    = isset($_GET['timestamp']) ? $_GET['timestamp'] : 0;
$currentmodif = filemtime($filename);
while ($currentmodif <= $lastmodif){ // 如果数据文件已经被修改
	usleep(100000); // 100ms暂停 缓解CPU压力
	clearstatcache(); //清除缓存信息
	$currentmodif = filemtime($filename);
}
 
// 返回json数组
$response = array();
$response['msg']       = file_get_contents($filename);
$response['timestamp'] = $currentmodif;
echo json_encode($response);
flush();
 
?>