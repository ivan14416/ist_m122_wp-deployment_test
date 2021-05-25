<?php

/**
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

if( !class_exists( 'avventura_lite_welcome' ) ) {

	class avventura_lite_welcome {

		public function __construct( $fields = array() ) {
	
			$this->theme_fields = $fields;

			add_action ('admin_init' , array( &$this, 'admin_scripts' ) );
			add_action('admin_menu',array( &$this, 'welcome_page_menu'));

		}

		public function admin_scripts() {
	
			global $pagenow;

			$file_dir = get_template_directory_uri() . '/core/admin/assets/';

			if ( $pagenow == 'themes.php' && isset($_GET['page']) && $_GET['page'] == 'avventura-lite-welcome-page') {
				
				wp_enqueue_style (
					'avventura-lite-welcome-page-style',
					$file_dir . 'css/welcome-page.css',
					array(), '1.0.0'
				);
				 
			}

		}
		
        public function check_installed_plugin($slug, $filename) {
			return file_exists( ABSPATH . 'wp-content/plugins/' . $slug . '/' . $filename . '.php' ) ? true : false;
		}

		private function call_plugin_api( $slug ) {
			
			include_once ABSPATH . 'wp-admin/includes/plugin-install.php';
	
			$call_api = get_transient( 'avventura_lite_plugin_info_' . $slug );
	
			if ( false === $call_api ) {
				$call_api = plugins_api(
					'plugin_information',
					array(
						'slug'   => $slug,
						'fields' => array(
							'downloaded'        => false,
							'rating'            => false,
							'description'       => false,
							'short_description' => true,
							'donate_link'       => false,
							'tags'              => false,
							'sections'          => true,
							'homepage'          => true,
							'added'             => false,
							'last_updated'      => false,
							'compatibility'     => false,
							'tested'            => false,
							'requires'          => false,
							'downloadlink'      => false,
							'icons'             => true,
							'banners'           => true,
						),
					)
				);
				set_transient( 'avventura_lite_plugin_info_' . $slug, $call_api, 30 * MINUTE_IN_SECONDS );
			}
	
			return $call_api;
		}

        public function theme_info($id) {
		
			$themedata = wp_get_theme();
			return $themedata->get($id);
				
		}

        public function welcome_page_menu() {
            
			add_theme_page(
				sprintf(esc_html__('About %1$s', 'avventura-lite'), $this->theme_info('Name')),
				sprintf(esc_html__('About %1$s', 'avventura-lite'), $this->theme_info('Name')),
				'edit_theme_options', 
				'avventura-lite-welcome-page', 
				array( &$this, 'welcome_page' )
			);
		
		}
		
        public function welcome_page() {

            $tabs = array(
                'getting_started' => esc_html__('Getting Started', 'avventura-lite'),
                'recommended_plugins' => esc_html__('Recommended Plugins', 'avventura-lite'),
                'free_pro' => esc_html__('Free VS Pro', 'avventura-lite'),
                'support' => esc_html__('Support', 'avventura-lite'),
            );
			
        ?>
            
            <div class="wrap about-wrap access-wrap">
                <div class="abt-promo-wrap clearfix">
                    <div class="abt-theme-wrap">
                        
                        <h1>
                        	<?php 
								printf(
									esc_html__('Welcome to %1$s - Version %2$s', 'avventura-lite'),
									$this->theme_info('Name'),
									$this->theme_info('Version')
								);
							?>
                        </h1>

                        <div class="about-text"><?php echo $this->theme_info('Description'); ?></div>
                    
                    </div>
                
                </div>

                <div class="nav-tab-wrapper clearfix">
                    
					<?php 

						$tabHTML = '';

						foreach ($tabs as $id => $label) :

							$target = '';
							$nav_class = 'nav-tab';
							$section = isset($_GET['section']) ? $_GET['section'] : 'getting_started';
							
							if ($id == $section) {
								$nav_class .= ' nav-tab-active';
							}

							switch ($id) {
								
								case 'support':
									$target = 'target="_blank"';
									$url = esc_url('https://wordpress.org/support/theme/'.$this->theme_info('TextDomain'));
								break;

								case 'getting_started':
									$url = esc_url(admin_url('themes.php?page=avventura-lite-welcome-page'));
								break;

								default:
									$url = esc_url(admin_url('themes.php?page=avventura-lite-welcome-page&section=' . $id));
								break;

							}

							$tabHTML .= '<a ';
							$tabHTML .= $target;
							$tabHTML .= ' href="' . $url. '"';
							$tabHTML .= ' class="' . esc_attr($nav_class). '"';
							$tabHTML .= '>';
							$tabHTML .= esc_html($label);
							$tabHTML .= '</a>';
					
						endforeach;
						
						echo $tabHTML;
						
					?>
                    
                </div>

                <div class="welcome-section-wrapper">
                    
                    <div class="welcome-section getting_started clearfix">

                    	<?php
						
							$section = isset($_GET['section']) ? $_GET['section'] : 'getting_started';
							
							switch ($section) {
								
								case 'free_pro':
									$this->free_pro();
								break;

								case 'recommended_plugins':
									$this->recommended_plugins();
								break;

								case 'getting_started':
								default:
									$this->getting_started();
								break;

							}
						
						?>

                    </div>
                    
                </div>
                
            </div>
        
		<?php
		
		}

		public function quick_links() {
			
			return array(
				array (
					'text' => esc_html__('Upload logo', 'avventura-lite'),
					'link' => add_query_arg( [ 'autofocus[control]' => 'custom_logo' ], admin_url( 'customize.php' ))
				),
				array (
					'text' => esc_html__('Slideshow settings', 'avventura-lite'),
					'link' => add_query_arg(['autofocus[section]' => 'slideshow_section'], admin_url( 'customize.php'))
				),
				array (
					'text' => esc_html__('Color scheme', 'avventura-lite'),
					'link' => add_query_arg(['autofocus[control]' => 'avventura_lite_skin'], admin_url( 'customize.php'))
				),
				array (
					'text' => esc_html__('General settings', 'avventura-lite'),
					'link' => add_query_arg(['autofocus[section]' => 'settings_section'], admin_url( 'customize.php'))
				),
				array (
					'text' => esc_html__('Layouts', 'avventura-lite'),
					'link' => add_query_arg(['autofocus[section]' => 'layouts_section'], admin_url( 'customize.php'))
				),
				array (
					'text' => esc_html__('Typography', 'avventura-lite'),
					'link' => add_query_arg(['autofocus[panel]' => 'typography_panel'], admin_url( 'customize.php'))
				),
				array (
					'text' => esc_html__('Copyright and social links', 'avventura-lite'),
					'link' => add_query_arg(['autofocus[section]' => 'footer_section'], admin_url( 'customize.php'))
				),
			);
			
		}

        public function getting_started() {

		?>
    
			<div class="getting-started-top-wrap clearfix">
                        
				<div class="theme-steps-list">

					<div class="theme-steps">
                                
						<h3><?php echo esc_html__('Step 1 - Ensure Your Page Home Page is set Your latest posts', 'avventura-lite'); ?></h3>
						<ol>
							<li><?php echo esc_html__('Go to Settings > Reading > General settings > Your homepage displays', 'avventura-lite'); ?></li>
							<li><?php echo esc_html__('Set "Your homepage displays" to Your latest posts', 'avventura-lite'); ?></li>
							<li><?php echo esc_html__('Save changes', 'avventura-lite'); ?></li>
						</ol>
						<a class="button button-primary" target="_blank" href="<?php echo esc_url(admin_url('options-reading.php')); ?>"><?php echo esc_html__('Assign Static Page', 'avventura-lite'); ?></a>
					</div>
                        
					<div class="theme-steps">
						<h3><?php echo esc_html__('Step 2 - Customizer Options Panel', 'avventura-lite'); ?></h3>
						<p><?php echo esc_html__('Now go to Customizer Page. Using the WordPress Customizer you can easily set up the home page and customize the theme.', 'avventura-lite'); ?></p>
						<a class="button button-primary" href="<?php echo esc_url(admin_url('customize.php')); ?>"><?php echo esc_html__('Go to Customizer Panels', 'avventura-lite'); ?></a>
					</div>

					<div class="theme-steps">
						<h3><?php echo esc_html__('Customizer quick links', 'avventura-lite'); ?></h3>
						<ul class="quick-links">
                        	<?php 
								foreach ( $this->quick_links() as $quick_link ) {
									echo '<li><a class="button" href="'.$quick_link['link'].'">'.$quick_link['text'].'</a></li>';
								} 
							?>
						</ul>
					</div>

					<div class="theme-steps">
						<h3><?php echo esc_html__('Documentation', 'avventura-lite'); ?></h3>
						<p><?php echo esc_html__('Need help to use Avventura Lite? Please check our full documentation.', 'avventura-lite'); ?></p>
						<a target="_blank" class="button button-primary" href="<?php echo esc_url('https://demo.themeinprogress.com/avventura/documentation/avventura-lite-documentation/'); ?>"><?php echo esc_html__('Go to Docs', 'avventura-lite'); ?></a>
					</div>

				</div>
                            
			</div>

        <?php
		
		}
		
		public function recommended_plugins() {

			$plugins = array(
	
				array(
					'filename'	=> 'init',
					'slug'      => 'internal-linking-of-related-contents',
				),
				array(
					'filename'	=> 'init',
					'slug'      => 'content-snippet-manager',
				),
				array(
					'filename'	=> 'init',
					'slug'      => 'wa-chatbox-manager',
				),
				array(
					'filename'	=> 'init',
					'slug'      => 'custom-thank-you-page',
				),
				array(
					'filename'	=> 'init',
					'slug'      => 'wip-custom-login',
				),
				array(
					'filename'	=> 'init',
					'slug'      => 'wip-woocarousel-lite',
				),
	
			);
			
		?>

			<div class="required-plugin-top-wrap clearfix">
                        
				<div class="required-plugin-list">

				<?php
                    
                    foreach ( $plugins as $plugin ) {
                        
                        $slug = $plugin['slug'];
                        $filename = $plugin['filename'];
        
                        $plugin_info = $this->call_plugin_api( $slug );
                        $plugin_desc = $plugin_info->short_description;
                        $plugin_img  = ( !isset($plugin_info->icons['1x']) ) ? $plugin_info->icons['default'] : $plugin_info->icons['1x'];
                        $plugin_banner  = $plugin_info->banners['low'];

                ?>

					<div class="required-plugin">
                    
                        <div class="required-plugin-head">
                        
							<img class="plugin-banner" src="<?php echo $plugin_banner;?>">
                            
                        </div>
                        
                        <div class="required-plugin-desc">
                            
                            <h3><?php echo $plugin_info->name; ?></h3>
							<?php echo $plugin_info->short_description; ?>
                            
						</div>
                           
                        <div class="required-plugin-footer">

							<span>
								
								<?php 
									echo esc_html__('v', 'avventura-lite');
									echo $plugin_info->version;
									echo esc_html__(' by ', 'avventura-lite');
									echo html_entity_decode( wp_strip_all_tags( $plugin_info->author ) );
								?>
                                
							</span>

							<?php if ( $this->check_installed_plugin( $slug, $filename ) ) : ?>
                                    
                            	<button type="button" class="button button-disabled" disabled="disabled">
                            		<?php esc_html_e( 'Installed', 'avventura-lite' ); ?>
                            	</button>
                                
                            <?php else : ?>
                    
                            	<a class="install-now button-primary" href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin='. $slug ), 'install-plugin_'. $slug ) ); ?>" >
                            		<?php esc_html_e( 'Install Now', 'avventura-lite' ); ?>
                            	</a>							
                                
                            <?php endif; ?>
                            
						</div>
                           
					</div>

				<?php
				
					}
			
				?>
                
				</div>
                            
			</div>
        
        <?php
		
		}
		
		public function free_pro() {
		
		?>
    
            <table class="card table free-pro" cellspacing="0" cellpadding="0" >
                
                <tbody class="table-body">
                    
                    <tr class="table-head">
                        <th class="large"></th>
                        <th class="indicator"><?php echo esc_html__('Avventura Lite', 'avventura-lite'); ?></th>
                        <th class="indicator"><?php echo esc_html__('Avventura Pro', 'avventura-lite'); ?></th>
                    </tr>
                    
                    <tr class="feature-row">
                        <td class="large">
                            <div class="feature-wrap">
                                <h4><?php echo esc_html__('WooCommerce Support', 'avventura-lite'); ?></h4>
                            </div>
                        </td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>
                    </tr>
                    
                    <tr class="feature-row">
                        <td class="large">
                            <div class="feature-wrap">
                                <h4><?php echo esc_html__('Responsive Layout', 'avventura-lite'); ?></h4>
                            </div>
                        </td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>
                    </tr>
                    
                    <tr class="feature-row">
                        <td class="large">
                            <div class="feature-wrap">
                                <h4><?php echo esc_html__('Masonry layout', 'avventura-lite'); ?></h4>
                            </div>
                        </td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>
                    </tr>
                    
                    <tr class="feature-row">
                        <td class="large">
                            <div class="feature-wrap">
                                <h4><?php echo esc_html__('Logo upload', 'avventura-lite'); ?></h4>
                            </div>
                        </td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>
                    </tr>
                    
                    <tr class="feature-row">
                        <td class="large">
                            <div class="feature-wrap">
                                <h4><?php echo esc_html__('Social icons', 'avventura-lite'); ?></h4>
                            </div>
                        </td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>
                    </tr>
                    
                    <tr class="feature-row">
                        <td class="large">
                            <div class="feature-wrap">
                                <h4><?php echo esc_html__('Copyright text', 'avventura-lite'); ?></h4>
                                <div class="feature-inline-row">
                                    <span class="info-icon dashicon dashicons dashicons-info"></span>
                                    <span class="feature-description">
										<?php echo esc_html__('Remove the copyright text from the Footer.', 'avventura-lite'); ?>
                                    </span>
                                </div>
                            </div>
                        </td>
                        
                        <td class="indicator"><span class="dashicon dashicons dashicons-no-alt" size="30"></span></td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>
                    
                    </tr>
                    
                    <tr class="feature-row">
                        <td class="large">
                            <div class="feature-wrap">
                                <h4><?php echo esc_html__('Custom colors', 'avventura-lite'); ?></h4>
                                <div class="feature-inline-row">
                                    <span class="info-icon dashicon dashicons dashicons-info"></span>
                                    <span class="feature-description">
										<?php echo esc_html__('Choose a color for the links, the backgrounds, the slogan and so on.', 'avventura-lite'); ?>
                                    </span>
                                </div>
                            </div>
                        </td>
                        
                        <td class="indicator"><span class="dashicon dashicons dashicons-no-alt" size="30"></span></td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>
                    
                    </tr>
                    
                    <tr class="feature-row">
                        <td class="large">
                            <div class="feature-wrap">
                                <h4><?php echo esc_html__('Portfolio section', 'avventura-lite'); ?></h4>
                                <div class="feature-inline-row">
                                    <span class="info-icon dashicon dashicons dashicons-info"></span>
                                    <span class="feature-description">
										<?php echo esc_html__('You can add and display your works and give a modern layout, thanks to the masonry layout.', 'avventura-lite'); ?>
                                    </span>
                                </div>
                            </div>
                        </td>
                        
                        <td class="indicator"><span class="dashicon dashicons dashicons-no-alt" size="30"></span></td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>
                    
                    </tr>

                    <tr class="feature-row">
                        <td class="large">
                            <div class="feature-wrap">
                                <h4><?php echo esc_html__('Galleries', 'avventura-lite'); ?></h4>
                                <div class="feature-inline-row">
                                    <span class="info-icon dashicon dashicons dashicons-info"></span>
                                    <span class="feature-description">
										<?php echo esc_html__('For the gallery posts, pages and portfolio items, you can display the native slider or one of available slideshow created with Slider Revolution plugin (not included with Avventura theme).', 'avventura-lite'); ?>
                                    </span>
                                </div>
                            </div>
                        </td>
                        
                        <td class="indicator"><span class="dashicon dashicons dashicons-no-alt" size="30"></span></td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>
                    
                    </tr>

                    <tr class="feature-row">
                        <td class="large">
                            <div class="feature-wrap">
                                <h4><?php echo esc_html__('Unlimited widget areas', 'avventura-lite'); ?></h4>
                                <div class="feature-inline-row">
                                    <span class="info-icon dashicon dashicons dashicons-info"></span>
                                    <span class="feature-description">
										<?php echo esc_html__('On Avventura theme you can generate an unique widget area for each post, page, WooCommerce product and portfolio item.', 'avventura-lite'); ?>
                                    </span>
                                </div>
                            </div>
                        </td>
                        
                        <td class="indicator"><span class="dashicon dashicons dashicons-no-alt" size="30"></span></td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>
                    
                    </tr>

                    <tr class="feature-row">
                        <td class="large">
                            <div class="feature-wrap">
                                <h4><?php echo esc_html__('Global layout', 'avventura-lite'); ?></h4>
                                <div class="feature-inline-row">
                                    <span class="info-icon dashicon dashicons dashicons-info"></span>
                                    <span class="feature-description">
										<?php echo esc_html__('Option to select a global layout of all posts, pages, products and custom posts types.
', 'avventura-lite'); ?>
                                    </span>
                                </div>
                            </div>
                        </td>
                        
                        <td class="indicator"><span class="dashicon dashicons dashicons-no-alt" size="30"></span></td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>
                    
                    </tr>

                    <tr class="feature-row">
                        <td class="large">
                            <div class="feature-wrap">
                                <h4><?php echo esc_html__('Global widget area', 'avventura-lite'); ?></h4>
                                <div class="feature-inline-row">
                                    <span class="info-icon dashicon dashicons dashicons-info"></span>
                                    <span class="feature-description">
										<?php echo esc_html__('Option to select a global widget area for all posts, pages, products and custom posts types.', 'avventura-lite'); ?>
                                    </span>
                                </div>
                            </div>
                        </td>
                        
                        <td class="indicator"><span class="dashicon dashicons dashicons-no-alt" size="30"></span></td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>
                    
                    </tr>

                    <tr class="feature-row">
                        <td class="large">
                            <div class="feature-wrap">
                                <h4><?php echo esc_html__('Google fonts', 'avventura-lite'); ?></h4>
                                <div class="feature-inline-row">
                                    <span class="info-icon dashicon dashicons dashicons-info"></span>
                                    <span class="feature-description">
										<?php echo esc_html__('You can choose and use over 600 different fonts, for the logo, the menu and the titles.', 'avventura-lite'); ?>
                                    </span>
                                </div>
                            </div>
                        </td>
                        
                        <td class="indicator"><span class="dashicon dashicons dashicons-no-alt" size="30"></span></td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>
                    
                    </tr>

                    <tr class="feature-row">
                        <td class="large">
                            <div class="feature-wrap">
                                <h4><?php echo esc_html__('Automatic data import', 'avventura-lite'); ?></h4>
                                <div class="feature-inline-row">
                                    <span class="info-icon dashicon dashicons dashicons-info"></span>
                                    <span class="feature-description">
										<?php echo esc_html__('After the activation of Avventura theme, all settings will be imported automatically from the free version.', 'avventura-lite'); ?>
                                    </span>
                                </div>
                            </div>
                        </td>
                        
                        <td class="indicator"><span class="dashicon dashicons dashicons-no-alt" size="30"></span></td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>
                    
                    </tr>

                    <tr class="feature-row">
                        <td class="large">
                            <div class="feature-wrap">
                                <h4><?php echo esc_html__('1 click upgrades', 'avventura-lite'); ?></h4>
                                <div class="feature-inline-row">
                                    <span class="info-icon dashicon dashicons dashicons-info"></span>
                                    <span class="feature-description">
										<?php echo esc_html__('Start automatically the theme upgrades with simple one-click.', 'avventura-lite'); ?>
                                    </span>
                                </div>
                            </div>
                        </td>
                        
                        <td class="indicator"><span class="dashicon dashicons dashicons-no-alt" size="30"></span></td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>
                    
                    </tr>

                    <tr class="upsell-row">
                        
                        <td></td>
                        <td></td>
                        <td><a  target="_blank" href="<?php echo esc_url( 'https://www.themeinprogress.com/avventura-elegant-beauty-wordpress-shop-theme/?ref=2&campaign=avventura-welcome-page' );?>" class="button button-primary"><?php echo esc_html__('Get Avventura Pro Now', 'avventura-lite'); ?></a></td>
                    </tr>
                    
                </tbody>
                
            </table>

        <?php
		
		}
		
	}

}

new avventura_lite_welcome();

?>