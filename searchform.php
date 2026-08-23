<?php
/**
 * Site search form.
 *
 * @package ETOS
 */

defined( 'ABSPATH' ) || exit;

$search_field_id = wp_unique_id( 'etos-search-field-' );
?>

<form
    class="etos-search-form"
    role="search"
    method="get"
    action="<?php echo esc_url( home_url( '/' ) ); ?>"
>
    <label
        class="screen-reader-text"
        for="<?php echo esc_attr( $search_field_id ); ?>"
    >
        <?php esc_html_e( 'Szukaj w serwisie', 'etos' ); ?>
    </label>

    <div class="input-group">
        <input
            class="form-control"
            id="<?php echo esc_attr( $search_field_id ); ?>"
            type="search"
            name="s"
            value="<?php echo esc_attr( get_search_query() ); ?>"
            placeholder="<?php esc_attr_e( 'Czego szukasz?', 'etos' ); ?>"
        >

        <button
            class="btn btn-primary"
            type="submit"
        >
            <?php esc_html_e( 'Szukaj', 'etos' ); ?>
        </button>
    </div>
</form>
