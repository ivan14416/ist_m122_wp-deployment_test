<?php 

	get_header();
	
	get_sidebar('top');
	get_sidebar('header');
	
	do_action('istante_sticky_posts');
	
	get_template_part('core/templates/featured', 'links'); 

	if ( !avventura_lite_setting('avventura_lite_home') || avventura_lite_setting('avventura_lite_home') == 'masonry' ) {
				
		get_template_part('layouts/home','masonry'); 

	} else if ( strstr(avventura_lite_setting('avventura_lite_home'), 'sidebar' )) { 

		get_template_part('layouts/home','sidebar'); 

	} else { 
		
		get_template_part('layouts/home','classic');
			
	}

	get_footer(); 
	
?>