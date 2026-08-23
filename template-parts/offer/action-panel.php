<?php
/**
 * Offer action panel.
 *
 * @package ETOS
 */

defined( 'ABSPATH' ) || exit;

$action = isset( $args['action'] )
    && is_array( $args['action'] )
        ? $args['action']
        : array();

$title = trim(
    (string) ( $action['title'] ?? '' )
);

$text = trim(
    (string) ( $action['text'] ?? '' )
);

$eyebrow = trim(
    (string) ( $action['eyebrow'] ?? '' )
);

$logo_id = (int) ( $action['logo_id'] ?? 0 );

$link = isset( $action['link'] )
    && is_array( $action['link'] )
        ? $action['link']
        : array();

if (
    '' === $title
    && '' === $text
    && ! $logo_id
    && empty( $link['url'] )
) {
    return;
}
?>

<section class="etos-offer-action">

    <div class="container etos-container">

        <div class="etos-offer-action__panel">

            <div class="etos-offer-action__content">

                <?php if ( $logo_id ) : ?>

                    <div class="etos-offer-action__logo">

                        <?php
                        echo wp_get_attachment_image(
                            $logo_id,
                            'medium',
                            false,
                            array(
                                'class'   => 'etos-offer-action__logo-image',
                                'loading' => 'lazy',
                            )
                        );
                        ?>

                    </div>

                <?php endif; ?>

                <?php if ( '' !== $eyebrow ) : ?>

                    <span class="etos-offer-section__eyebrow">
                        <?php echo esc_html( $eyebrow ); ?>
                    </span>

                <?php endif; ?>

                <?php if ( '' !== $title ) : ?>

                    <h2 class="etos-offer-action__title">
                        <?php echo esc_html( $title ); ?>
                    </h2>

                <?php endif; ?>

                <?php if ( '' !== $text ) : ?>

                    <div class="etos-offer-action__text">
                        <?php
                        echo wp_kses_post(
                            wpautop( $text )
                        );
                        ?>
                    </div>

                <?php endif; ?>

            </div>

            <?php if (
                ! empty( $link['url'] )
                && ! empty( $link['title'] )
            ) : ?>

                <div class="etos-offer-action__button">

                    <a
                        class="btn etos-btn-primary"
                        href="<?php echo esc_url(
                            $link['url']
                        ); ?>"
                    >
                        <?php echo esc_html(
                            $link['title']
                        ); ?>
                    </a>

                </div>

            <?php endif; ?>

        </div>

    </div>

</section>