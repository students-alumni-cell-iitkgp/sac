// MooTools: the javascript framework.
// Load this file's selection again by visiting: http://mootools.net/more/00aebfac925b03c956ebbcad8266ef49 
// Or build this file again with packager using: packager build More/Fx.Elements More/Assets
/*
---
copyrights:
  - [MooTools](http://mootools.net)

licenses:
  - [MIT License](http://mootools.net/license.txt)
...
*/
MooTools.More={version:"1.3.2.1",build:"e586bcd2496e9b22acfde32e12f84d49ce09e59d"};Fx.Elements=new Class({Extends:Fx.CSS,initialize:function(b,a){this.elements=this.subject=$$(b);
this.parent(a);},compute:function(g,h,j){var c={};for(var d in g){var a=g[d],e=h[d],f=c[d]={};for(var b in a){f[b]=this.parent(a[b],e[b],j);}}return c;
},set:function(b){for(var c in b){if(!this.elements[c]){continue;}var a=b[c];for(var d in a){this.render(this.elements[c],d,a[d],this.options.unit);}}return this;
},start:function(c){if(!this.check(c)){return this;}var h={},j={};for(var d in c){if(!this.elements[d]){continue;}var f=c[d],a=h[d]={},g=j[d]={};for(var b in f){var e=this.prepare(this.elements[d],b,f[b]);
a[b]=e.from;g[b]=e.to;}}return this.parent(h,j);}});var Asset={javascript:function(f,c){if(!c){c={};}var a=new Element("script",{src:f,type:"text/javascript"}),g=c.document||document,b=0,d=c.onload||c.onLoad;
var e=d?function(){if(++b==1){d.call(this);}}:function(){};delete c.onload;delete c.onLoad;delete c.document;return a.addEvents({load:e,readystatechange:function(){if(["loaded","complete"].contains(this.readyState)){e.call(this);
}}}).set(c).inject(g.head);},css:function(d,a){if(!a){a={};}var b=new Element("link",{rel:"stylesheet",media:"screen",type:"text/css",href:d});var c=a.onload||a.onLoad,e=a.document||document;
delete a.onload;delete a.onLoad;delete a.document;if(c){b.addEvent("load",c);}return b.set(a).inject(e.head);},image:function(c,b){if(!b){b={};}var d=new Image(),a=document.id(d)||new Element("img");
["load","abort","error"].each(function(e){var g="on"+e,f="on"+e.capitalize(),h=b[g]||b[f]||function(){};delete b[f];delete b[g];d[g]=function(){if(!d){return;
}if(!a.parentNode){a.width=d.width;a.height=d.height;}d=d.onload=d.onabort=d.onerror=null;h.delay(1,a,a);a.fireEvent(e,a,1);};});d.src=a.src=c;if(d&&d.complete){d.onload.delay(1);
}return a.set(b);},images:function(c,b){c=Array.from(c);var d=function(){},a=0;b=Object.merge({onComplete:d,onProgress:d,onError:d,properties:{}},b);return new Elements(c.map(function(f,e){return Asset.image(f,Object.append(b.properties,{onload:function(){a++;
b.onProgress.call(this,a,e,f);if(a==c.length){b.onComplete();}},onerror:function(){a++;b.onError.call(this,a,e,f);if(a==c.length){b.onComplete();}}}));
}));}};