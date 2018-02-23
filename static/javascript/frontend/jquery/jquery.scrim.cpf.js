(function($) {
	$.fn.cpfScrim = function(options)
	{
		var o = $.extend({}, $.fn.cpfScrim.defaults, options);

		var scrim = $(o.scrim);
		var toResizeEl = $(o.toResizeEl);

		if (o.showOnLoad)
		{
			showScrim();
		}

		$(o.openLinks).click(function(event){
			event.stopPropagation();
			event.preventDefault();
			showScrim(event);
		});

		$(o.closeLinks).click(function(event){
			event.stopPropagation();
			event.preventDefault();
			hideScrim(event);
		});

		$(document).keyup(function(e) {
			if (e.keyCode == 27) { hideScrim(event); }   // esc
		});		

		$(window).bind('resize', function(){
			if (scrim.css('visibility') == 'visible')
				resizeElementToFullScreen(toResizeEl);
		});

		function showScrim(event)
		{
			if (o.onShowScrim && typeof(o.onShowScrim) == 'function')
				o.onShowScrim(event);

			resizeElementToFullScreen(toResizeEl);

			scrim.css('visibility', 'visible');
			//$.scrollTo($(o.scrollToEl), 500);
		}

		function hideScrim(event)
		{
			resizeElementToNil(toResizeEl);

			if (o.onHideScrim && typeof(o.onHideScrim) == 'function')
				o.onHideScrim(event);

			scrim.css('visibility', 'hidden');
		}

		function resizeElementToFullScreen(el)
		{

			if (jQuery.browser.opera && jQuery.browser.version <= 9.60)
			{
				el.css('width', $(window).width());
				el.css('height', $(document).height());
			}
			else
			{
				el.css('width', $(document).width());
				el.css('height', $(document).height());
			}
		}

		function resizeElementToNil(el)
		{
			el.css('height', 0);
			el.css('width', 0);
		}

	};

	$.fn.cpfScrim.defaults = {
		scrim: 			'',
		toResizeEl:		'',
		scrollToEl:		'#header',
		showOnLoad:		false,
		openLinks:		'',
		closeLinks:		'',
		onShowScrim:	'',
		onHideScrim:	''
	};

})(jQuery);
