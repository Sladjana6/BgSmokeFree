<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Widget_PT_Filterable_Gallery extends Widget_Base {

	public function get_name() {
		return 'pt-filterable-gallery';
	}

	public function get_title() {
		return esc_html__( 'Filterable Gallery', 'elementor' );
	}

	public function get_icon() {
		return 'fa fa-th';
	}

   public function get_categories() {
		return [ 'pt-elementor-addons' ];
	}

	protected function _register_controls() {
		/**
  		 * Filter Gallery Settings
  		 */
  		$this->start_controls_section(
  			'pt_section_fg_settings',
  			[
  				'label' => esc_html__( 'Filterable Gallery Settings', 'elementor' )
  			]
  		);

		$this->add_control(
			'pt_fg_filter_duration',
			[
				'label' => esc_html__( 'Animation Duration (ms)', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => false,
				'default' => 500,
			]
		);

		$this->add_control(
			'pt_fg_filter_animation_style',
			[
				'label' => esc_html__( 'Animation Style', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [
					'default' => esc_html__( 'Default', 'elementor' ),
					'effect-in' => esc_html__( 'Fade In', 'elementor' ),
					'effect-out' => esc_html__( 'Fade Out', 'elementor' ),
				],
			]
		);

  		$this->add_control(
			'pt_fg_columns',
			[
				'label' => esc_html__( 'Number of Columns', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'pt-col-3',
				'options' => [
					'pt-col-1' => esc_html__( 'Single Column', 'elementor' ),
					'pt-col-2' => esc_html__( 'Two Columns',   'elementor' ),
					'pt-col-3' => esc_html__( 'Three Columns', 'elementor' ),
					'pt-col-4' => esc_html__( 'Four Columns',  'elementor' ),
					'pt-col-5' => esc_html__( 'Five Columns',  'elementor' ),
				],
			]
		);

		$this->add_control(
			'pt_fg_grid_style',
			[
				'label' => esc_html__( 'Grid Style', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'pt-hoverer',
				'options' => [
					'pt-hoverer' 	=> esc_html__( 'Hoverer', 'elementor' ),
					'pt-tiles' 	=> esc_html__( 'Tiles',   'elementor' ),
					'pt-cards' 	=> esc_html__( 'Cards', 'elementor' ),
				],
			]
		);

		$this->add_control(
			'pt_fg_grid_hover_style',
			[
				'label' => esc_html__( 'Hover Style', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'pt-zoom-in',
				'options' => [
					'pt-zoom-in' 		=> esc_html__( 'Zoom In', 'elementor' ),
					'pt-zoom-out' 		=> esc_html__( 'Zoom Out', 'elementor' ),
					'pt-slide-left' 	=> esc_html__( 'Slide In Left',   'elementor' ),
					'pt-slide-right' 	=> esc_html__( 'Slide In Right', 'elementor' ),
					'pt-slide-top' 	=> esc_html__( 'Slide In Top', 'elementor' ),
					'pt-slide-bottom' => esc_html__( 'Slide In Bottom', 'elementor' ),
				],
			]
		);

  		$this->add_control(
			'pt_section_fg_zoom_icon',
			[
				'label' => esc_html__( 'Zoom Icon', 'elementor' ),
				'type' => Controls_Manager::ICON,
				'default' => 'fa fa-search-plus',
			]
		);

		$this->add_control(
			'pt_section_fg_link_icon',
			[
				'label' => esc_html__( 'Link Icon', 'elementor' ),
				'type' => Controls_Manager::ICON,
				'default' => 'fa fa-link',
			]
		);

  		$this->end_controls_section();

		/**
  		 * Filter Gallery Control Settings
  		 */
  		$this->start_controls_section(
  			'pt_section_fg_control_settings',
  			[
  				'label' => esc_html__( 'Gallery Control Settings', 'elementor' )
  			]
  		);

  		$this->add_control(
			'pt_fg_controls',
			[
				'type' => Controls_Manager::REPEATER,
				'seperator' => 'before',
				'default' => [
					[ 'pt_fg_control' => 'Item' ],
				],
				'fields' => [
					[
						'name' => 'pt_fg_control',
						'label' => esc_html__( 'List Item', 'elementor' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'default' => esc_html__( 'Item', 'elementor' )
					],
				],
				'title_field' => '{{pt_fg_control}}',
			]
		);

  		$this->end_controls_section();

  		/**
  		 * Filter Gallery Grid Settings
  		 */
  		$this->start_controls_section(
  			'pt_section_fg_grid_settings',
  			[
  				'label' => esc_html__( 'Gallery Item Settings', 'elementor' )
  			]
  		);

  		$this->add_control(
			'pt_fg_gallery_items',
			[
				'type' => Controls_Manager::REPEATER,
				'seperator' => 'before',
				'default' => [
					[ 'pt_fg_gallery_item_name' => 'Gallery Item Name' ],
					[ 'pt_fg_gallery_item_name' => 'Gallery Item Name' ],
					[ 'pt_fg_gallery_item_name' => 'Gallery Item Name' ],
					[ 'pt_fg_gallery_item_name' => 'Gallery Item Name' ],
					[ 'pt_fg_gallery_item_name' => 'Gallery Item Name' ],
					[ 'pt_fg_gallery_item_name' => 'Gallery Item Name' ],
				],
				'fields' => [
					[
						'name' => 'pt_fg_gallery_item_name',
						'label' => esc_html__( 'Item Name', 'elementor' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'default' => esc_html__( 'Gallery item name', 'elementor' )
					],
					[
						'name' => 'pt_fg_gallery_item_content',
						'label' => esc_html__( 'Item Content', 'elementor' ),
						'type' => Controls_Manager::TEXTAREA,
						'label_block' => true,
						'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, provident.', 'elementor' ),
					],
					[
						'name' => 'pt_fg_gallery_control_name',
						'label' => esc_html__( 'Control Name', 'elementor' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'description' => esc_html__( 'User the gallery control name form Control Settings. use the exact name that matches with its associate name.', 'elementor' )
					],
					[
						'name' => 'pt_fg_gallery_img',
						'label' => esc_html__( 'Image', 'elementor' ),
						'type' => Controls_Manager::MEDIA,
						'default' => [
							'url' => Utils::get_placeholder_image_src(),
						],
					],
					[
						'name' => 'pt_fg_gallery_link',
						'label' => __( 'Gallery Link?', 'elementor' ),
						'type' => Controls_Manager::SWITCHER,
						'default' => 'true',
						'label_on' => esc_html__( 'Yes', 'elementor' ),
						'label_off' => esc_html__( 'No', 'elementor' ),
						'return_value' => 'true',
				  	],
				  	[
						'name' => 'pt_fg_gallery_img_link',
						'type' => Controls_Manager::URL,
						'label_block' => true,
						'default' => [
		        			'url' => '#',
		        			'is_external' => '',
		     			],
		     			'show_external' => true,
		     			'condition' => [
		     				'pt_fg_gallery_link' => 'true'
		     			]
					]
				],
				'title_field' => '{{pt_fg_gallery_item_name}}',
			]
		);

  		$this->end_controls_section();

  		/**
  		 * Filter Gallery Grid Settings
  		 */
  		$this->start_controls_section(
  			'pt_section_fg_popup_settings',
  			[
  				'label' => esc_html__( 'Popup Settings', 'elementor' )
  			]
  		);

  		$this->add_control(
		  'pt_fg_show_popup',
		  	[
				'label' => __( 'Show Popup', 'elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'true',
				'label_on' => esc_html__( 'Yes', 'elementor' ),
				'label_off' => esc_html__( 'No', 'elementor' ),
				'return_value' => 'true',
		  	]
		);

		$this->add_control(
		  'pt_fg_show_popup_gallery',
		  	[
				'label' => __( 'Show Popup Gallery', 'elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'true',
				'label_on' => esc_html__( 'Yes', 'elementor' ),
				'label_off' => esc_html__( 'No', 'elementor' ),
				'return_value' => 'true',
				'condition' => [
					'pt_fg_show_popup' => 'true'
				]
		  	]
		);

  		$this->end_controls_section();

  		/**
		 * -------------------------------------------
		 * Tab Style (Filterable Gallery Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'pt_section_fg_style_settings',
			[
				'label' => esc_html__( 'General Style', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'pt_fg_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .pt-filter-gallery-wrapper' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'pt_fg_container_padding',
			[
				'label' => esc_html__( 'Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .pt-filter-gallery-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_responsive_control(
			'pt_fg_container_margin',
			[
				'label' => esc_html__( 'Margin', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .pt-filter-gallery-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'eael_fg_border',
				'label' => esc_html__( 'Border', 'elementor' ),
				'selector' => '{{WRAPPER}} .pt-filter-gallery-wrapper',
			]
		);

		$this->add_control(
			'pt_fg_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 0,
				],
				'range' => [
					'px' => [
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .pt-filter-gallery-wrapper' => 'border-radius: {{SIZE}}px;',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'pt_fg_shadow',
				'selector' => '{{WRAPPER}} .pt-filter-gallery-wrapper',
			]
		);

		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Tab Style (Filterable Gallery Control Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'pt_section_fg_control_style_settings',
			[
				'label' => esc_html__( 'Control Style', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);
		$this->add_responsive_control(
			'pt_fg_control_padding',
			[
				'label' => esc_html__( 'Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .pt-filter-gallery-control ul li a.control' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_responsive_control(
			'pt_fg_control_margin',
			[
				'label' => esc_html__( 'Margin', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .pt-filter-gallery-control ul li a.control' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
	         'name' => 'pt_fg_control_typography',
				'selector' => '{{WRAPPER}} .pt-filter-gallery-control ul li a.control',
			]
		);
		// Tabs
		$this->start_controls_tabs( 'pt_fg_control_tabs' );

			// Normal State Tab
			$this->start_controls_tab( 'pt_fg_control_normal', [ 'label' => esc_html__( 'Normal', 'elementor' ) ] );

			$this->add_control(
				'pt_fg_control_normal_text_color',
				[
					'label' => esc_html__( 'Text Color', 'elementor' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#444',
					'selectors' => [
						'{{WRAPPER}} .pt-filter-gallery-control ul li a.control' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'pt_fg_control_normal_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'elementor' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .pt-filter-gallery-control ul li a.control' => 'background: {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'pt_fg_control_normal_border',
					'label' => esc_html__( 'Border', 'elementor' ),
					'selector' => '{{WRAPPER}} .pt-filter-gallery-control ul li > a.control',
				]
			);

			$this->add_control(
				'pt_fg_control_normal_border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'elementor' ),
					'type' => Controls_Manager::SLIDER,
					'default' => [
						'size' => 20
					],
					'range' => [
						'px' => [
							'max' => 30,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .pt-filter-gallery-control ul li a.control' => 'border-radius: {{SIZE}}px;',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'pt_fg_control_shadow',
					'selector' => '{{WRAPPER}} .pt-filter-gallery-control ul li a.control',
					'separator' => 'before'
				]
			);

			$this->end_controls_tab();

			// Active State Tab
			$this->start_controls_tab( 'pt_cta_btn_hover', [ 'label' => esc_html__( 'Active', 'elementor' ) ] );

			$this->add_control(
				'pt_fg_control_active_text_color',
				[
					'label' => esc_html__( 'Text Color', 'elementor' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#fff',
					'selectors' => [
						'{{WRAPPER}} .pt-filter-gallery-control ul li a.control.mixitup-control-active' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'pt_fg_control_active_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'elementor' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#007fc0',
					'selectors' => [
						'{{WRAPPER}} .pt-filter-gallery-control ul li a.control.mixitup-control-active' => 'background: {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'pt_fg_control_active_border',
					'label' => esc_html__( 'Border', 'elementor' ),
					'selector' => '{{WRAPPER}} .pt-filter-gallery-control ul li > a.control.mixitup-control-active',
				]
			);

			$this->add_control(
				'pt_fg_control_active_border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'elementor' ),
					'type' => Controls_Manager::SLIDER,
					'default' => [
						'size' => 20
					],
					'range' => [
						'px' => [
							'max' => 30,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .pt-filter-gallery-control ul li a.control.mixitup-control-active' => 'border-radius: {{SIZE}}px;',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'pt_fg_control_active_shadow',
					'selector' => '{{WRAPPER}} .pt-filter-gallery-control ul li a.control.mixitup-control-active',
					'separator' => 'before'
				]
			);

			$this->end_controls_tab();

		$this->end_controls_tabs();



		$this->end_controls_section();



		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Tab Style (Filterable Gallery Item Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'pt_section_fg_item_style_settings',
			[
				'label' => esc_html__( 'Item Style', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_responsive_control(
			'pt_fg_item_container_padding',
			[
				'label' => esc_html__( 'Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .pt-filter-gallery-container .item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_responsive_control(
			'pt_fg_item_container_margin',
			[
				'label' => esc_html__( 'Margin', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .pt-filter-gallery-container .item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'pt_fg_item_border',
				'label' => esc_html__( 'Border', 'elementor' ),
				'selector' => '{{WRAPPER}} .pt-filter-gallery-container .item',
			]
		);

		$this->add_control(
			'pt_fg_item_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 0,
				],
				'range' => [
					'px' => [
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .pt-filter-gallery-container .item' => 'border-radius: {{SIZE}}px;',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'pt_fg_item_shadow',
				'selector' => '{{WRAPPER}} .pt-filter-gallery-container .item',
			]
		);

		$this->end_controls_section();
		/**
		 * -------------------------------------------
		 * Tab Style (Filterable Gallery Item Caption Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'pt_section_fg_item_cap_style_settings',
			[
				'label' => esc_html__( 'Item Caption Style', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'pt_fg_item_cap_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => 'rgba(0,0,0,0.7)',
				'selectors' => [
					'{{WRAPPER}} .pt-filter-gallery-container .item .caption' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'pt_fg_item_cap_container_padding',
			[
				'label' => esc_html__( 'Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .pt-filter-gallery-container .item .caption' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'pt_fg_item_cap_border',
				'label' => esc_html__( 'Border', 'elementor' ),
				'selector' => '{{WRAPPER}} .pt-filter-gallery-container .item .caption',
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'pt_fg_item_cap_shadow',
				'selector' => '{{WRAPPER}} .pt-filter-gallery-container .item .caption',
			]
		);

		$this->add_control(
			'pt_fg_item_caption_hover_icon',
			[
				'label' => esc_html__( 'Hover Icon', 'elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'pt_fg_item_icon_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#007fc0',
				'selectors' => [
					'{{WRAPPER}} .pt-filter-gallery-container .item .caption a' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'pt_fg_item_icon_color',
			[
				'label' => esc_html__( 'Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .pt-filter-gallery-container .item .caption a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		/* Tab Style (Filterable Gallery Item Content Style) */
		 
		 
		$this->start_controls_section(
			'pt_section_fg_item_content_style_settings',
			[
				'label' => esc_html__( 'Item Content Style', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
	 			'condition' => [
	 				'eael_fg_grid_style' => 'pt-cards'
	 			]
			]
		);

		$this->add_control(
			'pt_fg_item_content_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#f9f9f9',
				'selectors' => [
					'{{WRAPPER}} .pt-filter-gallery-container.pt-cards .item-content' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'pt_fg_item_content_container_padding',
			[
				'label' => esc_html__( 'Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .pt-filter-gallery-container.pt-cards .item-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'pt_fg_item_content_border',
				'label' => esc_html__( 'Border', 'elementor' ),
				'selector' => '{{WRAPPER}} .pt-filter-gallery-container.pt-cards .item-content',
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'pt_fg_item_content_shadow',
				'selector' => '{{WRAPPER}} .pt-filter-gallery-container.pt-cards .item-content',
			]
		);

		$this->add_control(
			'pt_fg_item_content_title_typography_settings',
			[
				'label' => esc_html__( 'Title Typography', 'elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'pt_fg_item_content_title_color',
			[
				'label' => esc_html__( 'Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#303133',
				'selectors' => [
					'{{WRAPPER}} .pt-filter-gallery-container.pt-cards .item-content .title a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'pt_fg_item_content_title_hover_color',
			[
				'label' => esc_html__( 'Hover Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#23527c',
				'selectors' => [
					'{{WRAPPER}} .pt-filter-gallery-container.pt-cards .item-content .title a:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             	'name' => 'pt_fg_item_content_title_typography',
				'selector' => '{{WRAPPER}} .pt-filter-gallery-container.pt-cards .item-content .title a',
			]
		);

		$this->add_control(
			'pt_fg_item_content_text_typography_settings',
			[
				'label' => esc_html__( 'Content Typography', 'elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'pt_fg_item_content_text_color',
			[
				'label' => esc_html__( 'Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#444',
				'selectors' => [
					'{{WRAPPER}} .pt-filter-gallery-container.pt-cards .item-content p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             	'name' => 'pt_fg_item_content_text_typography',
				'selector' => '{{WRAPPER}} .pt-filter-gallery-container.pt-cards .item-content p',
			]
		);

		$this->add_responsive_control(
			'pt_fg_item_content_alignment',
			[
				'label' => esc_html__( 'Content Alignment', 'elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => true,
				'separator' => 'before',
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
				],
				'default' => 'left',
				'prefix_class' => 'pt-fg-content-align-',
			]
		);

		$this->end_controls_section();

		
	}

	public function sorter_class( $string ) {
		$sorter_class = strtolower( $string );
		$sorter_class = preg_replace( '/[^a-z0-9_\s-]/', "", $sorter_class );
		$sorter_class = preg_replace("/[\s-]+/", " ", $sorter_class);
		$sorter_class = preg_replace("/[\s_]/", "-", $sorter_class);

		return $sorter_class;
	}

	protected function render( ) {

   		$settings = $this->get_settings();

   		if( $settings['pt_fg_filter_animation_style'] == 'default' ) {
   			$fg_animation = 'fade translateZ(-100px)';
   		}elseif( $settings['pt_fg_filter_animation_style'] == 'effect-in' ) {
   			$fg_animation = 'fade translateY(-100%)';
   		}elseif( $settings['pt_fg_filter_animation_style'] == 'effect-out' ) {
   			$fg_animation = 'fade translateY(-100%)';
   		}

	?>
		<div id="pt-filter-gallery-wrapper-<?php echo esc_attr( $this->get_id() ); ?>" class="pt-filter-gallery-wrapper">
			<div class="pt-filter-gallery-control">
	            <ul>
	                <li><a href="javascript:;" class="control" data-filter="all">All</a></li>
	                <?php foreach( $settings['pt_fg_controls'] as $control ) : ?>
	                <?php $sorter_filter = $this->sorter_class( $control['pt_fg_control'] ); ?>
						<li><a href="javascript:;" class="control" data-filter=".<?php echo esc_attr( $sorter_filter ); ?>-<?php echo esc_attr( $this->get_id() ); ?>"><?php echo $control['pt_fg_control']; ?></a></li>
	                <?php endforeach; ?>
	            </ul>
	        </div>
			<?php if( $settings['pt_fg_grid_style'] == 'pt-hoverer' || $settings['pt_fg_grid_style'] == 'pt-tiles' ) : ?>
		        <div class="pt-filter-gallery-container <?php echo esc_attr( $settings['pt_fg_grid_style'] ); ?> <?php echo esc_attr( $settings['pt_fg_columns'] ); ?>" data-ref="mixitup-container-<?php echo esc_attr( $this->get_id() ); ?>">
		        	<?php foreach( $settings['pt_fg_gallery_items'] as $gallery ) : ?>
		        	<?php $sorter_class = $this->sorter_class( $gallery['pt_fg_gallery_control_name'] ); ?>
		            <div class="item <?php echo esc_attr( $sorter_class ) ?>-<?php echo esc_attr( $this->get_id() ); ?>" data-ref="mixitup-target-<?php echo esc_attr( $this->get_id() ); ?>" data-item-bg="<?php echo esc_attr( $gallery['pt_fg_gallery_img']['url'] ); ?>">
		                <div class="caption <?php echo esc_attr( $settings['pt_fg_grid_hover_style'] ); ?> ">
		                	<?php if( 'true' == $settings['pt_fg_show_popup'] ) : ?>
		                    <a href="<?php echo esc_attr( $gallery['pt_fg_gallery_img']['url'] ); ?>" class="pt-magnific-link"><i class="<?php echo esc_attr( $settings['pt_section_fg_zoom_icon'] ); ?>"></i></a>
		                	<?php endif; ?>
		                    <?php if( 'true' == $gallery['pt_fg_gallery_link'] ) :
								$ptl_gallery_link = $gallery['pt_fg_gallery_img_link']['url'];
				        		$target = $gallery['pt_fg_gallery_img_link']['is_external'] ? 'target="_blank"' : '';
				        		$nofollow = $gallery['pt_fg_gallery_img_link']['nofollow'] ? 'rel="nofollow"' : '';
				        	?>
				        	<a href="<?php echo esc_url( $ptl_gallery_link ); ?>" <?php echo $target; ?> <?php echo $nofollow; ?> ><i class="<?php echo esc_attr( $settings['pt_section_fg_link_icon'] ); ?>"></i></a>
		                    <?php endif; ?>
		                </div>
		            </div>
		        	<?php endforeach; ?>
		        </div>
	    	<?php elseif( $settings['pt_fg_grid_style'] == 'pt-cards' ) : ?>
				<div class="pt-filter-gallery-container <?php echo esc_attr( $settings['pt_fg_grid_style'] ); ?> <?php echo esc_attr( $settings['pt_fg_columns'] ); ?>" data-ref="mixitup-container-<?php echo esc_attr( $this->get_id() ); ?>">
		        	<?php foreach( $settings['pt_fg_gallery_items'] as $gallery ) : ?>
			        	<?php $sorter_class = $this->sorter_class( $gallery['pt_fg_gallery_control_name'] ); ?>
			            <div class="item <?php echo esc_attr( $sorter_class ) ?>-<?php echo esc_attr( $this->get_id() ); ?>" data-ref="mixitup-target-<?php echo esc_attr( $this->get_id() ); ?>">
							<div class="item-img" style="background-image:url('<?php echo esc_attr( $gallery['pt_fg_gallery_img']['url'] ); ?>')">
				            	<div class="caption <?php echo esc_attr( $settings['pt_fg_grid_hover_style'] ); ?> ">
				                	<?php if( 'true' == $settings['pt_fg_show_popup'] ) : ?>
				                    <a href="<?php echo esc_url( $gallery['pt_fg_gallery_img']['url'] ); ?>" class="pt-magnific-link"><i class="<?php echo esc_attr( $settings['pt_section_fg_zoom_icon'] ); ?>"></i></a>
				                	<?php endif; ?>
				                    <?php if( 'true' == $gallery['pt_fg_gallery_link'] ) :
										$ptl_gallery_link = $gallery['eael_fg_gallery_img_link']['url'];
						        		$target = $gallery['pt_fg_gallery_img_link']['is_external'] ? 'target="_blank"' : '';
						        		$nofollow = $gallery['pt_fg_gallery_img_link']['nofollow'] ? 'rel="nofollow"' : '';
						        	?>
						        	<a href="<?php echo esc_url( $ptl_gallery_link ); ?>" <?php echo $target; ?> <?php echo $nofollow; ?> ><i class="<?php echo esc_attr( $settings['pt_section_fg_link_icon'] ); ?>"></i></a>
				                    <?php endif; ?>
				                </div>
							</div>
							<div class="item-content">
								<h2 class="title"><a href="<?php echo esc_url( $gallery['pt_fg_gallery_img']['url'] ); ?>" <?php echo $target; ?> <?php echo $nofollow; ?>><?php esc_html_e( $gallery['pt_fg_gallery_item_name'], 'elementor' ); ?></a></h2>
								<p><?php echo $gallery['pt_fg_gallery_item_content']; ?></p>
							</div>
			        	</div>
		        	<?php endforeach; ?>
				</div>
	    	<?php endif; ?>
		</div>
        <script>
            jQuery(document).ready( function($) {

            var containerEl = document.querySelector('#pt-filter-gallery-wrapper-<?php echo esc_attr( $this->get_id() ); ?>');
            var mixer = mixitup(containerEl, {
            	controls: {
                    scope: 'local'
                },
                selectors: {
                    target: '[data-ref~="mixitup-target-<?php echo esc_attr( $this->get_id() ); ?>"]'
                },
                animation: {
                    enable: true,
                    duration: '<?php if( !empty( $settings['pt_fg_filter_duration'] ) ) : echo $settings['pt_fg_filter_duration']; else: echo '500'; endif; ?>',
                    effects: '<?php echo $fg_animation; ?>',
                    easing: 'cubic-bezier(0.245, 0.045, 0.955, 1)',
                }
            });

            /* Set Background Image */
            <?php if( $settings['pt_fg_grid_style'] == 'pt-hoverer' || $settings['pt_fg_grid_style'] == 'pt-tiles' ) : ?>
				var postColumn = $( '.pt-filter-gallery-container .item' );
				postColumn.each( function() {
					let dataBg = $(this).attr( 'data-item-bg' );
					$(this).css( 'background-image', 'url( '+ dataBg +' )' );
				} );
            <?php endif; ?>
			/* Magnific Popup */
			<?php if( 'true' == $settings['pt_fg_show_popup'] ) : ?>				if($('#pt-filter-gallery-wrapper-<?php echo esc_attr( $this->get_id() ); ?> .pt-magnific-link').length > 0){
               	$('#pt-filter-gallery-wrapper-<?php echo esc_attr( $this->get_id() ); ?> .pt-magnific-link').magnificPopup({
                	type: 'image',
                  	gallery:{
                    	enabled: <?php if( 'true' == $settings['pt_fg_show_popup_gallery'] ) : echo 'true'; else: echo 'false'; endif; ?>
                  	},
                  	callbacks: {
						close: function() {
							$( '#elementor-lightbox' ).hide();
					   	}
					}
                });				}
            <?php endif; ?>

            });
        </script>
	<?php
	}

	protected function content_template() {

		?>
		<?php
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_PT_Filterable_Gallery() );