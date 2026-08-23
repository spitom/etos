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
	add_theme_support( 'editor-styles' );
	add_editor_style( 'css/custom-editor-style.css' );
	add_theme_support( 'responsive-embeds' );
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


/**
 * Global ACF options pages.
 */
function etos_register_acf_options_pages() {

    if ( ! function_exists( 'acf_add_options_page' ) ) {
        return;
    }

    acf_add_options_page(
        array(
            'page_title' => __( 'Ustawienia stopki', 'etos' ),
            'menu_title' => __( 'Stopka', 'etos' ),
            'menu_slug'  => 'etos-footer-settings',
            'capability' => 'edit_theme_options',
            'redirect'   => false,
            'position'   => 61,
            'icon_url'   => 'dashicons-editor-kitchensink',
        )
    );
}
add_action( 'acf/init', 'etos_register_acf_options_pages' );
