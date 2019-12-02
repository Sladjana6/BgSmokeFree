<?php
/**
 * Class Pt Elementor post-carousel.php
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
class Pt_Elementor_Post_Carousel extends Widget_Base {

    /**
     * Define our get name settings.
     */
    public function get_name() {
        return 'Pt-post-carousel';
    }
    /**
     * Define our get title settings.
     */
    public function get_title() {
        return __( 'Post Carousel', 'elementor' );
    }
    /**
     * Define our get icon settings.
     */
    public function get_icon() {
        return 'eicon-carousel';
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
            'section_posts_carousel',
            [
                'label' => __('Posts Query', 'elementor'),
            ]
        );

        $this->add_control(
          'pt_carousel_style',
            [
            'label'         => esc_html__( 'Post Style', 'elementor' ),
                'type'          => Controls_Manager::SELECT,
                'default'       => 'style-1',
                'label_block'   => false,
                'options'       => [
                    'style-1'   => esc_html__( 'Default', 'elementor' ),
                    'style-2'   => esc_html__( 'Post Style 2', 'elementor' ),
                    'style-3'   => esc_html__( 'Post Style 3', 'elementor' ),
                    'style-4'   => esc_html__( 'Post Style 4', 'elementor' ),
                ],
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
                'description' => __('Provide a comma separated list of Post IDs to display in the grid.', 'livemesh-el-addons'),
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
            'taxonomy_chosen',
            [
                'label' => __('Choose the taxonomy to display info.', 'elementor'),
                'description' => __('Choose the taxonomy to use for display of taxonomy information for posts/custom post types.', 'elementor'),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'default' => 'category',
                'options' => pt_get_taxonomies_map(),
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
            'display_title',
            [
                'label' => __('Display posts title below the post item?', 'elementor'),
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
                'label' => __('Display post excerpt/summary below the post item?', 'elementor'),
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

        $this->start_controls_section(
            'section_post_meta',
            [
                'label' => __('Post Meta', 'elementor'),
            ]
        );

        $this->add_control(
            'display_author',
            [
                'label' => __('Display post author info below the post item?', 'elementor'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'elementor'),
                'label_off' => __('No', 'elementor'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );


        $this->add_control(
            'display_post_date',
            [
                'label' => __('Display post date info below the post item?', 'elementor'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'elementor'),
                'label_off' => __('No', 'elementor'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );


        $this->add_control(
            'display_taxonomy',
            [
                'label' => __('Display taxonomy info below the post item?', 'elementor'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'elementor'),
                'label_off' => __('No', 'elementor'),
                'return_value' => 'yes',
                'default' => 'no',
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
                    '{{WRAPPER}} .pt-post-carousel .pt-post-carousel-link' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography',
                'label' => __( 'Typography', 'elementor' ),
                'scheme' => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} .pt-post-carousel .pt-post-carousel-link',
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
                    '{{WRAPPER}} .pt-post-carousel .pt-post-carousel-link' => 'background-color: {{VALUE}};',
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
                'selector' => '{{WRAPPER}} .pt-post-carousel .pt-post-carousel-link',
            ]
        );
        $this->add_control(
            'border_radius',
            [
                'label' => __( 'Border Radius', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .pt-post-carousel .pt-post-carousel-link' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .pt-post-carousel .pt-post-carousel-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
         /*read more end*/

        $this->start_controls_section(
            'section_carousel_settings',
            [
                'label' => __('Carousel Settings', 'elementor'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $this->add_control(
            'arrows',
            [
                'type' => Controls_Manager::SWITCHER,
                'label_off' => __('No', 'elementor'),
                'label_on' => __('Yes', 'elementor'),
                'return_value' => 'yes',
                'default' => 'yes',
                'label' => __('Prev/Next Arrows?', 'elementor'),
            ]
        );


        $this->add_control(
            'dots',
            [
                'type' => Controls_Manager::SWITCHER,
                'label_off' => __('No', 'elementor'),
                'label_on' => __('Yes', 'elementor'),
                'return_value' => 'yes',
                'default' => 'no',
                'label' => __('Show dot indicators for navigation?', 'elementor'),
            ]
        );

        $this->add_control(
            'pause_on_hover',
            [
                'type' => Controls_Manager::SWITCHER,
                'label_off' => __('No', 'elementor'),
                'label_on' => __('Yes', 'elementor'),
                'return_value' => 'yes',
                'default' => 'yes',
                'label' => __('Pause on Hover?', 'elementor'),
            ]
        );

        $this->add_control(
            'autoplay',
            [
                'type' => Controls_Manager::SWITCHER,
                'label_off' => __('No', 'elementor'),
                'label_on' => __('Yes', 'elementor'),
                'return_value' => 'yes',
                'default' => 'no',
                'label' => __('Autoplay?', 'elementor'),
                'description' => __('Should the carousel autoplay as in a slideshow.', 'elementor'),
            ]
        );

        $this->add_control(
            'autoplay_speed',
            [
                'label' => __('Autoplay speed in ms', 'elementor'),
                'type' => Controls_Manager::NUMBER,
                'default' => 3000,
            ]
        );


        $this->add_control(
            'animation_speed',
            [
                'label' => __('Autoplay animation speed in ms', 'elementor'),
                'type' => Controls_Manager::NUMBER,
                'default' => 300,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_responsive',
            [
                'label' => __('Responsive Options', 'elementor'),
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
                'description' => __('Space between columns.', 'elementor'),
                'type' => Controls_Manager::NUMBER,
                'default' => 10,
                'selectors' => [
                    '{{WRAPPER}} .pt-posts-carousel .pt-posts-carousel-item' => 'padding: {{VALUE}}px;',
                ],
            ]
        );

        $this->add_control(
            'display_columns',
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
            'scroll_columns',
            [
                'label' => __('Columns to scroll', 'elementor'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 5,
                'step' => 1,
                'default' => 3,
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
                    '(tablet-){{WRAPPER}} .pt-posts-carousel .pt-posts-carousel-item' => 'padding: {{VALUE}}px;',
                ],
            ]
        );


        $this->add_control(
            'tablet_display_columns',
            [
                'label' => __('Columns per row', 'elementor'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 5,
                'step' => 1,
                'default' => 2,
            ]
        );

        $this->add_control(
            'tablet_scroll_columns',
            [
                'label' => __('Columns to scroll', 'elementor'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 5,
                'step' => 1,
                'default' => 2,
            ]
        );

        $this->add_control(
            'tablet_width',
            [
                'label' => __('Tablet Resolution', 'elementor'),
                'description' => __('The resolution to treat as a tablet resolution.', 'elementor'),
                'type' => Controls_Manager::NUMBER,
                'default' => 800,
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
                'label' => __('Mobile Gutter', 'elementor'),
                'description' => __('Space between columns.', 'elementor'),
                'type' => Controls_Manager::NUMBER,
                'default' => 10,
                'selectors' => [
                    '(mobile-){{WRAPPER}} .pt-posts-carousel .pt-posts-carousel-item' => 'padding: {{VALUE}}px;',
                ],
            ]
        );

        $this->add_control(
            'mobile_display_columns',
            [
                'label' => __('Columns per row', 'elementor'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 3,
                'step' => 1,
                'default' => 1,
            ]
        );

        $this->add_control(
            'mobile_scroll_columns',
            [
                'label' => __('Columns to scroll', 'elementor'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 3,
                'step' => 1,
                'default' => 1,
            ]
        );

        $this->add_control(
            'mobile_width',
            [
                'label' => __('Mobile Resolution', 'elementor'),
                'description' => __('The resolution to treat as a mobile resolution.', 'livemesh-el-addons'),
                'type' => Controls_Manager::NUMBER,
                'default' => 480,
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'section_carousel_item_thumbnail_styling',
            [
                'label' => __('Post Thumbnail', 'elementor'),
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
                    '{{WRAPPER}} .pt-posts-carousel .pt-posts-carousel-item .pt-project-image .pt-image-info .pt-post-title a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'title_hover_border_color',
            [
                'label' => __( 'Title Hover Border Color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pt-posts-carousel .pt-posts-carousel-item .pt-project-image .pt-image-info .pt-post-title a:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .pt-posts-carousel .pt-posts-carousel-item .pt-project-image .pt-image-info .pt-post-title',
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
                    '{{WRAPPER}} .pt-posts-carousel .pt-posts-carousel-item .pt-project-image .pt-image-info .pt-terms, {{WRAPPER}} .pt-posts-carousel .pt-posts-carousel-item .pt-project-image .pt-image-info .pt-terms a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'tags_typography',
                'selector' => '{{WRAPPER}} .pt-posts-carousel .pt-posts-carousel-item .pt-project-image .pt-image-info .pt-terms, {{WRAPPER}} .pt-posts-carousel .pt-posts-carousel-item .pt-project-image .pt-image-info .pt-terms a',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_entry_title_styling',
            [
                'label' => __('Post Entry Title', 'elementor'),
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
                    '{{WRAPPER}} .pt-posts-carousel .pt-posts-carousel-item .entry-title a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'entry_title_typography',
                'selector' => '{{WRAPPER}} .pt-posts-carousel .pt-posts-carousel-item .entry-title',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_entry_summary_styling',
            [
                'label' => __('Post Entry Summary', 'elementor'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'entry_summary_color',
            [
                'label' => __( 'Entry Summary Color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pt-posts-carousel .pt-posts-carousel-item .entry-summary' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'entry_summary_typography',
                'selector' => '{{WRAPPER}} .pt-posts-carousel .pt-posts-carousel-item .entry-summary',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_entry_meta_styling',
            [
                'label' => __('Post Entry Meta', 'elementor'),
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
                    '{{WRAPPER}} .pt-posts-carousel .pt-posts-carousel-item .pt-entry-meta span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'entry_meta_typography',
                'selector' => '{{WRAPPER}} .pt-posts-carousel .pt-posts-carousel-item .pt-entry-meta span',
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
                    '{{WRAPPER}} .pt-posts-carousel .pt-posts-carousel-item .pt-entry-meta span a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'entry_meta_link_typography',
                'selector' => '{{WRAPPER}} .pt-posts-carousel .pt-posts-carousel-item .pt-entry-meta span a',
            ]
        );
         $this->end_controls_section();
    }
    /**
     * Define our Rendor Display settings.
     */
    protected function render() {
        $settings = $this->get_settings();
        
        $taxonomies = array();

        $carousel_settings = [
            'arrows' => ('yes' === $settings['arrows']),
            'dots' => ('yes' === $settings['dots']),
            'autoplay' => ('yes' === $settings['autoplay']),
            'autoplay_speed' => absint($settings['autoplay_speed']),
            'animation_speed' => absint($settings['animation_speed']),
            'pause_on_hover' => ('yes' === $settings['pause_on_hover']),
        ];

        $responsive_settings = [
            'display_columns' => $settings['display_columns'],
            'scroll_columns' => $settings['scroll_columns'],
            'gutter' => $settings['gutter'],
            'tablet_width' => $settings['tablet_width'],
            'tablet_display_columns' => $settings['tablet_display_columns'],
            'tablet_scroll_columns' => $settings['tablet_scroll_columns'],
            'tablet_gutter' => $settings['tablet_gutter'],
            'mobile_width' => $settings['mobile_width'],
            'mobile_display_columns' => $settings['mobile_display_columns'],
            'mobile_scroll_columns' => $settings['mobile_scroll_columns'],
            'mobile_gutter' => $settings['mobile_gutter'],
        ];

        $carousel_settings = array_merge($carousel_settings, $responsive_settings);

        // Use the processed post selector query to find posts.
        $query_args = pt_build_query_args($settings);
        
        $loop = new \WP_Query($query_args);

        // Loop through the posts and do something with them.
        if ($loop->have_posts()) : ?>
            <div id="pt-posts-carousel-<?php echo uniqid(); ?>"
                 class="pt-posts-carousel pt-container"
                 data-settings='<?php echo wp_json_encode($carousel_settings); ?>'>
                <?php $taxonomies[] = $settings['taxonomy_chosen']; ?>
                <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                    <div data-id="id-<?php the_ID(); ?>" class="pt-posts-carousel-item">

                        <?php if( 'style-1' === $settings['pt_carousel_style'] ){ ?>
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
                                    <div class="pt-entry-text-wrap <?php echo($thumbnail_exists ? '' : ' nothumbnail'); ?>">
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
                                                <div>
                                                    <?php echo esc_html( pt_get_excerpt_by_id_lite( get_the_ID(), $settings['excerpt_length'] ) ); ?>
                                                </div>
                                                <div class="pt-post-carousel">
                                                    <a class="pt-post-carousel-link" href="<?php echo get_permalink(); ?>"><?php echo $settings['pt_excerpt_readmore']; ?>
                                                    </a>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </article>

                        <?php }elseif( 'style-2' === $settings['pt_carousel_style'] ){ ?> 
                            
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <?php if ($thumbnail_exists = has_post_thumbnail()): ?>
                                    <div class="pt-project-image style-2">
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
                                    <div class="pt-entry-text-wrap style-2 <?php echo($thumbnail_exists ? '' : ' nothumbnail'); ?> ">
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
                                               <div>
                                                    <?php echo esc_html( pt_get_excerpt_by_id_lite( get_the_ID(), $settings['excerpt_length'] ) ); ?>
                                                </div>
                                                <div class="pt-post-carousel">
                                                    <a class="pt-post-carousel-link" href="<?php echo get_permalink(); ?>"><?php echo $settings['pt_excerpt_readmore']; ?>
                                                    </a>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </article>
                        <?php }elseif( 'style-3' === $settings['pt_carousel_style'] ){ ?> 
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <?php if ($thumbnail_exists = has_post_thumbnail()): ?>
                                    <div class="pt-project-image style-3">
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
                                    <div class="pt-entry-text-wrap style-3 <?php echo($thumbnail_exists ? '' : ' nothumbnail'); ?> ">
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
                                                <div>
                                                    <?php echo esc_html( pt_get_excerpt_by_id_lite( get_the_ID(), $settings['excerpt_length'] ) ); ?>
                                                </div>
                                                <div class="pt-post-carousel">
                                                    <a class="pt-post-carousel-link" href="<?php echo get_permalink(); ?>"><?php echo $settings['pt_excerpt_readmore']; ?>
                                                    </a>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </article>
                        <?php }elseif( 'style-4' === $settings['pt_carousel_style'] ){ ?> 
                             <article id="post-<?php the_ID(); ?>" <?php post_class('style-4'); ?>>
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
                                    <div class="pt-entry-text-wrap <?php echo($thumbnail_exists ? '' : ' nothumbnail'); ?> ">
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
                                                <div>
                                                    <?php echo esc_html( pt_get_excerpt_by_id_lite( get_the_ID(), $settings['excerpt_length'] ) ); ?>
                                                </div>
                                                <div class="pt-post-carousel">
                                                    <a class="pt-post-carousel-link" href="<?php echo get_permalink(); ?>"><?php echo $settings['pt_excerpt_readmore']; ?>
                                                    </a>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </article>
                        <?php } ?>


                        <!-- .hentry -->
                    </div><!--.pt-posts-carousel-item -->

                <?php endwhile; ?>

                <?php wp_reset_postdata(); ?>

            </div> <!-- .pt-posts-carousel -->

        <?php endif; ?>

        <?php
    }

    protected function content_template() {
    }
}
Plugin::instance()->widgets_manager->register_widget_type( new Pt_Elementor_Post_Carousel() );
