<?php
/**
Template Name: Archives
*
* This template is used to display site archives of posts, pages and categories.
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
		
		<!-- BEGIN .sixteen columns -->
		<div class="sixteen columns">
			
			<!-- BEGIN .postarea single-holder -->
			<div class="postarea single-holder">
			
				<h1 class="headline"><?php the_title(); ?></h1>
				
				<div class="archive-column">
					<h6><?php _e("By Page:", 'organicthemes'); ?></h6>
					<ul><?php wp_list_pages('title_li='); ?></ul>
				</div>
				
				<div class="archive-column">
					<h6><?php _e("By Post:", 'organicthemes'); ?></h6>
					<ul><?php wp_get_archives('type=postbypost&limit=100'); ?></ul>
				</div>
				
				<div class="archive-column last">
					<h6><?php _e("By Month:", 'organicthemes'); ?></h6>
					<ul><?php wp_get_archives('type=monthly'); ?></ul>
					
					<h6><?php _e("By Category:", 'organicthemes'); ?></h6>
					<ul><?php wp_list_categories('sort_column=name&title_li='); ?></ul>
				</div>
			
			<!-- END .postarea single-holder -->
			</div>
		
		<!-- END .sixteen columns -->
		</div>
	
	<!-- END .row -->
	</div>

<!-- END .post class -->
</div>

<?php get_footer(); ?>