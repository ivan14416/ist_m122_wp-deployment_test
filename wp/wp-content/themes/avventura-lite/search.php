<?php 

	get_header(); 

	get_sidebar('top');
	get_sidebar('header');

	if ( !avventura_lite_setting('avventura_lite_search_layout') || avventura_lite_setting('avventura_lite_search_layout') == 'masonry' ) {
				
		get_template_part('layouts/search','masonry'); 

	} else if ( strstr(avventura_lite_setting('avventura_lite_search_layout'), 'sidebar' )) { 

		get_template_part('layouts/search','sidebar'); 

	} else { 
		
		get_template_part('layouts/search','classic');
			
	}

	get_footer(); 

?>