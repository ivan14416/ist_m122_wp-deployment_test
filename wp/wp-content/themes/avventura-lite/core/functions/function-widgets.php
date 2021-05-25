<?php

if (!function_exists('avventura_lite_loadwidgets')) {

	function avventura_lite_loadwidgets() {

/*-----------------------------------------------------------------------------------*/
/* 		LOAD ALL SIDEBAR AREAS
/*-----------------------------------------------------------------------------------*/    

		register_sidebar(array(
		
			'name' => esc_html__('Side widget area','avventura-lite'),
			'id'   => 'avventura-lite-side-widget-area',
			'description'   => esc_html__('This widget area will be shown after the content.', 'avventura-lite'),
			'before_widget' => '<div id="%1$s" class="post-article  %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title"><span>',
			'after_title'   => '</span></h4>'
		
		));

		register_sidebar(array(
		
			'name' => esc_html__('Scroll widget area','avventura-lite'),
			'id'   => 'avventura-lite-scroll-widget-area',
			'description'   => esc_html__('This widget area will be shown under the scrollable sidebar.', 'avventura-lite'),
			'before_widget' => '<div id="%1$s" class="post-article  %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'
		
		));

		register_sidebar(array(
		
			'name' => esc_html__('Top widget area','avventura-lite'),
			'id'   => 'avventura-lite-top-widget-area',
			'description'   => esc_html__('This widget area will be shown at the top of your content (Recommended for Revolution Slider).', 'avventura-lite'),
			'before_widget' => '<div id="%1$s" class="post-container %2$s"><article class="post-article">',
			'after_widget'  => '</article></div>',
			'before_title'  => '<h4 class="title"><span>',
			'after_title'   => '</span></h4>'
		
		));
	
		register_sidebar(array(

			'name' => esc_html__('Header widget area','avventura-lite'),
			'id'   => 'avventura-lite-header-widget-area',
			'description'   => esc_html__('This widget area will be shown before the content.', 'avventura-lite'),
			'before_widget' => '<div id="%1$s" class="post-container %2$s"><article class="post-article">',
			'after_widget'  => '</article></div>',
			'before_title'  => '<h4 class="title"><span>',
			'after_title'   => '</span></h4>'
		
		));

		register_sidebar(array(

			'name' => esc_html__('Bottom widget area','avventura-lite'),
			'id'   => 'avventura-lite-bottom-widget-area',
			'description'   => esc_html__('This widget area will be shown at the bottom of your content (Recommended for Instagram widget)', 'avventura-lite'),
			'before_widget' => '<div id="%1$s" class="post-container %2$s"><article class="post-article">',
			'after_widget'  => '</article></div>',
			'before_title'  => '<h4 class="title"><span>',
			'after_title'   => '</span></h4>'
		
		));
	
		register_sidebar(array(

			'name' => esc_html__('Footer widget area','avventura-lite'),
			'id'   => 'avventura-lite-footer-widget-area',
			'description'   => esc_html__('This widget area will be shown after the content.', 'avventura-lite'),
			'before_widget' => '<div id="%1$s" class="col-md-3 %2$s"><div class="widget-box">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'
		
		));

	}

	add_action( 'widgets_init', 'avventura_lite_loadwidgets' );

}

?>