<?php
/**
 * Contact page map assets.
 *
 * @package ETOS
 */

defined( 'ABSPATH' ) || exit;

/**
 * Load Leaflet only on the contact page.
 */
function etos_enqueue_contact_map_assets() {

	if ( ! is_page_template( 'page-templates/template-contact.php' ) ) {
		return;
	}

	wp_enqueue_style(
		'etos-leaflet',
		'https://unpkg.com/leaflet@1.9.4/dist/leaflet.css',
		array(),
		'1.9.4'
	);

	wp_enqueue_script(
		'etos-leaflet',
		'https://unpkg.com/leaflet@1.9.4/dist/leaflet.js',
		array(),
		'1.9.4',
		true
	);

	$script = <<<'JS'
document.addEventListener('DOMContentLoaded', function () {
	const mapElement = document.getElementById('etos-contact-map');

	if (!mapElement || typeof L === 'undefined') {
		return;
	}

	const lat = parseFloat(mapElement.dataset.lat);
	const lng = parseFloat(mapElement.dataset.lng);
	const zoom = parseInt(mapElement.dataset.zoom, 10) || 15;
	const label = mapElement.dataset.label || '';

	if (Number.isNaN(lat) || Number.isNaN(lng)) {
		return;
	}

	const map = L.map(mapElement, {
		scrollWheelZoom: false
	}).setView([lat, lng], zoom);

	L.tileLayer(
		'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
		{
			maxZoom: 19,
			attribution: '&copy; OpenStreetMap contributors'
		}
	).addTo(map);

	const marker = L.marker([lat, lng]).addTo(map);

	if (label) {
		marker.bindPopup(label);
	}
});
JS;

	wp_add_inline_script(
		'etos-leaflet',
		$script
	);
}

add_action(
	'wp_enqueue_scripts',
	'etos_enqueue_contact_map_assets',
	30
);
