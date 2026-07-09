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
                            <a href="#contact" class="btn etos-btn-primary">
                                Umów prezentację
                            </a>
                            <a href="#ecosystem" class="btn etos-btn-secondary">
                                Zobacz rozwiązania ERP
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="etos-command-center etos-command-center--partners" aria-label="Partnerzy technologiczni ETOS">
                            <div class="etos-command-center__top">
                                <span></span><span></span><span></span>
                                <strong>Ekosystem technologii ETOS</strong>
                            </div>

                            <div class="etos-partner-cloud">
                                <a href="/oprogramowanie/symfonia-erp/" class="etos-partner-logo etos-partner-logo--symfonia" aria-label="Symfonia ERP">
                                    <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/img/partners/symfonia.png' ); ?>" alt="Symfonia">
                                </a>

                                <a href="/oprogramowanie/insert/" class="etos-partner-logo etos-partner-logo--insert" aria-label="InsERT">
                                    <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/img/partners/insert.png' ); ?>" alt="InsERT">
                                </a>

                                <a href="/oprogramowanie/streamsoft-prestiz/" class="etos-partner-logo etos-partner-logo--streamsoft" aria-label="Streamsoft Prestiż">
                                    <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/img/partners/streamsoft.png' ); ?>" alt="Streamsoft">
                                </a>

                                <a href="/urzadzenia-fiskalne/" class="etos-partner-logo etos-partner-logo--posnet" aria-label="POSNET">
                                    <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/img/partners/posnet.png' ); ?>" alt="POSNET">
                                </a>

                                <a href="/podpis-elektroniczny/" class="etos-partner-logo etos-partner-logo--certum" aria-label="Certum">
                                    <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/img/partners/certum.png' ); ?>" alt="Certum">
                                </a>
                            </div>

                            <div class="etos-partner-note">
                                <span>ERP</span>
                                <span>Fiskalizacja</span>
                                <span>Podpis elektroniczny</span>
                                <span>Infrastruktura IT</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="etos-hero__pattern" aria-hidden="true"></div>
        </section>

        <!-- SUPPORT AREAS -->
        <section id="ecosystem" class="etos-operations">
            <div class="container etos-container">

                <div class="etos-operations__header">
                    <span class="etos-kicker">Zakres wsparcia ETOS</span>
                    <h2>W jakich obszarach możemy wesprzeć Twoją pracę?</h2>
                </div>

                <div class="etos-capabilities etos-capabilities--services">

                    <a href="/oprogramowanie/" class="etos-capability etos-capability--software">
                        <span class="etos-capability__index">01</span>
                        <h3>Dostawa oprogramowania</h3>
                        <ul>
                            <li>Symfonia</li>
                            <li>Streamsoft</li>
                            <li>InsERT</li>
                        </ul>
                    </a>

                    <a href="/uslugi-it/" class="etos-capability etos-capability--implementation">
                        <span class="etos-capability__index">02</span>
                        <h3>Specjalistyczne usługi</h3>
                        <ul>
                            <li>Wdrożenia</li>
                            <li>Szkolenia</li>
                        </ul>
                    </a>

                    <a href="/podpis-elektroniczny/" class="etos-capability etos-capability--signature">
                        <span class="etos-capability__index">03</span>
                        <h3>e-Podpis</h3>
                        <ul>
                            <li>Podpis kwalifikowany</li>
                            <li>odnowienia</li>
                            <li>konfiguracja i wsparcie</li>
                        </ul>
                    </a>

                    <a href="/urzadzenia-fiskalne/" class="etos-capability etos-capability--fiscal">
                        <span class="etos-capability__index">04</span>
                        <h3>Fiskalizacja</h3>
                        <ul>
                            <li>Kasy</li>
                            <li>drukarki fiskalne</li>
                            <li>konfiguracja</li>
                            <li>przeglądy i serwis</li>
                        </ul>
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

                        <div class="etos-erp-suite__content">
                            <img
                                src="<?php echo esc_url( get_stylesheet_directory_uri() . '/img/partners/symfonia.png' ); ?>"
                                alt="Symfonia"
                                class="etos-erp-suite__logo"
                            >

                            <div class="etos-erp-suite__intro">
                                <span class="etos-erp-suite__label">Symfonia ERP</span>

                                <h3>Finanse, kadry i procesy w stabilnym środowisku ERP.</h3>

                                <p>
                                    Dobieramy, wdrażamy i rozwijamy moduły Symfonii dla firm,
                                    które potrzebują kontroli nad księgowością, kadrami,
                                    dokumentami i raportowaniem.
                                </p>

                                <a href="/oprogramowanie/symfonia-erp/" class="etos-erp-suite__main-link">
                                    Zobacz stronę Symfonia ERP →
                                </a>
                            </div>

                            <div class="etos-erp-suite__modules">
                                <a href="#" class="etos-erp-module etos-erp-module--wide">Finanse i Księgowość</a>
                                <a href="#" class="etos-erp-module">Kadry i Płace</a>
                                <a href="#" class="etos-erp-module etos-erp-module--short">Handel i Magazyn</a>
                                <a href="#" class="etos-erp-module">Business Intelligence</a>
                                <a href="#" class="etos-erp-module etos-erp-module--wide">Obieg dokumentów</a>
                                <a href="#" class="etos-erp-module etos-erp-module--short">KSeF</a>
                            </div>
                        </div>

                        <div class="etos-erp-suite__media">
                            <img
                                src="<?php echo esc_url( get_stylesheet_directory_uri() . '/img/front/symfonia.webp' ); ?>"
                                alt=""
                                loading="lazy"
                            >
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