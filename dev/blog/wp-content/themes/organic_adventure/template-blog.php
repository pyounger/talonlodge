<?php
/**
Template Name: Blog
*
* This template is used to display a blog. The content is displayed in post formats.
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
	<div class="row<?php if ( ! empty( $header_image ) ) { ?> header-active<?php } ?>">
	
	<?php if ( is_active_sidebar( 'blog-sidebar' ) ) : ?>
		
		<!-- BEGIN .eleven columns -->
		<div class="eleven columns">

			<!-- BEGIN .postarea -->
			<div class="postarea">
	
				<?php get_template_part( 'loop', 'blog' ); ?>

			<!-- END .postarea -->
			</div>
		
		<!-- END .eleven columns -->
		</div>
		
		<!-- BEGIN .five columns -->
		<div class="five columns">
		
			<?php get_sidebar('blog'); ?>
			
		<!-- END .five columns -->
		</div>
	
	<?php else : ?>

		<!-- BEGIN .sixteen columns -->
		<div class="sixteen columns">

			<!-- BEGIN .postarea full -->
			<div class="postarea full">
	
				<?php get_template_part( 'loop', 'blog' ); ?>
			
			<!-- END .postarea full -->
			</div>
		
		<!-- END .sixteen columns -->
		</div>

	<?php endif; ?>
	
	<!-- END .row -->
	</div>

<!-- END .post class -->
</div>

<?php get_footer(); ?>