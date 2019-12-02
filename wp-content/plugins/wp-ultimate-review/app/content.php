<?php
namespace WurReview\App;
if ( ! defined( 'ABSPATH' ) ) die( 'Forbidden' );
/**
 * Class Name : Content Meta Box - Custom Post Type
 * Class Type : Normal class
 * Class Description: show meta box data in front page - Post, Page, Product
 *
 * initiate all necessary classes, hooks, configs
 *
 * @since 1.0.0
 * @access Public
 */
Class Content{

    private $getPostType;
    private $getPostId;
    private $post_type;
    /**
     * Construct the content meta box object
     * @since 1.0.0
     * @access public
     */
    public function __construct(array $controls, $post_type){
        
        // Declear public controls 
		$this->controls = $controls;

		// Declear public post type 
        $this->post_type = $post_type;
        
		
        // Load script and Css file for content page
        add_action( 'wp_enqueue_scripts', [$this, 'wur_content_script_loader' ] );
		
        // add review form and list in the content
        add_filter( 'the_content', [ $this, 'wur_meta_box_content_view' ] );
        
        // Save meta review data for public
        add_action( 'init', [ $this, 'wur_meta_box_content_save' ] );
		
		// add shortcode options
		add_shortcode( 'wp-reviews', [ $this, 'wur_review_kit_shortcode' ] );

		// add shortcode for rating
		add_shortcode( 'wp-reviews-rating', [ $this, 'wur_review_kit_shortcode_rating' ] );
    }

	
    /**
     * Review wur_meta_box_content_view.
     * Method Description: Review form show in content
     * @since 1.0.0
     * @access public
     */
    public function wur_meta_box_content_view( $content ){
        if( is_admin() ){
            return '';
        }
        if( is_front_page() || is_home() || !is_single()){
            return $content;
        }
        global $post;
        
		// output for display settings. Get from options
        $this->getPostType = $post->post_type;
        $this->getPostId = $post->ID;
       // get display settings data
        $return_data_display_setting = get_option('xs_review_display');
       
        // get global settings data
        $return_data_global_setting = get_option('xs_review_global');
		
		// get overview data
        $metaDataOverviewJson = get_post_meta( $this->getPostId, 'xs_review_overview_settings', false );
		if( is_array($metaDataOverviewJson) AND sizeof($metaDataOverviewJson) > 0) {
			$return_data_overview = json_decode( end($metaDataOverviewJson) );
		}else{
			$return_data_overview = [];
		}
		
        if( (isset($return_data_display_setting['page']['enable']) ? $return_data_display_setting['page']['enable'] : 'No') == 'Yes'):
            if( isset($return_data_display_setting['page']['data']) && in_array($this->getPostType, $return_data_display_setting['page']['data']) ):
                // show per page
                $showPostNo = isset($return_data_display_setting['review_show_per']) ? $return_data_display_setting['review_show_per'] : 10;
                // Like query data
                $likeData = '"xs_post_id":"'.$this->getPostId.'"';
                // code for view review list
				
				$paged = isset($_GET['review_page']) ? $_GET['review_page'] : 1;
                $args = array(
                    'post_type' => $this->post_type,
                    'meta_query' => array(
                        array(
                            'key' => 'xs_public_review_data',
                            'value' => ''.$likeData.'',
                            'compare' => 'LIKE'
                        )
                        ),
                        'orderby' => array(
                            'post_date' => 'DESC'
                        ),
                        'posts_per_page'         => $showPostNo,
                        'paged'         		 => $paged,
                );
				// query review list data
                $the_query = new \WP_Query( $args );
 
				// total review count
				
				$argsTotal = array(
                    'post_type' => $this->post_type,
                    'meta_query' => array(
                        array(
                            'key' => 'xs_public_review_data',
                            'value' => ''.$likeData.'',
                            'compare' => 'LIKE'
                        )
                        ),
                        'orderby' => array(
                            'post_date' => 'DESC'
                        ),
                        
                );
				$the_queryTotal = new \WP_Query( $argsTotal );
				
                // content key for submit array index
                $content_meta_key = 'xs_submit_review_data';
                
                // start object
                ob_start();
                //require page for submit review form and review list
                require_once( WUR_REVIEW_PLUGIN_PATH.'views/public/meta-box-view.php' );	
                $getContent = ob_get_contents();
                ob_end_clean();
                // end object content
				if(isset($return_data_display_setting['review_location']) && $return_data_display_setting['review_location'] == 'after_content'){
					return $content.$getContent; 
				}else if($return_data_display_setting['review_location'] == 'before_content'){
					return $getContent.$content; 
				}else{
					return $content;
				}
                
            endif;
        endif;
        return $content;
    }

    /**
     * Review wur_meta_box_content_save.
     * Method Description: Save review information in DB
     * @since 1.0.0
     * @access public
     */
    public function wur_meta_box_content_save(  ){
       
        $content_meta_key = 'xs_submit_review_data';
        if(isset($_POST['xs_review_form_public_data'])){
            session_start(); 
            // get meta content data for review
            $metaReviewData = isset($_POST[$content_meta_key]) ? $_POST[$content_meta_key] : [];
            $metaReviewData = \WurReview\App\Settings::sanitize($metaReviewData);
			
			if(is_array($metaReviewData) AND sizeof($metaReviewData) > 0):

                // post from hidden
                $post_id_hidden = isset($metaReviewData['xs_post_id']) ? $metaReviewData['xs_post_id'] : 0;
                // save session post id
                $currentHiddenPost = isset($_SESSION['xs_review_user_post']) ? $_SESSION['xs_review_user_post'] : 0;
                if( $post_id_hidden !== $currentHiddenPost ):
                    // require data
                    // get display settings data
                     $return_data_display_setting = get_option('xs_review_display');
                    foreach($this->controls AS $requireKey=>$requireValue):
                        $checkEnable = (isset($return_data_display_setting['form'][$requireKey]) && $return_data_display_setting['form'][$requireKey] == 'Yes') ? 'Yes' : 'No';
                        if($checkEnable == 'Yes'):
                            if( (isset($requireValue['require']) ? $requireValue['require'] : 'No') == 'Yes'):
                                $checkDataRequire = trim(isset($metaReviewData[$requireKey]) ? $metaReviewData[$requireKey] : '');
                                if(strlen($checkDataRequire) == 0){                                 
                                    $_SESSION['xs_review_message']  = esc_html__('Please fill up all require filed');
                                    return false;
                                }
                            endif;
                        endif;
                    endforeach;
					 // output for global settings
					$return_data_global_setting = get_option('xs_review_global');
					$metaReviewData['review_score_style'] = isset($return_data_global_setting['review_score_style']) ? $return_data_global_setting['review_score_style'] : 'star';
					$metaReviewData['review_score_limit'] = isset($return_data_global_setting['review_score_limit']) ? $return_data_global_setting['review_score_limit'] : 5;
					$metaReviewData['review_score_input'] = isset($return_data_global_setting['review_score_input']) ? $return_data_global_setting['review_score_input'] : 'star';
                    
					// create array for save post data in post table
                    $postarr = [];
                    //$postarr['post_author']     = get_current_user_id();
                    $postarr['post_content']    = isset($metaReviewData['xs_reviw_summery']) ? esc_textarea($metaReviewData['xs_reviw_summery']) : '';
                    $postarr['post_title']      = isset($metaReviewData['xs_reviw_title']) ? esc_textarea($metaReviewData['xs_reviw_title']) : '';
                    
                    // get global settings data
                   
                    if( (isset($return_data_global_setting['require_approval']) ? $return_data_global_setting['require_approval'] : 'Yes') == 'Yes' ):
                        $postarr['post_status']     = 'publish';
                    endif;
                    $postarr['post_type']       = $this->post_type;
                    // insert post and return post id
                    $getPostId = wp_insert_post($postarr, true);
                    // check post id
                    if(!empty($getPostId)){
                        // insert meta data for review
                        $metaKey = 'xs_public_review_data';
                        if(update_post_meta( $getPostId, $metaKey, json_encode($metaReviewData) ) ){
                            // set session for reviwer user
                            $_SESSION['xs_review_user_post']  = $post_id_hidden;
                            $_SESSION['xs_review_message']  = esc_html__('Successfully submitted review');

                            // email subject
                            $subject = ' Review of '.$postarr['post_title'].' ';
                            // email details
                            $mailDetails = '';
                            foreach($this->controls AS $metaKeyFiled=>$metaValueFiled):
                                if(isset($metaReviewData[$metaKeyFiled])){
                                    $inputTitle = (isset($metaValueFiled) AND is_array($metaValueFiled) AND array_key_exists('title_name', $metaValueFiled)) ? $metaValueFiled['title_name'] : '';
                                    $mailDetails .= ' '.$inputTitle.' : '.$metaReviewData[$metaKeyFiled].' /n';
                                }
                            endforeach;
                            
                            // check adminstrator email enable and send email
                            if( (isset($return_data_global_setting['send_administrator']) ? $return_data_global_setting['send_administrator'] : 'No') == 'Yes'){
                                $getAdminEmail = get_option('admin_email');
                                wp_mail(  $getAdminEmail, $subject, $mailDetails );
                            }
                            // check user email enable and send email
                            if( (isset($return_data_global_setting['send_author']) ? $return_data_global_setting['send_author'] : 'No') == 'Yes'){
                                $getUserEmail = isset($metaReviewData['xs_reviwer_email']) ? $metaReviewData['xs_reviwer_email'] : '';
                                if( strlen($getUserEmail) > 0):
                                    wp_mail(  $getUserEmail, $subject, $mailDetails );
                                endif;
                            }
                           
                            return '';
                        }
                        
                    }
 
                endif;
                $_SESSION['xs_review_message']  = esc_html__('Already submitted review');
            endif;
			
        }
		//unset($_POST['xs_review_form_public_data']);
    }
     /**
     * Review wur_content_script_loader .
     * Method Description: Content Script Loader
     * @since 1.0.0
     * @access public
     */
    public function wur_content_script_loader(){
        wp_enqueue_style( 'wur_content_css', WUR_REVIEW_PLUGIN_URL. 'assets/public/css/content-page.css' );
        wp_enqueue_script( 'wur_review_content_script', WUR_REVIEW_PLUGIN_URL. 'assets/public/script/content-page.js', array('jquery') );
		wp_enqueue_style( 'dashicons' );
	}
	/**
     * Review wur_review_kit_shortcode .
     * Method Description: shortcode for review kit
     * @since 1.0.0
     * @access public
     */
	public function wur_review_kit_shortcode(){
		global $post;
		global $wp_query;
		
		$post1 = $wp_query->post;
        // output for display settings. Get from options
        $this->getPostType = $post1->post_type;
        $this->getPostId = $post1->ID;
		// get display settings data
        $return_data_display_setting = get_option('xs_review_display');
        // get global settings data
        $return_data_global_setting = get_option('xs_review_global');
		
		if($return_data_display_setting['review_location'] != 'custom_code'){
			return '';
		}
		
		// get overview data
        $metaDataOverviewJson = get_post_meta( $this->getPostId, 'xs_review_overview_settings', false );
		if( is_array($metaDataOverviewJson) AND sizeof($metaDataOverviewJson) > 0) {
			$return_data_overview = json_decode( end($metaDataOverviewJson) );
		}else{
			$return_data_overview = [];
		}
		
		if( (isset($return_data_display_setting['page']['enable']) ? $return_data_display_setting['page']['enable'] : 'No') == 'Yes'):
			
            if(  isset($return_data_display_setting['page']['data']) && in_array($this->getPostType, $return_data_display_setting['page']['data']) ):  
				
				// show per page
				$showPostNo = isset($return_data_display_setting['review_show_per']) ? $return_data_display_setting['review_show_per'] : 10;
				// Like query data
				$likeData = '"xs_post_id":"'.$this->getPostId.'"';
				// code for view review list
				
				$paged = isset($_GET['review_page']) ? $_GET['review_page'] : 1;
                $args = array(
                    'post_type' => $this->post_type,
                    'meta_query' => array(
                        array(
                            'key' => 'xs_public_review_data',
                            'value' => ''.$likeData.'',
                            'compare' => 'LIKE'
                        )
                        ),
                        'orderby' => array(
                            'post_date' => 'DESC'
                        ),
                        'posts_per_page'         => $showPostNo,
                        'paged'         		 => $paged,
                );
			   // query review list data
				$the_query = new \WP_Query( $args );

				// content key for submit array index
				$content_meta_key = 'xs_submit_review_data';
				
				// total review count
				
				$argsTotal = array(
                    'post_type' => $this->post_type,
                    'meta_query' => array(
                        array(
                            'key' => 'xs_public_review_data',
                            'value' => ''.$likeData.'',
                            'compare' => 'LIKE'
                        )
                        ),
                        'orderby' => array(
                            'post_date' => 'DESC'
                        ),
                        
                );
				$the_queryTotal = new \WP_Query( $argsTotal );
				
				// content key for submit array index
                $content_meta_key = 'xs_submit_review_data';
                
				// start object
				ob_start();
				//require page for submit review form and review list
				require ( WUR_REVIEW_PLUGIN_PATH.'views/public/meta-box-view.php' );	
				$getContent = ob_get_contents();
				ob_end_clean();
				// end object content
				
				return $getContent;
				
			endif;
		endif;
	}
	
	/**
     * Review review_kit_shortcode_ratting .
     * Method Description: shortcode for review kit for rattings
     * @since 1.0.0
     * @access public
     */
	public function wur_review_kit_shortcode_rating(  $atts , $content = null){
		
		// create shortcode
		$atts = shortcode_atts(
					array(
							'post-id' => 0,
							'ratting-show' => 'yes',
							'ratting-style' => 'star',
							'count-show' => 'yes',
							'vote-show' => 'yes',
							'vote-text' => 'Votes',
							'class' => 'xs-ratting-content',
							'id' => '',
						), $atts, 'wp-reviews-rating' 
				);

		return self::wur_review_kit_rating($atts);
		
	}
	
	public static function wur_review_kit_rating( $atts){
		
		$postId 	 =  (int) isset($atts['post-id']) ? $atts['post-id'] : 0;
		$rattingShow =  isset($atts['ratting-show']) ? $atts['ratting-show'] : 'yes';
		$rattingStyle =  isset($atts['ratting-style']) ? $atts['ratting-style'] : 'star';
		$countShow   =  isset($atts['count-show']) ? $atts['count-show'] : 'yes';
		$voteShow    =  isset($atts['vote-show']) ? $atts['vote-show'] : 'yes';
		$voteText    =  isset($atts['vote-text']) ? $atts['vote-text'] : 'Votes';
		$return    =  isset($atts['return-type']) ? $atts['return-type'] : '';
		
		$className   = isset($atts['class'] ) ? $atts['class'] : '';
		$idName   = isset($atts['id'] ) ? $atts['id'] : '';
		if($postId > 0){
			
			$likeData = '"xs_post_id":"'.$postId.'"';	
			// content key for submit array index
			$args = array(
				'orderby'          => 'date',
				'order'            => 'DESC',
				'post_type'        => 'xs_review',
				'post_status'      => 'publish',
				'meta_query' => array(
					array(
						'key' => 'xs_public_review_data',
						'value' => $likeData,
						'compare' => 'LIKE'
					)
				),
				'suppress_filters' => true,
	
			);
			
			$the_queryTotal = get_posts( $args );
			
			$overViewTotal = 0;
			$totalRattingsSum = 0;
			$totalRattingsCount = 0;
			$rattingRatting = 5;
			$overViewArray = [];
				
			if ( count($the_queryTotal) > 0 ) {
				foreach ( $the_queryTotal as $post ) {
					
					$metaReviewID = $post->ID;
					$metaDataJson = get_post_meta( $metaReviewID, 'xs_public_review_data', false );
					
					if( is_array($metaDataJson) && sizeof($metaDataJson) > 0) {
						$getMetaData = json_decode( end($metaDataJson) );
					}else{
						$getMetaData = [];
					}
					
					$xs_reviwer_rattingOver = (double) isset($getMetaData->xs_reviwer_ratting) ? $getMetaData->xs_reviwer_ratting : '0';
					$reviwerStyleLimitOver = (double) isset($getMetaData->review_score_limit) ? $getMetaData->review_score_limit : '5';
					
					$overViewArray['xs_reviwer_ratting'][] = $xs_reviwer_rattingOver;
					$overViewArray['review_score_limit'][] = $reviwerStyleLimitOver;
					
				}
				$defaultRatting = (isset($return_data_global_setting['review_score_limit']) && $return_data_global_setting['review_score_limit'] != '0') ? $return_data_global_setting['review_score_limit'] : '5';
				$rattingRatting = (double) max(isset($overViewArray['xs_reviwer_ratting']) ? $overViewArray['review_score_limit'] : $defaultRatting);
				
				// count same values in array. Return array by unique.
				$arrayCountValues 	= array_count_values( $overViewArray['xs_reviwer_ratting'] );
				
				$totalRattingsSum 	= array_sum( $overViewArray['xs_reviwer_ratting'] );
				$totalRattingsCount = (int) count( $overViewArray['xs_reviwer_ratting'] );
				
				$overViewTotal = (double) round(($totalRattingsSum   / $totalRattingsCount), 2);
			}
			
			if( $return == 'only_avg' ){
				return $overViewTotal;
			}else if( $return == 'total_ratting' ){
				return (double) $totalRattingsSum;
			}else if( $return == 'total_review' ){
				return $totalRattingsCount;
			}else if( $return == 'get_score_limit' ){
				return $rattingRatting;
			}else if( $return == 'percentage' ){
				$persentange = ($overViewTotal * 100) / $rattingRatting;
				return $persentange;
			}else if( $return == 'get_all'){
				$returnData = [];
				$returnData['only_avg'] = $overViewTotal;
				$returnData['total_ratting'] = (double) $totalRattingsSum;
				$returnData['total_review'] = $totalRattingsCount;
				$returnData['get_score_limit'] = $rattingRatting;
				$persentange = ($overViewTotal * 100) / $rattingRatting;
				$returnData['percentage'] = $persentange;
				return $returnData;
			}
			
			$contentRatting = '';
			if($overViewTotal > 0):
				$contentRatting .= '<div class="'.esc_attr('xs-ratting-content '.$className).'" id="'.esc_attr($idName).'">';
				if($rattingShow == 'yes'):
					if($rattingStyle == 'point'){
						$contentRatting .= self::wur_ratting_view_point_per($overViewTotal, $rattingRatting);
					}else if($rattingStyle == 'percentange'){
						$contentRatting .= self::wur_ratting_view_percentange_per($overViewTotal, $rattingRatting);
					}else if($rattingStyle == 'pie'){
						$contentRatting .= self::wur_ratting_view_pie_per($overViewTotal, $rattingRatting);
					}else{
						$contentRatting .= self::wur_ratting_view_star_point($overViewTotal, $rattingRatting);
					}
				endif;
				if($countShow == 'yes'):
					$contentRatting .= '<span class="wp-ratting-number"> '.$overViewTotal.'  <span>';
				endif;
				if($voteShow == 'yes'):
					$contentRatting .= '<span class="wp-ratting-vote"> '.$totalRattingsCount.'  '.$voteText.'<span>';
				endif;
				$contentRatting .= '</div>';
			endif;
			
			return $contentRatting;
		}
	}
	
	/**
     * Review review_kit_shortcode .
     * Method Description: shortcode for review kit
     * @since 1.0.0
     * @access public
     */
	public static function getStyles($key = '', $type = 'display'){
		// get display settings data
        $return_data_display_setting = get_option('xs_review_display');
		
		$styleData = '';
		$styleData .= 'color: ';
		$styleColor = ( isset($return_data_display_setting['form'][$key][$type]['color']) && $return_data_display_setting['form'][$key][$type]['color'] != '' ) ? $return_data_display_setting['form'][$key][$type]['color'] : '#333333';
		$styleData .= ''.$styleColor.'; ';
		$styleData .= 'font-size: ';
		$styleSize = ( isset($return_data_display_setting['form'][$key][$type]['size']) && $return_data_display_setting['form'][$key][$type]['size'] != '' ) ? $return_data_display_setting['form'][$key][$type]['size'] : '';
		$styleData .= ''.$styleSize.'px; ';
		
		//return $styleData;
		return '';
	}
	
	/**
     * Review wur_ratting_view_star_point . for star style of content view 
     * Method Description: this method use for ratting view in admin page 
	 * @params $rat, get ratting value
	 * @params $max, limit score data
	 * @return ratting html data
     * @since 1.0.0
     * @access public
     */
	 private static function wur_ratting_view_star_point($rat = 0, $max = 5){
		 $tarring = '';
		 $tarring .= '<div class="xs-review-rattting">';
		 $tarring .= '<span class="screen-rattting-text"> '.esc_html(round($rat, 1)).' </span>';
			 $halF = 0;
			 for($ratting = 1; $ratting <= $max; $ratting++ ):
				$rattingClass = 'dashicons-star-empty';
				if($halF == 1){
					$rattingClass = 'dashicons-star-half';
					$halF = 0;
				}
				if( $ratting <= $rat ){
					$rattingClass = 'dashicons-star-filled';
					if($ratting == floor($rat) ):
						$expLode = explode('.', $rat);
						if(is_array($expLode) && sizeof($expLode) > 1){
							$halF = 1;
						}
						
					endif;
				}
				
				$tarring .= '<div style="'.self::getStyles('xs_reviwer_ratting_data').'" class="xs-star dashicons-before '. esc_html($rattingClass).'" aria-hidden="true"></div>';
			endfor;
		 $tarring .= '</div>';
		 return $tarring;
	 }
	 /**
     * Review wur_ratting_view_point_per . for point styles
     * Method Description: this method use for ratting view in admin page 
	 * @params $rat, get ratting value
	 * @params $max, limit score data
	 * @return ratting html data
     * @since 1.0.0
     * @access private
     */
	 private static function  wur_ratting_view_point_per($rat = 0, $max = 5){
		 $tarring = '';
		 $tarring .= '<div class="xs-review-rattting xs-percentange">';
		 $widthData = ($rat * 100) / $max; 
		 $tarring .= '<div style="width:'.$widthData.'%;" class="percentange_check"><span class="show-per-data">'.round($rat, 1).'/'.$max.'</span></div>';
		 $tarring .= '</div>';
		 return $tarring;
	 }
	 /**
     * Review wur_ratting_view_percentange_per . for percentage styles
     * Method Description: this method use for ratting view in admin page 
	 * @params $rat, get ratting value
	 * @params $max, limit score data
	 * @return ratting html data
     * @since 1.0.0
     * @access private
     */
	 private static function wur_ratting_view_percentange_per($rat = 0, $max = 5){
		 $tarring = '';
		 $tarring .= '<div class="xs-review-rattting xs-percentange xs-point">';
		 $widthData = ($rat * 100) / $max ; 
		 $tarring .= '<div style="width:'.$widthData.'%;" class="percentange_check"><span class="show-per-data">'.round($rat, 1).'%</span></div>';
		 $tarring .= '</div>';
		 return $tarring;
	 }
	 /**
     * Review wur_ratting_view_pie_per . for pie chart styles
     * Method Description: this method use for ratting view in admin page 
	 * @params $rat, get ratting value
	 * @params $max, limit score data
	 * @return ratting html data
     * @since 1.0.0
     * @access private
     */
	 private static function wur_ratting_view_pie_per($rat = 0, $max = 5){
		 $tarring = '';
		 $widthData = ($rat * 100) / $max ; 
		 $tarring .= '<div class="xs-review-rattting xs-pie " style="--value: '.$widthData.'%;">';
		 $tarring .= '<p> '.round($rat, 1).' </p>';
		 $tarring .= '</div>';
		 return $tarring;
	 }
	  /**
     * Review wur_review_pagination . for pagination
     * Method Description: this method use for ratting view in admin page 
	 * @params $paged, show page number
	 * @params $max_page, max page number
	 * @return ratting html data
     * @since 1.0.0
     * @access private
     */
	 public function wur_review_pagination( $paged = '', $max_page = '' )
		{
			if( ! $paged ){
				$paged = get_query_var('paged');
			}
			echo paginate_links( array(
				'format'     => '?review_page=%#%',
				'current'    => max( 1, $paged ),
				'total'      => $max_page,
				'mid_size'   => 1,
				'prev_text'  => __('«'),
				'next_text'  => __('»'),
				'type'       => 'list'
				
			) );
	}

	
}

