<?php  

/*
Plugin Name: CMS 2 Labb 1 Contact Form
Description: An exercise in shortcode plugins
Author: Elin Gustafsson
Version: 1.0
*/

//[contact]
function contact_shortcode( $atts, $content = null ){
  
  $value = shortcode_atts( array(
    'receiver' => 'myemail@mail.com',
    'placeholder' => 'Skriv ditt medelande här',
    'success-text' => 'Ditt meddelande har skickats!',
	), $atts );
  
  $form_receiver = $value['receiver'];
  $form_placeholder = $value['placeholder'];
  $form_success = $value['success-text'];
  
  if (isset($_POST['submit'])) {
    $to = $form_receiver;
    $subject = $_POST["subject"];
    $message = $_POST["message"];

       wp_mail( $to, $subject, $message );
       
      return $form_success;
  }
  else {
    return ''. $content .'<form method="post" class="contact_form">
      Ämne: <input type="text" name="subject">
      Message: <textarea name="message">'. $form_placeholder .' </textarea>
      <input type="submit" name="submit" value="Skicka"></form>';
  }
  

    // $multiple_to_recipients = array(
    //     'somebody@example.com',
    //     'somebodyelse@example.com'
    // );
    // $subject = 'The subject';
    // $message = 'The message';
    // 
    // wp_mail( $multiple_to_recipients, $subject, $message );

}
  
add_shortcode( 'contact', 'contact_shortcode' );


?>

