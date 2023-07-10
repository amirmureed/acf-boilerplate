<?php

function enqueue_styles() {
    wp_enqueue_style('bootsrap',get_stylesheet_directory_uri().'/plugins/bootstrap/bootstrap.min.css');
    wp_enqueue_style('fontawesome',get_stylesheet_directory_uri().'/plugins/fontawesome/css/all.min.css');
    wp_enqueue_style('animation',get_stylesheet_directory_uri().'/plugins/animate-css/animate.css');
    wp_enqueue_style('slick-css',get_stylesheet_directory_uri().'/plugins/slick/slick.css');
    wp_enqueue_style('slick-theme-css',get_stylesheet_directory_uri().'/plugins/slick/slick-theme.css');
    wp_enqueue_style('colorbox',get_stylesheet_directory_uri().'/plugins/colorbox/colorbox.css');
    wp_enqueue_style('style-css',get_stylesheet_directory_uri().'/css/style.css');

    wp_enqueue_script('jquery-library', get_template_directory_uri() . '/plugins/jQuery/jquery.min.js', array(), '1.0.0', true);
    wp_enqueue_script('bootstrap-jquery', get_template_directory_uri() . '/plugins/bootstrap/bootstrap.min.js', array(), '1.0.0', true);
    wp_enqueue_script('slick-carousel', get_template_directory_uri() . '/plugins/slick/slick.min.js', array(), '1.0.0', true);
    wp_enqueue_script('slick-animation', get_template_directory_uri() . '/plugins/slick/slick-animation.min.js', array(), '1.0.0', true);
    wp_enqueue_script('colorbox', get_template_directory_uri() . '/plugins/colorbox/jquery.colorbox.js', array(), '1.0.0', true);
    wp_enqueue_script('shuffle', get_template_directory_uri() . '/plugins/shuffle/shuffle.min.js', array(), '1.0.0', true);
    wp_enqueue_script('map-api', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCPonWXKK1TO13PryXAsoIjMR_MlhPCPmQ', array(), '1.0.0', true);
    wp_enqueue_script('map-plugin', get_template_directory_uri() . '/plugins/google-map/map.js', array(), '1.0.0', true);
    wp_enqueue_script('main-stylesheet', get_template_directory_uri() . '/js/script.js', array(), '1.0.0', true);
}

?>