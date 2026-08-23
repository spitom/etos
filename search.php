<?php
/**
 * Search results.
 *
 * @package ETOS
 */

defined( 'ABSPATH' ) || exit;

get_header();

$search_query = get_search_query();
?>

<main
    class="site-main"
    id="main"
>

    <header class="py-5 bg-light">
        <div class="container etos-container">

            <span class="etos-kicker">
                <?php esc_html_e( 'ETOS', 'etos' ); ?>
            </span>

            <h1 class="mb-3">
                <?php esc_html_e( 'Wyniki wyszukiwania', 'etos' ); ?>
            </h1>

            <?php if ( '' !== $search_query ) : ?>

                <p class="lead mb-4">
                    <?php
                    printf(
                        /* translators: %s: search query. */
                        esc_html__( 'Wyniki dla: „%s”', 'etos' ),
                        esc_html( $search_query )
                    );
                    ?>
                </p>

            <?php endif; ?>

            <div class="col-lg-8 col-xl-7">
                <?php get_search_form(); ?>
            </div>

        </div>
    </header>

    <section class="py-5">
        <div class="container etos-container">

            <?php if ( have_posts() ) : ?>

                <p class="mb-4 text-muted">
                    <?php
                    printf(
                        /* translators: %s: number of search results. */
                        esc_html(
                            _n(
                                'Znaleziono %s wynik.',
                                'Znaleziono %s wyników.',
                                (int) $wp_query->found_posts,
                                'etos'
                            )
                        ),
                        esc_html(
                            number_format_i18n(
                                (int) $wp_query->found_posts
                            )
                        )
                    );
                    ?>
                </p>

                <div class="row g-4">

                    <?php
                    while ( have_posts() ) :
                        the_post();

                        $post_type        = get_post_type();
                        $post_type_object = get_post_type_object(
                            $post_type
                        );

                        if ( 'post' === $post_type ) {
                            $type_label = __(
                                'Aktualność',
                                'etos'
                            );
                        } elseif ( $post_type_object ) {
                            $type_label = $post_type_object
                                ->labels
                                ->singular_name;
                        } else {
                            $type_label = __(
                                'Treść',
                                'etos'
                            );
                        }

                        $post_id = get_the_ID();

                        $excerpt = function_exists(
                            'etos_get_search_result_excerpt'
                        )
                            ? etos_get_search_result_excerpt(
                                $post_id,
                                24
                            )
                            : '';
                        ?>

                        <div class="col-12 col-lg-6">

                            <article class="h-100 border rounded-4 p-4">

                                <p class="small text-muted mb-2">
                                    <?php echo esc_html( $type_label ); ?>
                                </p>

                                <h2 class="h4 mb-3">
                                    <a
                                        class="text-decoration-none"
                                        href="<?php the_permalink(); ?>"
                                    >
                                        <?php the_title(); ?>
                                    </a>
                                </h2>

                                <?php if ( '' !== $excerpt ) : ?>

                                    <p class="mb-4 text-muted">
                                        <?php echo esc_html( $excerpt ); ?>
                                    </p>

                                <?php endif; ?>

                                <a
                                    class="fw-semibold text-decoration-none"
                                    href="<?php the_permalink(); ?>"
                                >
                                    <?php esc_html_e( 'Zobacz wynik', 'etos' ); ?>
                                    <span aria-hidden="true">→</span>
                                </a>

                            </article>

                        </div>

                    <?php endwhile; ?>

                </div>

                <?php
                the_posts_pagination(
                    array(
                        'mid_size'  => 2,
                        'prev_text' => __(
                            '← Poprzednia',
                            'etos'
                        ),
                        'next_text' => __(
                            'Następna →',
                            'etos'
                        ),
                    )
                );
                ?>

            <?php else : ?>

                <div class="py-5 text-center">

                    <h2 class="h3">
                        <?php esc_html_e(
                            'Nie znaleziono wyników',
                            'etos'
                        ); ?>
                    </h2>

                    <p class="text-muted mb-4">
                        <?php esc_html_e(
                            'Spróbuj użyć innego słowa lub krótszej frazy.',
                            'etos'
                        ); ?>
                    </p>

                    <div class="col-lg-7 mx-auto">
                        <?php get_search_form(); ?>
                    </div>

                </div>

            <?php endif; ?>

        </div>
    </section>

</main>

<?php
get_footer();
