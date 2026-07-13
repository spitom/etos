<?php
/**
 * Advanced Custom Fields configuration.
 *
 * @package ETOS
 */

defined( 'ABSPATH' ) || exit;

/**
 * Save ACF field groups in the child theme.
 *
 * @param string $path Default ACF JSON save path.
 * @return string
 */
function etos_acf_json_save_path( $path ) {
	unset( $path );

	return get_stylesheet_directory() . '/acf-json';
}
add_filter( 'acf/settings/save_json', 'etos_acf_json_save_path' );

/**
 * Load ACF field groups from the child theme.
 *
 * @param array $paths ACF JSON load paths.
 * @return array
 */
function etos_acf_json_load_paths( $paths ) {
	$theme_path = get_stylesheet_directory() . '/acf-json';

	if ( ! in_array( $theme_path, $paths, true ) ) {
		$paths[] = $theme_path;
	}

	return $paths;
}
add_filter( 'acf/settings/load_json', 'etos_acf_json_load_paths' );
