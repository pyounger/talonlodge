<?php if ( is_home() || is_front_page() ) { ?>

	<?php if ( get_theme_mod( 'adventure_logo' ) ) { ?>
		<h1 id="logo" class="home-logo">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<img src="<?php echo esc_url( get_theme_mod( 'adventure_logo' ) ); ?>" alt="" />
				<span class="logo-text"><?php echo wp_kses_post( get_bloginfo( 'name' ) ); ?></span>
			</a>
		</h1>
	<?php } else { ?>
		<div id="masthead" class="home-logo">
			<h1 class="site-title"><span><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo wp_kses_post( get_bloginfo( 'name' ) ); ?></a></span></h1>
			<h2 class="site-description"><?php echo wp_kses_post( get_bloginfo( 'description' ) ); ?></h2>
		</div>
	<?php } ?>
	
<?php } else { ?>

	<?php if ( get_theme_mod( 'adventure_logo' ) ) { ?>
		<h4 id="logo" <?php $header_image = get_header_image(); if ( is_page() && ! empty( $header_image ) || is_category() && ! empty( $header_image ) || is_single() && ! empty( $header_image ) || class_exists('Woocommerce') && is_woocommerce() && ! empty( $header_image ) || is_page_template('template-image.php') ) { ?> class="logo-overlay"<?php } ?>>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<img src="<?php echo esc_url( get_theme_mod( 'adventure_logo' ) ); ?>" alt="" />
				<span class="logo-text"><?php echo wp_kses_post( get_bloginfo( 'name' ) ); ?></span>
			</a>
		</h4>
	<?php } else { ?>
		<div id="masthead" <?php $header_image = get_header_image(); if ( is_page() && ! empty( $header_image ) || is_category() && ! empty( $header_image ) || is_single() && ! empty( $header_image ) || class_exists('Woocommerce') && is_woocommerce() && ! empty( $header_image ) || is_page_template('template-image.php') ) { ?> class="logo-overlay"<?php } ?>>
			<h4 class="site-title"><span><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo wp_kses_post( get_bloginfo( 'name' ) ); ?></a></span></h4>
			<h5 class="site-description"><?php echo wp_kses_post( get_bloginfo( 'description' ) ); ?></h5>
		</div>
	<?php } ?>

<?php } ?>