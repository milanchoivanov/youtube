	
<?php get_header(); ?>	


	<!-- Prvata strana Intro-->	
		
	<?php dynamic_sidebar( 'home' ); ?>
		
	<!--Moja Biografija-->
	
	<?php dynamic_sidebar( 'biography' ); ?>				
			
	<!-- Kotiranje na ubavi misli vo slide show-->
	
	<?php dynamic_sidebar( 'slider' ); ?>				
		
	<!-- This the overview of the book -->
		
	<?php dynamic_sidebar( 'about' ); ?>				
				
	<!--This is DIV that represent TESTIMONIALS-->
		
	<?php dynamic_sidebar( 'testimonials' ); ?>				

	
	<!--This is for Prices (ova e delot za ceni)-->

	<?php dynamic_sidebar( 'prices' ); ?>				
				
	<!--This is for CONTACT -->
	
	<?php dynamic_sidebar( 'contact' ); ?>				
	
<?php get_footer(); ?>