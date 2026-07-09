<?php
defined( 'ABSPATH' ) || exit;

$cta = wp_parse_args(
    $args['cta'] ?? array(),
    array(
        'eyebrow' => 'Rozpocznij rozmowę o wdrożeniu',
        'title'   => 'Sprawdź, jak uporządkować procesy w Twojej firmie.',
        'text'    => 'Porozmawiaj z konsultantem ETOS o systemach ERP, infrastrukturze IT, integracjach i wsparciu.',
        'button'  => 'Umów konsultację',
        'url'     => '/kontakt/',
        'class'   => '',
    )
);
?>

<div class="etos-cta-panel <?php echo esc_attr( $cta['class'] ); ?>">
    <div class="row align-items-center g-4">
        <div class="col-lg-7">
            <?php if ( $cta['eyebrow'] ) : ?>
                <span class="etos-cta-panel__eyebrow">
                    <?php echo esc_html( $cta['eyebrow'] ); ?>
                </span>
            <?php endif; ?>

            <h2><?php echo esc_html( $cta['title'] ); ?></h2>

            <?php if ( $cta['text'] ) : ?>
                <p><?php echo esc_html( $cta['text'] ); ?></p>
            <?php endif; ?>
        </div>

        <div class="col-lg-5 text-lg-end">
            <a href="<?php echo esc_url( $cta['url'] ); ?>" class="btn etos-btn-primary">
                <?php echo esc_html( $cta['button'] ); ?>
            </a>
        </div>
    </div>
</div>