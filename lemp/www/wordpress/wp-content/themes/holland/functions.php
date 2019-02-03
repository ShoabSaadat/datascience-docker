<?php
function holland_load_scripts()
{
    wp_enqueue_style('holland-library', get_template_directory_uri() . '/css/library.css');/* CSS Library */	
    wp_enqueue_style('holland-css', get_template_directory_uri() . '/style.css');/* CSS Main */
	wp_enqueue_style('holland-responsive', get_template_directory_uri() . '/css/responsive.css');/* Responsive CSS*/
	wp_enqueue_style( 'holland-merriweather', '//fonts.googleapis.com/css?family=Merriweather');/* Google Fonts */
	wp_enqueue_style( 'holland-qwigley', '//fonts.googleapis.com/css?family=Qwigley');/* Google Fonts */
    wp_enqueue_script('jquery');/* jQuery script */
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array(), '3.3.7', true);/* Bootstrap script */
    wp_enqueue_script('jquery-owl-carousal', get_template_directory_uri() . '/js/owl.carousel.js', array(), '2.2.1', true);/* Bxslider script */
	 if ( is_singular() ): wp_enqueue_script( "comment-reply" ); endif;
	 
	 global $holland;
	 $holland_layout_width = $holland['holland_layout_width'];
	 if ( ! isset( $content_width ) ): $content_width = $holland_layout_width; endif;
	 $holland_header_img = get_header_image();
	 $holland_container = $holland['holland_layout_width'];
	$holland_custom_css = "
	.container-fluid {
   		 max-width: {$holland_container}px;
	}
	";
	if ( get_header_image() ) : 
	$holland_custom_css .= "
     .hl-logo-area{
		background-image: url({$holland_header_img});
		}
	";
	endif; 
	wp_add_inline_style( 'holland-css', $holland_custom_css );  
}
add_action('wp_enqueue_scripts', 'holland_load_scripts');

// Custom Js
function holland_localize_scripts(){
    wp_register_script('holland-custom-js',get_template_directory_uri() . '/js/custom.js',array(),'120938200', false);
    global $holland;
	$holland_slider_controls = $holland['holland_slider_controls'];
	if(!isset($holland_slider_controls)): $holland_slider_controls = true; endif;
	$holland_slider_transition = $holland['holland_slider_transition'];
	if(!isset($holland_slider_transition)): $holland_slider_transition = true; endif;
	$holland_slider_speed = $holland['holland_slider_speed'];
	if(!isset($holland_slider_speed)): $holland_slider_speed = 1000; endif;
	$holland_slider_pause = $holland['holland_slider_pause'];
	if(!isset($holland_slider_pause)): $holland_slider_pause = 5000; endif;
	
	$holland_slider_auto =  (bool)$holland_slider_transition;
    $holland_slider_speed = (int)$holland_slider_speed;
    $holland_slider_pause = (int)$holland_slider_pause;              
    $holland_slider_controls = (bool)$holland_slider_controls;              
       $data = array (
                'slider_options' => array (
                        'auto'  => $holland_slider_auto,
                        'speed' => $holland_slider_speed,
                        'pause' => $holland_slider_pause,
						'controls' => $holland_slider_controls,
                ),              
        );
        wp_localize_script( 'holland-custom-js', 'hollandVars', $data );           
        wp_enqueue_script( 'holland-custom-js' );
    }
	add_action('wp_enqueue_scripts', 'holland_localize_scripts');

function holland_setup()
{
	//Make theme available for translation.
	load_theme_textdomain( 'holland', get_template_directory() . '/languages'); 
	
	// This theme uses Menu
	register_nav_menu( 'primary', esc_html__( 'Primary Menu',  'holland' ) );
	
	// Custom Logo
	add_theme_support( 'custom-logo' );
	
	//Thumbnails
	add_theme_support('post-thumbnails');
	
	// Post thumbnails
	add_image_size( 'holland-full-thumb', 1170, 0, true );
	add_image_size( 'holland-grid-thumb', 400, 270, true );
	add_image_size( 'holland-list-thumb',330, 240, true );
	add_image_size( 'holland-medium-thumb',820, 0, true );
	add_image_size( 'holland-mini-thumb',100, 80, true );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	
	//Background
	add_theme_support( 'custom-background');
	
	// Custom Header
	$holland_header_args = array(
	'flex-width'    => true,
	'width'         => 1920,
	'flex-height'    => true,
	'height'        => 260,
	);
	
	add_theme_support( 'custom-header', $holland_header_args );
	 
	//Theme Options
	require_once get_template_directory() . '/inc/theme-options/config.php';
	
	//Theme Widgets
	require get_template_directory() . '/inc/widgets.php';
	
	//Theme Functions
	require get_template_directory() . '/inc/theme-functions.php';	

}
add_action('after_setup_theme', 'holland_setup');

//Editor Styles
add_editor_style( 'css/editor-style.css' );