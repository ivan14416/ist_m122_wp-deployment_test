<?php 

/**
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('avventura_lite_image_format_function')) {

	function avventura_lite_image_format_function() {

		do_action(
			'avventura_lite_thumbnail',
			'avventura_lite_blog_thumbnail',
			esc_attr(avventura_lite_setting('avventura_lite_post_icon', 'on'))
		);

	?>
    
        <div class="post-article">
        
            <?php 
				
                do_action('avventura_lite_before_content', 'post');
                do_action('avventura_lite_after_content'); 
                
            ?>
        
        </div>

	<?php

	}

	add_action( 'avventura_lite_image_format', 'avventura_lite_image_format_function' );

}

?>