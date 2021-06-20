<?php
/**
 * Blog Customizer panel
 *
 * @package Brooklyn Lite
 */

/**
 * Index
 */
ProWPTheme_Kirki::add_section( 'brooklyn_lite_section_blog_index', array(
	'title'       	 => __( 'Blog & Archive Settings', 'brooklyn-lite' ),
	'panel'			 => 'brooklyn_lite_panel',
    'priority'       => 3,
) );
ProWPTheme_Kirki::add_field( 'brooklyn_lite', array(
	'type'        => 'radio',
	'settings'    => 'blog_layout',
	'label'       => __( 'Blog layout', 'brooklyn-lite' ),
	'section'     => 'brooklyn_lite_section_blog_index',
	'default'     => 'layout-default',
	'choices'     => array(
		'layout-default' 			=> esc_attr__( 'Default', 'brooklyn-lite' ),
		'layout-grid' 				=> esc_attr__( 'Grid', 'brooklyn-lite' ),
		'layout-classic' 			=> esc_attr__( 'Classic', 'brooklyn-lite' ),
		'layout-two-columns' 		=> esc_attr__( 'Two Columns', 'brooklyn-lite' ),
	),
) );

/*Excerpt Length*/
ProWPTheme_Kirki::add_field( 'brooklyn_lite', array(
	'type'        => 'number',
	'settings'    => 'brooklyn_lite_blog_excerpt',
	'label'       => esc_attr__( 'Excerpt length', 'brooklyn-lite' ),
	'section'     => 'brooklyn_lite_section_blog_index',
	'default'     => 20,
	'priority'    => 10,
	'choices'     => array(
		'min'  => 5,
		'max'  => 80,
		'step' => 1,
	),
) );

ProWPTheme_Kirki::add_field( 'brooklyn_lite', array(
	'type'        => 'text',
	'settings'    => 'brooklyn_lite_read_more_text',
	'label'       => esc_attr__( 'Read more text', 'brooklyn-lite' ),
	'description' => esc_attr__( 'Leave empty to hide', 'brooklyn-lite' ),
	'section'     => 'brooklyn_lite_section_blog_index',
	'default'     => esc_attr__( 'Read more', 'brooklyn-lite' ),
	'sanitize_callback' => 'sanitize_text_field',
	'priority'    => 10,
    'required'  => array(
        array(
            'setting'  => 'index_hide_read_more',
            'value'    => '0',
            'operator' => '==',
        ),
	),		
) );

ProWPTheme_Kirki::add_field( 'brooklyn_lite', array(
	'type'        => 'checkbox',
	'settings'    => 'brooklyn_lite_blog_meta',
	'label'       => esc_attr__( 'Hide All Meta?', 'brooklyn-lite' ),
	'description' => __('Check to hide the date, category, tags etc on blog page.', 'brooklyn-lite'),
	'section'     => 'brooklyn_lite_section_blog_index',
	'default'     => '0',
	'priority'    => 10,
) );
ProWPTheme_Kirki::add_field( 'brooklyn_lite', array(
	'type'        => 'checkbox',
	'settings'    => 'index_hide_thumb',
	'label'       => esc_attr__( 'Hide post thumbnail?', 'brooklyn-lite' ),
	'section'     => 'brooklyn_lite_section_blog_index',
	'default'     => '0',
	'priority'    => 10,
    'required'  => array(
        array(
            'setting'  => 'brooklyn_lite_blog_meta',
            'value'    => '1',
            'operator' => '==',
        ),
	),
) );
ProWPTheme_Kirki::add_field( 'brooklyn_lite', array(
	'type'        => 'checkbox',
	'settings'    => 'index_hide_date',
	'label'       => esc_attr__( 'Hide post date?', 'brooklyn-lite' ),
	'section'     => 'brooklyn_lite_section_blog_index',
	'default'     => '0',
	'priority'    => 10,
    'required'  => array(
        array(
            'setting'  => 'brooklyn_lite_blog_meta',
            'value'    => '1',
            'operator' => '==',
        ),
	),	
) );
ProWPTheme_Kirki::add_field( 'brooklyn_lite', array(
	'type'        => 'checkbox',
	'settings'    => 'index_hide_cats',
	'label'       => esc_attr__( 'Hide post categories?', 'brooklyn-lite' ),
	'section'     => 'brooklyn_lite_section_blog_index',
	'default'     => '0',
	'priority'    => 10,
    'required'  => array(
        array(
            'setting'  => 'brooklyn_lite_blog_meta',
            'value'    => '1',
            'operator' => '==',
        ),
	),	
) );
ProWPTheme_Kirki::add_field( 'brooklyn_lite', array(
	'type'        => 'checkbox',
	'settings'    => 'index_hide_tags',
	'label'       => esc_attr__( 'Hide post Tags?', 'brooklyn-lite' ),
	'section'     => 'brooklyn_lite_section_blog_index',
	'default'     => '0',
	'priority'    => 10,
    'required'  => array(
        array(
            'setting'  => 'brooklyn_lite_blog_meta',
            'value'    => '1',
            'operator' => '==',
        ),
	),	
) );
ProWPTheme_Kirki::add_field( 'brooklyn_lite', array(
	'type'        => 'checkbox',
	'settings'    => 'index_hide_author',
	'label'       => esc_attr__( 'Hide post author?', 'brooklyn-lite' ),
	'section'     => 'brooklyn_lite_section_blog_index',
	'default'     => '0',
	'priority'    => 10,
    'required'  => array(
        array(
            'setting'  => 'brooklyn_lite_blog_meta',
            'value'    => '1',
            'operator' => '==',
        ),
	),	
) );
ProWPTheme_Kirki::add_field( 'brooklyn_lite', array(
	'type'        => 'checkbox',
	'settings'    => 'index_hide_comments',
	'label'       => esc_attr__( 'Hide comments number?', 'brooklyn-lite' ),
	'section'     => 'brooklyn_lite_section_blog_index',
	'default'     => '0',
	'priority'    => 10,
    'required'  => array(
        array(
            'setting'  => 'brooklyn_lite_blog_meta',
            'value'    => '1',
            'operator' => '==',
        ),
	),	
) );

ProWPTheme_Kirki::add_field( 'brooklyn_lite', array(
	'type'        => 'checkbox',
	'settings'    => 'index_hide_read_more',
	'label'       => esc_attr__( 'Hide Read More?', 'brooklyn-lite' ),
	'section'     => 'brooklyn_lite_section_blog_index',
	'default'     => '0',
	'priority'    => 10,
    'required'  => array(
        array(
            'setting'  => 'brooklyn_lite_blog_meta',
            'value'    => '1',
            'operator' => '==',
        ),
	),	
) );

ProWPTheme_Kirki::add_field( 'brooklyn_lite', array(
	'type'        => 'checkbox',
	'settings'    => 'brooklyn_lite_breadcrumbs',
	'label'       => esc_attr__( 'Hide Breadcrumbs?', 'brooklyn-lite' ),
	'section'     => 'brooklyn_lite_section_blog_index',
	'default'     => '0',
	'priority'    => 10
) );


/**
 * Single posts
 */
ProWPTheme_Kirki::add_section( 'brooklyn_lite_section_blog_single', array(
	'title'       	 => __( 'Single Post Settings', 'brooklyn-lite' ),
	'panel'			 => 'brooklyn_lite_panel',	
    'priority'       => 5,
) );
ProWPTheme_Kirki::add_field( 'brooklyn_lite', array(
	'type'        => 'radio',
	'settings'    => 'single_post_layout',
	'label'       => __( 'Single post layout', 'brooklyn-lite' ),
	'section'     => 'brooklyn_lite_section_blog_single',
	'default'     => 'layout-default',
	'choices'     => array(
		'layout-default' 	=> esc_attr__( 'Default', 'brooklyn-lite' ),
		'layout-full' 		=> esc_attr__( 'No sidebar', 'brooklyn-lite' ),
	),
) );
ProWPTheme_Kirki::add_field( 'brooklyn_lite', array(
	'type'        => 'radio',
	'settings'    => 'single_post_content_layout',
	'label'       => __( 'Content layout', 'brooklyn-lite' ),
	'section'     => 'brooklyn_lite_section_blog_single',
	'default'     => 'layout-default',
	'choices'     => array(
		'layout-default' 	=> esc_attr__( 'Default', 'brooklyn-lite' ),
		'layout-2' 		=> esc_attr__( 'Layout 2', 'brooklyn-lite' ),
		'layout-3' 		=> esc_attr__( 'Layout 3', 'brooklyn-lite' ),
	),
) );