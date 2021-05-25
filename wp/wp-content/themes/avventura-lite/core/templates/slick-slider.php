<?php

/**
 * WPinProgress
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('avventura_lite_slick_slider_function')) {

	function avventura_lite_slick_slider_function($columns, $size) {
		
		$placeholder = ( $columns == 1 ) ? 'placeholder-940x600.jpg' : 'placeholder-400x400.jpg' ; 

		$args = array(
			'post_type' => 'post',
			'posts_per_page' => avventura_lite_setting('avventura_lite_slideshow_limit','-1')
		);

		$query = new WP_Query($args); 
		
		if ( $query->have_posts() ) :  
                                
?>

        <div class="post-container slick-slideshow" data-columns="<?php echo esc_attr($columns);?>">

            <div class="slider slick-slides">

			<?php
        
                if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); 
        
                    global $post;
                    
					$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), $size);
                    $thumbnailIMG = (!empty($thumb)) ? $thumb[0] : get_template_directory_uri()."/assets/images/".$placeholder;
					$thumbnailALT = (get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true )) ? get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ) : get_the_title() ;

			?>
			
					<div>
				   
						<div class="slick-article">

							<img src="<?php echo esc_url($thumbnailIMG); ?>" alt="<?php echo esc_attr($thumbnailALT); ?>">
							
							<?php if ( !avventura_lite_setting('avventura_lite_slideshow_overlay') || avventura_lite_setting('avventura_lite_slideshow_overlay') == "on" ) : ?>
                                
                                <div class="slider-overlay">
                                    <div class="slider-overlay-wrapper">
                                    	<div class="slider-overlay-content">
											<?php if ( avventura_lite_setting('avventura_lite_slideshow_post_category','on') == 'on' ) : ?>
                                            	<span class="entry-category"><?php the_category(' . '); ?></span>
                                            <?php endif;?>
                                            <h2 class="title"><a href="<?php echo esc_url(get_permalink($post->ID)); ?>"><span><?php echo get_the_title(); ?></span></a></h2>
											<?php if ( avventura_lite_setting('avventura_lite_slideshow_post_details','on') == 'on' ) : ?>
                                            	<span class="entry-date"><?php echo esc_html__('On ','avventura-lite') . get_the_date() . esc_html__(' by ','avventura-lite') . get_the_author_posts_link(); ?></span>	
                                            <?php endif;?>
                                    	</div>
                                    </div>
                                </div>
                                
                            <?php endif; ?>
                            
						</div>
						
					</div>
			
			<?php

				endwhile; 
				endif;
                wp_reset_query();
                wp_reset_postdata();

			?>

            </div>
            
        </div>

<?php

        endif;
	
	}

	add_action( 'avventura_lite_slick_slider', 'avventura_lite_slick_slider_function', 10, 2);

}

?>