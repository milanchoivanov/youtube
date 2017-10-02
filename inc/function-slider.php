<?php
/*
=====================================================
Slider Widget
=====================================================
*/

// Creating the widget 
class multiverseslider_widget extends WP_Widget {

function __construct() {
 
   // Add Widget scripts
   add_action('admin_enqueue_scripts', array($this, 'scripts'));
 
   parent::__construct(
      'slider_widget', // Base ID
      __( 'Multiverse Slider Widget', 'slider_domain' ), // Name
      array( 'description' => __( 'Widget That Change Slider Page', 'slider_domain' ), ) // Args
   );
}

public function form( $instance ) {
	$text1 = ! empty( $instance['text1'] ) ? $instance['text1'] : __( 'Enter Quote', 'text_domain' );
	$text2 = ! empty( $instance['text2'] ) ? $instance['text2'] : __( 'Enter Quote', 'text_domain' );
	$text3 = ! empty( $instance['text3'] ) ? $instance['text3'] : __( 'Enter Quote', 'text_domain' );
	$text4 = ! empty( $instance['text4'] ) ? $instance['text4'] : __( 'Enter Quote', 'text_domain' );
	$text5 = ! empty( $instance['text5'] ) ? $instance['text5'] : __( 'Enter Quote', 'text_domain' );

    $image = ! empty( $instance['image'] ) ? $instance['image'] : '';
   ?>
   <p>
   <label for="<?php echo $this->get_field_id( 'text1' ); ?>"><?php _e( 'Enter Your First Quote:' ); ?></label>
   <textarea class="widefat" rows="4" cols="20" id="<?php echo $this->get_field_id('text1'); ?>" name="<?php echo $this->get_field_name('text1'); ?>"><?php echo $text1; ?></textarea>
   </p>
   <p>
   <label for="<?php echo $this->get_field_id( 'text2' ); ?>"><?php _e( 'Enter Your Second Quote:' ); ?></label>
   <textarea class="widefat" rows="4" cols="20" id="<?php echo $this->get_field_id('text2'); ?>" name="<?php echo $this->get_field_name('text2'); ?>"><?php echo $text2; ?></textarea>
   </p>
   <p>
   <label for="<?php echo $this->get_field_id( 'text3' ); ?>"><?php _e( 'Enter Your Third Quote:' ); ?></label>
   <textarea class="widefat" rows="4" cols="20" id="<?php echo $this->get_field_id('text3'); ?>" name="<?php echo $this->get_field_name('text3'); ?>"><?php echo $text3; ?></textarea>
   </p>
   <p>
   <label for="<?php echo $this->get_field_id( 'text4' ); ?>"><?php _e( 'Enter Your Fourth Quote:' ); ?></label>
   <textarea class="widefat" rows="4" cols="20" id="<?php echo $this->get_field_id('text4'); ?>" name="<?php echo $this->get_field_name('text4'); ?>"><?php echo $text4; ?></textarea>
   </p>
   <p>
   <label for="<?php echo $this->get_field_id( 'text5' ); ?>"><?php _e( 'Enter Your Fivth Quote:' ); ?></label>
   <textarea class="widefat" rows="4" cols="20" id="<?php echo $this->get_field_id('text5'); ?>" name="<?php echo $this->get_field_name('text5'); ?>"><?php echo $text5; ?></textarea>
   </p>   
   <p>
      <label for="<?php echo $this->get_field_id( 'image' ); ?>"><?php _e( 'Upload Your Logo For Slider Page:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" type="text" value="<?php echo esc_url( $image ); ?>" />
      <button class="upload_image_button button button-primary">Upload Image</button>
   </p>

   <?php
}

public function widget( $args, $instance ) {
   // Our variables from the widget settings
  $text1 = apply_filters( 'widget_text1', empty( $instance['text1'] ) ? __( 'Default text1', 'text_domain' ) : $instance['text1'] );
  $text2 = apply_filters( 'widget_text2', empty( $instance['text2'] ) ? __( 'Default text2', 'text_domain' ) : $instance['text2'] );
  $text3 = apply_filters( 'widget_text3', empty( $instance['text3'] ) ? __( 'Default text3', 'text_domain' ) : $instance['text3'] );
  $text4 = apply_filters( 'widget_text4', empty( $instance['text4'] ) ? __( 'Default text4', 'text_domain' ) : $instance['text4'] );
  $text5 = apply_filters( 'widget_text5', empty( $instance['text5'] ) ? __( 'Default text5', 'text_domain' ) : $instance['text5'] );

  $image = ! empty( $instance['image'] ) ? $instance['image'] : '';

  
	    echo $args['before_widget'];
   ?>
   			<!-- Ova e div koj ke ja pomesti stranata nadolu -->
							<div class="row nopadding">
								<div class="emptySpace row nopadding">
								
								</div>
							</div>	
  <div class="wrapCarousel row  nopadding">
  		<div class="slikaCarousel slideanim row nopadding" >
					<?php if($image): ?>
					<img src="<?php echo esc_url($image); ?>" width="75px" height="75px" />
					<?php endif; ?>
				</div>
			
			
				 <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
					<!-- Indicators -->
					<ol class="carousel-indicators">
					  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					  <li data-target="#myCarousel" data-slide-to="1"></li>
					  <li data-target="#myCarousel" data-slide-to="2"></li>
					  <li data-target="#myCarousel" data-slide-to="3"></li>
					  <li data-target="#myCarousel" data-slide-to="4"></li>
					</ol>

					<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox">
					  <div class="item active">
						<h4>
						  <?php 

						  $newarr = explode("\n",$text1);

						  foreach($newarr as $str) {

						  echo "<p>".$str."</p>";

							}
							?>
						</h4>
					  </div>
					  <div class="item">
						<h4>
						  <?php 

						  $newarr = explode("\n",$text2);

						  foreach($newarr as $str) {

						  echo "<p>".$str."</p>";

							}
							?>
						</h4>
					  </div>
					  <div class="item">
						<h4>
						  <?php 

						  $newarr = explode("\n",$text3);

						  foreach($newarr as $str) {

						  echo "<p>".$str."</p>";

							}
							?>
						</h4>
					  </div>
					  <div class="item">
						<h4>
						  <?php 

						  $newarr = explode("\n",$text4);

						  foreach($newarr as $str) {

						  echo "<p>".$str."</p>";

							}
							?>
						</h4>
					  </div>
					  <div class="item">
						<h4>
						  <?php 

						  $newarr = explode("\n",$text5);

						  foreach($newarr as $str) {

						  echo "<p>".$str."</p>";

							}
							?>
						</h4>
					  </div>				  
					</div>

					<!-- Left and right controls -->
					<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
					  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					  <span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
					  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					  <span class="sr-only">Next</span>
					</a>
				</div>
   </div>
   

 
   <?php
        echo $args['after_widget'];
   ob_end_flush();
}

public function update( $new_instance, $old_instance ) {
   $instance = array();
   $instance['text1'] = ( ! empty( $new_instance['text1'] ) ) ? strip_tags( $new_instance['text1'] ) : '';
   $instance['text2'] = ( ! empty( $new_instance['text2'] ) ) ? strip_tags( $new_instance['text2'] ) : '';
   $instance['text3'] = ( ! empty( $new_instance['text3'] ) ) ? strip_tags( $new_instance['text3'] ) : '';
   $instance['text4'] = ( ! empty( $new_instance['text4'] ) ) ? strip_tags( $new_instance['text4'] ) : '';
   $instance['text5'] = ( ! empty( $new_instance['text5'] ) ) ? strip_tags( $new_instance['text5'] ) : '';
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
function register_multiverseslider_widget() {
    register_widget( 'multiverseslider_widget' );
}
add_action( 'widgets_init', 'register_multiverseslider_widget' );