<?php
/**
 * The template for displaying the footer.
 *
 * @package Understrap
 */

defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );

/* ETOS FOOTER OPTIONS START */

$etos_footer_option = static function ( $field, $fallback = '' ) {

    if ( ! function_exists( 'get_field' ) ) {
        return $fallback;
    }

    $value = get_field( $field, 'option' );

    if (
        false === $value
        || null === $value
        || '' === $value
    ) {
        return $fallback;
    }

    return $value;
};

$footer_description = $etos_footer_option(
    'etos_footer_description',
    'Autoryzowany partner i integrator systemów ERP. Wspieramy firmy we wdrażaniu oprogramowania oraz utrzymaniu stabilnego środowiska IT.'
);

$footer_trust = function_exists( 'get_field' )
    ? get_field( 'etos_footer_trust', 'option' )
    : array();

if ( ! is_array( $footer_trust ) || ! $footer_trust ) {
    $footer_trust = array(
        array( 'label' => 'ERP' ),
        array( 'label' => 'IT' ),
        array( 'label' => 'KSeF' ),
        array( 'label' => 'Serwis' ),
    );
}

$footer_company = $etos_footer_option(
    'etos_footer_company',
    'ETOS Sp. z o.o.'
);

$footer_address_1 = $etos_footer_option(
    'etos_footer_address_1',
    'ul. Mochnackiego 10'
);

$footer_address_2 = $etos_footer_option(
    'etos_footer_address_2',
    '10-037 Olsztyn'
);

$footer_phone_1 = $etos_footer_option(
    'etos_footer_phone_1',
    '+48 89 535 08 08'
);

$footer_phone_1_label = $etos_footer_option(
    'etos_footer_phone_1_label',
    'sklep, serwis'
);

$footer_phone_2 = $etos_footer_option(
    'etos_footer_phone_2',
    '+48 89 535 23 09'
);

$footer_phone_2_label = $etos_footer_option(
    'etos_footer_phone_2_label',
    'wdrożenia'
);

$footer_email = $etos_footer_option(
    'etos_footer_email',
    'info@etos.com.pl'
);

$footer_privacy = function_exists( 'get_field' )
    ? get_field( 'etos_footer_privacy', 'option' )
    : false;

$footer_cookies = function_exists( 'get_field' )
    ? get_field( 'etos_footer_cookies', 'option' )
    : false;

$footer_cta_link = function_exists( 'get_field' )
    ? get_field( 'etos_footer_cta_link', 'option' )
    : false;

$footer_cta_url = (
    is_array( $footer_cta_link )
    && ! empty( $footer_cta_link['url'] )
)
    ? $footer_cta_link['url']
    : home_url( '/kontakt/' );

$footer_cta = $GLOBALS['etos_footer_cta'] ?? array(
    'eyebrow' => $etos_footer_option(
        'etos_footer_cta_eyebrow',
        'Zacznij od krótkiej rozmowy'
    ),
    'title' => $etos_footer_option(
        'etos_footer_cta_title',
        'Dobierzmy rozwiązanie do procesów Twojej firmy.'
    ),
    'text' => $etos_footer_option(
        'etos_footer_cta_text',
        'Opowiedz nam, jak dziś pracujesz i gdzie pojawiają się trudności. Zaproponujemy system, zakres wdrożenia i wsparcie dopasowane do Twoich potrzeb.'
    ),
    'button' => $etos_footer_option(
        'etos_footer_cta_button',
        'Porozmawiaj z doradcą'
    ),
    'note' => $etos_footer_option(
        'etos_footer_cta_note',
        'Wspólnie ustalimy najlepszy kolejny krok.'
    ),
    'url' => $footer_cta_url,
);

/* ETOS FOOTER OPTIONS END */
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper" id="wrapper-footer">

    <footer
        class="site-footer etos-footer"
        id="colophon"
        role="contentinfo"
    >

        <?php if ( empty( $GLOBALS['etos_footer_cta_hide'] ) ) : ?>

            <div class="etos-footer__cta-band">

                <div class="<?php echo esc_attr( $container ); ?> etos-container">

                    <?php
                    get_template_part(
                        'template-parts/components/cta',
                        'panel',
                        array(
                            'cta' => $footer_cta + array(
                                'class' => 'etos-cta-panel--footer',
                            ),
                        )
                    );
                    ?>

                </div>

            </div>

        <?php endif; ?>

        <div class="etos-footer__body">

            <div class="<?php echo esc_attr( $container ); ?> etos-footer__container">

                <div class="etos-footer__main">

                    <div class="row g-5">

                        <div class="col-xl-4 col-lg-5">

                            <div class="etos-footer__brand">

                                <a
                                    href="<?php echo esc_url( home_url( '/' ) ); ?>"
                                    class="etos-footer__logo"
                                    aria-label="ETOS — strona główna"
                                >

                                    <img
                                        src="<?php echo esc_url(
                                            get_stylesheet_directory_uri()
                                            . '/assets/images/footer/logo.png'
                                        ); ?>"
                                        alt="ETOS"
                                        class="img-fluid"
                                        loading="lazy"
                                    >

                                </a>

                                <p>
                                    <?php
                                    echo nl2br(
                                        esc_html( $footer_description )
                                    );
                                    ?>
                                </p>

                            </div>

                            <div class="etos-footer__trust">
                                <?php foreach ( $footer_trust as $footer_trust_item ) : ?>

                                    <?php
                                    $footer_trust_label = isset(
                                        $footer_trust_item['label']
                                    )
                                        ? trim(
                                            (string) $footer_trust_item['label']
                                        )
                                        : '';

                                    if ( '' === $footer_trust_label ) {
                                        continue;
                                    }
                                    ?>

                                    <span>
                                        <?php echo esc_html( $footer_trust_label ); ?>
                                    </span>

                                <?php endforeach; ?>
                            </div>

                        </div>

                        <div class="col-xl-5 col-lg-4">

                            <div class="row g-4">

                                <div class="col-sm-6">

                                    <h3>Systemy ERP</h3>

                                    <ul>
                                        <?php
                                        $footer_vendor_slugs = array(
                                            'symfonia',
                                            'insert',
                                            'streamsoft',
                                        );

                                        foreach ( $footer_vendor_slugs as $footer_vendor_slug ) :

                                            $footer_vendor = get_term_by(
                                                'slug',
                                                $footer_vendor_slug,
                                                'etos_vendor'
                                            );

                                            if (
                                                ! $footer_vendor
                                                || is_wp_error( $footer_vendor )
                                            ) {
                                                continue;
                                            }

                                            $footer_vendor_url = get_term_link(
                                                $footer_vendor
                                            );

                                            if ( is_wp_error( $footer_vendor_url ) ) {
                                                continue;
                                            }
                                            ?>

                                            <li>
                                                <a href="<?php echo esc_url( $footer_vendor_url ); ?>">
                                                    <?php echo esc_html( $footer_vendor->name ); ?>
                                                </a>
                                            </li>

                                        <?php endforeach; ?>
                                    </ul>

                                </div>

                                <div class="col-sm-6">

                                    <h3>Usługi</h3>

                                    <ul>
                                        <?php
                                        $footer_services = get_posts(
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

                                        $footer_services = array_values(
                                            array_filter(
                                                $footer_services,
                                                static function ( $service ) {
                                                    return '0' !== (string) get_post_meta(
                                                        $service->ID,
                                                        'etos_service_show_in_menu',
                                                        true
                                                    );
                                                }
                                            )
                                        );

                                        foreach ( $footer_services as $footer_service ) :

                                            $footer_service_label = (string) get_post_meta(
                                                $footer_service->ID,
                                                'etos_service_menu_label',
                                                true
                                            );
                                            ?>

                                            <li>
                                                <a href="<?php echo esc_url( get_permalink( $footer_service ) ); ?>">
                                                    <?php
                                                    echo esc_html(
                                                        $footer_service_label
                                                            ?: get_the_title( $footer_service )
                                                    );
                                                    ?>
                                                </a>
                                            </li>

                                        <?php endforeach; ?>
                                    </ul>

                                </div>

                            </div>

                        </div>

                        <div class="col-xl-3 col-lg-3">

                            <h3>Kontakt</h3>

                            <address class="etos-footer__contact">

                                <strong>
                                    <?php echo esc_html( $footer_company ); ?>
                                </strong>

                                <?php if ( $footer_address_1 ) : ?>
                                    <span>
                                        <?php echo esc_html( $footer_address_1 ); ?>
                                    </span>
                                <?php endif; ?>

                                <?php if ( $footer_address_2 ) : ?>
                                    <span>
                                        <?php echo esc_html( $footer_address_2 ); ?>
                                    </span>
                                <?php endif; ?>

                                <?php if ( $footer_phone_1 ) : ?>
                                    <a
                                        href="tel:<?php echo esc_attr(
                                            preg_replace(
                                                '/[^0-9+]/',
                                                '',
                                                $footer_phone_1
                                            )
                                        ); ?>"
                                    >
                                        <?php echo esc_html( $footer_phone_1 ); ?>

                                        <?php if ( $footer_phone_1_label ) : ?>
                                            - <?php echo esc_html( $footer_phone_1_label ); ?>
                                        <?php endif; ?>
                                    </a>
                                <?php endif; ?>

                                <?php if ( $footer_phone_2 ) : ?>
                                    <a
                                        href="tel:<?php echo esc_attr(
                                            preg_replace(
                                                '/[^0-9+]/',
                                                '',
                                                $footer_phone_2
                                            )
                                        ); ?>"
                                    >
                                        <?php echo esc_html( $footer_phone_2 ); ?>

                                        <?php if ( $footer_phone_2_label ) : ?>
                                            - <?php echo esc_html( $footer_phone_2_label ); ?>
                                        <?php endif; ?>
                                    </a>
                                <?php endif; ?>

                                <?php if ( $footer_email ) : ?>
                                    <a href="mailto:<?php echo esc_attr( antispambot( $footer_email ) ); ?>">
                                        <?php echo esc_html( antispambot( $footer_email ) ); ?>
                                    </a>
                                <?php endif; ?>

                            </address>

                        </div>

                    </div>

                </div>

                <div class="etos-footer__bottom">

                    <p>
                        &copy; <?php echo esc_html( date( 'Y' ) ); ?> ETOS
                    </p>

                    <nav aria-label="Linki prawne">

                        <?php
                        if (
                            is_array( $footer_privacy )
                            && ! empty( $footer_privacy['url'] )
                        ) :
                            ?>

                            <a
                                href="<?php echo esc_url( $footer_privacy['url'] ); ?>"
                                <?php if ( ! empty( $footer_privacy['target'] ) ) : ?>
                                    target="<?php echo esc_attr( $footer_privacy['target'] ); ?>"
                                <?php endif; ?>
                            >
                                <?php
                                echo esc_html(
                                    $footer_privacy['title']
                                        ?: 'Polityka prywatności'
                                );
                                ?>
                            </a>

                        <?php endif; ?>

                        <?php
                        if (
                            is_array( $footer_cookies )
                            && ! empty( $footer_cookies['url'] )
                        ) :
                            ?>

                            <a
                                href="<?php echo esc_url( $footer_cookies['url'] ); ?>"
                                <?php if ( ! empty( $footer_cookies['target'] ) ) : ?>
                                    target="<?php echo esc_attr( $footer_cookies['target'] ); ?>"
                                <?php endif; ?>
                            >
                                <?php
                                echo esc_html(
                                    $footer_cookies['title']
                                        ?: 'Polityka cookies'
                                );
                                ?>
                            </a>

                        <?php endif; ?>

                    </nav>

                </div>

            </div>

        </div>

    </footer>

</div>

<?php wp_footer(); ?>

</body>
</html>