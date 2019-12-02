<?php

/**
 * Plugin Name: PT Elementor Addons Lite
 * Description: Elements bundle for Elementor Plugin for WordPress. <a href="https://www.paramthemes.com">Get Premium version</a>.
 * Plugin URI:  https://www.paramthemes.com
 * Version:     1.4.1
 *
 * @package PT Elementor Addons
 * Author:      Param Themes
 * Author URI:  https://www.paramthemes.com/
 * Text Domain: pt-elementor-addons
 */
register_activation_hook(__FILE__, 'child_plugin_activate');
function child_plugin_activate()
{
    // Require parent plugin
	if (!is_plugin_active('elementor/elementor.php') and current_user_can('activate_plugins')) {
        // Stop activation redirect and show error
		wp_die('Sorry, but this plugin requires the Elementor Plugin to be installed and active. <br><a href="' . admin_url('plugins.php') . '">&laquo; Return to Plugins</a>');
	}
}
final class Elementor_Test_Extension
{

	const MINIMUM_ELEMENTOR_VERSION = '3.0';

	public function init()
	{

		// Check for required Elementor version
		if (!version_compare(ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=')) {
			add_action('admin_notices', [$this, 'admin_notice_minimum_elementor_version']);
			return;
		}

	}

	public function admin_notice_minimum_elementor_version()
	{

		if (isset($_GET['activate'])) unset($_GET['activate']);

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'elementor-test-extension'),
			'<strong>' . esc_html__('Elementor Test Extension', 'elementor-test-extension') . '</strong>',
			'<strong>' . esc_html__('Elementor', 'elementor-test-extension') . '</strong>',
			self::MINIMUM_ELEMENTOR_VERSION
		);

		printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);

	}

}
if (!defined('ABSPATH')) {
	exit;
}
define('PT_ELEMENTOR_ADDONS_', __FILE__);
define('PT_ELEMENTOR_ADDONS_URL', plugins_url('/', __FILE__));
define('PT_ELEMENTOR_ADDONS_PATH', plugin_dir_path(__FILE__));
if (!defined('PT_ELEMENTOR_ADDONS_FILE')) {
	define('PT_ELEMENTOR_ADDONS_FILE', __FILE__);
}
if (!defined('PT_ELEMENTOR_ADDONS_HELP_URL')) {
	define('PT_ELEMENTOR_ADDONS_HELP_URL', admin_url() . 'admin.php?page=pt_elementor_addons_documentation');
}
if (!defined('PT_ELEMENTOR_ADDONS_VERSION')) {
	define('PT_ELEMENTOR_ADDONS_VERSION', '1.0');
}
require_once PT_ELEMENTOR_ADDONS_PATH . 'inc/elementor-helper.php';
if (is_admin()) {
	require_once PT_ELEMENTOR_ADDONS_PATH . 'admin/pt-plugin-base.php';
}

/**
 * Load Pt Custom Element
 *
 * @since 1.0.0
 */
/**
 * Define our Pt Element Function settings.
 */
function pt_element_function()
{


	include_once PT_ELEMENTOR_ADDONS_PATH . 'inc/supporter.php';

	// Load elements.
	$deactivate_element_team = pt_get_option('pt_deactivate_element_team', false);
	$pt_setting = get_option('pt_setting', '');

	if (isset($pt_setting['pt_opt_in'])) {
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in]', false);
	} else {
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in]', true);
		require_once PT_ELEMENTOR_ADDONS_PATH . 'elements/class-pt-elementor-team.php';
	}

	if (isset($pt_setting['pt_opt_in1'])) {
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in1]', false);
	} else {
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in1]', true);
		require_once PT_ELEMENTOR_ADDONS_PATH . 'elements/class-pt-elementor-flipbox.php';
	}

	if (isset($pt_setting['pt_opt_in2'])) {
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in2]', false);
	} else {
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in2]', true);
		require_once PT_ELEMENTOR_ADDONS_PATH . 'elements/class-pt-elementor-dual-button.php';
	}
	if (isset($pt_setting['pt_opt_in3'])) {
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in3]', false);
	} else {
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in3]', true);
		require_once PT_ELEMENTOR_ADDONS_PATH . 'elements/class-pt-elementor-post-timeline.php';
	}
	if (isset($pt_setting['pt_opt_in4'])) {
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in4]', false);
	} else {
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in4]', true);
		require_once PT_ELEMENTOR_ADDONS_PATH . 'elements/class-pt-elementor-info-box.php';
	}
	if (isset($pt_setting['pt_opt_in11'])) {
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in11]', false);
	} else {
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in11]', true);
		require_once PT_ELEMENTOR_ADDONS_PATH . 'elements/class-pt-elementor-interactive-banner.php';
	}
	if (isset($pt_setting['pt_opt_in6'])) {
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in6]', false);
	} else {
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in6]', true);
		require_once PT_ELEMENTOR_ADDONS_PATH . 'elements/class-pt-elementor-testimonials.php';
	}
	if (function_exists('wpcf7')) {
		if (isset($pt_setting['pt_opt_in7'])) {
			$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in7]', false);
		} else {
			$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in7]', true);
			require_once PT_ELEMENTOR_ADDONS_PATH . 'elements/class-pt-elementor-contact-form-7.php';
		}
	}
	/*gravity form*/
	if (class_exists('GFForms')) {
		if (isset($pt_setting['pt_opt_in8'])) {
			$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in8]', false);
		} else {
			$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in8]', true);
			require_once PT_ELEMENTOR_ADDONS_PATH . 'elements/class-pt-elementor-gravity-form.php';
		}
	}
	if (function_exists('Ninja_Forms')) {
		if (isset($pt_setting['pt_opt_in9'])) {
			$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in9]', false);
		} else {
			$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in9]', true);
			require_once PT_ELEMENTOR_ADDONS_PATH . 'elements/class-pt-elementor-ninja-form.php';
		}
	}
	if (class_exists('WPForms')) {
		if (isset($pt_setting['pt_opt_in10'])) {
			$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in10]', false);
		} else {
			$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in10]', true);
			require_once PT_ELEMENTOR_ADDONS_PATH . 'elements/class-pt-elementor-wpforms.php';
		}
	}

	if (class_exists('WeForms')) {
		if (isset($pt_setting['pt_opt_in55'])) {
			$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in55]', false);
		} else {
			$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in55]', true);
			require_once PT_ELEMENTOR_ADDONS_PATH . 'elements/class-pt-elementor-weforms.php';
		}
	}
	if (isset($pt_setting['pt_opt_in56'])) {
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in56]', false);
	} else {
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in56]', true);
		require_once PT_ELEMENTOR_ADDONS_PATH . 'elements/class-pt-elementor-product-grid.php';
	}
	if (isset($pt_setting['pt_opt_in58'])) {
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in58]', false);
	} else {
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in58]', true);
		require_once PT_ELEMENTOR_ADDONS_PATH . 'elements/class-pt-elementor-post-carousel.php';
	}
	if (isset($pt_setting['pt_opt_in59'])) {
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in59]', false);
	} else {
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in59]', true);
		require_once PT_ELEMENTOR_ADDONS_PATH . 'elements/class-pt-elementor-map.php';
	}
	if (isset($pt_setting['pt_opt_in60'])) {
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in60]', false);
	} else {
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in60]', true);
		require_once PT_ELEMENTOR_ADDONS_PATH . 'elements/class-pt-elementor-team-members.php';
	}

	if (isset($pt_setting['pt_opt_in62'])) {
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in62]', false);
	} else {
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in62]', true);
		require_once PT_ELEMENTOR_ADDONS_PATH . 'elements/class-pt-elementor-advance-accordion.php';
	}
	if (isset($pt_setting['pt_opt_in63'])) {
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in63]', false);
	} else {
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in63]', true);
		require_once PT_ELEMENTOR_ADDONS_PATH . 'elements/class-pt-elementor-pricing-table.php';
	}
	if (isset($pt_setting['pt_opt_in65'])) {
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in65]', false);
	} else {
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in65]', true);
		require_once PT_ELEMENTOR_ADDONS_PATH . 'elements/class-pt-elementor-clients-list.php';
	}
	if (isset($pt_setting['pt_opt_in66'])) {
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in66]', false);
	} else {
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in66]', true);
		require_once PT_ELEMENTOR_ADDONS_PATH . 'elements/class-pt-elementor-advance-tab.php';
	}
	if (isset($pt_setting['pt_opt_in67'])) {
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in67]', false);
	} else {
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in67]', true);
		require_once PT_ELEMENTOR_ADDONS_PATH . 'elements/class-pt-elementor-data-table.php';
	}
	if (isset($pt_setting['pt_opt_in68'])) {
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in68]', false);
	} else {
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in68]', true);
		require_once PT_ELEMENTOR_ADDONS_PATH . 'elements/class-pt-elementor-tooltip.php';
	}
	if (isset($pt_setting['pt_opt_in69'])) {
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in69]', false);
	} else {
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in69]', true);
		require_once PT_ELEMENTOR_ADDONS_PATH . 'elements/class-pt-elementor-image-accordion.php';
	}
	if (isset($pt_setting['pt_opt_in70'])) {
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in70]', false);
	} else {
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in70]', true);
		require_once PT_ELEMENTOR_ADDONS_PATH . 'elements/class-pt-elementor-dual-color-header.php';
	}

	if (isset($pt_setting['pt_opt_in72'])) {
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in72]', false);
	} else {
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in72]', true);
		require_once PT_ELEMENTOR_ADDONS_PATH . 'elements/class-pt-filterable-gallery.php';
	}


	if (isset($pt_setting['pt_opt_in75'])) {
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in75]', false);
	} else {
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in75]', true);
		require_once PT_ELEMENTOR_ADDONS_PATH . 'elements/class-pt-elementor-piecharts.php';
	}
	if (isset($pt_setting['pt_opt_in76'])) {
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in76]', false);
	} else {
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in76]', true);
		require_once PT_ELEMENTOR_ADDONS_PATH . 'elements/class-pt-elementor-blog-post-grid.php';
	}

	if (isset($pt_setting['pt_opt_in78'])) {
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in78]', false);
	} else {
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in78]', true);
		require_once PT_ELEMENTOR_ADDONS_PATH . 'elements/class-pt-elementor-services.php';
	}

	if (isset($pt_setting['pt_opt_in79'])) {
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in79]', false);
	} else {
		$deactivate_element_flipbox = pt_get_option('pt_setting[pt_opt_in79]', true);
		require_once PT_ELEMENTOR_ADDONS_PATH . 'elements/class-pt-elementor-stats-bars.php';
	}
}
add_action('elementor/widgets/widgets_registered', 'pt_element_function');
/**
 * Define our Pt Addon For Element Scripts settings.
 */
add_action('wp_enqueue_scripts', 'pt_maps_required_script');
add_action('elementor/frontend/after_register_scripts', 'pt_addon_for_elementor_scripts');
function pt_maps_required_script()
{
	$key = get_site_option('pt_map_key');
	if (!empty($key)) {
		wp_enqueue_script('google-maps-script', 'https://maps.googleapis.com/maps/api/js?key=' . $key);
	} else {
		wp_enqueue_script('google-maps-script', 'https://maps.googleapis.com/maps/api/js?key=');
	}
}
function pt_addon_for_elementor_scripts()
{
	/*CSS*/
	wp_enqueue_style('icomoon', PT_ELEMENTOR_ADDONS_URL . 'assets/css/icomoon.css');
	wp_enqueue_style('font', PT_ELEMENTOR_ADDONS_URL . 'assets/css/frontend.css');

	wp_enqueue_style('timeline.min', PT_ELEMENTOR_ADDONS_URL . 'assets/css/timeline.min.css');
	wp_enqueue_style('timeline-horizontal', PT_ELEMENTOR_ADDONS_URL . 'assets/css/timeline-horizontal.css');
	wp_enqueue_style('timeline-reset', PT_ELEMENTOR_ADDONS_URL . 'assets/css/timeline-reset.css');

	/*Jquery*/
	wp_enqueue_script('jquery');
	wp_enqueue_script('pt-isotope.pkgd', PT_ELEMENTOR_ADDONS_URL . 'assets/js/isotope.pkgd.js', array('jquery'), '1.0', true);
	wp_enqueue_script('jquery.masonry', PT_ELEMENTOR_ADDONS_URL . 'assets/js/jquery.masonry.js', array('jquery'), '1.0', true);
	wp_enqueue_script('pt-custom-js', PT_ELEMENTOR_ADDONS_URL . 'assets/js/pt-custom.js', array('jquery'), '1.0', true);
	wp_enqueue_script('pt-car-js', PT_ELEMENTOR_ADDONS_URL . 'assets/js/pt-carousel.js', array('jquery'), '1.0', true);
	wp_enqueue_script('slick-js', PT_ELEMENTOR_ADDONS_URL . 'assets/js/slick.js', array('jquery'), '1.5.9', true);
	wp_enqueue_script('pt-map-js', PT_ELEMENTOR_ADDONS_URL . 'assets/js/pt-map.js', array('jquery'), '2.2.4', true);
	wp_enqueue_script('pt-countdown-js', PT_ELEMENTOR_ADDONS_URL . 'assets/js/countdown.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('pt-fancy-tex-js', PT_ELEMENTOR_ADDONS_URL . 'assets/js/fancy-text.js', array('jquery'), '1.0', true);
	wp_enqueue_script('pt-jquery.magnific-popup-js', PT_ELEMENTOR_ADDONS_URL . 'assets/js/jquery.magnific-popup.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('pt-load-more-js', PT_ELEMENTOR_ADDONS_URL . 'assets/js/load-more.js', array('jquery'), '1.0', true);

	wp_enqueue_script('pt-mixitup-js', PT_ELEMENTOR_ADDONS_URL . 'assets/js/mixitup.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('pt-state-js', PT_ELEMENTOR_ADDONS_URL . 'assets/js/jquery.stats.js', array('jquery'), '1.0', true);
	wp_enqueue_script('pt-waypoints-js', PT_ELEMENTOR_ADDONS_URL . 'assets/js/jquery.waypoints.js', array('jquery'), '1.0', true);

	wp_enqueue_script('pt-imagesloaded.pkgd', PT_ELEMENTOR_ADDONS_URL . 'assets/js/imagesloaded.pkgd.js', array('jquery'), '1.0', true);
	wp_enqueue_script('pt-jquery.socialfeed', PT_ELEMENTOR_ADDONS_URL . 'assets/js/jquery.socialfeed.js', array('jquery'), '1.0', true);
	wp_enqueue_script('pt-doT.min', PT_ELEMENTOR_ADDONS_URL . 'assets/js/doT.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('pt-moment', PT_ELEMENTOR_ADDONS_URL . 'assets/js/moment.js', array('jquery'), '1.0', true);
	wp_enqueue_script('pt-codebird', PT_ELEMENTOR_ADDONS_URL . 'assets/js/codebird.js', array('jquery'), '1.0', true);
	wp_enqueue_script('pt-bar-widget', PT_ELEMENTOR_ADDONS_URL . 'assets/js/bar-widgets.js', array('jquery'), '1.0', true);
	wp_enqueue_script('timeline-min-script', PT_ELEMENTOR_ADDONS_URL . 'assets/js/timeline.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('jquery-mobile-custom-min', PT_ELEMENTOR_ADDONS_URL . 'assets/js/jquery.mobile.custom.min.js', array('jquery'), '1.0', true);
	//wp_enqueue_script( 'jquery-2-1-4', PT_ELEMENTOR_ADDONS_URL . 'assets/js/jquery-2.1.4.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script('main', PT_ELEMENTOR_ADDONS_URL . 'assets/js/main.js', array('jquery'), '1.0', true);
	wp_enqueue_script('modernizr', PT_ELEMENTOR_ADDONS_URL . 'assets/js/modernizr.js', array('jquery'), '1.0', true);


}
add_action('wp_enqueue_scripts', 'pt_addon_for_elementor_scripts');

function localize_scripts()
{

	$custom_css = pt_get_option('pt_custom_css', '');
	wp_localize_script('pt-frontend-scripts', 'pt_settings', array('custom_css' => $custom_css));
}
