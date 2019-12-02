<?php
/**
 * class-pt-elementor-modelbox.php
 *
 * @author    Param Themes <paramthemes@gmail.com>
 * @copyright 2018 Param Themes
 * @license   Param Theme
 * @package   Elementor
 * @see       https://www.paramthemes.com
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
	/**
	 * Define our Pt Elementor Tetstimonials settings.
	 */
class Pt_Elementor_Modelbox extends Widget_Base {

	/**
	 * Define our Get Name Function settings.
	 */
	public function get_name() {
		return 'pt-modelbox';
	}
	
	/**
	 * Define our get title settings.
	 */
	public function get_title() {
		return __( 'ModelBox', 'elementor' );
	}
	/**
	 * Define our get icon settings.
	 */
	public function get_icon() {
		//return 'eicon-inner-section';
		return 'eicon-select';
	}
	 public function check_rtl(){
        return is_rtl();
    }
	/**
	 * Define our get categories settings.
	 */
	public function get_categories() {
		return [ 'pt-elementor-addons' ];
	}
	/**
	 * Define our _register_controls settings.
	 */
	protected function _register_controls() {

	$this->start_controls_section('pt_modal_box_selector_content_section', 
                [
                    'label'         => esc_html__('Content', 'elementor'),
                ]
                );
        
        $this->add_control('pt_modal_box_header_switcher',
                [
                    'label'         => esc_html__('Header', 'elementor'),
                    'type'          => Controls_Manager::SWITCHER,
                    'label_on'      => 'show',
                    'label_off'     => 'hide',
                    'default'       => 'yes',
                    'description'   => esc_html__('Enable or disable modal header','elementor'),
                ]
                );
        
        /*Icon To Display*/
        $this->add_control('pt_modal_box_icon_selection',
                [
                    'label'         => esc_html__('Icon', 'elementor'),
                    'type'          => Controls_Manager::SELECT,
                    'description'   => esc_html__('Use font awesome icon or upload a custom image', 'elementor'),
                    'options'       => [
                        'noicon'  => esc_html('None'),
                        'fonticon'=> esc_html('Font Awesome'),
                        'image'   => esc_html('Custom Image'),
                    ],
                    'default'       => 'noicon',
                    'condition'     => [
                        'pt_modal_box_header_switcher' => 'yes'
                    ],
                    'label_block'   => true
                ]
                );
        
        /*Font Awesome Icon*/
        $this->add_control('pt_modal_box_font_icon', 
                [
                    'label'         => esc_html__('Font Awesome', 'elementor'),
                    'type'          => Controls_Manager::ICON,
                    'condition'     => [
                        'pt_modal_box_icon_selection'    => 'fonticon',
                        'pt_modal_box_header_switcher' => 'yes'
                    ],
                    'label_block'   => true,
                ]
                );
        
        /*Image Icon*/ 
        $this->add_control('pt_modal_box_image_icon',
                [
                    'label'         => esc_html__('Custom Image', 'elementor'),
                    'type'          => Controls_Manager::MEDIA,
                    'default'       => [
                        'url'   => Utils::get_placeholder_image_src(),
                    ],
                    'condition'     => [
                        'pt_modal_box_icon_selection'    => 'image',
                        'pt_modal_box_header_switcher' => 'yes'
                    ],
                    'label_block'   => true,
                ]
                );

        /*Modal Box Title*/ 
        $this->add_control('pt_modal_box_title',
                [
                    'label'         => esc_html__('Title', 'elementor'),
                    'type'          => Controls_Manager::TEXT,
                    'description'   => esc_html__('Provide the modal box with a title', 'elementor'),
                    'default'       => 'Modal Box Title',
                    'condition'     => [
                        'pt_modal_box_header_switcher' => 'yes'
                    ],
                    'label_block'   => true,
                ]
                );
        
        /*Modal Box Content Heading*/
        $this->add_control('pt_modal_box_content_heading',
                [
                    'label'         => esc_html__('Content', 'elementor'),
                    'type'          => Controls_Manager::HEADING,
                ]
                );
        
        /*Modal Box Content Type*/
        $this->add_control('pt_modal_box_content_type',
                [
                    'label'         => esc_html__('Content to Show', 'elementor'),
                    'type'          => Controls_Manager::SELECT,
                    'options'       => [
                        'editor'        => esc_html('Text Editor', 'elementor'),
                        'template'      => esc_html('Elementor Template', 'elementor'),
						 'youtube'        => esc_html('youtube link', 'elementor'),
                        'vimeo'      => esc_html('Vimeo link', 'elementor'),
                    ],
                    'default'       => 'editor',
                    'label_block'   => true
                ]
                );
				
		$this->add_control(
			'youtube_link',
			[
				'label' => __( 'Link', 'elementor' ),
				'type' =>  Controls_Manager::URL,
				'placeholder' => __( 'Enter your YouTube link', 'elementor' ),
				'label_block' => true,
				'condition' => [
					'pt_modal_box_content_type' => 'youtube',
				],
			]
		);
        $this->add_control(
			'vimeo_link',
			[
				'label' => __( 'Link', 'elementor' ),
				'type' =>  Controls_Manager::URL,
				'placeholder' => __( 'Enter your Vimeo link', 'elementor' ),
				'label_block' => true,
				'condition' => [
					'pt_modal_box_content_type' => 'vimeo',
				],
			]
		);
        /*Modal Box Elementor Template*/
        $this->add_control('pt_modal_box_content_temp',
                [
                    'label'			=> esc_html__( 'Content', 'elementor' ),
                    'description'	=> esc_html__( 'Modal content is a template which you can choose from Elementor library', 'elementor' ),
                    'type' => Controls_Manager::SELECT2,
                    'options' => get_elementor_page_list(),
                    'condition'     => [
                        'pt_modal_box_content_type'    => 'template',
                    ],
                ]
            );
        
        /*Modal Box Content*/
        $this->add_control('pt_modal_box_content',
                [
                    'type'          => Controls_Manager::WYSIWYG,
                    'default'       => 'Modal Box Content',
                    'selector'      => '{{WRAPPER}} .pt-modal-box-modal-body',
                    'condition'     => [
                        'pt_modal_box_content_type'    => 'editor',
                    ],
                    'show_label'    => false,
                ]
                );

        /*Upper Close Button*/
        $this->add_control('pt_modal_box_upper_close',
                [
                    'label'         => esc_html__('Upper Close Button', 'elementor'),
                    'type'          => Controls_Manager::SWITCHER,
                    'default'       => 'yes',
                    'condition'     => [
                        'pt_modal_box_header_switcher' => 'yes'
                    ]
                ]
                );
        
        /*Lower Close Button*/
        $this->add_control('pt_modal_box_lower_close',
                [
                    'label'         => esc_html__('Lower Close Button', 'elementor'),
                    'type'          => Controls_Manager::SWITCHER,
                    'default'       => 'yes',
                ]
                );
        
        $this->end_controls_section();
		
		 $this->start_controls_section('pt_modal_box_content_section',
                [
                    'label'         => esc_html__('Display Options', 'elementor'),
                    ]
                );
        
        /*Modal Box Display On*/
        $this->add_control('pt_modal_box_display_on',
                [
                    'label'         => esc_html__('Display Style', 'elementor'),
                    'type'          => Controls_Manager::SELECT,
                    'description'   => esc_html__('Choose where would you like the modal box appear on', 'pt-addons-for-elementor'),
                    'options'       => [
                        'button'  => esc_html('Button','elementor'),
                        'image'   => esc_html('Image','elementor'),
                        'text'    => esc_html('Text','elementor'),
                        'pageload'=> esc_html('Page Load','elementor'),
                    ],
                    'label_block'   =>  true,
                    'default'       => 'button',  
                ]
                );
      
        /*Button Text*/ 
        $this->add_control('pt_modal_box_button_text',
                [
                    'label'         => esc_html__('Button Text', 'elementor'),
                    'default'       => esc_html__('Click Here','elementor'),
                    'type'          => Controls_Manager::TEXT,
                    'label_block'   => true,
                    'condition'     => [
                      'pt_modal_box_display_on'  => 'button'
                    ],
                ]
                );
        
        $this->add_control('pt_modal_box_icon_switcher',
                [
                    'label'         => esc_html__('Icon', 'elementor'),
                    'type'          => Controls_Manager::SWITCHER,
                    'condition'     => [
                        'pt_modal_box_display_on'  => 'button'
                    ],
                    'description'   => esc_html__('Enable or disable button icon','pt-addons-for-elementor'),
                ]
                );

        $this->add_control('pt_modal_box_button_icon_selection',
                [
                    'label'         => esc_html__('Icon', 'elementor'),
                    'type'          => Controls_Manager::ICON,
                    'default'       => 'fa fa-bars',
                    'condition'     => [
                        'pt_modal_box_display_on'  => 'button',
                        'pt_modal_box_icon_switcher'   => 'yes'
                    ],
                    'label_block'   => true,
                ]
                );
        
        $this->add_control('pt_modal_box_icon_position', 
                [
                    'label'         => esc_html__('Icon Position', 'elementor'),
                    'type'          => Controls_Manager::SELECT,
                    'default'       => 'before',
                    'options'       => [
                        'before'        => esc_html__('Before'),
                        'after'         => esc_html__('After'),
                        ],
                    'condition'     => [
                        'pt_modal_box_display_on'  => 'button',
                        'pt_modal_box_icon_switcher'   => 'yes'
                    ],
                    'label_block'   => true,
                    ]
                );
        
        $this->add_control('pt_modal_box_icon_before_size',
                [
                    'label'         => esc_html__('Icon Size', 'elementor'),
                    'type'          => Controls_Manager::SLIDER,
                    'condition'     => [
                        'pt_modal_box_display_on'  => 'button',
                        'pt_modal_box_icon_switcher'   => 'yes'
                    ],
                    'selectors'     => [
                        '{{WRAPPER}} .pt-modal-box-button-selector i '=> 'font-size: {{SIZE}}px',
                    ]
                ]
                );
        
        
        $this->add_control('pt_modal_box_icon_before_spacing',
                [
                    'label'         => esc_html__('Icon Spacing Right', 'elementor'),
                    'type'          => Controls_Manager::SLIDER,
                    'condition'     => [
                        'pt_modal_box_display_on'      => 'button',
                        'pt_modal_box_icon_switcher'   => 'yes',
                        'pt_modal_box_icon_position'   => 'before'
                    ],
                    'default'       => [
                        'size'  => 15
                    ],
                    'selectors'     => [
                        '{{WRAPPER}} .pt-modal-box-button-selector i' => 'margin-right: {{SIZE}}px',
                    ],
                    //'separator'     => 'after',
                ]
            );
     
        
       
        $this->add_control('pt_modal_box_icon_after_spacing',
                [
                    'label'         => esc_html__('Icon Spacing Left', 'elementor'),
                    'type'          => Controls_Manager::SLIDER,
                    'condition'     => [
                        'pt_modal_box_display_on'      => 'button',
                        'pt_modal_box_icon_switcher'   => 'yes',
                        'pt_modal_box_icon_position'   => 'after'
                    ],
                    'default'       => [
                        'size'  => 15
                    ],
                    'selectors'     => [
                        '{{WRAPPER}} .pt-modal-box-button-selector i' => 'margin-left: {{SIZE}}px',
                    ],
                    //'separator'     => 'after',
                ]
            );
     
        
        
            $this->add_control('pt_modal_box_icon_rtl_before_spacing',
                    [
                        'label'         => esc_html__('Icon Spacing Left', 'elementor'),
                        'type'          => Controls_Manager::SLIDER,
                        'condition'     => [
                            'pt_modal_box_display_on'      => 'button',
                            'pt_modal_box_icon_switcher'   => 'yes',
                            'pt_modal_box_icon_position'   => 'before'
                        ],
                        'default'       => [
                            'size'  => 15
                        ],
                        'selectors'     => [
                            '{{WRAPPER}} .pt-modal-box-button-selector i' => 'margin-left: {{SIZE}}px',
                        ],
                        //'separator'     => 'after',
                    ]
                );
         
        
        
            $this->add_control('pt_modal_box_icon_rtl_after_spacing',
                    [
                        'label'         => esc_html__('Icon Spacing Right', 'elementor'),
                        'type'          => Controls_Manager::SLIDER,
                        'condition'     => [
                            'pt_modal_box_display_on'      => 'button',
                            'pt_modal_box_icon_switcher'   => 'yes',
                            'pt_modal_box_icon_position'   => 'after'
                        ],
                        'default'       => [
                            'size'  => 15
                        ],
                        'selectors'     => [
                            '{{WRAPPER}} .pt-modal-box-button-selector i' => 'margin-right: {{SIZE}}px',
                        ],
                        //'separator'     => 'after',
                    ]
                );
       
        
        /*Button Size*/
        $this->add_control('pt_modal_box_button_size',
                [
                    'label'         => esc_html__('Button Size', 'elementor'),
                    'type'          => Controls_Manager::SELECT,
                    'options'       => [
                        'sm'    => esc_html('Small','elementor'),
                        'md'    => esc_html('Medium','elementor'),
                        'lg'    => esc_html('Large','elementor'),
                        'block' => esc_html('Block','elementor'),
                    ],
                    'label_block'   => true,
                    'default'       => 'lg',
                    'condition'     => [
                      'pt_modal_box_display_on'  => 'button'
                    ],
                ]
                );
        
        /*Image Source*/ 
        $this->add_control('pt_modal_box_image_src',
                [
                    'label'         => esc_html__('Image', 'elementor'),
                    'type'          => Controls_Manager::MEDIA,
                    'default'       => [
                        'url'   => Utils::get_placeholder_image_src(),
                    ],
                    'condition'     => [
                        'pt_modal_box_display_on'    => 'image',
                    ],
                    'label_block'   => true,
                ]
                );
        
        /*Text Selector*/
        $this->add_control('pt_modal_box_selector_text',
                [
                    'label'         => esc_html__('Text', 'elementor'),
                    'type'          => Controls_Manager::TEXT,
                    'label_block'   => true,
                    'default'       => esc_html__('pt Modal Box', 'elementor'),
                    'condition'     => [
                        'pt_modal_box_display_on'  => 'text',
                    ]
                ]
                );
        
        /*On Load Trigger Delay*/
        $this->add_control('pt_modal_box_popup_delay',
                [
                    'label'         => esc_html__('Delay in Popup Display (Sec)','pt-addons-for-elementor'),
                    'type'          => Controls_Manager::NUMBER,
                    'description'   => esc_html__('When should the popup appear during page load? The value are counted in seconds', 'elementor'),
                    'default'       => 1,
                    'label_block'   => true,
                    'condition'     => [
                        'pt_modal_box_display_on'  => 'pageload',
                    ]
                ]
                );
        
        
        /*Alignment*/
        $this->add_responsive_control('pt_modal_box_selector_align',
                [
                    'label' => __( 'Alignment', 'elementor' ),
                    'type' => Controls_Manager::CHOOSE,
                    'options' => [
                            'left'    => [
                                    'title' => __( 'Left', 'elementor' ),
                                    'icon' => 'fa fa-align-left',
                            ],
                            'center' => [
                                    'title' => __( 'Center', 'elementor' ),
                                    'icon' => 'fa fa-align-center',
                            ],
                            'right' => [
                                    'title' => __( 'Right', 'elementor' ),
                                    'icon' => 'fa fa-align-right',
                            ],
                        ],
                    'default'       => 'center',
                    'selectors'     => [
                        '{{WRAPPER}} .pt-modal-box-selector-container' => 'text-align: {{VALUE}};',
                        ],
                    'condition'     => [
                        'pt_modal_box_display_on!' => 'pageload',
                    ],
                ]
            );
        
        /*End Box Content Section*/
        $this->end_controls_section();
        
       
	   $this->start_controls_section('pt_modal_box_selector_style_section',
                [
                    'label'         => esc_html__('Trigger', 'elementor'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                    'condition'     => [
                        'pt_modal_box_display_on!'  => 'pageload',
                        ]
                ]
                );

        /*Button Text Color*/
        $this->add_control('pt_modal_box_button_text_color',
                [
                    'label'         => esc_html__('Color', 'elementor'),
                    'type'          => Controls_Manager::COLOR,
                    'scheme'        => [
                        'type'  => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_2,
                    ],
                    'selectors'     => [
                        '{{WRAPPER}} .pt-modal-box-button-selector, {{WRAPPER}} .pt-modal-box-text-selector' => 'color:{{VALUE}};',
                        ],
                    'condition'     => [
                        'pt_modal_box_display_on'  => ['button', 'text'],
                        ]
                    ]
                );
        
        $this->add_control('pt_modal_box_button_icon_color',
                [
                    'label'         => esc_html__('Icon Color', 'elementor'),
                    'type'          => Controls_Manager::COLOR,
                    'scheme'        => [
                        'type'  => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_2,
                    ],
                    'selectors'     => [
                        '{{WRAPPER}} .pt-modal-box-button-selector i' => 'color:{{VALUE}};',
                        ],
                    'condition'     => [
                        'pt_modal_box_display_on'  => ['button'],
                        ]
                    ]
                );

        /*Selector Text Typography*/
        $this->add_group_control(
            Group_Control_Typography::get_type(),
                [
                    'name'          => 'selectortext',
                    'label'         => esc_html__('Typography', 'elementor'),
                    'scheme'        => Scheme_Typography::TYPOGRAPHY_1,
                    'selector'      => '{{WRAPPER}} .pt-modal-box-button-selector, {{WRAPPER}} .pt-modal-box-text-selector',
                    'condition'     => [
                        'pt_modal_box_display_on'  => ['button','text'],
                    ],
                ]
                );
        
        $this->start_controls_tabs('pt_modal_box_button_style');
        
        /*Button Color*/
        $this->start_controls_tab('pt_modal_box_tab_selector_normal',
                [
                    'label'         => esc_html__( 'Normal', 'elementor' ),
                    'condition'     => [
                        'pt_modal_box_display_on'  => ['button', 'text','image'],
                        ]
                    ]
		);
        
        /*Button Background Color*/
        $this->add_control('pt_modal_box_selector_background',
                [
                    'label'         => esc_html__('Background Color', 'elementor'),
                    'type'          => Controls_Manager::COLOR,
                    'scheme'        => [
                        'type'  => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'selectors'     => [
                        '{{WRAPPER}} .pt-modal-box-button-selector'   => 'background-color: {{VALUE}};',
                        ],
                    'condition'     => [
                        'pt_modal_box_display_on'  => 'button',
                        ]
                    ]
                );

        /*Button Border*/
        $this->add_group_control(
            Group_Control_Border::get_type(), 
                [
                    'name'          => 'selector_border',
                    'selector'      => '{{WRAPPER}} .pt-modal-box-button-selector,{{WRAPPER}} .pt-modal-box-text-selector, {{WRAPPER}} .pt-modal-box-img-selector',
                    'condition'     => [
                        'pt_modal_box_display_on'  => ['button', 'text','image'],
                        ]
                ]
                );
        
        /*Button Border Radius*/
        $this->add_control('pt_modal_box_selector_border_radius',
                [
                   'label'          => esc_html__('Border Radius', 'elementor'),
                    'type'          => Controls_Manager::SLIDER,
                    'size_units'    => ['px', '%', 'em'],
                    'default'       => [
                            'size'  => 0
                    ],
                    'selectors'     => [
                        '{{WRAPPER}} .pt-modal-box-button-selector, {{WRAPPER}} .pt-modal-box-text-selector, {{WRAPPER}} .pt-modal-box-img-selector'     => 'border-radius:{{SIZE}}{{UNIT}};',
                    ],
                    'condition'     => [
                        'pt_modal_box_display_on'  => ['button', 'text', 'image'],
                        ],
                    'separator'     => 'after',
                    ]
                );
        
        /*Selector Padding*/
        $this->add_responsive_control('pt_modal_box_selector_padding',
                [
                    'label'         => esc_html__('Padding', 'elementor'),
                    'type'          => Controls_Manager::DIMENSIONS,
                    'size_units'    => [ 'px', 'em', '%' ],
                    'default'       => [
                        'unit'  => 'px',
                        'top'   => 20,    
                        'right' => 30,
                        'bottom'=> 20,
                        'left'  => 30,
                    ],
                    'selectors'     => [
                        '{{WRAPPER}} .pt-modal-box-button-selector, {{WRAPPER}} .pt-modal-box-text-selector' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                        ],
                    'condition'     => [
                            'pt_modal_box_display_on'  => ['button', 'text'],
                        ]
                    ]
                );
        
        /*Selector Box Shadow*/
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
                [
                    'label'         => esc_html__('Shadow','elementor'),
                    'name'          => 'pt_modal_box_selector_box_shadow',
                    'selector'      => '{{WRAPPER}} .pt-modal-box-button-selector, {{WRAPPER}} .pt-modal-box-img-selector',
                    'condition'     => [
                        'pt_modal_box_display_on'  => ['button', 'image'],
                        ]
                ]
                );
        
        /*Selector Text Shadow*/
        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
                [
                    'name'          => 'pt_modal_box_selector_text_shadow',
                    'selector'      => '{{WRAPPER}} .pt-modal-box-text-selector',
                    'condition'     => [
                        'pt_modal_box_display_on'  => 'text',
                        ]
                ]
                );
        
        $this->end_controls_tab();
        
        $this->start_controls_tab('pt_modal_box_tab_selector_hover',
                [
                    'label'         => esc_html__('Hover', 'elementor'),
                    'condition'     => [
                        'pt_modal_box_display_on'  => ['button','text','image'],
                        ]
                ]
                );
        
        /*Button Hover Background Color*/
        $this->add_control('pt_modal_box_selector_hover_background',
                [
                    'label'         => esc_html__('Background Color', 'elementor'),
                    'type'          => Controls_Manager::COLOR,
                    'selectors'     => [
                        '{{WRAPPER}} .pt-modal-box-button-selector:hover' => 'background: {{VALUE}};',
                        ],
                        'condition'     => [
                            'pt_modal_box_display_on'  => 'button',
                        ]
                    ]
                );

        /*Button Border*/
        $this->add_group_control(
            Group_Control_Border::get_type(), 
                [
                    'name'          => 'selector_border_hover',
                    'selector'      => '{{WRAPPER}} .pt-modal-box-button-selector:hover,
                    {{WRAPPER}} .pt-modal-box-text-selector:hover, {{WRAPPER}} .pt-modal-box-img-selector:hover',
                    'condition'     => [
                        'pt_modal_box_display_on'  => ['button', 'text', 'image'],
                        ]
                ]
                );
        
        /*Button Border Radius*/
        $this->add_control('pt_modal_box_selector_border_radius_hover',
                [
                   'label'          => esc_html__('Border Radius', 'elementor'),
                    'type'          => Controls_Manager::SLIDER,
                    'size_units'    => ['px', '%', 'em'],
                    'selectors'     => [
                        '{{WRAPPER}} .pt-modal-box-button-selector:hover,{{WRAPPER}} .pt-modal-box-text-selector:hover, {{WRAPPER}} .pt-modal-box-img-selector:hover'     => 'border-radius:{{SIZE}}{{UNIT}};',
                    ],
                    'condition'     => [
                        'pt_modal_box_display_on'  => ['button', 'text', 'image'],
                        ]
                ]
                );
        
        /*Selector Box Shadow*/
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
                [
                    'label'         => esc_html__('Shadow','elementor'),
                    'name'          => 'pt_modal_box_selector_box_shadow_hover',
                    'selector'      => '{{WRAPPER}} .pt-modal-box-button-selector:hover, {{WRAPPER}} .pt-modal-box-text-selector:hover, {{WRAPPER}} .pt-modal-box-img-selector:hover',
                    'condition'     => [
                        'pt_modal_box_display_on'  => ['button', 'text', 'image'],
                        ]
                ]
                );
        
        $this->end_controls_tab();
        
        $this->end_controls_tabs();
                
        $this->end_controls_section();
        
        /*Start Header Seettings Section*/
        $this->start_controls_section('pt_modal_box_header_settings',
                [
                    'label'         => esc_html__('Heading', 'elementor'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                    'condition'     => [
                        'pt_modal_box_header_switcher' => 'yes'
                        ],
                    ]
                );
        
        /*Header Text Color*/
        $this->add_control('pt_modal_box_header_text_color',
                [
                    'label'         => esc_html__('Color', 'elementor'),
                    'type'          => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pt-modal-box-modal-title' => 'color: {{VALUE}};',
                    ]
                ]
                );
        
        /*Header Text Typography*/
        $this->add_group_control(
            Group_Control_Typography::get_type(),
                [
                    'name'          => 'headertext',
                    'label'         => esc_html__('Typography', 'elementor'),
                    'scheme'        => Scheme_Typography::TYPOGRAPHY_1,
                    'selector'      => '{{WRAPPER}} .pt-modal-box-modal-title',
                ]
                );
        
        /*Header Background Color*/
        $this->add_control('pt_modal_box_header_background',
                [
                    'label'         => esc_html__('Background Color', 'elementor'),
                    'type'          => Controls_Manager::COLOR,
                    'selectors'     => [
                        '{{WRAPPER}} .pt-modal-box-modal-header'  => 'background: {{VALUE}};',
                        ]
                    ]
                );
        
        /*End Header Settings Section*/
        $this->end_controls_section();
        
        
        /*Start Close Button Section*/
        $this->start_controls_section('pt_modal_box_upper_close_button_section',
                [
                    'label'         => esc_html__('Upper Close Button', 'elementor'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                    'condition'     => [
                        'pt_modal_box_upper_close'   => 'yes',
                        'pt_modal_box_header_switcher' => 'yes'
                    ]
                ]
                );
        
        /*Close Button Size*/
        $this->add_responsive_control('pt_modal_box_upper_close_button_size',
                [
                    'label'         => esc_html__('Size', 'elementor'),
                    'type'          => Controls_Manager::SLIDER,
                    'size_units'    => ['px', '%' ,'em'],
                    'selectors'     => [
                        '{{WRAPPER}} .pt-modal-box-modal-header button' => 'font-size: {{SIZE}}{{UNIT}};',
                    ]
                ]
                );
        
        
        
        $this->start_controls_tabs('pt_modal_box_upper_close_button_style');
        
        /*Button Color*/
        $this->start_controls_tab('pt_modal_box_upper_close_button_normal',
                [
                    'label'         => esc_html__( 'Normal', 'elementor' ),
                    ]
                );
        
        /*Close Button Color*/
        $this->add_control('pt_modal_box_upper_close_button_normal_color',
                [
                    'label'         => esc_html__('Color', 'elementor'),
                    'type'          => Controls_Manager::COLOR,
                    'selectors'     => [
                        '{{WRAPPER}} .pt-modal-box-modal-close' => 'color: {{VALUE}};',
                        ]
                    ]
                );
        
        /*Close Button Background Color*/
        $this->add_control('pt_modal_box_upper_close_button_background_color',
                [
                    'label'         => esc_html__('Background Color', 'elementor'),
                    'type'          => Controls_Manager::COLOR,
                    'selectors'     => [
                        '{{WRAPPER}} .pt-modal-box-modal-close' => 'background:{{VALUE}};',
                    ],
                ]
                );
        
        /*Button Border*/
        $this->add_group_control(
            Group_Control_Border::get_type(), 
                [
                    'name'          => 'pt_modal_upper_border',
                    'selector'      => '{{WRAPPER}} .pt-modal-box-modal-close',
                    ]
                );
        
        /*Button Border Radius*/
        $this->add_control('pt_modal_upper_border_radius',
                [
                   'label'          => esc_html__('Border Radius', 'elementor'),
                    'type'          => Controls_Manager::SLIDER,
                    'size_units'    => ['px', '%', 'em'],
                    'selectors'     => [
                        '{{WRAPPER}} .pt-modal-box-modal-close'     => 'border-radius:{{SIZE}}{{UNIT}};',
                        ],
                    'separator'     => 'after',
                    ]
                );
        
        $this->end_controls_tab();
        
        $this->start_controls_tab('pt_modal_box_upper_close_button_hover',
                [
                    'label'         => esc_html__('Hover', 'elementor'),
                ]
                );
        
        /*Close Button Color*/
        $this->add_control('pt_modal_box_upper_close_button_hover_color',
                [
                    'label'         => esc_html__('Color', 'elementor'),
                    'type'          => Controls_Manager::COLOR,
                    'selectors'     => [
                        '{{WRAPPER}} .pt-modal-box-modal-close:hover' => 'color: {{VALUE}};',
                        ],
                    ]
                );
        
        /*Close Button Background Color*/
        $this->add_control('pt_modal_box_upper_close_button_background_color_hover',
                [
                    'label'         => esc_html__('Background Color', 'elementor'),
                    'type'          => Controls_Manager::COLOR,
                    'selectors'     => [
                        '{{WRAPPER}} .pt-modal-box-modal-close:hover' => 'background:{{VALUE}};',
                    ],
                ]
                );
        
        /*Button Border*/
        $this->add_group_control(
            Group_Control_Border::get_type(), 
                [
                    'name'          => 'pt_modal_upper_border_hover',
                    'selector'      => '{{WRAPPER}} .pt-modal-box-modal-close:hover',
                    ]
                );
        
        /*Button Border Radius*/
        $this->add_control('pt_modal_upper_border_radius_hover',
                [
                   'label'          => esc_html__('Border Radius', 'elementor'),
                    'type'          => Controls_Manager::SLIDER,
                    'size_units'    => ['px', '%', 'em'],
                    'selectors'     => [
                        '{{WRAPPER}} .pt-modal-box-modal-close:hover'     => 'border-radius:{{SIZE}}{{UNIT}};',
                        ],
                    'separator'     => 'after',
                    ]
                );
        
        $this->end_controls_tab();
        
        $this->end_controls_tabs();
        
        /*Upper Close Padding*/
        $this->add_responsive_control('pt_modal_box_upper_close_button_padding',
                [
                    'label'         => esc_html__('Padding', 'elementor'),
                    'type'          => Controls_Manager::DIMENSIONS,
                    'size_units'    => [ 'px', 'em', '%' ],
                    'selectors'     => [
                        '{{WRAPPER}} .pt-modal-box-modal-close' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                        ]
                    ]
                );

        /*End Upper Close Button Style Section*/
        $this->end_controls_section();
        
        /*Start Close Button Section*/
        $this->start_controls_section('pt_modal_box_lower_close_button_section',
                [
                    'label'         => esc_html__('Lower Close Button', 'elementor'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                    'condition'     => [
                        'pt_modal_box_lower_close'   => 'yes',
                    ]
                ]
                );
        
        /*Close Button Text Typography*/
        $this->add_group_control(
            Group_Control_Typography::get_type(),
                [
                    'label'         => esc_html__('Typography', 'elementor'),
                    'name'          => 'lowerclose',
                    'scheme'        => Scheme_Typography::TYPOGRAPHY_1,
                    'selector'      => '{{WRAPPER}} .pt-modal-box-modal-lower-close',
                ]
                );
        
        /*Close Button Size*/
        $this->add_responsive_control('pt_modal_box_lower_close_button_width',
                [
                    'label'         => esc_html__('Width', 'elementor'),
                    'type'          => Controls_Manager::SLIDER,
                    'size_units'    => ['px', '%', 'em'],
                    'range'         => [
                        'px'    => [
                            'min'   => 1,
                            'max'   => 500,
                        ],
                        'em'    => [
                            'min'   => 1,
                            'max'   => 30,
                        ],
                    ],
                    'selectors'     => [
                        '{{WRAPPER}} .pt-modal-box-modal-lower-close' => 'min-width: {{SIZE}}{{UNIT}};',
                    ]
                ]
                );
        
        
        $this->start_controls_tabs('pt_modal_box_lower_close_button_style');
        
        /*Button Color*/
        $this->start_controls_tab('pt_modal_box_lower_close_button_normal',
                [
                    'label'         => esc_html__( 'Normal', 'elementor' ),
                    ]
                );
        
        /*Close Button Background Color*/
        $this->add_control('pt_modal_box_lower_close_button_normal_color',
                [
                    'label'         => esc_html__('Color', 'elementor'),
                    'type'          => Controls_Manager::COLOR,
                    'scheme'        => [
                        'type'  => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_2,
                    ],
                    'selectors'     => [
                        '{{WRAPPER}} .pt-modal-box-modal-lower-close' => 'color: {{VALUE}};',
                        ]
                    ]
                );
        
        /*Close Button Background Color*/
        $this->add_control('pt_modal_box_lower_close_button_background_normal_color',
                [
                    'label'         => esc_html__('Background Color', 'elementor'),
                    'type'          => Controls_Manager::COLOR,
                    'scheme'        => [
                        'type'  => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'selectors'     => [
                        '{{WRAPPER}} .pt-modal-box-modal-lower-close' => 'background-color: {{VALUE}};',
                        ],
                    ]
                );
        
        /*Lower Close Border*/
        $this->add_group_control(
            Group_Control_Border::get_type(),
                [
                    'name'              => 'pt_modal_box_lower_close_border',
                    'selector'          => '{{WRAPPER}} .pt-modal-box-modal-lower-close',
                    ]
                );
        
        /*Lower Close Radius*/
        $this->add_control('pt_modal_box_lower_close_border_radius',
                [
                    'label'         => esc_html__('Border Radius', 'elementor'),
                    'type'          => Controls_Manager::SLIDER,
                    'size_units'    => ['px', '%', 'em'],
                    'selectors'     => [
                        '{{WRAPPER}} .pt-modal-box-modal-lower-close' => 'border-radius: {{SIZE}}{{UNIT}};'
                        ],
                    'separator'     => 'after',
                    ]
                );
        
        $this->end_controls_tab();
        
        $this->start_controls_tab('pt_modal_box_lower_close_button_hover',
                [
                    'label'         => esc_html__('Hover', 'elementor'),
                ]
                );
        
        /*Close Button Background Color*/
        $this->add_control('pt_modal_box_lower_close_button_hover_color',
                [
                    'label'         => esc_html__('Color', 'elementor'),
                    'type'          => Controls_Manager::COLOR,
                    'scheme'        => [
                        'type'  => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'selectors'     => [
                        '{{WRAPPER}} .pt-modal-box-modal-lower-close:hover' => 'color: {{VALUE}};',
                        ]
                    ]
                );
        
        /*Close Button Background Color*/
        $this->add_control('pt_modal_box_lower_close_button_background_hover_color',
                [
                    'label'         => esc_html__('Background Color', 'elementor'),
                    'type'          => Controls_Manager::COLOR,
                    'scheme'        => [
                        'type'  => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_2,
                    ],
                    'selectors'     => [
                        '{{WRAPPER}} .pt-modal-box-modal-lower-close:hover' => 'background-color: {{VALUE}};',
                        ],
                    ]
                );
        
        /*Lower Close Hover Border*/
        $this->add_group_control(
            Group_Control_Border::get_type(),
                [
                    'name'              => 'pt_modal_box_lower_close_border_hover',
                    'selector'          => '{{WRAPPER}} .pt-modal-box-modal-lower-close:hover',
                    ]
                );
        
        /*Lower Close Hover Border Radius*/
        $this->add_control('pt_modal_box_lower_close_border_radius_hover',
                [
                    'label'         => esc_html__('Border Radius', 'elementor'),
                    'type'          => Controls_Manager::SLIDER,
                    'size_units'    => ['px', '%', 'em'],
                    'selectors'     => [
                        '{{WRAPPER}} .pt-modal-box-modal-lower-close:hover' => 'border-radius: {{SIZE}}{{UNIT}};'
                        ],
                    'separator'     => 'after',
                    ]
                );
        
        $this->end_controls_tab();
        
        $this->end_controls_tabs();
        
        /*Upper Close Padding*/
        $this->add_responsive_control('pt_modal_box_lower_close_button_padding',
                [
                    'label'         => esc_html__('Padding', 'elementor'),
                    'type'          => Controls_Manager::DIMENSIONS,
                    'size_units'    => [ 'px', 'em', '%' ],
                    'selectors'     => [
                        '{{WRAPPER}} .pt-modal-box-modal-lower-close' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                        ]
                    ]
                );
        
        /*End Lower Close Button Style Section*/
        $this->end_controls_section();
        
        $this->start_controls_section('pt_modal_box_style',
                [
                    'label'         => esc_html__('Modal Box', 'elementor'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
                );
        
        /*Modal Size*/
        $this->add_control('pt_modal_box_modal_size',
                [
                    'label'         => esc_html__('Width', 'elementor'),
                    'type'          => Controls_Manager::SLIDER,
                    'size_units'    => ['px', '%', 'em'],
                    'range'         => [
                        'px'    => [
                            'min'   => 50,
                            'max'   => 1000,
                        ]
                    ],
                    'label_block'   => true,
                ]
                );
        
        /*Modal Background Color*/
        $this->add_control('pt_modal_box_modal_background',
                [
                    'label'         => esc_html__('Overlay Color', 'elementor'),
                    'type'          => Controls_Manager::COLOR,
                    'selectors'     => [
                        '{{WRAPPER}} .pt-modal-box-modal'  => 'background:{{VALUE}};',
                        ]
                    ]
                );
        
        /*Content Background Color*/
        $this->add_control('pt_modal_box_content_background',
                [
                    'label'         => esc_html__('Content Background Color', 'pt-addons-for-elementor'),
                    'type'          => Controls_Manager::COLOR,
                    'selectors'     => [
                        '{{WRAPPER}} .pt-modal-box-modal-body'  => 'background: {{VALUE}};',
                        ]
                    ]
                );
        
        /*Footer Background Color*/
        $this->add_control('pt_modal_box_footer_background',
                [
                    'label'         => esc_html__('Footer Background Color', 'pt-addons-for-elementor'),
                    'type'          => Controls_Manager::COLOR,
                    'selectors'     => [
                        '{{WRAPPER}} .pt-modal-box-modal-footer'  => 'background: {{VALUE}};',
                        ]
                    ]
                );
        
        /*Content Box Border*/
        $this->add_group_control(
            Group_Control_Border::get_type(),
                [
                    'name'          => 'contentborder',
                    'selector'      => '{{WRAPPER}} .pt-modal-box-modal-content',
                ]
                );
        
        /*Border Radius*/
        $this->add_control('pt_modal_box_border_radius',
                [
                   'label'          => esc_html__('Border Radius', 'elementor'),
                    'type'          => Controls_Manager::SLIDER,
                    'size_units'    => ['px', '%', 'em'],
                    'selectors'     => [
                        '{{WRAPPER}} .pt-modal-box-modal-content'     => 'border-radius: {{SIZE}}{{UNIT}};',
                    ]
                ]
                );
        
        /*Modal Box Margin*/
        $this->add_responsive_control('pt_modal_box_margin',
                [
                    'label'         => esc_html__('Margin', 'elementor'),
                    'type'          => Controls_Manager::DIMENSIONS,
                    'size_units'    => [ 'px', 'em', '%' ],
                    'selectors'     => [
                        '{{WRAPPER}} .pt-modal-box-modal-dialog' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                        ]
                    ]
                );
        
        $this->end_controls_section();
		
		
	}

	/**
	 * Define our Render Display settings.
	 */
	protected function render( ) {
		
     $settings = $this->get_settings();
        $this->add_inline_editing_attributes('pt_modal_box_selector_text');
      
        $button_icon = $settings['pt_modal_box_button_icon_selection'];
        
        
        $elementor_post_id = $settings['pt_modal_box_content_temp'];
        $pt_elements_frontend = new Frontend;
		$modal_settings = [
            'trigger'   => $settings['pt_modal_box_display_on'],
            'delay'     => $settings['pt_modal_box_popup_delay'],
        ];
?>


<div class="container pt-modal-box-container" data-settings='<?php echo wp_json_encode($modal_settings); ?>'>
  <!-- Trigger The Modal Box -->
  <div class="pt-modal-box-selector-container">
      <?php
      if ( $settings['pt_modal_box_display_on'] === 'button' ) : ?>
      <button type="button" class="pt-modal-box-button-selector btn btn-info <?php
      if( $settings['pt_modal_box_button_size'] === 'sm' ) : echo "pt-btn-sm";
      elseif( $settings['pt_modal_box_button_size'] === 'md' ) : echo "pt-btn-md";
      elseif( $settings['pt_modal_box_button_size'] === 'lg' ) : echo "pt-btn-lg";
      elseif( $settings['pt_modal_box_button_size'] === 'block' ) : echo "pt-btn-block"; endif; ?>" data-toggle="pt-modal" data-target="#pt-modal-<?php echo esc_attr( $this->get_id() ); ?>"><?php if($settings['pt_modal_box_icon_switcher'] && $settings['pt_modal_box_icon_position'] == 'before' && !empty($settings['pt_modal_box_button_icon_selection'])) : ?><i class="fa <?php echo esc_attr($button_icon); ?>"></i><?php endif; ?><span><?php echo $settings['pt_modal_box_button_text']; ?></span><?php if($settings['pt_modal_box_icon_switcher'] && $settings['pt_modal_box_icon_position'] == 'after' &&!empty($settings['pt_modal_box_button_icon_selection'])) : ?><i class="fa <?php echo esc_attr($button_icon); ?>"></i><?php endif; ?></button>
      <?php elseif ( $settings['pt_modal_box_display_on'] === 'image' ) : ?>
      <img class="pt-modal-box-img-selector" data-toggle="pt-modal" data-target="#pt-modal-<?php  echo esc_attr( $this->get_id() ); ?>" src="<?php echo $settings['pt_modal_box_image_src']['url'];?>">
      <?php elseif($settings['pt_modal_box_display_on'] === 'text') : ?>
      <span class="pt-modal-box-text-selector" data-toggle="pt-modal" data-target="#pt-modal-<?php  echo esc_attr( $this->get_id() ); ?>"><div <?php echo $this->get_render_attribute_string('pt_modal_box_selector_text'); ?>><?php echo $settings['pt_modal_box_selector_text'];?></div></span>
       <?php endif; ?>
  </div>
  
  <!-- Modal -->
  <div id="pt-modal-<?php echo  $this->get_id(); ?>"  class="pt-modal-box-modal pt-modal-fade" role="dialog">
    <div class="pt-modal-box-modal-dialog">
    
      <!-- Modal content-->
      <div class="pt-modal-box-modal-content">
          <?php if($settings['pt_modal_box_header_switcher'] == 'yes'): ?>
        <div class="pt-modal-box-modal-header">
            <?php if ( $settings['pt_modal_box_upper_close'] === 'yes' ) : ?>
            <div class="pt-modal-box-close-button-container">
                <button type="button" class="pt-modal-box-modal-close" data-dismiss="pt-modal">&times;</button>
            </div>
            <?php endif; ?>
            <h3 class="pt-modal-box-modal-title">
                <?php if($settings['pt_modal_box_icon_selection'] === 'fonticon') : ?>
                <i class="fa <?php echo $settings['pt_modal_box_font_icon'];?>"></i>
                    <?php elseif( $settings['pt_modal_box_icon_selection'] === 'image' ) : ?>
                <img src="<?php echo $settings['pt_modal_box_image_icon']['url'];?>">
                    <?php endif; ?><?php echo $settings['pt_modal_box_title'];?></h3>
        </div>
          <?php endif; ?>
          <div class="pt-modal-box-modal-body">
              <?php if($settings['pt_modal_box_content_type'] == 'editor') : echo $settings['pt_modal_box_content']; else: echo $pt_elements_frontend->get_builder_content($elementor_post_id, true); endif; ?>
			  <?php if($settings['pt_modal_box_content_type'] == 'youtube'){
				  $url1 = $settings['youtube_link']['url']; 
				  $url1 = str_replace('watch?v=', 'embed/', $url1);
				  ?>
				  
				  
					<iframe width="420" height="500" src="<?php echo $url1; ?>?autoplay=1" ></iframe>
				  <?php 
				  
				}else{
							  echo $pt_elements_frontend->get_builder_content($elementor_post_id, true);
				}  ?>
				<?php if($settings['pt_modal_box_content_type'] == 'vimeo'){
				  $url1 = $settings['vimeo_link']['url']; 
				  //$url1 = str_replace('watch?v=', 'embed/', $url1);
						$urlParts = explode("/", $url1);
						$urlParts1 ='http://player.'.$urlParts[1].''.$urlParts[2].'/video/'.$urlParts[3];
							
				  ?>
							  

				  
					<iframe width="420" height="500" src="<?php echo $urlParts1; ?>?&byline=0&portrait=0&wmode=opaque" ></iframe>
					
				  <?php 
				  
				}else{
							  echo $pt_elements_frontend->get_builder_content($elementor_post_id, true);
				}  ?>
				
				
          </div>
          <?php if ( $settings['pt_modal_box_lower_close'] === 'yes' ) : ?>
          <div class="pt-modal-box-modal-footer">
              <button type="button" class="btn pt-modal-box-modal-lower-close" data-dismiss="pt-modal">Close
              </button>
          </div>
          <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<style>
    
    <?php if( !empty($settings['pt_modal_box_modal_size']['size'] ) ) :
        echo '@media (min-width:992px) {'; ?>
        #pt-modal-<?php echo  $this->get_id(); ?> .pt-modal-box-modal-dialog {
            width: <?php echo $settings['pt_modal_box_modal_size']['size'] . $settings['pt_modal_box_modal_size']['unit']; ?>
        } 
        <?php echo '}'; endif; ?>
    
</style>

    <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new Pt_Elementor_Modelbox() );
