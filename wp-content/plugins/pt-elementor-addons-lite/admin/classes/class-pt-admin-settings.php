<?php
/**
 * Handles logic for the admin settings page.
 *
 * @since 1.0.0
 */
final class PT_Admin_Settings {
    /**
	 * Holds any errors that may arise from
	 * saving admin settings.
	 *
	 * @since 1.0.0
	 * @var array $errors
	 */
	static public $errors = array();

	static public $settings = array();

	/**
	 * Initializes the admin settings.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	static public function init()
	{
		add_action( 'plugins_loaded', __CLASS__ . '::init_hooks' );
	}

    /**
	 * Adds the admin menu and enqueues CSS/JS if we are on
	 * the plugin's admin settings page.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	static public function init_hooks()
	{
		if ( ! is_admin() ) {
			return;
		}

        add_action( 'admin_menu',           __CLASS__ . '::menu', 601 );
        add_filter( 'all_plugins',          __CLASS__ . '::update_branding' );

		if ( isset( $_REQUEST['page'] ) && 'pt-plugin-license' == $_REQUEST['page'] ) {
			self::save();
			self::reset_settings();
		}
	}
   
	/**
	 * Get settings.
	 *
	 * @since 1.0.0
	 * @return array
	 */
	static public function get_settings()
	{
		$default_settings = array(
			'plugin_name'       => '',
            'plugin_desc'       => '',
            'plugin_author'     => '',
            'plugin_uri'        => '',
            'admin_label'       => '',
            'support_link'      => '',
            'hide_support'      => 'off',
            'hide_wl_settings'  => 'off',
			'hide_plugin'       => 'off',
			'google_map_api'	=> '',
		);

		$settings = self::get_option( 'pt_elementor_settings', true );

		if ( ! is_array( $settings ) || empty( $settings ) ) {
			return $default_settings;
		}

		if ( is_array( $settings ) && ! empty( $settings ) ) {
			return array_merge( $default_settings, $settings );
		}
	}

	/**
	 * Get admin label from settings.
	 *
	 * @since 1.0.0
	 * @return string
	 */
	static public function get_admin_label()
	{
		$settings = self::get_settings();
	    $admin_label = $settings['admin_label'];
	    return trim( $admin_label ) == '' ? 'ptelementor' : trim( $admin_label );
	}

	/**
	 * Renders the update message.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	static public function render_update_message()
	{
		if ( ! empty( self::$errors ) ) {
			foreach ( self::$errors as $message ) {
				echo '<div class="error"><p>' . $message . '</p></div>';
			}
		}
		else if ( ! empty( $_POST ) && ! isset( $_POST['email'] ) ) {
			echo '<div class="updated"><p>' . esc_html__( 'Settings updated!', 'pt-elementor-addons-pro' ) . '</p></div>';
		}
	}

	/**
	 * Adds an error message to be rendered.
	 *
	 * @since 1.0.0
	 * @param string $message The error message to add.
	 * @return void
	 */
	static public function add_error( $message )
	{
		self::$errors[] = $message;
	}

    /**
	 * Renders the admin settings menu.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	static public function menu()
	{
		if ( is_main_site() || ! is_multisite() ) {

			$admin_label = self::get_admin_label();

			if ( current_user_can( 'delete_users' ) ) {

				$title = $admin_label;
				$cap   = 'delete_users';
				$slug  = 'pt-plugin-license';
				$func  = __CLASS__ . '::render';

				add_submenu_page( 'elementor', $title, $title, $cap, $slug, $func );
			}
		}
	}

    static public function render()
    {
		include POWERPACK_ELEMENTS_PATH . './settings-page.php';
    }

	/**
	 * Renders the action for a form.
	 *
	 * @since 1.0.0
	 * @param string $type The type of form being rendered.
	 * @return void
	 */
	static public function get_form_action( $type = '' )
	{
		return admin_url( '/admin.php?page=pt-plugin-license' . $type );
	}

	/**
	 * Returns an option from the database for
	 * the admin settings page.
	 *
	 * @since 1.0.0
	 * @param string $key The option key.
	 * @return mixed
	 */
    static public function get_option( $key, $network_override = true )
    {
    	if ( is_network_admin() ) {
    		$value = get_site_option( $key );
    	}
        elseif ( ! $network_override && is_multisite() ) {
            $value = get_site_option( $key );
        }
        elseif ( $network_override && is_multisite() ) {
            $value = get_option( $key );
            $value = ( false === $value || (is_array($value) && in_array('disabled', $value) && get_option('pt_override_ms') != 1) ) ? get_site_option( $key ) : $value;
        }
        else {
    		$value = get_option( $key );
    	}

        return $value;
    }

    /**
	 * Updates an option from the admin settings page.
	 *
	 * @since 1.0.0
	 * @param string $key The option key.
	 * @param mixed $value The value to update.
	 * @return mixed
	 */
    static public function update_option( $key, $value, $network_override = true )
    {
    	if ( is_network_admin() ) {
    		update_site_option( $key, $value );
    	}
        // Delete the option if network overrides are allowed and the override checkbox isn't checked.
		else if ( $network_override && is_multisite() && ! isset( $_POST['pt_override_ms'] ) ) {
			delete_option( $key );
		}
        else {
    		update_option( $key, $value );
    	}
    }

    /**
	 * Delete an option from the admin settings page.
	 *
	 * @since 1.0.0
	 * @param string $key The option key.
	 * @param mixed $value The value to delete.
	 * @return mixed
	 */
    static public function delete_option( $key )
    {
    	if ( is_network_admin() ) {
    		delete_site_option( $key );
    	} else {
    		delete_option( $key );
    	}
	}

	/**
	 * Set the branding data to plugin.
	 *
	 * @since 1.0.0
	 * @return array
	 */
	static public function update_branding( $all_plugins )
	{
		$settings = self::get_settings();

    	$all_plugins[PT_ELEMENTS_BASE]['Name']           = ! empty( $settings['plugin_name'] )     ? $settings['plugin_name']      : $all_plugins[PT_ELEMENTS_BASE]['Name'];
    	$all_plugins[PT_ELEMENTS_BASE]['PluginURI']      = ! empty( $settings['plugin_uri'] )      ? $settings['plugin_uri']       : $all_plugins[PT_ELEMENTS_BASE]['PluginURI'];
    	$all_plugins[PT_ELEMENTS_BASE]['Description']    = ! empty( $settings['plugin_desc'] )     ? $settings['plugin_desc']      : $all_plugins[PT_ELEMENTS_BASE]['Description'];
    	$all_plugins[PT_ELEMENTS_BASE]['Author']         = ! empty( $settings['plugin_author'] )   ? $settings['plugin_author']    : $all_plugins[PT_ELEMENTS_BASE]['Author'];
    	$all_plugins[PT_ELEMENTS_BASE]['AuthorURI']      = ! empty( $settings['plugin_uri'] )      ? $settings['plugin_uri']       : $all_plugins[PT_ELEMENTS_BASE]['AuthorURI'];
    	$all_plugins[PT_ELEMENTS_BASE]['Title']          = ! empty( $settings['plugin_name'] )     ? $settings['plugin_name']      : $all_plugins[PT_ELEMENTS_BASE]['Title'];
    	$all_plugins[PT_ELEMENTS_BASE]['AuthorName']     = ! empty( $settings['plugin_author'] )   ? $settings['plugin_author']    : $all_plugins[PT_ELEMENTS_BASE]['AuthorName'];

    	if ( $settings['hide_plugin'] == 'on' ) {
    		unset( $all_plugins[PT_ELEMENTS_BASE] );
    	}

    	return $all_plugins;
	}

    static public function save()
    {
		// Only admins can save settings.
		if ( ! current_user_can('manage_options') ) {
			return;
		}
		self::save_license();
        self::save_white_label();
		self::save_modules();
    }

	/**
	 * Saves the license.
	 *
	 * @since 1.0.0
	 * @access private
	 * @return void
	 */
    static private function save_license()
    {
        if ( isset( $_POST['pt_license_key'] ) ) {
        	$old = get_site_option( 'pt_license_key' );
            $new = $_POST['pt_license_key'];

        	if( $old && $old != $new ) {
        		delete_site_option( 'pt_license_status' ); // new license has been entered, so must reactivate
        	}

            update_site_option( 'pt_license_key', $new );
        }
	}

	/**
	 * Saves the white label settings.
	 *
	 * @since 1.0.0
	 * @access private
	 * @return void
	 */
    static private function save_white_label()
    {
        if ( ! isset( $_POST['pt-wl-settings-nonce'] ) || ! wp_verify_nonce( $_POST['pt-wl-settings-nonce'], 'pt-wl-settings' ) ) {
            return;
        }

		$settings = self::get_settings();

		$settings['plugin_name'] 		= isset( $_POST['pt_plugin_name'] ) ? sanitize_text_field( $_POST['pt_plugin_name'] ) : '';
		$settings['plugin_desc'] 		= isset( $_POST['pt_plugin_desc'] ) ? esc_textarea( $_POST['pt_plugin_desc'] ) : '';
		$settings['plugin_author'] 		= isset( $_POST['pt_plugin_author'] ) ? sanitize_text_field( $_POST['pt_plugin_author'] ) : '';
		$settings['plugin_uri'] 		= isset( $_POST['pt_plugin_uri'] ) ? esc_url( $_POST['pt_plugin_uri'] ) : '';
        $settings['admin_label']       	= isset( $_POST['pt_admin_label'] ) ? sanitize_text_field( $_POST['pt_admin_label'] ) : 'ptelementor';
        $settings['support_link']       = isset( $_POST['pt_support_link'] ) ? esc_url_raw( $_POST['pt_support_link'] ) : 'https://www.paramthemes.com';
        $settings['hide_support']       = isset( $_POST['pt_hide_support_msg'] ) ? 'on' : 'off';
        $settings['hide_wl_settings']	= isset( $_POST['pt_hide_wl_settings'] ) ? 'on' : 'off';
        $settings['hide_plugin']        = isset( $_POST['pt_hide_plugin'] ) ? 'on' : 'off';

		update_site_option( 'pt_elementor_settings', $settings );
    }

	static public function save_modules()
	{
		if ( ! isset( $_POST['pt-modules-settings-nonce'] ) || ! wp_verify_nonce( $_POST['pt-modules-settings-nonce'], 'pt-modules-settings' ) ) {
            return;
        }

		if ( isset( $_POST['pt_enabled_modules'] ) ) {
			update_site_option( 'pt_elementor_modules', $_POST['pt_enabled_modules'] );
		}
	}

	static public function reset_settings()
	{
		if ( isset( $_GET['reset_modules'] ) ) {
			delete_site_option( 'pt_elementor_modules' );
			self::$errors[] = __('Modules settings updated!', 'pt-elementor-addons-pro');
		}
	}
}
PT_Admin_Settings::init();
