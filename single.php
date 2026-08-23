<?php
/**
 * Single blog post.
 *
 * @package ETOS
 */

defined( 'ABSPATH' ) || exit;

get_header();

$GLOBALS['etos_footer_cta_hide'] = true;

while ( have_posts() ) :
    the_post();

    $post_id = get_the_ID();

    $posts_page_id = absint(
        get_option( 'page_for_posts' )
    );

    $archive_url = $posts_page_id
        ? get_permalink( $posts_page_id )
        : home_url( '/aktualnosci/' );

    $categories = get_the_category( $post_id );

    $category_name = ! empty( $categories )
        ? $categories[0]->name
        : '';

    $raw_excerpt = trim(
        (string) get_post_field(
            'post_excerpt',
            $post_id
        )
    );

    $lead = '';

    if ( '' !== $raw_excerpt ) {
        $lead = wp_strip_all_tags(
            strip_shortcodes( $raw_excerpt ),
            true
        );
    }

    /**
     * Read image setting.
     *
     * @param string $name    Field name.
     * @param mixed  $default Default value.
     * @return mixed
     */
    $get_image_setting = static function (
        $name,
        $default
    ) use ( $post_id ) {
        $value = '';

        if ( function_exists( 'get_field' ) ) {
            $value = get_field(
                $name,
                $post_id
            );
        }

        if (
            '' === $value
            || null === $value
            || false === $value
        ) {
            $value = get_post_meta(
                $post_id,
                $name,
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

    $image_fit = (string) $get_image_setting(
        'etos_news_image_fit',
        'cover'
    );

    if (
        ! in_array(
            $image_fit,
            array( 'cover', 'contain' ),
            true
        )
    ) {
        $image_fit = 'cover';
    }

    $image_scale = absint(
        $get_image_setting(
            'etos_news_image_scale',
            100
        )
    );

    $image_x = absint(
        $get_image_setting(
            'etos_news_image_x',
            50
        )
    );

    $image_y = absint(
        $get_image_setting(
            'etos_news_image_y',
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

    $previous_post = get_previous_post();
    $next_post     = get_next_post();
    ?>

    <main
        class="site-main etos-news-single"
        id="main"
    >

        <article
            <?php post_class( 'etos-news-article' ); ?>
            id="post-<?php the_ID(); ?>"
        >

            <header class="etos-news-article__header">

                <div class="container etos-container">

                    <div class="etos-news-article__header-inner">
<div class="etos-news-article__meta">

                            <time
                                datetime="<?php echo esc_attr(
                                    get_the_date( 'c' )
                                ); ?>"
                            >
                                <?php echo esc_html(
                                    get_the_date()
                                ); ?>
                            </time>
</div>

                        <h1 class="etos-news-article__title">
                            <?php the_title(); ?>
                        </h1>

                        <?php if ( '' !== $lead ) : ?>

                            <p class="etos-news-article__lead">
                                <?php echo esc_html(
                                    $lead
                                ); ?>
                            </p>

                        <?php endif; ?>

                    </div>

                </div>

            </header>

            <?php if ( has_post_thumbnail() ) : ?>

                <div class="etos-news-article__media-wrap">

                    <div class="container etos-container">

                        <figure class="etos-news-article__media">

                            <?php
                            echo get_the_post_thumbnail(
                                $post_id,
                                'full',
                                array(
                                    'class'         => 'etos-news-article__image',
                                    'loading'       => 'eager',
                                    'decoding'      => 'async',
                                    'fetchpriority' => 'high',
                                    'style'         => $image_style,
                                )
                            );
                            ?>

                        </figure>

                    </div>

                </div>

            <?php endif; ?>

            <div class="etos-news-article__body">

                <div class="container etos-container">

                    <div class="etos-news-article__content">

                        <?php the_content(); ?>

                        <?php
                        wp_link_pages(
                            array(
                                'before' => '<nav class="etos-news-article__pages">',
                                'after'  => '</nav>',
                            )
                        );
                        ?>

                    </div>

                </div>

            </div>

            <div class="etos-news-article__archive-return">

                <div class="container etos-container">

                    <a
                        class="btn btn-outline-primary"
                        href="<?php echo esc_url(
                            $archive_url
                        ); ?>"
                    >
                        <span aria-hidden="true">←</span>
                        <span>
                            <?php esc_html_e(
                                'Wszystkie aktualności',
                                'etos'
                            ); ?>
                        </span>
                    </a>

                </div>

            </div>

            <?php if (
                $previous_post
                || $next_post
            ) : ?>

                <nav
                    class="etos-news-post-nav"
                    aria-label="<?php esc_attr_e(
                        'Nawigacja między aktualnościami',
                        'etos'
                    ); ?>"
                >

                    <div class="container etos-container">

                        <div class="etos-news-post-nav__grid">

                            <div class="etos-news-post-nav__item etos-news-post-nav__item--previous">

                                <?php if ( $previous_post ) : ?>

                                    <span class="etos-news-post-nav__label">
                                        <?php esc_html_e(
                                            'Poprzednia aktualność',
                                            'etos'
                                        ); ?>
                                    </span>

                                    <a href="<?php echo esc_url(
                                        get_permalink(
                                            $previous_post
                                        )
                                    ); ?>">
                                        <span aria-hidden="true">
                                            ←
                                        </span>

                                        <span>
                                            <?php echo esc_html(
                                                get_the_title(
                                                    $previous_post
                                                )
                                            ); ?>
                                        </span>
                                    </a>

                                <?php endif; ?>

                            </div>

                            <div class="etos-news-post-nav__item etos-news-post-nav__item--next">

                                <?php if ( $next_post ) : ?>

                                    <span class="etos-news-post-nav__label">
                                        <?php esc_html_e(
                                            'Następna aktualność',
                                            'etos'
                                        ); ?>
                                    </span>

                                    <a href="<?php echo esc_url(
                                        get_permalink(
                                            $next_post
                                        )
                                    ); ?>">
                                        <span>
                                            <?php echo esc_html(
                                                get_the_title(
                                                    $next_post
                                                )
                                            ); ?>
                                        </span>

                                        <span aria-hidden="true">
                                            →
                                        </span>
                                    </a>

                                <?php endif; ?>

                            </div>

                        </div>

                    </div>

                </nav>

            <?php endif; ?>

        </article>

    </main>

    <?php
endwhile;

get_footer();