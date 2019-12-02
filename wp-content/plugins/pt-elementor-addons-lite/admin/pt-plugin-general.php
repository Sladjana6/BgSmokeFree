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
//get key
 	$mapkey = trim( get_site_option( 'pt_map_key' ) );
//update key
	if(!empty($_POST['pt_map_key'])){
		$key = $_POST['pt_map_key'];
		 update_option( 'pt_map_key', $key, true); 
		 ?>
		 	<script type="text/javascript">
			      window.location.href = "<?php echo admin_url( '/admin.php?page=pt-plugin-general'); ?>";
			</script>
		 <?php
	}
 ?>
<?php include_once 'pt-plugin-header.php';?>
<div class="wrap">
	<div id="icon-plugins" class="icon32"></div>
	<div class="pt-help-page">	

		<div class="content alignleft minheight" >
			 <form method="post" id="pp-settings-form" action="<?php echo admin_url( '/admin.php?page=pt-plugin-general'); ?>">

			  	<div class="pad">
			  		<h3 class="text-center">Google Maps Key<h3>
			  		 <p style="font-size: 14px;"><b><?php echo sprintf(__('Enter your <a href="%s" target="_blank">Google Maps key</a>', 'pt-elementor'), 'https://developers.google.com/maps/documentation/javascript/get-api-key'); ?></b></p>
			  		
						<table class="form-table">
						    <tbody>
						        <tr valign="top">
						            <th scope="row" valign="top">
						                <?php esc_html_e('Map Key', 'pt-elementor'); ?>
						            </th>
						            <td>
						                <input id="pt_map_key" name="pt_map_key" type="text" class="regular-text" value="<?php esc_attr_e( $mapkey ); ?>" />
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