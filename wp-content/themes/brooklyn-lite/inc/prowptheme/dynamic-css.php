<?php
/**
 * Dynamic css
 *
 * @since Brooklyn Lite 1.0.6
 */
if (!function_exists('brooklyn_lite_dynamic_css')) :

    function brooklyn_lite_dynamic_css(){
        global $brooklyn_lite_theme_options;

        /* Color Options Options */
        $brooklyn_lite_primary_color  = esc_attr(get_theme_mod( 'color_primary' ));
        
        $custom_css = '';

        //Primary Background Color
        if (!empty($brooklyn_lite_primary_color)) {
            $custom_css .= "
            .comment-form input[type='submit'], .comment-content a.reply-btn,
            aside .widget-title:before{ 
                background-color: ". $brooklyn_lite_primary_color."; 
            }";

        }

        //Primary Color
        if (!empty($brooklyn_lite_primary_color)) {
            $custom_css .= "
            .author-details a.author-link, .respond a,
            .post-navigation a,
            .navbar .navbar-collapse .navbar-nav li.current-menu-item a{ 
                color : ". $brooklyn_lite_primary_color." !important; 
            }";
        }


        wp_add_inline_style('brooklyn-lite-style', $custom_css);
    }
endif;
add_action('wp_enqueue_scripts', 'brooklyn_lite_dynamic_css', 99);