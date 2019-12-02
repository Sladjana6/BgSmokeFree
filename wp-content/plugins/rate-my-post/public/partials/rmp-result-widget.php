<?php

/**
 * Public template
 *
 * @link       http://wordpress.org/plugins/rate-my-post/
 * @since      2.0.0
 *
 * @package    Rate_My_Post
 * @subpackage Rate_My_Post/public/partials
 */
?>

<?php $rating_icon_type = Rate_My_Post_Public_Helper::icon_type(); ?>
<!-- Rate my Post Results Template -->
<div class="rmp-results">
  <div class="star-result rmp-column rmp-no-display">
    <i class="<?php echo $rating_icon_type; ?>"></i>
    <i class="<?php echo $rating_icon_type; ?>"></i>
    <i class="<?php echo $rating_icon_type; ?>"></i>
    <i class="<?php echo $rating_icon_type; ?>"></i>
    <i class="<?php echo $rating_icon_type; ?>"></i>
  </div>
  <div class="number-result rmp-column">
    <span id="avg-rating"></span>
  </div>
  <div class="total-votes rmp-column">
    <span id="num-votes"></span>
  </div>
</div>
<div class="rmp-spacer"></div>
