<?php

/**
 * Enqueues custom styles inline
 * @author Tatenda Munenge
 * @since 1.0.1
 */
function bloggar_dynamic_css() {
    //header and top bar
    $nav_bar_color = esc_attr( get_theme_mod( 'nav_bar_color', '#fff' ) );
    $nav_bar_link_color =  esc_attr( get_theme_mod( 'nav_bar_link_color', '#fff' ) );
    $nav_bar_link_hover_color = esc_attr( get_theme_mod( 'nav_bar_link_hover_color', '#ccc' ) );
    $top_bar_color = esc_attr( get_theme_mod( 'top_bar_color', '#ccc' ) );
    //articles
    $archive_primary_color = esc_attr( get_theme_mod( 'archive_primary_color', '#fff' ) );
    $archive_text_color = esc_attr( get_theme_mod( 'archive_text_color', '#999' ) );
    $article_font =  esc_attr( get_theme_mod( 'archive_text_color', '#999' ) );
    $article_font_size =  esc_attr( get_theme_mod( 'article_font_size', 'Poppins' ) );
    $article_line_height =  esc_attr( get_theme_mod( 'article_line_height', 'Poppins' ) );
    $dynamic_css = "                
        body{ font: $article_font"." $article_font_size "." $article_font; line-height: {$article_line_height};} 
       .bloggar-header-section{ background-color:{$nav_bar_color}}
     ";
     wp_add_inline_style( 'blogger-style', $dynamic_css );
}
add_action( 'wp_enqueue_scripts', 'bloggar_dynamic_css' );
