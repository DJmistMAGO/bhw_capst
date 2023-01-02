!function(){"use strict";var e,t,n=tinymce.util.Tools.resolve("tinymce.PluginManager"),o=function(){return o=Object.assign||function(e){for(var t,n=1,o=arguments.length;n<o;n++)for(var a in t=arguments[n])Object.prototype.hasOwnProperty.call(t,a)&&(e[a]=t[a]);return e},o.apply(this,arguments)},a=function(){},i=function(e){return function(){return e}},r=function(e){return e},s=i(!1),c=i(!0),l=function(){return u},u={fold:function(e,t){return e()},isSome:s,isNone:c,getOr:t=r,getOrThunk:e=function(e){return e()},getOrDie:function(e){throw new Error(e||"error: getOrDie called on none.")},getOrNull:i(null),getOrUndefined:i(void 0),or:t,orThunk:e,map:l,each:a,bind:l,exists:s,forall:c,filter:function(){return l()},toArray:function(){return[]},toString:i("none()")},m=function(e){var t=i(e),n=function(){return a},o=function(t){return t(e)},a={fold:function(t,n){return n(e)},isSome:c,isNone:s,getOr:t,getOrThunk:t,getOrDie:t,getOrNull:t,getOrUndefined:t,or:n,orThunk:n,map:function(t){return m(t(e))},each:function(t){t(e)},bind:o,exists:o,forall:o,filter:function(t){return t(e)?a:u},toArray:function(){return[e]},toString:function(){return"some("+e+")"}};return a},h={some:m,none:l,from:function(e){return null==e?u:m(e)}},p=Array.prototype.indexOf,d=function(e,t){return n=e,o=t,p.call(n,o)>-1;var n,o},y=function(e,t){for(var n=e.length,o=new Array(n),a=0;a<n;a++){var i=e[a];o[a]=t(i,a)}return o},g=function(e,t){for(var n=[],o=0,a=e.length;o<a;o++){var i=e[o];t(i,o)&&n.push(i)}return n},f=function(e,t){return function(e,t,n){for(var o=0,a=e.length;o<a;o++){var i=e[o];if(t(i,o))return h.some(i);if(n(i,o))break}return h.none()}(e,t,s)},b=Object.keys,k=Object.hasOwnProperty,v=function(e,t){return k.call(e,t)},w=tinymce.util.Tools.resolve("tinymce.Env"),A=function(e){var t=w.mac?{alt:"&#x2325;",ctrl:"&#x2303;",shift:"&#x21E7;",meta:"&#x2318;",access:"&#x2303;&#x2325;"}:{meta:"Ctrl ",access:"Shift + Alt "},n=e.split("+"),o=y(n,(function(e){var n=e.toLowerCase().trim();return v(t,n)?t[n]:e}));return w.mac?o.join("").replace(/\s/,""):o.join("+")},x=[{shortcuts:["Meta + B"],action:"Bold"},{shortcuts:["Meta + I"],action:"Italic"},{shortcuts:["Meta + U"],action:"Underline"},{shortcuts:["Meta + A"],action:"Select all"},{shortcuts:["Meta + Y","Meta + Shift + Z"],action:"Redo"},{shortcuts:["Meta + Z"],action:"Undo"},{shortcuts:["Access + 1"],action:"Heading 1"},{shortcuts:["Access + 2"],action:"Heading 2"},{shortcuts:["Access + 3"],action:"Heading 3"},{shortcuts:["Access + 4"],action:"Heading 4"},{shortcuts:["Access + 5"],action:"Heading 5"},{shortcuts:["Access + 6"],action:"Heading 6"},{shortcuts:["Access + 7"],action:"Paragraph"},{shortcuts:["Access + 8"],action:"Div"},{shortcuts:["Access + 9"],action:"Address"},{shortcuts:["Alt + 0"],action:"Open help dialog"},{shortcuts:["Alt + F9"],action:"Focus to menubar"},{shortcuts:["Alt + F10"],action:"Focus to toolbar"},{shortcuts:["Alt + F11"],action:"Focus to element path"},{shortcuts:["Ctrl + F9"],action:"Focus to contextual toolbar"},{shortcuts:["Shift + Enter"],action:"Open popup menu for split buttons"},{shortcuts:["Meta + K"],action:"Insert link (if link plugin activated)"},{shortcuts:["Meta + S"],action:"Save (if save plugin activated)"},{shortcuts:["Meta + F"],action:"Find (if searchreplace plugin activated)"},{shortcuts:["Meta + Shift + F"],action:"Switch to or from fullscreen mode"}],T=function(){return{name:"shortcuts",title:"Handy Shortcuts",items:[{type:"table",header:["Action","Shortcut"],cells:y(x,(function(e){var t=y(e.shortcuts,A).join(" or ");return[e.action,t]}))}]}},C=tinymce.util.Tools.resolve("tinymce.util.I18n"),F=y([{key:"advlist",name:"Advanced List"},{key:"anchor",name:"Anchor"},{key:"autolink",name:"Autolink"},{key:"autoresize",name:"Autoresize"},{key:"autosave",name:"Autosave"},{key:"bbcode",name:"BBCode"},{key:"charmap",name:"Character Map"},{key:"code",name:"Code"},{key:"codesample",name:"Code Sample"},{key:"colorpicker",name:"Color Picker"},{key:"directionality",name:"Directionality"},{key:"emoticons",name:"Emoticons"},{key:"fullpage",name:"Full Page"},{key:"fullscreen",name:"Full Screen"},{key:"help",name:"Help"},{key:"hr",name:"Horizontal Rule"},{key:"image",name:"Image"},{key:"imagetools",name:"Image Tools"},{key:"importcss",name:"Import CSS"},{key:"insertdatetime",name:"Insert Date/Time"},{key:"legacyoutput",name:"Legacy Output"},{key:"link",name:"Link"},{key:"lists",name:"Lists"},{key:"media",name:"Media"},{key:"nonbreaking",name:"Nonbreaking"},{key:"noneditable",name:"Noneditable"},{key:"pagebreak",name:"Page Break"},{key:"paste",name:"Paste"},{key:"preview",name:"Preview"},{key:"print",name:"Print"},{key:"quickbars",name:"Quick Toolbars"},{key:"save",name:"Save"},{key:"searchreplace",name:"Search and Replace"},{key:"spellchecker",name:"Spell Checker"},{key:"tabfocus",name:"Tab Focus"},{key:"table",name:"Table"},{key:"template",name:"Template"},{key:"textcolor",name:"Text Color"},{key:"textpattern",name:"Text Pattern"},{key:"toc",name:"Table of Contents"},{key:"visualblocks",name:"Visual Blocks"},{key:"visualchars",name:"Visual Characters"},{key:"wordcount",name:"Word Count"},{key:"a11ychecker",name:"Accessibility Checker",type:"premium"},{key:"advcode",name:"Advanced Code Editor",type:"premium"},{key:"advtable",name:"Advanced Tables",type:"premium"},{key:"autocorrect",name:"Autocorrect",type:"premium"},{key:"casechange",name:"Case Change",type:"premium"},{key:"checklist",name:"Checklist",type:"premium"},{key:"export",name:"Export",type:"premium"},{key:"mediaembed",name:"Enhanced Media Embed",type:"premium"},{key:"formatpainter",name:"Format Painter",type:"premium"},{key:"linkchecker",name:"Link Checker",type:"premium"},{key:"mentions",name:"Mentions",type:"premium"},{key:"pageembed",name:"Page Embed",type:"premium"},{key:"permanentpen",name:"Permanent Pen",type:"premium"},{key:"powerpaste",name:"PowerPaste",type:"premium"},{key:"rtc",name:"Real-Time Collaboration",type:"premium"},{key:"tinymcespellchecker",name:"Spell Checker Pro",type:"premium"},{key:"tinycomments",name:"Tiny Comments",type:"premium",slug:"comments"},{key:"tinydrive",name:"Tiny Drive",type:"premium"}],(function(e){return o(o({},e),{type:e.type||"opensource",slug:e.slug||e.key})})),O=function(e){var t,n,o=function(e){return'<a href="'+e.url+'" target="_blank" rel="noopener">'+e.name+"</a>"},a=function(e){var t=function(e){var t=b(e.plugins),n=function(e){return e.getParam("forced_plugins")}(e);return void 0===n?t:g(t,(function(e){return!d(n,e)}))}(e),n=y(t,(function(t){return"<li>"+function(e,t){return f(F,(function(e){return e.key===t})).fold((function(){var n=e.plugins[t].getMetadata;return"function"==typeof n?o(n()):t}),(function(e){var t="premium"===e.type?e.name+"*":e.name;return o({name:t,url:"https://www.tiny.cloud/docs/plugins/"+e.type+"/"+e.slug})}))}(e,t)+"</li>"})),a=n.length,i=n.join("");return"<p><b>"+C.translate(["Plugins installed ({0}):",a])+"</b></p><ul>"+i+"</ul>"},i={type:"htmlpanel",presets:"document",html:[function(e){return null==e?"":'<div data-mce-tabstop="1" tabindex="-1">'+a(e)+"</div>"}(e),(t=g(F,(function(e){var t=e.key,n=e.type;return"autocorrect"!==t&&"premium"===n})),n=y(t,(function(e){return"<li>"+C.translate(e.name)+"</li>"})).join(""),'<div data-mce-tabstop="1" tabindex="-1"><p><b>'+C.translate("Premium plugins:")+"</b></p><ul>"+n+'<li class="tox-help__more-link" "><a href="https://www.tiny.cloud/pricing/?utm_campaign=editor_referral&utm_medium=help_dialog&utm_source=tinymce" target="_blank">'+C.translate("Learn more...")+"</a></li></ul></div>")].join("")};return{name:"plugins",title:"Plugins",items:[i]}},M=tinymce.util.Tools.resolve("tinymce.EditorManager"),P=function(e,t){var n,a,i,r,s=T(),c={name:"keyboardnav",title:"Keyboard Navigation",items:[{type:"htmlpanel",presets:"document",html:"<h1>Editor UI keyboard navigation</h1>\n\n<h2>Activating keyboard navigation</h2>\n\n<p>The sections of the outer UI of the editor - the menubar, toolbar, sidebar and footer - are all keyboard navigable. As such, there are multiple ways to activate keyboard navigation:</p>\n<ul>\n  <li>Focus the menubar: Alt + F9 (Windows) or &#x2325;F9 (MacOS)</li>\n  <li>Focus the toolbar: Alt + F10 (Windows) or &#x2325;F10 (MacOS)</li>\n  <li>Focus the footer: Alt + F11 (Windows) or &#x2325;F11 (MacOS)</li>\n</ul>\n\n<p>Focusing the menubar or toolbar will start keyboard navigation at the first item in the menubar or toolbar, which will be highlighted with a gray background. Focusing the footer will start keyboard navigation at the first item in the element path, which will be highlighted with an underline. </p>\n\n<h2>Moving between UI sections</h2>\n\n<p>When keyboard navigation is active, pressing tab will move the focus to the next major section of the UI, where applicable. These sections are:</p>\n<ul>\n  <li>the menubar</li>\n  <li>each group of the toolbar </li>\n  <li>the sidebar</li>\n  <li>the element path in the footer </li>\n  <li>the wordcount toggle button in the footer </li>\n  <li>the branding link in the footer </li>\n  <li>the editor resize handle in the footer</li>\n</ul>\n\n<p>Pressing shift + tab will move backwards through the same sections, except when moving from the footer to the toolbar. Focusing the element path then pressing shift + tab will move focus to the first toolbar group, not the last.</p>\n\n<h2>Moving within UI sections</h2>\n\n<p>Keyboard navigation within UI sections can usually be achieved using the left and right arrow keys. This includes:</p>\n<ul>\n  <li>moving between menus in the menubar</li>\n  <li>moving between buttons in a toolbar group</li>\n  <li>moving between items in the element path</li>\n</ul>\n\n<p>In all these UI sections, keyboard navigation will cycle within the section. For example, focusing the last button in a toolbar group then pressing right arrow will move focus to the first item in the same toolbar group. </p>\n\n<h1>Executing buttons</h1>\n\n<p>To execute a button, navigate the selection to the desired button and hit space or enter.</p>\n\n<h1>Opening, navigating and closing menus</h1>\n\n<p>When focusing a menubar button or a toolbar button with a menu, pressing space, enter or down arrow will open the menu. When the menu opens the first item will be selected. To move up or down the menu, press the up or down arrow key respectively. This is the same for submenus, which can also be opened and closed using the left and right arrow keys.</p>\n\n<p>To close any active menu, hit the escape key. When a menu is closed the selection will be restored to its previous selection. This also works for closing submenus.</p>\n\n<h1>Context toolbars and menus</h1>\n\n<p>To focus an open context toolbar such as the table context toolbar, press Ctrl + F9 (Windows) or &#x2303;F9 (MacOS).</p>\n\n<p>Context toolbar navigation is the same as toolbar navigation, and context menu navigation is the same as standard menu navigation.</p>\n\n<h1>Dialog navigation</h1>\n\n<p>There are two types of dialog UIs in TinyMCE: tabbed dialogs and non-tabbed dialogs.</p>\n\n<p>When a non-tabbed dialog is opened, the first interactive component in the dialog will be focused. Users can navigate between interactive components by pressing tab. This includes any footer buttons. Navigation will cycle back to the first dialog component if tab is pressed while focusing the last component in the dialog. Pressing shift + tab will navigate backwards.</p>\n\n<p>When a tabbed dialog is opened, the first button in the tab menu is focused. Pressing tab will navigate to the first interactive component in that tab, and will cycle through the tab’s components, the footer buttons, then back to the tab button. To switch to another tab, focus the tab button for the current tab, then use the arrow keys to cycle through the tab buttons.</p>"}]},l=O(e),u=(r='<a href="https://www.tiny.cloud/docs/changelog/?utm_campaign=editor_referral&utm_medium=help_dialog&utm_source=tinymce" target="_blank">TinyMCE '+(a=M.majorVersion,i=M.minorVersion,(0===a.indexOf("@")?"X.X.X":a+"."+i)+"</a>"),{name:"versions",title:"Version",items:[{type:"htmlpanel",html:"<p>"+C.translate(["You are using {0}",r])+"</p>",presets:"document"}]}),m=o(((n={})[s.name]=s,n[c.name]=c,n[l.name]=l,n[u.name]=u,n),t.get());return function(e){return h.from(e.getParam("help_tabs"))}(e).fold((function(){return function(e){var t=b(e),n=t.indexOf("versions");return-1!==n&&(t.splice(n,1),t.push("versions")),{tabs:e,names:t}}(m)}),(function(e){return function(e,t){var n={},o=y(e,(function(e){return"string"==typeof e?(v(t,e)&&(n[e]=t[e]),e):(n[e.name]=e,e.name)}));return{tabs:n,names:o}}(e,m)}))},S=function(e,t){return function(){var n=P(e,t),o=n.tabs,a=n.names,i={type:"tabpanel",tabs:function(e){for(var t=[],n=function(e){t.push(e)},o=0;o<e.length;o++)e[o].each(n);return t}(y(a,(function(e){return v(t=o,n=e)?h.from(t[n]):h.none();var t,n})))};e.windowManager.open({title:"Help",size:"medium",body:i,buttons:[{type:"cancel",name:"close",text:"Close",primary:!0}],initialData:{}})}};n.add("help",(function(e){var t,n=(t={},{get:function(){return t},set:function(e){t=e}}),o=function(e){return{addTab:function(t){var n=e.get();n[t.name]=t,e.set(n)}}}(n),a=S(e,n);return function(e,t){e.ui.registry.addButton("help",{icon:"help",tooltip:"Help",onAction:t}),e.ui.registry.addMenuItem("help",{text:"Help",icon:"help",shortcut:"Alt+0",onAction:t})}(e,a),function(e,t){e.addCommand("mceHelp",t)}(e,a),e.shortcuts.add("Alt+0","Open help dialog","mceHelp"),o}))}();