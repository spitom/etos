<?php
defined( 'ABSPATH' ) || exit;

$kicker  = $args['kicker'] ?? '';
$title   = $args['title'] ?? get_the_title();
$lead    = $args['lead'] ?? '';
$actions = $args['actions'] ?? array();

$image_id  = $args['image_id'] ?? 0;
$image_url = $args['image_url'] ?? '';
$image_alt = $args['image_alt'] ?? '';
?>

<section class="etos-page-hero etos-page-hero--media">
    <div class="container etos-container">
        <div class="row g-4 g-lg-5 align-items-center">

            <div class="col-lg-6">
                <div class="etos-page-hero__content">

                    <?php if ( $kicker ) : ?>
                        <span class="etos-kicker"><?php echo esc_html( $kicker ); ?></span>
                    <?php endif; ?>

                    <h1 class="etos-page-hero__title">
                        <?php echo esc_html( $title ); ?>
                    </h1>

                    <?php if ( $lead ) : ?>
                        <p class="etos-page-hero__lead">
                            <?php echo esc_html( $lead ); ?>
                        </p>
                    <?php endif; ?>

                    <?php if ( ! empty( $actions ) ) : ?>
                        <div class="etos-page-hero__actions">
                            <?php foreach ( $actions as $action ) : ?>
                                <a href="<?php echo esc_url( $action['url'] ); ?>"
                                   class="<?php echo esc_attr( $action['class'] ?? 'btn btn-primary' ); ?>">
                                    <?php echo esc_html( $action['label'] ); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                </div>
            </div>

            <div class="col-lg-6">
                <figure class="etos-page-hero__media">
                    <?php
                    if ( $image_id ) {
                        echo wp_get_attachment_image(
                            $image_id,
                            'large',
                            false,
                            array(
                                'class' => 'img-fluid',
                                'alt'   => $image_alt,
                            )
                        );
                    } elseif ( $image_url ) {
                        ?>
                        <img src="<?php echo esc_url( $image_url ); ?>"
                             alt="<?php echo esc_attr( $image_alt ); ?>"
                             class="img-fluid">
                        <?php
                    }
                    ?>
                </figure>
            </div>

        </div>
    </div>
</section>