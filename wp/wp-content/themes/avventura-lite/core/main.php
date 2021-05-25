<?php

/**
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

define( 'AVVENTURA_LITE_MIN_PHP_VERSION', '5.3' );

/*-----------------------------------------------------------------------------------*/
/* Switches back to the previous theme if the minimum PHP version is not met */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'avventura_lite_check_php_version' ) ) {

	function avventura_lite_check_php_version() {

		if ( version_compare( PHP_VERSION, AVVENTURA_LITE_MIN_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', 'avventura_lite_min_php_not_met_notice' );
			switch_theme( get_option( 'theme_switched' ));
			return false;

		};
	}

	add_action( 'after_switch_theme', 'avventura_lite_check_php_version' );

}

/*-----------------------------------------------------------------------------------*/
/* An error notice that can be displayed if the Minimum PHP version is not met */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'avventura_lite_min_php_not_met_notice' ) ) {

	function avventura_lite_min_php_not_met_notice() {
		?>
		<div class="notice notice-error is_dismissable">
			<p>
				<?php esc_html_e('You need to update your PHP version to run this theme.', 'avventura-lite' ); ?><br />
				<?php
				printf(
					esc_html__( 'Actual version is: %1$s, required version is: %2$s.', 'avventura-lite' ),
					PHP_VERSION,
					AVVENTURA_LITE_MIN_PHP_VERSION
				);
				?>
			</p>
		</div>
		<?php

	}

}

/*-----------------------------------------------------------------------------------*/
/* WooCommerce is active */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'avventura_lite_is_woocommerce_active' ) ) {

	function avventura_lite_is_woocommerce_active( $type = "" ) {

        global $woocommerce;

        if ( isset( $woocommerce ) ) {

			if ( !$type || call_user_func($type) ) {

				return true;

			}

		}

	}

}

/*-----------------------------------------------------------------------------------*/
/* Get post comments */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'avventura_lite_comments' ) ) {

	function avventura_lite_comments($comment, $args, $depth) {

	?>

		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">

		<div id="comment-<?php comment_ID(); ?>" class="comment-container">

			<div class="comment-avatar">
				<?php echo get_avatar($comment->comment_author_email, 80 ); ?>
			</div>

			<div class="comment-text">

            	<header class="comment-author">

                    <span class="author"><cite><?php printf( esc_html__('%s','avventura-lite'), get_comment_author_link());?> </cite></span>
                    <time datetime="<?php echo get_comment_date("c")?>" class="comment-date">
                    <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(esc_html__('%1$s at %2$s','avventura-lite'), get_comment_date(),  get_comment_time()) ?></a> -
                    <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                    <?php edit_comment_link(esc_html__('(Edit)','avventura-lite')) ?>
                    </time>

				</header>

				<?php if ($comment->comment_approved == '0') : ?>
				<br /><em><?php esc_html_e('Your comment is awaiting approval.','avventura-lite') ?></em>
				<?php endif; ?>

				<?php comment_text() ?>

			</div>

			<div class="clear"></div>

		</div>

	<?php

	}

}

/*-----------------------------------------------------------------------------------*/
/* Function to check if the searchform.php file is loaded inside a sidebar area */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'avventura_lite_is_sidebar_area' ) ) {

	function avventura_lite_is_sidebar_area() {

		$result = false;

		$activeSidebars = array(
			'avventura_lite_side_sidebar',
			'avventura_lite_scroll_sidebar',
			'avventura_lite_top_sidebar',
			'avventura_lite_header_sidebar',
			'avventura_lite_bottom_sidebar',
			'avventura_lite_footer_sidebar'
		);

		if ( in_array(current_filter(), $activeSidebars) ) {
			$result = true;
		}

		return $result;

	}

}

/*-----------------------------------------------------------------------------------*/
/* Get archive title */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('avventura_lite_get_the_archive_title')) {

	function avventura_lite_get_archive_title() {

		if ( is_category() ) {
			$title = sprintf( esc_html__( 'Category: %s', 'avventura-lite' ), single_cat_title( '', false ) );
		} elseif ( is_tag() ) {
			$title = sprintf( esc_html__( 'Tag: %s', 'avventura-lite' ), single_tag_title( '', false ) );
		} elseif ( is_author() ) {
			$title = sprintf( esc_html__( 'Author: %s', 'avventura-lite' ), '<span class="vcard">' . get_the_author() . '</span>' );
		} elseif ( is_year() ) {
			$title = sprintf( esc_html__( 'Year: %s', 'avventura-lite' ), get_the_date( esc_html_x( 'Y', 'yearly archives date format', 'avventura-lite' ) ) );
		} elseif ( is_month() ) {
			$title = sprintf( esc_html__( 'Month: %s', 'avventura-lite' ), get_the_date( esc_html_x( 'F Y', 'monthly archives date format', 'avventura-lite' ) ) );
		} elseif ( is_day() ) {
			$title = sprintf( esc_html__( 'Day: %s', 'avventura-lite' ), get_the_date( esc_html_x( 'F j, Y', 'daily archives date format', 'avventura-lite' ) ) );
		} elseif ( is_tax( 'post_format' ) ) {
			if ( is_tax( 'post_format', 'post-format-aside' ) ) {
				$title = esc_html_x( 'Asides', 'post format archive title', 'avventura-lite' );
			} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
				$title = esc_html_x( 'Galleries', 'post format archive title', 'avventura-lite' );
			} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
				$title = esc_html_x( 'Images', 'post format archive title', 'avventura-lite' );
			} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
				$title = esc_html_x( 'Videos', 'post format archive title', 'avventura-lite' );
			} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
				$title = esc_html_x( 'Quotes', 'post format archive title', 'avventura-lite' );
			} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
				$title = esc_html_x( 'Links', 'post format archive title', 'avventura-lite' );
			} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
				$title = esc_html_x( 'Statuses', 'post format archive title', 'avventura-lite' );
			} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
				$title = esc_html_x( 'Audio', 'post format archive title', 'avventura-lite' );
			} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
				$title = esc_html_x( 'Chats', 'post format archive title', 'avventura-lite' );
			}
		} elseif ( is_post_type_archive() ) {
			$title = sprintf( esc_html__( 'Archives: %s', 'avventura-lite' ), post_type_archive_title( '', false ) );
		} elseif ( is_tax() ) {
			$tax = get_taxonomy( get_queried_object()->taxonomy );
			$title = sprintf( esc_html__( '%1$s: %2$s', 'avventura-lite' ), $tax->labels->singular_name, single_term_title( '', false ) );
		}

		if ( isset($title) )  :
			return $title;
		else:
			return false;
		endif;

	}

}

/*-----------------------------------------------------------------------------------*/
/* Check if is single page */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('avventura_lite_is_single')) {

	function avventura_lite_is_single() {

		if ( is_single() || is_page() ) :

			return true;

		endif;

	}

}

/*-----------------------------------------------------------------------------------*/
/* Get theme setting */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('avventura_lite_setting')) {

	function avventura_lite_setting($id, $default = FALSE ) {

		return get_theme_mod($id, $default);

	}

}

/*-----------------------------------------------------------------------------------*/
/* Get post meta */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('avventura_lite_postmeta')) {

	function avventura_lite_postmeta( $id, $default = '' ) {

		global $post, $wp_query;

		if (avventura_lite_is_woocommerce_active('is_shop')) :

			$content_ID = get_option('woocommerce_shop_page_id');

		else :

			$content_ID = $post->ID;

		endif;

		$val = get_post_meta( $content_ID , $id, TRUE);

		if ( !empty($val) ) :

			return $val;

		else:

			return $default;

		endif;

	}

}

/*-----------------------------------------------------------------------------------*/
/* Add Skype on allowed protocols */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('avventura_lite_kses_allowed_protocols')) {

	function avventura_lite_kses_allowed_protocols($protocols) {

		$protocols[] = 'skype';
		return $protocols;

	}

	add_filter( 'kses_allowed_protocols', 'avventura_lite_kses_allowed_protocols');

}

/*-----------------------------------------------------------------------------------*/
/* Responsive embed */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('avventura_lite_embed_html')) {

	function avventura_lite_embed_html( $html ) {
		return '<div class="embed-container">' . $html . '</div>';
	}

	add_filter( 'embed_oembed_html', 'avventura_lite_embed_html', 10, 3 );
	add_filter( 'video_embed_html', 'avventura_lite_embed_html' );

}

/*-----------------------------------------------------------------------------------*/
/* Content template */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('avventura_lite_template')) {

	function avventura_lite_template($id) {

		$template = array (

			"full" => "col-md-12" ,
			"left-sidebar" => "col-md-8" ,
			"right-sidebar" => "col-md-8"

		);

		$span = $template["right-sidebar"];
		$sidebar =  "right-sidebar";

		if (
			avventura_lite_is_woocommerce_active('is_woocommerce') &&
			avventura_lite_postmeta('avventura_lite_template') &&
			is_search()
		) {

			$span = $template[esc_attr(avventura_lite_postmeta('avventura_lite_template'))];
			$sidebar =  esc_attr(avventura_lite_postmeta('avventura_lite_template'));

		} elseif (
			!is_attachment() &&
			avventura_lite_postmeta('avventura_lite_template') &&
			(is_page() || is_single() || avventura_lite_is_woocommerce_active('is_shop'))
		) {

			$span = $template[esc_attr(avventura_lite_postmeta('avventura_lite_template'))];
			$sidebar =  esc_attr(avventura_lite_postmeta('avventura_lite_template'));

		} elseif (
			!avventura_lite_is_woocommerce_active('is_woocommerce') &&
			( is_category() || is_tag() || is_month() ) &&
			avventura_lite_setting('avventura_lite_category_layout')
		) {

			$span = $template[esc_attr(avventura_lite_setting('avventura_lite_category_layout'))];
			$sidebar =  esc_attr(avventura_lite_setting('avventura_lite_category_layout'));

		} elseif (
			is_home() &&
			avventura_lite_setting('avventura_lite_home')
		) {

			$span = $template[esc_attr(avventura_lite_setting('avventura_lite_home'))];
			$sidebar =  esc_attr(avventura_lite_setting('avventura_lite_home'));

		} else if (
			!avventura_lite_is_woocommerce_active('is_woocommerce') &&
			is_search() &&
			avventura_lite_setting('avventura_lite_search_layout')
		) {

			$span = $template[esc_attr(avventura_lite_setting('avventura_lite_search_layout'))];
			$sidebar =  esc_attr(avventura_lite_setting('avventura_lite_search_layout'));

		} else if (
			avventura_lite_is_woocommerce_active('is_woocommerce') &&
			( avventura_lite_is_woocommerce_active('is_product_category') || avventura_lite_is_woocommerce_active('is_product_tag') ) &&
			avventura_lite_setting('avventura_lite_woocommerce_category_layout')
		) {

			$span = $template[esc_attr(avventura_lite_setting('avventura_lite_woocommerce_category_layout'))];
			$sidebar =  esc_attr(avventura_lite_setting('avventura_lite_woocommerce_category_layout'));

		} elseif ( is_attachment() ) {

			$span = $template["full"];
			$sidebar =  "full";

		}

		return ${$id};

	}

}

/*-----------------------------------------------------------------------------------*/
/* BODY CLASSES */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('avventura_lite_body_classes_function')) {

	function avventura_lite_body_classes_function($classes) {

		global $wp_customize;

		if ( isset( $wp_customize ) ) :

			$classes[] = 'is_customizer_panel';

		endif;

		if ( avventura_lite_setting('avventura_lite_sticky_header') == 'on' ) :

			$classes[] = 'sticky_header';

		endif;



		return $classes;

	}

	add_filter('body_class', 'avventura_lite_body_classes_function');

}

/*-----------------------------------------------------------------------------------*/
/* Post class */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('avventura_lite_post_class')) {

	function avventura_lite_post_class($classes) {

		$masonry  = 'post-container masonry-item col-md-4';
		$standard = 'post-container col-md-12';

		if ( !avventura_lite_is_single() ) {

			if ( is_home() ) {

				if ( !avventura_lite_setting('avventura_lite_home') || avventura_lite_setting('avventura_lite_home') == "masonry" ) {

					$classes[] = $masonry;

				} else {

					$classes[] = $standard;

				}

			} else if ( is_archive() ) {

				if ( !avventura_lite_setting('avventura_lite_category_layout') || avventura_lite_setting('avventura_lite_category_layout') == "masonry" ) {

					$classes[] = $masonry;

				} else {

					$classes[] = $standard;

				}

			} else if ( is_search() ) {

				if ( !avventura_lite_setting('avventura_lite_search_layout') || avventura_lite_setting('avventura_lite_search_layout') == "masonry" ) {

					$classes[] = $masonry;

				} else {

					$classes[] = $standard;

				}

			}

		} else if ( avventura_lite_is_single() && avventura_lite_is_woocommerce_active('is_cart') ) {

			$classes[] = 'post-container col-md-12 woocommerce_cart_page';

		} else if ( avventura_lite_is_single() && !avventura_lite_is_woocommerce_active('is_product') ) {

			$classes[] = 'post-container col-md-12';

		} else if ( is_page() ) {

			$classes[] = 'full';

		}

		return $classes;

	}

	add_filter('post_class', 'avventura_lite_post_class');

}

/*-----------------------------------------------------------------------------------*/
/* Get paged */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('avventura_lite_paged')) {

	function avventura_lite_paged() {

		if ( get_query_var('paged') ) {
			$paged = get_query_var('paged');
		} elseif ( get_query_var('page') ) {
			$paged = get_query_var('page');
		} else {
			$paged = 1;
		}

		return $paged;

	}

}

/*-----------------------------------------------------------------------------------*/
/* Prettyphoto at post gallery */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('avventura_lite_prettyPhoto')) {

	function avventura_lite_prettyPhoto( $html, $id, $size, $permalink, $icon, $text ) {

		if ( ! $permalink )
			return str_replace( '<a', '<a data-rel="prettyPhoto" ', $html );
		else
			return $html;
	}

	add_filter( 'wp_get_attachment_link', 'avventura_lite_prettyPhoto', 10, 6);

}

/*-----------------------------------------------------------------------------------*/
/* Get link url  */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('avventura_lite_get_link_url')) {

	function avventura_lite_get_link_url() {

		$content = get_the_content();
		$has_url = get_url_in_content( $content );
		return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );

	}

}

/*-----------------------------------------------------------------------------------*/
/* Excerpt more */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('avventura_lite_hide_excerpt_more')) {

	function avventura_lite_hide_excerpt_more() {
		return '';
	}

	add_filter('the_content_more_link', 'avventura_lite_hide_excerpt_more');
	add_filter('excerpt_more', 'avventura_lite_hide_excerpt_more');

}

/*-----------------------------------------------------------------------------------*/
/* Customize excerpt more */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('avventura_lite_customize_excerpt_more')) {

	function avventura_lite_customize_excerpt_more( $excerpt ) {

		global $post;

		if ( avventura_lite_is_single() ) :

			return $excerpt;

		else:

			$allowed = array(
				'span' => array(
					'class' => array(),
				),
			);

			$class = 'button ';
			$button = esc_html__('Read More','avventura-lite');
			$container = 'class="read-more"';

			if ( avventura_lite_setting('avventura_lite_readmore_layout') == "default" || !avventura_lite_setting('avventura_lite_readmore_layout') ) :

				$class = 'button ' . esc_attr(avventura_lite_setting('avventura_lite_readmore_layout'));
				$button = esc_html__('Read More','avventura-lite');
				$container = 'class="read-more"';

			else :

				$class = 'nobutton';
				$button = ' [&hellip;] ';
				$container = '';

			endif;

			if (
				( $pos=strpos($post->post_content, '<!--more-->') ) &&
				!has_excerpt($post->ID)
			):

				$content = apply_filters( 'the_content', get_the_content());

			else:

				$content = $excerpt;

			endif;

			return $content . '<div class="read-more-wrapper"><a '. wp_kses($container, $allowed) . ' href="' . esc_url(get_permalink($post->ID)) . '" title="'.esc_attr__('Read More','avventura-lite').'"> <span class="'.esc_attr($class).'">'.$button.'</span></a></div>';

		endif;


	}

	add_filter( 'get_the_excerpt', 'avventura_lite_customize_excerpt_more' );

}

/*-----------------------------------------------------------------------------------*/
/* Get post icon */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('avventura_lite_posticon')) {

	function avventura_lite_posticon() {

		$icons = array (
			'video' => 'video' ,
			'gallery' => 'gallery' ,
			'audio' => 'audio' ,
			'chat' => 'chat',
			'status' => 'status',
			'image' => 'image' ,
			'quote' => 'quote',
			'link' => 'links',
			'aside' => 'aside',
		);

		if ( get_post_format() ) {

			$icon = '<span class="post-icon dashicons dashicons-format-'.esc_attr($icons[get_post_format()]).'"></span>';

		} else {

			$icon = '<span class="post-icon dashicons dashicons-edit"></span>';

		}

		return $icon;

	}

}

/*-----------------------------------------------------------------------------------*/
/* Remove padding from Instagram widget */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('avventura_lite_widget_class')) {

	function avventura_lite_widget_class( $params ) {

		$name = $params[0]['widget_name'];

		$check = array(
			'Instagram Slider',
		);

		foreach ( $check as $value ) {

			if ( $value == $name ) :

				$params[0]['before_widget'] = preg_replace( '/class="post-article/', 'class="no-padding', $params[0]['before_widget'], 1 );

			endif;

		}

		return $params;
	}

	add_filter( 'dynamic_sidebar_params', 'avventura_lite_widget_class' );

}

/*-----------------------------------------------------------------------------------*/
/* Enqueue script and styles */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('avventura_lite_scripts_styles')) {

	function avventura_lite_scripts_styles() {

		$googleFontsArgs = array(
			'family' =>	str_replace('|', '%7C','Cinzel+Decorative|Merriweather:300,400,400i,700,900|Playfair+Display:400,700,900'),
			'subset' =>	'latin,latin-ext'
		);

		wp_enqueue_style('dashicons');
		wp_enqueue_style('google-fonts', add_query_arg ( $googleFontsArgs, "https://fonts.googleapis.com/css" ), array(), '1.0.0' );
		wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', array(), '3.3.7' );
		wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.css', array(), '4.7.0' );
		wp_enqueue_style('prettyPhoto', get_template_directory_uri() . '/assets/css/prettyPhoto.css', array(), '3.1.4' );
		wp_enqueue_style('slick', get_template_directory_uri() . '/assets/css/slick.css', array(), '1.8.0' );
		wp_enqueue_style('avventura-lite-style', get_stylesheet_uri(), array() );
		wp_enqueue_style('avventura-lite-woocommerce', get_template_directory_uri() . '/assets/css/avventura-lite-woocommerce.css', array(), '1.0.0' );

		wp_enqueue_style(
			'avventura-lite-' . esc_attr(get_theme_mod('avventura_lite_skin', 'orange')),
			get_template_directory_uri() . '/assets/skins/' . esc_attr(get_theme_mod('avventura_lite_skin', 'orange')) . '.css',
			array( 'avventura-lite-style' ),
			'1.0.0'
		);

		wp_enqueue_script( 'jquery-easing', get_template_directory_uri() . '/assets/js/jquery.easing.js' , array('jquery'), '1.3', TRUE );
		wp_enqueue_script( 'jquery-fitvids', get_template_directory_uri() . '/assets/js/jquery.fitvids.js' , array('jquery'), '1.1', TRUE );
		wp_enqueue_script( 'jquery-nicescroll', get_template_directory_uri() . '/assets/js/jquery.nicescroll.js' , array('jquery'), '3.7.6', TRUE );
		wp_enqueue_script( 'prettyPhoto', get_template_directory_uri() . '/assets/js/prettyPhoto.js' , array('jquery'), '3.1.4', TRUE );
		wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.js' , array('jquery'), '1.8.0', TRUE );
		wp_enqueue_script( 'jquery-touchSwipe', get_template_directory_uri() . '/assets/js/jquery.touchSwipe.js' , array('jquery'), '1.6.18', TRUE );
		wp_enqueue_script( 'avventura-lite-template',get_template_directory_uri() . '/assets/js/avventura-lite-template.js',array('jquery', 'imagesloaded', 'masonry'), '1.0.0', TRUE );

		if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

		wp_enqueue_script( 'avventura-lite-navigation', get_template_directory_uri() . '/assets/js/navigation.js' , array('jquery'), '1.0', TRUE );

		wp_localize_script( 'avventura-lite-navigation', 'accessibleNavigationScreenReaderText', array(
			'expandMain'   => __( 'Open the main menu', 'avventura-lite' ),
			'collapseMain' => __( 'Close the main menu', 'avventura-lite' ),
			'expandChild'   => __( 'expand submenu', 'avventura-lite' ),
			'collapseChild' => __( 'collapse submenu', 'avventura-lite' ),
		));

		wp_enqueue_script('avventura-lite-html5shiv', get_template_directory_uri().'/assets/scripts/html5shiv.js', FALSE, '3.7.3');
		wp_script_add_data('avventura-lite-html5shiv', 'conditional', 'IE 8' );
		wp_enqueue_script('avventura-lite-selectivizr', get_template_directory_uri().'/assets/scripts/selectivizr.js', FALSE, '1.0.3b');
		wp_script_add_data('avventura-lite-selectivizr', 'conditional', 'IE 8' );

	}

	add_action( 'wp_enqueue_scripts', 'avventura_lite_scripts_styles' );

}

/*-----------------------------------------------------------------------------------*/
/* Theme setup */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('avventura_lite_setup')) {

	function avventura_lite_setup() {

		global $content_width;

		if ( !isset($content_width) )
			$content_width = (avventura_lite_setting('avventura_lite_screen3')) ? (esc_attr(avventura_lite_setting('avventura_lite_screen3'))) : 1170;

		load_theme_textdomain( 'avventura-lite', get_template_directory() . '/languages');

		add_theme_support( 'post-formats', array( 'aside','gallery','quote','video','audio','link','status','chat','image' ) );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'woocommerce' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'custom-logo');
		add_theme_support( 'custom-background', array(
			'default-color' => 'f3f3f3',
		));

		add_image_size( 'avventura_lite_blog_thumbnail', $content_width, 600, TRUE );
		add_image_size( 'avventura_lite_slick_large', 960, 600, TRUE );
		add_image_size( 'avventura_lite_slick_small', 400, 400, TRUE );

		register_nav_menu( 'main-menu', 'Main menu' );

		require_once( trailingslashit( get_template_directory() ) . '/core/post-formats/aside-format.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/post-formats/default-format.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/post-formats/image-format.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/post-formats/link-format.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/post-formats/page-format.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/post-formats/product-format.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/post-formats/quote-format.php' );

		require_once( trailingslashit( get_template_directory() ) . '/core/templates/after-content.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/archive-title.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/before-content.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/footer.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/masonry.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/media.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/mobile-menu.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/pagination.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/post-formats.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/search-title.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/slick-slider.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/templates/title.php' );

		require_once( trailingslashit( get_template_directory() ) . '/core/sidebars/bottom-sidebar.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/sidebars/footer-sidebar.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/sidebars/header-sidebar.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/sidebars/scroll-sidebar.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/sidebars/side-sidebar.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/sidebars/top-sidebar.php' );

		require_once( trailingslashit( get_template_directory() ) . '/core/includes/class-customize.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/includes/class-metaboxes.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/includes/class-notice.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/includes/class-plugin-activation.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/includes/class-welcome-page.php' );

		require_once( trailingslashit( get_template_directory() ) . '/core/admin/customize/customize.php' );

		require_once( trailingslashit( get_template_directory() ) . '/core/functions/function-required-plugins.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/functions/function-style.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/functions/function-widgets.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/functions/function-woocommerce.php' );

		require_once( trailingslashit( get_template_directory() ) . '/core/metaboxes/page.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/metaboxes/post.php' );
		require_once( trailingslashit( get_template_directory() ) . '/core/metaboxes/product.php' );


	}

	add_action( 'after_setup_theme', 'avventura_lite_setup' );

}

?>
