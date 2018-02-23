(function($) {
	$.fn.extend({
		cbtoggle : function(options)
		{
			/*
				Local variables
			*/
			var checkboxes = $(options.detailElementsSelector);
			var mainCheckbox = $(options.mainElementSelector);
			var panel = $(options.panelElementSelector);
			
			checkStatus();
			/*
				Attaching handlers
			*/
			mainCheckbox.click(toggleCheckboxes);			
			checkboxes.each(function() {$(this).click(checkStatus) });

			/*
				Handlers
			*/
			function toggleCheckboxes()
			{
				checkboxes.each(function(){
					$(this).attr('checked', mainCheckbox.attr('checked'));
				});
				panel.toggle(hasAnySelected());
			}

			function checkStatus()
			{
				var someCheckboxSelected = hasAnySelected();
				mainCheckbox.attr('checked', someCheckboxSelected);
				panel.toggle(someCheckboxSelected);
			}

			/*
				Other functions
			*/
			function hasAnySelected()
			{
				var result = false;
				checkboxes.each(function() {
					if ($(this).attr('checked'))
					{
						result = true;
						return;
					}
				});
				return result;
			}
		}
	});
})(jQuery);  //closure for emulating 'private'