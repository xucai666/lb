var menu = function(){
	var t = 15,
		z = 50,
		s = 6,
		a;	
	
	function dd(n){
		this.n = n;  
		this.h = []; // 存取有子菜单的项目
		this.c = []	 // 存取子菜单
	}
	dd.prototype = {
		init: function(p,c)
		{
				a = c;
			var w = document.getElementById(p),
				s = w.getElementsByTagName('ul'),
				l = s.length, //二级菜单的个数
				i = 0;
				
			for(i; i < l; i++)
			{
				var h = s[i].parentNode; 
				this.h[i] = h; 
				this.c[i] = s[i];	
				
				h.onmouseover = new Function(this.n+'.st('+i+',true)');
				h.onmouseout = new Function(this.n+'.st('+i+')');
			}
		},
		
		st: function(x,f)
		{
			var c = this.c[x], 
				h = this.h[x], 
				p = h.getElementsByTagName('a')[0];	
				
				clearInterval(c.t); 
				c.style['overflow'] = 'hidden';
				
			if( f )
			{
				p.className += ' '+a;
				if( !c.mh )
				{
					c.style.display='block'; 
					c.style.height=''; 
					c.mh=c.offsetHeight; 
					c.style.height=0;
				}
				
				if( c.mh == c.offsetHeight )
				{
					c.style.overflow='visible';
				}else
				{
					c.style.zIndex = z; 
					z++; 
					c.t = setInterval(function(){sl(c,1)}, t );
				}
				
			}else
			{
				p.className = p.className.replace(a,''); 
				c.t = setInterval(function(){ sl(c,-1)}, t );
			}

			
		}
	}
	
	function sl(c,f)
	{
		var h = c.offsetHeight;
		if((h <= 0 && f != 1)||(h >= c.mh && f==1))
		{
			if(f==1){
				c.style.filter=''; 
				c.style.opacity=1; 
				c.style.overflow='visible';
			}
			clearInterval(c.t); return
		}
		var d=(f==1) ? Math.ceil((c.mh-h)/s):Math.ceil(h/s), o=h/c.mh;
		c.style.opacity = o; 
		c.style.filter='alpha(opacity='+(o*100)+')';
		c.style.height = h + (d * f) + 'px';
	}
	
	return {dd:dd};
	
}();




var menu2 = function(){
	var t = 15,
		z = 50,
		s = 6,
		a;	
	
	function dd2(n){
		this.n = n;  
		this.h = []; // 存取有子菜单的项目
		this.c = []	 // 存取子菜单
	}
	dd2.prototype = {
		init: function(p,c)
		{
				a = c;
			var w = document.getElementById(p),
				s = w.getElementsByTagName('ul'),
				l = s.length, //二级菜单的个数
				i = 0;
				
			for(i; i < l; i++)
			{
				var h = s[i].parentNode; 
				this.h[i] = h; 
				this.c[i] = s[i];	
				
				h.onmouseover = new Function(this.n+'.st('+i+',true)');
				h.onmouseout = new Function(this.n+'.st('+i+')');
			}
		},
		
		st: function(x,f)
		{
			var c = this.c[x], 
				h = this.h[x], 
				p = h.getElementsByTagName('a')[0];	
				
				clearInterval(c.t); 
				c.style['overflow'] = 'hidden';
				
			if( f )
			{
				p.className += ' '+a;
				if( !c.mh )
				{
					c.style.display='block'; 
					c.style.height=''; 
					c.mh=c.offsetHeight; 
					c.style.height=0;
				}
				
				if( c.mh == c.offsetHeight )
				{
					c.style.overflow='visible';
				}else
				{
					c.style.zIndex = z; 
					z++; 
					c.t = setInterval(function(){sl(c,1)}, t );
				}
				
			}else
			{
				p.className = p.className.replace(a,''); 
				c.t = setInterval(function(){ sl(c,-1)}, t );
			}

			
		}
	}
	
	function sl(c,f)
	{
		var h = c.offsetHeight;
		if((h <= 0 && f != 1)||(h >= c.mh && f==1))
		{
			if(f==1){
				c.style.filter=''; 
				c.style.opacity=1; 
				c.style.overflow='visible';
			}
			clearInterval(c.t); return
		}
		var d=(f==1) ? Math.ceil((c.mh-h)/s):Math.ceil(h/s), o=h/c.mh;
		c.style.opacity = o; 
		c.style.filter='alpha(opacity='+(o*100)+')';
		c.style.height = h + (d * f) + 'px';
	}
	
	return {dd2:dd2};
	
}();

var menu3 = function(){
	var t = 15,
		z = 50,
		s = 6,
		a;	
	
	function dd3(n){
		this.n = n;  
		this.h = []; // 存取有子菜单的项目
		this.c = []	 // 存取子菜单
	}
	dd3.prototype = {
		init: function(p,c)
		{
				a = c;
			var w = document.getElementById(p),
				s = w.getElementsByTagName('ul'),
				l = s.length, //二级菜单的个数
				i = 0;
				
			for(i; i < l; i++)
			{
				var h = s[i].parentNode; 
				this.h[i] = h; 
				this.c[i] = s[i];	
				
				h.onmouseover = new Function(this.n+'.st('+i+',true)');
				h.onmouseout = new Function(this.n+'.st('+i+')');
			}
		},
		
		st: function(x,f)
		{
			var c = this.c[x], 
				h = this.h[x], 
				p = h.getElementsByTagName('a')[0];	
				
				clearInterval(c.t); 
				c.style['overflow'] = 'hidden';
				
			if( f )
			{
				p.className += ' '+a;
				if( !c.mh )
				{
					c.style.display='block'; 
					c.style.height=''; 
					c.mh=c.offsetHeight; 
					c.style.height=0;
				}
				
				if( c.mh == c.offsetHeight )
				{
					c.style.overflow='visible';
				}else
				{
					c.style.zIndex = z; 
					z++; 
					c.t = setInterval(function(){sl(c,1)}, t );
				}
				
			}else
			{
				p.className = p.className.replace(a,''); 
				c.t = setInterval(function(){ sl(c,-1)}, t );
			}

			
		}
	}
	
	function sl(c,f)
	{
		var h = c.offsetHeight;
		if((h <= 0 && f != 1)||(h >= c.mh && f==1))
		{
			if(f==1){
				c.style.filter=''; 
				c.style.opacity=1; 
				c.style.overflow='visible';
			}
			clearInterval(c.t); return
		}
		var d=(f==1) ? Math.ceil((c.mh-h)/s):Math.ceil(h/s), o=h/c.mh;
		c.style.opacity = o; 
		c.style.filter='alpha(opacity='+(o*100)+')';
		c.style.height = h + (d * f) + 'px';
	}
	
	return {dd3:dd3};
	
}();



var menu4 = function(){
	var t = 15,
		z = 50,
		s = 6,
		a;	
	
	function dd4(n){
		this.n = n;  
		this.h = []; // 存取有子菜单的项目
		this.c = []	 // 存取子菜单
	}
	dd4.prototype = {
		init: function(p,c)
		{
				a = c;
			var w = document.getElementById(p),
				s = w.getElementsByTagName('ul'),
				l = s.length, //二级菜单的个数
				i = 0;
				
			for(i; i < l; i++)
			{
				var h = s[i].parentNode; 
				this.h[i] = h; 
				this.c[i] = s[i];	
				
				h.onmouseover = new Function(this.n+'.st('+i+',true)');
				h.onmouseout = new Function(this.n+'.st('+i+')');
			}
		},
		
		st: function(x,f)
		{
			var c = this.c[x], 
				h = this.h[x], 
				p = h.getElementsByTagName('a')[0];	
				
				clearInterval(c.t); 
				c.style['overflow'] = 'hidden';
				
			if( f )
			{
				p.className += ' '+a;
				if( !c.mh )
				{
					c.style.display='block'; 
					c.style.height=''; 
					c.mh=c.offsetHeight; 
					c.style.height=0;
				}
				
				if( c.mh == c.offsetHeight )
				{
					c.style.overflow='visible';
				}else
				{
					c.style.zIndex = z; 
					z++; 
					c.t = setInterval(function(){sl(c,1)}, t );
				}
				
			}else
			{
				p.className = p.className.replace(a,''); 
				c.t = setInterval(function(){ sl(c,-1)}, t );
			}

			
		}
	}
	
	function sl(c,f)
	{
		var h = c.offsetHeight;
		if((h <= 0 && f != 1)||(h >= c.mh && f==1))
		{
			if(f==1){
				c.style.filter=''; 
				c.style.opacity=1; 
				c.style.overflow='visible';
			}
			clearInterval(c.t); return
		}
		var d=(f==1) ? Math.ceil((c.mh-h)/s):Math.ceil(h/s), o=h/c.mh;
		c.style.opacity = o; 
		c.style.filter='alpha(opacity='+(o*100)+')';
		c.style.height = h + (d * f) + 'px';
	}
	
	return {dd4:dd4};
	
}();

