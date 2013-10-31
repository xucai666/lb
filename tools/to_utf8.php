<?php      
function gbk2utf8($filename)      
{      
    $content = file_get_contents($filename);      
    $fp = fopen($filename, "w");       
    $content = utf8_encode($content);      
    $content = "\xEF\xBB\xBF".$content;      
    fputs($fp, $content);       
    fclose($fp);      
}      
     
$dir = dirname(__FILE__);
$dir = realpath($dir.'./../');  
listDir($dir);      
function listDir($dir)      
{      
    $dp = opendir($dir);      
    while($file = readdir($dp))      
    {      
        if($file == '.' || $file == '..')      
            continue;      
        if(eregi('.tpl|.php|.html|.htm|.js|.asp|.css|.aspx', $file))      
        {      
            echo $dir.'\\'.$file."<br>";    
            gbk2utf8($dir.'\\'.$file);    
        }    
        else    
        {    
            if(is_dir($dir.'\\'.$file))    
                listDir($dir.'\\'.$file);      
        }      
        clearstatcache();      
    }      
}      
?>