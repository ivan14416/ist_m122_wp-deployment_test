<?php 

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('avventura_lite_get_title_function')) {

	function avventura_lite_get_title_function($type) {
		
		global $post;
		
		if ( !empty(get_the_title()) ) {
		
			if ( $type == "blog" ) { 
		
				echo '<h3 class="title page-title"><a href="'.esc_url(get_permalink($post->ID)).'"><span>'. get_the_title() .'</span></a></h3>';
		
			} else if ( $type == "single" ) {
				
				echo '<h1 class="title page-title"><span>'. get_the_title() .'</span></h1>';
	
			}
	
		}
	
	}

	add_action( 'avventura_lite_get_title', 'avventura_lite_get_title_function' );

}

?>