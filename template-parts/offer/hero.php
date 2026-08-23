<?php
/**
 * Shared offer landing hero.
 *
 * @package ETOS
 */

defined( 'ABSPATH' ) || exit;

$hero = isset( $args['hero'] )
    && is_array( $args['hero'] )
        ? $args['hero']
        : array();

$logo_id = (int) ( $hero['logo_id'] ?? 0 );

$partner_logo_id = (int) (
    $hero['partner_logo_id'] ?? 0
);

$image_id = (int) ( $hero['image_id'] ?? 0 );

$lead = trim(
    (string) ( $hero['lead'] ?? '' )
);

$links = array(
    array(
        'value' => $hero['primary_cta'] ?? array(),
        'class' => 'btn etos-btn-primary',
    ),
    array(
        'value' => $hero['secondary_cta'] ?? array(),
        'class' => 'btn btn-outline-primary',
    ),
);
?>

<header class="etos-offer-hero">

    <div class="container etos-container">

        <div class="row g-5 align-items-center">

            <div class="col-lg-6">

                <div class="etos-offer-hero__content">

                    <?php if ( $logo_id ) : ?>

                        <div class="etos-offer-hero__logo">

                            <?php
                            echo wp_get_attachment_image(
                                $logo_id,
                                'medium',
                                false,
                                array(
                                    'class'   => 'etos-offer-hero__logo-image',
                                    'loading' => 'eager',
                                )
                            );
                            ?>

                        </div>

                    <?php endif; ?>

                    <?php
                    the_title(
                        '<h1 class="etos-offer-hero__title">',
                        '</h1>'
                    );
                    ?>

                    <?php if ( '' !== $lead ) : ?>

                        <div class="etos-offer-hero__lead">
                            <?php
                            echo wp_kses_post(
                                wpautop( $lead )
                            );
                            ?>
                        </div>

                    <?php endif; ?>

                    <div class="etos-offer-hero__actions">

                        <div class="etos-offer-hero__buttons">

                            <?php foreach ( $links as $item ) : ?>
                                <?php
                                $link = is_array( $item['value'] )
                                    ? $item['value']
                                    : array();

                                if (
                                    empty( $link['url'] )
                                    || empty( $link['title'] )
                                ) {
                                    continue;
                                }

                                $target = $link['target'] ?? '';

                                $rel = '_blank' === $target
                                    ? 'noopener noreferrer'
                                    : '';
                                ?>

                                <a
                                    class="<?php echo esc_attr(
                                        $item['class']
                                    ); ?>"
                                    href="<?php echo esc_url(
                                        $link['url']
                                    ); ?>"
                                    <?php if ( $target ) : ?>
                                        target="<?php echo esc_attr(
                                            $target
                                        ); ?>"
                                    <?php endif; ?>
                                    <?php if ( $rel ) : ?>
                                        rel="<?php echo esc_attr(
                                            $rel
                                        ); ?>"
                                    <?php endif; ?>
                                >
                                    <?php echo esc_html(
                                        $link['title']
                                    ); ?>
                                </a>

                            <?php endforeach; ?>

                        </div>

                        <?php if ( $partner_logo_id ) : ?>

                            <div class="etos-offer-hero__partner">

                                <?php
                                echo wp_get_attachment_image(
                                    $partner_logo_id,
                                    'medium',
                                    false,
                                    array(
                                        'class'   => 'etos-offer-hero__partner-image',
                                        'loading' => 'eager',
                                    )
                                );
                                ?>

                            </div>

                        <?php endif; ?>

                    </div>

                </div>

            </div>

            <div class="col-lg-6">

                <div
                    class="etos-offer-hero__media"
                    style="
                        --etos-offer-image-fit: <?php echo esc_attr(
                            $hero['image_fit'] ?? 'cover'
                        ); ?>;
                        --etos-offer-image-scale: <?php echo esc_attr(
                            ( (int) ( $hero['image_scale'] ?? 100 ) ) / 100
                        ); ?>;
                        --etos-offer-image-x: <?php echo esc_attr(
                            (int) ( $hero['image_x'] ?? 50 )
                        ); ?>%;
                        --etos-offer-image-y: <?php echo esc_attr(
                            (int) ( $hero['image_y'] ?? 50 )
                        ); ?>%;
                    "
                >

                    <?php if ( $image_id ) : ?>

                        <?php
                        echo wp_get_attachment_image(
                            $image_id,
                            'large',
                            false,
                            array(
                                'class'         => 'etos-offer-hero__image',
                                'loading'       => 'eager',
                                'fetchpriority' => 'high',
                            )
                        );
                        ?>

                    <?php else : ?>

                        <div class="etos-offer-hero__placeholder"></div>

                    <?php endif; ?>

                </div>

            </div>

        </div>

    </div>

</header>