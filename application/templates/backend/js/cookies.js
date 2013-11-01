function setCookie(name, value){ 
document.cookie = name + "="+ value; 
} 
function getCookie(name){ 
var arr = document.cookie.match(new RegExp("(^| )"+name+"=([^;]*)(;|$)")); 
if(arr != null) return unescape(arr[2]); return ''; 
} 
function savecookie(){ 
var dc = {}; 

dc['a'] = {}; 
dc['a']['x'] = 'ax'; 
dc['a']['y'] = 'ay'; 
dc['a']['z'] = 'az'; 

dc['b'] = {}; 
dc['b']['x'] = 'bx'; 
dc['b']['y'] = 'by'; 
dc['b']['z'] = 'bz'; 

var cdc = json_encode(dc); 
setCookie('testcookie', cdc); 
} 
function clearcookie(){ 
setCookie('testcookie', ''); 
} 
function readcookie(){ 
var cdc = getCookie('testcookie'); 
cdc = cdc.replace(/,_/g, ','); 
cdc = cdc.replace(/{_/g, '{'); 
cdc = cdc.replace(/_}/g, '}'); 
var dc = json_decode(cdc); 
for(i in dc){ 
for(j in dc[i]){ 
document.write(i +':'+ j +':'+ dc[i][j] +'<br>'); 
} 
} 
} 
function json_decode(str_json) { 
// Decodes the JSON representation into a PHP value 
// 
// version: 906.1806 
// discuss at: http://phpjs.org/functions/json_decode 
// + original by: Public Domain (http://www.json.org/json2.js) 
// + reimplemented by: Kevin van Zonneveld (http://kevin.vanzonneveld.net) 
// + improved by: T.J. Leahy 
// * example 1: json_decode('[\n "e",\n {\n "pluribus": "unum"\n}\n]'); 
// * returns 1: ['e', {pluribus: 'unum'}] 
/* 
http://www.JSON.org/json2.js 
2008-11-19 
Public Domain. 
NO WARRANTY EXPRESSED OR IMPLIED. USE AT YOUR OWN RISK. 
See http://www.JSON.org/js.html 
*/ 
var json = this.window.JSON; 
if (typeof json === 'object' && typeof json.parse === 'function') { 
//	alert(str_json);
if(!str_json) return false;
return json.parse(str_json); 
} 
var cx = /[\u0000\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g; 
var j; 
var text = str_json; 
// Parsing happens in four stages. In the first stage, we replace certain 
// Unicode characters with escape sequences. JavaScript handles many characters 
// incorrectly, either silently deleting them, or treating them as line endings. 
cx.lastIndex = 0; 
if (cx.test(text)) { 
text = text.replace(cx, function (a) { 
return '\\u' + 
('0000' + a.charCodeAt(0).toString(16)).slice(-4); 
}); 
} 
// In the second stage, we run the text against regular expressions that look 
// for non-JSON patterns. We are especially concerned with '()' and 'new' 
// because they can cause invocation, and '=' because it can cause mutation. 
// But just to be safe, we want to reject all unexpected forms. 
// We split the second stage into 4 regexp operations in order to work around 
// crippling inefficiencies in IE's and Safari's regexp engines. First we 
// replace the JSON backslash pairs with '@' (a non-JSON character). Second, we 
// replace all simple value tokens with ']' characters. Third, we delete all 
// open brackets that follow a colon or comma or that begin the text. Finally, 
// we look to see that the remaining characters are only whitespace or ']' or 
// ',' or ':' or '{' or '}'. If that is so, then the text is safe for eval. 
if (/^[\],:{}\s]*$/. 
test(text.replace(/\\(?:["\\\/bfnrt]|u[0-9a-fA-F]{4})/g, '@'). 
replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, ']'). 
replace(/(?:^|:|,)(?:\s*\[)+/g, ''))) { 
// In the third stage we use the eval function to compile the text into a 
// JavaScript structure. The '{' operator is subject to a syntactic ambiguity 
// in JavaScript: it can begin a block or an object literal. We wrap the text 
// in parens to eliminate the ambiguity. 
if(!text) return '';
j = eval('(' + text + ')'); 
return j; 
} 
// If the text is not JSON parseable, then a SyntaxError is thrown. 
throw new SyntaxError('json_decode'); 
} 
function json_encode(mixed_val) { 
// Returns the JSON representation of a value 
// 
// version: 906.1806 
// discuss at: http://phpjs.org/functions/json_encode 
// + original by: Public Domain (http://www.json.org/json2.js) 
// + reimplemented by: Kevin van Zonneveld (http://kevin.vanzonneveld.net) 
// + improved by: T.J. Leahy 
// * example 1: json_encode(['e', {pluribus: 'unum'}]); 
// * returns 1: '[\n "e",\n {\n "pluribus": "unum"\n}\n]' 
/* 
http://www.JSON.org/json2.js 
2008-11-19 
Public Domain. 
NO WARRANTY EXPRESSED OR IMPLIED. USE AT YOUR OWN RISK. 
See http://www.JSON.org/js.html 
*/ 
var json = this.window.JSON; 
if (typeof json === 'object' && typeof json.stringify === 'function') { 
return json.stringify(mixed_val); 
} 
var value = mixed_val; 
var quote = function (string) { 
var escapable = /[\\\"\u0000-\u001f\u007f-\u009f\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g; 
var meta = { // table of character substitutions 
'\b': '\\b', 
'\t': '\\t', 
'\n': '\\n', 
'\f': '\\f', 
'\r': '\\r', 
'"' : '\\"', 
'\\': '\\\\' 
}; 
escapable.lastIndex = 0; 
return escapable.test(string) ? 
'"' + string.replace(escapable, function (a) { 
var c = meta[a]; 
return typeof c === 'string' ? c : 
'\\u' + ('0000' + a.charCodeAt(0).toString(16)).slice(-4); 
}) + '"' : 
'"' + string + '"'; 
}; 
var str = function(key, holder) { 
var gap = ''; 
var indent = ' '; 
var i = 0; // The loop counter. 
var k = ''; // The member key. 
var v = ''; // The member value. 
var length = 0; 
var mind = gap; 
var partial = []; 
var value = holder[key]; 
// If the value has a toJSON method, call it to obtain a replacement value. 
if (value && typeof value === 'object' && 
typeof value.toJSON === 'function') { 
value = value.toJSON(key); 
} 
// What happens next depends on the value's type. 
switch (typeof value) { 
case 'string': 
return quote(value); 
case 'number': 
// JSON numbers must be finite. Encode non-finite numbers as null. 
return isFinite(value) ? String(value) : 'null'; 
case 'boolean': 
case 'null': 
// If the value is a boolean or null, convert it to a string. Note: 
// typeof null does not produce 'null'. The case is included here in 
// the remote chance that this gets fixed someday. 
return String(value); 
case 'object': 
// If the type is 'object', we might be dealing with an object or an array or 
// null. 
// Due to a specification blunder in ECMAScript, typeof null is 'object', 
// so watch out for that case. 
if (!value) { 
return 'null'; 
} 
// Make an array to hold the partial results of stringifying this object value. 
gap += indent; 
partial = []; 
// Is the value an array? 
if (Object.prototype.toString.apply(value) === '[object Array]') { 
// The value is an array. Stringify every element. Use null as a placeholder 
// for non-JSON values. 
length = value.length; 
for (i = 0; i < length; i += 1) { 
partial[i] = str(i, value) || 'null'; 
} 
// Join all of the elements together, separated with commas, and wrap them in 
// brackets. 
v = partial.length === 0 ? '[]' : 
gap ? '[\n' + gap + 
partial.join(',\n' + gap) + '\n' + 
mind + ']' : 
'[' + partial.join(',') + ']'; 
gap = mind; 
return v; 
} 
// Iterate through all of the keys in the object. 
for (k in value) { 
if (Object.hasOwnProperty.call(value, k)) { 
v = str(k, value); 
if (v) { 
partial.push(quote(k) + (gap ? ': ' : ':') + v); 
} 
} 
} 
// Join all of the member texts together, separated with commas, 
// and wrap them in braces. 
v = partial.length === 0 ? '{}' : 
gap ? '{\n' + gap + partial.join(',\n' + gap) + '\n' + 
mind + '}' : '{' + partial.join(',') + '}'; 
gap = mind; 
return v; 
} 
}; 
// Make a fake root object containing our value under the key of ''. 
// Return the result of stringifying the value. 
return str('', { 
'': value 
}); 
} 



function base64_decode( data ) { 
// Decodes string using MIME base64 algorithm 
// 
// version: 905.3122 
// discuss at: http://phpjs.org/functions/base64_decode 
// + original by: Tyler Akins (http://rumkin.com) 
// + improved by: Thunder.m 
// + input by: Aman Gupta 
// + improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net) 
// + bugfixed by: Onno Marsman 
// + bugfixed by: Pellentesque Malesuada 
// + improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net) 
// + input by: Brett Zamir (http://brett-zamir.me) 
// + bugfixed by: Kevin van Zonneveld (http://kevin.vanzonneveld.net) 
// - depends on: utf8_decode 
// * example 1: base64_decode('S2V2aW4gdmFuIFpvbm5ldmVsZA=='); 
// * returns 1: 'Kevin van Zonneveld' 
// mozilla has this native 
// - but breaks in 2.0.0.12! 
//if (typeof this.window['btoa'] == 'function') { 
// return btoa(data); 
//} 
var b64 = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/="; 
var o1, o2, o3, h1, h2, h3, h4, bits, i = 0, ac = 0, dec = "", tmp_arr = []; 
if (!data) { 
return data; 
} 
data += ''; 
do { // unpack four hexets into three octets using index points in b64 
h1 = b64.indexOf(data.charAt(i++)); 
h2 = b64.indexOf(data.charAt(i++)); 
h3 = b64.indexOf(data.charAt(i++)); 
h4 = b64.indexOf(data.charAt(i++)); 
bits = h1<<18 | h2<<12 | h3<<6 | h4; 
o1 = bits>>16 & 0xff; 
o2 = bits>>8 & 0xff; 
o3 = bits & 0xff; 
if (h3 == 64) { 
tmp_arr[ac++] = String.fromCharCode(o1); 
} else if (h4 == 64) { 
tmp_arr[ac++] = String.fromCharCode(o1, o2); 
} else { 
tmp_arr[ac++] = String.fromCharCode(o1, o2, o3); 
} 
} while (i < data.length); 
dec = tmp_arr.join(''); 
dec = this.utf8_decode(dec); 
return dec; 
} 
function base64_encode( data ) { 
// Encodes string using MIME base64 algorithm 
// 
// version: 905.2617 
// discuss at: http://phpjs.org/functions/base64_encode 
// + original by: Tyler Akins (http://rumkin.com) 
// + improved by: Bayron Guevara 
// + improved by: Thunder.m 
// + improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net) 
// + bugfixed by: Pellentesque Malesuada 
// + improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net) 
// - depends on: utf8_encode 
// * example 1: base64_encode('Kevin van Zonneveld'); 
// * returns 1: 'S2V2aW4gdmFuIFpvbm5ldmVsZA==' 
// mozilla has this native 
// - but breaks in 2.0.0.12! 
//if (typeof this.window['atob'] == 'function') { 
// return atob(data); 
//} 
var b64 = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/="; 
var o1, o2, o3, h1, h2, h3, h4, bits, i = 0, ac = 0, enc="", tmp_arr = []; 
if (!data) { 
return data; 
} 
data = this.utf8_encode(data+''); 
do { // pack three octets into four hexets 
o1 = data.charCodeAt(i++); 
o2 = data.charCodeAt(i++); 
o3 = data.charCodeAt(i++); 
bits = o1<<16 | o2<<8 | o3; 
h1 = bits>>18 & 0x3f; 
h2 = bits>>12 & 0x3f; 
h3 = bits>>6 & 0x3f; 
h4 = bits & 0x3f; 
// use hexets to index into b64, and append result to encoded string 
tmp_arr[ac++] = b64.charAt(h1) + b64.charAt(h2) + b64.charAt(h3) + b64.charAt(h4); 
} while (i < data.length); 
enc = tmp_arr.join(''); 
switch( data.length % 3 ){ 
case 1: 
enc = enc.slice(0, -2) + '=='; 
break; 
case 2: 
enc = enc.slice(0, -1) + '='; 
break; 
} 
return enc; 
} 
function utf8_encode ( argString ) { 
// Encodes an ISO-8859-1 string to UTF-8 
// 
// version: 905.1217 
// discuss at: http://phpjs.org/functions/utf8_encode 
// + original by: Webtoolkit.info (http://www.webtoolkit.info/) 
// + improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net) 
// + improved by: sowberry 
// + tweaked by: Jack 
// + bugfixed by: Onno Marsman 
// + improved by: Yves Sucaet 
// + bugfixed by: Onno Marsman 
// * example 1: utf8_encode('Kevin van Zonneveld'); 
// * returns 1: 'Kevin van Zonneveld' 
var string = (argString+'').replace(/\r\n/g, "\n").replace(/\r/g, "\n"); 
var utftext = ""; 
var start, end; 
var stringl = 0; 
start = end = 0; 
stringl = string.length; 
for (var n = 0; n < stringl; n++) { 
var c1 = string.charCodeAt(n); 
var enc = null; 
if (c1 < 128) { 
end++; 
} else if((c1 > 127) && (c1 < 2048)) { 
enc = String.fromCharCode((c1 >> 6) | 192) + String.fromCharCode((c1 & 63) | 128); 
} else { 
enc = String.fromCharCode((c1 >> 12) | 224) + String.fromCharCode(((c1 >> 6) & 63) | 128) + String.fromCharCode((c1 & 63) | 128); 
} 
if (enc !== null) { 
if (end > start) { 
utftext += string.substring(start, end); 
} 
utftext += enc; 
start = end = n+1; 
} 
} 
if (end > start) { 
utftext += string.substring(start, string.length); 
} 
return utftext; 
} 
function utf8_decode ( str_data ) { 
// Converts a UTF-8 encoded string to ISO-8859-1 
// 
// version: 905.3122 
// discuss at: http://phpjs.org/functions/utf8_decode 
// + original by: Webtoolkit.info (http://www.webtoolkit.info/) 
// + input by: Aman Gupta 
// + improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net) 
// + improved by: Norman "zEh" Fuchs 
// + bugfixed by: hitwork 
// + bugfixed by: Onno Marsman 
// + input by: Brett Zamir (http://brett-zamir.me) 
// + bugfixed by: Kevin van Zonneveld (http://kevin.vanzonneveld.net) 
// * example 1: utf8_decode('Kevin van Zonneveld'); 
// * returns 1: 'Kevin van Zonneveld' 
var tmp_arr = [], i = 0, ac = 0, c1 = 0, c2 = 0, c3 = 0; 
str_data += ''; 
while ( i < str_data.length ) { 
c1 = str_data.charCodeAt(i); 
if (c1 < 128) { 
tmp_arr[ac++] = String.fromCharCode(c1); 
i++; 
} else if ((c1 > 191) && (c1 < 224)) { 
c2 = str_data.charCodeAt(i+1); 
tmp_arr[ac++] = String.fromCharCode(((c1 & 31) << 6) | (c2 & 63)); 
i += 2; 
} else { 
c2 = str_data.charCodeAt(i+1); 
c3 = str_data.charCodeAt(i+2); 
tmp_arr[ac++] = String.fromCharCode(((c1 & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63)); 
i += 3; 
} 
} 
return tmp_arr.join(''); 
} 