<div id="content" class="container">

	<div class="row" id="blog">
    
        <div class="<?php echo avventura_lite_template('span') .' '. avventura_lite_template('sidebar'); ?>">

            <div class="row"> 
        
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                
                        <?php do_action('avventura_lite_postformat'); ?>
                        <div class="clear"></div>
                        
                    </div>
		
				<?php 
                
                    endwhile; 
                    else:  
                
                ?>

                    <div class="post-container col-md-12" >
                
                        <article class="post-article not-found">
                                
                            <h1><?php esc_html_e( 'Not found', 'avventura-lite' ) ?></h1>
                            <p><?php esc_html_e( 'Sorry, no posts found', 'avventura-lite' ) ?></p>
                 
                        </article>
                
                    </div>
	
				<?php 
                    
                    endif;
                
                ?> 
        
            </div>
        
        </div>
        
		<?php do_action( 'avventura_lite_side_sidebar'); ?>
           
    </div>

	<?php do_action( 'avventura_lite_pagination', 'home'); ?>

</div>