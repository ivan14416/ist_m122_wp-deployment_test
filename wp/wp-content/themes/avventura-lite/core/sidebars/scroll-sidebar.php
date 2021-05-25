<?php 

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('avventura_lite_scroll_sidebar_function')) {

	function avventura_lite_scroll_sidebar_function() { 
	
	?>
    
		<div class="sidebar-area">
                    
		<?php 

			if ( is_active_sidebar('avventura-lite-scroll-widget-area')) { 
                                        
				dynamic_sidebar('avventura-lite-scroll-widget-area');
                                        
			} else { 
        
				the_widget(
                            
					'WP_Widget_Calendar',
					array(
						'title'=> esc_html__('Calendar', 'avventura-lite')
					),
					array(
						'before_widget' => '<div class="post-article widget-box widget_calendar">',
						'after_widget'  => '</div>',
						'before_title'  => '<div class="title-container"><h3 class="title">',
						'after_title'   => '</h3></div>'
					)
                        
				);
                            
				the_widget(
                            
					'WP_Widget_Archives',
					array(
						'title'=> esc_html__('Archives', 'avventura-lite')
					),
					array(
						'before_widget' => '<div class="post-article widget-box widget_calendar">',
						'after_widget'  => '</div>',
						'before_title'  => '<div class="title-container"><h3 class="title">',
						'after_title'   => '</h3></div>'
					)
                        
				);
                            
				the_widget(
                            
					'WP_Widget_Categories',
					array(
						'title'=> esc_html__('Categories', 'avventura-lite')
					),
					array(
						'before_widget' => '<div class="post-article widget-box widget_calendar">',
						'after_widget'  => '</div>',
						'before_title'  => '<div class="title-container"><h3 class="title">',
						'after_title'   => '</h3></div>'
					)
                        
				);
                                        
			} 
					
		?>
                        
		</div>
            
	<?php 
			 
	}

	add_action( 'avventura_lite_scroll_sidebar', 'avventura_lite_scroll_sidebar_function' );

}

?>