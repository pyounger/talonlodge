<?php
/**
Template Name: Featured Image
*
* This template is used to display a page with a full-width header featured image.
*
* @package Adventure
* @since Adventure 1.0
*
*/
get_header(); ?>

<!-- BEGIN .post class -->
<div <?php post_class(); ?> id="page-<?php the_ID(); ?>">
	
	<?php if ( has_post_thumbnail()) { $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'adventure-featured-large'); } ?>
	
	<?php if ( has_post_thumbnail()) { ?>
		<div class="feature-img page-banner" style="background-image: url(<?php echo $thumb[0]; ?>);"><?php the_post_thumbnail( 'adventure-featured-large' ); ?></div>
	<?php } ?>
	
	<!-- BEGIN .row -->
	<div class="row header-active">
		
		<?php if ( is_active_sidebar( 'page-sidebar' ) ) : ?>
		
			<!-- BEGIN .eleven columns -->
			<div class="eleven columns">
	
				<!-- BEGIN .postarea single-holder -->
				<div class="postarea single-holder">
				
					<?php get_template_part( 'loop', 'page-image' ); ?>
				
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
	
				<!-- BEGIN .postarea page-content full -->
				<div class="postarea page-content full">
		
					<?php get_template_part( 'loop', 'page-image' ); ?>
				
				<!-- END .postarea page-content full -->
				</div>
			
			<!-- END .sixteen columns -->
			</div>
	
		<?php endif; ?>
	
	<!-- END .row -->
	</div>
	
<!-- END .post class -->
</div>

<?php get_footer(); ?>