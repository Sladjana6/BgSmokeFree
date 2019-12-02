<?php

// this is the URL our updater / license checker pings. This should be the URL of the site with EDD installed
define( 'PT_ELEMENTOR_ADDONS_SL_STORE_URL', 'http://edddemo.ourtempurl.com' ); // you should use your own CONSTANT name, and be sure to replace it throughout this file

// the name of your product. This should match the download name in EDD exactly
define( 'PT_ELEMENTOR_ADDONS_ITEM_NAME', 'PT Elementor Addons Pro' ); // you should use your own CONSTANT name, and be sure to replace it throughout this file

// the name of the settings page for the license input to be displayed
define( 'PT_ELEMENTOR_ADDONS_LICENSE_PAGE', 'pt-elementor-addons-pro' );
/*define( 'PT_ITEM_ID', '26' );
define( 'PT_ELEMENTOR_ADDONS_ELEMENTS_PATH', plugin_dir_path( __FILE__ ) );*/


if( !class_exists( 'PT_SL_Plugin_Updater' ) ) {
	// load our custom updater
	include( dirname( __FILE__ ) . '/class-pt-plugin-updater.php' );
}

function pt_plugin_updater() {
	// retrieve our license key from the DB  edd_sample_license_key
	$license_key = trim( get_site_option( 'pt_license_key' ) );

	// setup the updater
	$updater = new PT_SL_Plugin_Updater( PT_ELEMENTOR_ADDONS_SL_STORE_URL, PT_ELEMENTOR_ADDONS_PATH . '/pt-elementor-addons-pro.php', array(
			'version' 	=> PT_ELEMENTOR_ADDONS_VERSION, 			// current version number
			'license' 	=> $license_key, 			// license key (used get_site_option above to retrieve from DB)
			'item_name' => PT_ELEMENTOR_ADDONS_ITEM_NAME,	// name of this plugin
			'author' 	=> 'Param Themes',  	// author of this plugin
			'url'       => home_url(),
			'item_id'   => PT_ITEM_ID,
			'beta'		=> false
		)
	);
	/*echo "<pre>";
	echo PT_ELEMENTOR_ADDONS_PATH;
	print_r($updater);
	die();*/
}
add_action( 'admin_init', 'pt_plugin_updater', 0 );


function pt_sanitize_license( $new ) {

	$old = get_site_option( 'pt_license_key' );
	if( $old && $old != $new ) {
		delete_option( 'pt_license_status' ); // new license has been entered, so must reactivate
	}
	return $new;
}



/************************************
* this illustrates how to activate
* a license key
*************************************/

function pt_activate_license() {
	
	// listen for our activate button to be clicked
	if( isset( $_POST['pt_license_activate'] ) ) {

		// run a quick security check
	 	if( ! check_admin_referer( 'pt_license_activate_nonce', 'pt_license_activate_nonce' ) )
			return; // get out if we didn't click the Activate button

		// retrieve the license from the database
		$license = trim( get_site_option( 'pt_license_key' ) );

		// data to send in our API request
		$api_params = array(
			'edd_action' => 'activate_license',
			'license'    => $license,
			'item_name'  => urlencode( PT_ELEMENTOR_ADDONS_ITEM_NAME ), // the name of our product in EDD
			'url'        => network_home_url()
		);

		// Call the custom API.
		$response = wp_remote_post( PT_ELEMENTOR_ADDONS_SL_STORE_URL, array( 'timeout' => 15, 'sslverify' => false, 'body' => $api_params ) );
		

		// make sure the response came back okay
		if ( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ) {

			if ( is_wp_error( $response ) ) {
				$message = $response->get_error_message();
			} else {
				$message = __( 'An error occurred, please try again.', 'pt-elementor-addons-pro' );
			}

		} else {

			$license_data = json_decode( wp_remote_retrieve_body( $response ) );

			if ( false === $license_data->success ) {

				switch( $license_data->error ) {

					case 'expired' :

						$message = sprintf(
							__( 'Your license key expired on %s.', 'pt-elementor-addons-pro' ),
							date_i18n( get_site_option( 'date_format' ), strtotime( $license_data->expires, current_time( 'timestamp' ) ) )
						);
						break;

					case 'revoked' :

						$message = __( 'Your license key has been disabled.', 'pt-elementor-addons-pro' );
						break;

					case 'missing' :

						$message = __( 'Invalid license.', 'pt-elementor-addons-pro' );
						break;

					case 'invalid' :
					case 'site_inactive' :

						$message = __( 'Your license is not active for this URL.', 'pt-elementor-addons-pro' );
						break;

					case 'item_name_mismatch' :

						$message = sprintf( __( 'This appears to be an invalid license key for %s.', 'pt-elementor-addons-pro' ), PT_ELEMENTOR_ADDONS_ITEM_NAME );
						break;

					case 'no_activations_left':

						$message = __( 'Your license key has reached its activation limit.', 'pt-elementor-addons-pro' );
						break;

					default :

						$message = __( 'An error occurred, please try again.', 'pt-elementor-addons-pro' );
						break;
				}

			}

		}

		// Check if anything passed on a message constituting a failure
		if ( ! empty( $message ) ) {
			$base_url = pt_Admin_Settings::get_form_action();
			$redirect = add_query_arg( array( 'sl_activation' => 'false', 'message' => urlencode( $message ) ), $base_url );

			wp_redirect( $redirect );
			exit();
		}

		// $license_data->license will be either "valid" or "invalid"

		update_site_option( 'pt_license_status', $license_data->license );
		wp_redirect( pt_Admin_Settings::get_form_action() );
		exit();
	}
}
add_action('admin_init', 'pt_activate_license');


/***********************************************
* Illustrates how to deactivate a license key.
* This will decrease the site count
***********************************************/

function pt_deactivate_license() {

	// listen for our activate button to be clicked
	if( isset( $_POST['pt_license_deactivate'] ) ) {

		// run a quick security check
	 	if( ! check_admin_referer( 'pt_license_deactivate_nonce', 'pt_license_deactivate_nonce' ) )
			return; // get out if we didn't click the Activate button

		// retrieve the license from the database
		$license = trim( get_site_option( 'pt_license_key' ) );

		// data to send in our API request
		$api_params = array(
			'edd_action' => 'deactivate_license',
			'license'    => $license,
			'item_name'  => urlencode( PT_ELEMENTOR_ADDONS_ITEM_NAME ), // the name of our product in EDD
			'url'        => home_url()
		);

		// Call the custom API.
		$response = wp_remote_post( PT_ELEMENTOR_ADDONS_SL_STORE_URL, array( 'timeout' => 15, 'sslverify' => false, 'body' => $api_params ) );

		// make sure the response came back okay
		if ( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ) {

			if ( is_wp_error( $response ) ) {
				$message = $response->get_error_message();
			} else {
				$message = __( 'An error occurred, please try again.', 'pt-elementor-addons-pro' );
			}

			$base_url = pt_Admin_Settings::get_form_action();
			$redirect = add_query_arg( array( 'sl_activation' => 'false', 'message' => urlencode( $message ) ), $base_url );

			wp_redirect( $redirect );
			exit();
		}

		// decode the license data
		$license_data = json_decode( wp_remote_retrieve_body( $response ) );

		// $license_data->license will be either "deactivated" or "failed"
		if( $license_data->license == 'deactivated' ) {
			delete_option( 'pt_license_status' );
		}

		wp_redirect( pt_Admin_Settings::get_form_action() );
		exit();

	}
}
add_action('admin_init', 'pt_deactivate_license');


/************************************
* this illustrates how to check if
* a license key is still valid
* the updater does this for you,
* so this is only needed if you
* want to do something custom
*************************************/

function pt_check_license() {

	global $wp_version;

	$license = trim( get_site_option( 'pt_license_key' ) );

	$api_params = array(
		'edd_action' => 'check_license',
		'license' => $license,
		'item_name' => urlencode( PT_ELEMENTOR_ADDONS_ITEM_NAME ),
		'url'       => home_url()
	);

	// Call the custom API.
	$response = wp_remote_post( PT_ELEMENTOR_ADDONS_SL_STORE_URL, array( 'timeout' => 15, 'sslverify' => false, 'body' => $api_params ) );

	if ( is_wp_error( $response ) )
		return false;

	$license_data = json_decode( wp_remote_retrieve_body( $response ) );

	if( $license_data->license == 'valid' ) {
		//echo 'valid'; exit;
		return 'valid';
		// this license is still valid
	} else {
		//echo 'invalid'; exit;
		return 'invalid';
		// this license is no longer valid
	}
}

/**
 * This is a means of catching errors from the activation method above and displaying it to the customer
 */
function pt_admin_notices() {
	if ( isset( $_GET['sl_activation'] ) && ! empty( $_GET['message'] ) ) {
		switch( $_GET['sl_activation'] ) {
			case 'false':
				$message = urldecode( $_GET['message'] );
			?>
				<div class="error" style="background: #fbfbfb; border-top: 1px solid #eee; border-right: 1px solid #eee;">
					<p><?php echo $message; ?></p>
				</div>
			<?php
				break;
			case 'true':
			default:
				break;

		}
	}
}
add_action( 'admin_notices', 'pt_admin_notices' );
