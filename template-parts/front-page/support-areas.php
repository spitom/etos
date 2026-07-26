<?php
/**
 * Front-page support areas section.
 *
 * @package ETOS
 */

defined( 'ABSPATH' ) || exit;
?>

<section id="ecosystem" class="etos-operations">

    <div class="container etos-container">

        <header class="etos-operations__header">

            <span class="etos-kicker">
                <?php esc_html_e( 'Zakres wsparcia ETOS', 'etos' ); ?>
            </span>

            <h2>
                <?php
                esc_html_e(
                    'W jakich obszarach możemy wesprzeć Twoją pracę?',
                    'etos'
                );
                ?>
            </h2>

        </header>

        <div class="etos-capabilities etos-capabilities--services">

            <a
                href="/oprogramowanie/"
                class="etos-capability etos-capability--software"
            >

                <span class="etos-capability__index">
                    01
                </span>

                <h3>
                    <?php esc_html_e( 'Dostawa oprogramowania', 'etos' ); ?>
                </h3>

                <ul>
                    <li>Symfonia</li>
                    <li>Streamsoft</li>
                    <li>InsERT</li>
                </ul>

                <span class="etos-capability__cta">
                    <span>
                        <?php esc_html_e( 'Sprawdź zakres', 'etos' ); ?>
                    </span>
                    <span aria-hidden="true">→</span>
                </span>

            </a>

            <a
                href="/uslugi-it/"
                class="etos-capability etos-capability--implementation"
            >

                <span class="etos-capability__index">
                    02
                </span>

                <h3>
                    <?php esc_html_e( 'Specjalistyczne usługi', 'etos' ); ?>
                </h3>

                <ul>
                    <li><?php esc_html_e( 'Wdrożenia', 'etos' ); ?></li>
                    <li><?php esc_html_e( 'Szkolenia', 'etos' ); ?></li>
                </ul>

                <span class="etos-capability__cta">
                    <span>
                        <?php esc_html_e( 'Sprawdź zakres', 'etos' ); ?>
                    </span>
                    <span aria-hidden="true">→</span>
                </span>

            </a>

            <a
                href="/podpis-elektroniczny/"
                class="etos-capability etos-capability--signature"
            >

                <span class="etos-capability__index">
                    03
                </span>

                <h3>
                    <?php esc_html_e( 'e-Podpis', 'etos' ); ?>
                </h3>

                <ul>
                    <li><?php esc_html_e( 'Podpis kwalifikowany', 'etos' ); ?></li>
                    <li><?php esc_html_e( 'Odnowienia', 'etos' ); ?></li>
                    <li><?php esc_html_e( 'Konfiguracja i wsparcie', 'etos' ); ?></li>
                </ul>

                <span class="etos-capability__cta">
                    <span>
                        <?php esc_html_e( 'Sprawdź zakres', 'etos' ); ?>
                    </span>
                    <span aria-hidden="true">→</span>
                </span>

            </a>

            <a
                href="/urzadzenia-fiskalne/"
                class="etos-capability etos-capability--fiscal"
            >

                <span class="etos-capability__index">
                    04
                </span>

                <h3>
                    <?php esc_html_e( 'Fiskalizacja', 'etos' ); ?>
                </h3>

                <ul>
                    <li><?php esc_html_e( 'Kasy', 'etos' ); ?></li>
                    <li><?php esc_html_e( 'Drukarki fiskalne', 'etos' ); ?></li>
                    <li><?php esc_html_e( 'Konfiguracja', 'etos' ); ?></li>
                    <li><?php esc_html_e( 'Przeglądy i serwis', 'etos' ); ?></li>
                </ul>

                <span class="etos-capability__cta">
                    <span>
                        <?php esc_html_e( 'Sprawdź zakres', 'etos' ); ?>
                    </span>
                    <span aria-hidden="true">→</span>
                </span>

            </a>

        </div>

    </div>

</section>