<?php
/**
 * Typography Customizer panel
 *
 * @package Brooklyn Lite
 */

/**
 * Typography
 */
ProWPTheme_Kirki::add_section( 'brooklyn_lite_section_fonts', array(
    'title'       	 => __( 'Typography Settings', 'brooklyn-lite' ),
    'panel'			 => 'brooklyn_lite_panel',
    'priority'       => 5,
) );


//Headings family
ProWPTheme_Kirki::add_field( 'brooklyn_lite', array(
	'type'        => 'typography',
	'settings'    => 'headings_font',
	'label'       => esc_attr__( 'Headings', 'brooklyn-lite' ),
	'section'     => 'brooklyn_lite_section_fonts',
	'default'     => array(
		'font-family'    => 'Muli',
		'variant'        => '500',
	),
	'priority'    => 1033,
	'output'      => array(
		array(
			'element' => 'h1,h2,h3,h4,h5,h6,.site-title, .entry-title, .section-title',
		),
		array(
			'element'  => '.editor-block-list__layout h1,.editor-block-list__layout h2,.editor-block-list__layout h3,.editor-block-list__layout h4,.editor-block-list__layout h5,.editor-block-list__layout h6,.editor-post-title__block .editor-post-title__input',
			'context'  => array( 'editor' ),
		),		
	),
) );

//Body family
ProWPTheme_Kirki::add_field( 'brooklyn_lite', array(
	'type'        => 'typography',
	'settings'    => 'body_font',
	'label'       => esc_attr__( 'Body', 'brooklyn-lite' ),
	'section'     => 'brooklyn_lite_section_fonts',
	'default'     => array(
		'font-family'    => 'Montserrat',
		'variant'        => 'regular',
	),
	'priority'    => 10,
	'output'      => array(
		array(
			'element' => 'body, article .entry-content p',
		),
		array(
			'element'  => '.editor-block-list__layout,.editor-block-list__layout .editor-block-list__block',
			'context'  => array( 'editor' ),
		),		
	),
) );

/**
 * Font sizes
 */
ProWPTheme_Kirki::add_section( 'brooklyn_lite_section_font_sizes', array(
    'title'       	 => esc_attr__( 'Font sizes', 'brooklyn-lite' ),
    'section'     	 => 'brooklyn_lite_section_fonts',
    'priority'       => 16,
) );

//Header font sizes
ProWPTheme_Kirki::add_field( 'brooklyn_lite', array(
	'type'        => 'custom',
	'settings'    => 'label_font_sizes_general',
	'label'       => '',
	'section'     => 'brooklyn_lite_section_font_sizes',
	'default'     => '<div style="text-transform:uppercase;font-weight:600;background: #ccd6de;color: #1c1c1c;padding: 10px 20px;text-align: center;margin: 30px 0 15px 0;letter-spacing: 1px;border: 1px solid #ccc6c6;">' . esc_html__( 'General', 'brooklyn-lite' ) . '</div>',
	'priority'    => 10,
) );

ProWPTheme_Kirki::add_field( 'brooklyn_lite', array(
	'type'     	  => 'slider',
	'settings'    => 'font_size_body',
	'label'       =>  esc_attr__( 'Body', 'brooklyn-lite' ),
	'section'     => 'brooklyn_lite_section_font_sizes',
	'default'     => '16',
	'priority'    => 10,
	'choices'   => array(
		'min'  => 10,
		'max'  => 30,
		'step' => 1,
	),
	'transport'	  => 'auto',
	'output'      => array(
		array(
			'element'  => 'body, article .entry-content p',
			'property' => 'font-size',
			'units'    => 'px',
		),
		array(
			'element'  => '.editor-styles-wrapper p',
			'context'  => array( 'editor' ),
		),
	),	
) );

ProWPTheme_Kirki::add_field( 'brooklyn_lite', array(
	'type'        => 'custom',
	'settings'    => 'label_font_sizes_header',
	'label'       => '',
	'section'     => 'brooklyn_lite_section_font_sizes',
	'default'     => '<div style="text-transform:uppercase;font-weight:600;background: #ccd6de;color: #1c1c1c;padding: 10px 20px;text-align: center;margin: 30px 0 15px 0;letter-spacing: 1px;border: 1px solid #ccc6c6;">' . esc_html__( 'Header area', 'brooklyn-lite' ) . '</div>',
	'priority'    => 10,
) );
ProWPTheme_Kirki::add_field( 'brooklyn_lite', array(
	'type'     	  => 'slider',
	'settings'    => 'font_size_site_title',
	'label'       =>  esc_attr__( 'Site title', 'brooklyn-lite' ),
	'section'     => 'brooklyn_lite_section_font_sizes',
	'default'     => '36',
	'priority'    => 10,
	'choices'   => array(
		'min'  => 16,
		'max'  => 50,
		'step' => 1,
	),
	'transport'	  => 'auto',
	'output'      => array(
		array(
			'element'  => '.site-title',
			'property' => 'font-size',
			'units'    => 'px',
		),
	),	
) );

ProWPTheme_Kirki::add_field( 'brooklyn_lite', array(
	'type'     	  => 'slider',
	'settings'    => 'font_size_site_desc',
	'label'       =>  esc_attr__( 'Site description', 'brooklyn-lite' ),
	'section'     => 'brooklyn_lite_section_font_sizes',
	'default'     => '16',
	'priority'    => 10,
	'choices'   => array(
		'min'  => 12,
		'max'  => 30,
		'step' => 1,
	),
	'transport'	  => 'auto',
	'output'      => array(
		array(
			'element'  => '.site-description',
			'property' => 'font-size',
			'units'    => 'px',
		),
	),	
) );

ProWPTheme_Kirki::add_field( 'brooklyn_lite', array(
	'type'     	  => 'slider',
	'settings'    => 'font_size_menu_top_items',
	'label'       =>  esc_attr__( 'Top level menu items', 'brooklyn-lite' ),
	'section'     => 'brooklyn_lite_section_font_sizes',
	'default'     => '16',
	'priority'    => 10,
	'choices'   => array(
		'min'  => 10,
		'max'  => 30,
		'step' => 1,
	),
	'transport'	  => 'auto',
	'output'      => array(
		array(
			'element'  => '#main-menu li',
			'property' => 'font-size',
			'units'    => 'px',
		),
	),	
) );

ProWPTheme_Kirki::add_field( 'brooklyn_lite', array(
	'type'     	  => 'slider',
	'settings'    => 'font_size_menu_top_items',
	'label'       =>  esc_attr__( 'Submenu items', 'brooklyn-lite' ),
	'section'     => 'brooklyn_lite_section_font_sizes',
	'default'     => '13',
	'priority'    => 10,
	'choices'   => array(
		'min'  => 10,
		'max'  => 30,
		'step' => 1,
	),
	'transport'	  => 'auto',
	'output'      => array(
		array(
			'element'  => '#main-menu ul ul li',
			'property' => 'font-size',
			'units'    => 'px',
		),
	),	
) );

//Blog
ProWPTheme_Kirki::add_field( 'brooklyn_lite', array(
	'type'        => 'custom',
	'settings'    => 'label_font_sizes_blog',
	'label'       => '',
	'section'     => 'brooklyn_lite_section_font_sizes',
	'default'     => '<div style="text-transform:uppercase;font-weight:600;background: #ccd6de;color: #1c1c1c;padding: 10px 20px;text-align: center;margin: 30px 0 15px 0;letter-spacing: 1px;border: 1px solid #ccc6c6;">' . esc_html__( 'Blog', 'brooklyn-lite' ) . '</div>',
	'priority'    => 10,
) );
ProWPTheme_Kirki::add_field( 'brooklyn_lite', array(
	'type'     	  => 'slider',
	'settings'    => 'font_size_index_title',
	'label'       =>  esc_attr__( 'Post titles (archives)', 'brooklyn-lite' ),
	'section'     => 'brooklyn_lite_section_font_sizes',
	'default'     => '',
	'priority'    => 10,
	'choices'   => array(
		'min'  => 10,
		'max'  => 50,
		'step' => 1,
	),
	'transport'	  => 'auto',
	'output'      => array(
		array(
			'element'  => '.archive article .entry-title, .category article .entry-title',
			'property' => 'font-size',
			'units'    => 'px',
		),
	),	
) );
ProWPTheme_Kirki::add_field( 'brooklyn_lite', array(
	'type'     	  => 'slider',
	'settings'    => 'font_size_single_title',
	'label'       =>  esc_attr__( 'Post titles (singles)', 'brooklyn-lite' ),
	'section'     => 'brooklyn_lite_section_font_sizes',
	'default'     => '36',
	'priority'    => 10,
	'choices'   => array(
		'min'  => 10,
		'max'  => 50,
		'step' => 1,
	),
	'transport'	  => 'auto',
	'output'      => array(
		array(
			'element'  => '.single article .entry-title',
			'property' => 'font-size',
			'units'    => 'px',
		),
	),	
) );

//Footer font sizes
ProWPTheme_Kirki::add_field( 'brooklyn_lite', array(
	'type'        => 'custom',
	'settings'    => 'label_font_sizes_footer',
	'label'       => '',
	'section'     => 'brooklyn_lite_section_font_sizes',
	'default'     => '<div style="text-transform:uppercase;font-weight:600;background: #ccd6de;color: #1c1c1c;padding: 10px 20px;text-align: center;margin: 30px 0 15px 0;letter-spacing: 1px;border: 1px solid #ccc6c6;">' . esc_html__( 'Footer area', 'brooklyn-lite' ) . '</div>',
	'priority'    => 10,
) );
ProWPTheme_Kirki::add_field( 'brooklyn_lite', array(
	'type'     	  => 'slider',
	'settings'    => 'font_size_footer_social_icons',
	'label'       =>  esc_attr__( 'Footer Social Icons', 'brooklyn-lite' ),
	'section'     => 'brooklyn_lite_section_font_sizes',
	'default'     => '16',
	'priority'    => 10,
	'choices'   => array(
		'min'  => 10,
		'max'  => 30,
		'step' => 1,
	),
	'transport'	  => 'auto',
	'output'      => array(
		array(
			'element'  => '.footer-social a',
			'property' => 'font-size',
			'units'    => 'px',
		),
	),	
) );

ProWPTheme_Kirki::add_field( 'brooklyn_lite', array(
	'type'     	  => 'slider',
	'settings'    => 'font_size_footer_credits',
	'label'       =>  esc_attr__( 'Footer Copyrights', 'brooklyn-lite' ),
	'section'     => 'brooklyn_lite_section_font_sizes',
	'default'     => '13',
	'priority'    => 10,
	'choices'   => array(
		'min'  => 10,
		'max'  => 30,
		'step' => 1,
	),
	'transport'	  => 'auto',
	'output'      => array(
		array(
			'element'  => 'footer.site-footer',
			'property' => 'font-size',
			'units'    => 'px',
		),
	),	
) );