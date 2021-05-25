<?php 

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('avventura_lite_mobile_menu_function')) {

	function avventura_lite_mobile_menu_function() {

?>

        <div id="sidebar-wrapper">
            
            <div id="scroll-sidebar" class="clearfix">

                <div class="wrap">

                	<a class="mobile-navigation" href="#modal-sidebar">
                		<i class="fa fa-times open"></i>
                	</a>
                	
	                <div class="mobilemenu-box">
						<nav id="mobilemenu"><?php wp_nav_menu( array('theme_location' => 'main-menu', 'container' => 'false','depth' => 3  )); ?></nav> 
					</div>
	                
	                <?php do_action('avventura_lite_scroll_sidebar');?>
                
            	</div>

            </div>
        
        </div>
        
<?php
	
	}

	add_action( 'avventura_lite_mobile_menu', 'avventura_lite_mobile_menu_function' );

}

?>