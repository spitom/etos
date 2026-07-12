<?php
/**
 * Front-page hero section.
 *
 * @package ETOS
 */

defined( 'ABSPATH' ) || exit;
?>

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
