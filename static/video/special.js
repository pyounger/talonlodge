$(function(){var tabletSize=1024;var isTablet='';if(navigator.userAgent.match(/Android|BlackBerry|iPhone|iPad|iPod|Opera Mini|Silk|IEMobile/i))
isTablet=true;else
isTablet=false;if(self==top){if(jQuery().cycle){$('.home #masthead').cycle({slides:'> div',timeout:9000,swipe:true});$('#home-push').cycle({slides:'> div',timeout:9000,swipe:true});}}
$('#video-masthead video').prop('muted',false);if($.fn.pickadate&&$('.pickadate-sabre').length){var d=new Date();var weekday=$.fn.pickadate.defaults.weekdaysFull;var month=$.fn.pickadate.defaults.monthsFull;var weekdayAbbr=$.fn.pickadate.defaults.weekdaysShort;var monthAbbr=$.fn.pickadate.defaults.monthsShort;var setAltInput=function(date,altClass){var dateNum=date.getDate();var dateDay=weekday[date.getDay()];var dateMonth=month[date.getMonth()];var abbrDay=weekdayAbbr[date.getDay()];var abbrMonth=monthAbbr[date.getMonth()];$('.'+ altClass+' .date-top').html(abbrDay);$('.'+ altClass+' .date-left').html(dateNum);$('.'+ altClass+' .date-right').html(abbrMonth);};var standalone_$input=$('.date-standalone').pickadate({format:'mm/dd/yyyy',formatSubmit:'mm/dd/yyyy',today:'',clear:'',min:[d.getFullYear(),d.getMonth(),d.getDate()],onClose:function(){$(document.activeElement).blur();}}),standalone=standalone_$input.pickadate('picker');var from_$input=$('.date-begin').pickadate({format:'mm/dd/yyyy',formatSubmit:'mm/dd/yyyy',today:'',clear:'',min:[d.getFullYear(),d.getMonth(),d.getDate()],onClose:function(){$(document.activeElement).blur();}}),from_picker=from_$input.pickadate('picker');var to_$input=$('.date-end').pickadate({format:'mm/dd/yyyy',formatSubmit:'mm/dd/yyyy',today:'',clear:'',onClose:function(){$(document.activeElement).blur();}}),to_picker=to_$input.pickadate('picker');$('.date-begin').each(function(){if(from_picker.get('value')){to_picker.set('min',from_picker.get('select'));}
var nextDay;from_picker.live
('set',function(event){var fromDate=from_picker.get('select','yyyy/mm/dd');var selected=new Date(fromDate);nextDay=new Date(selected.getTime()+(24*60*60*1000));if(event.select){to_picker.set('min',nextDay);setAltInput(selected,'alt-input-begin');}});from_picker.live
('close',function(event){if(from_picker.get('select')>=to_picker.get('select')){to_picker.set('select',nextDay);}
if($('.single-field').length){$('.single-field .alt-input-begin a').html(from_picker.get('select','mm/dd/yyyy'));}});from_picker.set('select',d);});$('.date-end').each(function(){to_picker.live
('set',function(event){if(to_picker.get('select')==null){var toDate=to_picker.get('min','yyyy/mm/dd');}else{var toDate=to_picker.get('select','yyyy/mm/dd');}
var selected=new Date(toDate);var prevDay=new Date(selected.getTime()-(24*60*60*1000));if(event.select){setAltInput(selected,'alt-input-end');}
setAltInput(selected,'alt-input-end');});to_picker.live
('close',function(event){if($('.single-field').length){$('.single-field .alt-input-end a').html(to_picker.get('select','mm/dd/yyyy'));}});to_picker.set('select',d.getTime()+(24*60*60*1000));});$('.alt-input-begin, .single-field .cal-icon').live
('click',function(e){from_picker.open();e.stopPropagation();});$('.alt-input-end').live
('click',function(e){to_picker.open();e.stopPropagation();});$('.alt-input-begin a, .alt-input-end a').click(function(e){e.preventDefault();});}
if(!Modernizr.svg){$("#branding img").attr("src","/templates/main/images/logo-MaunaLaniBay.png");$("#logo-preferred img").attr("src","/templates/main/images/preferred-logo.png");}
$('#floorplan-table tr:even').addClass('even');$('#floorplan-table tr:odd').addClass('odd');$('.adv-fields input').each(function(){$(this).focus(function(){$(this).prev('label').hide();});$(this).blur(function(){$(this).prev('label').show();});});var timer;$('ul#primary-nav > li').mouseover(function(){if($(window).width()>tabletSize){clearTimeout(timer);$('ul#primary-nav > li').removeClass('hover');$('ul#primary-nav > li ul').hide();$(this).addClass('hover');$(this).children('ul').css('display','inline-block');}});$('ul#primary-nav').mouseout(function(){if($(window).width()>tabletSize){if(!$('ul#primary-nav > li.current').hasClass('hover')){timer=setTimeout(function(){$('ul#primary-nav > li ul').fadeOut().removeClass('hover');$('ul#primary-nav > li.current ul').fadeIn();},1000);}}});$('#nav .menu').click(function(e){e.preventDefault();$('.menu + ul').slideToggle('slow',function(){if($(this).is(':visible')){$('#nav .menu div').addClass("active");}else{$('#nav .menu div').removeClass("active");$('#primary-nav').attr('style','');}
$('#nav .menu div').text($(this).is(':visible')?"Close":"Expand");});});$('.menu + ul').find('li:has(ul)').children('a').addClass('hasSubNav');$('#primary-nav > li > ul').each(function(){if($(this).children().length==0){$(this).remove();}});if(!("ontouchstart"in document.documentElement)){document.documentElement.className+=" no-touch";}
if($('html').hasClass('no-touch')&&($(window).width()<tabletSize)){$('.menu + ul li:has(ul)').click(function(e){e.preventDefault();if($(this).hasClass('active')){window.location=e.target;}else{$(this).parent().children('li').removeClass('active').find('ul').hide();$(this).addClass("active");$(this).children('ul').show();}});}else{$('.menu + ul li:has(ul)').click(function(e){e.preventDefault();if($(this).hasClass('active')){window.location=e.target;}else{$(this).parent().children('li').removeClass('active').find('ul').hide();$(this).addClass("active");$(this).children('ul').show();}});}
$('#check-avail-wrapper h2').click(function(e){e.preventDefault();if($('#nav .menu').is(':visible')){$('#reservations-console').slideToggle('slow',function(){if($(this).is(':visible')){$('#check-avail-wrapper h2 div').addClass("active");}else{$('#check-avail-wrapper h2 div').removeClass("active");}
if($('body').hasClass('jp')){$('#check-avail-wrapper h2 div').text($(this).is(':visible')?"クローズ":"拡大する");}else{$('#check-avail-wrapper h2 div').text($(this).is(':visible')?"Close":"Expand");}});}});$('a.btn-promo').click(function(e){e.preventDefault();if($(this).parent('.adv-fields').hasClass('open')){$(this).parent('.adv-fields').removeClass('open').hide();}else{var leftpos=$(this).position().left;$(this).siblings('.adv-fields').css('left',leftpos).addClass('open').show();}
$(window).bind("resize.browsersize",function(){var leftpos=$('a.btn-promo').position().left;$('a.btn-promo').siblings('.adv-fields').css('left',leftpos)});});if((!$('body').hasClass('home')&&!$('body').hasClass('accommodations')&&!$('body').hasClass('exinset'))||$('body').hasClass('factsheet')){var $tab=$('#inset');if($tab.length==0)
var $tab=$('.inset');var content=$(".content");var pos=content.offset();var footer=$('#footer-wrapper');var posFooter=footer.offset();var imgWidth=$('#inset img').width();var imgHeight=$('#inset img').height();if(imgWidth==null){imgWidth=$('.inset img').width();imgHeight=$('.inset img').height();}
$(window).load(function(){imgWidth=$('#inset img').width();imgHeight=$('#inset img').height();if(imgWidth==null){imgWidth=$('.inset img').width();imgHeight=$('.inset img').height();}
if(($(window).width()>tabletSize)&&(isTablet==false)){if($(window).scrollTop()>=pos.top+ 0){if($(window).height()<imgHeight+260){if(pos.top+content.height()+260>($(window).height()+ $(window).scrollTop())){$tab.css({position:'fixed',top:'auto',bottom:'231px',width:imgWidth-1+'px'});}else{$tab.css({position:'fixed',top:'0',bottom:'auto',width:imgWidth-1+'px'});}}else{$tab.css({position:'fixed',top:'0',bottom:'auto',width:imgWidth-1+'px'});}}}});$(window).bind("resize.browsersize",function(){if(($(window).width()<tabletSize)&&(isTablet==false)){$tab.css({position:'relative'});$tab.attr('style','');}else{imgWidth=$('#inset img').width();imgHeight=$('#inset img').height();$('#inset img').load(function(){imgWidth=$('#inset img').width();imgHeight=$('#inset img').height();});if(imgWidth==null){$('.inset img').load(function(){imgWidth=$('.inset img').width();imgHeight=$('.inset img').height();});}
$('#masthead img').load(function(){content=$(".content");pos=content.offset();footer=$('#footer-wrapper');posFooter=footer.offset();});if($(window).scrollTop()>=pos.top- 50){$tab.css({width:content.width()});}
$(window).scroll(function(){if(!$("body").hasClass("hotel-photos")){var footerDist=-80;if(($(window).width()>tabletSize)){if($(window).scrollTop()>=pos.top- 50){if($(window).height()<imgHeight+260){if(posFooter.top-footerDist>($(window).height()+ $(window).scrollTop())){$tab.css({position:'fixed',top:'0',bottom:'auto',width:content.width()});}else{$tab.css({position:'fixed',top:'auto',bottom:'231px',width:content.width()});}}else{$tab.css({position:'fixed',top:'0',bottom:'auto',width:content.width()});}}else{$tab.css({position:'relative',top:0+'px',width:'50%'});}}}});}}).trigger("resize.browsersize");}
$("body.hotel-photos li#accomodations").click(function(e){e.preventDefault();$.specific_cat('accommodations',false,'/assets/xml/gallery.xml','fullscreen-example');});$("body.hotel-photos li#explore").click(function(e){e.preventDefault();$.specific_cat('amenities',false,'/assets/xml/gallery.xml','fullscreen-example');});$("body.hotel-photos li#dining").click(function(e){e.preventDefault();$.specific_cat('dining',false,'/assets/xml/gallery.xml','fullscreen-example');});$("body.hotel-photos li#videos").click(function(e){e.preventDefault();$.specific_cat('videos',false,'/assets/xml/gallery.xml','fullscreen-example');});$("body.hotel-photos li#weddings").click(function(e){e.preventDefault();$.specific_cat('weddings',false,'/assets/xml/gallery.xml','fullscreen-example');});$("body.hotel-photos li#golf").click(function(e){e.preventDefault();$.specific_cat('golf',false,'/assets/xml/gallery.xml','fullscreen-example');});$("body.hotel-photos li#meetings").click(function(e){e.preventDefault();$.specific_cat('meetings',false,'/assets/xml/gallery.xml','fullscreen-example');});$('.inset, .extrainset > div, .exinset-wrap .inset > div').each(function(){var currentNav=$('ul#primary-nav > li.current').attr('id');switch(currentNav){case'nav-big-island-hawaii-hotels':galCat='accommodations';break;case'nav-hawaii-hotels':galCat='amenities';break;case'nav-hawaii-vacation-packages':galCat='amenities';break;case'nav-hawaii-golf':galCat='golf';break;case'nav-hawaii-spa-resorts':galCat='amenities';break;case'nav-hawaii-big-island-dining':galCat='dining';break;case'nav-hawaii-weddings':galCat='weddings';break;case'nav-hawaii-meetings':galCat='meetings';break;case'nav-hawaii-beachfront-hotels':galCat='accommodations';break;default:galCat='accommodations';break;}
if($(this).children('img').length>0){var iconAnchor='<a href="" id="gal-'+galCat+'" class="icon-camera"><img src="/templates/main/images/icon-camera.png" alt="" border="0" /></a>';$(this).append(iconAnchor);}});$('.icon-cam-1').click(function(e){e.preventDefault();$.specific_cat('golf',false,'/assets/xml/gallery.xml','fullscreen-example');});$('.icon-camera').live
('click',function(e){e.preventDefault();var curGal=$(this).attr('id').substr(4);if(window.location.href.indexOf("bungalows")>-1){$.specific_cat(curGal,false,'/assets/xml/gallery.xml','fullscreen-example',13);}else{$.specific_cat(curGal,false,'/assets/xml/gallery.xml','fullscreen-example');}});$('.exinset-wrap').each(function(){insetWrapper();});$(window).bind("resize.browsersize",function(){$('body.exinset-wrap #inset div').removeClass('startWrap');insetWrapper();});if($('.content').height()>500){$('.extrainset').addClass('exinset-left');}
$(window).live
('resize',function(){if($('.content').height()>500){$('.extrainset').addClass('exinset-left');}else{$('.extrainset').removeClass('exinset-left');};});$('.accordion-content').each(function(){$(this).find('h3').live
('click',function(){if($(this).hasClass('active')){$(this).removeClass('active');$(this).next('.accordion-inner').slideUp('fast');}else{$(this).addClass('active');$(this).next('.accordion-inner').slideDown('fast');}});});if($(window).width()>600){}else{$('#music a').addClass('off').html('off');$("#audio-jplayer").jPlayer({ready:function(){$(this).jPlayer("setMedia",{mp3:"/assets/music/test.mp3"}).jPlayer("load");},loop:true,swfPath:"/templates/main/js"});}
$('#music a').click(function(e){e.preventDefault();if($(this).hasClass('off')){$(this).removeClass('off').html('on');$.cookie('music_cookie','play',{path:'/'});$("#audio-jplayer").jPlayer("play");}else{$("#audio-jplayer").jPlayer("stop");$(this).addClass('off').html('off');$.cookie('music_cookie','pause',{path:'/'});}});$(window).load(function(){if($(window).width()<600){$('.date-picker').attr('readonly','readonliy');}});$('#virtual-tour li').click(function(e){e.preventDefault();var w=window.outerWidth,h=window.outerHeight,url=$(this).find('a').attr("href");window.open(url,'virtual-tours','width='+w+', height='+h);});if(!CMT){$('#tabs').tabs();}
var readMore='';var readLess='';if(LANG=='jp'){readMore='もっと読む';readLess='以下省略する';}else{readMore='Read More';readLess='Read Less';}
$('.news-details').toggle(function(e){e.preventDefault();if($(window).width()<767){$(this).parents('.news-content').find('.news-date').slideDown();$(this).parents('.news-content').find('.news-short').slideDown();}
$(this).parents('.news-content').find('.news-long').slideDown();$(this).html(readLess);},function(e){e.preventDefault();if($(window).width()<767){$(this).parents('.news-content').find('.news-date').slideUp();$(this).parents('.news-content').find('.news-short').slideUp();}
$(this).parents('.news-content').find('.news-long').slideUp();$(this).html(readMore);});if($('.TA_certificateOfExcellence').length>0){setTimeout(function(){window.taValidate();},2000);}});$(document).ready(function(){$('.embed-gallery').each(function(){var el=$(this);$.catlady('/assets/xml/gallery.xml');});var alert=$('#weather-alert .description');$('#weather-alert .icon a').click(function(){if(alert.is(":visible")){$(alert).hide();}else{$(alert).show();}});$('#bungalow-modal').jqm();if(document.getElementById('masthead-vid')){var video=document.getElementsByTagName("video")[0];var playvid=document.getElementById('playvid');var videoStill=document.getElementById('videostill');playvid.addEventListener('click',function(){video.play();playvid.style.display="none";videoStill.style.display="none";},false);video.addEventListener('click',function(){video.pause();playvid.style.display="block";},false);}});var tag=document.createElement('script');tag.src="http://www.youtube.com/player_api";var firstScriptTag=document.getElementsByTagName('script')[0];firstScriptTag.parentNode.insertBefore(tag,firstScriptTag);var player;function onYouTubePlayerAPIReady(){player=new YT.Player('homepageplayer',{events:{'onReady':onPlayerReady,'onStateChange':loopVideo},});}
function onPlayerReady(event){event.target.mute();}
function loopVideo(event){if(event.data===YT.PlayerState.ENDED){event.target.playVideo();}}
function insetWrapper(){var aspect=1.557;var natHeight=545;var marginBottom=20;var contentHeight=$('.content').height();var contentWrapWidth=$('#content-wrapper').width();console.log(contentHeight+' '+ contentWrapWidth);var imgWidth=contentWrapWidth*.48;console.log(imgWidth);var imgHeight=(imgWidth/1.557)+marginBottom;console.log(imgHeight);var numSide=Math.ceil(contentHeight/imgHeight);console.log(numSide);$('body.exinset-wrap #inset div').eq(numSide).addClass('startWrap');}