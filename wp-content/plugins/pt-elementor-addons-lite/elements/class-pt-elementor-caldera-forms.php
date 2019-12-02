<?php
/**
 * class-pt-elementor-caldera-forms.php
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
class Pt_Elementor_cfforms extends Widget_Base {

	/**
	 * Define our Get Name Function settings.
	 */
	public function get_name() {
		return 'pt-caldera-form';
	}
	/**
	 * Define our get title settings.
	 */
	public function get_title() {
		return __( 'Caldera Form', 'elementor' );
	}
	/**
	 * Define our get icon settings.
	 */
	public function get_icon() {
		//return 'eicon-inner-section';
		return 'fa fa-envelope-o';
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
		$this->start_controls_section(
  			'pt_section_cfforms',
  			[
  				'label' => esc_html__( 'Caldera Form', 'elementor' )
  			]
  		);
		
		$this->add_control(
			'cfforms_caldera_form',
			[
				'label' => esc_html__( 'Select Form', 'elementor' ),
				'description' => esc_html__( 'Please save and refresh the page after selecting the form', 'elementor' ),
				'label_block' => true,
				'type' => Controls_Manager::SELECT,
				'options' => pt_select_caldera_form(),
			]
		);

		
	   $this->end_controls_section();

       $this->start_controls_section(
			'pt_section_calendra_form_styles',
			[
				'label' => esc_html__( 'Form Container Styles', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);
		
		$this->add_control(
			'pt_cfform_background',
			[
				'label' => esc_html__( 'Form Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-cfforms-container' => 'background: {{VALUE}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'pt_cfform_alignment',
			[
				'label' => esc_html__( 'Form Alignment', 'elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => true,
				'options' => [
					'default' => [
						'title' => __( 'Default', 'elementor' ),
						'icon' => 'fa fa-ban',
					],
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
				'default' => 'default',
				'prefix_class' => 'pt-cfforms-align-',
			]
		);

  		$this->add_responsive_control(
  			'pt_cfform_width',
  			[
  				'label' => esc_html__( 'Form Width', 'elementor' ),
  				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', '%' ],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 1500,
					],
					'em' => [
						'min' => 1,
						'max' => 80,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .pt-cfforms-container' => 'width: {{SIZE}}{{UNIT}};',
				],
  			]
  		);

  		$this->add_responsive_control(
  			'pt_cfform_max_width',
  			[
  				'label' => esc_html__( 'Form Max Width', 'elementor' ),
  				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', '%' ],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 1500,
					],
					'em' => [
						'min' => 1,
						'max' => 80,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .pt-cfforms-container' => 'max-width: {{SIZE}}{{UNIT}};',
				],
  			]
  		);
		
		
		$this->add_responsive_control(
			'pt_cfform_margin',
			[
				'label' => esc_html__( 'Form Margin', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .pt-cfforms-container' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);		
		
		$this->add_responsive_control(
			'pt_cfform_padding',
			[
				'label' => esc_html__( 'Form Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .pt-cfforms-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		
		$this->add_control(
			'pt_cfforms_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'separator' => 'before',
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .pt-cfforms-container' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'pt_cfforms_border',
				'selector' => '{{WRAPPER}} .pt-cfforms-container',
			]
		);
		
		
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'pt_cfforms_box_shadow',
				'selector' => '{{WRAPPER}} .pt-cfforms-container',
			]
		);
		
		$this->end_controls_section();
		
		

		$this->start_controls_section(
			'pt_section_cfforms_field_styles',
			[
				'label' => esc_html__( 'Form Fields Styles', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);
		
		$this->add_control(
			'pt_cfforms_input_background',
			[
				'label' => esc_html__( 'Input Field Background', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-cfforms-container input.form-control, {{WRAPPER}} .pt-cfforms-container textarea.form-control' => 'background: {{VALUE}};',
				],
			]
		);
		

  		$this->add_responsive_control(
  			'pt_cfforms_input_width',
  			[
  				'label' => esc_html__( 'Input Width', 'elementor' ),
  				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', '%' ],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 1500,
					],
					'em' => [
						'min' => 1,
						'max' => 80,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .pt-cfforms-container input.form-control' => 'width: {{SIZE}}{{UNIT}};',
				],
  			]
  		);
		
  		$this->add_responsive_control(
  			'pt_cfforms_textarea_width',
  			[
  				'label' => esc_html__( 'Textarea Width', 'elementor' ),
  				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', '%' ],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 1500,
					],
					'em' => [
						'min' => 1,
						'max' => 80,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .pt-cfforms-container textarea.form-control' => 'width: {{SIZE}}{{UNIT}};',
				],
  			]
  		);	
		
		$this->add_responsive_control(
			'pt_cfforms_input_padding',
			[
				'label' => esc_html__( 'Fields Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .pt-cfforms-container input.form-control, {{WRAPPER}} .pt-cfforms-container textarea.form-control' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		
		
		$this->add_control(
			'pt_cfforms_input_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'separator' => 'before',
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .pt-cfforms-container input.form-control, {{WRAPPER}} .pt-cfforms-container textarea.form-control' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'pt_cfforms_input_border',
				'selector' => '{{WRAPPER}} .pt-cfforms-container input.form-control, {{WRAPPER}} .pt-cfforms-container textarea.form-control',
			]
		);
		
		
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'pt_cfforms_input_box_shadow',
				'selector' => '{{WRAPPER}} .pt-cfforms-container input.form-control, {{WRAPPER}} .pt-cfforms-container textarea.form-control',
			]
		);

		$this->add_control(
			'pt_contact_form_focus_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => esc_html__( 'Focus State Style', 'elementor' ),
				'separator' => 'before',
			]
		);


		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'pt_cfforms_input_focus_box_shadow',
				'selector' => '{{WRAPPER}} .pt-cfforms-container input.form-control:focus, {{WRAPPER}} .pt-cfforms-container textarea.form-control:focus',
			]
		);

		$this->add_control(
			'pt_cfforms_input_focus_border',
			[
				'label' => esc_html__( 'Border Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'body {{WRAPPER}} .pt-cfforms-container input.form-control:focus, body {{WRAPPER}} .pt-cfforms-container textarea.form-control:focus' => 'border-color: {{VALUE}};',
				],
			]
		);
		


		$this->end_controls_section();
		
		
		$this->start_controls_section(
			'pt_section_cfforms_typography',
			[
				'label' => esc_html__( 'Color & Typography', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);
		
		
		$this->add_control(
			'pt_contact_form_label_color',
			[
				'label' => esc_html__( 'Label Color1', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-cfforms-container label' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'pt_cfforms_field_color',
			[
				'label' => esc_html__( 'Field Font Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-cfforms-container input.form-control, {{WRAPPER}} .pt-cfforms-container textarea.form-control' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'pt_cfforms_placeholder_color',
			[
				'label' => esc_html__( 'Placeholder Font Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-cfforms-container ::-webkit-input-placeholder' => 'color: {{VALUE}};',
					'{{WRAPPER}} .pt-cfforms-container ::-moz-placeholder' => 'color: {{VALUE}};',
					'{{WRAPPER}} .pt-cfforms-container ::-ms-input-placeholder' => 'color: {{VALUE}};',
				],
			]
		);
		
		
		$this->add_control(
			'pt_cfforms_label_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => esc_html__( 'Label Typography', 'elementor' ),
				'separator' => 'before',
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'pt_cfforms_label_typography',
				'selector' => '{{WRAPPER}} .pt-cfforms-container, {{WRAPPER}} .pt-cfforms-container .wpcf-form label',
			]
		);
		
		
		$this->add_control(
			'pt_cfforms_heading_input_field',
			[
				'type' => Controls_Manager::HEADING,
				'label' => esc_html__( 'Input Fields Typography', 'elementor' ),
				'separator' => 'before',
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'pt_cfforms_input_field_typography',
				'selector' => '{{WRAPPER}} .pt-cfforms-container input.form-control, {{WRAPPER}} .pt-cfforms-container textarea.form-control',
			]
		);
		
		$this->end_controls_section();
		
		
		
		$this->start_controls_section(
			'pt_section_cfforms_submit_button_styles',
			[
				'label' => esc_html__( 'Submit Button Styles', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

  		$this->add_responsive_control(
  			'pt_cfforms_submit_btn_width',
  			[
  				'label' => esc_html__( 'Button Width', 'elementor' ),
  				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', '%' ],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 1500,
					],
					'em' => [
						'min' => 1,
						'max' => 80,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .pt-cfforms-container input.btn-default' => 'width: {{SIZE}}{{UNIT}};',
				],
  			]
  		);
  		
		$this->add_responsive_control(
			'pt_cfforms_submit_btn_alignment',
			[
				'label' => esc_html__( 'Button Alignment', 'elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => true,
				'options' => [
					'default' => [
						'title' => __( 'Default', 'elementor' ),
						'icon' => 'fa fa-ban',
					],
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
				'default' => 'default',
				'prefix_class' => 'pt-cfforms-btn-align-',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'pt_cfforms_submit_btn_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .pt-cfforms-container input.btn-default',
			]
		);
		
		$this->add_responsive_control(
			'pt_cfforms_submit_btn_margin',
			[
				'label' => esc_html__( 'Margin', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .pt-cfforms-container input.btn-default' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		
		$this->add_responsive_control(
			'pt_cfforms_submit_btn_padding',
			[
				'label' => esc_html__( 'Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .pt-cfforms-container input.btn-default' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		
		
		$this->start_controls_tabs( 'pt_cfforms_submit_button_tabs' );

		$this->start_controls_tab( 'normal', [ 'label' => esc_html__( 'Normal', 'elementor' ) ] );

		$this->add_control(
			'pt_cfforms_submit_btn_text_color',
			[
				'label' => esc_html__( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-cfforms-container input.btn-default' => 'color: {{VALUE}};',
				],
			]
		);
		

		
		$this->add_control(
			'pt_cfforms_submit_btn_background_color',
			[
				'label' => esc_html__( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-cfforms-container input.btn-default' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'pt_cfforms_submit_btn_border',
				'selector' => '{{WRAPPER}} .pt-cfforms-container input.btn-default',
			]
		);
		
		$this->add_control(
			'pt_cfforms_submit_btn_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .pt-cfforms-container input.btn-default' => 'border-radius: {{SIZE}}px;',
				],
			]
		);
		

		
		$this->end_controls_tab();

		$this->start_controls_tab( 'pt_cfforms_submit_btn_hover', [ 'label' => esc_html__( 'Hover', 'elementor' ) ] );

		$this->add_control(
			'pt_cfforms_submit_btn_hover_text_color',
			[
				'label' => esc_html__( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-cfforms-container input.btn-default:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'pt_cfforms_submit_btn_hover_background_color',
			[
				'label' => esc_html__( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-cfforms-container input.btn-default:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'pt_cfforms_submit_btn_hover_border_color',
			[
				'label' => esc_html__( 'Border Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-cfforms-container input.btn-default:hover' => 'border-color: {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_tab();
		
		$this->end_controls_tabs();
		
		
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'pt_cfforms_submit_btn_box_shadow',
				'selector' => '{{WRAPPER}} .pt-cfforms-container input.btn-default',
			]
		);
		
		
		$this->end_controls_section();
		
	}

	/**
	 * Define our Render Display settings.
	 */
	protected function render( ) {
      $settings = $this->get_settings();
	?>
		<?php if ( ! empty( $settings['cfforms_caldera_form'] ) ) : ?>
			<div class="pt-cfforms-container">	
				<?php echo do_shortcode( '[caldera_form id="' . $settings['cfforms_caldera_form'] . '" ]' ); ?>
			</div>
		<?php endif; ?>
	
	<?php
	
	}

	protected function content_template() {'' 
	?>
	
	<?php
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Pt_Elementor_cfforms() );