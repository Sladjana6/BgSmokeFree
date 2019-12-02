<?php
/**
 * Get some constants ready for paths when your plugin grows
 *
 * @author Param Themes
 *
 * @package Get some constants ready for paths when your plugin grows.
 */

 /**
 * The plugin base class - the root of all WP goods!
 *
 * @author Param Themes
 */
class PT_Plugin_Settings {
	private $pt_setting;
	/**
	 * Construct me
	 */
	public function __construct() {
		$this->pt_setting = get_option( 'pt_setting', '' );
		add_action( 'admin_init', array( $this, 'register_settings' ) );
		
	}
	/**
	 * Setup the settings
	 * Add a single checkbox setting for Active/Inactive and a text field
	 * just for the sake of our demo
	 */
	public function register_settings() {
		register_setting( 'pt_setting', 'pt_setting', array( $this, 'pt_validate_settings' ) );
		add_settings_section(
			'pt_settings_section',         // ID used to identify this section and with which to register options.
			__( 'Enable & Disable Elementor For Better Performance', 'ptbase' ),                // Title to be displayed on the administration page.
			array( $this, 'pt_settings_callback' ), // Callback used to render the description of the section.
			'pt-plugin-base'                           // Page on which to add this section of options.
		);

		add_settings_section(
			'pt_settings_section_content_elements',         // ID used to identify this section and with which to register options.
			__( '<br>CONTENT ELEMENT', 'ptbase' ),                // Title to be displayed on the administration page.
			array( $this, 'pt_settings_callback' ), // Callback used to render the description of the section.
			'pt-plugin-base'                           // Page on which to add this section of options.
		);

		if (is_plugin_active('pt-elementor-addons-pro/pt-elementor-addons-pro.php')) {
			

			add_settings_field(
				'pt_opt_in12',                      // ID used to identify the field throughout the theme.
				__( 'Deactivate Testimonials Slider: ', 'ptbase' ),                           // The label to the left of the option interface element.
				array( $this, 'pt_opt_in_callback12' ),   // The name of the function responsible for rendering the option interface.
				'pt-plugin-base',                          // The page on which this option will be displayed.
				'pt_settings_section_content_elements'         // The name of the section to which this field belongs.
			);

			add_settings_field(
				'pt_opt_in14',                      // ID used to identify the field throughout the theme.
				__( 'Deactivate Hover Cards: ', 'ptbase' ),                           // The label to the left of the option interface element.
				array( $this, 'pt_opt_in_callback14' ),   // The name of the function responsible for rendering the option interface.
				'pt-plugin-base',                          // The page on which this option will be displayed.
				'pt_settings_section_content_elements'         // The name of the section to which this field belongs.
			);

			add_settings_field(
				'pt_opt_in18',                      // ID used to identify the field throughout the theme.
				__( 'Deactivate iHover: ', 'ptbase' ),                           // The label to the left of the option interface element.
				array( $this, 'pt_opt_in_callback18' ),   // The name of the function responsible for rendering the option interface.
				'pt-plugin-base',                          // The page on which this option will be displayed.
				'pt_settings_section_content_elements'         // The name of the section to which this field belongs.
			);

			add_settings_field(
				'pt_opt_in19',                      // ID used to identify the field throughout the theme.
				__( 'Deactivate 3D iHover: ', 'ptbase' ),                           // The label to the left of the option interface element.
				array( $this, 'pt_opt_in_callback19' ),   // The name of the function responsible for rendering the option interface.
				'pt-plugin-base',                          // The page on which this option will be displayed.
				'pt_settings_section_content_elements'         // The name of the section to which this field belongs.
			);

			add_settings_field(
				'pt_opt_in21',                      // ID used to identify the field throughout the theme.
				__( 'Deactivate Heading: ', 'ptbase' ),                           // The label to the left of the option interface element.
				array( $this, 'pt_opt_in_callback21' ),   // The name of the function responsible for rendering the option interface.
				'pt-plugin-base',                          // The page on which this option will be displayed.
				'pt_settings_section_content_elements'         // The name of the section to which this field belongs.
			);

			add_settings_field(
				'pt_opt_in22',                      // ID used to identify the field throughout the theme.
				__( 'Deactivate Smart Box: ', 'ptbase' ),                           // The label to the left of the option interface element.
				array( $this, 'pt_opt_in_callback22' ),   // The name of the function responsible for rendering the option interface.
				'pt-plugin-base',                          // The page on which this option will be displayed.
				'pt_settings_section_content_elements'         // The name of the section to which this field belongs.
			);

			add_settings_field(
				'pt_opt_in64',                      // ID used to identify the field throughout the theme.
				__( 'Deactivate Testimonials: ', 'ptbase' ),                           // The label to the left of the option interface element.
				array( $this, 'pt_opt_in_callback64' ),   // The name of the function responsible for rendering the option interface.
				'pt-plugin-base',                          // The page on which this option will be displayed.
				'pt_settings_section_content_elements'         // The name of the section to which this field belongs.
			);

			add_settings_field(
				'pt_opt_in25',                      // ID used to identify the field throughout the theme.
				__( 'Deactivate Animated Headline: ', 'ptbase' ),                           // The label to the left of the option interface element.
				array( $this, 'pt_opt_in_callback25' ),   // The name of the function responsible for rendering the option interface.
				'pt-plugin-base',                          // The page on which this option will be displayed.
				'pt_settings_section_content_elements'         // The name of the section to which this field belongs.
			);

			add_settings_field(
				'pt_opt_in71',                      // ID used to identify the field throughout the theme.
				__( 'Deactivate Testimonials: ', 'ptbase' ),                           // The label to the left of the option interface element.
				array( $this, 'pt_opt_in_callback71' ),   // The name of the function responsible for rendering the option interface.
				'pt-plugin-base',                          // The page on which this option will be displayed.
				'pt_settings_section_content_elements'         // The name of the section to which this field belongs.
			);
			
			add_settings_field(
				'pt_opt_in747',                      // ID used to identify the field throughout the theme.
				__( 'Deactivate Testimonials: ', 'ptbase' ),                           // The label to the left of the option interface element.
				array( $this, 'pt_opt_in_callback747' ),   // The name of the function responsible for rendering the option interface.
				'pt-plugin-base',                          // The page on which this option will be displayed.
				'pt_settings_section_content_elements'         // The name of the section to which this field belongs.
			);
		
		}
		//LITE CONTROLER
		add_settings_field(
			'pt_opt_in',                      // ID used to identify the field throughout the theme.
			__( ' Team ', 'ptbase' ),                         // The label to the left of the option interface element.
			array( $this, 'pt_opt_in_callback' ),   // The name of the function responsible for rendering the option interface.
			'pt-plugin-base',                          // The page on which this option will be displayed.
			'pt_settings_section_content_elements'         // The name of the section to which this field belongs.
		);

		add_settings_field(
			'pt_opt_in1',                      // ID used to identify the field throughout the theme.
			__( 'Deactivate Flip Box: ', 'ptbase' ),                           // The label to the left of the option interface element.
			array( $this, 'pt_opt_in_callback1' ),   // The name of the function responsible for rendering the option interface.
			'pt-plugin-base',                          // The page on which this option will be displayed.
			'pt_settings_section_content_elements'         // The name of the section to which this field belongs.
		);

		add_settings_field(
			'pt_opt_in2',                      // ID used to identify the field throughout the theme.
			__( 'Deactivate Dual Button: ', 'ptbase' ),                           // The label to the left of the option interface element.
			array( $this, 'pt_opt_in_callback2' ),   // The name of the function responsible for rendering the option interface.
			'pt-plugin-base',                          // The page on which this option will be displayed.
			'pt_settings_section_content_elements'         // The name of the section to which this field belongs.
		);

		add_settings_field(
			'pt_opt_in4',                      // ID used to identify the field throughout the theme.
			__( 'Deactivate Info Box: ', 'ptbase' ),                           // The label to the left of the option interface element.
			array( $this, 'pt_opt_in_callback4' ),   // The name of the function responsible for rendering the option interface.
			'pt-plugin-base',                          // The page on which this option will be displayed.
			'pt_settings_section_content_elements'         // The name of the section to which this field belongs.
		);

		add_settings_field(
			'pt_opt_in6',                      // ID used to identify the field throughout the theme.
			__( 'Deactivate Testimonials: ', 'ptbase' ),                           // The label to the left of the option interface element.
			array( $this, 'pt_opt_in_callback6' ),   // The name of the function responsible for rendering the option interface.
			'pt-plugin-base',                          // The page on which this option will be displayed.
			'pt_settings_section_content_elements'         // The name of the section to which this field belongs.
		);

		add_settings_field(
			'pt_opt_in60',                      // ID used to identify the field throughout the theme.
			__( 'Deactivate Testimonials: ', 'ptbase' ),                           // The label to the left of the option interface element.
			array( $this, 'pt_opt_in_callback60' ),   // The name of the function responsible for rendering the option interface.
			'pt-plugin-base',                          // The page on which this option will be displayed.
			'pt_settings_section_content_elements'         // The name of the section to which this field belongs.
		);


		add_settings_field(
			'pt_opt_in62',                      // ID used to identify the field throughout the theme.
			__( 'Deactivate Testimonials: ', 'ptbase' ),                           // The label to the left of the option interface element.
			array( $this, 'pt_opt_in_callback62' ),   // The name of the function responsible for rendering the option interface.
			'pt-plugin-base',                          // The page on which this option will be displayed.
			'pt_settings_section_content_elements'         // The name of the section to which this field belongs.
		);

		add_settings_field(
			'pt_opt_in66',                      // ID used to identify the field throughout the theme.
			__( 'Deactivate Testimonials: ', 'ptbase' ),                           // The label to the left of the option interface element.
			array( $this, 'pt_opt_in_callback66' ),   // The name of the function responsible for rendering the option interface.
			'pt-plugin-base',                          // The page on which this option will be displayed.
			'pt_settings_section_content_elements'         // The name of the section to which this field belongs.
		);

		add_settings_field(
			'pt_opt_in68',                      // ID used to identify the field throughout the theme.
			__( 'Deactivate Testimonials: ', 'ptbase' ),                           // The label to the left of the option interface element.
			array( $this, 'pt_opt_in_callback68' ),   // The name of the function responsible for rendering the option interface.
			'pt-plugin-base',                          // The page on which this option will be displayed.
			'pt_settings_section_content_elements'         // The name of the section to which this field belongs.
		);

		add_settings_field(
			'pt_opt_in70',                      // ID used to identify the field throughout the theme.
			__( 'Deactivate Testimonials: ', 'ptbase' ),                           // The label to the left of the option interface element.
			array( $this, 'pt_opt_in_callback70' ),   // The name of the function responsible for rendering the option interface.
			'pt-plugin-base',                          // The page on which this option will be displayed.
			'pt_settings_section_content_elements'         // The name of the section to which this field belongs.
		);

		add_settings_field(
			'pt_opt_in76',                      // ID used to identify the field throughout the theme.
			__( 'Deactivate Testimonials: ', 'ptbase' ),                           // The label to the left of the option interface element.
			array( $this, 'pt_opt_in_callback76' ),   // The name of the function responsible for rendering the option interface.
			'pt-plugin-base',                          // The page on which this option will be displayed.
			'pt_settings_section_content_elements'         // The name of the section to which this field belongs.
		);

		//DAYNAMIC CONTENT ELEMENTS
		add_settings_section(
			'pt_settings_section_daynamic_content_elements',         // ID used to identify this section and with which to register options.
			__( 'DAYNAMIC CONTENT ELEMENTS', 'ptbase' ),                // Title to be displayed on the administration page.
			array( $this, 'pt_settings_callback' ), // Callback used to render the description of the section.
			'pt-plugin-base'                           // Page on which to add this section of options.
		);

		//pro
		if (is_plugin_active('pt-elementor-addons-pro/pt-elementor-addons-pro.php')) {
			add_settings_field(
				'pt_opt_in17',                      // ID used to identify the field throughout the theme.
				__( 'Deactivate Post Grid: ', 'ptbase' ),                           // The label to the left of the option interface element.
				array( $this, 'pt_opt_in_callback17' ),   // The name of the function responsible for rendering the option interface.
				'pt-plugin-base',                          // The page on which this option will be displayed.
				'pt_settings_section_daynamic_content_elements'         // The name of the section to which this field belongs.
			);

			add_settings_field(
				'pt_opt_in16',                      // ID used to identify the field throughout the theme.
				__( 'Deactivate Stats Counter: ', 'ptbase' ),                           // The label to the left of the option interface element.
				array( $this, 'pt_opt_in_callback16' ),   // The name of the function responsible for rendering the option interface.
				'pt-plugin-base',                          // The page on which this option will be displayed.
				'pt_settings_section_daynamic_content_elements'         // The name of the section to which this field belongs.
			);

			add_settings_field(
				'pt_opt_in27',                      // ID used to identify the field throughout the theme.
				__( 'Deactivate Testimonials: ', 'ptbase' ),                           // The label to the left of the option interface element.
				array( $this, 'pt_opt_in_callback27' ),   // The name of the function responsible for rendering the option interface.
				'pt-plugin-base',                          // The page on which this option will be displayed.
				'pt_settings_section_daynamic_content_elements'         // The name of the section to which this field belongs.
			);

			//NEWS TICKER (PRO)
		}

		//lite
			add_settings_field(
				'pt_opt_in3',                      // ID used to identify the field throughout the theme.
				__( 'Deactivate Post Timeline: ', 'ptbase' ),                           // The label to the left of the option interface element.
				array( $this, 'pt_opt_in_callback3' ),   // The name of the function responsible for rendering the option interface.
				'pt-plugin-base',                          // The page on which this option will be displayed.
				'pt_settings_section_daynamic_content_elements'         // The name of the section to which this field belongs.
			);

			add_settings_field(
				'pt_opt_in58',                      // ID used to identify the field throughout the theme.
				__( 'Deactivate Testimonials: ', 'ptbase' ),                           // The label to the left of the option interface element.
				array( $this, 'pt_opt_in_callback58' ),   // The name of the function responsible for rendering the option interface.
				'pt-plugin-base',                          // The page on which this option will be displayed.
				'pt_settings_section_daynamic_content_elements'         // The name of the section to which this field belongs.
			);
			add_settings_field(
				'pt_opt_in67',                      // ID used to identify the field throughout the theme.
				__( 'Deactivate Testimonials: ', 'ptbase' ),                           // The label to the left of the option interface element.
				array( $this, 'pt_opt_in_callback67' ),   // The name of the function responsible for rendering the option interface.
				'pt-plugin-base',                          // The page on which this option will be displayed.
				'pt_settings_section_daynamic_content_elements'         // The name of the section to which this field belongs.
			);
			add_settings_field(
				'pt_opt_in59',                      // ID used to identify the field throughout the theme.
				__( 'Deactivate Testimonials: ', 'ptbase' ),                           // The label to the left of the option interface element.
				array( $this, 'pt_opt_in_callback59' ),   // The name of the function responsible for rendering the option interface.
				'pt-plugin-base',                          // The page on which this option will be displayed.
				'pt_settings_section_daynamic_content_elements'         // The name of the section to which this field belongs.
			);
			add_settings_field(
				'pt_opt_in56',                      // ID used to identify the field throughout the theme.
				__( 'Deactivate Testimonials: ', 'ptbase' ),                           // The label to the left of the option interface element.
				array( $this, 'pt_opt_in_callback56' ),   // The name of the function responsible for rendering the option interface.
				'pt-plugin-base',                          // The page on which this option will be displayed.
				'pt_settings_section_daynamic_content_elements'         // The name of the section to which this field belongs.
			);
			add_settings_field(
				'pt_opt_in58',                      // ID used to identify the field throughout the theme.
				__( 'Deactivate Testimonials: ', 'ptbase' ),                           // The label to the left of the option interface element.
				array( $this, 'pt_opt_in_callback58' ),   // The name of the function responsible for rendering the option interface.
				'pt-plugin-base',                          // The page on which this option will be displayed.
				'pt_settings_section_daynamic_content_elements'         // The name of the section to which this field belongs.
			);

		//MARKETING ELEMENTS
			add_settings_section(
				'pt_settings_section_marketing_elements',         // ID used to identify this section and with which to register options.
				__( 'MARKETING ELEMENTS', 'ptbase' ),                // Title to be displayed on the administration page.
				array( $this, 'pt_settings_callback' ), // Callback used to render the description of the section.
				'pt-plugin-base'                           // Page on which to add this section of options.
			);

		if (is_plugin_active('pt-elementor-addons-pro/pt-elementor-addons-pro.php')) {
			add_settings_field(
				'pt_opt_in20',                      // ID used to identify the field throughout the theme.
				__( 'Deactivate Animated Books: ', 'ptbase' ),                           // The label to the left of the option interface element.
				array( $this, 'pt_opt_in_callback20' ),   // The name of the function responsible for rendering the option interface.
				'pt-plugin-base',                          // The page on which this option will be displayed.
				'pt_settings_section_marketing_elements'         // The name of the section to which this field belongs.
			);
			add_settings_field(
				'pt_opt_in15',                      // ID used to identify the field throughout the theme.
				__( 'Deactivate Info Circle: ', 'ptbase' ),                           // The label to the left of the option interface element.
				array( $this, 'pt_opt_in_callback15' ),   // The name of the function responsible for rendering the option interface.
				'pt-plugin-base',                          // The page on which this option will be displayed.
				'pt_settings_section_marketing_elements'         // The name of the section to which this field belongs.
			);
			add_settings_field(
			'pt_opt_in73',                      // ID used to identify the field throughout the theme.
				__( 'Deactivate Testimonials: ', 'ptbase' ),                           // The label to the left of the option interface element.
				array( $this, 'pt_opt_in_callback73' ),   // The name of the function responsible for rendering the option interface.
				'pt-plugin-base',                          // The page on which this option will be displayed.
				'pt_settings_section_marketing_elements'         // The name of the section to which this field belongs.
			);
			add_settings_field(
				'pt_opt_in29',                      // ID used to identify the field throughout the theme.
				__( 'Deactivate Testimonials: ', 'ptbase' ),                           // The label to the left of the option interface element.
				array( $this, 'pt_opt_in_callback29' ),   // The name of the function responsible for rendering the option interface.
				'pt-plugin-base',                          // The page on which this option will be displayed.
				'pt_settings_section_marketing_elements'         // The name of the section to which this field belongs.
			);
		}

		add_settings_field(
			'pt_opt_in63',                      // ID used to identify the field throughout the theme.
			__( 'Deactivate Testimonials: ', 'ptbase' ),                           // The label to the left of the option interface element.
			array( $this, 'pt_opt_in_callback63' ),   // The name of the function responsible for rendering the option interface.
			'pt-plugin-base',                          // The page on which this option will be displayed.
			'pt_settings_section_marketing_elements'         // The name of the section to which this field belongs.
		);

		add_settings_field(
			'pt_opt_in65',                      // ID used to identify the field throughout the theme.
			__( 'Deactivate Testimonials: ', 'ptbase' ),                           // The label to the left of the option interface element.
			array( $this, 'pt_opt_in_callback65' ),   // The name of the function responsible for rendering the option interface.
			'pt-plugin-base',                          // The page on which this option will be displayed.
			'pt_settings_section_marketing_elements'         // The name of the section to which this field belongs.
		);
		add_settings_field(
			'pt_opt_in75',                      // ID used to identify the field throughout the theme.
			__( 'Deactivate Testimonials: ', 'ptbase' ),                           // The label to the left of the option interface element.
			array( $this, 'pt_opt_in_callback75' ),   // The name of the function responsible for rendering the option interface.
			'pt-plugin-base',                          // The page on which this option will be displayed.
			'pt_settings_section_marketing_elements'         // The name of the section to which this field belongs.
		);
		add_settings_field(
			'pt_opt_in78',                      // ID used to identify the field throughout the theme.
			__( 'Deactivate Testimonials: ', 'ptbase' ),                           // The label to the left of the option interface element.
			array( $this, 'pt_opt_in_callback78' ),   // The name of the function responsible for rendering the option interface.
			'pt-plugin-base',                          // The page on which this option will be displayed.
			'pt_settings_section_marketing_elements'         // The name of the section to which this field belongs.
		);
		add_settings_field(
			'pt_opt_in79',                      // ID used to identify the field throughout the theme.
			__( 'Deactivate Testimonials: ', 'ptbase' ),                           // The label to the left of the option interface element.
			array( $this, 'pt_opt_in_callback79' ),   // The name of the function responsible for rendering the option interface.
			'pt-plugin-base',                          // The page on which this option will be displayed.
			'pt_settings_section_marketing_elements'         // The name of the section to which this field belongs.
		);

		add_settings_field(
			'pt_opt_in23',                      // ID used to identify the field throughout the theme.
			__( 'Deactivate Info List: ', 'ptbase' ),                           // The label to the left of the option interface element.
			array( $this, 'pt_opt_in_callback23' ),   // The name of the function responsible for rendering the option interface.
			'pt-plugin-base',                          // The page on which this option will be displayed.
			'pt_settings_section_marketing_elements'         // The name of the section to which this field belongs.
		);

		add_settings_field(
			'pt_opt_in24',                      // ID used to identify the field throughout the theme.
			__( 'Deactivate Smart banner: ', 'ptbase' ),                           // The label to the left of the option interface element.
			array( $this, 'pt_opt_in_callback24' ),   // The name of the function responsible for rendering the option interface.
			'pt-plugin-base',                          // The page on which this option will be displayed.
			'pt_settings_section_marketing_elements'         // The name of the section to which this field belongs.
		);

		add_settings_field(
			'pt_opt_in31',                      // ID used to identify the field throughout the theme.
			__( 'Deactivate Testimonials: ', 'ptbase' ),                           // The label to the left of the option interface element.
			array( $this, 'pt_opt_in_callback31' ),   // The name of the function responsible for rendering the option interface.
			'pt-plugin-base',                          // The page on which this option will be displayed.
			'pt_settings_section_marketing_elements'         // The name of the section to which this field belongs.
		);
		


		//CREATIVE ELEMENTS
			add_settings_section(
				'pt_settings_section_creative_elements',         // ID used to identify this section and with which to register options.
				__( 'CREATIVE ELEMENTS', 'ptbase' ),                // Title to be displayed on the administration page.
				array( $this, 'pt_settings_callback' ), // Callback used to render the description of the section.
				'pt-plugin-base'                           // Page on which to add this section of options.
			);

			//pro
			if (is_plugin_active('pt-elementor-addons-pro/pt-elementor-addons-pro.php')) {
				add_settings_field(
					'pt_opt_in13',                      // ID used to identify the field throughout the theme.
					__( 'Deactivate Creative Link: ', 'ptbase' ),                           // The label to the left of the option interface element.
					array( $this, 'pt_opt_in_callback13' ),   // The name of the function responsible for rendering the option interface.
					'pt-plugin-base',                          // The page on which this option will be displayed.
					'pt_settings_section_creative_elements'         // The name of the section to which this field belongs.
				);
			}

			//lite
			add_settings_field(
				'pt_opt_in11',                      // ID used to identify the field throughout the theme.
				__( 'Deactivate Interactive Banner: ', 'ptbase' ),                           // The label to the left of the option interface element.
				array( $this, 'pt_opt_in_callback11' ),   // The name of the function responsible for rendering the option interface.
				'pt-plugin-base',                          // The page on which this option will be displayed.
				'pt_settings_section_creative_elements'         // The name of the section to which this field belongs.
			);

			add_settings_field(
				'pt_opt_in69',                      // ID used to identify the field throughout the theme.
				__( 'Deactivate Testimonials: ', 'ptbase' ),                           // The label to the left of the option interface element.
				array( $this, 'pt_opt_in_callback69' ),   // The name of the function responsible for rendering the option interface.
				'pt-plugin-base',                          // The page on which this option will be displayed.
				'pt_settings_section_creative_elements'         // The name of the section to which this field belongs.
			);

			add_settings_field(
				'pt_opt_in72',                      // ID used to identify the field throughout the theme.
				__( 'Deactivate Testimonials: ', 'ptbase' ),                           // The label to the left of the option interface element.
				array( $this, 'pt_opt_in_callback72' ),   // The name of the function responsible for rendering the option interface.
				'pt-plugin-base',                          // The page on which this option will be displayed.
				'pt_settings_section_creative_elements'         // The name of the section to which this field belongs.
			);

			add_settings_field(
				'pt_opt_in77',                      // ID used to identify the field throughout the theme.
				__( 'Deactivate Testimonials: ', 'ptbase' ),                           // The label to the left of the option interface element.
				array( $this, 'pt_opt_in_callback77' ),   // The name of the function responsible for rendering the option interface.
				'pt-plugin-base',                          // The page on which this option will be displayed.
				'pt_settings_section_creative_elements'         // The name of the section to which this field belongs.
			);

			add_settings_field(
				'pt_opt_in30',                      // ID used to identify the field throughout the theme.
				__( 'Deactivate Testimonials: ', 'ptbase' ),                           // The label to the left of the option interface element.
				array( $this, 'pt_opt_in_callback30' ),   // The name of the function responsible for rendering the option interface.
				'pt-plugin-base',                          // The page on which this option will be displayed.
				'pt_settings_section_creative_elements'         // The name of the section to which this field belongs.
			);

			

		//FORM STYLE ELEMENTS
			if ( class_exists( 'GFForms' ) || function_exists( 'caldera_forms_load' ) || function_exists( 'Ninja_Forms' ) || function_exists( 'wpcf7' ) ) {
				add_settings_section(
					'pt_settings_section_form_elements',         // ID used to identify this section and with which to register options.
					__( 'FORM STYLE ELEMENTS', 'ptbase' ),                // Title to be displayed on the administration page.
					array( $this, 'pt_settings_callback' ), // Callback used to render the description of the section.
					'pt-plugin-base'                           // Page on which to add this section of options.
				);
			}
			//pro
			if (is_plugin_active('pt-elementor-addons-pro/pt-elementor-addons-pro.php')) {
				if ( function_exists( 'caldera_forms_load' ) ) {
					add_settings_field(
						'pt_opt_in26',                      // ID used to identify the field throughout the theme.
						__( 'Deactivate Testimonials: ', 'ptbase' ),                           // The label to the left of the option interface element.
						array( $this, 'pt_opt_in_callback26' ),   // The name of the function responsible for rendering the option interface.
						'pt-plugin-base',                          // The page on which this option will be displayed.
						'pt_settings_section_form_elements'         // The name of the section to which this field belongs.
					);
				}
			}

			if ( class_exists( 'GFForms' ) ) {
				add_settings_field(
					'pt_opt_in80',                      // ID used to identify the field throughout the theme.
					__( 'Deactivate Gravity Form: ', 'ptbase' ),                           // The label to the left of the option interface element.
					array( $this, 'pt_opt_in_callback80' ),   // The name of the function responsible for rendering the option interface.
					'pt-plugin-base',                          // The page on which this option will be displayed.
					'pt_settings_section_form_elements'         // The name of the section to which this field belongs.
				);
			}

			if ( function_exists( 'Ninja_Forms' ) ) {
				add_settings_field(
					'pt_opt_in9',                      // ID used to identify the field throughout the theme.
					__( 'Deactivate Ninja Form: ', 'ptbase' ),                           // The label to the left of the option interface element.
					array( $this, 'pt_opt_in_callback9' ),   // The name of the function responsible for rendering the option interface.
					'pt-plugin-base',                          // The page on which this option will be displayed.
					'pt_settings_section_form_elements'         // The name of the section to which this field belongs.
				);
			}

			if ( function_exists( 'wpcf7' ) ) {
				add_settings_field(
					'pt_opt_in7',                      // ID used to identify the field throughout the theme.
					__( 'Deactivate Contact Form 7: ', 'ptbase' ),                           // The label to the left of the option interface element.
					array( $this, 'pt_opt_in_callback7' ),   // The name of the function responsible for rendering the option interface.
					'pt-plugin-base',                          // The page on which this option will be displayed.
					'pt_settings_section_form_elements'         // The name of the section to which this field belongs.
				);
			}
		
	}
	
	/**
	 *  Adding right and bottom meta boxes to Pages
	 */
	public function pt_settings_callback() {
		//echo _e( 'Enable me', 'ptbase' );
	}
	public function pt_settings_callback1() {
		//echo _e( 'Enable me', 'ptbase' );
	}
	/**
	 *  Adding right and bottom meta boxes to Pages
	 */
	public function pt_opt_in_callback() {
		$enabled = false;
		$out = '';
		$val = false;
		// check if checkbox is checked.
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in'] ) ) {
			$val = true;
		}
		if ( isset( $this->pt_setting['pt_opt_in'] ) ) {
			$out = '<div class="pt-checkbox">';
			$out.=  '<p class="pt-title-chck">Team <span class="_tag">LITE</span></p> ';
			$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
			$out.= '<label class="switch">';
			$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in]" value="1" checked />';
			$out.= ' <span class="slider round"></span>';
			$out.= '</label>';
			$out.= '</div>';
		} else {
			$out = '<div class="pt-checkbox">';
			$out.=  '<p class="pt-title-chck">Team  <span class="_tag">LITE</span></p>';
			$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
			$out.= '<label class="switch">';
			$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in]" value="0" />';
			$out.= ' <span class="slider round"></span>';
			$out.= '</label>';
			$out.= '</div>';
		}
		echo $out;
	}
	/**
	 *  Adding right and bottom meta boxes to Pages
	 */
	public function pt_opt_in_callback1() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in1'] ) ) {
			$val = true;
		}
		if ( isset( $this->pt_setting['pt_opt_in1'] ) ) {
			$out = '<div class="pt-checkbox">';
			$out.=  '<p class="pt-title-chck">Flip Box <span class="_tag">LITE</span></p>';
			$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
			$out.= '<label class="switch">';
			$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in1]" value="1" checked />';
			$out.= ' <span class="slider round"></span>';
			$out.= '</label>';
			$out.= '</div>';
		} else {
			$out = '<div class="pt-checkbox">';
			$out.=  '<p class="pt-title-chck">Flip Box <span class="_tag">LITE</span></p>';
			$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
			$out.= '<label class="switch">';
			$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in1]" value="0" />';
			$out.= ' <span class="slider round"></span>';
			$out.= '</label>';
			$out.= '</div>';
		}
		echo $out;
	}
	/**
	 *  Adding right and bottom meta boxes to Pages
	 */
	public function pt_opt_in_callback2() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in2'] ) ) {
			$val = true;
		}
		
		if ( isset( $this->pt_setting['pt_opt_in2'] ) ) {
			$out = '<div class="pt-checkbox">';
			$out.=  '<p class="pt-title-chck">Dual Button <span class="_tag">LITE</span></p> ';
			$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
			$out.= '<label class="switch">';
			$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in2]" value="1" checked />';
			$out.= ' <span class="slider round"></span>';
			$out.= '</label>';
			$out.= '</div>';
		} else {
			$out = '<div class="pt-checkbox">';
			$out.=  '<p class="pt-title-chck">Dual Button <span class="_tag">LITE</span></p> ';
			$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
			$out.= '<label class="switch">';
			$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in2]" value="0" />';
			$out.= ' <span class="slider round"></span>';
			$out.= '</label>';
			$out.= '</div>';
		}
		echo $out;
	}
	/**
	 *  Adding right and bottom meta boxes to Pages
	 */
	public function pt_opt_in_callback3() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in3'] ) ) {
			$val = true;
		}
		if ( isset( $this->pt_setting['pt_opt_in3'] ) ) {
			$out = '<div class="pt-checkbox">';
			$out.=  '<p class="pt-title-chck">Post Timeline <span class="_tag">LITE</span></p>';
			$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
			$out.= '<label class="switch">';
			$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in3]" value="1" checked />';
			$out.= ' <span class="slider round"></span>';
			$out.= '</label>';
			$out.= '</div>';
		} else {
			$out = '<div class="pt-checkbox">';
			$out.=  '<p class="pt-title-chck">Post Timeline <span class="_tag">LITE</span></p>';
			$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
			$out.= '<label class="switch">';
			$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in3]" value="0" />';
			$out.= ' <span class="slider round"></span>';
			$out.= '</label>';
			$out.= '</div>';
		}
		echo $out;
	}
	/**
	 *  Adding right and bottom meta boxes to Pages
	 */
	public function pt_opt_in_callback4() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in4'] ) ) {
			$val = true;
		}
		if ( isset( $this->pt_setting['pt_opt_in4'] ) ) {
			$out = '<div class="pt-checkbox">';
			$out.=  '<p class="pt-title-chck">Info Box <span class="_tag">LITE</span></p>';
			$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
			$out.= '<label class="switch">';
			$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in4]" value="1" checked />';
			$out.= ' <span class="slider round"></span>';
			$out.= '</label>';
			$out.= '</div>';
		} else {
			$out = '<div class="pt-checkbox">';
			$out.=  '<p class="pt-title-chck">Info Box <span class="_tag">LITE</span></p>';
			$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
			$out.= '<label class="switch">';
			$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in4]" value="0" />';
			$out.= ' <span class="slider round"></span>';
			$out.= '</label>';
			$out.= '</div>';
		}
		echo $out;
	}

	/**
	 *  Adding right and bottom meta boxes to Pages
	 */
	public function pt_opt_in_callback6() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in6'] ) ) {
			$val = true;
		}
		if ( isset( $this->pt_setting['pt_opt_in6'] ) ) {
			$out = '<div class="pt-checkbox">';
			$out.=  '<p class="pt-title-chck">Testimonials <span class="_tag">LITE</span></p>';
			$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
			$out.= '<label class="switch">';
			$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in6]" value="1" checked />';
			$out.= ' <span class="slider round"></span>';
			$out.= '</label>';
		} else {
			$out = '<div class="pt-checkbox">';
			$out.=  '<p class="pt-title-chck">Testimonials <span class="_tag">LITE</span></p>';
			$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
			$out.= '<label class="switch">';
			$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in6]" value="0" />';
			$out.= ' <span class="slider round"></span>';
			$out.= '</label>';
		}
		echo $out;
	}
	/**
	 *  Adding right and bottom meta boxes to Pages
	 */
	public function pt_opt_in_callback7() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in7'] ) ) {
			$val = true;
		}
		if ( function_exists( 'wpcf7' ) ) {
			if ( isset( $this->pt_setting['pt_opt_in7'] ) ) {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck">Contact Form 7 <span class="_tag">LITE</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in7]" value="1" checked />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			} else {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck">Contact Form 7 <span class="_tag">LITE</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in7]" value="0" />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			}
		}
		echo $out;
	}
	
	/**
	 *  Adding right and bottom meta boxes to Pages
	 */
	public function pt_opt_in_callback9() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in9'] ) ) {
			$val = true;
		}
		if ( function_exists( 'Ninja_Forms' ) ) {
			if ( isset( $this->pt_setting['pt_opt_in9'] ) ) {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck">Ninja Form <span class="_tag">LITE</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in9]" value="1" checked />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			} else {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck">Ninja Form <span class="_tag">LITE</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in9]" value="0" />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			}
		}
		echo $out;
	}
	/**
	 *  Adding right and bottom meta boxes to Pages
	 */
	public function pt_opt_in_callback10() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in10'] ) ) {
			$val = true;
		}
		if ( class_exists( 'WPForms' ) ) {
			if ( isset( $this->pt_setting['pt_opt_in10'] ) ) {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> Wpforms </p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in10]" value="1" checked />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			} else {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck">Wpforms </p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in10]" value="0" />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			}
		}
		echo $out;
	}
	public function pt_opt_in_callback55() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in55'] ) ) {
			$val = true;
		}
		if ( class_exists( 'WeForms' ) ) {
			if ( isset( $this->pt_setting['pt_opt_in55'] ) ) {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> WeForms </p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in55]" value="1" checked />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			} else {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck">WeForms </p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in55]" value="0" />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			}
		}
		echo $out;
	}
	public function pt_opt_in_callback56() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in56'] ) ) {
			$val = true;
		}
			if ( isset( $this->pt_setting['pt_opt_in56'] ) ) {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> Product Grid <span class="_tag">LITE</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in56]" value="1" checked />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			} else {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck">Product Grid <span class="_tag">LITE</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in56]" value="0" />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			}
		
		echo $out;
	}
	
	public function pt_opt_in_callback58() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in58'] ) ) {
			$val = true;
		}
			if ( isset( $this->pt_setting['pt_opt_in58'] ) ) {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> Post carousel <span class="_tag">LITE</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in58]" value="1" checked />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			} else {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck">Post carousel <span class="_tag">LITE</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in58]" value="0" />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			}
		
		echo $out;
	}
	public function pt_opt_in_callback59() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in59'] ) ) {
			$val = true;
		}
			if ( isset( $this->pt_setting['pt_opt_in59'] ) ) {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> Map <span class="_tag">LITE</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in59]" value="1" checked />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			} else {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck">Map <span class="_tag">LITE</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in59]" value="0" />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			}
		
		echo $out;
	}
	public function pt_opt_in_callback60() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in60'] ) ) {
			$val = true;
		}
			if ( isset( $this->pt_setting['pt_opt_in60'] ) ) {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> Team Members <span class="_tag">LITE</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in60]" value="1" checked />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			} else {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck">Team Members <span class="_tag">LITE</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in60]" value="0" />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			}
		
		echo $out;
	}
	
	public function pt_opt_in_callback62() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in62'] ) ) {
			$val = true;
		}
		
			if ( isset( $this->pt_setting['pt_opt_in62'] ) ) {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> advance accordion <span class="_tag">LITE</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in62]" value="1" checked />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			} else {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> advance accordion <span class="_tag">LITE</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in62]" value="0" />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			}
	
		echo $out;
	}
	
		public function pt_opt_in_callback63() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in63'] ) ) {
			$val = true;
		}
		
			if ( isset( $this->pt_setting['pt_opt_in63'] ) ) {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> Pricing Table <span class="_tag">LITE</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in63]" value="1" checked />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			} else {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> Pricing Table <span class="_tag">LITE</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in63]" value="0" />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			}
	
		echo $out;
	}
	
	public function pt_opt_in_callback64() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in64'] ) ) {
			$val = true;
		}
		
			if ( isset( $this->pt_setting['pt_opt_in64'] ) ) {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> Pricing Tables <span class="_tag">PRO</span></p> ';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in64]" value="1" checked />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			} else {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> Pricing Tables <span class="_tag">PRO</span></p> ';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in64]" value="0" />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			}
	
		echo $out;
	}
	public function pt_opt_in_callback65() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in65'] ) ) {
			$val = true;
		}
		
			if ( isset( $this->pt_setting['pt_opt_in65'] ) ) {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> clients list <span class="_tag">LITE</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in65]" value="1" checked />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			} else {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> clients list <span class="_tag">LITE</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in65]" value="0" />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			}
	
		echo $out;
	}
	public function pt_opt_in_callback66() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in66'] ) ) {
			$val = true;
		}
		
			if ( isset( $this->pt_setting['pt_opt_in66'] ) ) {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> Advance Tab <span class="_tag">LITE</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in66]" value="1" checked />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			} else {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> Advance Tab <span class="_tag">LITE</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in66]" value="0" />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			}
	
		echo $out;
	}
	public function pt_opt_in_callback67() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in67'] ) ) {
			$val = true;
		}
		
			if ( isset( $this->pt_setting['pt_opt_in67'] ) ) {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> Data Table <span class="_tag">LITE</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in67]" value="1" checked />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			} else {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> Data Table <span class="_tag">LITE</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in67]" value="0" />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			}
	
		echo $out;
	}
	public function pt_opt_in_callback68() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in68'] ) ) {
			$val = true;
		}
		
			if ( isset( $this->pt_setting['pt_opt_in68'] ) ) {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> Tooltips <span class="_tag">LITE</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in68]" value="1" checked />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			} else {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> Tooltips <span class="_tag">LITE</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in68]" value="0" />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			}
	
		echo $out;
	}

		public function pt_opt_in_callback69() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in69'] ) ) {
			$val = true;
		}
		
			if ( isset( $this->pt_setting['pt_opt_in69'] ) ) {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> Image Accordian <span class="_tag">LITE</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in69]" value="1" checked />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			} else {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> Image Accordian <span class="_tag">LITE</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in69]" value="0" />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			}
	
		echo $out;
	}

	public function pt_opt_in_callback70() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in70'] ) ) {
			$val = true;
		}
		
			if ( isset( $this->pt_setting['pt_opt_in70'] ) ) {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> Dual Color Header <span class="_tag">LITE</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in70]" value="1" checked />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			} else {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> Dual Color Header <span class="_tag">LITE</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in70]" value="0" />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			}
	
		echo $out;
	}
	public function pt_opt_in_callback71() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in71'] ) ) {
			$val = true;
		}
		
			if ( isset( $this->pt_setting['pt_opt_in71'] ) ) {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> InfoBox2 <span class="_tag">PRO</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in71]" value="1" checked />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			} else {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> InfoBox2 <span class="_tag">PRO</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in71]" value="0" />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			}
	
		echo $out;
	}
	public function pt_opt_in_callback72() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in72'] ) ) {
			$val = true;
		}
		
			if ( isset( $this->pt_setting['pt_opt_in72'] ) ) {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> filterable gallery <span class="_tag">LITE</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in72]" value="1" checked />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			} else {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> filterable gallery <span class="_tag">LITE</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in72]" value="0" />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			}
	
		echo $out;
	}
	public function pt_opt_in_callback73() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in73'] ) ) {
			$val = true;
		}
		
			if ( isset( $this->pt_setting['pt_opt_in73'] ) ) {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> Call to action <span class="_tag">PRO</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in73]" value="1" checked />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			} else {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> Call to action <span class="_tag">PRO</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in73]" value="0" />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			}
	
		echo $out;
	}
	public function pt_opt_in_callback747() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in747'] ) ) {
			$val = true;
		}
		
			if ( isset( $this->pt_setting['pt_opt_in747'] ) ) {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> Advance Button <span class="_tag">PRO</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in747]" value="1" checked />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			} else {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> Advance Button  <span class="_tag">PRO</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in747]" value="0" />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			}
	
		echo $out;
	}
	
	public function pt_opt_in_callback75() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in75'] ) ) {
			$val = true;
		}
		
			if ( isset( $this->pt_setting['pt_opt_in75'] ) ) {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> Pie Charts <span class="_tag">LITE</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in75]" value="1" checked />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			} else {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> Pie Charts <span class="_tag">LITE</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in75]" value="0" />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			}
	
		echo $out;
	}
	
	public function pt_opt_in_callback76() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in76'] ) ) {
			$val = true;
		}
		
			if ( isset( $this->pt_setting['pt_opt_in76'] ) ) {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> Blog Post Grid <span class="_tag">LITE</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in76]" value="1" checked />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			} else {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> Blog Post Grid  <span class="_tag">LITE</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in76]" value="0" />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			}
	
		echo $out;
	}
	public function pt_opt_in_callback77() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in77'] ) ) {
			$val = true;
		}
		
			if ( isset( $this->pt_setting['pt_opt_in77'] ) ) {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> Dual Header <span class="_tag">LITE</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in77]" value="1" checked />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			} else {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> Dual Header <span class="_tag">LITE</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in77]" value="0" />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			}
	
		echo $out;
	}
	public function pt_opt_in_callback78() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in78'] ) ) {
			$val = true;
		}
		
			if ( isset( $this->pt_setting['pt_opt_in78'] ) ) {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> Services <span class="_tag">LITE</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in78]" value="1" checked />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			} else {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> Services <span class="_tag">LITE</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in78]" value="0" />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			}
	
		echo $out;
	}

	public function pt_opt_in_callback79() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in79'] ) ) {
			$val = true;
		}
		
			if ( isset( $this->pt_setting['pt_opt_in79'] ) ) {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> stats bar <span class="_tag">LITE</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in79]" value="1" checked />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			} else {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> stats bar <span class="_tag">LITE</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in79]" value="0" />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			}
	
		echo $out;
	}


	/**
	 *  Adding right and bottom meta boxes to Pages
	 */
	public function pt_opt_in_callback80() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in8'] ) ) {
			$val = true;
		}
		if ( class_exists( 'GFForms' ) ) {
			if ( isset( $this->pt_setting['pt_opt_in8'] ) ) {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> Gravity Form <span class="_tag">LITE</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in8]" value="1" checked />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			} else {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> Gravity Form <span class="_tag">LITE</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in8]" value="0" />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			}
		}
		echo $out;
	}
	
	
	
	public function pt_opt_in_callback12() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in12'] ) ) {
			$val = true;
		}
			
			if ( isset( $this->pt_setting['pt_opt_in12'])  ) {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> Testimonials Slider <span class="_tag">PRO</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in12]" value="1" checked />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			} else {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck">Testimonials Slider <span class="_tag">PRO</span> </p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in12]" value="0" />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			}
		echo $out;
	}
	public function pt_opt_in_callback13() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in13'] ) ) {
			$val = true;
		}
			
			if ( isset( $this->pt_setting['pt_opt_in13'])  ) {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> Creative Link <span class="_tag">PRO</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in13]" value="1" checked />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			} else {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck">Creative Link <span class="_tag">PRO</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in13]" value="0" />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			}
		
		
		echo $out;
	}
	public function pt_opt_in_callback14() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in14'] ) ) {
			$val = true;
		}
			
			if ( isset( $this->pt_setting['pt_opt_in14'])  ) {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> Hover Cards <span class="_tag">PRO</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in14]" value="1" checked />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			} else {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck">Hover Cards <span class="_tag">PRO</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in14]" value="0" />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			}
		
		
		echo $out;
	}
	public function pt_opt_in_callback15() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in15'] ) ) {
			$val = true;
		}
			
			if ( isset( $this->pt_setting['pt_opt_in15'])  ) {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> Info Circle <span class="_tag">PRO</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in15]" value="1" checked />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			} else {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck">Info Circle <span class="_tag">PRO</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in15]" value="0" />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			}
		
		
		echo $out;
	}
	public function pt_opt_in_callback16() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in16'] ) ) {
			$val = true;
		}
			
			if ( isset( $this->pt_setting['pt_opt_in16'])  ) {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> Stats Counter <span class="_tag">PRO</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in16]" value="1" checked />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			} else {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck">Stats Counter <span class="_tag">PRO</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in16]" value="0" />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			}
		
		
		echo $out;
	}
	public function pt_opt_in_callback17() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in17'] ) ) {
			$val = true;
		}
			
			if ( isset( $this->pt_setting['pt_opt_in17'])  ) {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> Post Grid <span class="_tag">PRO</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in17]" value="1" checked />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			} else {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck">Post Grid <span class="_tag">PRO</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in17]" value="0" />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			}
		
		
		echo $out;
	}
	public function pt_opt_in_callback18() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in18'] ) ) {
			$val = true;
		}
			
			if ( isset( $this->pt_setting['pt_opt_in18'])  ) {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> iHover <span class="_tag">PRO</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in18]" value="1" checked />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			} else {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck">iHover <span class="_tag">PRO</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in18]" value="0" />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			}
		
		
		echo $out;
	}
	public function pt_opt_in_callback19() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in19'] ) ) {
			$val = true;
		}
			
			if ( isset( $this->pt_setting['pt_opt_in19'])  ) {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> 3D iHover <span class="_tag">PRO</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in19]" value="1" checked />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			} else {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck">3D iHover <span class="_tag">PRO</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in19]" value="0" />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			}
		
		
		echo $out;
	}
	public function pt_opt_in_callback20() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in20'] ) ) {
			$val = true;
		}
			
			if ( isset( $this->pt_setting['pt_opt_in20'])  ) {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> Animated Books <span class="_tag">PRO</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in20]" value="1" checked />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			} else {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck">Animated Books <span class="_tag">PRO</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in20]" value="0" />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			}
		
		
		echo $out;
	}
	public function pt_opt_in_callback21() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in21'] ) ) {
			$val = true;
		}
			
			if ( isset( $this->pt_setting['pt_opt_in21'])  ) {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> Heading <span class="_tag">PRO</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in21]" value="1" checked />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			} else {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck">Heading <span class="_tag">PRO</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in21]" value="0" />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			}
		
		
		echo $out;
	}
	public function pt_opt_in_callback22() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in22'] ) ) {
			$val = true;
		}
			
			if ( isset( $this->pt_setting['pt_opt_in22'])  ) {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> Smart Box <span class="_tag">PRO</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in22]" value="1" checked />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			} else {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck">Smart Box <span class="_tag">PRO</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in22]" value="0" />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			}
		
		
		echo $out;
	}
	public function pt_opt_in_callback23() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in23'] ) ) {
			$val = true;
		}
			
			if ( isset( $this->pt_setting['pt_opt_in23'])  ) {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> Info List <span class="_tag">LITE</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in23]" value="1" checked />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			} else {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck">Info List <span class="_tag">LITE</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in23]" value="0" />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			}
		
		
		echo $out;
	}
	public function pt_opt_in_callback24() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in24'] ) ) {
			$val = true;
		}
			
			if ( isset( $this->pt_setting['pt_opt_in24'])  ) {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> Smart banner <span class="_tag">LITE</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in24]" value="1" checked />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			} else {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck">Smart banner <span class="_tag">LITE</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in24]" value="0" />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			}
		
		
		echo $out;
	}



	public function pt_opt_in_callback25() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in25'] ) ) {
			$val = true;
		}
			
			if ( isset( $this->pt_setting['pt_opt_in25'])  ) {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck">ADVANCE ANIMATED HEADLINE <span class="_tag">PRO</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in25]" value="1" checked />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			} else {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck">ADVANCE ANIMATED HEADLINE <span class="_tag">PRO</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in25]" value="0" />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			}
		
		
		echo $out;
	}

	public function pt_opt_in_callback26() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in26'] ) ) {
			$val = true;
		}
		if ( function_exists( 'caldera_forms_load' ) ) {
			if ( isset( $this->pt_setting['pt_opt_in26'] ) ) {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> caldera Forms <span class="_tag">PRO</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in26]" value="1" checked />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			} else {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> caldera Forms <span class="_tag">PRO</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in26]" value="0" />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			}
		}
		echo $out;
	}

	public function pt_opt_in_callback27() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in27'] ) ) {
			$val = true;
		}
			if ( isset( $this->pt_setting['pt_opt_in27'] ) ) {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> Model Box <span class="_tag">PRO</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in27]" value="1" checked />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			} else {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck">Model Box <span class="_tag">PRO</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in27]" value="0" />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			}
		
		echo $out;
	}

	
	public function pt_opt_in_callback29() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in29'] ) ) {
			$val = true;
		}
		if ( class_exists( 'GFForms' ) ) {
			if ( isset( $this->pt_setting['pt_opt_in29'] ) ) {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck">News Ticker <span class="_tag">PRO</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in29]" value="1" checked />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			} else {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck">News Ticker <span class="_tag">PRO</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in29]" value="0" />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			}
		}
		echo $out;
	}

	public function pt_opt_in_callback30() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in30'] ) ) {
			$val = true;
		}
		if ( class_exists( 'GFForms' ) ) {
			if ( isset( $this->pt_setting['pt_opt_in30'] ) ) {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck">Logo Grid  <span class="_tag">LITE</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in30]" value="1" checked />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			} else {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck">Logo Grid <span class="_tag">LITE</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in30]" value="0" />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			}
		}
		echo $out;
	}

	public function pt_opt_in_callback31() {
		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in31'] ) ) {
			$val = true;
		}
		if ( class_exists( 'GFForms' ) ) {
			if ( isset( $this->pt_setting['pt_opt_in31'] ) ) {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck">Business Hours <span class="_tag">LITE</span> </p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in31]" value="1" checked />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			} else {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck">Business Hours <span class="_tag">LITE</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in31]" value="0" />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			}
		}
		echo $out;
	}

	

	/// Pro 
	
	public function pt_opt_in_callback11() {

		$enabled = false;
		$out = '';
		$val = false;
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in11'] ) ) {
			$val = true;
		}
			
			if ( isset( $this->pt_setting['pt_opt_in11'])  ) {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck"> Interactive Banner <span class="_tag">LITE</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in11]" value="1" checked />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			} else {
				$out = '<div class="pt-checkbox">';
				$out.=  '<p class="pt-title-chck">Interactive Banner <span class="_tag">LITE</span></p>';
				$out.=  '<p class="pt-desc-chck">Activate / Deactivate</p>';
				$out.= '<label class="switch">';
				$out.= '<input type="checkbox" id="pt_opt_in" name="pt_setting[pt_opt_in11]" value="0" />';
				$out.= ' <span class="slider round"></span>';
				$out.= '</label>';
			}
		echo $out;
	}
	/**
	 *  Adding right and bottom meta boxes to Pages
	 */
	public function pt_sample_text_callback() {
		$out = '';
		$val = '';
		// check if checkbox is checked.
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_sample_text'] ) ) {
			$val = $this->pt_setting['pt_sample_text'];
		}
		$out = '<input type="text" id="pt_sample_text" name="pt_setting[pt_sample_text]" value="' . $val . '"  />';
		echo $out;
	}
	/**
	 * Helper Settings function if you need a setting from the outside.
	 *
	 * Keep in mind that in our demo the Settings class is initialized in a specific environment and if you
	 * want to make use of this function, you should initialize it earlier (before the base class)
	 *
	 * @return boolean is enabled
	 */
	public function is_enabled() {
		if ( ! empty( $this->pt_setting ) && isset( $this->pt_setting['pt_opt_in'] ) ) {
			return true;
		}
		return false;
	}
	/**
	 * Validate Settings
	 *
	 * @param post $input the post object of the given page.
	 */
	public function pt_validate_settings( $input ) {
		return $input;
	}
}
