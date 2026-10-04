<?php
/**
 * Default template for standard WordPress pages.
 *
 * @package ETOS
 */

defined( 'ABSPATH' ) || exit;

$GLOBALS['etos_footer_cta_hide'] = true;

get_header();

while ( have_posts() ) :
    the_post();
    ?>

    <main class="site-main etos-default-page" id="main">

        <article
            <?php post_class( 'etos-default-page__article' ); ?>
            id="post-<?php the_ID(); ?>"
        >

            <header class="etos-default-page__hero">

                <div class="container etos-container">

                    <div class="etos-default-page__hero-inner">

                        <h1 class="etos-default-page__title">
                            <?php the_title(); ?>
                        </h1>

                        <?php if ( has_excerpt() ) : ?>

                            <p class="etos-default-page__lead">
                                <?php echo esc_html( get_the_excerpt() ); ?>
                            </p>

                        <?php endif; ?>

                    </div>

                </div>

            </header>

            <section class="etos-default-page__body">

                <div class="container etos-container">

                    <div class="etos-default-page__content entry-content">

                        <?php
                        the_content();

                        understrap_link_pages();
                        ?>

                    </div>

                    <?php if (
                        comments_open()
                        || get_comments_number()
                    ) : ?>

                        <div class="etos-default-page__comments">
                            <?php comments_template(); ?>
                        </div>

                    <?php endif; ?>

                </div>

            </section>

        </article>

    </main>

    <?php
endwhile;

get_footer();
