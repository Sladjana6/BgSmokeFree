<?php
/**
 * Get some constants ready for paths when your plugin grows
 *
 * @author Param Themes
 *
 * @package Get some constants ready for paths when your plugin grows.
 */
?>
<?php
 $license = trim( get_site_option( 'pt_license_key' ) );
 $status  = get_option( 'pt_license_status' );
?>
<?php include_once 'pt-plugin-header.php';?>
<div class="wrap">
	<div id="icon-plugins" class="icon32"></div>
	<div class="pt-help-page">	
		
		<div class="content alignleft minheight" >
			 <form method="post" id="pp-settings-form" action="<?php echo admin_url( '/admin.php?page=pt-plugin-license'); ?>">

			  	<div class="pad">
			  	  <p style="font-size: 14px;"><b><?php echo sprintf(__('Enter your <a href="%s" target="_blank">license key</a> to enable remote updates and support.', 'pt-elementor'), 'https://www.paramthemes.com'); ?></b></p>
			  	  	
						<table class="form-table">
						    <tbody>
						    	<?php if( false !== $license && ! empty($license) ) { ?>
						            <tr valign="top">
						                <th scope="row" valign="top">
						                    <?php esc_html_e( 'License Status', 'pt-elementor' ); ?>
						                </th>
						                <td>
						                    <?php if ( $status == 'valid' ) { ?>
						                        <span style="color: white; background: #5cb85c; padding: 5px 10px; text-shadow: none; border-radius: 3px; display: inline-block; text-transform: uppercase;"><?php esc_html_e('active'); ?></span>
						                       
						                        <?php wp_nonce_field( 'pt_license_deactivate_nonce', 'pt_license_deactivate_nonce' ); ?>
						                        <input type="submit" class="button-secondary" name="pt_license_deactivate" value="<?php esc_html_e('Deactivate License', 'pt-elementor'); ?>" />

						                    <?php } else { ?>
						                        <?php if ( $status == '' ) { $status = 'inactive'; } ?>
						                        <span style="<?php echo $status == 'inactive' ? 'color: #fff; background: #b1b1b1;' : 'color: red; background: #ffcdcd;'; ?> padding: 5px 10px; text-shadow: none; border-radius: 3px; display: inline-block; text-transform: uppercase;"><?php echo $status; ?></span>
						                        <?php
						                        wp_nonce_field( 'pt_license_activate_nonce', 'pt_license_activate_nonce' ); ?>
						                        <input type="submit" class="button-secondary" name="pt_license_activate" value="<?php esc_html_e( 'Activate License', 'pt-elementor' ); ?>"/>
						                        <p class="description"><?php esc_html_e( 'Please click the Activate License button to activate your license.', 'pt-elementor' ); ?>
						                    <?php } ?>
						                </td>
						            </tr>
						        <?php } ?>

						        <tr valign="top">
						            <th scope="row" valign="top">
						                <?php esc_html_e('License Key', 'pt-elementor'); ?>
						            </th>
						            <td>
						                <input id="pt_license_key" name="pt_license_key" type="password" class="regular-text" value="<?php esc_attr_e( $license ); ?>" />
						            </td>
						        </tr>

						    </tbody>
						</table>
					<?php submit_button(); ?>
	            </div>
			</form>
			<div class="footerpad" >
				<?php include_once 'pt-plugin-footer.php';?>
			</div>
		</div>
		<div class="sidebarmargin">
			<?php include_once 'pt-plugin-sidebar.php';?>
		</div>

	</div>
</div>