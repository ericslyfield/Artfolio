<?php

/**
 * 
 * @package ArtFolio
 * 
 */

/*
Plugin Name: ArtFolio
Plugin URI: http://nonarchival.com
Description: A Custom Post Type Manager for Art and Artists.
Version: 0.0.1
Author: nonarchival
Author URI: http://nonarchival.com
License: GPLv2 or Later
Text Domain: ArtFolio
*/

/*
Copyright (C) 2021 nonarchival

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/


// Kills program if plugin is accessesed outside of Wordpress
defined( 'ABSPATH' ) or die( 'Please don\t do that...' );

// Includes

// Require

require_once (plugin_dir_path( __FILE__ ) . 'custom-post.php' );
require_once (plugin_dir_path( __FILE__ ) . 'custom-fields.php' );


class ArtFolio {

    function __construct(){

    add_action( 'save_post', [ $this, 'artfolioYearSave' ] );
    add_action( 'save_post', [ $this, 'artfolioMaterialSave' ] );
    add_action( 'save_post', [ $this, 'artfolioMediumSave' ] );
    add_action( 'save_post', [ $this, 'artfolioEditionSave' ] );
    add_action( 'save_post', [ $this, 'artfolioDimensionSave' ] );
    add_action( 'save_post', [ $this, 'artfolioDescriptionSave' ] );

    }

    // On Activation...
    function activate(){

        // Generate CPT method from within this class
        // $this->artworkCustomPostType();
        // $this->artworkCustomTaxonomy();

        // Refresh Database
        flush_rewrite_rules();

    }

    // On Deactivation...
    function deactivate(){

        // Refresh Database
        flush_rewrite_rules();

    }


    function artfolioYearSave( $post_id ) {
        if ( array_key_exists( 'artfolio_year', $_POST ) ) {
            update_post_meta(
                $post_id,
                '_artwork_year_key',
                $_POST['artfolio_year']
            );
        }

    }

    function artfolioMaterialSave( $post_id ) {
        if ( array_key_exists( 'artfolio_material', $_POST ) ) {
            update_post_meta(
                $post_id,
                '_artwork_material_key',
                $_POST['artfolio_material']
            );
        }

    }

    function artfolioMediumSave( $post_id ) {
        if ( array_key_exists( 'artfolio_medium', $_POST ) ) {
            update_post_meta(
                $post_id,
                '_artwork_medium_key',
                $_POST['artfolio_medium']
            );
        }

    }

    function artfolioEditionSave( $post_id ) {
        if ( array_key_exists( 'artfolio_edition', $_POST ) ) {
            update_post_meta(
                $post_id,
                '_artwork_edition_key',
                $_POST['artfolio_edition']
            );
        }
    }

    function artfolioDimensionSave( $post_id ) {
        if ( array_key_exists( 'artfolio_dimensions', $_POST ) ) {
            update_post_meta(
                $post_id,
                '_artwork_dimensions_key',
                $_POST['artfolio_dimensions']
            );
        }
    }

    function artfolioDescriptionSave( $post_id ) {
        if ( array_key_exists( 'artfolio_description', $_POST ) ) {
            update_post_meta(
                $post_id,
                '_artwork_description_key',
                $_POST['artfolio_description']
            );
        }
    }
}


// Admin CSS
function artfolioCSS() {

    $url = plugins_url( 'css/artfolio.css', __FILE__ );

    echo "<link rel='stylesheet' type='text/css' href='$url' />\n";
}

add_action('admin_head', 'artfolioCSS');

    
// If class exists create a new instance of the class
if ( class_exists( 'ArtFolio' )) {

    $ArtFolio = new ArtFolio();

}

// Activation

register_activation_hook( __FILE__, [$ArtFolio, 'activate'] );

// Deactivation

register_activation_hook( __FILE__, [$ArtFolio, 'deactivate'] );