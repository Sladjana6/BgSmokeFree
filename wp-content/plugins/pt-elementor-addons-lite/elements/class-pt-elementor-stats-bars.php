<?php
/**
 * Class Pt-elementor-stats-bars.php
 *
 * @author    Param Themes <paramthemes@gmail.com>
 * @copyright 2018 Param Themes
 * @license   Param Theme
 * @package   Elementor
 * @see       https://www.paramthemes.com
 */
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Widget_Pt_Stats_Bars extends Widget_Base {

	/**
	 * Define our get_name settings.
	 */
	public function get_name() {
		return 'Pt-stats-bars';
	}
	/**
	 * Define our get_title settings.
	 */
	public function get_title() {
		return __( 'Stats Bars', 'elementor' );
	}
	/**
	 * Define our get_icon settings.
	 */
	public function get_icon() {
		return 'fa fa-tasks';
	}
	/**
	 * Define our get_categories settings.
	 */
	public function get_categories() {
		return [ 'pt-elementor-addons' ];
	}
	protected function _register_controls() {
		$this->start_controls_section(
            'section_stats_bars',
            [
                'label' => __('Stats Bars', 'elementor'),
            ]
        );

        $this->add_control(
            'stats_bars',
            [
                'type' => Controls_Manager::REPEATER,
                'default' => [
                    [
                        'stats_title' => __('Web Design', 'elementor'),
                        'percentage_value' => 87,
                    ],

                    [
                        'stats_title' => __('SEO Services', 'elementor'),
                        'percentage_value' => 76,
                    ],

                    [
                        'stats_title' => __('Brand Marketing', 'elementor'),
                        'percentage_value' => 40,
                    ],
                ],
                'fields' => [
                    [
                        'name' => 'stats_title',
                        'label' => __('Stats Title', 'elementor'),
                        'type' => Controls_Manager::TEXT,
                        'description' => __('The title for the stats bar', 'elementor'),
                        'dynamic' => [
                            'active' => true,
                        ],
                    ],

                    [
                        'name' => 'percentage_value',
                        'label' => __('Percentage Value', 'elementor'),
                        'type' => Controls_Manager::NUMBER,
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                        'default' => 30,
                        'description' => __('The percentage value for the stats.', 'elementor'),
                    ],

                    [
                        'name' => 'bar_color',
                        'label' => __('Bar Color', 'elementor'),
                        'type' => Controls_Manager::COLOR,
                        'default' => '#666666',
                    ],

                ],
                'title_field' => '{{{ stats_title }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_stats_bar_styling',
            [
                'label' => __('Stats Bar', 'elementor'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'stats_bar_bg_color',
            [
                'label' => __('Stats Bar Background Color', 'elementor'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pt-stats-bars .pt-stats-bar .pt-stats-bar-bg' => 'background-color: {{VALUE}};',
                ],
            ]
        );



        $this->add_control(
            'stats_bar_spacing',
            [
                'label' => __('Stats Bar Spacing', 'elementor'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'default' => [
                    'size' => 18,
                ],
                'range' => [
                    'px' => [
                        'min' => 5,
                        'max' => 128,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .pt-stats-bars .pt-stats-bar' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        $this->add_control(
            'stats_bar_height',
            [
                'label' => __('Stats Bar Height', 'elementor'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'default' => [
                    'size' => 10,
                ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 96,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .pt-stats-bars .pt-stats-bar .pt-stats-bar-bg, {{WRAPPER}} .pt-stats-bars .pt-stats-bar .pt-stats-bar-content' => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .pt-stats-bars .pt-stats-bar .pt-stats-bar-bg' => 'margin-top: -{{SIZE}}{{UNIT}};',
                ],
            ]
        );



        $this->add_control(
            'stats_bar_border_radius',
            [
                'label' => __('Stats Bar Border Radius', 'elementor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .pt-stats-bars .pt-stats-bar .pt-stats-bar-bg, {{WRAPPER}} .pt-stats-bars .pt-stats-bar .pt-stats-bar-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );



        $this->end_controls_section();


        $this->start_controls_section(
            'section_stats_title',
            [
                'label' => __('Stats Title', 'elementor'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'stats_title_color',
            [
                'label' => __('Color', 'elementor'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pt-stats-bars .pt-stats-bar .pt-stats-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'stats_title_typography',
                'selector' => '{{WRAPPER}} .pt-stats-bars .pt-stats-bar .pt-stats-title',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_stats_percentage',
            [
                'label' => __('Stats Percentage', 'elementor'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_control(
            'stats_percentage_spacing',
            [
                'label' => __('Spacing from Stats Title', 'elementor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'default' => [
                    'top' => 0,
                    'right' => 0,
                    'bottom' => 0,
                    'left' => 5,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .pt-stats-bars .pt-stats-bar .pt-stats-title span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'isLinked' => false
            ]
        );

        $this->add_control(
            'stats_percentage_color',
            [
                'label' => __('Color', 'elementor'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pt-stats-bars .pt-stats-bar .pt-stats-title span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'stats_percentage_typography',
                'selector' => '{{WRAPPER}} .pt-stats-bars .pt-stats-bar .pt-stats-title span',
            ]
        );

        $this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
        ?>

        <div class="pt-stats-bars">

            <?php foreach ($settings['stats_bars'] as $stats_bar) :

                $color_style = '';
                $color = $stats_bar['bar_color'];
                if ($color)
                    $color_style = ' style="background:' . esc_attr($color) . ';"';

                ?>

                <div class="pt-stats-bar">

                    <div class="pt-stats-title">
                        <?php echo esc_html($stats_bar['stats_title']) ?><span><?php echo esc_attr($stats_bar['percentage_value']); ?>%</span>
                    </div>

                    <div class="pt-stats-bar-wrap">

                        <div <?php echo $color_style; ?> class="pt-stats-bar-content"
                            data-perc="<?php echo esc_attr($stats_bar['percentage_value']); ?>">
						</div>

                        <div class="pt-stats-bar-bg"></div>

                    </div>

                </div>

                <?php

            endforeach;

            ?>

        </div>

        <?php
	}
	protected function content_template() {
		
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new Widget_Pt_Stats_Bars() );