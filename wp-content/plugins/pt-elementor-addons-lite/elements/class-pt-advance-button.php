<?php

/**
 * class-pt-image-button.php
 *
 * @author    Param Themes <paramthemes@gmail.com>
 * @copyright 2018 Param Themes
 * @license   Param Themes
 * @package   Elementor
 * @see       https://www.paramthemes.com
 */
namespace Elementor;  
  
if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class PT_Advance_Button_Widget extends Widget_Base
{ 
    public function get_name() {
        return 'pt-advance-button';
    }

    public function get_icon() {
        return 'fa fa-image';
    }
	
	public function get_title(){
		return esc_html__('Advance Button', 'elementor');
	}

    public function get_categories() {
        return [ 'pt-elementor-addons' ];
    }

    // Adding the controls fields for the pt image button
    // This will controls the animation, colors and background, dimensions etc
    protected function _register_controls() {

        /*Start Button Content Section */
        $this->start_controls_section('pt_image_button_general_section',
                [
                    'label'         => esc_html__('Button', 'elementor'),
                    ]
                );
        
        /*Button Text*/ 
        $this->add_control('pt_image_button_text',
                [
                    'label'         => esc_html__('Text', 'elementor'),
                    'type'          => Controls_Manager::TEXT,
                    'default'       => esc_html__('Button Text','elementor'),
                    'label_block'   => true,
                ]
                );
        
        $this->add_control('pt_image_button_link_selection', 
                [
                    'label'         => esc_html__('Link Type', 'elementor'),
                    'type'          => Controls_Manager::SELECT,
                    'options'       => [
                        'url'   => esc_html__('URL', 'elementor'),
                        'link'  => esc_html__('Existing Page', 'elementor'),
                    ],
                    'default'       => 'url',
                    'label_block'   => true,
                ]
                );
        
        $this->add_control('pt_image_button_link',
                [
                    'label'         => esc_html__('Link', 'elementor'),
                    'type'          => Controls_Manager::URL,
                    'default'       => [
                            'url'   => '#',
                        ],
                    'placeholder'   => 'http://#',
                    'label_block'   => true,
                    'separator'     => 'after',
                    'condition'     => [
                        'pt_image_button_link_selection' => 'url'
                    ]
                ]
                );
        
        $this->add_control('pt_image_button_existing_link',
                [
                    'label'         => esc_html__('Existing Page', 'elementor'),
                    'type'          => Controls_Manager::SELECT2,
					'condition'     => [
                        'pt_image_button_link_selection'     => 'link',
                    ],
                    'multiple'      => false,
                    'separator'     => 'after',
                    'label_block'   => true,
                   ]
                );
            
        /*Button Hover Effect*/
        $this->add_control('pt_image_button_hover_effect', 
                [
                    'label'         => esc_html__('Hover Effect', 'elementor'),
                    'type'          => Controls_Manager::SELECT,
                    'default'       => 'none',
                    'options'       => [
                        'none'          => esc_html__('None'),
                        'style1'        => esc_html__('Background Slide'),
                        'style3'        => esc_html__('Diagonal Slide'),
                        'style4'        => esc_html__('Icon Slide'),
                        'style5'        => esc_html__('Overlap'),
                        ],
                    'label_block'   => true,
                    ]
                );
        
        $this->add_control('pt_image_button_style1_dir', 
                [
                    'label'         => esc_html__('Slide Direction', 'elementor'),
                    'type'          => Controls_Manager::SELECT,
                    'default'       => 'bottom',
                    'options'       => [
                        'bottom'       => esc_html__('Top to Bottom'),
                        'top'          => esc_html__('Bottom to Top'),
                        'left'         => esc_html__('Right to Left'),
                        'right'        => esc_html__('Left to Right'),
                        ],
                    'condition'     => [
                        'pt_image_button_hover_effect' => 'style1',
                        ],
                    'label_block'   => true,
                    ]
                );
        
        $this->add_control('pt_image_button_style3_dir', 
                [
                    'label'         => esc_html__('Slide Direction', 'elementor'),
                    'type'          => Controls_Manager::SELECT,
                    'default'       => 'bottom',
                    'options'       => [
                        'top'          => esc_html__('Bottom Left to Top Right'),
                        'bottom'       => esc_html__('Top Right to Bottom Left'),
                        'left'         => esc_html__('Top Left to Bottom Right'),
                        'right'        => esc_html__('Bottom Right to Top Left'),
                        ],
                    'condition'     => [
                        'pt_image_button_hover_effect' => 'style3',
                        ],
                    'label_block'   => true,
                    ]
                );

        $this->add_control('pt_image_button_style4_dir', 
                [
                    'label'         => esc_html__('Slide Direction', 'elementor'),
                    'type'          => Controls_Manager::SELECT,
                    'default'       => 'bottom',
                    'options'       => [
                        'top'          => esc_html__('Bottom to Top'),
                        'bottom'       => esc_html__('Top to Bottom'),
                        'left'         => esc_html__('Left to Right'),
                        'right'        => esc_html__('Right to Left'),
                        ],
                    'condition'     => [
                        'pt_image_button_hover_effect' => 'style4',
                        ],
                    'label_block'   => true,
                    ]
                );
        
        $this->add_control('pt_image_button_style5_dir', 
                [
                    'label'         => esc_html__('Overlap Direction', 'elementor'),
                    'type'          => Controls_Manager::SELECT,
                    'default'       => 'horizontal',
                    'options'       => [
                        'horizontal'          => esc_html__('Horizontal'),
                        'vertical'       => esc_html__('Vertical'),
                        ],
                    'condition'     => [
                        'pt_image_button_hover_effect' => 'style5',
                        ],
                    'label_block'   => true,
                    ]
                );
        
        /*Button Icon Switcher*/
        $this->add_control('pt_image_button_icon_switcher',
                [
                    'label'         => esc_html__('Icon', 'elementor'),
                    'type'          => Controls_Manager::SWITCHER,
                    'condition'     => [
                        'pt_image_button_hover_effect!'  => 'style4'
                    ],
                    'description'   => esc_html__('Enable or disable button icon','elementor'),
                ]
                );

        /*Button Icon Selection*/ 
        $this->add_control('pt_image_button_icon_selection',
                [
                    'label'         => esc_html__('Icon', 'elementor'),
                    'type'          => Controls_Manager::ICON,
                    'default'       => 'fa fa-bars',
                    'condition'     => [
                        'pt_image_button_icon_switcher' => 'yes',
                        'pt_image_button_hover_effect!'  =>  'style4'
                    ],
                    'label_block'   => true,
                ]
                );
        
        $this->add_control('pt_image_button_style4_icon_selection',
                [
                    'label'         => esc_html__('Icon', 'elementor'),
                    'type'          => Controls_Manager::ICON,
                    'default'       => 'fa fa-bars',
                    'condition'     => [
                        'pt_image_button_hover_effect'  => 'style4'
                    ],
                    'label_block'   => true,
                ]
                );
        
        $this->add_control('pt_image_button_icon_position', 
                [
                    'label'         => esc_html__('Icon Position', 'elementor'),
                    'type'          => Controls_Manager::SELECT,
                    'default'       => 'before',
                    'options'       => [
                        'before'        => esc_html__('Before'),
                        'after'         => esc_html__('After'),
                        ],
                    'condition'     => [
                        'pt_image_button_icon_switcher' => 'yes',
                        'pt_image_button_hover_effect!'  =>  'style4'
                    ],
                    'label_block'   => true,
                    ]
                );
        
        $this->add_control('pt_image_button_icon_before_size',
                [
                    'label'         => esc_html__('Icon Size', 'elementor'),
                    'type'          => Controls_Manager::SLIDER,
                    'condition'     => [
                        'pt_image_button_icon_switcher' => 'yes',
                        'pt_image_button_hover_effect!'  => 'style4'
                    ],
                    'selectors'     => [
                        '{{WRAPPER}} .pt-image-button-text-icon-wrapper i' => 'font-size: {{SIZE}}px',
                    ]
                ]
                );
        
        $this->add_control('pt_image_button_icon_style4_size',
                [
                    'label'         => esc_html__('Icon Size', 'elementor'),
                    'type'          => Controls_Manager::SLIDER,
                    'condition'     => [
                        'pt_image_button_hover_effect'  => 'style4'
                    ],
                    'selectors'     => [
                        '{{WRAPPER}} .pt-image-button-style4-icon-wrapper i' => 'font-size: {{SIZE}}px',
                    ]
                ]
                );
        
        $this->add_control('pt_image_button_icon_before_spacing',
                [
                    'label'         => esc_html__('Icon Spacing', 'elementor'),
                    'type'          => Controls_Manager::SLIDER,
                    'condition'     => [
                        'pt_image_button_icon_switcher' => 'yes',
                        'pt_image_button_icon_position' => 'before',
                        'pt_image_button_hover_effect!' => 'style4'
                    ],
                    'default'       => [
                        'size'  => 15
                    ],
                    'selectors'     => [
                        '{{WRAPPER}} .pt-image-button-text-icon-wrapper i' => 'margin-right: {{SIZE}}px',
                    ],
                    'separator'     => 'after',
                ]
                );
        
        $this->add_control('pt_image_button_icon_after_spacing',
                [
                    'label'         => esc_html__('Icon Spacing', 'elementor'),
                    'type'          => Controls_Manager::SLIDER,
                    'condition'     => [
                        'pt_image_button_icon_switcher' => 'yes',
                        'pt_image_button_icon_position' => 'after',
                        'pt_image_button_hover_effect!' => 'style4'
                    ],
                    'default'       => [
                        'size'  => 15
                    ],
                    'selectors'     => [
                        '{{WRAPPER}} .pt-image-button-text-icon-wrapper i' => 'margin-left: {{SIZE}}px',
                    ],
                    'separator'     => 'after',
                ]
                );
        
        /*Button Size*/
        $this->add_control('pt_image_button_size', 
                [
                    'label'         => esc_html__('Size', 'elementor'),
                    'type'          => Controls_Manager::SELECT,
                    'default'       => 'lg',
                    'options'       => [
                            'sm'            => esc_html__('Small'),
                            'md'            => esc_html__('Medium'),
                            'lg'            => esc_html__('Large'),
                            'block'         => esc_html__('Block'),
                        ],
                    'label_block'   => true,
                    'separator'     => 'before',
                    ]
                );
        
        /*Button Align*/
        $this->add_responsive_control('pt_image_button_align',
			[
				'label'             => esc_html__( 'Alignment', 'elementor' ),
				'type'              => Controls_Manager::CHOOSE,
				'options'           => [
					'left'    => [
						'title' => __( 'Left', 'elementor' ),
						'icon'  => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'elementor' ),
						'icon'  => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'elementor' ),
						'icon'  => 'fa fa-align-right',
					],
				],
                'selectors'         => [
                    '{{WRAPPER}} .pt-image-button-container' => 'text-align: {{VALUE}}',
                ],
				'default' => 'center',
			]
		);
        
        $this->add_control('pt_image_button_event_switcher', 
                [
                    'label'         => esc_html__('onclick Event', 'elementor'),
                    'type'          => Controls_Manager::SWITCHER,
                    'separator'     => 'before',
                    ]
                );
        
        $this->add_control('pt_image_button_event_function', 
                [
                    'label'         => esc_html__('Example: myFunction();', 'elementor'),
                    'type'          => Controls_Manager::TEXTAREA,
                    'condition'     => [
                        'pt_image_button_event_switcher' => 'yes',
                        ],
                    ]
                );
        
        /*End Image Button General Section*/
        $this->end_controls_section();

        /*Start Styling Section*/
        $this->start_controls_section('pt_image_button_style_section',
            [
                'label'             => esc_html__('Button', 'elementor'),
                'tab'               => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'              => 'pt_image_button_typo',
                'scheme'            => Scheme_Typography::TYPOGRAPHY_1,
                'selector'          => '{{WRAPPER}} .pt-image-button',
            ]
            );
        
        $this->start_controls_tabs('pt_image_button_style_tabs');
        
        $this->start_controls_tab('pt_image_button_style_normal',
            [
                'label'             => esc_html__('Normal', 'elementor'),
            ]
            );

        $this->add_control('pt_image_button_text_color_normal',
            [
                'label'             => esc_html__('Text Color', 'elementor'),
                'type'              => Controls_Manager::COLOR,
                'default' => '#f4f5f6',
                'scheme'            => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_2,
                ],
                'selectors'         => [
                    '{{WRAPPER}} .pt-image-button .pt-image-button-text-icon-wrapper'   => 'color: {{VALUE}};',
                ]
            ]);
        
        $this->add_control('pt_image_button_icon_color_normal',
            [
                'label'             => esc_html__('Icon Color', 'elementor'),
                'type'              => Controls_Manager::COLOR,
                'scheme'            => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_2,
                ],
                'selectors'         => [
                    '{{WRAPPER}} .pt-image-button-text-icon-wrapper i'   => 'color: {{VALUE}};',
                ],
                'condition'         => [
                    'pt_image_button_icon_switcher'  => 'yes',
                    'pt_image_button_hover_effect!'   => 'style4'
                ]
            ]);
        
        
        $this->add_group_control(
            Group_Control_Background::get_type(),
                [
                    'name'              => 'pt_image_button_background',
                    'types'             => [ 'classic' , 'gradient' ],
                    'selector'          => '{{WRAPPER}} .pt-image-button',
                    ]
                );
        
        /*Button Border*/
        $this->add_group_control(
            Group_Control_Border::get_type(), 
                [
                    'name'          => 'pt_image_button_border_normal',
                    'selector'      => '{{WRAPPER}} .pt-image-button',
                ]
                );
        
        /*Button Border Radius*/
        $this->add_control('pt_image_button_border_radius_normal',
                [
                    'label'         => esc_html__('Border Radius', 'elementor'),
                    'type'          => Controls_Manager::SLIDER,
                    'size_units'    => ['px', '%' ,'em'],
                    'selectors'     => [
                        '{{WRAPPER}} .pt-image-button' => 'border-radius: {{SIZE}}{{UNIT}};'
                    ]
                ]
                );
        
        /*Icon Shadow*/
        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
                [
                    'label'         => esc_html__('Icon Shadow','elementor'),
                    'name'          => 'pt_image_button_icon_shadow_normal',
                    'selector'      => '{{WRAPPER}} .pt-image-button-text-icon-wrapper i',
                    'condition'         => [
                        'pt_image_button_icon_switcher'  => 'yes',
                        'pt_image_button_hover_effect!'  => 'style4'
                    
                        ]
                    ]
                );
        
        /*Text Shadow*/
        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
                [
                    'label'         => esc_html__('Text Shadow','elementor'),
                    'name'          => 'pt_image_button_text_shadow_normal',
                    'selector'      => '{{WRAPPER}} .pt-image-button-text-icon-wrapper span',
                    ]
                );
        
        /*Button Shadow*/
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
                [
                    'label'         => esc_html__('Button Shadow','elementor'),
                    'name'          => 'pt_image_button_box_shadow_normal',
                    'selector'      => '{{WRAPPER}} .pt-image-button',
                ]
                );
        
        /*Button Margin*/
        $this->add_responsive_control('pt_image_button_margin_normal',
                [
                    'label'         => esc_html__('Margin', 'elementor'),
                    'type'          => Controls_Manager::DIMENSIONS,
                    'size_units'    => ['px', 'em', '%'],
                    'selectors'     => [
                        '{{WRAPPER}} .pt-image-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                    ]
                ]);
        
        /*Button Padding*/
        $this->add_responsive_control('pt_image_button_padding_normal',
                [
                    'label'         => esc_html__('Padding', 'elementor'),
                    'type'          => Controls_Manager::DIMENSIONS,
                    'size_units'    => ['px', 'em', '%'],
                    'selectors'     => [
                        '{{WRAPPER}} .pt-image-button, {{WRAPPER}} .pt-image-button-effect-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                    ]
                ]);
        
        $this->end_controls_tab();
        
        $this->start_controls_tab('pt_image_button_style_hover',
            [
                'label'             => esc_html__('Hover', 'elementor'),
            ]
            );

        $this->add_control('pt_image_button_text_color_hover',
            [
                'label'             => esc_html__('Text Color', 'elementor'),
                'type'              => Controls_Manager::COLOR,
                'scheme'            => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors'         => [
                    '{{WRAPPER}} .pt-image-button:hover .pt-image-button-text-icon-wrapper'   => 'color: {{VALUE}};',
                ],
                'condition'         => [
                    'pt_image_button_hover_effect!'   => 'style4'
                ]
            ]);
        
        $this->add_control('pt_image_button_icon_color_hover',
            [
                'label'             => esc_html__('Icon Color', 'elementor'),
                'type'              => Controls_Manager::COLOR,
                'scheme'            => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors'         => [
                    '{{WRAPPER}} .pt-image-button:hover .pt-image-button-text-icon-wrapper i'   => 'color: {{VALUE}};',
                ],
                'condition'         => [
                    'pt_image_button_icon_switcher'  => 'yes',
                    'pt_image_button_hover_effect!'  => 'style4'
                ]
            ]);

            $this->add_control('pt_image_button_style4_icon_color',
            [
                'label'             => esc_html__('Icon Color', 'elementor'),
                'type'              => Controls_Manager::COLOR,
                'scheme'            => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors'         => [
                    '{{WRAPPER}} .pt-image-button:hover .pt-image-button-style4-icon-wrapper'   => 'color: {{VALUE}};',
                ],
                'condition'         => [
                    'pt_image_button_hover_effect'  => 'style4'
                ]
            ]);

            $this->add_control('pt_image_button_diagonal_overlay_color',
            [
                'label'             => esc_html__('Overlay Color', 'elementor'),
                'type'              => Controls_Manager::COLOR,
                'scheme'            => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors'         => [
                    '{{WRAPPER}} .pt-image-button-diagonal-effect-top:before, {{WRAPPER}} .pt-image-button-diagonal-effect-bottom:before, {{WRAPPER}} .pt-image-button-diagonal-effect-left:before, {{WRAPPER}} .pt-image-button-diagonal-effect-right:before'   => 'background-color: {{VALUE}};',
                ],
                'condition'         => [
                    'pt_image_button_hover_effect'  => 'style3'
                ]
            ]);


            $this->add_control('pt_image_button_overlap_overlay_color',
            [
                'label'             => esc_html__('Overlay Color', 'elementor'),
                'type'              => Controls_Manager::COLOR,
                'scheme'            => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors'         => [
                    '{{WRAPPER}} .pt-image-button-overlap-effect-horizontal:before, {{WRAPPER}} .pt-image-button-overlap-effect-vertical:before'   => 'background-color: {{VALUE}};',
                ],
                'condition'         => [
                    'pt_image_button_hover_effect'  => 'style5'
                ]
            ]);
            
        $this->add_group_control(
            Group_Control_Background::get_type(),
                [
                    'name'              => 'pt_image_button_background_hover',
                    'types'             => [ 'classic' , 'gradient' ],
                    'selector'          => '{{WRAPPER}} .pt-image-button-none:hover, {{WRAPPER}} .pt-image-button-style4-icon-wrapper,{{WRAPPER}} .pt-image-button-style1-top:before,{{WRAPPER}} .pt-image-button-style1-bottom:before,{{WRAPPER}} .pt-image-button-style1-left:before,{{WRAPPER}} .pt-image-button-style1-right:before,{{WRAPPER}} .pt-image-button-diagonal-effect-right:hover, {{WRAPPER}} .pt-image-button-diagonal-effect-top:hover, {{WRAPPER}} .pt-image-button-diagonal-effect-left:hover, {{WRAPPER}} .pt-image-button-diagonal-effect-bottom:hover,{{WRAPPER}} .pt-image-button-overlap-effect-horizontal:hover, {{WRAPPER}} .pt-image-button-overlap-effect-vertical:hover',
                    ]
                );
        
        /*Overlay Color*/
        $this->add_control('pt_image_button_overlay_color',
                [
                    'label'         => esc_html__('Overlay Color', 'elementor'),
                    'type'          => Controls_Manager::COLOR,
                    'scheme'        => [
                        'type'  => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'condition'     => [
                        'pt_image_button_overlay_switcher' => 'yes'
                    ],
                    'selectors'     => [
                        '{{WRAPPER}} .pt-image-button-squares-effect:before, {{WRAPPER}} .pt-image-button-squares-effect:after,{{WRAPPER}} .pt-image-button-squares-square-container:before, {{WRAPPER}} .pt-image-button-squares-square-container:after' => 'background-color: {{VALUE}};',
                        ]
                    ]
                );
        
        /*Button Border*/
        $this->add_group_control(
            Group_Control_Border::get_type(), 
                [
                    'name'          => 'pt_image_button_border_hover',
                    'selector'      => '{{WRAPPER}} .pt-image-button:hover',
                ]
                );
        
        /*Button Border Radius*/
        $this->add_control('pt_image_button_border_radius_hover',
                [
                    'label'         => esc_html__('Border Radius', 'elementor'),
                    'type'          => Controls_Manager::SLIDER,
                    'size_units'    => ['px', '%' ,'em'],
                    'selectors'     => [
                        '{{WRAPPER}} .pt-image-button:hover' => 'border-radius: {{SIZE}}{{UNIT}};'
                    ]
                ]
                );
        
        /*Icon Shadow*/
        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
                [
                    'label'         => esc_html__('Icon Shadow','elementor'),
                    'name'          => 'pt_image_button_icon_shadow_hover',
                    'selector'      => '{{WRAPPER}} .pt-image-button:hover .pt-image-button-text-icon-wrapper i',
                    'condition'         => [
                        'pt_image_button_icon_switcher'  => 'yes',
                        'pt_image_button_hover_effect!'     => 'style4'
                        ]
                    ]
                );
        
        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
                [
                    'label'         => esc_html__('Icon Shadow','elementor'),
                    'name'          => 'pt_image_button_style4_icon_shadow_hover',
                    'selector'      => '{{WRAPPER}} .pt-image-button:hover .pt-image-button-style4-icon-wrapper i',
                    'condition'         => [
                        'pt_image_button_hover_effect'     => 'style4'
                        ]
                    ]
                );
        
        /*Text Shadow*/
        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
                [
                    'label'         => esc_html__('Text Shadow','elementor'),
                    'name'          => 'pt_image_button_text_shadow_hover',
                    'selector'      => '{{WRAPPER}}  .pt-image-button:hover .pt-image-button-text-icon-wrapper span',
                    'condition'         => [
                       'pt_image_button_hover_effect!'   => 'style4'
                        ]
                    ]
                );
        
        /*Button Shadow*/
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
                [
                    'label'         => esc_html__('Button Shadow','elementor'),
                    'name'          => 'pt_image_button_box_shadow_hover',
                    'selector'      => '{{WRAPPER}} .pt-image-button:hover',
                ]
                );
        
        
        /*Button Margin*/
        $this->add_responsive_control('pt_image_button_margin_hover',
                [
                    'label'         => esc_html__('Margin', 'elementor'),
                    'type'          => Controls_Manager::DIMENSIONS,
                    'size_units'    => ['px', 'em', '%'],
                    'selectors'     => [
                        '{{WRAPPER}} .pt-image-button:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                    ]
                ]);
        
        /*Button Padding*/
        $this->add_responsive_control('pt_image_button_padding_hover',
                [
                    'label'         => esc_html__('Padding', 'elementor'),
                    'type'          => Controls_Manager::DIMENSIONS,
                    'size_units'    => ['px', 'em', '%'],
                    'selectors'     => [
                        '{{WRAPPER}} .pt-image-button:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                    ]
                ]);
        
        $this->end_controls_tab();
        
        $this->end_controls_tabs();

        /*End Labels Settings Section*/
        $this->end_controls_section();
    }

    protected function render($instance = [])
    {
        // get our input from the widget settings.
        $settings = $this->get_settings();
        $this->add_inline_editing_attributes( 'pt_image_button_text' );
        
        if($settings['pt_image_button_link_selection'] == 'url'){
            $image_link = $settings['pt_image_button_link']['url'];
        } else {
            $image_link = get_permalink($settings['pt_image_button_existing_link']);
        }
        
        $button_text = $settings['pt_image_button_text'];
        
        $button_size = 'pt-image-button-' . $settings['pt_image_button_size'];
        
        $button_icon = $settings['pt_image_button_icon_selection'];
        
        $image_event = $settings['pt_image_button_event_function'];
        
        if ($settings['pt_image_button_hover_effect'] == 'none'){
            $style_dir = 'pt-image-button-none';
        }    elseif($settings['pt_image_button_hover_effect'] == 'style1'){
            $style_dir = 'pt-image-button-style1-' . $settings['pt_image_button_style1_dir'];
        }   elseif($settings['pt_image_button_hover_effect'] == 'style3'){
            $style_dir = 'pt-image-button-diagonal-effect-' . $settings['pt_image_button_style3_dir'];
        }   elseif($settings['pt_image_button_hover_effect'] == 'style4'){
            $style_dir = 'pt-image-button-style4-' . $settings['pt_image_button_style4_dir'];
        }   elseif($settings['pt_image_button_hover_effect'] == 'style5'){
            $style_dir = 'pt-image-button-overlap-effect-' . $settings['pt_image_button_style5_dir'];
        }

?>
<div class="pt-image-button-container">
    <a class="pt-image-button  <?php echo esc_attr($button_size); ?> <?php echo esc_attr($style_dir); ?>" <?php if(!empty($image_link)) : ?>href="<?php echo esc_url($image_link); ?>"<?php endif; ?><?php if(!empty($settings['pt_image_button_link']['is_external'])) : ?>target="_blank"<?php endif; ?><?php if(!empty($settings['pt_image_button_link']['nofollow'])) : ?>rel="nofollow"<?php endif; ?><?php if(!empty($settings['pt_image_button_event_function']) && $settings['pt_image_button_event_switcher']) : ?> onclick="<?php echo esc_js($image_event); ?>"<?php endif ?>><div class="pt-image-button-text-icon-wrapper"><?php if($settings['pt_image_button_icon_switcher'] && $settings['pt_image_button_hover_effect'] != 'style4' &&$settings['pt_image_button_icon_position'] == 'before' &&!empty($settings['pt_image_button_icon_selection'])) : ?><i class="fa <?php echo esc_attr($button_icon); ?>"></i><?php endif; ?><span <?php echo $this->get_render_attribute_string( 'pt_image_button_text' ); ?>><?php echo $button_text; ?></span><?php if($settings['pt_image_button_icon_switcher'] && $settings['pt_image_button_hover_effect'] != 'style4' &&$settings['pt_image_button_icon_position'] == 'after' && !empty($settings['pt_image_button_icon_selection'])) : ?><i class="fa <?php echo esc_attr($button_icon); ?>"></i><?php endif; ?></div>
    <?php if($settings['pt_image_button_hover_effect'] == 'style4') : ?><div class="pt-image-button-style4-icon-wrapper <?php echo esc_attr($settings['pt_image_button_style4_dir']); ?>"><i class="fa <?php echo esc_attr($settings['pt_image_button_style4_icon_selection']); ?>"></i></div><?php endif; ?>
    </a>
    
</div>
    

    <?php
    }
}
Plugin::instance()->widgets_manager->register_widget_type(new PT_Advance_Button_Widget());
