<?php
/**
 * Template for a single ETOS service.
 *
 * @package ETOS
 */

defined( 'ABSPATH' ) || exit;

get_header();

while ( have_posts() ) :
    the_post();

    $post_id = get_the_ID();

    /**
     * Read an ACF value with a post-meta fallback.
     *
     * @param string $field_name Field name.
     * @param mixed  $default    Default value.
     * @return mixed
     */
    $get_service_field = static function (
        $field_name,
        $default = ''
    ) use ( $post_id ) {
        $value = '';

        if ( function_exists( 'get_field' ) ) {
            $value = get_field( $field_name, $post_id );
        }

        if (
            '' === $value
            || null === $value
            || false === $value
        ) {
            $value = get_post_meta(
                $post_id,
                $field_name,
                true
            );
        }

        if (
            '' === $value
            || null === $value
            || false === $value
        ) {
            return $default;
        }

        return $value;
    };

    /**
     * Read an ACF repeater.
     *
     * Empty arrays are returned when ACF Pro is unavailable or when
     * a section has not yet been completed.
     *
     * @param string $field_name Field name.
     * @return array
     */
    $get_service_rows = static function (
        $field_name
    ) use ( $get_service_field ) {
        $rows = $get_service_field(
            $field_name,
            array()
        );

        return is_array( $rows )
            ? array_values(
                array_filter(
                    $rows,
                    'is_array'
                )
            )
            : array();
    };

    /**
     * Normalize an ACF link field.
     *
     * @param mixed  $link           Link value.
     * @param string $fallback_url   Fallback URL.
     * @param string $fallback_title Fallback label.
     * @return array
     */
    $normalize_link = static function (
        $link,
        $fallback_url = '',
        $fallback_title = ''
    ) {
        $link = is_array( $link )
            ? $link
            : array();

        $url = isset( $link['url'] )
            ? trim( (string) $link['url'] )
            : '';

        $title = isset( $link['title'] )
            ? trim( (string) $link['title'] )
            : '';

        $target = isset( $link['target'] )
            && '_blank' === $link['target']
                ? '_blank'
                : '';

        return array(
            'url'    => $url ?: $fallback_url,
            'title'  => $title ?: $fallback_title,
            'target' => $target,
        );
    };

    $variant = sanitize_key(
        (string) $get_service_field(
            'etos_service_template_variant',
            'solution'
        )
    );

    if ( ! in_array(
        $variant,
        array( 'solution', 'care' ),
        true
    ) ) {
        $variant = 'solution';
    }

    $kicker = trim(
        (string) $get_service_field(
            'etos_service_kicker',
            __( 'Usługi ETOS', 'etos' )
        )
    );

    $lead = trim(
        (string) $get_service_field(
            'etos_service_lead'
        )
    );

    if ( '' === $lead ) {
        $lead = trim(
            (string) get_post_field(
                'post_excerpt',
                $post_id
            )
        );
    }

    $lead = wp_strip_all_tags(
        strip_shortcodes( $lead ),
        true
    );

    $hero_image_id = absint(
        $get_service_field(
            'etos_service_hero_image'
        )
    );

    if ( ! $hero_image_id ) {
        $hero_image_id = get_post_thumbnail_id(
            $post_id
        );
    }

    $image_fit = (string) $get_service_field(
        'etos_service_hero_image_fit',
        'cover'
    );

    if ( ! in_array(
        $image_fit,
        array( 'cover', 'contain' ),
        true
    ) ) {
        $image_fit = 'cover';
    }

    $image_scale = absint(
        $get_service_field(
            'etos_service_hero_image_scale',
            100
        )
    );

    $image_x = absint(
        $get_service_field(
            'etos_service_hero_image_x',
            50
        )
    );

    $image_y = absint(
        $get_service_field(
            'etos_service_hero_image_y',
            50
        )
    );

    $image_scale = min(
        160,
        max( 100, $image_scale )
    );

    $image_x = min(
        100,
        max( 0, $image_x )
    );

    $image_y = min(
        100,
        max( 0, $image_y )
    );

    $image_style = sprintf(
        '--etos-service-image-fit:%1$s;'
        . '--etos-service-image-scale:%2$s;'
        . '--etos-service-image-x:%3$d%%;'
        . '--etos-service-image-y:%4$d%%;',
        $image_fit,
        number_format(
            $image_scale / 100,
            2,
            '.',
            ''
        ),
        $image_x,
        $image_y
    );

    $contact_page = get_page_by_path( 'kontakt' );

    $contact_url = $contact_page
        ? get_permalink( $contact_page )
        : home_url( '/kontakt/' );

    $primary_cta = $normalize_link(
        $get_service_field(
            'etos_service_primary_cta'
        ),
        $contact_url,
        __( 'Zapytaj o szczegóły', 'etos' )
    );

    $cta_title = trim(
        (string) $get_service_field(
            'etos_service_cta_title',
            __(
                'Porozmawiajmy o rozwiązaniu dla Twojej firmy.',
                'etos'
            )
        )
    );

    $cta_text = trim(
        (string) $get_service_field(
            'etos_service_cta_text',
            __(
                'Poznamy Twoje potrzeby i zaproponujemy rozsądny zakres kolejnych działań.',
                'etos'
            )
        )
    );

    $cta_link = $normalize_link(
        $get_service_field(
            'etos_service_cta_link'
        ),
        $contact_url,
        __( 'Umów rozmowę z doradcą', 'etos' )
    );

    $GLOBALS['etos_footer_cta_hide'] = ( 'care' === $variant );

$GLOBALS['etos_footer_cta'] = array(
        'eyebrow' => __( 'Następny krok', 'etos' ),
        'title'   => $cta_title,
        'text'    => $cta_text,
        'button'  => $cta_link['title'],
        'url'     => $cta_link['url'],
        'class'   => 'etos-cta-panel--service',
    );

    $solution_data = array(
        'reasons_heading' => trim(
            (string) $get_service_field(
                'etos_service_reasons_heading',
                __(
                    'Dlaczego warto wybrać nasze usługi?',
                    'etos'
                )
            )
        ),
        'reasons'         => $get_service_rows(
            'etos_service_reasons'
        ),
        'access_heading'  => trim(
            (string) $get_service_field(
                'etos_service_access_heading',
                __(
                    'Jesteśmy blisko Twojej firmy.',
                    'etos'
                )
            )
        ),
        'access'          => $get_service_rows(
            'etos_service_access'
        ),
        'benefits_heading' => trim(
            (string) $get_service_field(
                'etos_service_benefits_heading',
                __(
                    'Co zyskuje Twoja firma?',
                    'etos'
                )
            )
        ),
        'benefits'        => $get_service_rows(
            'etos_service_benefits'
        ),
    );
    $care_data = array(
        'modes_heading' => trim(
            (string) $get_service_field(
                'etos_service_care_modes_heading',
                __(
                    'Wybierz formę współpracy.',
                    'etos'
                )
            )
        ),
        'modes_intro' => trim(
            (string) $get_service_field(
                'etos_service_care_modes_intro'
            )
        ),
        'modes' => $get_service_rows(
            'etos_service_care_modes'
        ),
        'comparison_heading' => trim(
            (string) $get_service_field(
                'etos_service_care_comparison_heading',
                __(
                    'Porównaj dostępne formy opieki.',
                    'etos'
                )
            )
        ),
        'comparison_intro' => trim(
            (string) $get_service_field(
                'etos_service_care_comparison_intro'
            )
        ),
        'comparison' => $get_service_rows(
            'etos_service_care_comparison'
        ),
        'recommendations_heading' => trim(
            (string) $get_service_field(
                'etos_service_care_recommendations_heading',
                __(
                    'Nadal nie wiesz, która opcja będzie najlepsza?',
                    'etos'
                )
            )
        ),
        'recommendations' => $get_service_rows(
            'etos_service_care_recommendations'
        ),
        'stats_heading' => trim(
            (string) $get_service_field(
                'etos_service_care_stats_heading',
                __(
                    'Dlaczego ETOS?',
                    'etos'
                )
            )
        ),
        'stats' => $get_service_rows(
            'etos_service_care_stats'
        ),
        'paths_heading' => trim(
            (string) $get_service_field(
                'etos_service_care_paths_heading',
                __(
                    'Jak rozpocząć współpracę?',
                    'etos'
                )
            )
        ),
        'paths_intro' => trim(
            (string) $get_service_field(
                'etos_service_care_paths_intro'
            )
        ),
        'paths' => $get_service_rows(
            'etos_service_care_paths'
        ),
    );
    ?>

    <div
        class="wrapper etos-service-wrapper"
        id="single-wrapper"
    >

        <main
            class="<?php echo esc_attr(
                'etos-service-single etos-service-single--'
                . $variant
            ); ?>"
            id="main"
        >

            <?php
            get_template_part(
                'template-parts/service/hero',
                null,
                array(
                    'post_id'       => $post_id,
                    'kicker'        => $kicker,
                    'title'         => get_the_title(),
                    'lead'          => $lead,
                    'image_id'      => $hero_image_id,
                    'image_style'   => $image_style,
                    'primary_cta'   => $primary_cta,
                )
            );
            if ( 'solution' === $variant ) {
                get_template_part(
                    'template-parts/service/variant',
                    'solution',
                    array(
                        'data' => $solution_data,
                    )
                );
            } else {
                get_template_part(
                    'template-parts/service/variant',
                    'care',
                    array(
                        'data' => $care_data,
                    )
                );
            }
            ?>

        </main>

    </div>

    <?php
endwhile;

get_footer();