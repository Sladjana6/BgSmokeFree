<?php

/**
 * @link              http://wordpress.org/plugins/rate-my-post/
 * @since             2.0.0
 * @package           Rate my Post
 *
 * @wordpress-plugin
 * Plugin Name: 	  	Rate my Post - WP Post Rating
 * Plugin URI:        https://wordpress.org/plugins/rate-my-post/
 * Description:       Allows visitors to rate your posts/pages and send you private feedback about each post or page.
 * Version:           2.9.1
 * Author:            Blaz K.
 * Author URI:        https://profiles.wordpress.org/blazk
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       rate-my-post
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Plugin version
define( 'RATE_MY_POST_VERSION', '2.9.1' );

// Plugin activation
function activate_rate_my_post() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-rate-my-post-activator.php';
	Rate_My_Post_Activator::activate();
}

// Plugin deactivation
function deactivate_rate_my_post() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-rate-my-post-deactivator.php';
	Rate_My_Post_Deactivator::deactivate();
}

// Plugin upgrade
function upgrade_rate_my_post() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-rate-my-post-upgrader.php';
	Rate_My_Post_Upgrader::upgrade();
}

register_activation_hook( __FILE__, 'activate_rate_my_post' );
register_deactivation_hook( __FILE__, 'deactivate_rate_my_post' );
add_action( 'plugins_loaded', 'upgrade_rate_my_post');

//developer functions
require plugin_dir_path( __FILE__ ) . 'includes/dev-functions.php';

// The core plugin class
require plugin_dir_path( __FILE__ ) . 'includes/class-rate-my-post.php';

// Execute the plugin
function run_rate_my_post() {

	$plugin = new Rate_My_Post();
	$plugin->run();

}
run_rate_my_post();

//OPTIONS ARRAY
// var_dump(get_option( 'rmp_options' ));
//CUSTOMIZATION ARRAY
// var_dump(get_option( 'rmp_customize_strings' ));
//SECURITY OPTIONS ARRAY
// var_dump(get_option( 'rmp_security' ));
//VERSION
// var_dump(get_option( 'rmp_version' ));
