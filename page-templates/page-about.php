<?php
/**
 * Template Name: About Us Page
 *
 * @package etos
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="wrapper" id="content" tabindex="-1">
    <main class="site-main" id="main" role="main">

        <!-- Hero Section -->
        <section class="about-hero bg-light py-5">
            <div class="container py-4">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <h1 class="display-4 fw-bold text-dark">Poznaj ETOS</h1>
                        <p class="lead text-muted my-4">Od lat dostarczamy kompleksowe rozwiązania informatyczne dla przedsiębiorstw. Pomagamy firmom rosnąć poprzez automatyzację procesów biznesowych.</p>
                    </div>
                    <div class="col-lg-6 text-center">
                        <div class="p-5 bg-secondary text-white rounded shadow-sm"></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Values / Mission -->
        <section class="about-values py-5">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="fw-bold">Nasze wartości</h2>
                    <p class="text-muted">To, czym kierujemy się w codziennej pracy z naszymi klientami</p>
                </div>
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="p-4 border rounded h-100">
                            <h3 class="h5 fw-bold text-primary">Doświadczenie</h3>
                            <p class="text-muted small mb-0">Znamy systemy ERP od podszewki. Przetarliśmy szlaki w setkach wymagających wdrożeń.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-4 border rounded h-100">
                            <h3 class="h5 fw-bold text-primary">Dostępność i wsparcie</h3>
                            <p class="text-muted small mb-0">Nie zostawiamy klienta po fakturze. Oferujemy stałą opiekę i szybki czas reakcji serwisu.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-4 border rounded h-100">
                            <h3 class="h5 fw-bold text-primary">Zgodność z przepisami</h3>
                            <p class="text-muted small mb-0">Dbamy o to, by Twoje oprogramowanie było zawsze gotowe na zmiany w polskim prawie.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
</div>

<?php
get_footer();