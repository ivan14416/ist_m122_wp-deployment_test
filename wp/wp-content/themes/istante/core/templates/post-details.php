<div class="line"> 
		
	<div class="entry-info">
		   
		<span><i class="fa fa-clock-o"></i><?php echo esc_html(get_the_date());?></span>
                
		<?php 
				
			if ( comments_open() ) : 
		
		?>

				<span>
					<i class="fa fa-comments-o"></i>
					<?php 
						echo comments_number(
							'<a href="'.esc_url(get_permalink($post->ID)).'#respond">' . esc_html__( '0 comments', 'istante').'</a>',
							'<a href="'.esc_url(get_permalink($post->ID)).'#comments">1 ' . esc_html__( 'comment', 'istante').'</a>',
							'<a href="'.esc_url(get_permalink($post->ID)).'#comments">% ' . esc_html__( 'comments', 'istante').'</a>'
						);
					?>
				</span>
                    
		<?php 
				
			endif; 
					
		?>
        
		<?php echo istante_posticon();?>
		<span> <i class="fa fa-tags"></i><?php the_category(', '); ?></span>
		<span> <i class="fa fa-user"></i><?php echo wp_kses_post(get_the_author_posts_link()); ?></span>
    
	</div>
	
</div>
