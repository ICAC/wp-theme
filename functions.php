<?php

require('includes/comment.php');
require('includes/nav.php');
require('includes/meta.php');

function icac_setup() {
	register_nav_menu( 'primary', __( 'Primary Menu', 'icac' ) );
	
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );
}
add_action( 'after_setup_theme', 'icac_setup' );

function icac_setup_css() {
	$protocol = is_ssl() ? 'https' : 'http';
	wp_enqueue_style( 'fonts', esc_url_raw( "$protocol://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700" ), array(), null );


	wp_register_style( 'bootstrap', get_template_directory_uri() . '/css/screen.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'bootstrap' );
	
	wp_register_style( 'temp', get_template_directory_uri() . '/css/temp.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'temp' );
}
add_action( 'wp_enqueue_scripts', 'icac_setup_css' );

function theme_js(){
	wp_register_script( 'bootstrap',
		get_template_directory_uri() . '/js/bootstrap.min.js',
		array('jquery'),
		'1.2' );
	wp_enqueue_script('bootstrap');

	wp_register_script( 'modernizr',
		get_template_directory_uri() . '/js/modernizr.min.js',
		array('jquery'),
		'1.2' );
	wp_enqueue_script('modernizr');
}
add_action( 'wp_enqueue_scripts', 'theme_js' );


function icac_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'icac' ),
		'id' => 'sidebar-1',
		'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'icac' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'First Front Page Widget Area', 'icac' ),
		'id' => 'sidebar-2',
		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'icac' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Second Front Page Widget Area', 'icac' ),
		'id' => 'sidebar-3',
		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'icac' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'icac_widgets_init' );

function icac_wp_title( $title )
{
  if( empty( $title ) && ( is_home() || is_front_page() ) ) {
    return __( 'Home', 'theme_domain' ) . ' | ' . get_bloginfo( 'description' );
  }
  return $title;
}
add_filter( 'wp_title', 'icac_wp_title' );