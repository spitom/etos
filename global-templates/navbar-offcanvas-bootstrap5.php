<?php
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<nav id="main-nav" class="navbar navbar-expand-xl etos-navbar" aria-labelledby="main-nav-label">

	<h2 id="main-nav-label" class="screen-reader-text">
		<?php esc_html_e( 'Main Navigation', 'understrap' ); ?>
	</h2>

	<div class="<?php echo esc_attr( $container ); ?>">

		<?php get_template_part( 'global-templates/navbar-branding' ); ?>

		<button
			class="navbar-toggler etos-navbar__toggle"
			type="button"
			data-bs-toggle="offcanvas"
			data-bs-target="#navbarNavOffcanvas"
			aria-controls="navbarNavOffcanvas"
			aria-expanded="false"
			aria-label="<?php esc_attr_e( 'Open menu', 'understrap' ); ?>"
		>
			<span class="navbar-toggler-icon"></span>
		</button>

		<div
			class="offcanvas offcanvas-end etos-navbar__offcanvas"
			tabindex="-1"
			id="navbarNavOffcanvas"
			aria-labelledby="navbarNavOffcanvasLabel"
		>

			<div class="offcanvas-header justify-content-between">
				<h2 class="etos-navbar__offcanvas-title" id="navbarNavOffcanvasLabel">
					Menu
				</h2>

				<button
					class="btn-close btn-close-white"
					type="button"
					data-bs-dismiss="offcanvas"
					aria-label="<?php esc_attr_e( 'Close menu', 'understrap' ); ?>"
				></button>
			</div>

			<?php
			wp_nav_menu(
				array(
					'theme_location'  => 'primary',
					'container'       => 'div',
					'container_class' => 'offcanvas-body etos-navbar__offcanvas-body',
					'container_id'    => 'navbarNavOffcanvasBody',
					'menu_class'      => 'navbar-nav etos-navbar__menu justify-content-end flex-grow-1 pe-3',
					'fallback_cb'     => false,
					'menu_id'         => 'main-menu',
					'depth'           => 1,
					'walker'          => new ETOS_Nav_Walker(),
				)
			);
			?>

		</div>
	</div>
</nav>