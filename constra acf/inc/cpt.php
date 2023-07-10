<?php

// Our custom post type function
function create_posttype() {
  
    register_post_type( 'projects',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Projects' ),
                'singular_name' => __( 'Project' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'projects'),
            'show_in_rest' => true,
            'has_archive'  => true,
            'taxonomies' => array( 'category', 'post_tag' ),
            'supports' => array( 'title', 'editor', 'author', 'thumbnail' ),
        )
    );

    register_post_type( 'team',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Team' ),
                'singular_name' => __( 'Team' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'team'),
            'show_in_rest' => true,
            'has_archive'  => true,
            'taxonomies' => array( 'category', 'post_tag' ),
            'supports' => array( 'title', 'editor', 'thumbnail' ),
        )
    );

    register_post_type( 'services',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Services' ),
                'singular_name' => __( 'service' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'services'),
            'show_in_rest' => true,
            'has_archive'  => true,
            'taxonomies' => array( 'category', 'post_tag' ),
            'supports' => array( 'title', 'editor', 'thumbnail' ),
        )
    );

}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );

?>