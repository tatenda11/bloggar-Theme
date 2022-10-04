<?php

/**
 * Add customization options for the top head
 * @see sepecification https://docs.google.com/document/d/1Vfcw6PI3f_Ef199JKUJ5gGW0AuR_vB3YBlN9QuE6FPg/edit
 * @author Tatenda Munenge
 * @since 1.0.1
 */

if(!function_exists('bloggar_header_options')){

    /**
     * @see https://developer.wordpress.org/reference/hooks/customize_register/
     * @param $manager WP_Customize_Manager
     * add custom options for the header section
     */
    function bloggar_header_options($manager){

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
        $manager->add_section('site_top_header',array(
            'title'=> __( 'Header section', 'bloggar' ),
            'priority' => 201
        ));

        /**
         * add settings to the section
         */
        $manager->add_setting( 'nav_bar_settings' );
        $manager->add_setting( 'nav_bar_color', array('default' => '#fff'));
        $manager->add_setting( 'nav_bar_link_color', array('default' => '#000') );
        $manager->add_setting( 'nav_bar_link_hover_color', array('default' => '#ccc'));
        $manager->add_setting('nav_bar_sticky', array('default' => false));

        /**
         * ===========================
         *  Header section controls                                                            =
         * ===========================
         */

        $manager->add_control( 'nav_bar_settings', array(
            'id'=> 'navbar_layout',
            'settings' => 'nav_bar_settings',
            'label'    => esc_html__( 'Site Menu Layout', 'bloggar' ),
            'section'  => 'site_top_header',
            'type'     => 'select',
            'choices'  => array(
                'logo_left',
                'logo_center',
                'logo_right'
            ),
            'priority' => 62,
        ));

        $manager->add_control( new WP_Customize_Color_Control(  $manager, 'nav_bar_color', array(
            'id'=> 'navbar_colors',
            'label' => esc_html__( 'Navbar Background Color', 'bloggar' ),
            'section' => 'site_top_header',
            'settings' => 'nav_bar_color'
        )));

        /**
         * ===========================
         *  Navbar links section controls                                                            =
         * ===========================
         */

        $manager->add_control( new WP_Customize_Color_Control(  $manager, 'nav_bar_link_color', array(
            'id'=> 'navbar_link_color',
            'label' => esc_html__( 'Navbar Link Color', 'bloggar' ),
            'section' => 'site_top_header',
            'settings' => 'nav_bar_link_color'
        )));

        $manager->add_control( new WP_Customize_Color_Control(  $manager, 'nav_bar_link_hover_color', array(
            'id'=> 'navbar_link_hover_color',
            'label' => esc_html__( 'Navbar Link Color', 'bloggar' ),
            'section' => 'site_top_header',
            'settings' => 'nav_bar_link_hover_color'
        )));




    }

    add_action( 'customize_register', 'bloggar_header_options' );
}
