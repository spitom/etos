<?php
defined( 'ABSPATH' ) || exit;

$module   = $args['module'] ?? array();
$software = $args['software'] ?? array();

if ( empty( $module ) ) {
    return;
}

$url   = $module['url'] ?? '#';
$title = $module['name'] ?? '';
$text  = $module['text'] ?? '';
$label = $software['name'] ?? '';
?>

<article
    id="<?php echo esc_attr( $module['id'] ?? '' ); ?>"
    class="software-module-card"
>
    <h3 class="software-module-card__title">
        <?php echo esc_html( $title ); ?>
    </h3>

    <?php if ( $text ) : ?>
        <p class="software-module-card__text">
            <?php echo esc_html( $text ); ?>
        </p>
    <?php endif; ?>

    <a
        href="<?php echo esc_url( $url ); ?>"
        class="software-module-card__link"
        aria-label="<?php echo esc_attr( 'Przejdź do modułu: ' . $title ); ?>"
    >
        <span aria-hidden="true">→</span>
    </a>
</article>