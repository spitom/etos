<?php
defined( 'ABSPATH' ) || exit;

/**
 * Theme setup.
 */
function etos_theme_setup() {

	register_nav_menus(
			array(
				'primary' => __( 'Menu Główne (Header)', 'etos' ),
				'footer'  => __( 'Menu w Stopce', 'etos' ),
			)
		);

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'editor-styles' );
	add_editor_style( 'css/custom-editor-style.css' );
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

}
add_action( 'after_setup_theme', 'etos_theme_setup', 20 );
