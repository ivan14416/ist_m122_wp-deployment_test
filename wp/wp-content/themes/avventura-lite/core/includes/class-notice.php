<?php

/**
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

if( !class_exists( 'avventura_lite_admin_notice' ) ) {

	class avventura_lite_admin_notice {
	
		/**
		 * Constructor
		 */
		 
		public function __construct( $fields = array() ) {

			if ( 
				!get_option( 'avventura-lite-dismissed-notice') &&
				version_compare( PHP_VERSION, AVVENTURA_LITE_MIN_PHP_VERSION, '>=' )
			) {

				add_action( 'admin_notices', array(&$this, 'admin_notice') );
				add_action( 'admin_head', array( $this, 'dismiss' ) );
			
			}

		}

		/**
		 * Dismiss notice.
		 */
		
		public function dismiss() {

			if ( isset( $_GET['avventura-lite-dismiss'] ) && check_admin_referer( 'avventura-lite-dismiss-action' ) ) {
		
				update_option( 'avventura-lite-dismissed-notice', intval($_GET['avventura-lite-dismiss']) );
				remove_action( 'admin_notices', array(&$this, 'admin_notice') );
				
			} 
		
		}

		/**
		 * Admin notice.
		 */
		 
		public function admin_notice() {
			
		?>
			
            <div class="notice notice-warning">
            
            	<p>
            
            		<strong>

						<?php
                        
                            esc_html_e( 'Upgrade to the premium version of Avventura, to enable 600+ Google Fonts, unlimited sidebars, portfolio section and much more. ', 'avventura-lite' ); 
                            
							printf( 
								'<p><a href="%1$s" class="dismiss-notice">' . esc_html__( 'Dismiss this notice', 'avventura-lite' ) . '</a></p>', 
								esc_url( wp_nonce_url( add_query_arg( 'avventura-lite-dismiss', '1' ), 'avventura-lite-dismiss-action'))
							);
                            
                        ?>
                    
                    </strong>
                    
            	</p>
                    
            	<p>
            		
                    <a target="_blank" href="<?php echo esc_url( 'https://www.themeinprogress.com/avventura-elegant-beauty-wordpress-shop-theme/?ref=2&campaign=avventura-notice' ); ?>" class="button button-primary"><?php esc_html_e( 'Upgrade to Avventura Premium', 'avventura-lite' ); ?></a>
                
            	</p>

            </div>
		
		<?php
		
		}

	}

}

new avventura_lite_admin_notice();

?>