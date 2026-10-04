<?php
/**
 * Template Name: Rezerwacja serwisu ETOS
 * Template Post Type: page
 *
 * @package ETOS
 */

defined( 'ABSPATH' ) || exit;

get_header();

$GLOBALS['etos_footer_cta_hide'] = true;

$booking_type = function_exists( 'get_field' )
    ? get_field( 'etos_service_booking_type' )
    : get_post_meta(
        get_queried_object_id(),
        'etos_service_booking_type',
        true
    );

if ( is_array( $booking_type ) ) {
    $booking_type = $booking_type['value'] ?? '';
}

$booking_type = sanitize_key(
    (string) $booking_type
);

$booking_widgets = array(
    'infrastructure' => array(
        'iframe_url' => 'https://widget.zarezerwuj.pl/f257be42-ba13-4bdf-ba2e-753de79d896a',
        'direct_url' => 'https://widget.zarezerwuj.pl/direct/f257be42-ba13-4bdf-ba2e-753de79d896a',
        'qr_image'   => get_stylesheet_directory_uri()
            . '/assets/images/service-booking/qr.png',
    ),
    'signature'      => array(
        'iframe_url' => 'https://widget.zarezerwuj.pl/0e390d9f-e360-4b7b-b90e-7500f824c58c',
        'direct_url' => 'https://widget.zarezerwuj.pl/direct/0e390d9f-e360-4b7b-b90e-7500f824c58c',
        'qr_image'   => get_stylesheet_directory_uri()
            . '/assets/images/service-booking/qr-signature.png',
    ),
    'implementation' => array(
        'iframe_url' => 'https://widget.zarezerwuj.pl/bac14b86-c057-44a9-86ed-611a131e5a94',
        'direct_url' => 'https://widget.zarezerwuj.pl/direct/bac14b86-c057-44a9-86ed-611a131e5a94',
        'qr_image'   => get_stylesheet_directory_uri()
            . '/assets/images/service-booking/qr-implementation.png',
    ),
);

if ( ! isset( $booking_widgets[ $booking_type ] ) ) {
    $booking_type = 'infrastructure';
}

$booking_widget = $booking_widgets[ $booking_type ];

while ( have_posts() ) :
    the_post();
    ?>

    <main class="site-main" id="main" role="main">

        <article <?php post_class( 'etos-service-booking' ); ?>>

            <section class="py-5 py-lg-6">

                <div class="container">

                    <header class="mb-4 mb-lg-5">

                        <span class="etos-kicker">
                            <?php esc_html_e( 'Serwis online', 'etos' ); ?>
                        </span>

                        <h1 class="mt-3 mb-3">
                            <?php the_title(); ?>
                        </h1>

                        <?php if ( has_excerpt() ) : ?>

                            <p class="lead mb-0">
                                <?php echo esc_html( get_the_excerpt() ); ?>
                            </p>

                        <?php endif; ?>

                    </header>

                    <?php
                    $page_content = trim(
                        (string) get_post_field(
                            'post_content',
                            get_the_ID()
                        )
                    );
                    ?>

                    <?php if ( '' !== $page_content ) : ?>

                        <div class="mb-4 mb-lg-5">
                            <?php the_content(); ?>
                        </div>

                    <?php endif; ?>

                        <iframe
                            src="<?php echo esc_url( $booking_widget['iframe_url'] ); ?>"
                            title="<?php esc_attr_e(
                                'Rezerwacja terminu i płatność za usługę serwisową',
                                'etos'
                            ); ?>"
                            style="
                                border: none;
                                min-height: 760px;
                                width: 100%;
                                height: 760px;
                            "
                        ></iframe>

                    <div class="border-top mt-4 pt-4">

                        <div class="row align-items-center g-4">

                            <div class="col-md">

                                <h2 class="h4 mb-2">
                                    <?php esc_html_e(
                                        'Rezerwacja na telefonie',
                                        'etos'
                                    ); ?>
                                </h2>

                                <p class="mb-3">
                                    <?php esc_html_e(
                                        'Zeskanuj kod QR, aby otworzyć formularz rezerwacji na telefonie.',
                                        'etos'
                                    ); ?>
                                </p>

                                <a
                                    href="<?php echo esc_url( $booking_widget['direct_url'] ); ?>"
                                    class="btn btn-outline-primary"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                >
                                    <?php esc_html_e(
                                        'Otwórz formularz w nowej karcie',
                                        'etos'
                                    ); ?>
                                </a>

                            </div>

                            <?php if ( '' !== $booking_widget['qr_image'] ) : ?>

                                <div class="col-md-auto">

                                    <a
                                        href="<?php echo esc_url(
                                            $booking_widget['direct_url']
                                        ); ?>"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        aria-label="<?php esc_attr_e(
                                            'Otwórz formularz rezerwacji',
                                            'etos'
                                        ); ?>"
                                    >
                                        <img
                                            src="<?php echo esc_url(
                                                $booking_widget['qr_image']
                                            ); ?>"
                                            width="160"
                                            height="160"
                                            loading="lazy"
                                            alt="<?php esc_attr_e(
                                                'Kod QR do formularza rezerwacji',
                                                'etos'
                                            ); ?>"
                                        >
                                    </a>

                                </div>

                            <?php endif; ?>

                        </div>

                    </div>

                </div>

            </section>

        </article>

    </main>

    <?php
endwhile;

get_footer();