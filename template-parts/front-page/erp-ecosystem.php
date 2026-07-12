<?php
/**
 * Front-page ERP ecosystem section.
 *
 * @package ETOS
 */

defined( 'ABSPATH' ) || exit;
?>

<section id="erp" class="etos-section etos-section--soft etos-erp">
    <div class="container etos-container">

        <header class="etos-erp__header">
            <span class="etos-kicker">
                Systemy ERP dopasowane do procesów
            </span>

            <h2 class="etos-section__title">
                Dobieramy oprogramowanie do sposobu pracy Twojej firmy.
            </h2>
        </header>

        <?php
        $erp_defaults = array(
            'symfonia' => array(
                'logo'      => get_stylesheet_directory_uri() . '/assets/images/partners/symfonia.png',
                'image'     => get_stylesheet_directory_uri() . '/assets/images/software/symfonia.webp',
                'image_alt' => 'Praca z systemem Symfonia ERP',
                'title'     => 'Finanse, kadry i procesy w stabilnym środowisku ERP.',
                'url'       => '/oprogramowanie/symfonia-erp/',
                'cta'       => 'Zobacz stronę Symfonia ERP',
                'accent'    => '#13B84A',
                'products'  => implode(
                    PHP_EOL,
                    array(
                        'Symfonia Handel Sprzedaż|/oprogramowanie/symfonia-handel-sprzedaż/',
                        'Symfonia Finanse i Księgowość|/oprogramowanie/symfonia-finanse-i-ksiegowosc/',
                        'Symfonia Kadry i Płace|/oprogramowanie/symfonia-kadry-i-place/',
                        'Symfonia R2Płatnik|/oprogramowanie/symfonia-r2platnik/',
                        'Symfonia Detal|/oprogramowanie/symfonia-detal/',
                        'Symfonia Business Intelligence|/oprogramowanie/symfonia-business-intelligence/',
                        'Symfonia Zarządzanie Produkcją|/oprogramowanie/symfonia-zarzadzanie-produkcja/',
                        'Symfonia eDokumenty|/oprogramowanie/symfonia-edokumenty/',
                        'Symfonia ERP|/oprogramowanie/symfonia-erp/',
                    )
                ),
                'reverse'   => false,
            ),

            'insert' => array(
                'logo'      => get_stylesheet_directory_uri() . '/assets/images/partners/insert.png',
                'image'     => get_stylesheet_directory_uri() . '/assets/images/software/insert.webp',
                'image_alt' => 'Praca z oprogramowaniem InsERT',
                'title'     => 'Sprzedaż, magazyn i księgowość w sprawdzonym ekosystemie.',
                'url'       => '/oprogramowanie/insert/',
                'cta'       => 'Zobacz stronę InsERT',
                'accent'    => '#0077C8',
                'products'  => implode(
                    PHP_EOL,
                    array(
                        'Subiekt nexo|/oprogramowanie/subiekt-nexo/',
                        'Rewizor nexo|/oprogramowanie/rewizor-nexo/',
                        'Rachmistrz nexo|/oprogramowanie/rachmistrz-nexo/',
                        'Gratyfikant nexo|/oprogramowanie/gratyfikant-nexo/',
                        'Gestor nexo|/oprogramowanie/gestor-nexo/',
                        'Sello NX|/oprogramowanie/sello-nx/',
                    )
                ),
                'reverse'   => true,
            ),

            'streamsoft' => array(
                'logo'      => get_stylesheet_directory_uri() . '/assets/images/partners/streamsoft.webp',
                'image'     => get_stylesheet_directory_uri() . '/assets/images/software/streamsoft.webp',
                'image_alt' => 'System Streamsoft dla przedsiębiorstw',
                'title'     => 'Produkcja, logistyka i złożone procesy pod pełną kontrolą.',
                'url'       => '/oprogramowanie/streamsoft-prestiz/',
                'cta'       => 'Zobacz stronę Streamsoft',
                'accent'    => '#2457D6',
                'products'  => implode(
                    PHP_EOL,
                    array(
                        'Streamsoft Prestiż|/oprogramowanie/streamsoft-prestiz/',
                        'Produkcja|/oprogramowanie/streamsoft-produkcja/',
                        'WMS i magazyn|/oprogramowanie/streamsoft-wms/',
                        'Logistyka|/oprogramowanie/streamsoft-logistyka/',
                        'Handel|/oprogramowanie/streamsoft-handel/',
                        'Finanse i księgowość|/oprogramowanie/streamsoft-finanse/',
                    )
                ),
                'reverse'   => false,
            ),
        );

        foreach ( $erp_defaults as $vendor_name => $fallback ) {
            $logo_value  = function_exists( 'get_field' ) ? get_field( "{$vendor_name}_logo" ) : null;
            $image_value = function_exists( 'get_field' ) ? get_field( "{$vendor_name}_image" ) : null;

            $title = function_exists( 'get_field' )
                ? get_field( "{$vendor_name}_title" )
                : '';

            $url = function_exists( 'get_field' )
                ? get_field( "{$vendor_name}_url" )
                : '';

            $cta = function_exists( 'get_field' )
                ? get_field( "{$vendor_name}_cta" )
                : '';

            $accent = function_exists( 'get_field' )
                ? get_field( "{$vendor_name}_accent" )
                : '';

            $products_raw = function_exists( 'get_field' )
                ? get_field( "{$vendor_name}_products" )
                : '';

            $suite = array(
                'name'      => $vendor_name,
                'logo'      => etos_get_image_url( $logo_value, $fallback['logo'] ),
                'image'     => etos_get_image_url( $image_value, $fallback['image'] ),
                'image_alt' => $fallback['image_alt'],
                'title'     => $title ?: $fallback['title'],
                'url'       => $url ?: $fallback['url'],
                'cta'       => $cta ?: $fallback['cta'],
                'accent'    => $accent ?: $fallback['accent'],
                'products'  => etos_parse_erp_products(
                    $products_raw ?: $fallback['products']
                ),
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
