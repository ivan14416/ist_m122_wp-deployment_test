<?php

/**
 * Template for displaying search forms in Avventura Lite
 *
 */ 

if ( avventura_lite_is_sidebar_area() == true ) : ?>

    <form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url(home_url('/')); ?>">
        <div><label class="screen-reader-text" for="s"><?php esc_html_e( 'Search', 'avventura-lite') ?></label>
            <input type="text" value="" name="s" id="s" />
            <input type="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'avventura-lite') ?>" />
        </div>
    </form>

<?php else : ?>
    
    <form role="search" method="get" id="header-searchform" action="<?php echo esc_url(home_url('/')); ?>">
		<input type="text" placeholder="<?php esc_attr_e( 'Type here & click enter.',"avventura-lite" ) ?>" name="s" id="header-s" autocomplete="off" />
    </form>
    <a class="close-search-form" href="#close-search-form"><i class="fa fa-times searchform-close-button"></i></a>
    
<?php endif; ?>