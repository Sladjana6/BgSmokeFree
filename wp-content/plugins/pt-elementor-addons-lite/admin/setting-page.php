<?php
/**
 * Get some constants ready for paths when your plugin grows
 *
 * @author Param Themes
 *
 * @package Get some constants ready for paths when your plugin grows.
 */?>

<?php include_once 'pt-plugin-header.php';?>

<div class="wrap">
	<div id="icon-plugins" class="icon32"></div>
	
	<div class="pt-help-page">		
		<div class="content alignleft">
			<div id="pt-help-content">
				<h3 id="demo"></h3>
				<span id="mess"></span>
				<?php settings_errors('general'); ?>
				<div class="pt-settings-tabs">
			    	<div id="elements" class="pt-settings-tab active">
				      	<div class="row">
							<form id="pt-plugin-base-form" action="options.php" method="POST">
						      		<?php settings_fields( 'pt_setting' ); ?>
									<?php  do_settings_sections( 'pt-plugin-base' ); ?>
									<input type="submit" id="smbt" name = "Save" class="smbt" value="<?php _e( 'Save', 'ptbase' ); ?>" />
							</form> <!-- end of #pttemplate-form -->
						</div>
				    </div>
				</div>
			</div>
				

			<div class="footerpad" >
				<?php include_once 'pt-plugin-footer.php';?>
			</div>

		</div>
	<?php include_once 'pt-plugin-sidebar.php';?>
	</div>
	
</div>


<script>

$( "#smbt" ).click(function() {
		deleteMember();
	});
	function deleteMember() {
		swal({
		    title: "Settings Saved!",
		    type: "success",
			showCancelButton: false,
		 	showConfirmButton: false
		})
}

	$( '.pt-tabs li a' ).on( 'click', function(e) {
		e.preventDefault();
		$( '.pt-tabs li a' ).removeClass( 'active' );
		$(this).addClass( 'active' );
		var tab = $(this).attr( 'href' );
		$( '.pt-settings-tab' ).removeClass( 'active' );
		$( '.pt-settings-tabs' ).find( tab ).addClass( 'active' );
	});

	$( '.pt-get-pro' ).on( 'click', function() {
		swal({
	  		title: '<h2><span>Go</span> Premium',
	  		type: 'warning',
	  		html:
	    		'Purchase our <b><a href="#" rel="nofollow">premium version</a></b> to unlock these pro components!',
	  		showCloseButton: true,
	  		showCancelButton: false,
	  		focusConfirm: true,
		});
		
	} );
</script>