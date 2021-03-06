<?php 

/**
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('avventura_lite_product_format_function')) {

	function avventura_lite_product_format_function() {

		global $post, $product;
		
		$image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'product');
					
		$contentclass = "no-thumbnail";
		
		$html = '<div class="item product-container woocommerce">';
					
		if ( $image ) :
		
			$contentclass = "";
						
			$html .= '<div class="product-thumbnail">';
			$html .= '<img src="'.$image[0].'" class="attachment-blog wp-post-image" alt="post image" title="post image">';
			$html .= '</div>';
		
		endif;
					
		$html .= '<div class="product-content '.$contentclass.'">';
		$html .= '<h3 class="product-title"><a href="'.esc_url(get_permalink($post->ID)).'">'.get_the_title().'</a></h3>';
								
		if ( avventura_lite_postmeta( '_sale_price' ) ) :	
											
			$html .= '<span class="onsale">Sale!</span>';
											
		endif;
										
		$html .= $product->get_rating_html(); 
										
		$product_ID = new WC_Product( get_the_ID() ); 
									
		if ( $price_html = $product_ID->get_price_html() ) : 
									
			$html .= '<span class="price">'.$price_html.'</span>'; 
									
		endif; 
									
		$html .= apply_filters( 'woocommerce_loop_add_to_cart_link',
		sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="button ajax_add_to_cart %s product_type_%s">%s</a>',
			esc_url( $product->add_to_cart_url() ),
			esc_attr( $product->id ),
			esc_attr( $product->get_sku() ),
			esc_attr( isset( $quantity ) ? $quantity : 1 ),
			$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
			esc_attr( $product->product_type ),
			esc_html( $product->add_to_cart_text() )
			),
		$product );
		
		$html .= '</div>';
		$html .= '</div>';
		
		echo $html;

	}

	add_action( 'avventura_lite_product_format', 'avventura_lite_product_format_function' );

}

?>