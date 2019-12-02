<?php
/**
 * Class Pt Elementor Facebook-Feed.php
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
class Pt_Elementor_Facebook_Feed extends Widget_Base {

	/**
	 * Define our get name settings.
	 */
	public function get_name() {
		return 'Pt-facebook-feed';
	}
	/**
	 * Define our get title settings.
	 */
	public function get_title() {
		return __( 'Facebook Feed', 'elementor' );
	}
	/**
	 * Define our get icon settings.
	 */
	public function get_icon() {
		return 'eicon-fb-embed';
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
  			'eael_section_facebook_feed_acc_settings',
  			[
  				'label' => esc_html__( 'Account Settings', 'elementor' )
  			]
  		);

		$this->add_control(
			'eael_facebook_feed_ac_name',
			[
				'label' => esc_html__( 'Account Name', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => false,
				'default' => '@Codetic',
				'description' => esc_html__( 'Use @ sign with your account name.', 'elementor' ),

			]
		);

		$this->add_control(
			'eael_facebook_feed_app_id',
			[
				'label' => esc_html__( 'App ID', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => false,
				'default' => '138195606893948',
				'description' => '<a href="https://developers.facebook.com/apps/" target="_blank">Get App ID.</a> Create or select an app and grab the App ID',
			]
		);

		$this->add_control(
			'eael_facebook_feed_app_secret',
			[
				'label' => esc_html__( 'App Secret', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => false,
				'default' => 'e14ec8e0c0d4918d0133d2cf2aca2de9',
				'description' => '<a href="https://developers.facebook.com/apps/" target="_blank">Get App Secret.</a> Create or select an app and grab the App ID',
			]
		);

  		$this->end_controls_section();

		$this->start_controls_section(
  			'eael_section_facebook_feed_settings',
  			[
  				'label' => esc_html__( 'Layout Settings', 'elementor' )
  			]
  		);

		$this->add_control(
			'eael_facebook_feed_type',
			[
				'label' => esc_html__( 'Content Layout', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'masonry',
				'options' => [
					'list' => esc_html__( 'List', 'elementor' ),
					'masonry' => esc_html__( 'Masonry', 'elementor' ),
				],
			]
		);

		$this->add_control(
            'eael_facebook_feed_type_col_type',
            [
                'label' => __( 'Column Grid', 'elementor' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'col-2' => '2 Columns',
                    'col-3' => '3 Columns',
                    'col-4' => '4 Columns',
                ],
                'default' => 'col-3',
                'prefix_class' => 'eael-social-feed-masonry-',
                'condition' => [
                	'eael_facebook_feed_type' => 'masonry'
                ],
            ]
        );

		$this->add_control(
			'eael_facebook_feed_content_length',
			[
				'label' => esc_html__( 'Content Length', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => false,
				'default' => '400'
			]
		);

		$this->add_control(
			'eael_facebook_feed_post_limit',
			[
				'label' => esc_html__( 'Post Limit', 'elementor' ),
				'type' => Controls_Manager::NUMBER,
				'label_block' => false,
				'default' => 10
			]
		);

		$this->add_control(
			'eael_facebook_feed_media',
			[
				'label' => esc_html__( 'Show Media Elements', 'elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'yes', 'elementor' ),
				'label_off' => __( 'no', 'elementor' ),
				'default' => 'true',
				'return_value' => 'true',
			]
		);

  		$this->end_controls_section();

  		$this->start_controls_section(
  			'eael_section_facebook_feed_card_settings',
  			[
  				'label' => esc_html__( 'Card Settings', 'elementor' ),
  			]
  		);

  		$this->add_control(
			'eael_facebook_feed_show_avatar',
			[
				'label' => esc_html__( 'Show Avatar', 'elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'yes', 'elementor' ),
				'label_off' => __( 'no', 'elementor' ),
				'default' => 'true',
				'return_value' => 'true',
			]
		);

		$this->add_control(
            'eael_facebook_feed_avatar_style',
            [
                'label' => __( 'Avatar Style', 'elementor' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'circle' => 'Circle',
                    'square' => 'Square'
                ],
                'default' => 'circle',
                'prefix_class' => 'eael-social-feed-avatar-',
                'condition' => [
                	'eael_facebook_feed_show_avatar' => 'true'
                ],
            ]
        );

		$this->add_control(
			'eael_facebook_feed_show_date',
			[
				'label' => esc_html__( 'Show Date', 'elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'yes', 'elementor' ),
				'label_off' => __( 'no', 'elementor' ),
				'default' => 'true',
				'return_value' => 'true',
			]
		);

		$this->add_control(
			'eael_facebook_feed_show_read_more',
			[
				'label' => esc_html__( 'Show Read More', 'elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'yes', 'elementor' ),
				'label_off' => __( 'no', 'elementor' ),
				'default' => 'true',
				'return_value' => 'true',
			]
		);
		$this->add_control(
			'eael_facebook_feed_show_icon',
			[
				'label' => esc_html__( 'Show Icon', 'elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'yes', 'elementor' ),
				'label_off' => __( 'no', 'elementor' ),
				'default' => 'true',
				'return_value' => 'true',
			]
		);

  		$this->end_controls_section();

  		/**
		 * -------------------------------------------
		 * Tab Style (Facebook Feed Title Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'eael_section_facebook_feed_style_settings',
			[
				'label' => esc_html__( 'General Style', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'eael_facebook_feed_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .eael-facebook-feed-wrapper' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'eael_facebook_feed_container_padding',
			[
				'label' => esc_html__( 'Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .eael-facebook-feed-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_responsive_control(
			'eael_facebook_feed_container_margin',
			[
				'label' => esc_html__( 'Margin', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .eael-facebook-feed-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'eael_facebook_feed_border',
				'label' => esc_html__( 'Border', 'elementor' ),
				'selector' => '{{WRAPPER}} .eael-facebook-feed-wrapper',
			]
		);

		$this->add_control(
			'eael_facebook_feed_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .eael-facebook-feed-wrapper' => 'border-radius: {{SIZE}}px;',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'eael_facebook_feed_shadow',
				'selector' => '{{WRAPPER}} .eael-facebook-feed-wrapper',
			]
		);

  		$this->end_controls_section();

  		/**
		 * -------------------------------------------
		 * Tab Style (Facebook Feed Card Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'eael_section_facebook_feed_card_style_settings',
			[
				'label' => esc_html__( 'Card Style', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'eael_facebook_feed_card_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .eael-social-feed-element .eael-content' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'eael_facebook_feed_card_container_padding',
			[
				'label' => esc_html__( 'Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .eael-social-feed-element .eael-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_responsive_control(
			'eael_facebook_feed_card_container_margin',
			[
				'label' => esc_html__( 'Margin', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .eael-social-feed-element .eael-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'eael_facebook_feed_card_border',
				'label' => esc_html__( 'Border', 'elementor' ),
				'selector' => '{{WRAPPER}} .eael-social-feed-element .eael-content',
			]
		);

		$this->add_control(
			'eael_facebook_feed_card_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .eael-social-feed-element .eael-content' => 'border-radius: {{SIZE}}px;',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'eael_facebook_feed_card_shadow',
				'selector' => '{{WRAPPER}} .eael-social-feed-element .eael-content',
			]
		);

  		$this->end_controls_section();

  		/**
		 * -------------------------------------------
		 * Tab Style (Twitter Feed Typography Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'eael_section_facebook_feed_card_typo_settings',
			[
				'label' => esc_html__( 'Color &amp; Typography', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'eael_facebook_feed_title_heading',
			[
				'label' => esc_html__( 'Title Style', 'elementor' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'eael_facebook_feed_title_color',
			[
				'label' => esc_html__( 'Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .eael-social-feed-element .author-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'eael_facebook_feed_title_typography',
				'selector' => '{{WRAPPER}} .eael-social-feed-element .author-title',
			]
		);
		// Content Style
		$this->add_control(
			'eael_facebook_feed_content_heading',
			[
				'label' => esc_html__( 'Content Style', 'elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'eael_facebook_feed_content_color',
			[
				'label' => esc_html__( 'Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .eael-social-feed-element .social-feed-text' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'eael_facebook_feed_content_typography',
				'selector' => '{{WRAPPER}} .eael-social-feed-element .social-feed-text',
			]
		);

		// Content Link Style
		$this->add_control(
			'eael_facebook_feed_content_link_heading',
			[
				'label' => esc_html__( 'Link Style', 'elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'eael_facebook_feed_content_link_color',
			[
				'label' => esc_html__( 'Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .eael-social-feed-element .text-wrapper a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'eael_facebook_feed_content_link_hover_color',
			[
				'label' => esc_html__( 'Hover Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .eael-social-feed-element .text-wrapper a:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'eael_facebook_feed_content_link_typography',
				'selector' => '{{WRAPPER}} .eael-social-feed-element .text-wrapper a',
			]
		);

  		$this->end_controls_section();

  		/**
		 * -------------------------------------------
		 * Tab Style (Facebook Feed Preloader Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'eael_section_facebook_feed_card_preloader_settings',
			[
				'label' => esc_html__( 'Preloader Style', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'eael_facebook_feed_preloader_size',
			[
				'label' => esc_html__( 'Size', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 30,
				],
				'range' => [
					'px' => [
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .eael-loading-feed .loader' => 'width: {{SIZE}}px; height: {{SIZE}}px;',
				],
			]
		);

		$this->add_control(
			'eael_section_facebook_feed_preloader_color',
			[
				'label' => esc_html__( 'Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#3498db',
				'selectors' => [
					'{{WRAPPER}} .eael-loading-feed .loader' => 'border-top-color: {{VALUE}};',
				],
			]
		);


  		$this->end_controls_section();
		
	}
	/**
	 * Define our Rendor Display settings.
	 */
	protected function render() {
		
		$settings = $this->get_settings();

      	if( 'list' == $settings['eael_facebook_feed_type'] ) {
      		$feed_class = 'list-view';
      	}elseif( 'masonry' == $settings['eael_facebook_feed_type'] ) {
      		$feed_class = 'masonry-view';
      	}


    	// Get the specific template
    	if( 'masonry' == $settings['eael_facebook_feed_type'] ) {
    		$template = 'masonry.php';
    	}else {
    		$template = 'list.php';
    	}


	?>
	<div class="eael-facebook-feed-wrapper">
		<div class="eael-facebook-feed-container <?php echo esc_attr( $feed_class ); ?>"></div>
		<div class="eael-loading-feed"><div class="loader"></div></div>
	</div>
	<script>
    jQuery( document ).ready( function($) {
    	var loadingFeed = $( '.eael-loading-feed' );
    	/**
    	 * Facebook Feed Init
    	 */
    	function eael_facebook_feeds() {

    		$( '.eael-facebook-feed-container' ).socialfeed({
			    facebook:{
			       accounts: ['<?php echo $settings['eael_facebook_feed_ac_name']; ?>'],
			       limit: <?php echo $settings['eael_facebook_feed_post_limit']; ?>,
			       access_token: '<?php echo $settings['eael_facebook_feed_app_id']; ?>|<?php echo $settings['eael_facebook_feed_app_secret']; ?>'
			    },

	            // GENERAL SETTINGS
	            length: <?php if( !empty( $settings['eael_facebook_feed_content_length'] ) ) : echo $settings['eael_facebook_feed_content_length']; else: echo '400'; endif; ?>,
	            show_media: <?php if( !empty( $settings['eael_facebook_feed_media'] ) ) : echo $settings['eael_facebook_feed_media']; else: echo 'false'; endif; ?>,
	            template: '<?php echo plugins_url( '/', __FILE__ ) . 'templates/'.$template;  ?>',
	        });
    	}
		/**
		 * Facebook Feed Masonry View
		 */
		function eael_facebook_feed_masonry() {
			$('.eael-facebook-feed-container').masonry({
			    itemSelector: '.eael-social-feed-element',
			    percentPosition: true,
			    columnWidth: '.eael-social-feed-element'
			});
		}

		$.ajax({
		   	url: eael_facebook_feeds(),
		   	beforeSend: function() {
		   		loadingFeed.addClass( 'show-loading' );
		   	},
		   	success: function() {
				<?php  if( 'masonry' == $settings['eael_facebook_feed_type'] ) : ?>
					eael_facebook_feed_masonry();
				<?php endif; ?>
				loadingFeed.removeClass( 'show-loading' );
			},
			error: function() {
				console.log('error loading');
			}
		});

    });

	</script>

	<?php
		echo '<style>';
		// Show Avatar
		if( $settings['eael_facebook_feed_show_avatar'] == 'true' ) {
			echo '.eael-social-feed-element .auth-img { display: block; }';
		}else {
			echo '.eael-social-feed-element .auth-img { display: none; }';
		}
		// Show Date
		if( $settings['eael_facebook_feed_show_date'] == 'true' ) {
			echo '.eael-social-feed-element .social-feed-date { display: block;  }';
		}else {
			echo '.eael-social-feed-element .social-feed-date { display: none;  }';
		}
		//  Show Read More
		 if( $settings['eael_facebook_feed_show_read_more'] == 'true' ) {
		 	echo '.eael-social-feed-element .read-more-link { display: block }';
		 }else {
		 	echo '.eael-social-feed-element .read-more-link { display: none !important; }';
		 }

		 //  Show Icon
		 if( $settings['eael_facebook_feed_show_icon'] == 'true' ) {
		 	echo '.eael-social-feed-element .social-feed-icon { display: inline-block }';
		 }else {
		 	echo '.eael-social-feed-element .social-feed-icon { display: none !important; }';
		 }

		// Masonry Grid
		if( $settings['eael_facebook_feed_type_col_type'] == 'col-2' ) {
			$width = '50%';
		}else if( $settings['eael_facebook_feed_type_col_type'] == 'col-3' ) {
			$width = '33.33%';
		}else if( $settings['eael_facebook_feed_type_col_type'] == 'col-4' ) {
			$width = '25%';
			echo '.eael-social-feed-element .social-feed-date { text-align: left; width: 100%; margin-bottom: 8px;}';
		}
		echo '.eael-facebook-feed-container.masonry-view .eael-social-feed-element { width: '.$width.' }
		.eael-social-feed-element .media-object { width: 30px; }';

		echo '</style>';
		
	}
	/**
	 * Define our Content template settings.
	 */
	protected function content_template() {''

		?>


		<?php
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new Pt_Elementor_Facebook_Feed() );
