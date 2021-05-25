<?php

/*-----------------------------------------------------------------------------------*/
/* Enqueu scripts */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('istante_enqueue_scripts')) {

	function istante_enqueue_scripts() {

		wp_deregister_style( 'avventura-lite-style' );
		wp_deregister_style( 'avventura-lite-' . esc_attr(get_theme_mod('avventura_lite_skin', 'orange')) );

		wp_enqueue_style( 'avventura-lite-parent-style' , get_template_directory_uri() . '/style.css' ); 

		wp_enqueue_style(
			'istante-' . esc_attr(get_theme_mod('avventura_lite_skin', 'orange')),
			get_stylesheet_directory_uri() . '/assets/skins/' . esc_attr(get_theme_mod('avventura_lite_skin', 'orange')) . '.css',
			array( 'istante-style' ),
			'1.0.0'
		); 

		wp_enqueue_style( 'istante-style' , get_stylesheet_directory_uri() . '/style.css' ); 

		$googleFontsArgs = array(
			'family' =>	str_replace('|', '%7C','Playfair+Display:wght@400;500;600;700;800;900,Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i'),
			'subset' =>	'latin,latin-ext'
		);
		
		wp_deregister_style('google-fonts');
		wp_enqueue_style('google-fonts', add_query_arg ( $googleFontsArgs, "https://fonts.googleapis.com/css" ), array(), '1.0.0' );

	}
	
	add_action( 'wp_enqueue_scripts', 'istante_enqueue_scripts', 999);

}

/*-----------------------------------------------------------------------------------*/
/* Replace hooks */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('istante_replace_hooks')) {

	function istante_replace_hooks() {
		remove_action('avventura_lite_slick_slider', 'avventura_lite_slick_slider_function');
		remove_action('avventura_lite_thumbnail', 'avventura_lite_thumbnail_function');
		remove_action('avventura_lite_before_content', 'avventura_lite_before_content_function' );
	}
	
	add_action('init','istante_replace_hooks');

}

/*-----------------------------------------------------------------------------------*/
/* Exclude sticky posts on home */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('istante_exclude_sticky_posts_on_home')) {

	function istante_exclude_sticky_posts_on_home($query) {
		if ( 
			$query->is_home() && 
			$query->is_main_query() && 
			(!avventura_lite_setting('istante_sticky_posts') || strstr(avventura_lite_setting('istante_sticky_posts'), 'layout' ))) {
			$query->set('post__not_in', get_option( 'sticky_posts' ));
		}
	}
	
	add_action('pre_get_posts', 'istante_exclude_sticky_posts_on_home');

}

/*-----------------------------------------------------------------------------------*/
/* Sticky post grid */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('istante_sticky_posts_function')) {

	function istante_sticky_posts_function() {

		$isHome = ( !avventura_lite_setting('istante_sticky_posts') || strstr(avventura_lite_setting('istante_sticky_posts'), 'layout' )) ? TRUE : FALSE;
		$isSlideshow = ( $isHome == TRUE && ( is_home() || is_front_page()) ) ? TRUE : FALSE;

		$args = array(
			'post_type' => 'post',
			'posts_per_page' => 4,
			'post__in'  => get_option( 'sticky_posts' ),
			'ignore_sticky_posts' => 1,
			'meta_query' => 
			array(
				array(
					'key' => '_thumbnail_id',
					'compare' => 'EXISTS'
				)
			)
		);

		$query = new WP_Query($args); 

		if ( $isSlideshow && $query->have_posts() ) : 

	?>
		
        <section class="sticky-posts-main-wrapper">
        
            <div id="sticky-posts-container" class="container">
                
                <div class="row">
                    
                    <div class="col-md-12">
                        
                        <div class="sticky-posts-wrapper <?php echo esc_attr(avventura_lite_setting('istante_sticky_posts','layout-2'));?>">
            
                        <?php
    
                            while ( $query->have_posts() ) : $query->the_post(); 
            
                                global $post;
                                $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
    
                        ?>
    
                                <div class="sticky-post sticky-post-<?php echo $query->current_post?>" style="background-image: url(<?php echo esc_url($thumb[0]); ?>);" >
                                
                                    <a title="<?php echo esc_attr(get_the_title());?>" class="sticky-post-permalink" href="<?php echo esc_url(get_permalink($post->ID)); ?>" ></a>
                        
                                    <h2 class="title"><?php echo esc_html(get_the_title()); ?></h2>
                                    
                                    <?php 
                                        
                                        $categories = get_the_category();
                                        
                                        if ( !empty( $categories ) ) {
                                            
                                            echo '<div class="sticky-post-categories">';
    
                                            foreach ( $categories as $category ) {
                                                echo '<div class="sticky-post-category">' . esc_html($category->name) . '</div>';
                                            }
                                            
                                            echo '</div>';
    
                                        }
    
                                    ?>
                
                                </div>
                
                            <?php
    
                                endwhile; 
                                wp_reset_postdata();
    
                            ?>
    
    
                        <div class="clear"></div>
    
                        </div>        
    
                    </div>        
    
                </div>    
    
            </div>        
				
    	</section>
        
	<?php 
	
		endif;
		
	}

	add_action( 'istante_sticky_posts', 'istante_sticky_posts_function' );

}

/*-----------------------------------------------------------------------------------*/
/* Customize register */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('istante_customize_register')) {

	function istante_customize_register( $wp_customize ) {

		$wp_customize->remove_control( 'avventura_lite_post_icon');
		$wp_customize->remove_control( 'avventura_lite_header_layout');
		$wp_customize->remove_section( 'slideshow_section');
		$wp_customize->remove_section( 'slideshow_section');
		
		$wp_customize->add_setting( 'istante_logo_text_color', array(
			'default' => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color',

		));

		$wp_customize->add_control( 'istante_logo_text_color' , array(
			'type' => 'color',
			'section' => 'colors',
			'label' => esc_html__('Logo text color','istante'),
			'description' => esc_html__('Choose your custom color for the logo.','istante'),
		));
		
		$wp_customize->add_panel( 'istante_settings' , array(
			'title'      => esc_html__( 'Istante Settings', 'istante' ),
			'priority'   => 11,
			'type'   => 'panel',
		));

		$wp_customize->add_section( 'sticky_posts_section' , array(
			'title'      => esc_html__( 'Sticky posts section', 'istante' ),
			'priority'   => 1,
			'type'   => 'section',
			'panel'   => 'istante_settings',
		));
				
		$wp_customize->add_setting( 'istante_sticky_posts', array(
			'default' => 'layout-2',
			'sanitize_callback' => 'istante_select_sanitize',

		));

		$wp_customize->add_control( 'istante_sticky_posts' , array(
			'type' => 'select',
			'priority' => '09',
			'section' => 'sticky_posts_section',
			'label' => esc_html__('Sticky post grid','istante'),
			'description' => esc_html__('Do you want to enable the sticky post grid on homepage?.','istante'),
			'choices'  => array (
			   'disable' => esc_html__( 'Disable','istante'),
			   'layout-1' => esc_html__( 'Layout 1','istante'),
			   'layout-2' => esc_html__( 'Layout 2','istante'),
			   'layout-3' => esc_html__( 'Layout 3','istante'),
			   'layout-4' => esc_html__( 'Layout 4','istante'),
			),
		));
		
		$wp_customize->add_section( 'featured_links_section' , array(
			'title'      => esc_html__( 'Featured Link Settings', 'istante' ),
			'priority'   => 1,
			'type'   => 'section',
			'panel'   => 'istante_settings',
		));
		
		$wp_customize->add_setting( 'istante_enable_featuredlinks_section', array(
			'default' => true,
			'sanitize_callback' => 'istante_checkbox_sanize',

		));

		$wp_customize->add_control( 'istante_enable_featuredlinks_section' , array(
			'type' => 'checkbox',
			'section' => 'featured_links_section',
			'label' => esc_html__('Enable the featured links section','istante'),
			'description' => esc_html__('Do you want to display the featured links section, below the sticky post grid?.','istante'),
		));
		
		$wp_customize->add_section( 'featured_link_1' , array(
			'title'      => esc_html__( 'Featured Link #1', 'istante' ),
			'priority'   => 1,
			'type'   => 'section',
			'panel'   => 'istante_settings',
		));
		
		$wp_customize->add_setting( 'istante_featured_link_1_image', array(
			'sanitize_callback' => 'absint',
			'capability' => 'edit_theme_options',
		));

		$wp_customize->add_control( new WP_Customize_Cropped_Image_Control($wp_customize, 'istante_featured_link_1_image', array(
			'label' => esc_html__( 'Image','istante'),
			'mime_type' => 'image',
			'description' => esc_html__( 'Upload the image','istante'),
			'section' => 'featured_link_1',
			'settings' => 'istante_featured_link_1_image',
			'width' => 240,
			'height' => 240,    'flex_width'        => false, 
    'flex_height'       => false,

		)));
		
		$wp_customize->add_setting( 'istante_featured_link_1_title', array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		));

		$wp_customize->add_control( 'istante_featured_link_1_title' , array(
			'type' => 'text',
			'section' => 'featured_link_1',
			'label' => esc_html__('Title','istante'),
			'description' => esc_html__('Insert the title of this slide','istante'),
		));
		
		$wp_customize->add_setting( 'istante_featured_link_1_url', array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
		));

		$wp_customize->add_control( 'istante_featured_link_1_url' , array(
			'type' => 'text',
			'section' => 'featured_link_1',
			'label' => esc_html__('Url','istante'),
			'description' => esc_html__('Insert the url of this slide','istante'),
		));
		
		
		$wp_customize->add_section( 'featured_link_2' , array(
			'title'      => esc_html__( 'Featured Link #2', 'istante' ),
			'priority'   => 1,
			'type'   => 'section',
			'panel'   => 'istante_settings',
		));
		
		$wp_customize->add_setting( 'istante_featured_link_2_image', array(
			'sanitize_callback' => 'absint',
			'capability' => 'edit_theme_options',
		));

		$wp_customize->add_control( new WP_Customize_Cropped_Image_Control($wp_customize, 'istante_featured_link_2_image', array(
			'label' => esc_html__( 'Image','istante'),
			'mime_type' => 'image',
			'description' => esc_html__( 'Upload the image','istante'),
			'section' => 'featured_link_2',
			'settings' => 'istante_featured_link_2_image',
			'width' => 240,
			'height' => 240,    'flex_width'        => false, 
    'flex_height'       => false,

		)));
		
		$wp_customize->add_setting( 'istante_featured_link_2_title', array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		));

		$wp_customize->add_control( 'istante_featured_link_2_title' , array(
			'type' => 'text',
			'section' => 'featured_link_2',
			'label' => esc_html__('Title','istante'),
			'description' => esc_html__('Insert the title of this slide','istante'),
		));
		
		$wp_customize->add_setting( 'istante_featured_link_2_url', array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
		));

		$wp_customize->add_control( 'istante_featured_link_2_url' , array(
			'type' => 'text',
			'section' => 'featured_link_2',
			'label' => esc_html__('Url','istante'),
			'description' => esc_html__('Insert the url of this slide','istante'),
		));
		
		$wp_customize->add_section( 'featured_link_3' , array(
			'title'      => esc_html__( 'Featured Link #3', 'istante' ),
			'priority'   => 1,
			'type'   => 'section',
			'panel'   => 'istante_settings',
		));
		
		$wp_customize->add_setting( 'istante_featured_link_3_image', array(
			'sanitize_callback' => 'absint',
			'capability' => 'edit_theme_options',
		));

		$wp_customize->add_control( new WP_Customize_Cropped_Image_Control($wp_customize, 'istante_featured_link_3_image', array(
			'label' => esc_html__( 'Image','istante'),
			'mime_type' => 'image',
			'description' => esc_html__( 'Upload the image','istante'),
			'section' => 'featured_link_3',
			'settings' => 'istante_featured_link_3_image',
			'width' => 240,
			'height' => 240,    'flex_width'        => false, 
    'flex_height'       => false,

		)));
		
		$wp_customize->add_setting( 'istante_featured_link_3_title', array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		));

		$wp_customize->add_control( 'istante_featured_link_3_title' , array(
			'type' => 'text',
			'section' => 'featured_link_3',
			'label' => esc_html__('Title','istante'),
			'description' => esc_html__('Insert the title of this slide','istante'),
		));
		
		$wp_customize->add_setting( 'istante_featured_link_3_url', array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
		));

		$wp_customize->add_control( 'istante_featured_link_3_url' , array(
			'type' => 'text',
			'section' => 'featured_link_3',
			'label' => esc_html__('Url','istante'),
			'description' => esc_html__('Insert the url of this slide','istante'),
		));
		
		
		function istante_checkbox_sanize($input) {
			return $input ? true : false;
		}

		function istante_select_sanitize ($value, $setting) {
		
			global $wp_customize;
					
			$control = $wp_customize->get_control( $setting->id );
				 
			if ( array_key_exists( $value, $control->choices ) ) {
					
				return $value;
					
			} else {
					
				return $setting->default;
					
			}
			
		}

		function istante_image_upload_sanize ( $file, $setting ) {

			$mimes = array (
				'jpg|jpeg|jpe' 	=> 'image/jpeg',
				'gif' 			=> 'image/gif',
				'png' 			=> 'image/png',
			);
			
			$file_ext = wp_check_filetype ($file, $mimes );
			return	$file_ext['ext'] ? $file : $setting->default;

		}

	}
	
	add_action( 'customize_register', 'istante_customize_register', 11 );

}

/*-----------------------------------------------------------------------------------*/
/* Theme setup */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('istante_theme_setup')) {

	function istante_theme_setup() {

		set_theme_mod( 'avventura_lite_homepage_slideshow', 'off' );

		load_child_theme_textdomain( 'istante', get_stylesheet_directory() . '/languages' );
		require_once( trailingslashit( get_stylesheet_directory() ) . 'core/functions/function-style.php' );

		remove_theme_support( 'custom-logo');

		$defaults = array( 'header-text' => array( 'site-title', 'site-description' ));
		add_theme_support( 'custom-logo', $defaults );

		register_default_headers( array(
			'default-image' => array(
				'url'           => get_stylesheet_directory_uri() . '/assets/images/header/header.jpg',
				'thumbnail_url' => get_stylesheet_directory_uri() . '/assets/images/header/resized-header.jpg',
				'description'   => esc_html__( 'Default image', 'istante' )
			),
		));

		add_theme_support( 'custom-header', array( 
			'width'         => 1920,
			'height'        => 600,
			'default-image' => get_stylesheet_directory_uri() . '/assets/images/header/header.jpg',
			'header-text' 	=> false
		));
		
	}

	add_action( 'after_setup_theme', 'istante_theme_setup', 999);

}

/*-----------------------------------------------------------------------------------*/
/* Post icon */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('istante_posticon')) {

	function istante_posticon() {
	
		$icons = array ( 
			'video' => 'fa fa-play' , 
			'gallery' => 'fa fa-camera' , 
			'audio' => 'fa fa-volume-up' , 
			'chat' => 'fa fa-users', 
			'status' => 'fa fa-keyboard-o', 
			'image' => 'fa fa-picture-o' ,
			'quote' => 'fa fa-quote-left', 
			'link' => 'fa fa-external-link', 
			'aside' => 'fa fa-file-text-o', 
		);
	
		if ( get_post_format() ) { 
		
			$icon = '<span class="post-icon"><i class="'.$icons[get_post_format()].'"></i><span>' . ucfirst( strtolower( get_post_format() )) . '</span></span>'; 
		
		} else {
		
			$icon = '<span class="post-icon"><i class="fa fa-pencil-square-o"></i><span>' . esc_html__( 'Article','istante') . '</span></span>'; 
		
		}

		return $icon;
	
	}

}

/*-----------------------------------------------------------------------------------*/
/* Post thumbnail */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('istante_thumbnail_function')) {

	function istante_thumbnail_function($id, $icon = false) {

		global $post;
		
		if ( '' != get_the_post_thumbnail() ) { 
			
	?>
			
			<div class="pin-container">
            
			<?php 
				
				if ( !avventura_lite_is_single() ) {
			
			?>
                
                    <a href="<?php echo esc_url(get_the_permalink()); ?>">
                        <?php the_post_thumbnail($id); ?>
                    </a>
                
			<?php 
				
				} else {
					
					the_post_thumbnail($id);
				
				}
				
			?>
                    
			</div>
			
	<?php
	
		}
	
	}

	add_action( 'avventura_lite_thumbnail', 'istante_thumbnail_function', 10, 2 );

}

/*-----------------------------------------------------------------------------------*/
/* Widgets init */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('istante_before_content_function')) {

	function istante_before_content_function( $type = "post" ) {
		
		if ( ! avventura_lite_is_single() ) {

			do_action('avventura_lite_get_title', 'blog' ); 

		} else {

			if ( !avventura_lite_is_woocommerce_active('is_cart') ) :
	
				if ( avventura_lite_is_single() && !is_page_template() ) :
							 
					do_action('avventura_lite_get_title', 'single');
							
				else :
					
					do_action('avventura_lite_get_title', 'blog'); 
							 
				endif;
	
			endif;

		}

		if ( $type == "post" ) :
		
			get_template_part('core/templates/post', 'details'); 


		endif;

	} 
	
	add_action( 'avventura_lite_before_content', 'istante_before_content_function' );

}

?>