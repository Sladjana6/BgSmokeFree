<?php
/**
 * class-pt-elementor-team-members.php
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
class Pt_Elementor_Team_Members extends Widget_Base {

	/**
	 * Define our Get Name Function settings.
	 */
	public function get_name() {
		return 'pt-team-members';
	}
	/**
	 * Define our get title settings.
	 */
	public function get_title() {
		return __( 'Team Members', 'elementor' );
	}
	/**
	 * Define our get icon settings.
	 */
	public function get_icon() {
		//return 'eicon-inner-section';
		return 'eicon-person';
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
            'section_team',
            [
                'label' => __('Team', 'elementor'),
            ]
        );

        $this->add_control(

            'style', [
                'type' => Controls_Manager::SELECT,
                'label' => __('Choose Team Style', 'elementor'),
                'default' => 'style1',
                'options' => [
                    'style1' => __('Style 1', 'elementor'),
                    'style2' => __('Style 2', 'elementor'),
					'style3' => __('Style 3', 'elementor'),
					'style4' => __('Style 4', 'elementor'),
                ],
                'prefix_class' => 'pt-team-members-',
            ]
        );

        $this->add_control(
            'per_line',
            [
                'label' => __('Columns per row', 'elementor'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 6,
                'step' => 1,
                'default' => 3,
                'condition' => [
                    'style' => 'style1',
                ],
            ]
        );


        $this->add_control(
            'team_members',
            [
                'label' => __('Team Members', 'elementor'),
                'type' => Controls_Manager::REPEATER,
                'separator' => 'before',
                'default' => [
                    [
                        'member_name' => __('Team Member #1', 'elementor'),
                        'member_position' => __('CEO', 'elementor'),
                        'member_details' => __('I am member details. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'elementor'),
                    ],
                    [
                        'member_name' => __('Team Member #2', 'elementor'),
                        'member_position' => __('Lead Developer', 'elementor'),
                        'member_details' => __('I am member details. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'elementor'),
                    ],
                    [
                        'member_name' => __('Team Member #3', 'elementor'),
                        'member_position' => __('Finance Manager', 'livemesh-el-addons'),
                        'member_details' => __('I am member details. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'elementor'),
                    ],
                ],
                'fields' => [
                    [
                        'name' => 'member_name',
                        'label' => __('Member Name', 'elementor'),
                        'type' => Controls_Manager::TEXT,
                    ],
                    [
                        'name' => 'member_position',
                        'label' => __('Position', 'elementor'),
                        'type' => Controls_Manager::TEXT,
                    ],

                    [
                        'name' => 'member_image',
                        'label' => __('Team Member Image', 'elementor'),
                        'type' => Controls_Manager::MEDIA,
                        'default' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'label_block' => true,
                    ],
                    [
                        'name' => 'member_details',
                        'label' => __('Team Member details', 'elementor'),
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => __('Details about team member', 'elementor'),
                        'description' => __('Provide a short writeup for the team member', 'livemesh-el-addons'),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'social_profile',
                        'label' => __('Social Profile', 'elementor'),
                        'type' => Controls_Manager::HEADING,
                    ],
                    [
                        'type' => Controls_Manager::TEXT,
                        'name' => 'facebook_url',
                        'label' => __('Facebook Page URL', 'elementor'),
                        'description' => __('URL of the Facebook page of the team member.', 'elementor'),
                    ],

                    [
                        'type' => Controls_Manager::TEXT,
                        'name' => 'twitter_url',
                        'label' => __('Twitter Profile URL', 'elementor'),
                        'description' => __('URL of the Twitter page of the team member.', 'elementor'),
					],
                    [
                        'type' => Controls_Manager::TEXT,
                        'name' => 'google_plus_url',
                        'label' => __('GooglePlus Page URL', 'elementor'),
                        'description' => __('URL of the Google Plus page of the team member.', 'elementor'),
                    ],

                    
                    
                ],
                'title_field' => '{{{ member_name }}}',
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'section_team_profiles_style',
            [
                'label' => __('General', 'elementor'),
                'tab' => Controls_Manager::TAB_STYLE,
                'show_label' => false,
            ]
        );
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => __( 'Border', 'elementor' ),
				'selector' => '{{WRAPPER}} .pt-team-member-wrapper.pt-fourcol',
				'condition' => [
                    'style' => ['style3'],
					'style' => ['style4'],
                ],
			]
		);
		$this->add_responsive_control(
			'image_border_radius',
			[
				'label' => __( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .pt-team-member-wrapper.pt-fourcol' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
                    'style' => ['style3'],
					'style' => ['style4'],
                ],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'exclude' => [
					'box_shadow_position',
				],
				'selector' => '{{WRAPPER}} .pt-team-member-wrapper.pt-fourcol',
				'condition' => [
                    'style' => ['style3'],
					'style' => ['style4'],
                ],
			]
		);

        $this->add_responsive_control(
            'team_member_spacing',
            [
                'label' => __('Team Member Spacing', 'elementor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .pt-team-members .pt-team-member-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'isLinked' => false,
                'condition' => [
                    'style' => ['style2'],
                ],
            ]
        );

        $this->add_responsive_control(
            'thumbnail_hover_brightness',
            [
                'label' => __('Thumbnail Hover Brightness (%)', 'elementor'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 50,
                ],
                'range' => [
                    'px' => [
                        'max' => 100,
                        'min' => 1,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}  .pt-image-wrapper:hover' => '-webkit-filter: brightness({{SIZE}}%);-moz-filter: brightness({{SIZE}}%);-ms-filter: brightness({{SIZE}}%); filter: brightness({{SIZE}}%);',
                ],
            ]
        );


        $this->add_control(
            'thumbnail_border_radius',
            [
                'label' => __('Thumbnail Border Radius', 'elementor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .pt-team-members .pt-team-member .pt-image-wrapper img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_team_member_title',
            [
                'label' => __('Member Title', 'elementor'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label' => __('Title HTML Tag', 'elementor'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'h1' => __('H1', 'elementor'),
                    'h2' => __('H2', 'elementor'),
                    'h3' => __('H3', 'elementor'),
                    'h4' => __('H4', 'elementor'),
                    'h5' => __('H5', 'elementor'),
                    'h6' => __('H6', 'elementor'),
                    'div' => __('div', 'elementor'),
                ],
                'default' => 'h3',
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Color', 'elementor'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pt-team-members .pt-team-member .pt-team-member-text .pt-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .pt-team-members .pt-team-member .pt-team-member-text .pt-title',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_team_member_position',
            [
                'label' => __('Member Position', 'elementor'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'position_color',
            [
                'label' => __('Color', 'elementor'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pt-team-members .pt-team-member .pt-team-member-text .pt-team-member-position' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'position_typography',
                'selector' => '{{WRAPPER}} .pt-team-members .pt-team-member .pt-team-member-text .pt-team-member-position',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_team_member_details',
            [
                'label' => __('Member Details', 'elementor'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'text_color',
            [
                'label' => __('Color', 'elementor'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pt-team-members .pt-team-member .pt-team-member-details' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'text_typography',
                'selector' => '{{WRAPPER}} .pt-team-members .pt-team-member .pt-team-member-details',
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'section_social_icon_styling',
            [
                'label' => __('Social Icons', 'elementor'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'social_icon_size',
            [
                'label' => __('Icon size in pixels', 'elementor'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em' ],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 128,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .pt-team-members .pt-team-member .pt-social-list .pt-social-list-item i' => 'font-size: {{SIZE}}{{UNIT}};'
                ],
            ]
        );

        $this->add_control(
            'social_icon_spacing',
            [
                'label' => __('Spacing', 'elementor'),
                'description' => __('Space between icons.', 'elementor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'default' => [
                    'top' => 0,
                    'right' => 15,
                    'bottom' => 0,
                    'left' => 0,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .pt-team-members .pt-team-member .pt-social-list .pt-social-list-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'isLinked' => false
            ]
        );

        $this->add_control(
            'social_icon_color',
            [
                'label' => __('Icon Color', 'elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .pt-team-members .pt-team-member .pt-social-list .pt-social-list-item i' => 'color: {{VALUE}};',
                ],
            ]
        );
		$this->add_control(
			'icon_primary_color',
			[
				'label' => __( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-team-members .pt-team-member .pt-social-list .pt-social-list-item i' => 'background-color: {{VALUE}};',
				],
				'condition' => [
                    'style' => ['style3'],
					'style' => ['style4'],
                ],
			]
		);
		$this->add_control(
			'icon_border_radius',
			[
				'label' => __( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .pt-team-members .pt-team-member .pt-social-list .pt-social-list-item i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
                    'style' => ['style3'],
					'style' => ['style4'],
                ],
			]
		);

        $this->add_control(
            'social_icon_hover_color',
            [
                'label' => __('Icon Hover Color', 'elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .pt-team-members .pt-team-member .pt-social-list .pt-social-list-item i:hover' => 'color: {{VALUE}};',
                ],
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

        <?php $column_style = ''; ?>

        <?php $container_style = 'pt-container'; ?>

        <?php if ($settings['style'] == 'style1'): ?>

            <?php $column_style = pt_get_column_class(intval($settings['per_line'])); ?>

            <?php $container_style = 'pt-grid-container'; ?>

        <?php endif; ?>
		<?php if ($settings['style'] == 'style3' || $settings['style'] == 'style4' ): ?>

            <?php $column_style = pt_get_column_class(intval($settings['per_line'])); ?>

            <?php $container_style = 'pt-grid-container'; ?>

        <?php endif; ?>

        <div class="pt-team-members pt-<?php echo $settings['style']; ?> <?php echo $container_style; ?>">

            <?php foreach ($settings['team_members'] as $team_member): ?>
				<?php if ($settings['style'] == 'style3' || $settings['style'] == 'style4'){ ?>
                <div class="pt-team-member-wrapper <?php echo $column_style; ?>" style="padding:20px;">
				<?php }else { ?>
				<div class="pt-team-member-wrapper <?php echo $column_style; ?>">
				<?php } ?>
                    <div class="pt-team-member">
					
						 <?php if ($settings['style'] == 'style4'): ?>
						 <div style="text-align:center">
						 <<?php echo $settings['title_tag']; ?> class="pt-title"><?php echo esc_html($team_member['member_name']) ?></<?php echo $settings['title_tag']; ?>>
							<div class="pt-team-member-position">

                                <?php echo do_shortcode($team_member['member_position']) ?>

                            </div>
							</div>
						 
						  <?php endif; ?>
						 
                        <div class="pt-image-wrapper">

                            <?php $member_image = $team_member['member_image']; ?>

                            <?php if (!empty($member_image)): ?>

                                <?php echo wp_get_attachment_image($member_image['id'], 'full', false, array('class' => 'pt-image full')); ?>

                            <?php endif; ?>
							 <?php if ($settings['style'] == 'style1'): ?>

                                <?php $this->social_profile($team_member) ?>

                            <?php endif; ?>

                        </div>

                        <div class="pt-team-member-text">
							<?php if ($settings['style'] == 'style4'){ ?>
							
							<?php }else { ?>
                            <<?php echo $settings['title_tag']; ?> class="pt-title"><?php echo esc_html($team_member['member_name']) ?></<?php echo $settings['title_tag']; ?>>
							
                            <div class="pt-team-member-position">

                                <?php echo do_shortcode($team_member['member_position']) ?>

                            </div>
							<?php } ?>

                            <div class="pt-team-member-details">

                                <?php echo do_shortcode($team_member['member_details']) ?>

                            </div>

                            <?php if ($settings['style'] == 'style2'): ?>

                                <?php $this->social_profile($team_member) ?>

                            <?php endif; ?>
							 <?php if ($settings['style'] == 'style3'): ?>

                                <?php $this->social_profile($team_member) ?>

                            <?php endif; ?>
							 <?php if ($settings['style'] == 'style4'): ?>
								<div style="text-align:center;margin: 0 auto;">
                                <?php $this->social_profile($team_member) ?>
								</div>
                            <?php endif; ?>

                        </div>

                    </div>

                </div>

                <?php

            endforeach;

            ?>

        </div>

        <div class="pt-clear"></div>

        <?php
    }
    
    private function social_profile($team_member) {
        ?>

        <div class="pt-social-wrap">

            <div class="pt-social-list">

                <?php

                $email = $team_member['member_email'];
                $facebook_url = $team_member['facebook_url'];
                $twitter_url = $team_member['twitter_url'];
                $linkedin_url = $team_member['linkedin_url'];
                $dribbble_url = $team_member['dribbble_url'];
                $pinterest_url = $team_member['pinterest_url'];
                $googleplus_url = $team_member['google_plus_url'];
                $instagram_url = $team_member['instagram_url'];
               
                if ($facebook_url)
                    echo '<div class="pt-social-list-item"><a class="pt-facebook" href="' . $facebook_url . '" target="_blank" title="' . __("Follow on Facebook", 'livemesh-el-addons') . '"><i class="pt-icon-facebook"></i></a></div>';
                if ($twitter_url)
                    echo '<div class="pt-social-list-item"><a class="pt-twitter" href="' . $twitter_url . '" target="_blank" title="' . __("Subscribe to Twitter Feed", 'livemesh-el-addons') . '"><i class="pt-icon-twitter"></i></a></div>';
                if ($googleplus_url)
                    echo '<div class="pt-social-list-item"><a class="pt-googleplus" href="' . $googleplus_url . '" target="_blank" title="' . __("Follow on Google Plus", 'livemesh-el-addons') . '"><i class="pt-icon-googleplus"></i></a></div>';

                ?>

            </div>

        </div>
        <?php
    }

    protected function content_template() {
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new Pt_Elementor_Team_Members() );
