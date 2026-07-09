<?php
/**
 * Template Name: Software Product Page
 *
 * @package etos
 */

defined( 'ABSPATH' ) || exit;

get_header();

$product_slug = get_post_field( 'post_name', get_the_ID() );

$data_file = locate_template( 'template-parts/software/data/' . $product_slug . '.php' );

if ( ! $data_file ) {
    $data_file = locate_template( 'template-parts/software/data/symfonia.php' );
}

$software = require $data_file;

$sections = array(
    'hero',
    'overview',
    'modules',
    'cta',
);
?>

<div class="wrapper" id="content" tabindex="-1">
    <main
        class="site-main site-main--software software-page software-page--<?php echo esc_attr( $software['variant'] ); ?>"
        id="main"
        role="main"
        style="--software-color: <?php echo esc_attr( $software['color'] ); ?>; --software-rgb: <?php echo esc_attr( $software['rgb'] ); ?>; --software-soft: <?php echo esc_attr( $software['soft'] ); ?>;"
    >
        <?php
        foreach ( $sections as $section ) {
            get_template_part(
                'template-parts/software/section',
                $section,
                array(
                    'software' => $software,
                )
            );
        }
        ?>
    </main>
</div>

<?php

if ( ! empty( $software['cta'] ) ) {
    $GLOBALS['etos_footer_cta'] = $software['cta'];
}

get_footer();