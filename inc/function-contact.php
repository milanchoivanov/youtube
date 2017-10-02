<?php
/*
=====================================================
Contact Widget
=====================================================
*/

// Creating the widget 
class multiversecontact_widget extends WP_Widget {

function __construct() {
 
   // Add Widget scripts
   add_action('admin_enqueue_scripts', array($this, 'scripts'));
 
   parent::__construct(
      'contact_widget', // Base ID
      __( 'Multiverse Contact Widget', 'contact_domain' ), // Name
      array( 'description' => __( 'Widget That Change Contact Page', 'contact_domain' ), ) // Args
   );
}

public function form( $instance ) {
	$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Enter Title', 'text_domain' );
	$phone = ! empty( $instance['phone'] ) ? $instance['phone'] : __( 'Enter Phone', 'text_domain' );
	$email = ! empty( $instance['email'] ) ? $instance['email'] : __( 'Enter Email', 'text_domain' );
	$address = ! empty( $instance['address'] ) ? $instance['address'] : __( 'Enter Address', 'text_domain' );


   ?>
   <p>
   <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Enter New Contact Page Big Title:' ); ?></label>
   <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
   </p> 
   
    <p>
   <label for="<?php echo $this->get_field_id( 'phone' ); ?>"><?php _e( 'Enter New Phone:' ); ?></label>
   <input class="widefat" id="<?php echo $this->get_field_id( 'phone' ); ?>" name="<?php echo $this->get_field_name( 'phone' ); ?>" type="text" value="<?php echo esc_attr( $phone ); ?>">
   </p> 
   <p>
   <label for="<?php echo $this->get_field_id( 'email' ); ?>"><?php _e( 'Enter New Email:' ); ?></label>
   <input class="widefat" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" type="text" value="<?php echo esc_attr( $email ); ?>">
   </p> 
   <p>
 
   <p>
   <label for="<?php echo $this->get_field_id( 'address' ); ?>"><?php _e( 'Enter Address:' ); ?></label>
   <textarea class="widefat" rows="4" cols="20" id="<?php echo $this->get_field_id('address'); ?>" name="<?php echo $this->get_field_name('address'); ?>"><?php echo $address; ?></textarea>
   </p>

   <?php
}

public function widget( $args, $instance ) {
   // Our variables from the widget settings
  $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Default Title', 'text_domain' ) : $instance['title'] );
  $phone = apply_filters( 'widget_phone', empty( $instance['phone'] ) ? __( 'Default Phone', 'text_domain' ) : $instance['phone'] );
  $email = apply_filters( 'widget_email', empty( $instance['email'] ) ? __( 'Default Email', 'text_domain' ) : $instance['email'] );
  $address = apply_filters( 'widget_address', empty( $instance['address'] ) ? __( 'Default Address', 'text_domain' ) : $instance['address'] );


	    echo $args['before_widget'];
			require get_template_directory() . '/contact.php';
        echo $args['after_widget'];
   ob_end_flush();
}

public function update( $new_instance, $old_instance ) {
   $instance = array();
   $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
   $instance['phone'] = ( ! empty( $new_instance['phone'] ) ) ? strip_tags( $new_instance['phone'] ) : '';
   $instance['email'] = ( ! empty( $new_instance['email'] ) ) ? strip_tags( $new_instance['email'] ) : '';
   $instance['address'] = ( ! empty( $new_instance['address'] ) ) ? strip_tags( $new_instance['address'] ) : '';


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
function register_multiversecontact_widget() {
    register_widget( 'multiversecontact_widget' );
}
add_action( 'widgets_init', 'register_multiversecontact_widget' );