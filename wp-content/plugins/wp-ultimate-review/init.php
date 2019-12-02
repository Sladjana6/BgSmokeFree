<?php
namespace WurReview;
use WurReview\Utilities\Helper;
if ( ! defined( 'ABSPATH' ) ) die( 'Forbidden' );
/**
 * Class Name : Init - This main class for review plugin
 * Class Type : Normal class
 *
 * initiate all necessary classes, hooks, configs
 *
 * @since 1.0.0
 * @access Public
 */

Class Init{
     
     /**
     * veriable for meta box type - $controls
     * Set Attribute : title_name, type, class, id, name, options data
     * @since 1.0.0
     * @access private
     */
     private $controls = [ 'xs_reviwer_ratting' 	=> [
								'title_name' 	=> 'Rating',
								'type' 			=> 'select',
								'id' 			=> 'xs_ratting_id',
								'require' 		=> 'Yes',
								'class' 		=> 'xs_rating_class',
								'options' 		=> [
									'1' => '1 Star',
									'2' => '2 Star',
									'3' => '3 Star',
									'4' => '4 Star',
									'5' => '5 Star' 
								] 
							],
                          'xs_reviw_title' 	  	=> [
								'title_name' => 'Review Title',
								'type' => 'text',
								'require' => 'Yes',
								'options' => [] 
							],
                          
                          'xs_reviwer_name'   	=> [
								'title_name' => 'Reviwer Name',
								'type' => 'text',
								'require' => 'No',
								'options' => []
							],	
                          'xs_reviwer_email'  	=> [
								'title_name' => 'Reviwer Email',
								'type' => 'text',
								'require' => 'Yes',
								'options' => [] 
							],
                          'xs_reviwer_website'	=> [
								'title_name' => 'Website',
								'type' => 'text',
								'require' => 'No',
								'options' => [] 
							],
							'xs_reviw_summery'  	=> [
								'title_name' => 'Review Summary',
								'type' => 'textarea',
								'require' => 'Yes',
								'options' => [] 
							],
                         ];
      /**
     * veriable for review schema - $schema
     * Set Attribute : title_name, type, class, id, name, options data
     * @since 1.0.0
     * @access private
     */
      private $schema = [ 
                         'Article' => 'Article',
                         'Book' => 'Book',
                         'Game' => 'Game',
                         'Movie' => 'Movie',
                         'MusicRecording' => 'MusicRecording',
                         'Painting' => 'Painting',
                         'Place' => 'Place',
                         'Product' => 'Product',
                         'Recipe' => 'Recipe',
                         'Restaurant' => 'Restaurant',
                         'SoftwareApplication' => 'SoftwareApplication',
                         'Store' => 'Store',
                         'Thing' => 'Thing',
                         'TVSeries' => 'TVSeries',
                         'WebSite' => 'WebSite',
                    ];
     /**
     * veriable for meta box post type - $post_type
     * @since 1.0.0
     * @access private
     */
     private $post_type = 'xs_review';

     /**
     * veriable for review type - $review_style
     * @since 1.0.0
     * @access private
     */
	 private $review_style = ['point' => 'Point', 'star' => 'Star', 'percentage' => 'Percentage', 'pie' => 'Pie Chart'];
     /**
     * veriable for review type - $review_type
     * @since 1.0.0
     * @access public
     */
	private $review_type = ['star' => 'Star', 'slider' => 'Slider', 'bar' => 'Bar', 'square' => 'Square', 'movie' => 'Movie', 'pill' => 'Pill'];
	// public $review_type = ['star' => 'Star'];

    /**
     * veriable for page enable - $page_enable
     * @since 1.0.0
     * @access private
     */
    //, 'woocommerce'  => 'Woocommerce Product Single page'
    private $page_enable = ['post' => 'Post', 'page'  => 'Page'];
    

	/**
     * Construct the plugin object
     * @since 1.0.0
     * @access private
     */
	public function __construct(){
		$this->review_autoloder();
          new App\Cpt($this->controls, $this->post_type, $this->review_type, $this->review_style, $this->page_enable);
          new App\Settings($this->controls, $this->post_type, $this->review_type, $this->review_style,$this->page_enable);
          new App\Content($this->controls, $this->post_type);
	}
	
	
	/**
     * Review review_autoloder.
     * xs_review autoloader loads all the classes needed to run the plugin.
     * @since 1.0.0
     * @access private
     */
	
	private function review_autoloder(){
		require_once WUR_REVIEW_PLUGIN_PATH . '/autoloader.php';
        Autoloader::run_plugin();
	}
	
}

