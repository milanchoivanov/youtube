<?php
/*
=====================================================
Header Widget
=====================================================
*/
// Creating the widget 
class multiverselogo_widget extends WP_Widget {

function __construct() {
 
   // Add Widget scripts
   add_action('admin_enqueue_scripts', array($this, 'scripts'));
 
   parent::__construct(
      'logo_widget', // Base ID
      __( 'Multiverse Logo Widget', 'logo_domain' ), // Name
      array( 'description' => __( 'Change Logo Widget', 'logo_domain' ), ) // Args
   );
}

public function form( $instance ) {
 // (Ovaa linija se dodava dokolku sakame i "title")  $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'text_domain' );
   $image = ! empty( $instance['image'] ) ? $instance['image'] : '';
   ?>
   <!--Ovoj paragraf se dodava dokolku sakame i title kaj slikata
   <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
   </p> 
   -->
   <p>
      <label for="<?php echo $this->get_field_id( 'image' ); ?>"><?php _e( 'Image:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" type="text" value="<?php echo esc_url( $image ); ?>" />
      <button class="upload_image_button button button-primary">Upload Image</button>
   </p>
   <?php
}

public function widget( $args, $instance ) {
   // Our variables from the widget settings
 // (ovoj del se pisuva samo ako sakame "title da se pokaze)  $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Default title', 'text_domain' ) : $instance['title'] );
   $image = ! empty( $instance['image'] ) ? $instance['image'] : '';
 
   ob_start();
   echo $args['before_widget'];
   if ( ! empty( $instance['title'] ) ) {
      echo $args['before_title'] . $title . $args['after_title'];
   }
   ?>
 
   <?php if($image): ?>
      <img src="<?php echo esc_url($image); ?>" width="40px" height="40px" alt="">
   <?php endif; ?>
 
   <?php
   echo $args['after_widget'];
   ob_end_flush();
}

public function update( $new_instance, $old_instance ) {
   $instance = array();
   $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
   $instance['image'] = ( ! empty( $new_instance['image'] ) ) ? $new_instance['image'] : '';
 
   return $instance;
}

public function scripts()
{
   wp_enqueue_script( 'media-upload' );
   wp_enqueue_media();
   wp_enqueue_script('our_admin', get_template_directory_uri() . '/js/multiverse-media-upload.js', array('jquery'));
}

} // Class wpb_widget ends here


// register Foo_Widget widget
function register_multiverselogo_widget() {
    register_widget( 'multiverselogo_widget' );
}
add_action( 'widgets_init', 'register_multiverselogo_widget' );

