<?php

// Declares Custom Post Type (Displayed in Dashboard Sidebar)
    function artworkCustomPostType(){

        register_post_type( 'portfolio', [
            'labels' => [
				'name'          => 'Portfolio',
				'singular_name' => 'Potfolio',
            ],
	    'public'                => true,
	    'has_archive'           => true,
	    'menu_icon'             => 'dashicons-admin-customizer',
	    'menu_position'         => 4,
	    'has_archive'           => true,
        'taxonomy'              => 'Artfolio CPT'
        ]);

    }

    add_action( 'init', 'artworkCustomPostType' );

        // Custom Taxonomy for Artwork Mediums (As Categories)
        function mediumsCustomTaxonomy() {

            $plural = 'Mediums';
            $singular = 'Medium';
    
            $labels = [
                'menu_name'                     => __( $plural ),
                'name'                          => _x( $plural, ' Taxonomy General Name'),
                'singular_name'                 => _x( $singular, ' Taxonomy Singular Name'  ),
                'search_items'                  => 'Search ' . $plural,
                'popular_items'                 => 'Popular ' . $plural,
                'all_items'                     => 'All ' . $plural,
                'parent_item'                   => null,
                'parent_item_colon'             => null,
                'edit_item'                     => 'Edit ' . $singular,
                'update_item'                   => 'Update ' . $singular,
                'add_new_item'                  => 'Add New ' . $singular,
                'new_item_name'                 => 'New ' . $singular . ' Name',
                'add_or_remove_items'           => 'Add or remove ' . $plural,
                'choose_from_most_used'         => 'Choose from the most used ' . $plural,
                'not_found'                     => 'No ' . $plural . '  found.',
                'separate_items_with_commas'    => 'Separate ' . $plural . ' with commas',
            ];
    
            $mediums = [
                'labels'            => $labels,
                'hierarchical'      => true,
                'show_ui'           => true,
                'show_admin_column' => true,
                'query_var'         => true,
                'rewrite'           => [ 'slug' => 'medium' ],
            ];
    
                register_taxonomy( 'medium', 'portfolio', $mediums );
    
        }
    
         // Custom Taxonomy for Artwork Production Year (As Tags)
        function yearsCustomTaxonomy() {
    
            $plural = 'Years';
            $singular = ' Year';
    
            $labels = [
                'menu_name'                     => __( $plural ),
                'name'                          => _x( $singular, ' Taxonomy General Name'),
                'singular_name'                 => _x( $singular, ' Taxonomy Singular Name'  ),
                'search_items'                  => 'Search ' . $plural,
                'popular_items'                 => 'Popular ' . $plural,
                'all_items'                     => 'All ' . $plural,
                'parent_item'                   => null,
                'parent_item_colon'             => null,
                'edit_item'                     => 'Edit ' . $singular,
                'update_item'                   => 'Update ' . $singular,
                'add_new_item'                  => 'Add New ' . $singular,
                'new_item_name'                 => 'New ' . $singular . ' Name',
                'add_or_remove_items'           => 'Add or remove ' . $plural,
                'choose_from_most_used'         => 'Choose from the most used ' . $plural,
                'not_found'                     => 'No ' . $plural . '  found.',
                'separate_items_with_commas'    => 'Separate ' . $plural . ' with commas',
            ];
    
            $years = [
                'labels'            => $labels,
                'hierarchical'      => false,
                'show_ui'           => true,
                'show_admin_column' => true,
                'query_var'         => true,
                'rewrite'           => [ 'slug' => 'year' ],
            ];
    
                register_taxonomy( 'year', 'portfolio', $years );
    
        }
    
    add_action( 'init', 'mediumsCustomTaxonomy' );
    add_action( 'init', 'yearsCustomTaxonomy' );