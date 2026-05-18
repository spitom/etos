<?php
/**
 * Template Name: IT Maintenance Service Page
 *
 * @package etos
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="wrapper" id="content" tabindex="-1">
    <main class="site-main" id="main" role="main">

        <!-- Hero -->
        <section class="it-service-hero bg-light py-5">
            <div class="container py-4">
                <h1 class="display-4 fw-bold text-dark">Szybki Serwis Sprzętu i Oprogramowania</h1>
                <p class="lead text-muted my-4">Awaria serwera? Problem z bazą danych ERP? Nasz zespół inżynierów reaguje natychmiast, minimalizując przestój w Twojej firmie.</p>
                <div class="bg-warning text-dark p-3 rounded d-inline-block fw-bold shadow-sm mb-3">
                    Infolinia serwisowa dla stałych klientów: 24/7
                </div>
            </div>
        </section>

        <!-- Scope -->
        <section class="it-service-scope py-5">
            <div class="container">
                <div class="row g-4">
                    <div class="col-md-6">
                        <h2 class="fw-bold mb-3">Serwis komputerów i serwerów</h2>
                        <p class="text-muted small">Naprawy sprzętowe, modernizacje, diagnostyka uszkodzeń, czyszczenie oraz dostawa części zamiennych renomowanych marek.</p>
                    </div>
                    <div class="col-md-6">
                        <h2 class="fw-bold mb-3">Wsparcie powdrożeniowe i bazy danych</h2>
                        <p class="text-muted small">Naprawa uszkodzonych struktur baz danych SQL, optymalizacja działania systemów Symfonia/InsERT, instalacja poprawek i hotfixów.</p>
                    </div>
                </div>
            </div>
        </section>

    </main>
</div>

<?php
get_footer();