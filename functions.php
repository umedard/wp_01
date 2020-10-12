<?php

/**
 * Enqueue scripts and styles.
 */
function script_setup() {
wp_enqueue_style( 'main-style', get_stylesheet_uri() ); //default

wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/dist/css/styles.css' ); //our stylesheet
wp_enqueue_style( 'fa', 'https://use.fontawesome.com/releases/v5.7.1/css/all.css' ); //fa stylesheet
wp_enqueue_script('script',  get_template_directory_uri() . '/dist/js/bundle.js');

};

add_action( 'wp_enqueue_scripts', 'script_setup' );

/**
 * Essential theme supports
 * */
function theme_setup(){
    /** automatic feed link*/
    add_theme_support( 'automatic-feed-links' );
    load_theme_textdomain( 'medardstore', get_template_directory() . '/languages' );
 
    /** tag-title **/
    add_theme_support( 'title-tag' );
 
    /** post formats */
    $post_formats = array('aside','image','gallery','video','audio','link','quote','status');
    add_theme_support( 'post-formats', $post_formats);
 
    /** post thumbnail **/
    add_theme_support( 'post-thumbnails' );
    //Add support for block styles
    add_theme_support( 'wp-block-styles' );
    // Add support for full and wide align images.
	add_theme_support( 'align-wide' );

    // Add support for editor styles.
    add_theme_support( 'editor-styles' );

    // Enqueue editor styles.
    add_editor_style( 'style-editor.css' );
    /** HTML5 support **/
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
 
    /** refresh widgest **/
    add_theme_support( 'customize-selective-refresh-widgets' );

    add_theme_support( 'align-wide' );
    add_theme_support( 'editor-styles' );
    add_theme_support( 'align-wide' );
 
    /** custom background **/
    $bg_defaults = array(
        'default-image'          => '',
        'default-preset'         => 'default',
        'default-size'           => 'cover',
        'default-repeat'         => 'no-repeat',
        'default-attachment'     => 'scroll',
    );
    add_theme_support( 'custom-background', $bg_defaults );
 
    /** custom header **/
    $header_defaults = array(
        'default-image'          => '',
        'width'                  => 300,
        'height'                 => 60,
        'flex-height'            => true,
        'flex-width'             => true,
        'default-text-color'     => '',
        'header-text'            => true,
        'uploads'                => true,
    );
    add_theme_support( 'custom-header', $header_defaults );
 
    /** custom log **/
    add_theme_support( 'custom-logo', array(
        'height'      => 60,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    ) );

    // Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => __( 'Small', 'medardstore' ),
					'shortName' => __( 'S', 'medardstore' ),
					'size'      => 19.5,
					'slug'      => 'small',
				),
				array(
					'name'      => __( 'Normal', 'medardstore' ),
					'shortName' => __( 'M', 'medardstore' ),
					'size'      => 22,
					'slug'      => 'normal',
				),
				array(
					'name'      => __( 'Large', 'medardstore' ),
					'shortName' => __( 'L', 'medardstore' ),
					'size'      => 36.5,
					'slug'      => 'large',
				),
				array(
					'name'      => __( 'Huge', 'medardstore' ),
					'shortName' => __( 'XL', 'medardstore' ),
					'size'      => 49.5,
					'slug'      => 'huge',
				),
			)
		);

		// Editor color palette.
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __( 'Dark Gray', 'medardstore' ),
					'slug'  => 'darkgray',
					'color' => '#4d4d4d',
				),
				array(
					'name'  => __( 'Light Gray', 'medardstore' ),
					'slug'  => 'lightgray',
					'color' => '#a6a6a6',
				),
				array(
					'name'  => __( 'White', 'medardstore' ),
					'slug'  => 'white',
					'color' => '#FFF',
				),
				array(
					'name'  => __( 'Dark Blue', 'medardstore' ),
					'slug'  => 'darkblue',
					'color' => '#208de5',
				)
			)
		);

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );
 
 
 
}
add_action('after_setup_theme','theme_setup');


function wpb_custom_new_menu() {
  register_nav_menus(
    array(
      'topmenu' => __( 'TopMenu' ),
      'mobilemenu' => __( 'MobileMenu' )
    )
  );
}
add_action( 'init', 'wpb_custom_new_menu' );


//enable dashicons in frontend
add_action( 'wp_enqueue_scripts', 'load_dashicons' );
function load_dashicons() {
 wp_enqueue_style( 'dashicons' );
}

// configure WooCommerce

function add_woocommerce_support() {
	add_theme_support( 'woocommerce', array(
		'thumbnail_image_width' => 150,
		'single_image_width'    => 300,

        'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 2,
            'max_rows'        => 8,
            'default_columns' => 6,
            'min_columns'     => 2,
            'max_columns'     => 5,
        ),
	) );
}
add_action( 'after_setup_theme', 'add_woocommerce_support' );



/*****************************************************************************
wpmu_posted_on - add dates on single posts
*****************************************************************************/

function medard_display_date() {
		 echo '
		<section class="footer__date">
			'  . get_the_date("Y") . '
    </section>
    ';
		

}

// add filer

function change_filter($text) {
  $text = '<h3>' . $text . ' </h3>';
  return strtoupper($text);
}

add_filter("wpmu_filter_hook", "change_filter");


// // action

// function change_action() {
//   echo "Hello";
// }

// add_action("wpmu_before_content", "change_action");

