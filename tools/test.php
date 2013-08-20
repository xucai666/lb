<?php
$str1="http://localhost/xxxds95sdfds95m.htm";

$pattern1='/(.+)(?=htm)$/';

preg_match($pattern1, $str1,$arr1);


var_dump($arr1);

?>