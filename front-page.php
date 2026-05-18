<?php
/**
 * The template for displaying the front page.
 *
 * @package etos
 */

// Blokada bezpośredniego dostępu
defined( 'ABSPATH' ) || exit;

get_header();

// Pobieramy typ kontenera z ustawień Customizera UnderStrapa (fixed vs fluid)
$container = get_theme_mod( 'understrap_container_type' );
?>

<!-- Główny kontener wymagany przez skiplink z header.php UnderStrapa -->
<div class="wrapper" id="content" tabindex="-1">

    <main class="site-main" id="main" role="main">

        <!-- Section 1: Hero -->
        <section class="hero-section bg-light py-5 border-bottom">
            <div class="container py-5 text-center">
                <h1 class="display-4 fw-bold text-dark">Nowoczesne Oprogramowanie dla Twojego Biznesu</h1>
                <p class="lead text-muted max-width-600 mx-auto my-4">Wdrażamy, integrujemy i serwisujemy systemy ERP: Symfonia, InsERT, Streamsoft. Sprawdź nasze usługi IT.</p>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <a href="#contact" class="btn btn-primary btn-lg px-4 gap-3">Skontaktuj się</a>
                    <a href="#software" class="btn btn-outline-secondary btn-lg px-4">Poznaj systemy</a>
                </div>
            </div>
        </section>

        <!-- Section 2: Core Software (Symfonia, InsERT, Streamsoft) -->
        <section id="software" class="software-summary-section py-5">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="fw-bold">Oprogramowanie w ofercie</h2>
                    <p class="text-muted">Kompleksowe systemy dopasowane do skali Twojej firmy</p>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4">
                        <div class="card h-100 shadow-sm border-0 p-4">
                            <div class="card-body">
                                <h3 class="h4 card-title fw-bold text-primary">Symfonia</h3>
                                <p class="card-text text-muted">Zaawansowane systemy ERP dla średnich i dużych przedsiębiorstw.</p>
                                <a href="#" class="btn btn-link p-0 text-decoration-none fw-semibold">Zobacz moduły i wdrożenia &rarr;</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card h-100 shadow-sm border-0 p-4">
                            <div class="card-body">
                                <h3 class="h4 card-title fw-bold text-success">InsERT</h3>
                                <p class="card-text text-muted">Przyjazne i intuicyjne programy dla małych i średnich firm (Subiekt, Nexo).</p>
                                <a href="#" class="btn btn-link p-0 text-decoration-none fw-semibold">Zobacz moduły i wdrożenia &rarr;</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card h-100 shadow-sm border-0 p-4">
                            <div class="card-body">
                                <h3 class="h4 card-title fw-bold text-warning">Streamsoft</h3>
                                <p class="card-text text-muted">Potężne rozwiązania dla produkcji, logistyki i handlu detalicznego.</p>
                                <a href="#" class="btn btn-link p-0 text-decoration-none fw-semibold">Zobacz moduły i wdrożenia &rarr;</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 3: IT Services Preview -->
        <section class="services-section bg-light py-5">
            <div class="container text-center py-4">
                <h2 class="fw-bold mb-4">Usługi IT, Serwis i Podpisy Elektroniczne</h2>
                <p class="text-muted mb-5">Zapewniamy ciągłość działania Twojej infrastruktury informatycznej.</p>
                <div class="row g-3 justify-content-center">
                    <div class="col-6 col-md-3"><div class="p-3 bg-white rounded shadow-sm">Serwis sprzętu</div></div>
                    <div class="col-6 col-md-3"><div class="p-3 bg-white rounded shadow-sm">Podpis kwalifikowany</div></div>
                    <div class="col-6 col-md-3"><div class="p-3 bg-white rounded shadow-sm">Urządzenia fiskalne</div></div>
                </div>
            </div>
        </section>

    </main><!-- #main -->

</div><!-- #content -->

<?php
get_footer();