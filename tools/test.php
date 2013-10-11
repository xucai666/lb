<script language="JavaScript" type="text/javascript" src="http://localhost/lb/application//templates/front/blue/zh//js//jquery-1.9.1.min.js"></script>
<script>

 

</script>
<?php
$str = '<input type="radio" name="vd_item" value="5">';

echo preg_replace("/type=\"radio\" name=\"(.*?)\"/", 'type="checkbox" name="\\1[]"', $str);

