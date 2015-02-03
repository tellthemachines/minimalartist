<?php

/**
 * Minimal artist functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link http://codex.wordpress.org/Theme_Development
 * @link http://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * @link http://codex.wordpress.org/Plugin_API
 *
 */

// Set content width value based on the theme's design
if ( ! isset( $content_width ) )
	$content_width = 900;


function minart_theme_features()  {
	global $wp_version;

	// Add theme support for title tag
	
	add_theme_support( 'title-tag' );

	// Add theme support for Automatic Feed Links
	add_theme_support( 'automatic-feed-links' );


	// Add theme support for Featured Images
	add_theme_support( 'post-thumbnails' );	

	 // Set custom thumbnail dimensions
	set_post_thumbnail_size( 400, 300, true );

	// Add theme support for Custom Background
	$background_args = array(
		'default-color'          => '',
		'default-image'          => '',
		'wp-head-callback'       => '_custom_background_cb',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
	);
	add_theme_support( 'custom-background', $background_args ); 
	
	//register header menu
	register_nav_menu( 'header-menu', __('Header Menu', 'minart') );
	
	// Add theme support for Semantic Markup
	$markup = array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', );
	add_theme_support( 'html5', $markup );	

	// Add theme support for Translation
	load_theme_textdomain( 'minart', get_template_directory() . '/languages' );	
}

// Hook into the 'after_setup_theme' action
add_action( 'after_setup_theme', 'minart_theme_features' );

// widget area

function minart_widgets_init() {

	register_sidebar( array(
	'name' => __('Right sidebar', 'minart'),
	'id' => 'rightside',
	'before_widget' => '<aside id="%1$s" class="cf widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h2 class="widgetit">',
	'after_title' => '</h2>',
	) );
	
	register_sidebar( array(
	'name' => __('Footer widgets', 'minart'),
	'id' => 'footerwidg',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h2 class="widgetit">',
	'after_title' => '</h2>',
	) );
	
}
add_action( 'widgets_init', 'minart_widgets_init' );

// make search submit screen-reader-only

function minart_mod_searchsubmit( $html ) {
	return str_replace( 'class="search-submit"', 'class="search-submit screen-reader-text"', $html );
}
add_filter( 'get_search_form', 'minart_mod_searchsubmit' );


// includes

require get_template_directory() . '/inc/customizer.php';

// load custom font from google fonts

function minart_load_fonts() {
	wp_register_style('googleFonts', 'http://fonts.googleapis.com/css?family=Raleway:600,700');
	wp_enqueue_style( 'googleFonts');
}

add_action('wp_print_styles', 'minart_load_fonts');

// add editor style

function minart_editor_styles() {

	add_editor_style( '/css/editor-style.css' );
}

add_action( 'init', 'minart_editor_styles' );

//enqueue scripts

function minart_scripts() {
	
	wp_enqueue_style( 'minart-style', get_stylesheet_uri() );
	
	wp_enqueue_script( 'minart-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20140825', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'minart_scripts' );
