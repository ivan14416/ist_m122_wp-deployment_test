<?php 

/**
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('avventura_lite_searched_item_function')) {

	function avventura_lite_searched_item_function( $row = "on" ) {
		
		global $s;

		if ( !avventura_lite_setting('avventura_lite_view_searched_item') || avventura_lite_setting('avventura_lite_view_searched_item') == "on" ) :
			
			$allowed = array(
				'div' => array(
					'class' => array(),
				),
			);

			$before = '<div class="row">';
			$after = '</div>';
	
			if ( $row == "off" ) :
			
				$before = '';
				$after = '';
			
			endif;
			
			echo wp_kses($before, $allowed);
			
?>
			
			<div class="post-container col-md-12" >
		
				<article class="post-article category">
						
                    <h1><span><?php esc_html_e( 'Search', 'avventura-lite' ) ?></span> <?php esc_html_e( 'results for', 'avventura-lite' ) ?> <strong><?php echo esc_html($s); ?> </strong></h1>
		
				</article>
		
			</div>
	
<?php
	
			echo wp_kses($after, $allowed);

		endif;
		
	} 
	
	add_action( 'avventura_lite_searched_item', 'avventura_lite_searched_item_function' );

}

?>