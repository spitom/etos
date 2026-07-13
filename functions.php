<?php
/**
 * ETOS child theme bootstrap.
 *
 * @package ETOS
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Remove the parent theme's compiled stylesheet and script.
 */
function etos_remove_parent_assets() {
	wp_dequeue_style( 'understrap-styles' );
	wp_deregister_style( 'understrap-styles' );

	wp_dequeue_script( 'understrap-scripts' );
	wp_deregister_script( 'understrap-scripts' );
}
add_action( 'wp_enqueue_scripts', 'etos_remove_parent_assets', 20 );

/**
 * Load the ETOS translation files.
 */
function etos_load_textdomain() {
	load_child_theme_textdomain( 'etos', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'etos_load_textdomain' );

/**
 * Use Bootstrap 5 as the default Understrap compatibility mode.
 *
 * @return string
 */
function etos_default_bootstrap_version() {
	return 'bootstrap5';
}
add_filter( 'theme_mod_understrap_bootstrap_version', 'etos_default_bootstrap_version', 20 );

require_once get_stylesheet_directory() . '/inc/etos-assets.php';
require_once get_stylesheet_directory() . '/inc/etos-theme-setup.php';
require_once get_stylesheet_directory() . '/inc/etos-content-types.php';
require_once get_stylesheet_directory() . '/inc/etos-erp-helpers.php';
add_action( 'wp_enqueue_scripts', 'etos_enqueue_theme_assets' );
