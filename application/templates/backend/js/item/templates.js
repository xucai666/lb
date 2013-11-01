  // When the document loads do everything inside here ...
	  $(document).ready(function(){
		
		// When a link is clicked
		$("a.tab").click(function () {
			
			
			// switch all tabs off
			$(".active").removeClass("active");
			
			// switch this tab on
			$(this).addClass("active");
			
			// slide all content up
			$(".content").slideUp('fast');
			
			// slide this content up
			var content_show = $(this).attr("title");
			$("#"+content_show).slideDown('fast');
		  
		});

		$("pre.htmlCode").snippet("html");
		//$("pre.htmlCode").snippet("css",{style:"ide-msvcpp"});
		$("pre.htmlCode").snippet("javascript",{style:"vim-dark",transparent:false,showNum:true}); 
		
	  });