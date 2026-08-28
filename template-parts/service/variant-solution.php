<?php
/**
 * Solution-style service content.
 *
 * Used by implementation, infrastructure and similar services.
 *
 * @package ETOS
 */

defined( 'ABSPATH' ) || exit;

$data = is_array( $args['data'] ?? null )
    ? $args['data']
    : array();

$reasons  = is_array( $data['reasons'] ?? null )
    ? $data['reasons']
    : array();

$access   = is_array( $data['access'] ?? null )
    ? $data['access']
    : array();

$benefits = is_array( $data['benefits'] ?? null )
    ? $data['benefits']
    : array();

/**
 * Read a value from one repeater row.
 *
 * @param array  $row     Repeater row.
 * @param string $key     Field key.
 * @param mixed  $default Default value.
 * @return mixed
 */
$get_row_value = static function (
    $row,
    $key,
    $default = ''
) {
    if ( ! is_array( $row ) || ! array_key_exists( $key, $row ) ) {
        return $default;
    }

    return $row[ $key ];
};

/**
 * Resolve a system icon selected in ACF.
 *
 * "auto" and an empty value fall back to title matching.
 *
 * @param array  $row       Repeater row.
 * @param string $field_key System icon field.
 * @param string $title     Card title.
 * @return string
 */
$resolve_system_icon_key = static function (
    $row,
    $field_key,
    $title,
    $text = ''
) use ( $get_row_value ) {
    $selected = sanitize_key(
        (string) $get_row_value(
            $row,
            $field_key
        )
    );

    if (
        '' !== $selected
        && 'auto' !== $selected
    ) {
        return $selected;
    }

    return etos_get_service_icon_key_for_content(
        $title,
        $text
    );
};

/**
 * Check whether a repeater row contains visible content.
 *
 * @param array  $row        Repeater row.
 * @param string $title_key  Title field.
 * @param string $text_key   Text field.
 * @return bool
 */
$row_has_content = static function (
    $row,
    $title_key,
    $text_key
) use ( $get_row_value ) {
    return ''
        !== trim(
            (string) $get_row_value(
                $row,
                $title_key
            )
        )
        || ''
        !== trim(
            (string) $get_row_value(
                $row,
                $text_key
            )
        );
};

$reasons = array_values(
    array_filter(
        $reasons,
        static function ( $row ) use ( $row_has_content ) {
            return $row_has_content(
                $row,
                'etos_service_reason_title',
                'etos_service_reason_text'
            );
        }
    )
);

$access = array_values(
    array_filter(
        $access,
        static function ( $row ) use ( $row_has_content ) {
            return $row_has_content(
                $row,
                'etos_service_access_title',
                'etos_service_access_text'
            );
        }
    )
);

$benefits = array_values(
    array_filter(
        $benefits,
        static function ( $row ) use ( $row_has_content ) {
            return $row_has_content(
                $row,
                'etos_service_benefit_title',
                'etos_service_benefit_text'
            );
        }
    )
);

$editor_content = (string) get_post_field(
    'post_content',
    get_the_ID()
);

$has_editor_content = ''
    !== trim(
        wp_strip_all_tags(
            strip_shortcodes( $editor_content )
        )
    );
?>

<?php if ( $reasons ) : ?>

    <section
        class="etos-service-section etos-service-section--reasons"
        aria-labelledby="etos-service-reasons-title"
    >

        <div class="container etos-container">

            <header class="etos-service-section__header">

                <span class="etos-kicker">
                    <?php esc_html_e(
                        'Kompetencje i doświadczenie',
                        'etos'
                    ); ?>
                </span>

                <h2 id="etos-service-reasons-title">
                    <?php echo esc_html(
                        $data['reasons_heading']
                        ?? ''
                    ); ?>
                </h2>

            </header>

            <div class="etos-service-grid etos-service-grid--reasons">

                <?php foreach ( $reasons as $row ) : ?>
                    <?php
                    $icon_id = absint(
                        $get_row_value(
                            $row,
                            'etos_service_reason_icon'
                        )
                    );

                    $title = trim(
                        (string) $get_row_value(
                            $row,
                            'etos_service_reason_title'
                        )
                    );

                    $text = trim(
                        (string) $get_row_value(
                            $row,
                            'etos_service_reason_text'
                        )
                    );
                    ?>

                    <article class="etos-service-card etos-service-card--reason">

                        <?php
                        $icon_key = $resolve_system_icon_key(
                            $row,
                            'etos_service_reason_system_icon',
                            $title,
                            $text
                        );

                        echo etos_get_icon_badge(
                            $icon_key,
                            array(
                                'image_id' => $icon_id,
                                'size'     => 'sm',
                                'class'    => 'etos-service-card__icon',
                            )
                        ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                        ?>

                        <?php if ( $title ) : ?>

                            <h3><?php echo esc_html( $title ); ?></h3>

                        <?php endif; ?>

                        <?php if ( $text ) : ?>

                            <p><?php echo esc_html( $text ); ?></p>

                        <?php endif; ?>

                    </article>

                <?php endforeach; ?>

            </div>

        </div>

    </section>

<?php endif; ?>

<?php if ( $access ) : ?>

    <section
        class="etos-service-section etos-service-section--access"
        aria-labelledby="etos-service-access-title"
    >

        <div class="container etos-container">

            <header class="etos-service-section__header">

                <span class="etos-kicker">
                    <?php esc_html_e(
                        'Sposób współpracy',
                        'etos'
                    ); ?>
                </span>

                <h2 id="etos-service-access-title">
                    <?php echo esc_html(
                        $data['access_heading']
                        ?? ''
                    ); ?>
                </h2>

            </header>

            <div class="etos-service-grid etos-service-grid--access">

                <?php foreach ( $access as $row ) : ?>
                    <?php
                    $icon_id = absint(
                        $get_row_value(
                            $row,
                            'etos_service_access_icon'
                        )
                    );

                    $title = trim(
                        (string) $get_row_value(
                            $row,
                            'etos_service_access_title'
                        )
                    );

                    $text = trim(
                        (string) $get_row_value(
                            $row,
                            'etos_service_access_text'
                        )
                    );
                    ?>

                    <article class="etos-service-card etos-service-card--access">

                        <?php
                        $icon_key = $resolve_system_icon_key(
                            $row,
                            'etos_service_access_system_icon',
                            $title,
                            $text
                        );

                        echo etos_get_icon_badge(
                            $icon_key,
                            array(
                                'image_id' => $icon_id,
                                'size'     => 'sm',
                                'class'    => 'etos-service-card__icon',
                            )
                        ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                        ?>

                        <div>

                            <?php if ( $title ) : ?>

                                <h3><?php echo esc_html( $title ); ?></h3>

                            <?php endif; ?>

                            <?php if ( $text ) : ?>

                                <p><?php echo esc_html( $text ); ?></p>

                            <?php endif; ?>

                        </div>

                    </article>

                <?php endforeach; ?>

            </div>

        </div>

    </section>

<?php endif; ?>

<?php if ( $benefits ) : ?>

    <section
        class="etos-service-section etos-service-section--benefits"
        aria-labelledby="etos-service-benefits-title"
    >

        <div class="container etos-container">

            <header class="etos-service-section__header">

                <span class="etos-kicker">
                    <?php esc_html_e(
                        'Efekty dla firmy',
                        'etos'
                    ); ?>
                </span>

                <h2 id="etos-service-benefits-title">
                    <?php echo esc_html(
                        $data['benefits_heading']
                        ?? ''
                    ); ?>
                </h2>

            </header>

            <div class="etos-service-grid etos-service-grid--benefits">

                <?php foreach ( $benefits as $row ) : ?>
                    <?php
                    $icon_id = absint(
                        $get_row_value(
                            $row,
                            'etos_service_benefit_icon'
                        )
                    );

                    $title = trim(
                        (string) $get_row_value(
                            $row,
                            'etos_service_benefit_title'
                        )
                    );

                    $text = trim(
                        (string) $get_row_value(
                            $row,
                            'etos_service_benefit_text'
                        )
                    );
                    ?>

                    <article class="etos-service-card etos-service-card--benefit">

                        <?php
                        $icon_key = $resolve_system_icon_key(
                            $row,
                            'etos_service_benefit_system_icon',
                            $title,
                            $text
                        );

                        echo etos_get_icon_badge(
                            $icon_key,
                            array(
                                'image_id' => $icon_id,
                                'size'     => 'sm',
                                'class'    => 'etos-service-card__icon',
                            )
                        ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                        ?>

                        <?php if ( $title ) : ?>

                            <h3><?php echo esc_html( $title ); ?></h3>

                        <?php endif; ?>

                        <?php if ( $text ) : ?>

                            <p><?php echo esc_html( $text ); ?></p>

                        <?php endif; ?>

                    </article>

                <?php endforeach; ?>

            </div>

        </div>

    </section>

<?php endif; ?>

<?php if ( $has_editor_content ) : ?>

    <section class="etos-service-editor-content">

        <div class="container etos-container">

            <div class="etos-service-editor-content__inner">
                <?php
                echo apply_filters(
                    'the_content',
                    $editor_content
                );
                ?>
            </div>

        </div>

    </section>

<?php endif; ?>