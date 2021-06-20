<?php
/**
 * Header Customizer panel
 *
 * @package Brooklyn Lite
 */

//Header Menu
ProWPTheme_Kirki::add_section( 'brooklyn_lite_section_menu', array(
    'title'       	 => __( 'Header Layout', 'brooklyn-lite' ),
    'panel'			 => 'brooklyn_lite_panel',
    'priority'       => 1,
) );
ProWPTheme_Kirki::add_field( 'brooklyn_lite', array(
	'type'        => 'radio',
	'settings'    => 'menu_type',
	'label'       => __( 'Menu type', 'brooklyn-lite' ),
	'section'     => 'brooklyn_lite_section_menu',
	'default'     => 'header-default',
	'choices'     => array(
		'header-default' 		=> esc_attr__( 'Default Header', 'brooklyn-lite' ),
		'header-transparent' 	=> esc_attr__( 'Transparent Header', 'brooklyn-lite' )
	),
) );
ProWPTheme_Kirki::add_field( 'brooklyn_lite', array(
	'type'        => 'radio',
	'settings'    => 'menu_container',
	'label'       => __( 'Menu width', 'brooklyn-lite' ),
	'section'     => 'brooklyn_lite_section_menu',
	'default'     => 'menu-container',
	'choices'     => array(
		'menu-container' 	=> esc_attr__( 'Container Menu', 'brooklyn-lite' ),
		'menu-full-width' 	=> esc_attr__( 'Full/Stretched Menu', 'brooklyn-lite' ),
	)
) );

/**
 * Checks if menu type is extended
 */
function brooklyn_lite_menu_type_callback() {
    $type = get_theme_mod( 'menu_type' );

    if ( $type == 'menuStyle3' || $type == 'menuStyle4' ) {
    	return true;
    } else {
    	return false;
    }
}