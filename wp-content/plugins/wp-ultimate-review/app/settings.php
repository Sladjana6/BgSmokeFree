<?php
namespace WurReview\App;
if ( ! defined( 'ABSPATH' ) ) die( 'Forbidden' );
/**
 * Class Name : Settings - This access for admin
 * Class Type : Normal class
 *
 * initiate all necessary classes, hooks, configs
 *
 * @since 1.0.0
 * @access Public
 */
Class Settings{

    private $post_type;
    private $review_type;
    private $review_style;
    private $page_enable;
    private $settingsName = 'Settings';
    private $settingsTitle = 'Review Settings';
    /**
     * Construct the cpt object
     * @since 1.0.0
     * @access public
     */
     public function __construct(array $controls, $post_type, array $review_type, array $review_style, array $page_enable ){
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

        // add admin menu of settings
        add_action('admin_menu', [$this, 'wur_add_admin_menu_settings']);

        // Load css file for settings page
        add_action( 'admin_enqueue_scripts', [$this, 'wur_settings_css_loader' ] );

        // Load script file for settings page
        add_action( 'admin_enqueue_scripts', [$this, 'wur_settings_script_loader' ] );

        
     }

     /**
     * Review wur_add_admin_menu_settings
     * Method Description: Added admin menu for settings page
     * @since 1.0.0
     * @access public
     */
     public function wur_add_admin_menu_settings(){
       // added new sub menu in custom post type
        add_submenu_page(
            'edit.php?post_type='.$this->post_type.'',
            esc_html__( $this->settingsTitle, 'wp-ultimate-review' ),
            esc_html__( $this->settingsName, 'wp-ultimate-review' ),
            'manage_options',
            'xs_settings',
            [$this, 'wur_settings_view']
        );
        
     }
     /**
     * Review wur_settings_view.
     * Method Description: Settings template view page
     * @since 1.0.0
     * @access public
     */
     public function wur_settings_view(){
        $getAdminEmail = get_option('admin_email');

        $message_status = 'hide';
        $message_text = '';
        
        /**
         * Global Setting Section
         * Global Options Key : xs_review_global
         * Save data 'wp_options' table
         */
        $global_setting_optionKey = 'xs_review_global'; 
        if(isset($_POST['global_setting_review_form'])){
            $option_value_global_setting 	= isset($_POST[$global_setting_optionKey]) ? $_POST[$global_setting_optionKey] : array();
            $option_value_global_setting = self::sanitize($option_value_global_setting);
			if(update_option( $global_setting_optionKey, $option_value_global_setting, 'Yes' )){
               $message_status = 'show';
               $message_text = 'Global Settings';	
            }
         }
         // output for global settings
        $return_data_global_setting = get_option($global_setting_optionKey);
        
        /**
         * Display Setting Section
         * Global Options Key : xs_review_display
         * Save data 'wp_options' table
         */
        $display_setting_optionKey = 'xs_review_display';
        if(isset($_POST['display_setting_review_form'])){
            $option_value_global_setting 	= isset($_POST[$display_setting_optionKey]) ? $_POST[$display_setting_optionKey] : array();
            $option_value_global_setting = self::sanitize($option_value_global_setting);
			if(update_option( $display_setting_optionKey, $option_value_global_setting, 'Yes' )){
               $message_status = 'show';	
               $message_text = 'Display Settings';
            }
         }
         // output for display settings
      $return_data_display_setting = get_option($display_setting_optionKey);
      //echo '<pre>'; print_r($return_data_display_setting); echo '</pre>';
      require_once( WUR_REVIEW_PLUGIN_PATH.'views/admin/global-settings-html.php' );	
     }
    /**
     * Review wur_settings_css_loader .
     * Method Description: Settings Css Loader
     * @since 1.0.0
     * @access public
     */
     public function wur_settings_css_loader(){
        wp_register_style( 'wur_settings_css', WUR_REVIEW_PLUGIN_URL. 'assets/admin/css/admin-settings.css');
        wp_enqueue_style( 'wur_settings_css' );
		wp_enqueue_style( 'wp-color-picker' );
     }
     /**
     * Review wur_settings_script_loader .
     * Method Description: Settings Script Loader
     * @since 1.0.0
     * @access public
     */
    public function wur_settings_script_loader(){
        
		wp_register_script( 'wur_settings_script1', WUR_REVIEW_PLUGIN_URL.'assets/admin/script/jquery.form-repeater.js', array('jquery'));
        wp_enqueue_script( 'wur_settings_script1' );
		
		wp_register_script( 'wur_settings_script', WUR_REVIEW_PLUGIN_URL. 'assets/admin/script/admin-settings.js', array('jquery', 'wp-color-picker'));
        wp_enqueue_script( 'wur_settings_script' );
		
		
     }
	 
	 public static function sanitize($value, $senitize_func = 'sanitize_text_field'){
        $senitize_func = (in_array($senitize_func, [
                'sanitize_email', 
                'sanitize_file_name', 
                'sanitize_hex_color', 
                'sanitize_hex_color_no_hash', 
                'sanitize_html_class', 
                'sanitize_key', 
                'sanitize_meta', 
                'sanitize_mime_type',
                'sanitize_sql_orderby',
                'sanitize_option',
                'sanitize_text_field',
                'sanitize_title',
                'sanitize_title_for_query',
                'sanitize_title_with_dashes',
                'sanitize_user',
                'esc_url_raw',
                'wp_filter_nohtml_kses',
            ])) ? $senitize_func : 'sanitize_text_field';
        
        if(!is_array($value)){
            return $senitize_func($value);
        }else{
            return array_map(function($inner_value) use ($senitize_func){
                return self::sanitize($inner_value, $senitize_func);
            }, $value);
        }
    }

}