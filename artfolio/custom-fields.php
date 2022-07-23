<?php

function artfolioMeta() {

    $screens = [ 'portfolio' ];
    foreach ( $screens as $screen ) {

        add_meta_box(
            'artwork-metadata',                 // Unique ID
            'Artwork Metadata',                 // Box title
            'artfolioMaterialFields',        // Content callback, must be of type callable
            $screen,                            // Post type
            'side'                              // Context
        );
    }
}

function artfolioMaterialFields( $post ) {

    wp_nonce_field( basename( __FILE__ ), 'artfolio_meta_nonce' );

    $year = get_post_meta( $post->ID, '_artwork_year_key', true );
    $medium = get_post_meta( $post->ID, '_artwork_medium_key', true );
    $material = get_post_meta( $post->ID, '_artwork_material_key', true );
    $edition = get_post_meta( $post->ID, '_artwork_edition_key', true );
    $dimensions = get_post_meta( $post->ID, '_artwork_dimensions_key', true );
    $description = get_post_meta( $post->ID, '_artwork_description_key', true );

?>

    <!-- Edition Field -->
    <br>
    <label for="artfolio-edition"> <?php esc_html_e( 'Edition:' ); ?></label>
    <br>
    <input type="text" name="artfolio_edition" id="artfolio-edition" value="<?php echo $edition; ?>">
    <br>

    <!-- Year Field -->
    <br>
    <label for="artfolio-year"> <?php esc_html_e( 'Year(s):' ); ?></label>
    <br>
    <input type="text" name="artfolio_year" id="artfolio-year" value="<?php echo $year; ?>">
    <br>

    <!-- Dimensions Field -->
    <br>
    <label for="artfolio-dimensions"> <?php esc_html_e( 'Dimensions:' ); ?></label>
    <br>
    <input type="text" name="artfolio_dimensions" id="artfolio-dimensions" value="<?php echo $dimensions; ?>">
    <br>

    <!-- Medium Field -->
    <br>
    <label for="artfolio-medium"> <?php esc_html_e( 'Medium(s):' ); ?></label>
    <br>
    <input type="text" name="artfolio_medium" id="artfolio-medium" value="<?php echo $medium; ?>">
    <br>

    <!-- Materials Field -->
    <br>
    <label for="artfolio-material"> <?php esc_html_e( 'Material(s):' ); ?></label>
    <br>
    <input type="text" name="artfolio_material" id="artfolio-material" value="<?php echo $material; ?>">
    <br>

    <!-- Description Field -->
    <br>
    <label for="artfolio-description"> <?php esc_html_e( 'Description:' ); ?></label>
    <br>
    <textarea type="textarea" name="artfolio_description" id="artfolio-description" value=""> <?php echo $description; ?> </textarea>
    <br>


<?php

}

add_action( 'add_meta_boxes', 'artfolioMeta' );