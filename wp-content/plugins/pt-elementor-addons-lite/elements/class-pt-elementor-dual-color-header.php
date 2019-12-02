<?php
/**
 * Class Pt-elementor-dual-color-header.php
 *
 * @author    Param Themes <paramthemes@gmail.com>
 * @copyright 2018 Param Themes
 * @license   Param Themes
 * @package   Elementor
 * @see       https://www.paramthemes.com
 */
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Widget_Pt_Dual_Color_Header extends Widget_Base {

	/**
	 * Define our get_name settings.
	 */
	public function get_name() {
		return 'Pt-dual-color-header';
	}
	/**
	 * Define our get_title settings.
	 */
	public function get_title() {
		return __( 'Dual Color Header', 'elementor' );
	}
	/**
	 * Define our get_icon settings.
	 */
	public function get_icon() {
		return 'eicon-animated-headline';
	}
	/**
	 * Define our get_categories settings.
	 */
	public function get_categories() {
		return [ 'pt-elementor-addons' ];
	}
	
	protected function _register_controls() {
		/**
  		 * Dual Color Heading Content Settings
  		 */
  		$this->start_controls_section(
  			'pt_section_dch_content_settings',
  			[
  				'label' => esc_html__( 'Content Settings', 'elementor' )
  			]
  		);

  		$this->add_control(
		  'pt_dch_type',
		  	[
		   	'label'       	=> esc_html__( 'Content Style', 'elementor' ),
		     	'type' 			=> Controls_Manager::SELECT,
		     	'default' 		=> 'dch-default',
		     	'label_block' 	=> false,
		     	'options' 		=> [
		     		'dch-default'  					=> esc_html__( 'Default', 'elementor' ),
		     		'dch-icon-on-top'  				=> esc_html__( 'Icon on top', 'elementor' ),
		     		'dch-icon-subtext-on-top'  	=> esc_html__( 'Icon &amp; sub-text on top', 'elementor' ),
		     		'dch-subtext-on-top'  			=> esc_html__( 'Sub-text on top', 'elementor' ),
		     	],
		  	]
		);
		
		$this->add_control(
			'pt_show_dch_icon_content',
			[
				'label' => __( 'Show Icon', 'elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_on' => __( 'Show', 'elementor' ),
				'label_off' => __( 'Hide', 'elementor' ),
				'return_value' => 'yes',
				'separator' => 'after',
			]
		);
		/**
		 * Condition: 'pt_show_dch_icon_content' => 'yes'
		 */
		$this->add_control(
			'pt_dch_icon',
			[
				'label' => esc_html__( 'Icon', 'elementor' ),
				'type' => Controls_Manager::ICON,
				'default' => 'fa fa-snowflake-o',
				'condition' => [
					'pt_show_dch_icon_content' => 'yes'
				]
			]
		);

		$this->add_control( 
			'pt_dch_first_title',
			[
				'label' => esc_html__( 'Title ( First Part )', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Dual Heading', 'elementor' )
			]
		);

		$this->add_control( 
			'pt_dch_last_title',
			[
				'label' => esc_html__( 'Title ( Last Part )', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Example', 'elementor' )
			]
		);

		$this->add_control( 
			'pt_dch_subtext',
			[
				'label' => esc_html__( 'Sub Text', 'elementor' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => esc_html__( 'Insert a meaningful line to evaluate the headline.', 'elementor' )
			]
		);

		$this->add_responsive_control(
			'pt_dch_content_alignment',
			[
				'label' => esc_html__( 'Alignment', 'elementor' ),
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
				],
				'default' => 'center',
				'prefix_class' => 'pt-dual-header-content-align-'
			]
		);

		$this->end_controls_section();

		

		/**
		 * -------------------------------------------
		 * Tab Style ( Dual Heading Style )
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'pt_section_dch_style_settings',
			[
				'label' => esc_html__( 'Dual Heading Style', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'pt_dch_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .pt-dual-header' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'pt_dch_container_padding',
			[
				'label' => esc_html__( 'Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .pt-dual-header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_responsive_control(
			'pt_dch_container_margin',
			[
				'label' => esc_html__( 'Margin', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .pt-dual-header' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'pt_dch_border',
				'label' => esc_html__( 'Border', 'elementor' ),
				'selector' => '{{WRAPPER}} .pt-dual-header',
			]
		);

		$this->add_control(
			'pt_dch_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .pt-dual-header' => 'border-radius: {{SIZE}}px;',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'pt_dch_shadow',
				'selector' => '{{WRAPPER}} .pt-dual-header',
			]
		);

		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Tab Style (Icon Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'pt_section_dch_icon_style_settings',
			[
				'label' => esc_html__( 'Icon Style', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
		     		'pt_show_dch_icon_content' => 'yes'
		     	]
			]
		);

		$this->add_control(
    		'pt_dch_icon_size',
    		[
        		'label' => __( 'Icon Size', 'elementor' ),
       		'type' => Controls_Manager::SLIDER,
        		'default' => [
            	'size' => 36,
        		],
        		'range' => [
            	'px' => [
                	'min' => 20,
                	'max' => 100,
                	'step' => 1,
            	]
        		],
        		'selectors' => [
            	'{{WRAPPER}} .pt-dual-header i' => 'font-size: {{SIZE}}px;',
        		],
    		]
		);

		$this->add_control(
			'pt_dch_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#4d4d4d',
				'selectors' => [
					'{{WRAPPER}} .pt-dual-header i' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Tab Style (Title Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'pt_section_dch_title_style_settings',
			[
				'label' => esc_html__( 'Color &amp; Typography', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'pt_dch_title_heading',
			[
				'label' => esc_html__( 'Title Style', 'elementor' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'pt_dch_base_title_color',
			[
				'label' => esc_html__( 'Main Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#4d4d4d',
				'selectors' => [
					'{{WRAPPER}} .pt-dual-header .title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'pt_dch_dual_title_color',
			[
				'label' => esc_html__( 'Dual Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#007fc0',
				'selectors' => [
					'{{WRAPPER}} .pt-dual-header .title span.lead' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
            'name' => 'pt_dch_first_title_typography',
				'selector' => '{{WRAPPER}} .pt-dual-header .title, {{WRAPPER}} .pt-dual-header .title span',
			]
		);

		$this->add_control(
			'pt_dch_sub_title_heading',
			[
				'label' => esc_html__( 'Sub-title Style ', 'elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'pt_dch_subtext_color',
			[
				'label' => esc_html__( 'Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#4d4d4d',
				'selectors' => [
					'{{WRAPPER}} .pt-dual-header .subtext' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
            'name' => 'pt_dch_subtext_typography',
				'selector' => '{{WRAPPER}} .pt-dual-header .subtext',
			]
		);

		$this->end_controls_section();
	}

	protected function render( ) {
		$settings = $this->get_settings();

	?>
	<?php if( 'dch-default' == $settings['pt_dch_type'] ) : ?>
	<div class="pt-dual-header">
		<h2 class="title"><span class="lead"><?php esc_html_e( $settings['pt_dch_first_title'], 'elementor' ); ?></span> <span><?php esc_html_e( $settings['pt_dch_last_title'], 'elementor' ); ?></span></h2>
	   <span class="subtext"><?php esc_html_e( $settings['pt_dch_subtext'], 'elementor' ); ?></span>
	   <?php if( 'yes' == $settings['pt_show_dch_icon_content'] ) : ?>
	   	<i class="<?php echo esc_attr( $settings['pt_dch_icon'] ); ?>"></i>
		<?php endif; ?>
	</div>
	<?php endif; ?>

	<?php if( 'dch-icon-on-top' == $settings['pt_dch_type'] ) : ?>
	<div class="pt-dual-header">
		<?php if( 'yes' == $settings['pt_show_dch_icon_content'] ) : ?>
	   	<i class="<?php echo esc_attr( $settings['pt_dch_icon'] ); ?>"></i>
		<?php endif; ?>
		<h2 class="title"><span class="lead"><?php esc_html_e( $settings['pt_dch_first_title'], 'elementor' ); ?></span> <span><?php esc_html_e( $settings['pt_dch_last_title'], 'elementor' ); ?></span></h2>
	   <span class="subtext"><?php esc_html_e( $settings['pt_dch_subtext'], 'elementor' ); ?></span>
	</div>
	<?php endif; ?>

	<?php if( 'dch-icon-subtext-on-top' == $settings['pt_dch_type'] ) : ?>
	<div class="pt-dual-header">
		<?php if( 'yes' == $settings['pt_show_dch_icon_content'] ) : ?>
	   	<i class="<?php echo esc_attr( $settings['pt_dch_icon'] ); ?>"></i>
		<?php endif; ?>
	   <span class="subtext"><?php esc_html_e( $settings['pt_dch_subtext'], 'elementor' ); ?></span>
	   <h2 class="title"><span class="lead"><?php esc_html_e( $settings['pt_dch_first_title'], 'elementor' ); ?></span> <span><?php esc_html_e( $settings['pt_dch_last_title'], 'elementor' ); ?></span></h2>
	</div>
	<?php endif; ?>

	<?php if( 'dch-subtext-on-top' == $settings['pt_dch_type'] ) : ?>
	<div class="pt-dual-header">
	   <span class="subtext"><?php esc_html_e( $settings['pt_dch_subtext'], 'elementor' ); ?></span>
			<h2 class="title"><span class="lead"><?php esc_html_e( $settings['pt_dch_first_title'], 'elementor' ); ?></span> <span><?php esc_html_e( $settings['pt_dch_last_title'], 'elementor' ); ?></span></h2>
		<?php if( 'yes' == $settings['pt_show_dch_icon_content'] ) : ?>
	   	<i class="<?php echo esc_attr( $settings['pt_dch_icon'] ); ?>"></i>
		<?php endif; ?>
	</div>
	<?php endif; ?>

	<?php
	}

	protected function content_template() {
		?>
		
		<?php
	}
}


Plugin::instance()->widgets_manager->register_widget_type( new Widget_Pt_Dual_Color_Header() );