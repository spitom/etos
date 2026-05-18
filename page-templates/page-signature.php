<?php
/**
 * Template Name: Digital Signature Page
 *
 * @package etos
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="wrapper" id="content" tabindex="-1">
    <main class="site-main" id="main" role="main">

        <!-- Hero -->
        <section class="signature-hero bg-light py-5">
            <div class="container py-4">
                <div class="row align-items-center">
                    <div class="col-md-7">
                        <h1 class="display-4 fw-bold text-dark">Kwalifikowany Podpis Elektroniczny</h1>
                        <p class="lead text-muted my-4">Podpisuj dokumenty, umowy i deklaracje urzędowe bez wychodzenia z biura. Oferujemy szybkie wydanie certyfikatu i pełne wsparcie techniczne.</p>
                        <a href="#contact" class="btn btn-primary">Uzyskaj podpis w 30 minut</a>
                    </div>
                    <div class="col-md-5 d-none d-md-block">
                        <div class="card border-0 shadow-lg p-4 rounded-4 bg-dark text-white position-relative overflow-hidden" style="max-width: 350px; margin: 0 auto;">
                            <div class="position-absolute top-0 end-0 p-3 opacity-25">
                                <span class="display-1">🔒</span>
                            </div>
                            <div class="mb-4">
                                <span class="badge bg-primary text-white mb-2">EuroCert Partner</span>
                                <h4 class="fw-bold mb-0">SimplySign</h4>
                                <small class="text-muted">Mobilny podpis kwalifikowany</small>
                            </div>
                            <div class="pt-5 mt-4 border-top border-secondary">
                                <p class="small text-uppercase tracking-wider text-muted mb-1">Status Certyfikatu</p>
                                <div class="d-flex align-items-center gap-2">
                                    <span class="d-inline-block bg-success rounded-circle" style="width: 10px; height: 10px;"></span>
                                    <span class="small fw-semibold">Aktywny i bezpieczny</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Process Step by Step -->
        <section class="signature-process py-5">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="fw-bold">Jak uzyskać podpis elektroniczny?</h2>
                </div>
                <div class="row g-4 text-center">
                    <div class="col-md-4">
                        <div class="p-3">
                            <div class="badge bg-primary rounded-circle mb-3 fs-5 p-3">1</div>
                            <h3 class="h5 fw-bold">Kontakt i wybór</h3>
                            <p class="text-muted small">Dobieramy odpowiedni okres ważności karty lub wersję mobilną (w chmurze).</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3">
                            <div class="badge bg-primary rounded-circle mb-3 fs-5 p-3">2</div>
                            <h3 class="h5 fw-bold">Weryfikacja tożsamości</h3>
                            <p class="text-muted small">Potwierdzamy Twoje dane w naszym punkcie lub bezpośrednio u Ciebie w firmie.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3">
                            <div class="badge bg-primary rounded-circle mb-3 fs-5 p-3">3</div>
                            <h3 class="h5 fw-bold">Instalacja i szkolenie</h3>
                            <p class="text-muted small">Konfigurujemy oprogramowanie na Twoim komputerze i pokazujemy jak podpisać pierwszy dokument.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
</div>

<?php
get_footer();