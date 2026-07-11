<?php
/**
 * Helpers for ERP suites.
 *
 * @package etos
 */

defined( 'ABSPATH' ) || exit;

/**
 * Convert a hexadecimal colour to an RGB string.
 *
 * @param string $hex Hexadecimal colour.
 * @return string
 */
function etos_hex_to_rgb( $hex ) {
	$hex = ltrim( trim( (string) $hex ), '#' );

	if ( 3 === strlen( $hex ) ) {
		$hex = $hex[0] . $hex[0]
			. $hex[1] . $hex[1]
			. $hex[2] . $hex[2];
	}

	if ( 6 !== strlen( $hex ) || ! ctype_xdigit( $hex ) ) {
		return '0, 160, 227';
	}

	return implode(
		', ',
		array(
			hexdec( substr( $hex, 0, 2 ) ),
			hexdec( substr( $hex, 2, 2 ) ),
			hexdec( substr( $hex, 4, 2 ) ),
		)
	);
}

/**
 * Resolve an ACF image value returned as an array, attachment ID or URL.
 *
 * @param mixed  $image    ACF image value.
 * @param string $fallback Fallback URL.
 * @param string $size     WordPress image size.
 * @return string
 */
function etos_get_image_url( $image, $fallback = '', $size = 'full' ) {
	if ( is_array( $image ) && ! empty( $image['url'] ) ) {
		return $image['url'];
	}

	if ( is_numeric( $image ) ) {
		$url = wp_get_attachment_image_url( (int) $image, $size );

		if ( $url ) {
			return $url;
		}
	}

	if ( is_string( $image ) && filter_var( $image, FILTER_VALIDATE_URL ) ) {
		return $image;
	}

	return $fallback;
}

/**
 * Parse products written as:
 * Product name|/product-url/
 *
 * @param string $raw Raw textarea or fallback value.
 * @return array
 */
function etos_parse_erp_products( $raw ) {
	$products = array();
	$lines    = preg_split( '/\r\n|\r|\n/', (string) $raw );

	foreach ( $lines as $line ) {
		$line = trim( $line );

		if ( '' === $line || false === strpos( $line, '|' ) ) {
			continue;
		}

		list( $label, $url ) = array_pad(
			array_map(
				'trim',
				explode( '|', $line, 2 )
			),
			2,
			''
		);

		if ( '' === $label || '' === $url ) {
			continue;
		}

		$products[] = array(
			'label' => $label,
			'url'   => $url,
		);
	}

	return $products;
}