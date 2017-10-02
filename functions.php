<?php

/* 
===============================
Login Customization
===============================
*/
//Change LOGO Picture
function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
        background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/orb92.png);
		height:80px;
		width:80px;
		background-size: 80px 80px;
		background-repeat: no-repeat;
        padding-bottom: 10px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

// Edit LOGO (Logo is made as link that lead you to your webpage and write "Holographic Multiverse" on mouse hover)

function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Holographic Multiverse';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

// Styling LOGIN with outside CSS (connection to outside file)

function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/css/style-login.css' );
    wp_enqueue_script( 'custom-login', get_stylesheet_directory_uri() . '/js/style-login.js' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );

/*
	==========================================
	 Admin Customization
	==========================================
*/
 //This function is removing the Wordpress Logo from admin panel
 /*
function remove_wp_logo( $wp_admin_bar ){
    $wp_admin_bar->remove_node( 'wp-logo' );
}
add_action( 'admin_bar_menu', 'remove_wp_logo', 100 );

function add_my_own_logo( $wp_admin_bar ) {
    $args = array(
        'id'    => 'my-logo',
        'meta'  => array( 'class' => 'my-logo', 'title' => 'logo' )
    );
    $wp_admin_bar->add_node( $args );
}
add_action( 'admin_bar_menu', 'add_my_own_logo', 1 ); */


// Remove all the icons, links from the admin bar
 /*add_action( 'admin_bar_menu', 'wpse_76491_admin_bar_menu', 200 );

function wpse_76491_admin_bar_menu() 
{
    global $wp_admin_bar;   
    if ( !is_object( $wp_admin_bar ) )
        return;

    // Clean the AdminBar
    $nodes = $wp_admin_bar->get_nodes();
    foreach( $nodes as $node )
    {
        // 'top-secondary' is used for the User Actions right side menu
        if( !$node->parent || 'top-secondary' == $node->parent )
        {
            $wp_admin_bar->remove_menu( $node->id );
        }           
    }
    // end Clean
}

//
// Logout button on the admin bar

function custom_logout_link() {
    global $wp_admin_bar;
    $wp_admin_bar->add_menu( array(
        'id'    => 'wp-custom-logout',
        'title' => 'Logout',
        'parent'=> 'top-secondary',
        'href'  => wp_logout_url()
    ) );
    $wp_admin_bar->remove_menu('my-account');
}
add_action( 'wp_before_admin_bar_render', 'custom_logout_link' );

//This function is adding custom logo in admin panel

function wpb_custom_logo() {
    echo '<style type="text/css">
    #wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
    background-image: url(' . get_bloginfo('stylesheet_directory') . '/images/orb.png) !important;
    background-position: 0 0;
    color:rgba(0, 0, 0, 0);
    }
    #wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
    background-position: 0 0;
    }
    </style>
    ';
}

//hook into the administrative header output
add_action('wp_before_admin_bar_render', 'wpb_custom_logo');

*/

/*
	==========================================
	 Include scripts
	==========================================
*/
function multiverse_script_enqueue() {
	//css
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.4', 'all');
	wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/multiverse.css', array(), '1.0.0', 'all');
	wp_enqueue_style('glyphicons', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '1.0.0', 'all');
	//js
	wp_enqueue_script('jqueryjs', get_template_directory_uri() . '/js/jquery.min.js', array(), null, true);
	wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.4', true);
	wp_enqueue_script('multiversejs', get_template_directory_uri() . '/js/multiverse.js', array('jquery'), null, true);
	
}

add_action( 'wp_enqueue_scripts', 'multiverse_script_enqueue');

/* 
==================================================
	Include menu
==================================================
*/
function menu_theme_setup(){
	add_theme_support('menus');
	register_nav_menu('primary','Primary Header Navigation');
	
}
add_action('init', 'menu_theme_setup');



/* 
==================================================
	Walker Function
==================================================
<?php
	
/* Collection of Walker classes */

	/*
		
		wp_nav_menu()
		
		<div class="menu-container">
			<ul> // start_lvl()
				<li><a><span> // start_el()
				
					</a></span>
					
					<ul>
					</li> // end_el()
					
				<li><a>Link</a></li>
				<li><a>Link</a></li>
				<li><a>Link</a></li>
				
			</ul> // end_lvl()
		</div>
		
	*/
	
class Walker_Nav_Primary extends Walker_Nav_menu {
	
	function start_lvl( &$output, $depth = 0, $args = array() ){ //ul
		$indent = str_repeat("\t",$depth);
		$submenu = ($depth > 0) ? ' sub-menu' : '';
		$output .= "\n$indent<ul class=\"NameULClass$submenu depth_$depth\">\n";   //"NameULClass" imeto na ovaa klasa na <ul> koe ne e prvo tuku e vtoro,treto pod <li> moze da se smeni po potreba
	}
	
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ){ //li a span
		
		$indent = ( $depth ) ? str_repeat("\t",$depth) : '';
		
		$li_attributes = '';
		$class_names = $value = '';
		
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		
		$classes[] = ($args->walker->has_children) ? 'has-sub' : '';    // "has-sub" imeto moze da se smeni po potreba
		$classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
		$classes[] = 'menu-item-' . $item->ID;
		if( $depth && $args->walker->has_children ){
			$classes[] = 'has-sub-submenu'; // "has-sub" ova ime moze da se menuva po potreba
		}
		
		$class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr($class_names) . '"';
		
		$id = apply_filters('nav_menu_item_id', 'menu-item-'.$item->ID, $item, $args);
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
		
		$output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';
		
		$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr($item->target) . '"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr($item->url) . '"' : '';
		
		$attributes .= ( $args->walker->has_children ) ? ' class="has-sub" data-toggle="dropdown"' : ''; // "has-sub"  ova ime moze da se menuva po potreba
		
		$item_output = $args->before;
		$item_output .= '<a' . $attributes . '>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= ( $depth == 0 && $args->walker->has_children ) ? ' <b class=""></b></a>' : '</a>'; // <b class="caret"> ako se dodade ova se pokazuva vo menito strelka nadolu
		$item_output .= $args->after;
		
		$output .= apply_filters ( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		
	}
	function end_lvl(&$output, $depth=0, $args=array()) {
        $output .= "</ul></div>\n";
    }
	
/*	
	function end_el(){ // closing li a span
		
	}
	
	function end_lvl(){ // closing ul
		
	}
*/

}
class Walker_Nav_Secondary extends Walker_Nav_menu {
	
	function start_lvl( &$output, $depth = 0, $args = array() ){ //ul
		$indent = str_repeat("\t",$depth);
		$submenu = ($depth > 0) ? ' sub-menu' : '';
		$output .= "\n$indent<ul class=\"NameULClass$submenu depth_$depth\">\n";   //"NameULClass" imeto na ovaa klasa na <ul> koe ne e prvo tuku e vtoro,treto pod <li> moze da se smeni po potreba
	}
	
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ){ //li a span
		
		$indent = ( $depth ) ? str_repeat("\t",$depth) : '';
		
		$li_attributes = '';
		$class_names = $value = '';
		
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		
		$classes[] = ($args->walker->has_children) ? 'has-sub' : '';    // "has-sub" imeto moze da se smeni po potreba
		$classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
		$classes[] = 'menu-item-' . $item->ID;
		if( $depth && $args->walker->has_children ){
			$classes[] = 'has-sub-submenu'; // "has-sub" ova ime moze da se menuva po potreba
		}
		
		$class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr($class_names) . '"';
		
		$id = apply_filters('nav_menu_item_id', 'menu-item-'.$item->ID, $item, $args);
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
		
		$output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';
		
		$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr($item->target) . '"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr($item->url) . '"' : '';
		
		$attributes .= ( $args->walker->has_children ) ? ' class="has-sub" data-toggle="dropdown"' : ''; // "has-sub"  ova ime moze da se menuva po potreba
		
		$item_output = $args->before;
		$item_output .= '<a' . $attributes . '>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= ( $depth == 0 && $args->walker->has_children ) ? ' <b class=""></b></a>' : '</a>'; // <b class="caret"> ako se dodade ova se pokazuva vo menito strelka nadolu
		$item_output .= $args->after;
		
		$output .= apply_filters ( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		
	}
	function end_lvl(&$output, $depth=0, $args=array()) {
        $output .= "</ul></div>\n";
    }
	
/*	
	function end_el(){ // closing li a span
		
	}
	
	function end_lvl(){ // closing ul
		
	}
*/

}



/*
==========================================================================
Require function from folder "inc" kade se smesteni functciite za widgets
==========================================================================

*/
require get_template_directory() . '/inc/function-logo.php';
require get_template_directory() . '/inc/function-home.php';
require get_template_directory() . '/inc/function-biography.php';
require get_template_directory() . '/inc/function-slider.php';
require get_template_directory() . '/inc/function-about.php';
require get_template_directory() . '/inc/function-testimonial.php';
require get_template_directory() . '/inc/function-prices.php';
require get_template_directory() . '/inc/function-contact.php';


















