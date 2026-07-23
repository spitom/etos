<?php
/**
 * Structured ACF Pro sections for a software page.
 *
 * Expected repeater structure:
 *
 * Benefits:
 * - icon
 * - title
 * - text
 *
 * Features:
 * - eyebrow
 * - title
 * - text
 * - points: repeater with text
 * - image
 * - image_position: left or right
 * - link
 *
 * Addons:
 * - image
 * - title
 * - text
 * - link
 *
 * Packages:
 * - title
 * - badge
 * - text
 * - features: repeater with text
 * - link
 * - featured
 *
 * @package ETOS
 */

defined( 'ABSPATH' ) || exit;

$sections = isset( $args['sections'] )
    && is_array( $args['sections'] )
        ? $args['sections']
        : array();

$benefits = isset( $sections['benefits'] )
    && is_array( $sections['benefits'] )
        ? $sections['benefits']
        : array();

$features = isset( $sections['features'] )
    && is_array( $sections['features'] )
        ? $sections['features']
        : array();

$addons = isset( $sections['addons'] )
    && is_array( $sections['addons'] )
        ? $sections['addons']
        : array();

$packages = isset( $sections['packages'] )
    && is_array( $sections['packages'] )
        ? $sections['packages']
        : array();

if (
    empty( $benefits )
    && empty( $features )
    && empty( $addons )
    && empty( $packages )
) {
    return;
}

$post_id = get_the_ID();

/**
 * Normalize a repeater containing rows with a "text" subfield.
 *
 * @param mixed $items Repeater rows.
 * @return array
 */
$normalize_list = static function ( $items ) {
    if ( ! is_array( $items ) ) {
        return array();
    }

    $normalized = array();

    foreach ( $items as $item ) {
        $text = is_array( $item )
            ? ( $item['text'] ?? '' )
            : $item;

        $text = trim(
            wp_strip_all_tags(
                (string) $text
            )
        );

        if ( '' !== $text ) {
            $normalized[] = $text;
        }
    }

    return $normalized;
};

/**
 * Render a link when both its URL and label are available.
 *
 * @param mixed  $value Link field value.
 * @param string $class CSS class.
 */
$render_link = static function ( $value, $class = 'btn btn-outline-primary' ) {
    $link = etos_normalize_software_link( $value );

    if (
        empty( $link['url'] )
        || empty( $link['title'] )
    ) {
        return;
    }

    $rel = '_blank' === $link['target']
        ? 'noopener noreferrer'
        : '';
    ?>

    <a
        class="<?php echo esc_attr( $class ); ?>"
        href="<?php echo esc_url( $link['url'] ); ?>"
        <?php if ( $link['target'] ) : ?>
            target="<?php echo esc_attr( $link['target'] ); ?>"
        <?php endif; ?>
        <?php if ( $rel ) : ?>
            rel="<?php echo esc_attr( $rel ); ?>"
        <?php endif; ?>
    >
        <?php echo esc_html( $link['title'] ); ?>
    </a>

    <?php
};
?>

<div class="etos-product-sections">

    <?php if ( ! empty( $benefits ) ) : ?>

        <section
            class="etos-product-section etos-product-section--benefits"
            aria-labelledby="software-benefits-<?php echo esc_attr( $post_id ); ?>"
        >

            <div class="etos-product-section__header">

                <span class="etos-product-section__eyebrow">
                    <?php esc_html_e( 'Najważniejsze korzyści', 'etos' ); ?>
                </span>

                <h2
                    class="etos-product-section__title"
                    id="software-benefits-<?php echo esc_attr( $post_id ); ?>"
                >
                    <?php esc_html_e( 'Co zyskuje Twoja firma', 'etos' ); ?>
                </h2>

            </div>

            <div class="etos-product-grid etos-product-grid--benefits">

                <?php foreach ( $benefits as $index => $benefit ) : ?>
                    <?php
                    $title = trim(
                        (string) ( $benefit['title'] ?? '' )
                    );

                    $text = trim(
                        (string) ( $benefit['text'] ?? '' )
                    );

                    $icon_id = etos_get_software_image_id(
                        $benefit['icon'] ?? 0
                    );

                    if (
                        '' === $title
                        && '' === $text
                        && ! $icon_id
                    ) {
                        continue;
                    }
                    ?>

                    <article class="etos-product-card etos-product-card--benefit">

                        <div class="etos-product-card__icon">

                            <?php if ( $icon_id ) : ?>

                                <?php
                                echo wp_get_attachment_image(
                                    $icon_id,
                                    'thumbnail',
                                    false,
                                    array(
                                        'class'   => 'etos-product-card__icon-image',
                                        'loading' => 'lazy',
                                    )
                                );
                                ?>

                            <?php else : ?>

                                <span
                                    class="etos-product-card__number"
                                    aria-hidden="true"
                                >
                                    <?php
                                    echo esc_html(
                                        str_pad(
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

                        <?php if ( $title ) : ?>
                            <h3 class="etos-product-card__title">
                                <?php echo esc_html( $title ); ?>
                            </h3>
                        <?php endif; ?>

                        <?php if ( $text ) : ?>
                            <div class="etos-product-card__text">
                                <?php echo wp_kses_post( wpautop( $text ) ); ?>
                            </div>
                        <?php endif; ?>

                    </article>

                <?php endforeach; ?>

            </div>

        </section>

    <?php endif; ?>

    <?php foreach ( $features as $index => $feature ) : ?>
        <?php
        $eyebrow = trim(
            (string) ( $feature['eyebrow'] ?? '' )
        );

        $title = trim(
            (string) ( $feature['title'] ?? '' )
        );

        $text = trim(
            (string) ( $feature['text'] ?? '' )
        );

        $points = $normalize_list(
            $feature['points'] ?? array()
        );

        $image_id = etos_get_software_image_id(
            $feature['image'] ?? 0
        );

        $image_position = 'left' === (
            $feature['image_position'] ?? ''
        )
            ? 'left'
            : 'right';

        $link = $feature['link'] ?? array();

        if (
            '' === $title
            && '' === $text
            && empty( $points )
            && ! $image_id
            && ! etos_software_value_has_content( $link )
        ) {
            continue;
        }

        $feature_id = sprintf(
            'software-feature-%1$d-%2$d',
            $post_id,
            $index + 1
        );

        $feature_classes = array(
            'etos-product-feature',
            'etos-product-feature--media-' . $image_position,
        );

        if ( ! $image_id ) {
            $feature_classes[] = 'etos-product-feature--no-media';
        }
        ?>

        <section
            class="<?php echo esc_attr( implode( ' ', $feature_classes ) ); ?>"
            aria-labelledby="<?php echo esc_attr( $feature_id ); ?>"
        >

            <div class="etos-product-feature__content">

                <?php if ( $eyebrow ) : ?>
                    <span class="etos-product-section__eyebrow">
                        <?php echo esc_html( $eyebrow ); ?>
                    </span>
                <?php endif; ?>

                <?php if ( $title ) : ?>
                    <h2
                        class="etos-product-feature__title"
                        id="<?php echo esc_attr( $feature_id ); ?>"
                    >
                        <?php echo esc_html( $title ); ?>
                    </h2>
                <?php endif; ?>

                <?php if ( $text ) : ?>
                    <div class="etos-product-feature__text">
                        <?php echo wp_kses_post( wpautop( $text ) ); ?>
                    </div>
                <?php endif; ?>

                <?php if ( $points ) : ?>

                    <ul class="etos-product-feature__list">

                        <?php foreach ( $points as $point ) : ?>
                            <li><?php echo esc_html( $point ); ?></li>
                        <?php endforeach; ?>

                    </ul>

                <?php endif; ?>

                <?php
                $render_link(
                    $link,
                    'btn btn-outline-primary'
                );
                ?>

            </div>

            <?php if ( $image_id ) : ?>

                <div class="etos-product-feature__media">

                    <?php
                    echo wp_get_attachment_image(
                        $image_id,
                        'large',
                        false,
                        array(
                            'class'   => 'etos-product-feature__image',
                            'loading' => 'lazy',
                        )
                    );
                    ?>

                </div>

            <?php endif; ?>

        </section>

    <?php endforeach; ?>

    <?php if ( ! empty( $addons ) ) : ?>

        <section
            class="etos-product-section etos-product-section--addons"
            aria-labelledby="software-addons-<?php echo esc_attr( $post_id ); ?>"
        >

            <div class="etos-product-section__header">

                <span class="etos-product-section__eyebrow">
                    <?php esc_html_e( 'Rozszerz możliwości programu', 'etos' ); ?>
                </span>

                <h2
                    class="etos-product-section__title"
                    id="software-addons-<?php echo esc_attr( $post_id ); ?>"
                >
                    <?php esc_html_e( 'Rozwiązania dodatkowe', 'etos' ); ?>
                </h2>

            </div>

            <div class="etos-product-grid etos-product-grid--addons">

                <?php foreach ( $addons as $addon ) : ?>
                    <?php
                    $title = trim(
                        (string) ( $addon['title'] ?? '' )
                    );

                    $text = trim(
                        (string) ( $addon['text'] ?? '' )
                    );

                    $image_id = etos_get_software_image_id(
                        $addon['image'] ?? 0
                    );

                    $link = $addon['link'] ?? array();

                    if (
                        '' === $title
                        && '' === $text
                        && ! $image_id
                        && ! etos_software_value_has_content( $link )
                    ) {
                        continue;
                    }
                    ?>

                    <article class="etos-product-card etos-product-card--addon">

                        <?php if ( $image_id ) : ?>

                            <div class="etos-product-card__media">

                                <?php
                                echo wp_get_attachment_image(
                                    $image_id,
                                    'medium',
                                    false,
                                    array(
                                        'class'   => 'etos-product-card__image',
                                        'loading' => 'lazy',
                                    )
                                );
                                ?>

                            </div>

                        <?php endif; ?>

                        <div class="etos-product-card__body">

                            <?php if ( $title ) : ?>
                                <h3 class="etos-product-card__title">
                                    <?php echo esc_html( $title ); ?>
                                </h3>
                            <?php endif; ?>

                            <?php if ( $text ) : ?>
                                <div class="etos-product-card__text">
                                    <?php echo wp_kses_post( wpautop( $text ) ); ?>
                                </div>
                            <?php endif; ?>

                            <?php
                            $render_link(
                                $link,
                                'btn btn-link etos-product-card__link'
                            );
                            ?>

                        </div>

                    </article>

                <?php endforeach; ?>

            </div>

        </section>

    <?php endif; ?>

    <?php if ( ! empty( $packages ) ) : ?>

        <section
            class="etos-product-section etos-product-section--packages"
            aria-labelledby="software-packages-<?php echo esc_attr( $post_id ); ?>"
        >

            <div class="etos-product-section__header">

                <span class="etos-product-section__eyebrow">
                    <?php esc_html_e( 'Wybierz odpowiedni wariant', 'etos' ); ?>
                </span>

                <h2
                    class="etos-product-section__title"
                    id="software-packages-<?php echo esc_attr( $post_id ); ?>"
                >
                    <?php esc_html_e( 'Pakiety dopasowane do Twojej firmy', 'etos' ); ?>
                </h2>

            </div>

            <div class="etos-product-grid etos-product-grid--packages">

                <?php foreach ( $packages as $package ) : ?>
                    <?php
                    $title = trim(
                        (string) ( $package['title'] ?? '' )
                    );

                    $badge = trim(
                        (string) ( $package['badge'] ?? '' )
                    );

                    $text = trim(
                        (string) ( $package['text'] ?? '' )
                    );

                    $items = $normalize_list(
                        $package['features'] ?? array()
                    );

                    $link = $package['link'] ?? array();

                    $featured = ! empty(
                        $package['featured']
                    );

                    if (
                        '' === $title
                        && '' === $badge
                        && '' === $text
                        && empty( $items )
                        && ! etos_software_value_has_content( $link )
                    ) {
                        continue;
                    }

                    $package_classes = array(
                        'etos-product-card',
                        'etos-product-card--package',
                    );

                    if ( $featured ) {
                        $package_classes[] = 'is-featured';
                    }
                    ?>

                    <article class="<?php echo esc_attr( implode( ' ', $package_classes ) ); ?>">

                        <?php if ( $badge ) : ?>
                            <span class="etos-product-card__badge">
                                <?php echo esc_html( $badge ); ?>
                            </span>
                        <?php endif; ?>

                        <?php if ( $title ) : ?>
                            <h3 class="etos-product-card__title">
                                <?php echo esc_html( $title ); ?>
                            </h3>
                        <?php endif; ?>

                        <?php if ( $text ) : ?>
                            <div class="etos-product-card__text">
                                <?php echo wp_kses_post( wpautop( $text ) ); ?>
                            </div>
                        <?php endif; ?>

                        <?php if ( $items ) : ?>

                            <ul class="etos-product-card__list">

                                <?php foreach ( $items as $item ) : ?>
                                    <li><?php echo esc_html( $item ); ?></li>
                                <?php endforeach; ?>

                            </ul>

                        <?php endif; ?>

                        <?php
                        $render_link(
                            $link,
                            $featured
                                ? 'btn btn-primary'
                                : 'btn btn-outline-primary'
                        );
                        ?>

                    </article>

                <?php endforeach; ?>

            </div>

        </section>

    <?php endif; ?>

</div>