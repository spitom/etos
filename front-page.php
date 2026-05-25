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
                            <a href="#ecosystem" class="btn etos-btn-secondary btn-lg">
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

                <div class="etos-capabilities">

                    <a href="#" class="etos-capability">
                        <span class="etos-capability__index">01</span>

                        <h2>Integracje</h2>

                        <p>
                            systemy ERP, e-commerce,
                            urządzenia fiskalne i raportowanie
                        </p>
                    </a>

                    <a href="#" class="etos-capability">
                        <span class="etos-capability__index">02</span>

                        <h2>Finanse</h2>

                        <p>
                            księgowość, kadry, płace,
                            faktury i gotowość na KSeF
                        </p>
                    </a>

                    <a href="#" class="etos-capability">
                        <span class="etos-capability__index">03</span>

                        <h2>Procesy</h2>

                        <p>
                            sprzedaż, magazyn, zamówienia,
                            obieg dokumentów
                        </p>
                    </a>

                    <a href="#" class="etos-capability">
                        <span class="etos-capability__index">04</span>

                        <h2>Infrastruktura</h2>

                        <p>
                            serwery, sieci, backup,
                            bezpieczeństwo i opieka IT
                        </p>
                    </a>

                </div>

            </div>
        </section>

        <!-- ERP ECOSYSTEM -->
        <section id="erp" class="etos-section etos-section--soft">
            <div class="container etos-container">

                <div class="row mb-5 align-items-end g-4">
                    <div class="col-lg-7">
                        <span class="etos-kicker">
                            Systemy ERP dopasowane do procesów
                        </span>

                        <h2 class="etos-section__title">
                            Budujemy środowisko pracy firmy,
                            nie tylko wdrażamy programy.
                        </h2>
                    </div>

                    <div class="col-lg-5">
                        <p class="etos-section__lead">
                            Dobieramy system ERP do skali, branży i sposobu działania organizacji.
                            Pomagamy uporządkować procesy, wdrożyć moduły i utrzymać stabilną pracę firmy.
                        </p>
                    </div>
                </div>

                <div class="etos-erp-suites">

                    <!-- SYMFONIA -->
                    <div class="etos-erp-suite etos-erp-suite--symfonia">

                        <div class="etos-erp-suite__intro">
                            <span class="etos-erp-suite__label">
                                Symfonia ERP
                            </span>

                            <h3>
                                Finanse, kadry i procesy
                                w stabilnym środowisku ERP.
                            </h3>

                            <p>
                                Dobieramy, wdrażamy i rozwijamy moduły Symfonii
                                dla firm, które potrzebują kontroli nad księgowością,
                                kadrami, dokumentami i raportowaniem.
                            </p>

                            <a href="/oprogramowanie/symfonia-erp/"
                            class="etos-erp-suite__main-link">
                                Zobacz stronę Symfonia ERP →
                            </a>
                        </div>

                        <div class="etos-erp-suite__modules">

                            <a href="/oprogramowanie/symfonia-erp/#modul-finanse"
                            class="etos-erp-module">
                                Finanse i Księgowość
                            </a>

                            <a href="/oprogramowanie/symfonia-erp/#modul-kadry-place"
                            class="etos-erp-module">
                                Kadry i Płace
                            </a>

                            <a href="/oprogramowanie/symfonia-erp/#modul-handel"
                            class="etos-erp-module">
                                Handel i Magazyn
                            </a>

                            <a href="/oprogramowanie/symfonia-erp/#modul-bi"
                            class="etos-erp-module">
                                Business Intelligence
                            </a>

                            <a href="/oprogramowanie/symfonia-erp/#modul-obieg"
                            class="etos-erp-module">
                                Obieg dokumentów
                            </a>

                            <a href="/oprogramowanie/symfonia-erp/#modul-ksef"
                            class="etos-erp-module">
                                KSeF
                            </a>

                        </div>

                    </div>

                    <!-- INSERT -->
                    <div class="etos-erp-suite etos-erp-suite--insert">

                        <div class="etos-erp-suite__intro">
                            <span class="etos-erp-suite__label">InsERT nexo / GT</span>

                            <h3>Sprzedaż, magazyn i księgowość w sprawdzonym ekosystemie.</h3>

                            <p>
                                Wdrażamy rozwiązania InsERT dla firm, które potrzebują intuicyjnego systemu
                                do sprzedaży, magazynu, fakturowania, księgowości, kadr i obsługi klientów.
                            </p>

                            <a href="/oprogramowanie/insert/" class="etos-erp-suite__main-link">
                                Zobacz stronę InsERT →
                            </a>
                        </div>

                        <div class="etos-erp-suite__modules">
                            <a href="/oprogramowanie/insert/#modul-subiekt" class="etos-erp-module">Subiekt</a>
                            <a href="/oprogramowanie/insert/#modul-rewizor" class="etos-erp-module">Rewizor</a>
                            <a href="/oprogramowanie/insert/#modul-rachmistrz" class="etos-erp-module">Rachmistrz</a>
                            <a href="/oprogramowanie/insert/#modul-gratyfikant" class="etos-erp-module">Gratyfikant</a>
                            <a href="/oprogramowanie/insert/#modul-gestor" class="etos-erp-module">Gestor</a>
                            <a href="/oprogramowanie/insert/#modul-sello" class="etos-erp-module">Sello / e-commerce</a>
                        </div>

                    </div>


                    <!-- STREAMSOFT -->
                    <div class="etos-erp-suite etos-erp-suite--streamsoft">

                        <div class="etos-erp-suite__intro">
                            <span class="etos-erp-suite__label">Streamsoft Prestiż</span>

                            <h3>ERP dla produkcji, logistyki i bardziej złożonych procesów.</h3>

                            <p>
                                Pomagamy wdrażać Streamsoft Prestiż w firmach, które potrzebują kontroli
                                nad produkcją, magazynem, logistyką, sprzedażą, finansami i integracjami.
                            </p>

                            <a href="/oprogramowanie/streamsoft-prestiz/" class="etos-erp-suite__main-link">
                                Zobacz stronę Streamsoft →
                            </a>
                        </div>

                        <div class="etos-erp-suite__modules">
                            <a href="/oprogramowanie/streamsoft-prestiz/#modul-produkcja" class="etos-erp-module">Produkcja</a>
                            <a href="/oprogramowanie/streamsoft-prestiz/#modul-wms" class="etos-erp-module">WMS / Magazyn</a>
                            <a href="/oprogramowanie/streamsoft-prestiz/#modul-logistyka" class="etos-erp-module">Logistyka</a>
                            <a href="/oprogramowanie/streamsoft-prestiz/#modul-handel" class="etos-erp-module">Handel</a>
                            <a href="/oprogramowanie/streamsoft-prestiz/#modul-finanse" class="etos-erp-module">Finanse i księgowość</a>
                            <a href="/oprogramowanie/streamsoft-prestiz/#modul-integracje" class="etos-erp-module">Integracje</a>
                        </div>

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
                        <div class="etos-process-flow">

                            <div class="etos-process-step">
                                <span>01</span>
                                <h3>Analiza</h3>
                                <p>procesy, potrzeby, ryzyka</p>
                            </div>

                            <div class="etos-process-step">
                                <span>02</span>
                                <h3>Dobór systemu</h3>
                                <p>Symfonia, InsERT, Streamsoft</p>
                            </div>

                            <div class="etos-process-step">
                                <span>03</span>
                                <h3>Wdrożenie</h3>
                                <p>konfiguracja, migracja, szkolenia</p>
                            </div>

                            <div class="etos-process-step">
                                <span>04</span>
                                <h3>Rozwój i opieka</h3>
                                <p>IT, bezpieczeństwo, wsparcie</p>
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