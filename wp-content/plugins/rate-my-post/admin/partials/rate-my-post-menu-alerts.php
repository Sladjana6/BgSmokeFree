<?php

/**
 * Admin template
 *
 * @link       http://wordpress.org/plugins/rate-my-post/
 * @since      2.1.0
 *
 * @package    Rate_My_Post
 * @subpackage Rate_My_Post/admin/partials
 */
?>

<?php
  if ( ! defined( 'WPINC' ) ) {
  	die;
  }
?>

<?php
  global $wp_version;
?>

<?php if ( !current_user_can( 'manage_options' ) ): ?>
<div class="rmp-alert">
  <p class="rmp-alert__text">
    <?php echo ( esc_html__( 'You need to be logged in as administrator to save settings for Rate my Post plugin', 'rate-my-post' ) ); ?>.
  </p>
</div>
<?php endif; ?>

<?php if ( version_compare( $wp_version, '4.7.0' ) < 0 ): ?>
  <div class="rmp-alert">
    <p class="rmp-alert__text">
      <?php echo ( esc_html__( 'Rate my Post requires WordPress version 4.7.0 or higher. Please update your WordPress', 'rate-my-post' ) ); ?>.
    </p>
  </div>
<?php endif; ?>
