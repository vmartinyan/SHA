<?php

/*
 * Plugin Name: WP Custom Post Template Redux
 * Plugin URI: http://www.forthepeople.com
 * Description: This is a forked version of dotsquares' WP Post Template plugin. It allows theme authors to create a post template as well as page template for the single post.
 * Author: Morgan and Morgan (and work from the original forked plugin by dotsquares.com)
 * Version: 1.4.3
 * Author URI: http://www.forthepeople.com
 * License: GPL2+
 */



require __DIR__ . '/inc/wpcpt-settings.php';
require __DIR__ . '/inc/wpcpt.php';
require __DIR__ . '/inc/integrations/integrations.php';

WPCPT_Settings::init();
WPCPT::init();

//register functon name for uninstall plugin
register_deactivation_hook( __FILE__, 'wp_custom_post_template_deactivate' );
function wp_custom_post_template_deactivate() {
	//delete otion when plugin deactivated
	delete_option( 'wp_custom_post_template' );
}









