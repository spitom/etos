<?php
/**
 * ERP suite component.
 *
 * Expected arguments:
 * name, logo, image, image_alt, title, url, cta,
 * accent, products, reverse.
 *
 * @package etos
 */

defined( 'ABSPATH' ) || exit;

$defaults = array(
	'name'      => '',
	'logo'      => '',
	'image'     => '',
	'image_alt' => '',
	'title'     => '',
	'url'       => '',
	'cta'       => '',
	'accent'    => '#00A0E3',
	'products'  => array(),
	'reverse'   => false,
);

$data = wp_parse_args( $args ?? array(), $defaults );

$name       = sanitize_html_class( $data['name'] );
$accent     = sanitize_hex_color( $data['accent'] ) ?: '#00A0E3';
$accent_rgb = etos_hex_to_rgb( $accent );

$classes = array(
	'etos-erp-suite',
	'etos-erp-suite--' . $name,
);

if ( $data['reverse'] ) {
	$classes[] = 'etos-erp-suite--reverse';
}
?>

<article
	class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>"
	style="
		--suite-color: <?php echo esc_attr( $accent ); ?>;
		--suite-rgb: <?php echo esc_attr( $accent_rgb ); ?>;
	"
>
	<div class="etos-erp-suite__content">

		<?php if ( $data['logo'] ) : ?>
			<img
				class="etos-erp-suite__logo"
				src="<?php echo esc_url( $data['logo'] ); ?>"
				alt="<?php echo esc_attr( ucfirst( $data['name'] ) ); ?>"
				loading="lazy"
			>
		<?php endif; ?>

		<?php if ( $data['title'] ) : ?>
			<h3 class="etos-erp-suite__title">
				<?php echo esc_html( $data['title'] ); ?>
			</h3>
		<?php endif; ?>

		<?php if ( $data['url'] && $data['cta'] ) : ?>
			<a
				class="etos-erp-suite__main-link"
				href="<?php echo esc_url( $data['url'] ); ?>"
			>
				<?php echo esc_html( $data['cta'] ); ?>
				<span aria-hidden="true">→</span>
			</a>
		<?php endif; ?>

		<?php if ( $data['products'] ) : ?>
			<div class="etos-erp-suite__modules" aria-label="<?php echo esc_attr( 'Produkty ' . $data['name'] ); ?>">

				<?php foreach ( $data['products'] as $product ) : ?>
					<?php
					$product_label = isset( $product['label'] )
						? trim( (string) $product['label'] )
						: '';

					$product_url = isset( $product['url'] )
						? trim( (string) $product['url'] )
						: '';

					if ( '' === $product_label || '' === $product_url ) {
						continue;
					}
					?>

					<a
						class="etos-erp-module"
						href="<?php echo esc_url( $product_url ); ?>"
					>
						<?php echo esc_html( $product_label ); ?>
					</a>
				<?php endforeach; ?>

			</div>
		<?php endif; ?>

	</div>

	<?php if ( $data['image'] ) : ?>
		<figure class="etos-erp-suite__media">
			<img
				src="<?php echo esc_url( $data['image'] ); ?>"
				alt="<?php echo esc_attr( $data['image_alt'] ); ?>"
				loading="lazy"
			>
		</figure>
	<?php endif; ?>

</article>