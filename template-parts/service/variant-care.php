<?php
/**
 * Care-style service content.
 *
 * Used by service care and maintenance offers.
 *
 * @package ETOS
 */

defined( 'ABSPATH' ) || exit;

$data = is_array( $args['data'] ?? null )
    ? $args['data']
    : array();

/**
 * Read one repeater value.
 *
 * @param array  $row     Repeater row.
 * @param string $key     Field name.
 * @param mixed  $default Default value.
 * @return mixed
 */
$get_value = static function (
    $row,
    $key,
    $default = ''
) {
    if (
        ! is_array( $row )
        || ! array_key_exists( $key, $row )
    ) {
        return $default;
    }

    return $row[ $key ];
};

/**
 * Convert a multiline field into an array.
 *
 * @param mixed $value Multiline field.
 * @return array
 */
$get_lines = static function ( $value ) {
    $lines = preg_split(
        '/\r\n|\r|\n/',
        (string) $value
    );

    return array_values(
        array_filter(
            array_map(
                'trim',
                is_array( $lines )
                    ? $lines
                    : array()
            ),
            static function ( $line ) {
                return '' !== $line;
            }
        )
    );
};

/**
 * Normalize an ACF link field.
 *
 * @param mixed $value Link value.
 * @return array
 */
$normalize_link = static function ( $value ) {
    $value = is_array( $value )
        ? $value
        : array();

    return array(
        'url' => trim(
            (string) ( $value['url'] ?? '' )
        ),
        'title' => trim(
            (string) ( $value['title'] ?? '' )
        ),
        'target' => '_blank'
            === ( $value['target'] ?? '' )
                ? '_blank'
                : '',
    );
};

$modes = is_array( $data['modes'] ?? null )
    ? $data['modes']
    : array();

$comparison = is_array( $data['comparison'] ?? null )
    ? $data['comparison']
    : array();

$recommendations = is_array(
    $data['recommendations'] ?? null
)
    ? $data['recommendations']
    : array();

$stats = is_array( $data['stats'] ?? null )
    ? $data['stats']
    : array();

$paths = is_array( $data['paths'] ?? null )
    ? $data['paths']
    : array();

$modes = array_values(
    array_filter(
        $modes,
        static function ( $row ) use ( $get_value ) {
            return ''
                !== trim(
                    (string) $get_value(
                        $row,
                        'etos_service_care_mode_title'
                    )
                );
        }
    )
);

$comparison = array_values(
    array_filter(
        $comparison,
        static function ( $row ) use ( $get_value ) {
            return ''
                !== trim(
                    (string) $get_value(
                        $row,
                        'etos_service_care_comparison_area'
                    )
                );
        }
    )
);

$recommendations = array_values(
    array_filter(
        $recommendations,
        static function ( $row ) use ( $get_value ) {
            return ''
                !== trim(
                    (string) $get_value(
                        $row,
                        'etos_service_care_recommendation_title'
                    )
                );
        }
    )
);

$stats = array_values(
    array_filter(
        $stats,
        static function ( $row ) use ( $get_value ) {
            return ''
                !== trim(
                    (string) $get_value(
                        $row,
                        'etos_service_care_stat_label'
                    )
                );
        }
    )
);

$paths = array_values(
    array_filter(
        $paths,
        static function ( $row ) use ( $get_value ) {
            return ''
                !== trim(
                    (string) $get_value(
                        $row,
                        'etos_service_care_path_title'
                    )
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

<?php if ( $modes ) : ?>

    <section
        class="etos-care-section etos-care-section--modes"
        aria-labelledby="etos-care-modes-title"
    >

        <div class="container etos-container">

            <header class="etos-care-section__header">

                <span class="etos-kicker">
                    <?php esc_html_e(
                        'Elastyczne wsparcie',
                        'etos'
                    ); ?>
                </span>

                <h2 id="etos-care-modes-title">
                    <?php echo esc_html(
                        $data['modes_heading'] ?? ''
                    ); ?>
                </h2>

                <?php if ( ! empty( $data['modes_intro'] ) ) : ?>

                    <p>
                        <?php echo esc_html(
                            $data['modes_intro']
                        ); ?>
                    </p>

                <?php endif; ?>

            </header>

            <div class="etos-care-modes">

                <?php foreach ( $modes as $mode ) : ?>
                    <?php
                    $icon_id = absint(
                        $get_value(
                            $mode,
                            'etos_service_care_mode_icon'
                        )
                    );

                    $eyebrow = trim(
                        (string) $get_value(
                            $mode,
                            'etos_service_care_mode_eyebrow'
                        )
                    );

                    $title = trim(
                        (string) $get_value(
                            $mode,
                            'etos_service_care_mode_title'
                        )
                    );

                    $text = trim(
                        (string) $get_value(
                            $mode,
                            'etos_service_care_mode_text'
                        )
                    );

                    $best_for = trim(
                        (string) $get_value(
                            $mode,
                            'etos_service_care_mode_best_for'
                        )
                    );

                    $points = $get_lines(
                        $get_value(
                            $mode,
                            'etos_service_care_mode_points'
                        )
                    );

                    $is_highlighted = (bool) $get_value(
                        $mode,
                        'etos_service_care_mode_highlighted'
                    );

                    $classes = array(
                        'etos-care-mode',
                    );

                    if ( $is_highlighted ) {
                        $classes[] = 'is-highlighted';
                    }
                    ?>

                    <article class="<?php echo esc_attr(
                        implode( ' ', $classes )
                    ); ?>">

                        <div
                            class="etos-care-mode__icon"
                            aria-hidden="true"
                        >
                            <?php
                            if ( $icon_id ) {
                                echo wp_get_attachment_image(
                                    $icon_id,
                                    'thumbnail',
                                    false,
                                    array(
                                        'alt' => '',
                                        'loading' => 'lazy',
                                    )
                                );
                            } else {
                                echo '<span></span>';
                            }
                            ?>
                        </div>

                        <?php if ( $eyebrow ) : ?>

                            <span class="etos-care-mode__eyebrow">
                                <?php echo esc_html( $eyebrow ); ?>
                            </span>

                        <?php endif; ?>

                        <h3><?php echo esc_html( $title ); ?></h3>

                        <?php if ( $text ) : ?>

                            <p><?php echo esc_html( $text ); ?></p>

                        <?php endif; ?>

                        <?php if ( $best_for ) : ?>

                            <div class="etos-care-mode__best-for">
                                <strong>
                                    <?php esc_html_e(
                                        'Najlepsza dla',
                                        'etos'
                                    ); ?>
                                </strong>

                                <span>
                                    <?php echo esc_html(
                                        $best_for
                                    ); ?>
                                </span>
                            </div>

                        <?php endif; ?>

                        <?php if ( $points ) : ?>

                            <ul>
                                <?php foreach ( $points as $point ) : ?>
                                    <li><?php echo esc_html( $point ); ?></li>
                                <?php endforeach; ?>
                            </ul>

                        <?php endif; ?>

                    </article>

                <?php endforeach; ?>

            </div>

        </div>

    </section>

<?php endif; ?>

<?php if ( $comparison ) : ?>

    <section
        class="etos-care-section etos-care-section--comparison"
        aria-labelledby="etos-care-comparison-title"
    >

        <div class="container etos-container">

            <header class="etos-care-section__header">

                <span class="etos-kicker">
                    <?php esc_html_e(
                        'Porównanie',
                        'etos'
                    ); ?>
                </span>

                <h2 id="etos-care-comparison-title">
                    <?php echo esc_html(
                        $data['comparison_heading'] ?? ''
                    ); ?>
                </h2>

                <?php if ( ! empty( $data['comparison_intro'] ) ) : ?>

                    <p>
                        <?php echo esc_html(
                            $data['comparison_intro']
                        ); ?>
                    </p>

                <?php endif; ?>

            </header>

            <div class="etos-care-comparison__desktop">

                <table class="etos-care-comparison">

                    <thead>
                        <tr>
                            <th scope="col">
                                <?php esc_html_e(
                                    'Obszar',
                                    'etos'
                                ); ?>
                            </th>
                            <th scope="col">
                                <?php esc_html_e(
                                    'Opieka incydentalna',
                                    'etos'
                                ); ?>
                            </th>
                            <th scope="col">
                                <?php esc_html_e(
                                    'Stała umowa serwisowa',
                                    'etos'
                                ); ?>
                            </th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php foreach ( $comparison as $row ) : ?>

                            <tr>
                                <th scope="row">
                                    <?php echo esc_html(
                                        $get_value(
                                            $row,
                                            'etos_service_care_comparison_area'
                                        )
                                    ); ?>
                                </th>
                                <td>
                                    <?php echo esc_html(
                                        $get_value(
                                            $row,
                                            'etos_service_care_comparison_incident'
                                        )
                                    ); ?>
                                </td>
                                <td>
                                    <?php echo esc_html(
                                        $get_value(
                                            $row,
                                            'etos_service_care_comparison_contract'
                                        )
                                    ); ?>
                                </td>
                            </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

            <div class="etos-care-comparison__mobile">

                <?php foreach ( $comparison as $row ) : ?>

                    <article class="etos-care-comparison-card">

                        <h3>
                            <?php echo esc_html(
                                $get_value(
                                    $row,
                                    'etos_service_care_comparison_area'
                                )
                            ); ?>
                        </h3>

                        <div>
                            <strong>
                                <?php esc_html_e(
                                    'Opieka incydentalna',
                                    'etos'
                                ); ?>
                            </strong>

                            <p>
                                <?php echo esc_html(
                                    $get_value(
                                        $row,
                                        'etos_service_care_comparison_incident'
                                    )
                                ); ?>
                            </p>
                        </div>

                        <div>
                            <strong>
                                <?php esc_html_e(
                                    'Stała umowa',
                                    'etos'
                                ); ?>
                            </strong>

                            <p>
                                <?php echo esc_html(
                                    $get_value(
                                        $row,
                                        'etos_service_care_comparison_contract'
                                    )
                                ); ?>
                            </p>
                        </div>

                    </article>

                <?php endforeach; ?>

            </div>

        </div>

    </section>

<?php endif; ?>

<?php if ( $recommendations ) : ?>

    <section
        class="etos-care-section etos-care-section--recommendations"
        aria-labelledby="etos-care-recommendations-title"
    >

        <div class="container etos-container">

            <header class="etos-care-section__header">
                <span class="etos-kicker">
                    <?php esc_html_e(
                        'Pomoc w wyborze',
                        'etos'
                    ); ?>
                </span>

                <h2 id="etos-care-recommendations-title">
                    <?php echo esc_html(
                        $data['recommendations_heading']
                        ?? ''
                    ); ?>
                </h2>
            </header>

            <div class="etos-care-recommendations">

                <?php foreach ( $recommendations as $row ) : ?>
                    <?php
                    $title = trim(
                        (string) $get_value(
                            $row,
                            'etos_service_care_recommendation_title'
                        )
                    );

                    $text = trim(
                        (string) $get_value(
                            $row,
                            'etos_service_care_recommendation_text'
                        )
                    );

                    $points = $get_lines(
                        $get_value(
                            $row,
                            'etos_service_care_recommendation_points'
                        )
                    );
                    ?>

                    <article class="etos-care-recommendation">

                        <h3><?php echo esc_html( $title ); ?></h3>

                        <?php if ( $text ) : ?>
                            <p><?php echo esc_html( $text ); ?></p>
                        <?php endif; ?>

                        <?php if ( $points ) : ?>
                            <ul>
                                <?php foreach ( $points as $point ) : ?>
                                    <li><?php echo esc_html( $point ); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                    </article>

                <?php endforeach; ?>

            </div>

        </div>

    </section>

<?php endif; ?>

<?php if ( $stats ) : ?>

    <section
        class="etos-care-proof"
        aria-labelledby="etos-care-proof-title"
    >

        <div class="container etos-container">

            <header class="etos-care-proof__header">
                <span class="etos-kicker etos-kicker--light">
                    <?php esc_html_e(
                        'Doświadczenie i kompetencje',
                        'etos'
                    ); ?>
                </span>

                <h2 id="etos-care-proof-title">
                    <?php echo esc_html(
                        $data['stats_heading'] ?? ''
                    ); ?>
                </h2>
            </header>

            <div class="etos-care-proof__grid">

                <?php foreach ( $stats as $row ) : ?>

                    <div class="etos-care-stat">

                        <?php
                        $value = trim(
                            (string) $get_value(
                                $row,
                                'etos_service_care_stat_value'
                            )
                        );
                        ?>

                        <?php if ( $value ) : ?>
                            <strong><?php echo esc_html( $value ); ?></strong>
                        <?php endif; ?>

                        <span>
                            <?php echo esc_html(
                                $get_value(
                                    $row,
                                    'etos_service_care_stat_label'
                                )
                            ); ?>
                        </span>

                    </div>

                <?php endforeach; ?>

            </div>

        </div>

    </section>

<?php endif; ?>

<?php if ( $paths ) : ?>

    <section
        class="etos-care-section etos-care-section--paths"
        aria-labelledby="etos-care-paths-title"
    >

        <div class="container etos-container">

            <header class="etos-care-section__header">

                <span class="etos-kicker">
                    <?php esc_html_e(
                        'Pierwszy krok',
                        'etos'
                    ); ?>
                </span>

                <h2 id="etos-care-paths-title">
                    <?php echo esc_html(
                        $data['paths_heading'] ?? ''
                    ); ?>
                </h2>

                <?php if ( ! empty( $data['paths_intro'] ) ) : ?>
                    <p>
                        <?php echo esc_html(
                            $data['paths_intro']
                        ); ?>
                    </p>
                <?php endif; ?>

            </header>

            <div class="etos-care-paths">

                <?php foreach ( $paths as $row ) : ?>
                    <?php
                    $eyebrow = trim(
                        (string) $get_value(
                            $row,
                            'etos_service_care_path_eyebrow'
                        )
                    );

                    $title = trim(
                        (string) $get_value(
                            $row,
                            'etos_service_care_path_title'
                        )
                    );

                    $text = trim(
                        (string) $get_value(
                            $row,
                            'etos_service_care_path_text'
                        )
                    );

                    $steps = $get_lines(
                        $get_value(
                            $row,
                            'etos_service_care_path_steps'
                        )
                    );

                    $link = $normalize_link(
                        $get_value(
                            $row,
                            'etos_service_care_path_link'
                        )
                    );
                    ?>

                    <article class="etos-care-path">

                        <?php if ( $eyebrow ) : ?>
                            <span class="etos-care-path__eyebrow">
                                <?php echo esc_html( $eyebrow ); ?>
                            </span>
                        <?php endif; ?>

                        <h3><?php echo esc_html( $title ); ?></h3>

                        <?php if ( $text ) : ?>
                            <p><?php echo esc_html( $text ); ?></p>
                        <?php endif; ?>

                        <?php if ( $steps ) : ?>
                            <ol>
                                <?php foreach ( $steps as $step ) : ?>
                                    <li><?php echo esc_html( $step ); ?></li>
                                <?php endforeach; ?>
                            </ol>
                        <?php endif; ?>

                        <?php if ( $link['url'] && $link['title'] ) : ?>

                            <a
                                class="btn etos-btn-primary"
                                href="<?php echo esc_url(
                                    $link['url']
                                ); ?>"
                                <?php if ( '_blank' === $link['target'] ) : ?>
                                    target="_blank"
                                    rel="noopener noreferrer"
                                <?php endif; ?>
                            >
                                <?php echo esc_html(
                                    $link['title']
                                ); ?>
                            </a>

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