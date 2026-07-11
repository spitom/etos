<?php
/**
 * Theme asset loading.
 *
 * @package etos
 */

defined( 'ABSPATH' ) || exit;

/**
 * Return metadata for a readable child-theme asset.
 *
 * @param string $relative_path Path relative to the child-theme directory.
 * @return array|null
 */
function etos_get_theme_asset( $relative_path ) {
	$relative_path = ltrim( (string) $relative_path, '/' );
	$file_path     = get_stylesheet_directory() . '/' . $relative_path;

	if ( ! is_readable( $file_path ) ) {
		return null;
	}

	$file_modified = filemtime( $file_path );
	$theme_version = wp_get_theme()->get( 'Version' );

	return array(
		'url'     => get_stylesheet_directory_uri() . '/' . $relative_path,
		'version' => false !== $file_modified ? (string) $file_modified : $theme_version,
	);
}

/**
 * Resolve a production or development asset with a safe fallback.
 *
 * @param string $directory Asset directory.
 * @param string $basename  Filename without suffix and extension.
 * @param string $extension Extension without a leading dot.
 * @return array|null
 */
function etos_resolve_theme_asset( $directory, $basename, $extension ) {
	$debug_enabled = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG;
	$suffixes      = $debug_enabled ? array( '', '.min' ) : array( '.min', '' );

	foreach ( $suffixes as $suffix ) {
		$asset = etos_get_theme_asset(
			sprintf(
				'%1$s/%2$s%3$s.%4$s',
				trim( $directory, '/' ),
				$basename,
				$suffix,
				$extension
			)
		);

		if ( null !== $asset ) {
			return $asset;
		}
	}

	return null;
}

/**
 * Enqueue child-theme CSS and JavaScript.
 */
function etos_enqueue_theme_assets() {
	$stylesheet = etos_resolve_theme_asset( 'css', 'child-theme', 'css' );

	if ( null !== $stylesheet ) {
		wp_enqueue_style(
			'etos-styles',
			$stylesheet['url'],
			array(),
			$stylesheet['version']
		);
	}

	$script = etos_resolve_theme_asset( 'js', 'child-theme', 'js' );

	if ( null !== $script ) {
		wp_enqueue_script(
			'etos-scripts',
			$script['url'],
			array( 'jquery' ),
			$script['version'],
			true
		);
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

/**
 * Warn administrators when compiled frontend assets are unavailable.
 */
function etos_missing_theme_assets_notice() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	$missing = array();

	if ( null === etos_resolve_theme_asset( 'css', 'child-theme', 'css' ) ) {
		$missing[] = 'CSS';
	}

	if ( null === etos_resolve_theme_asset( 'js', 'child-theme', 'js' ) ) {
		$missing[] = 'JavaScript';
	}

	if ( empty( $missing ) ) {
		return;
	}
	?>
	<div class="notice notice-warning">
		<p>
			<?php
			echo esc_html(
				sprintf(
					/* translators: %s: comma-separated asset types. */
					__( 'Brakuje skompilowanych zasobów motywu ETOS: %s. Uruchom build przed wdrożeniem.', 'etos' ),
					implode( ', ', $missing )
				)
			);
			?>
		</p>
	</div>
	<?php
}
add_action( 'admin_notices', 'etos_missing_theme_assets_notice' );
