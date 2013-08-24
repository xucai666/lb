<script language="JavaScript" type="text/javascript" src="http://localhost/lb/application//templates/front/blue/zh//js//jquery-1.9.1.min.js"></script>

<script>
var s="ab,df,df,e,ab,sx,xxss,a";
var uid="xzz";
var h  =s.split(',');
h.push(uid);

alert($.unique(h).join(','));

var input_hid = $("#pic_"+uid);
var sh  =input_hid .split(',');
sh.push(uid);
input_hid .val($.unique(sh).join(','));
</script>