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
    <main class="site-main site-main--front" id="main" role="main">

        <!-- HERO -->
        <section class="etos-hero position-relative overflow-hidden">
            <div class="container etos-container">
                <div class="row align-items-center g-4 g-lg-5">
                    <div class="col-lg-6">
                        <span class="etos-kicker">Autoryzowany partner ERP & IT</span>

                        <h1 class="etos-hero__title">
                            Łączymy procesy, ludzi i technologię.
                        </h1>

                        <p class="etos-hero__lead">
                            Wdrażamy i utrzymujemy środowiska ERP, które wspierają sprzedaż,
                            magazyn, finanse, KSeF, kadry i codzienną pracę Twojej firmy.
                        </p>

                        <div class="etos-hero__actions d-flex flex-wrap gap-3">
                            <a href="#contact" class="btn btn-primary btn-lg">
                                Umów prezentację
                            </a>
                            <a href="#ecosystem" class="btn btn-outline-dark btn-lg">
                                Zobacz rozwiązania ERP
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="etos-command-center" aria-label="Schemat procesów biznesowych obsługiwanych przez ETOS">
                            <div class="etos-command-center__top">
                                <span></span><span></span><span></span>
                                <strong>Automatyzacja Procesów Biznesowych</strong>
                            </div>

                            <div class="etos-command-center__grid">
                                <div class="etos-process-card etos-process-card--active">
                                    <span>Wdrożenia ERP</span>
                                    <strong>320</strong>
                                    <small>od 2002</small>
                                </div>

                                <div class="etos-process-card">
                                    <span>Obsługa IT</span>
                                    <strong>1 250</strong>
                                    <small>firm</small>
                                </div>

                                <div class="etos-process-card">
                                    <span>Finanse</span>
                                    <strong>KSeF</strong>
                                    <small>gotowość</small>
                                </div>

                                <div class="etos-process-card etos-process-card--wide">
                                    <span>Przepływ dokumentów</span>
                                    <div class="etos-flow">
                                        <i>Oferta</i>
                                        <b></b>
                                        <i>Zamówienie</i>
                                        <b></b>
                                        <i>Faktura</i>
                                        <b></b>
                                        <i>KSeF</i>
                                    </div>
                                </div>

                                <div class="etos-chart-card">
                                    <span>Stabilność operacyjna</span>
                                    <div class="etos-chart">
                                        <i style="height: 32%"></i>
                                        <i style="height: 48%"></i>
                                        <i style="height: 42%"></i>
                                        <i style="height: 68%"></i>
                                        <i style="height: 76%"></i>
                                        <i style="height: 92%"></i>
                                    </div>
                                </div>

                                <div class="etos-status-card">
                                    <span>Opieka IT</span>
                                    <strong>ciągłość pracy</strong>
                                    <small>serwery · backup · SQL · helpdesk</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="etos-hero__pattern" aria-hidden="true"></div>
        </section>

        <!-- OPERATION AREAS -->
        <section id="ecosystem" class="etos-operations">
            <div class="container etos-container">
                <div class="row g-4">
                    <div class="col-lg-3 col-md-6">
                        <a href="#" class="etos-operation-card">
                            <span class="etos-operation-card__icon">01</span>
                            <h2>Integracje</h2>
                            <p>systemy ERP, e-commerce, urządzenia fiskalne i raportowanie</p>
                        </a>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <a href="#" class="etos-operation-card">
                            <span class="etos-operation-card__icon">02</span>
                            <h2>Finanse</h2>
                            <p>księgowość, kadry, płace, faktury i gotowość na KSeF</p>
                        </a>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <a href="#" class="etos-operation-card">
                            <span class="etos-operation-card__icon">03</span>
                            <h2>Procesy</h2>
                            <p>sprzedaż, magazyn, zamówienia, obieg dokumentów</p>
                        </a>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <a href="#" class="etos-operation-card">
                            <span class="etos-operation-card__icon">04</span>
                            <h2>Infrastruktura</h2>
                            <p>serwery, sieci, backup, bezpieczeństwo i opieka IT</p>
                        </a>
                    </div>

                </div>
            </div>
        </section>

        <!-- ERP ECOSYSTEM -->
        <section id="erp" class="etos-section etos-section--soft">
            <div class="container etos-container">
                <div class="row mb-5 align-items-end g-4">
                    <div class="col-lg-7">
                        <span class="etos-kicker">Systemy ERP dopasowane do procesów</span>
                        <h2 class="etos-section__title">
                            Budujemy środowisko pracy firmy, nie tylko wdrażamy programy.
                        </h2>
                    </div>

                    <div class="col-lg-5">
                        <p class="etos-section__lead">
                            Dobieramy system ERP do skali, branży i sposobu działania organizacji.
                            Pomagamy uporządkować procesy, wdrożyć moduły i utrzymać stabilną pracę firmy.
                        </p>
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-lg-4">
                        <article class="etos-vendor-card etos-vendor-card--symfonia">
                            <span class="etos-vendor-card__tag">dla większych struktur i HR</span>
                            <h3>Symfonia ERP</h3>
                            <p>
                                Finanse, kadry i płace, handel, produkcja oraz analityka dla organizacji,
                                które potrzebują stabilnego środowiska i precyzyjnego raportowania.
                            </p>
                            <a href="#">Poznaj moduły Symfonii →</a>
                        </article>
                    </div>

                    <div class="col-lg-4">
                        <article class="etos-vendor-card etos-vendor-card--insert">
                            <span class="etos-vendor-card__tag">ekosystem nexo / GT</span>
                            <h3>InsERT</h3>
                            <p>
                                Sprawdzone rozwiązania dla sprzedaży, magazynu, księgowości i kadr.
                                Dobry wybór dla firm, które potrzebują intuicyjnego i elastycznego systemu.
                            </p>
                            <a href="#">Poznaj ekosystem InsERT →</a>
                        </article>
                    </div>

                    <div class="col-lg-4">
                        <article class="etos-vendor-card etos-vendor-card--streamsoft">
                            <span class="etos-vendor-card__tag">produkcja, logistyka, WMS</span>
                            <h3>Streamsoft Prestiż</h3>
                            <p>
                                Rozwiązanie dla bardziej złożonych procesów: produkcji, logistyki,
                                planowania, magazynu, integracji i automatyzacji pracy przedsiębiorstwa.
                            </p>
                            <a href="#">Poznaj Streamsoft Prestiż →</a>
                        </article>
                    </div>
                </div>
            </div>
        </section>

        <!-- WORKFLOW -->
        <section class="etos-section bg-white">
            <div class="container etos-container">
                <div class="row g-4 g-lg-5 align-items-center">
                    <div class="col-lg-5">
                        <span class="etos-kicker">Od procesu do wdrożenia</span>
                        <h2 class="etos-section__title">
                            Porządkujemy przepływ pracy w całej firmie.
                        </h2>
                        <p class="etos-section__lead">
                            Zaczynamy od analizy sposobu działania firmy. Następnie dobieramy system,
                            konfigurujemy procesy, integrujemy moduły i zapewniamy wsparcie po wdrożeniu.
                        </p>
                    </div>

                    <div class="col-lg-7">
                        <div class="etos-workflow">
                            <div>
                                <span>01</span>
                                <strong>Analiza</strong>
                                <p>procesy, potrzeby, ryzyka</p>
                            </div>
                            <div>
                                <span>02</span>
                                <strong>Dobór systemu</strong>
                                <p>Symfonia, InsERT, Streamsoft</p>
                            </div>
                            <div>
                                <span>03</span>
                                <strong>Wdrożenie</strong>
                                <p>konfiguracja, migracja, szkolenia</p>
                            </div>
                            <div>
                                <span>04</span>
                                <strong>Utrzymanie</strong>
                                <p>opieka IT, rozwój, bezpieczeństwo</p>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- SERVICES -->
        <section class="etos-section etos-services">
            <div class="container etos-container">
                <div class="row mb-5 g-4 align-items-end">
                    <div class="col-lg-7">
                        <span class="etos-kicker etos-kicker--light">Kompleksowa infrastruktura IT</span>
                        <h2 class="etos-section__title text-white">
                            Technologia, która wspiera codzienną pracę biznesu.
                        </h2>
                    </div>
                    <div class="col-lg-5">
                        <p class="etos-services__lead">
                            Zapewniamy wszystkie kluczowe elementy środowiska IT — od podpisu elektronicznego,
                            przez sprzęt komputerowy i urządzenia fiskalne, po serwis, outsourcing i administrację.
                        </p>
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-lg-3 col-md-6">
                        <article class="etos-service-card">
                            <span>Podpis</span>
                            <h3>Podpis elektroniczny</h3>
                            <p>Certyfikaty kwalifikowane, odnowienia, konfiguracja i wsparcie użytkowników.</p>
                        </article>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <article class="etos-service-card">
                            <span>Fiskalizacja</span>
                            <h3>Urządzenia fiskalne</h3>
                            <p>Kasy i drukarki online, sprzedaż, konfiguracja, serwis oraz przeglądy.</p>
                        </article>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <article class="etos-service-card">
                            <span>IT</span>
                            <h3>Serwis & outsourcing</h3>
                            <p>Pomoc zdalna, administracja serwerami i opieka techniczna.</p>
                        </article>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <article class="etos-service-card">
                            <span>Bezpieczeństwo</span>
                            <h3>Backup i infrastruktura</h3>
                            <p>Sieci, serwery, kopie zapasowe, zabezpieczenia i ciągłość działania firmy.</p>
                        </article>
                    </div>
                </div>
            </div>
        </section>

    </main>
</div>

<?php
get_footer();