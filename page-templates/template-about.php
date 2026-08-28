<?php
/**
 * Template Name: O nas ETOS
 * Template Post Type: page
 *
 * @package ETOS
 */

defined( 'ABSPATH' ) || exit;

get_header();

while ( have_posts() ) :
    the_post();

    $post_id = get_the_ID();

    /**
     * Read ACF value with post meta fallback.
     *
     * @param string $name    Field name.
     * @param mixed  $default Default value.
     * @return mixed
     */
    $get_about_field = static function (
        $name,
        $default = null
    ) use ( $post_id ) {
        if ( function_exists( 'get_field' ) ) {
            $value = get_field(
                $name,
                $post_id
            );
        } else {
            $value = get_post_meta(
                $post_id,
                $name,
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
     * Normalize ACF link field.
     *
     * @param mixed $value Link value.
     * @return array
     */
    $normalize_link = static function ( $value ) {
        if ( is_string( $value ) ) {
            $value = array(
                'url' => $value,
            );
        }

        $value = is_array( $value )
            ? $value
            : array();

        return array(
            'url'    => trim(
                (string) ( $value['url'] ?? '' )
            ),
            'title'  => trim(
                (string) ( $value['title'] ?? '' )
            ),
            'target' => '_blank' === (
                $value['target'] ?? ''
            )
                ? '_blank'
                : '',
        );
    };

    // ETOS ABOUT AREA ICONS START

    /**
     * Resolve the built-in icon for an About area.
     *
     * @param string $title Area title.
     * @return string
     */
    $get_about_area_icon_key = static function ( $title ) {
        $slug = sanitize_title(
            (string) $title
        );

        if (
            false !== strpos( $slug, 'erp' )
            || false !== strpos( $slug, 'oprogramowanie' )
        ) {
            return 'erp';
        }

        if (
            false !== strpos( $slug, 'wdro' )
            || false !== strpos( $slug, 'integrac' )
        ) {
            return 'implementation';
        }

        if (
            false !== strpos( $slug, 'serwer' )
            || false !== strpos( $slug, 'sieci' )
        ) {
            return 'network';
        }

        if (
            false !== strpos( $slug, 'opieka' )
            || false !== strpos( $slug, 'serwis' )
        ) {
            return 'support';
        }

        if (
            false !== strpos( $slug, 'programist' )
            || false !== strpos( $slug, 'kod' )
        ) {
            return 'code';
        }

        if ( false !== strpos( $slug, 'fiskal' ) ) {
            return 'fiscal';
        }

        if (
            false !== strpos( $slug, 'podpis' )
            || false !== strpos( $slug, 'certyfikat' )
        ) {
            return 'signature';
        }

        if (
            false !== strpos( $slug, 'zdaln' )
            || false !== strpos( $slug, 'remote' )
        ) {
            return 'remote';
        }

        return 'erp';
    };

    /**
     * Return a trusted built-in line SVG.
     *
     * SVG uses currentColor and is styled in SCSS.
     *
     * @param string $key Icon key.
     * @return string
     */
    $get_about_area_icon = static function ( $key ) {
        $icons = array(
            'erp' => '
                <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                    <rect x="7" y="8" width="21" height="18" rx="4"></rect>
                    <rect x="36" y="8" width="21" height="18" rx="4"></rect>
                    <rect x="7" y="38" width="21" height="18" rx="4"></rect>
                    <rect x="36" y="38" width="21" height="18" rx="4"></rect>
                    <path d="M28 17h8M28 47h8M17.5 26v12M46.5 26v12"></path>
                </svg>
            ',
            'implementation' => '
                <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                    <rect x="6" y="10" width="38" height="30" rx="4"></rect>
                    <path d="M17 52h16M25 40v12"></path>
                    <circle cx="48" cy="21" r="8"></circle>
                    <path d="M48 9v4M48 29v4M36 21h4M56 21h4"></path>
                    <path d="M40 13l3 3M53 26l3 3M56 13l-3 3M43 26l-3 3"></path>
                </svg>
            ',
            'network' => '
                <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                    <rect x="9" y="7" width="46" height="13" rx="3"></rect>
                    <rect x="9" y="26" width="46" height="13" rx="3"></rect>
                    <rect x="9" y="45" width="46" height="13" rx="3"></rect>
                    <circle cx="17" cy="13.5" r="2"></circle>
                    <circle cx="17" cy="32.5" r="2"></circle>
                    <circle cx="17" cy="51.5" r="2"></circle>
                    <path d="M24 14h23M24 33h23M24 52h23"></path>
                </svg>
            ',
            'support' => '
                <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                    <path d="M12 34v-5c0-12 8-21 20-21s20 9 20 21v5"></path>
                    <rect x="7" y="30" width="10" height="18" rx="4"></rect>
                    <rect x="47" y="30" width="10" height="18" rx="4"></rect>
                    <path d="M52 48c0 6-5 9-12 9h-4"></path>
                    <circle cx="32" cy="57" r="3"></circle>
                </svg>
            ',
            'code' => '
                <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                    <rect x="6" y="9" width="52" height="46" rx="5"></rect>
                    <path d="M6 20h52"></path>
                    <circle cx="13" cy="15" r="1.5"></circle>
                    <circle cx="19" cy="15" r="1.5"></circle>
                    <circle cx="25" cy="15" r="1.5"></circle>
                    <path d="M25 31l-7 6 7 6M39 31l7 6-7 6M35 27l-6 20"></path>
                </svg>
            ',
            'fiscal' => '
                <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                    <path d="M17 7h30v16H17z"></path>
                    <rect x="8" y="22" width="48" height="27" rx="5"></rect>
                    <path d="M17 43h30v14H17zM18 30h12M18 36h8"></path>
                    <circle cx="47" cy="31" r="2"></circle>
                    <circle cx="40" cy="31" r="2"></circle>
                </svg>
            ',
            'signature' => '
                <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                    <path d="M14 6h25l11 11v39H14z"></path>
                    <path d="M39 6v12h11M22 27h20M22 34h13"></path>
                    <path d="M23 49c8-12 13-9 10-4 5-5 7-3 5 1 4-3 7-2 9 1"></path>
                </svg>
            ',
            'remote' => '
                <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                    <rect x="6" y="8" width="52" height="36" rx="5"></rect>
                    <path d="M20 56h24M32 44v12"></path>
                    <path d="M37 20l14 7-6 2 4 8-5 2-4-8-5 5z"></path>
                </svg>
            ',
        );

        return $icons[ $key ]
            ?? $icons['erp'];
    };

    // ETOS ABOUT AREA ICONS END
    $hero_title = trim(
        (string) $get_about_field(
            'etos_about_hero_title',
            get_the_title()
        )
    );

    $hero_eyebrow = trim(
        (string) $get_about_field(
            'etos_about_hero_eyebrow',
            __( 'O nas', 'etos' )
        )
    );

    $intro_title = trim(
        (string) $get_about_field(
            'etos_about_intro_title',
            __( 'O nas', 'etos' )
        )
    );

    $intro_text = trim(
        (string) $get_about_field(
            'etos_about_intro_text'
        )
    );

    $hero_image_id = (int) $get_about_field(
        'etos_about_hero_image',
        get_post_thumbnail_id( $post_id )
    );

    $primary_cta = $normalize_link(
        $get_about_field(
            'etos_about_primary_cta'
        )
    );

    $secondary_cta = $normalize_link(
        $get_about_field(
            'etos_about_secondary_cta'
        )
    );

    $stats = $get_about_field(
        'etos_about_stats',
        array()
    );

    $stats = is_array( $stats )
        ? array_values(
            array_filter(
                $stats,
                static function ( $item ) {
                    return is_array( $item )
                        && (
                            ! empty( $item['value'] )
                            || ! empty( $item['label'] )
                        );
                }
            )
        )
        : array();

    $areas = $get_about_field(
        'etos_about_areas',
        array()
    );

    $areas = is_array( $areas )
        ? array_values(
            array_filter(
                $areas,
                static function ( $item ) {
                    return is_array( $item )
                        && (
                            ! empty( $item['title'] )
                            || ! empty( $item['text'] )
                            || ! empty( $item['icon'] )
                        );
                }
            )
        )
        : array();

    $areas_count = count( $areas );

    if ( $areas_count <= 4 ) {
        $area_columns = max(
            1,
            $areas_count
        );
    } elseif ( $areas_count <= 6 ) {
        $area_columns = 3;
    } else {
        $area_columns = 4;
    }

    $areas_eyebrow = trim(
        (string) $get_about_field(
            'etos_about_areas_eyebrow'
        )
    );

    $areas_title = trim(
        (string) $get_about_field(
            'etos_about_areas_title',
            __( 'Czym się zajmujemy?', 'etos' )
        )
    );

    $areas_intro = trim(
        (string) $get_about_field(
            'etos_about_areas_intro'
        )
    );

    $team_eyebrow = trim(
        (string) $get_about_field(
            'etos_about_team_eyebrow'
        )
    );

    $team_title = trim(
        (string) $get_about_field(
            'etos_about_team_title',
            __( 'Nasz zespół', 'etos' )
        )
    );

    $team_text = trim(
        (string) $get_about_field(
            'etos_about_team_text'
        )
    );

    $team_image_id = (int) $get_about_field(
        'etos_about_team_image',
        0
    );

    $team_link = $normalize_link(
        $get_about_field(
            'etos_about_team_link'
        )
    );

    $cta_eyebrow = trim(
        (string) $get_about_field(
            'etos_about_cta_eyebrow'
        )
    );

    $cta_title = trim(
        (string) $get_about_field(
            'etos_about_cta_title'
        )
    );

    $cta_text = trim(
        (string) $get_about_field(
            'etos_about_cta_text'
        )
    );

    $cta_link = $normalize_link(
        $get_about_field(
            'etos_about_cta_link'
        )
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
            <?php post_class( 'etos-about-page' ); ?>
            id="post-<?php the_ID(); ?>"
        >

            <section class="etos-about-hero">

                <div class="container etos-container">

                    <div class="etos-about-hero__headline">

                        <?php if ( '' !== $hero_eyebrow ) : ?>

                            <span class="etos-about-kicker">
                                <?php echo esc_html(
                                    $hero_eyebrow
                                ); ?>
                            </span>

                        <?php endif; ?>

                        <h1 class="etos-about-hero__title">
                            <?php echo esc_html(
                                $hero_title
                            ); ?>
                        </h1>

                    </div>

                    <div class="row g-5 align-items-stretch">

                        <div class="col-lg-6">

                            <div class="etos-about-hero__content">

                                <?php if ( '' !== $intro_title ) : ?>

                                    <h2>
                                        <?php echo esc_html(
                                            $intro_title
                                        ); ?>
                                    </h2>

                                <?php endif; ?>

                                <?php if ( '' !== $intro_text ) : ?>

                                    <div class="etos-about-hero__text">
                                        <?php
                                        echo wp_kses_post(
                                            wpautop(
                                                $intro_text
                                            )
                                        );
                                        ?>
                                    </div>

                                <?php endif; ?>

                                <div class="etos-about-hero__actions">

                                    <?php
                                    foreach (
                                        array(
                                            array(
                                                'link'  => $primary_cta,
                                                'class' => 'btn etos-btn-primary',
                                            ),
                                            array(
                                                'link'  => $secondary_cta,
                                                'class' => 'btn btn-outline-primary',
                                            ),
                                        ) as $item
                                    ) :
                                        $link = $item['link'];

                                        if (
                                            empty( $link['url'] )
                                            || empty( $link['title'] )
                                        ) {
                                            continue;
                                        }

                                        $rel = '_blank' === $link['target']
                                            ? 'noopener noreferrer'
                                            : '';
                                        ?>

                                        <a
                                            class="<?php echo esc_attr(
                                                $item['class']
                                            ); ?>"
                                            href="<?php echo esc_url(
                                                $link['url']
                                            ); ?>"
                                            <?php if ( $link['target'] ) : ?>
                                                target="<?php echo esc_attr(
                                                    $link['target']
                                                ); ?>"
                                            <?php endif; ?>
                                            <?php if ( $rel ) : ?>
                                                rel="<?php echo esc_attr(
                                                    $rel
                                                ); ?>"
                                            <?php endif; ?>
                                        >
                                            <?php echo esc_html(
                                                $link['title']
                                            ); ?>
                                        </a>

                                    <?php endforeach; ?>

                                </div>

                            </div>

                        </div>

                        <div class="col-lg-6">

                            <div class="etos-about-hero__media">

                                <?php if ( $hero_image_id ) : ?>

                                    <?php
                                    echo wp_get_attachment_image(
                                        $hero_image_id,
                                        'large',
                                        false,
                                        array(
                                            'class'         => 'etos-about-hero__image',
                                            'loading'       => 'eager',
                                            'fetchpriority' => 'high',
                                        )
                                    );
                                    ?>

                                <?php endif; ?>

                            </div>

                        </div>

                    </div>

                </div>

            </section>

            <?php if ( $stats ) : ?>

                <section class="etos-about-stats">

                    <div class="container etos-container">

                        <div class="etos-about-stats__grid">

                            <?php foreach ( $stats as $stat ) : ?>

                                <div class="etos-about-stat">

                                    <?php
                                    $stat_value = trim(
                                        (string) (
                                            $stat['value']
                                            ?? ''
                                        )
                                    );
                                    ?>

                                    <strong
                                        class="etos-about-stat__value"
                                        data-etos-counter
                                        data-counter-value="<?php echo esc_attr(
                                            $stat_value
                                        ); ?>"
                                    >
                                        <?php echo esc_html(
                                            $stat_value
                                        ); ?>
                                    </strong>

                                    <span class="etos-about-stat__label">
                                        <?php echo esc_html(
                                            $stat['label'] ?? ''
                                        ); ?>
                                    </span>

                                </div>

                            <?php endforeach; ?>

                        </div>

                    </div>

                </section>

            <?php endif; ?>

            <?php if (
                $areas
                || '' !== $areas_title
            ) : ?>

                <section class="etos-about-areas">

                    <div class="container etos-container">

                        <header class="etos-about-section-header">

                            <?php if ( '' !== $areas_eyebrow ) : ?>

                                <span class="etos-about-kicker">
                                    <?php echo esc_html(
                                        $areas_eyebrow
                                    ); ?>
                                </span>

                            <?php endif; ?>

                            <?php if ( '' !== $areas_title ) : ?>

                                <h2>
                                    <?php echo esc_html(
                                        $areas_title
                                    ); ?>
                                </h2>

                            <?php endif; ?>

                            <?php if ( '' !== $areas_intro ) : ?>

                                <div class="etos-about-section-header__intro">
                                    <?php
                                    echo wp_kses_post(
                                        wpautop(
                                            $areas_intro
                                        )
                                    );
                                    ?>
                                </div>

                            <?php endif; ?>

                        </header>

                        <?php if ( $areas ) : ?>

                            <div
                                class="etos-about-areas__grid etos-about-areas__grid--cols-<?php echo esc_attr(
                                    $area_columns
                                ); ?>"
                            >

                                <?php foreach ( $areas as $area ) : ?>
                                    <?php
                                    $icon_id = (int) (
                                        $area['icon'] ?? 0
                                    );

                                    $area_icon_key = $get_about_area_icon_key(
                                        $area['title'] ?? ''
                                    );

                                    $area_icon = $get_about_area_icon(
                                        $area_icon_key
                                    );

                                    $link = $normalize_link(
                                        $area['link'] ?? array()
                                    );
                                    ?>

                                    <article class="etos-about-area">

                                        <div
                                            class="etos-about-area__icon"
                                            aria-hidden="true"
                                        >

                                            <?php if ( $icon_id ) : ?>

                                                <?php
                                                echo wp_get_attachment_image(
                                                    $icon_id,
                                                    'thumbnail',
                                                    false,
                                                    array(
                                                        'loading' => 'lazy',
                                                    )
                                                );
                                                ?>

                                            <?php else : ?>

                                                <?php
                                                // Trusted inline SVG defined above.
                                                echo $area_icon; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                                ?>

                                            <?php endif; ?>

                                        </div>

                                        <h3>
                                            <?php echo esc_html(
                                                $area['title'] ?? ''
                                            ); ?>
                                        </h3>

                                        <?php if ( ! empty( $area['text'] ) ) : ?>

                                            <div class="etos-about-area__text">
                                                <?php
                                                echo wp_kses_post(
                                                    wpautop(
                                                        $area['text']
                                                    )
                                                );
                                                ?>
                                            </div>

                                        <?php endif; ?>

                                        <?php if (
                                            $link['url']
                                            && $link['title']
                                        ) : ?>

                                            <a
                                                class="etos-about-area__link"
                                                href="<?php echo esc_url(
                                                    $link['url']
                                                ); ?>"
                                            >
                                                <?php echo esc_html(
                                                    $link['title']
                                                ); ?>
                                            </a>

                                        <?php endif; ?>

                                    </article>

                                <?php endforeach; ?>

                            </div>

                        <?php endif; ?>

                    </div>

                </section>

            <?php endif; ?>

            <?php if (
                '' !== $team_title
                || '' !== $team_text
                || $team_image_id
            ) : ?>

                <section class="etos-about-team">

                    <div class="container etos-container">

                        <div class="row g-5 align-items-center">

                            <div class="col-lg-6">

                                <div class="etos-about-team__content">

                                    <?php if ( '' !== $team_eyebrow ) : ?>

                                        <span class="etos-about-kicker">
                                            <?php echo esc_html(
                                                $team_eyebrow
                                            ); ?>
                                        </span>

                                    <?php endif; ?>

                                    <?php if ( '' !== $team_title ) : ?>

                                        <h2>
                                            <?php echo esc_html(
                                                $team_title
                                            ); ?>
                                        </h2>

                                    <?php endif; ?>

                                    <?php if ( '' !== $team_text ) : ?>

                                        <div class="etos-about-team__text">
                                            <?php
                                            echo wp_kses_post(
                                                wpautop(
                                                    $team_text
                                                )
                                            );
                                            ?>
                                        </div>

                                    <?php endif; ?>

                                    <?php if (
                                        $team_link['url']
                                        && $team_link['title']
                                    ) : ?>

                                        <a
                                            class="btn etos-btn-primary"
                                            href="<?php echo esc_url(
                                                $team_link['url']
                                            ); ?>"
                                        >
                                            <?php echo esc_html(
                                                $team_link['title']
                                            ); ?>
                                        </a>

                                    <?php endif; ?>

                                </div>

                            </div>

                            <div class="col-lg-6">

                                <?php if ( $team_image_id ) : ?>

                                <div class="etos-about-team__media">

                                    <?php
                                    echo wp_get_attachment_image(
                                        $team_image_id,
                                        'large',
                                        false,
                                        array(
                                            'class'   => 'etos-about-team__image',
                                            'loading' => 'lazy',
                                        )
                                    );
                                    ?>

                                </div>

                            <?php else : ?>

                                <div class="etos-about-team__panel">

                                    <div class="etos-about-team__point">

                                        <span
                                            class="etos-about-team__point-icon"
                                            aria-hidden="true"
                                        >
                                            <svg
                                                viewBox="0 0 64 64"
                                                focusable="false"
                                            >
                                                <rect
                                                    x="9"
                                                    y="7"
                                                    width="46"
                                                    height="13"
                                                    rx="3"
                                                ></rect>
                                                <rect
                                                    x="9"
                                                    y="26"
                                                    width="46"
                                                    height="13"
                                                    rx="3"
                                                ></rect>
                                                <rect
                                                    x="9"
                                                    y="45"
                                                    width="46"
                                                    height="13"
                                                    rx="3"
                                                ></rect>
                                                <circle
                                                    cx="17"
                                                    cy="13.5"
                                                    r="2"
                                                ></circle>
                                                <circle
                                                    cx="17"
                                                    cy="32.5"
                                                    r="2"
                                                ></circle>
                                                <circle
                                                    cx="17"
                                                    cy="51.5"
                                                    r="2"
                                                ></circle>
                                                <path
                                                    d="M24 14h23M24 33h23M24 52h23"
                                                ></path>
                                            </svg>
                                        </span>

                                        <div class="etos-about-team__point-copy">
                                            <h3>
                                                <?php esc_html_e(
                                                    'Wiedza techniczna',
                                                    'etos'
                                                ); ?>
                                            </h3>
                                            <p>
                                                <?php esc_html_e(
                                                    'Projektujemy rozwiązania z uwzględnieniem realnego środowiska IT i procesów klienta.',
                                                    'etos'
                                                ); ?>
                                            </p>
                                        </div>

                                    </div>

                                    <div class="etos-about-team__point">

                                        <span
                                            class="etos-about-team__point-icon"
                                            aria-hidden="true"
                                        >
                                            <svg
                                                viewBox="0 0 64 64"
                                                focusable="false"
                                            >
                                                <rect
                                                    x="6"
                                                    y="10"
                                                    width="38"
                                                    height="30"
                                                    rx="4"
                                                ></rect>
                                                <path
                                                    d="M17 52h16M25 40v12"
                                                ></path>
                                                <circle
                                                    cx="48"
                                                    cy="21"
                                                    r="8"
                                                ></circle>
                                                <path
                                                    d="M48 9v4M48 29v4M36 21h4M56 21h4"
                                                ></path>
                                                <path
                                                    d="M40 13l3 3M53 26l3 3M56 13l-3 3M43 26l-3 3"
                                                ></path>
                                            </svg>
                                        </span>

                                        <div class="etos-about-team__point-copy">
                                            <h3>
                                                <?php esc_html_e(
                                                    'Doświadczenie wdrożeniowe',
                                                    'etos'
                                                ); ?>
                                            </h3>
                                            <p>
                                                <?php esc_html_e(
                                                    'Łączymy znajomość systemów z praktyką zdobywaną podczas wdrożeń i integracji.',
                                                    'etos'
                                                ); ?>
                                            </p>
                                        </div>

                                    </div>

                                    <div class="etos-about-team__point">

                                        <span
                                            class="etos-about-team__point-icon"
                                            aria-hidden="true"
                                        >
                                            <svg
                                                viewBox="0 0 64 64"
                                                focusable="false"
                                            >
                                                <rect
                                                    x="7"
                                                    y="8"
                                                    width="21"
                                                    height="18"
                                                    rx="4"
                                                ></rect>
                                                <rect
                                                    x="36"
                                                    y="8"
                                                    width="21"
                                                    height="18"
                                                    rx="4"
                                                ></rect>
                                                <rect
                                                    x="7"
                                                    y="38"
                                                    width="21"
                                                    height="18"
                                                    rx="4"
                                                ></rect>
                                                <rect
                                                    x="36"
                                                    y="38"
                                                    width="21"
                                                    height="18"
                                                    rx="4"
                                                ></rect>
                                                <path
                                                    d="M28 17h8M28 47h8M17.5 26v12M46.5 26v12"
                                                ></path>
                                            </svg>
                                        </span>

                                        <div class="etos-about-team__point-copy">
                                            <h3>
                                                <?php esc_html_e(
                                                    'Blisko biznesu',
                                                    'etos'
                                                ); ?>
                                            </h3>
                                            <p>
                                                <?php esc_html_e(
                                                    'Rozumiemy, że technologia ma wspierać codzienną pracę, a nie ją komplikować.',
                                                    'etos'
                                                ); ?>
                                            </p>
                                        </div>

                                    </div>

                                    <p class="etos-about-team__statement">
                                        <?php
                                        esc_html_e(
                                            'Rozmawiasz ze specjalistami, którzy później realnie pracują przy Twoim rozwiązaniu.',
                                            'etos'
                                        );
                                        ?>
                                    </p>

                                </div>

                            <?php endif; ?>

                            </div>

                        </div>

                    </div>

                </section>

            <?php endif; ?>

        </article>

    </main>

    <?php
endwhile;

get_footer();