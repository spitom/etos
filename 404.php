<?php
/**
 * The template for displaying 404 pages.
 *
 * @package ETOS
 */

defined( 'ABSPATH' ) || exit;

$GLOBALS['etos_footer_cta_hide'] = true;

get_header();
?>

<main
    class="site-main"
    id="main"
>

    <header class="py-5 bg-light">
        <div class="container etos-container">

            <span class="etos-kicker">
                <?php esc_html_e( 'Błąd 404', 'etos' ); ?>
            </span>

            <h1 class="mb-3">
                <?php esc_html_e( 'Nie znaleziono strony', 'etos' ); ?>
            </h1>

            <p class="lead mb-4">
                <?php esc_html_e(
                    'Strona, której szukasz, nie istnieje lub jej adres został zmieniony.',
                    'etos'
                ); ?>
            </p>

            <a
                class="btn btn-primary"
                href="<?php echo esc_url( home_url( '/' ) ); ?>"
            >
                <?php esc_html_e(
                    'Przejdź do strony głównej',
                    'etos'
                ); ?>
            </a>

        </div>
    </header>

    <section class="py-5">
        <div class="container etos-container">

            <div class="py-4 text-center">

                <h2 class="h3">
                    <?php esc_html_e(
                        'Poszukaj interesującej Cię treści',
                        'etos'
                    ); ?>
                </h2>

                <p class="text-muted mb-4">
                    <?php esc_html_e(
                        'Możesz skorzystać z wyszukiwarki, aby znaleźć właściwą stronę.',
                        'etos'
                    ); ?>
                </p>

                <div class="col-lg-7 mx-auto">
                    <?php get_search_form(); ?>
                </div>

            </div>

        </div>
    </section>

</main>

<?php
get_footer();
