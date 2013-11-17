<?php

	include_once("class.array2xml2array.php");
	
	$admins = array("admin1", "admin2", "admin3");
	$config = array("config" => array(
							"filepath" => "/tmp",
							"interval" => 5, 
							"admins"=>$admins));

	$array2XML = new CArray2xml2array();
	
	// no root
	$array2XML->setArray($admins);
	if ($array2XML->saveArray("admins.xml", "admins")){
		echo "admins array save<br>";
	}
	
	// one root
	$array2XML->setArray($config);
	if($array2XML->saveArray("config.xml")){
		echo "config array save<br>";
	}

?>