<?php
/**
 * Custom post types and taxonomies.
 *
 * @package ETOS
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register software, services and software vendors.
 */
function etos_register_content_types() {
	register_post_type(
		'etos_software',
		array(
			'labels' => array(
				'name'                  => __( 'Oprogramowanie', 'etos' ),
				'singular_name'         => __( 'Program', 'etos' ),
				'menu_name'             => __( 'Oprogramowanie', 'etos' ),
				'name_admin_bar'        => __( 'Program', 'etos' ),
				'add_new'               => __( 'Dodaj program', 'etos' ),
				'add_new_item'          => __( 'Dodaj nowy program', 'etos' ),
				'edit_item'             => __( 'Edytuj program', 'etos' ),
				'new_item'              => __( 'Nowy program', 'etos' ),
				'view_item'             => __( 'Zobacz program', 'etos' ),
				'view_items'            => __( 'Zobacz oprogramowanie', 'etos' ),
				'search_items'          => __( 'Szukaj oprogramowania', 'etos' ),
				'not_found'             => __( 'Nie znaleziono programów.', 'etos' ),
				'not_found_in_trash'    => __( 'Nie znaleziono programów w koszu.', 'etos' ),
				'all_items'             => __( 'Wszystkie programy', 'etos' ),
				'archives'              => __( 'Archiwum oprogramowania', 'etos' ),
				'attributes'            => __( 'Atrybuty programu', 'etos' ),
				'insert_into_item'      => __( 'Wstaw do programu', 'etos' ),
				'uploaded_to_this_item' => __( 'Przesłano do tego programu', 'etos' ),
				'featured_image'        => __( 'Grafika programu', 'etos' ),
				'set_featured_image'    => __( 'Ustaw grafikę programu', 'etos' ),
				'remove_featured_image' => __( 'Usuń grafikę programu', 'etos' ),
				'use_featured_image'    => __( 'Użyj jako grafiki programu', 'etos' ),
			),
			'public'              => true,
			'publicly_queryable'  => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'show_in_rest'        => true,
			'exclude_from_search' => false,
			'has_archive'         => 'oprogramowanie',
			'rewrite'             => array(
				'slug'       => 'oprogramowanie',
				'with_front' => false,
			),
			'menu_position'       => 20,
			'menu_icon'           => 'dashicons-laptop',
			'supports'            => array(
				'title',
				'editor',
				'excerpt',
				'thumbnail',
				'page-attributes',
			),
		)
	);

	register_post_type(
		'etos_service',
		array(
			'labels' => array(
				'name'                  => __( 'Usługi', 'etos' ),
				'singular_name'         => __( 'Usługa', 'etos' ),
				'menu_name'             => __( 'Usługi', 'etos' ),
				'name_admin_bar'        => __( 'Usługa', 'etos' ),
				'add_new'               => __( 'Dodaj usługę', 'etos' ),
				'add_new_item'          => __( 'Dodaj nową usługę', 'etos' ),
				'edit_item'             => __( 'Edytuj usługę', 'etos' ),
				'new_item'              => __( 'Nowa usługa', 'etos' ),
				'view_item'             => __( 'Zobacz usługę', 'etos' ),
				'view_items'            => __( 'Zobacz usługi', 'etos' ),
				'search_items'          => __( 'Szukaj usług', 'etos' ),
				'not_found'             => __( 'Nie znaleziono usług.', 'etos' ),
				'not_found_in_trash'    => __( 'Nie znaleziono usług w koszu.', 'etos' ),
				'all_items'             => __( 'Wszystkie usługi', 'etos' ),
				'archives'              => __( 'Archiwum usług', 'etos' ),
				'attributes'            => __( 'Atrybuty usługi', 'etos' ),
				'insert_into_item'      => __( 'Wstaw do usługi', 'etos' ),
				'uploaded_to_this_item' => __( 'Przesłano do tej usługi', 'etos' ),
				'featured_image'        => __( 'Grafika usługi', 'etos' ),
				'set_featured_image'    => __( 'Ustaw grafikę usługi', 'etos' ),
				'remove_featured_image' => __( 'Usuń grafikę usługi', 'etos' ),
				'use_featured_image'    => __( 'Użyj jako grafiki usługi', 'etos' ),
			),
			'public'              => true,
			'publicly_queryable'  => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'show_in_rest'        => true,
			'exclude_from_search' => false,
			'has_archive'         => 'uslugi',
			'rewrite'             => array(
				'slug'       => 'uslugi',
				'with_front' => false,
			),
			'menu_position'       => 21,
			'menu_icon'           => 'dashicons-admin-tools',
			'supports'            => array(
				'title',
				'editor',
				'excerpt',
				'thumbnail',
				'page-attributes',
			),
		)
	);

	register_taxonomy(
		'etos_vendor',
		array( 'etos_software' ),
		array(
			'labels' => array(
				'name'              => __( 'Producenci', 'etos' ),
				'singular_name'     => __( 'Producent', 'etos' ),
				'search_items'      => __( 'Szukaj producentów', 'etos' ),
				'all_items'         => __( 'Wszyscy producenci', 'etos' ),
				'parent_item'       => __( 'Producent nadrzędny', 'etos' ),
				'parent_item_colon' => __( 'Producent nadrzędny:', 'etos' ),
				'edit_item'         => __( 'Edytuj producenta', 'etos' ),
				'update_item'       => __( 'Aktualizuj producenta', 'etos' ),
				'add_new_item'      => __( 'Dodaj nowego producenta', 'etos' ),
				'new_item_name'     => __( 'Nazwa nowego producenta', 'etos' ),
				'menu_name'         => __( 'Producenci', 'etos' ),
			),
			'public'             => true,
			'publicly_queryable' => true,
			'hierarchical'       => true,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'show_in_nav_menus'  => true,
			'show_in_rest'       => true,
			'rewrite'            => array(
				'slug'       => 'oprogramowanie/producent',
				'with_front' => false,
			),
		)
	);
}
add_action( 'init', 'etos_register_content_types' );
