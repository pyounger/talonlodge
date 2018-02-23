<?php $recent = new WP_Query(array('page_id' => get_theme_mod( 'featured_page' ), 'suppress_filters'=>0)); ?>
<?php while($recent->have_posts()) : $recent->the_post(); ?>
<?php $thumb = ( '' != get_the_post_thumbnail() ) ? wp_get_attachment_image_src( get_post_thumbnail_id(), 'adventure-featured-square' ) : false; ?>

<!-- BEGIN .eleven columns -->
<div class="eleven columns">

	<div class="feature-img iphone-profile" <?php if ( ! empty( $thumb ) ) { ?> style="background-image: url(<?php echo esc_url( $thumb[0] ); ?>);" <?php } else { ?> style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/default-profile.jpg);"<?php } ?>></div>

	<div class="article">
		<h2 class="title"><?php the_title(); ?></h2>
		<?php the_excerpt(); ?>
	</div>
	
	<?php if ( has_nav_menu( 'social-menu' ) ) { ?>
	
	<div class="home-social">
		<?php get_template_part( 'content/social-menu' ); ?>
	</div>
	
	<?php } ?>

<!-- END .eleven columns -->
</div>

<!-- BEGIN .five columns -->
<div class="five columns">

	<div class="feature-img desktop-profile" <?php if ( ! empty( $thumb ) ) { ?> style="background-image: url(<?php echo esc_url( $thumb[0] ); ?>);" <?php } else { ?> style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/default-profile.jpg);"<?php } ?>></div>

<!-- END .five columns -->
</div>

<?php endwhile; ?>