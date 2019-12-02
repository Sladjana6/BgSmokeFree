<?php

/**
 * The public-specific functionality of the plugin.
 *
 * @link       http://wordpress.org/plugins/rate-my-post/
 * @since      2.0.0
 *
 * @package    Rate_My_Post
 * @subpackage Rate_My_Post/public
 */
// require helper functions to avoid messy code
require_once plugin_dir_path( __FILE__ ) . 'inc/class-rate-my-post-public-helper.php';

// The public functionality of the plugin
class Rate_My_Post_Public {

	// Rate My Post - string
	private $rate_my_post;

	//Plugin current version - string
	private $version;

	// Initialize
	public function __construct( $rate_my_post, $version ) {
		$this->rate_my_post = $rate_my_post;
		$this->version = $version;
	}

	//---------------------------------------------------
	// REGISTER AND ENQUEUE PUBLIC CSS
	//---------------------------------------------------

	public function enqueue_styles() {
		//register style
		wp_register_style( $this->rate_my_post, plugin_dir_url( __FILE__ ) . 'css/rate-my-post-public.css', array(), $this->version, 'all' );
		//register font awesome
		wp_register_style( 'rmp-font-awesome', plugin_dir_url( __FILE__ ) . 'lib/font-awesome.min.css', array(), $this->version, 'all' );
		//enqueue styles
		//include rmp in every post is on
		$rmp_options = get_option( 'rmp_options' );
    if( $rmp_options['posts'] === 2 && is_singular('post') ) {
      wp_enqueue_style( $this->rate_my_post );
			wp_add_inline_style( $this->rate_my_post, Rate_My_Post_Public_Helper::internal_css() );
			//load fontawesome if not disabled
			if( $rmp_options['noFontawesome'] !== 2 ) {
				wp_enqueue_style( 'rmp-font-awesome' );
			}
    }
		//include rmp in custom post types is on
		if( !empty( $rmp_options['cptRating'] ) && is_singular( $rmp_options['cptRating'] ) ) {
      wp_enqueue_style( $this->rate_my_post );
			wp_add_inline_style( $this->rate_my_post, Rate_My_Post_Public_Helper::internal_css() );
			//load fontawesome if not disabled
			if( $rmp_options['noFontawesome'] !== 2 ) {
				wp_enqueue_style( 'rmp-font-awesome' );
			}
    }
    //include rmp in every page is on
    if( $rmp_options['pages'] === 2 && is_page() ) {
      wp_enqueue_style( $this->rate_my_post );
			wp_add_inline_style( $this->rate_my_post, Rate_My_Post_Public_Helper::internal_css() );
			//load fontawesome if not disabled
			if( $rmp_options['noFontawesome'] !== 2 ) {
				wp_enqueue_style( 'rmp-font-awesome' );
			}
    }

		//include rmp on archive pages is on
		if( $rmp_options['archivePages'] === 2 && is_archive() ) {
      wp_enqueue_style( $this->rate_my_post );
			wp_add_inline_style( $this->rate_my_post, Rate_My_Post_Public_Helper::internal_css() );
			//load fontawesome if not disabled
			if( $rmp_options['noFontawesome'] !== 2 ) {
				wp_enqueue_style( 'rmp-font-awesome' );
			}
    }

	}

	//---------------------------------------------------
	// REGISTER AND ENQUEUE PUBLIC JS
	//---------------------------------------------------

	public function enqueue_scripts() {
		//get plugin options
    $rmp_options = get_option( 'rmp_options' );
		$rmp_security = get_option( 'rmp_security' );
		$rmp_custom_strings = Rate_My_Post_Public_Helper::custom_strings();

		//register scripts
		wp_register_script( $this->rate_my_post, plugin_dir_url( __FILE__ ) . 'js/rate-my-post-public.js', array( 'jquery' ), $this->version, true );
		wp_register_script( 'rmp-cookie-js', plugin_dir_url( __FILE__ ) . 'lib/js.cookie.js', array( 'jquery' ), $this->version, true );
		wp_register_script( 'rmp-modernizr-js', plugin_dir_url( __FILE__ ) . 'lib/modernizr-custom.min.js', array( 'jquery' ), $this->version, true );
		wp_register_script( 'rmp-recaptcha', 'https://www.google.com/recaptcha/api.js?render=' . $rmp_security['siteKey'], array(), null, false );

    //localize script
    wp_localize_script(
      $this->rate_my_post,
      'rmp_frontend',
       array(
         'admin_ajax'      => admin_url( 'admin-ajax.php' ),
         'postID'          => get_the_id(),
         'noVotes'         => $rmp_custom_strings['noRating'],
         'cookie'          => $rmp_custom_strings['cookieNotice'],
         'afterVote'       => $rmp_custom_strings['afterVote'],
         'social'          => $rmp_options['social'],
         'feedback'        => $rmp_options['feedback'],
         'cookieDisable'   => $rmp_options['cookieDisable'],
         'emptyFeedback'   => $rmp_custom_strings['feedbackAlert'],
				 'ratingWidgetResult' => $rmp_options['ratingWidgetResult'],
				 'positiveNegative' => intval( $rmp_options['positiveNegative'] ),
				 'recalculate' => intval( $rmp_options['recalculate'] ),
				 'halfStars' => intval( $rmp_options['halfStars'] ),
				 'hoverTexts' => intval( $rmp_options['hoverTexts'] ),
				 'analytics' => intval( $rmp_options['analytics'] ),
				 'limitedNegCount' => intval( $rmp_options['limitedNegCount'] ),
				 'preventAccidental' => intval( $rmp_options['preventAccidental'] ),
				 'grecaptcha' => Rate_My_Post_Public_Helper::do_recaptcha(),
				 'siteKey'					 => $rmp_security['siteKey'],
				 'votingPriv'					 => $rmp_security['votingPriv'],
				 'loggedIn'					 => is_user_logged_in(),
            )
      );
			//enqueue scripts
			//include rmp in every post is on
      if( $rmp_options['posts'] === 2 && is_singular('post') ) {
        wp_enqueue_script( $this->rate_my_post );
        wp_enqueue_script( 'rmp-cookie-js' );
				if ( $rmp_options['loadModernizr'] === 2 ) {
					wp_enqueue_script( 'rmp-modernizr-js' );
				}
				if ( Rate_My_Post_Public_Helper::do_recaptcha() === 2 ) {
					wp_enqueue_script( 'rmp-recaptcha' );
				}
      }
			//include rmp in custom post types is on
      if( !empty( $rmp_options['cptRating'] ) && is_singular( $rmp_options['cptRating'] ) ) {
        wp_enqueue_script( $this->rate_my_post );
        wp_enqueue_script( 'rmp-cookie-js' );
				if ( $rmp_options['loadModernizr'] === 2 ) {
					wp_enqueue_script( 'rmp-modernizr-js' );
				}
				if ( Rate_My_Post_Public_Helper::do_recaptcha() === 2 ) {
					wp_enqueue_script( 'rmp-recaptcha' );
				}
      }
      //include rmp in every page is on
      if( $rmp_options['pages'] === 2 && is_page() ) {
        wp_enqueue_script( $this->rate_my_post );
        wp_enqueue_script( 'rmp-cookie-js' );
				if ( $rmp_options['loadModernizr'] === 2 ) {
					wp_enqueue_script( 'rmp-modernizr-js' );
				}
				if ( Rate_My_Post_Public_Helper::do_recaptcha() === 2 ) {
					wp_enqueue_script( 'rmp-recaptcha' );
				}
      }

	}

	//---------------------------------------------------
	// PRINT JS IN HEAD - DISABLE FONTAWESOME AUTOREPLACE SVG
	//---------------------------------------------------

	//if the icons get replaced by svgs, css and js doesn't work well
	public function disable_fontawesome_translate() {
		echo '
			<script type="text/javascript">
				//Rate my Post compatibility with autoreplace SVG from FontAwesome
				window.FontAwesomeConfig = { autoReplaceSvg: false };
			</script>
		';
	}

	//---------------------------------------------------
	// SHORTCODES
	//---------------------------------------------------

	//register shortcodes
	public function register_shortcodes() {
		//rating widget
		add_shortcode( 'ratemypost', array( $this, 'rating_widget_shortcode' ) );
		//result widget
		add_shortcode( 'ratemypost-result', array( $this, 'result_widget_shortcode' ) );
	}

	//rating widget output
	public function rating_widget_shortcode(){
	  //scripts and styles
	  wp_enqueue_style( $this->rate_my_post );
	  wp_enqueue_script( $this->rate_my_post );
	  wp_enqueue_script( 'rmp-cookie-js' );
		wp_add_inline_style( $this->rate_my_post, Rate_My_Post_Public_Helper::internal_css() );
		//font awesome if required
		$rmp_options = get_option( 'rmp_options' );
		if( $rmp_options['noFontawesome'] !== 2 ) {
			wp_enqueue_style( 'rmp-font-awesome' );
		}
		//modernizr if enabled
		if ( $rmp_options['loadModernizr'] === 2 ) {
			wp_enqueue_script( 'rmp-modernizr-js' );
		}
		//recaptcha if enabled
		if ( Rate_My_Post_Public_Helper::do_recaptcha() === 2 ) {
			wp_enqueue_script( 'rmp-recaptcha' );
		}
	  //output
		return $this->shortcode_get_the_rating_widget();
	}

	//result widget output
	public function result_widget_shortcode() {
		return $this->shortcode_get_the_results_widget();
	}

	//---------------------------------------------------
	// ADD RATING WIDGET TO EVERY POST OR PAGE + CUSTOM POST TYPES SINCE 2.2.0
	//---------------------------------------------------

	public function rating_widget_every_post_page( $content ) {
	  $rmp_options = get_option( 'rmp_options' );
		//if we pass an empty array all posts of certain type will be excluded - there must some better way of doing this?
		if ( empty( $rmp_options['exclude'] ) ) {
			$rmp_options['exclude'] = 'rmp-dummy-post';
		}
    //add to every post but not to excluded ones
    if ( $rmp_options['posts'] === 2 && is_singular('post') && !is_single( $rmp_options['exclude'] ) ) {
      $content .= $this->get_the_rating_widget();
      return $content;
    } elseif ( $rmp_options['pages'] === 2 && is_page() && !is_page( $rmp_options['exclude'] ) ) { //add to every page but not to excluded ones
      $content .= $this->get_the_rating_widget();
      return $content;
    } elseif ( !empty( $rmp_options['cptRating'] ) && is_singular( $rmp_options['cptRating'] ) && !is_single( $rmp_options['exclude'] ) ) { //custom post types except excluded ones
      $content .= $this->get_the_rating_widget();
      return $content;
		} else { //just return the content
      return $content;
    }
	}

	//---------------------------------------------------
	// ADD RESULT WIDGET TO EVERY POST OR PAGE
	//---------------------------------------------------

	public function result_widget_every_post_page( $content ) {
	  $rmp_options = get_option( 'rmp_options' );
		//if we pass an empty array all posts of certain type will be excluded - there must some better way of doing this?
		if ( empty( $rmp_options['exclude'] ) ) {
			$rmp_options['exclude'] = 'rmp-dummy-post';
		}
	  //add to every post but not to excluded ones
    if ( $rmp_options['resultPost'] === 2 && is_singular('post') && !is_single( $rmp_options['exclude'] ) ) {
			$rmp_result_content = $this->get_the_results_widget();
      $fullContent = $rmp_result_content . $content;
      return $fullContent;
    } elseif ( $rmp_options['resultPages'] === 2 && is_page() && !is_page( $rmp_options['exclude'] ) ) { //add to every page but not to excluded ones
			$rmp_result_content = $this->get_the_results_widget();
      $fullContent = $rmp_result_content . $content;
      return $fullContent;
    } elseif ( !empty( $rmp_options['cptResult'] ) && is_singular( $rmp_options['cptResult'] ) && !is_single( $rmp_options['exclude'] ) ) { //custom post types except the excluded ones
			$rmp_result_content = $this->get_the_results_widget();
      $fullContent = $rmp_result_content . $content;
      return $fullContent;
		} else { //just return the content
      return $content;
    }
	}

	//---------------------------------------------------
	// LOAD RESULTS - FRONTEND AJAX
	//---------------------------------------------------

	public function load_results() {
		if ( wp_doing_ajax() ) {
			//array where we store all data for frontend
			$returnData = array(
				'voteCount' => false,
				'avgRating' => false,
				'errorMsg' 	=> false,
			);
			//get id of the actual post
	    $postID = intval( $_POST['postID'] );
			$votes = intval( get_post_meta( $postID, 'rmp_vote_count', true ) );
			$ratingSum = intval( get_post_meta( $postID, 'rmp_rating_val_sum', true ) );
			//if votes, calculate average rating
			if ($votes && $ratingSum) {
				$avgRating = round( ($ratingSum / $votes), 1 );
				//echo number of votes and average rating
				$returnData['voteCount'] = $votes;
				$returnData['avgRating'] = $avgRating;
				echo json_encode($returnData);
			} else {
				//no votes
				$returnData['voteCount'] = 0;
				$returnData['avgRating'] = 0;
				echo json_encode($returnData);
			}
		};
		die();
	}

	//---------------------------------------------------
	// PROCESS POST RATING - FRONTEND AJAX
	//---------------------------------------------------

	public function process_rating() {
		if ( wp_doing_ajax() ) {
			//array where we store all data for frontend
			$returnData = array(
				'voteCount' => false,
				'avgRating' => false,
				'errorMsg' 	=> false,
			);
			//check for grecaptha
			if ( Rate_My_Post_Public_Helper::do_recaptcha() === 2 ) {
				if( isset( $_POST['token'] ) ) {
					$score = $this->get_recaptcha_score( $_POST['token'] );
					if ( $score === 'checkKeys' ) { //keys don't match
						$returnData['errorMsg'] = esc_html__( 'Wrong reCAPTCHA keys', 'rate-my-post' );
						echo json_encode($returnData);
						//echo 'Wrong recaptcha key!'; //just for debugging purposes
						die();
					}
					if ( $score < 0.5 ) { //unnatural interaction detected
						$returnData['errorMsg'] = esc_html__( 'Blocked by reCAPTCHA', 'rate-my-post' );
						echo json_encode($returnData);
						//echo 'Low score!'; //just for debugging purposes
						die();
					}
				} else {
					die();
				}
			}
			//check if only logged in users can vote
			$rmp_security = get_option( 'rmp_security' );
			if ( $rmp_security['votingPriv'] == 2 && !is_user_logged_in() ) { //user not logged in but muste be to vote
				$returnData['errorMsg'] = esc_html__( 'You need to be logged in to vote', 'rate-my-post' );
				echo json_encode($returnData);
				//echo 'Not logged in!'; //just for debugging purposes
				die();
			}

			//get id of the actual post
	    $postID = intval( $_POST['postID'] );
	    //get plugin options
	    $rmp_options = get_option( 'rmp_options' );

			//ip double votes check
			if ( $rmp_security['ipDoubleVote'] == 2 && $this->is_ip_double_vote( $postID ) ) { //add condition for option
				$customStrings = Rate_My_Post_Public_Helper::custom_strings();
				$doubleVoteText = $customStrings['cookieNotice'];
				$returnData['errorMsg'] = $doubleVoteText;
				echo json_encode($returnData);

				die();
			}

			//post rating
			$rating = intval( $_POST['star_rating'] );
			//session duration before rating
			$duration = intval( $_POST['duration'] );
			if ( ! $rating ) {
				//do nothing
			} else {
				//insert vote count to the database as post meta
				$newVoteCount = $this->save_vote_count( $postID );
				//insert rating sum to the database as post meta
				$newRating = $this->save_rating( $postID, $rating );

				//send email if enabled
				if ( $rmp_options['rate_email'] == 2 ) {
					$this->send_email( $postID, $rating );
				}
				//recalculate rating and echo it
				if ( $newVoteCount && $newRating ) { //this post has already been rated before
					$avgRating = round( ( $newRating / $newVoteCount ), 1 );
					//save details to db for analytics section
					$analytics = $this->save_for_analytics( $postID, 1, $duration, $avgRating, $newVoteCount, $rating );
					//echo number of votes and average rating
					$returnData['voteCount'] = $newVoteCount;
					$returnData['avgRating'] = $avgRating;
					echo json_encode($returnData);
				} else { //this post is rated for the first time, just return 1 and actual rating
					$analytics = $this->save_for_analytics( $postID, 1, $duration, $rating, 1, $rating );
					$returnData['voteCount'] = 1;
					$returnData['avgRating'] = $rating;
					echo json_encode($returnData);
				}
			} //end of rating submited
		};
		die();
	}

	//---------------------------------------------------
	// AMP PROCESS POST RATING
	//---------------------------------------------------

	public function process_rating_amp() {
		$domain_url = ( isset( $_SERVER['HTTPS'] ) ? "https":"http" ) . "://$_SERVER[HTTP_HOST]";
    header("Content-type: application/json");
    header("Access-Control-Allow-Credentials: true");
    header("Access-Control-Allow-Origin: *.ampproject.org");
    header("AMP-Access-Control-Allow-Source-Origin: " . $domain_url );
		if ( wp_doing_ajax() ) {
			//check if only logged in users can vote
			$rmp_security = get_option( 'rmp_security' );

			if ( $rmp_security['votingPriv'] == 2 && !is_user_logged_in() ) { //user not logged in but muste be to vote
				die();
			}

			$rmp_options = get_option( 'rmp_options' );
			if ( $rmp_options['ampCompatibility'] == 2 ) {
				//get id of the actual post
		    $postID = intval( $_POST['postID'] );
				//post rating
				$rating = intval( $_POST['star_rating'] );

				$customStrings = Rate_My_Post_Public_Helper::custom_strings();
				$doubleVoteText = $customStrings['cookieNotice'];
				$afterVote = $customStrings['afterVote'];

				//ip double votes check
				if ( $rmp_security['ipDoubleVote'] == 2 && $this->is_ip_double_vote( $postID ) ) { //add condition for option
					//current votes
					$votes = intval( get_post_meta( $postID, 'rmp_vote_count', true ) );
					//current rating
					$ratingSum = intval( get_post_meta( $postID, 'rmp_rating_val_sum', true ) );
					if ($votes && $ratingSum) {
						$avgRating = round( ($ratingSum / $votes), 1 );
					} else {
						//no votes
						$avgRating = 0;
					}
					//output
					$postInfo = array( 'rating' =>  $avgRating, 'votes' =>  $votes, 'msg' =>  $doubleVoteText );
					echo json_encode( $postInfo );
					die();
				}

				if ( ! $rating ) {
					//do nothing
				} else {
					//insert vote count to the database as post meta
					$newVoteCount = $this->save_vote_count( $postID );
					//insert rating sum to the database as post meta
					$newRating = $this->save_rating( $postID, $rating );
					//send email if enabled
					if ( $rmp_options['rate_email'] == 2 ) {
						$this->send_email( $postID, $rating );
					}
					//recalculate rating and echo it
					if ( $newVoteCount && $newRating ) { //this post has already been rated before
						$avgRating = round( ( $newRating / $newVoteCount ), 1 );
						//save details to db for analytics section
						$analytics = $this->save_for_analytics( $postID, 1, -1, $avgRating, $newVoteCount, $rating );

						$postInfo = array( 'votes' =>  $newVoteCount, 'rating' => $avgRating, 'msg' =>  $afterVote );
						echo json_encode( $postInfo );
						//echo number of votes and average rating
						//echo $newVoteCount . '||' . $avgRating;
					} else { //this post is rated for the first time just return 1 as vote count and actual rating
							$analytics = $this->save_for_analytics( $postID, 1, -1, $rating, 1, $rating );
						 	$postInfo = array( 'votes' =>  1, 'rating' => $rating, 'msg' =>  $afterVote );
	 						echo json_encode( $postInfo );
				 	}
				} //end of rating submited
			}
		}
		die();
	}

	//---------------------------------------------------
	// PROCESS FEEDBACK - FRONTEND AJAX
	//---------------------------------------------------

	public function process_feedback() {
		if ( wp_doing_ajax() ) {
			//recaptcha check
			if ( Rate_My_Post_Public_Helper::do_recaptcha() === 2 ) {
				if( isset( $_POST['token'] ) ) {
					if ( $this->get_recaptcha_score( $_POST['token'] ) < 0.5 ) {
						//unnatural interaction detected
						die();
					}
				} else {
					die();
				}
			}

			//check if only logged in users can vote
			$rmp_security = get_option( 'rmp_security' );

			if ( $rmp_security['votingPriv'] == 2 && !is_user_logged_in() ) { //user not logged in but muste be to vote
				die();
			}
			//get plugin options
	    $rmp_options = get_option( 'rmp_options' );
			//check that the feedback widget is actually enabled
			if( $rmp_options['feedback'] === 2 ) {
				//get id of the actual post
		    $postID = intval( $_POST['postID'] );
				//sanitize feedback for security
				$feedback = sanitize_text_field( $_POST['feedback'] );
				$time = date( "d-m-Y H:i:s" );
				$user = false;

				if ( $rmp_security['userTracking'] == 2 ) {
					$user = intval( get_current_user_id() );
				}

				//check that feedback is not empty
				if ( str_replace(' ', '', $feedback) ) { //if feedback is empty don't insert
					//fedback array
					$feedbackArray = array(
						'feedback' => $feedback,
						'time'     => $time,
						'id'       => uniqid(),
						'user'     => $user,
					);

					//insert feedback to database
					if ( ! add_post_meta( $postID, 'rmp_feedback_val_new', array( $feedbackArray ), true ) ) {
						//get the current feedback array
						$currentFeedback = get_post_meta( $postID, 'rmp_feedback_val_new', true );

						if ( is_array( $currentFeedback ) ) { //feedback must be an array
							$currentFeedback[] = $feedbackArray;
							update_post_meta( $postID, 'rmp_feedback_val_new', $currentFeedback );
						}
					} //end of add_post_meta
					//send email on feedback if enabled
					if( $rmp_options['feedback_email'] == 2 ) {
						$to = get_bloginfo( 'admin_email' );
						$subject = '[RMP]Somebody left feedback on ' . get_the_title( $postID );
						$message = 'Feedback on ' . get_the_title( $postID ) . ': ' . $feedback;
						wp_mail( $to, $subject, $message);
					}
				}
			}
		};
		die();
	}

	//---------------------------------------------------
	// RATINGS ON ARCHIVE PAGES
	//---------------------------------------------------

	public function ratings_archive_pages( $title ) {
		$rmp_options = get_option( 'rmp_options' );
		if ( $rmp_options['archivePages'] === 2 && is_archive() && in_the_loop() ) { //archive is being displayed and ratings on category pages are enabled
			//required data
			$postID = get_the_id();
			$votesNumber = get_post_meta( get_the_id(), 'rmp_vote_count', true );
			$averageRating = Rate_My_Post_Public_Helper::average_rating();
			$iconType = Rate_My_Post_Public_Helper::icon_type();
			//check if rated
			if ( $votesNumber && $averageRating ) {
				$highlightedIcons = floor($averageRating);
				$halfHighlightedIcons = 0;
				$notHighlightedIcons = 0;

				//do some math as comparing floats is a hassle
				$decimals = intval( ( $averageRating * 10 ) - ( $highlightedIcons * 10 ) );

				//figure out if half stars are required
				if ( $decimals > 7 ) {
					$highlightedIcons = $highlightedIcons + 1;
				} elseif ( $decimals <= 7 && $decimals >= 3 ) {
					$halfHighlightedIcons = 1;
				};

				//calculate how many normal stars do we need
				$notHighlightedIcons = 5 - $highlightedIcons - $halfHighlightedIcons;

				$iconsContent = str_repeat( '<i class="star-highlight ' . $iconType . '"></i>', $highlightedIcons ) . str_repeat( '<i class="star-half-highlight ' . $iconType . '"></i>', $halfHighlightedIcons ) . str_repeat( '<i class="' . $iconType . '"></i>', $notHighlightedIcons );
				$iconsContent = $iconsContent . ' <span>' . $averageRating . ' (' . $votesNumber . ')</span>';
				$output = '<span class="rmp-archive-results">'. $iconsContent . '</span>';
				//add filter
				if( has_filter('rmp_archive_results') ) {
	        $output = apply_filters( 'rmp_archive_results', $output );
	      }
			} else {
				$output = false;
			}

			if( $output ) { //post has been already rated
				return $title . $output;
			} else { //not ratings just yet
				return $title;
			}
		} else { //not archive return the title
			return $title;
		}

	}

	//---------------------------------------------------
	// METHODS FOR PROCESSING NEW VOTES
	//---------------------------------------------------

	//saves vote count to post meta
	private function save_vote_count( $postID ) {
		if ( ! add_post_meta( $postID, 'rmp_vote_count', 1, true ) ) {
			$currentVoteCount = intval( get_post_meta( $postID, 'rmp_vote_count', true ) );
			$newVoteCount = intval( $currentVoteCount + 1 );
			update_post_meta( $postID, 'rmp_vote_count', $newVoteCount );
			return $newVoteCount;
		} else {
			return false;
		}
	}

	//saves rating to post meta
	private function save_rating( $postID, $rating ) {
		if ( ! add_post_meta( $postID, 'rmp_rating_val_sum', $rating, true ) ) {
			$currentRating = intval( get_post_meta( $postID, 'rmp_rating_val_sum', true ) );
			$newRating = intval( $currentRating + $rating );
			update_post_meta( $postID, 'rmp_rating_val_sum', $newRating );
			return $newRating;
		} else {
			return false;
		}
	}

	//sends email on post rate
	private function send_email( $postID, $rating ) {
		$to = get_bloginfo( 'admin_email' );
		$subject = '[RMP]Somebody rated ' . get_the_title( $postID );
		$message = get_the_title( $postID ) . ' was rated ' . $rating . ' and now has an average rating of ' . round( (get_post_meta( $postID, 'rmp_rating_val_sum', true ) / get_post_meta( $postID, 'rmp_vote_count', true ) ), 1 ) . ' based on ' . get_post_meta( $postID, 'rmp_vote_count', true ) . ' vote(s). See the post: ' . get_the_permalink( $postID );
		wp_mail( $to, $subject, $message );
	}

	//---------------------------------------------------
	// METHODS FOR RETRIEVEING TEMPLATES
	//---------------------------------------------------

	//retrieves the rating widget template
	private function get_the_rating_widget() {
		if ( $this->is_amp_page() && $this->is_amp_enabled() ) { //amp detected and amp page served
			ob_start();
			include plugin_dir_path( __FILE__ ) . 'partials/rmp-star-rating-widget-amp.php';
			return ob_get_clean();
		} elseif( !$this->is_amp_page() ) { //for non-amp pages
			ob_start();
			include plugin_dir_path( __FILE__ ) . 'partials/rmp-star-rating-widget.php';
			return ob_get_clean();
		}
	}

	//retrieves the results widget template
	private function get_the_results_widget() { //amp detected and amp page served
		if ( $this->is_amp_page() && $this->is_amp_enabled() ) {
			ob_start();
			include plugin_dir_path( __FILE__ ) . 'partials/rmp-result-widget-amp.php';
			return ob_get_clean();
		} elseif( !$this->is_amp_page() ) { //for non-amp pages
			ob_start();
			include plugin_dir_path( __FILE__ ) . 'partials/rmp-result-widget.php';
			return ob_get_clean();
		}
	}

	//retrieves the rating widget template for shortcode
	private function shortcode_get_the_rating_widget() {
		if ( $this->is_amp_page() && $this->is_amp_enabled() ) { //amp detected and amp page served
			ob_start();
			include_once plugin_dir_path( __FILE__ ) . 'partials/rmp-star-rating-widget-amp.php';
			return ob_get_clean();
		} elseif( !$this->is_amp_page() ) { //for non-amp pages
			ob_start();
			include_once plugin_dir_path( __FILE__ ) . 'partials/rmp-star-rating-widget.php';
			return ob_get_clean();
		}
	}

	//retrieves the result widget template for shortcode
	private function shortcode_get_the_results_widget() {
		if ( $this->is_amp_page() && $this->is_amp_enabled() ) { //amp detected and amp page served
			ob_start();
			include_once plugin_dir_path( __FILE__ ) . 'partials/rmp-result-widget-amp.php';
			return ob_get_clean();
		} elseif( !$this->is_amp_page() ) { //for non-amp pages
			ob_start();
			include_once plugin_dir_path( __FILE__ ) . 'partials/rmp-result-widget.php';
			return ob_get_clean();
		}
	}

	//---------------------------------------------------
	// OTHER METHODS
	//---------------------------------------------------

	//retrieve recaptcha score
	private function get_recaptcha_score( $token ) {
		$response = $token;
		$rmp_security = get_option( 'rmp_security' );
		$secret = $rmp_security['secretKey'];
		$recaptchaUrl = 'https://www.google.com/recaptcha/api/siteverify';
		//final url
		$url = $recaptchaUrl . '?secret=' . $secret . '&response=' . $response;
		//get the response
		$request = wp_remote_post( $url );
		$recaptcha = wp_remote_retrieve_body( $request );
		$recaptcha = json_decode( $recaptcha );
		//return recaptcha score - 1.0 is very likely a good interaction, 0.0 is very likely a bot
		if ( property_exists( $recaptcha, 'score' ) ) {
			//error_log($recaptcha->score, 0);
			return $recaptcha->score;
		} else {
			//key is probably incorrect
			return 'checkKeys';
		}
	}

	//save for analytics section
	private function save_for_analytics( $postID, $action, $duration = 0, $avgRating, $votes, $rating ) {

		//get security options
		$rmp_security = get_option( 'rmp_security' );
		//declare variables
		$ip = -1;
		$user = -1;
		//get user
		if ( $rmp_security['userTracking'] == 2 ) {
			$user = intval( get_current_user_id() );
		}
		//get ip
		if ( $rmp_security['ipTracking'] == 2 ) {
			$ip = sanitize_text_field( $this->get_user_ip() );
		}
		//if there is no ip insert 0
		if( !$ip ) {
			$ip = '0';
		}
		//get country - to be finished
		$country = 0;

		//insert data in database
		global $wpdb;
		//table name
		$table_name = $wpdb->prefix . 'rmp_analytics';
		//insert into the table
		$wpdb->insert(
			$table_name,
			array(
				'time' => current_time('mysql', false),
				'ip' => $ip,
				'country' => $country,
				'user' => $user,
				'post' => $postID,
				'action' => $action,
				'duration' => $duration,
				'average' => $avgRating,
				'votes' => $votes,
				'value' => $rating
			),
			array(
				'%s',
				'%s',
				'%s',
				'%d',
				'%d',
				'%d',
				'%d',
				'%f',
				'%d',
				'%d',
			)
		);

		return $wpdb->insert_id;
	}

	//get ip address of voter
	private function get_user_ip() {
		$ip = false;
		if( array_key_exists( 'HTTP_X_FORWARDED_FOR', $_SERVER ) && !empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
        if ( strpos( $_SERVER['HTTP_X_FORWARDED_FOR'], ',' ) > 0 ) {
            $addr = explode( ',',$_SERVER['HTTP_X_FORWARDED_FOR'] );
            $ip = trim( $addr[0] );
        } else {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
    }
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }

		return filter_var( $ip, FILTER_VALIDATE_IP );
	}

	//ip check for double votes
	private function is_ip_double_vote( $postID ) {
		//get the voter ip address
		$voterIP = $this->get_user_ip();
		//check for post and ip match
		global $wpdb;
		$analyticsTable = $wpdb->prefix . "rmp_analytics";
		$match = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $analyticsTable WHERE post = %d AND ip = %s", array( $postID, $voterIP) ) );

		//filter allows us to disable ip check for certain conditions (admin, editor and such)
		if( has_filter('rmp_double_vote') ) {
			$match = apply_filters( 'rmp_double_vote', $match, $postID );
		}
		//disable for admins
		$isAdmin = current_user_can( 'manage_options' );
		//filter for admins
		if( has_filter('rmp_admin_double_vote') ) {
			$isAdmin = apply_filters( 'rmp_admin_double_vote', $isAdmin );
		}
		if ( count( $match ) && !$isAdmin ) { //this is a double vote
			return true;
		}

		return false;

	}

	//check if on amp page
	private function is_amp_page() {
    if ( function_exists( 'ampforwp_is_amp_endpoint' ) && ampforwp_is_amp_endpoint() ) {
      return true;
    }
    if ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() ) {
      return true;
    }
    return false;
  }

	//check if amp compatibility mode is enabled
	private function is_amp_enabled() {
		$rmp_options = get_option( 'rmp_options' );
    if ( $rmp_options['ampCompatibility'] == 2 ) {
      return true;
    }

    return false;
	}


} //end of class
