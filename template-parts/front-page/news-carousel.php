<?php
/**
 * Front-page news carousel.
 *
 * @package ETOS
 */

defined( 'ABSPATH' ) || exit;

$news_posts = get_posts(
    array(
        'post_type'           => 'post',
        'post_status'         => 'publish',
        'posts_per_page'      => 5,
        'orderby'             => 'date',
        'order'               => 'DESC',
        'ignore_sticky_posts' => true,
        'suppress_filters'    => false,
    )
);

if ( empty( $news_posts ) ) {
    return;
}

$posts_page_id = absint( get_option( 'page_for_posts' ) );

$news_archive_url = $posts_page_id
    ? get_permalink( $posts_page_id )
    : home_url( '/aktualnosci/' );

$carousel_id = 'etos-news-carousel';
$slide_count = count( $news_posts );

/**
 * Read an image display setting.
 *
 * ACF is preferred, with regular post meta as a fallback.
 *
 * @param string $name     Field name.
 * @param int    $post_id  Post ID.
 * @param mixed  $default  Default value.
 * @return mixed
 */
$get_image_setting = static function ( $name, $post_id, $default ) {
    $value = '';

    if ( function_exists( 'get_field' ) ) {
        $value = get_field( $name, $post_id );
    }

    if ( '' === $value || null === $value || false === $value ) {
        $value = get_post_meta( $post_id, $name, true );
    }

    if ( '' === $value || null === $value || false === $value ) {
        return $default;
    }

    return $value;
};
?>

<section
    class="etos-news"
    aria-labelledby="etos-news-title"
>

    <div class="container etos-container">

        <header class="etos-news__header">

            <div class="etos-news__heading">

                <span class="etos-kicker">
                    <?php esc_html_e( 'Aktualności ETOS', 'etos' ); ?>
                </span>

                <h2 id="etos-news-title">
                    <?php
                    esc_html_e(
                        'Aktualności i praktyczne informacje.',
                        'etos'
                    );
                    ?>
                </h2>

            </div>

            <div class="etos-news__actions">

                <a
                    class="etos-news__archive-link"
                    href="<?php echo esc_url( $news_archive_url ); ?>"
                >
                    <span>
                        <?php
                        esc_html_e(
                            'Wszystkie aktualności',
                            'etos'
                        );
                        ?>
                    </span>

                    <span aria-hidden="true">→</span>
                </a>

                <?php if ( 1 < $slide_count ) : ?>

                    <div class="etos-news__controls">

                        <button
                            type="button"
                            class="etos-news__control"
                            data-bs-target="#<?php echo esc_attr(
                                $carousel_id
                            ); ?>"
                            data-bs-slide="prev"
                            aria-label="<?php esc_attr_e(
                                'Poprzednia aktualność',
                                'etos'
                            ); ?>"
                        >
                            <span aria-hidden="true">←</span>
                        </button>

                        <button
                            type="button"
                            class="etos-news__control"
                            data-bs-target="#<?php echo esc_attr(
                                $carousel_id
                            ); ?>"
                            data-bs-slide="next"
                            aria-label="<?php esc_attr_e(
                                'Następna aktualność',
                                'etos'
                            ); ?>"
                        >
                            <span aria-hidden="true">→</span>
                        </button>

                    </div>

                <?php endif; ?>

            </div>

        </header>

        <div
            id="<?php echo esc_attr( $carousel_id ); ?>"
            class="carousel slide etos-news-carousel"
            data-bs-interval="false"
            data-bs-touch="true"
            aria-roledescription="<?php esc_attr_e(
                'Karuzela aktualności',
                'etos'
            ); ?>"
        >

            <div
                class="carousel-inner"
                aria-live="polite"
            >

                <?php foreach ( $news_posts as $index => $news_post ) : ?>
                    <?php
                    $post_id = $news_post->ID;

                    $raw_excerpt = (string) get_post_field(
                        'post_excerpt',
                        $post_id
                    );

                    $raw_content = (string) get_post_field(
                        'post_content',
                        $post_id
                    );

                    $source_text = '' !== trim( $raw_excerpt )
                        ? $raw_excerpt
                        : $raw_content;

                    $excerpt = wp_trim_words(
                        trim(
                            wp_strip_all_tags(
                                strip_shortcodes( $source_text )
                            )
                        ),
                        24,
                        '…'
                    );

                    $image_fit = (string) $get_image_setting(
                        'etos_news_image_fit',
                        $post_id,
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
                        $get_image_setting(
                            'etos_news_image_scale',
                            $post_id,
                            100
                        )
                    );

                    $image_x = absint(
                        $get_image_setting(
                            'etos_news_image_x',
                            $post_id,
                            50
                        )
                    );

                    $image_y = absint(
                        $get_image_setting(
                            'etos_news_image_y',
                            $post_id,
                            50
                        )
                    );

                    $image_scale = min( 160, max( 100, $image_scale ) );
                    $image_x     = min( 100, max( 0, $image_x ) );
                    $image_y     = min( 100, max( 0, $image_y ) );

                    $image_scale_css = number_format(
                        $image_scale / 100,
                        2,
                        '.',
                        ''
                    );

                    $image_style = sprintf(
                        '--etos-news-image-fit:%1$s;'
                        . '--etos-news-image-scale:%2$s;'
                        . '--etos-news-image-x:%3$d%%;'
                        . '--etos-news-image-y:%4$d%%;',
                        $image_fit,
                        $image_scale_css,
                        $image_x,
                        $image_y
                    );

                    $item_classes = array( 'carousel-item' );

                    if ( 0 === $index ) {
                        $item_classes[] = 'active';
                    }
                    ?>

                    <div class="<?php echo esc_attr(
                        implode( ' ', $item_classes )
                    ); ?>">

                        <article class="etos-news-slide">

                            <figure
                                class="<?php echo esc_attr(
                                    has_post_thumbnail( $post_id )
                                        ? 'etos-news-slide__media'
                                        : 'etos-news-slide__media is-placeholder'
                                ); ?>"
                            >

                                <?php if ( has_post_thumbnail( $post_id ) ) : ?>

                                    <?php
                                    echo get_the_post_thumbnail(
                                        $post_id,
                                        'large',
                                        array(
                                            'class'    => 'etos-news-slide__image',
                                            'loading'  => 0 === $index
                                                ? 'eager'
                                                : 'lazy',
                                            'decoding' => 'async',
                                            'style'    => $image_style,
                                        )
                                    );
                                    ?>

                                <?php else : ?>

                                    <div
                                        class="etos-news-slide__placeholder"
                                        aria-hidden="true"
                                    ></div>

                                <?php endif; ?>

                            </figure>

                            <div class="etos-news-slide__content">

                                <h3>
                                    <a href="<?php echo esc_url(
                                        get_permalink( $post_id )
                                    ); ?>">
                                        <?php echo esc_html(
                                            get_the_title( $post_id )
                                        ); ?>
                                    </a>
                                </h3>

                                <?php if ( $excerpt ) : ?>

                                    <p><?php echo esc_html( $excerpt ); ?></p>

                                <?php endif; ?>

                                <a
                                    class="etos-news-slide__link"
                                    href="<?php echo esc_url(
                                        get_permalink( $post_id )
                                    ); ?>"
                                >
                                    <span>
                                        <?php
                                        esc_html_e(
                                            'Czytaj więcej',
                                            'etos'
                                        );
                                        ?>
                                    </span>

                                    <span aria-hidden="true">→</span>
                                </a>

                            </div>

                        </article>

                    </div>

                <?php endforeach; ?>

            </div>

        </div>

    </div>

</section>