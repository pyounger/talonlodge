<?php
/**
* The search template for our theme.
*
* This template is used to display search results.
*
* @package Adventure
* @since Adventure 1.0
*
*/
get_header(); ?>

<!-- BEGIN .post class -->
<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<!-- BEGIN .row -->
	<div class="row">
		
		<?php if ( is_active_sidebar( 'blog-sidebar' ) && is_active_sidebar( 'left-sidebar' ) ) : ?>
			
			<!-- BEGIN .four columns -->
			<div class="four columns">
			
				<?php get_sidebar('left'); ?>
				
			<!-- END .four columns -->
			</div>
			
			<!-- BEGIN .seven columns -->
			<div class="seven columns">
				
				<!-- BEGIN .postarea middle -->
				<div class="postarea middle">
				
					<?php get_template_part( 'loop', 'archive' ); ?>
					
				<!-- END .postarea middle -->
				</div>
			
			<!-- END .seven columns -->
			</div>
			
			<!-- BEGIN .five columns -->
			<div class="five columns">
			
				<?php get_sidebar('blog'); ?>
				
			<!-- END .five columns -->
			</div>
			
		<?php else : ?>
		
		<?php if ( is_active_sidebar( 'left-sidebar' ) ) : ?>
		
			<!-- BEGIN .five columns -->
			<div class="five columns">
			
				<?php get_sidebar('left'); ?>
				
			<!-- END .five columns -->
			</div>
				
			<!-- BEGIN .eleven columns -->
			<div class="eleven columns">
		
				<!-- BEGIN .postarea -->
				<div class="postarea right">
				
					<?php get_template_part( 'loop', 'archive' ); ?>
				
				<!-- END .postarea -->
				</div>
			
			<!-- END .eleven columns -->
			</div>
	
		<?php else : ?>
		
		<?php if ( is_active_sidebar( 'blog-sidebar' ) ) : ?>
			
			<!-- BEGIN .eleven columns -->
			<div class="eleven columns">
		
				<!-- BEGIN .postarea -->
				<div class="postarea">
				
					<?php get_template_part( 'loop', 'archive' ); ?>
				
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
				
					<?php get_template_part( 'loop', 'archive' ); ?>
				
				<!-- END .postarea full -->
				</div>
			
			<!-- END .sixteen columns -->
			</div>
		
		<?php endif; ?>
		<?php endif; ?>
		<?php endif; ?>

	<!-- END .row -->
	</div>

<!-- END .post class -->
</div>

<?php get_footer(); ?>