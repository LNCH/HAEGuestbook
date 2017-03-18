/*! modernizr 3.3.1 (Custom Build) | MIT *
 * https://modernizr.com/download/?-applicationcache-contextmenu-cssanimations-fullscreen-geolocation-ie8compat-input-inputtypes-svg-touchevents-setclasses !*/
!function(e,t,n){function i(e,t){return typeof e===t}function r(){var e,t,n,r,o,s,a;for(var l in C)if(C.hasOwnProperty(l)){if(e=[],t=C[l],t.name&&(e.push(t.name.toLowerCase()),t.options&&t.options.aliases&&t.options.aliases.length))for(n=0;n<t.options.aliases.length;n++)e.push(t.options.aliases[n].toLowerCase());for(r=i(t.fn,"function")?t.fn():t.fn,o=0;o<e.length;o++)s=e[o],a=s.split("."),1===a.length?Modernizr[a[0]]=r:(!Modernizr[a[0]]||Modernizr[a[0]]instanceof Boolean||(Modernizr[a[0]]=new Boolean(Modernizr[a[0]])),Modernizr[a[0]][a[1]]=r),y.push((r?"":"no-")+a.join("-"))}}function o(e){var t=w.className,n=Modernizr._config.classPrefix||"";if(S&&(t=t.baseVal),Modernizr._config.enableJSClass){var i=new RegExp("(^|\\s)"+n+"no-js(\\s|$)");t=t.replace(i,"$1"+n+"js$2")}Modernizr._config.enableClasses&&(t+=" "+n+e.join(" "+n),S?w.className.baseVal=t:w.className=t)}function s(){return"function"!=typeof t.createElement?t.createElement(arguments[0]):S?t.createElementNS.call(t,"http://www.w3.org/2000/svg",arguments[0]):t.createElement.apply(t,arguments)}function a(e){return e.replace(/([a-z])-([a-z])/g,function(e,t,n){return t+n.toUpperCase()}).replace(/^-/,"")}function l(){var e=t.body;return e||(e=s(S?"svg":"body"),e.fake=!0),e}function u(e,n,i,r){var o,a,u,f,c="modernizr",d=s("div"),p=l();if(parseInt(i,10))for(;i--;)u=s("div"),u.id=r?r[i]:c+(i+1),d.appendChild(u);return o=s("style"),o.type="text/css",o.id="s"+c,(p.fake?p:d).appendChild(o),p.appendChild(d),o.styleSheet?o.styleSheet.cssText=e:o.appendChild(t.createTextNode(e)),d.id=c,p.fake&&(p.style.background="",p.style.overflow="hidden",f=w.style.overflow,w.style.overflow="hidden",w.appendChild(p)),a=n(d,e),p.fake?(p.parentNode.removeChild(p),w.style.overflow=f,w.offsetHeight):d.parentNode.removeChild(d),!!a}function f(e,t){return!!~(""+e).indexOf(t)}function c(e,t){return function(){return e.apply(t,arguments)}}function d(e,t,n){var r;for(var o in e)if(e[o]in t)return n===!1?e[o]:(r=t[e[o]],i(r,"function")?c(r,n||t):r);return!1}function p(e){return e.replace(/([A-Z])/g,function(e,t){return"-"+t.toLowerCase()}).replace(/^ms-/,"-ms-")}function m(t,i){var r=t.length;if("CSS"in e&&"supports"in e.CSS){for(;r--;)if(e.CSS.supports(p(t[r]),i))return!0;return!1}if("CSSSupportsRule"in e){for(var o=[];r--;)o.push("("+p(t[r])+":"+i+")");return o=o.join(" or "),u("@supports ("+o+") { #modernizr { position: absolute; } }",function(e){return"absolute"==getComputedStyle(e,null).position})}return n}function h(e,t,r,o){function l(){c&&(delete R.style,delete R.modElem)}if(o=i(o,"undefined")?!1:o,!i(r,"undefined")){var u=m(e,r);if(!i(u,"undefined"))return u}for(var c,d,p,h,v,g=["modernizr","tspan","samp"];!R.style&&g.length;)c=!0,R.modElem=s(g.shift()),R.style=R.modElem.style;for(p=e.length,d=0;p>d;d++)if(h=e[d],v=R.style[h],f(h,"-")&&(h=a(h)),R.style[h]!==n){if(o||i(r,"undefined"))return l(),"pfx"==t?h:!0;try{R.style[h]=r}catch(y){}if(R.style[h]!=v)return l(),"pfx"==t?h:!0}return l(),!1}function v(e,t,n,r,o){var s=e.charAt(0).toUpperCase()+e.slice(1),a=(e+" "+P.join(s+" ")+s).split(" ");return i(t,"string")||i(t,"undefined")?h(a,t,r,o):(a=(e+" "+A.join(s+" ")+s).split(" "),d(a,t,n))}function g(e,t,i){return v(e,n,n,t,i)}var y=[],C=[],x={_version:"3.3.1",_config:{classPrefix:"",enableClasses:!0,enableJSClass:!0,usePrefixes:!0},_q:[],on:function(e,t){var n=this;setTimeout(function(){t(n[e])},0)},addTest:function(e,t,n){C.push({name:e,fn:t,options:n})},addAsyncTest:function(e){C.push({name:null,fn:e})}},Modernizr=function(){};Modernizr.prototype=x,Modernizr=new Modernizr,Modernizr.addTest("applicationcache","applicationCache"in e),Modernizr.addTest("geolocation","geolocation"in navigator),Modernizr.addTest("ie8compat",!e.addEventListener&&!!t.documentMode&&7===t.documentMode),Modernizr.addTest("svg",!!t.createElementNS&&!!t.createElementNS("http://www.w3.org/2000/svg","svg").createSVGRect);var w=t.documentElement;Modernizr.addTest("contextmenu","contextMenu"in w&&"HTMLMenuItemElement"in e);var S="svg"===w.nodeName.toLowerCase(),_=s("input"),b="autocomplete autofocus list placeholder max min multiple pattern required step".split(" "),T={};Modernizr.input=function(t){for(var n=0,i=t.length;i>n;n++)T[t[n]]=!!(t[n]in _);return T.list&&(T.list=!(!s("datalist")||!e.HTMLDataListElement)),T}(b);var E="search tel url email datetime date month week time datetime-local number range color".split(" "),k={};Modernizr.inputtypes=function(e){for(var i,r,o,s=e.length,a="1)",l=0;s>l;l++)_.setAttribute("type",i=e[l]),o="text"!==_.type&&"style"in _,o&&(_.value=a,_.style.cssText="position:absolute;visibility:hidden;",/^range$/.test(i)&&_.style.WebkitAppearance!==n?(w.appendChild(_),r=t.defaultView,o=r.getComputedStyle&&"textfield"!==r.getComputedStyle(_,null).WebkitAppearance&&0!==_.offsetHeight,w.removeChild(_)):/^(search|tel)$/.test(i)||(o=/^(url|email)$/.test(i)?_.checkValidity&&_.checkValidity()===!1:_.value!=a)),k[e[l]]=!!o;return k}(E);var z=x._config.usePrefixes?" -webkit- -moz- -o- -ms- ".split(" "):["",""];x._prefixes=z;var N=x.testStyles=u;Modernizr.addTest("touchevents",function(){var n;if("ontouchstart"in e||e.DocumentTouch&&t instanceof DocumentTouch)n=!0;else{var i=["@media (",z.join("touch-enabled),("),"heartz",")","{#modernizr{top:9px;position:absolute}}"].join("");N(i,function(e){n=9===e.offsetTop})}return n});var L="Moz O ms Webkit",P=x._config.usePrefixes?L.split(" "):[];x._cssomPrefixes=P;var j=function(t){var i,r=z.length,o=e.CSSRule;if("undefined"==typeof o)return n;if(!t)return!1;if(t=t.replace(/^@/,""),i=t.replace(/-/g,"_").toUpperCase()+"_RULE",i in o)return"@"+t;for(var s=0;r>s;s++){var a=z[s],l=a.toUpperCase()+"_"+i;if(l in o)return"@-"+a.toLowerCase()+"-"+t}return!1};x.atRule=j;var A=x._config.usePrefixes?L.toLowerCase().split(" "):[];x._domPrefixes=A;var M={elem:s("modernizr")};Modernizr._q.push(function(){delete M.elem});var R={style:M.elem.style};Modernizr._q.unshift(function(){delete R.style}),x.testAllProps=v;var V=x.prefixed=function(e,t,n){return 0===e.indexOf("@")?j(e):(-1!=e.indexOf("-")&&(e=a(e)),t?v(e,t,n):v(e,"pfx"))};Modernizr.addTest("fullscreen",!(!V("exitFullscreen",t,!1)&&!V("cancelFullScreen",t,!1))),x.testAllProps=g,Modernizr.addTest("cssanimations",g("animationName","a",!0)),r(),o(y),delete x.addTest,delete x.addAsyncTest;for(var q=0;q<Modernizr._q.length;q++)Modernizr._q[q]();e.Modernizr=Modernizr}(window,document);