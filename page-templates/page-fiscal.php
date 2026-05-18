<?php
/**
 * Template Name: Fiscal Devices Page
 *
 * @package etos
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="wrapper" id="content" tabindex="-1">
    <main class="site-main" id="main" role="main">

        <!-- Hero -->
        <section class="fiscal-hero bg-dark text-white py-5">
            <div class="container py-5 text-center">
                <h1 class="display-4 fw-bold">Kasy i Drukarki Fiskalne Online</h1>
                <p class="lead text-light-50 max-width-600 mx-auto my-4">Autoryzowany serwis i sprzedaż wiodących producentów. Dobierzemy urządzenie idealne dla Twojego punktu handlowego lub usługowego.</p>
            </div>
        </section>

        <!-- Categories -->
        <section class="fiscal-categories py-5">
            <div class="container">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="p-4 border rounded h-100 bg-light">
                            <h2 class="h4 fw-bold mb-3">Kasy Fiskalne</h2>
                            <p class="text-muted small">Kompaktowe, mobilne oraz stacjonarne urządzenia dla mechaników, lekarzy, prawników, gastronomii i handlu.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-4 border rounded h-100 bg-light">
                            <h2 class="h4 fw-bold mb-3">Drukarki Fiskalne</h2>
                            <p class="text-muted small">Wydajne urządzenia przeznaczone do współpracy z systemami sprzedażowymi (np. Subiekt GT/Nexo) w sklepach i marketach.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Additional Services -->
        <section class="fiscal-services py-5 border-top">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="fw-bold">Kompleksowy Serwis Fiskalny</h2>
                </div>
                <div class="row g-3 justify-content-center text-center">
                    <div class="col-6 col-md-3"><div class="p-3 bg-white rounded shadow-sm border">Fiskalizacja urządzeń</div></div>
                    <div class="col-6 col-md-3"><div class="p-3 bg-white rounded shadow-sm border">Obowiązkowe przeglądy</div></div>
                    <div class="col-6 col-md-3"><div class="p-3 bg-white rounded shadow-sm border">Szkolenie kasjerów</div></div>
                    <div class="col-6 col-md-3"><div class="p-3 bg-white rounded shadow-sm border">Rolki i akcesoria</div></div>
                </div>
            </div>
        </section>

    </main>
</div>

<?php
get_footer();