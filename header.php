<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php bloginfo('name'); ?><?php wp_title('|'); ?></title>
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<?php wp_head(); ?>
	</head>
	
	<body id="myPage" data-spy="scroll" data-target=".navbar"  data-offset="60">
	
<!--Navigacija na stranata -->
			
	
<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
    <div class="navbar-header">
		</br>
	    </br>
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>

      <a class="navbar-brand" href="#myPage">
			<?php if( is_active_sidebar( 'logo' ) ) : ?>
				<aside class="logo">
				<?php dynamic_sidebar( 'logo' ); ?>
				</aside>
			<?php endif; ?>	  
	  </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
	</br>
	</br>

	<?php wp_nav_menu(array(	
		'theme_location'=>'primary',
		'container' => 'div', 
		'container_class' => '', 
		'container_id' => '',
		'menu_class' => 'nav navbar-nav navbar-right',
		)); 
		?>

		
    </div>
  </div>
</nav>			
	