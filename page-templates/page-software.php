<?php
/**
 * Template Name: Software Product Page
 *
 * @package etos
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="wrapper" id="content" tabindex="-1">
    <main class="site-main" id="main" role="main">

        <?php
        // Definiujemy tablicę naszych 9 sekcji (Hero + 8 wymaganych)
        $software_sections = array(
            'hero',
            'target',       // Dla kogo
            'modules',      // Moduły
            'cases',        // Wdrożenia
            'integrations', // Integracje
            'training',     // Szkolenia
            'support',      // Support
            'faq',          // FAQ
            'cta'           // Call To Action
        );

        // Ładujemy po kolei każdą sekcję jako osobny partial
        foreach ( $software_sections as $section ) {
            get_template_part( 'template-parts/software/section', $section );
        }
        ?>

    </main>
</div>

<?php
get_footer();