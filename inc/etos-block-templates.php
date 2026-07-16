<?php
/**
 * Default Gutenberg structures for ETOS content types.
 *
 * @package ETOS
 */

defined( 'ABSPATH' ) || exit;

/**
 * Build one editable card used in a software content template.
 *
 * @param string $modifier       Card modifier.
 * @param string $editor_name    Name displayed in Gutenberg List View.
 * @param string $title          Heading placeholder.
 * @param string $description    Paragraph placeholder.
 * @param bool   $with_icon      Whether to include an image block.
 * @param bool   $with_list      Whether to include a list block.
 * @param bool   $with_button    Whether to include a button block.
 * @return array
 */
function etos_get_software_template_card(
    $modifier,
    $editor_name,
    $title,
    $description,
    $with_icon = false,
    $with_list = false,
    $with_button = false
) {
    $blocks = array();

    if ( $with_icon ) {
        $blocks[] = array(
            'core/image',
            array(
                'className' => 'etos-software-card__icon',
                'sizeSlug'  => 'thumbnail',
            )
        );
    }

    $blocks[] = array(
        'core/heading',
        array(
            'level'       => 3,
            'placeholder' => $title,
        )
    );

    $blocks[] = array(
        'core/paragraph',
        array(
            'placeholder' => $description,
        )
    );

    if ( $with_list ) {
        $blocks[] = array(
            'core/list',
            array(
                'className' => 'etos-software-card__list',
            )
        );
    }

    if ( $with_button ) {
        $blocks[] = array(
            'core/buttons',
            array(
                'className' => 'etos-software-card__actions',
            ),
            array(
                array(
                    'core/button',
                    array(
                        'placeholder' => __( 'Tekst przycisku', 'etos' ),
                    )
                ),
            )
        );
    }

    return array(
        'core/column',
        array(
            'metadata' => array(
                'name' => $editor_name,
            ),
        ),
        array(
            array(
                'core/group',
                array(
                    'className' => 'etos-software-card etos-software-card--' . $modifier,
                    'metadata'  => array(
                        'name' => $editor_name,
                    ),
                ),
                $blocks
            ),
        )
    );
}

/**
 * Build a named section containing editable cards.
 *
 * @param string $modifier    Section modifier.
 * @param string $editor_name Name displayed in Gutenberg List View.
 * @param string $title       Visible section title.
 * @param string $intro       Introductory paragraph placeholder.
 * @param array  $cards       Card definitions.
 * @return array
 */
function etos_get_software_template_card_section(
    $modifier,
    $editor_name,
    $title,
    $intro,
    $cards
) {
    return array(
        'core/group',
        array(
            'className' => 'etos-software-section etos-software-section--' . $modifier,
            'metadata'  => array(
                'name' => $editor_name,
            ),
        ),
        array(
            array(
                'core/heading',
                array(
                    'level'   => 2,
                    'content' => $title,
                )
            ),
            array(
                'core/paragraph',
                array(
                    'placeholder' => $intro,
                )
            ),
            array(
                'core/columns',
                array(
                    'className' => 'etos-software-grid etos-software-grid--' . $modifier,
                    'metadata'  => array(
                        'name' => sprintf(
                            /* translators: %s: section title. */
                            __( 'Karty: %s', 'etos' ),
                            $title
                        ),
                    ),
                ),
                $cards
            ),
        )
    );
}

/**
 * Build one editable text-and-image section.
 *
 * @param string $modifier       Section modifier.
 * @param string $editor_name    Name displayed in Gutenberg List View.
 * @param string $media_position Image position: left or right.
 * @return array
 */
function etos_get_software_template_media_section(
    $modifier,
    $editor_name,
    $media_position = 'right'
) {
    return array(
        'core/media-text',
        array(
            'align'         => 'wide',
            'mediaPosition' => $media_position,
            'mediaType'     => 'image',
            'className'     => 'etos-software-split etos-software-split--' . $modifier,
            'metadata'      => array(
                'name' => $editor_name,
            ),
        ),
        array(
            array(
                'core/heading',
                array(
                    'level'       => 2,
                    'placeholder' => __(
                        'Tytuł obszaru funkcjonalnego',
                        'etos'
                    ),
                )
            ),
            array(
                'core/paragraph',
                array(
                    'placeholder' => __(
                        'Opisz procesy, które obsługuje program, oraz najważniejsze korzyści dla użytkownika.',
                        'etos'
                    ),
                )
            ),
            array(
                'core/list',
                array(
                    'className' => 'etos-software-split__list',
                )
            ),
        )
    );
}

/**
 * Return the editable default block structure for a software entry.
 *
 * The structure is applied only when a new software entry is created.
 * Existing entries are never overwritten.
 *
 * @return array
 */
function etos_get_software_block_template() {
    $benefit_cards = array();

    for ( $index = 1; $index <= 3; $index++ ) {
        $benefit_cards[] = etos_get_software_template_card(
            'benefit',
            sprintf(
                /* translators: %d: card number. */
                __( 'Korzyść %d', 'etos' ),
                $index
            ),
            __( 'Nazwa korzyści', 'etos' ),
            __( 'Krótki opis konkretnego efektu dla klienta.', 'etos' ),
            true
        );
    }

    $addon_cards = array();

    for ( $index = 1; $index <= 4; $index++ ) {
        $addon_cards[] = etos_get_software_template_card(
            'addon',
            sprintf(
                /* translators: %d: card number. */
                __( 'Rozwiązanie dodatkowe %d', 'etos' ),
                $index
            ),
            __( 'Nazwa rozwiązania', 'etos' ),
            __( 'Krótko opisz moduł, integrację albo produkt uzupełniający.', 'etos' ),
            true,
            false,
            true
        );
    }

    $package_cards = array();

    for ( $index = 1; $index <= 3; $index++ ) {
        $package_cards[] = etos_get_software_template_card(
            'package',
            sprintf(
                /* translators: %d: card number. */
                __( 'Pakiet %d', 'etos' ),
                $index
            ),
            __( 'Nazwa pakietu', 'etos' ),
            __( 'Dla jakiego rodzaju firmy przeznaczony jest ten wariant?', 'etos' ),
            false,
            true,
            true
        );
    }

    return array(
        etos_get_software_template_card_section(
            'benefits',
            __( '01 — Najważniejsze korzyści', 'etos' ),
            __( 'Najważniejsze korzyści', 'etos' ),
            __( 'Krótko przedstaw trzy najważniejsze efekty wdrożenia programu.', 'etos' ),
            $benefit_cards
        ),
        etos_get_software_template_media_section(
            'media-right',
            __( '02 — Funkcjonalność: tekst + obraz', 'etos' ),
            'right'
        ),
        etos_get_software_template_media_section(
            'media-left',
            __( '03 — Funkcjonalność: obraz + tekst', 'etos' ),
            'left'
        ),
        etos_get_software_template_card_section(
            'addons',
            __( '04 — Rozwiązania dodatkowe', 'etos' ),
            __( 'Rozwiązania dodatkowe', 'etos' ),
            __( 'Pokaż moduły, integracje oraz produkty uzupełniające.', 'etos' ),
            $addon_cards
        ),
        etos_get_software_template_card_section(
            'packages',
            __( '05 — Pakiety', 'etos' ),
            __( 'Wybierz odpowiedni pakiet', 'etos' ),
            __( 'Wyjaśnij różnice między dostępnymi wariantami programu.', 'etos' ),
            $package_cards
        ),
    );
}