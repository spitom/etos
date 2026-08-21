<?php
/**
 * Template Name: Kontakt ETOS
 * Template Post Type: page
 *
 * @package ETOS
 */

defined( 'ABSPATH' ) || exit;

get_header();

$GLOBALS['etos_footer_cta_hide'] = true;

while ( have_posts() ) :
    the_post();

    $post_id = get_the_ID();

    $get_contact_field = static function (
        $name,
        $default = ''
    ) use ( $post_id ) {
        if ( function_exists( 'get_field' ) ) {
            $value = get_field(
                $name,
                $post_id
            );
        } else {
            $value = get_post_meta(
                $post_id,
                $name,
                true
            );
        }

        if (
            null === $value
            || '' === $value
        ) {
            return $default;
        }

        return $value;
    };

    $hero_eyebrow = trim(
        (string) $get_contact_field(
            'etos_contact_hero_eyebrow',
            __( 'Kontakt', 'etos' )
        )
    );

    $hero_title = trim(
        (string) $get_contact_field(
            'etos_contact_hero_title',
            __( 'Porozmawiajmy o potrzebach Twojej firmy', 'etos' )
        )
    );

    $hero_text = trim(
        (string) $get_contact_field(
            'etos_contact_hero_text'
        )
    );

    $contacts = $get_contact_field(
        'etos_contact_channels',
        array()
    );

    $contacts = is_array( $contacts )
        ? $contacts
        : array();

    $company_nip = trim(
        (string) $get_contact_field(
            'etos_contact_nip'
        )
    );

    $company_regon = trim(
        (string) $get_contact_field(
            'etos_contact_regon'
        )
    );

    $company_krs = trim(
        (string) $get_contact_field(
            'etos_contact_krs'
        )
    );

    $company_krs_link = trim(
        (string) $get_contact_field(
            'etos_contact_krs_link'
        )
    );

    $company_court = trim(
        (string) $get_contact_field(
            'etos_contact_court'
        )
    );

    $company_capital = trim(
        (string) $get_contact_field(
            'etos_contact_capital'
        )
    );

    $company_board = trim(
        (string) $get_contact_field(
            'etos_contact_board'
        )
    );

    $main_phone = trim(
        (string) $get_contact_field(
            'etos_contact_main_phone'
        )
    );

    $bank_account = trim(
        (string) $get_contact_field(
            'etos_contact_bank_account'
        )
    );

    $branch_title = trim(
        (string) $get_contact_field(
            'etos_contact_branch_title',
            __( 'Oddział w Ełku', 'etos' )
        )
    );

    $branch_address = trim(
        (string) $get_contact_field(
            'etos_contact_branch_address'
        )
    );

    $branch_person = trim(
        (string) $get_contact_field(
            'etos_contact_branch_person'
        )
    );

    $branch_phone = trim(
        (string) $get_contact_field(
            'etos_contact_branch_phone'
        )
    );

    $branch_email = trim(
        (string) $get_contact_field(
            'etos_contact_branch_email'
        )
    );

    $office_title = trim(
        (string) $get_contact_field(
            'etos_contact_office_title',
            __( 'Siedziba ETOS', 'etos' )
        )
    );

    $company = trim(
        (string) $get_contact_field(
            'etos_contact_company',
            'ETOS Sp. z o.o.'
        )
    );

    $address = trim(
        (string) $get_contact_field(
            'etos_contact_address',
            "ul. Mochnackiego 10\n10-037 Olsztyn"
        )
    );

    $office_text = trim(
        (string) $get_contact_field(
            'etos_contact_office_text'
        )
    );

    $map_lat = trim(
        (string) $get_contact_field(
            'etos_contact_map_lat'
        )
    );

    $map_lng = trim(
        (string) $get_contact_field(
            'etos_contact_map_lng'
        )
    );

    $map_zoom = absint(
        $get_contact_field(
            'etos_contact_map_zoom',
            15
        )
    );

    if ( ! $map_zoom ) {
        $map_zoom = 15;
    }

    $map_label = trim(
        (string) $get_contact_field(
            'etos_contact_map_label',
            $company
        )
    );

    $form_eyebrow = trim(
        (string) $get_contact_field(
            'etos_contact_form_eyebrow',
            __( 'Napisz do nas', 'etos' )
        )
    );

    $form_title = trim(
        (string) $get_contact_field(
            'etos_contact_form_title',
            __( 'Opowiedz nam, czego potrzebujesz', 'etos' )
        )
    );

    $form_text = trim(
        (string) $get_contact_field(
            'etos_contact_form_text'
        )
    );

    $form_shortcode = trim(
        (string) $get_contact_field(
            'etos_contact_form_shortcode'
        )
    );
    ?>

    <main
        class="site-main etos-contact-page"
        id="main"
    >

        <article id="post-<?php the_ID(); ?>">

            <header class="etos-contact-hero">

                <div class="container etos-container">

                    <div class="etos-contact-hero__inner">

                        <?php if ( '' !== $hero_eyebrow ) : ?>

                            <span class="etos-kicker">
                                <?php echo esc_html(
                                    $hero_eyebrow
                                ); ?>
                            </span>

                        <?php endif; ?>

                        <h1>
                            <?php echo esc_html(
                                $hero_title
                            ); ?>
                        </h1>

                        <?php if ( '' !== $hero_text ) : ?>

                            <p>
                                <?php echo esc_html(
                                    $hero_text
                                ); ?>
                            </p>

                        <?php endif; ?>

                    </div>

                </div>

            </header>

            <?php if ( $contacts ) : ?>

                <section class="etos-contact-channels">

                    <div class="container etos-container">

                        <div class="etos-contact-channels__grid">

                            <?php foreach ( $contacts as $contact ) : ?>

                                <?php
                                $title = trim(
                                    (string) (
                                        $contact['title'] ?? ''
                                    )
                                );

                                $text = trim(
                                    (string) (
                                        $contact['text'] ?? ''
                                    )
                                );

                                $value = trim(
                                    (string) (
                                        $contact['value'] ?? ''
                                    )
                                );

                                $link = trim(
                                    (string) (
                                        $contact['link'] ?? ''
                                    )
                                );

                                $action_type = sanitize_key(
                                    (string) (
                                        $contact['action_type'] ?? ''
                                    )
                                );

                                $department = sanitize_key(
                                    (string) (
                                        $contact['department'] ?? ''
                                    )
                                );

                                $form_link = '';

                                if (
                                    'form' === $action_type
                                    && '' !== $department
                                ) {
                                    $form_link = add_query_arg(
                                        'dzial',
                                        $department,
                                        get_permalink( $post_id )
                                    ) . '#kontakt-formularz';
                                }
                                ?>

                                <article class="etos-contact-card">

                                    <?php if ( '' !== $title ) : ?>

                                        <h2>
                                            <?php echo esc_html(
                                                $title
                                            ); ?>
                                        </h2>

                                    <?php endif; ?>

                                    <?php if ( '' !== $text ) : ?>

                                        <p>
                                            <?php echo esc_html(
                                                $text
                                            ); ?>
                                        </p>

                                    <?php endif; ?>

                                    <?php if (
                                        'form' === $action_type
                                        && '' !== $form_link
                                    ) : ?>

                                        <a href="<?php echo esc_url(
                                            $form_link
                                        ); ?>">
                                            <?php esc_html_e(
                                                'Skontaktuj się',
                                                'etos'
                                            ); ?>
                                            <span aria-hidden="true">
                                                →
                                            </span>
                                        </a>

                                    <?php elseif (
                                        '' !== $value
                                        && '' !== $link
                                    ) : ?>

                                        <a href="<?php echo esc_url(
                                            $link
                                        ); ?>">
                                            <?php echo esc_html(
                                                $value
                                            ); ?>
                                            <span aria-hidden="true">
                                                →
                                            </span>
                                        </a>

                                    <?php elseif ( '' !== $value ) : ?>

                                        <strong>
                                            <?php echo esc_html(
                                                $value
                                            ); ?>
                                        </strong>

                                    <?php endif; ?>

                                </article>

                            <?php endforeach; ?>

                        </div>

                    </div>

                </section>

            <?php endif; ?>

            <section class="etos-contact-office">

                <div class="container etos-container">

                    <div class="row g-5 align-items-stretch">

                        <div class="col-lg-5">

                            <div class="etos-contact-office__content">

                                <span class="etos-kicker">
                                    <?php esc_html_e(
                                        'Dane firmy',
                                        'etos'
                                    ); ?>
                                </span>

                                <h2>
                                    <?php echo esc_html(
                                        $company
                                    ); ?>
                                </h2>

                                <address>

                                    <?php
                                    echo nl2br(
                                        esc_html(
                                            $address
                                        )
                                    );
                                    ?>

                                </address>

                                <?php if ( '' !== $main_phone ) : ?>

                                    <p class="etos-contact-office__phone">

                                        <strong>
                                            <?php esc_html_e(
                                                'Centrala:',
                                                'etos'
                                            ); ?>
                                        </strong>

                                        <a href="tel:<?php echo esc_attr(
                                            preg_replace(
                                                '/[^0-9+]/',
                                                '',
                                                $main_phone
                                            )
                                        ); ?>">
                                            <?php echo esc_html(
                                                $main_phone
                                            ); ?>
                                        </a>

                                    </p>

                                <?php endif; ?>

                                <?php if (
                                    '' !== $company_nip
                                    || '' !== $company_regon
                                    || '' !== $company_krs
                                    || '' !== $bank_account
                                    || '' !== $company_capital
                                ) : ?>

                                    <dl class="etos-contact-company-details">

                                        <?php if ( '' !== $company_nip ) : ?>

                                            <div>
                                                <dt>NIP</dt>
                                                <dd>
                                                    <?php echo esc_html(
                                                        $company_nip
                                                    ); ?>
                                                </dd>
                                            </div>

                                        <?php endif; ?>

                                        <?php if ( '' !== $company_regon ) : ?>

                                            <div>
                                                <dt>REGON</dt>
                                                <dd>
                                                    <?php echo esc_html(
                                                        $company_regon
                                                    ); ?>
                                                </dd>
                                            </div>

                                        <?php endif; ?>

                                        <?php if ( '' !== $company_krs ) : ?>

                                            <div>
                                                <dt>KRS</dt>
                                                <dd>

                                                    <?php if (
                                                        '' !== $company_krs_link
                                                    ) : ?>

                                                        <a href="<?php echo esc_url(
                                                            $company_krs_link
                                                        ); ?>">
                                                            <?php echo esc_html(
                                                                $company_krs
                                                            ); ?>
                                                        </a>

                                                    <?php else : ?>

                                                        <?php echo esc_html(
                                                            $company_krs
                                                        ); ?>

                                                    <?php endif; ?>

                                                </dd>
                                            </div>

                                        <?php endif; ?>

                                        <?php if ( '' !== $bank_account ) : ?>

                                            <div>
                                                <dt>
                                                    <?php esc_html_e(
                                                        'Rachunek bankowy',
                                                        'etos'
                                                    ); ?>
                                                </dt>
                                                <dd>
                                                    <?php echo esc_html(
                                                        $bank_account
                                                    ); ?>
                                                </dd>
                                            </div>

                                        <?php endif; ?>

                                        <?php if ( '' !== $company_capital ) : ?>

                                            <div>
                                                <dt>
                                                    <?php esc_html_e(
                                                        'Kapitał zakładowy',
                                                        'etos'
                                                    ); ?>
                                                </dt>
                                                <dd>
                                                    <?php echo esc_html(
                                                        $company_capital
                                                    ); ?>
                                                </dd>
                                            </div>

                                        <?php endif; ?>

                                    </dl>

                                <?php endif; ?>

                                <?php if ( '' !== $company_court ) : ?>

                                    <div class="etos-contact-office__registry">

                                        <strong>
                                            <?php esc_html_e(
                                                'Sąd rejestrowy',
                                                'etos'
                                            ); ?>
                                        </strong>

                                        <p>
                                            <?php echo nl2br(
                                                esc_html(
                                                    $company_court
                                                )
                                            ); ?>
                                        </p>

                                    </div>

                                <?php endif; ?>

                                <?php if ( '' !== $company_board ) : ?>

                                    <div class="etos-contact-office__registry">

                                        <strong>
                                            <?php esc_html_e(
                                                'Zarząd',
                                                'etos'
                                            ); ?>
                                        </strong>

                                        <p>
                                            <?php echo nl2br(
                                                esc_html(
                                                    $company_board
                                                )
                                            ); ?>
                                        </p>

                                    </div>

                                <?php endif; ?>

                                <?php if ( '' !== $office_text ) : ?>

                                    <div class="etos-contact-office__text">
                                        <?php echo wp_kses_post(
                                            wpautop(
                                                $office_text
                                            )
                                        ); ?>
                                    </div>

                                <?php endif; ?>

                                <?php if (
                                    '' !== $branch_address
                                    || '' !== $branch_person
                                    || '' !== $branch_phone
                                    || '' !== $branch_email
                                ) : ?>

                                    <div class="etos-contact-office__branch">

                                        <?php if ( '' !== $branch_title ) : ?>

                                            <h3>
                                                <?php echo esc_html(
                                                    $branch_title
                                                ); ?>
                                            </h3>

                                        <?php endif; ?>

                                        <?php if ( '' !== $branch_address ) : ?>

                                            <address>
                                                <?php echo nl2br(
                                                    esc_html(
                                                        $branch_address
                                                    )
                                                ); ?>
                                            </address>

                                        <?php endif; ?>

                                        <?php if ( '' !== $branch_person ) : ?>

                                            <p>
                                                <strong>
                                                    <?php echo esc_html(
                                                        $branch_person
                                                    ); ?>
                                                </strong>
                                            </p>

                                        <?php endif; ?>

                                        <?php if ( '' !== $branch_phone ) : ?>

                                            <p>
                                                <a href="tel:<?php echo esc_attr(
                                                    preg_replace(
                                                        '/[^0-9+]/',
                                                        '',
                                                        $branch_phone
                                                    )
                                                ); ?>">
                                                    <?php echo esc_html(
                                                        $branch_phone
                                                    ); ?>
                                                </a>
                                            </p>

                                        <?php endif; ?>

                                        <?php if ( '' !== $branch_email ) : ?>

                                            <p>
                                                <a href="mailto:<?php echo esc_attr(
                                                    antispambot(
                                                        $branch_email
                                                    )
                                                ); ?>">
                                                    <?php echo esc_html(
                                                        antispambot(
                                                            $branch_email
                                                        )
                                                    ); ?>
                                                </a>
                                            </p>

                                        <?php endif; ?>

                                    </div>

                                <?php endif; ?>

                            </div>

                        </div>

                        <div class="col-lg-7">

                            <div class="etos-contact-office__map">

                                <?php if (
                                        '' !== $map_lat
                                        && '' !== $map_lng
                                    ) : ?>

                                    <div
                                        id="etos-contact-map"
                                        class="etos-contact-map"
                                        data-lat="<?php echo esc_attr(
                                            $map_lat
                                        ); ?>"
                                        data-lng="<?php echo esc_attr(
                                            $map_lng
                                        ); ?>"
                                        data-zoom="<?php echo esc_attr(
                                            $map_zoom
                                        ); ?>"
                                        data-label="<?php echo esc_attr(
                                            $map_label
                                        ); ?>"
                                        role="region"
                                        aria-label="<?php esc_attr_e(
                                            'Mapa lokalizacji firmy ETOS',
                                            'etos'
                                        ); ?>"
                                    ></div>

                                <?php else : ?>

                                    <div
                                        class="etos-contact-office__map-placeholder"
                                        aria-hidden="true"
                                    ></div>

                                <?php endif; ?>

                            </div>

                        </div>

                    </div>

                </div>

            </section>

            <?php if (
                '' !== $form_shortcode
                || '' !== $form_title
            ) : ?>

                <section class="etos-contact-form" id="kontakt-formularz">

                    <div class="container etos-container">

                        <div class="row g-5">

                            <div class="col-lg-5">

                                <div class="etos-contact-form__intro">

                                    <?php if ( '' !== $form_eyebrow ) : ?>

                                        <span class="etos-kicker">
                                            <?php echo esc_html(
                                                $form_eyebrow
                                            ); ?>
                                        </span>

                                    <?php endif; ?>

                                    <?php if ( '' !== $form_title ) : ?>

                                        <h2>
                                            <?php echo esc_html(
                                                $form_title
                                            ); ?>
                                        </h2>

                                    <?php endif; ?>

                                    <?php if ( '' !== $form_text ) : ?>

                                        <p>
                                            <?php echo esc_html(
                                                $form_text
                                            ); ?>
                                        </p>

                                    <?php endif; ?>

                                </div>

                            </div>

                            <div class="col-lg-7">

                                <?php if ( '' !== $form_shortcode ) : ?>

                                    <div class="etos-contact-form__form">
                                        <?php
                                        echo do_shortcode(
                                            $form_shortcode
                                        );
                                        ?>
                                    </div>

                                <?php endif; ?>

                            </div>

                        </div>

                    </div>

                </section>

            <?php endif; ?>

        </article>

    </main>

    <?php
endwhile;

get_footer();