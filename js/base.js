/*============================
=            LIBS            =
============================*/

/*
 * parallax.js v1.4.2 (http://pixelcog.github.io/parallax.js/)
 * @copyright 2016 PixelCog, Inc.
 * @license MIT (https://github.com/pixelcog/parallax.js/blob/master/LICENSE)
 */
!function(t,i,e,s){function o(i,e){var h=this;"object"==typeof e&&(delete e.refresh,delete e.render,t.extend(this,e)),this.$element=t(i),!this.imageSrc&&this.$element.is("img")&&(this.imageSrc=this.$element.attr("src"));var r=(this.position+"").toLowerCase().match(/\S+/g)||[];if(r.length<1&&r.push("center"),1==r.length&&r.push(r[0]),("top"==r[0]||"bottom"==r[0]||"left"==r[1]||"right"==r[1])&&(r=[r[1],r[0]]),this.positionX!=s&&(r[0]=this.positionX.toLowerCase()),this.positionY!=s&&(r[1]=this.positionY.toLowerCase()),h.positionX=r[0],h.positionY=r[1],"left"!=this.positionX&&"right"!=this.positionX&&(this.positionX=isNaN(parseInt(this.positionX))?"center":parseInt(this.positionX)),"top"!=this.positionY&&"bottom"!=this.positionY&&(this.positionY=isNaN(parseInt(this.positionY))?"center":parseInt(this.positionY)),this.position=this.positionX+(isNaN(this.positionX)?"":"px")+" "+this.positionY+(isNaN(this.positionY)?"":"px"),navigator.userAgent.match(/(iPod|iPhone|iPad)/))return this.imageSrc&&this.iosFix&&!this.$element.is("img")&&this.$element.css({backgroundImage:"url("+this.imageSrc+")",backgroundSize:"cover",backgroundPosition:this.position}),this;if(navigator.userAgent.match(/(Android)/))return this.imageSrc&&this.androidFix&&!this.$element.is("img")&&this.$element.css({backgroundImage:"url("+this.imageSrc+")",backgroundSize:"cover",backgroundPosition:this.position}),this;this.$mirror=t("<div />").prependTo("body");var a=this.$element.find(">.parallax-slider"),n=!1;0==a.length?this.$slider=t("<img />").prependTo(this.$mirror):(this.$slider=a.prependTo(this.$mirror),n=!0),this.$mirror.addClass("parallax-mirror").css({visibility:"hidden",zIndex:this.zIndex,position:"fixed",top:0,left:0,overflow:"hidden"}),this.$slider.addClass("parallax-slider").one("load",function(){h.naturalHeight&&h.naturalWidth||(h.naturalHeight=this.naturalHeight||this.height||1,h.naturalWidth=this.naturalWidth||this.width||1),h.aspectRatio=h.naturalWidth/h.naturalHeight,o.isSetup||o.setup(),o.sliders.push(h),o.isFresh=!1,o.requestRender()}),n||(this.$slider[0].src=this.imageSrc),(this.naturalHeight&&this.naturalWidth||this.$slider[0].complete||a.length>0)&&this.$slider.trigger("load")}function h(s){return this.each(function(){var h=t(this),r="object"==typeof s&&s;this==i||this==e||h.is("body")?o.configure(r):h.data("px.parallax")?"object"==typeof s&&t.extend(h.data("px.parallax"),r):(r=t.extend({},h.data(),r),h.data("px.parallax",new o(this,r))),"string"==typeof s&&("destroy"==s?o.destroy(this):o[s]())})}!function(){for(var t=0,e=["ms","moz","webkit","o"],s=0;s<e.length&&!i.requestAnimationFrame;++s)i.requestAnimationFrame=i[e[s]+"RequestAnimationFrame"],i.cancelAnimationFrame=i[e[s]+"CancelAnimationFrame"]||i[e[s]+"CancelRequestAnimationFrame"];i.requestAnimationFrame||(i.requestAnimationFrame=function(e){var s=(new Date).getTime(),o=Math.max(0,16-(s-t)),h=i.setTimeout(function(){e(s+o)},o);return t=s+o,h}),i.cancelAnimationFrame||(i.cancelAnimationFrame=function(t){clearTimeout(t)})}(),t.extend(o.prototype,{speed:.2,bleed:0,zIndex:-100,iosFix:!0,androidFix:!0,position:"center",overScrollFix:!1,refresh:function(){this.boxWidth=this.$element.outerWidth(),this.boxHeight=this.$element.outerHeight()+2*this.bleed,this.boxOffsetTop=this.$element.offset().top-this.bleed,this.boxOffsetLeft=this.$element.offset().left,this.boxOffsetBottom=this.boxOffsetTop+this.boxHeight;var t=o.winHeight,i=o.docHeight,e=Math.min(this.boxOffsetTop,i-t),s=Math.max(this.boxOffsetTop+this.boxHeight-t,0),h=this.boxHeight+(e-s)*(1-this.speed)|0,r=(this.boxOffsetTop-e)*(1-this.speed)|0;if(h*this.aspectRatio>=this.boxWidth){this.imageWidth=h*this.aspectRatio|0,this.imageHeight=h,this.offsetBaseTop=r;var a=this.imageWidth-this.boxWidth;this.offsetLeft="left"==this.positionX?0:"right"==this.positionX?-a:isNaN(this.positionX)?-a/2|0:Math.max(this.positionX,-a)}else{this.imageWidth=this.boxWidth,this.imageHeight=this.boxWidth/this.aspectRatio|0,this.offsetLeft=0;var a=this.imageHeight-h;this.offsetBaseTop="top"==this.positionY?r:"bottom"==this.positionY?r-a:isNaN(this.positionY)?r-a/2|0:r+Math.max(this.positionY,-a)}},render:function(){var t=o.scrollTop,i=o.scrollLeft,e=this.overScrollFix?o.overScroll:0,s=t+o.winHeight;this.boxOffsetBottom>t&&this.boxOffsetTop<=s?(this.visibility="visible",this.mirrorTop=this.boxOffsetTop-t,this.mirrorLeft=this.boxOffsetLeft-i,this.offsetTop=this.offsetBaseTop-this.mirrorTop*(1-this.speed)):this.visibility="hidden",this.$mirror.css({transform:"translate3d(0px, 0px, 0px)",visibility:this.visibility,top:this.mirrorTop-e,left:this.mirrorLeft,height:this.boxHeight,width:this.boxWidth}),this.$slider.css({transform:"translate3d(0px, 0px, 0px)",position:"absolute",top:this.offsetTop,left:this.offsetLeft,height:this.imageHeight,width:this.imageWidth,maxWidth:"none"})}}),t.extend(o,{scrollTop:0,scrollLeft:0,winHeight:0,winWidth:0,docHeight:1<<30,docWidth:1<<30,sliders:[],isReady:!1,isFresh:!1,isBusy:!1,setup:function(){if(!this.isReady){var s=t(e),h=t(i),r=function(){o.winHeight=h.height(),o.winWidth=h.width(),o.docHeight=s.height(),o.docWidth=s.width()},a=function(){var t=h.scrollTop(),i=o.docHeight-o.winHeight,e=o.docWidth-o.winWidth;o.scrollTop=Math.max(0,Math.min(i,t)),o.scrollLeft=Math.max(0,Math.min(e,h.scrollLeft())),o.overScroll=Math.max(t-i,Math.min(t,0))};h.on("resize.px.parallax load.px.parallax",function(){r(),o.isFresh=!1,o.requestRender()}).on("scroll.px.parallax load.px.parallax",function(){a(),o.requestRender()}),r(),a(),this.isReady=!0}},configure:function(i){"object"==typeof i&&(delete i.refresh,delete i.render,t.extend(this.prototype,i))},refresh:function(){t.each(this.sliders,function(){this.refresh()}),this.isFresh=!0},render:function(){this.isFresh||this.refresh(),t.each(this.sliders,function(){this.render()})},requestRender:function(){var t=this;this.isBusy||(this.isBusy=!0,i.requestAnimationFrame(function(){t.render(),t.isBusy=!1}))},destroy:function(e){var s,h=t(e).data("px.parallax");for(h.$mirror.remove(),s=0;s<this.sliders.length;s+=1)this.sliders[s]==h&&this.sliders.splice(s,1);t(e).data("px.parallax",!1),0===this.sliders.length&&(t(i).off("scroll.px.parallax resize.px.parallax load.px.parallax"),this.isReady=!1,o.isSetup=!1)}});var r=t.fn.parallax;t.fn.parallax=h,t.fn.parallax.Constructor=o,t.fn.parallax.noConflict=function(){return t.fn.parallax=r,this},t(e).on("ready.px.parallax.data-api",function(){t('[data-parallax="scroll"]').parallax()})}(jQuery,window,document);

/*
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
!function(){function e(){for(var e=this;-1===e.className.indexOf("nav-menu");)"li"===e.tagName.toLowerCase()&&(-1!==e.className.indexOf("focus")?e.className=e.className.replace(" focus",""):e.className+=" focus"),e=e.parentElement}var t,a,n,s,i,r,l;if(t=document.getElementById("site-navigation"),t&&(a=t.getElementsByTagName("button")[0],"undefined"!=typeof a)){if(n=t.getElementsByTagName("ul")[0],"undefined"==typeof n)return void(a.style.display="none");for(n.setAttribute("aria-expanded","false"),-1===n.className.indexOf("nav-menu")&&(n.className+=" nav-menu"),a.onclick=function(){-1!==t.className.indexOf("toggled")?(t.className=t.className.replace(" toggled",""),a.setAttribute("aria-expanded","false"),n.setAttribute("aria-expanded","false")):(t.className+=" toggled",a.setAttribute("aria-expanded","true"),n.setAttribute("aria-expanded","true"))},s=n.getElementsByTagName("a"),i=n.getElementsByTagName("ul"),r=0,l=i.length;l>r;r++)i[r].parentNode.setAttribute("aria-haspopup","true");for(r=0,l=s.length;l>r;r++)s[r].addEventListener("focus",e,!0),s[r].addEventListener("blur",e,!0);!function(e){var t,a,n=e.querySelectorAll(".menu-item-has-children > a, .page_item_has_children > a");if("ontouchstart"in window)for(t=function(e){var t=this.parentNode,a;if(t.classList.contains("focus"))t.classList.remove("focus");else{for(e.preventDefault(),a=0;a<t.parentNode.children.length;++a)t!==t.parentNode.children[a]&&t.parentNode.children[a].classList.remove("focus");t.classList.add("focus")}},a=0;a<n.length;++a)n[a].addEventListener("touchstart",t,!1)}(t)}}();

/*
 * Skip link focus fix.
 * Helps with accessibility for keyboard only users.
 */
!function(){var e=navigator.userAgent.toLowerCase().indexOf("webkit")>-1,t=navigator.userAgent.toLowerCase().indexOf("opera")>-1,n=navigator.userAgent.toLowerCase().indexOf("msie")>-1;(e||t||n)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var e=location.hash.substring(1),t;/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e),t&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus()))},!1)}();

/*!
 * Macy.js v1.1.2 - Macy is a lightweight, dependency free, masonry layout library
 * Author: Copyright (c) Big Bite Creative <@bigbitecreative> <http://bigbitecreative.com>
 * Url: http://macyjs.com/
 * License: MIT
 */
!function(n,e){"function"==typeof define&&define.amd?define([],function(){return e()}):"object"==typeof exports?module.exports=e():n.Macy=e()}(this,function(){"use strict";var n=function(e){var t,r={},o=1,i=function(e){for(t in e)Object.prototype.hasOwnProperty.call(e,t)&&("[object Object]"===Object.prototype.toString.call(e[t])?r[t]=n(r[t],e[t]):r[t]=e[t])};for(i(arguments[0]),o=1;o<arguments.length;o++){var u=arguments[o];i(u)}return r},e={};e.VERSION="1.1.2",e.settings={};var t,r,o={columns:3,margin:2,trueOrder:!0,waitForImages:!1},i={options:{}},u=function(){var n,e=document.body.clientWidth;for(var t in i.options.breakAt)if(t>e){n=i.options.breakAt[t];break}return n||(n=i.options.columns),n},a=function(n){n="undefined"!=typeof n?n:!0;var e,t=u();return n?1===t?"100%":(e=(t-1)*i.options.margin/t,"calc("+100/t+"% - "+e+"px)"):100/t},c=function(){var n=a();I(i.elements,function(e,t){t.style.width=n,t.style.position="absolute"})},f=function(n){var e,t,r=u(),o=0;return n++,1===n?0:(e=(i.options.margin-(r-1)*i.options.margin/r)*(n-1),o+=a(!1)*(n-1),t="calc("+o+"% + "+e+"px)")},s=function(n,e,t){var r,o=0;if(0===n)return 0;for(var u=0;n>u;u++)r=parseInt(h(i.elements[t[u]],"height").replace("px",""),10),o+=isNaN(r)?0:r+i.options.margin;return o},l=function(n){var e=0,t=[],r=[],o=[];I(i.elements,function(o){e++,e>n&&(e=1,t.push(r),r=[]),r.push(o)}),t.push(r);for(var u=0,a=t.length;a>u;u++)for(var c=t[u],f=0,s=c.length;s>f;f++)o[f]="undefined"==typeof o[f]?[]:o[f],o[f].push(c[f]);i.rows=o,p(!1)},v=function(n){for(var e=i.elements,t=[],r=[],o=0;n>o;o++)t[o]=[];for(var u=0;u<e.length;u++)r.push(u);for(var a=0,c=r.length;c>a;a++){var f=d(t);t[f]="undefined"==typeof t[f]?[]:t[f],t[f].push(r[a])}i.rows=t,p(!0)},p=function(n){n=n||!1;for(var e=i.elements,t=i.rows,r=0,o=t.length;o>r;r++)for(var u=n?w(t[r]):t[r],a=0,c=u.length;c>a;a++){var l,v;l=f(r),v=s(a,r,u,n),e[u[a]].style.top=v+"px",e[u[a]].style.left=l}},d=function(n){for(var e,t,r,o,u=0,a=0,c=n.length;c>a;a++){for(var f=0;f<n[a].length;f++)o=parseInt(h(i.elements[n[a][f]],"height").replace("px",""),10),u+=isNaN(o)?0:o;r=t,t=void 0===t?u:t>u?u:t,(void 0===r||r>t)&&(e=a),u=0}return e},h=function(n,e){return window.getComputedStyle(n,null).getPropertyValue(e)},g=function(){for(var n=i.rows,e=0,t=0,r=0,o=n.length;o>r;r++){for(var u=0;u<n[r].length;u++)t+=parseInt(h(i.elements[n[r][u]],"height").replace("px",""),10),t+=0!==u?i.options.margin:0;e=t>e?t:e,t=0}return e},m=function(){var n=u();return 1===n?(i.container.style.height="auto",void I(i.elements,function(n,e){e.removeAttribute("style")})):(c(),i.elements=i.container.children,i.options.trueOrder?(l(n),void y()):(v(n),void y()))},y=function(){i.container.style.height=g()+"px"},w=function(n){for(var e=n,t=e.length-1,r=0;t>r;r++)for(var o=0;t>o;o++)if(e[o]>e[o+1]){var i=e[o];e[o]=e[o+1],e[o+1]=i}return e},b=function(n){return document.querySelector(n)},x=function(n){for(var e=document.querySelectorAll(n),t=[],r=e.length-1;r>=0;r--)null!==e[r].offsetParent&&t.unshift(e[r]);return t},I=function(n,e){for(var t=0,r=n.length;r>t;t++)e(t,n[t])},O=function(n,e){n=n||!1,e=e||!1,"function"==typeof n&&n(),r>=t&&"function"==typeof e&&e()},A=function(){I(i.container.children,function(n,e){e.removeAttribute("style")}),i.container.removeAttribute("style"),window.removeEventListener("resize",m)},j=function(n,e){var o=x("img");t=o.length-1,r=0,I(o,function(o,i){return i.complete?(r++,void O(n,e)):(i.addEventListener("load",function(){r++,O(n,e)}),void i.addEventListener("error",function(){t--,O(n,e)}))})};return e.init=function(e){return e.container&&(i.container=b(e.container),i.container)?(delete e.container,i.options=n(o,e),window.addEventListener("resize",m),i.container.style.position="relative",i.elements=i.container.children,i.options.waitForImages?void j(null,function(){m()}):(m(),void j(function(){m()}))):void 0},e.recalculate=m,e.onImageLoad=j,e.remove=A,e});

/*=============================
=            CALLS            =
=============================*/

var $ = jQuery;

//scroll to div
$(function() {
    $('a[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top
                }, 1000);
                return false;
            }
        }
    });
});

// MACY JS for WORK ITEMS - HP / WORK
Macy.init({
    container: '#macy',
    trueOrder: false,
    waitForImages: false,
    margin: 0,
    columns: 2,
    breakAt: {
        400: 1
    }
});

Macy.onImageLoad(function () {
	console.log('Every time an image loads I get fired');
	Macy.recalculate();
}, function () {
	console.log('I only get called when all images are loaded');
	Macy.recalculate();
});

