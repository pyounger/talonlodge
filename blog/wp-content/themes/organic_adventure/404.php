<?php
/**
* This page template is used to display a 404 error message.
*
* @package Adventure
* @since Adventure 1.0
*
*/
get_header(); ?>
	
<!-- BEGIN .row -->
<div class="row">

	<?php if ( is_active_sidebar( 'page-sidebar' ) ) : ?>
	
		<!-- BEGIN .eleven columns -->
		<div class="eleven columns">
		
			<!-- BEGIN .postarea -->
			<div class="postarea">
				
				<!-- BEGIN .article -->
				<div class="article">
					<h1 class="headline"><?php _e("Not Found, Error 404", 'organicthemes'); ?></h1>
					<p><?php _e("The page you are looking for no longer exists.", 'organicthemes'); ?></p>
				<!-- END .article -->
				</div>
				
			<!-- END .postarea -->
			</div>
		
		<!-- END .eleven columns -->
		</div>
		
		<!-- BEGIN .five columns -->
		<div class="five columns">
		
			<?php get_sidebar( 'page' ); ?>
			
		<!-- END .five columns -->
		</div>
	
	<?php else : ?>
	
		<!-- BEGIN .sixteen columns -->
		<div class="sixteen columns">
	
			<!-- BEGIN .postarea -->
			<div class="postarea full">
				
				<!-- BEGIN .article -->
				<div class="article">
					<h1 class="headline"><?php _e("Not Found, Error 404", 'organicthemes'); ?></h1>
					<p><?php _e("The page you are looking for no longer exists.", 'organicthemes'); ?></p>
				<!-- END .article -->
				</div>
				
			<!-- END .postarea -->
			</div>
		
		<!-- END .sixteen columns -->
		</div>
		
	<?php endif; ?>

<!-- END .row -->
</div>

<?php get_footer(); ?>