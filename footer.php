<?php
/**
 * The template for displaying the footer.
 *
 * @package Understrap
 */

defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper" id="wrapper-footer">

    <div class="<?php echo esc_attr( $container ); ?>">

        <?php

        $footer_cta = $GLOBALS['etos_footer_cta'] ?? array(
            'eyebrow' => 'Rozpocznij rozmowę o wdrożeniu',
            'title'   => 'Sprawdź, jak uporządkować procesy w Twojej firmie.',
            'text'    => 'Porozmawiaj z konsultantem ETOS o systemach ERP, infrastrukturze IT, integracjach i wsparciu.',
            'button'  => 'Umów konsultację',
            'url'     => '/kontakt/',
        );
        ?>

        <footer class="site-footer etos-footer" id="colophon" role="contentinfo">

            <?php if ( empty( $GLOBALS['etos_footer_cta_hide'] ) ) : ?>
                <?php
                get_template_part(
                    'template-parts/components/cta',
                    'panel',
                    array(
                        'cta' => $footer_cta + array(
                            'class' => 'etos-cta-panel--footer',
                        ),
                    )
                );
                ?>
            <?php endif; ?>

            <div class="etos-footer__main">
                <div class="row g-5">

                    <div class="col-xl-4 col-lg-5">
                        <div class="etos-footer__brand">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="etos-footer__logo" aria-label="ETOS — strona główna">

                                <img
                                    src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/footer/logo.png' ); ?>"
                                    alt="ETOS"
                                    class="img-fluid"
                                    loading="lazy"
                                >

                            </a>

                            <p>
                                Autoryzowany partner i integrator systemów ERP. Wspieramy firmy
                                we wdrażaniu oprogramowania oraz utrzymaniu
                                stabilnego środowiska IT.
                            </p>
                        </div>

                        <div class="etos-footer__trust">
                            <span>ERP</span>
                            <span>IT</span>
                            <span>KSeF</span>
                            <span>Serwis</span>
                        </div>
                    </div>

                    <div class="col-xl-5 col-lg-4">
                        <div class="row g-4">
                            <div class="col-sm-6">
                                <h3>Systemy ERP</h3>
                                <ul>
                                    <li><a href="#">Symfonia</a></li>
                                    <li><a href="#">InsERT</a></li>
                                    <li><a href="#">Streamsoft</a></li>
                                </ul>
                            </div>

                            <div class="col-sm-6">
                                <h3>Usługi IT</h3>
                                <ul>
                                    <li><a href="#">Integracje systemów</a></li>
                                    <li><a href="#">Podpis elektroniczny</a></li>
                                    <li><a href="#">Urządzenia fiskalne</a></li>
                                    <li><a href="#">Serwis IT</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3">
                        <h3>Kontakt</h3>

                        <address class="etos-footer__contact">
                            <strong>ETOS Sp. z o.o.</strong>
                            <span>ul. Mochnackiego 10</span>
                            <span>10-037 Olsztyn</span>

                            <a href="tel:+48 89 535 08 08">+48 89 535 08 08 - sklep, serwis</a>
                            <a href="tel:+48 89 535 23 09">+48 89 535 23 09 - wdrożenia</a>
                            <a href="mailto:info@etos.com.pl">info@etos.com.pl</a>
                        </address>
                    </div>

                </div>
            </div>

            <div class="etos-footer__bottom">
                <p>&copy; <?php echo esc_html( date( 'Y' ) ); ?> ETOS</p>

                <nav aria-label="Linki prawne">
                    <a href="#">Polityka prywatności</a>
                    <a href="#">Polityka cookies</a>
                </nav>
            </div>

        </footer>

    </div>

</div>

<?php wp_footer(); ?>

</body>
</html>