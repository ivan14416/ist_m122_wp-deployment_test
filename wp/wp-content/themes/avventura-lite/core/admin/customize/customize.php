<?php

if (!function_exists('avventura_lite_customize_panel_function')) {

	function avventura_lite_customize_panel_function() {
		
		$theme_panel = array ( 

			/* START SUPPORT SECTION */ 

			array(
			
				'title' => esc_html__( 'Upgrade to Avventura Premium','avventura-lite'),
				'id' => 'avventura-lite-customize-info',
				'type' => 'avventura-lite-customize-info',
				'section' => 'avventura-lite-customize-info',
				'priority' => '08',

			),

			/* START GENERAL SECTION */ 

			array( 
				
				'title' => esc_html__( 'Avventura Lite Main Settings','avventura-lite'),
				'description' => esc_html__( 'Avventura Lite Main Settings','avventura-lite'),
				'type' => 'panel',
				'id' => 'general_panel',
				'priority' => '10',
				
			),

			/* SKINS */ 

			array( 

				'title' => esc_html__( 'Color Scheme','avventura-lite'),
				'description' => esc_html__( 'From this section you can manage the color scheme of Avventura Lite.','avventura-lite'),
				'type' => 'section',
				'panel' => 'general_panel',
				'priority' => '11',
				'id' => 'colorscheme_section',

			),

			array(
				
				'label' => esc_html__('Header color schemes','avventura-lite'),
				'description' => esc_html__('Choose your header color scheme.','avventura-lite'),
				'id' => 'avventura_lite_header_layout',
				'type' => 'select',
				'section' => 'colorscheme_section',
				'options' => array (
					'dark' => esc_html__( 'Dark','avventura-lite'),
					'light' => esc_html__( 'Light','avventura-lite')
				),
				
				'std' => 'dark',
			
			),

			array(
				
				'label' => esc_html__( 'Body Color Schemes','avventura-lite'),
				'description' => esc_html__('Choose your body color scheme.','avventura-lite'),
				'id' => 'avventura_lite_skin',
				'type' => 'select',
				'section' => 'colorscheme_section',
				'options' => array (
				   'cyan' => esc_html__( 'Cyan','avventura-lite'),
				   'orange' => esc_html__( 'Orange','avventura-lite'),
				   'blue' => esc_html__( 'Blue','avventura-lite'),
				   'red' => esc_html__( 'Red','avventura-lite'),
				   'pink' => esc_html__( 'Pink','avventura-lite'),
				   'purple' => esc_html__( 'Purple','avventura-lite'),
				   'yellow' => esc_html__( 'Yellow','avventura-lite'),
				   'green' => esc_html__( 'Green','avventura-lite'),
				   'black' => esc_html__( 'Black','avventura-lite'),
				),
				
				'std' => 'orange',
			
			),

			/* PAGE WIDTH */ 

			array( 

				'title' => esc_html__( 'Page width','avventura-lite'),
				'description' => esc_html__( 'From this section you can manage the page width of Avventura Lite.','avventura-lite'),
				'type' => 'section',
				'id' => 'pagewidth_section',
				'panel' => 'general_panel',
				'priority' => '12',

			),

			array( 

				'label' => esc_html__( 'Screen greater than 768px','avventura-lite'),
				'description' => esc_html__( 'Set a width, for a screen greater than 768 pixel (for example 750 and not 750px ) ','avventura-lite'),
				'id' => 'avventura_lite_screen1',
				'type' => 'number',
				'section' => 'pagewidth_section',
				'std' => '750',

			),

			array( 

				'label' => esc_html__( 'Screen greater than 992px','avventura-lite'),
				'description' => esc_html__( 'Set a width, for a screen greater than 992 pixel (for example 940 and not 940px ) ','avventura-lite'),
				'id' => 'avventura_lite_screen2',
				'type' => 'number',
				'section' => 'pagewidth_section',
				'std' => '940',

			),

			array( 

				'label' => esc_html__( 'Screen greater than 1200px','avventura-lite'),
				'description' => esc_html__( 'Set a width, in px, for a screen greater than 1200 pixel (for example 1170 and not 1170px ) ','avventura-lite'),
				'id' => 'avventura_lite_screen3',
				'type' => 'number',
				'section' => 'pagewidth_section',
				'std' => '940',

			),

			array( 

				'label' => esc_html__( 'Screen greater than 1400px','avventura-lite'),
				'description' => esc_html__( 'Set a width, in px, for a screen greater than 1400px pixel (for example 1370 and not 1370px ) ','avventura-lite'),
				'id' => 'avventura_lite_screen4',
				'type' => 'number',
				'section' => 'pagewidth_section',
				'std' => '940',

			),

			/* General settings */ 
			
			array( 

				'title' => esc_html__( 'General settings','avventura-lite'),
				'description' => esc_html__( 'From this section you can manage the general settings of Avventura Lite.','avventura-lite'),
				'type' => 'section',
				'id' => 'settings_section',
				'panel' => 'general_panel',
				'priority' => '13',

			),

			array(
				
				'label' => esc_html__( 'Sticky header','avventura-lite'),
				'description' => esc_html__( 'Do you want to enable the sticky header?','avventura-lite'),
				'id' => 'avventura_lite_sticky_header',
				'type' => 'select',
				'section' => 'settings_section',
				'options' => array (
				   'off' => esc_html__( 'No','avventura-lite'),
				   'on' => esc_html__( 'Yes','avventura-lite'),
				),
				
				'std' => 'on',
			
			),

			array(
				
				'label' => esc_html__( 'Category title','avventura-lite'),
				'description' => esc_html__( 'Do you want to view the category title, under the black container?','avventura-lite'),
				'id' => 'avventura_lite_view_category_title',
				'type' => 'select',
				'section' => 'settings_section',
				'options' => array (
				   'off' => esc_html__( 'No','avventura-lite'),
				   'on' => esc_html__( 'Yes','avventura-lite'),
				),
				
				'std' => 'on',
			
			),

			array(
				
				'label' => esc_html__( 'Searched item','avventura-lite'),
				'description' => esc_html__( 'Do you want to view the searched item, under the black container?','avventura-lite'),
				'id' => 'avventura_lite_view_searched_item',
				'type' => 'select',
				'section' => 'settings_section',
				'options' => array (
				   'off' => esc_html__( 'No','avventura-lite'),
				   'on' => esc_html__( 'Yes','avventura-lite'),
				),
				
				'std' => 'on',
			
			),

			array(
				
				'label' => esc_html__('Post Icon','avventura-lite'),
				'description' => esc_html__('Do you want to display the post format icon at hover?','avventura-lite'),
				'id' => 'avventura_lite_post_icon',
				'type' => 'select',
				'section' => 'settings_section',
				'options' => array (
				   'off' => esc_html__( 'No','avventura-lite'),
				   'on' => esc_html__( 'Yes','avventura-lite'),
				),
				
				'std' => 'on',
			
			),

			array(
				
				'label' => esc_html__('Post Format','avventura-lite'),
				'description' => esc_html__('Do you want to use a different layout for the Aside, Link and Quote posts?.','avventura-lite'),
				'id' => 'avventura_lite_post_format_layout',
				'type' => 'select',
				'section' => 'settings_section',
				'options' => array (
				   'off' => esc_html__( 'No','avventura-lite'),
				   'on' => esc_html__( 'Yes','avventura-lite'),
				),
				
				'std' => 'on',
			
			),

			array(
				
				'label' => esc_html__( 'Read more','avventura-lite'),
				'description' => esc_html__( 'Do you want to display the read more button?','avventura-lite'),
				'id' => 'avventura_lite_view_readmore',
				'type' => 'select',
				'section' => 'settings_section',
				'options' => array (
				   'off' => esc_html__( 'No','avventura-lite'),
				   'on' => esc_html__( 'Yes','avventura-lite'),
				),
				
				'std' => 'on',
			
			),

			array(
				
				'label' => esc_html__( 'Back to top button.','avventura-lite'),
				'description' => esc_html__( 'Do you want to display a button to back on the top of the site?','avventura-lite'),
				'id' => 'avventura_lite_view_back_to_top',
				'type' => 'select',
				'section' => 'settings_section',
				'options' => array (
				   'off' => esc_html__( 'No','avventura-lite'),
				   'on' => esc_html__( 'Yes','avventura-lite'),
				),
				
				'std' => 'on',
			
			),

			/* SLIDER SETTINGS */ 

			array( 

				'title' => esc_html__( 'Slideshow settings','avventura-lite'),
				'description' => esc_html__( 'From this section you can manage the settings of homepage slideshow.','avventura-lite'),
				'type' => 'section',
				'id' => 'slideshow_section',
				'panel' => 'general_panel',
				'priority' => '14',

			),
			
			array(
				
				'label' => esc_html__( 'Homepage slideshow','avventura-lite'),
				'description' => esc_html__( 'Do you want to display the slideshow on homepage?','avventura-lite'),
				'id' => 'avventura_lite_homepage_slideshow',
				'type' => 'select',
				'section' => 'slideshow_section',
				'options' => array (
				   'off' => esc_html__( 'No','avventura-lite'),
				   'on' => esc_html__( 'Yes','avventura-lite'),
				),
				
				'std' => 'on',
			
			),

			array(
				
				'label' => esc_html__( 'Slideshow position','avventura-lite'),
				'description' => esc_html__( 'Please select the position of slideshow on homepage.','avventura-lite'),
				'id' => 'avventura_lite_homepage_slideshow_position',
				'type' => 'select',
				'section' => 'slideshow_section',
				'options' => array (
				   'top' => esc_html__( 'Inside the top widget area (full width)','avventura-lite'),
				   'header' => esc_html__( 'Inside the header widget area','avventura-lite'),
				),
				
				'std' => 'top',
			
			),
			
			array(
				
				'label' => esc_html__( 'Post category','avventura-lite'),
				'description' => esc_html__( 'Do you want to display the post category on homepage slideshow?','avventura-lite'),
				'id' => 'avventura_lite_slideshow_post_category',
				'type' => 'select',
				'section' => 'slideshow_section',
				'options' => array (
				   'off' => esc_html__( 'No','avventura-lite'),
				   'on' => esc_html__( 'Yes','avventura-lite'),
				),
				
				'std' => 'on',
			
			),

			array(
				
				'label' => esc_html__( 'Post details','avventura-lite'),
				'description' => esc_html__( 'Do you want to display the post details on homepage slideshow?','avventura-lite'),
				'id' => 'avventura_lite_slideshow_post_details',
				'type' => 'select',
				'section' => 'slideshow_section',
				'options' => array (
				   'off' => esc_html__( 'No','avventura-lite'),
				   'on' => esc_html__( 'Yes','avventura-lite'),
				),
				
				'std' => 'on',
			
			),

			array(
				
				'label' => esc_html__( 'Caption Overlay','avventura-lite'),
				'description' => esc_html__( 'Do you want to display the caption overlay on homepage slideshow?','avventura-lite'),
				'id' => 'avventura_lite_slideshow_overlay',
				'type' => 'select',
				'section' => 'slideshow_section',
				'options' => array (
				   'off' => esc_html__( 'No','avventura-lite'),
				   'on' => esc_html__( 'Yes','avventura-lite'),
				),
				
				'std' => 'on',
			
			),

			array( 

				'label' => esc_html__( 'Limit','avventura-lite'),
				'description' => esc_html__( 'How many items you want to display? (set -1 to load all items)','avventura-lite'),
				'id' => 'avventura_lite_slideshow_limit',
				'type' => 'slideshow_limit',
				'section' => 'slideshow_section',
				'std' => '5',

			),

			/* WooCommerce Settings SECTION */ 

			array( 

				'title' => esc_html__( 'WooCommerce settings','avventura-lite'),
				'description' => esc_html__( 'From this section you can manage the settings of WooCommerce.','avventura-lite'),
				'type' => 'section',
				'id' => 'woocommerce_section',
				'panel' => 'general_panel',
				'priority' => '15',

			),

			array(
				
				'label' => esc_html__('WooCommerce header cart','avventura-lite'),
				'description' => esc_html__('Do you want to show the header cart?','avventura-lite'),
				'id' => 'avventura_lite_woocommerce_header_cart',
				'type' => 'select',
				'section' => 'woocommerce_section',
				'options' => array (
				   'off' => esc_html__( 'No','avventura-lite'),
				   'on' => esc_html__( 'Yes','avventura-lite'),
				),
				
				'std' => 'on',
			
			),
			
			array(
				
				'label' => esc_html__('WooCommerce header cart icon','avventura-lite'),
				'description' => esc_html__('Select the icon for WooCommerce header cart (Please clear the cookies to display the new icon)','avventura-lite'),
				'id' => 'avventura_lite_woocommerce_header_icon',
				'type' => 'select',
				'section' => 'woocommerce_section',
				'options' => array (
				   'fa-shopping-basket' => esc_html__( 'Icon 1','avventura-lite'),
				   'fa-shopping-cart' => esc_html__( 'Icon 2','avventura-lite'),
				   'fa-cart-plus' => esc_html__( 'Icon 3','avventura-lite'),
				),
				
				'std' => 'fa-shopping-basket',
			
			),

			array(
				
				'label' => esc_html__( 'Cross sell products','avventura-lite'),
				'description' => esc_html__( 'Do you want to display the cross sell products on cart page?','avventura-lite'),
				'id' => 'avventura_lite_woocommerce_cross_sell_cart',
				'type' => 'select',
				'section' => 'woocommerce_section',
				'options' => array (
				   'off' => esc_html__( 'No','avventura-lite'),
				   'on' => esc_html__( 'Yes','avventura-lite'),
				),
				
				'std' => 'off',
			
			),

			array(
				
				'label' => esc_html__( 'Related products','avventura-lite'),
				'description' => esc_html__( 'Do you want to display the related products on product page?','avventura-lite'),
				'id' => 'avventura_lite_woocommerce_related_products',
				'type' => 'select',
				'section' => 'woocommerce_section',
				'options' => array (
				   'off' => esc_html__( 'No','avventura-lite'),
				   'on' => esc_html__( 'Yes','avventura-lite'),
				),
				
				'std' => 'off',
			
			),

			array(
				
				'label' => esc_html__( 'Up sell products','avventura-lite'),
				'description' => esc_html__( 'Do you want to display the up sell products on product page?','avventura-lite'),
				'id' => 'avventura_lite_woocommerce_upsell_products',
				'type' => 'select',
				'section' => 'woocommerce_section',
				'options' => array (
				   'off' => esc_html__( 'No','avventura-lite'),
				   'on' => esc_html__( 'Yes','avventura-lite'),
				),
				
				'std' => 'off',
			
			),
			
			array(
				
				'label' => esc_html__( 'WooCommerce linkable product thumbnails','avventura-lite'),
				'description' => esc_html__( 'Do you want to make linkable the product thumbnails on WooCommerce category pages?','avventura-lite'),
				'id' => 'avventura_lite_linkable_product_thumbnails',
				'type' => 'select',
				'section' => 'woocommerce_section',
				'options' => array (
				   'off' => esc_html__( 'No','avventura-lite'),
				   'on' => esc_html__( 'Yes','avventura-lite'),
				),
				
				'std' => 'off',
			
			),

			array(
				
				'label' => esc_html__('WooCommerce Category Layout','avventura-lite'),
				'description' => esc_html__('Select a layout for the woocommerce categories.','avventura-lite'),
				'id' => 'avventura_lite_woocommerce_category_layout',
				'type' => 'select',
				'section' => 'woocommerce_section',
				'options' => array (
				   'full' => esc_html__( 'Full Width','avventura-lite'),
				   'left-sidebar' => esc_html__( 'Left Sidebar','avventura-lite'),
				   'right-sidebar' => esc_html__( 'Right Sidebar','avventura-lite'),
				),
				
				'std' => 'right-sidebar',
			
			),

			/* LAYOUTS SECTION */ 

			array( 

				'title' => esc_html__( 'Layouts','avventura-lite'),
				'description' => esc_html__( 'From this section you can manage the layouts of Avventura Lite.','avventura-lite'),
				'type' => 'section',
				'id' => 'layouts_section',
				'panel' => 'general_panel',
				'priority' => '16',

			),
			
			array(
				
				'label' => esc_html__('Home Blog Layout','avventura-lite'),
				'description' => esc_html__('If you&#39;ve set the latest articles, for the homepage, choose a layout.','avventura-lite'),
				'id' => 'avventura_lite_home',
				'type' => 'select',
				'section' => 'layouts_section',
				'options' => array (
				   'full' => esc_html__( 'Full Width','avventura-lite'),
				   'left-sidebar' => esc_html__( 'Left Sidebar','avventura-lite'),
				   'right-sidebar' => esc_html__( 'Right Sidebar','avventura-lite'),
				   'masonry' => esc_html__( 'Masonry','avventura-lite'),
				),
				
				'std' => 'masonry',
			
			),
	

			array(
				
				'label' => esc_html__('Category Layout','avventura-lite'),
				'description' => esc_html__('Select a layout for category pages.','avventura-lite'),
				'id' => 'avventura_lite_category_layout',
				'type' => 'select',
				'section' => 'layouts_section',
				'options' => array (
				   'full' => esc_html__( 'Full Width','avventura-lite'),
				   'left-sidebar' => esc_html__( 'Left Sidebar','avventura-lite'),
				   'right-sidebar' => esc_html__( 'Right Sidebar','avventura-lite'),
				   'masonry' => esc_html__( 'Masonry','avventura-lite'),
				),
				
				'std' => 'masonry',
			
			),

			array(
				
				'label' => esc_html__('Search Layout','avventura-lite'),
				'description' => esc_html__('Select a layout for the search section.','avventura-lite'),
				'id' => 'avventura_lite_search_layout',
				'type' => 'select',
				'section' => 'layouts_section',
				'options' => array (
				   'full' => esc_html__( 'Full Width','avventura-lite'),
				   'left-sidebar' => esc_html__( 'Left Sidebar','avventura-lite'),
				   'right-sidebar' => esc_html__( 'Right Sidebar','avventura-lite'),
				   'masonry' => esc_html__( 'Masonry','avventura-lite'),
				),
				
				'std' => 'masonry',
			
			),

			array(
				
				'label' => esc_html__('Read More Layout','avventura-lite'),
				'description' => esc_html__('Select a layout for the read more button.','avventura-lite'),
				'id' => 'avventura_lite_readmore_layout',
				'type' => 'select',
				'section' => 'layouts_section',
				'options' => array (
					'default' => esc_html__( 'Default Button','avventura-lite'),
					'nobutton' => esc_html__( 'Replace with => [...]','avventura-lite'),
				),
				
				'std' => 'default',
			
			),

			/* FOOTER AREA SECTION */ 

			array( 

				'title' => esc_html__( 'Social Links and Footer','avventura-lite'),
				'description' => esc_html__( 'From this section you can manage the social icons and the copyright text.','avventura-lite'),
				'type' => 'section',
				'id' => 'footer_section',
				'panel' => 'general_panel',
				'priority' => '17',

			),

			array( 

				'label' => esc_html__( 'Copyright Text','avventura-lite'),
				'description' => esc_html__( 'Insert your copyright text.','avventura-lite'),
				'id' => 'avventura_lite_copyright_text',
				'type' => 'textarea',
				'section' => 'footer_section',
				'std' => '',

			),

			array( 

				'label' => esc_html__( 'Facebook Url','avventura-lite'),
				'description' => esc_html__( 'Insert Facebook Url (leave empty if you want to hide the button)','avventura-lite'),
				'id' => 'avventura_lite_footer_facebook_button',
				'type' => 'url',
				'section' => 'footer_section',
				'std' => '',

			),

			array( 

				'label' => esc_html__( 'Twitter Url','avventura-lite'),
				'description' => esc_html__( 'Insert Twitter Url (leave empty if you want to hide the button)','avventura-lite'),
				'id' => 'avventura_lite_footer_twitter_button',
				'type' => 'url',
				'section' => 'footer_section',
				'std' => '',

			),

			array( 

				'label' => esc_html__( 'Flickr Url','avventura-lite'),
				'description' => esc_html__( 'Insert Flickr Url (leave empty if you want to hide the button)','avventura-lite'),
				'id' => 'avventura_lite_footer_flickr_button',
				'type' => 'url',
				'section' => 'footer_section',
				'std' => '',

			),

			array( 

				'label' => esc_html__( 'Linkedin Url','avventura-lite'),
				'description' => esc_html__( 'Insert Linkedin Url (leave empty if you want to hide the button)','avventura-lite'),
				'id' => 'avventura_lite_footer_linkedin_button',
				'type' => 'url',
				'section' => 'footer_section',
				'std' => '',

			),

			array( 

				'label' => esc_html__( 'Slack Url','avventura-lite'),
				'description' => esc_html__( 'Insert Slack Url (leave empty if you want to hide the button)','avventura-lite'),
				'id' => 'avventura_lite_footer_slack_button',
				'type' => 'url',
				'section' => 'footer_section',
				'std' => '',

			),

			array( 

				'label' => esc_html__( 'Pinterest Url','avventura-lite'),
				'description' => esc_html__( 'Insert Pinterest Url (leave empty if you want to hide the button)','avventura-lite'),
				'id' => 'avventura_lite_footer_pinterest_button',
				'type' => 'url',
				'section' => 'footer_section',
				'std' => '',

			),

			array( 

				'label' => esc_html__( 'Tumblr Url','avventura-lite'),
				'description' => esc_html__( 'Insert Tumblr Url (leave empty if you want to hide the button)','avventura-lite'),
				'id' => 'avventura_lite_footer_tumblr_button',
				'type' => 'url',
				'section' => 'footer_section',
				'std' => '',

			),

			array( 

				'label' => esc_html__( 'Soundcloud Url','avventura-lite'),
				'description' => esc_html__( 'Insert Soundcloud Url (leave empty if you want to hide the button)','avventura-lite'),
				'id' => 'avventura_lite_footer_soundcloud_button',
				'type' => 'url',
				'section' => 'footer_section',
				'std' => '',

			),

			array( 

				'label' => esc_html__( 'Spotify Url','avventura-lite'),
				'description' => esc_html__( 'Insert Spotify Url (leave empty if you want to hide the button)','avventura-lite'),
				'id' => 'avventura_lite_footer_spotify_button',
				'type' => 'url',
				'section' => 'footer_section',
				'std' => '',

			),

			array( 

				'label' => esc_html__( 'Youtube Url','avventura-lite'),
				'description' => esc_html__( 'Insert Youtube Url (leave empty if you want to hide the button)','avventura-lite'),
				'id' => 'avventura_lite_footer_youtube_button',
				'type' => 'url',
				'section' => 'footer_section',
				'std' => '',

			),

			array( 

				'label' => esc_html__( 'Vimeo Url','avventura-lite'),
				'description' => esc_html__( 'Insert Vimeo Url (leave empty if you want to hide the button)','avventura-lite'),
				'id' => 'avventura_lite_footer_vimeo_button',
				'type' => 'url',
				'section' => 'footer_section',
				'std' => '',

			),

			array( 

				'label' => esc_html__( 'VK Url','avventura-lite'),
				'description' => esc_html__( 'Insert VK Url (leave empty if you want to hide the button)','avventura-lite'),
				'id' => 'avventura_lite_footer_vk_button',
				'type' => 'url',
				'section' => 'footer_section',
				'std' => '',

			),

			array( 

				'label' => esc_html__( 'Instagram Url','avventura-lite'),
				'description' => esc_html__( 'Insert Instagram Url (leave empty if you want to hide the button)','avventura-lite'),
				'id' => 'avventura_lite_footer_instagram_button',
				'type' => 'url',
				'section' => 'footer_section',
				'std' => '',

			),

			array( 

				'label' => esc_html__( 'Deviantart Url','avventura-lite'),
				'description' => esc_html__( 'Insert Deviantart Url (leave empty if you want to hide the button)','avventura-lite'),
				'id' => 'avventura_lite_footer_deviantart_button',
				'type' => 'url',
				'section' => 'footer_section',
				'std' => '',

			),

			array( 

				'label' => esc_html__( 'Github Url','avventura-lite'),
				'description' => esc_html__( 'Insert Github Url (leave empty if you want to hide the button)','avventura-lite'),
				'id' => 'avventura_lite_footer_github_button',
				'type' => 'url',
				'section' => 'footer_section',
				'std' => '',

			),

			array( 

				'label' => esc_html__( 'Xing Url','avventura-lite'),
				'description' => esc_html__( 'Insert Xing Url (leave empty if you want to hide the button)','avventura-lite'),
				'id' => 'avventura_lite_footer_xing_button',
				'type' => 'url',
				'section' => 'footer_section',
				'std' => '',

			),
			
			array( 

				'label' => esc_html__( 'Dribbble Url','avventura-lite'),
				'description' => esc_html__( 'Insert Dribbble Url (leave empty if you want to hide the button)','avventura-lite'),
				'id' => 'avventura_lite_footer_dribbble_button',
				'type' => 'url',
				'section' => 'footer_section',
				'std' => '',

			),
			
			array( 

				'label' => esc_html__( 'Dropbox Url','avventura-lite'),
				'description' => esc_html__( 'Insert Dropbox Url (leave empty if you want to hide the button)','avventura-lite'),
				'id' => 'avventura_lite_footer_dropbox_button',
				'type' => 'url',
				'section' => 'footer_section',
				'std' => '',

			),
			
			array( 

				'label' => esc_html__( 'WhatsApp Number','avventura-lite'),
				'description' => esc_html__( 'Insert WhatsApp number (leave empty if you want to hide the button)','avventura-lite'),
				'id' => 'avventura_lite_footer_whatsapp_button',
				'type' => 'button',
				'section' => 'footer_section',
				'std' => '',

			),

			array( 

				'label' => esc_html__( 'Telegram Account','avventura-lite'),
				'description' => esc_html__( 'Insert Telegram Account (leave empty if you want to hide the button)','avventura-lite'),
				'id' => 'avventura_lite_footer_telegram_button',
				'type' => 'button',
				'section' => 'footer_section',
				'std' => '',

			),

			array( 
	
				'label' => esc_html__( 'Trello Account','avventura-lite'),
				'description' => esc_html__( 'Insert Trello Account (leave empty if you want to hide the button)','avventura-lite'),
				'id' => 'avventura_lite_footer_trello_button',
				'type' => 'button',
				'section' => 'footer_section',
				'std' => '',
	
			),
	
			array( 
	
				'label' => esc_html__( 'Twitch Account','avventura-lite'),
				'description' => esc_html__( 'Insert Twitch Account (leave empty if you want to hide the button)','avventura-lite'),
				'id' => 'avventura_lite_footer_twitch_button',
				'type' => 'button',
				'section' => 'footer_section',
				'std' => '',
	
			),
	
			array( 
	
				'label' => esc_html__( 'Tripadvisor Account','avventura-lite'),
				'description' => esc_html__( 'Insert Tripadvisor Account (leave empty if you want to hide the button)','avventura-lite'),
				'id' => 'avventura_lite_footer_tripadvisor_button',
				'type' => 'button',
				'section' => 'footer_section',
				'std' => '',
	
			),
	
			array( 
	
				'label' => esc_html__( 'Vine Account','avventura-lite'),
				'description' => esc_html__( 'Insert Vine Account (leave empty if you want to hide the button)','avventura-lite'),
				'id' => 'avventura_lite_footer_vine_button',
				'type' => 'button',
				'section' => 'footer_section',
				'std' => '',
	
			),

			array( 

				'label' => esc_html__( 'Skype Url','avventura-lite'),
				'description' => esc_html__( 'Insert Skype ID (leave empty if you want to hide the button)','avventura-lite'),
				'id' => 'avventura_lite_footer_skype_button',
				'type' => 'button',
				'section' => 'footer_section',
				'std' => '',

			),

			array( 

				'label' => esc_html__( 'Email Address','avventura-lite'),
				'description' => esc_html__( 'Insert Email Address (leave empty if you want to hide the button)','avventura-lite'),
				'id' => 'avventura_lite_footer_email_button',
				'type' => 'button',
				'section' => 'footer_section',
				'std' => '',

			),

			array(
				
				'label' => esc_html__( 'Feed Rss Button','avventura-lite'),
				'description' => esc_html__( 'Do you want to display the Feed Rss button?','avventura-lite'),
				'id' => 'avventura_lite_footer_rss_button',
				'type' => 'select',
				'section' => 'footer_section',
				'options' => array (
				   'off' => esc_html__( 'No','avventura-lite'),
				   'on' => esc_html__( 'Yes','avventura-lite'),
				),
				
				'std' => 'off',
			
			),

			/* TYPOGRAPHY SECTION */ 

			array( 
				
				'title' => esc_html__( 'Avventura Lite Typography','avventura-lite'),
				'description' => esc_html__( 'Avventura Lite Typography','avventura-lite'),
				'type' => 'panel',
				'id' => 'typography_panel',
				'priority' => '11',
				
			),

			/* LOGO */ 

			array( 

				'title' => esc_html__( 'Logo','avventura-lite'),
				'description' => esc_html__( 'From this section you can manage the typography of the logo.','avventura-lite'),
				'type' => 'section',
				'id' => 'logo_section',
				'panel' => 'typography_panel',
				'priority' => '10',

			),

			array( 

				'label' => esc_html__( 'Font size','avventura-lite'),
				'description' => esc_html__( 'Insert a size, for logo font (For example, 60px) ','avventura-lite'),
				'id' => 'avventura_lite_logo_font_size',
				'type' => 'pixel_size',
				'section' => 'logo_section',
				'std' => '70px',

			),
			
			array( 

				'label' => esc_html__( 'Description font size','avventura-lite'),
				'description' => esc_html__( 'Insert a size, for logo description (For example, 14px) ','avventura-lite'),
				'id' => 'avventura_lite_logo_description_font_size',
				'type' => 'pixel_size',
				'section' => 'logo_section',
				'std' => '14px',

			),

			array( 

				'label' => esc_html__( 'Description top margin','avventura-lite'),
				'description' => esc_html__( 'Add a space between the logo and the description (For example, 15px) ','avventura-lite'),
				'id' => 'avventura_lite_logo_description_top_margin',
				'type' => 'pixel_size',
				'section' => 'logo_section',
				'std' => '15px',

			),

			/* MENU */ 

			array( 

				'title' => esc_html__( 'Menu','avventura-lite'),
				'description' => esc_html__( 'From this section you can manage the typography of the menu.','avventura-lite'),
				'type' => 'section',
				'id' => 'menu_section',
				'panel' => 'typography_panel',
				'priority' => '11',

			),

			array( 

				'label' => esc_html__( 'Font size','avventura-lite'),
				'description' => esc_html__( 'Insert a size, for menu font (For example, 14px) ','avventura-lite'),
				'id' => 'avventura_lite_menu_font_size',
				'type' => 'pixel_size',
				'section' => 'menu_section',
				'std' => '14px',

			),

			array(
				
				'label' => esc_html__('Menu weight','avventura-lite'),
				'description' => esc_html__('Choose a font weight for the menu.','avventura-lite'),
				'id' => 'avventura_lite_menu_font_weight',
				'type' => 'select',
				'section' => 'menu_section',
				'options' => array(
					'300' => esc_html__( '300','avventura-lite'),
					'400' => esc_html__( '400','avventura-lite'),
					'700' => esc_html__( '700','avventura-lite'),
					'900' => esc_html__( '900','avventura-lite'),
				),

				'std' => '400',
			
			),
			
			array(
				
				'label' => esc_html__('Text transform','avventura-lite'),
				'description' => esc_html__('Do you want to display an uppercase menu?.','avventura-lite'),
				'id' => 'avventura_lite_menu_text_transform',
				'type' => 'select',
				'section' => 'menu_section',
				'options' => array(
					'none' => esc_html__( 'None','avventura-lite'),
					'uppercase' => esc_html__( 'Uppercase','avventura-lite'),
				),

				'std' => 'none',
			
			),
			
			/* CONTENT */ 

			array( 

				'title' => esc_html__( 'Content','avventura-lite'),
				'description' => esc_html__( 'From this section you can manage the typography of the content.','avventura-lite'),
				'type' => 'section',
				'id' => 'content_section',
				'panel' => 'typography_panel',
				'priority' => '12',

			),

			array( 

				'label' => esc_html__( 'Font size','avventura-lite'),
				'description' => esc_html__( 'Insert a size, for content font (For example, 14px) ','avventura-lite'),
				'id' => 'avventura_lite_content_font_size',
				'type' => 'pixel_size',
				'section' => 'content_section',
				'std' => '14px',

			),


			/* HEADLINES */ 

			array( 

				'title' => esc_html__( 'Headlines','avventura-lite'),
				'description' => esc_html__( 'From this section you can manage the typography of the headlines.','avventura-lite'),
				'type' => 'section',
				'id' => 'headlines_section',
				'panel' => 'typography_panel',
				'priority' => '13',

			),

			array( 

				'label' => esc_html__( 'H1 headline','avventura-lite'),
				'description' => esc_html__( 'Insert a size, for for H1 elements (For example, 24px) ','avventura-lite'),
				'id' => 'avventura_lite_h1_font_size',
				'type' => 'pixel_size',
				'section' => 'headlines_section',
				'std' => '24px',

			),

			array( 

				'label' => esc_html__( 'H2 headline','avventura-lite'),
				'description' => esc_html__( 'Insert a size, for for H2 elements (For example, 22px) ','avventura-lite'),
				'id' => 'avventura_lite_h2_font_size',
				'type' => 'pixel_size',
				'section' => 'headlines_section',
				'std' => '22px',

			),

			array( 

				'label' => esc_html__( 'H3 headline','avventura-lite'),
				'description' => esc_html__( 'Insert a size, for for H3 elements (For example, 20px) ','avventura-lite'),
				'id' => 'avventura_lite_h3_font_size',
				'type' => 'pixel_size',
				'section' => 'headlines_section',
				'std' => '20px',

			),

			array( 

				'label' => esc_html__( 'H4 headline','avventura-lite'),
				'description' => esc_html__( 'Insert a size, for for H4 elements (For example, 18px) ','avventura-lite'),
				'id' => 'avventura_lite_h4_font_size',
				'type' => 'pixel_size',
				'section' => 'headlines_section',
				'std' => '18px',

			),

			array( 

				'label' => esc_html__( 'H5 headline','avventura-lite'),
				'description' => esc_html__( 'Insert a size, for for H5 elements (For example, 16px) ','avventura-lite'),
				'id' => 'avventura_lite_h5_font_size',
				'type' => 'pixel_size',
				'section' => 'headlines_section',
				'std' => '16px',

			),

			array( 

				'label' => esc_html__( 'H6 headline','avventura-lite'),
				'description' => esc_html__( 'Insert a size, for for H6 elements (For example, 14px) ','avventura-lite'),
				'id' => 'avventura_lite_h6_font_size',
				'type' => 'pixel_size',
				'section' => 'headlines_section',
				'std' => '14px',

			),
			
			array(
				
				'label' => esc_html__('Titles weight','avventura-lite'),
				'description' => esc_html__('Choose a font weight for the titles.','avventura-lite'),
				'id' => 'avventura_lite_titles_font_weight',
				'type' => 'select',
				'section' => 'headlines_section',
				'options' => array(
					'400' => esc_html__( '400','avventura-lite'),
					'700' => esc_html__( '700','avventura-lite'),
					'900' => esc_html__( '900','avventura-lite'),
				),

				'std' => '400',
			
			),
			
			array(
				
				'label' => esc_html__('Text transform','avventura-lite'),
				'description' => esc_html__('Do you want to display an uppercase title?.','avventura-lite'),
				'id' => 'avventura_lite_titles_text_transform',
				'type' => 'select',
				'section' => 'headlines_section',
				'options' => array(
					'none' => esc_html__( 'None','avventura-lite'),
					'uppercase' => esc_html__( 'Uppercase','avventura-lite'),
				),

				'std' => 'none',
			
			),

		);
		
		new avventura_lite_customize($theme_panel);
		
	} 
	
	add_action( 'avventura_lite_customize_panel', 'avventura_lite_customize_panel_function' );

}

do_action('avventura_lite_customize_panel');

?>