<?php
/**
 * Shared navigation data helpers.
 *
 * @package ETOS
 */

defined( 'ABSPATH' ) || exit;

/**
 * Return published services visible in ETOS navigation areas.
 *
 * Results are cached only for the duration of the current request so the
 * header and footer can reuse the same query without introducing persistent
 * cache invalidation concerns.
 *
 * @return WP_Post[]
 */
function etos_get_navigation_services() {
    static $services = null;

    if ( null !== $services ) {
        return $services;
    }

    $services = get_posts(
        array(
            'post_type'        => 'etos_service',
            'post_status'      => 'publish',
            'posts_per_page'   => -1,
            'orderby'          => array(
                'menu_order' => 'ASC',
                'title'      => 'ASC',
            ),
            'suppress_filters' => false,
        )
    );

    $services = array_values(
        array_filter(
            $services,
            static function ( $service ) {
                return '0' !== (string) get_post_meta(
                    $service->ID,
                    'etos_service_show_in_menu',
                    true
                );
            }
        )
    );

    return $services;
}

/**
 * Return navigation software grouped by vendor term ID.
 *
 * One query loads all published software visible in the mega menu.
 * Results are cached only for the duration of the current request.
 *
 * @return array<int, WP_Post[]>
 */
function etos_get_navigation_software_by_vendor() {
    static $software_by_vendor = null;

    if ( null !== $software_by_vendor ) {
        return $software_by_vendor;
    }

    $software_by_vendor = array();

    $software_posts = get_posts(
        array(
            'post_type'        => 'etos_software',
            'post_status'      => 'publish',
            'posts_per_page'   => -1,
            'orderby'          => array(
                'menu_order' => 'ASC',
                'title'      => 'ASC',
            ),
            'suppress_filters' => false,
        )
    );

    foreach ( $software_posts as $software_item ) {
        if (
            '0' === (string) get_post_meta(
                $software_item->ID,
                'etos_software_show_in_mega_menu',
                true
            )
        ) {
            continue;
        }

        $vendors = get_the_terms(
            $software_item->ID,
            'etos_vendor'
        );

        if (
            empty( $vendors )
            || is_wp_error( $vendors )
        ) {
            continue;
        }

        foreach ( $vendors as $vendor ) {
            $vendor_id = (int) $vendor->term_id;

            if ( ! isset( $software_by_vendor[ $vendor_id ] ) ) {
                $software_by_vendor[ $vendor_id ] = array();
            }

            $software_by_vendor[ $vendor_id ][] = $software_item;
        }
    }

    return $software_by_vendor;
}
