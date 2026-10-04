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

$front_page_id = get_queried_object_id();

$get_front_services_field = static function (
    $name,
    $default = ''
) use (
    $front_page_id,
    $etos_get_service_value
) {
    $value = $etos_get_service_value(
        $front_page_id,
        $name
    );

    if (
        null === $value
        || false === $value
        || '' === $value
    ) {
        return $default;
    }

    return $value;
};

$front_services_kicker = trim(
    (string) $get_front_services_field(
        'etos_front_services_kicker',
        'Usługi ETOS'
    )
);

$front_services_title = trim(
    (string) $get_front_services_field(
        'etos_front_services_title',
        'Profesjonalne usługi wspierające rozwój Twojej firmy.'
    )
);

$front_services_lead = trim(
    (string) $get_front_services_field(
        'etos_front_services_lead',
        'Od analizy i wdrożenia oprogramowania, przez szkolenia i opiekę serwisową, po infrastrukturę oraz rozwiązania tworzone na zamówienie.'
    )
);

$front_special_title = trim(
    (string) $get_front_services_field(
        'etos_front_special_title',
        'Podpis elektroniczny i urządzenia fiskalne.'
    )
);

$front_signature_eyebrow = trim(
    (string) $get_front_services_field(
        'etos_front_signature_eyebrow',
        'Podpis i certyfikaty'
    )
);

$front_signature_title = trim(
    (string) $get_front_services_field(
        'etos_front_signature_title',
        'Podpis elektroniczny'
    )
);

$front_signature_text = trim(
    (string) $get_front_services_field(
        'etos_front_signature_text',
        'Wydajemy i odnawiamy certyfikaty kwalifikowane, pomagamy w konfiguracji oraz zapewniamy wsparcie użytkowników.'
    )
);

$front_signature_link = $get_front_services_field(
    'etos_front_signature_link',
    array()
);

$front_signature_link = is_array( $front_signature_link )
    ? $front_signature_link
    : array();

$front_signature_url = trim(
    (string) (
        $front_signature_link['url']
        ?? home_url( '/podpis-elektroniczny/' )
    )
);

$front_signature_link_title = trim(
    (string) (
        $front_signature_link['title']
        ?? 'Poznaj szczegóły'
    )
);

$front_signature_target = '_blank' === (
    $front_signature_link['target']
    ?? ''
)
    ? '_blank'
    : '';

$front_fiscal_eyebrow = trim(
    (string) $get_front_services_field(
        'etos_front_fiscal_eyebrow',
        'Sprzedaż i fiskalizacja'
    )
);

$front_fiscal_title = trim(
    (string) $get_front_services_field(
        'etos_front_fiscal_title',
        'Urządzenia fiskalne'
    )
);

$front_fiscal_text = trim(
    (string) $get_front_services_field(
        'etos_front_fiscal_text',
        'Dobieramy kasy i drukarki fiskalne, konfigurujemy urządzenia oraz zapewniamy przeglądy i obsługę serwisową.'
    )
);

$front_fiscal_link = $get_front_services_field(
    'etos_front_fiscal_link',
    array()
);

$front_fiscal_link = is_array( $front_fiscal_link )
    ? $front_fiscal_link
    : array();

$front_fiscal_url = trim(
    (string) (
        $front_fiscal_link['url']
        ?? home_url( '/urzadzenia-fiskalne/' )
    )
);

$front_fiscal_link_title = trim(
    (string) (
        $front_fiscal_link['title']
        ?? 'Poznaj szczegóły'
    )
);

$front_fiscal_target = '_blank' === (
    $front_fiscal_link['target']
    ?? ''
)
    ? '_blank'
    : '';
$service_posts = get_posts(
    array(
        'post_type'        => 'etos_service',
        'post_status'      => 'publish',
        'posts_per_page'   => -1,
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
            'posts_per_page'   => -1,
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

    // These offers are displayed elsewhere on the front page.
    if (
        false !== strpos( $title_slug, 'podpis' )
        || false !== strpos( $title_slug, 'fiskal' )
        || false !== strpos( $title_slug, 'pomoc-zdal' )
    ) {
        continue;
    }

    $text = $etos_get_service_value(
        $service_post->ID,
        'etos_service_home_text'
    );

    if ( ! $text ) {
        $raw_excerpt = (string) get_post_field(
            'post_excerpt',
            $service_post->ID
        );

        $raw_content = (string) get_post_field(
            'post_content',
            $service_post->ID
        );

        $source_text = '' !== trim( $raw_excerpt )
            ? $raw_excerpt
            : $raw_content;

        $text = wp_trim_words(
            trim(
                wp_strip_all_tags(
                    strip_shortcodes( $source_text )
                )
            ),
            22,
            '…'
        );
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
        'icon_key' => etos_get_service_icon_key_for_content( $title, $text ),
    );

    if ( 4 <= count( $services ) ) {
        break;
    }
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
            'icon_key' => 'training-user',
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

    );
}

?>

<section class="etos-section etos-services">

    <div class="container etos-container">

        <header class="etos-services__header">

            <div>

                <span class="etos-kicker etos-kicker--light">
                    <?php echo esc_html( $front_services_kicker ); ?>
                </span>

                <h2 class="etos-section__title">
                    <?php
                    echo esc_html( $front_services_title );
                    ?>
                </h2>

            </div>

            <p class="etos-services__lead">
                <?php
                echo esc_html( $front_services_lead );
                ?>
            </p>

        </header>

        <div class="etos-services__grid">

            <?php foreach ( $services as $service ) : ?>

                <a
                    class="etos-service-card"
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
                            echo etos_get_inline_icon_svg( $service['icon_key'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
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
<h2>
                    <?php
                    echo esc_html( $front_special_title );
                    ?>
                </h2>

            </header>

            <div class="etos-services__highlight-grid">

                <article class="etos-service-highlight">

                    <span class="etos-service-highlight__icon">
                        <?php
                        echo etos_get_inline_icon_svg( 'signature' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                        ?>
                    </span>

                    <span class="etos-service-highlight__eyebrow">
                        <?php echo esc_html( $front_signature_eyebrow ); ?>
                    </span>

                    <h3><?php echo esc_html( $front_signature_title ); ?></h3>

                    <p>
                        <?php
                        echo esc_html( $front_signature_text );
                        ?>
                    </p>

                    <ul>
                        <li><?php esc_html_e( 'Podpis kwalifikowany', 'etos' ); ?></li>
                        <li><?php esc_html_e( 'Odnowienia', 'etos' ); ?></li>
                        <li><?php esc_html_e( 'Konfiguracja i wsparcie', 'etos' ); ?></li>
                    </ul>

                    <a
                        class="etos-service-highlight__button"
                        href="<?php echo esc_url( $front_signature_url ); ?>"
                        <?php if ( $front_signature_target ) : ?>
                            target="_blank"
                            rel="noopener noreferrer"
                        <?php endif; ?>
                    >
                        <?php echo esc_html( $front_signature_link_title ); ?> <span aria-hidden="true">→</span>
                    </a>

                </article>

                <article class="etos-service-highlight">

                    <span class="etos-service-highlight__icon">
                        <?php
                        echo etos_get_inline_icon_svg( 'fiscal' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                        ?>
                    </span>

                    <span class="etos-service-highlight__eyebrow">
                        <?php echo esc_html( $front_fiscal_eyebrow ); ?>
                    </span>

                    <h3><?php echo esc_html( $front_fiscal_title ); ?></h3>

                    <p>
                        <?php
                        echo esc_html( $front_fiscal_text );
                        ?>
                    </p>

                    <ul>
                        <li><?php esc_html_e( 'Kasy i drukarki online', 'etos' ); ?></li>
                        <li><?php esc_html_e( 'Konfiguracja', 'etos' ); ?></li>
                        <li><?php esc_html_e( 'Serwis i przeglądy', 'etos' ); ?></li>
                    </ul>

                    <a
                        class="etos-service-highlight__button"
                        href="<?php echo esc_url( $front_fiscal_url ); ?>"
                        <?php if ( $front_fiscal_target ) : ?>
                            target="_blank"
                            rel="noopener noreferrer"
                        <?php endif; ?>
                    >
                        <?php echo esc_html( $front_fiscal_link_title ); ?> <span aria-hidden="true">→</span>
                    </a>

                </article>

            </div>

        </div>

    </div>

</section>
