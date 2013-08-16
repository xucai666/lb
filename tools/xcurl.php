<?php
function xcurl($url,$ref=null,$post=array(),$ua="Mozilla/5.0 (X11; Linux x86_64; rv:2.2a1pre) Gecko/20110324 Firefox/4.2a1pre",$print=false) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_AUTOREFERER, true);
    if(!empty($ref)) {
        curl_setopt($ch, CURLOPT_REFERER, $ref);
    }
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    if(!empty($ua)) {
        curl_setopt($ch, CURLOPT_USERAGENT, $ua);
    }
    if(count($post) > 0){
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);   
    }
    $output = curl_exec($ch);
    curl_close($ch);
    if($print) {
        print($output);
    } else {
        return $output;
    }
}

$s = xcurl("http://localhost/lb/backend/mdata/action_list","http://localhost/lb",array('a'=>1,'b'=>2));
echo "<pre>";
print_r($s);
echo "</pre>";
exit();
?>