<?php
/**
Template Name: Portfolio
*
* This template is used to display a 4-column portfolio.
*
* @package Adventure
* @since Adventure 1.0
*
*/
get_header(); ?>

<!-- BEGIN .post class -->
<div <?php post_class(); ?> id="page-<?php the_ID(); ?>">

	<?php $header_image = get_header_image(); if ( ! empty( $header_image ) ) { ?>
		<div class="feature-img page-header" style="background-image: url(<?php header_image(); ?>);"><img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php bloginfo('name'); ?>" /></div>
	<?php } ?>
	
	<!-- BEGIN .row -->
	<div class="row">
		
		<!-- BEGIN .sixteen columns -->
		<div class="sixteen columns">
		
			<?php get_template_part( 'loop', 'portfolio' ); ?>
		
		<!-- END .sixteen columns -->
		</div>
	
	<!-- END .row -->
	</div>

<!-- END .post class -->
</div>

<?php get_footer(); ?>