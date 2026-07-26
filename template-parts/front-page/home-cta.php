<?php
/**
 * Front-page consultation CTA.
 *
 * @package ETOS
 */

defined( 'ABSPATH' ) || exit;

$home_cta = array(
    'eyebrow' => __( 'Następny krok', 'etos' ),
    'title'   => __(
        'Porozmawiajmy o tym, co dziś spowalnia Twoją firmę.',
        'etos'
    ),
    'text'    => __(
        'Podczas krótkiej rozmowy poznamy Twoje procesy, potrzeby i najważniejsze trudności. Następnie wskażemy rozwiązanie oraz rozsądny zakres kolejnych działań.',
        'etos'
    ),
    'button'  => __( 'Umów rozmowę z doradcą', 'etos' ),
    'note'    => __(
        'Bez zobowiązań. Z konkretną rekomendacją kolejnego kroku.',
        'etos'
    ),
    'url'     => home_url( '/kontakt/' ),
    'class'   => 'etos-cta-panel--home',
);
?>

<section
    class="etos-home-cta"
    aria-label="<?php esc_attr_e(
        'Rozmowa z doradcą ETOS',
        'etos'
    ); ?>"
>

    <div class="container etos-container">

        <?php
        get_template_part(
            'template-parts/components/cta',
            'panel',
            array(
                'cta' => $home_cta,
            )
        );
        ?>

    </div>

</section>

<?php
/*
 * CTA zostało wyświetlone na stronie głównej.
 * Nie wyświetlamy jego drugiej kopii w footerze.
 */
$GLOBALS['etos_footer_cta_hide'] = true;