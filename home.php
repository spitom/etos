<?php
/**
 * Posts archive.
 *
 * @package ETOS
 */

defined( 'ABSPATH' ) || exit;

get_header();

$GLOBALS['etos_footer_cta_hide'] = true;

$posts_page_id = absint(
    get_option( 'page_for_posts' )
);

$archive_title = $posts_page_id
    ? get_the_title( $posts_page_id )
    : __( 'Aktualności', 'etos' );

if ( '' === trim( (string) $archive_title ) ) {
    $archive_title = __( 'Aktualności', 'etos' );
}

$archive_intro = __(
    'Aktualności, informacje o rozwiązaniach ETOS oraz praktyczna wiedza dla firm.',
    'etos'
);

$current_search = isset( $_GET['news_search'] )
    ? sanitize_text_field(
        wp_unslash( $_GET['news_search'] )
    )
    : '';

$current_category = isset( $_GET['news_cat'] )
    ? absint( $_GET['news_cat'] )
    : 0;

$paged = max(
    1,
    absint( get_query_var( 'paged' ) ),
    absint( get_query_var( 'page' ) )
);

$query_args = array(
    'post_type'           => 'post',
    'post_status'         => 'publish',
    'posts_per_page'      => 9,
    'paged'               => $paged,
    'orderby'             => 'date',
    'order'               => 'DESC',
    'ignore_sticky_posts' => true,
);

if ( '' !== $current_search ) {
    $query_args['s'] = $current_search;
}

if ( $current_category ) {
    $query_args['cat'] = $current_category;
}

$news_query = new WP_Query(
    $query_args
);

$categories = get_categories(
    array(
        'hide_empty' => true,
    )
);

/**
 * Read image display setting.
 *
 * @param string $name    Field name.
 * @param int    $post_id Post ID.
 * @param mixed  $default Default.
 * @return mixed
 */
$get_image_setting = static function (
    $name,
    $post_id,
    $default
) {
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
?>

<main
    class="site-main etos-news-archive"
    id="main"
>

    <header class="etos-news-archive__hero">

        <div class="container etos-container">

            <span class="etos-kicker">
                <?php esc_html_e(
                    'ETOS',
                    'etos'
                ); ?>
            </span>

            <h1>
                <?php echo esc_html(
                    $archive_title
                ); ?>
            </h1>

            <p>
                <?php echo esc_html(
                    $archive_intro
                ); ?>
            </p>

        </div>

    </header>

    <section class="etos-news-archive__content">

        <div class="container etos-container">
<?php if ( $news_query->have_posts() ) : ?>

                <div class="etos-news-grid">

                    <?php
                    while ( $news_query->have_posts() ) :
                        $news_query->the_post();

                        $post_id = get_the_ID();

                        $raw_excerpt = (string) get_post_field(
                            'post_excerpt',
                            $post_id
                        );

                        $raw_content = (string) get_post_field(
                            'post_content',
                            $post_id
                        );

                        $source_text = (
                            '' !== trim(
                                $raw_excerpt
                            )
                        )
                            ? $raw_excerpt
                            : $raw_content;

                        $excerpt = wp_trim_words(
                            trim(
                                wp_strip_all_tags(
                                    strip_shortcodes(
                                        $source_text
                                    )
                                )
                            ),
                            22,
                            '…'
                        );

                        $image_fit = (string) $get_image_setting(
                            'etos_news_image_fit',
                            $post_id,
                            'cover'
                        );

                        if (
                            ! in_array(
                                $image_fit,
                                array(
                                    'cover',
                                    'contain',
                                ),
                                true
                            )
                        ) {
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

                        $image_scale = min(
                            160,
                            max(
                                100,
                                $image_scale
                            )
                        );

                        $image_x = min(
                            100,
                            max(
                                0,
                                $image_x
                            )
                        );

                        $image_y = min(
                            100,
                            max(
                                0,
                                $image_y
                            )
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

                        $post_categories = get_the_category(
                            $post_id
                        );

                        $category_name = ! empty(
                            $post_categories
                        )
                            ? $post_categories[0]->name
                            : '';
                        ?>

                        <article class="etos-news-card">

                            <a
                                class="etos-news-card__media"
                                href="<?php the_permalink(); ?>"
                                aria-hidden="true"
                                tabindex="-1"
                            >

                                <?php if (
                                    has_post_thumbnail()
                                ) : ?>

                                    <?php
                                    echo get_the_post_thumbnail(
                                        $post_id,
                                        'large',
                                        array(
                                            'class'    => 'etos-news-card__image',
                                            'loading'  => 'lazy',
                                            'decoding' => 'async',
                                            'style'    => $image_style,
                                        )
                                    );
                                    ?>

                                <?php else : ?>

                                    <span
                                        class="etos-news-card__placeholder"
                                        aria-hidden="true"
                                    ></span>

                                <?php endif; ?>

                            </a>

                            <div class="etos-news-card__body">

                                <div class="etos-news-card__meta">

                                    <time
                                        datetime="<?php echo esc_attr(
                                            get_the_date(
                                                'c'
                                            )
                                        ); ?>"
                                    >
                                        <?php echo esc_html(
                                            get_the_date()
                                        ); ?>
                                    </time>

                                    <?php if (
                                        '' !== $category_name
                                    ) : ?>

                                        <span
                                            aria-hidden="true"
                                        >
                                            •
                                        </span>

                                        <span>
                                            <?php echo esc_html(
                                                $category_name
                                            ); ?>
                                        </span>

                                    <?php endif; ?>

                                </div>

                                <h2 class="etos-news-card__title">

                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>

                                </h2>

                                <?php if ( $excerpt ) : ?>

                                    <p class="etos-news-card__excerpt">
                                        <?php echo esc_html(
                                            $excerpt
                                        ); ?>
                                    </p>

                                <?php endif; ?>

                                <a
                                    class="etos-news-card__link"
                                    href="<?php the_permalink(); ?>"
                                >
                                    <span>
                                        <?php esc_html_e(
                                            'Czytaj więcej',
                                            'etos'
                                        ); ?>
                                    </span>

                                    <span aria-hidden="true">
                                        →
                                    </span>
                                </a>

                            </div>

                        </article>

                    <?php endwhile; ?>

                </div>

                <?php
                $pagination = paginate_links(
                    array(
                        'base'      => str_replace(
                            999999999,
                            '%#%',
                            esc_url(
                                get_pagenum_link(
                                    999999999
                                )
                            )
                        ),
                        'format'    => '?paged=%#%',
                        'current'   => $paged,
                        'total'     => max(
                            1,
                            $news_query->max_num_pages
                        ),
                        'type'      => 'list',
                        'prev_text' => '←',
                        'next_text' => '→',
                        'add_args'  => array_filter(
                            array(
                                'news_search' => $current_search,
                                'news_cat'    => $current_category,
                            )
                        ),
                    )
                );
                ?>

                <?php if ( $pagination ) : ?>

                    <nav
                        class="etos-news-pagination"
                        aria-label="<?php esc_attr_e(
                            'Paginacja aktualności',
                            'etos'
                        ); ?>"
                    >
                        <?php
                        echo wp_kses_post(
                            $pagination
                        );
                        ?>
                    </nav>

                <?php endif; ?>

            <?php else : ?>

                <div class="etos-news-empty">

                    <h2>
                        <?php esc_html_e(
                            'Nie znaleziono aktualności',
                            'etos'
                        ); ?>
                    </h2>

                    <p>
                        <?php esc_html_e(
                            'Zmień kryteria wyszukiwania lub wyświetl wszystkie aktualności.',
                            'etos'
                        ); ?>
                    </p>

                </div>

            <?php endif; ?>

            <?php wp_reset_postdata(); ?>

        </div>

    </section>

</main>

<?php
get_footer();