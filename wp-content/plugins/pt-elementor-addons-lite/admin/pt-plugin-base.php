<?php
/**
 * Get some constants ready for paths when your plugin grows
 *
 * @author Param Themes
 *
 * @package Get some constants ready for paths when your plugin grows.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * The plugin base class - the root of all WP goods!
 *
 * @author Param Themes
 */
class PT_Plugin_Base {

	/**
	 * Assign everything as a call from within the constructor
	 *
	 * @var The plugin base class - the root of all WP goods!
	 */

	protected $plugin_slug = 'pt_elementor_addons';
	/**
	 * Assign everything as a call from within the constructor
	 */
	public function __construct() {
		// add script and style calls the WP way.
		// it's a bit confusing as styles are called with a scripts hook.
		add_action( 'wp_enqueue_scripts', array( $this, 'pt_add_CSS' ) );
		// add scripts and styles only available in admin.
		add_action( 'admin_enqueue_scripts', array( $this, 'pt_add_admin_CSS' ) );
		// register admin pages for the plugin.
		add_action( 'admin_menu', array( $this, 'pt_admin_pages_callback1' ) );
		// register meta boxes for Pages (could be replicated for posts and custom post types).
		// register save_post hooks for saving the custom fields.
		add_action( 'save_post', array( $this, 'pt_save_sample_field' ) );
		// Register activation and deactivation hooks.
		register_activation_hook( __FILE__, 'pt_on_activate_callback' );
		register_deactivation_hook( __FILE__, 'pt_on_deactivate_callback' );
		// Translation-ready.
		add_action( 'plugins_loaded', array( $this, 'pt_add_textdomain' ) );
		// Add earlier execution as it needs to occur before admin page display.
		add_action( 'admin_init', array( $this, 'pt_register_settings' ), 5 );
		add_action( 'wp_ajax_store_ajax_value', array( $this, 'store_ajax_value' ) );
	}
	/**
	 * Add CSS styles
	 */
	public function pt_add_CSS() {
		 wp_register_style( 'samplestyle', PT_ELEMENTOR_ADDONS_URL . 'admin/css/samplestyle.css', array(), PT_ELEMENTOR_ADDONS_VERSION );
		wp_enqueue_style( 'samplestyle' );
	}
	/**
	 * Add admin CSS styles - available only on admin
	 */
	public function pt_add_admin_CSS() {
		 wp_register_style( 'samplestyle-admin', PT_ELEMENTOR_ADDONS_URL . 'admin/css/samplestyle-admin.css', array(), PT_ELEMENTOR_ADDONS_VERSION );
		wp_enqueue_style( 'samplestyle-admin' );
		wp_register_style('pt_help_page', PT_ELEMENTOR_ADDONS_URL . 'admin/css/help-page.css', array(), PT_ELEMENTOR_ADDONS_VERSION);
			wp_enqueue_style('pt_help_page');
		wp_enqueue_style( 'sweetalert2' );
		 wp_register_style( 'admin-css', PT_ELEMENTOR_ADDONS_URL . 'admin/css/admin.css');
		wp_enqueue_style( 'admin-css' );

		wp_register_style('pt_custom', PT_ELEMENTOR_ADDONS_URL . 'admin/css/custom.css', array(), PT_ELEMENTOR_ADDONS_VERSION);
		wp_enqueue_style( 'pt_custom' );
	}
	/**
	 * Callback for registering pages
	 *
	 * This demo registers a custom page for the plugin and a subpage
	 */
	
	/**
	 * Callback for registering pages
	 *
	 * This demo registers a custom page for the plugin and a subpage
	 */
	public function pt_admin_pages_callback1() {
		
		add_menu_page(__( 'PT Elementor', 'ptbase' ), 
					  __( 'PT Elementor', 'ptbase' ), 
						'edit_themes', 'pt-plugin-base',
		array( $this, 'pt_plugin_base' ),PT_ELEMENTOR_ADDONS_URL . 'admin/images/logo-shape16.png' );

		add_submenu_page( 'pt-plugin-base',
					 __( 'Settings', 'ptbase' ),
					 __( 'Settings', 'ptbase' ), 'edit_themes', 
					 'pt-plugin-base',
					  array( $this, 'pt_plugin_base' ) );

		add_submenu_page( 'pt-plugin-base', __( 'General', 'ptbase' ),
					 __( 'General', 'ptbase' ), 'edit_themes', 
					 'pt-plugin-general',
					  array( $this, 'pt_general_page' ) );

		if (is_plugin_active('pt-elementor-addons-pro/pt-elementor-addons-pro.php')) {
			add_submenu_page( 'pt-plugin-base', __( 'License', 'ptbase' ),
							 __( 'License', 'ptbase' ), 'edit_themes', 
							 'pt-plugin-license',
							  array( $this, 'pt_license_page' ) );
		}
	}
	/**
	 * The content of the base page
	 */
	public function pt_plugin_base() {
		include_once( PT_ELEMENTOR_ADDONS_PATH . 'admin/setting-page.php' );
	}

	/**
	 *  Adding pt-plugin-license page
	 */
	public function pt_license_page() {
		include_once( PT_ELEMENTOR_ADDONS_PATH . 'admin/pt-plugin-license.php' );
	}

	/**
	 *  Adding general setting page
	 */
	public function pt_general_page() {
		include_once( PT_ELEMENTOR_ADDONS_PATH . 'admin/pt-plugin-general.php' );
	}
	
	
	/**
	 * Save the custom field from the side metabox
	 *
	 * @param    $post $post_id the current post ID.
	 * @return post_id the post ID from the input arguments.
	 */
	public function pt_save_sample_field( $post_id ) {
		// Avoid autosaves.
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		$slug = 'pluginbase';
		// If this isn't a 'book' post, don't update it.
		if ( ! isset( $_POST['post_type'] ) || $slug != $_POST['post_type'] ) {
			return;
		}
		// If the custom field is found, update the postmeta record.
		// Also, filter the HTML just to be safe.
		if ( isset( $_POST['pt_test_input'] ) ) {
			update_post_meta( $post_id, 'pt_test_input',  esc_html( $_POST['pt_test_input'] ) );
		}
	}
	
	/**
	 * Initialize the Settings class
	 *
	 * Register a settings section with a field for a secure WordPress admin option creation.
	 */
	public function pt_register_settings() {
		require_once( PT_ELEMENTOR_ADDONS_PATH . '/admin/pt-plugin-settings.class.php' );
		new PT_Plugin_Settings();
	}
	/**
	 * Add textdomain for plugin
	 */
	public function pt_add_textdomain() {
		load_plugin_textdomain( 'ptbase', false, dirname( plugin_basename( __FILE__ ) ) . '/admin/lang/' );
	}
	/**
	 * Callback for saving a simple AJAX option with no page reload
	 */
	public function store_ajax_value() {
		if ( isset( $_POST['data'] ) && isset( $_POST['data']['pt_option_from_ajax'] ) ) {
			update_option( 'pt_option_from_ajax' , $_POST['data']['pt_option_from_ajax'] );
		}
		die();
	}
}
// Initialize everything.
 new PT_Plugin_Base();
