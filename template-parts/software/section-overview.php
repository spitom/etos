<?php
defined( 'ABSPATH' ) || exit;

$software = $args['software'] ?? array();
$overview = $software['overview'] ?? array();
?>

<section class="etos-section software-overview">
    <div class="container etos-container">
        <div class="row g-4 g-lg-5 align-items-start">
            <div class="col-lg-6">
                <?php if ( ! empty( $overview['kicker'] ) ) : ?>
                    <span class="etos-kicker"><?php echo esc_html( $overview['kicker'] ); ?></span>
                <?php endif; ?>

                <h2 class="etos-section__title">
                    <?php echo esc_html( $overview['title'] ?? '' ); ?>
                </h2>
            </div>

            <div class="col-lg-6">
                <?php if ( ! empty( $overview['lead'] ) ) : ?>
                    <p class="etos-section__lead">
                        <?php echo esc_html( $overview['lead'] ); ?>
                    </p>
                <?php endif; ?>

                <?php if ( ! empty( $overview['items'] ) ) : ?>
                    <ul class="software-checklist">
                        <?php foreach ( $overview['items'] as $item ) : ?>
                            <li><?php echo esc_html( $item ); ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>