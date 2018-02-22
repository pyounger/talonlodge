<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php if (isset($_POST['featurevid'])){ $custom = get_post_custom($post->ID); $featurevid = $custom['featurevid'][0]; } ?>

<!-- BEGIN .post class -->
<div <?php post_class('archive-holder'); ?> id="post-<?php the_ID(); ?>">
	
	<!-- BEGIN .intro -->
	<div class="intro">	
		<h2 class="title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php esc_attr(the_title_attribute()); ?>"><?php the_title(); ?></a></h2>
	<!-- END .intro -->
	</div>
	
	<?php if ( get_post_meta($post->ID, 'featurevid', true) ) { ?>
		<div class="feature-vid"><?php echo get_post_meta($post->ID, 'featurevid', true); ?></div>
	<?php } else { ?>
		<?php if ( has_post_thumbnail()) { ?>
			<a class="feature-img" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'organicthemes' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_post_thumbnail( 'adventure-featured-medium' ); ?></a>
		<?php } ?>
	<?php } ?>
	
	<!-- BEGIN .article -->
	<div class="article">
	
		<?php the_excerpt(); ?>
		
	<!-- END .article -->
	</div>
	
	<?php $tag_list = get_the_tag_list( __( ", ", 'organicthemes' ) ); if ( ! empty( $tag_list ) || has_category() ) { ?>
	
	<!-- BEGIN .post-meta -->
	<div class="post-meta">
	
		<p><i class="fa fa-bars"></i> <?php _e("Category:", 'organicthemes'); ?> <?php the_category(', '); ?> <?php if ( ! empty( $tag_list ) ) { ?><i class="fa fa-tags"></i> <?php _e("Tags:", 'organicthemes'); ?> <?php the_tags(''); ?><?php } ?></p>
		
	<!-- END .post-meta -->
	</div>
	
	<?php } ?>

<!-- END .post class -->
</div>

<?php endwhile; ?>

<?php if($wp_query->max_num_pages > 1) { ?>
	<!-- BEGIN .pagination -->
	<div class="pagination">
		<?php echo adventure_get_pagination_links(); ?>
	<!-- END .pagination -->
	</div>
<?php } ?>

<?php else: ?>

<!-- BEGIN .article -->
<div class="article">
	<p><?php _e("Sorry, no posts matched your criteria.", 'organicthemes'); ?></p>
<!-- END .article -->
</div>

<?php endif; ?>