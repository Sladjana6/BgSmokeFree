<?php
/**
 * class-pt-elementor-product-grid.php
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
class Pt_Elementor_Product_Grid extends Widget_Base {

	/**
	 * Define our Get Name Function settings.
	 */
	public function get_name() {
		return 'pt-product-grid';
	}
	/**
	 * Define our get title settings.
	 */
	public function get_title() {
		return __( 'Product Grid', 'elementor' );
	}
	/**
	 * Define our get icon settings.
	 */
	public function get_icon() {
		//return 'eicon-inner-section';
		return 'eicon-woocommerce';
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
  			'pt_section_product_grid_settings',
  			[
  				'label' => esc_html__( 'Product Settings', 'elementor' )
  			]
  		);

		$this->add_control(
			'pt_product_grid_product_filter',
			[
				'label' => esc_html__( 'Filter By', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'recent-products',
				'options' => [
					'recent-products' => esc_html__( 'Recent Products', 'elementor' ),
					'featured-products' => esc_html__( 'Featured Products', 'elementor' ),
					'best-selling-products' => esc_html__( 'Best Selling Products', 'essential-addons-elementor' ),
					'sale-products' => esc_html__( 'Sale Products', 'elementor' ),
					'top-products' => esc_html__( 'Top Rated Products', 'elementor' ),
				],
			]
		);

		$this->add_control(
			'pt_product_grid_column',
			[
				'label' => esc_html__( 'Columns', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => '4',
				'options' => [
					'1' => esc_html__( '1', 'elementor' ),
					'2' => esc_html__( '2', 'elementor' ),
					'3' => esc_html__( '3', 'elementor' ),
					'4' => esc_html__( '4', 'elementor' ),
					'5' => esc_html__( '5', 'elementor' ),
					'6' => esc_html__( '6', 'elementor' ),
				],
			]
		);

		$this->add_control(
		  'pt_product_grid_products_count',
		  [
		     'label'   => __( 'Products Count', 'elementor' ),
		     'type'    => Controls_Manager::NUMBER,
		     'default' => 4,
		     'min'     => 1,
		     'max'     => 1000,
		     'step'    => 1,
		  ]
		);


		$this->add_control(
			'pt_product_grid_categories',
			[
				'label' => esc_html__( 'Product Categories', 'elementor' ),
				'type' => Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple' => true,
				'options' => pt_woocommerce_product_categories(),
			]
		);

		// $this->add_control(
		// 	'pt_product_grid_style_preset',
		// 	[
		// 		'label' => esc_html__( 'Style Preset', 'essential-addons-elementor' ),
		// 		'type' => Controls_Manager::SELECT,
		// 		'default' => 'pt-product-simple',
		// 		'options' => [
		// 			'pt-product-simple' => esc_html__( 'Simple Style', 'essential-addons-elementor' ),
		// 			'pt-product-reveal' => esc_html__( 'Reveal Style', 'essential-addons-elementor' ),
		// 			'pt-product-overlay' => esc_html__( 'Overlay Style', 'essential-addons-elementor' ),
		// 			'eacs-product-default' => esc_html__( 'None (Use Theme Style)', 'essential-addons-elementor' ),
		// 		],
		// 	]
		// );

		$this->add_control(
			'pt_product_grid_rating',
			[
				'label' => esc_html__( 'Show Product Rating?', 'elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->end_controls_section();
       
		
		$this->start_controls_section(
			'pt_product_grid_styles',
			[
				'label' => esc_html__( 'Products Styles', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'pt_product_grid_background_color',
			[
				'label' => esc_html__( 'Content Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .pt-product-grid .woocommerce ul.products li.product' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'pt_peoduct_grid_border',
				'selector' => '{{WRAPPER}} .pt-product-grid .woocommerce ul.products li.product',
			]
		);
		
		$this->add_control(
			'pt_peoduct_grid_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .pt-product-grid .woocommerce ul.products li.product' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
				],
			]
		);
				
		
		$this->end_controls_section();


		$this->start_controls_section(
			'pt_section_product_grid_typography',
			[
				'label' => esc_html__( 'Color &amp; Typography', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'pt_product_grid_product_title_heading',
			[
				'label' => __( 'Product Title', 'elementor' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'pt_product_grid_product_title_color',
			[
				'label' => esc_html__( 'Product Title Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#272727',
				'selectors' => [
					'{{WRAPPER}} .pt-product-grid .woocommerce ul.products li.product .woocommerce-loop-product__title' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'pt_product_grid_product_title_typography',
				'selector' => '{{WRAPPER}} .pt-product-grid .woocommerce ul.products li.product .woocommerce-loop-product__title',
			]
		);

		$this->add_control(
			'pt_product_grid_product_price_heading',
			[
				'label' => __( 'Product Price', 'elementor' ),
				'type' => Controls_Manager::HEADING,
			]
		);


		$this->add_control(
			'pt_product_grid_product_price_color',
			[
				'label' => esc_html__( 'Product Price Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#272727',
				'selectors' => [
					'{{WRAPPER}} .pt-product-grid .woocommerce ul.products li.product .price' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'pt_product_grid_product_price_typography',
				'selector' => '{{WRAPPER}} .pt-product-grid .woocommerce ul.products li.product .price',
			]
		);

		$this->add_control(
			'pt_product_grid_product_rating_heading',
			[
				'label' => __( 'Star Rating', 'elementor' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'pt_product_grid_product_rating_color',
			[
				'label' => esc_html__( 'Rating Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#f2b01e',
				'selectors' => [
					'{{WRAPPER}} .pt-product-grid .woocommerce .star-rating::before' => 'color: {{VALUE}};',
					'{{WRAPPER}} .pt-product-grid .woocommerce .star-rating span::before' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'pt_product_grid_product_rating_typography',
				'selector' => '{{WRAPPER}} .pt-product-grid .woocommerce ul.products li.product .star-rating',
			]
		);

		$this->add_control(
			'pt_product_grid_sale_badge_heading',
			[
				'label' => __( 'Sale Badge', 'elementor' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'pt_product_grid_sale_badge_color',
			[
				'label' => esc_html__( 'Sale Badge Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .pt-product-grid:not(.pt-product-no-style) .onsale' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'pt_product_grid_sale_badge_background',
			[
				'label' => esc_html__( 'Sale Badge Background', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ff2a13',
				'selectors' => [
					'{{WRAPPER}} .pt-product-grid:not(.pt-product-no-style) .onsale' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'pt_product_grid_sale_badge_typography',
				'selector' => '{{WRAPPER}} .pt-product-grid:not(.pt-product-no-style) .onsale',
			]
		);


		$this->end_controls_section();

		
		$this->start_controls_section(
			'pt_section_product_grid_add_to_cart_styles',
			[
				'label' => esc_html__( 'Add to Cart Button Styles', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);


		$this->start_controls_tabs( 'pt_product_grid_add_to_cart_style_tabs' );

		$this->start_controls_tab( 'normal', [ 'label' => esc_html__( 'Normal', 'essential-addons-elementor' ) ] );

		$this->add_control(
			'pt_product_grid_add_to_cart_color',
			[
				'label' => esc_html__( 'Button Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#333',
				'selectors' => [
					'{{WRAPPER}} .pt-product-grid .woocommerce li.product .button.add_to_cart_button' => 'color: {{VALUE}};',
				],
			]
		);
				
		$this->add_control(
			'pt_product_grid_add_to_cart_background',
			[
				'label' => esc_html__( 'Button Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .pt-product-grid .woocommerce li.product .button.add_to_cart_button' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'pt_product_grid_add_to_cart_border',
				'selector' => '{{WRAPPER}} .pt-product-grid .woocommerce li.product .button.add_to_cart_button',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'pt_product_grid_add_to_cart_typography',
				'selector' => '{{WRAPPER}} .pt-product-grid .woocommerce li.product .button.add_to_cart_button',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab( 'pt_product_grid_add_to_cart_hover_styles', [ 'label' => esc_html__( 'Hover', 'essential-addons-elementor' ) ] );

		$this->add_control(
			'pt_product_grid_add_to_cart_hover_color',
			[
				'label' => esc_html__( 'Button Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#333',
				'selectors' => [
					'{{WRAPPER}} .pt-product-grid .woocommerce li.product .button.add_to_cart_button:hover' => 'color: {{VALUE}};',
				],
			]
		);
				
		$this->add_control(
			'pt_product_grid_add_to_cart_hover_background',
			[
				'label' => esc_html__( 'Button Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#f9f9f9',
				'selectors' => [
					'{{WRAPPER}} .pt-product-grid .woocommerce li.product .button.add_to_cart_button:hover' => 'background-color: {{VALUE}};',
				],
			]
		);
				
		$this->add_control(
			'pt_product_grid_add_to_cart_hover_border_color',
			[
				'label' => esc_html__( 'Border Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .pt-product-grid .woocommerce li.product .button.add_to_cart_button:hover' => 'border-color: {{VALUE}};',
				],
			]
		);


		$this->end_controls_tab();
		
		$this->end_controls_tabs();


		$this->end_controls_section();
		
	}

	/**
	 * Define our Render Display settings.
	 */
	protected function render( ) {
		
   	
		$settings = $this->get_settings();
			
		$product_count = $this->get_settings( 'pt_product_grid_products_count' );
		$columns = $this->get_settings( 'pt_product_grid_column' );
		$show_rating = ( ($settings['pt_product_grid_rating'] 	== 'yes') ? "show_rating" : "hide_rating" );
		$product_grid_classes = $show_rating;

		$get_product_categories = $settings['pt_product_grid_categories']; // get custom field value
		if($get_product_categories >= 1 ) { 
			$category_ids = implode(', ', $get_product_categories); 
		} else {
			$category_ids = '';
		}

	?>



<div id="pt-product-grid-<?php echo esc_attr($this->get_id()); ?>" class="pt-product-carousel pt-product-grid <?php echo $product_grid_classes; ?>">

	<?php if ( ($settings['pt_product_grid_product_filter']) == 'recent-products' ) : ?>

		<?php echo do_shortcode("[recent_products per_page=\"$product_count\" columns=\"$columns\" category=\"$category_ids\"]") ?>

	<?php elseif ( ($settings['pt_product_grid_product_filter']) == 'featured-products' ) : ?>

		<?php echo do_shortcode("[featured_products per_page=\"$product_count\" columns=\"$columns\" category=\"$category\"]") ?>

	<?php elseif ( ($settings['pt_product_grid_product_filter']) == 'best-selling-products' ) : ?>

		<?php echo do_shortcode("[best_selling_products per_page=\"$product_count\" columns=\"$columns\" category=\"$category\"]") ?>

	<?php elseif ( ($settings['pt_product_grid_product_filter']) == 'sale-products' ) : ?>

		<?php echo do_shortcode("[sale_products per_page=\"$product_count\" columns=\"$columns\" category=\"$category\"]") ?>

	<?php else: ?>

		<?php echo do_shortcode("[top_rated_products per_page=\"$product_count\" columns=\"$columns\" category=\"$category\"]") ?>

	<?php endif; ?>

    <div class="clearfix"></div>
</div>

	
	<?php
	
}
}

Plugin::instance()->widgets_manager->register_widget_type( new Pt_Elementor_Product_Grid() );
