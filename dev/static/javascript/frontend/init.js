// init
$(document).ready(function(event){
	// Cusel
	
	var params = {
		changedEl: ".lineForm select:not(.recipe_select)",
		visRows: 8,
		scrollArrows: true
	}
	cuSel(params);
	var params = {
		changedEl: ".b-country-select select",
		visRows: 8,
		scrollArrows: true
	}
	cuSel(params);
	var params = {
		changedEl: ".b-state-select select",
		visRows: 8,
		scrollArrows: true
	}
	cuSel(params);
	var params = {
		changedEl: ".b-purpose-select select",
		visRows: 4,
		scrollArrows: true
	}
	cuSel(params);
	var params = {
		changedEl: ".b-fishing-guests-select select",
		visRows: 6,
		scrollArrows: true
	}
	cuSel(params);
	var params = {
		changedEl: ".b-non-fishing-guests-select select",
		visRows: 6,
		scrollArrows: true
	}
	cuSel(params);
	var params = {
		changedEl: ".b-how-many-times-select select",
		visRows: 5,
		scrollArrows: true
	}
	cuSel(params);
	var params = {
		changedEl: ".b-main-package select",
		visRows: 4,
		scrollArrows: true
	}
	cuSel(params);
	var params = {
		changedEl: ".b-how-do-you-know select",
		visRows: 8,
		scrollArrows: true
	}
	cuSel(params);

	// Subheader navigation slidedown
	$().menuSubmenu({
		menu: '.h-content-navigation-center a',
		submenu: '.b-slidedown'
	});		

	// booking form
/*	$('input').daterangepicker( {
  presetRanges: [
    {text: 'My Range', dateStart: '03/07/08', dateEnd: 'Today' }
  ]
 } );*/
	/*
	$('#between').datepicker({
		inline: true,
		minDate: new Date(2012, 5 - 1, 22),
		maxDate: new Date(2012, 9 - 1, 7)		
	});
	$('#and').datepicker({
		inline: true,
		minDate: new Date(2012, 5 - 1, 22),
		maxDate: new Date(2012, 9 - 1, 7)		
	});
	*/
	
	/* utility functions */
	function isRestricted(date) 
	{
		var m = date.getMonth(), d = date.getDate(), y = date.getFullYear();
		if ((m < 4 || (m == 4 && d < 22)) || (m > 8 || (m == 8 && d > 7)))
		{
			return [false];
		}
		return [true];
	}
	function disableCustomDays(date) 
	{
	  return isRestricted(date);
	}	
	
	
	var datepickerExtensions = {
        _oldAdjustDate: $.datepicker._adjustDate,
        _adjustDate: function(id, offset, period) { 
            var target = $(id);
            var inst = this._getInst(target[0]);
            var afterAdjustDate = this._get(inst, 'afterAdjustDate');
            this._oldAdjustDate(id, offset, period);
            if(afterAdjustDate){
                afterAdjustDate(id, offset, period);
            }
        }
    }
    $.extend($.datepicker, datepickerExtensions);
	
	$('#between').datepicker({
		inline: true,
		beforeShowDay: disableCustomDays,
		beforeShow: function (input, inst) {
			$('.ui-datepicker-header').click(function(){
				alert('stasik');
			});
			var offset = $(input).offset();
			var height = $(input).height();
			window.setTimeout(function () {
				inst.dpDiv.css({ top: (offset.top - 240) + 'px', left: offset.left -55 })
        })},
		afterAdjustDate: function(i,o,p){
			var inputOffset = $('input.hasDatepicker').offset();
			var h = $('.ui-datepicker-calendar').outerHeight(false) + $('.ui-datepicker-header').outerHeight(false);
			$('.ui-datepicker').css({ 'top': inputOffset.top - h - 34});
		}
	});
	$('#and').datepicker({
		inline: true,
		beforeShowDay: disableCustomDays,
		beforeShow: function (input, inst) {
			var offset = $(input).offset();
			var height = $(input).height();
			window.setTimeout(function () {
				inst.dpDiv.css({ top: (offset.top - 240) + 'px', left: offset.left -55 })
        })},
		afterAdjustDate: function(i,o,p){
			var inputOffset = $('input.hasDatepicker').offset();
			var h = $('.ui-datepicker-calendar').outerHeight(false) + $('.ui-datepicker-header').outerHeight(false);
			$('.ui-datepicker').css({ 'top': inputOffset.top - h - 34});
		}
	});	
	$('#arrival').datepicker({
		inline: true,
		create: function(input, inst)
		{
		$('.ui-datepicker').addClass('ololo');
		}
	
	});
	$('#arrival-2').datepicker({
		inline: true
	});
	$('.date-1').click(function() {
		$('#arrival').datepicker('show');
	});
	$('.date-2').click(function() {
		$('#arrival-2').datepicker('show');
	});
	// Carousel
	$('#b-gallery').jcarousel();
	// carousel tooltips
	$().menuSubmenu({
		menu: '#b-gallery li a',
		submenu: '.b-gallery-tooltip',
		activeClass: 'hover',
		onShow: function(el) {
			var left = $(el).position().left + $('#b-gallery').position().left;
			var text = $(el).find('img').attr('alt');
            if (text.length > 0)
            {
                $(o.submenu).find('p').html(text);
                $(o.submenu).css({ top: 63, left: left + 50 }).show();
            }
		}
	});
	$('.cusel').click(function(){$('.cusel').removeClass('cuselOpen'); $(this).addClass('cuselOpen')});	
	//fancybox
		
			$("a.gallery-link").fancybox(
				{
				"padding": 4,
				"frameWidth" : 800,
				"frameHeight" : 600 
				});


			$("a.testlink").fancybox(
				{
				"padding" : 0, // ������ �������� �� ����� ����
				"imageScale" : true, // ��������� �������� true - �������(�����������) �������������� �� ������� ����, ��� false - ���� ������������ �� ������� ��������. �� ��������� - TRUE
				"zoomOpacity" : false,	// ��������� ������������ �������� �� ����� �������� (�� ��������� false)
				"zoomSpeedIn" : 1000,	// �������� �������� � �� ��� ���������� ���� (�� ��������� 0)
				"zoomSpeedOut" : 1000,	// �������� �������� � �� ��� ���������� ���� (�� ��������� 0)
				"zoomSpeedChange" : 1000, // �������� �������� � �� ��� ����� ���� (�� ��������� 0)
				"frameWidth" : 425,	 // ������ ����, px (425px - �� ���������)
				"frameHeight" : 355, // ������ ����, px(355px - �� ���������)
				"overlayShow" : true, // ���� true �������� �������� ��� ����������� �����. (�� ��������� true). ���� �������� � jquery.fancybox.css - div#fancy_overlay 
				"overlayOpacity" : 0.8,	 // ������������ ��������� 	(0.3 �� ���������)
				"hideOnContentClick" :false, // ���� TRUE  ��������� ���� �� ����� �� ����� ��� ����� (����� ��������� ���������). ����������� TRUE		
				"centerOnScroll" : false // ���� TRUE ���� ������������ �� ������, ����� ������������ ������������ ��������		
				});
				
     function formatText(index, panel) {
return index + "";
}

	// flash in the fancybox
	$(".sidebar-footer-image a, .h-sidebar-button a").fancybox({
		'padding'		: 0,
		'frameWidth'	: 802,
		'frameHeight'	: 602,
		"padding" 		: 8
	});
	

$(function () {
$('.anythingSlider').anythingSlider({
								easing: "easeInOutExpo",        // Anything other than "linear" or "swing" requires the easing plugin
								autoPlay: true,                 // This turns off the entire FUNCTIONALY, not just if it starts running or not.
								delay: 3000,                    // How long between slide transitions in AutoPlay mode
								startStopped: true,            // If autoPlay is on, this can force it to start stopped
								animationTime: 600,             // How long the slide transition takes
								hashTags: true,                 // Should links change the hashtag in the URL?
								buildNavigation: true,          // If true, builds and list of anchor links to link to each slide
								pauseOnHover: true,             // If true, and autoPlay is enabled, the show will pause on hover
								navigationFormatter: formatText       // Details at the top of the file on this use (advanced use)
									});

$("#slide-jump").click(function(){
$('.anythingSlider').anythingSlider(6);
});
});
$(function () {
$('.ourstorySlider').anythingSlider({
								easing: "easeInOutExpo",        // Anything other than "linear" or "swing" requires the easing plugin
								autoPlay: true,                 // This turns off the entire FUNCTIONALY, not just if it starts running or not.
								delay: 3000,                    // How long between slide transitions in AutoPlay mode
								startStopped: true,            // If autoPlay is on, this can force it to start stopped
								animationTime: 600,             // How long the slide transition takes
								hashTags: true,                 // Should links change the hashtag in the URL?
								buildNavigation: true,          // If true, builds and list of anchor links to link to each slide
								pauseOnHover: true,             // If true, and autoPlay is enabled, the show will pause on hover
								navigationFormatter: formatText       // Details at the top of the file on this use (advanced use)
									});

$("#slide-jump").click(function(){
$('.ourstorySlider').anythingSlider(6);
});
});
	  
	  
	$(function(){
		var galleries = $('.ad-gallery').adGallery({
			thumb_opacity: 1,
			width: 880, 
			height: 510,
            callbacks: {
				afterImageVisible: function()
				{
					var lo = $('.ad-gallery').position();
					var pos = $('.ad-image').position();
					var w = $('.ad-image').width();
					var gw = lo.left + pos.left + w + 46;
					$('#gallery-close').css({ 'z-index': '900', left: gw, top: pos.top-26 });
				}
			}
		});
	});
});