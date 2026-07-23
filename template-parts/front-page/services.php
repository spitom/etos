<?php
/**
 * Front-page services section.
 *
 * @package ETOS
 */

defined( 'ABSPATH' ) || exit;

/**
 * Read an ACF value with a post-meta fallback.
 *
 * @param int    $post_id    Post ID.
 * @param string $field_name Field name.
 * @return mixed
 */
$etos_get_service_value = static function ( $post_id, $field_name ) {
    if ( function_exists( 'get_field' ) ) {
        $value = get_field( $field_name, $post_id );

        if (
            null !== $value
            && false !== $value
            && '' !== $value
        ) {
            return $value;
        }
    }

    return get_post_meta(
        $post_id,
        $field_name,
        true
    );
};

/**
 * Return a service icon key based on the service title.
 *
 * @param string $title Service title.
 * @return string
 */
$etos_get_service_icon_key = static function ( $title ) {
    $slug = sanitize_title( $title );

    if (
        false !== strpos( $slug, 'wdraz' )
        || false !== strpos( $slug, 'implement' )
    ) {
        return 'implementation';
    }

    if ( false !== strpos( $slug, 'szkol' ) ) {
        return 'training';
    }

    if (
        false !== strpos( $slug, 'serwis' )
        || false !== strpos( $slug, 'opieka' )
        || false !== strpos( $slug, 'wsparcie' )
    ) {
        return 'support';
    }

    if (
        false !== strpos( $slug, 'serwer' )
        || false !== strpos( $slug, 'sieci' )
        || false !== strpos( $slug, 'infrastruktur' )
    ) {
        return 'network';
    }

    if (
        false !== strpos( $slug, 'programist' )
        || false !== strpos( $slug, 'integrac' )
    ) {
        return 'code';
    }

    return 'service';
};

/**
 * Return one of the built-in line icons.
 *
 * Icons use currentColor, so their color is controlled entirely by CSS.
 *
 * @param string $key Icon key.
 * @return string
 */
$etos_get_service_icon = static function ( $key ) {
    $icons = array(
        'implementation' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <rect x="6" y="10" width="38" height="30" rx="4"></rect>
                <path d="M17 52h16M25 40v12"></path>
                <circle cx="48" cy="21" r="8"></circle>
                <path d="M48 9v4M48 29v4M36 21h4M56 21h4"></path>
                <path d="M40 13l3 3M53 26l3 3M56 13l-3 3M43 26l-3 3"></path>
            </svg>
        ',
        'training' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <rect x="7" y="8" width="50" height="34" rx="4"></rect>
                <path d="M21 54h22M32 42v12"></path>
                <circle cx="25" cy="22" r="5"></circle>
                <path d="M16 35c1-6 5-9 9-9s8 3 9 9"></path>
                <path d="M40 18h10M40 25h10M40 32h7"></path>
            </svg>
        ',
        'support' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <path d="M12 34v-5c0-12 8-21 20-21s20 9 20 21v5"></path>
                <rect x="7" y="30" width="10" height="18" rx="4"></rect>
                <rect x="47" y="30" width="10" height="18" rx="4"></rect>
                <path d="M52 48c0 6-5 9-12 9h-4"></path>
                <circle cx="32" cy="57" r="3"></circle>
            </svg>
        ',
        'network' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <rect x="9" y="7" width="46" height="13" rx="3"></rect>
                <rect x="9" y="26" width="46" height="13" rx="3"></rect>
                <rect x="9" y="45" width="46" height="13" rx="3"></rect>
                <circle cx="17" cy="13.5" r="2"></circle>
                <circle cx="17" cy="32.5" r="2"></circle>
                <circle cx="17" cy="51.5" r="2"></circle>
                <path d="M24 14h23M24 33h23M24 52h23"></path>
            </svg>
        ',
        'code' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <rect x="6" y="9" width="52" height="46" rx="5"></rect>
                <path d="M6 20h52"></path>
                <circle cx="13" cy="15" r="1.5"></circle>
                <circle cx="19" cy="15" r="1.5"></circle>
                <circle cx="25" cy="15" r="1.5"></circle>
                <path d="M25 31l-7 6 7 6M39 31l7 6-7 6M35 27l-6 20"></path>
            </svg>
        ',
        'signature' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <path d="M14 6h25l11 11v39H14z"></path>
                <path d="M39 6v12h11M22 27h20M22 34h13"></path>
                <path d="M23 49c8-12 13-9 10-4 5-5 7-3 5 1 4-3 7-2 9 1"></path>
            </svg>
        ',
        'fiscal' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <path d="M17 7h30v16H17z"></path>
                <rect x="8" y="22" width="48" height="27" rx="5"></rect>
                <path d="M17 43h30v14H17zM18 30h12M18 36h8"></path>
                <circle cx="47" cy="31" r="2"></circle>
                <circle cx="40" cy="31" r="2"></circle>
            </svg>
        ',
        'service' => '
            <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
                <circle cx="32" cy="32" r="11"></circle>
                <path d="M32 6v9M32 49v9M6 32h9M49 32h9"></path>
                <path d="M14 14l7 7M43 43l7 7M50 14l-7 7M21 43l-7 7"></path>
            </svg>
        ',
    );

    return $icons[ $key ] ?? $icons['service'];
};

$service_posts = get_posts(
    array(
        'post_type'        => 'etos_service',
        'post_status'      => 'publish',
        'posts_per_page'   => 6,
        'orderby'          => array(
            'menu_order' => 'ASC',
            'title'      => 'ASC',
        ),
        'suppress_filters' => false,
        'meta_query'        => array(
            array(
                'key'     => 'etos_service_featured_on_home',
                'value'   => '1',
                'compare' => '=',
            ),
        ),
    )
);

// Until visibility is configured, show available service entries.
if ( empty( $service_posts ) ) {
    $service_posts = get_posts(
        array(
            'post_type'        => 'etos_service',
            'post_status'      => 'publish',
            'posts_per_page'   => 6,
            'orderby'          => array(
                'menu_order' => 'ASC',
                'title'      => 'ASC',
            ),
            'suppress_filters' => false,
        )
    );
}

$services = array();

foreach ( $service_posts as $service_post ) {
    $title = $etos_get_service_value(
        $service_post->ID,
        'etos_service_home_title'
    );

    $title = $title
        ? trim( (string) $title )
        : get_the_title( $service_post );

    $title_slug = sanitize_title( $title );

    // These two offers are displayed as larger panels below the service grid.
    if (
        false !== strpos( $title_slug, 'podpis' )
        || false !== strpos( $title_slug, 'fiskal' )
    ) {
        continue;
    }

    $text = $etos_get_service_value(
        $service_post->ID,
        'etos_service_home_text'
    );

    if ( ! $text ) {
        $text = get_the_excerpt( $service_post );
    }

    $icon = $etos_get_service_value(
        $service_post->ID,
        'etos_service_icon'
    );

    if ( is_array( $icon ) ) {
        $icon = $icon['ID'] ?? $icon['id'] ?? 0;
    }

    $services[] = array(
        'title'    => $title,
        'text'     => trim( wp_strip_all_tags( (string) $text ) ),
        'url'      => get_permalink( $service_post ),
        'icon_id'  => absint( $icon ),
        'icon_key' => $etos_get_service_icon_key( $title ),
    );
}

if ( empty( $services ) ) {
    $services = array(
        array(
            'title'    => 'Wdrażanie oprogramowania',
            'text'     => 'Instalacja, konfiguracja, migracja danych i uruchomienie systemu w środowisku firmy.',
            'url'      => home_url( '/uslugi/' ),
            'icon_id'  => 0,
            'icon_key' => 'implementation',
        ),
        array(
            'title'    => 'Szkolenia',
            'text'     => 'Praktyczne szkolenia użytkowników dopasowane do wykorzystywanych systemów i procesów.',
            'url'      => home_url( '/uslugi/' ),
            'icon_id'  => 0,
            'icon_key' => 'training',
        ),
        array(
            'title'    => 'Opieka serwisowa',
            'text'     => 'Bieżące wsparcie techniczne, diagnostyka problemów i pomoc w codziennej pracy.',
            'url'      => home_url( '/uslugi/' ),
            'icon_id'  => 0,
            'icon_key' => 'support',
        ),
        array(
            'title'    => 'Serwery i sieci',
            'text'     => 'Projektowanie, konfiguracja i utrzymanie bezpiecznej infrastruktury informatycznej.',
            'url'      => home_url( '/uslugi/' ),
            'icon_id'  => 0,
            'icon_key' => 'network',
        ),
        array(
            'title'    => 'Usługi programistyczne',
            'text'     => 'Integracje, automatyzacje i rozwiązania rozwijane zgodnie z potrzebami organizacji.',
            'url'      => home_url( '/uslugi/' ),
            'icon_id'  => 0,
            'icon_key' => 'code',
        ),
    );
}

$service_count = count( $services );
?>

<section class="etos-section etos-services">

    <div class="container etos-container">

        <header class="etos-services__header">

            <div>

                <span class="etos-kicker etos-kicker--light">
                    <?php esc_html_e( 'Usługi ETOS', 'etos' ); ?>
                </span>

                <h2 class="etos-section__title">
                    <?php
                    esc_html_e(
                        'Profesjonalne usługi wspierające rozwój Twojej firmy.',
                        'etos'
                    );
                    ?>
                </h2>

            </div>

            <p class="etos-services__lead">
                <?php
                esc_html_e(
                    'Od analizy i wdrożenia oprogramowania, przez szkolenia i opiekę serwisową, po infrastrukturę oraz rozwiązania tworzone na zamówienie.',
                    'etos'
                );
                ?>
            </p>

        </header>

        <div class="etos-services__grid">

            <?php foreach ( $services as $index => $service ) : ?>
                <?php
                $card_classes = array(
                    'etos-service-card',
                );

                if (
                    2 === $service_count % 3
                    && $index === $service_count - 2
                ) {
                    $card_classes[] = 'etos-service-card--center-start';
                }
                ?>

                <a
                    class="<?php echo esc_attr( implode( ' ', $card_classes ) ); ?>"
                    href="<?php echo esc_url( $service['url'] ); ?>"
                >

                    <span class="etos-service-card__icon">

                        <?php if ( $service['icon_id'] ) : ?>

                            <?php
                            echo wp_get_attachment_image(
                                $service['icon_id'],
                                'thumbnail',
                                false,
                                array(
                                    'class'   => 'etos-service-card__icon-image',
                                    'loading' => 'lazy',
                                )
                            );
                            ?>

                        <?php else : ?>

                            <?php
                            // Static, trusted SVG markup defined in this template.
                            echo $etos_get_service_icon( $service['icon_key'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                            ?>

                        <?php endif; ?>

                    </span>

                    <h3><?php echo esc_html( $service['title'] ); ?></h3>

                    <?php if ( $service['text'] ) : ?>
                        <p><?php echo esc_html( $service['text'] ); ?></p>
                    <?php endif; ?>

                    <span class="etos-service-card__link">
                        <span><?php esc_html_e( 'Poznaj szczegóły', 'etos' ); ?></span>
                        <span aria-hidden="true">→</span>
                    </span>

                </a>

            <?php endforeach; ?>

        </div>

        <div class="etos-services__solutions">

            <header class="etos-services__solutions-header">

                <span class="etos-services__solutions-kicker">
                    <?php esc_html_e( 'Rozwiązania uzupełniające', 'etos' ); ?>
                </span>

                <h2>
                    <?php
                    esc_html_e(
                        'Podpis elektroniczny i urządzenia fiskalne.',
                        'etos'
                    );
                    ?>
                </h2>

            </header>

            <div class="etos-services__highlight-grid">

                <article class="etos-service-highlight">

                    <span class="etos-service-highlight__icon">
                        <?php
                        echo $etos_get_service_icon( 'signature' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                        ?>
                    </span>

                    <span class="etos-service-highlight__eyebrow">
                        <?php esc_html_e( 'Podpis i certyfikaty', 'etos' ); ?>
                    </span>

                    <h3><?php esc_html_e( 'Podpis elektroniczny', 'etos' ); ?></h3>

                    <p>
                        <?php
                        esc_html_e(
                            'Wydajemy i odnawiamy certyfikaty kwalifikowane, pomagamy w konfiguracji oraz zapewniamy wsparcie użytkowników.',
                            'etos'
                        );
                        ?>
                    </p>

                    <ul>
                        <li><?php esc_html_e( 'Podpis kwalifikowany', 'etos' ); ?></li>
                        <li><?php esc_html_e( 'Odnowienia', 'etos' ); ?></li>
                        <li><?php esc_html_e( 'Konfiguracja i wsparcie', 'etos' ); ?></li>
                    </ul>

                    <a
                        class="etos-service-highlight__button"
                        href="<?php echo esc_url( home_url( '/podpis-elektroniczny/' ) ); ?>"
                    >
                        <?php esc_html_e( 'Zarezerwuj termin', 'etos' ); ?>
                    </a>

                </article>

                <article class="etos-service-highlight">

                    <span class="etos-service-highlight__icon">
                        <?php
                        echo $etos_get_service_icon( 'fiscal' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                        ?>
                    </span>

                    <span class="etos-service-highlight__eyebrow">
                        <?php esc_html_e( 'Sprzedaż i fiskalizacja', 'etos' ); ?>
                    </span>

                    <h3><?php esc_html_e( 'Urządzenia fiskalne', 'etos' ); ?></h3>

                    <p>
                        <?php
                        esc_html_e(
                            'Dobieramy kasy i drukarki fiskalne, konfigurujemy urządzenia oraz zapewniamy przeglądy i obsługę serwisową.',
                            'etos'
                        );
                        ?>
                    </p>

                    <ul>
                        <li><?php esc_html_e( 'Kasy i drukarki online', 'etos' ); ?></li>
                        <li><?php esc_html_e( 'Konfiguracja', 'etos' ); ?></li>
                        <li><?php esc_html_e( 'Serwis i przeglądy', 'etos' ); ?></li>
                    </ul>

                    <a
                        class="etos-service-highlight__button"
                        href="<?php echo esc_url( home_url( '/urzadzenia-fiskalne/' ) ); ?>"
                    >
                        <?php esc_html_e( 'Umów spotkanie', 'etos' ); ?>
                    </a>

                </article>

            </div>

        </div>

    </div>

</section>