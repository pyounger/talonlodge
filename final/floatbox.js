/********************************************************************************
* Floatbox v4.20
* September 27, 2010
*
* Copyright (c) 2008-2010 Byron McGregor
* Website: http://randomous.com/floatbox
* This software and all associated files are protected by copyright.
* Redistribution and modification of the executable portions is prohibited.
* Use on any commercial site requires registration and purchase of a license key.
* See http://randomous.com/floatbox/license for details.
* This comment block must be retained in all deployments.
*********************************************************************************/

Floatbox.prototype.customPaths = {
	installBase: '',
	modules: '',
	languages: '',
	graphics: ''
};
function Floatbox(){var a=this;a.proto=Floatbox.prototype;a.extend=function(){var d=arguments,h=d[0]||{},g,c,f;if(d[2]===true){h=d.callee({},h)}for(var e=1,b=d.length;e<b;e++){if(typeof(g=d[e])==="object"){for(c in g){if(g.hasOwnProperty(c)&&(f=g[c])!==a.undefined){h[c]=f}}}}return h};a.CH=[];a.HI=function(c){var b;while((b=a.CH.shift())){b()}}}self.fb=new Floatbox;fb.extend(fb.proto,{PA:"absolute",PB:"activateElements",PC:"addEvent",PD:"addEventListener",PE:"afterItemEnd",PF:"appendChild",PG:"array",PH:"auto",PI:"autoFitHTML",PJ:"autoFitSpace",PK:"autoStart",PL:"backgroundColor",PM:"backgroundImage",PN:"backgroundPosition",PO:"beforeItemEnd",PP:"beforeItemStart",PQ:"boolean",PR:"borderWidth",PS:"caption",PT:"caption2Left",PU:"className",PV:"clientHeight",PW:"clientWidth",PX:"colorTheme",PY:"compareDocumentPosition",PZ:"controlsCorner",QA:"controlsLeft",QB:"controlsPos",QC:"Corner",QD:"cornerRadius",QE:"createElement",QF:"currentIndex",QG:"currentItem",QH:"customPaths",QI:"defaultView",QJ:"disableScroll",QK:"display",QL:"document",QM:"documentElement",QN:"draggerLocation",QO:"enableDragMove",QP:"enableDragResize",QQ:"enableKeyboardNav",QR:"enableQueryStringOptions",QS:"encodeHTML",QT:"executeJS",QU:"fbBoxLiner",QV:"fbCaliper",QW:"fbCaption",QX:"fbCaption2",QY:"fbContent",QZ:"fbContentWrapper",RA:"fbControls",RB:"fbCornerBottom",RC:"fbCornerRight",RD:"fbCorners2",RE:"fbCornerTop",RF:"fbDragger",RG:"fbIframeHider",RH:"fbIndexLinks",RI:"fbInfoLink",RJ:"fbItemNumber",RK:"fbLeftNav",RL:"fbLoaderGif",RM:"fbNavControls",RN:"fbNewWindowLink",RO:"fbOverlay",RP:"fbOverlayNext",RQ:"fbOverlayPrev",RR:"fbPrintLink",RS:"fbResizer",RT:"fbRightNav",RU:"fbShadows",RV:"fbSubControls",RW:"fbZoomDiv",RX:"fbZoomImg",RY:"firstChild",RZ:"fixed",SA:"frame",SB:"function",SC:"getAttribute",SD:"getElementById",SE:"getElementsByClassName",SF:"getElementsByTagName",SG:"getIframeDocument",SH:"getIframeWindow",SI:"getLayout",SJ:"getOuterHTML",SK:"getScroll",SL:"getStyle",SM:"getViewport",SN:"getViewportHeight",SO:"getViewportWidth",SP:"globalOptions",SQ:"hidden",SR:"iframe",SS:"image",ST:"imageFadeDuration",SU:"indexLinksCorner",SV:"indexOf",SW:"infoLinkCorner",SX:"inline",SY:"innerBorder",SZ:"innerHTML",TA:"instances",TB:"itemNumberCorner",TC:"lastChild",TD:"loadPageOnClose",TE:"maxIndexThumbSize",TF:"media",TG:"mousemove",TH:"mouseout",TI:"mouseover",TJ:"mouseup",TK:"moveWithMouse",TL:"newWindowLinkCorner",TM:"nodeContains",TN:"nodeType",TO:"nofloatbox",TP:"none",TQ:"numIndexLinks",TR:"object",TS:"offsetHeight",TT:"offsetLeft",TU:"offsetTop",TV:"offsetWidth",TW:"onclick",TX:"onmousemove",TY:"onmouseout",TZ:"onmouseover",UA:"onreadystatechange",UB:"outerBorder",UC:"outsideClickCloses",UD:"overlayFadeDuration",UE:"overlayOpacity",UF:"ownerDocument",UG:"paddingBottom",UH:"paddingLeft",UI:"paddingRight",UJ:"Panel",UK:"parentNode",UL:"parentWindow",UM:"position",UN:"printLinkCorner",UO:"proportional",UP:"proportionalResize",UQ:"Radius",UR:"removeAttribute",US:"removeChild",UT:"removeEvent",UU:"replace",UV:"resizeDuration",UW:"resizeTool",UX:"roundCorners",UY:"setAttribute",UZ:"setInnerHTML",VA:"setRequestHeader",VB:"shadowSize",VC:"shadowType",VD:"showContent",VE:"showHints",VF:"showItemNumber",VG:"showNavOverlay",VH:"showNewWindowIcon",VI:"showPlayPause",VJ:"silverlight",VK:"slideshow",VL:"splitResize",VM:"stopEvent",VN:"string",VO:"strings",VP:"substring",VQ:"toLowerCase",VR:"touchstart",VS:"visibility",VT:"visible",VU:"WidgetDiv"});(function(){var a=true,b=false,c=null;fb.extend(fb.proto,{version:"4.20",build:"2010/10/28",CD:{roundCorners:"all",cornerRadius:12,shadowType:"drop",shadowSize:12,outerBorder:1,innerBorder:1,padding:24,panelPadding:8,modal:a,titleAsCaption:a,autoFitImages:a,autoFitHTML:a,autoFitMedia:a,autoFitSpace:5,resizeImages:a,resizeTool:"cursor",captionPos:"bl",caption2Pos:"tc",infoLinkPos:"bl",printLinkPos:"bl",newWindowLinkPos:"tr",itemNumberPos:"bl",indexLinksPos:"br",controlsPos:"br",controlsType:fb.PH,centerNav:b,boxLeft:fb.PH,boxTop:fb.PH,preloadAll:a,showIE6EndOfLife:b,enableDragMove:a,stickyDragMove:a,enableDragResize:b,stickyDragResize:a,draggerLocation:fb.SA,showItemNumber:a,showClose:a,showNewWindowIcon:a,closeOnNewWindow:b,cacheAjaxContent:b,centerOnResize:a,disableScroll:b,randomOrder:b,overlayOpacity:55,colorTheme:fb.PH,strongControls:b,language:fb.PH,floatboxClass:"floatbox",cycleClass:"fbCycler",tooltipClass:"fbTooltip",hideObjects:a,hideJava:a,startAtClick:a,zoomImages:a,liveImageResize:a,splitResize:"no",doAnimations:a,resizeDuration:3.5,imageFadeDuration:3,overlayFadeDuration:4,cycleInterval:5,cycleFadeDuration:4.5,cyclePauseOnHover:b,navType:"both",navOverlayWidth:35,navOverlayPos:30,showNavOverlay:"never",showHints:"once",enableWrap:a,enableKeyboardNav:a,outsideClickCloses:a,imageClickCloses:b,numIndexLinks:0,showIndexThumbs:a,pipIndexThumbs:a,maxIndexThumbSize:0,slideInterval:4.5,endTask:"exit",showPlayPause:a,startPaused:b,pauseOnPrev:a,pauseOnNext:b,pauseOnResize:a,ie9betaSafe:a,licenseKey:""},HS:20,ET:16,BP:60,LH:1,BQ:8,GJ:140,GI:100,JS:750,GA:120,GK:70,IP:15,CT:45,GU:45,FW:Math.ceil,FX:Math.floor,FY:Math.log,O:Math.max,P:Math.min,FZ:Math.random,Q:Math.round,ES:Infinity,KG:String.fromCharCode,DL:function(d){return parseInt(d,10)},DI:function(d){return parseFloat(d)},I:function(d,e){return setTimeout(d,e)},KW:function(d){return !!(d&&d.D&&d.KH!=="direct"&&d.KH!==fb.SX)},HF:function(){return(new Date).getTime()},CU:"afterFBLoaded",LD:"winload",AO:(location.protocol+"//"+location.host)[fb.VQ](),AV:(navigator.language||navigator.userLanguage||navigator.systemLanguage||navigator.AV||"en")[fb.VP](0,2),instances:[],children:[],anchors:[],G:[],X:[],HY:[],HZ:[],AD:[],GM:{},IB:{},CR:{},L:{},HR:{},CS:{},JY:function(){var d="self",f=(self.fbPageOptions&&fbPageOptions.framed)||/framed/.test(fb.FJ);if(!(f||self===parent)){try{if(!fb.FF(parent.location.href)){d="parent"}}catch(g){}if(d==="parent"&&!(parent.fb&&parent.fb.EV)){return fb.I(fb.JY,50)}}if(document.compatMode==="BackCompat"){alert("Floatbox does not support quirks mode.\nPage needs to have a valid doctype declaration.");return}if(d==="self"){fb.EU()}else{self.fb=parent.fb}(function(){if(!fb.EV){return fb.I(arguments.callee,50)}fb.AD.push(self);var e=self[fb.QL],h=e.body;document.fbAnchorCount=h[fb.SF]("a").length;if(fb.EO){fb.proto.BH=fb.DV(fb.DE())}fb[fb.PB](h);fb[fb.PC](fb.ie?h:e,"mousedown",function(i){try{fb.BJ=i.clientX;fb.BK=i.clientY;fb.BI=i.target;fb.I(function(){try{fb.BJ=fb.BK=fb.BI=c}catch(j){}},250)}catch(i){}});if(d==="self"){fb.K(c,fb.CU)}if(fb[fb.PK]){fb.I(function(){if(!fb.AN){fb.AN=a;fb.start(fb[fb.PK])}},100)}if(fb.EM===a){fb.DM("ie6")}})()},EU:function(){var l=this,h=fb.proto;function j(n){return n+(n[fb.VP](n.length-1)==="/"?"":"/")}if(!l.EZ){h.EZ=j(l[fb.QH].installBase||l.DP("script","src",/(.*)floatbox.js(?:\?|$)/i)||l.DP("link","href",/(.*)floatbox.css(?:\?|$)/i)||"/floatbox/")}if(!l[fb.SP]){l.DM("options",l.EZ);l.I(function(){l.EU()},25);return}l[fb.TA].push(l);l.M=l.JU=l[fb.TA].length-1;l.F=[];l.HD=[];l.EC=[];l.KM={};l.T={};l.BV={};l.FB=fb.EV;if(!l.FB){l.parent=l.fbParent=l.topBox=l[fb.TC]=l;l.DO();if(!l.licenseKey){l.DM("licenseKey",l.EZ)}var f={},k=navigator.userAgent,d=navigator.appVersion,i;function e(o,n){return l.DI(o.split(n)[1])}f.FU=d[fb.SV]("Macintosh")>-1;if(l.EP){f.ie=a;f.ie9=l.EP===9;f.EO=l.EP<9;f.EN=l.EP<8;f.EM=l.EP<7;f.EQ=(i=e(d,"Windows NT "))&&i<6;f.EK=d[fb.SV](" x64;")>0}else{if(window.opera){f.opera=a;f.HL=l.DI(d)<9.5;f.HK=e(k,"Version/")>=10.5}else{if(k[fb.SV]("AppleWebKit")>=0){f.LA=a;f.LB=f.FU;f.mobile=k[fb.SV]("Mobile")>=0}else{if((i=e(k,"Firefox/"))){f.ff=a;f.CY=i<3;f.CX=!f.CY;f.CW=f.FU}else{if((i=e(k,"SeaMonkey/"))){f.seaMonkey=a;f.JB=i<2}}}}}if(/Kindle|nook brow/.test(k)){f.IH=a}l.extend(h,f,{HG:{},Z:self,H:document,CF:document[fb.QM],CG:document[fb.SF]("head")[0],C:document.body,GL:j(l[fb.QH].modules||l.EZ+"modules/"),FM:j(l[fb.QH].languages||l.EZ+"languages/"),DR:j(l[fb.QH].graphics||l.EZ+"graphics/"),rtl:l[fb.SL](document.body,"direction")==="rtl"});l.DM("core")}else{l.parent=l.fbParent=fb[fb.TC];fb.topBox=fb[fb.TC]=l;fb.children.push(l)}var m=l.DR;l.IQ=m+"magnify_plus.cur";l.IM=m+"magnify_minus.cur";l.HE=m+"404.jpg";l.AQ=m+"blank.gif";var g=/\bautoStart=(.+?)(?:&|$)/i.exec(location.search);l.AM=g?g[1]:c;l.EV=a;return l},DP:function(e,d,j){var h=document[fb.SF](e),g=h.length,f;while(g--){if((f=j.exec(h[g][d]))){return f[1]||"./"}}return""},DO:function(){var e=this,d;function f(i){var h={},g;for(g in i){if(i.hasOwnProperty(g)){h[g==="img"?fb.SS:g]=e.HU(i[g])}}return h}e.L.L=e[fb.SP].globalOptions||{};e.L.BC=e[fb.SP].childOptions||{};e.L.KT=f(e[fb.SP].typeOptions);e.L.BE=f(e[fb.SP].classOptions);e.HR.L=self.fbPageOptions||{};e.HR.BC=self.fbChildOptions||{};e.HR.KT=f(self.fbTypeOptions);e.HR.BE=f(self.fbClassOptions);if((e.L.L.enableCookies||e.HR.L.enableCookies)&&(d=/fbOptions=(.+?)(;|$)/.exec(document.cookie))){e.extend(e.CS,e.HU(d[1]))}if(e.L.L[fb.QR]||e.HR.L[fb.QR]||(location.search&&/enableQueryStringOptions=true/i.test(location.search))){e.extend(e.CS,e.HU(location.search[fb.VP](1)))}e.JG(e.CD);e.JG(e.L.L);e.JG(e.HR.L);e.JG(e.CS)},JF:function(d,j){var f=this,h={},g=f.L,i=f.HR,e=((d.AH||"")+" "+(d.FH.BD||""))[fb.UU](/\s+/g," ")[fb.UU](/^\s+|\s+$/g,"").split(" ");function k(n){var l={},m=e.length;while(m--){f.extend(l,n.BE[e[m]])}return l}f.extend(h,f.CD,g.L);if(j){f.extend(h,g.BC)}f.extend(h,g.KT[d.type]);if(d.KH){f.extend(h,g.KT[d.KH])}f.extend(h,k(g),i.L);if(j){f.extend(h,i.BC)}f.extend(h,i.KT[d.type]);if(d.KH){f.extend(h,i.KT[d.KH])}f.extend(h,k(i),f.CS,d.FH);if(!d.HN){d.HN=h}return(d.W=h)},tagAnchors:function(d){this[fb.PB](d)},activateElements:function(g){var o=this;if(!o.EV){return o.I(function(){o[fb.PB](g)},50)}if(!(g=fb$(g))){if(o.CC){o.CC(-1)}for(var k=0;k<o.AD.length;k++){try{if(o.AD[k]&&o.AD[k][fb.QL]){o[fb.PB](o.AD[k][fb.QL])}}catch(l){}}return}function h(p){var r=g[fb.SF](p);for(var q=0,e=r.length;q<e;q++){o.HT(r[q],c,b,m)}}function d(u,p){var t=o.HU(u[fb.SC]("data-fb-options")||u[fb.SC]("rev")||""),r=u[fb.SF](p),s=r.length;if(!t.autoTypes){t.autoTypes="image|media|html"}t.BD=u[fb.PU];while(s--){var e=r[s];if(!/\bnofloatbox\b/i.test(e[fb.PU]+" "+e[fb.SC]("rel"))){var v=o.HU(e[fb.SC]("data-fb-options")||e[fb.SC]("rev")||""),q=o.extend({},t,v);e[fb.UY]("data-fb-options",o.FV(q))}}}var m=o.ownerInstance(g),j=o[fb.SE](o.floatboxClass,g[fb.UF]||g),k=j.length;while(k--){var f=j[k];if(!/^a(rea)?$/.test(o.J(f))){d(f,"a");d(f,"area")}}h("a");h("area");var n=g[fb.UF]||g;if(o.HZ.length){o.DM("popup");o.HW(n)}var j=o[fb.SE](o.cycleClass,g);if(j.length){o.DM("cycler");o.BX(j,m)}var j=o[fb.SE](o.tooltipClass,g);if(j.length){o.DM("tooltip");o.KO(j,n,m)}},HT:function(d,g,l,n){var p=this,o={},m;o.FH=g||{};d=d||o.FH.source||o.FH.html||o.FH.href;if(!d&&o.FH.showThis!==b){return}o.source=o.D=d;var k=p.anchors.length;while(k--){if(p.anchors[k].source===d){return l?p.anchors[k]:p.undefined}}o.KI=l;if(l){o.M=fb[fb.TC].M}else{o.M=isNaN(n)?p.ownerInstance(o.AE):n}if(p.typeOf(d)==="node"){if(/^a(rea)?$/.test(p.J(d))){var j=p.HU(d[fb.SC]("data-fb-options")||d[fb.SC]("rev"));o.FH=p.extend(j,o.FH);o.href=decodeURI(d.href||"");o.AI=d[fb.SC]("rel")||"";o.AJ=d[fb.SC]("title")||"";o.AH=d[fb.PU]||"";o.HQ=d[fb.UF];o.AE=d;o.KL=d[fb.SF]("img")[0]||c;if((m=(new RegExp("\\b"+p.floatboxClass+"(\\S*)","i")).exec(o.AH))){o.KI=a;if(m[1]){o.group=m[1]}}else{if(p.HR.L.autoGallery&&!/\bnofloatbox\b/i.test(o.AH+" "+o.AI)&&p.CZ(o.href)===fb.SS){o.KI=a;o.group=".autoGallery"}else{if((m=/^(?:floatbox|gallery|iframe|slideshow|lytebox|lyteshow|lyteframe|lightbox)(.*)/i.exec(o.AI))){o.KI=a;o.group=m[1];if(/^(slide|lyte)show/i.test(o.AI)){o.FH.doSlideshow=a}else{if(/^(i|lyte)frame/i.test(o.AI)){o.type="html";o.KH=fb.SR}}}}}if(o.KL&&((m=/(?:^|\s)fbPop(up|down|left|right|pip)(?:\s|$)/i.exec(o.AH)))){o.IA=m[1];p.HZ.push(o)}}else{o.type="html";o.KH=fb.SX}}o.D=o.FH.source||o.FH.href||o.href||d;if(!o.type){o.D=p.decodeHTML(o.D);if(/<.+>/.test(o.D)){o.type="html";o.KH="direct"}else{if((m=/#([a-z][^\s=]*)$/i.exec(o.D))){var h=p.DA(m[1],o.HQ);if(h){o.D=h;o.type="html";o.KH=fb.SX}}}if(!o.type){o.type=(o.FH.type||p.CZ(o.D))[fb.VQ]();if(o.type==="img"){o.type=fb.SS}if(/^(iframe|inline|ajax|direct)$/.test(o.type)){o.KH=o.type;o.type="html"}if(/^(flash|quicktime|wmp|silverlight|pdf)$/.test(o.type)){o.KH=o.type;o.type=fb.TF}}}if(!o.KI&&o.FH.autoTypes&&(o.FH.autoTypes[fb.SV](o.type)>-1||(o.KH&&o.FH.autoTypes[fb.SV](o.KH)>-1))){o.KI=a}if(!o.KI){return}if(p.ie&&o.KH==="pdf"&&p.FF(o.D)){o.type="html";o.KH=fb.SR}if(o.KH===fb.SX){o.BO=p.LE(o.D)}p.JF(o);o.group=o.W.group||o.group||"";if(l){p.anchors.splice(0,0,o)}else{p.anchors.push(o)}if(o.type===fb.TF){p.DM(fb.TF)}if(o.href&&!fb[fb.PK]){if(p.AM){if(o.W.showThis!==b&&o.href[fb.SV](p.AM)>-1){fb[fb.PK]=o}}else{if(o.W[fb.PK]===a){fb[fb.PK]=o}else{if(o.W[fb.PK]==="once"){var m=/fbAutoShown=(.+?)(?:;|$)/.exec(document.cookie),f=m?m[1]:"",e=escape(o.href);if(f[fb.SV](e)===-1){fb[fb.PK]=o;document.cookie="fbAutoShown="+f+e+"; path=/"}}}}}if(p.EM&&o.AE){o.AE.hideFocus="true"}if(o.AE&&!l){p[fb.PC](o.AE,"click",p.DE(o,p),p.BH,o.M);o.AE[fb.TW]=c}if(l){return o}},DE:function(d,e){return function(f){if(!(f&&(f.ctrlKey||f.metaKey||f.shiftKey||f.altKey))||d.W.showThis===b||(d.type!==fb.SS&&d.KH!==fb.SR)){e.start(this);return e[fb.VM](f)}}},CZ:function(j){if(typeof j!==fb.VN){return""}var g=j.search(/[\?#]/),f=(g!==-1)?j[fb.VP](0,g):j,g=f.lastIndexOf(".")+1,h=g?f[fb.VP](g)[fb.VQ]():"",e,k={youtube:/\.com\/(watch\?v=|watch\?(.+)&v=|v\/[\w\-]+)/,"video.yahoo":/\.com\/watch\/\w+\/\w+/,dailymotion:/\.com\/swf\/\w+/,vimeo:/\.com\/\w+/,vevo:/\.com\/(watch\/\w+|videoplayer\/(index|embedded)\?)/i};if(/^(jpe?g|png|gif|bmp)$/.test(h)){return fb.SS}if(!h||/^(html?|php\d?|aspx?)$/.test(h)){return fb.SR}if(h==="swf"){return"flash"}if(h==="pdf"){return"pdf"}if(h==="xap"){return fb.VJ}if(/^(mpe?g|movi?e?|3gp|3g2|m4v|mp4|m1v|mpe|qt)$/.test(h)){return"quicktime"}if(/^(wmv?|avi|asf)$/.test(h)){return"wmp"}if((e=/^(?:http:)?\/\/(?:www.)?([a-z\.]+)\.com\//i.exec(f))&&e[1]){var d=e[1][fb.VQ]();if(k[d]&&k[d].test(j)){return"flash"}}return fb.SR},DA:function(j,f){var e=this,h=c;if(typeof j===fb.VN){h=(f&&f[fb.SD](j))||e.H[fb.SD](j)||fb$(j);var d=fb[fb.TA].length,g;while(!h&&d--&&(g=fb[fb.TA][d])){if(e.J(g[fb.QY])===fb.SR&&!e.FF(g[fb.QY].src)){if((f=e[fb.SG](g[fb.QY]))){h=f[fb.SD](j)}}}}return h},LE:function(g){var f=this,d=g[fb.UK],e="fbWrapper";if(d[fb.PU]===e){return d}else{var h=g[fb.UF][fb.QE]("div");h[fb.PU]=e;h.style[fb.QK]=f[fb.SL](g,fb.QK);h.style[fb.VS]=f[fb.SL](g,fb.VS);d.replaceChild(h,g);h[fb.PF](g);if(f[fb.SL](g,fb.QK)===fb.TP){g.style[fb.QK]="block"}if(f[fb.SL](g,fb.VS)===fb.SQ){g.style[fb.VS]=fb.VT}return h}},HU:function(m){var o=this,l={};if(o.typeOf(m)===fb.TR){return m}if(typeof m!==fb.VN||!m){return l}var k=[],j,g=/`([^`]*?)`/g;g.lastIndex=0;while((j=g.exec(m))){k.push(j[1])}if(k.length){m=m[fb.UU](g,"``")}m=m[fb.UU](/[\r\n]/g," ");m=m[fb.UU](/\s{2,}/g," ");m=m[fb.UU](/\s*[:=]\s*/g,":");m=m[fb.UU](/\s*[;&,]\s*/g," ");m=m[fb.UU](/^\s+|\s+$/g,"");m=m[fb.UU](/(:\d+)px\b/gi,"$1");var e=m.split(" "),h=e.length;while(h--){var f=e[h].split(":"),d=f[0],n=f[1];if(d){if(!isNaN(n)){n=+n}else{if(n==="true"){n=a}else{if(n==="false"){n=b}else{if(n==="``"){n=k.pop()||""}}}}l[d]=n}}return l},FV:function(f){var e="",d,g;for(d in f){g=f[d];if(g!==""){if(/[:=&;,\s]/.test(g)){g="`"+g+"`"}e+=d+":"+g+" "}}return e},JG:function(f){var e=this;for(var d in f){if(e.CD.hasOwnProperty(d)&&f[d]!==""){e[d]=f[d]}}},DM:function(e,f){var d=fb;if(e&&!(d[e+"Loaded"]||d.GM[e])){d.GM[e]=a;d[fb.QT]((f||d.GL)+e+".js"+d.FJ)}},executeJS:function(d,l){var m=this,k=m.H||document,i=m.CG||k[fb.SF]("head")[0]||k[fb.QM],g=k[fb.QE]("script");function f(){i[fb.US](g);g=g.onload=g[fb.UA]=c;if(typeof l===fb.SB){l()}}g.type="text/javascript";if(l===a){d='fb.execRtn = eval("'+d[fb.UU](/\\/g,"\\\\")[fb.UU](/"/g,'\\"')+'")';try{g[fb.PF](document.createTextNode(d))}catch(h){g.text=d}i[fb.PF](g);var j=fb.execRtn;f();delete fb.execRtn;return j}else{g.onload=g[fb.UA]=function(){if(/^$|complete|loaded/.test(this.readyState||"")){f()}};g.src=d;i.insertBefore(g,i[fb.RY])}},getStyle:function(l,e,q){var r=this,g;function o(s){return q?r.Q(r.DI(s)||0):s||""}if(!(l=fb$(l))){return c}if(window.getComputedStyle){var f=l[fb.UF]&&l[fb.UF][fb.QI];if(!(g=f&&f.getComputedStyle(l,""))){return c}if(e){e=e[fb.UU](/([A-Z])/g,"-$1")[fb.VQ]();return o(g.getPropertyValue(e))}}e=e&&e[fb.UU](/-(\w)/g,function(s,t){return t.toUpperCase()});if(l.currentStyle){g=l.currentStyle;if(e){var m=g[e]||"";if(/^[\.\d]+[^\.\d]/.test(m)&&!/^\d+px/i.test(m)){var p=l[fb.UF],i=p[fb.QE]("xxx"),n,h;if(/html|body/.test(fb.J(l))){n=l;h=l[fb.RY]}else{n=l[fb.UK];h=l}n.insertBefore(i,h);i.style.left=m;m=i.style.pixelLeft+"px";n[fb.US](i)}return o(m)}}if(g&&!e){var k="",d,j;if(g.cssText){k=g.cssText}else{for(d in g){j=g[d];if(isNaN(d)&&j&&typeof j===fb.VN){k+=d[fb.UU](/([A-Z])/g,"-$1")[fb.VQ]()+": "+j+"; "}}}return k}return o((l.style&&e&&l.style[e])||"")},addEvent:function(g,j,h,l,m){var p=this;if((g=fb$(g))){if(g[fb.TN]==9&&/^DOMContentLoaded$/i.test(j)){var k=p.CH.length;while(k--){if(p.CH[k]===h){break}}if(k===-1){p.CH.push(h)}}else{if(g[fb.PD]){g[fb.PD](j,h,b)}else{if(g.attachEvent){if(!l){l=p.DV(h)}p[fb.UT](g,j,h,l);var f="on"+j,n=j+l,e=f+l,o=g[fb.UF]||g,d=o[fb.UL]||g;g[n]=h;g[e]=function(q){if(!q){var i=g[fb.UF];q=i&&i[fb.UL]&&i[fb.UL].event}if(q&&!q.target){q.target=q.srcElement}if(g&&g[n]){return g[n](q)}};g.attachEvent(f,g[e])}}}if(m||m===0){if(!fb.CR[m]){fb.CR[m]=[]}fb.CR[m].push({a:g,b:j,c:h,d:l})}}return h},removeEvent:function(g,i,h,k){var m=this;g=fb$(g);try{if(!(g&&(g[fb.TN]||g[fb.QL]))){return}}catch(j){return}if(g[fb.PD]){g.removeEventListener(i,h,b)}else{if(g.detachEvent){if(!k){k=m.DV(h)}var f="on"+i,l=i+k,d=f+k;if(g[d]){g.detachEvent(f,g[d])}g[d]=g[l]=c}}},DV:function(g){var f=g+"",e=f.length,d=e;while(d--){e=((e<<5)^(e>>27))^f.charCodeAt(d)}return e},stopEvent:function(f){if((f=f||window.event)){if(f.stopPropagation){f.stopPropagation()}if(f.preventDefault){f.preventDefault()}try{f.cancelBubble=a}catch(d){}try{f.returnValue=b}catch(d){}try{f.cancel=a}catch(d){}}return b},getElementsByClassName:function(m,e){var o=this;if(!(e=fb$(e))||e[fb.TN]==9){e=(((e&&e[fb.UF])||e)||document)[fb.QM]}if(o.typeOf(m)===fb.PG){var n=arguments.callee,d=m.pop();if(m.length){return n(m,e).concat(n(d,e))}else{m=d}}var l=[],p,h,f,k;if(e[fb.SE]){p=e[fb.SE](m);h=p.length;while(h--){l[h]=p[h]}}else{var g=new RegExp("(^|\\s)"+m+"(\\s|$)");p=e[fb.SF]("*");for(h=0,f=0,k=p.length;h<k;h++){if(g.test(p[h][fb.PU])){l[f++]=p[h]}}}return l},typeOf:function(d){var f=typeof d;if(f===fb.TR){if(!d){return"null"}var e=d.constructor;if(e===Array){return fb.PG}if(e===String){return fb.VN}if(d[fb.TN]&&e!==Object){return"node"}}return f},J:function(d){return((d&&d.nodeName)||"")[fb.VQ]()},ownerInstance:function(j){if(!(j=fb$(j))){return}var f=this,l,h,g,e=j[fb.UF]||j,d=fb[fb.TA].length;function k(m){var o=f[fb.SG](m);if(o===e){return a}var n=(o||m)[fb.SF](fb.SR),i=n.length;while(i--){if(k(n[i])){return a}}return b}while(d--){if((l=fb[fb.TA][d])&&(h=l.fbBox)){if(f[fb.TM](h,j)||((g=l[fb.QY])&&k(g))){return d}}}return -1},nodeContains:function(d,e){if(!((d=fb$(d))&&(e=fb$(e)))){return}if(e[fb.TN]==3){e=e[fb.UK]}if(d===e){return a}if(!e[fb.TN]||e[fb.TN]==9){return b}if(d[fb.TN]==9){d=d[fb.QM]}if(d.contains){return d.contains(e)}if(d[fb.PY]){return !!(d[fb.PY](e)&16)}},hasAttribute:function(f,e){if(!(f=fb$(f))){return}var d=this;if(f.hasAttribute){return f.hasAttribute(e)}return(new RegExp("<[^>]+[^>\\w-=\"']"+e+"[^\\w\\-]","i")).test(d[fb.SJ](f))},encodeHTML:function(d){if(typeof d!==fb.VN){return d}return d[fb.UU](/&/g,"&amp;")[fb.UU](/</g,"&lt;")[fb.UU](/>/g,"&gt;")[fb.UU](/"/g,"&quot;")},decodeHTML:function(d){if(typeof d!==fb.VN){return d}return d[fb.UU](/&lt;/g,"<")[fb.UU](/&gt;/g,">")[fb.UU](/&quot;/g,'"')[fb.UU](/&apos;/g,"'")[fb.UU](/&amp;/g,"&")},setInnerHTML:function(d,h){if(!(d=fb$(d))){return b}try{d[fb.SZ]=h;return a}catch(l){}try{var m=d[fb.UF],j=m.createRange();j.selectNodeContents(d);j.deleteContents();if(h){var f=(new DOMParser).parseFromString('<div xmlns="http://www.w3.org/1999/xhtml">'+h+"</div>","application/xhtml+xml"),n=f[fb.QM].childNodes;for(var g=0,k=n.length;g<k;g++){d[fb.PF](m.importNode(n[g],a))}}return a}catch(l){}return b},getOuterHTML:function(d){if(!(d=fb$(d))){return""}if(d.outerHTML){return d.outerHTML}var e=(d[fb.UF]||d[fb.QL])[fb.QE]("div");e[fb.PF](d.cloneNode(a));return e[fb.SZ]},getIframeWindow:function(g){var f=this,d=fb.SR;g=fb$(g);if(f.J(g)!==d){if(f.J(f[fb.QY])===d){g=f[fb.QY]}else{if(f.J(fb[fb.TC][fb.QY])===d){g=fb[fb.TC][fb.QY]}}}if(f.J(g)===d){try{var i=g.contentWindow||(g.contentDocument&&g.contentDocument[fb.QI]);if(i.location.href){return i}}catch(h){}}return c},getIframeDocument:function(e){var d=this,f=d[fb.SH](e);return(f&&f[fb.QL])||c},FF:function(e){var d=this;if(typeof e!==fb.VN){return a}if(e&&e[fb.SV]("//")===0){e=(d.Z||self).location.protocol+e}return/^https?:\/\/\w/i.test(e)&&e[fb.VQ]()[fb.SV](fb.AO)!==0},flashObject:function(){var i=this,f=arguments[0];if(typeof f!==fb.TR){f={url:arguments[0],width:arguments[1],height:arguments[2],params:arguments[3],node:arguments[4],id:arguments[5],altContent:arguments[6]}}var d=f.width?(f.width+"")[fb.UU]("px",""):"100%",j=f.height?(f.height+"")[fb.UU]("px",""):"100%",k={wmode:"opaque",scale:"exactfit",play:"false",quality:"high"},l=fb$(f.node);i.extend(k,i.HU(f.params));var g='<object class="fbFlashObject" width="'+d+'" height="'+j+'" '+(f.id?'id="'+f.id+'" ':"");if(i.EP){g+='classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,115,0"><param name="movie" value="'+f.url+'" />'}else{g+='type="application/x-shockwave-flash" data="'+f.url+'"><param name="pluginspage" value="http://get.adobe.com/flashplayer/" />'}for(var e in k){if(k.hasOwnProperty(e)){g+='<param name="'+e+'" value="'+k[e]+'" />'}}g+=(f.altContent||"")+"</object>";if(l&&l[fb.TN]==1){i[fb.UZ](l,g)}else{document.write(g)}},start:function(f,d){var e=this;e.I(function(){e.start(f,d)},100)},preload:function(e,g,f){var d=this;d.I(function(){d.preload(e,g,f)},250)},BX:function(e,f){var d=this;d.I(function(){d.BX(e,f)},200)},KO:function(f,e,g){var d=this;d.I(function(){d.KO(f,e,g)},200)},HW:function(e){var d=this;d.I(function(){d.HW(e)},150)},translate:function(f,d,g){var e=this;e.I(function(){e.translate(f,d,g)},200)},ajax:function(h,g){var d=this;if(g===d.undefined){if(window.XMLHttpRequest){g=new XMLHttpRequest}else{try{g=new ActiveXObject("Msxml2.XMLHTTP.6.0")}catch(f){try{g=new ActiveXObject("Msxml2.XMLHTTP")}catch(f){}}}}g=g||b;d.I(function(){d.ajax(h,g)},200);return g},printNode:function(f,e){var d=this;d.I(function(){d.printNode(f,e)},200)},K:function(e,f){var d=this;d.I(function(){d.K(e,f)},200)}})})();var fb$=function(a){return typeof a===fb.VN?(document[fb.SD](a)||null):a};if(typeof fb.EP==="undefined"){fb.proto.FJ=fb.DP("script","src",/floatbox.js(\?.*)$/i);fb.proto.EP=0;(function(){var a=document[fb.QE]("div");fb[fb.UZ](a,'<!--[if IE]><div id="fb_ieChk"></div><![endif]-->');if(a[fb.RY]&&a[fb.RY].id==="fb_ieChk"){if(document.documentMode){fb.proto.EP=document.documentMode}else{fb[fb.UZ](a,'<!--[if lt IE 7]><div id="fb_ie6"></div><![endif]-->');fb.proto.EP=a[fb.RY]&&a[fb.RY].id==="fb_ie6"?6:7}}fb[fb.UZ](a,"");a=null})()}fb[fb.PC](document,"DOMContentLoaded",fb.JY);fb[fb.PC](window,"load",function(){fb.HI();if(!fb.EV){return fb.I(arguments.callee,50)}var g=self[fb.QL].body;if(g[fb.SF]("a").length>document.fbAnchorCount){fb[fb.PB](g)}try{var b=parent.fb[fb.TC];if(b[fb.SH]()===self){if(b.coreLoaded&&b.JA==="no"){b.resize()}if(!b.modal){b[fb.PC](document[fb.QM],"click",function(){if(b!==parent.fb.topBox){b.IR()}})}}}catch(f){}if(fb.Z===self){fb.K(null,fb.LD)}var c;if(self===fb.Z&&fb[fb.VC]!==fb.TP&&fb[fb.VB]){var d=fb.DR+"shadow",a="_s"+fb[fb.VB]+"_r"+fb[fb.QD]+".png";c=[fb.AQ,d+"Top"+a,d+"Right"+a,d+fb.QC+a,d+fb.QC+a[fb.UU]("_r"+fb[fb.QD],"_r0"),d+"Bottom"+a,d+"Left"+a]}fb.I(function(){if(self.fb){fb.preload(c,null,true)}},200);fb[fb.PC](window,"unload",function(){if(self.fb&&fb.E&&fb.Z===self){fb.E("*");var e=fb[fb.TA].length;while(e--){fb.CC(e);fb.CE(e)}fb.CC(-1);var e=fb.IB.length;while(e--){fb.IB[e]=null}}})});if(document[fb.PD]){document[fb.PD]("DOMContentLoaded",fb.HI,false)};(function(){/*@cc_on try{document.body.doScroll('up');return fb.HI();}catch(e){}/*@if (false) @*/if(/loaded|complete/.test(document.readyState))return fb.HI();/*@end @*/if(fb.CH.length)fb.I(arguments.callee,20);})();
