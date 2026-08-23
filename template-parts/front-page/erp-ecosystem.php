<?php
/**
 * Front-page ERP ecosystem section.
 *
 * @package ETOS
 */

defined( 'ABSPATH' ) || exit;

/* ETOS FRONT ERP SETTINGS START */

$front_page_id = (int) get_option( 'page_on_front' );

if ( ! $front_page_id ) {
    $front_page_id = get_queried_object_id();
}

$erp_kicker = function_exists( 'get_field' )
    ? get_field( 'etos_front_erp_kicker', $front_page_id )
    : '';

$erp_title = function_exists( 'get_field' )
    ? get_field( 'etos_front_erp_title', $front_page_id )
    : '';

$erp_kicker = $erp_kicker
    ?: 'Systemy ERP dopasowane do procesów';

$erp_title = $erp_title
    ?: 'Dobieramy oprogramowanie do sposobu pracy Twojej firmy.';

/* ETOS FRONT ERP SETTINGS END */
?>

<section
    id="erp"
    class="etos-section etos-section--soft etos-erp"
>

    <div class="container etos-container">

        <header class="etos-erp__header">

            <?php if ( $erp_kicker ) : ?>
                <span class="etos-kicker">
                    <?php echo esc_html( $erp_kicker ); ?>
                </span>
            <?php endif; ?>

            <h2 class="etos-section__title">
                <?php echo esc_html( $erp_title ); ?>
            </h2>

        </header>

        <?php
        $erp_defaults = array(
            'symfonia' => array(
                'logo'      => get_stylesheet_directory_uri()
                    . '/assets/images/partners/symfonia.png',
                'image'     => get_stylesheet_directory_uri()
                    . '/assets/images/software/symfonia.webp',
                'image_alt' => 'Praca z systemem Symfonia ERP',
                'title'     => 'Finanse, kadry i procesy w stabilnym środowisku ERP.',
                'lead'      => 'Kompleksowe rozwiązania wspierające finanse, kadry, sprzedaż i codzienne procesy przedsiębiorstwa.',
                'accent'    => '#13B84A',
                'reverse'   => false,
            ),

            'insert' => array(
                'logo'      => get_stylesheet_directory_uri()
                    . '/assets/images/partners/insert.png',
                'image'     => get_stylesheet_directory_uri()
                    . '/assets/images/software/insert.webp',
                'image_alt' => 'Praca z oprogramowaniem InsERT',
                'title'     => 'Sprzedaż, magazyn i księgowość w sprawdzonym ekosystemie.',
                'lead'      => 'Spójny zestaw narzędzi do obsługi sprzedaży, magazynu, księgowości oraz relacji z klientami.',
                'accent'    => '#0077C8',
                'reverse'   => true,
            ),

            'streamsoft' => array(
                'logo'      => get_stylesheet_directory_uri()
                    . '/assets/images/partners/streamsoft.webp',
                'image'     => get_stylesheet_directory_uri()
                    . '/assets/images/software/streamsoft.webp',
                'image_alt' => 'System Streamsoft dla przedsiębiorstw',
                'title'     => 'Produkcja, logistyka i złożone procesy pod pełną kontrolą.',
                'lead'      => 'Rozbudowane systemy wspierające produkcję, logistykę, handel, magazyn i finanse przedsiębiorstwa.',
                'accent'    => '#2457D6',
                'reverse'   => false,
            ),
        );

        foreach ( $erp_defaults as $vendor_name => $fallback ) {

            /* ETOS ERP VENDOR LANDING START */

            $vendor_term = get_term_by(
                'slug',
                $vendor_name,
                'etos_vendor'
            );

            $vendor_url = '';

            if (
                $vendor_term
                && ! is_wp_error( $vendor_term )
            ) {
                $vendor_url = get_term_link( $vendor_term );

                if ( is_wp_error( $vendor_url ) ) {
                    $vendor_url = '';
                }
            }

            /* ETOS ERP VENDOR LANDING END */
            $logo_value = function_exists( 'get_field' )
                ? get_field( "{$vendor_name}_logo" )
                : null;

            $image_value = function_exists( 'get_field' )
                ? get_field( "{$vendor_name}_image" )
                : null;

            $title = function_exists( 'get_field' )
                ? get_field( "{$vendor_name}_title" )
                : '';

            $lead = function_exists( 'get_field' )
                ? get_field( "{$vendor_name}_lead" )
                : '';

            $accent = function_exists( 'get_field' )
                ? get_field( "{$vendor_name}_accent" )
                : '';

            $software_posts = get_posts(
                array(
                    'post_type'        => 'etos_software',
                    'post_status'      => 'publish',
                    'posts_per_page'   => -1,
                    'orderby'          => array(
                        'menu_order' => 'ASC',
                        'title'      => 'ASC',
                    ),
                    'suppress_filters' => false,
                    'meta_query'        => array(
                        array(
                            'key'     => 'etos_software_featured_on_home',
                            'value'   => '1',
                            'compare' => '=',
                        ),
                    ),
                    'tax_query'         => array(
                        array(
                            'taxonomy'         => 'etos_vendor',
                            'field'            => 'slug',
                            'terms'            => $vendor_name,
                            'include_children' => false,
                        ),
                    ),
                )
            );

            $products = array();

            foreach ( $software_posts as $software_post ) {
                $home_title = function_exists( 'get_field' )
                    ? get_field(
                        'etos_software_home_title',
                        $software_post->ID
                    )
                    : get_post_meta(
                        $software_post->ID,
                        'etos_software_home_title',
                        true
                    );

                $product_label = $home_title
                    ? trim( (string) $home_title )
                    : get_the_title( $software_post );

                if ( '' === $product_label ) {
                    continue;
                }

                $products[] = array(
                    'label' => $product_label,
                    'url'   => get_permalink( $software_post ),
                );
            }

            $suite = array(
                'name'        => $vendor_name,
                'vendor_name' => (
                    $vendor_term
                    && ! is_wp_error( $vendor_term )
                )
                    ? $vendor_term->name
                    : ucfirst( $vendor_name ),
                'vendor_url'  => $vendor_url,
                'logo'      => etos_get_image_url(
                    $logo_value,
                    $fallback['logo']
                ),
                'image'     => etos_get_image_url(
                    $image_value,
                    $fallback['image']
                ),
                'image_alt' => $fallback['image_alt'],
                'title'     => $title ?: $fallback['title'],
                'lead'      => $lead ?: $fallback['lead'],
                'accent'    => $accent ?: $fallback['accent'],
                'products'  => $products,
                'reverse'   => $fallback['reverse'],
            );

            get_template_part(
                'template-parts/components/erp-suite',
                null,
                $suite
            );
        }
        ?>

    </div>

</section>