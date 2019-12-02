<?php
/**
 * Class Pt-elementor-tooltip.php
 *
 * @author    Param Themes <paramthemes@gmail.com>
 * @copyright 2018 Param Themes
 * @license   Param Theme
 * @package   Elementor
 * @see       https://www.paramthemes.com
 */
 
 namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Widget_pt_Tooltip extends Widget_Base {

	/**
	 * Define our get_name settings.
	 */
	public function get_name() {
		return 'Pt-tooltip';
	}
	/**
	 * Define our get_title settings.
	 */
	public function get_title() {
		return __( 'Tooltip', 'elementor' );
	}
	/**
	 * Define our get_icon settings.
	 */
	public function get_icon() {
		return 'eicon-alert';
	}
	/**
	 * Define our get_categories settings.
	 */
	public function get_categories() {
		return [ 'pt-elementor-addons' ];
	}
	
	protected function _register_controls() {
		/**
  		 * Tooltip Settings
  		 */
  		$this->start_controls_section(
  			'pt_section_tooltip_settings',
  			[
  				'label' => esc_html__( 'Content Settings', 'elementor' )
  			]
  		);
		$this->add_responsive_control(
			'pt_tooltip_type',
			[
				'label' => esc_html__( 'Content Type', 'elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => true,
				'options' => [
					'icon' => [
						'title' => esc_html__( 'Icon', 'elementor' ),
						'icon' => 'fa fa-info',
					],
					'text' => [
						'title' => esc_html__( 'Text', 'elementor' ),
						'icon' => 'fa fa-text-width',
					],
					'image' => [
						'title' => esc_html__( 'Image', 'elementor' ),
						'icon' => 'fa fa-image',
					],
					'shortcode' => [
						'title' => esc_html__( 'Shortcode', 'elementor' ),
						'icon' => 'fa fa-code',
					],
				],
				'default' => 'icon',
			]
		);
  		$this->add_control(
			'pt_tooltip_content',
			[
				'label' => esc_html__( 'Content', 'elementor' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => esc_html__( 'Hover Me!', 'elementor' ),
				'condition' => [
					'pt_tooltip_type' => [ 'text' ]
				]
			]
		);
		$this->add_control(
		  'pt_tooltip_content_tag',
		  	[
		   		'label'       	=> esc_html__( 'Content Tag', 'elementor' ),
		     	'type' 			=> Controls_Manager::SELECT,
		     	'default' 		=> 'span',
		     	'label_block' 	=> false,
		     	'options' 		=> [
		     		'h1'  	=> esc_html__( 'H1', 'elementor' ),
		     		'h2'  	=> esc_html__( 'H2', 'elementor' ),
		     		'h3'  	=> esc_html__( 'H3', 'elementor' ),
		     		'h4'  	=> esc_html__( 'H4', 'elementor' ),
		     		'h5'  	=> esc_html__( 'H5', 'elementor' ),
		     		'h6'  	=> esc_html__( 'H6', 'elementor' ),
		     		'div'  	=> esc_html__( 'DIV', 'elementor' ),
		     		'span'  => esc_html__( 'SPAN', 'elementor' ),
		     		'p'  	=> esc_html__( 'P', 'elementor' ),
		     	],
		     	'condition' => [
		     		'pt_tooltip_type' => 'text'
		     	]
		  	]
		);
		$this->add_control(
			'pt_tooltip_shortcode_content',
			[
				'label' => esc_html__( 'Shortcode', 'elementor' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => esc_html__( '[shortcode-here]', 'elementor' ),
				'condition' => [
					'pt_tooltip_type' => [ 'shortcode' ]
				]
			]
		);
		$this->add_control(
			'pt_tooltip_icon_content',
			[
				'label' => esc_html__( 'Icon', 'elementor' ),
				'type' => Controls_Manager::ICON,
				'default' => 'fa fa-home',
				'condition' => [
					'pt_tooltip_type' => [ 'icon' ]
				]
			]
		);
		$this->add_control(
			'pt_tooltip_img_content',
			[
				'label' => esc_html__( 'Image', 'elementor' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'pt_tooltip_type' => [ 'image' ]
				]
			]
		);
		$this->add_responsive_control(
			'pt_tooltip_content_alignment',
			[
				'label' => esc_html__( 'Content Alignment', 'elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => true,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'elementor' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'elementor' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'elementor' ),
						'icon' => 'fa fa-align-right',
					],
					'justify' => [
						'title' => __( 'Justified', 'elementor' ),
						'icon' => 'fa fa-align-justify',
					],
				],
				'default' => 'left',
				'prefix_class' => 'pt-tooltip-align-',
			]
		);
		$this->add_control(
			'pt_tooltip_enable_link',
			[
				'label' => esc_html__( 'Enable Link', 'elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'false',
				'return_value' => 'yes',
				'condition' => [
					'pt_tooltip_type!' => ['shortcode']
				]
			]
		);
		$this->add_control(
			'pt_tooltip_link',
			[
				'label' => esc_html__( 'Button Link', 'elementor' ),
				'type' => Controls_Manager::URL,
				'label_block' => true,
				'default' => [
        			'url' => '#',
        			'is_external' => '',
     			],
     			'show_external' => true,
     			'condition' => [
     				'pt_tooltip_enable_link' => 'yes'
     			]
			]
		);
  		$this->end_controls_section();

  		/**
  		 * Tooltip Hover Content Settings
  		 */
  		$this->start_controls_section(
  			'pt_section_tooltip_hover_content_settings',
  			[
  				'label' => esc_html__( 'Tooltip Settings', 'elementor' )
  			]
  		);
  		$this->add_control(
			'pt_tooltip_hover_content',
			[
				'label' => esc_html__( 'Content', 'elementor' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => esc_html__( 'Tooltip content', 'elementor' ),
			]
		);
		$this->add_control(
		  'pt_tooltip_hover_dir',
		  	[
		   		'label'       	=> esc_html__( 'Hover Direction', 'elementor' ),
		     	'type' 			=> Controls_Manager::SELECT,
		     	'default' 		=> 'right',
		     	'label_block' 	=> false,
		     	'options' 		=> [
		     		'left'  	=> esc_html__( 'Left', 'elementor' ),
		     		'right'  	=> esc_html__( 'Right', 'elementor' ),
		     		'top'  		=> esc_html__( 'Top', 'elementor' ),
		     		'bottom'  	=> esc_html__( 'Bottom', 'elementor' ),
		     	],
		  	]
		);
		$this->add_control(
			'pt_tooltip_hover_speed',
			[
				'label' => esc_html__( 'Hover Speed', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => false,
				'default' => esc_html__( '300', 'elementor' ),
				'selectors' => [
		            '{{WRAPPER}} .pt-tooltip:hover .pt-tooltip-text.pt-tooltip-top' => 'animation-duration: {{SIZE}}ms;',
		            '{{WRAPPER}} .pt-tooltip:hover .pt-tooltip-text.pt-tooltip-left' => 'animation-duration: {{SIZE}}ms;',
		            '{{WRAPPER}} .pt-tooltip:hover .pt-tooltip-text.pt-tooltip-bottom' => 'animation-duration: {{SIZE}}ms;',
		            '{{WRAPPER}} .pt-tooltip:hover .pt-tooltip-text.pt-tooltip-right' => 'animation-duration: {{SIZE}}ms;',
		        ]
			]
		);
  		$this->end_controls_section();
  		

  		/**
		 * -------------------------------------------
		 * Tab Style Tooltip Content
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'pt_section_tooltip_style_settings',
			[
				'label' => esc_html__( 'Content Style', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'pt_tooltip_max_width',
		    [
		        'label' => __( 'Content Max Width', 'elementor' ),
		        'type' => Controls_Manager::SLIDER,
		        'range' => [
		            'px' => [
		                'min' => 0,
		                'max' => 1000,
		                'step' => 5,
		            ],
		            '%' => [
		                'min' => 0,
		                'max' => 100,
		            ],
		        ],
		        'size_units' => [ 'px', '%' ],
		        'selectors' => [
		            '{{WRAPPER}} .pt-tooltip' => 'max-width: {{SIZE}}{{UNIT}};',
		        ]
		    ]
		);
		$this->add_responsive_control(
			'pt_tooltip_content_padding',
			[
				'label' => esc_html__( 'Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .pt-tooltip' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);
		$this->add_responsive_control(
			'pt_tooltip_content_margin',
			[
				'label' => esc_html__( 'Margin', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .pt-tooltip' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);
		$this->start_controls_tabs( 'pt_tooltip_content_style_tabs' );
			// Normal State Tab
			$this->start_controls_tab( 'pt_tooltip_content_normal', [ 'label' => esc_html__( 'Normal', 'elementor' ) ] );
				$this->add_control(
					'pt_tooltip_content_bg_color',
					[
						'label' => esc_html__( 'Background Color', 'elementor' ),
						'type' => Controls_Manager::COLOR,
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .pt-tooltip' => 'background-color: {{VALUE}};',
						],
					]
				);
				$this->add_control(
					'pt_tooltip_content_color',
					[
						'label' => esc_html__( 'Text Color', 'elementor' ),
						'type' => Controls_Manager::COLOR,
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .pt-tooltip' => 'color: {{VALUE}};',
							'{{WRAPPER}} .pt-tooltip a' => 'color: {{VALUE}};',
						],
					]
				);
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'pt_tooltip_shadow',
						'selector' => '{{WRAPPER}} .pt-tooltip',
						'separator' => 'before'
					]
				);
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'pt_tooltip_border',
						'label' => esc_html__( 'Border', 'elementor' ),
						'selector' => '{{WRAPPER}} .pt-tooltip',
					]
				);
			$this->end_controls_tab();

			// Hover State Tab
			$this->start_controls_tab( 'pt_tooltip_content_hover', [ 'label' => esc_html__( 'Hover', 'elementor' ) ] );
				$this->add_control(
					'pt_tooltip_content_hover_bg_color',
					[
						'label' => esc_html__( 'Background Color', 'elementor' ),
						'type' => Controls_Manager::COLOR,
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .pt-tooltip:hover' => 'background-color: {{VALUE}};',
						],
					]
				);
				$this->add_control(
					'pt_tooltip_content_hover_color',
					[
						'label' => esc_html__( 'Text Color', 'elementor' ),
						'type' => Controls_Manager::COLOR,
						'default' => '#212121',
						'selectors' => [
							'{{WRAPPER}} .pt-tooltip:hover' => 'color: {{VALUE}};',
							'{{WRAPPER}} .pt-tooltip:hover a' => 'color: {{VALUE}};',
						],
					]
				);
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'pt_tooltip_hover_shadow',
						'selector' => '{{WRAPPER}} .pt-tooltip:hover',
						'separator' => 'before'
					]
				);
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'pt_tooltip_hover_border',
						'label' => esc_html__( 'Border', 'elementor' ),
						'selector' => '{{WRAPPER}} .pt-tooltip:hover',
					]
				);
			$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
            	'name' => 'pt_tooltip_content_typography',
				'selector' => '{{WRAPPER}} .pt-tooltip',
			]
		);
		$this->add_responsive_control(
			'pt_tooltip_content_radius',
			[
				'label' => esc_html__( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .pt-tooltip' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);
		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Tab Style Tooltip Hover Content
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'pt_section_tooltip_hover_style_settings',
			[
				'label' => esc_html__( 'Tooltip Style', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'pt_tooltip_hover_width',
		    [
		        'label' => __( 'Tooltip Width', 'elementor' ),
		        'type' => Controls_Manager::SLIDER,
		        'default' => [
		        	'size' => '150'
		        ],
		        'range' => [
		            'px' => [
		                'min' => 0,
		                'max' => 1000,
		                'step' => 5,
		            ],
		            '%' => [
		                'min' => 0,
		                'max' => 100,
		            ],
		        ],
		        'size_units' => [ 'px', '%' ],
		        'selectors' => [
		            '{{WRAPPER}} .pt-tooltip .pt-tooltip-text' => 'width: {{SIZE}}{{UNIT}};',
		        ]
		    ]
		);
		$this->add_responsive_control(
			'pt_tooltip_hover_max_width',
		    [
		        'label' => __( 'Tooltip Max Width', 'elementor' ),
		        'type' => Controls_Manager::SLIDER,
		        'default' => [
		        	'size' => '150'
		        ],
		        'range' => [
		            'px' => [
		                'min' => 0,
		                'max' => 1000,
		                'step' => 5,
		            ],
		            '%' => [
		                'min' => 0,
		                'max' => 100,
		            ],
		        ],
		        'size_units' => [ 'px', '%' ],
		        'selectors' => [
		            '{{WRAPPER}} .pt-tooltip .pt-tooltip-text' => 'max-width: {{SIZE}}{{UNIT}};',
		        ]
		    ]
		);
		$this->add_responsive_control(
			'pt_tooltip_hover_content_padding',
			[
				'label' => esc_html__( 'Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 				'{{WRAPPER}} .pt-tooltip .pt-tooltip-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);
		$this->add_responsive_control(
			'pt_tooltip_hover_content_margin',
			[
				'label' => esc_html__( 'Margin', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 				'{{WRAPPER}} .pt-tooltip .pt-tooltip-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);
		$this->add_control(
			'pt_tooltip_hover_content_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#555',
				'selectors' => [
					'{{WRAPPER}} .pt-tooltip .pt-tooltip-text' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'pt_tooltip_hover_content_color',
			[
				'label' => esc_html__( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .pt-tooltip .pt-tooltip-text' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
            	'name' => 'pt_tooltip_hover_content_typography',
				'selector' => '{{WRAPPER}} .pt-tooltip .pt-tooltip-text',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'pt_tooltip_box_shadow',
				'selector' => '{{WRAPPER}} .pt-tooltip .pt-tooltip-text',
			]
		);
		$this->add_responsive_control(
			'pt_tooltip_arrow_size',
			[
				'label' => __( 'Arrow Size', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 5,
					'unit' => 'px',
				],
				'size_units' => [ 'px' ],
				'range' => [
		            'px' => [
		                'min' => 0,
		                'max' => 100,
		                'step' => 1,
		            ]
				],
				'selectors' => [
					'{{WRAPPER}} .pt-tooltip .pt-tooltip-text:after' => 'border-width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .pt-tooltip .pt-tooltip-text.pt-tooltip-left::after' => 'top: calc( 50% - {{SIZE}}{{UNIT}} );',
					'{{WRAPPER}} .pt-tooltip .pt-tooltip-text.pt-tooltip-right::after' => 'top: calc( 50% - {{SIZE}}{{UNIT}} );',
					'{{WRAPPER}} .pt-tooltip .pt-tooltip-text.pt-tooltip-top::after' => 'left: calc( 50% - {{SIZE}}{{UNIT}} );',
					'{{WRAPPER}} .pt-tooltip .pt-tooltip-text.pt-tooltip-bottom::after' => 'left: calc( 50% - {{SIZE}}{{UNIT}} );',
				],
			]
		);
		$this->add_control(
			'pt_tooltip_arrow_color',
			[
				'label' => esc_html__( 'Arrow Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#555',
				'selectors' => [
					'{{WRAPPER}} .pt-tooltip .pt-tooltip-text.pt-tooltip-top:after' => 'border-top-color: {{VALUE}};',
					'{{WRAPPER}} .pt-tooltip .pt-tooltip-text.pt-tooltip-bottom:after' => 'border-bottom-color: {{VALUE}};',
					'{{WRAPPER}} .pt-tooltip .pt-tooltip-text.pt-tooltip-left:after' => 'border-left-color: {{VALUE}};',
					'{{WRAPPER}} .pt-tooltip .pt-tooltip-text.pt-tooltip-right:after' => 'border-right-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings();
   		$target = $settings['pt_tooltip_link']['is_external'] ? 'target="_blank"' : '';
	  	$nofollow = $settings['pt_tooltip_link']['nofollow'] ? 'rel="nofollow"' : '';
	?>
	<div class="pt-tooltip">
		<?php if( $settings['pt_tooltip_type'] === 'text' ) : ?>
			<<?php echo esc_attr( $settings['pt_tooltip_content_tag'] ); ?> class="pt-tooltip-content"><?php if( $settings['pt_tooltip_enable_link'] === 'yes' ) : ?><a href="<?php echo esc_url( $settings['pt_tooltip_link']['url'] ); ?>" <?php echo $target; ?> <?php echo $nofollow; ?> ><?php endif; ?><?php echo esc_html__( $settings['pt_tooltip_content'], 'essential-addons-elementor' ); ?><?php if( $settings['pt_tooltip_enable_link'] === 'yes' ) : ?></a><?php endif; ?></<?php echo esc_attr( $settings['pt_tooltip_content_tag'] ); ?>>
  			<span class="pt-tooltip-text pt-tooltip-<?php echo esc_attr( $settings['pt_tooltip_hover_dir'] ) ?>"><?php echo esc_attr( $settings['pt_tooltip_hover_content'] ); ?></span>
  		<?php elseif( $settings['pt_tooltip_type'] === 'icon' ) : ?>
			<span class="pt-tooltip-content"><?php if( $settings['pt_tooltip_enable_link'] === 'yes' ) : ?><a href="<?php echo esc_url( $settings['pt_tooltip_link']['url'] ); ?>" <?php echo $target; ?> <?php echo $nofollow; ?> ><?php endif; ?><i class="<?php echo esc_attr( $settings['pt_tooltip_icon_content'] ); ?>"></i><?php if( $settings['pt_tooltip_enable_link'] === 'yes' ) : ?></a><?php endif; ?></span>
  			<span class="pt-tooltip-text pt-tooltip-<?php echo esc_attr( $settings['pt_tooltip_hover_dir'] ) ?>"><?php echo esc_attr( $settings['pt_tooltip_hover_content'] ); ?></span>
  		<?php elseif( $settings['pt_tooltip_type'] === 'image' ) : ?>
			<span class="pt-tooltip-content"><?php if( $settings['pt_tooltip_enable_link'] === 'yes' ) : ?><a href="<?php echo esc_url( $settings['pt_tooltip_link']['url'] ); ?>" <?php echo $target; ?> <?php echo $nofollow; ?> ><?php endif; ?><img src="<?php echo esc_url( $settings['pt_tooltip_img_content']['url'] ); ?>" alt="<?php echo esc_attr( $settings['pt_tooltip_hover_content'] ); ?>"><?php if( $settings['pt_tooltip_enable_link'] === 'yes' ) : ?></a><?php endif; ?></span>
  			<span class="pt-tooltip-text pt-tooltip-<?php echo esc_attr( $settings['pt_tooltip_hover_dir'] ) ?>"><?php echo esc_attr( $settings['pt_tooltip_hover_content'] ); ?></span>
  		<?php elseif( $settings['pt_tooltip_type'] === 'shortcode' ) : ?>
			<div class="pt-tooltip-content"><?php echo do_shortcode( $settings['pt_tooltip_shortcode_content'] ); ?></div>
  			<span class="pt-tooltip-text pt-tooltip-<?php echo esc_attr( $settings['pt_tooltip_hover_dir'] ) ?>"><?php echo esc_attr( $settings['pt_tooltip_hover_content'] ); ?></span>
  		<?php endif; ?>
	</div>
	<?php
	}

	protected function content_template() {
		
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new Widget_pt_Tooltip() );