<?php
defined( 'ABSPATH' ) || exit;

$kicker  = $args['kicker'] ?? '';
$title   = $args['title'] ?? get_the_title();
$lead    = $args['lead'] ?? '';
$actions = $args['actions'] ?? array();
?>

<section class="etos-page-hero etos-page-hero--text">
    <div class="container etos-container">
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
                           class="<?php echo esc_attr( $action['class'] ?? 'btn etos-btn-primary' ); ?>">
                            <?php echo esc_html( $action['label'] ); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

        </div>
    </div>
</section>