<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Widget_Pt_New_Accordion extends Widget_Base {

	public function get_name() {
		return 'pt-new-accordion';
	}

	public function get_title() {
		return esc_html__( 'New Accordion', 'elementor' );
	}

	public function get_icon() {
		return 'fa fa-server';
	}

   public function get_categories() {
		return [ 'pt-elementor-addons' ];
	}

	protected function _register_controls() {
		/**
  		 * Advance Accordion Settings
  		 */
  		$this->start_controls_section(
  			'pt_new_accordion_settings',
  			[
  				'label' => esc_html__( 'General Settings', 'elementor' )
  			]
  		);
  		$this->add_control(
		  'pt_new_accordion_type',
		  	[
		   	'label'       	=> esc_html__( 'Accordion Type', 'elementor' ),
		     	'type' 			=> Controls_Manager::SELECT,
		     	'default' 		=> 'accordion',
		     	'label_block' 	=> false,
		     	'options' 		=> [
		     		'accordion' 	=> esc_html__( 'Accordion', 'elementor' ),
		     		'toggle' 		=> esc_html__( 'Toggle', 'elementor' ),
		     	],
		  	]
		);
		$this->add_control(
			'pt_new_accordion_icon_show',
			[
				'label' => esc_html__( 'Enable Toggle Icon', 'elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'return_value' => 'yes',
			]
		);
		$this->add_control(
			'pt_new_accordion_icon',
			[
				'label' => esc_html__( 'Toggle Icon', 'elementor' ),
				'type' => Controls_Manager::ICON,
				'default' => 'fa fa-angle-right',
				'include' => [
					'fa fa-angle-right',
					'fa fa-angle-double-right',
					'fa fa-chevron-right',
					'fa fa-chevron-circle-right',
					'fa fa-arrow-right',
					'fa fa-long-arrow-right',
				],
				'condition' => [
					'pt_new_accordion_icon_show' => 'yes'
				]
			]
		);
		$this->add_control(
			'pt_accordion_toggle_speed',
			[
				'label' => esc_html__( 'Toggle Speed (ms)', 'elementor' ),
				'type' => Controls_Manager::NUMBER,
				'label_block' => false,
				'default' => 100,
			]
		);
  		$this->end_controls_section();
  		/**
  		 * Advance Accordion Content Settings
  		 */
  		$this->start_controls_section(
  			'pt_new_accordion_content_settings',
  			[
  				'label' => esc_html__( 'Content Settings', 'elementor' )
  			]
  		);
  		$this->add_control(
			'pt_accordion_tab',
			[
				'type' => Controls_Manager::REPEATER,
				'seperator' => 'before',
				'default' => [
					[ 'pt_accordion_tab_title' => esc_html__( 'Accordion Tab Title 1', 'elementor' ) ],
					[ 'pt_accordion_tab_title' => esc_html__( 'Accordion Tab Title 2', 'elementor' ) ],
					[ 'pt_accordion_tab_title' => esc_html__( 'Accordion Tab Title 3', 'elementor' ) ],
				],
				'fields' => [
					[
						'name' => 'pt_accordion_default_tab_active',
						'label' => esc_html__( 'Active as Default', 'elementor' ),
						'type' => Controls_Manager::SWITCHER,
						'default' => 'no',
						'return_value' => 'yes',
					],
					[
						'name' => 'pt_accordion_tab_icon_show',
						'label' => esc_html__( 'Enable Tab Icon', 'elementor' ),
						'type' => Controls_Manager::SWITCHER,
						'default' => 'yes',
						'return_value' => 'yes',
					],
					[
						'name' => 'pt_accordion_tab_title_icon',
						'label' => esc_html__( 'Icon', 'elementor' ),
						'type' => Controls_Manager::ICON,
						'default' => 'fa fa-plus',
						'condition' => [
							'pt_accordion_tab_icon_show' => 'yes'
						]
					],
					[
						'name' => 'pt_accordion_tab_title',
						'label' => esc_html__( 'Tab Title', 'elementor' ),
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__( 'Tab Title', 'elementor' )
					],
				  	[
						'name' => 'pt_accordion_tab_content',
						'label' => esc_html__( 'Tab Title', 'elementor' ),
						'type' => Controls_Manager::WYSIWYG,
						'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio, neque qui velit. Magni dolorum quidem ipsam eligendi, totam, facilis laudantium cum accusamus ullam voluptatibus commodi numquam, error, est. Ea, consequatur.', 'elementor' )
					],
				],
				'title_field' => '{{pt_accordion_tab_title}}',
			]
		);
  		$this->end_controls_section();
  		
  		/**
		 * -------------------------------------------
		 * Tab Style Advance Accordion Generel Style
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'pt_accordion_style_settings',
			[
				'label' => esc_html__( 'General Style', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'pt_new_accordion_padding',
			[
				'label' => esc_html__( 'Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .pt-new-accordion' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);
		$this->add_responsive_control(
			'pt_new_accordion_margin',
			[
				'label' => esc_html__( 'Margin', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .pt-new-accordion' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'pt_new_accordion_border',
				'label' => esc_html__( 'Border', 'elementor' ),
				'selector' => '{{WRAPPER}} .pt-new-accordion',
			]
		);
		$this->add_responsive_control(
			'pt_new_accordion_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .pt-new-accordion' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'pt_new_accordion_box_shadow',
				'selector' => '{{WRAPPER}} .pt-new-accordion',
			]
		);
  		$this->end_controls_section();

  		/**
		 * -------------------------------------------
		 * Tab Style Advance Accordion Content Style
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'pt_new_accordions_tab_style_settings',
			[
				'label' => esc_html__( 'Tab Style', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
            	'name' => 'pt_new_accordion_tab_title_typography',
				'selector' => '{{WRAPPER}} .pt-new-accordion .pt-accordion-list .pt-accordion-header',
			]
		);
		$this->add_responsive_control(
			'pt_new_accordion_tab_icon_size',
			[
				'label' => __( 'Icon Size', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 16,
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
					'{{WRAPPER}} .pt-new-accordion .pt-accordion-list .pt-accordion-header .fa' => 'font-size: {{SIZE}}{{UNIT}};',
				]
			]
		);
		$this->add_responsive_control(
			'pt_new_accordion_tab_icon_gap',
			[
				'label' => __( 'Icon Gap', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 10,
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
					'{{WRAPPER}} .pt-new-accordion .pt-accordion-list .pt-accordion-header .fa' => 'margin-right: {{SIZE}}{{UNIT}};',
				]
			]
		);
		$this->add_responsive_control(
			'pt_new_accordion_tab_padding',
			[
				'label' => esc_html__( 'Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .pt-new-accordion .pt-accordion-list .pt-accordion-header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);
		$this->add_responsive_control(
			'pt_new_accordion_tab_margin',
			[
				'label' => esc_html__( 'Margin', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .pt-new-accordion .pt-accordion-list .pt-accordion-header' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);
		$this->start_controls_tabs( 'pt_new_accordion_header_tabs' );
			// Normal State Tab
			$this->start_controls_tab( 'pt_new_accordion_header_normal', [ 'label' => esc_html__( 'Normal', 'elementor' ) ] );
				$this->add_control(
					'pt_new_accordion_tab_color',
					[
						'label' => esc_html__( 'Tab Background Color', 'elementor' ),
						'type' => Controls_Manager::COLOR,
						'default' => '#f1f1f1',
						'selectors' => [
							'{{WRAPPER}} .pt-new-accordion .pt-accordion-list .pt-accordion-header' => 'background-color: {{VALUE}};',
						],
					]
				);
				$this->add_control(
					'pt_new_accordion_tab_text_color',
					[
						'label' => esc_html__( 'Text Color', 'elementor' ),
						'type' => Controls_Manager::COLOR,
						'default' => '#333',
						'selectors' => [
							'{{WRAPPER}} .pt-new-accordion .pt-accordion-list .pt-accordion-header' => 'color: {{VALUE}};',
						],
					]
				);
				$this->add_control(
					'pt_new_accordion_tab_icon_color',
					[
						'label' => esc_html__( 'Icon Color', 'elementor' ),
						'type' => Controls_Manager::COLOR,
						'default' => '#333',
						'selectors' => [
							'{{WRAPPER}} .pt-new-accordion .pt-accordion-list .pt-accordion-header .fa' => 'color: {{VALUE}};',
						],
						'condition' => [
							'pt_new_tabs_icon_show' => 'yes'
						]
					]
				);
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'pt_new_accordion_tab_border',
						'label' => esc_html__( 'Border', 'elementor' ),
						'selector' => '{{WRAPPER}} .pt-new-accordion .pt-accordion-list .pt-accordion-header',
					]
				);
				$this->add_responsive_control(
					'pt_new_accordion_tab_border_radius',
					[
						'label' => esc_html__( 'Border Radius', 'elementor' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', 'em', '%' ],
						'selectors' => [
			 					'{{WRAPPER}} .pt-new-accordion .pt-accordion-list .pt-accordion-header' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			 			],
					]
				);
			$this->end_controls_tab();
			// Hover State Tab
			$this->start_controls_tab( 'pt_new_accordion_header_hover', [ 'label' => esc_html__( 'Hover', 'elementor' ) ] );
				$this->add_control(
					'pt_new_accordion_tab_color_hover',
					[
						'label' => esc_html__( 'Tab Background Color', 'elementor' ),
						'type' => Controls_Manager::COLOR,
						'default' => '#414141',
						'selectors' => [
							'{{WRAPPER}} .pt-new-accordion .pt-accordion-list .pt-accordion-header:hover' => 'background-color: {{VALUE}};',
						],
					]
				);
				$this->add_control(
					'pt_new_accordion_tab_text_color_hover',
					[
						'label' => esc_html__( 'Text Color', 'elementor' ),
						'type' => Controls_Manager::COLOR,
						'default' => '#fff',
						'selectors' => [
							'{{WRAPPER}} .pt-new-accordion .pt-accordion-list .pt-accordion-header:hover' => 'color: {{VALUE}};',
						],
					]
				);
				$this->add_control(
					'pt_new_accordion_tab_icon_color_hover',
					[
						'label' => esc_html__( 'Icon Color', 'elementor' ),
						'type' => Controls_Manager::COLOR,
						'default' => '#fff',
						'selectors' => [
							'{{WRAPPER}} .pt-new-accordion .pt-accordion-list .pt-accordion-header:hover .fa' => 'color: {{VALUE}};',
						],
						'condition' => [
							'eael_adv_accordion_toggle_icon_show' => 'yes'
						]
					]
				);
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'pt_new_accordion_tab_border_hover',
						'label' => esc_html__( 'Border', 'elementor' ),
						'selector' => '{{WRAPPER}} .pt-new-accordion .pt-accordion-list .pt-accordion-header:hover',
					]
				);
				$this->add_responsive_control(
					'pt_new_accordion_tab_border_radius_hover',
					[
						'label' => esc_html__( 'Border Radius', 'elementor' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', 'em', '%' ],
						'selectors' => [
			 					'{{WRAPPER}} .pt-new-accordion .pt-accordion-list .pt-accordion-header:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			 			],
					]
				);
			$this->end_controls_tab();
			// Active State Tab
			$this->start_controls_tab( 'pt_new_accordion_header_active', [ 'label' => esc_html__( 'Active', 'elementor' ) ] );
				$this->add_control(
					'pt_new_accordion_tab_color_active',
					[
						'label' => esc_html__( 'Tab Background Color', 'elementor' ),
						'type' => Controls_Manager::COLOR,
						'default' => '#444',
						'selectors' => [
							'{{WRAPPER}} .pt-new-accordion .pt-accordion-list .pt-accordion-header.active' => 'background-color: {{VALUE}};',
						],
					]
				);
				$this->add_control(
					'pt_new_accordion_tab_text_color_active',
					[
						'label' => esc_html__( 'Text Color', 'elementor' ),
						'type' => Controls_Manager::COLOR,
						'default' => '#fff',
						'selectors' => [
							'{{WRAPPER}} .pt-new-accordion .pt-accordion-list .pt-accordion-header.active' => 'color: {{VALUE}};',
						],
					]
				);
				$this->add_control(
					'pt_new_accordion_tab_icon_color_active',
					[
						'label' => esc_html__( 'Icon Color', 'elementor' ),
						'type' => Controls_Manager::COLOR,
						'default' => '#fff',
						'selectors' => [
							'{{WRAPPER}} .pt-new-accordion .pt-accordion-list .pt-accordion-header.active .fa' => 'color: {{VALUE}};',
						],
						'condition' => [
							'pt_new_accordion_toggle_icon_show' => 'yes'
						]
					]
				);
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'pt_new_accordion_tab_border_active',
						'label' => esc_html__( 'Border', 'elementor' ),
						'selector' => '{{WRAPPER}} .pt-new-accordion .pt-accordion-list .pt-accordion-header.active',
					]
				);
				$this->add_responsive_control(
					'pt_new_accordion_tab_border_radius_active',
					[
						'label' => esc_html__( 'Border Radius', 'elementor' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', 'em', '%' ],
						'selectors' => [
			 					'{{WRAPPER}} .pt-new-accordion .pt-accordion-list .pt-accordion-header.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			 			],
					]
				);
			$this->end_controls_tab();
		$this->end_controls_tabs();
  		$this->end_controls_section();
  		/**
		 * -------------------------------------------
		 * Tab Style Advance Accordion Content Style
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'pt_new_adv_accordion_tab_content_style_settings',
			[
				'label' => esc_html__( 'Content Style', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'pt_new_accordion_content_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .pt-new-accordion .pt-accordion-list .pt-accordion-content' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'pt_new_accordion_content_text_color',
			[
				'label' => esc_html__( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#333',
				'selectors' => [
					'{{WRAPPER}} .pt-new-accordion .pt-accordion-list .pt-accordion-content' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
            	'name' => 'pt_new_accordion_content_typography',
				'selector' => '{{WRAPPER}} .pt-new-accordion .pt-accordion-list .pt-accordion-content',
			]
		);
		$this->add_responsive_control(
			'pt_new_accordion_content_padding',
			[
				'label' => esc_html__( 'Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .pt-new-accordion .pt-accordion-list .pt-accordion-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);
		$this->add_responsive_control(
			'pt_new_accordion_content_margin',
			[
				'label' => esc_html__( 'Margin', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .pt-new-accordion .pt-accordion-list .pt-accordion-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'pt_new_accordion_content_border',
				'label' => esc_html__( 'Border', 'elementor' ),
				'selector' => '{{WRAPPER}} .pt-new-accordion .pt-accordion-list .pt-accordion-content',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'pt_new_accordion_content_shadow',
				'selector' => '{{WRAPPER}} .pt-new-accordion .pt-accordion-list .pt-accordion-content',
				'separator' => 'before'
			]
		);
  		$this->end_controls_section();

  		/**
  		 * Advance Accordion Caret Settings
  		 */
  		$this->start_controls_section(
  			'pt_new_accordion_caret_settings',
  			[
  				'label' => esc_html__( 'Toggle Caret Style', 'elementor' ),
  				'tab' => Controls_Manager::TAB_STYLE,
  			]
  		);

		$this->add_responsive_control(
			'pt_new_accordion_tab_toggle_icon_size',
			[
				'label' => __( 'Icon Size', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 16,
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
					'{{WRAPPER}} .pt-new-accordion .pt-accordion-list .pt-accordion-header .fa-toggle' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'pt_new_accordion_icon_show' => 'yes'
				]
			]
		);
		$this->add_control(
			'pt_new_tabs_tab_toggle_color',
			[
				'label' => esc_html__( 'Caret Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#444',
				'selectors' => [
					'{{WRAPPER}} .pt-new-accordion .pt-accordion-list .pt-accordion-header .fa-toggle' => 'color: {{VALUE}};',
				],
				'condition' => [
					'pt_new_accordion_icon_show' => 'yes'
				]
			]
		);
		$this->add_control(
			'pt_new_tabs_tab_toggle_active_color',
			[
				'label' => esc_html__( 'Caret Color (Active)', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .pt-new-accordion .pt-accordion-list .pt-accordion-header.active .fa-toggle' => 'color: {{VALUE}};',
					'{{WRAPPER}} .pt-new-accordion .pt-accordion-list:hover .pt-accordion-header .fa-toggle' => 'color: {{VALUE}};',
				],
				'condition' => [
					'pt_new_accordion_icon_show' => 'yes'
				]
			]
		);
  		$this->end_controls_section();
	}

	protected function render() {

   		$settings = $this->get_settings();
	?>
	<div class="pt-new-accordion" id="pt-new-accordion-<?php echo esc_attr( $this->get_id() ); ?>">
		<?php foreach( $settings['pt_accordion_tab'] as $tab ) : ?>
		<div class="pt-accordion-list">
			<div class="pt-accordion-header<?php if( $tab['pt_accordion_default_tab_active'] == 'yes' ) : echo ' active-default'; endif; ?>">
				<span><?php if( $tab['pt_accordion_tab_icon_show'] === 'yes' ) : ?><i class="<?php echo esc_attr( $tab['pt_accordion_tab_title_icon'] ); ?> fa-accordion-icon"></i><?php endif; ?>  <?php echo $tab['pt_accordion_tab_title']; ?></span> <?php if( $settings['pt_new_accordion_icon_show'] === 'yes' ) : ?><i class="<?php echo esc_attr( $settings['pt_new_accordion_icon'] ); ?> fa-toggle"></i> <?php endif; ?>
			</div>
			<div class="pt-accordion-content clearfix<?php if( $tab['pt_accordion_default_tab_active'] == 'yes' ) : echo ' active-default'; endif; ?>">
				<p><?php echo do_shortcode($tab['pt_accordion_tab_content']); ?></p>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
	<script>
		jQuery(document).ready(function($) {
			var $PTNewAccordion = $('#pt-new-accordion-<?php echo esc_attr( $this->get_id() ); ?>');
			var $PTNewAccordionList = $PTNewAccordion.find('.pt-accordion-list');
			var $PTNewAccordionListHeader = $PTNewAccordion.find('.pt-accordion-list .pt-accordion-header');
			var $eaelAccordioncontent = $PTNewAccordion.find('.pt-accordion-content');
			$PTNewAccordionList.each(function(i) {
				if( $(this).find('.pt-accordion-header').hasClass('active-default') ) {
					$(this).find('.pt-accordion-header').addClass('active');
					$(this).find('.pt-accordion-content').addClass('active').css('display', 'block').slideDown(<?php echo esc_attr( $settings['pt_accordion_toggle_speed'] ); ?>);
				}
			});
			<?php if( 'accordion' == $settings['pt_new_accordion_type'] ) : ?>
			$PTNewAccordionListHeader.on('click', function() {
				// Check if 'active' class is already exists
				if( $(this).hasClass('active') ) {
					$(this).removeClass('active');
					$(this).next('.pt-accordion-content').removeClass('active').slideUp(<?php echo esc_attr( $settings['pt_accordion_toggle_speed'] ); ?>);
				}else {
					$PTNewAccordionListHeader.removeClass('active');
					$PTNewAccordionListHeader.next('.pt-accordion-content').removeClass('active').slideUp(<?php echo esc_attr( $settings['pt_accordion_toggle_speed'] ); ?>);

					$(this).toggleClass('active');
					$(this).next('.pt-accordion-content').slideToggle(<?php echo esc_attr( $settings['pt_accordion_toggle_speed'] ); ?>, function() {
						$(this).toggleClass('active');
					});
				}
			});
			<?php endif; ?>
			<?php if( 'toggle' == $settings['pt_new_accordion_type'] ) : ?>
			$PTNewAccordionListHeader.on('click', function() {
				// Check if 'active' class is already exists
				if( $(this).hasClass('active') ) {
					$(this).removeClass('active');
					$(this).next('.pt-accordion-content').removeClass('active').slideUp(<?php echo esc_attr( $settings['pt_accordion_toggle_speed'] ); ?>);
				}else {
					$(this).toggleClass('active');
					$(this).next('.pt-accordion-content').slideToggle(<?php echo esc_attr( $settings['pt_accordion_toggle_speed'] ); ?>, function() {
						$(this).toggleClass('active');
					});
				}
			});
			<?php endif; ?>
		});
	</script>
	<?php
	}

	protected function content_template() {}
}


Plugin::instance()->widgets_manager->register_widget_type( new Widget_Pt_New_Accordion() );