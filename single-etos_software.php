<?php
/**
 * Template for a single software entry.
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
     * @return mixed
     */
    $get_software_field = static function ( $field_name ) use ( $post_id ) {
        if ( function_exists( 'get_field' ) ) {
            return get_field( $field_name, $post_id );
        }

        return get_post_meta( $post_id, $field_name, true );
    };

    /**
     * Normalize an ACF link field.
     *
     * @param mixed  $link           Link field value.
     * @param string $fallback_url   Fallback URL.
     * @param string $fallback_title Fallback label.
     * @return array
     */
    $normalize_link = static function ( $link, $fallback_url = '', $fallback_title = '' ) {
        $link = is_array( $link ) ? $link : array();

        $url = isset( $link['url'] )
            ? trim( (string) $link['url'] )
            : '';

        $title = isset( $link['title'] )
            ? trim( (string) $link['title'] )
            : '';

        $target = isset( $link['target'] ) && '_blank' === $link['target']
            ? '_blank'
            : '';

        if ( '' === $url ) {
            $url = $fallback_url;
        }

        if ( '' === $title ) {
            $title = $fallback_title;
        }

        return array(
            'url'    => $url,
            'title'  => $title,
            'target' => $target,
        );
    };

    $vendors = get_the_terms( $post_id, 'etos_vendor' );
    $vendor  = ! is_wp_error( $vendors ) && ! empty( $vendors )
        ? reset( $vendors )
        : null;

    $vendor_name = $vendor
        ? (string) $vendor->name
        : '';

    $accent = $vendor
        ? (string) get_term_meta(
            $vendor->term_id,
            'etos_vendor_accent',
            true
        )
        : '';

    if ( ! preg_match( '/^#[0-9a-fA-F]{6}$/', $accent ) ) {
        $accent = '#2457D6';
    }

    $product_logo_id = (int) $get_software_field(
        'etos_software_logo'
    );

    $vendor_logo_id = $vendor
        ? (int) get_term_meta(
            $vendor->term_id,
            'etos_vendor_logo',
            true
        )
        : 0;

    $logo_id = $product_logo_id ?: $vendor_logo_id;

    $hero_image_id = (int) $get_software_field(
        'etos_software_hero_image'
    );

    if ( ! $hero_image_id ) {
        $hero_image_id = (int) get_post_thumbnail_id( $post_id );
    }

    if ( ! $hero_image_id && $vendor ) {
        $hero_image_id = (int) get_term_meta(
            $vendor->term_id,
            'etos_vendor_image',
            true
        );
    }

    $kicker = trim(
        (string) $get_software_field(
            'etos_software_kicker'
        )
    );

    if ( '' === $kicker ) {
        $kicker = $vendor_name ?: __( 'Oprogramowanie dla firm', 'etos' );
    }

    $lead = trim(
        (string) $get_software_field(
            'etos_software_lead'
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

    $contact_page = get_page_by_path( 'kontakt' );

    $contact_url = $contact_page
        ? get_permalink( $contact_page )
        : home_url( '/kontakt/' );

    $primary_cta = $normalize_link(
        $get_software_field(
            'etos_software_primary_cta'
        ),
        $contact_url,
        __( 'Umów konsultację', 'etos' )
    );

    $secondary_cta = $normalize_link(
        $get_software_field(
            'etos_software_secondary_cta'
        )
    );

    $cta_title = trim(
        (string) $get_software_field(
            'etos_software_cta_title'
        )
    );

    if ( '' === $cta_title ) {
        $cta_title = __( 'Dobierzmy rozwiązanie do potrzeb Twojej firmy', 'etos' );
    }

    $cta_text = trim(
        (string) $get_software_field(
            'etos_software_cta_text'
        )
    );

    if ( '' === $cta_text ) {
        $cta_text = __(
            'Pomożemy dobrać zakres programu, licencje oraz właściwy sposób wdrożenia.',
            'etos'
        );
    }

    $cta_link = $normalize_link(
        $get_software_field(
            'etos_software_cta_link'
        ),
        $contact_url,
        __( 'Porozmawiaj z doradcą', 'etos' )
    );

    $GLOBALS['etos_footer_cta'] = array(
        'eyebrow' => __(
            'Doradztwo i wdrożenie',
            'etos'
        ),
        'title'   => $cta_title,
        'text'    => $cta_text,
        'button'  => $cta_link['title'],
        'url'     => $cta_link['url'],
    );
    $raw_content = (string) get_post_field(
        'post_content',
        $post_id
    );

    /**
     * Check whether a parsed block contains real editor content.
     *
     * Gutenberg placeholders do not count as frontend content.
     *
     * @param array $block Parsed Gutenberg block.
     * @return bool
     */
    $block_has_content = null;

    $block_has_content = static function ( $block ) use ( &$block_has_content ) {
        if ( ! is_array( $block ) ) {
            return false;
        }

        $block_name = isset( $block['blockName'] )
            ? (string) $block['blockName']
            : '';

        $attributes = isset( $block['attrs'] )
            && is_array( $block['attrs'] )
                ? $block['attrs']
                : array();

        $inner_html = isset( $block['innerHTML'] )
            ? (string) $block['innerHTML']
            : '';

        if ( 'core/image' === $block_name ) {
            $has_image_src = 1 === preg_match(
                '/<img\b[^>]*\bsrc\s*=\s*["\'][^"\']+["\']/i',
                $inner_html
            );

            return ! empty( $attributes['id'] )
                || ! empty( $attributes['url'] )
                || $has_image_src;
        }

        if (
            'core/media-text' === $block_name
            && (
                ! empty( $attributes['mediaId'] )
                || ! empty( $attributes['mediaUrl'] )
            )
        ) {
            return true;
        }

        if (
            in_array(
                $block_name,
                array(
                    'core/heading',
                    'core/paragraph',
                    'core/list',
                    'core/list-item',
                    'core/button',
                ),
                true
            )
        ) {
            $text = trim(
                wp_strip_all_tags(
                    strip_shortcodes( $inner_html )
                )
            );

            if ( '' !== $text ) {
                return true;
            }
        }

        $inner_blocks = isset( $block['innerBlocks'] )
            && is_array( $block['innerBlocks'] )
                ? $block['innerBlocks']
                : array();

        foreach ( $inner_blocks as $inner_block ) {
            if ( $block_has_content( $inner_block ) ) {
                return true;
            }
        }

        return false;
    };

    /**
     * Hide empty predefined ETOS sections on the frontend.
     *
     * @param array $block Parsed top-level block.
     * @return bool
     */
    $software_block_should_render = static function ( $block ) use ( $block_has_content ) {
        $attributes = isset( $block['attrs'] )
            && is_array( $block['attrs'] )
                ? $block['attrs']
                : array();

        $class_name = isset( $attributes['className'] )
            ? (string) $attributes['className']
            : '';

        $block_name = isset( $block['blockName'] )
            ? (string) $block['blockName']
            : '';

        $inner_html = isset( $block['innerHTML'] )
            ? (string) $block['innerHTML']
            : '';

        if (
            '' === $block_name
            && '' === trim( $inner_html )
        ) {
            return false;
        }

        if ( false !== strpos( $class_name, 'etos-software-section' ) ) {
            $inner_blocks = isset( $block['innerBlocks'] )
                && is_array( $block['innerBlocks'] )
                    ? $block['innerBlocks']
                    : array();

            foreach ( $inner_blocks as $index => $inner_block ) {
                /*
                 * The first heading is predefined and must not make
                 * an otherwise empty section visible.
                 */
                if (
                    0 === $index
                    && 'core/heading' === ( $inner_block['blockName'] ?? '' )
                ) {
                    continue;
                }

                if ( $block_has_content( $inner_block ) ) {
                    return true;
                }
            }

            return false;
        }

        if ( false !== strpos( $class_name, 'etos-software-split' ) ) {
            return $block_has_content( $block );
        }

        /*
         * Preserve blocks added manually outside the ETOS structure.
         */
        return true;
    };

    $parsed_blocks = parse_blocks( $raw_content );

    $filtered_blocks = array_values(
        array_filter(
            $parsed_blocks,
            $software_block_should_render
        )
    );

    $filtered_content = serialize_blocks( $filtered_blocks );
    $has_content      = ! empty( $filtered_blocks );

    $hero_links = array(
        array(
            'link'  => $primary_cta,
            'class' => 'btn btn-primary btn-lg',
        ),
        array(
            'link'  => $secondary_cta,
            'class' => 'btn btn-outline-primary btn-lg',
        ),
    );
    ?>

    <main class="site-main" id="main">

        <article
            <?php post_class( 'etos-software-single' ); ?>
            id="post-<?php the_ID(); ?>"
            style="--etos-software-accent: <?php echo esc_attr( $accent ); ?>;"
        >

            <header class="etos-page-hero etos-page-hero--media etos-software-hero">

                <div class="container">

                    <div class="row g-5">

                        <div class="col-lg-7">

                            <div class="etos-page-hero__content">

                                <?php if ( $logo_id ) : ?>
                                    <div class="etos-software-hero__logo">
                                        <?php
                                        echo wp_get_attachment_image(
                                            $logo_id,
                                            'medium',
                                            false,
                                            array(
                                                'class'   => 'etos-software-hero__logo-image',
                                                'loading' => 'eager',
                                            )
                                        );
                                        ?>
                                    </div>
                                <?php endif; ?>

                                <span
                                    class="etos-kicker"
                                    style="--software-color: <?php echo esc_attr( $accent ); ?>;"
                                >
                                    <?php echo esc_html( $kicker ); ?>
                                </span>

                                <?php
                                the_title(
                                    '<h1 class="etos-page-hero__title">',
                                    '</h1>'
                                );
                                ?>

                                <?php if ( '' !== $lead ) : ?>
                                    <p class="etos-page-hero__lead">
                                        <?php echo esc_html( $lead ); ?>
                                    </p>
                                <?php endif; ?>

                                <div class="etos-page-hero__actions">

                                    <?php foreach ( $hero_links as $hero_link ) : ?>
                                        <?php
                                        $link = $hero_link['link'];

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
                                            class="<?php echo esc_attr( $hero_link['class'] ); ?>"
                                            href="<?php echo esc_url( $link['url'] ); ?>"
                                            <?php if ( $link['target'] ) : ?>
                                                target="<?php echo esc_attr( $link['target'] ); ?>"
                                            <?php endif; ?>
                                            <?php if ( $rel ) : ?>
                                                rel="<?php echo esc_attr( $rel ); ?>"
                                            <?php endif; ?>
                                        >
                                            <?php echo esc_html( $link['title'] ); ?>
                                        </a>
                                    <?php endforeach; ?>

                                </div>

                            </div>

                        </div>

                        <div class="col-lg-5">

                            <div class="etos-software-hero__visual">

                                <?php if ( $hero_image_id ) : ?>

                                    <?php
                                    echo wp_get_attachment_image(
                                        $hero_image_id,
                                        'large',
                                        false,
                                        array(
                                            'class'         => 'etos-software-hero__image',
                                            'loading'       => 'eager',
                                            'fetchpriority' => 'high',
                                        )
                                    );
                                    ?>

                                <?php else : ?>

                                    <div class="etos-software-hero__placeholder">
                                        <span>
                                            <?php
                                            echo esc_html(
                                                $vendor_name ?: get_the_title()
                                            );
                                            ?>
                                        </span>
                                    </div>

                                <?php endif; ?>

                            </div>

                        </div>

                    </div>

                </div>

            </header>

            <?php if ( $has_content ) : ?>

                <section
                    class="etos-software-content"
                    id="oprogramowanie-tresc"
                >

                    <div class="container">

                        <div class="etos-software-content__body entry-content">

                            <?php
                            echo apply_filters(
                                'the_content',
                                $filtered_content
                            );

                            wp_link_pages(
                                array(
                                    'before' => '<div class="page-links">'
                                        . esc_html__( 'Strony:', 'etos' ),
                                    'after'  => '</div>',
                                )
                            );
                            ?>

                        </div>

                    </div>

                </section>

            <?php endif; ?>


        </article>

    </main>

    <?php
endwhile;

get_footer();