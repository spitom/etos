<?php
/**
 * The template for displaying the front page.
 *
 * @package ETOS
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="wrapper" id="content" tabindex="-1">
	<main class="site-main site-main--front" id="main" role="main">
		<?php
		get_template_part( 'template-parts/front-page/hero' );
		get_template_part( 'template-parts/front-page/support-areas' );
		get_template_part( 'template-parts/front-page/erp-ecosystem' );
		get_template_part( 'template-parts/front-page/workflow' );
		get_template_part( 'template-parts/front-page/services' );
		?>
	</main>
</div>

<?php
get_footer();
