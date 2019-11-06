<?php  
/*
Plugin Name: CMS 2 Labb 1 Shortcode
Description: An exercise in shortcode plugins
Author: Elin Gustafsson
Version: 1.0
*/

// Shortcode [button]
function button_shortcode( $atts = '' ) {
  
  //wp_enqueue_style('shortcode-button-css');
  
	$value = shortcode_atts( array(
    'text' => 'Knapp',
    'background' => '#aaa',
    'ulr' => '',
    'width' => '',
    'style' => '',
	), $atts );

  $bg_color = $value['background'];
  $btn_url = $value['url'];
  $btn_width = $value['width'];
  $btn_style = $value['style'];
  
	return '<button style="background-color:' . $bg_color . '; url:'. $btn_url .'; width:'. $btn_width .'; style:'. $btn_style .';" class="button"><a href="https://www.wordpress.org">' . $value['text'] . '</a></button>';
}

// function styles() {
//     wp_register_style('shortcode-button-css', plugin_dir_url(__FILE__).'CMS2Labb1Shortcode.css');
// }  

add_shortcode( 'button', 'button_shortcode' );


?>