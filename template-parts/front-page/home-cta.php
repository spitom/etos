<?php
/**
 * Front-page consultation CTA.
 *
 * @package ETOS
 */

defined( 'ABSPATH' ) || exit;

$front_page_id = get_queried_object_id();

/**
 * Read a front-page CTA field.
 *
 * @param string $name    Field name.
 * @param mixed  $default Default value.
 * @return mixed
 */
$get_home_cta_field = static function (
    $name,
    $default = ''
) use ( $front_page_id ) {
    $value = null;

    if ( function_exists( 'get_field' ) ) {
        $value = get_field(
            $name,
            $front_page_id
        );
    } elseif ( $front_page_id ) {
        $value = get_post_meta(
            $front_page_id,
            $name,
            true
        );
    }

    if (
        null === $value
        || false === $value
        || '' === $value
    ) {
        return $default;
    }

    return $value;
};

$cta_link = $get_home_cta_field(
    'etos_front_cta_link',
    array()
);

$cta_link = is_array( $cta_link )
    ? $cta_link
    : array();

$home_cta = array(
    'eyebrow' => trim(
        (string) $get_home_cta_field(
            'etos_front_cta_eyebrow',
            'Następny krok'
        )
    ),
    'title'   => trim(
        (string) $get_home_cta_field(
            'etos_front_cta_title',
            'Porozmawiajmy o tym, co dziś spowalnia Twoją firmę.'
        )
    ),
    'text'    => trim(
        (string) $get_home_cta_field(
            'etos_front_cta_text',
            'Podczas krótkiej rozmowy poznamy Twoje procesy, potrzeby i najważniejsze trudności. Następnie wskażemy rozwiązanie oraz rozsądny zakres kolejnych działań.'
        )
    ),
    'button'  => trim(
        (string) (
            $cta_link['title']
            ?? 'Umów rozmowę z doradcą'
        )
    ),
    'note'    => trim(
        (string) $get_home_cta_field(
            'etos_front_cta_note',
            'Bez zobowiązań. Z konkretną rekomendacją kolejnego kroku.'
        )
    ),
    'url'     => trim(
        (string) (
            $cta_link['url']
            ?? home_url( '/kontakt/' )
        )
    ),
    'target'  => '_blank' === (
        $cta_link['target']
        ?? ''
    )
        ? '_blank'
        : '',
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
