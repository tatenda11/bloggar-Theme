<?php
/**
 * @since 1.0.1
 * @package Blogger theme
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( ! function_exists( 'blogger_register_custom_controls' ) ){
    
    /**
     * Registers theme custom control for the customizer
     * @param  $wp_customize WP_Customize_Manager
     * @see https://developer.wordpress.org/reference/hooks/customize_register/
     */
    function blogger_register_custom_controls( $wp_customize ) {
        require_once get_template_directory() . '/inc/Blogger_Controls.php';
        $wp_customize->register_control_type( 'Blogger_Toggle_Control' );

    }
    add_action( 'customize_register', 'blogger_register_custom_controls' );
}
