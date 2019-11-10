<?php  
/*
Plugin Name: CMS 2 Labb 1 Shortcode
Description: An exercise in shortcode plugins
Author: Elin Gustafsson
Version: 1.0
*/


// / Funktion för shortcode [button]
function button_shortcode( $atts = '' ) {
  
  // Attribut för shortcoden
	$value = shortcode_atts( array(
    'text' => 'Knapp',
    'background' => '#aaa',
    'url' => '',
    'width' => '',
    'style' => '',
	), $atts );

// Variabler för attributen
  $bg_color = $value['background'];
  $btn_url = $value['url'];
  $btn_width = $value['width'];
  $btn_style = $value['style'];
  
  // Shortcoden retunerar en knapp med de attribut den fått 
	return '<button style="background-color:' . $bg_color . '; '. $btn_style .'; width:' . $btn_width . ';" class="shortcodebutton"><a href="'. $btn_url .'">' . $value['text'] . '</a></button>';
  
}

// Läser in CSS-filen 
function register_button_plugin_styles() {
  wp_register_style('shortcode-button-css', plugin_dir_url(__FILE__).'CMS2Labb1Shortcode.css');
  wp_enqueue_style('shortcode-button-css');
}
add_action( 'wp_enqueue_scripts', 'register_button_plugin_styles' );

// Läser in shortcodens funktion så den kan visas i fontend 
add_shortcode( 'button', 'button_shortcode' );


?>