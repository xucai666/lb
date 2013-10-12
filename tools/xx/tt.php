<?php

$save_path = "E:\\phpnow\\htdocs\\lb\\swfupload\\uploads\\images";

echo 'http://'.$_SERVER['HTTP_HOST'].str_replace("\\", '/', str_replace(realpath($_SERVER['DOCUMENT_ROOT']),'',realpath($save_path)));

?>