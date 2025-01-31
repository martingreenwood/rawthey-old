/*!
 * Macy.js v1.1.2 - Macy is a lightweight, dependency free, masonry layout library
 * Author: Copyright (c) Big Bite Creative <@bigbitecreative> <http://bigbitecreative.com>
 * Url: http://macyjs.com/
 * License: MIT
 */
!function(n,e){"function"==typeof define&&define.amd?define([],function(){return e()}):"object"==typeof exports?module.exports=e():n.Macy=e()}(this,function(){"use strict";var n=function(e){var t,r={},o=1,i=function(e){for(t in e)Object.prototype.hasOwnProperty.call(e,t)&&("[object Object]"===Object.prototype.toString.call(e[t])?r[t]=n(r[t],e[t]):r[t]=e[t])};for(i(arguments[0]),o=1;o<arguments.length;o++){var u=arguments[o];i(u)}return r},e={};e.VERSION="1.1.2",e.settings={};var t,r,o={columns:3,margin:2,trueOrder:!0,waitForImages:!1},i={options:{}},u=function(){var n,e=document.body.clientWidth;for(var t in i.options.breakAt)if(t>e){n=i.options.breakAt[t];break}return n||(n=i.options.columns),n},a=function(n){n="undefined"!=typeof n?n:!0;var e,t=u();return n?1===t?"100%":(e=(t-1)*i.options.margin/t,"calc("+100/t+"% - "+e+"px)"):100/t},c=function(){var n=a();I(i.elements,function(e,t){t.style.width=n,t.style.position="absolute"})},f=function(n){var e,t,r=u(),o=0;return n++,1===n?0:(e=(i.options.margin-(r-1)*i.options.margin/r)*(n-1),o+=a(!1)*(n-1),t="calc("+o+"% + "+e+"px)")},s=function(n,e,t){var r,o=0;if(0===n)return 0;for(var u=0;n>u;u++)r=parseInt(h(i.elements[t[u]],"height").replace("px",""),10),o+=isNaN(r)?0:r+i.options.margin;return o},l=function(n){var e=0,t=[],r=[],o=[];I(i.elements,function(o){e++,e>n&&(e=1,t.push(r),r=[]),r.push(o)}),t.push(r);for(var u=0,a=t.length;a>u;u++)for(var c=t[u],f=0,s=c.length;s>f;f++)o[f]="undefined"==typeof o[f]?[]:o[f],o[f].push(c[f]);i.rows=o,p(!1)},v=function(n){for(var e=i.elements,t=[],r=[],o=0;n>o;o++)t[o]=[];for(var u=0;u<e.length;u++)r.push(u);for(var a=0,c=r.length;c>a;a++){var f=d(t);t[f]="undefined"==typeof t[f]?[]:t[f],t[f].push(r[a])}i.rows=t,p(!0)},p=function(n){n=n||!1;for(var e=i.elements,t=i.rows,r=0,o=t.length;o>r;r++)for(var u=n?w(t[r]):t[r],a=0,c=u.length;c>a;a++){var l,v;l=f(r),v=s(a,r,u,n),e[u[a]].style.top=v+"px",e[u[a]].style.left=l}},d=function(n){for(var e,t,r,o,u=0,a=0,c=n.length;c>a;a++){for(var f=0;f<n[a].length;f++)o=parseInt(h(i.elements[n[a][f]],"height").replace("px",""),10),u+=isNaN(o)?0:o;r=t,t=void 0===t?u:t>u?u:t,(void 0===r||r>t)&&(e=a),u=0}return e},h=function(n,e){return window.getComputedStyle(n,null).getPropertyValue(e)},g=function(){for(var n=i.rows,e=0,t=0,r=0,o=n.length;o>r;r++){for(var u=0;u<n[r].length;u++)t+=parseInt(h(i.elements[n[r][u]],"height").replace("px",""),10),t+=0!==u?i.options.margin:0;e=t>e?t:e,t=0}return e},m=function(){var n=u();return 1===n?(i.container.style.height="auto",void I(i.elements,function(n,e){e.removeAttribute("style")})):(c(),i.elements=i.container.children,i.options.trueOrder?(l(n),void y()):(v(n),void y()))},y=function(){i.container.style.height=g()+"px"},w=function(n){for(var e=n,t=e.length-1,r=0;t>r;r++)for(var o=0;t>o;o++)if(e[o]>e[o+1]){var i=e[o];e[o]=e[o+1],e[o+1]=i}return e},b=function(n){return document.querySelector(n)},x=function(n){for(var e=document.querySelectorAll(n),t=[],r=e.length-1;r>=0;r--)null!==e[r].offsetParent&&t.unshift(e[r]);return t},I=function(n,e){for(var t=0,r=n.length;r>t;t++)e(t,n[t])},O=function(n,e){n=n||!1,e=e||!1,"function"==typeof n&&n(),r>=t&&"function"==typeof e&&e()},A=function(){I(i.container.children,function(n,e){e.removeAttribute("style")}),i.container.removeAttribute("style"),window.removeEventListener("resize",m)},j=function(n,e){var o=x("img");t=o.length-1,r=0,I(o,function(o,i){return i.complete?(r++,void O(n,e)):(i.addEventListener("load",function(){r++,O(n,e)}),void i.addEventListener("error",function(){t--,O(n,e)}))})};return e.init=function(e){return e.container&&(i.container=b(e.container),i.container)?(delete e.container,i.options=n(o,e),window.addEventListener("resize",m),i.container.style.position="relative",i.elements=i.container.children,i.options.waitForImages?void j(null,function(){m()}):(m(),void j(function(){m()}))):void 0},e.recalculate=m,e.onImageLoad=j,e.remove=A,e});

// MACY JS for WORK ITEMS - HP / WORK
Macy.init({
    container: '#second',
    trueOrder: false,
    waitForImages: false,
    margin: 40,
    columns: 2,
    breakAt: {
        400: 1
    }
});

Macy.onImageLoad(function () {
	Macy.recalculate();
}, function () {
	Macy.recalculate();
});

