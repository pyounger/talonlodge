<?php if ( get_query_var('paged') ) { $paged = get_query_var('paged'); } elseif ( get_query_var('page') ) { $paged = get_query_var('page'); } else { $paged = 1; } ?>
<?php $news = new WP_Query(array('cat'=>get_theme_mod( 'category_news' ), 'posts_per_page'=>get_theme_mod( 'postnumber_news' ), 'paged'=>$paged, 'suppress_filters'=>0)); ?>
<?php if ($news->have_posts()) : while($news->have_posts()) : $news->the_post(); ?>
<?php if (isset($_POST['featurevid'])){ $custom = get_post_custom($post->ID); $featurevid = $custom['featurevid'][0]; } ?>
<?php global $more; $more = 0; ?>

<!-- BEGIN .post class -->
<div <?php post_class('blog-holder'); ?> id="post-<?php the_ID(); ?>">
	
	<?php if ( get_post_meta($post->ID, 'featurevid', true) ) { ?>
		<div class="intro">
			<h2 class="headline small"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'organicthemes' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_title(); ?></a></h2>
		</div>
	<?php } ?>
	
	<?php if ( get_post_meta($post->ID, 'featurevid', true) ) { ?>
		<div class="feature-vid"><?php echo get_post_meta($post->ID, 'featurevid', true); ?></div>
	<?php } else { ?>
		<?php if ( '' != get_the_post_thumbnail() ) { ?>
			<div class="intro-img">
				<h2 class="headline small"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<a class="feature-img" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'organicthemes' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_post_thumbnail( 'adventure-featured-medium' ); ?></a>
			</div>
		<?php } else { ?>
			<div class="intro">
				<h2 class="headline small"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			</div>
		<?php } ?>
	<?php } ?>
	
	<div class="article">
		<?php the_content(__("Read More", 'organicthemes')); ?>
	</div>
	
	<div class="post-author">
		<p class="align-left"><i class="fa fa-clock-o"></i> &nbsp;<?php _e("Posted on", 'organicthemes'); ?> <?php the_time(__("F j, Y", 'organicthemes')); ?></p>
		<p class="align-right"><i class="fa fa-comment"></i> &nbsp;<a href="<?php the_permalink(); ?>#comments"><?php comments_number(__("Comment", 'organicthemes'), __("1 Comment", 'organicthemes'), '% Comments'); ?></a></p>
	</div>

<!-- END .post class -->
</div>

<?php endwhile; ?>

<?php if ($news->max_num_pages > 1) { ?>
	<!-- BEGIN .pagination -->
	<div class="pagination">
		<?php
		$big = 999999999; // need an unlikely integer
		echo paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, $paged ),
			'prev_text' => __('&laquo;', 'organicthemes'),
			'next_text' => __('&raquo;', 'organicthemes'),
			'total' => $news->max_num_pages
		) );
		?>
	<!-- END .pagination -->
	</div>
<?php } ?>

<?php else : ?>

<!-- BEGIN .article -->
<div class="article">
	<h2 class="title"><?php _e("No Posts Found", 'organicthemes'); ?></h2>
	<p><?php _e("We're sorry, but no posts have been found. Create a post to be added to this section, and configure your theme options.", 'organicthemes'); ?></p>
<!-- END .article -->
</div>

<?php endif; ?>
<?php wp_reset_postdata(); ?>