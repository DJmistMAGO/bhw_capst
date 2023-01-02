!function(){"use strict";var t,e,n=tinymce.util.Tools.resolve("tinymce.PluginManager"),o=tinymce.util.Tools.resolve("tinymce.dom.DOMUtils"),r=tinymce.util.Tools.resolve("tinymce.util.I18n"),i=tinymce.util.Tools.resolve("tinymce.util.Tools"),c=function(t){return t.getParam("toc_class","mce-toc")},a=function(t){var e=t.getParam("toc_header","h2");return/^h[1-6]$/.test(e)?e:"h2"},l=(t="mcetoc_",e=0,function(){var n=(new Date).getTime().toString(32);return t+n+(e++).toString(32)}),u=function(t){var e=c(t),n=a(t),o=function(t){var e,n=[];for(e=1;e<=t;e++)n.push("h"+e);return n.join(",")}(function(t){var e=parseInt(t.getParam("toc_depth","3"),10);return e>=1&&e<=9?e:3}(t)),r=t.$(o);return r.length&&/^h[1-9]$/i.test(n)&&(r=r.filter((function(n,o){return!t.dom.hasClass(o.parentNode,e)}))),i.map(r,(function(e){var n=e.id;return{id:n||l(),level:parseInt(e.nodeName.replace(/^H/i,""),10),title:t.$.text(e),element:e}}))},d=function(t){var e,n,i,c="",l=u(t),d=function(t){for(var e=9,n=0;n<t.length;n++)if(t[n].level<e&&(e=t[n].level),1===e)return e;return e}(l)-1;if(!l.length)return"";c+=(e=a(t),n=r.translate("Table of Contents"),i="</"+e+">","<"+e+' contenteditable="true">'+o.DOM.encode(n)+i);for(var s=0;s<l.length;s++){var f=l[s];f.element.id=f.id;var m=l[s+1]&&l[s+1].level;if(d===f.level)c+="<li>";else for(var v=d;v<f.level;v++)c+="<ul><li>";if(c+='<a href="#'+f.id+'">'+f.title+"</a>",m!==f.level&&m)for(v=f.level;v>m;v--)c+=v===m+1?"</li></ul><li>":"</li></ul>";else c+="</li>",m||(c+="</ul>");d=f.level}return c},s=function(t){var e=c(t),n=t.$("."+e);!function(t,e){return!e.length||t.dom.getParents(e[0],".mce-offscreen-selection").length>0}(t,n)?f(t):t.insertContent(function(t){var e=d(t);return'<div class="'+t.dom.encode(c(t))+'" contenteditable="false">'+e+"</div>"}(t))},f=function(t){var e=c(t),n=t.$("."+e);n.length&&t.undoManager.transact((function(){n.html(d(t))}))},m=function(t){return function(e){var n=function(){return e.setDisabled(t.mode.isReadOnly()||!function(t){return u(t).length>0}(t))};return n(),t.on("LoadContent SetContent change",n),function(){return t.on("LoadContent SetContent change",n)}}},v=function(t){return function(e){return e&&t.dom.is(e,"."+c(t))&&t.getBody().contains(e)}};n.add("toc",(function(t){!function(t){t.addCommand("mceInsertToc",(function(){s(t)})),t.addCommand("mceUpdateToc",(function(){f(t)}))}(t),function(t){var e=function(){return t.execCommand("mceInsertToc")};t.ui.registry.addButton("toc",{icon:"toc",tooltip:"Table of contents",onAction:e,onSetup:m(t)}),t.ui.registry.addButton("tocupdate",{icon:"reload",tooltip:"Update",onAction:function(){return t.execCommand("mceUpdateToc")}}),t.ui.registry.addMenuItem("toc",{icon:"toc",text:"Table of contents",onAction:e,onSetup:m(t)}),t.ui.registry.addContextToolbar("toc",{items:"tocupdate",predicate:v(t),scope:"node",position:"node"})}(t),function(t){var e=t.$,n=c(t);t.on("PreProcess",(function(t){var o=e("."+n,t.node);o.length&&(o.removeAttr("contentEditable"),o.find("[contenteditable]").removeAttr("contentEditable"))})),t.on("SetContent",(function(){var t=e("."+n);t.length&&(t.attr("contentEditable",!1),t.children(":first-child").attr("contentEditable",!0))}))}(t)}))}();