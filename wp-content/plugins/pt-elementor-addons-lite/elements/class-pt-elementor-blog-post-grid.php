<?php
/**
 * Class Pt Elementor Blog-Post-Grid.php
 *
 * @author    Param Themes <paramthemes@gmail.com>
 * @copyright 2018 Param Themes
 * @license   Param Themes
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
class Pt_Elementor_Blog_Post_Grid extends Widget_Base {

	/**
	 * Define our get name settings.
	 */
	public function get_name() {
		return 'Pt-blog-post-grid';
	}
	/**
	 * Define our get title settings.
	 */
	public function get_title() {
		return __( 'Blog Post Grid', 'elementor' );
	}
	/**
	 * Define our get icon settings.
	 */
	public function get_icon() {
		return 'eicon-gallery-masonry';
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
            'section_query',
            [
                'label' => __('Post Query', 'elementor'),
            ]
        );


        $this->add_control(
            'post_types',
            [
                'label' => __('Post Types', 'elementor'),
                'type' => Controls_Manager::SELECT2,
                'default' => 'post',
                'options' => pt_get_all_post_type_options(),
                'multiple' => true
            ]
        );

        $this->add_control(
            'tax_query',
            [
                'label' => __('Taxonomies', 'elementor'),
                'type' => Controls_Manager::SELECT2,
                'options' => pt_get_all_taxonomy_options(),
                'multiple' => true,
                'label_block' => true
            ]
        );

        $this->add_control(
            'post_in',
            [
                'label' => __('Post In', 'elementor'),
                'description' => __('Provide a comma separated list of Post IDs to display in the grid.', 'elementor'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true
            ]
        );

        $this->add_control(
            'posts_per_page',
            [
                'label' => __('Posts Per Page', 'elementor'),
                'type' => Controls_Manager::NUMBER,
                'default' => 6,
            ]
        );

        $this->add_control(
            'advanced',
            [
                'label' => __('Advanced', 'elementor'),
                'type' => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'orderby',
            [
                'label' => __('Order By', 'elementor'),
                'type' => Controls_Manager::SELECT,
                'options' => array(
                    'none' => __('No order', 'elementor'),
                    'ID' => __('Post ID', 'elementor'),
                    'author' => __('Author', 'elementor'),
                    'title' => __('Title', 'elementor'),
                    'date' => __('Published date', 'elementor'),
                    'modified' => __('Modified date', 'elementor'),
                    'parent' => __('By parent', 'elementor'),
                    'rand' => __('Random order', 'elementor'),
                    'comment_count' => __('Comment count', 'elementor'),
                    'menu_order' => __('Menu order', 'elementor'),
                    'post__in' => __('By include order', 'elementor'),
                ),
                'default' => 'date',
            ]
        );

        $this->add_control(
            'order',
            [
                'label' => __('Order', 'elementor'),
                'type' => Controls_Manager::SELECT,
                'options' => array(
                    'ASC' => __('Ascending', 'elementor'),
                    'DESC' => __('Descending', 'elementor'),
                ),
                'default' => 'DESC',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_post_content',
            [
                'label' => __('Post Content', 'elementor'),
            ]
        );

        $this->add_control(
            'heading',
            [
                'label' => __('Heading for the grid', 'elementor'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => __('My Portfolio', 'elementor'),
                'default' => __('My Portfolio', 'elementor'),
            ]
        );

        $this->add_control(
            'taxonomy_filter',
            [
                'type' => Controls_Manager::SELECT,
                'label' => __('Choose the taxonomy to display and filter on.', 'elementor'),
                'label_block' => true,
                'description' => __('Choose the taxonomy information to display for posts/portfolio and the taxonomy that is used to filter the portfolio/post. Takes effect only if no taxonomy filters are specified when building query.', 'elementor'),
                'options' => pt_get_taxonomies_map(),
                'default' => 'category',
            ]
        );

        $this->add_control(
            'display_title',
            [
                'label' => __('Display posts title for the post/portfolio item?', 'elementor'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'elementor'),
                'label_off' => __('No', 'elementor'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'display_summary',
            [
                'label' => __('Display post excerpt/summary for the post/portfolio item?', 'elementor'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'elementor'),
                'label_off' => __('No', 'elementor'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

         /* Excerpt Length */
        $this->add_control(
            'show_excerpt',
            [
                'label' => __( 'Excerpt', 'elementor' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'elementor' ),
                'label_off' => __( 'Hide', 'elementor' ),
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'excerpt_length',
            [
                'label' => __( 'Excerpt Length', 'elementor' ),
                'type' => Controls_Manager::NUMBER,
                'default' => apply_filters( 'excerpt_length', 25 ),
                'condition'    => [
                    'show_excerpt' => 'yes'
                ]
            ]
        );

        $this->end_controls_section();

        /*read more start*/
        $this->start_controls_section(
            'section_posts_content',
            [
                'label' => __('Action Button', 'elementor'),
            ]
        );

        $this->add_control(
            'pt_excerpt_readmore',
            [
                'label' => __( 'Button Text', 'elementor' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => __( 'Read More', 'elementor' ),
                'default' => __( 'Read More', 'elementor' ),
            ]
        );
        $this->add_control(
            'button_text_color',
            [
                'label' => __( 'Text Color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#FFF',
                'selectors' => [
                    '{{WRAPPER}} .pt-post-blog-grid .pt-post-blog-grid-link' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography',
                'label' => __( 'Typography', 'elementor' ),
                'scheme' => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} .pt-post-blog-grid .pt-post-blog-grid-link',
            ]
        );
        $this->add_control(
            'background_color',
            [
                'label' => __( 'Background Color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_4,
                ],
                'default' => '#1e73be',
                'selectors' => [
                    '{{WRAPPER}} .pt-post-blog-grid .pt-post-blog-grid-link' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'label' => __( 'Border', 'elementor' ),
                'placeholder' => '1px',
                'default' => '1px',
                'selector' => '{{WRAPPER}} .pt-post-blog-grid .pt-post-blog-grid-link',
            ]
        );
        $this->add_control(
            'border_radius',
            [
                'label' => __( 'Border Radius', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .pt-post-blog-grid .pt-post-blog-grid-link' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'text_padding',
            [
                'label' => __( 'Text Padding', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .pt-post-blog-grid .pt-post-blog-grid-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
         /*read more end*/

        $this->start_controls_section(
            'section_post_meta',
            [
                'label' => __('Post Meta', 'elementor'),
            ]
        );


        $this->add_control(
            'display_author',
            [
                'label' => __('Display post author info for the post/portfolio item?', 'elementor'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'elementor'),
                'label_off' => __('No', 'elementor'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );


        $this->add_control(
            'display_post_date',
            [
                'label' => __('Display post date info for the post item?', 'elementor'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'elementor'),
                'label_off' => __('No', 'elementor'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );


        $this->add_control(
            'display_taxonomy',
            [
                'label' => __('Display taxonomy info for the post item? Choose the right taxonomy in Post Content section above.', 'elementor'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'elementor'),
                'label_off' => __('No', 'elementor'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_settings',
            [
                'label' => __('General Settings', 'elementor'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $this->add_control(
            'image_linkable',
            [
                'label' => __('Link Images to Posts?', 'elementor'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'elementor'),
                'label_off' => __('No', 'elementor'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'filterable',
            [
                'label' => __('Filterable?', 'elementor'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'elementor'),
                'label_off' => __('No', 'elementor'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'per_line',
            [
                'label' => __('Columns per row', 'elementor'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 5,
                'step' => 1,
                'default' => 3,
            ]
        );

        $this->add_control(
            'layout_mode',
            [
                'type' => Controls_Manager::SELECT,
                'label' => __('Choose a layout for the grid', 'elementor'),
                'options' => array(
                    'fitRows' => __('Fit Rows', 'elementor'),
                    'masonry' => __('Masonry', 'elementor'),
                ),
                'default' => 'fitRows',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_responsive',
            [
                'label' => __('Gutter Options', 'elementor'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $this->add_control(
            'heading_desktop',
            [
                'label' => __( 'Desktop', 'elementor' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gutter',
            [
                'label' => __('Gutter', 'elementor'),
                'description' => __('Space between columns in the grid.', 'elementor'),
                'type' => Controls_Manager::NUMBER,
                'default' => 20,
                'selectors' => [
                    '{{WRAPPER}} .pt-portfolio' => 'margin-left: -{{VALUE}}px; margin-right: -{{VALUE}}px;',
                    '{{WRAPPER}} .pt-portfolio .pt-portfolio-item' => 'padding: {{VALUE}}px;',
                ],
            ]
        );

        $this->add_control(
            'heading_tablet',
            [
                'label' => __( 'Tablet', 'elementor' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'tablet_gutter',
            [
                'label' => __('Gutter', 'elementor'),
                'description' => __('Space between columns.', 'elementor'),
                'type' => Controls_Manager::NUMBER,
                'default' => 10,
                'selectors' => [
                    '(tablet-){{WRAPPER}} .pt-portfolio' => 'margin-left: -{{VALUE}}px; margin-right: -{{VALUE}}px;',
                    '(tablet-){{WRAPPER}} .pt-portfolio .pt-portfolio-item' => 'padding: {{VALUE}}px;',
                ],
            ]
        );


        $this->add_control(
            'heading_mobile',
            [
                'label' => __( 'Mobile Phone', 'elementor' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'mobile_gutter',
            [
                'label' => __('Gutter', 'elementor'),
                'description' => __('Space between columns.', 'elementor'),
                'type' => Controls_Manager::NUMBER,
                'default' => 10,
                'selectors' => [
                    '(mobile-){{WRAPPER}} .pt-portfolio' => 'margin-left: -{{VALUE}}px; margin-right: -{{VALUE}}px;',
                    '(mobile-){{WRAPPER}} .pt-portfolio .pt-portfolio-item' => 'padding: {{VALUE}}px;',
                ],
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'section_heading_styling',
            [
                'label' => __('Grid Heading', 'elementor'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_control(
            'heading_tag',
            [
                'label' => __( 'Heading HTML Tag', 'elementor' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'h1' => __( 'H1', 'elementor' ),
                    'h2' => __( 'H2', 'elementor' ),
                    'h3' => __( 'H3', 'elementor' ),
                    'h4' => __( 'H4', 'elementor' ),
                    'h5' => __( 'H5', 'elementor' ),
                    'h6' => __( 'H6', 'elementor' ),
                    'div' => __( 'div', 'elementor' ),
                ],
                'default' => 'h3',
            ]
        );

        $this->add_control(
            'heading_color',
            [
                'label' => __( 'Heading Color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pt-portfolio-wrap .pt-heading' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'heading_typography',
                'selector' => '{{WRAPPER}} .pt-portfolio-wrap .pt-heading',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_filters_styling',
            [
                'label' => __('Grid Filters', 'elementor'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'filter_color',
            [
                'label' => __( 'Filter Color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pt-portfolio-wrap .pt-taxonomy-filter .pt-filter-item a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'filter_hover_color',
            [
                'label' => __( 'Filter Hover Color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pt-portfolio-wrap .pt-taxonomy-filter .pt-filter-item a:hover, {{WRAPPER}} .pt-portfolio-wrap .pt-taxonomy-filter .pt-filter-item.pt-active a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'filter_active_border',
            [
                'label' => __( 'Active Filter Border Color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pt-portfolio-wrap .pt-taxonomy-filter .pt-filter-item.pt-active:after ' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'filter_typography',
                'selector' => '{{WRAPPER}} .pt-portfolio-wrap .pt-taxonomy-filter .pt-filter-item a',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_grid_thumbnail_styling',
            [
                'label' => __('Grid Thumbnail', 'elementor'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'heading_thumbnail_info',
            [
                'label' => __( 'Thumbnail Info Entry Title', 'elementor' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label' => __( 'Title HTML Tag', 'elementor' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'h1' => __( 'H1', 'elementor' ),
                    'h2' => __( 'H2', 'elementor' ),
                    'h3' => __( 'H3', 'elementor' ),
                    'h4' => __( 'H4', 'elementor' ),
                    'h5' => __( 'H5', 'elementor' ),
                    'h6' => __( 'H6', 'elementor' ),
                    'div' => __( 'div', 'elementor' ),
                ],
                'default' => 'h3',
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Title Color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pt-portfolio-wrap .pt-portfolio .pt-portfolio-item .pt-project-image .pt-image-info .pt-post-title a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'title_hover_border_color',
            [
                'label' => __( 'Title Hover Border Color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pt-portfolio-wrap .pt-portfolio .pt-portfolio-item .pt-project-image .pt-image-info .pt-post-title a:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .pt-portfolio-wrap .pt-portfolio .pt-portfolio-item .pt-project-image .pt-image-info .pt-post-title',
            ]
        );

        $this->add_control(
            'heading_thumbnail_info_taxonomy',
            [
                'label' => __( 'Thumbnail Info Taxonomy Terms', 'elementor' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'thumbnail_info_tags_color',
            [
                'label' => __( 'Taxonomy Terms Color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pt-portfolio-wrap .pt-portfolio .pt-portfolio-item .pt-project-image .pt-image-info .pt-terms, {{WRAPPER}} .pt-portfolio-wrap .pt-portfolio .pt-portfolio-item .pt-project-image .pt-image-info .pt-terms a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'tags_typography',
                'selector' => '{{WRAPPER}} .pt-portfolio-wrap .pt-portfolio .pt-portfolio-item .pt-project-image .pt-image-info .pt-terms, {{WRAPPER}} .pt-portfolio-wrap .pt-portfolio .pt-portfolio-item .pt-project-image .pt-image-info .pt-terms a',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_entry_title_styling',
            [
                'label' => __('Grid Item Entry Title', 'elementor'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'entry_title_tag',
            [
                'label' => __( 'Entry Title HTML Tag', 'elementor' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'h1' => __( 'H1', 'elementor' ),
                    'h2' => __( 'H2', 'elementor' ),
                    'h3' => __( 'H3', 'elementor' ),
                    'h4' => __( 'H4', 'elementor' ),
                    'h5' => __( 'H5', 'elementor' ),
                    'h6' => __( 'H6', 'elementor' ),
                    'div' => __( 'div', 'elementor' ),
                ],
                'default' => 'h3',
            ]
        );

        $this->add_control(
            'entry_title_color',
            [
                'label' => __( 'Entry Title Color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pt-portfolio-wrap .pt-portfolio .pt-portfolio-item .entry-title a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'entry_title_typography',
                'selector' => '{{WRAPPER}} .pt-portfolio-wrap .pt-portfolio .pt-portfolio-item .entry-title',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_entry_summary_styling',
            [
                'label' => __('Grid Item Entry Summary', 'elementor'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'entry_summary_color',
            [
                'label' => __( 'Entry Summary Color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pt-portfolio-wrap .pt-portfolio .pt-portfolio-item .entry-summary' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'entry_summary_typography',
                'selector' => '{{WRAPPER}} .pt-portfolio-wrap .pt-portfolio .pt-portfolio-item .entry-summary',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_entry_meta_styling',
            [
                'label' => __('Grid Item Entry Meta', 'elementor'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'heading_entry_meta',
            [
                'label' => __( 'Entry Meta', 'elementor' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'entry_meta_color',
            [
                'label' => __( 'Entry Meta Color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pt-portfolio-wrap .pt-portfolio .pt-portfolio-item .pt-entry-meta span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'entry_meta_typography',
                'selector' => '{{WRAPPER}} .pt-portfolio-wrap .pt-portfolio .pt-portfolio-item .pt-entry-meta span',
            ]
        );


        $this->add_control(
            'heading_entry_meta_link',
            [
                'label' => __( 'Entry Meta Link', 'elementor' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'entry_meta_link_color',
            [
                'label' => __( 'Entry Meta Link Color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pt-portfolio-wrap .pt-portfolio .pt-portfolio-item .pt-entry-meta span a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'entry_meta_link_typography',
                'selector' => '{{WRAPPER}} .pt-portfolio-wrap .pt-portfolio .pt-portfolio-item .pt-entry-meta span a',
            ]
        );

        $this->end_controls_section();

		

	}
	function posts_grid($loop, $settings, $taxonomies) {

        $column_style = pt_get_column_class(intval($settings['per_line'])); ?>

        <?php $current_page = get_queried_object_id(); ?>

        <?php while ($loop->have_posts()) : $loop->the_post(); ?>

            <?php $post_id = get_the_ID(); ?>

            <?php
            if ($post_id === $current_page)
                continue; // skip current page since we can run into infinite loop when users choose All option in build query
            ?>

            <?php
            $style = '';
            foreach ($taxonomies as $taxonomy) {
                $terms = get_the_terms($post_id, $taxonomy);
                if (!empty($terms) && !is_wp_error($terms)) {
                    foreach ($terms as $term) {
                        $style .= ' term-' . $term->term_id;
                    }
                }
            }
            ?>

            <div data-id="id-<?php echo $post_id; ?>"
                 class="pt-portfolio-item <?php echo $style; ?> <?php echo $column_style; ?>">

                <article id="post-<?php echo $post_id; ?>" <?php post_class(); ?>>

                    <?php if ($thumbnail_exists = has_post_thumbnail()): ?>

                        <div class="pt-project-image">

                            <?php if ($settings['image_linkable'] == 'yes'): ?>

                                <a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail('large'); ?> </a>

                            <?php else: ?>

                                <?php the_post_thumbnail('large'); ?>

                            <?php endif; ?>

                            <div class="pt-image-info">

                                <div class="pt-entry-info">

                                    <?php the_title('<'. $settings['title_tag']. ' class="pt-post-title"><a href="' . get_permalink() . '" title="' . get_the_title() . '"
                                               rel="bookmark">', '</a></'. $settings['title_tag'] . '>'); ?>

                                    <?php echo pt_get_taxonomy_info($taxonomies); ?>

                                </div>

                            </div>

                        </div>

                    <?php endif; ?>

                    <?php if (($settings['display_title'] == 'yes') || ($settings['display_summary'] == 'yes')) : ?>

                        <div
                                class="pt-entry-text-wrap <?php echo($thumbnail_exists ? '' : ' nothumbnail'); ?>">

                            <?php if ($settings['display_title'] == 'yes') : ?>

                                <?php the_title('<'. $settings['entry_title_tag']. ' class="entry-title"><a href="' . get_permalink() . '" title="' . get_the_title() . '"
                                               rel="bookmark">', '</a></'. $settings['entry_title_tag'] . '>'); ?>

                            <?php endif; ?>

                            <?php if (($settings['display_post_date'] == 'yes') || ($settings['display_author'] == 'yes') || ($settings['display_taxonomy'] == 'yes')) : ?>

                                <div class="pt-entry-meta">

                                    <?php if ($settings['display_author'] == 'yes'): ?>

                                        <?php echo pt_entry_author(); ?>

                                    <?php endif; ?>

                                    <?php if ($settings['display_post_date'] == 'yes'): ?>

                                        <?php echo pt_entry_published(); ?>

                                    <?php endif; ?>

                                    <?php if ($settings['display_taxonomy'] == 'yes'): ?>

                                        <?php echo pt_get_taxonomy_info($taxonomies); ?>

                                    <?php endif; ?>

                                </div>

                            <?php endif; ?>

                            <?php if ($settings['display_summary'] == 'yes') : ?>

                                <div class="entry-summary">
                                    <div class="">
                                     <?php echo esc_html( pt_get_excerpt_by_id_lite( get_the_ID(), $settings['excerpt_length'] ) ); ?>
                                    </div>
                                    <div class="pt-post-blog-grid">
                                        <a class="pt-post-blog-grid-link" href="<?php echo get_permalink(); ?>"><?php echo $settings['pt_excerpt_readmore']; ?>
                                        </a>
                                    </div>
                                </div>

                            <?php endif; ?>

                        </div>

                    <?php endif; ?>

                </article><!-- .hentry -->

            </div>

        <?php endwhile; ?>

        <?php wp_reset_postdata(); ?>

        <?php

    }

	/**
	 * Define our Rendor Display settings.
	 */
	protected function render() {
		 $settings = $this->get_settings();

        // Use the processed post selector query to find posts.
        $query_args = pt_build_query_args($settings);

        $loop = new \WP_Query($query_args);

        // Loop through the posts and do something with them.
        if ($loop->have_posts()) :

            // Check if any taxonomy filter has been applied
            list($chosen_terms, $taxonomies) = pt_get_chosen_terms($settings['tax_query']);
            if (empty($chosen_terms))
                $taxonomies[] = $settings['taxonomy_filter'];

            ?>

            <div class="pt-portfolio-wrap pt-gapless-grid">

                <?php if (!empty($settings['heading']) || $settings['filterable'] == 'yes'): ?>

                    <?php $header_class = (trim($settings['heading']) === '') ? ' pt-no-heading' : ''; ?>

                    <div class="pt-portfolio-header <?php echo $header_class; ?>">

                        <?php if (!empty($settings['heading'])) : ?>

                            <<?php echo $settings['heading_tag']; ?> class="pt-heading"><?php echo wp_kses_post($settings['heading']); ?></<?php echo $settings['heading_tag']; ?>>

                        <?php endif; ?>

                        <?php

                        if ($settings['filterable'] == 'yes')
                            echo pt_get_taxonomy_terms_filter($taxonomies, $chosen_terms);
                        ?>

                    </div>

                <?php endif; ?>

                <div id="pt-portfolio-<?php echo uniqid(); ?>"
                     class="pt-portfolio js-isotope pt-<?php echo esc_attr($settings['layout_mode']); ?> pt-grid-container"
                     data-isotope-options='{ "itemSelector": ".pt-portfolio-item", "layoutMode": "<?php echo esc_attr($settings['layout_mode']); ?>" }'>

                    <?php $this->posts_grid($loop, $settings, $taxonomies); ?>

                </div><!-- Isotope items -->

            </div>

            <?php

        endif;
	}
	/**
	 * Define our Content template settings.
	 */
	protected function content_template() {
		
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new Pt_Elementor_Blog_Post_Grid() );
