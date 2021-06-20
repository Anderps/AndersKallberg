<?php
/**
 * Brooklyn Lite Theme Customizer
 *
 * @package Brooklyn Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function brooklyn_lite_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';



	 //=============================================================
	 // Remove header image and widgets option from theme customizer
	 //=============================================================
	 $wp_customize->remove_control("header_image");

	 //=============================================================
	 // Remove Colors, Background image, and Static front page 
	 // option from theme customizer     
	 //=============================================================
	 $wp_customize->remove_section("colors");
	 $wp_customize->remove_section("background_image");
	 $wp_customize->remove_section("static_front_page");


	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'brooklyn_lite_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'brooklyn_lite_customize_partial_blogdescription',
			)
		);
	}


	$wp_customize->add_section( 'theme_detail', array(
        'title'    => __( 'About Theme', 'brooklyn-lite' ),
        'priority' => 9
    ) );

    
    $wp_customize->add_setting( 'upgrade_text', array(
        'default' => '',
        'sanitize_callback' => '__return_false'
    ) );


    $wp_customize->add_panel( 'brooklyn_lite_panel', array(
        'priority' => 10,
        'capability' => 'edit_theme_options',
        'title' => __( 'Brooklyn Theme Options', 'brooklyn-lite' ),
    ) );

}
add_action( 'customize_register', 'brooklyn_lite_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function brooklyn_lite_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function brooklyn_lite_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function brooklyn_lite_customize_preview_js() {
	wp_enqueue_script( 'brooklyn-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), BROOKLYN_LITE_VER, true );
}
add_action( 'customize_preview_init', 'brooklyn_lite_customize_preview_js' );


/**
 * Kirki
 */
if ( !class_exists( 'Kirki' ) ) return;
require get_template_directory() . '/inc/customizer/kirki/include-kirki.php';
require get_template_directory() . '/inc/customizer/kirki/class-prowptheme-kirki.php';

/**
 * Add Kirki config
 */
ProWPTheme_Kirki::add_config( 'brooklyn_lite', array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'theme_mod',
) );

/**
 * Load option files
 */
require get_template_directory() . '/inc/customizer/options/section-blog.php';
require get_template_directory() . '/inc/customizer/options/section-header.php';
require get_template_directory() . '/inc/customizer/options/section-footer.php';
require get_template_directory() . '/inc/customizer/options/section-typography.php';
require get_template_directory() . '/inc/customizer/options/section-colors.php';