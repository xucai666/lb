document.write('<script type=\'text/javascript\' src=\'http://localhost/lb/application//templates/front/corcms/en//js/jquery-1.9.1.min.js\' ></script><script type=\"text/javascript\">$(document).ready(function(){	var duilian = $(\"div.duilian\");	var duilian_close = $(\"a.duilian_close\");		var window_w = $(window).width();	if(window_w>1000){duilian.show();}	$(window).scroll(function(){		var scrollTop = $(window).scrollTop();		duilian.stop().animate({top:scrollTop+130});	});	duilian_close.click(function(){		$(this).parent().hide();		return false;	});		});</script><style>/*下面是对联广告的css代码*/.duilian{top:130px;position:absolute; width:102px; overflow:hidden; display:none;}.duilian_left{ left:6px;}.duilian_right{right:6px;}.duilian_con{border:#CCC solid 1px; width:100px; height:300px; overflow:hidden;}.duilian_close{ width:100%; height:24px; line-height:24px; text-align:center; display:block; font-size:13px; color:#555555; text-decoration:none;}</style><div class=\"duilian duilian_left\">	<div class=\"duilian_con\">			<a   href=\"\" target=\"_blank\" title=\"\">	<img src=\"http://localhost/lb/uploads/java.jpg\" width=\"120\" height=\"80\" class=\"myimg\" /></a> </div>    <a href=\"#\" class=\"duilian_close\">X关闭</a></div><div class=\"duilian duilian_right\">	<div class=\"duilian_con\">			<a   href=\"\" target=\"_blank\" title=\"\">	<img src=\"http://localhost/lb/uploads/java.jpg\" width=\"120\" height=\"80\" class=\"myimg\" /></a> </div>    <a href=\"#\" class=\"duilian_close\">X关闭</a></div>');