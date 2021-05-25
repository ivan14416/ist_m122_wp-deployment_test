<?php 

	get_header();

	get_sidebar('top');
	get_sidebar('header');

	if ( !avventura_lite_setting('avventura_lite_category_layout') || avventura_lite_setting('avventura_lite_category_layout') == 'masonry' ) {
				
		get_template_part('layouts/archive','masonry'); 

	} else if ( strstr(avventura_lite_setting('avventura_lite_category_layout'), 'sidebar' )) { 

		get_template_part('layouts/archive','sidebar'); 

	} else { 
		
		get_template_part('layouts/archive','classic');
			
	}

	get_footer(); 

?>