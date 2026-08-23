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

                                    <strong class="etos-about-stat__value">
                                        <?php echo esc_html(
                                            $stat['value'] ?? ''
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

                                    $link = $normalize_link(
                                        $area['link'] ?? array()
                                    );
                                    ?>

                                    <article class="etos-about-area">

                                        <?php if ( $icon_id ) : ?>

                                            <div class="etos-about-area__icon">

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

                                            </div>

                                        <?php endif; ?>

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

                                <div class="etos-about-team__media">

                                    <?php if ( $team_image_id ) : ?>

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

                                    <?php endif; ?>

                                </div>

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