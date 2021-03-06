<?php
namespace WurReview\App;
if ( ! defined( 'ABSPATH' ) ) die( 'Forbidden' );
/**
 * Class Name : Cpt - Custom Post Type
 * Class Type : Normal class
 *
 * initiate all necessary classes, hooks, configs
 *
 * @since 1.0.0
 * @access Public
 */
Class Cpt{
	
	private $controls;
	private $post_type;
	private $review_type;
	private $review_style;
	private $page_enable;
	private $post_name = 'Wp Reviews';
	private $post_singular_name = 'Wp Review List';
	private $meta_box_headding = 'Reviwer Details ';
	private $show_metabox_type; 
	/**
     * Construct the cpt object
     * @since 1.0.0
     * @access public
     */
	public function __construct(array $controls, $post_type, array $review_type, array $review_style, array $page_enable){
		// metabox show custom post type
		$this->show_metabox_type = ['post', 'page', $post_type];
		
		// Declear public controls 
		$this->controls = $controls;

		// Declear public post type 
		$this->post_type = $post_type;
		
		// Declear public review type 
        $this->review_type = $review_type;

		// Declear public review type 
        $this->review_style = $review_style;
		
		// Declear publicpage enable 
		$this->page_enable = $page_enable;

		// add custom post function - Action
		add_action('init', [ $this, 'wur_add_custom_post' ]);

		// Remove editor function - Filter
		add_filter('user_can_richedit', [ $this, 'wur_remove_visual_editor' ]);

		// Remove add media function - Action
		add_action('admin_head', [ $this, 'wur_remove_media_button' ] );

		// Add meta box function - Action
		add_action( 'add_meta_boxes', [ $this, 'wur_meta_box_init' ] );

		// Save meta box data function - Action
		add_action( 'save_post', [ $this, 'wur_meta_box_data_save' ], 1, 2 );

		// added custom column in cutom post type
		add_filter( 'manage_edit-'.$this->post_type.'_columns', [ $this, 'wur_custom_column_add' ] );

		// modify content in reviwer list
		add_action( 'manage_'.$this->post_type.'_posts_custom_column', [$this, 'wur_custom_column_content_update'], 10, 2 );
	}
	
	
	/**
     * Review wur_add_custom_post.
     * Method Description: added menu menu in wordpress dashboard.
     * @since 1.0.0
     * @access public
     */
	public function wur_add_custom_post(){
		
		register_post_type($this->post_type,
			[
			  'labels' => [
							'name' => esc_html__( $this->post_name, 'wp-ultimate-review' ),
							'singular_name' => esc_html__( $this->post_singular_name, 'wp-ultimate-review'  ),
						  ],
			  'supports' => 'editor',
			  'public' => true,
			  'publicly_queryable' => true,
			  'query_var' => true,
			  'has_archive' => true,
			  'rewrite' => false,
			  'menu_position' => 8,
			  'show_ui'            => true,
			  'show_in_menu'       => true,
			  'menu_icon'     => 'dashicons-star-filled',
			  'capability_type' => 'post',
			  'capabilities' => [
					'create_posts' => 'do_not_allow',
				],
			   'map_meta_cap' => true,
			  
			]
		);
	}

	/**
     * Review wur_remove_visual_editor
     * Method Description: remove visual editor from wordpress editor.
     * @since 1.0.0
     * @access public
     */
	public function wur_remove_visual_editor($default){
		global $post;
		if ($this->post_type == get_post_type($post))
			return false;
		return $default;
	}

	/**
     * Review wur_remove_media_button 
     * Method Description: remove add media button from wordpress editor.
     * @since 1.0.0
     * @access public
     */
	public function wur_remove_media_button() {
		global $current_screen;
		// remove add media button from my post type	
		if( $this->post_type == $current_screen->post_type ) remove_action( 'media_buttons' , 'media_buttons' );
	}

	
	/**
     * Review wur_meta_box_init.
     * Method Description: Added meta box in editor.
     * @since 1.0.0
     * @access public
     */
	 public function wur_meta_box_init(){
		// output for display settings. Get from options
		$return_data_display_setting = get_option('xs_review_display');
		// check enable of meta box
		if( (isset($return_data_display_setting['page']['enable']) ? $return_data_display_setting['page']['enable'] : 'No') == 'Yes'):
			//if(is_array($this->page_enable) AND sizeof($this->page_enable) > 0):
				foreach($this->show_metabox_type AS $postTypeDynamic):
					add_meta_box(
							'xs_reviewer_data',
							esc_html__($this->meta_box_headding, 'wp-ultimate-review'),
							[$this, 'wur_meta_box_html_view'],
							$postTypeDynamic,
							'normal',
							'high'
						);
				endforeach;
			//endif;
		endif;
	 }

	 /**
     * Review wur_meta_box_html_view.
     * Method Description: Metabox template view page
     * @since 1.0.0
     * @access public
     */
	public function wur_meta_box_html_view(){
		global $post;
		// get current post type
		$getPostTYpe = $post->post_type;
		
		// require file
		if($getPostTYpe == $this->post_type){
			// output for display settings. Get from options
			$return_data_display_setting = get_option('xs_review_display');
			$metaDataJson = get_post_meta( $post->ID, 'xs_public_review_data', false );
			if( is_array($metaDataJson) AND sizeof($metaDataJson) > 0) {
				$getMetaData = json_decode(end($metaDataJson));
			}else{
				$getMetaData = [];
			}
			
			$content_meta_key = 'xs_submit_review_data';
			
			require_once( WUR_REVIEW_PLUGIN_PATH.'views/admin/meta-box-html.php' );
		}else{
			
			// get display settings data
			$return_data_display_setting = get_option('xs_review_display');
		   
			// get global settings data
			$return_data_global_setting = get_option('xs_review_global');
			
			// overview post meta data
			$overview_setting_optionKey = 'xs_review_overview_settings'; 
			
			 // output for global settings
			$metaDataOverviewJson = get_post_meta( $post->ID, $overview_setting_optionKey, false );
			if( is_array($metaDataOverviewJson) AND sizeof($metaDataOverviewJson) > 0) {
				$return_data_overview_setting = json_decode(end($metaDataOverviewJson));
			}else{
				$return_data_overview_setting = [];
			}
			//echo '<pre>';  print_r($return_data_overview_setting); echo '</pre>'; 
			
			require_once( WUR_REVIEW_PLUGIN_PATH.'views/admin/meta-box-html-details.php' );
		}		
	}

	/**
     * Review wur_meta_box_data_save.
     * Method Description: Metabox save data in db
     * @since 1.0.0
     * @access public
     */

	public function wur_meta_box_data_save( $post_id, $post ){
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return $post_id;
		}
		// save meta box data for review
		if( !empty($post_id) AND is_object($post) ){
			// output for display settings. Get from options
			$return_data_display_setting = get_option('xs_review_display');
			if( (isset($return_data_display_setting['page']['enable']) ? $return_data_display_setting['page']['enable'] : 'No' ) == 'Yes'):
				//if($post->post_type == $this->post_type):
				if( in_array($post->post_type, $this->show_metabox_type) ):
					
					// review meta update only
					$content_meta_key = 'xs_submit_review_data';
					$metaReviewData = isset($_POST[$content_meta_key]) ? $_POST[$content_meta_key] : [];
					$metaReviewData = \WurReview\App\Settings::sanitize($metaReviewData);
					if(is_array($metaReviewData) AND sizeof($metaReviewData) > 0):
						$metaKey = 'xs_public_review_data';
						// meta post data modify
						update_post_meta( $post_id, $metaKey, json_encode($metaReviewData));
						
						// post data modify
						if (isset($post->ID)) {
							$postParams = [];
							$postParams['post_title'] = isset($metaReviewData['xs_reviw_title']) ? $metaReviewData['xs_reviw_title'] : $post->post_title;
							
							// update post data
							global $wpdb;
							$where = array( 'ID' => $post->ID );
        					$wpdb->update( $wpdb->posts, $postParams, $where );
						}
					endif;
					
					// post meta add / update
					$overview_setting_optionKey = 'xs_review_overview_settings';
					$metaOverviewData = isset($_POST[$overview_setting_optionKey]) ? $_POST[$overview_setting_optionKey] : [];
					$metaOverviewData = \WurReview\App\Settings::sanitize($metaOverviewData);
					if(is_array($metaOverviewData) AND sizeof($metaOverviewData) > 0):
						
						$return_data_global_setting = get_option('xs_review_global');
						$review_score_limit = isset($return_data_global_setting['review_score_limit']) ? $return_data_global_setting['review_score_limit'] : 5;
						
						$valueData = [];
						foreach($metaOverviewData['overview']['item'] AS $value){
							$value['rat_range'] = $review_score_limit;
							$valueData[] = $value;
						}
						$metaOverviewData['overview']['item'] = $valueData;
						update_post_meta( $post_id, $overview_setting_optionKey, json_encode($metaOverviewData));
					endif;
					
				endif;
			endif;
		}
	}

	/**
     * Review meta_box_custom_column .
     * Method Description: Metabox custom column 
     * @since 1.0.0
     * @access public
     */

	 public function wur_custom_column_add( $columns ){
		// set custom post "xs_review" column modify	
		$columns = array(
			'cb' => '<input type="checkbox" />',
			'title' => esc_html__( 'Review Title', 'wp-ultimate-review'),
			'description' => esc_html__( 'Review Summery', 'wp-ultimate-review' ),
			'reviewer' => esc_html__( 'Reviewer', 'wp-ultimate-review' ),
			'ratting' => esc_html__( 'Ratting', 'wp-ultimate-review' ),
			'review_post_type' => esc_html__( 'Content Type ', 'wp-ultimate-review' ),
			'response_review' => esc_html__( 'In Response To', 'wp-ultimate-review' ),
			'date' => esc_html__( 'Review Date', 'wp-ultimate-review' )
		);
		return $columns;
	 }

	 /**
     * Review wur_custom_column_content_update .
     * Method Description: Metabox custom column update by this method 
     * @since 1.0.0
     * @access public
     */

	public function wur_custom_column_content_update( $column, $post_id ){
		global $post;
		$metaReviewID = $post->ID;
		$metaDataJson = get_post_meta( $metaReviewID, 'xs_public_review_data', false );
		if( is_array($metaDataJson) AND sizeof($metaDataJson) > 0) {
			$getMetaData = json_decode($metaDataJson[0]);
		}else{
			$getMetaData = [];
		}

		// parent post informations
		$parentTitle = '';
		$postUrlData = '';
		$customPOstId = isset($getMetaData->xs_post_id) ? $getMetaData->xs_post_id : 0;
		$customPostType = isset($getMetaData->xs_post_type) ? $getMetaData->xs_post_type : '';
		if( in_array($customPostType , array('post', 'page')) ) {
			$parent_post = get_post( $customPOstId ); 
			if(is_object($parent_post) ){
				$parentTitle = __(isset($parent_post->post_title) ? $parent_post->post_title : '');
				$parentUrl = get_permalink( isset($parent_post->ID) ? $parent_post->ID : 0 );
				$postUrlData = '<a href="'.esc_attr($parentUrl).'" target="_blank"> '.$parentTitle.' </a>';
			}
		}
		
		// reviwer information
		$userInfoData = '';
		$reviwerStyleLimit = isset($getMetaData->review_score_limit) ? $getMetaData->review_score_limit : '5';
		$reviwerScoreStyle = isset($getMetaData->review_score_style) ? $getMetaData->review_score_style : 'point';
		$reviwerName = isset($getMetaData->xs_reviwer_name) ? $getMetaData->xs_reviwer_name : '';
		$reviwerEmail = isset($getMetaData->xs_reviwer_email) ? $getMetaData->xs_reviwer_email : '';
		$xs_author_user = isset($getMetaData->xs_post_author) ? $getMetaData->xs_post_author : $post->post_author;
		if($xs_author_user != 0){
			$user_info = get_userdata($xs_author_user);
			$reviwerName = (isset($user_info->display_name) && strlen($user_info->display_name) > 0) ? $user_info->display_name : $user_info->first_name.' '.$user_info->last_name;
			$reviwerEmail = isset($user_info->user_email) ? $user_info->user_email : '';
			
			$userInfoData .= '<a href="'.esc_attr(get_edit_user_link( $xs_author_user )).'" target="_blank"> '.$reviwerName.' </a>';
			$userInfoData .= '<br/> <a href="'.esc_attr(get_edit_user_link( $xs_author_user )).'" target="_blank"> '.$reviwerEmail.' </a>';
		}else{
			$userInfoData .= $reviwerName.' <br/> '.$reviwerEmail;
		}
		
		// column information modify for custom post "xs_review"
		switch($column):
			// custom title
			case 'title':
				echo __( isset($post->post_title) ? $post->post_title : $getMetaData->xs_reviw_title );
			break;
			// custom reviewer
			case 'reviewer':
				echo __( $userInfoData); 
			break;
			// custom description
			case 'description':
				echo __( substr(isset($post->post_content) ? $post->post_content : $getMetaData->xs_reviw_summery, 0, 60) );
			break;
			// custom ratting
			case 'ratting':
				if($reviwerScoreStyle == 'star'){	
					echo self::wur_ratting_view_star(isset($getMetaData->xs_reviwer_ratting) ? $getMetaData->xs_reviwer_ratting : 0, $reviwerStyleLimit);
				}else if($reviwerScoreStyle == 'point'){
					echo self::wur_ratting_view_point(isset($getMetaData->xs_reviwer_ratting) ? $getMetaData->xs_reviwer_ratting : 0, $reviwerStyleLimit);
				}else if($reviwerScoreStyle == 'percentage'){
					echo self::wur_ratting_view_percentange(isset($getMetaData->xs_reviwer_ratting) ? $getMetaData->xs_reviwer_ratting : 0, $reviwerStyleLimit);
				}else if($reviwerScoreStyle == 'pie'){
					echo self::wur_ratting_view_pie(isset($getMetaData->xs_reviwer_ratting) ? $getMetaData->xs_reviwer_ratting : 0, $reviwerStyleLimit);
				}else{
					echo self::wur_ratting_view_star(isset($getMetaData->xs_reviwer_ratting) ? $getMetaData->xs_reviwer_ratting : 0, $reviwerStyleLimit);
				}
			break;
			// custom post type
			case 'review_post_type':
				echo __(ucfirst( isset($getMetaData->xs_post_type) ? $getMetaData->xs_post_type : '') );
			break;
			// In response to 
			case 'response_review':
				echo __(  $postUrlData );
			break;
		endswitch;
	 }
	 
	 /**
     * Review wur_ratting_view_star . for star style
     * Method Description: this method use for ratting view in admin page 
	 * @params $rat, get ratting value
	 * @params $max, limit score data
	 * @return ratting html data
     * @since 1.0.0
     * @access private
     */
	 private static function wur_ratting_view_star($rat = 0, $max = 5){
		 $tarring = '';
		 $tarring .= '<div class="xs-review-rattting-admin">';
		 $tarring .= '<span class="screen-rattting-text-admin"> '.esc_html(round($rat, 1)).' </span>';
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
				
				$tarring .= '<div class="xs-review-star dashicons-before '. esc_html($rattingClass).'" aria-hidden="true"></div>';
			endfor;
		 $tarring .= '</div>';
		 return $tarring;
	 }
	
	 
	 /**
     * Review ratting_view_point_per . for point styles
     * Method Description: this method use for ratting view in admin page 
	 * @params $rat, get ratting value
	 * @params $max, limit score data
	 * @return ratting html data
     * @since 1.0.0
     * @access private
     */
	 private static function  wur_ratting_view_point($rat = 0, $max = 5){
		 $tarring = '';
		 $tarring .= '<div class="xs-review-rattting-admin xs-percentange">';
		 $widthData = ($rat * 100) / $max ; 
		 $tarring .= '<div style="width:'.$widthData.'%;" class="percentange_check"><span class="show-per-data">'.round($rat, 1).'/'.$max.'</span></div>';
		 $tarring .= '</div>';
		 return $tarring;
	 }
	 /**
     * Review ratting_view_percentange . for percentage styles
     * Method Description: this method use for ratting view in admin page 
	 * @params $rat, get ratting value
	 * @params $max, limit score data
	 * @return ratting html data
     * @since 1.0.0
     * @access private
     */
	 private static function wur_ratting_view_percentange($rat = 0, $max = 5){
		 $tarring = '';
		 $tarring .= '<div class="xs-review-rattting-admin xs-percentange xs-point">';
		 $widthData = ($rat * 100) / $max ; 
		 $tarring .= '<div style="width:'.$widthData.'%;" class="percentange_check"><span class="show-per-data">'.round($rat, 1).'%</span></div>';
		 $tarring .= '</div>';
		 return $tarring;
	 }
	 /**
     * Review ratting_view_pie_per . for pie chart styles
     * Method Description: this method use for ratting view in admin page 
	 * @params $rat, get ratting value
	 * @params $max, limit score data
	 * @return ratting html data
     * @since 1.0.0
     * @access private
     */
	 private static function wur_ratting_view_pie($rat = 0, $max = 5){
		 $tarring = '';
		 $widthData = ($rat * 100) / $max ; 
		 $tarring .= '<div class="xs-review-rattting-admin xs-pie " style="--value: '.$widthData.'%;">';
		 $tarring .= '<p> '.round($rat, 1).' </p>';
		 $tarring .= '</div>';
		 return $tarring;
	 }
}