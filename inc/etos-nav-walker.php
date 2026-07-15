<?php
/**
 * ETOS primary navigation walker.
 *
 * @package ETOS
 */

defined( 'ABSPATH' ) || exit;

/**
 * Render the primary menu, including dynamic software and service dropdowns.
 */
class ETOS_Nav_Walker extends Walker_Nav_Menu {

    /**
     * ID assigned to the next standard WordPress submenu.
     *
     * @var string
     */
    private $submenu_id = '';

    /**
     * Start a standard WordPress submenu.
     *
     * @param string   $output Used to append additional content.
     * @param int      $depth  Depth of menu.
     * @param stdClass $args   Menu arguments.
     */
    public function start_lvl( &$output, $depth = 0, $args = null ) {
        unset( $args );

        if ( 0 !== $depth ) {
            return;
        }

        $submenu_id = $this->submenu_id ?: 'etos-nav-submenu';

        $output .= "\n<ul";
        $output .= ' class="dropdown-menu etos-standard-menu"';
        $output .= ' id="' . esc_attr( $submenu_id ) . '"';
        $output .= ">\n";
    }

    /**
     * End a standard WordPress submenu.
     *
     * @param string   $output Used to append additional content.
     * @param int      $depth  Depth of menu.
     * @param stdClass $args   Menu arguments.
     */
    public function end_lvl( &$output, $depth = 0, $args = null ) {
        unset( $args );

        if ( 0 !== $depth ) {
            return;
        }

        $output .= "</ul>\n";
        $this->submenu_id = '';
    }

    /**
     * Start one menu item.
     *
     * @param string   $output Used to append additional content.
     * @param WP_Post  $item   Menu item data object.
     * @param int      $depth  Depth of menu item.
     * @param stdClass $args   Menu arguments.
     * @param int      $id     Current item ID.
     */
    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        unset( $id );

        $classes       = empty( $item->classes ) ? array() : (array) $item->classes;
        $is_child      = 0 < $depth;
        $has_children  = 0 === $depth && ! empty( $this->has_children );
        $is_software   = 0 === $depth && in_array( 'etos-menu-software', $classes, true );
        $is_services   = 0 === $depth && in_array( 'etos-menu-services', $classes, true );
        $is_standard   = $has_children && ! $is_software && ! $is_services;
        $is_dropdown   = $is_software || $is_services || $is_standard;
        $is_cta        = 0 === $depth
            && ! $has_children
            && in_array( 'etos-menu-cta', $classes, true );

        if ( $is_child ) {
            $classes[] = 'etos-standard-menu__item';
        } else {
            $classes[] = 'nav-item';
        }

        if ( $is_dropdown ) {
            $classes[] = 'dropdown';
            $classes[] = 'etos-nav-item--dropdown';
        }

        if ( $is_standard ) {
            $classes[] = 'etos-nav-item--standard';
        }

        if ( $is_cta ) {
            $classes[] = 'etos-nav-item--cta';
        }

        $classes = array_filter(
            array_map(
                'sanitize_html_class',
                apply_filters( 'nav_menu_css_class', $classes, $item, $args, $depth )
            )
        );

        $output .= '<li class="' . esc_attr( implode( ' ', array_unique( $classes ) ) ) . '">';

        $title = apply_filters( 'the_title', $item->title, $item->ID );
        $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

        if ( $is_dropdown ) {
            $dropdown_type = $is_software
                ? 'software'
                : ( $is_services ? 'services' : 'standard' );

            $this->render_dropdown_parent(
                $output,
                $item,
                $title,
                $dropdown_type
            );

            return;
        }

        $link_class = 'nav-link';

        if ( $is_child ) {
            $link_class = 'dropdown-item';
        } elseif ( $is_cta ) {
            $link_class = 'nav-link etos-navbar__cta';
        }

        $atts = array(
            'title'        => ! empty( $item->attr_title ) ? $item->attr_title : '',
            'target'       => ! empty( $item->target ) ? $item->target : '',
            'rel'          => ! empty( $item->xfn ) ? $item->xfn : '',
            'href'         => ! empty( $item->url ) ? $item->url : '',
            'aria-current' => $item->current ? 'page' : '',
            'class'        => $link_class,
        );

        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

        $output .= '<a' . $this->build_attributes( $atts ) . '>';
        $output .= $args->link_before . $title . $args->link_after;
        $output .= '</a>';
    }

    /**
     * End one menu item.
     *
     * @param string   $output Used to append additional content.
     * @param WP_Post  $item   Menu item data object.
     * @param int      $depth  Depth of menu item.
     * @param stdClass $args   Menu arguments.
     */
    public function end_el( &$output, $item, $depth = 0, $args = null ) {
        unset( $item, $depth, $args );

        $output .= "</li>\n";
    }

    /**
     * Render an accessible dropdown parent button.
     *
     * @param string  $output Menu output.
     * @param WP_Post $item   Menu item.
     * @param string  $title  Filtered menu title.
     * @param string  $type   Dropdown type.
     */
    private function render_dropdown_parent( &$output, $item, $title, $type ) {
        $panel_id = 'etos-nav-panel-' . absint( $item->ID );

        $output .= '<button';
        $output .= ' class="nav-link etos-nav-parent__toggle dropdown-toggle"';
        $output .= ' type="button"';
        $output .= ' data-bs-toggle="dropdown"';
        $output .= ' data-bs-auto-close="outside"';
        $output .= ' data-bs-display="static"';
        $output .= ' aria-expanded="false"';
        $output .= ' aria-controls="' . esc_attr( $panel_id ) . '"';
        $output .= ' aria-label="' . esc_attr(
            sprintf(
                /* translators: %s: menu item title. */
                __( "Rozwi\u{0144} menu: %s", 'etos' ),
                wp_strip_all_tags( $title )
            )
        ) . '"';
        $output .= '>';
        $output .= '<span class="etos-nav-parent__label">' . esc_html( $title ) . '</span>';
        $output .= '</button>';

        if ( 'standard' === $type ) {
            $this->submenu_id = $panel_id;
            return;
        }

        if ( 'software' === $type ) {
            $output .= $this->get_software_menu( $panel_id );
        } else {
            $output .= $this->get_services_menu( $panel_id );
        }
    }

	/**
	 * Build the software mega menu.
	 *
	 * @param string $panel_id Dropdown panel ID.
	 * @return string
	 */
	private function get_software_menu( $panel_id ) {
		$vendors = get_terms(
			array(
				'taxonomy'   => 'etos_vendor',
				'hide_empty' => false,
			)
		);

		if ( is_wp_error( $vendors ) ) {
			$vendors = array();
		}

		$vendors = array_values(
			array_filter(
				$vendors,
				static function ( $vendor ) {
					return '0' !== (string) get_term_meta(
						$vendor->term_id,
						'etos_vendor_show_in_mega_menu',
						true
					);
				}
			)
		);

		usort(
			$vendors,
			static function ( $first, $second ) {
				$first_order  = get_term_meta( $first->term_id, 'etos_vendor_menu_order', true );
				$second_order = get_term_meta( $second->term_id, 'etos_vendor_menu_order', true );

				$first_order  = '' === $first_order ? 10 : (int) $first_order;
				$second_order = '' === $second_order ? 10 : (int) $second_order;

				if ( $first_order === $second_order ) {
					return strcasecmp( $first->name, $second->name );
				}

				return $first_order <=> $second_order;
			}
		);

		ob_start();
		?>
		<div class="dropdown-menu etos-mega-menu" id="<?php echo esc_attr( $panel_id ); ?>">
			<div class="etos-mega-menu__inner">
				<?php if ( $vendors ) : ?>
					<div class="etos-mega-menu__grid">
						<?php foreach ( $vendors as $vendor ) : ?>
							<?php
							$accent = (string) get_term_meta(
								$vendor->term_id,
								'etos_vendor_accent',
								true
							);

							if ( ! preg_match( '/^#[0-9a-fA-F]{6}$/', $accent ) ) {
								$accent = '#2457D6';
							}

							$logo_id = (int) get_term_meta(
								$vendor->term_id,
								'etos_vendor_logo',
								true
							);

							$software = get_posts(
								array(
									'post_type'        => 'etos_software',
									'post_status'      => 'publish',
									'posts_per_page'   => -1,
									'orderby'          => array(
										'menu_order' => 'ASC',
										'title'      => 'ASC',
									),
									'tax_query'        => array(
										array(
											'taxonomy' => 'etos_vendor',
											'field'    => 'term_id',
											'terms'    => $vendor->term_id,
										),
									),
									'suppress_filters' => false,
								)
							);

							$software = array_values(
								array_filter(
									$software,
									static function ( $software_item ) {
										return '0' !== (string) get_post_meta(
											$software_item->ID,
											'etos_software_show_in_mega_menu',
											true
										);
									}
								)
							);

							?>
							<section
								class="etos-mega-menu__column"
								style="--etos-vendor-accent: <?php echo esc_attr( $accent ); ?>;"
							>
								<div class="etos-mega-menu__vendor">
									<?php
									if ( $logo_id ) {
										echo wp_get_attachment_image(
											$logo_id,
											'medium',
											false,
											array(
												'class' => 'etos-mega-menu__logo',
												'alt'   => '',
											)
										);
									} else {
										echo '<span class="etos-mega-menu__vendor-name">'
											. esc_html( $vendor->name )
											. '</span>';
									}
									?>
								</div>

								<?php if ( $software ) : ?>
									<ul class="etos-mega-menu__list">
										<?php foreach ( $software as $software_item ) : ?>
											<?php
											$label = (string) get_post_meta(
												$software_item->ID,
												'etos_software_menu_label',
												true
											);
											?>
											<li>
												<a href="<?php echo esc_url( get_permalink( $software_item ) ); ?>">
													<?php echo esc_html( $label ?: get_the_title( $software_item ) ); ?>
												</a>
											</li>
										<?php endforeach; ?>
									</ul>
								<?php else : ?>
									<p class="etos-mega-menu__empty">
										<?php echo esc_html( "Produkty pojawi\u{0105} si\u{0119} po ich opublikowaniu." ); ?>
									</p>
								<?php endif; ?>
							</section>
						<?php endforeach; ?>
					</div>
				<?php else : ?>
					<p class="etos-mega-menu__empty">
						<?php echo esc_html( "Dodaj producent\u{00F3}w oprogramowania, aby wype\u{0142}ni\u{0107} mega menu." ); ?>
					</p>
				<?php endif; ?>
			</div>
		</div>
		<?php

		return (string) ob_get_clean();
	}

	/**
	 * Build the services dropdown.
	 *
	 * @param string $panel_id Dropdown panel ID.
	 * @return string
	 */
	private function get_services_menu( $panel_id ) {
		$services = get_posts(
			array(
				'post_type'        => 'etos_service',
				'post_status'      => 'publish',
				'posts_per_page'   => -1,
				'orderby'          => array(
					'menu_order' => 'ASC',
					'title'      => 'ASC',
				),
				'suppress_filters' => false,
			)
		);

		$services = array_values(
			array_filter(
				$services,
				static function ( $service ) {
					return '0' !== (string) get_post_meta(
						$service->ID,
						'etos_service_show_in_menu',
						true
					);
				}
			)
		);

		ob_start();
		?>
		<div class="dropdown-menu etos-services-menu" id="<?php echo esc_attr( $panel_id ); ?>">
			<?php if ( $services ) : ?>
				<ul class="etos-services-menu__list">
					<?php foreach ( $services as $service ) : ?>
						<?php
						$label = (string) get_post_meta(
							$service->ID,
							'etos_service_menu_label',
							true
						);
						?>
						<li>
							<a class="dropdown-item" href="<?php echo esc_url( get_permalink( $service ) ); ?>">
								<?php echo esc_html( $label ?: get_the_title( $service ) ); ?>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php else : ?>
				<p class="etos-services-menu__empty">
					<?php echo esc_html( "Us\u{0142}ugi pojawi\u{0105} si\u{0119} po ich opublikowaniu." ); ?>
				</p>
			<?php endif; ?>
		</div>
		<?php

		return (string) ob_get_clean();
	}

	/**
	 * Convert an associative array to escaped HTML attributes.
	 *
	 * @param array $attributes Attribute names and values.
	 * @return string
	 */
	private function build_attributes( $attributes ) {
		$html = '';

		foreach ( $attributes as $attribute => $value ) {
			if ( '' === $value || false === $value || null === $value ) {
				continue;
			}

			$escaped_value = 'href' === $attribute
				? esc_url( $value )
				: esc_attr( $value );

			$html .= ' ' . esc_attr( $attribute ) . '="' . $escaped_value . '"';
		}

		return $html;
	}
}
