<?php if ( has_nav_menu( 'social-menu' ) ) { ?>
	
	<?php wp_nav_menu( array(
		'theme_location' => 'social-menu',
		'title_li' => '',
		'depth' => 1,
		'container_class' => 'social-menu',
		'menu_class'      => 'social-icons',
		'link_before'     => '<span>',
		'link_after'      => '</span>',
		)
	); ?>
	
<?php } ?>