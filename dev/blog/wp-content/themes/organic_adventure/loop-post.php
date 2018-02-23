<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php if (isset($_POST['featurevid'])){ $custom = get_post_custom($post->ID); $featurevid = $custom['featurevid'][0]; } ?>

<!-- BEGIN .single-holder -->
<div class="single-holder">

	<!-- BEGIN .intro -->
	<div class="intro">
	
		<h1 class="headline"><?php the_title(); ?></h1>
		
		<!-- BEGIN .post-author -->
		<div class="post-author">
		
			<p class="align-left"><i class="fa fa-clock-o"></i> <?php _e("Posted on", 'organicthemes'); ?> <?php the_time(__("F j, Y", 'organicthemes')); ?> <?php _e("by", 'organicthemes'); ?> <?php esc_url ( the_author_posts_link() ); ?></p>
			
			<?php if ( comments_open() ) { ?>
			<p class="align-right"><i class="fa fa-comment"></i> <a class="scroll" href="<?php the_permalink(); ?>#comments"><?php comments_number(__("Comment", 'organicthemes'), __("1 Comment", 'organicthemes'), '% Comments'); ?></a></p>
			<?php } ?>
		
		<!-- END .post-author -->
		</div>
	
	<!-- END .intro -->
	</div>
	
	<?php if (get_theme_mod( 'display_feature_post' ) == '1') { ?>
		<?php if ( get_post_meta($post->ID, 'featurevid', true) ) { ?>
			<div class="feature-vid"><?php echo get_post_meta($post->ID, 'featurevid', true); ?></div>
		<?php } else { ?>
			<?php if ( has_post_thumbnail()) { ?>
				<div class="feature-img"><?php the_post_thumbnail( 'adventure-featured-medium' ); ?></div>
			<?php } ?>
		<?php } ?>
	<?php } ?>
	
	<!-- BEGIN .article -->
	<div class="article">
	
		<?php the_content(); ?>
	
		<?php wp_link_pages(array(
			'before' => '<p class="page-links"><span class="link-label">' . __('Pages:', 'organicthemes') . '</span>',
			'after' => '</p>',
			'link_before' => '<span>',
			'link_after' => '</span>',
			'next_or_number' => 'next_and_number',
			'nextpagelink' => __('Next', 'organicthemes'),
			'previouspagelink' => __('Previous', 'organicthemes'),
			'pagelink' => '%',
			'echo' => 1 )
		); ?>
		
		<!-- BEGIN .post-navigation -->
		<div class="post-navigation">
			<div class="previous-post"><?php previous_post_link('&larr; %link'); ?></div>
			<div class="next-post"><?php next_post_link('%link &rarr;'); ?></div>
		<!-- END .post-navigation -->
		</div>
	
	<!-- END .article -->
	</div>
	
	<!-- BEGIN .post-meta -->
	<div class="post-meta">
	
		<div class="align-left">
			<p><i class="fa fa-reorder"></i> <?php _e("Category:", 'organicthemes'); ?> <?php the_category(', '); ?><?php $tag_list = get_the_tag_list( __( ", ", 'organicthemes' ) ); if ( ! empty( $tag_list ) ) { ?> <i class="fa fa-tags"></i> <?php _e("Tags:", 'organicthemes'); ?> <?php the_tags(''); ?><?php } ?></p>
		</div>
		
		<?php if(get_theme_mod('display_social_post') == '1') { ?>
		<div class="align-right">
			<?php get_template_part( 'content/social-share' ); ?>
		</div>
		<?php } ?>
		
	<!-- END .post-meta -->
	</div>

<!-- END .single-holder -->
</div>

<?php comments_template('',true); ?>

<div class="clear"></div>

<?php endwhile; else: ?>

<!-- BEGIN .article -->
<div class="article">
	<p><?php _e("Sorry, no posts matched your criteria.", 'organicthemes'); ?></p>
<!-- END .article -->
</div>

<?php endif; ?>