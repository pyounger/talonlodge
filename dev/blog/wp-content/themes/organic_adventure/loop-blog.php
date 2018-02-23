<?php $wp_query = new WP_Query(array('cat'=>get_theme_mod( 'category_blog' ), 'posts_per_page'=>get_theme_mod( 'postnumber_blog' ), 'paged'=>$paged, 'suppress_filters'=>0)); ?>
<?php if($wp_query->have_posts()) : while($wp_query->have_posts()) : $wp_query->the_post(); ?>
<?php if (isset($_POST['featurevid'])){ $custom = get_post_custom($post->ID); $featurevid = $custom['featurevid'][0]; } ?>
<?php global $more; $more = 0; ?>

	<!-- BEGIN .post class -->
	<div <?php post_class('blog-holder'); ?> id="post-<?php the_ID(); ?>">
		
		<!-- BEGIN .intro -->
		<div class="intro">
		
			<h2 class="headline small"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php esc_attr(the_title_attribute()); ?>"><?php the_title(); ?></a></h2>
			
			<div class="post-author">
				<p class="align-left"><i class="fa fa-clock-o"></i> <?php _e("Posted on", 'organicthemes'); ?> <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php esc_attr(the_title_attribute()); ?>"><?php the_time(__("F j, Y", 'organicthemes')); ?></a> <?php _e("by", 'organicthemes'); ?> <?php esc_url ( the_author_posts_link() ); ?> <?php _e("in", 'organicthemes'); ?> <?php the_category(' + '); ?></p>
			</div>
			
		<!-- END .intro -->
		</div>
		
		<?php if ( get_post_meta($post->ID, 'featurevid', true) ) { ?>
			<div class="feature-vid"><?php echo get_post_meta($post->ID, 'featurevid', true); ?></div>
		<?php } else { ?>
			<?php if ( has_post_thumbnail()) { ?>
				<a class="feature-img" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'organicthemes' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_post_thumbnail( 'adventure-featured-large' ); ?></a>
			<?php } ?>
		<?php } ?>
		
		<!-- BEGIN .article -->
		<div class="article">
		
			<?php the_content(__("Read More", 'organicthemes')); ?>
			
		<!-- END .article -->
		</div>
		
		<!-- BEGIN .post-meta -->
		<div class="post-meta">
		
			<?php if ( get_theme_mod( 'display_social_blog' ) == '1' ) { ?>
			<div class="align-left">
				<?php get_template_part( 'content/social-share' ); ?>
			</div>
			<?php } ?>
			
			<?php if ( comments_open() ) { ?>
			<div class="align-right"><i class="fa fa-comment"></i> <a href="<?php the_permalink(); ?>#comments"><?php comments_number(__("Comment", 'organicthemes'), __("1 Comment", 'organicthemes'), '% Comments'); ?></a></div>
			<?php } ?>
		
		<!-- END .post-meta -->
		</div>
		
	
	<!-- END .post class -->
	</div>

<?php endwhile; ?>

	<?php if ($wp_query->max_num_pages > 1) { ?>
		<!-- BEGIN .pagination -->
		<div class="pagination">
			<?php echo adventure_get_pagination_links(); ?>
		<!-- END .pagination -->
		</div>
	<?php } ?>

<?php else : ?>

	<div class="error-404">
		<h1 class="headline"><?php _e("No Posts Found", 'organicthemes'); ?></h1>
		<p><?php _e("We're sorry, but no posts have been found. Create a post to be added to this section, and configure your theme options.", 'organicthemes'); ?></p>
	</div>

<?php endif; ?>