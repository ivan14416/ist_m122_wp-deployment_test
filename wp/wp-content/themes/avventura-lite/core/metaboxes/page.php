<?php

/**
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

new avventura_lite_metaboxes (

	'page', 
	
	array(

		array(
		
			'name' => 'Navigation',  
			'type' => 'navigation',  
			'item' => array( 
				
				'general' => esc_html__( 'Setting', 'avventura-lite') , 
					
			),   
				
			'start' => '<ul>', 
			'end' => '</ul>'),  
		
		array(
			
			'type' => 'begintab',
			'tab' => 'general',
			'element' =>
				
				array(
					'name' => esc_html__( 'Page settings','avventura-lite'),
					'type' => 'title',
				),
		
				array(
					'name' => esc_html__( 'Template','avventura-lite'),
					'desc' => esc_html__( 'Select a template for this page','avventura-lite'),
					'id' => 'avventura_lite_template',
					'type' => 'select',
					'options' => array(
						'full' => esc_html__( 'Full Width','avventura-lite'),
						'left-sidebar' =>  esc_html__( 'Left Sidebar','avventura-lite'),
						'right-sidebar' => esc_html__( 'Right Sidebar','avventura-lite'),
					),
					'std' => 'right-sidebar',
				),
		
		),
		
		array(
			'type' => 'endtab'
		),
		
	array( 'type' => 'endsection' )
	
	)
	
);

?>