<?php

/**
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('avventura_lite_top_sidebar_function')) {

	function avventura_lite_top_sidebar_function() {

		$isWidget = is_active_sidebar('avventura-lite-top-widget-area') ? TRUE : FALSE;
		$isPosition = ( !avventura_lite_setting('avventura_lite_homepage_slideshow_position') || avventura_lite_setting('avventura_lite_homepage_slideshow_position') === 'top' ) ? TRUE : FALSE;
		$isHome = ( !avventura_lite_setting('avventura_lite_homepage_slideshow') || avventura_lite_setting('avventura_lite_homepage_slideshow') === 'on') ? TRUE : FALSE;
		$isSlideshow = ( $isHome == TRUE && $isPosition == TRUE && ( is_home() || is_front_page()) ) ? TRUE : FALSE;

		if ( $isWidget || $isSlideshow ) : 
	
	?>
			
			<div id="top_sidebar" class="sidebar-area">
			
				<?php 
						
					if ( $isSlideshow == TRUE )
						do_action('avventura_lite_slick_slider', 3 , 'avventura_lite_slick_small');
							
					if ( $isWidget == TRUE )
						dynamic_sidebar('avventura-lite-top-widget-area');
                    	
				?>
                			
			</div>
				
	<?php 
	
		endif;
		
	}

	add_action( 'avventura_lite_top_sidebar', 'avventura_lite_top_sidebar_function' );

}

?>