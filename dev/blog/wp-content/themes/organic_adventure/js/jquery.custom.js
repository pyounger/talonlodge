( function( $ ) {

	function removeNoJsClass() {
		$( 'html:first' ).removeClass( 'no-js' );
	}
	
	/* Superfish the menu drops ---------------------*/
	function superfishSetup() {
		$('.menu').superfish({
			delay: 200,
			animation: {opacity:'show', height:'show'},
			speed: 'fast',
			cssArrows: true,
			autoArrows:  true,
			dropShadows: false
		});
	}

	/* Flexslider ---------------------*/
	function flexSliderSetup() {
		if( ($).flexslider) {
			var slider = $('.flexslider');
			slider.fitVids().flexslider({
				slideshowSpeed		: slider.attr('data-speed'),
				animationDuration	: 600,
				animation			: slider.attr('data-transition'),
				video				: false,
				useCSS				: false,
				prevText			: '<i class="fa fa-angle-left"></i>',
				nextText			: '<i class="fa fa-angle-right"></i>',
				touch				: false,
				animationLoop		: true,
				smoothHeight		: true,
				
				start: function(slider) {
					slider.removeClass('loading');
					$( ".preloader" ).hide();
				}
			});
		}
	}
		
	/* Portfolio Filter ---------------------*/
	function isotopeSetup() {
		var mycontainer = $('#portfolio-list');
		mycontainer.isotope({
			itemSelector: '.portfolio-item'
		});
	
		// filter items when filter link is clicked
		$('#portfolio-filter a').click(function(){
			var selector = $(this).attr('data-filter');
			mycontainer.isotope({ filter: selector });
			return false;
		});
	}
	
	/* Masonry ---------------------*/
	$(document).ready(function() { 
		$('.category-wrap').masonry({
			itemSelector : '.third',
			gutterWidth : 0,
			isAnimated: false,
			columnWidth : function( containerWidth ) {
			    return containerWidth / 3; }
		}).imagesLoaded(function() {
			$('.category-wrap').masonry('reload');
		});
	});
	
	/* Equal Content Height ---------------------*/
	function heightSetup() {
		$(".featured-page .desktop-profile").css({'height':($(".featured-page .eleven.columns").height()+'px')});
	}
		
	function modifyPosts() {
		
		/* Insert Line Break Before More Links ---------------------*/
		$('<br />').insertBefore('.more-link');
		
		/* Hide Comments When No Comments Activated ---------------------*/
		$('.nocomments').parent().css('display', 'none');
		
		/* Animate Page Scroll ---------------------*/
		$(".scroll").click(function(event){
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top}, 500);
		});
		
		/* Fit Vids ---------------------*/
		$('.feature-vid, .article').fitVids();
	
	}
	
	$( document )
	.ready( removeNoJsClass )
	.ready( superfishSetup )
	.ready( modifyPosts )
	.ready( heightSetup )
	.on( 'post-load', modifyPosts );
	
	$( window )
	.load( flexSliderSetup )
	.load( isotopeSetup )
	.resize( heightSetup )
	.resize( isotopeSetup );
	
})( jQuery );