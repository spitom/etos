<?php
/**
 * Single-service hero.
 *
 * @package ETOS
 */

defined( 'ABSPATH' ) || exit;

$post_id     = absint( $args['post_id'] ?? 0 );
$kicker      = trim( (string) ( $args['kicker'] ?? '' ) );
$title       = trim( (string) ( $args['title'] ?? '' ) );
$lead        = trim( (string) ( $args['lead'] ?? '' ) );
$image_id    = absint( $args['image_id'] ?? 0 );
$image_style = (string) ( $args['image_style'] ?? '' );
$primary_cta = is_array( $args['primary_cta'] ?? null )
    ? $args['primary_cta']
    : array();
?>

<section
    class="etos-service-hero"
    aria-labelledby="etos-service-title"
>

    <div class="container etos-container">

        <div class="etos-service-hero__grid">

            <div class="etos-service-hero__content">

                <?php if ( $kicker ) : ?>

                    <span class="etos-kicker">
                        <?php echo esc_html( $kicker ); ?>
                    </span>

                <?php endif; ?>

                <h1
                    class="etos-service-hero__title"
                    id="etos-service-title"
                >
                    <?php echo esc_html( $title ); ?>
                </h1>

                <?php if ( $lead ) : ?>

                    <p class="etos-service-hero__lead">
                        <?php echo esc_html( $lead ); ?>
                    </p>

                <?php endif; ?>

                <?php
                if (
                    ! empty( $primary_cta['url'] )
                    && ! empty( $primary_cta['title'] )
                ) :
                    ?>

                    <a
                        class="btn etos-btn-primary etos-service-hero__button"
                        href="<?php echo esc_url(
                            $primary_cta['url']
                        ); ?>"
                        <?php
                        if (
                            '_blank'
                            === ( $primary_cta['target'] ?? '' )
                        ) :
                            ?>
                            target="_blank"
                            rel="noopener noreferrer"
                        <?php endif; ?>
                    >
                        <?php echo esc_html(
                            $primary_cta['title']
                        ); ?>
                    </a>

                <?php endif; ?>

            </div>

            <div class="etos-service-hero__visual">

                <?php if ( $image_id ) : ?>

                    <?php
                    echo wp_get_attachment_image(
                        $image_id,
                        'large',
                        false,
                        array(
                            'class'    => 'etos-service-hero__image',
                            'loading'  => 'eager',
                            'decoding' => 'async',
                            'style'    => $image_style,
                        )
                    );
                    ?>

                <?php else : ?>

                    <div
                        class="etos-service-hero__placeholder"
                        aria-hidden="true"
                    >
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>

                <?php endif; ?>

            </div>

        </div>

    </div>

</section>