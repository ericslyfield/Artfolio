<?php

/**
 *  ArtFolio Uninstaller
 * 
 *  @package ArtFolio
 */

 // Kills program if plugin is accessesed outside of Wordpress
 if ( ! defined ( 'WP_UNINSTALL_PLUGIN' ) ) {

     die;

 }

// Clear Plugin data stored in Database
$artworks = get_posts( [ 'post_type' => 'artwork', 'numberposts' => -1 ] );

foreach( $artworks as $artwork ) {

    wp_delete_post( $artwork->ID, true );

}

