<?php
/**
 * Software vendor archive.
 *
 * @package ETOS
 */

defined( 'ABSPATH' ) || exit;

get_header();

$term = get_queried_object();

if ( ! $term || is_wp_error( $term ) ) {
    get_footer();
    return;
}

$term_id   = (int) $term->term_id;
$term_key  = 'term_' . $term_id;
$term_name = (string) $term->name;

$get_vendor_field = static function ( $name, $default = '' ) use (
    $term_id,
    $term_key
) {
    $value = null;

    if ( function_exists( 'get_field' ) ) {
        $value = get_field( $name, $term_key );
    }

    if (
        null === $value
        || false === $value
        || '' === $value
    ) {
        $value = get_term_meta(
            $term_id,
            $name,
            true
        );
    }

    if (
        null === $value
        || false === $value
        || '' === $value
    ) {
        return $default;
    }

    return $value;
};

$accent = (string) $get_vendor_field(
    'etos_vendor_accent',
    '#2457D6'
);

if ( ! preg_match( '/^#[0-9a-fA-F]{6}$/', $accent ) ) {
    $accent = '#2457D6';
}

$logo_id = $get_vendor_field(
    'etos_vendor_logo',
    0
);

if ( is_array( $logo_id ) ) {
    $logo_id = $logo_id['ID'] ?? $logo_id['id'] ?? 0;
}

$logo_id = absint( $logo_id );

$image_id = $get_vendor_field(
    'etos_vendor_image',
    0
);

if ( is_array( $image_id ) ) {
    $image_id = $image_id['ID'] ?? $image_id['id'] ?? 0;
}

$image_id = absint( $image_id );

$kicker = trim(
    (string) $get_vendor_field(
        'etos_vendor_landing_kicker',
        'Systemy ERP'
    )
);

$title = trim(
    (string) $get_vendor_field(
        'etos_vendor_landing_title',
        sprintf(
            'Oprogramowanie %s dla Twojej firmy',
            $term_name
        )
    )
);

$lead = trim(
    (string) $get_vendor_field(
        'etos_vendor_landing_lead',
        sprintf(
            'Dobieramy, wdrażamy i wspieramy rozwiązania %s dopasowane do procesów i potrzeb Twojej firmy.',
            $term_name
        )
    )
);

$description = trim(
    (string) $get_vendor_field(
        'etos_vendor_landing_description',
        term_description( $term_id )
    )
);

$cta = $get_vendor_field(
    'etos_vendor_landing_cta',
    array()
);

$contact_page = get_page_by_path( 'kontakt' );

$contact_url = $contact_page
    ? get_permalink( $contact_page )
    : home_url( '/kontakt/' );

if (
    ! is_array( $cta )
    || empty( $cta['url'] )
) {
    $cta = array(
        'url'    => $contact_url,
        'title'  => 'Porozmawiaj z doradcą',
        'target' => '',
    );
}

$software = new WP_Query(
    array(
        'post_type'      => 'etos_software',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'orderby'        => array(
            'menu_order' => 'ASC',
            'title'      => 'ASC',
        ),
        'tax_query'      => array(
            array(
                'taxonomy' => 'etos_vendor',
                'field'    => 'term_id',
                'terms'    => $term_id,
            ),
        ),
    )
);

$GLOBALS['etos_footer_cta_hide'] = true;
?>

<main
    class="site-main etos-vendor-archive"
    id="main"
    style="--etos-vendor-accent: <?php echo esc_attr( $accent ); ?>;"
>

    <header
        class="etos-vendor-hero<?php echo $image_id
            ? ''
            : ' etos-vendor-hero--no-media'; ?>"
    >

        <div class="container etos-container">

            <div class="etos-vendor-hero__grid">

                <div class="etos-vendor-hero__content">

                    <?php if ( $logo_id ) : ?>
                        <div class="etos-vendor-hero__logo">
                            <?php
                            echo wp_get_attachment_image(
                                $logo_id,
                                'medium',
                                false,
                                array(
                                    'loading' => 'eager',
                                )
                            );
                            ?>
                        </div>
                    <?php endif; ?>


                    <h1 class="etos-vendor-hero__title">
                        <?php echo esc_html( $title ); ?>
                    </h1>

                    <?php if ( $lead ) : ?>
                        <p class="etos-vendor-hero__lead">
                            <?php echo esc_html( $lead ); ?>
                        </p>
                    <?php endif; ?>

                    <a
                        class="btn etos-btn-primary btn-lg"
                        href="<?php echo esc_url( $cta['url'] ); ?>"
                        <?php if ( ! empty( $cta['target'] ) ) : ?>
                            target="<?php echo esc_attr( $cta['target'] ); ?>"
                        <?php endif; ?>
                    >
                        <?php echo esc_html(
                            $cta['title'] ?: 'Porozmawiaj z doradcą'
                        ); ?>
                    </a>

                </div>

                <?php if ( $image_id ) : ?>

                    <figure class="etos-vendor-hero__media">
                        <?php
                        echo wp_get_attachment_image(
                            $image_id,
                            'large',
                            false,
                            array(
                                'class'   => 'etos-vendor-hero__image',
                                'loading' => 'eager',
                            )
                        );
                        ?>
                    </figure>

                <?php endif; ?>

            </div>

        </div>

    </header>

    <?php if ( $description ) : ?>

        <section class="etos-vendor-intro">

            <div class="container etos-container">

                <div class="etos-vendor-intro__content">
                    <?php echo wp_kses_post( wpautop( $description ) ); ?>
                </div>

            </div>

        </section>

    <?php endif; ?>

    <section
        class="etos-vendor-products"
        aria-labelledby="etos-vendor-products-title"
    >

        <div class="container etos-container">

            <header class="etos-vendor-products__header">


                <h2
                    class="etos-section__title"
                    id="etos-vendor-products-title"
                >
                    Nasze rozwiązania
                </h2>

            </header>

            <?php if ( $software->have_posts() ) : ?>

                <div class="etos-vendor-products__grid">

                    <?php while ( $software->have_posts() ) : ?>
                        <?php
                        $software->the_post();

                        $product_id = get_the_ID();

                        $logo = function_exists( 'get_field' )
                            ? get_field(
                                'etos_software_logo',
                                $product_id
                            )
                            : get_post_meta(
                                $product_id,
                                'etos_software_logo',
                                true
                            );

                        if ( is_array( $logo ) ) {
                            $logo = $logo['ID'] ?? $logo['id'] ?? 0;
                        }

                        $logo = absint( $logo );

                        $excerpt = trim(
                            wp_strip_all_tags(
                                get_the_excerpt( $product_id )
                            )
                        );
                        ?>

                        <article class="etos-vendor-product">

                            <?php if ( $logo ) : ?>

                                <div class="etos-vendor-product__logo">
                                    <?php
                                    echo wp_get_attachment_image(
                                        $logo,
                                        'medium',
                                        false,
                                        array(
                                            'loading' => 'lazy',
                                        )
                                    );
                                    ?>
                                </div>

                            <?php endif; ?>

                            <h3 class="etos-vendor-product__title">
                                <?php the_title(); ?>
                            </h3>

                            <?php if ( $excerpt ) : ?>
                                <p class="etos-vendor-product__text">
                                    <?php echo esc_html(
                                        wp_trim_words(
                                            $excerpt,
                                            22,
                                            '…'
                                        )
                                    ); ?>
                                </p>
                            <?php endif; ?>

                            <a
                                class="etos-vendor-product__link"
                                href="<?php the_permalink(); ?>"
                            >
                                <span>Poznaj szczegóły</span>
                                <span aria-hidden="true">→</span>
                            </a>

                        </article>

                    <?php endwhile; ?>

                </div>

            <?php else : ?>

                <p>
                    Wkrótce opublikujemy szczegółowe informacje
                    o rozwiązaniach tego producenta.
                </p>

            <?php endif; ?>

            <?php wp_reset_postdata(); ?>

        </div>

    </section>

</main>

<?php
get_footer();