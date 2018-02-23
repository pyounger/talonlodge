<?php

/*-----------------------------------------------------------------------------------------------------//
/*	Theme Setup
/*-----------------------------------------------------------------------------------------------------*/

if ( ! function_exists( 'adventure_setup' ) ) :

function adventure_setup() {

	// Make theme available for translation
	load_theme_textdomain( 'organicthemes', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Enable support for Post Thumbnails
	add_theme_support( 'post-thumbnails' );
	
	add_image_size( 'adventure-featured-large', 2400, 1800 ); // Large Featured Image
	add_image_size( 'adventure-featured-medium', 1800, 1200 ); // Medium Featured Image
	add_image_size( 'adventure-featured-small', 720, 720 ); // Small Featured Image
	add_image_size( 'adventure-featured-sqaure', 640, 640, true ); // Square Featured Image

	// Create Menus
	register_nav_menus( array(
		'header-menu' => __( 'Header Menu', 'organicthemes' ),
		'social-menu' => __( 'Social Menu', 'organicthemes' ),
	));
	
	// Custom Header
	if ( function_exists('add_theme_support') )
	$defaults = array(
		'width'                 => 2400,
		'height'                => 720,
		'default-image'			=> get_template_directory_uri() . '/images/default-header.jpg',
		'flex-height'           => true,
		'flex-width'            => true,
		'default-text-color'    => '333333',
		'header-text'           => false,
		'uploads'               => true,
	);
	add_theme_support( 'custom-header', $defaults );
	
	// Custom Background
	if ( function_exists('add_theme_support') )
	$defaults = array(
		'default-color'          => 'F4F4F4',
		'default-image'          => get_template_directory_uri() . '/images/bg-tile.png',
		'wp-head-callback'       => '_custom_background_cb',
		'admin-head-callback'    => '',
		'admin-preview-callback' => ''
	);
	add_theme_support( 'custom-background', $defaults );
}
endif; // adventure_setup
add_action( 'after_setup_theme', 'adventure_setup' );

/*-----------------------------------------------------------------------------------------------------//	
	Register Scripts		       	     	 
-------------------------------------------------------------------------------------------------------*/

if( !function_exists('adventure_enqueue_scripts') ) {
	function adventure_enqueue_scripts() {
	
		// Enqueue Styles
		wp_enqueue_style( 'adventure-style', get_stylesheet_uri() );
		wp_enqueue_style( 'adventure-style-mobile', get_template_directory_uri() . '/css/style-mobile.css', array( 'adventure-style' ), '1.0' );
		
		// Resgister Scripts
		wp_register_script( 'adventure-fitvids', get_template_directory_uri() . '/js/jquery.fitVids.js', array( 'jquery' ), '20130729' );
		wp_register_script( 'adventure-hover', get_template_directory_uri() . '/js/hoverIntent.js', array( 'jquery' ), '20130729' );
		wp_register_script( 'adventure-superfish', get_template_directory_uri() . '/js/superfish.js', array( 'jquery', 'adventure-hover' ), '20130729' );
		wp_register_script( 'adventure-isotope', get_template_directory_uri() . '/js/jquery.isotope.js', array( 'jquery' ), '20130729' );
	
		// Enqueue Scripts
		wp_enqueue_script( 'adventure-html5shiv', get_template_directory_uri() . '/js/html5shiv.js' );
		wp_enqueue_script( 'adventure-custom', get_template_directory_uri() . '/js/jquery.custom.js', array( 'jquery', 'adventure-superfish', 'adventure-fitvids', 'adventure-isotope', 'jquery-masonry' ), '20130729', true );
		wp_enqueue_script( 'adventure-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20130729', true );
		
		// IE Conditional Scripts
		global $wp_scripts;
		$wp_scripts->add_data( 'adventure-html5shiv', 'conditional', 'lt IE 9' );
		
		// Load Flexslider on front page and slideshow page template
		if ( is_home() || is_front_page() || is_single() || is_page_template('template-slideshow.php') || is_page_template('template-blog.php') ) {
			wp_enqueue_script( 'adventure-flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', array( 'jquery' ), '20130729' );
		}
	
		// load single scripts only on single pages
	    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	    	wp_enqueue_script( 'comment-reply' );
	    }
	}
	add_action('wp_enqueue_scripts', 'adventure_enqueue_scripts');
}

/*-----------------------------------------------------------------------------------------------------//	
	Category ID to Name		       	     	 
-------------------------------------------------------------------------------------------------------*/

function adventure_cat_id_to_name( $id ) {
	$cat = get_category( $id );
	if ( is_wp_error( $cat ) )
		return false;
	return $cat->cat_name;
}

/*-----------------------------------------------------------------------------------------------------//	
	WooCommerce Integration			       	     	 
-------------------------------------------------------------------------------------------------------*/

// Declare WooCommerce support
add_theme_support( 'woocommerce' );

// Remove WC sidebar
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

// WooCommerce content wrappers
function organic_prepare_woocommerce_wrappers(){
    remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
    remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
}
add_action( 'wp_head', 'organic_prepare_woocommerce_wrappers' );

function organic_open_woocommerce_content_wrappers() {
	?>
	
	<?php $header_image = get_header_image(); if ( ! empty( $header_image ) ) { ?>
		<div class="feature-img page-header" style="background-image: url(<?php header_image(); ?>);"><img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php bloginfo('name'); ?>" /></div>
	<?php } ?>
	
	<div class="row<?php if ( ! empty( $header_image ) ) { ?> header-active<?php } ?>">
		<div class="eleven columns">
			<div class="postarea single-holder">
				<div class="article">
    <?php
}
function organic_close_woocommerce_content_wrappers() {
	?>
    			</div>
    		</div>
    	</div>
 
        <div class="five columns">
        	<?php get_sidebar( 'post' ); ?>
        </div>
        
 	</div>
    <?php
}
add_action( 'woocommerce_before_main_content', 'organic_open_woocommerce_content_wrappers', 10 );
add_action( 'woocommerce_after_main_content', 'organic_close_woocommerce_content_wrappers', 10 );

// Add the WC sidebar in the right place
add_action( 'woo_main_after', 'woocommerce_get_sidebar', 10 );

// WooCommerce default product columns
function loop_columns() {
    return 3;
}
add_filter('loop_shop_columns', 'loop_columns');

// WooCommerce remove related products
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

/*-----------------------------------------------------------------------------------------------------//	
	Register Sidebars		       	     	 
-------------------------------------------------------------------------------------------------------*/

function adventure_widgets_init() {
	register_sidebar(array(
		'name'=> __( "Page Sidebar", 'organicthemes' ),
		'id' => 'page-sidebar',
		'before_widget'=>'<div id="%1$s" class="widget %2$s">',
		'after_widget'=>'</div>',
		'before_title'=>'<h6>',
		'after_title'=>'</h6>'
	));
	register_sidebar(array(
		'name'=> __( "Blog Sidebar", 'organicthemes' ),
		'id' => 'blog-sidebar',
		'before_widget'=>'<div id="%1$s" class="widget %2$s">',
		'after_widget'=>'</div>',
		'before_title'=>'<h6>',
		'after_title'=>'</h6>'
	));
	register_sidebar(array(
		'name'=> __( "Post Sidebar", 'organicthemes' ),
		'id' => 'post-sidebar',
		'before_widget'=>'<div id="%1$s" class="widget %2$s">',
		'after_widget'=>'</div>',
		'before_title'=>'<h6>',
		'after_title'=>'</h6>'
	));
	register_sidebar(array(
		'name'=> __( "Left Sidebar", 'organicthemes' ),
		'id' => 'left-sidebar',
		'before_widget'=>'<div id="%1$s" class="widget %2$s">',
		'after_widget'=>'</div>',
		'before_title'=>'<h6>',
		'after_title'=>'</h6>'
	));
	register_sidebar(array(
		'name'=> __( "Footer Widgets", 'organicthemes' ),
		'id' => 'footer',
		'before_widget'=>'<div id="%1$s" class="widget %2$s"><div class="footer-widget">',
		'after_widget'=>'</div></div>',
		'before_title'=>'<h6>',
		'after_title'=>'</h6>'
	));
}
add_action( 'widgets_init', 'adventure_widgets_init' );
		
/*----------------------------------------------------------------------------------------------------//
/*	Content Width
/*----------------------------------------------------------------------------------------------------*/

if ( ! isset( $content_width ) )
	$content_width = 640;

/**
 * Adjust content_width value based on the presence of widgets
 */
function adventure_content_width() {
	if ( ! is_active_sidebar( 'post-sidebar' ) || is_active_sidebar( 'page-sidebar' ) || is_active_sidebar( 'blog-sidebar' ) ) {
		global $content_width;
		$content_width = 960;
	}
}
add_action( 'template_redirect', 'adventure_content_width' );
	
/*-----------------------------------------------------------------------------------------------------//	
	Comments Function		       	     	 
-------------------------------------------------------------------------------------------------------*/

if ( ! function_exists( 'adventure_comment' ) ) :
function adventure_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'organicthemes' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'organicthemes' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
		break;
		default :
	?>
	<li <?php comment_class(); ?> id="<?php echo esc_attr( 'li-comment-' . get_comment_ID() ); ?>">
	
		<article id="<?php echo esc_attr( 'comment-' . get_comment_ID() ); ?>" class="comment">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php
						$avatar_size = 72;
						if ( '0' != $comment->comment_parent )
							$avatar_size = 48;

						echo get_avatar( $comment, $avatar_size );

						/* translators: 1: comment author, 2: date and time */
						printf( __( '%1$s <br/> %2$s <br/>', 'adventure' ),
							sprintf( '<span class="fn">%s</span>', wp_kses_post( get_comment_author_link() ) ),
							sprintf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( __( '%1$s', 'adventure' ), get_comment_date(), get_comment_time() )
							)
						);
					?>
				</div><!-- .comment-author .vcard -->
			</footer>

			<div class="comment-content">
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'organicthemes' ); ?></em>
					<br />
				<?php endif; ?>
				<?php comment_text(); ?>
				<div class="reply">
					<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'organicthemes' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				</div><!-- .reply -->
				<?php edit_comment_link( __( 'Edit', 'organicthemes' ), '<span class="edit-link">', '</span>' ); ?>
			</div>

		</article><!-- #comment-## -->

	<?php
	break;
	endswitch;
}
endif; // ends check for adventure_comment()

/*-----------------------------------------------------------------------------------------------------//	
	Custom Excerpt Length		       	     	 
-------------------------------------------------------------------------------------------------------*/

function adventure_excerpt_length( $length ) {
	return 54;
}
add_filter( 'excerpt_length', 'adventure_excerpt_length', 999 );

function adventure_excerpt_more( $more ) {
	return ', <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">'. __('Read More', 'organicthemes') .'</a>';
}
add_filter('excerpt_more', 'adventure_excerpt_more');

/*-----------------------------------------------------------------------------------------------------//	
	Add Excerpt To Pages		       	     	 
-------------------------------------------------------------------------------------------------------*/

add_action( 'init', 'adventure_add_excerpts_to_pages' );
function adventure_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}

/*-----------------------------------------------------------------------------------------------------//
	Add Stylesheet To Visual Editor
-------------------------------------------------------------------------------------------------------*/
	
add_action( 'init', 'adventure_add_editor_styles' );
/**
* Apply theme's stylesheet to the visual editor.
*
* @uses add_editor_style() Links a stylesheet to visual editor
* @uses get_stylesheet_uri() Returns URI of theme stylesheet
*/
function adventure_add_editor_styles() {
	add_editor_style( 'css/style-editor.css' );
}

/*-----------------------------------------------------------------------------------------------------//
/*	Pagination Function
/*-----------------------------------------------------------------------------------------------------*/

function adventure_get_pagination_links() {
	global $wp_query;
	$big = 999999999;
	echo paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var('paged') ),
		'prev_text' => __('&laquo;', 'adventure'),
		'next_text' => __('&raquo;', 'adventure'),
		'total' => $wp_query->max_num_pages
	) );
}

/*-----------------------------------------------------------------------------------------------------//
/*	Pagination Fix For Home Page Query
/*-----------------------------------------------------------------------------------------------------*/

function adventure_home_post_count_queries( $news ) {
	if (!is_admin() && $news->is_main_query()){
		if(is_home()){
			$news->set('posts_per_page', 1);
		}
	}
}
add_action( 'pre_get_posts', 'adventure_home_post_count_queries' );

/*-----------------------------------------------------------------------------------------------------//
/*	Custom Page Links
/*-----------------------------------------------------------------------------------------------------*/

function adventure_wp_link_pages_args_prevnext_add($args) {
    global $page, $numpages, $more, $pagenow;

    if (!$args['next_or_number'] == 'next_and_number') 
        return $args; 

    $args['next_or_number'] = 'number'; // Keep numbering for the main part
    if (!$more)
        return $args;

    if($page-1) // There is a previous page
        $args['before'] .= _wp_link_page($page-1)
            . $args['link_before']. $args['previouspagelink'] . $args['link_after'] . '</a>';

    if ($page<$numpages) // There is a next page
        $args['after'] = _wp_link_page($page+1)
            . $args['link_before'] . $args['nextpagelink'] . $args['link_after'] . '</a>'
            . $args['after'];

    return $args;
}

add_filter('wp_link_pages_args', 'adventure_wp_link_pages_args_prevnext_add');

/*-----------------------------------------------------------------------------------------------------//	
	Featured Video Meta Box		       	     	 
-------------------------------------------------------------------------------------------------------*/

add_action("admin_init", "admin_init_featurevid");
add_action('save_post', 'save_featurevid');

function admin_init_featurevid(){
	add_meta_box("featurevid-meta", __("Featured Video Embed Code", 'organicthemes'), "meta_options_featurevid", "post", "normal", "high");
}

function meta_options_featurevid(){
	global $post;
	$custom = get_post_custom($post->ID);
	$featurevid = isset( $custom["featurevid"] ) ? esc_attr( $custom["featurevid"][0] ) : '';

	echo '<textarea name="featurevid" cols="60" rows="4" style="width:97.6%" />'.$featurevid.'</textarea>';
}

function save_featurevid($post_id){
	global $post;
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }
	if ( isset($_POST["featurevid"]) ) { 
		update_post_meta($post->ID, "featurevid", $_POST["featurevid"]); 
	}
}

/*-----------------------------------------------------------------------------------------------------//	
	Add Home Link To Custom Menu		       	     	 
-------------------------------------------------------------------------------------------------------*/

function home_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter('wp_page_menu_args', 'home_page_menu_args');

/*-----------------------------------------------------------------------------------------------------//	
	Strip inline width and height attributes from WP generated images		       	     	 
-------------------------------------------------------------------------------------------------------*/
 
function remove_thumbnail_dimensions( $html ) { 
	$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html ); 
	return $html; 
	}
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 ); 
add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );

/*-----------------------------------------------------------------------------------------------------//
	Body Class
-------------------------------------------------------------------------------------------------------*/

function adventure_body_class( $classes ) {
	if ( is_singular() )
		$classes[] = 'adventure-singular';

	if ( is_active_sidebar( 'right-sidebar' ) )
		$classes[] = 'adventure-right-sidebar';

	if ( '' != get_theme_mod( 'background_image' ) ) {
		// This class will render when a background image is set
		// regardless of whether the user has set a color as well.
		$classes[] = 'adventure-background-image';
	} else if ( ! in_array( get_background_color(), array( '', get_theme_support( 'custom-background', 'default-color' ) ) ) ) {
		// This class will render when a background color is set
		// but no image is set. In the case the content text will
		// Adjust relative to the background color.
		$classes[] = 'adventure-relative-text';
	}

	return $classes;
}
add_action( 'body_class', 'adventure_body_class' );


/**
* Filters wp_title to print a neat <title> tag based on what is being viewed.
*/
function adventure_wp_title( $title, $sep ) {
	global $page, $paged;

	if ( is_feed() )
		return $title;

	// Add the blog name
	$title .= get_bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " $sep $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		$title .= " $sep " . sprintf( __( 'Page %s', 'adventure' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'adventure_wp_title', 10, 2 );

/*-----------------------------------------------------------------------------------------------------//
	Includes
-------------------------------------------------------------------------------------------------------*/

require_once( get_template_directory() . '/includes/theme-updater.php' );
require_once( get_template_directory() . '/includes/customizer.php' );
require_once( get_template_directory() . '/includes/typefaces.php' );
include_once( get_template_directory() . '/organic-shortcodes/organic-shortcodes.php' );