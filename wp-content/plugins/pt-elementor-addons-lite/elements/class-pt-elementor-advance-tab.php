<?php
/**
 * Class Pt-elementor-advance-tab.php
 *
 * @author    Param Themes <paramthemes@gmail.com>
 * @copyright 2018 Param Themes
 * @license   Param Themes
 * @package   Elementor
 * @see       https://www.paramthemes.com
 */
namespace Elementor; 

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Widget_pt_Adv_Tabs extends Widget_Base {

	/**
	 * Define our get_name settings.
	 */
	public function get_name() {
		return 'Pt-advance-tab';
	}
	/**
	 * Define our get_title settings.
	 */
	public function get_title() {
		return __( 'Advance Tab', 'elementor' );
	}
	/**
	 * Define our get_icon settings.
	 */
	public function get_icon() {
		return 'eicon-tabs';
	}
	/**
	 * Define our get_categories settings.
	 */
	public function get_categories() {
		return [ 'pt-elementor-addons' ];
	}


	protected function _register_controls() {
		/**
  		 * Advance Tabs Settings
  		 */
  		$this->start_controls_section(
  			'pt_section_adv_tabs_settings',
  			[
  				'label' => esc_html__( 'General Settings', 'elementor' )
  			]
  		);
		$this->add_control(
			'pt_adv_tabs_icon_show',
			[
				'label' => esc_html__( 'Enable Icon', 'elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'return_value' => 'yes',
			]
		);
		$this->add_control(
		  'pt_adv_tab_icon_position',
		  	[
		   	'label'       	=> esc_html__( 'Icon Position', 'elementor' ),
		     	'type' 			=> Controls_Manager::SELECT,
		     	'default' 		=> 'pt-tab-inline-icon',
		     	'label_block' 	=> false,
		     	'options' 		=> [
		     		'pt-tab-top-icon' => esc_html__( 'Stacked', 'elementor' ),
		     		'pt-tab-inline-icon' => esc_html__( 'Inline', 'elementor' ),
		     	],
		     	'condition' => [
		     		'pt_adv_tabs_icon_show' => 'yes'
		     	]
		  	]
		);
  		$this->end_controls_section();

  		/**
  		 * Advance Tabs Content Settings
  		 */
  		$this->start_controls_section(
  			'pt_section_adv_tabs_content_settings',
  			[
  				'label' => esc_html__( 'Content Settings', 'elementor' )
  			]
  		);
  		$this->add_control(
			'pt_adv_tabs_tab',
			[
				'type' => Controls_Manager::REPEATER,
				'seperator' => 'before',
				'default' => [
					[ 'pt_adv_tabs_tab_title' => esc_html__( 'Tab Title 1', 'elementor' ) ],
					[ 'pt_adv_tabs_tab_title' => esc_html__( 'Tab Title 2', 'elementor' ) ],
					[ 'pt_adv_tabs_tab_title' => esc_html__( 'Tab Title 3', 'elementor' ) ],
				],
				'fields' => [
					[
						'name' => 'pt_adv_tabs_tab_show_as_default',
						'label' => __( 'Set as Default', 'elementor' ),
						'type' => Controls_Manager::SWITCHER,
						'default' => 'inactive',
						'return_value' => 'active',
				  	],
					[
						'name' => 'pt_adv_tabs_tab_title_icon',
						'label' => esc_html__( 'Icon', 'elementor' ),
						'type' => Controls_Manager::ICON,
						'default' => 'fa fa-home',
					],
					[
						'name' => 'pt_adv_tabs_tab_title',
						'label' => esc_html__( 'Tab Title', 'elementor' ),
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__( 'Tab Title', 'elementor' )
					],
				  	[
						'name' => 'pt_adv_tabs_tab_content',
						'label' => esc_html__( 'Tab Content', 'elementor' ),
						'type' => Controls_Manager::WYSIWYG,
						'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio, neque qui velit. Magni dolorum quidem ipsam eligendi, totam, facilis laudantium cum accusamus ullam voluptatibus commodi numquam, error, est. Ea, consequatur.', 'elementor' )
					],
				],
				'title_field' => '{{pt_adv_tabs_tab_title}}',
			]
		);
  		$this->end_controls_section();

  		/**
		 * -------------------------------------------
		 * Tab Style Advance Tabs Generel Style
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'pt_section_adv_tabs_style_settings',
			[
				'label' => esc_html__( 'General Style', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'pt_adv_tabs_padding',
			[
				'label' => esc_html__( 'Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .pt-advance-tabs' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);
		$this->add_responsive_control(
			'pt_adv_tabs_margin',
			[
				'label' => esc_html__( 'Margin', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .pt-advance-tabs' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'pt_adv_tabs_border',
				'label' => esc_html__( 'Border', 'elementor' ),
				'selector' => '{{WRAPPER}} .pt-advance-tabs',
			]
		);
		$this->add_responsive_control(
			'pt_adv_tabs_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .pt-advance-tabs' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'pt_adv_tabs_box_shadow',
				'selector' => '{{WRAPPER}} .pt-advance-tabs',
			]
		);
  		$this->end_controls_section();
  		/**
		 * -------------------------------------------
		 * Tab Style Advance Tabs Content Style
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'pt_section_adv_tabs_tab_style_settings',
			[
				'label' => esc_html__( 'Tab Title Style', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
            	'name' => 'pt_adv_tabs_tab_title_typography',
				'selector' => '{{WRAPPER}} .pt-advance-tabs .pt-tab-navs li a',
			]
		);
		$this->add_responsive_control(
			'pt_adv_tabs_tab_icon_size',
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
					'{{WRAPPER}} .pt-advance-tabs .pt-tab-navs li a .fa' => 'font-size: {{SIZE}}{{UNIT}};',
				]
			]
		);
		$this->add_responsive_control(
			'pt_adv_tabs_tab_icon_gap',
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
					'{{WRAPPER}} .pt-tab-inline-icon li a .fa' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .pt-tab-top-icon li a .fa' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				]
			]
		);
		$this->add_responsive_control(
			'pt_adv_tabs_tab_padding',
			[
				'label' => esc_html__( 'Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .pt-advance-tabs .pt-tab-navs li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);
		$this->add_responsive_control(
			'pt_adv_tabs_tab_margin',
			[
				'label' => esc_html__( 'Margin', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .pt-advance-tabs .pt-tab-navs li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->start_controls_tabs( 'pt_adv_tabs_header_tabs' );
			// Normal State Tab
			$this->start_controls_tab( 'pt_adv_tabs_header_normal', [ 'label' => esc_html__( 'Normal', 'elementor' ) ] );
				$this->add_control(
					'pt_adv_tabs_tab_color',
					[
						'label' => esc_html__( 'Tab Background Color', 'elementor' ),
						'type' => Controls_Manager::COLOR,
						'default' => '#f1f1f1',
						'selectors' => [
							'{{WRAPPER}} .pt-advance-tabs .pt-tab-navs li a' => 'background-color: {{VALUE}};',
						],
					]
				);
				$this->add_control(
					'pt_adv_tabs_tab_text_color',
					[
						'label' => esc_html__( 'Text Color', 'elementor' ),
						'type' => Controls_Manager::COLOR,
						'default' => '#333',
						'selectors' => [
							'{{WRAPPER}} .pt-advance-tabs .pt-tab-navs li a' => 'color: {{VALUE}};',
						],
					]
				);
				$this->add_control(
					'pt_adv_tabs_tab_icon_color',
					[
						'label' => esc_html__( 'Icon Color', 'elementor' ),
						'type' => Controls_Manager::COLOR,
						'default' => '#333',
						'selectors' => [
							'{{WRAPPER}} .pt-advance-tabs .pt-tab-navs li a .fa' => 'color: {{VALUE}};',
						],
						'condition' => [
							'pt_adv_tabs_icon_show' => 'yes'
						]
					]
				);
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'pt_adv_tabs_tab_border',
						'label' => esc_html__( 'Border', 'elementor' ),
						'selector' => '{{WRAPPER}} .pt-advance-tabs .pt-tab-navs li a',
					]
				);
				$this->add_responsive_control(
					'pt_adv_tabs_tab_border_radius',
					[
						'label' => esc_html__( 'Border Radius', 'elementor' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', 'em', '%' ],
						'selectors' => [
			 					'{{WRAPPER}} .pt-advance-tabs .pt-tab-navs li a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			 			],
					]
				);
			$this->end_controls_tab();
			// Hover State Tab
			$this->start_controls_tab( 'pt_adv_tabs_header_hover', [ 'label' => esc_html__( 'Hover', 'elementor' ) ] );
				$this->add_control(
					'pt_adv_tabs_tab_color_hover',
					[
						'label' => esc_html__( 'Tab Background Color', 'elementor' ),
						'type' => Controls_Manager::COLOR,
						'default' => '#f1f1f1',
						'selectors' => [
							'{{WRAPPER}} .pt-advance-tabs .pt-tab-navs li a:hover' => 'background-color: {{VALUE}};',
						],
					]
				);
				$this->add_control(
					'pt_adv_tabs_tab_text_color_hover',
					[
						'label' => esc_html__( 'Text Color', 'elementor' ),
						'type' => Controls_Manager::COLOR,
						'default' => '#333',
						'selectors' => [
							'{{WRAPPER}} .pt-advance-tabs .pt-tab-navs li a:hover' => 'color: {{VALUE}};',
						],
					]
				);
				$this->add_control(
					'pt_adv_tabs_tab_icon_color_hover',
					[
						'label' => esc_html__( 'Icon Color', 'elementor' ),
						'type' => Controls_Manager::COLOR,
						'default' => '#333',
						'selectors' => [
							'{{WRAPPER}} .pt-advance-tabs .pt-tab-navs li a:hover .fa' => 'color: {{VALUE}};',
						],
						'condition' => [
							'pt_adv_tabs_icon_show' => 'yes'
						]
					]
				);
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'pt_adv_tabs_tab_border_hover',
						'label' => esc_html__( 'Border', 'elementor' ),
						'selector' => '{{WRAPPER}} .pt-advance-tabs .pt-tab-navs li a:hover',
					]
				);
				$this->add_responsive_control(
					'pt_adv_tabs_tab_border_radius_hover',
					[
						'label' => esc_html__( 'Border Radius', 'elementor' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', 'em', '%' ],
						'selectors' => [
			 					'{{WRAPPER}} .pt-advance-tabs .pt-tab-navs li a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			 			],
					]
				);
			$this->end_controls_tab();
			// Active State Tab
			$this->start_controls_tab( 'pt_adv_tabs_header_active', [ 'label' => esc_html__( 'Active', 'elementor' ) ] );
				$this->add_control(
					'pt_adv_tabs_tab_color_active',
					[
						'label' => esc_html__( 'Tab Background Color', 'elementor' ),
						'type' => Controls_Manager::COLOR,
						'default' => '#444',
						'selectors' => [
							'{{WRAPPER}} .pt-advance-tabs .pt-tab-navs li a.active' => 'background-color: {{VALUE}};',
						],
					]
				);
				$this->add_control(
					'pt_adv_tabs_tab_text_color_active',
					[
						'label' => esc_html__( 'Text Color', 'elementor' ),
						'type' => Controls_Manager::COLOR,
						'default' => '#fff',
						'selectors' => [
							'{{WRAPPER}} .pt-advance-tabs .pt-tab-navs li a.active' => 'color: {{VALUE}};',
						],
					]
				);
				$this->add_control(
					'pt_adv_tabs_tab_icon_color_active',
					[
						'label' => esc_html__( 'Icon Color', 'elementor' ),
						'type' => Controls_Manager::COLOR,
						'default' => '#fff',
						'selectors' => [
							'{{WRAPPER}} .pt-advance-tabs .pt-tab-navs li a.active .fa' => 'color: {{VALUE}};',
						],
						'condition' => [
							'pt_adv_tabs_icon_show' => 'yes'
						]
					]
				);
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'pt_adv_tabs_tab_border_active',
						'label' => esc_html__( 'Border', 'elementor' ),
						'selector' => '{{WRAPPER}} .pt-advance-tabs .pt-tab-navs li a.active',
					]
				);
				$this->add_responsive_control(
					'pt_adv_tabs_tab_border_radius_active',
					[
						'label' => esc_html__( 'Border Radius', 'elementor' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', 'em', '%' ],
						'selectors' => [
			 					'{{WRAPPER}} .pt-advance-tabs .pt-tab-navs li a.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			 			],
					]
				);
			$this->end_controls_tab();
		$this->end_controls_tabs();
  		$this->end_controls_section();

  		/**
		 * -------------------------------------------
		 * Tab Style Advance Tabs Content Style
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'pt_section_adv_tabs_tab_content_style_settings',
			[
				'label' => esc_html__( 'Content Style', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'pt_adv_tabs_content_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .pt-advance-tabs .pt-tab-contents .pt-tab-content' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'pt_adv_tabs_content_text_color',
			[
				'label' => esc_html__( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#333',
				'selectors' => [
					'{{WRAPPER}} .pt-advance-tabs .pt-tab-contents .pt-tab-content' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
            	'name' => 'pt_adv_tabs_content_typography',
				'selector' => '{{WRAPPER}} .pt-advance-tabs .pt-tab-contents .pt-tab-content',
			]
		);
		$this->add_responsive_control(
			'pt_adv_tabs_content_padding',
			[
				'label' => esc_html__( 'Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .pt-advance-tabs .pt-tab-contents .pt-tab-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);
		$this->add_responsive_control(
			'pt_adv_tabs_content_margin',
			[
				'label' => esc_html__( 'Margin', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .pt-advance-tabs .pt-tab-contents .pt-tab-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'pt_adv_tabs_content_border',
				'label' => esc_html__( 'Border', 'elementor' ),
				'selector' => '{{WRAPPER}} .pt-advance-tabs .pt-tab-contents .pt-tab-content',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'pt_adv_tabs_content_shadow',
				'selector' => '{{WRAPPER}} .pt-advance-tabs .pt-tab-contents .pt-tab-content',
				'separator' => 'before'
			]
		);
  		$this->end_controls_section();

  		/**
		 * -------------------------------------------
		 * Tab Style Advance Tabs Caret Style
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'pt_section_adv_tabs_tab_caret_style_settings',
			[
				'label' => esc_html__( 'Caret Style', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'pt_adv_tabs_tab_caret_show',
			[
				'label' => esc_html__( 'Show Caret on Active Tab', 'elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'return_value' => 'yes',
			]
		);
		$this->add_control(
			'pt_adv_tabs_tab_caret_size',
			[
				'label' => esc_html__( 'Caret Size', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 10
				],
				'range' => [
					'px' => [
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .pt-advance-tabs .pt-tab-navs li a.active:after' => 'border-width: {{SIZE}}px; bottom: -{{SIZE}}px',
				],
				'condition' => [
					'pt_adv_tabs_tab_caret_show' => 'yes'
				]
			]
		);
		$this->add_control(
			'pt_adv_tabs_tab_caret_color',
			[
				'label' => esc_html__( 'Caret Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#444',
				'selectors' => [
					'{{WRAPPER}} .pt-advance-tabs .pt-tab-navs li a.active:after' => 'border-top-color: {{VALUE}};',
				],
				'condition' => [
					'pt_adv_tabs_tab_caret_show' => 'yes'
				]
			]
		);
  		$this->end_controls_section();
	}

	protected function render() {

   		$settings = $this->get_settings();
   		$pt_find_default_tab = array();
   		$pt_adv_tab_id = 1;
   		$pt_adv_tab_content_id = 1;
	?>
	<div class="pt-advance-tabs" id="pt-advance-tabs-<?php echo esc_attr( $this->get_id() ); ?>">
		<ul class="pt-tab-navs <?php echo esc_attr( $settings['pt_adv_tab_icon_position'] ); ?>">
			<?php foreach( $settings['pt_adv_tabs_tab'] as $tab ) : ?>
			<li><a hreg="javascript:;" data-pt-tab-id="pt-adv-tab-<?php echo esc_attr($pt_adv_tab_id); ?>" class="<?php echo esc_attr( $tab['pt_adv_tabs_tab_show_as_default'] ); ?>"><?php if( $settings['pt_adv_tabs_icon_show'] === 'yes' ) : ?><i class="<?php echo esc_attr( $tab['pt_adv_tabs_tab_title_icon'] ); ?>"></i><?php endif; ?> <span class="pt-tab-title"><?php echo $tab['pt_adv_tabs_tab_title']; ?></span></a></li>
			<?php $pt_adv_tab_id++; endforeach; ?>
		</ul>
		<div class="pt-tab-contents">
			<?php foreach( $settings['pt_adv_tabs_tab'] as $tab ) : $pt_find_default_tab[] = $tab['pt_adv_tabs_tab_show_as_default'];?>
			<div class="pt-tab-content clearfix <?php echo esc_attr( $tab['pt_adv_tabs_tab_show_as_default'] ); ?>" id="pt-adv-tab-<?php echo esc_attr($pt_adv_tab_content_id); ?>">
				<?php echo do_shortcode( $tab['pt_adv_tabs_tab_content'] ); ?>
			</div>
			<?php $pt_adv_tab_content_id++; endforeach;?>
		</div>
	</div>
	<script>
		jQuery(document).ready(function($) {
			var $ptTab = $('#pt-advance-tabs-<?php echo esc_attr( $this->get_id() ); ?>');
			var $ptTabNavLi = $ptTab.find('.pt-tab-navs li');
			var $ptTabNavs = $ptTab.find('.pt-tab-navs li a');

			var $ptTabContents = $ptTab.find('.pt-tab-contents');
			<?php
			if( in_array('active', $pt_find_default_tab) ) {
				// Do nothing
			}else {
			?>
				$ptTabNavLi.each( function(i) {
					if( i < 1 ) {
						$(this).find('a').removeClass('inactive').addClass('active');
					}
				} );
				$ptTabContents.find('.pt-tab-content').each( function(i) {
					if( i < 1 ) {
						$(this).removeClass('inactive').addClass('active');
					}
				} );
			<?php
			}
			?>
			$ptTabNavs.on('click', function(e) {
				e.preventDefault();
				$ptTabNavs.removeClass('active');
				var $ptTabCotnentId = $(this).data('pt-tab-id');
				$(this).addClass('active');
				$ptTabContents.find('.pt-tab-content').removeClass('inactive active');
				$ptTabContents.find('#'+$ptTabCotnentId).addClass('active');
			});
		});
	</script>
	<?php if( $settings['pt_adv_tabs_tab_caret_show'] !== 'yes' ) : ?>
	<style>
		#pt-advance-tabs-<?php echo esc_attr( $this->get_id() ); ?> .pt-tab-navs li a.active:after {
			display: none;
		}
	</style>
	<?php endif; ?>
	<?php
	}

	protected function content_template() {}
}


Plugin::instance()->widgets_manager->register_widget_type( new Widget_pt_Adv_Tabs() );