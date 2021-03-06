

//统一复制
function core_copy(obj,clearobj,extend_fn){	
	var parents = $(obj).parents("tr:first");	
	var object_new = $(parents).clone().insertAfter($(parents));	
	$(object_new).find('#delete_link').show();		
	$(object_new).find(clearobj).val('');	
	var size = parseInt($('#total_detail').val());		
	size++;
	$('#total_detail').val(size);				
	$(object_new).find("[name^='detail']").each(function(){		
		var name  = $(this).attr("name");	
		var new_name = name.replace(/\[\d.*?\]/,'['+size+']');			
		$(this).attr("name",new_name) ;
		
	})	
	
	if(typeof(extend_fn!="undefined")&&typeof(eval(extend_fn))=="function"){
		eval(extend_fn+"(obj)");
	}

}

//统一删除
function core_drop(obj,extend_fn){
	var parents = $(obj).parents("tr:first");
	$(parents).remove();		
	if(typeof(extend_fn!="undefined")&&typeof(eval(extend_fn))=="function"){
		eval(extend_fn+"(obj)");
	}
	
}



/**
 * 跳转
 */
function redirect(url){	
	setTimeout(function(){location.href=url},3000);

}


function getCoordinate(obj)
{
  var pos =
  {
    "x" : 0, "y" : 0
  }

  pos.x = document.body.offsetLeft;
  pos.y = document.body.offsetTop;

  do
  {
    pos.x += obj.offsetLeft;
    pos.y += obj.offsetTop;

    obj = obj.offsetParent;
  }
  while (obj.offsetParent)

  return pos;
}


//获取相对位置
function CPos(x, y){
		this.x = x;
		this.y = y;
}
	
function GetObjPos(ATarget){
	var target = ATarget;
	var pos = new CPos(target.offsetLeft, target.offsetTop);
	var target = target.offsetParent;
	while (target)
	{
		pos.x += target.offsetLeft;
		pos.y += target.offsetTop;
		target = target.offsetParent
	}
	return pos;
}





function displayError(id_expression){
		$(id_expression).each(function(){		
		var newp = GetObjPos($(this));
		var width = $(this).prev().width()-20;
		var new_left = newp.x;
		var new_top = newp.y;
		new_left = new_left+parseInt(width/2);
		new_top = new_top+10;
		var inner_html  = $(this).html();
		$(this).css({"line-height":"150%", "width":"120px","z_index":"100","position":"absolute","left":new_left+"px","top":new_top+"px" });
		var error_html = '<div><div class="error_div_top"></div>';
		 error_html += '<div class="error_div_center">'+inner_html+'<a href="javascript:void(0);"  style="float:right;color:#FF8D00"><b>×<b></a>&nbsp;&nbsp;</div>';
		 error_html += '<div class="error_div_bottom"></div>';
		 error_html += '</div>';
		$(this).html(error_html);
		$(this).show();
		error_html = '';
		$(this).bind('click',function(){
			$(this).html('');
		})
		$('html, body').animate({ scrollTop: $(id_expression).siblings("input").last().offset().top }, 500);
		setTimeout(function(){		
			$(id_expression).html('');
		},3000);
	})
}






function overclass(obj){
	//鼠标经过样式变化处
			$(obj).hover( 
                function () { 			
                    $(this).addClass("tr_over");   //鼠标经过时增加样式
                }, 
                function () { 
                    $(this).removeClass("tr_over"); //鼠标离开时移除样式
                }
            )
			

}


//unicode转换
function chr2Unicode(str) { 
	  var a = [],
        i = 0;
        for (; i < str.length;) a[i] = ("00" + str.charCodeAt(i++).toString(16)).slice( - 4);
        return "\\u" + a.join("\\u")
} 
	
	
	
//提示信息
function show_msg(msg){	
	$.messager.show({
			title:'提示信息',
			msg:unescape(chr2Unicode(msg).replace(/\\/g, "%")),
			timeout:3000,
			showType:'slide'
		});		
}




//ajax__加载城市
function loadCity(areaid){
	var reval;	
	$(obj_return).find("option").each(function(){
		$(this).remove();
	
	})
	$.ajax({
	  type: "GET",
	  url: url+"?1=1&province_id="+province_id,
	  dataType: "json",
	  success:function(msg){
		  	$.each(msg, function(i,item){
		  		 reval = '<option value="'+i+'">';
		  		 reval += item;
		  		 reval += '</option>';
		  		 $(reval).appendTo($(obj_return));
		  		
			  });  
			if(trigger){
				$(trigger).trigger('change');	
			}
	  }
	  
	});

}





/**
 * 切换状态,参数1表格名称，参数2关键字段
 */

function ajax_change_state(obj,tb,key,val,change_key){
    var src,change_val;

    var src =$(obj).attr('src');	
    if(typeof(src)=="undefined"){
   		change_val = $(obj).hasClass("yes")?0:1;
    }else{
   		change_val = src.match(/yes.gif/i) ? 0 : 1; //提交前
    }
    $.when(ajax_change_val(tb,key,val,change_key,change_val)).done(function(msg){
			if(msg=='error'){
					alert('操作失败!');
				}else{
					if(change_val>0){
						$(obj).removeClass('no').addClass('yes');	
					}else{
						$(obj).removeClass('yes').addClass('no');
					}
				}
    })
    return change_val;
	
}




/**
 * 切换状态,参数1表格名称，参数2关键字段
 */

function ajax_change_val(tb,key,val,change_key,change_val){
    var suc = 0 ;
    $.ajax({
    	type:'POST',
    	async:false,
    	url:site_url +"?d=backend&c=common&m=ajax_change_state",
    	data:{tb:tb,key:key,val:val,change_key:change_key,change_val:change_val}
    	
    }).done(function(msg){
    	suc = (msg==1)?1:0;
    });
     return (suc==1)?change_val:'error';
	
}



//验证重复
function ajax_check_repeat(obj,tb,key_name,key_value,val_name){	

	var url = site_url+"/common/ajax_repeat_valid";
	$.ajax({
   type: "POST",
	   url: url,
	   data: "tb="+tb+"&key_name="+key_name+"&val_name="+val_name+"&key_value="+key_value+"&val_value="+$(obj).val(),
	   success: function(msg){
				
					if(msg>0){
						
						alert($(obj).attr('error_repeat_text'));
					}
	   }
	}); 

	
	
}


function start_download(files_id){
	if(confirm('确定下载?')){
		$.getJSON(site_url+"/common/ajax_integral_download/?files_id="+files_id,function(msg){	
			if(msg.var_return=="1"){				
					self.location.replace("/loading.php?files_id="+msg.files_id);						
					
			}
			else if(msg.var_return=='-1'){
					alert('请先登录！');
					self.location.href="/members/logon.php";
			}else if(msg.var_return=='-2'){
					alert('积分不足，无法完成下载！');		
			}else{
				if(msg==''){
					msg = '你点太快了';	
				}
				alert('发生错误：'+msg);		
			}
		});
	}
	
}






//分页输入跳转
function jump(){
		self.location.href=location.pathname+'?page='+$('#page').val()+'&per_page='+(parseInt($('#page').val())-1)*5;	
}


//菜单切换

function doClick_up(o,val){
	
	this,'up1','up_con2','up_con1'
	 var est_sell_sent = $(o).attr('atr_sell_sent');
	 $("[id='est_sell_sent']").val(est_sell_sent);
	 $(o).addClass('up_link').removeClass('sp0');
	  $("td[id^='up']").removeClass('up_link').removeClass('sp0');
	 $('#up'+val).addClass('up_link');
	 $("div[id^='up_con']").hide();
	 $('#up_con'+val).show();
	 
}



//排序
function ajax_sort(obj,tb,key,val,change_key){
	change_val = $(obj).val();
	$(obj).hide();
	$(obj).next().show();
	$.post(site_url+"?d=backend&c=common&m=ajax_change_state?tb="+tb+"&key="+key+"&val="+val+"&change_key="+change_key+"&change_val="+change_val,function(msg){	
				if(msg>0){
					
					$(obj).show();
					$(obj).next().hide();	
				}else{
					alert('操作失败'+msg);
				}
			
	});

}


//ajax
	function ajaxLoadList(){
		var args = arguments; 
		var url = args[0]; 
		var obj_response = args[1]; 
		var data = args[2];
		var func = args[3];
		if(obj_response==undefined) obj_response = '#ajax_content';
		$(obj_response).load(url,data,func);
	}


function loadjs(file,id){
	
	$("<scri"+"pt>"+"</scr"+"ipt>").attr({src:file,type:'text/javascript',id:id}).appendTo($('head').remove(id));

}


function getJsPath(){
	var scripts = document.getElementsByTagName('script');
	var thisScript = scripts[1];
	var path = thisScript.src.replace(/\/script\.js$/, '/');
	return path.substr(0,path.lastIndexOf("/"));

}


$.extend({
    includePath: getJsPath(),
    include: function(file)
    {
  
        var files = typeof file == "string" ? [file] : file;
        for (var i = 0; i < files.length; i++)
        {
            var name = files[i].replace(/^\s|\s$/g, "");
            var att = name.split('.');
            var ext = att[att.length - 1].toLowerCase();
            var isCSS = ext == "css";
            var tag = isCSS ? "link" : "script";
            var attr = isCSS ? " type='text/css' rel='stylesheet' " : " language='javascript' type='text/javascript' ";
            var link = (isCSS ? "href" : "src") + "='" + $.includePath + name + "'";
         
            if ($(tag + "[" + link + "]").length == 0) document.write("<" + tag + attr + link + "></" + tag + ">");
        }
    }
});


/**
 * [win_close description]
 * @return {[type]} [description]
 */
function window_close(){
	window.opener=null;

    window.open("","_self");

    window.close();
}

/**
 * [win_close description]
 * @return {[type]} [description]
 */
function window_back(){
	history.go(-1);
}




//复选表单全选事件 form：表单名
function CheckAll(form)  {

	for (var i=0;i<form.elements.length;i++)
	{
		var e = form.elements[i];
		if (e.name != 'chkall'&&e.type=="checkbox")
		{
			e.checked = form.chkall.checked;
		}
	}
}

/**
 * resize image
 * @param {[type]} maxWidth  [description]
 * @param {[type]} maxHeight [description]
 * @param {[type]} objImg    [description]
 */
function resizeImage(objImg,maxWidth,maxHeight){

	var img = new Image();
	img.src = objImg.src;
	var hRatio;
	var wRatio;
	var Ratio = 1;
	var w = img.width;
	var h = img.height;
	wRatio = maxWidth / w;
	hRatio = maxHeight / h;
	if (maxWidth ==0 && maxHeight==0){
	Ratio = 1;
	}else if (maxWidth==0){//
	if (hRatio<1) Ratio = hRatio;
	}else if (maxHeight==0){
	if (wRatio<1) Ratio = wRatio;
	}else if (wRatio<1 || hRatio<1){
	Ratio = (wRatio<=hRatio?wRatio:hRatio);
	}
	if (Ratio<1){
	w = w * Ratio;
	h = h * Ratio;
	}
	
	
	$(objImg).width(w);
	$(objImg).height(h);
}

/**
 * autoComplete
 * @param  {[type]} _auto_obj [description]
 * @return {[type]}           [description]
 */
function load_autocomplete(_auto_obj){
	var cache = {};
	_auto_obj.autocomplete({
		autoFocus:true,
	     source: function( request, response ) {
				_auto_url = site_url+_auto_obj.attr('rel');
		        var term = request.term;
		        if ( term in cache ) {
		          response( cache[term] );
		          return;
		        }
		        $.getJSON(_auto_url, request, function( data, status, xhr ) {
		          cache[term] = data;
		          response( data );
		        });
	      },
	      minLength: 1,
	      delay:40,
	      response: function( event, ui ) {	_auto_obj.prevAll('input.auto_id').val('').val('');}, 
	      focus: function( event, ui ) {	_auto_obj.prevAll('input.auto_id').val(ui.item.id);}
	    });
}

 //不显示无图占位符
function ImgError(source){
	source.src = img_backend+"noimg.jpg";
	source.onerror = "";
	return true;
}


function art_dialog_open(url,title){
	var d_title =title?title:'对话框';
	top.art.dialog.open(url,{
	button: [{
    	name: '保存',
        callback: function () {

         	var iframe = this.iframe.contentWindow;
    		iframe.$('form').trigger("submit");
            this.button({
                name: '保存',
                disabled: true
            }).lock();
            var th = this;
            setTimeout(function(){
	             th.button({
	                name: '保存',
	                disabled: false
	            });
            },3000);
            return false;
        },

        focus: true
    }],
    title: d_title,
    width:800,
    height:400,
    lock:true,
    resize:true,
    opacity:"0.4"
    
    });


}

function art_dialog_close(msg,callback){

		var list = art.dialog.list;
		for (var i in list) {
		    list[i].close();
		}
		if(msg!="undefined" && typeof(msg)!="undefined"){
			top.art.dialog.tips(msg);
		}		
		(callback && typeof(callback) === "function") && callback();
}
	
	
function frmright_reload(){

	var win_obj = window.ifr_main.main;	
	
	
	var url = site_url+replace_url_param(win_obj.location.search,'m','action_ajax_list');

	$.ajax({
		url: url,
		type: 'POST',
		dataType: 'html',
		data: {param1: 'value1'}
	})
	.done(function(msg) {
		win_obj.$('#ajax_content').html(msg);
	})
	
	
	
	
	
}	

//url参数追加或者替换
function replace_url_param(url,name,val){


	var s ;
	var reg = new RegExp(name+"=([^&]*)(&|$)","ig");
	var h = reg.exec(url);
	if(!h){

		if(url.substr(-1, 1)=='&'){
			url = url.substr(0, url.length-1);
		}
			
		s = (url.indexOf("?")=="-1")?'?'+name+"="+val:"&"+name+"="+val;
		s = url+s;
		
		
	}else{
	
		s = url.replace(h[0],name+'='+val+h[2])
	}

	return s;
 }

//url参数取值

function getquerystring(name1) {
	var reg = new RegExp("(^|&)" + name1 + "=([^&]*)(&|$)"); 



	var r = window.location.search.substr(1).match(reg);


	if (r!=null) return unescape(r[2]); return null;
}

//unicode转换
//alert(toUN.on("\"请输\""));
//alert(toUN.un("\\u0022\\u8BF7\\u8F93\\u0022"));
var toUN = {
    on: function(str) {
        var a = [],
        i = 0;
        for (; i < str.length;) a[i] = ("00" + str.charCodeAt(i++).toString(16)).slice( - 4);
        return "\\u" + a.join("\\u")
    },
    un: function(str) {
        return unescape(str.replace(/\\/g, "%"))
    }
};

//取得拼音
function ajax_pinyin(str,obj){

	$.ajax({
	  type: "POST",
	  url: site_url+"?d=backend&c=common&m=ajax_pinyin",
	  data:{str:str},
	  dataType: "text",
	  success:function(msg){
		  	obj.val(msg);
	  }
	  
	});


}

//document ready
$(function($){
	if($(".mytable").length>0){
		overclass($('.mytable tr'));
	}
	displayError("[id='error_span']");
	

});

