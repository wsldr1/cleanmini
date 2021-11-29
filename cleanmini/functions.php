<?php 

/**
 * Functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @package clean_mini
 * @since 1.0
 */

    require get_template_directory() . '/template/customization.php';
    require get_template_directory() . '/template/customization-class.php';

function sidebars(){

  register_sidebars(2, array(
    'id'=> 'sidebar%d',
    'name' => 'Sidebar %d',
  ));
}

function menus() {
  register_nav_menu( 'header_menu','header Menu' );
}

add_action( 'after_theme_setup','menus' );

add_action( 'widgets_init','sidebars' );
  function theme_support() {
    add_theme_support( 'custom-background' );
    add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support(
			'custom-logo',
			array(
				'width'                => 512,
				'height'               => 512,
				'flex-width'           => false,
				'flex-height'          => false,
				'header-text'          => array(
					'site-title',
					'site-description',
				),
				'unlink-homepage-logo' => true,
			)
		);

  }

  add_action( 'after_theme_setup', 'theme_support' );
function enqueue_scripts() {
  /*
  if(is_home() && get_theme_mod( 'expand_button' )==1)
  {
    wp_enqueue_script( 'jstest', get_template_directory_uri(). '/function.js' );
    
  }
  */
  wp_enqueue_style( 'supertheme', get_stylesheet_uri() );
  $array = new Customization_Class();
  $array = $array->customize();  
  foreach( $array as $ar ){
    wp_add_inline_style( 'supertheme', $ar );
    }
}

add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );

function customizer_enqueue_scripts(){
  wp_enqueue_script(
    'live_update', 
    get_template_directory_uri(). '/live_update.js',
    array('jquery','customize-preview'),
    true, 
  );
}

add_action( 'customize_preview_init','customizer_enqueue_scripts' );


?>