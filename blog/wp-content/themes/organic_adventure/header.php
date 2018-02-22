<?php
/** 
* The Header for our theme.
* Displays all of the <head> section and everything up till <div id="wrap">
*
* @package Adventure
* @since Adventure 1.0
*
*/
?><!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" <?php language_attributes(); ?>> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->

<head>

	<meta charset="<?php bloginfo('charset'); ?>">
	
	<?php if (get_theme_mod('enable_responsive') == '1') { ?>
	<!-- Mobile View -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php } ?>
	
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="Shortcut Icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" type="image/x-icon">
	
	<?php get_template_part( 'style', 'options' ); ?>
	
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="alternate" type="application/rss+xml" title="<?php esc_attr( bloginfo('name') ); ?> Feed" href="<?php echo home_url(); ?>/feed/">
	<link rel="pingback" href="<?php echo esc_url( bloginfo('pingback_url') ); ?>">
	
	<!-- Social Buttons -->
	<script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>
	<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
	
	<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-3585651-1', 'auto');
  ga('send', 'pageview');

</script>
<!-- BEGIN #wrap -->
<div id="wrap">

	<!-- BEGIN .container -->
	<div class="container">
	
		<!-- BEGIN #header -->
		<div id="header">
		
			<!-- BEGIN .row -->
			<div class="row">
			
				<!-- BEGIN .five columns -->
				<div class="five columns">
				
					<div class="mobile-logo">
					
						<?php get_template_part( 'content/custom', 'header' ); ?>
						
					</div>
				
				<!-- END .five columns -->
				</div>
				
				<!-- BEGIN .eleven columns -->
				<div class="eleven columns">
				
					<!-- BEGIN #navigation -->
					<nav id="navigation" class="navigation-main" role="navigation">
					
						<span class="menu-toggle"><?php _e( 'Menu', 'organicthemes' ); ?></span>
			
						<?php if ( has_nav_menu( 'header-menu' ) ) {
							wp_nav_menu( array(
								'theme_location' => 'header-menu',
								'title_li' => '',
								'depth' => 4,
								'container_class' => '',
								'menu_class'      => 'menu'
								)
							);
						} else { ?>
							<ul class="menu"><?php wp_list_pages('title_li=&depth=4'); ?></ul>
						<?php } ?>
					
					<!-- END #navigation -->
					</nav>
				
				<!-- END .eleven columns -->
				</div>
				
			<!-- END .row -->
			</div>
		
		<!-- END #header -->
		</div>
		
		<!-- BEGIN .row -->
		<div class="row">
		
			<!-- BEGIN .five columns -->
			<div class="five columns">
			
				<div class="main-logo">
				
					<?php get_template_part( 'content/custom', 'header' ); ?>
					
				</div>
			
			<!-- END .five columns -->
			</div>
						
		<!-- END .row -->
		</div>