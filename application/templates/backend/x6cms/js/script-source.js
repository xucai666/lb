/* ����������ô��д����ʵ��������һЩ˽�з����ͱ���
   ������ô��װ���о���Щ���ײ���:
   <script type="text/javascript">
	   var menu=new menu.dd();
	   menu.init("menu","menuhover");
	   <!--
   ����������������������������������������������
   ��             Դ �� �� �� ��               ��
   �ǩ�������������������������������������������
   ��                                          ��
   ��           �ṩԴ�뷢��������             ��
   ��                                          ��
   ��        http://www.codefans.net           ��
   ��                                          ��
   ��            �������������              ��
   ����������������������������������������������
-->
   </script>
   ��Ȼ����Ҫ���˰��죬���Ƿ��ص�һ�����캯����������ֱ�Ӿ��ǹ��캯��
   ���о��������Ϊ������ļ���˽�����Ժͷ�����var t = 15, z = 50, s = 6, a;��
   ��ȫ������Ϊdd�Ĺ������ԣ��Ժ���ı�ֵ��������ֱ���޸ģ�
   dd.t,dd.z...
   ���������˽�з���sl��Ҳ������Ϊdd����Ĺ��з�������Ȼ���õ�ʱ��Ҫ�鷳��
   ��Ҫʹ��this.sl(c,f),������ֱ��ʹ����ǰ��sl(c,f),���Ǻô��ǣ����Ҫ�������࣬Ҳ��Ҫʹ����ʱ��͸��Ч��
   �Ϳ��Լ̳��ˣ�д��˽�з�������ֻ�����menu�������ˡ���лԴ�밮����www.co d efans.net�ṩ���ػ��ᡣ
   ��㣬�Ƿ�ֻ��ĳ��������ʹ�ã�Ҳ����û�б�Ҫʹ��˽�з���һ��ȡ��ؼ����������˵�ģ����menuҪ���̳У�
   ������Ҳ��Ҫ���Ƶ�͸��Ч������ô���������Ӧ��д��dd���캯���У���Ϊ���з������Ա�̳С�
   ������������ʹ�������������ô������˽�з��������˾��ã���������������ܶ�ط����õ��ϣ����������еķ����ȽϺá�
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
		this.h = []; // ��ȡ���Ӳ˵�����Ŀ
		this.c = [] // ��ȡ�Ӳ˵�
	};
	dd.prototype = {
		init: function(p, c){
			a = c;
			var that = this;
			var w = document.getElementById(p), s = w.getElementsByTagName('ul'), l = s.length/*�����˵��ĸ���*/, i = 0;
			
			for (i; i < l; i++) {
				var h = s[i].parentNode;
				this.h[i] = h;
				this.c[i] = s[i];
				
				/**
				 * �ص�������һ��JS���﷨���ɣ�ͨ���հ���ʵ�ֶ�i(�����Ĵ���)
				 * Ȼ�����Javascript��Ƚ���ֵ�һ�㣬�������ڲ��ĺ���֮������that=this,
				 * ���������������ſ��Ա��֣�����֣����Ǻ���Ч��
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
		this.h = []; // ��ȡ���Ӳ˵�����Ŀ
		this.c = [] // ��ȡ�Ӳ˵�
	};
	dd2.prototype = {
		init: function(p, c){
			a = c;
			var that = this;
			var w = document.getElementById(p), s = w.getElementsByTagName('ul'), l = s.length/*�����˵��ĸ���*/, i = 0;
			
			for (i; i < l; i++) {
				var h = s[i].parentNode;
				this.h[i] = h;
				this.c[i] = s[i];
				
				/**
				 * �ص�������һ��JS���﷨���ɣ�ͨ���հ���ʵ�ֶ�i(�����Ĵ���)
				 * Ȼ�����Javascript��Ƚ���ֵ�һ�㣬�������ڲ��ĺ���֮������that=this,
				 * ���������������ſ��Ա��֣�����֣����Ǻ���Ч��
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
