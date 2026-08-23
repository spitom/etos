<?php
/**
 * Template Name: Strona ofertowa ETOS
 * Template Post Type: page
 *
 * Shared landing-page template for electronic signature,
 * fiscal devices and remote support.
 *
 * @package ETOS
 */

defined( 'ABSPATH' ) || exit;

get_header();

while ( have_posts() ) :
    the_post();

    $post_id = get_the_ID();

    /**
     * Read an ACF field with a post-meta fallback.
     *
     * @param string $field_name Field name.
     * @param mixed  $default    Default value.
     * @return mixed
     */
    $get_offer_field = static function (
        $field_name,
        $default = null
    ) use ( $post_id ) {
        if ( function_exists( 'get_field' ) ) {
            $value = get_field(
                $field_name,
                $post_id
            );
        } else {
            $value = get_post_meta(
                $post_id,
                $field_name,
                true
            );
        }

        if (
            null === $value
            || '' === $value
        ) {
            return $default;
        }

        return $value;
    };

    /**
     * Normalize an ACF link field.
     *
     * @param mixed  $value          Link field.
     * @param string $fallback_url   Fallback URL.
     * @param string $fallback_title Fallback title.
     * @return array
     */
    $normalize_link = static function (
        $value,
        $fallback_url = '',
        $fallback_title = ''
    ) {
        if ( is_string( $value ) ) {
            $value = array(
                'url' => $value,
            );
        }

        $value = is_array( $value )
            ? $value
            : array();

        $url = ! empty( $value['url'] )
            ? trim( (string) $value['url'] )
            : $fallback_url;

        $title = ! empty( $value['title'] )
            ? trim( (string) $value['title'] )
            : $fallback_title;

        $target = isset( $value['target'] )
            && '_blank' === $value['target']
                ? '_blank'
                : '';

        return array(
            'url'    => $url,
            'title'  => $title,
            'target' => $target,
        );
    };

    $variant = sanitize_key(
        (string) $get_offer_field(
            'etos_offer_variant',
            'signature'
        )
    );

    if (
        ! in_array(
            $variant,
            array(
                'signature',
                'fiscal',
                'support',
            ),
            true
        )
    ) {
        $variant = 'signature';
    }

    $contact_page = get_page_by_path( 'kontakt' );

    $contact_url = $contact_page
        ? get_permalink( $contact_page )
        : home_url( '/kontakt/' );

    $hero_image_fit = sanitize_key(
        (string) $get_offer_field(
            'etos_offer_hero_image_fit',
            'cover'
        )
    );

    if (
        ! in_array(
            $hero_image_fit,
            array( 'cover', 'contain' ),
            true
        )
    ) {
        $hero_image_fit = 'cover';
    }

    $hero_image_scale = max(
        100,
        min(
            150,
            (int) $get_offer_field(
                'etos_offer_hero_image_scale',
                100
            )
        )
    );

    $hero_image_x = max(
        0,
        min(
            100,
            (int) $get_offer_field(
                'etos_offer_hero_image_x',
                50
            )
        )
    );

    $hero_image_y = max(
        0,
        min(
            100,
            (int) $get_offer_field(
                'etos_offer_hero_image_y',
                50
            )
        )
    );

    $manual_excerpt = trim(
        (string) get_post_field(
            'post_excerpt',
            $post_id
        )
    );

    $manual_excerpt = wp_strip_all_tags(
        strip_shortcodes( $manual_excerpt ),
        true
    );

    $hero = array(
        'logo_id'         => (int) $get_offer_field(
            'etos_offer_hero_logo',
            0
        ),
        'partner_logo_id' => (int) $get_offer_field(
            'etos_offer_hero_partner_logo',
            0
        ),
        'lead'            => trim(
            (string) $get_offer_field(
                'etos_offer_hero_lead',
                $manual_excerpt
            )
        ),
        'image_id'        => (int) $get_offer_field(
            'etos_offer_hero_image',
            get_post_thumbnail_id( $post_id )
        ),
        'image_fit'       => $hero_image_fit,
        'image_scale'     => $hero_image_scale,
        'image_x'         => $hero_image_x,
        'image_y'         => $hero_image_y,
        'primary_cta'     => $normalize_link(
            $get_offer_field(
                'etos_offer_primary_cta'
            ),
            $contact_url,
            __( 'Zapytaj o szczegóły', 'etos' )
        ),
        'secondary_cta'   => $normalize_link(
            $get_offer_field(
                'etos_offer_secondary_cta'
            )
        ),
    );

    $action = array(
        'show'    => (bool) $get_offer_field(
            'etos_offer_action_show',
            false
        ),
        'eyebrow' => trim(
            (string) $get_offer_field(
                'etos_offer_action_eyebrow'
            )
        ),
        'title'   => trim(
            (string) $get_offer_field(
                'etos_offer_action_title'
            )
        ),
        'text'    => trim(
            (string) $get_offer_field(
                'etos_offer_action_text'
            )
        ),
        'logo_id' => (int) $get_offer_field(
            'etos_offer_action_logo',
            0
        ),
        'link'    => $normalize_link(
            $get_offer_field(
                'etos_offer_action_link'
            )
        ),
    );

    $primary_cards = $get_offer_field(
        'etos_offer_primary_cards',
        array()
    );

    $primary_cards = is_array( $primary_cards )
        ? $primary_cards
        : array();

    $secondary_cards = $get_offer_field(
        'etos_offer_secondary_cards',
        array()
    );

    $secondary_cards = is_array( $secondary_cards )
        ? $secondary_cards
        : array();

    $secondary_style = sanitize_key(
        (string) $get_offer_field(
            'etos_offer_secondary_style',
            'cards'
        )
    );

    if (
        ! in_array(
            $secondary_style,
            array( 'cards', 'steps' ),
            true
        )
    ) {
        $secondary_style = 'cards';
    }

    $cta_title = trim(
        (string) $get_offer_field(
            'etos_offer_cta_title'
        )
    );

    $cta_text = trim(
        (string) $get_offer_field(
            'etos_offer_cta_text'
        )
    );

    $cta_eyebrow = trim(
        (string) $get_offer_field(
            'etos_offer_cta_eyebrow',
            __( 'Rozpocznijmy rozmowę', 'etos' )
        )
    );

    $cta_link = $normalize_link(
        $get_offer_field(
            'etos_offer_cta_link'
        ),
        $contact_url,
        __( 'Umów konsultację', 'etos' )
    );

    if (
        '' !== $cta_title
        || '' !== $cta_text
    ) {
        $GLOBALS['etos_footer_cta'] = array(
            'eyebrow' => $cta_eyebrow,
            'title'   => $cta_title,
            'text'    => $cta_text,
            'button'  => $cta_link['title'],
            'url'     => $cta_link['url'],
			'class'   => 'etos-cta-panel--footer etos-cta-panel--offer',
        );
    }
    ?>

    <main class="site-main" id="main">

        <article
            <?php
            post_class(
                'etos-offer-page etos-offer-page--'
                . $variant
            );
            ?>
            id="post-<?php the_ID(); ?>"
        >

            <?php
            get_template_part(
                'template-parts/offer/hero',
                null,
                array(
                    'hero'    => $hero,
                    'variant' => $variant,
                )
            );
            ?>

            <?php if ( $action['show'] ) : ?>

                <?php
                get_template_part(
                    'template-parts/offer/action-panel',
                    null,
                    array(
                        'action' => $action,
                    )
                );
                ?>

            <?php endif; ?>

            <?php
            get_template_part(
                'template-parts/offer/cards-section',
                null,
                array(
                    'modifier' => 'primary',
                    'style'    => 'cards',
                    'eyebrow'  => trim(
                        (string) $get_offer_field(
                            'etos_offer_primary_eyebrow'
                        )
                    ),
                    'title'    => trim(
                        (string) $get_offer_field(
                            'etos_offer_primary_title'
                        )
                    ),
                    'intro'    => trim(
                        (string) $get_offer_field(
                            'etos_offer_primary_intro'
                        )
                    ),
                    'cards'    => $primary_cards,
                )
            );

            get_template_part(
                'template-parts/offer/cards-section',
                null,
                array(
                    'modifier' => 'secondary',
                    'style'    => $secondary_style,
                    'eyebrow'  => trim(
                        (string) $get_offer_field(
                            'etos_offer_secondary_eyebrow'
                        )
                    ),
                    'title'    => trim(
                        (string) $get_offer_field(
                            'etos_offer_secondary_title'
                        )
                    ),
                    'intro'    => trim(
                        (string) $get_offer_field(
                            'etos_offer_secondary_intro'
                        )
                    ),
                    'cards'    => $secondary_cards,
                )
            );
            ?>

        </article>

    </main>

    <?php
endwhile;

get_footer();