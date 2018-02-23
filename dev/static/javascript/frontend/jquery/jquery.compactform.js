/*
 Sets default text value for input

 Dependencies: 
 	jQuery 1.3.2+ - http://jquery.com/ 
*/
(function($) {
	$.fn.compactform = function(options){
		
			/*
			 *	"Class" definition
			 */
			var CompactForm = function(element){
				var config = $.extend({}, {text: ''}, options);
				var input = $(element);

				// Init
				refresh();

				// Public methods
				this.Refresh = function()
				{
					refresh();
				}

				this.GetText = function()
				{
					return config.text;
				}

				// Private methods
				function refresh()
				{
					if (input.val() == '')
					{
						input.val(config.text);
					}
				}

				input
					.focus(function(){
						if(input.val() == config.text)
						{
							input.val('');
						}
					})
					.focusout(refresh)
					.parents('form').submit(function() {
						if (input.val() == config.text)
						{
							input.val('');
						}
					});

				/*
				 * attaching instance
				 */
				input.data('compactForm', this);
			}

			/*
			 * Attaching instance of class
			 */
			return this.each(function(){
				(new CompactForm(this));
			});
	}
})(jQuery);