/* 这里作者这么来写，其实是想利用一些私有方法和变量
   但是这么包装，感觉有些不伦不类:
   <script type="text/javascript">
	   var menu=new menu.dd();
	   menu.init("menu","menuhover");
	   <!--
   ┏━━━━━━━━━━━━━━━━━━━━━┓
   ┃             源 码 爱 好 者               ┃
   ┣━━━━━━━━━━━━━━━━━━━━━┫
   ┃                                          ┃
   ┃           提供源码发布与下载             ┃
   ┃                                          ┃
   ┃        http://www.codefans.net           ┃
   ┃                                          ┃
   ┃            互助、分享、提高              ┃
   ┗━━━━━━━━━━━━━━━━━━━━━┛
-->
   </script>
   既然还是要搞了半天，还是返回的一个构造函数，还不如直接就是构造函数
   还有就是这里的为数不多的几个私有属性和方法（var t = 15, z = 50, s = 6, a;）
   完全可以作为dd的公有属性，以后想改变值，还可以直接修改：
   dd.t,dd.z...
   至于这里的私有方法sl，也可以作为dd对象的公有方法，当然调用的时候要麻烦点
   需要使用this.sl(c,f),而不能直接使用以前的sl(c,f),但是好处是，如果要生成子类，也需要使用累时的透明效果
   就可以继承了，写成私有方法，就只能这个menu对象用了。感谢源码爱好者www.co d efans.net提供下载机会。
   这点，是否只在某个对象中使用，也就有没有必要使用私有方法一个取舍关键，如果像我说的，这个menu要被继承，
   且子类也需要类似的透明效果，那么这个方法就应该写到dd构造函数中，作为公有方法，以便继承。
   如果除了这里才使用这个方法，那么就设置私有方法，个人觉得，这个方法在其它很多地方都用得上，还是做公有的方法比较好。
*/
var menu = function(){
	var t = 15, z = 50, s = 6, a;
	
	function sl(c, f){
		var h = c.offsetHeight;
		if ((h <= 0 && f != 1) || (h >= c.mh && f == 1)) {
			if (f == 1) {
				c.style.filter = '';
				c.style.opacity = 1;
				c.style.overflow = 'visible';
			}
			clearInterval(c.t);
			return
		}
		var d = (f == 1) ? Math.ceil((c.mh - h) / s) : Math.ceil(h / s), o = h / c.mh;
		c.style.opacity = o;
		c.style.filter = 'alpha(opacity=' + (o * 100) + ')';
		c.style.height = h + (d * f) + 'px';
	};
	
	function dd(n){
		this.h = []; // 存取有子菜单的项目
		this.c = [] // 存取子菜单
	};
	dd.prototype = {
		init: function(p, c){
			a = c;
			var that = this;
			var w = document.getElementById(p), s = w.getElementsByTagName('ul'), l = s.length/*二级菜单的个数*/, i = 0;
			
			for (i; i < l; i++) {
				var h = s[i].parentNode;
				this.h[i] = h;
				this.c[i] = s[i];
				
				/**
				 * 重点就在这里，一点JS的语法技巧，通过闭包来实现对i(索引的传递)
				 * 然后就是Javascript里比较奇怪的一点，必须在内部的函数之外声明that=this,
				 * 这样对象的作用域才可以保持，很奇怪，但是很有效。
				 */ 
				h.onmouseover = function(index){
					return function(){
						that.st(index, true);
					}
				}(i);
				h.onmouseout = function(index){
					return function(){
						that.st(index, false);
					}
				}(i);
			}
		},
		
		st: function(x, f){
			var c = this.c[x], h = this.h[x], p = h.getElementsByTagName('a')[0];
			if (c.t) {
				clearInterval(c.t);
			}
			
			c.style['overflow'] = 'hidden';
			if (f) {
				p.className += ' ' + a;
				if (!c.mh) {
					c.style.display = 'block';
					c.style.height = '';
					c.mh = c.offsetHeight;
					c.style.height = 0;
				}
				
				if (c.mh == c.offsetHeight) {
					c.style.overflow = 'visible';
				}
				else {
					c.style.zIndex = z;
					z++;
					c.t = setInterval(function(){
						sl(c, 1)
					}, t);
				}
				
			}
			else {
				p.className = p.className.replace(a, '');
				c.t = setInterval(function(){
					sl(c, -1)
				}, t);
			}
		}
	};
	
	return {
		dd: dd
	};
	
}();

var menu2 = function(){
	alert(1);
	var t = 15, z = 50, s = 6, a;
	
	function sl(c, f){
		var h = c.offsetHeight;
		if ((h <= 0 && f != 1) || (h >= c.mh && f == 1)) {
			if (f == 1) {
				c.style.filter = '';
				c.style.opacity = 1;
				c.style.overflow = 'visible';
			}
			clearInterval(c.t);
			return
		}
		var d = (f == 1) ? Math.ceil((c.mh - h) / s) : Math.ceil(h / s), o = h / c.mh;
		c.style.opacity = o;
		c.style.filter = 'alpha(opacity=' + (o * 100) + ')';
		c.style.height = h + (d * f) + 'px';
	};
	
	function dd2(n){
		this.h = []; // 存取有子菜单的项目
		this.c = [] // 存取子菜单
	};
	dd2.prototype = {
		init: function(p, c){
			a = c;
			var that = this;
			var w = document.getElementById(p), s = w.getElementsByTagName('ul'), l = s.length/*二级菜单的个数*/, i = 0;
			
			for (i; i < l; i++) {
				var h = s[i].parentNode;
				this.h[i] = h;
				this.c[i] = s[i];
				
				/**
				 * 重点就在这里，一点JS的语法技巧，通过闭包来实现对i(索引的传递)
				 * 然后就是Javascript里比较奇怪的一点，必须在内部的函数之外声明that=this,
				 * 这样对象的作用域才可以保持，很奇怪，但是很有效。
				 */ 
				h.onmouseover = function(index){
					return function(){
						that.st(index, true);
					}
				}(i);
				h.onmouseout = function(index){
					return function(){
						that.st(index, false);
					}
				}(i);
			}
		},
		
		st: function(x, f){
			var c = this.c[x], h = this.h[x], p = h.getElementsByTagName('a')[0];
			if (c.t) {
				clearInterval(c.t);
			}
			
			c.style['overflow'] = 'hidd2en';
			if (f) {
				p.className += ' ' + a;
				if (!c.mh) {
					c.style.display = 'block';
					c.style.height = '';
					c.mh = c.offsetHeight;
					c.style.height = 0;
				}
				
				if (c.mh == c.offsetHeight) {
					c.style.overflow = 'visible';
				}
				else {
					c.style.zIndex = z;
					z++;
					c.t = setInterval(function(){
						sl(c, 1)
					}, t);
				}
				
			}
			else {
				p.className = p.className.replace(a, '');
				c.t = setInterval(function(){
					sl(c, -1)
				}, t);
			}
		}
	};
	
	return {
		dd2: dd2
	};
	
}();
