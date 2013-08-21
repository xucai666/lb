/**
 * [load_files description]
 * @type {Array}
 * call example:$('#xxx').iwin({
	w:"400",
	h:"300",
	align:'center',
	valign:'middle',
	modal:true
});
 */
var load_files  = [];
load_files.push('/jquery-ui-1.10.2.custom.min.js');


load_files.push('../css/iwin.css');

$.include(load_files);

$.fn.mmmmm_center = function() {
	return this.each(function(i) {
		var ow = $(this).outerWidth();
		var ml = ow / 2;
		$(this).css("margin-left", "-" + ml + "px");
		$(this).css("left", "50%");
		$(this).css("position", "absolute");
	});
};

$.fn.mmmmm_left = function() {
	return this.each(function(i) {
		$(this).css("left", "0");
		$(this).css("position", "absolute");
		$(this).css("margin-left", "0px");
	});
};

$.fn.mmmmm_right = function() {
	return this.each(function(i) {
		$(this).css("right", "0");
		$(this).css("margin-left", "0px");
		$(this).css("position", "absolute");
	});
};

$.fn.mmmmm_middle = function() {
	return this.each(function(i) {
		var oh = $(this).outerHeight();
		var mt = oh / 2;
		$(this).css("margin-top", "-" + mt + "px");
		$(this).css("top", "50%");
		$(this).css("position", "absolute");
	});
};

$.fn.mmmmm_top = function() {
	return this.each(function(i) {
		var oh = $(this).outerHeight();
		$(this).css("top", "0");
		$(this).css("position", "absolute");
		$(this).css("margin-top", "0px");
	});
};

$.fn.mmmmm_bottom = function() {
	return this.each(function(i) {
		var oh = $(this).outerHeight();
		$(this).css("bottom", "0");
		$(this).css("position", "absolute");
		$(this).css("margin-top", "0px");
	});
};


function isFunctionDefined(functionName) {
    if(eval("typeof(" + functionName + ") == typeof(Function)")) {
        return true;
    }
}

$.fn.extend({

	iwin: function(cfg) {
		//create window object
		
		var gid = $(this).attr("id");

		var w_id = gid+'_window';
		if($('#'+w_id).length>0){
			$('#'+w_id).find('.mmmmm_close').trigger("click");
		}	
		var reval = "<div id='mmmmm_cover' ></div>";
		reval += "<div id=\""+w_id+"\"  >";
		reval += "			<div class='mmmmm_title' ></div>";
		reval += "			<a href=\"javascript:;\"  class='mmmmm_close' >×</a>";
		reval += "			<div  class='mmmmm_content'>			";
		reval += "			";
		reval += "			</div>";
		reval += "			<iframe src=\"about:blank;\"  class='mmmmm_ifr'  frameborder=\"0\" scrolling=\"no\" marginwidth=\"0\" marginheight=\"0\"  ></iframe>";
		reval += "</div>";

		$(document.body).append(reval);
		var w_body = $('#'+w_id);
		var w_title = w_body.find(".mmmmm_title");
		var w_content = w_body.find(".mmmmm_content");
		var w_close = w_body.find(".mmmmm_close");
		var w_ifr = w_body.find(".mmmmm_ifr");
		var w_cover = $("#mmmmm_cover");

		w_body.removeAttr("style");
		w_body.css({			
			"width": cfg.w,
			"height": cfg.h,
			"position": "absolute",
			"border":"1px solid #A2C8F4",
			"padding": "1px",
			"display":"none"
		});

		eval("w_body.mmmmm_" + cfg.align + "()");
		eval("w_body.mmmmm_" + cfg.valign + "()");



		w_title.html(cfg.title);

		$(this).appendTo(w_content);
		
		w_content.css({
			"width": cfg.w - 10,
			"height": cfg.h - w_title.height() - 10
		});

		

		w_body.fadeIn("slow");
		$(this).show();

		w_body.draggable({
			handle: w_title,
			cursor: "move"
		});

		

		

		//show cover
		if(typeof(cfg.modal)!="undefined"){
			w_cover.fadeTo("slow", 0.46);
		}

		//scroll window
		var scroll_val = 0;

		var os = w_body.position();
		var _ostop = os.top;
		var _osleft = os.left;

		var m_top =  typeof(cfg.move_top)!="undefined"?cfg.move_top:0;
		var m_left = typeof(cfg.move_left)!="undefined"?cfg.move_left:0;

		w_body.css({
			"top": _ostop + m_top+'px',
			"left": _osleft + m_left+'px'
		});
		

		//dblclick
		var dbl_flag = 0;
		var static_cfg = cfg;
		var static_obj = $(this);
		w_title.dblclick(function(event) {
			if(dbl_flag==0){
				w_body.css('width',$(document.body).width()-5);
				w_body.css('height',$(document.body).height()-5);
				w_content.css('width',$(document.body).width()-15);
				w_content.css('height',$(document.body).height()-15);
				w_body.mmmmm_left();
				w_body.mmmmm_top();
				
				os = w_body.position();
				_ostop = os.top;
			    _osleft = os.left;
			     m_top =  typeof(cfg.move_top)!="undefined"?cfg.move_top:0;
				 m_left = typeof(cfg.move_left)!="undefined"?cfg.move_left:0;
				w_body.css({
					"top": _ostop + m_top+'px',
					"left": _osleft + m_left+'px'
				});
				dbl_flag = 1;

			}else{
				w_close.trigger("click");
				static_obj.iwin(static_cfg);
				dbl_flag = 0;
			}
			//call back 
			if(cfg.dbl_click_trigger!="undefind"){
					if(isFunctionDefined(cfg.dbl_click_trigger)){
						eval(cfg.dbl_click_trigger+"("+dbl_flag+")");
					}
					
			}

		});


		$(window).scroll(function(e) {
			scroll_val = document.documentElement.scrollTop + document.body.scrollTop;
			w_cover.css({
				top: scroll_val
			});
			w_body.css({
				"top": _ostop + scroll_val
			});



		});


		//close window
		w_close.click(function() {
			
			var child_node = w_content.children();
			child_node.hide();			
			child_node.appendTo($(document.body));
			w_body.remove();
			w_cover.remove();

		})
		
		//handle for keyboard event
		$('#'+w_id).attr('tabindex', 1).keydown(function(e){
			
			var code = e.keyCode ? e.keyCode : e.which;
			if (code == 27 || code == 96){
				
					w_close.trigger("click");
				
			}

		});
	
	}
});