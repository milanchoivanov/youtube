<?php
/*
=====================================================
About Widget
=====================================================
*/

// Creating the widget 
class multiverseabout_widget extends WP_Widget {

function __construct() {
 
   // Add Widget scripts
   add_action('admin_enqueue_scripts', array($this, 'scripts'));
 
   parent::__construct(
      'about_widget', // Base ID
      __( 'Multiverse About Widget', 'about_domain' ), // Name
      array( 'description' => __( 'Widget That Change About Page', 'about_domain' ), ) // Args
   );
}

public function form( $instance ) {
	$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Enter Title', 'text_domain' );
	$about = ! empty( $instance['about'] ) ? $instance['about'] : __( 'Enter Description', 'text_domain' );
	$side = ! empty( $instance['side'] ) ? $instance['side'] : __( 'Enter Side Text', 'text_domain' );
    $image = ! empty( $instance['image'] ) ? $instance['image'] : '';
   ?>
   <p>
   <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Enter New About Page Big Title:' ); ?></label>
   <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
   </p> 
   
   <p>
   <label for="<?php echo $this->get_field_id( 'about' ); ?>"><?php _e( 'Enter Description About The Book:' ); ?></label>
   <textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('about'); ?>" name="<?php echo $this->get_field_name('about'); ?>"><?php echo $about; ?></textarea>
   </p>
   <p>
   <label for="<?php echo $this->get_field_id( 'side' ); ?>"><?php _e( 'Enter Text For The Side:' ); ?></label>
   <textarea class="widefat" rows="4" cols="20" id="<?php echo $this->get_field_id('side'); ?>" name="<?php echo $this->get_field_name('side'); ?>"><?php echo $side; ?></textarea>
   </p>

   <p>
      <label for="<?php echo $this->get_field_id( 'image' ); ?>"><?php _e( 'Upload Your Side Image For About Page:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" type="text" value="<?php echo esc_url( $image ); ?>" />
      <button class="upload_image_button button button-primary">Upload Image</button>
   </p>

   <?php
}

public function widget( $args, $instance ) {
   // Our variables from the widget settings
  $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Default title', 'text_domain' ) : $instance['title'] );
  $about = apply_filters( 'widget_about', empty( $instance['about'] ) ? __( 'Default about', 'text_domain' ) : $instance['about'] );
  $side = apply_filters( 'widget_side', empty( $instance['side'] ) ? __( 'Default side', 'text_domain' ) : $instance['side'] );

  $image = ! empty( $instance['image'] ) ? $instance['image'] : '';

  
	    echo $args['before_widget'];
   ?>
   			<!-- Ova e div koj ke ja pomesti stranata nadolu -->
							<div id="overview" class="row nopadding">
								<div class="emptySpace row nopadding">
								
								</div>
							</div>	
  		<div  class="wrapO row nopadding">

			<div class="col-xs-12 col-sm-6 col-md-7 col-lg-8 nopadding">
			
			    <div class="razdelnikOverview row slideanim nopadding">
					<hr style="height:20px; visibility:hidden;" />
				    <hr class="linija">
				</div>
			
				<div class="row nopadding">
					<h1 class="overviewNaslov slideanim"><?php echo $title; ?></h1>
				</div>
				
				<div class="razdelnikOverview row slideanim nopadding">
				    <hr class="linija">
				</div>
				
				<div class="textOverview row slideanim nopadding">
                          <?php 

						  $newarr = explode("\n",$about);

						  foreach($newarr as $str) {

						  echo "<p>".$str."</p>";

							}
							?>
				</div>

				<div class="razdelnikOverview row slideanim nopadding">
				    <hr class="linija">
				</div>			
				
			</div>
			
			<div class=" sideOverview col-xs-12 col-sm-6 col-md-5 col-lg-4 nopadding">
			
				<div class="sideBooksss slideanim">
				    <?php if($image): ?>
					<img class="sideBooks img-responsive" src="<?php echo esc_url($image); ?>"  border="0" align="center"  />
					<?php endif; ?>
				</div>
				
				<div class="sideText slideanim">
					<h3>
						   <?php 

						  $newarr = explode("\n",$side);

						  foreach($newarr as $str) {

						  echo "<p>".$str."</p>";

							}
							?>
					</h3>
				</div>
				
				<div class="btnBuy slideanim">
					<a class="btn btn-primary btn-responsive" href="#pricing"> &nbsp; &nbsp; Buy Now &nbsp; &nbsp; </a>
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
   $instance['about'] = ( ! empty( $new_instance['about'] ) ) ? strip_tags( $new_instance['about'] ) : '';
   $instance['side'] = ( ! empty( $new_instance['side'] ) ) ? strip_tags( $new_instance['side'] ) : '';
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
function register_multiverseabout_widget() {
    register_widget( 'multiverseabout_widget' );
}
add_action( 'widgets_init', 'register_multiverseabout_widget' );