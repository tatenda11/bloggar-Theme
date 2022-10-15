<?php

/**
 * Add customization options for the top head
 * @see sepecification https://docs.google.com/document/d/1Vfcw6PI3f_Ef199JKUJ5gGW0AuR_vB3YBlN9QuE6FPg/edit
 * @author Tatenda Munenge
 * @since 1.0.1
 * @see https://developer.wordpress.org/themes/customize-api/customizer-objects/
 */

if(!function_exists('bloggar_header_options')){

    /**
     * @see https://developer.wordpress.org/reference/hooks/customize_register/
     * @param $wp_customize WP_Customize_Manager
     * add custom options for the header section
     */
    function bloggar_header_options($wp_customize){

        /**
         * 1. Logo and menu positions
         * 2. Background color
         * 3. Link primary, active and hover color
         * 4. Top bar activation
         * 5. Top bar colors and backgrounds
         * 6. Content width boxed and full width
         */

        /**
         * define the section
         */
        $wp_customize->add_section('site_top_header',array(
            'title'=> __( 'Header section', 'bloggar' ),
            'priority' => 201
        ));

        /**
         * add settings to the section
         */
        $wp_customize->add_setting( 'nav_bar_settings', array('default' =>'logo_left'));
        $wp_customize->add_setting( 'nav_bar_color', array('default' => '#fff'));
        $wp_customize->add_setting( 'nav_bar_link_color', array('default' => '#000') );
        $wp_customize->add_setting( 'nav_bar_link_hover_color', array('default' => '#ccc'));
        $wp_customize->add_setting('nav_bar_sticky', array('default' => false));
        $wp_customize->add_setting('enable_top_bar', array('default' => true));
        $wp_customize->add_setting( 'top_bar_color', array('default' => '#000') );
        $wp_customize->add_setting( 'top_bar_text_color', array('default' => '#fff') );

        /**
         * ===========================
         *  Header section controls                                                            =
         * ===========================
         */

        $wp_customize->add_control( 'nav_bar_settings', array(
            'id'=> 'navbar_layout',
            'settings' => 'nav_bar_settings',
            'label'    => esc_html__( 'Site Menu Layout', 'bloggar' ),
            'section'  => 'site_top_header',
            'type'     => 'select',
            'choices'  => array(
                'logo_left' => 'Logo left',
                'logo_center' => 'Logo center',
                'logo_right' => 'Logo right'
            ),
            'priority' => 62,
        ));

        $wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'nav_bar_color', array(
            'id'=> 'navbar_colors',
            'label' => esc_html__( 'Navbar Background Color', 'bloggar' ),
            'section' => 'site_top_header',
            'settings' => 'nav_bar_color',
            'description' => __( 'Navbar background color', 'bloggar' )
        )));

        $wp_customize->add_control( 'nav_bar_sticky', array(
            'type' => 'checkbox',
            'priority' => 10, // Within the section.
            'section' => 'site_top_header', // Required, core or custom.
            'settings' => 'nav_bar_sticky',
            'label' => esc_html__( 'Enable Sticky Navbar', 'bloggar' ),
            'description' => __( 'Enables sticky navbar', 'bloggar' ),
        ));

        /**
         * ===========================
         *  Navbar links section controls                                                            =
         * ===========================
         */

        $wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'nav_bar_link_color', array(
            'id'=> 'navbar_link_color',
            'label' => esc_html__( 'Navbar Link Color', 'bloggar' ),
            'section' => 'site_top_header',
            'settings' => 'nav_bar_link_color',
            'description' => __( 'Navbar link primary color', 'bloggar' )
        )));

        $wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'nav_bar_link_hover_color', array(
            'id'=> 'navbar_link_hover_color',
            'label' => esc_html__( 'Navbar Link Hover Color', 'bloggar' ),
            'section' => 'site_top_header',
            'settings' => 'nav_bar_link_hover_color',
            'description' => __( 'Navbar link hover color', 'bloggar' )
        )));


        /***
         * ================================
         * Top Bar
         * ============================
         */

        $wp_customize->add_control( 'enable_top_bar', array(
            'type' => 'checkbox',
            'priority' => 10, // Within the section.
            'section' => 'site_top_header', // Required, core or custom.
            'settings' => 'enable_top_bar',
            'label' => esc_html__( 'Enable Top Bar', 'bloggar' ),
            'description' => __( 'Enable or disable topbar', 'bloggar' ),
        ));
        
        $wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'top_bar_color', array(
            'id'=> 'navbar_link_hover_color',
            'label' => esc_html__( 'Top bar background color', 'bloggar' ),
            'section' => 'site_top_header',
            'settings' => 'top_bar_color',
            'description' => __( 'Adds top bar background color', 'bloggar' )
        )));

        $wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'top_bar_text_color', array(
            'id'=> 'navbar_link_hover_color',
            'label' => esc_html__( 'Top bar text color', 'bloggar' ),
            'section' => 'site_top_header',
            'settings' => 'top_bar_text_color',
            'description' => __( 'Adds top bar text color', 'bloggar' )
        )));
    }

    add_action( 'customize_register', 'bloggar_header_options' );
}
