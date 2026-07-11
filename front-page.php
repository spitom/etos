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
                                <strong>Partnerzy ETOS</strong>
                            </div>

                            <div class="etos-partner-cloud">
                                <a href="/oprogramowanie/symfonia-erp/" class="etos-partner-logo etos-partner-logo--symfonia" aria-label="Symfonia ERP">
                                    <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/partners/symfonia.png' ); ?>" alt="Symfonia">
                                </a>

                                <a href="/oprogramowanie/insert/" class="etos-partner-logo etos-partner-logo--insert" aria-label="InsERT">
                                    <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/partners/insert.png' ); ?>" alt="InsERT">
                                </a>

                                <a href="/oprogramowanie/streamsoft-prestiz/" class="etos-partner-logo etos-partner-logo--streamsoft" aria-label="Streamsoft Prestiż">
                                    <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/partners/streamsoft.webp' ); ?>" alt="Streamsoft">
                                </a>

                                <a href="/urzadzenia-fiskalne/" class="etos-partner-logo etos-partner-logo--posnet" aria-label="POSNET">
                                    <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/partners/posnet.png' ); ?>" alt="POSNET">
                                </a>

                                <a href="/podpis-elektroniczny/" class="etos-partner-logo etos-partner-logo--certum" aria-label="Certum">
                                    <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/partners/certum.png' ); ?>" alt="Certum">
                                </a>
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
        <section id="erp" class="etos-section etos-section--soft etos-erp">
            <div class="container etos-container">

                <header class="etos-erp__header">
                    <span class="etos-kicker">
                        Systemy ERP dopasowane do procesów
                    </span>

                    <h2 class="etos-section__title">
                        Dobieramy oprogramowanie do sposobu pracy Twojej firmy.
                    </h2>
                </header>

                <?php
                $erp_defaults = array(
                    'symfonia' => array(
                        'logo'      => get_stylesheet_directory_uri() . '/assets/images/partners/symfonia.png',
                        'image'     => get_stylesheet_directory_uri() . '/assets/images/software/symfonia.webp',
                        'image_alt' => 'Praca z systemem Symfonia ERP',
                        'title'     => 'Finanse, kadry i procesy w stabilnym środowisku ERP.',
                        'url'       => '/oprogramowanie/symfonia-erp/',
                        'cta'       => 'Zobacz stronę Symfonia ERP',
                        'accent'    => '#13B84A',
                        'products'  => implode(
                            PHP_EOL,
                            array(
                                'Symfonia Handel Sprzedaż|/oprogramowanie/symfonia-handel-sprzedaż/',
                                'Symfonia Finanse i Księgowość|/oprogramowanie/symfonia-finanse-i-ksiegowosc/',
                                'Symfonia Kadry i Płace|/oprogramowanie/symfonia-kadry-i-place/',
                                'Symfonia R2Płatnik|/oprogramowanie/symfonia-r2platnik/',
                                'Symfonia Detal|/oprogramowanie/symfonia-detal/',
                                'Symfonia Business Intelligence|/oprogramowanie/symfonia-business-intelligence/',
                                'Symfonia Zarządzanie Produkcją|/oprogramowanie/symfonia-zarzadzanie-produkcja/',
                                'Symfonia eDokumenty|/oprogramowanie/symfonia-edokumenty/',
                                'Symfonia ERP|/oprogramowanie/symfonia-erp/',
                            )
                        ),
                        'reverse'   => false,
                    ),

                    'insert' => array(
                        'logo'      => get_stylesheet_directory_uri() . '/assets/images/partners/insert.png',
                        'image'     => get_stylesheet_directory_uri() . '/assets/images/software/insert.webp',
                        'image_alt' => 'Praca z oprogramowaniem InsERT',
                        'title'     => 'Sprzedaż, magazyn i księgowość w sprawdzonym ekosystemie.',
                        'url'       => '/oprogramowanie/insert/',
                        'cta'       => 'Zobacz stronę InsERT',
                        'accent'    => '#0077C8',
                        'products'  => implode(
                            PHP_EOL,
                            array(
                                'Subiekt nexo|/oprogramowanie/subiekt-nexo/',
                                'Rewizor nexo|/oprogramowanie/rewizor-nexo/',
                                'Rachmistrz nexo|/oprogramowanie/rachmistrz-nexo/',
                                'Gratyfikant nexo|/oprogramowanie/gratyfikant-nexo/',
                                'Gestor nexo|/oprogramowanie/gestor-nexo/',
                                'Sello NX|/oprogramowanie/sello-nx/',
                            )
                        ),
                        'reverse'   => true,
                    ),

                    'streamsoft' => array(
                        'logo'      => get_stylesheet_directory_uri() . '/assets/images/partners/streamsoft.webp',
                        'image'     => get_stylesheet_directory_uri() . '/assets/images/software/streamsoft.webp',
                        'image_alt' => 'System Streamsoft dla przedsiębiorstw',
                        'title'     => 'Produkcja, logistyka i złożone procesy pod pełną kontrolą.',
                        'url'       => '/oprogramowanie/streamsoft-prestiz/',
                        'cta'       => 'Zobacz stronę Streamsoft',
                        'accent'    => '#2457D6',
                        'products'  => implode(
                            PHP_EOL,
                            array(
                                'Streamsoft Prestiż|/oprogramowanie/streamsoft-prestiz/',
                                'Produkcja|/oprogramowanie/streamsoft-produkcja/',
                                'WMS i magazyn|/oprogramowanie/streamsoft-wms/',
                                'Logistyka|/oprogramowanie/streamsoft-logistyka/',
                                'Handel|/oprogramowanie/streamsoft-handel/',
                                'Finanse i księgowość|/oprogramowanie/streamsoft-finanse/',
                            )
                        ),
                        'reverse'   => false,
                    ),
                );

                foreach ( $erp_defaults as $vendor_name => $fallback ) {
                    $logo_value  = function_exists( 'get_field' ) ? get_field( "{$vendor_name}_logo" ) : null;
                    $image_value = function_exists( 'get_field' ) ? get_field( "{$vendor_name}_image" ) : null;

                    $title = function_exists( 'get_field' )
                        ? get_field( "{$vendor_name}_title" )
                        : '';

                    $url = function_exists( 'get_field' )
                        ? get_field( "{$vendor_name}_url" )
                        : '';

                    $cta = function_exists( 'get_field' )
                        ? get_field( "{$vendor_name}_cta" )
                        : '';

                    $accent = function_exists( 'get_field' )
                        ? get_field( "{$vendor_name}_accent" )
                        : '';

                    $products_raw = function_exists( 'get_field' )
                        ? get_field( "{$vendor_name}_products" )
                        : '';

                    $suite = array(
                        'name'      => $vendor_name,
                        'logo'      => etos_get_image_url( $logo_value, $fallback['logo'] ),
                        'image'     => etos_get_image_url( $image_value, $fallback['image'] ),
                        'image_alt' => $fallback['image_alt'],
                        'title'     => $title ?: $fallback['title'],
                        'url'       => $url ?: $fallback['url'],
                        'cta'       => $cta ?: $fallback['cta'],
                        'accent'    => $accent ?: $fallback['accent'],
                        'products'  => etos_parse_erp_products(
                            $products_raw ?: $fallback['products']
                        ),
                        'reverse'   => $fallback['reverse'],
                    );

                    get_template_part(
                        'template-parts/components/erp-suite',
                        null,
                        $suite
                    );
                }
                ?>

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