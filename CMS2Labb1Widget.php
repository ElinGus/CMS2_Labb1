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

  // output the widget content on the front-end
  public function widget( $args, $instance ) {
    echo $args['before_widget'];
  
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];

      '<iframe width="560" height="315" src="https://www.youtube.com/embed/eMw8Vkahcoc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'
		}
  }

  // output the option form field in admin Widgets screen
  public function form( $instance ) {
    $title = ! empty( $instance['title'] ) ? $instance['title'] : ''; ?>
  <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>">ID:</label>
    <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
  </p><?php
  }

  // save options
  public function update( $new_instance, $old_instance ) {}
  
} 

// registrara widget
add_action( 'widgets_init', function(){
	register_widget( 'youtube_widget' );
});


?>
