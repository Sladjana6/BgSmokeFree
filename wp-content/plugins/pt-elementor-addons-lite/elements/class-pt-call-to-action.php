<?php 
/**
 * class-pt-call-to-action.php
 *
 * @author    Param Themes <paramthemes@gmail.com>
 * @copyright 2018 Param Themes
 * @license   Param Themes
 * @package   Elementor
 * @see       https://www.paramthemes.com
 */
 
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Widget_PT_Cta_Box extends Widget_Base {

	public function get_name() {
		return 'pt-call-to-action';
	}

	public function get_title() {
		return esc_html__( 'Call to Action', 'elementor' );
	}

	public function get_icon() {
		return 'fa fa-bullhorn';
	}

   public function get_categories() {
		return [ 'pt-elementor-addons' ];
	}
	
	protected function _register_controls() {

  		/**
  		 * Call to Action Content Settings
  		 */
  		$this->start_controls_section(
  			'pt_section_cta_content_settings',
  			[
  				'label' => esc_html__( 'Content Settings', 'elementor' )
  			]
  		);

  		$this->add_control(
		  'pt_cta_type',
		  	[
		   	'label'       	=> esc_html__( 'Content Style', 'elementor' ),
		     	'type' 			=> Controls_Manager::SELECT,
		     	'default' 		=> 'call-to-action-basic',
		     	'label_block' 	=> false,
		     	'options' 		=> [
		     		'call-to-action-basic'  		=> esc_html__( 'Basic', 'elementor' ),
		     		'call-to-action-flex' 			=> esc_html__( 'Flex Grid', 'elementor' ),
		     		'call-to-action-icon-flex' 	=> esc_html__( 'Flex Grid with Icon', 'elementor' ),
		     	],
		  	]
		);

  		/**
  		 * Condition: 'eael_cta_type' => 'call-to-action-basic'
  		 */
		$this->add_control(
		  'pt_cta_content_type',
		  	[
		   	'label'       	=> esc_html__( 'Content Type', 'elementor' ),
		     	'type' 			=> Controls_Manager::SELECT,
		     	'default' 		=> 'call-to-action-default',
		     	'label_block' 	=> false,
		     	'options' 		=> [
		     		'call-to-action-default'  	=> esc_html__( 'Left', 'elementor' ),
		     		'call-to-action-center' 		=> esc_html__( 'Center', 'elementor' ),
		     		'call-to-action-right' 		=> esc_html__( 'Right', 'elementor' ),
		     	],
		     	'condition'    => [
		     		'pt_cta_type' => 'call-to-action-basic'
		     	]
		  	]
		);

		$this->add_control(
		  'pt_cta_color_type',
		  	[
		   	'label'       	=> esc_html__( 'Color Style', 'elementor' ),
		     	'type' 			=> Controls_Manager::SELECT,
		     	'default' 		=> 'call-to-action-bg-color',
		     	'label_block' 	=> false,
		     	'options' 		=> [
		     		'call-to-action-bg-color'  		=> esc_html__( 'Background Color', 'elementor' ),
		     		'call-to-action-bg-img' 			=> esc_html__( 'Background Image', 'elementor' ),
		     		'call-to-action-bg-img-fixed' 	=> esc_html__( 'Background Fixed Image', 'elementor' ),
		     	],
		  	]
		);

		
		$this->add_control(
			'pt_cta_flex_grid_icon',
			[
				'label' => esc_html__( 'Icon', 'elementor' ),
				'type' => Controls_Manager::ICON,
				'default' => 'fa fa-bullhorn',
				'condition' => [
					'pt_cta_type' => 'call-to-action-icon-flex'
				]
			]
		);

		$this->add_control( 
			'pt_cta_title',
			[
				'label' => esc_html__( 'Title', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'The PT Elementor Addons Lite For Elementor', 'elementor' )
			]
		);
		$this->add_control( 
			'pt_cta_content',
			[
				'label' => esc_html__( 'Content', 'elementor' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => esc_html__( 'Add a strong one liner supporting the heading above and giving users a reason to click on the button below.', 'elementor' ),
				'separator' => 'after'
			]
		);

		$this->add_control( 
			'pt_cta_btn_text',
			[
				'label' => esc_html__( 'Button Text', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Button Text', 'elementor' )
			]
		);

		$this->add_control( 
			'pt_cta_btn_link',
			[
				'label' => esc_html__( 'Button Link', 'elementor' ),
				'type' => Controls_Manager::URL,
				'label_block' => true,
				'default' => [
        			'url' => 'https://www.paramthemes.com',
        			'is_external' => '',
     			],
     			'show_external' => true,
     			'separator' => 'after'
			]
		);

		
		$this->add_control(
			'pt_cta_bg_image',
			[
				'label' => esc_html__( 'Background Image', 'elementor' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'selectors' => [
            	'{{WRAPPER}} .pt-call-to-action.bg-img' => 'background-image: url({{URL}});',
            	'{{WRAPPER}} .pt-call-to-action.bg-img-fixed' => 'background-image: url({{URL}});',
        		],
				'condition' => [
					'eael_cta_color_type' => [ 'call-to-action-bg-img', 'call-to-action-bg-img-fixed' ],
				]
			]
		);

		$this->end_controls_section();


		
		$this->start_controls_section(
			'pt_section_cta_style_settings',
			[
				'label' => esc_html__( 'Call to Action Style', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'pt_cta_container_width',
			[
				'label' => esc_html__( 'Set max width for the container?', 'elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'yes', 'elementor' ),
				'label_off' => __( 'no', 'elementor' ),
				'default' => 'yes',
			]
		);

		$this->add_responsive_control(
			'pt_cta_container_width_value',
			[
				'label' => __( 'Container Max Width (% or px)', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 1170,
					'unit' => 'px',
				],
				'size_units' => [ 'px', '%' ],
				'range' => [
		            'px' => [
		                'min' => 0,
		                'max' => 1500,
		                'step' => 5,
		            ],
					'%' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .pt-call-to-action' => 'max-width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'pt_cta_container_width' => 'yes',
				],
			]
		);

		$this->add_control(
			'pt_cta_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#f4f4f4',
				'selectors' => [
					'{{WRAPPER}} .pt-call-to-action' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'pt_cta_container_padding',
			[
				'label' => esc_html__( 'Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .pt-call-to-action' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_responsive_control(
			'pt_cta_container_margin',
			[
				'label' => esc_html__( 'Margin', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .pt-call-to-action' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'pt_cta_border',
				'label' => esc_html__( 'Border', 'elementor' ),
				'selector' => '{{WRAPPER}} .pt-call-to-action',
			]
		);

		$this->add_control(
			'pt_cta_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .pt-call-to-action' => 'border-radius: {{SIZE}}px;',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'pt_cta_shadow',
				'selector' => '{{WRAPPER}} .pt-call-to-action',
			]
		);


		$this->end_controls_section();

		
		$this->start_controls_section(
			'pt_section_cta_title_style_settings',
			[
				'label' => esc_html__( 'Color &amp; Typography ', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'pt_cta_title_heading',
			[
				'label' => esc_html__( 'Title Style', 'elementor' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'pt_cta_title_color',
			[
				'label' => esc_html__( 'Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .pt-call-to-action .title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'eael_cta_title_typography',
				'selector' => '{{WRAPPER}} .pt-call-to-action .title',
			]
		);

		$this->add_control(
			'pt_cta_content_heading',
			[
				'label' => esc_html__( 'Content Style', 'elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'pt_cta_content_color',
			[
				'label' => esc_html__( 'Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .pt-call-to-action p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'pt_cta_content_typography',
				'selector' => '{{WRAPPER}} .pt-call-to-action p',
			]
		);

		$this->end_controls_section();

		
		$this->start_controls_section(
			'pt_section_cta_btn_style_settings',
			[
				'label' => esc_html__( 'Button Style', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
		  'pt_cta_btn_effect_type',
		  	[
		   	'label'       	=> esc_html__( 'Effect', 'elementor' ),
		     	'type' 			=> Controls_Manager::SELECT,
		     	'default' 		=> 'default',
		     	'label_block' 	=> false,
		     	'options' 		=> [
		     		'default'  			=> esc_html__( 'Default', 'elementor' ),
		     		'top-to-bottom'  	=> esc_html__( 'Top to Bottom', 'elementor' ),
		     		'left-to-right'  	=> esc_html__( 'Left to Right', 'elementor' ),
		     	],
		  	]
		);

		$this->add_responsive_control(
			'pt_cta_btn_padding',
			[
				'label' => esc_html__( 'Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .pt-call-to-action .call-to-action-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_responsive_control(
			'pt_cta_btn_margin',
			[
				'label' => esc_html__( 'Margin', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .pt-call-to-action .call-to-action-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
	         'name' => 'pt_cta_btn_typography',
				'selector' => '{{WRAPPER}} .pt-call-to-action .call-to-action-button',
			]
		);

		$this->start_controls_tabs( 'pt_cta_button_tabs' );

			// Normal State Tab
			$this->start_controls_tab( 'pt_cta_btn_normal', [ 'label' => esc_html__( 'Normal', 'elementor' ) ] );

			$this->add_control(
				'pt_cta_btn_normal_text_color',
				[
					'label' => esc_html__( 'Text Color', 'elementor' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#4d4d4d',
					'selectors' => [
						'{{WRAPPER}} .pt-call-to-action .call-to-action-button' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'pt_cta_btn_normal_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'elementor' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#f9f9f9',
					'selectors' => [
						'{{WRAPPER}} .pt-call-to-action .call-to-action-button' => 'background: {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'pt_cat_btn_normal_border',
					'label' => esc_html__( 'Border', 'elementor' ),
					'selector' => '{{WRAPPER}} .pt-call-to-action .call-to-action-button',
				]
			);

			$this->add_control(
				'pt_cta_btn_border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'elementor' ),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .pt-call-to-action .call-to-action-button' => 'border-radius: {{SIZE}}px;',
					],
				]
			);

			$this->end_controls_tab();

			// Hover State Tab
			$this->start_controls_tab( 'eael_cta_btn_hover', [ 'label' => esc_html__( 'Hover', 'elementor' ) ] );

			$this->add_control(
				'pt_cta_btn_hover_text_color',
				[
					'label' => esc_html__( 'Text Color', 'elementor' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#f9f9f9',
					'selectors' => [
						'{{WRAPPER}} .pt-call-to-action .call-to-action-button:hover' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'pt_cta_btn_hover_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'elementor' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#007fc0',
					'selectors' => [
						'{{WRAPPER}} .pt-call-to-action .call-to-action-button:after' => 'background: {{VALUE}};',
						'{{WRAPPER}} .pt-call-to-action .call-to-action-button:hover' => 'background: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'pt_cta_btn_hover_border_color',
				[
					'label' => esc_html__( 'Border Color', 'elementor' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .pt-call-to-action .call-to-action-button:hover' => 'border-color: {{VALUE}};',
					],
				]

			);

			$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'pt_cta_button_shadow',
				'selector' => '{{WRAPPER}} .pt-call-to-action .call-to-action-button',
				'separator' => 'before'
			]
		);

		$this->end_controls_section();

		
		$this->start_controls_section(
			'pt_section_cta_icon_style_settings',
			[
				'label' => esc_html__( 'Icon Style', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'eael_cta_type' => 'call-to-action-icon-flex'
				]
			]
		);

		$this->add_control(
			'pt_section_cta_icon_size',
			[
				'label' => esc_html__( 'Font Size', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 80
				],
				'range' => [
					'px' => [
						'max' => 160,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .pt-call-to-action.call-to-action-icon-flex .icon' => 'font-size: {{SIZE}}px;',
				],
			]
		);

		$this->add_control(
			'pt_section_cta_icon_color',
			[
				'label' => esc_html__( 'Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#444',
				'selectors' => [
					'{{WRAPPER}} .pt-call-to-action.call-to-action-icon-flex .icon' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

	}


	protected function render( ) {
		
   		$settings = $this->get_settings();	
	  	$target = $settings['pt_cta_btn_link']['is_external'] ? 'target="_blank"' : '';
	  	$nofollow = $settings['pt_cta_btn_link']['nofollow'] ? 'rel="nofollow"' : '';
	  	if( 'call-to-action-bg-color' == $settings['pt_cta_color_type'] ) {
	  		$cta_class = 'bg-lite';
	  	}else if( 'call-to-action-bg-img' == $settings['pt_cta_color_type'] ) {
	  		$cta_class = 'bg-img';
	  	}else if( 'call-to-action-bg-img-fixed' == $settings['pt_cta_color_type'] ) {
	  		$cta_class = 'bg-img bg-fixed';
	  	}else {
	  		$cta_class = '';
	  	}
	  	// Is Basic Cta Content Center or Not
	  	if( 'call-to-action-center' === $settings['pt_cta_content_type'] ) {
	  		$cta_alignment = 'call-to-action-center';
	  	}elseif( 'call-to-action-right' === $settings['pt_cta_content_type'] ) {
	  		$cta_alignment = 'call-to-action-right';
	  	}else {
	  		$cta_alignment = 'call-to-action-left';
	  	}
	  	/* Button Effect*/
	  	if( 'left-to-right' == $settings['pt_cta_btn_effect_type'] ) {
	  		$cta_btn_effect = 'effect-2';
	  	}elseif( 'top-to-bottom' == $settings['pt_cta_btn_effect_type'] ) {
	  		$cta_btn_effect = 'effect-1';
	  	}else {
	  		$cta_btn_effect = '';
	  	}
	
	?>
	<?php if( 'call-to-action-basic' == $settings['pt_cta_type'] ) : ?>
	<div class="pt-call-to-action <?php echo esc_attr( $cta_class ); ?> <?php echo esc_attr( $cta_alignment ); ?>">
	    <h2 class="title"><?php echo $settings['pt_cta_title']; ?></h2>
	    <p><?php echo $settings['pt_cta_content']; ?></p>
	    <a href="<?php echo esc_url( $settings['pt_cta_btn_link']['url'] ); ?>" <?php echo $target; ?> <?php echo $nofollow; ?> class="call-to-action-button <?php echo esc_attr( $cta_btn_effect ); ?>"><?php esc_html_e( $settings['pt_cta_btn_text'], 'elementor' ); ?></a>
	</div>		
	<?php endif; ?>
	<?php if( 'call-to-action-flex' == $settings['pt_cta_type'] ) : ?>
	<div class="pt-call-to-action call-to-action-flex <?php echo esc_attr( $cta_class ); ?>">
	    <div class="content">
	        <h2 class="title"><?php echo $settings['pt_cta_title']; ?></h2>
	        <p><?php echo $settings['pt_cta_content']; ?></p>
	    </div>
	    <div class="action">
	        <a href="<?php echo esc_url( $settings['pt_cta_btn_link']['url'] ); ?>" <?php echo $target; ?> <?php echo $nofollow; ?> class="call-to-action-button <?php echo esc_attr( $cta_btn_effect ); ?>"><?php esc_html_e( $settings['pt_cta_btn_text'], 'elementor' ); ?></a>
	    </div>
	</div>
	<?php endif; ?>
	<?php if( 'call-to-action-icon-flex' == $settings['pt_cta_type'] ) : ?>
	<div class="pt-call-to-action call-to-action-icon-flex <?php echo esc_attr( $cta_class ); ?>">
	    <div class="icon">
	        <i class="<?php echo esc_attr( $settings['pt_cta_flex_grid_icon'] ); ?>"></i>
	    </div>
	    <div class="content">
	        <h2 class="title"><?php echo $settings['pt_cta_title']; ?></h2>
	        <p><?php echo $settings['pt_cta_content']; ?></p>
	    </div>
	    <div class="action">
	       <a href="<?php echo esc_url( $settings['pt_cta_btn_link']['url'] ); ?>" <?php echo $target; ?> class="call-to-action-button <?php echo esc_attr( $cta_btn_effect ); ?>"><?php esc_html_e( $settings['pt_cta_btn_text'], 'elementor' ); ?></a>
	    </div>
	</div>
	<?php endif; ?>
	<?php
	}

	protected function content_template() {
		
		?>
		
	
		<?php
	}
}


Plugin::instance()->widgets_manager->register_widget_type( new Widget_PT_Cta_Box() );