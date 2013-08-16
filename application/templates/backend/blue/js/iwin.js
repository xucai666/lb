var load_files  = [];
load_files.push('/jquery-ui-1.10.2.custom.min.js');
load_files.push('/jquery.mCustomScrollbar.concat.min.js');
load_files.push('/jquery.mousewheel.js');
load_files.push('../css/iwin.css');
load_files.push('../css/jquery.mCustomScrollbar.css');
load_files.push('/themes/base/jquery.ui.resizable.css');
load_files.push('/ui/minified/jquery.ui.resizable.min.js');
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
	});
};

$.fn.mmmmm_right = function() {
	return this.each(function(i) {
		$(this).css("right", "0");
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
	});
};

$.fn.mmmmm_bottom = function() {
	return this.each(function(i) {
		var oh = $(this).outerHeight();
		$(this).css("bottom", "0");
		$(this).css("position", "absolute");
	});
};



$.fn.extend({

	iwin: function(obj) {
		//create window object
		var gid = $(this).attr("id");
		var w_id = gid+'_window';
		if($('#'+w_id).length>0){
			$('#'+w_id).find('.mmmmm_close').trigger("click");
		}	
		var reval = "<div id='mmmmm_cover' ></div>";
		reval += "<div id=\""+w_id+"\"   >";
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
			"width": obj.w,
			"height": obj.h,
			"position": "absolute",
			"border":"1px solid #A2C8F4",
			"padding": "1px",
			"display":"none"
		});
		var exit_flag = 0;
		eval("w_body.mmmmm_" + obj.align + "()");
		eval("w_body.mmmmm_" + obj.valign + "()");



		w_title.html(obj.title);

		$(this).appendTo(w_content);
		
		w_content.css({
			"width": obj.w - 10,
			"height": obj.h - w_title.height() - 10
		});

		

		w_body.fadeIn("slow");
		$(this).show();

		w_body.draggable({
			handle: w_title,
			cursor: "move"
		});

		w_body.resizable({
		  resize: function( event, ui ) {
		  		
		  		w_content.css({
			"width": ui.size.width - 10,
			"height": ui.size.height - w_title.height() - 10
		});

		  }
		});

		w_content.mCustomScrollbar({
			scrollButtons: {
				enable: true
			},
			theme: "dark"

		});

		//show cover
		if(typeof(obj.modal)!="undefined"){
			w_cover.fadeTo("slow", 0.46);
		}

		//scroll window
		var scroll_val = 0;

		var os = w_body.position();
		var _ostop = os.top;
		var _osleft = os.left;

		var m_top =  typeof(obj.move_top)!="undefined"?obj.move_top:0;
		var m_left = typeof(obj.move_left)!="undefined"?obj.move_left:0;

		w_body.css({
			"top": _ostop + m_top+'px',
			"left": _osleft + m_left+'px'
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
			w_content.mCustomScrollbar("destroy");
			var child_node = w_content.children();
			child_node.hide();			
			child_node.appendTo($(document.body));
			w_body.remove();
			w_cover.remove();

		})
		w_body.hover(function(){exit_flag=1;},function(){exit_flag=0;})
		//handle for keyboard event
		$(document.body).bind("keydown", function(e) {
			var code = e.keyCode ? e.keyCode : e.which;
			if (code == 27 || code == 96){
				if(exit_flag){
					w_close.trigger("click");
				}
				
			}
		});
	}
});