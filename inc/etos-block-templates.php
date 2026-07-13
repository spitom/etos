<?php
/**
 * Default Gutenberg structures for ETOS content types.
 *
 * @package ETOS
 */

defined( 'ABSPATH' ) || exit;

/**
 * Build one editable card used in the software content template.
 *
 * @param string $modifier    Card modifier class.
 * @param string $title       Heading placeholder.
 * @param string $description Paragraph placeholder.
 * @param bool   $with_icon   Whether to add an image block for an icon.
 * @return array
 */
function etos_get_software_template_card( $modifier, $title, $description, $with_icon = false ) {
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

	return array(
		'core/column',
		array(),
		array(
			array(
				'core/group',
				array(
					'className' => 'etos-software-card etos-software-card--' . $modifier,
				),
				$blocks
			),
		)
	);
}

/**
 * Build one editable software content section.
 *
 * @param string $modifier Section modifier class.
 * @param string $title    Visible section title.
 * @param string $intro    Introductory paragraph placeholder.
 * @param array  $card     Card definition duplicated three times.
 * @return array
 */
function etos_get_software_template_section( $modifier, $title, $intro, $card ) {
	return array(
		'core/group',
		array(
			'className' => 'etos-software-section etos-software-section--' . $modifier,
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
				),
				array(
					$card,
					$card,
					$card,
				)
			),
		)
	);
}

/**
 * Return the editable default block structure for a software entry.
 *
 * The structure is applied only when a new software entry is created.
 * Editors can add, remove, duplicate and reorder all blocks.
 *
 * @return array
 */
function etos_get_software_block_template() {
	$benefit_card = etos_get_software_template_card(
		'benefit',
		__( 'Nazwa korzyści', 'etos' ),
		__( 'Krótki opis konkretnej korzyści dla klienta.', 'etos' ),
		true
	);

	$feature_card = etos_get_software_template_card(
		'feature',
		__( 'Obszar funkcjonalny', 'etos' ),
		__( 'Opisz najważniejsze funkcje należące do tego obszaru.', 'etos' )
	);

	$addon_card = etos_get_software_template_card(
		'addon',
		__( 'Nazwa rozwiązania', 'etos' ),
		__( 'Wyjaśnij, w jaki sposób rozwiązanie rozszerza możliwości programu.', 'etos' )
	);

	$package_card = etos_get_software_template_card(
		'package',
		__( 'Nazwa pakietu', 'etos' ),
		__( 'Opisz przeznaczenie pakietu oraz jego najważniejsze elementy.', 'etos' )
	);

	return array(
		etos_get_software_template_section(
			'benefits',
			__( 'Co zyskujesz', 'etos' ),
			__( 'Wprowadzenie do najważniejszych korzyści z wdrożenia programu.', 'etos' ),
			$benefit_card
		),
		etos_get_software_template_section(
			'features',
			__( 'Funkcjonalności', 'etos' ),
			__( 'Krótko wyjaśnij, jakie procesy obsługuje program.', 'etos' ),
			$feature_card
		),
		etos_get_software_template_section(
			'addons',
			__( 'Rozwiązania dodatkowe', 'etos' ),
			__( 'Wprowadzenie do integracji, rozszerzeń i usług uzupełniających.', 'etos' ),
			$addon_card
		),
		etos_get_software_template_section(
			'packages',
			__( 'Pakiety', 'etos' ),
			__( 'Wyjaśnij, czym różnią się dostępne warianty programu.', 'etos' ),
			$package_card
		),
	);
}
