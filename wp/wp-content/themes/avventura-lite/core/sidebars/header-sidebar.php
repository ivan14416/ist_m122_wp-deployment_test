<?php

/**
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('avventura_lite_header_sidebar_function')) {

	function avventura_lite_header_sidebar_function() {

		$isWidget = is_active_sidebar('avventura-lite-header-widget-area') ? TRUE : FALSE;
		$isPosition = ( avventura_lite_setting('avventura_lite_homepage_slideshow_position') === 'header' ) ? TRUE : FALSE;
		$isHome = ( !avventura_lite_setting('avventura_lite_homepage_slideshow') || avventura_lite_setting('avventura_lite_homepage_slideshow') === 'on') ? TRUE : FALSE;
		$isSlideshow = ( $isHome == TRUE && $isPosition == TRUE && ( is_home() || is_front_page()) ) ? TRUE : FALSE;
		if ( $isWidget || $isSlideshow ): 
	
	?>
			
			<div id="header_sidebar" class="container sidebar-area">
			
				<div class="row">
				
					<div class="col-md-12">
                    
                    	<?php 
						
							if ( $isSlideshow == TRUE )
								do_action('avventura_lite_slick_slider', 1, 'avventura_lite_slick_large');
							
							if ( $isWidget == TRUE )
								dynamic_sidebar('avventura-lite-header-widget-area');
                    	
						?>
												
					</div>
	
				</div>
				
			</div>
				
	<?php 
	
		endif;
		
	}

	add_action( 'avventura_lite_header_sidebar', 'avventura_lite_header_sidebar_function' );

}

?>