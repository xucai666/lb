
function DvMenuCls(){
	var MenuHides = new Array();
	this.Show = function(obj,depth){
		var childNode = this.GetChildNode(obj);
		if (!childNode){return ;}
		if (typeof(MenuHides[depth])=="object"){
			this.closediv(MenuHides[depth]);
			MenuHides[depth] = '';
		};
		if (depth>0){
			if (childNode.parentNode.offsetWidth>0){
				childNode.style.left= childNode.parentNode.offsetWidth+'px';
				
			}else{
				childNode.style.left='100px';
			};
			
			childNode.style.top = '-2px';
		};
		//childNode.style.display ='block';   //跟下一句相反 如果用下一行的代码则鼠标放上去显示下拉菜单
		childNode.style.display ='none';
		MenuHides[depth]=childNode;
	
	};
	this.closediv = function(obj){
		if (typeof(obj)=="object"){
			if (obj.style.display!='none'){
			obj.style.display='none';
			}
		}
	}
	this.Hide = function(depth){
		var i=0;
		if (depth>0){
			i = depth
		};
		while(MenuHides[i]!=null && MenuHides[i]!=''){
			this.closediv(MenuHides[i]);
			MenuHides[i]='';
			i++;
		};
	
	};
	this.Clear = function(){
		for(var i=0;i<MenuHides.length;i++){
			if (MenuHides[i]!=null && MenuHides[i]!=''){
				MenuHides[i].style.display='none';
				MenuHides[i]='';
			}
		}
	}
	this.GetChildNode = function(submenu){
		for(var i=0;i<submenu.childNodes.length;i++)
		{
			if(submenu.childNodes[i].nodeName.toLowerCase()=="div")
			{
				var obj=submenu.childNodes[i];
				break;
			}
		}
		return obj;
	}

}


function getleftbar(obj){
	var leftobj,rightobj;
	var titleobj=obj.getElementsByTagName("a");
	leftobj = document.all ? frames["frmleft"] : document.getElementById("frmleft").contentWindow;
	rightobj = document.all ? frames["frmright"] : document.getElementById("frmright").contentWindow;
	if (!leftobj){return;}
	var menubar = leftobj.document.getElementById("menubar")
	if (menubar){
			if (titleobj[0]){				
				document.getElementById("leftmenu_title").innerHTML = titleobj[0].innerHTML;

			}
			var a=obj.getElementsByTagName("div");
			menubar.innerHTML = a[0].innerHTML;	
			//trigger events
			window.frames["frmleft"].trigger_menu();
			var href =  (function(){
				var i=0,a_obj;
				function b(){
					 a_obj_href = a[0].getElementsByTagName("a")[i].href;					
					 if(a_obj_href.substr(-1)=="/"){					 
					 	i++;
					 	b();					 
					 }
					 return a_obj_href;
				}
				return b();
			})();
		
			rightobj.location = href;

	}
}




 
   