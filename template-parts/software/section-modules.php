<?php
defined( 'ABSPATH' ) || exit;

$software = $args['software'] ?? array();
$modules  = $software['modules'] ?? array();
?>

<section id="modules" class="etos-section etos-section--soft software-modules-section">
    <div class="container etos-container">
        <div class="row mb-5 g-4 align-items-end">
            <div class="col-lg-7">
                <?php if ( ! empty( $modules['kicker'] ) ) : ?>
                    <span class="etos-kicker"><?php echo esc_html( $modules['kicker'] ); ?></span>
                <?php endif; ?>

                <h2 class="etos-section__title">
                    <?php echo esc_html( $modules['title'] ?? '' ); ?>
                </h2>
            </div>

            <div class="col-lg-5">
                <?php if ( ! empty( $modules['lead'] ) ) : ?>
                    <p class="etos-section__lead">
                        <?php echo esc_html( $modules['lead'] ); ?>
                    </p>
                <?php endif; ?>
            </div>
        </div>

        <?php if ( ! empty( $modules['items'] ) ) : ?>
            <div class="software-modules-grid">
                <?php
                foreach ( $modules['items'] as $module ) {
                    get_template_part(
                        'template-parts/software/module',
                        'card',
                        array(
                            'module'   => $module,
                            'software' => $software,
                        )
                    );
                }
                ?>
            </div>
        <?php endif; ?>
    </div>
</section>