<?php
/*
=====================================================
Prices Widget
=====================================================
*/

// Creating the widget 
class multiverseprices_widget extends WP_Widget {

function __construct() {
 
   // Add Widget scripts
   add_action('admin_enqueue_scripts', array($this, 'scripts'));
 
   parent::__construct(
      'prices_widget', // Base ID
      __( 'Multiverse Prices Widget', 'prices_domain' ), // Name
      array( 'description' => __( 'Widget That Change Prices Page', 'prices_domain' ), ) // Args
   );
}

public function form( $instance ) {
	$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Enter Title', 'text_domain' );
	$name1 = ! empty( $instance['name1'] ) ? $instance['name1'] : __( 'Enter Package', 'text_domain' );
	$name2 = ! empty( $instance['name2'] ) ? $instance['name2'] : __( 'Enter Package', 'text_domain' );
	$name3 = ! empty( $instance['name3'] ) ? $instance['name3'] : __( 'Enter Package', 'text_domain' );
	$job1 = ! empty( $instance['job1'] ) ? $instance['job1'] : __( 'Enter Price', 'text_domain' );
	$job2 = ! empty( $instance['job2'] ) ? $instance['job2'] : __( 'Enter Price', 'text_domain' );
	$job3 = ! empty( $instance['job3'] ) ? $instance['job3'] : __( 'Enter Price', 'text_domain' );
	$opis1 = ! empty( $instance['opis1'] ) ? $instance['opis1'] : __( 'Enter Description', 'text_domain' );
	$opis2 = ! empty( $instance['opis2'] ) ? $instance['opis2'] : __( 'Enter Description', 'text_domain' );
	$opis3 = ! empty( $instance['opis3'] ) ? $instance['opis3'] : __( 'Enter Description', 'text_domain' );
	$text1 = ! empty( $instance['text1'] ) ? $instance['text1'] : __( 'Enter List', 'text_domain' );
	$text2 = ! empty( $instance['text2'] ) ? $instance['text2'] : __( 'Enter List', 'text_domain' );
	$text3 = ! empty( $instance['text3'] ) ? $instance['text3'] : __( 'Enter List', 'text_domain' );


   ?>
   <p>
   <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Enter New Prices Page Big Title:' ); ?></label>
   <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
   </p> 
   
    <p>
   <label for="<?php echo $this->get_field_id( 'name1' ); ?>"><?php _e( 'Enter New Package:' ); ?></label>
   <input class="widefat" id="<?php echo $this->get_field_id( 'name1' ); ?>" name="<?php echo $this->get_field_name( 'name1' ); ?>" type="text" value="<?php echo esc_attr( $name1 ); ?>">
   </p> 
   <p>
   <label for="<?php echo $this->get_field_id( 'job1' ); ?>"><?php _e( 'Enter New Price:' ); ?></label>
   <input class="widefat" id="<?php echo $this->get_field_id( 'job1' ); ?>" name="<?php echo $this->get_field_name( 'job1' ); ?>" type="text" value="<?php echo esc_attr( $job1 ); ?>">
   </p> 
   <p>
   <label for="<?php echo $this->get_field_id( 'opis1' ); ?>"><?php _e( 'Enter Description:' ); ?></label>
   <input class="widefat" id="<?php echo $this->get_field_id( 'opis1' ); ?>" name="<?php echo $this->get_field_name( 'opis1' ); ?>" type="text" value="<?php echo esc_attr( $opis1 ); ?>">
   </p> 
   <p>
   <label for="<?php echo $this->get_field_id( 'text1' ); ?>"><?php _e( 'Enter List:' ); ?></label>
   <textarea class="widefat" rows="4" cols="20" id="<?php echo $this->get_field_id('text1'); ?>" name="<?php echo $this->get_field_name('text1'); ?>"><?php echo $text1; ?></textarea>
   </p>

   <p>
   <label for="<?php echo $this->get_field_id( 'name2' ); ?>"><?php _e( 'Enter New Package:' ); ?></label>
   <input class="widefat" id="<?php echo $this->get_field_id( 'name2' ); ?>" name="<?php echo $this->get_field_name( 'name2' ); ?>" type="text" value="<?php echo esc_attr( $name2 ); ?>">
   </p> 
   <p>
   <label for="<?php echo $this->get_field_id( 'job2' ); ?>"><?php _e( 'Enter New Price:' ); ?></label>
   <input class="widefat" id="<?php echo $this->get_field_id( 'job2' ); ?>" name="<?php echo $this->get_field_name( 'job2' ); ?>" type="text" value="<?php echo esc_attr( $job2 ); ?>">
   </p> 
   <label for="<?php echo $this->get_field_id( 'opis2' ); ?>"><?php _e( 'Enter Description:' ); ?></label>
   <input class="widefat" id="<?php echo $this->get_field_id( 'opis2' ); ?>" name="<?php echo $this->get_field_name( 'opis2' ); ?>" type="text" value="<?php echo esc_attr( $opis2 ); ?>">
   </p>
   <p>
   <label for="<?php echo $this->get_field_id( 'text2' ); ?>"><?php _e( 'Enter List:' ); ?></label>
   <textarea class="widefat" rows="4" cols="20" id="<?php echo $this->get_field_id('text2'); ?>" name="<?php echo $this->get_field_name('text2'); ?>"><?php echo $text2; ?></textarea>
   </p>


    <p>
   <label for="<?php echo $this->get_field_id( 'name3' ); ?>"><?php _e( 'Enter New Package:' ); ?></label>
   <input class="widefat" id="<?php echo $this->get_field_id( 'name3' ); ?>" name="<?php echo $this->get_field_name( 'name3' ); ?>" type="text" value="<?php echo esc_attr( $name3 ); ?>">
   </p> 
   <p>
   <label for="<?php echo $this->get_field_id( 'job3' ); ?>"><?php _e( 'Enter New Price:' ); ?></label>
   <input class="widefat" id="<?php echo $this->get_field_id( 'job3' ); ?>" name="<?php echo $this->get_field_name( 'job3' ); ?>" type="text" value="<?php echo esc_attr( $job3 ); ?>">
   </p> 
   <label for="<?php echo $this->get_field_id( 'opis3' ); ?>"><?php _e( 'Enter Description:' ); ?></label>
   <input class="widefat" id="<?php echo $this->get_field_id( 'opis3' ); ?>" name="<?php echo $this->get_field_name( 'opis3' ); ?>" type="text" value="<?php echo esc_attr( $opis3 ); ?>">
   </p>
   <p>
   <label for="<?php echo $this->get_field_id( 'text3' ); ?>"><?php _e( 'Enter List:' ); ?></label>
   <textarea class="widefat" rows="4" cols="20" id="<?php echo $this->get_field_id('text3'); ?>" name="<?php echo $this->get_field_name('text3'); ?>"><?php echo $text3; ?></textarea>
   </p>
  

   <?php
}

public function widget( $args, $instance ) {
   // Our variables from the widget settings
  $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Default Title', 'text_domain' ) : $instance['title'] );
  $name1 = apply_filters( 'widget_name', empty( $instance['name1'] ) ? __( 'Default Package', 'text_domain' ) : $instance['name1'] );
  $name2 = apply_filters( 'widget_name', empty( $instance['name2'] ) ? __( 'Default Package', 'text_domain' ) : $instance['name2'] );
  $name3 = apply_filters( 'widget_name', empty( $instance['name3'] ) ? __( 'Default Package', 'text_domain' ) : $instance['name3'] );
  $job1 = apply_filters( 'widget_job', empty( $instance['job1'] ) ? __( 'Default Price', 'text_domain' ) : $instance['job1'] );
  $job2 = apply_filters( 'widget_job', empty( $instance['job2'] ) ? __( 'Default Price', 'text_domain' ) : $instance['job2'] );
  $job3 = apply_filters( 'widget_job', empty( $instance['job3'] ) ? __( 'Default Price', 'text_domain' ) : $instance['job3'] );
  $opis1 = apply_filters( 'widget_opis', empty( $instance['opis1'] ) ? __( 'Default Description', 'text_domain' ) : $instance['opis1'] );
  $opis2 = apply_filters( 'widget_opis', empty( $instance['opis2'] ) ? __( 'Default Description', 'text_domain' ) : $instance['opis2'] );
  $opis3 = apply_filters( 'widget_opis', empty( $instance['opis3'] ) ? __( 'Default Description', 'text_domain' ) : $instance['opis3'] );
  $text1 = apply_filters( 'widget_text1', empty( $instance['text1'] ) ? __( 'Default List', 'text_domain' ) : $instance['text1'] );
  $text2 = apply_filters( 'widget_text2', empty( $instance['text2'] ) ? __( 'Default List', 'text_domain' ) : $instance['text2'] );
  $text3 = apply_filters( 'widget_text3', empty( $instance['text3'] ) ? __( 'Default List', 'text_domain' ) : $instance['text3'] );


	    echo $args['before_widget'];
   ?>
   			<!-- Ova e div koj ke ja pomesti stranata nadolu -->
							<div id="pricing" class="row nopadding">
								<div class="emptySpace row nopadding">
								
								</div>
							</div>	
	
				  <div class="naslovPrice slideanim text-center nopadding">
					<h1><?php echo $title; ?></h1>
				  </div>
				  <div class="row slideanim nopadding">
					<div class="col-sm-4 col-xs-12 ">
					  <div class="colona panel panel-default text-center nopadding">
						<div class=" podnaslovPrice nopadding">
						  <h3><?php echo $name1; ?></h3>
						  <hr style="height:30px; visibility:hidden;" />						  
						  <h1><?php echo $job1; ?></h1>
						  <hr style="height:0px; visibility:hidden;" />
						  <h6><i><?php echo $opis1; ?></i></h6>
						</div>
						<div class=" textPayment nopadding">
						  <hr style="height:20px; visibility:hidden;" />						
						   <?php 

						  $newarr = explode("\n",$text1);

						  foreach($newarr as $str) {

						  echo "<p>".$str."</p>";

							}
							?>
						  <p><br/></p>
						  <p><br/></p>
						  <p><br/></p>				
						</div>
						  <hr style="height:20px; visibility:hidden;" />						
						<div class=" kopce1 nopadding">						  
						  <a class="btn btn-primary btn-responsive" href="#"><b>Order Now</b></a> 
						  <hr style="height:20px; visibility:hidden;" />						  
						</div>
					  </div>      
					</div>     
					<div class=" col-sm-4 col-xs-12">
					  <div class=" vtoraKolona panel panel-default text-center">
						<div class=" podnaslovPrice nopadding">
						  <h3><?php echo $name2; ?></h3>
						  <hr style="height:30px; visibility:hidden;" />						  
						  <h1><?php echo $job2; ?></h1>
						  <hr style="height:0px; visibility:hidden;" />
						  <h6><i><?php echo $opis2; ?></i></h5>
						</div>
						<div class=" textPayment nopadding">
						  <hr style="height:20px; visibility:hidden;" />						
						   <?php 

						  $newarr = explode("\n",$text2);

						  foreach($newarr as $str) {

						  echo "<p>".$str."</p>";

							}
							?>						  
						  <p><br/></p>
						  <p><br/></p>
						</div>
						  <hr style="height:20px; visibility:hidden;" />						
						<div class=" kopce2 nopadding">	
				          <a class="btn btn-primary btn-responsive" href="#"><b>Order Now</b></a>
						  <hr style="height:20px; visibility:hidden;" />						  
						</div>
					  </div>      
					</div>       
					<div class="col-sm-4 col-xs-12">
					  <div class="colona panel panel-default text-center nopadding">
						<div class=" podnaslovPrice nopadding">
						  <h3><?php echo $name3; ?></h3>
						  <hr style="height:30px; visibility:hidden;" />						  
						  <h1><?php echo $job3; ?></h1>
						   <hr style="height:0px; visibility:hidden;" />
						  <h6><i><?php echo $opis3; ?></i></h6>
						</div>
						<div class=" textPayment nopadding">
						  <hr style="height:20px; visibility:hidden;" />
						   <?php 

						  $newarr = explode("\n",$text3);

						  foreach($newarr as $str) {

						  echo "<p>".$str."</p>";

							}
							?>
						</div>
						  <hr style="height:20px; visibility:hidden;" />						
						<div class=" kopce3 nopadding">
						  <a class="btn btn-primary btn-responsive" href="#"><b>Order Now</b></a> 
						  <hr style="height:20px; visibility:hidden;" />						  
						</div>
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
   $instance['opis1'] = ( ! empty( $new_instance['opis1'] ) ) ? strip_tags( $new_instance['opis1'] ) : '';
   $instance['opis2'] = ( ! empty( $new_instance['opis2'] ) ) ? strip_tags( $new_instance['opis2'] ) : '';
   $instance['opis3'] = ( ! empty( $new_instance['opis3'] ) ) ? strip_tags( $new_instance['opis3'] ) : '';
   $instance['text1'] = ( ! empty( $new_instance['text1'] ) ) ? strip_tags( $new_instance['text1'] ) : '';
   $instance['text2'] = ( ! empty( $new_instance['text2'] ) ) ? strip_tags( $new_instance['text2'] ) : '';
   $instance['text3'] = ( ! empty( $new_instance['text3'] ) ) ? strip_tags( $new_instance['text3'] ) : '';


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
function register_multiverseprices_widget() {
    register_widget( 'multiverseprices_widget' );
}
add_action( 'widgets_init', 'register_multiverseprices_widget' );