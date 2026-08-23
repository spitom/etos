<?php
/**
 * Front-page hero section.
 *
 * @package ETOS
 */

defined( 'ABSPATH' ) || exit;

$front_page_id = get_queried_object_id();

/**
 * Read front-page Hero field.
 *
 * ACF is preferred, with post meta fallback.
 *
 * @param string $name    Field name.
 * @param mixed  $default Default value.
 * @return mixed
 */
$get_hero_field = static function (
    $name,
    $default = ''
) use ( $front_page_id ) {
    $value = null;

    if ( function_exists( 'get_field' ) ) {
        $value = get_field(
            $name,
            $front_page_id
        );
    } elseif ( $front_page_id ) {
        $value = get_post_meta(
            $front_page_id,
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

$eyebrow = trim(
    (string) $get_hero_field(
        'etos_front_hero_eyebrow',
        'Autoryzowany partner ERP & IT'
    )
);

$title_1 = trim(
    (string) $get_hero_field(
        'etos_front_hero_title_1',
        'Łączymy procesy,'
    )
);

$title_2 = trim(
    (string) $get_hero_field(
        'etos_front_hero_title_2',
        'ludzi i technologię.'
    )
);

$lead = trim(
    (string) $get_hero_field(
        'etos_front_hero_lead',
        'Wdrażamy i utrzymujemy środowiska ERP, które wspierają sprzedaż, magazyn, finanse, KSeF, kadry i codzienną pracę Twojej firmy.'
    )
);

$prompt = trim(
    (string) $get_hero_field(
        'etos_front_hero_prompt',
        'Szukasz kompleksowych rozwiązań?'
    )
);

$cta = $get_hero_field(
    'etos_front_hero_cta',
    array()
);

$cta = is_array( $cta )
    ? $cta
    : array();

$cta_url = trim(
    (string) (
        $cta['url']
        ?? home_url( '/kontakt/' )
    )
);

$cta_title = trim(
    (string) (
        $cta['title']
        ?? 'Umów spotkanie'
    )
);

$cta_target = '_blank' === (
    $cta['target']
    ?? ''
)
    ? '_blank'
    : '';

$hero_image_id = (int) $get_hero_field(
    'etos_front_hero_image',
    0
);

$image_fit = (string) $get_hero_field(
    'etos_front_hero_image_fit',
    'cover'
);

if (
    ! in_array(
        $image_fit,
        array( 'cover', 'contain' ),
        true
    )
) {
    $image_fit = 'cover';
}

$image_scale = (int) $get_hero_field(
    'etos_front_hero_image_scale',
    100
);

$image_x = (int) $get_hero_field(
    'etos_front_hero_image_x',
    50
);

$image_y = (int) $get_hero_field(
    'etos_front_hero_image_y',
    50
);

$image_scale = min(
    150,
    max( 100, $image_scale )
);

$image_x = min(
    100,
    max( 0, $image_x )
);

$image_y = min(
    100,
    max( 0, $image_y )
);

$image_scale_css = number_format(
    $image_scale / 100,
    2,
    '.',
    ''
);

$image_style = sprintf(
    '--etos-hero-image-fit:%1$s;'
    . '--etos-hero-image-scale:%2$s;'
    . '--etos-hero-image-x:%3$d%%;'
    . '--etos-hero-image-y:%4$d%%;',
    $image_fit,
    $image_scale_css,
    $image_x,
    $image_y
);

$partners = array(
    array(
        'class' => 'symfonia',
        'file'  => 'symfonia.png',
        'alt'   => 'Symfonia',
    ),
    array(
        'class' => 'insert',
        'file'  => 'insert.png',
        'alt'   => 'InsERT',
    ),
    array(
        'class' => 'streamsoft',
        'file'  => 'streamsoft.webp',
        'alt'   => 'Streamsoft',
    ),
    array(
        'class' => 'posnet',
        'file'  => 'posnet.png',
        'alt'   => 'POSNET',
    ),
    array(
        'class' => 'certum',
        'file'  => 'certum.png',
        'alt'   => 'Certum',
    ),
);
?>

<section class="etos-hero">

    <div class="container etos-container">

        <div class="row align-items-center g-4 g-lg-5">

            <div class="col-lg-6">

                <div class="etos-hero__content">

                    <?php if ( '' !== $eyebrow ) : ?>

                        <span class="etos-kicker">
                            <?php echo esc_html( $eyebrow ); ?>
                        </span>

                    <?php endif; ?>

                    <h1 class="etos-hero__title">

                        <?php if ( '' !== $title_1 ) : ?>

                            <span class="etos-hero__title-line">
                                <?php echo esc_html(
                                    $title_1
                                ); ?>
                            </span>

                        <?php endif; ?>

                        <?php if ( '' !== $title_2 ) : ?>

                            <span class="etos-hero__title-line">
                                <?php echo esc_html(
                                    $title_2
                                ); ?>
                            </span>

                        <?php endif; ?>

                    </h1>

                    <?php if ( '' !== $lead ) : ?>

                        <p class="etos-hero__lead">
                            <?php echo esc_html(
                                $lead
                            ); ?>
                        </p>

                    <?php endif; ?>

                    <div class="etos-hero__conversion">

                        <?php if ( '' !== $prompt ) : ?>

                            <p class="etos-hero__prompt">
                                <?php echo esc_html(
                                    $prompt
                                ); ?>
                            </p>

                        <?php endif; ?>

                        <?php if (
                            '' !== $cta_url
                            && '' !== $cta_title
                        ) : ?>

                            <a
                                href="<?php echo esc_url(
                                    $cta_url
                                ); ?>"
                                class="btn etos-btn-primary"
                                <?php if ( $cta_target ) : ?>
                                    target="_blank"
                                    rel="noopener noreferrer"
                                <?php endif; ?>
                            >
                                <?php echo esc_html(
                                    $cta_title
                                ); ?>
                            </a>

                        <?php endif; ?>

                    </div>

                </div>

            </div>

            <div class="col-lg-6">

                <div class="etos-hero__media-wrap">

                    <div
                        class="etos-hero__pattern"
                        aria-hidden="true"
                    ></div>

                    <figure
                        class="<?php echo esc_attr(
                            $hero_image_id
                                ? 'etos-hero__media'
                                : 'etos-hero__media is-placeholder'
                        ); ?>"
                    >

                        <?php if ( $hero_image_id ) : ?>

                            <?php
                            echo wp_get_attachment_image(
                                $hero_image_id,
                                'large',
                                false,
                                array(
                                    'class'         => 'etos-hero__image',
                                    'loading'       => 'eager',
                                    'decoding'      => 'async',
                                    'fetchpriority' => 'high',
                                    'style'         => $image_style,
                                )
                            );
                            ?>

                        <?php else : ?>

                            <span
                                class="etos-hero__media-placeholder"
                                aria-hidden="true"
                            ></span>

                        <?php endif; ?>

                    </figure>

                </div>

            </div>

        </div>

        <div
            class="etos-hero__partners"
            role="list"
            aria-label="<?php esc_attr_e(
                'Partnerzy ETOS',
                'etos'
            ); ?>"
        >

            <?php foreach ( $partners as $partner ) : ?>

                <div
                    class="etos-hero-partner etos-hero-partner--<?php echo esc_attr(
                        $partner['class']
                    ); ?>"
                    role="listitem"
                >

                    <img
                        src="<?php echo esc_url(
                            get_stylesheet_directory_uri()
                            . '/assets/images/partners/'
                            . $partner['file']
                        ); ?>"
                        alt="<?php echo esc_attr(
                            $partner['alt']
                        ); ?>"
                        loading="lazy"
                    >

                </div>

            <?php endforeach; ?>

        </div>

    </div>

</section>