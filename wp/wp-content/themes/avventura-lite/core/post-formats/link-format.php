<?php

/**
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('avventura_lite_link_format_function')) {

	function avventura_lite_link_format_function() {

	?>
	
        <div class="post-article link">
        
            <a href="<?php echo esc_url(avventura_lite_get_link_url()); ?>" target="_blank">
            
                <i class="fa fa-link"></i>
                <?php echo get_the_title(); ?>
            
            </a>
           
        </div>
        
	<?php

	}

	add_action( 'avventura_lite_link_format', 'avventura_lite_link_format_function' );

}

?>