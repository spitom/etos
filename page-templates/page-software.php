<?php
/**
 * Template Name: Software Product Page
 *
 * @package etos
 */

defined( 'ABSPATH' ) || exit;

get_header();

$software_product = 'symfonia';

$software_sections = array(
    'hero',
    'target',
    'modules',
    'cases',
    'integrations',
    'training',
    'support',
    'faq',
    'cta',
);
?>

<div class="wrapper" id="content" tabindex="-1">
    <main class="site-main site-main--software site-main--software-symfonia" id="main" role="main">

        <?php
        foreach ( $software_sections as $section ) {
            get_template_part(
                'template-parts/software/symfonia/section',
                $section,
                array(
                    'product' => $software_product,
                )
            );
        }
        ?>

    </main>
</div>

<?php

$GLOBALS['etos_footer_cta'] = array(
    'eyebrow' => 'Symfonia ERP z ETOS',
    'title'   => 'Sprawdź, jak Symfonia może uporządkować pracę Twojej firmy.',
    'text'    => 'Porozmawiaj z konsultantem o modułach, wdrożeniu, szkoleniach i opiece po uruchomieniu.',
    'button'  => 'Umów konsultację',
    'url'     => '/kontakt/',
);

get_footer();