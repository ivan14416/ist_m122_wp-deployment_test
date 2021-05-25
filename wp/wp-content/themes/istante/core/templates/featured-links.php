<?php
	
	if ( avventura_lite_setting('istante_enable_featuredlinks_section', true) == true ) :

		echo '<div class="container featured-links-wrapper">';
			
			echo '<div class="row">';

                if ( avventura_lite_setting('istante_featured_link_1_image') ) :
				
                    $istante_featured_image_1 = esc_attr(avventura_lite_setting('istante_featured_link_1_image'));
                    $istante_featured_link_1 = wp_get_attachment_url($istante_featured_image_1);
                    $istante_featured_title_1 =  avventura_lite_setting('istante_featured_link_1_title');
    
                    echo '<div class="featured-link-item col-md-4">';
    
                    if ( avventura_lite_setting('istante_featured_link_1_url') ) :
    
                        echo '<a href="' . esc_url(avventura_lite_setting('istante_featured_link_1_url')) . '"></a>';
    
                    endif;
    
                    echo '<img src="' . esc_url($istante_featured_link_1) . '" alt="' . esc_attr($istante_featured_title_1) . '">';
    
                    if ( avventura_lite_setting('istante_featured_link_1_title') ) :
    
                        echo '<div class="featured-link-title">';
                        echo '<h6>' . esc_html($istante_featured_title_1) . '</h6>';
                        echo '</div>';
            
                    endif;
    
                    echo '</div>';
                
                endif;
                
                if ( avventura_lite_setting('istante_featured_link_2_image') ) :
                
                    $istante_featured_image_2 = esc_attr(avventura_lite_setting('istante_featured_link_2_image'));
                    $istante_featured_link_2 = wp_get_attachment_url($istante_featured_image_2);
                    $istante_featured_title_2 =  avventura_lite_setting('istante_featured_link_2_title');
    
                    echo '<div class="featured-link-item col-md-4">';
    
                    if ( avventura_lite_setting('istante_featured_link_2_url') ) :
    
                        echo '<a href="' . esc_url(avventura_lite_setting('istante_featured_link_2_url')) . '"></a>';
    
                    endif;
    
                    echo '<img src="' . esc_url($istante_featured_link_2) . '" alt="' . esc_attr($istante_featured_title_2) . '">';
    
                    if ( avventura_lite_setting('istante_featured_link_2_title') ) :
    
                        echo '<div class="featured-link-title">';
                        echo '<h6>' . esc_html($istante_featured_title_2) . '</h6>';
                        echo '</div>';
            
                    endif;
    
                    echo '</div>';
                
                endif;
                
                if ( avventura_lite_setting('istante_featured_link_3_image') ) :
                
                    $istante_featured_image_3 = esc_attr(avventura_lite_setting('istante_featured_link_3_image'));
                    $istante_featured_link_3 = wp_get_attachment_url($istante_featured_image_3);
                    $istante_featured_title_3 =  avventura_lite_setting('istante_featured_link_3_title');
    
                    echo '<div class="featured-link-item col-md-4">';
    
                    if ( avventura_lite_setting('istante_featured_link_3_url') ) :
    
                        echo '<a href="' . esc_url(avventura_lite_setting('istante_featured_link_3_url')) . '"></a>';
    
                    endif;
    
                    echo '<img src="' . esc_url($istante_featured_link_3) . '" alt="' . esc_attr($istante_featured_title_3) . '">';
    
                    if ( avventura_lite_setting('istante_featured_link_3_title') ) :
    
                        echo '<div class="featured-link-title">';
                        echo '<h6>' . esc_html($istante_featured_title_3) . '</h6>';
                        echo '</div>';
            
                    endif;
    
                    echo '</div>';
                
                endif;

			echo '</div>';
		
		echo '</div>';
		
	endif;

?>