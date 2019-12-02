<?php
/**
 * Class Pt Elementor Piecharts.php
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
	 * Define our Pt Elementor Flip Box settings.
	 */
class Pt_Elementor_Piecharts extends Widget_Base {

	/**
	 * Define our get name settings.
	 */
	public function get_name() {
		return 'Pt-piecharts';
	}
	/**
	 * Define our get title settings.
	 */
	public function get_title() {
		return __( 'Pie Charts', 'elementor' );
	}
	/**
	 * Define our get icon settings.
	 */
	public function get_icon() {
		return 'eicon-counter-circle';
	}
	/**
	 * Define our get categories settings.
	 */
	public function get_categories() {
		return [ 'pt-elementor-addons' ];
	}
	/**
	 * Define our register_controls settings.
	 */
	protected function _register_controls() {

		$this->start_controls_section(
            'section_piecharts',
            [
                'label' => __('Piecharts', 'elementor'),
            ]
        );

        $this->add_control(
            'per_line',
            [
                'label' => __('Piecharts per row', 'elementor'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 5,
                'step' => 1,
                'default' => 4,
            ]
        );


        $this->add_control(
            'piecharts',
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
                        'stats_title' => __('WordPress Development', 'elementor'),
                        'percentage_value' => 90,
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
                        'description' => __('The title for the piechart', 'livemesh-el-addons'),
                    ],
                    [
                        'name' => 'percentage_value',
                        'label' => __('Percentage Value', 'elementor'),
                        'type' => Controls_Manager::NUMBER,
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                        'default' => 30,
                        'description' => __('The percentage value for the stats.', 'livemesh-el-addons'),
                    ],

                ],
                'title_field' => '{{{ stats_title }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_styling',
            [
                'label' => __('Piechart Styling', 'elementor'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'bar_color',
            [
                'label' => __('Bar color', 'elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#666666',
            ]
        );


        $this->add_control(
            'track_color',
            [
                'label' => __('Track color', 'elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#dddddd',
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
                    '{{WRAPPER}} .pt-piechart .pt-label' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'stats_title_typography',
                'selector' => '{{WRAPPER}} .pt-piechart .pt-label',
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
            'stats_percentage_color',
            [
                'label' => __('Color', 'elementor'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pt-piechart .pt-percentage span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'stats_percentage_typography',
                'selector' => '{{WRAPPER}} .pt-piechart .pt-percentage span',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_stats_percentage_symbol',
            [
                'label' => __('Stats Percentage Symbol', 'elementor'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'stats_percentage_symbol_color',
            [
                'label' => __('Color', 'elementor'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pt-piechart .pt-percentage sup' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'stats_percentage_symbol_typography',
                'selector' => '{{WRAPPER}} .pt-piechart .pt-percentage sup',
            ]
        );

	
	
	}
	/**
	 * Define our Rendor Display settings.
	 */
	protected function render() {
		$settings = $this->get_settings();
        ?>

        <?php $column_style = pt_get_column_class(intval($settings['per_line'])); ?>

        <?php

        $bar_color = ' data-bar-color="' . esc_attr($settings['bar_color']) . '"';
        $track_color = ' data-track-color="' . esc_attr($settings['track_color']) . '"';

        ?>

        <div class="pt-piecharts pt-grid-container">

            <?php foreach ($settings['piecharts'] as $piechart): ?>

                <div class="pt-piechart <?php echo $column_style; ?>">

                    <div class="pt-percentage" <?php echo $bar_color; ?> <?php echo $track_color; ?>
                         data-percent="<?php echo round($piechart['percentage_value']); ?>">

                        <span><?php echo round($piechart['percentage_value']); ?><sup>%</sup></span>

                    </div>

                    <div class="pt-label"><?php echo esc_html($piechart['stats_title']); ?></div>

                </div>

                <?php

            endforeach;

            ?>

        </div>

        <div class="pt-clear"></div>

        <?php
	}
	/**
	 * Define our Content template settings.
	 */
	protected function content_template() {
		
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new Pt_Elementor_Piecharts() );
