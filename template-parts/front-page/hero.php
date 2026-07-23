<?php
/**
 * Front-page hero section.
 *
 * @package ETOS
 */

defined( 'ABSPATH' ) || exit;
?>

<section class="etos-hero">

    <div class="container etos-container">

        <div class="row align-items-center g-4 g-lg-5">

            <div class="col-lg-6">

                <div class="etos-hero__content">

                    <span class="etos-kicker">
                        <?php esc_html_e( 'Autoryzowany partner ERP & IT', 'etos' ); ?>
                    </span>

                    <h1 class="etos-hero__title">

                        <span class="etos-hero__title-line">
                            <?php esc_html_e( 'Łączymy procesy,', 'etos' ); ?>
                        </span>

                        <span class="etos-hero__title-line">
                            <?php esc_html_e( 'ludzi i technologię.', 'etos' ); ?>
                        </span>

                    </h1>

                    <p class="etos-hero__lead">
                        <?php
                        esc_html_e(
                            'Wdrażamy i utrzymujemy środowiska ERP, które wspierają sprzedaż, magazyn, finanse, KSeF, kadry i codzienną pracę Twojej firmy.',
                            'etos'
                        );
                        ?>
                    </p>

                    <div class="etos-hero__conversion">

                        <p class="etos-hero__prompt">
                            <?php
                            esc_html_e(
                                'Szukasz kompleksowych rozwiązań?',
                                'etos'
                            );
                            ?>
                        </p>

                        <a
                            href="<?php echo esc_url( home_url( '/kontakt/' ) ); ?>"
                            class="btn etos-btn-primary"
                        >
                            <?php esc_html_e( 'Umów spotkanie', 'etos' ); ?>
                        </a>

                    </div>

                </div>

            </div>

            <div class="col-lg-6">

                <div class="etos-hero__partners-wrap">

                    <div
                        class="etos-hero__pattern"
                        aria-hidden="true"
                    ></div>

                    <div
                        class="etos-command-center etos-command-center--partners"
                        aria-label="<?php esc_attr_e( 'Partnerzy ETOS', 'etos' ); ?>"
                    >

                        <div class="etos-command-center__top">

                            <strong>
                                <?php esc_html_e( 'Partnerzy ETOS', 'etos' ); ?>
                            </strong>

                        </div>

                        <div
                            class="etos-partner-cloud"
                            role="list"
                            aria-label="<?php esc_attr_e( 'Lista partnerów ETOS', 'etos' ); ?>"
                        >

                            <div
                                class="etos-partner-logo etos-partner-logo--symfonia"
                                role="listitem"
                            >
                                <img
                                    src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/partners/symfonia.png' ); ?>"
                                    alt="<?php esc_attr_e( 'Symfonia', 'etos' ); ?>"
                                >
                            </div>

                            <div
                                class="etos-partner-logo etos-partner-logo--insert"
                                role="listitem"
                            >
                                <img
                                    src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/partners/insert.png' ); ?>"
                                    alt="<?php esc_attr_e( 'InsERT', 'etos' ); ?>"
                                >
                            </div>

                            <div
                                class="etos-partner-logo etos-partner-logo--streamsoft"
                                role="listitem"
                            >
                                <img
                                    src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/partners/streamsoft.webp' ); ?>"
                                    alt="<?php esc_attr_e( 'Streamsoft', 'etos' ); ?>"
                                >
                            </div>

                            <div
                                class="etos-partner-logo etos-partner-logo--posnet"
                                role="listitem"
                            >
                                <img
                                    src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/partners/posnet.png' ); ?>"
                                    alt="<?php esc_attr_e( 'POSNET', 'etos' ); ?>"
                                >
                            </div>

                            <div
                                class="etos-partner-logo etos-partner-logo--certum"
                                role="listitem"
                            >
                                <img
                                    src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/partners/certum.png' ); ?>"
                                    alt="<?php esc_attr_e( 'Certum', 'etos' ); ?>"
                                >
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>