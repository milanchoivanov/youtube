<?php
/*
=====================================================
Home Widget
=====================================================
*/

// Creating the widget 
class multiversehome_widget extends WP_Widget {

function __construct() {
 
   // Add Widget scripts
   add_action('admin_enqueue_scripts', array($this, 'scripts'));
 
   parent::__construct(
      'home_widget', // Base ID
      __( 'Multiverse Home Widget', 'home_domain' ), // Name
      array( 'description' => __( 'Widget That Change Home Page', 'home_domain' ), ) // Args
   );
}

public function form( $instance ) {
	$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'text_domain' );
    $author = ! empty( $instance['author'] ) ? $instance['author'] : __( 'New author', 'text_domain' );
	$text = ! empty( $instance['text'] ) ? $instance['text'] : __( 'Enter New Description', 'text_domain' );
    $price = ! empty( $instance['price'] ) ? $instance['price'] : __( 'New price', 'text_domain' );

   $image = ! empty( $instance['image'] ) ? $instance['image'] : '';
   $imagebest = ! empty( $instance['imagebest'] ) ? $instance['imagebest'] : '';
     
	// (ova bese kod od drugo programce sto rabotese no vaka e podobro) $instance = wp_parse_args( (array) $instance, array( 'text' => '' ) );
    // (od drugo programce kod sto rabotese no vaka e podobro) $text = format_to_edit($instance['text']);
   ?>
  
   <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Home Page Big Title:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
   </p> 
   
      <p>
      <label for="<?php echo $this->get_field_id( 'author' ); ?>"><?php _e( 'Author Name:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'author' ); ?>" name="<?php echo $this->get_field_name( 'author' ); ?>" type="text" value="<?php echo esc_attr( $author ); ?>">
   </p>

   <p>
   <label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e( 'Description:' ); ?></label>
   <textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>
	</p>
	      <p>
      <label for="<?php echo $this->get_field_id( 'price' ); ?>"><?php _e( 'Enter New Price:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'price' ); ?>" name="<?php echo $this->get_field_name( 'price' ); ?>" type="text" value="<?php echo esc_attr( $price ); ?>">
   </p>
    
   <p>
      <label for="<?php echo $this->get_field_id( 'image' ); ?>"><?php _e( 'Front Image:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" type="text" value="<?php echo esc_url( $image ); ?>" />
      <button class="upload_image_button button button-primary">Upload Image</button>
   </p>
   
      <p>
      <label for="<?php echo $this->get_field_id( 'imagebest' ); ?>"><?php _e( 'Best Seller Image:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'imagebest' ); ?>" name="<?php echo $this->get_field_name( 'imagebest' ); ?>" type="text" value="<?php echo esc_url( $imagebest ); ?>" />
      <button class="upload_image_button button button-primary">Upload Image</button>
   </p>
   
   <?php
}

public function widget( $args, $instance ) {
   // Our variables from the widget settings
  $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Default title', 'text_domain' ) : $instance['title'] );
   $author = apply_filters( 'widget_author', empty( $instance['author'] ) ? __( 'Default author', 'text_domain' ) : $instance['author'] );
   $price = apply_filters( 'widget_price', empty( $instance['price'] ) ? __( 'Default price', 'text_domain' ) : $instance['price'] );

   $image = ! empty( $instance['image'] ) ? $instance['image'] : '';
   $imagebest = ! empty( $instance['imagebest'] ) ? $instance['imagebest'] : '';
 
           extract($args);
        $text = apply_filters( 'widget_text', $instance['text'], $instance );
        echo $before_widget;
   ?>
   
  		<div id="home" class="row home nopadding">
					<div class=" slika  col-xs-10 col-xs-offset-2 col-sm-6  col-md-6 col-lg-6  nopadding">
						<hr style="height:30px; visibility:hidden;" />		
						   <?php if($image): ?>
							  <img src="<?php echo esc_url($image); ?>" class="img-responsive" alt="book" width="1000px" height="850px" alt="">
						   <?php endif; ?>
 					</div>
					<div class="opis  col-xs-12 col-sm-6   col-md-6  col-lg-6 nopadding">
						<hr class="pomestuvaTop" style=" visibility:hidden;" />
						<h2 class="textH2" ><?php echo $title; ?></h2>
						<h5 class="textH5" ><?php echo $author; ?> </h5>
						<hr class="pomestuva" style=" visibility:hidden;" />
						<?php 

						  $newarr = explode("\n",$text);

						  foreach($newarr as $str) {

						  echo "<p class='textP'>".$str."</p>";

							}
							?>
						
						<hr class="pomestuva" style=" visibility:hidden;" />
								<div class="imageBest">
							   <?php if($imagebest): ?>
								<img src="<?php echo esc_url($imagebest); ?>" alt="">
								<?php endif; ?>
								</div>
						<h2 class="textH2" style="font-weight:bold"><?php echo $price; ?></h2>
						<hr class="pomestuva" style=" visibility:hidden;" />
						<div class="btnPurchase">
						<a class="btn btn-primary btn-responsive" href="#pricing"> Purchase Now</a>
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
   $instance['author'] = ( ! empty( $new_instance['author'] ) ) ? strip_tags( $new_instance['author'] ) : '';
   $instance['price'] = ( ! empty( $new_instance['price'] ) ) ? strip_tags( $new_instance['price'] ) : '';
   
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
function register_multiversehome_widget() {
    register_widget( 'multiversehome_widget' );
}
add_action( 'widgets_init', 'register_multiversehome_widget' );