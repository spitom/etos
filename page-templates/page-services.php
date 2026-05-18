<?php
/**
 * Template Name: IT Services Page
 *
 * @package etos
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="wrapper" id="content" tabindex="-1">
    <main class="site-main" id="main" role="main">

        <!-- Hero -->
        <section class="services-hero bg-dark text-white py-5">
            <div class="container py-5 text-center">
                <h1 class="display-4 fw-bold">Kompleksowe Usługi IT dla Firm</h1>
                <p class="lead text-light-50 max-width-600 mx-auto my-4">Opieka informatyczna, administracja sieciami i bezpieczeństwo danych. Skup się na biznesie, my zajmiemy się technologią.</p>
            </div>
        </section>

        <!-- Services Grid -->
        <section class="services-list py-5">
            <div class="container">
                <div class="row g-4">
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm border-0 p-3">
                            <div class="card-body">
                                <h2 class="h5 card-title fw-bold">Outsourcing IT</h2>
                                <p class="card-text text-muted small">Pełna odpowiedzialność za Twoją infrastrukturę komputerową. Zastępujemy lub wspieramy wewnętrzny dział IT.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm border-0 p-3">
                            <div class="card-body">
                                <h2 class="h5 card-title fw-bold">Sieci i Bezpieczeństwo</h2>
                                <p class="card-text text-muted small">Projektowanie, wdrażanie i zabezpieczanie sieci firmowych. Ochrona przed utratą danych i cyberatakami.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm border-0 p-3">
                            <div class="card-body">
                                <h2 class="h5 card-title fw-bold">Chmura i Serwery</h2>
                                <p class="card-text text-muted small">Migracja zasobów do chmury, konfiguracja serwerów Windows/Linux oraz opieka nad kopiami zapasowymi (Backup).</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
</div>

<?php
get_footer();