<?php
/**
 * Template Name: Contact Page
 *
 * @package etos
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="wrapper" id="content" tabindex="-1">
    <main class="site-main" id="main" role="main">

        <section class="contact-section py-5">
            <div class="container py-4">
                <div class="text-center mb-5">
                    <h1 class="display-4 fw-bold text-dark">Skontaktuj się z nami</h1>
                    <p class="lead text-muted">Odpowiemy na Twoje pytania i przygotujemy niezobowiązującą ofertę</p>
                </div>

                <div class="row g-5">
                    <!-- Contact Details -->
                    <div class="col-lg-5">
                        <div class="bg-light p-4 rounded shadow-sm h-100">
                            <h2 class="h4 fw-bold mb-4">Dane firmy</h2>
                            <p class="mb-2"><strong>ETOS Sp. z o.o.</strong></p>
                            <p class="text-muted small mb-4">Adres firmy, kod pocztowy, miasto</p>
                            
                            <hr>

                            <h3 class="h5 fw-bold mb-3">Dział handlowy i wdrożenia</h3>
                            <p class="small mb-1">Telefon: <a href="tel:+48000000000" class="text-decoration-none">+48 000 000 000</a></p>
                            <p class="small mb-4">E-mail: <a href="mailto:biuro@etos.pl" class="text-decoration-none">biuro@etos.pl</a></p>

                            <h3 class="h5 fw-bold mb-3">Godziny otwarcia</h3>
                            <p class="text-muted small mb-0">Poniedziałek - Piątek: 8:00 - 16:00</p>
                        </div>
                    </div>

                    <!-- Contact Form Placeholder -->
                    <div class="col-lg-7">
                        <div class="p-4 border rounded shadow-sm h-100 bg-white">
                            <h2 class="h4 fw-bold mb-4">Napisz do nas</h2>
                            <p class="text-muted small mb-4">[Tu w kolejnym kroku osadzimy shortcode formularza, np. Contact Form 7 lub WPForms]</p>
                            
                            <!-- Wizualny mockup formularza pod szefa -->
                            <div class="mb-3">
                                <label class="form-label small fw-bold">Imię i nazwisko / Firma</label>
                                <input type="text" class="form-control" disabled placeholder="Wpisz dane">
                            </div>
                            <div class="mb-3">
                                <label class="form-label small fw-bold">Adres e-mail</label>
                                <input type="email" class="form-control" disabled placeholder="name@example.com">
                            </div>
                            <div class="mb-3">
                                <label class="form-label small fw-bold">Treść wiadomości</label>
                                <textarea class="form-control" disabled rows="4" placeholder="Opisz swoje potrzeby..."></textarea>
                            </div>
                            <button class="btn btn-primary w-100" disabled>Wyślij wiadomość</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
</div>

<?php
get_footer();