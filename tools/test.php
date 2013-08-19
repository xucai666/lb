<?php
$filename = 'mypic.gif';
$ext = substr(strrchr($filename, '.'), 1);
echo strrchr($filename, '.');
echo $ext ;


?>