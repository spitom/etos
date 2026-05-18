<?php
/**
 * The template for displaying the front page.
 *
 * @package etos
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="wrapper" id="content" tabindex="-1">
    <main class="site-main" id="main" role="main">

        <!-- HERO SECTION -->
        <section class="hero-section bg-light py-5 position-relative overflow-hidden">
            <div class="container py-lg-5">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6">
                        <span class="badge-partner d-inline-block rounded-pill mb-4">Autoryzowany Partner ERP & IT</span>
                        <h1 class="display-4 fw-bold text-dark lh-sm mb-3">Cyfryzujemy procesy,<br>automatyzujemy biznes.</h1>
                        <p class="lead text-muted mb-4">Kompleksowo wdrażamy systemy Symfonia, InsERT i Streamsoft. Zapewniamy stabilną opiekę informatyczną oraz ciągłość działania Twojej firmy.</p>
                        <div class="d-flex flex-wrap gap-3">
                            <a href="#contact" class="btn btn-primary btn-lg px-4 fw-semibold text-white">Porozmawiaj z konsultantem</a>
                            <a href="#erp" class="btn btn-outline-dark btn-lg px-4">Poznaj systemy ERP</a>
                        </div>
                    </div>
                    <div class="col-lg-6 d-none d-lg-block">
                        
                        <div class="mockup-window shadow-lg rounded-4 p-3 bg-white">
                           
                            <div class="d-flex align-items-center border-bottom pb-3 mb-3">
                                <span class="dot" style="background: #ff5f56;"></span>
                                <span class="dot" style="background: #ffbd2e;"></span>
                                <span class="dot" style="background: #27c93f;"></span>
                                <div class="mockup-bar w-50 ms-3"></div>
                            </div>
                            
                            <div class="p-2">
                                <div class="row g-2 mb-3">
                                    <div class="col-4"><div class="p-3 bg-light rounded-3 text-center"><small class="fw-bold text-primary">Faktury</small><div class="mockup-bar w-75 mx-auto mt-2"></div></div></div>
                                    <div class="col-4"><div class="p-3 bg-light rounded-3 text-center"><small class="fw-bold text-success">Magazyn</small><div class="mockup-bar w-50 mx-auto mt-2"></div></div></div>
                                    <div class="col-4"><div class="p-3 bg-light rounded-3 text-center"><small class="fw-bold text-warning">KSeF</small><div class="mockup-bar w-100 mx-auto mt-2"></div></div></div>
                                </div>
                                <div class="p-4 bg-light rounded-3">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <div class="mockup-bar w-25 bg-secondary-subtle"></div>
                                        <div class="mockup-bar w-25 bg-primary"></div>
                                    </div>
                                    <div class="mockup-bar w-100 mb-2"></div>
                                    <div class="mockup-bar w-75"></div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>

        
        <section class="stats-section py-4 border-bottom bg-white">
            <div class="container">
                <div class="row text-center g-4">
                    <div class="col-6 col-md-3">
                        <p class="display-6 fw-bold text-primary mb-0">20+</p>
                        <small class="text-muted text-uppercase fw-semibold tracking-wider">Lat na rynku</small>
                    </div>
                    <div class="col-6 col-md-3">
                        <p class="display-6 fw-bold text-primary mb-0">500+</p>
                        <small class="text-muted text-uppercase fw-semibold tracking-wider">Obsłużonych firm</small>
                    </div>
                    <div class="col-6 col-md-3">
                        <p class="display-6 fw-bold text-primary mb-0">1500+</p>
                        <small class="text-muted text-uppercase fw-semibold tracking-wider">Wdrożonych modułów</small>
                    </div>
                    <div class="col-6 col-md-3">
                        <p class="display-6 fw-bold text-primary mb-0">100%</p>
                        <small class="text-muted text-uppercase fw-semibold tracking-wider">Wsparcia dla KSeF</small>
                    </div>
                </div>
            </div>
        </section>

       
        <section id="erp" class="software-grid">
            <div class="container">
                
                <div class="row mb-5 align-items-end g-4">
                    <div class="col-lg-7">
                        <h2 class="section-title">Wdrożenia systemów klasyfikowanych</h2>
                    </div>
                    <div class="col-lg-5">
                        <p class="text-muted mb-0 border-start ps-4 py-1" style="border-width: 3px !important; border-color: #00A0E3 !important; font-size: 0.95rem;">
                            Nie dopasowujemy Twojego biznesu do szablonu. Analizujemy procesy i integrujemy ekosystemy ERP liderów rynku, gwarantując bezwzględną stabilność i pełną gotowość prawną.
                        </p>
                    </div>
                </div>
                
                <div class="row g-4">
                    
                    <div class="col-lg-4">
                        <div class="erp-vendor-block vendor-symfonia">
                            <span class="vendor-pill">Dla dużych struktur i HR</span>
                            <h3 class="vendor-name">Symfonia ERP</h3>
                            <p class="vendor-text">Skomplikowane finanse, zautomatyzowane kadry i płace oraz zaawansowany Business Intelligence. Potężne środowisko dla organizacji poszukujących bezkompromisowej stabilności i precyzji raportowania.</p>
                            
                            <a href="#" class="vendor-link">
                                Poznaj moduły Symfonii
                                <svg class="ms-2" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3.33334 8H12.6667M12.6667 8L8 3.33334M12.6667 8L8 12.6667" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="erp-vendor-block vendor-insert">
                            <span class="vendor-pill">Ekosystem Nexo / GT</span>
                            <h3 class="vendor-name">InsERT</h3>
                            <p class="vendor-text">Niezrównana intuicyjność połączona z potężnymi możliwościami. Najpopularniejsze w Polsce rozwiązanie do zarządzania sprzedażą (Subiekt), gospodarką magazynową oraz elastyczną księgowością.</p>
                            
                            <a href="#" class="vendor-link">
                                Poznaj ekosystem InsERT
                                <svg class="ms-2" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3.33334 8H12.6667M12.6667 8L8 3.33334M12.6667 8L8 12.6667" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="erp-vendor-block vendor-streamsoft">
                            <span class="vendor-pill">Przemysł, Logistyka, WMS</span>
                            <h3 class="vendor-name">Streamsoft Prestiż</h3>
                            <p class="vendor-text">Bezlitosna wydajność i kontrola procesów. Autorskie moduły zaawansowanego planowania produkcji (APS), precyzyjne zarządzanie logistyką magazynową oraz automatyczna integracja z e-commerce.</p>
                            
                            <a href="#" class="vendor-link">
                                Poznaj system Prestiż
                                <svg class="ms-2" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3.33334 8H12.6667M12.6667 8L8 3.33334M12.6667 8L8 12.6667" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- 4. COMPLEMENTARY SERVICES (Inne usługi ETOS: Podpisy, Kasy, Opieka) -->
        <section class="other-services py-5 bg-white">
            <div class="container py-3">
                <div class="text-center max-width-600 mx-auto mb-5">
                    <h2 class="fw-bold text-dark">Kompleksowa infrastruktura IT</h2>
                    <p class="text-muted">Zamykamy wszystkie potrzeby technologiczne Twojego biura w jednym ręku.</p>
                </div>

                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="d-flex p-3 rounded-3 border h-100">
                            <div class="me-3 fs-3 text-primary">📑</div>
                            <div>
                                <h3 class="h5 fw-bold mb-2">Podpis Elektroniczny</h3>
                                <p class="text-muted small mb-0">Certyfikaty kwalifikowane EuroCert/KIR. Wydanie, odnowienie i konfiguracja w 30 minut.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-flex p-3 rounded-3 border h-100">
                            <div class="me-3 fs-3 text-primary">🛒</div>
                            <div>
                                <h3 class="h5 fw-bold mb-2">Urządzenia Fiskalne</h3>
                                <p class="text-muted small mb-0">Kasy i drukarki fiskalne online wiodących producentów (Posnet, Novitus). Pełen serwis i przeglądy.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-flex p-3 rounded-3 border h-100">
                            <div class="me-3 fs-3 text-primary">🛠️</div>
                            <div>
                                <h3 class="h5 fw-bold mb-2">Serwis & Outsourcing IT</h3>
                                <p class="text-muted small mb-0">Błyskawiczna pomoc zdalna, administracja serwerami oraz opieka nad bazami danych MS SQL.</p>
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