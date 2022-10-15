<?php

/**
 * Add customization options for the top head
 * @see sepecification https://docs.google.com/document/d/1Vfcw6PI3f_Ef199JKUJ5gGW0AuR_vB3YBlN9QuE6FPg/edit
 * @author Tatenda Munenge
 * @since 1.0.1
 * @see https://developer.wordpress.org/themes/customize-api/customizer-objects/
 */

if(!function_exists('bloggar_blog_options')){

    /**
     * @see https://developer.wordpress.org/reference/hooks/customize_register/
     * @param $wp_customize WP_Customize_Manager
     * add custom options for the header section
     */
    function bloggar_blog_options($wp_customize){
      
        $wp_customize->add_section('blog_settings',array(
            'title'=> __( 'Blog Settings', 'bloggar' ),
            'priority' => 201
        ));

        /**
         * add settings to the section
         */
        $wp_customize->add_setting('archive_display_type', array('default' =>'grid'));
        $wp_customize->add_setting('show_featured_image', array('default' => true));
        $wp_customize->add_setting('show_excerpt', array('default' => false) );
        $wp_customize->add_setting('show_social_share', array('default' => false));
        $wp_customize->add_setting('show_categories', array('default' => false));
        $wp_customize->add_setting('show_author', array('default' => false));
        $wp_customize->add_setting('show_post_date', array('default' => false));
        $wp_customize->add_setting('archive_primary_color', array('default' => '#fff'));
        $wp_customize->add_setting('archive_text_color', array('default' => '#000'));
        $wp_customize->add_setting('article_layout', array('default' => 'standard'));
        $wp_customize->add_setting('article_font', array('default' => 'Poppins'));

        $wp_customize->add_control( 'archive_display_type', array(
            'id'=> 'archive_display_type_id',
            'settings' => 'archive_display_type',
            'label'    => esc_html__( 'Archive display style', 'bloggar' ),
            'section'  => 'blog_settings',
            'type'     => 'select',
            'choices'  => array(
                'stacked' => 'Stacked full width layout',
                'grid_layout' => 'Grid layout'
            )
        ));
        /**showing featured image */
        $wp_customize->add_control( 'show_featured_image', array(
            'type' => 'checkbox',
            'section' => 'blog_settings', // Required, core or custom.
            'settings' => 'show_featured_image',
            'label' => esc_html__( 'Show featured image', 'bloggar' ),
            'description' => __( 'Turn on and off featured image on blog archieve page', 'bloggar' ),
        ));

        /**showing post except*/
        $wp_customize->add_control( 'show_excerpt', array(
            'type' => 'checkbox',
            'section' => 'blog_settings', // Required, core or custom.
            'settings' => 'show_excerpt',
            'label' => esc_html__( 'Show article excerpt', 'bloggar' ),
            'description' => __( 'Turn on and off article excerpt on blog archieve page', 'bloggar' ),
        ));

         /**showing post social media share*/
         $wp_customize->add_control( 'show_social_share', array(
            'type' => 'checkbox',
            'section' => 'blog_settings', // Required, core or custom.
            'settings' => 'show_social_share',
            'label' => esc_html__( 'Show social share links', 'bloggar' ),
            'description' => __( 'Turn on and off social share links', 'bloggar' ),
        ));

        /**showing categories*/
        $wp_customize->add_control( 'show_categories', array(
            'type' => 'checkbox',
            'section' => 'blog_settings', // Required, core or custom.
            'settings' => 'show_categories',
            'label' => esc_html__( 'Show post category', 'bloggar' ),
            'description' => __( 'Turn on and off post category', 'bloggar' ),
        ));

        /**showing post date*/
        $wp_customize->add_control( 'show_post_date', array(
            'type' => 'checkbox',
            'section' => 'blog_settings', // Required, core or custom.
            'settings' => 'show_post_date',
            'label' => esc_html__( 'Show post date', 'bloggar' ),
            'description' => __( 'Turn on and off post date', 'bloggar' ),
        ));

        /**archive text primary color*/
        $wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'archive_primary_color', array(
            'label' => esc_html__( 'Archive primary color', 'bloggar' ),
            'section' => 'blog_settings',
            'settings' => 'archive_primary_color',
            'description' => __( 'Set archive card background color', 'bloggar' )
        )));

        /**archive heading text color */
        $wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'archive_text_color', array(
            'label' => esc_html__( 'Change archive heading color', 'bloggar' ),
            'section' => 'blog_settings',
            'settings' => 'archive_text_color',
            'description' => __( 'Set archive heading color', 'bloggar' )
        )));

        /**article layout  */
        $wp_customize->add_control( 'article_layout', array(
            'settings' => 'article_layout',
            'label'    => esc_html__( 'Article layout', 'bloggar' ),
            'section'  => 'blog_settings',
            'type'     => 'select',
            'choices'  => array(
                'layout_one' => 'Layout one',
                'layout_two' => 'Layout two'
            )
        ));

          /**fonts */
          $wp_customize->add_control( 'article_font', array(
            'settings' => 'article_font',
            'label'    => esc_html__( 'Choose Font', 'bloggar' ),
            'section'  => 'blog_settings',
            'type'     => 'select',
            'choices'  => array(
                'Roboto'     => 'Roboto',
                'Raleway'    => 'Raleway',
                'Poppins'    => 'Poppins',
                'Noto Serif' => 'Noto Serif',
                'Arial'      => 'Arial',
                'Lato'       => 'Lato',
                'Inika'      => 'Inika',
            )
        ));
    }

    add_action( 'customize_register', 'bloggar_blog_options' );
}
