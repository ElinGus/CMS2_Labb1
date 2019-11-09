<?php  

/*
Plugin Name: CMS 2 Labb 1 Widget
Description: An exercise in widget plugins
Author: Elin Gustafsson
Version: 1.0
*/


class youtube_widget extends WP_Widget {
  // class constructor
  public function __construct() {
    $widget_ops = array( 
		'classname' => 'youtube_widget',
		'description' => 'En widget som visar YouTube-videos',
	);
	parent::__construct( 'youtube_widget', 'Youtube Widget', $widget_ops );
  }

  // Widgetens innehåll på sidan
  public function widget( $args, $instance ) {
    $videoid = apply_filters( 'widget_title', $instance[ 'title' ] );
    
    echo $args['before_widget'] . $args['before_title'] . $videoid . $args['after_title']; 
    ?>
    
    <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $videoid ?>?controls=1&autoplay=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> 
  
    <?php echo $args['after_widget']; ?><?php
 
  }

  // widgetns fält i WP-admin
  public function form( $instance ) {
    $videoid = !empty( $instance['title'] ) ? $instance['title'] : ''; ?>
  <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>">Video-ID:</label>
    
    <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $videoid ); ?>" />
  </p><?php
  }
  
} 

// registrara widget
add_action( 'widgets_init', function(){
	register_widget( 'youtube_widget' );
});

?>
