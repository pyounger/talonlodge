<?php
/**
Template Name: Slideshow
*
* This template is used to display a page with a slideshow.
*
* @package Adventure
* @since Adventure 1.0
*
*/
get_header(); ?>

<!-- BEGIN .post class -->
<div <?php post_class(); ?> id="page-<?php the_ID(); ?>">

	<?php get_template_part( 'content/page', 'slider' ); ?>
	
	<!-- BEGIN .row -->
	<div class="row header-active">
		
		<?php if ( is_active_sidebar( 'page-sidebar' ) ) : ?>
			
			<!-- BEGIN .eleven columns -->
			<div class="eleven columns">
	
				<!-- BEGIN .postarea single-holder -->
				<div class="postarea single-holder">
		
					<?php get_template_part( 'loop', 'page' ); ?>
				
				<!-- END .postarea single-holder -->
				</div>
			
			<!-- END .eleven columns -->
			</div>
			
			<!-- BEGIN .five columns -->
			<div class="five columns">
			
				<?php get_sidebar(); ?>
				
			<!-- END .five columns -->
			</div>
	
		<?php else : ?>
	
			<!-- BEGIN .sixteen columns -->
			<div class="sixteen columns">
	
				<!-- BEGIN .postarea full -->
				<div class="postarea full">
				
					<?php get_template_part( 'loop', 'page' ); ?>
				
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