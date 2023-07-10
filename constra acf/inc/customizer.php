<?php

function header_customize_options( $wp_customize ) {

    // Add logo Option.

    $wp_customize->add_setting( 'custom_header_logo', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'custom_header_logo', array(
        'label'    => __( 'Logo', 'constratheme' ),
        'section'  => 'title_tagline',
        'settings' => 'custom_header_logo',
    ) ) );

    
    // Panel for Header Customization

    $panel_id = 'header_customize_options';
    $panel_title = 'Header Options';
    $panel_description = 'Make changes to the header';

    $wp_customize->add_panel(
        $panel_id,
        array(
            'title'       => $panel_title,
            'description' => $panel_description,
            'priority'    => 30,
        )
    );


    // 1. Top Bar Section settings and Control

    $wp_customize->add_section(
        'top_bar',
        array(
            'title' => __( 'Top Bar', 'constratheme' ),
            'panel' => $panel_id,
        ) 
    );


    $wp_customize->add_setting( 'topbar_visibility', array(
        'default' => 'show',
        'transport' => 'refresh',
    ) );


    $wp_customize->add_control( 'topbar_visibility', array(
        'label'    => __( 'Show Top Bar', 'constratheme' ),
        'section'  => 'top_bar',
        'settings' => 'topbar_visibility',
        'type'     => 'radio',
        'choices'  => array(
            'show' => __( 'Yes', 'constratheme' ),
            'hide' => __( 'No', 'constratheme' ),
        ),
    ) );


    $wp_customize->add_setting(
        'top_bar_location',
        array(
            'default'           => '9051 Applicon Soft, Incorporate, USA',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );


    $wp_customize->add_control(
        'top_bar_location',
        array(
            'label'    => __( 'Location', 'constratheme' ),
            'section'  => 'top_bar',
            'settings' => 'top_bar_location',
            'type'     => 'text',
        )
    );

    // Social Media Links


    $wp_customize->add_setting(
        'top_bar_facebook_link',
        array(
            'default'           => 'https://www.facebook.com/Applicontech',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'top_bar_facebook_link',
        array(
            'label'    => __( 'Facebook Link', 'constratheme' ),
            'section'  => 'top_bar',
            'settings' => 'top_bar_facebook_link',
            'type'     => 'url',
        )
    );

    $wp_customize->add_setting(
        'top_bar_twitter_link',
        array(
            'default'           => 'https://www.instagram.com/applicontech/',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'top_bar_twitter_link',
        array(
            'label'    => __( 'Twitter Link', 'constratheme' ),
            'section'  => 'top_bar',
            'settings' => 'top_bar_twitter_link',
            'type'     => 'url',
        )
    );

    $wp_customize->add_setting(
        'top_bar_instagram_link',
        array(
            'default'           => 'https://www.linkedin.com/company/applicontech',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'top_bar_instagram_link',
        array(
            'label'    => __( 'Instagram Link', 'constratheme' ),
            'section'  => 'top_bar',
            'settings' => 'top_bar_instagram_link',
            'type'     => 'url',
        )
    );


    $wp_customize->add_setting(
        'top_bar_github_link',
        array(
            'default'           => 'https://www.linkedin.com/company/applicontech',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'top_bar_github_link',
        array(
            'label'    => __( 'GitHub Link', 'constratheme' ),
            'section'  => 'top_bar',
            'settings' => 'top_bar_github_link',
            'type'     => 'url',
        )
    );


    // Main Header

    $wp_customize->add_section(
        'constra_header',
        array(
            'title' => __( 'Header', 'constratheme' ),
            'panel' => $panel_id,
        ) 
    );


    $wp_customize->add_setting(
        'header_mobile_number',
        array(
            'default'           => '+1 564 678 7897',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );


    $wp_customize->add_control(
        'header_mobile_number',
        array(
            'label'    => __( 'Mobile', 'constratheme' ),
            'section'  => 'constra_header',
            'settings' => 'header_mobile_number',
            'type'     => 'text',
        )
    );


    $wp_customize->add_setting(
        'header_email',
        array(
            'default'           => 'contact@applicontech.com',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );


    $wp_customize->add_control(
        'header_email',
        array(
            'label'    => __( 'Email', 'constratheme' ),
            'section'  => 'constra_header',
            'settings' => 'header_email',
            'type'     => 'text',
        )
    );


    $wp_customize->add_setting(
        'header_global_certificate',
        array(
            'default'           => 'ISO 9001:2017',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );


    $wp_customize->add_control(
        'header_global_certificate',
        array(
            'label'    => __( 'Global Certificate', 'constratheme' ),
            'section'  => 'constra_header',
            'settings' => 'header_global_certificate',
            'type'     => 'text',
        )
    );


    $wp_customize->add_setting(
        'header_button_anchor',
        array(
            'default'           => 'Get A Quote',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );


    $wp_customize->add_control(
        'header_button_anchor',
        array(
            'label'    => __( 'Button Anchor', 'constratheme' ),
            'section'  => 'constra_header',
            'settings' => 'header_button_anchor',
            'type'     => 'text',
        )
    );


    $wp_customize->add_setting(
        'header_button_link',
        array(
            'default'           => 'https://mywebsite.com/get-quote/',
            'sanitize_callback' => 'esc_url_raw',
        )
    );


    $wp_customize->add_control(
        'header_button_link',
        array(
            'label'    => __( 'Button Link', 'constratheme' ),
            'section'  => 'constra_header',
            'settings' => 'header_button_link',
            'type'     => 'url',
        )
    );

}


// Footer Menu Sections

function footer_customize_options( $wp_customize ) {

    $wp_customize->add_section( 'footer_options', array(
        'title'    => __( 'Footer Options', 'constratheme' ),
        'priority' => 31,
    ) );

    // Add logo Option.
    $wp_customize->add_setting( 'custom_footer_logo', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'custom_footer_logo', array(
        'label'    => __( 'Logo', 'constratheme' ),
        'description' => 'Recommended size (320px X 60x)',
        'section'  => 'footer_options',
        'settings' => 'custom_footer_logo',
    ) ) );


    $wp_customize->add_setting(
        'footer_about_company',
        array(
            'default'           => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor inci done idunt ut labore et dolore magna aliqua.',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );


    $wp_customize->add_control(
        'footer_about_company',
        array(
            'label'    => __( 'About Company', 'constratheme' ),
            'section'  => 'footer_options',
            'settings' => 'footer_about_company',
            'type'     => 'textarea',
        )
    );


    $wp_customize->add_setting(
        'footer_working_hours_text',
        array(
            'default'           => 'We work 7 days a week, every day excluding major holidays. Contact us if you have any questions.',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );


    $wp_customize->add_control(
        'footer_working_hours_text',
        array(
            'label'    => __( 'Working Hours Text', 'constratheme' ),
            'section'  => 'footer_options',
            'settings' => 'footer_working_hours_text',
            'type'     => 'textarea',
        )
    );


    $wp_customize->add_setting(
        'footer_working_hours_detail',
        array(
            'default'           => '<br>Monday - Friday: <span class="text-right">10:00 - 16:00 </span> <br> Saturday: <span class="text-right">12:00 - 15:00</span><br> Sunday: <span class="text-right">09:00 - 12:00</span>',
        )
    );


    $wp_customize->add_control(
        'footer_working_hours_detail',
        array(
            'label'    => __( 'Working Hours Details', 'constratheme' ),
            'section'  => 'footer_options',
            'settings' => 'footer_working_hours_detail',
            'type'     => 'textarea',
        )
    );


    $wp_customize->add_setting(
        'footer_column_title',
        array(
            'default'           => 'Services',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );


    $wp_customize->add_control(
        'footer_column_title',
        array(
            'label'       => __( 'Footer Right Column Title', 'constratheme' ),
            'description' => 'You can add menu from admin panel on footer location.',
            'section'     => 'footer_options',
            'settings'    => 'footer_column_title',
            'type'        => 'text',
        )
    );



    $wp_customize->add_setting(
        'footer_copyrights_text',
        array(
            'default'           => 'Copyright © 2023, Developed by AppliconSoft',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );


    $wp_customize->add_control(
        'footer_copyrights_text',
        array(
            'label'       => __( 'Footer Right Column Title', 'constratheme' ),
            'section'     => 'footer_options',
            'settings'    => 'footer_copyrights_text',
            'type'        => 'textarea',
        )
    );

}