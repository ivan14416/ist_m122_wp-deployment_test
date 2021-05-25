<?php 

/**
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('avventura_lite_before_content_function')) {

	function avventura_lite_before_content_function( $type = "post" ) {
		
		if ( $type == "post" ) :
			
			echo '<span class="entry-category">'; 
			the_category(' . '); 
			echo '</span>';
		
		endif;
		
		if ( ! avventura_lite_is_single() ) {

			do_action('avventura_lite_get_title', 'blog' ); 

		} else {

			if ( !avventura_lite_is_woocommerce_active('is_cart') ) :
	
				if ( avventura_lite_is_single() && !is_page_template() ) :
							 
					do_action('avventura_lite_get_title', 'single');
							
				else :
					
					do_action('avventura_lite_get_title', 'blog'); 
							 
				endif;
	
			endif;

		}

		if ( $type == "post" ) :
			
			echo '<span class="entry-date">' . esc_html__('On ','avventura-lite') . get_the_date() . esc_html__(' by ','avventura-lite') . get_the_author_posts_link() . '</span>';
		
		endif;

	} 
	
	add_action( 'avventura_lite_before_content', 'avventura_lite_before_content_function' );

}

?>