<?php
/*
=====================================================
Biography Widget
=====================================================
*/

// Creating the widget 
class multiversebio_widget extends WP_Widget {

function __construct() {
 
   // Add Widget scripts
   add_action('admin_enqueue_scripts', array($this, 'scripts'));
 
   parent::__construct(
      'bio_widget', // Base ID
      __( 'Multiverse Biography Widget', 'bio_domain' ), // Name
      array( 'description' => __( 'Widget That Change Biography Page', 'bio_domain' ), ) // Args
   );
}

public function form( $instance ) {
	$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New Biography Title', 'text_domain' );
	$facebook = ! empty( $instance['facebook'] ) ? $instance['facebook'] : __( 'Profile Name', 'text_domain' );
	$twitter = ! empty( $instance['twitter'] ) ? $instance['twitter'] : __( 'Profile Name', 'text_domain' );
	$text = ! empty( $instance['text'] ) ? $instance['text'] : __( 'Enter New Biography', 'text_domain' );
    $image = ! empty( $instance['image'] ) ? $instance['image'] : '';
    $imagebest = ! empty( $instance['imagebest'] ) ? $instance['imagebest'] : '';
   ?>
  
   <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Enter New Biography Page Big Title:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
   </p> 
   
   <p>
      <label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php _e( 'Enter New Facebook Profile Name:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" type="text" value="<?php echo esc_attr( $facebook ); ?>">
   </p> 
      <p>
      <label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e( 'Enter New Twitter Profile Name:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" type="text" value="<?php echo esc_attr( $twitter ); ?>">
   </p> 

   <p>
   <label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e( 'Enter Your New Biography:' ); ?></label>
   <textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>
	</p>
    
   <p>
      <label for="<?php echo $this->get_field_id( 'image' ); ?>"><?php _e( 'Upload Your Bio Image:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" type="text" value="<?php echo esc_url( $image ); ?>" />
      <button class="upload_image_button button button-primary">Upload Image</button>
   </p>
   
      <p>
      <label for="<?php echo $this->get_field_id( 'imagebest' ); ?>"><?php _e( 'Upload Your Signature Image:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'imagebest' ); ?>" name="<?php echo $this->get_field_name( 'imagebest' ); ?>" type="text" value="<?php echo esc_url( $imagebest ); ?>" />
      <button class="upload_image_button button button-primary">Upload Image</button>
   </p>
   
   <?php
}

public function widget( $args, $instance ) {
   // Our variables from the widget settings
  $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Default title', 'text_domain' ) : $instance['title'] );
  $facebook = apply_filters( 'widget_facebook', empty( $instance['facebook'] ) ? __( 'Default facebook', 'text_domain' ) : $instance['facebook'] );
  $twitter = apply_filters( 'widget_twitter', empty( $instance['twitter'] ) ? __( 'Default twitter', 'text_domain' ) : $instance['twitter'] );
  $text = apply_filters( 'widget_text', empty( $instance['text'] ) ? __( 'Default text', 'text_domain' ) : $instance['text'] );
  $image = ! empty( $instance['image'] ) ? $instance['image'] : '';
  $imagebest = ! empty( $instance['imagebest'] ) ? $instance['imagebest'] : '';
  
	    echo $args['before_widget'];
   ?>
   			<!-- Ova e div koj ke ja pomesti stranata nadolu -->
							<div id="bio" class="row nopadding">
								<div class="emptySpace row nopadding">
								
								</div>
							</div>	
   	<div class="row nopadding">
  		<div class="biography nopadding">
				
					<div class="row nopadding">
							<div>
							<h1 class="aboutTheAuthor"><?php echo $title; ?></h1>
							</div>
					</div>
					<hr class="style13">
							</br>
					<div class="row slideanim nopadding">
						<div class=" col-xs-12 col-sm-7 col-sm-offset-5  col-md-5 col-lg-offset-1 col-lg-4  nopadding">
							
								<div class="slikaMilanchoDiv row nopadding">
							    <?php if($image): ?>
								<img class="slikaMilancho" src="<?php echo esc_url($image); ?>" alt="Milancho Ivanov" />
								<?php endif; ?>
								</div>
								<div class="slikaPotpisDiv row nopadding">
								<hr style="height:1px; visibility:hidden;" />
								<?php if($image): ?>
								<img class="slikaPotpis" src="<?php echo esc_url($imagebest); ?>" alt="Milancho Ivanov" />
                                <?php endif; ?>
								</div>
								<br/>
								<div class="listaSocial social-network social-circle row nopadding">
								    <ul id="social" class="socialList" style="list-style-type:none">
									<li><h2 style=" font-family:Georgia; color: #444444; ">Follow me:</h2></li>								
									<li><a href="https://www.facebook.com/<?php echo $facebook; ?>" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"> </i> </a> </li>
									<li><a href="https://twitter.com/<?php echo $twitter; ?>" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"> </i> </a> </li>
									</ul>
								</div>
							
						</div>
						<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7  nopadding">
							<div class="textBio">
							<?php 

						  $newarr = explode("\n",$text);

						  foreach($newarr as $str) {

						  echo "<p class='textP'>".$str."</p>";

							}
							?>
							</div>
						</div>
					</div> 
				</div>	
   </div>
							</br>
							</br>
  <hr class="style13"> 

 
   <?php
        echo $args['after_widget'];
   ob_end_flush();
}

public function update( $new_instance, $old_instance ) {
   $instance = array();
   $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
   $instance['facebook'] = ( ! empty( $new_instance['facebook'] ) ) ? strip_tags( $new_instance['facebook'] ) : '';
   $instance['twitter'] = ( ! empty( $new_instance['twitter'] ) ) ? strip_tags( $new_instance['twitter'] ) : '';
   $instance['text'] = ( ! empty( $new_instance['text'] ) ) ? strip_tags( $new_instance['text'] ) : '';
   $instance['image'] = ( ! empty( $new_instance['image'] ) ) ? $new_instance['image'] : '';
   $instance['imagebest'] = ( ! empty( $new_instance['imagebest'] ) ) ? $new_instance['imagebest'] : '';


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
function register_multiversebio_widget() {
    register_widget( 'multiversebio_widget' );
}
add_action( 'widgets_init', 'register_multiversebio_widget' );