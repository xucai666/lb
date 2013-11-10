function f(o) {
	if( o.value && !/^\d+(\.\d+)?$/.test(o.value) ) {
		alert( "请输入数字" );
		o.value = '';
	}
}


function region(o) {
	var span = o.nextSibling;
	var sys_url = $('#sys_base_url').html();
	sys_url = jQuery.trim(sys_url);
	var url_send = site_url+"/common/region?pid="+o.value;	
	j.ajax({
		url : url_send,
		type : 'GET',
		success: function( r ) {
			span.innerHTML = r;
		}
	});
}

function OpenUpload( folder, callback ) {
	window.open( "fm.php?callback=" + callback + '&folder=' + folder, "", "top=100, left=100, width=800, height=450, scrollbar=yes, menubar=no, resizable=yes" );
}

function setThumb( img ) {
	j('#thumb').val( img );
	j('#preview').html( "<img src='/files/" + img + "' />" );
}

function del( o ) {
	if( confirm( "确认删除" ) ) {
		j.ajax({
			url : o.href,
			type : 'GET',
			cache : false,
			success : function( r ) {
				if( r == 'ok' ) {
					var p = o.parentNode.parentNode;
					p.parentNode.removeChild( p );
				} else {
					alert( r );
				}
			}
		});
	}
	return false;
}

function sort( o, name, id ) {
	if( o.value && !/^\d+$/.test( o.value ) ) {
		alert( "请输入数字" );
		o.focus();
		return false;
	}
	j.ajax({
		url : '?do=sort&id=' + id + '&field=' + name + '&value=' + o.value,
		type : 'GET',
		cache : false,
		success : function( r ) {
			if( r != 'ok' ) {
				alert( r );
			}
		}
	});
}

function isInteger( str ){
			var regu = /^[0-9]{1,}$/;
			return regu.test(str);
			}



