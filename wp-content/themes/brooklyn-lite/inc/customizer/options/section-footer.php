<?php
/**
 * Footer Customizer panel
 *
 * @package Brooklyn Lite
 */


ProWPTheme_Kirki::add_section( 'brooklyn_lite_section_footer', array(
    'title'       	 => __( 'Footer Settings', 'brooklyn-lite' ),
    'panel'			 => 'brooklyn_lite_panel',
    'priority'       => 5,
) );


ProWPTheme_Kirki::add_field( 'brooklyn_lite', array(
	'type'        => 'textarea',
	'settings'    => 'copyright_text',
	'label'    => esc_html__( 'Copyright Text', 'brooklyn-lite' ),
	'description' => esc_html__( 'Copyright Text', 'brooklyn-lite' ),
	'section'     => 'brooklyn_lite_section_footer',
	'default'     => __('&copy; 2020 All Rights Reserved','brooklyn-lite'),
	'sanitize_callback' => 'sanitize_text_field',
	'priority'    => 10,
) );

ProWPTheme_Kirki::add_field( 'brooklyn_lite', array(
	'type'        => 'url',
	'settings'    => 'brooklyn_lite_facebook',
	'label'       => esc_html__( 'Facebook URL', 'brooklyn-lite' ),
	'section'     => 'brooklyn_lite_section_footer',
	'sanitize_callback' => 'sanitize_text_field',
	'priority'    => 10,
) );

ProWPTheme_Kirki::add_field( 'brooklyn_lite', array(
	'type'        => 'url',
	'settings'    => 'brooklyn_lite_twitter',
	'label'       => esc_html__( 'Twitter URL', 'brooklyn-lite' ),
	'section'     => 'brooklyn_lite_section_footer',
	'sanitize_callback' => 'sanitize_text_field',
	'priority'    => 10,
) );

ProWPTheme_Kirki::add_field( 'brooklyn_lite', array(
	'type'        => 'url',
	'settings'    => 'brooklyn_lite_skype',
	'label'       => esc_html__( 'Skype URL', 'brooklyn-lite' ),
	'section'     => 'brooklyn_lite_section_footer',
	'sanitize_callback' => 'sanitize_text_field',
	'priority'    => 10,
) );

ProWPTheme_Kirki::add_field( 'brooklyn_lite', array(
	'type'        => 'url',
	'settings'    => 'brooklyn_lite_instagram',
	'label'       => esc_html__( 'Instagram URL', 'brooklyn-lite' ),
	'section'     => 'brooklyn_lite_section_footer',
	'sanitize_callback' => 'sanitize_text_field',
	'priority'    => 10,
) );


ProWPTheme_Kirki::add_field( 'brooklyn_lite', array(
	'type'        => 'url',
	'settings'    => 'brooklyn_lite_dribble',
	'label'       => esc_html__( 'Dribbble URL', 'brooklyn-lite' ),
	'section'     => 'brooklyn_lite_section_footer',
	'sanitize_callback' => 'sanitize_text_field',
	'priority'    => 10,
) );


ProWPTheme_Kirki::add_field( 'brooklyn_lite', array(
	'type'        => 'url',
	'settings'    => 'brooklyn_lite_vimeo',
	'label'       => esc_html__( 'Vimeo URL', 'brooklyn-lite' ),
	'section'     => 'brooklyn_lite_section_footer',
	'sanitize_callback' => 'sanitize_text_field',
	'priority'    => 10,
) );



//Santize function
function brooklyn_lite_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}