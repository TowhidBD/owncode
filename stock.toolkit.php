<?php
/*
Plugin Name:  Stock Toolkit 
*/
// Exit if accessed directly
if (! defined('ABSPATH')) {
    exit;
}
// Define
define('STOCK_ACC_URL', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__)) . '/');
define('STOCK_ACC_PATH', plugin_dir_path( __FILE__));
// Register custom post & custom taxonomy 
add_action( 'init', 'stock_theme_custom_post' );
function stock_theme_custom_post() {
    register_post_type( 'testimonial',
        array(
            'labels' => array(
                'name' => __( 'Testimonials' ),
                'singular_name' => __( 'Testimonial' )
            ),
            'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
            'public' => false,
            'show_ui' => true
        )
    );
}
// Print shortcodes in widgets
add_filter('widget_text', 'do_shortcode');
// Loading VC addons
require_once( STOCK_ACC_PATH . 'vc-addons/vc-blocks-load.php');
//Theme shortcodes
require_once( STOCK_ACC_PATH . 'theme-shortcodes/slides-shortcode.php');
//Shortcodes depended on Visual Composer
include_once(ABSPATH . 'wp-admin/includes/plugin.php');
if (is_plugin_active('js_composer/js_composer.php')){
    require_once( STOCK_ACC_PATH . 'theme-shortcodes/staff-shortcode.php');
}
//Registering stock toolkit files
function stock_toolkit_files(){
    wp_enqueue_style( 'owl-carousel', plugin_dir_url( __FILE__ ). 'assets/css/owl.carousel.css');
    wp_enqueue_script( 'owl-carousel', plugin_dir_url( __FILE__ ). 'assets/js/owl.carousel.min.js', array('jquery'), '20120206', true);
}
add_action('wp_enqueue_scripts', 'stock_toolkit_files');
