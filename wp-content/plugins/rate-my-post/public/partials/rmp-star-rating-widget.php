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

<?php
  //retrive necessary data for the template
  $rmp_options = get_option( 'rmp_options' );
  $rmp_custom_strings = Rate_My_Post_Public_Helper::custom_strings();
  $custom_results_text = Rate_My_Post_Public_Helper::custom_results_text();
  $average_rating = Rate_My_Post_Public_Helper::average_rating();
  $social_links = Rate_My_Post_Public_Helper::social_share_links();
  //data for inline style - we use inline style for some customization because internal and external styles can be overwritten by themes and other plugins
  $social_icon_style = Rate_My_Post_Public_Helper::custom_social_icon();
  $rating_icon_size = Rate_My_Post_Public_Helper::icon_size();
  $rating_icon_type = Rate_My_Post_Public_Helper::icon_type();
  $custom_font_sizes = Rate_My_Post_Public_Helper::custom_inline_css( 'font-size' );
  $custom_margins = Rate_My_Post_Public_Helper::custom_inline_css( 'margin-bottom' );
?>

<!-- Rate my Post Rating Template -->
<div class="rmp-main">
  <?php do_action( 'rmp_before_all_widgets' ); ?>
  <!-- Star rating widget -->
  <div class="rmp-rate-view">

    <?php if ( $rmp_options['noHeadings'] !== 2 ): ?>
      <h2 class="rmp-main-title" style="<?php echo $custom_font_sizes['titleFontSize'] . $custom_margins['titleMarginBottom']; ?>">
        <?php echo $rmp_custom_strings['rateTitle']; ?>
      </h2>
    <?php else: ?>
      <p class="rmp-main-title" style="<?php echo $custom_font_sizes['titleFontSize'] . $custom_margins['titleMarginBottom']; ?>">
        <?php echo $rmp_custom_strings['rateTitle']; ?>
      </p>
    <?php endif; ?>

    <p class="rmp-main-subtitle" style="<?php echo $custom_font_sizes['subtitleFontSize'] . $custom_margins['subtitleMarginBottom']; ?>">
      <?php echo $rmp_custom_strings['rateSubtitle']; ?>
    </p>

    <div class="rating-stars">
      <ul id="rmp-stars">
        <li class="star" data-descriptive-rating="<?php echo $rmp_custom_strings['star1']; ?>" data-value="1">
          <i <?php echo $rating_icon_size; ?> class="<?php echo $rating_icon_type; ?>"></i>
        </li>
        <li class="star" data-descriptive-rating="<?php echo $rmp_custom_strings['star2']; ?>" data-value="2">
          <i <?php echo $rating_icon_size; ?> class="<?php echo $rating_icon_type; ?>"></i>
        </li>
        <li class="star" data-descriptive-rating="<?php echo $rmp_custom_strings['star3']; ?>" data-value="3">
          <i <?php echo $rating_icon_size; ?>  class="<?php echo $rating_icon_type; ?>"></i>
        </li>
        <li class="star" data-descriptive-rating="<?php echo $rmp_custom_strings['star4']; ?>" data-value="4">
          <i <?php echo $rating_icon_size; ?>  class="<?php echo $rating_icon_type; ?>"></i>
        </li>
        <li class="star" data-descriptive-rating="<?php echo $rmp_custom_strings['star5']; ?>" data-value="5">
          <i <?php echo $rating_icon_size; ?>  class="<?php echo $rating_icon_type; ?>"></i>
        </li>
      </ul>
    </div>

    <p id="descriptive-rating" style="<?php echo $custom_font_sizes['textFontSize']; ?>"></p>

    <button id="prevent-accidental-button"><?php echo $rmp_custom_strings['submitButtonText']; ?></button>

    <p id="voting-results" style="<?php echo $custom_font_sizes['textFontSize']; ?>">
      <?php if ( $rmp_options['notShowRating'] !== 2 && !$custom_results_text ): ?>
        <?php echo $rmp_custom_strings['rateResult']; ?> <span id="rating"></span>
        / 5. <?php echo $rmp_custom_strings['rateResult2']; ?> <span id="votes"></span>
      <?php elseif( $rmp_options['notShowRating'] !== 2 && $custom_results_text ): ?>
        <?php echo $custom_results_text; ?>
      <?php endif; ?>
    </p>

    <p id="no-vote" style="<?php echo $custom_font_sizes['textFontSize']; ?>"></p>

    <p id="thank-you-msg" style="<?php echo $custom_font_sizes['textFontSize']; ?>"></p>

    <p id="vote-alert" style="<?php echo $custom_font_sizes['textFontSize']; ?>"></p>

  </div>

  <!--Structured data, if enabled -->
  <?php if ($rmp_options['richSnippet'] === 2 && intval( get_post_meta( get_the_ID(), 'rmp_vote_count', true ) )): ?>
    <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "CreativeWork",
      "aggregateRating": {
        "@type": "AggregateRating",
        "bestRating": "5",
        "ratingCount": "<?php echo intval( get_post_meta( get_the_ID(), 'rmp_vote_count', true ) ); ?>",
        "ratingValue": "<?php echo $average_rating; ?>"
      },
      "image": "<?php echo get_the_post_thumbnail_url(); ?>",
      "name": "<?php echo wp_strip_all_tags( get_the_title() ); ?>"
    }
    </script>
  <?php endif; ?>

  <?php if ( $rmp_options['social'] === 2 ): ?>
    <!-- Social widget -->
    <div class="rmp-social-view">
      <?php if ( $rmp_options['noHeadings'] !== 2 ): ?>
        <h2 class="rmp-main-title" style="<?php echo $custom_font_sizes['titleFontSize'] . $custom_margins['titleMarginBottom']; ?>">
        <?php echo $rmp_custom_strings['socialTitle']; ?>
        </h2>
      <?php else: ?>
        <p class="rmp-main-title" style="<?php echo $custom_font_sizes['titleFontSize'] . $custom_margins['titleMarginBottom']; ?>">
          <?php echo $rmp_custom_strings['socialTitle']; ?>
        </p>
      <?php endif; ?>

      <p class="rmp-main-subtitle" style="<?php echo $custom_font_sizes['subtitleFontSize'] . $custom_margins['subtitleMarginBottom']; ?>">
        <?php echo $rmp_custom_strings['socialSubtitle']; ?>
      </p>

      <?php do_action( 'rmp_before_social_icons' ); ?>

      <div class="social-icons">
        <?php if ( $rmp_options['socialShare'] != 2 ): ?>
          <!-- Social follow widget -->
          <?php if ( $rmp_options['fb'] !== '' ): ?>
            <a target="_blank" href="<?php echo esc_url($rmp_options['fb']); ?>" class="fa fa-facebook rmp-social-icon"<?php echo $social_icon_style; ?>></a>
          <?php endif; ?>

          <?php if ( $rmp_options['pinterest'] !== '' ): ?>
            <a target="_blank" href="<?php echo esc_url($rmp_options['pinterest']); ?>" class="fa fa-pinterest rmp-social-icon"<?php echo $social_icon_style; ?>></a>
          <?php endif; ?>

          <?php if ( $rmp_options['youtube'] !== '' ): ?>
            <a target="_blank" href="<?php echo esc_url($rmp_options['youtube']); ?>" class="fa fa-youtube rmp-social-icon"<?php echo $social_icon_style; ?>></a>
          <?php endif; ?>

          <?php if ( $rmp_options['flickr'] !== '' ): ?>
            <a target="_blank" href="<?php echo esc_url($rmp_options['flickr']); ?>" class="fa fa-flickr rmp-social-icon"<?php echo $social_icon_style; ?>></a>
          <?php endif; ?>

          <?php if ( $rmp_options['instagram'] !== '' ): ?>
            <a target="_blank" href="<?php echo esc_url($rmp_options['instagram']); ?>" class="fa fa-instagram rmp-social-icon"<?php echo $social_icon_style; ?>></a>
          <?php endif; ?>

          <?php if ( $rmp_options['twitter'] !== '' ): ?>
            <a target="_blank" href="<?php echo esc_url($rmp_options['twitter']); ?>" class="fa fa-twitter rmp-social-icon"<?php echo $social_icon_style; ?>></a>
          <?php endif; ?>

          <?php if ( $rmp_options['linkedin'] !== '' ): ?>
            <a target="_blank" href="<?php echo esc_url($rmp_options['linkedin']); ?>" class="fa fa-linkedin rmp-social-icon"<?php echo $social_icon_style; ?>></a>
          <?php endif; ?>

      <?php else: ?>
        <!-- Social share widget -->
        <?php if ( array_key_exists( 'facebook', $social_links ) ): ?>
          <a target="_blank" href="<?php echo esc_url( $social_links['facebook'] ); ?>" class="fa fa-facebook rmp-social-icon"<?php echo $social_icon_style; ?>></a>
        <?php endif; ?>

        <?php if ( array_key_exists( 'pinterest', $social_links ) ): ?>
          <a target="_blank" href="<?php echo esc_url( $social_links['pinterest'] ); ?>" class="fa fa-pinterest rmp-social-icon"<?php echo $social_icon_style; ?>></a>
        <?php endif; ?>

        <?php if ( array_key_exists( 'twitter', $social_links ) ): ?>
          <a target="_blank" href="<?php echo esc_url( $social_links['twitter'] ); ?>" class="fa fa-twitter rmp-social-icon"<?php echo $social_icon_style; ?>></a>
        <?php endif; ?>

        <?php if ( array_key_exists( 'reddit', $social_links ) ): ?>
          <a target="_blank" href="<?php echo esc_url( $social_links['reddit'] ); ?>" class="fa fa-reddit rmp-social-icon"<?php echo $social_icon_style; ?>></a>
        <?php endif; ?>

        <?php if ( array_key_exists( 'linkedin', $social_links ) ): ?>
          <a target="_blank" href="<?php echo esc_url( $social_links['linkedin'] ); ?>" class="fa fa-linkedin rmp-social-icon"<?php echo $social_icon_style; ?>></a>
        <?php endif; ?>

      <?php endif; ?>

      <?php do_action( 'rmp_after_social_icons' ); ?>

    </div> <!--  .social-icons-->

      <?php do_action( 'rmp_after_social_widget' ); ?>

    </div> <!--  .rmp-social-view-->
  <?php endif; ?>

  <?php if ( $rmp_options['feedback'] === 2 ): ?>
  <!-- Feedback widget -->
    <div class="rmp-feedback-view">
      <?php if ( $rmp_options['noHeadings'] !== 2 ): ?>
        <h2 class="rmp-main-title" style="<?php echo $custom_font_sizes['titleFontSize'] . $custom_margins['titleMarginBottom']; ?>">
          <?php echo $rmp_custom_strings['feedbackTitle']; ?>
        </h2>
      <?php else: ?>
        <p class="rmp-main-title" style="<?php echo $custom_font_sizes['titleFontSize'] . $custom_margins['titleMarginBottom']; ?>">
          <?php echo $rmp_custom_strings['feedbackTitle']; ?>
        </p>
      <?php endif; ?>

      <p class="rmp-main-subtitle" style="<?php echo $custom_font_sizes['subtitleFontSize'] . $custom_margins['subtitleMarginBottom']; ?>">
        <?php echo $rmp_custom_strings['feedbackSubtitle']; ?>
      </p>

      <?php do_action( 'rmp_before_feedback_form' ); ?>

      <div class="form-group feedback-subview">

        <label for="feedback-text" style="<?php echo $custom_font_sizes['textFontSize']; ?>">
          <?php echo $rmp_custom_strings['feedbackText']; ?>
        </label>

        <textarea class="form-control rmp-text-area" rows="5" id="feedback-text"></textarea>

        <div class="rmp-feedback-button-div">
          <button type="button" class="btn btn-primary" id="feedback-button"><?php echo $rmp_custom_strings['feedbackButton']; ?></button>
        </div>

        <p id="feedback-alert" style="<?php echo $custom_font_sizes['textFontSize']; ?>"></p>

      </div>

      <div class="feedback-sent">
        <p style="<?php echo $custom_font_sizes['textFontSize']; ?>"><?php echo $rmp_custom_strings['feedbackNotice']; ?></p>
      </div>

      <?php do_action( 'rmp_after_feedback_form' ); ?>

    </div>
  <?php endif; ?>
  <?php do_action( 'rmp_after_all_widgets' ); ?>
</div>
