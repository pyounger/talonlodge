<?php
/**
* Google Fonts Implementation
*
* @package Adventure
* @since Adventure 1.0
*
*/

/**
* Register Google Fonts
*
* @since Adventure 1.0
*/
function organic_register_fonts() {
	$protocol = is_ssl() ? 'https' : 'http';
	wp_register_style( 'adventure_roboto', "$protocol://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic" );
	wp_register_style( 'adventure_open_sans', "$protocol://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800,800italic,700italic,600italic,400italic,300italic" );
	wp_register_style( 'adventure_lora', "$protocol://fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic" );
}
add_action( 'init', 'organic_register_fonts' );

/**
* Enqueue Google Fonts on Front End
*
* @since Adventure 1.0
*/

function organic_fonts() {
	wp_enqueue_style( 'adventure_roboto' );
	wp_enqueue_style( 'adventure_open_sans' );
	wp_enqueue_style( 'adventure_lora' );
}
add_action( 'wp_enqueue_scripts', 'organic_fonts' );

/**
* Enqueue Google Fonts on Custom Header Page
*
* @since Adventure 1.0
*/
function organic_admin_fonts( $hook_suffix ) {
	if ( 'appearance_page_custom-header' != $hook_suffix )
	return;
	
	wp_enqueue_style( 'adventure_roboto' );
	wp_enqueue_style( 'adventure_open_sans' );
	wp_enqueue_style( 'adventure_lora' );
}
add_action( 'admin_enqueue_scripts', 'organic_admin_fonts' );

/**
* Add Google Scripts for use with the editor
*
* @since Adventure 2.0
*/
function organic_mce_google_fonts_styles() {
	$protocol = is_ssl() ? 'https' : 'http';
	
	$open_sans_url = "$protocol://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800,800italic,700italic,600italic,400italic,300italic";
		add_editor_style( esc_url_raw( str_replace( ',', '%2C', $open_sans_url ) ) );
	
	$roboto_url = "$protocol://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic";
		add_editor_style( esc_url_raw( str_replace( ',', '%2C', $roboto_url ) ) );
		
	$lora_url = "$protocol://fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic";
		add_editor_style( esc_url_raw( str_replace( ',', '%2C', $lora_url ) ) );
}
add_action( 'init', 'organic_mce_google_fonts_styles' );