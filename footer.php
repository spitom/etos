<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper text-light" id="wrapper-footer">

    <div class="<?php echo esc_attr( $container ); ?>">

        <footer class="site-footer" id="colophon" role="contentinfo">
            
            <div class="row py-5 g-4">
                
                <div class="col-lg-4 col-md-6">
                    <div class="footer-brand mb-3">
                        <span class="fs-4 fw-bold text-white tracking-wider">etos</span>
                    </div>
                    <p class="text-muted small lh-lg mb-0">Autoryzowany partner i integrator systemów ERP. Od ponad 20 lat dostarczamy niezawodne rozwiązania informatyczne dla przedsiębiorstw, dbając o ich rozwój i bezpieczeństwo cyfrowe.</p>
                </div>

                <div class="col-lg-4 col-md-6">
                    <h3 class="h6 fw-bold text-white text-uppercase tracking-wider mb-3">Oprogramowanie & Usługi</h3>
                    <ul class="list-unstyled footer-links small">
                        <li class="mb-2"><a href="#">Symfonia ERP</a></li>
                        <li class="mb-2"><a href="#">InsERT Nexo / GT</a></li>
                        <li class="mb-2"><a href="#">Streamsoft Prestiż</a></li>
                        <li class="mb-2"><a href="#">Podpis Elektroniczny</a></li>
                        <li class="mb-2"><a href="#">Usługi i Serwis IT</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-12">
                    <h3 class="h6 fw-bold text-white text-uppercase tracking-wider mb-3">Biuro Obsługi Klienta</h3>
                    <p class="text-muted small mb-2 fw-semibold">ETOS Sp. z o.o.</p>
                    <p class="text-muted small mb-1">Infolinia: <a href="tel:+48000000000" class="text-white text-decoration-none fw-bold">+48 000 000 000</a></p>
                    <p class="text-muted small mb-3">E-mail: <a href="mailto:biuro@etos.pl" class="text-white text-decoration-none">biuro@etos.pl</a></p>
                    <p class="text-muted small mb-0 fs-7">Poniedziałek - Piątek: 8:00 - 16:00</p>
                </div>

            </div><div class="row border-top pt-4 pb-2 align-items-center sub-footer">
                <div class="col-md-6 text-center text-md-start">
                    <p class="text-muted small mb-0">&copy; <?php echo date('Y'); ?> ETOS. Wszelkie prawa zastrzeżone.</p>
                </div>
                <div class="col-md-6 text-center text-md-end mt-2 mt-md-0">
                    <span class="badge bg-dark text-muted border border-secondary-subtle font-monospace px-2 py-1" style="font-size: 0.75rem;">WCAG 2.1 AA Compliant</span>
                </div>
            </div>

        </footer></div></div><?php // Closing div#page from header.php. ?>
</div><?php wp_footer(); ?>

</body>

</html>