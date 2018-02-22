<?php
// For multilanguage calendar
$backend_common = array(
	//'common/json2.js',
	'common/jquery-1.7.1.min.js',
	'backend/jqueryui/jquery-ui-1.8.18.custom.min.js',
	'common/jquery.validate.min.js',
	'common/jquery.validate.cpf.js',
	'common/jquery.swfobject.js',

	'common/bootstrap/bootstrap.min.js',

	'backend/jquery.cbtoggle.js',
	'backend/jquery.synctranslit.js',
	'backend/jquery.maskedinput.js',
	'backend/jquery.jgrowl.js',
);

$CP_ASSETS = array(
	// Backend
	'css-backend' => array(
		'type' => 'css',
		'files' => array(
			'backend/app.css',
			'backend/plugins/jqueryui/jquery-ui-1.8.18.custom.css',
		)
	),

	'js-backend-en' => array(
		'type' => 'javascript',
		'files' => $backend_common
	),

	// Frontend
	'css-frontend' => array(
		'type' => 'css',
		'files' => array(
            'frontend/reset.css',
            'frontend/layout.css',
            'frontend/fonts.css',
            'frontend/footer.css',
            'frontend/header.css',
            'frontend/subheader.css',
            'frontend/buttons.css',
            'frontend/common.css',
            'frontend/plugins/jcarousel-skin.css',
            'frontend/plugins/jquery-datepicker.css',
            'frontend/plugins/cusel.css',
            'frontend/plugins/jquery.fancybox.css',
            'frontend/plugins/jquery.ad-gallery.css',
            'frontend/plugins/slider.css',
            'frontend/javascript.css',
            'frontend/page-main.css',
            'frontend/page-brochure.css',
            'frontend/page-gallery.css',
            'frontend/page-reservation.css',
            'frontend/page-articles.css',
            'frontend/page-faq.css',
            'frontend/page-ourstory.css',
            'frontend/page-privacy-terms.css',
            'frontend/page-agencies.css',
            'frontend/page-contactus.css',
            'frontend/page-sitemap.css',
            'frontend/page-recipe.css',
            'frontend/sidebar.css',
		)
	),

    'js-frontend' => array(
        'type' => 'javascript',
        'files' => array(
            "frontend/jquery/jquery-1.6.1.js",
            "frontend/jquery/cusel.js",
            "frontend/jquery/jScrollPane.js",
            "frontend/jquery/jquery.mousewheel-3.0.4.pack.js",
            "frontend/jquery/jquery.fancybox-1.2.1.pack.js",
            "frontend/jquery/jquery.easing.1.3.js",
            "frontend/jquery/jquery.jcarousel.min.js",
            "frontend/jquery/jquery-ui-1.8.17.custom.min.js",
            "frontend/jquery/jquery.compactform.js",
            "frontend/jquery/jquery.ad-gallery.js",
            "frontend/jquery/jquery.anythingslider.js",
            "frontend/jquery/jquery.scrim.cpf.js",
            'common/jquery.validate.min.js',
            'common/jquery.validate.cpf.js',
            'common/jquery.swfobject.js',
            "frontend/app.js",
            "frontend/init.js"
        )
    ),

);
?>