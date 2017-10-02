<?php
/*
=====================================================
Testimonials Widget
=====================================================
*/

// Creating the widget 
class multiversetestimonials_widget extends WP_Widget {

function __construct() {
 
   // Add Widget scripts
   add_action('admin_enqueue_scripts', array($this, 'scripts'));
 
   parent::__construct(
      'testimonials_widget', // Base ID
      __( 'Multiverse Testimonials Widget', 'testimonials_domain' ), // Name
      array( 'description' => __( 'Widget That Change Testimonials Page', 'testimonials_domain' ), ) // Args
   );
}

public function form( $instance ) {
	$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Enter Title', 'text_domain' );
	$name1 = ! empty( $instance['name1'] ) ? $instance['name1'] : __( 'Enter Title', 'text_domain' );
	$name2 = ! empty( $instance['name2'] ) ? $instance['name2'] : __( 'Enter Title', 'text_domain' );
	$name3 = ! empty( $instance['name3'] ) ? $instance['name3'] : __( 'Enter Title', 'text_domain' );
	$job1 = ! empty( $instance['job1'] ) ? $instance['job1'] : __( 'Enter Job Title', 'text_domain' );
	$job2 = ! empty( $instance['job2'] ) ? $instance['job2'] : __( 'Enter Job Title', 'text_domain' );
	$job3 = ! empty( $instance['job3'] ) ? $instance['job3'] : __( 'Enter Job Title', 'text_domain' );
	$text1 = ! empty( $instance['text1'] ) ? $instance['text1'] : __( 'Enter Review', 'text_domain' );
	$text2 = ! empty( $instance['text2'] ) ? $instance['text2'] : __( 'Enter Review', 'text_domain' );
	$text3 = ! empty( $instance['text3'] ) ? $instance['text3'] : __( 'Enter Review', 'text_domain' );

    $image1 = ! empty( $instance['image1'] ) ? $instance['image1'] : '';
    $image2 = ! empty( $instance['image2'] ) ? $instance['image2'] : '';
    $image3 = ! empty( $instance['image3'] ) ? $instance['image3'] : '';

   ?>
   <p>
   <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Enter New Testimonials Page Big Title:' ); ?></label>
   <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
   </p> 
   
    <p>
   <label for="<?php echo $this->get_field_id( 'name1' ); ?>"><?php _e( 'Enter New Name:' ); ?></label>
   <input class="widefat" id="<?php echo $this->get_field_id( 'name1' ); ?>" name="<?php echo $this->get_field_name( 'name1' ); ?>" type="text" value="<?php echo esc_attr( $name1 ); ?>">
   </p> 
   <p>
   <label for="<?php echo $this->get_field_id( 'job1' ); ?>"><?php _e( 'Enter New Job Title:' ); ?></label>
   <input class="widefat" id="<?php echo $this->get_field_id( 'job1' ); ?>" name="<?php echo $this->get_field_name( 'job1' ); ?>" type="text" value="<?php echo esc_attr( $job1 ); ?>">
   </p> 
   <p>
   <label for="<?php echo $this->get_field_id( 'text1' ); ?>"><?php _e( 'Enter The Review:' ); ?></label>
   <textarea class="widefat" rows="4" cols="20" id="<?php echo $this->get_field_id('text1'); ?>" name="<?php echo $this->get_field_name('text1'); ?>"><?php echo $text1; ?></textarea>
   </p>
   <p>
      <label for="<?php echo $this->get_field_id( 'image1' ); ?>"><?php _e( 'Upload Image From Reviewer:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'image1' ); ?>" name="<?php echo $this->get_field_name( 'image1' ); ?>" type="text" value="<?php echo esc_url( $image1 ); ?>" />
      <button class="upload_image_button button button-primary">Upload Image</button>
   </p>   
   
   <p>
   <label for="<?php echo $this->get_field_id( 'name2' ); ?>"><?php _e( 'Enter New Name:' ); ?></label>
   <input class="widefat" id="<?php echo $this->get_field_id( 'name2' ); ?>" name="<?php echo $this->get_field_name( 'name2' ); ?>" type="text" value="<?php echo esc_attr( $name2 ); ?>">
   </p> 
   <p>
   <label for="<?php echo $this->get_field_id( 'job2' ); ?>"><?php _e( 'Enter New Job Title:' ); ?></label>
   <input class="widefat" id="<?php echo $this->get_field_id( 'job2' ); ?>" name="<?php echo $this->get_field_name( 'job2' ); ?>" type="text" value="<?php echo esc_attr( $job2 ); ?>">
   </p> 
   <p>
   <label for="<?php echo $this->get_field_id( 'text2' ); ?>"><?php _e( 'Enter The Review:' ); ?></label>
   <textarea class="widefat" rows="4" cols="20" id="<?php echo $this->get_field_id('text2'); ?>" name="<?php echo $this->get_field_name('text2'); ?>"><?php echo $text2; ?></textarea>
   </p>
   <p>
      <label for="<?php echo $this->get_field_id( 'image2' ); ?>"><?php _e( 'Upload Image From Reviewer:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'image2' ); ?>" name="<?php echo $this->get_field_name( 'image2' ); ?>" type="text" value="<?php echo esc_url( $image2 ); ?>" />
      <button class="upload_image_button button button-primary">Upload Image</button>
   </p>  

    <p>
   <label for="<?php echo $this->get_field_id( 'name3' ); ?>"><?php _e( 'Enter New Name:' ); ?></label>
   <input class="widefat" id="<?php echo $this->get_field_id( 'name3' ); ?>" name="<?php echo $this->get_field_name( 'name3' ); ?>" type="text" value="<?php echo esc_attr( $name3 ); ?>">
   </p> 
   <p>
   <label for="<?php echo $this->get_field_id( 'job3' ); ?>"><?php _e( 'Enter New Job Title:' ); ?></label>
   <input class="widefat" id="<?php echo $this->get_field_id( 'job3' ); ?>" name="<?php echo $this->get_field_name( 'job3' ); ?>" type="text" value="<?php echo esc_attr( $job3 ); ?>">
   </p> 
   <p>
   <label for="<?php echo $this->get_field_id( 'text3' ); ?>"><?php _e( 'Enter The Review:' ); ?></label>
   <textarea class="widefat" rows="4" cols="20" id="<?php echo $this->get_field_id('text3'); ?>" name="<?php echo $this->get_field_name('text3'); ?>"><?php echo $text3; ?></textarea>
   </p>
   <p>
      <label for="<?php echo $this->get_field_id( 'image3' ); ?>"><?php _e( 'Upload Image From Reviewer:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'image3' ); ?>" name="<?php echo $this->get_field_name( 'image3' ); ?>" type="text" value="<?php echo esc_url( $image3 ); ?>" />
      <button class="upload_image_button button button-primary">Upload Image</button>
   </p>      
  

   <?php
}

public function widget( $args, $instance ) {
   // Our variables from the widget settings
  $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Default Title', 'text_domain' ) : $instance['title'] );
  $name1 = apply_filters( 'widget_title', empty( $instance['name1'] ) ? __( 'Default Name', 'text_domain' ) : $instance['name1'] );
  $name2 = apply_filters( 'widget_title', empty( $instance['name2'] ) ? __( 'Default Name', 'text_domain' ) : $instance['name2'] );
  $name3 = apply_filters( 'widget_title', empty( $instance['name3'] ) ? __( 'Default Name', 'text_domain' ) : $instance['name3'] );
  $job1 = apply_filters( 'widget_title', empty( $instance['job1'] ) ? __( 'Default Job Title', 'text_domain' ) : $instance['job1'] );
  $job2 = apply_filters( 'widget_title', empty( $instance['job2'] ) ? __( 'Default Job Title', 'text_domain' ) : $instance['job2'] );
  $job3 = apply_filters( 'widget_title', empty( $instance['job3'] ) ? __( 'Default Title', 'text_domain' ) : $instance['job3'] );

  $text1 = apply_filters( 'widget_text1', empty( $instance['text1'] ) ? __( 'Default Text', 'text_domain' ) : $instance['text1'] );
  $text2 = apply_filters( 'widget_text2', empty( $instance['text2'] ) ? __( 'Default Text', 'text_domain' ) : $instance['text2'] );
  $text3 = apply_filters( 'widget_text3', empty( $instance['text3'] ) ? __( 'Default Text', 'text_domain' ) : $instance['text3'] );

  $image1 = ! empty( $instance['image1'] ) ? $instance['image1'] : '';
  $image2 = ! empty( $instance['image2'] ) ? $instance['image2'] : '';
  $image3 = ! empty( $instance['image3'] ) ? $instance['image3'] : '';

  
	    echo $args['before_widget'];
   ?>
   			<!-- Ova e div koj ke ja pomesti stranata nadolu -->
							<div id="testimonials" class="row nopadding">
								<div class="emptySpace row nopadding">
								
								</div>
							</div>	
		<div class="wrapTest nopadding">

			<div class="naslovTest row nopadding">
				<div class="col-md-11 col-md-offset-1">
				<h1 class="testH"><?php echo $title; ?></h1>
				</div>
			</div>
			
			<div class="sodrzina row nopadding">
			
				<div class="lugeTestslika kakuanim col-sm-2 col-sm-offset-2 col-md-1 col-md-offset-3 nopadding">
					<?php if($image1): ?>
					<img src="<?php echo esc_url($image1); ?>"  width="100" height="100" />
					<?php endif; ?>
				</div>
				
				<div class="lugeTest kakuanim col-sm-8 col-md-2 nopadding">
					<h4><b><?php echo $name1; ?></b></h4>
					<h4><i><?php echo $job1; ?></i></h4>
					<p><?php echo $text1; ?></p>
				</div>
					
				<div class="lugeTestslika  taysonanim col-sm-2 col-sm-offset-2  col-md-1 nopadding">
					<?php if($image2): ?>
					<img src="<?php echo esc_url($image2); ?>"  width="100" height="100" />
					<?php endif; ?>
				</div>
				
				<div class="lugeTest taysonanim col-sm-8 col-md-2 nopadding">
					<h4><b><?php echo $name2; ?></b></h4>
					<h4><i><?php echo $job2; ?></i></h4>
					<p><?php echo $text2; ?></p>
				</div>
				
				<div class="lugeTestslika luwinanim col-sm-2 col-sm-offset-2 col-md-1 nopadding">
					<?php if($image3): ?>
					<img src="<?php echo esc_url($image3); ?>"  width="100" height="100" />
					<?php endif; ?>
				</div>
				
				<div class="lugeTest luwinanim col-sm-8 col-md-2 nopadding">
					<h4><b><?php echo $name3; ?></b></h4>
					<h4><i><?php echo $job3; ?></i></h4>
					<p><?php echo $text3; ?></p>
				</div>
						
			</div>
				
		</div>

 
   <?php
        echo $args['after_widget'];
   ob_end_flush();
}

public function update( $new_instance, $old_instance ) {
   $instance = array();
   $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
   $instance['name1'] = ( ! empty( $new_instance['name1'] ) ) ? strip_tags( $new_instance['name1'] ) : '';
   $instance['name2'] = ( ! empty( $new_instance['name2'] ) ) ? strip_tags( $new_instance['name2'] ) : '';
   $instance['name3'] = ( ! empty( $new_instance['name3'] ) ) ? strip_tags( $new_instance['name3'] ) : '';
   $instance['job1'] = ( ! empty( $new_instance['job1'] ) ) ? strip_tags( $new_instance['job1'] ) : '';
   $instance['job2'] = ( ! empty( $new_instance['job2'] ) ) ? strip_tags( $new_instance['job2'] ) : '';
   $instance['job3'] = ( ! empty( $new_instance['job3'] ) ) ? strip_tags( $new_instance['job3'] ) : '';
   $instance['text1'] = ( ! empty( $new_instance['text1'] ) ) ? strip_tags( $new_instance['text1'] ) : '';
   $instance['text2'] = ( ! empty( $new_instance['text2'] ) ) ? strip_tags( $new_instance['text2'] ) : '';
   $instance['text3'] = ( ! empty( $new_instance['text3'] ) ) ? strip_tags( $new_instance['text3'] ) : '';
   $instance['image1'] = ( ! empty( $new_instance['image1'] ) ) ? $new_instance['image1'] : '';
   $instance['image2'] = ( ! empty( $new_instance['image2'] ) ) ? $new_instance['image2'] : '';
   $instance['image3'] = ( ! empty( $new_instance['image3'] ) ) ? $new_instance['image3'] : '';


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
function register_multiversetestimonials_widget() {
    register_widget( 'multiversetestimonials_widget' );
}
add_action( 'widgets_init', 'register_multiversetestimonials_widget' );