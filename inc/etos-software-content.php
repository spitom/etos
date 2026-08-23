<?php
/**
 * Structured software content helpers.
 *
 * Provides an ACF Pro data layer while keeping the theme operational
 * when ACF Pro is unavailable.
 *
 * @package ETOS
 */

defined( 'ABSPATH' ) || exit;

/**
 * Check whether the ACF Pro repeater field type is available.
 *
 * @return bool
 */
function etos_software_acf_pro_available() {
    if ( ! function_exists( 'acf_get_field_type' ) ) {
        return false;
    }

    return false !== acf_get_field_type( 'repeater' );
}

/**
 * Check whether a field value contains meaningful content.
 *
 * Empty arrays, placeholder rows and false boolean values do not count
 * as frontend content.
 *
 * @param mixed $value Field value.
 * @return bool
 */
function etos_software_value_has_content( $value ) {
    if ( is_array( $value ) ) {
        foreach ( $value as $item ) {
            if ( etos_software_value_has_content( $item ) ) {
                return true;
            }
        }

        return false;
    }

    if ( is_object( $value ) ) {
        return true;
    }

    if ( is_bool( $value ) ) {
        return $value;
    }

    if ( is_int( $value ) || is_float( $value ) ) {
        return 0 !== (int) $value;
    }

    return '' !== trim(
        wp_strip_all_tags(
            (string) $value
        )
    );
}

/**
 * Read a software field with a direct post-meta fallback.
 *
 * This keeps standard ACF fields operational even when ACF is temporarily
 * unavailable. Repeater fields are handled separately.
 *
 * @param int    $post_id    Software post ID.
 * @param string $field_name ACF field name.
 * @param mixed  $default    Default value.
 * @return mixed
 */
function etos_get_software_field( $post_id, $field_name, $default = null ) {
    $value = null;

    if ( function_exists( 'get_field' ) ) {
        $value = get_field( $field_name, $post_id );
    }

    if ( ! etos_software_value_has_content( $value ) ) {
        $meta_value = get_post_meta(
            $post_id,
            $field_name,
            true
        );

        if ( etos_software_value_has_content( $meta_value ) ) {
            $value = $meta_value;
        }
    }

    return etos_software_value_has_content( $value )
        ? $value
        : $default;
}

/**
 * Read non-empty rows from an ACF Pro repeater.
 *
 * Returns an empty array when ACF Pro is unavailable, allowing the template
 * to use Gutenberg as its fallback.
 *
 * @param int    $post_id    Software post ID.
 * @param string $field_name Repeater field name.
 * @return array
 */
function etos_get_software_repeater_rows( $post_id, $field_name ) {
    if (
        ! etos_software_acf_pro_available()
        || ! function_exists( 'get_field' )
    ) {
        return array();
    }

    $rows = get_field( $field_name, $post_id );

    if ( ! is_array( $rows ) ) {
        return array();
    }

    return array_values(
        array_filter(
            $rows,
            'etos_software_value_has_content'
        )
    );
}

/**
 * Return the field names used by structured software sections.
 *
 * These names form the contract between the PHP templates and the future
 * ACF Pro field group.
 *
 * @return array
 */
function etos_get_software_section_field_map() {
    return array(
        'benefits' => 'etos_software_benefits',
        'features' => 'etos_software_features',
        'addons'   => 'etos_software_addons',
        'packages' => 'etos_software_packages',
    );
}

/**
 * Return all structured ACF Pro sections for one software entry.
 *
 * @param int $post_id Software post ID.
 * @return array
 */
function etos_get_software_structured_sections( $post_id ) {
    $sections = array();

    foreach ( etos_get_software_section_field_map() as $section => $field_name ) {
        $sections[ $section ] = etos_get_software_repeater_rows(
            $post_id,
            $field_name
        );
    }

    return $sections;
}

/**
 * Normalize an ACF image value to an attachment ID.
 *
 * Supports ID and array return formats.
 *
 * @param mixed $image Image field value.
 * @return int
 */
function etos_get_software_image_id( $image ) {
    if ( is_numeric( $image ) ) {
        return (int) $image;
    }

    if ( is_array( $image ) ) {
        if ( ! empty( $image['ID'] ) ) {
            return (int) $image['ID'];
        }

        if ( ! empty( $image['id'] ) ) {
            return (int) $image['id'];
        }
    }

    return 0;
}

/**
 * Normalize an ACF link value.
 *
 * @param mixed  $link           Link value.
 * @param string $fallback_url   Fallback URL.
 * @param string $fallback_title Fallback label.
 * @return array
 */
function etos_normalize_software_link(
    $link,
    $fallback_url = '',
    $fallback_title = ''
) {
    if ( is_string( $link ) ) {
        $link = array(
            'url' => $link,
        );
    }

    $link = is_array( $link )
        ? $link
        : array();

    $url = ! empty( $link['url'] )
        ? trim( (string) $link['url'] )
        : $fallback_url;

    $title = ! empty( $link['title'] )
        ? trim( (string) $link['title'] )
        : $fallback_title;

    $target = isset( $link['target'] )
        && '_blank' === $link['target']
            ? '_blank'
            : '';

    return array(
        'url'    => $url,
        'title'  => $title,
        'target' => $target,
    );
}