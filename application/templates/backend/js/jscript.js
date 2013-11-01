//	jscript.js

(function() {
	var jscript = function(selector, context) {
		return new jscript.fx.init(selector, context);
	},
	j = window.j = window.jscript = jscript;

	var toString = Object.prototype.toString;

	jscript.fx = jscript.prototype = {
		init : function(selector, context) {
			if( !selector ) {
				return this;
			}
			if( selector.nodeType == 1 ) {
				this.length = 1;
				this[0] = selector;
				return this;
			}
			if( typeof selector == 'string' ) {
				var tag = /^<(\w+).*?>$/;
				var match = selector.match(tag);
				if( match ) {
					return jscript(document.createElement(match[1]));
				} else {
					return jscript(context).find(selector);
				}
			} else if( typeof selector == 'function' ) {
				return this;
			}
			return jscript.makeArray(selector, this);
		},
		length : 0,
		find : function(selector) {
			var nl = [];
			if( this.length ) {
				for( var i = 0; i < this.length; ++i ) nl = nl.concat(jscript.find(selector, this[i]));
			} else {
				nl = jscript.find(selector);
			}
			return jscript(nl);
		},
		each : function(callback, args) {
			return jscript.each(this, callback, args);
		},
		map : function() {
		}
	};
	jscript.fx.init.prototype = jscript.fx;

	jscript.extend = jscript.fx.extend = function() {
		var target = arguments[0] || {}, length = arguments.length, i = 1;
		if( typeof target !== 'object' && typeof target !== 'function' ) {
			target = {};
		}
		if( length == i ) {
			target = this;
			--i;
		}
		for( ; i < length; ++i ) {
			for( var j in arguments[i] )
				target[j] = arguments[i][j];
		}
		return target;
	};

	jscript.extend({
		find : function(selector, context) {
			return q(selector, context);
		},
		each : function(object, callback, args) {
			var name, length = object.length;
			if( args ) {
				if( length === undefined ) {
					for( name in object )
						if( callback.apply(object[name], args) === false ) break;
				} else {
					for( name = 0; name < length; ++name )
						if( callback.apply(object[name], args) === false ) break;
				}
			} else {
				if( length === undefined ) {
					for( name in object )
						if( callback.call(object[name], name, object[name]) === false ) break;
				} else {
					for( name = 0; name < length; ++name )
						if( callback.call(object[name], name, object[name]) === false ) break;
				}
			}
			return object;
		},
		isArray : function(elem) {
			return toString.apply(elem) == '[object Array]';
		},
		makeArray : function(array, results) {
			var ret = results || [],
				length = ret.length, i = 0;
			if( array != null ) {
				if( array.length == null || typeof array == 'string' ) {
					Array.prototype.push.call(ret, array);
				} else {
					if( typeof array.length == 'number' ) {
						for( var l = array.length; i < l; ++i ) ret[length++] = array[i];
					} else {
						while( array[i] !== undefined ) ret[length++] = array[i];
					}
					ret.length = length;
				}
			}
			return ret;
		}
	});

	var q = (function() {
		var exprId = /(?:[\w\-_]*)#([\w\-_]+)/,
			exprClass = /(?:[\w\-_]*)\.([\w\-_]+)/,
			exprNode = /^(\w+)$/,
			exprPacket = /([\.#]?[\w\-_]+)/g,
			na = [null, null];

		function q(selector, context) {
			context = context || document;
			if( context.querySelectorAll ) {
				return m(context.querySelectorAll(selector));
			}

			if( selector.indexOf(',') > 1 ) {
				var split = selector.split(/,/g), ret = [], length = split.length;
				for( var i = 0; i < length; ++i ) {
					ret = ret.concat(q(split[i], context));
				}
				return ret;
			}

			var parts = selector.match(exprPacket),
				part = parts.pop();
				id = (part.match(exprId) || na)[1],
				cls = !id && (part.match(exprClass) || na)[1],
				node = !id && (part.match(exprNode) || na)[1],
				collection = [];

			if( id ) {
				var r = context.getElementById(id);
				return r ? [r] : [];
			}
			if( cls && !node && context.getElementsByClassName ) {
				collection = context.getElementsByClassName(cls);
			} else {
				if( cls ) {
					collection = context.getElementsByTagName('*');
					collection = fba(collection, 'className', RegExp("(^|\\s)" + cls + "(\\s|$)", 'i'));
				} else {
					collection = m(context.getElementsByTagName(node || '*'));
				}
			}
			return parts[0] && collection[0] ? fbp(collection, parts) : collection;
		}
		function fbp(collection, parts) {
			var ret = [];
			var part = parts.pop(),
				id = (part.match(exprId) || na)[1],
				cls = !id && (part.match(exprClass) || na)[1],
				node = !id && (part.match(exprNode) || na)[1],
				parent, matchs;
			node = node && node.toLowerCase();

			for( var i = 0, len = collection.length; i < len; ++i ) {
				parent = collection[i].parentNode;
				do {
					matchs = !node || node === '*' || node === parent.nodeName.toLowerCase();
					matchs = matchs && (!id || parent.id === id);
					matchs = matchs && (!cls || RegExp("(^|\\s)" + cls + "(\\s|$)", 'i').test(parent.className));
					if( matchs ) break;
				} while( parent = parent.parentNode );
				if( matchs ) ret.push(collection[i]);
			}
			return part[0] && ret[0] ? fbp(ret, parts) : ret;
		}
		function fba(c, a, regexp) {
			var r = [];
			for( var i = 0, len = c.length; i < len; ++i ) {
				if( regexp.test(c[i][a]) ) r.push(c[i]);
			}
			return r;
		}
		function m(arr) {
			try {
				return Array.prototype.slice.apply(arr);
			} catch (e) {
				var r = [];
				for( var i = 0, len = arr.length; i < len; ++i ) if( arr[i] !== undefined ) r.push(arr[i]);
				return r;
			}
		}
		return q;
	})();
})();

// jscript.event.js
jscript.fx.extend({
	bind : function(e, callback) {
		return this.each(function() {
			this['on' + e] = callback;
		});
	},
	unbind : function(e) {
		return this.each(function() {
			this['on' + e] = function() {};
		});
	},
	attach : function(e, callback, pop) {
		return this.each(function() {
			if( document.all ) {
				this.attachEvent('on' + e, callback);
			} else {
				this.addEventListener(e, callback, pop ? true : false);
			}
		});
	},
	detach : function(e, callback, pop) {
		return this.each(function() {
			if( document.all ) {
				this.detachEvent('on' + e, callback);
			} else {
				this.removeEventListener(e, callback, pop ? true : false);
			}
		});
	}
});

//	jscript.css.js
jscript.fx.extend({
	css : function(k, v) {
		if( typeof k == 'object' ) {
			for( var i in k ) this.css(i, k[i]);
			return this;
		} else {
			if( v == undefined ) {
				return this[0].currentStyle ? this[0].currentStyle[camelize(k)] : document.defaultView.getComputedStyle(this[0], null).getPropertyValue(k);
			} else {
				return this.each(function() {
					var s = camelize(k);
					if( s.toLowerCase() == 'float' ) s = document.all ? 'styleFloat' : 'cssFloat';
					if( s.toLowerCase() == 'opacity' && document.all ) {
						s = 'filter';
						v = 'alpha(opacity=' + (v * 100) + ')';
					}
					this.style[s] = v;
				});
			}
		}

		function camelize(s) {
			return s.replace(/\-(\w)/g, function(a, l) {
				return l.toUpperCase();
			});
		}
	},
	hasClass : function(c) {
		var cn = this[0].getAttribute(document.all ? 'className' : 'class');
		return RegExp("(^|\\s)" + c + "(\\s|$)", 'i').test(cn);
	},
	addClass : function(c) {
		var a = document.all ? 'className' : 'class';
		return this.each(function() {
			if( !j(this).hasClass(c) ) {
				var cn = this.getAttribute(a);
				cn = cn ? (cn + ' ' + c) : c;
				this.setAttribute(a, cn);
			}
		});
	},
	removeClass : function(c) {
		var a = document.all ? 'className' : 'class';
		return this.each(function() {
			if( !c ) {
				this.setAttribute(a, null);
			} else {
				var cn = (this.getAttribute(a) || "").split(' ');
				var nc = [];
				for( var i = 0; i < cn.length; ++i ) if( cn[i] && cn[i] != c ) nc.push(cn[i]);
				this.setAttribute(a, nc.join(' '));
			}
		});
	}
});
jscript.extend({
	addStyle : function(css) {
		if( document.createStyleSheet ) {
			var s = document.createStyleSheet('');
			s.cssText = css;
		} else {
			jscript('<style></style>').attr('type', 'text/css').html(css).appendTo(jscript('head'));
		}
		return this;
	}
});

//	jscript.ajax.js
jscript.extend({
	ajax : (function() {
		function ajax(args) {
			var xhr = create();
			xhr.open(args.type, args.url, args.async === false ? false : true);
			xhr.onreadystatechange = function() {
				if( xhr.readyState < 3 ) return;
				if( xhr.readyState == 3 ) {
					(typeof args.ready == 'function') && args.ready();
				} else if( xhr.readyState == 4 ) {
					if( xhr.status == 200 ) {
						(typeof args.success == 'function') && args.success(xhr.responseText);
					} else {
						(typeof args.error == 'function') && args.error( xhr.status );
					}
				}
			};
			if( !args.cache ) {
				xhr.setRequestHeader('If-Modified-Sence', new Date().toUTCString() );
			}
			if( args.type.toUpperCase() == 'POST' ) {
				xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
				xhr.send(args.data);
			} else {
				xhr.send();
			}
			if(args.timeout && (typeof args.timeout == 'number')) setTimeout(function() {
				xhr.onreadystatechange = function() {};
				xhr.abort();
				(typeof args.error == 'function') && args.error(504);
			}, args.timeout);
		}

		function create() {
			return window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject( "Microsoft.XMLHTTP" );
		}

		return ajax;
	})()
});
jscript.extend({
	loadScript : function(js, callback) {
		var s = document.createElement('script');
		s.setAttribute('type', 'text/javascript');
		s.setAttribute('src', js);
		document.getElementsByTagName('head')[0].appendChild(s);
		if( !-[1,] ) {
			s.onreadystatechange = function() {
				if( /complete|loaded/.test(s.readyState) ) {
					callback();
				}
			};
		} else {
			s.onload = function() {
				callback();
			};
		}
	},
	evalScript : function(s) {
		eval(s);
	}
});

//	jscript.cookie.js
jscript.extend({
	cookie : {
		set : function(k, v, e) {
			var s = k + '=' + escape(v);
			if( e ) {
				var now = new Date();
				now.setTime(now.getTime() + e);
				s += ';expires=' + now.toGMTString();
			}
			document.cookie = s;
			return this;
		},
		get : function(k) {
			var cookie = document.cookie.split('; ');
			var v = '';
			for( var i = cookie.length - 1; i >= 0; --i ) {
				var c = cookie[i].split('=');
				if( c[0] == k ) {
					v = c[i];
					break;
				}
			}
			return unescape(v);
		},
		del : function(k) {
			if( k ) {
				jscript.cookie.set(k, '', -86400);
			}
			return this;
		}
	}
});

//	attribute
jscript.fx.extend({
	attr : function(n, v) {
		if( typeof n == 'object' ) {
			for( var i in n ) this.each(function() {
				this.setAttribute(i, n[i]);
			});
			return this;
		} else {
			if( v != undefined ) {
				return this.each(function() {
					this.setAttribute(n, v);
				});
			} else {
				return this[0].getAttribute(n);
			}
		}
	},
	val : function(v) {
		if( !v ) {
			return this[0].value;
		} else {
			return this.each(function() {
				this.value = v;
			});
		}
	},
	html : function(v) {
		if( v != undefined ) {
			return this.each(function() {
				this.innerHTML = v;
			});
		} else {
			return this[0].innerHTML;
		}
	}
});

//	dom
jscript.fx.extend({
	parent : function() {
		var ps = [];
		this.each(function() {
			ps.push(this.parentNode);
		});
		return jscript(ps);
	},
	children : function() {
		var cs = [];
		this.each(function() {
			var c = this.childNodes;
			for( var i = 0; i < c.length; ++i ) if( c[i].nodeType == 1 ) cs.push(c[i]);
		});
		return jscript(cs);
	},
	siblings : function() {
		var cs = [];
		this.each(function() {
			var c = this.parentNode.childNodes;
			for( var i = 0; i < c.length; ++c ) if( c[i].nodeType == 1 && c[i] != this ) cs.push(c[i]);
		});
		return jscript(cs);
	},
	prev : function() {
		var s = [];
		this.each(function() {
			var elem = this.previousSibling;
			while( elem && elem.nodeType != 1 ) elem = elem.previousSibling;
			if( elem ) s.push(elem);
		});
		return jscript(s);
	},
	next : function() {
		var s = [];
		this.each(function() {
			var elem = this.nextSibling;
			while( elem && elem.nodeType != 1 ) elem = elem.nextSibling;
			if( elem ) s.push(elem);
		});
		return jscript(s);
	},
	append : function(elem) {
		return this.each(function() {
			var self = this;
			j(elem).each(function() {
				self.appendChild(this);
			});
		});
	},
	prepend : function(elem) {
		return this.each(function() {
			var self = this;
			j(elem).each(function() {
				self.insertBefore(this, self.firstChild);
			});
		});
	},
	empty : function() {
		return this.each(function() {
			try {
				this.innerHTML = '';
			} catch(e) {
				while(this.firstChild) this.removeChild(this.firstChild);
			}
		});
	},
	remove : function() {
		return this.each(function() {
			this.parentNode.removeChild(this);
		});
	},
	first : function() {
		var cs = [];
		this.each(function() {
			var c = this.firstChild;
			if( c.nodeType != 1 ) {
				c = jscript(c).next();
				if( c.length ) c = c[0];
			}
			c && cs.push(c);
		});
		return jscript(cs);
	},
	last : function() {
		var cs = [];
		this.each(function() {
			var c = this.lastChild;
			if( c.nodeType != 1 ) {
				c = jscript(c).prev();
				if( c.length ) c = c[0];
			}
			c && cs.push(c);
		});
		return jscript(cs);
	},
	after : function() {
	},
	before : function(elems) {
		var target = jscript(elems)[0];
		return this.each(function() {
			target.parentNode.insertBefore(this, target);
		});
	},
	appendTo : function(elem) {
		j(elem).append(this);
		return this;
	},
	prependTo : function(elem) {
		j(elem).prepend(this);
		return this;
	}
});

//	extra
jscript.extend({
	getpos : function(elem) {
		var p = {left:0, top:0};
		do {
			p.left += elem.offsetLeft;
			p.top += elem.offsetTop;
			elem = elem.offsetParent;
		} while( elem );
		return p;
	},
	mouse : function(e) {
		e = window.event || e;
		if( e.pageX ) {
			return {left:e.pageX, top:e.pageY};
		} else {
			var body = document.body || document.documentElement;
			return {left:body.scrollLeft + e.clientX, top:body.scrollTop + e.clientY};
		}
	}
});
if( !String.prototype.trim ) {
	String.prototype.trim = function() {
		return this.replace(/^\s+|\s+$/g, '');
	};
}