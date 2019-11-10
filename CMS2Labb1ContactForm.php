<?php  

/*
Plugin Name: CMS 2 Labb 1 Contact Form
Description: An exercise in shortcode plugins
Author: Elin Gustafsson
Version: 1.0
*/

// Funktion för shortcoden [contact]
function contact_shortcode( $atts, $content = null ){
  
  // Attribut för shortcoden
  $value = shortcode_atts( array(
    'receiver' => 'myemail@mail.com',
    'placeholder' => 'Skriv ditt meddelande här',
    'success-text' => 'Ditt meddelande har skickats!',
	), $atts );
  
  // Gör variabler för attributen
  $form_receiver = $value['receiver'];
  $form_placeholder = $value['placeholder'];
  $form_success = $value['success-text'];
  
  // Om man skickar ett meddelande postas det vidare via wp-mail 
  if (isset($_POST['submit'])) {
    $to = $form_receiver;
    $subject = $_POST["subject"];
    $message = $_POST["message"];

       wp_mail( $to, $subject, $message );
       
      return $form_success;
  }
  else {
    // Shortcoden retunerar ett kontaktformulär 
    return ''. $content .'<form method="post" class="contact_form"> 
      <h5>Ämne:</h5><input type="text" name="subject">
      <h5>Message:</h5><textarea name="message">'. $form_placeholder .' </textarea>
      <input type="submit" name="submit" value="Skicka"></form>';
  }  
}

// Läser in CSS-filen 
function register_form_plugin_styles() {
  wp_register_style('shortcode-form-css', plugin_dir_url(__FILE__).'CMS2Labb1ContactForm.css');
  wp_enqueue_style('shortcode-form-css');
}
add_action( 'wp_enqueue_scripts', 'register_form_plugin_styles' );

// Läser in shortcodens funktion så den kan visas i fontend  
add_shortcode( 'contact', 'contact_shortcode' );


?>

