<?php 

/**
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('avventura_lite_after_content_function')) {

	function avventura_lite_after_content_function() { 
	
		if ( avventura_lite_get_archive_title() || is_page_template() || is_search() || is_home() ) {
	
			if ( !avventura_lite_setting('avventura_lite_view_readmore') || avventura_lite_setting('avventura_lite_view_readmore') == "on" ) {
				
				the_excerpt(); 
			
			} else if (avventura_lite_setting('avventura_lite_view_readmore') == "off" ) {
				
				the_content(); 
			
			}
	
		} else {
		
			the_content();
	
			the_tags( '<footer class="line"><span class="entry-info"><strong>' . esc_html__('Tags:', 'avventura-lite') . '</strong> ', ', ', '</span></footer>' );
	
			comments_template();
		
		}
	
	} 

	add_action( 'avventura_lite_after_content', 'avventura_lite_after_content_function' );

}

?>