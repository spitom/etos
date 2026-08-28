<?php
/**
 * Shared offer cards section.
 *
 * @package ETOS
 */

defined( 'ABSPATH' ) || exit;

$cards = isset( $args['cards'] )
    && is_array( $args['cards'] )
        ? $args['cards']
        : array();

$title = trim(
    (string) ( $args['title'] ?? '' )
);

$intro = trim(
    (string) ( $args['intro'] ?? '' )
);

$eyebrow = trim(
    (string) ( $args['eyebrow'] ?? '' )
);

$modifier = sanitize_html_class(
    (string) ( $args['modifier'] ?? 'section' )
);

$style = 'steps' === ( $args['style'] ?? '' )
    ? 'steps'
    : 'cards';

$cards = array_values(
    array_filter(
        $cards,
        static function ( $card ) {
            if ( ! is_array( $card ) ) {
                return false;
            }

            return ! empty( $card['icon'] )
                || ! empty( $card['number'] )
                || ! empty( $card['title'] )
                || ! empty( $card['text'] )
                || ! empty( $card['link'] );
        }
    )
);

if (
    empty( $cards )
    && '' === $title
    && '' === $intro
) {
    return;
}

$count = count( $cards );

if ( $count <= 4 ) {
    $columns = max( 1, $count );
} elseif ( $count <= 6 ) {
    $columns = 3;
} else {
    $columns = 4;
}
?>

<section
    class="etos-offer-section etos-offer-section--<?php echo esc_attr(
        $modifier
    ); ?> etos-offer-section--<?php echo esc_attr( $style ); ?>"
>

    <div class="container etos-container">

        <?php if (
            '' !== $eyebrow
            || '' !== $title
            || '' !== $intro
        ) : ?>

            <header class="etos-offer-section__header">

                <?php if ( '' !== $eyebrow ) : ?>

                    <span class="etos-offer-section__eyebrow">
                        <?php echo esc_html( $eyebrow ); ?>
                    </span>

                <?php endif; ?>

                <?php if ( '' !== $title ) : ?>

                    <h2 class="etos-offer-section__title">
                        <?php echo esc_html( $title ); ?>
                    </h2>

                <?php endif; ?>

                <?php if ( '' !== $intro ) : ?>

                    <div class="etos-offer-section__intro">
                        <?php
                        echo wp_kses_post(
                            wpautop( $intro )
                        );
                        ?>
                    </div>

                <?php endif; ?>

            </header>

        <?php endif; ?>

        <?php if ( $cards ) : ?>

            <div
                class="etos-offer-grid etos-offer-grid--cols-<?php echo esc_attr(
                    $columns
                ); ?>"
            >

                <?php foreach ( $cards as $index => $card ) : ?>
                    <?php
                    $icon_id = (int) (
                        $card['icon'] ?? 0
                    );

                    $number = trim(
                        (string) (
                            $card['number'] ?? ''
                        )
                    );

                    $card_title = trim(
                        (string) (
                            $card['title'] ?? ''
                        )
                    );

                    $card_text = trim(
                        (string) (
                            $card['text'] ?? ''
                        )
                    );

                    // ETOS OFFER SYSTEM ICON START
                    $system_icon_key = sanitize_key(
                        (string) (
                            $card['system_icon'] ?? ''
                        )
                    );

                    if (
                        '' === $system_icon_key
                        && 'primary' === $modifier
                        && function_exists(
                            'etos_get_offer_icon_key_for_content'
                        )
                    ) {
                        $system_icon_key = sanitize_key(
                            (string) etos_get_offer_icon_key_for_content(
                                $card_title,
                                $card_text
                            )
                        );
                    }

                    $has_system_icon =
                        ! $icon_id
                        && 'primary' === $modifier
                        && '' !== $system_icon_key
                        && function_exists(
                            'etos_get_icon_badge'
                        );
                    // ETOS OFFER SYSTEM ICON END
                    $link = isset( $card['link'] )
                        && is_array( $card['link'] )
                            ? $card['link']
                            : array();

                    $featured = ! empty(
                        $card['featured']
                    );

                    $classes = array(
                        'etos-offer-card',
                        'etos-offer-card--' . $style,
                    );

                    if ( $featured ) {
                        $classes[] = 'is-featured';
                    }
                    ?>

                    <article
                        class="<?php echo esc_attr(
                            implode( ' ', $classes )
                        ); ?>"
                    >

                        <div
                            class="<?php echo esc_attr(
                                $has_system_icon
                                    ? 'etos-offer-card__marker etos-offer-card__marker--system-icon'
                                    : 'etos-offer-card__marker'
                            ); ?>"
                        >

                            <?php if ( $icon_id ) : ?>

                                <?php
                                echo wp_get_attachment_image(
                                    $icon_id,
                                    'thumbnail',
                                    false,
                                    array(
                                        'class'   => 'etos-offer-card__icon',
                                        'loading' => 'lazy',
                                    )
                                );
                                ?>

                            <?php elseif ( $has_system_icon ) : ?>

                                <?php
                                echo etos_get_icon_badge(
                                    $system_icon_key,
                                    array(
                                        'size' => 'sm',
                                    )
                                );
                                ?>
                            <?php else : ?>

                                <span aria-hidden="true">
                                    <?php
                                    echo esc_html(
                                        $number
                                        ?: str_pad(
                                            (string) ( $index + 1 ),
                                            2,
                                            '0',
                                            STR_PAD_LEFT
                                        )
                                    );
                                    ?>
                                </span>

                            <?php endif; ?>

                        </div>

                        <?php if ( '' !== $card_title ) : ?>

                            <h3 class="etos-offer-card__title">
                                <?php echo esc_html(
                                    $card_title
                                ); ?>
                            </h3>

                        <?php endif; ?>

                        <?php if ( '' !== $card_text ) : ?>

                            <div class="etos-offer-card__text">
                                <?php
                                echo wp_kses_post(
                                    wpautop( $card_text )
                                );
                                ?>
                            </div>

                        <?php endif; ?>

                        <?php if (
                            ! empty( $link['url'] )
                            && ! empty( $link['title'] )
                        ) : ?>

                            <a
                                class="etos-offer-card__link"
                                href="<?php echo esc_url(
                                    $link['url']
                                ); ?>"
                            >
                                <?php echo esc_html(
                                    $link['title']
                                ); ?>
                            </a>

                        <?php endif; ?>

                    </article>

                <?php endforeach; ?>

            </div>

        <?php endif; ?>

    </div>

</section>