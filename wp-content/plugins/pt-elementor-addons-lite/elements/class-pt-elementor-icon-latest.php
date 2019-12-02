<?php
namespace Elementor;
use Elementor\Modules\DynamicTags\Module as TagsModule;
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Pt_Elementor_Icon_Latest extends Widget_Base {
	
	public function get_name() {
		return 'pt_icon_latest';
	}
	/**
	 * Define our get_title settings.
	 */
	public function get_title() {
		return __( 'Icon effect', 'elementor' );
	}
	/**
	 * Define our get_icon settings.
	 */
	public function get_icon() {
		return 'eicon-text-field';
	}
	/**
	 * Define our get_categories settings.
	 */
	public function get_categories() {
		return [ 'pt-elementor-addons' ];
	}
	
	
	
	protected function _register_controls() {
		$this->start_controls_section(
			'section_image',
			[
				'label' => __( 'Image Box', 'elementor' ),
			]
		);
		$this->add_control(
			'tabs',
			[
				'label' => __( 'Tabs Items', 'elementor' ),
				'type' => Controls_Manager::REPEATER,
				
				'fields' => [
					[
						'name' => 'title',
						'label' => __( 'Title & Description', 'elementor' ),
						'type' => Controls_Manager::TEXT,
						'default' => '',
						'label_block' => 'true',
					],
					[
						'name' => 'item_description',
						'label' => __( 'Description', 'elementor' ),
						'type' => Controls_Manager::TEXTAREA,
						'default' => '',
						'label_block' => 'true',
					],
					[
						'name' => 'title_type',
						'label' => __( 'Icon/Image', 'elementor' ),
						'type' => Controls_Manager::SELECT,
						'default' => 'icon',
						'options' => [
							'icon' => __( 'Icon', 'elementor' ),
							'image' => __( 'Image', 'elementor' ),
						],
					],
					
					
					[
						'name' => 'icon',
						'label' => __( 'Icon', 'elementor' ),
						'type' => Controls_Manager::ICON,
						'default' => 'fa fa-star',
						'label_block' => 'true',
						'condition' => [
							'title_type' => [ 'icon' ],
						],
					],
					
					[
						'name' => 'title_image',
						'label' => __( 'Image', 'elementor' ),
						'type' => Controls_Manager::MEDIA,
						'default' => [],
						'condition' => [
							'title_type' => [ 'image'],
						],
					],
					[
						'name' => 'content_type',
						'label' => __( 'Content type', 'elementor' ),
						'type' => Controls_Manager::SELECT,
						'default' => 'image',
						'options' => [
							'image' => __( 'image', 'elementor' ),
							'video' => __( 'video', 'elementor' ),
						],
					],
					[
						'name' => 'Content_image',
						'label' => __( 'Image', 'elementor' ),
						'type' => Controls_Manager::MEDIA,
						'default' => [],
						'condition' => [
							'content_type' => [ 'image' ],
						],
					],
					[
						'name' => 'video_type',
						'label' => __( 'Video type', 'elementor' ),
						'type' => Controls_Manager::SELECT,
						'default' => 'youtube',
						'options' => [
							'youtube' => __( 'YouTube', 'elementor' ),
							'vimeo' => __( 'Vimeo', 'elementor' ),
						],
						'condition' => [
							'content_type' => [ 'video'], 
						],
					],
					[
						'name' => 'link',
						'label' => __( 'Link', 'elementor' ),
						'type' => Controls_Manager::TEXT,
						'dynamic' => [
							'active' => true,
							
						],
						'placeholder' => __( 'Enter your YouTube link', 'elementor' ),
						'default' => 'https://www.youtube.com/watch?v=9uOETcuFjbE',
						'label_block' => true,
						'condition' => [
							'video_type' => ['youtube'],
							'content_type' => [ 'video'],
						],
					],
					[
						'name' => 'vimeo_link',
						'label' => __( 'Link', 'elementor' ),
						'type' => Controls_Manager::TEXT,
						'dynamic' => [
							'active' => true,
							
						],
						'placeholder' => __( 'Enter your Vimeo link', 'elementor' ),
						'default' => 'https://vimeo.com/235215203',
						'label_block' => true,
						'condition' => [
							'video_type' => ['vimeo'],
							'content_type' => [ 'video'],
						],
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'section_style_icon',
			[
				'label' => __( 'Icon', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'primary_color',
			[
				'label' => __( 'Primary Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}}.elementor-widget-pt_icon_latest .pt-icn-icon' => 'color: {{VALUE}};',
				],
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
			]
		);
		
		$this->add_control(
			'size',
			[
				'label' => __( 'Size', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 6,
						'max' => 30,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .pt-icn-icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'section_title_style',
			[
				'label' => __( 'Title', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'text_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .pt-tit-title' => 'color: {{VALUE}};',
				],
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_3,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography',
				'selector' => '{{WRAPPER}} .pt-tit-title',
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'section_description_style',
			[
				'label' => __( 'Description', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'description_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .pt-de-desc' => 'color: {{VALUE}};',
				],
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_3,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'description_typography',
				'selector' => '{{WRAPPER}} .pt-de-desc',
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_active_style',
			[
				'label' => __( 'TAB', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'tab_background_color',
			[
				'label' => __( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tablinks.active' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .elementor-tabs-content-wrapper' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'position',
			[
				'label' => __( 'Image Position', 'elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'left',
				'options' => [
					'left' => [
						'title' => __( 'Left', 'elementor' ),
						'icon' => 'fa fa-align-left',
					],
					'right' => [
						'title' => __( 'Right', 'elementor' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'prefix_class' => 'elementor-position-',
				'toggle' => false,
			]
		);
		$this->end_controls_section();
	}
	
	
	protected function render() {
		//$tabs = $this->get_settings_for_display( 'tabs' );
		 $fields = $this->get_settings( 'tabs' );
			
			//echo '<pre>';
			//print_r($fields);
			//echo '</pre>';
		?>
		<div class="main">
		<div class="tab">
		<?php
				$i =1;
			foreach ( $fields as $item ) {
		?>
		
			  <button class="tablinks" onclick="openCity(event, '<?php echo $id = $item['_id']; ?>')" <?php if($i == 1	){ echo 'id="defaultOpen"';} ?>>
			 <?php if($item['title_type'] == 'icon'){?>
			  <div class="pt-icn-icon"><i class="<?php echo $aa = $item['icon']; ?>"></i></div>
			  <?php }else {?>
			  <div class="pt-icn-icon">
			  <img src=<?php echo $item[title_image][url]; ?> style="width:50px;height:50px;">
			  </div>
			  <?php }?>
			  <div class="pt-tit-title"><?php echo $tt = $item['title']; ?></div>
			  <div class="pt-de-desc"><p><?php echo $tt = $item['item_description']; ?></p></div>
			  
			  </button>
			 
			
			<?php
				$i++;
			} ?>
			</div>
			<div class="tabcontent-main">
			<?php
			foreach ( $fields as $item1 ) {
		?>
			<div id="<?php echo $id = $item1['_id']; ?>" class="tabcontent">
			 <?php
					if($item1['content_type']=='image'){
						?>
							<img src=<?php echo $item1[Content_image][url]; ?>>
						<?php
					}else{
						if($item1['video_type']=='youtube'){
							
							$shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_]+)\??/i';
							$longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))(\w+)/i';
							 if (preg_match($longUrlRegex, $item1['link'], $matches)) {
								$youtube_id = $matches[count($matches) - 1];
							}

							if (preg_match($shortUrlRegex, $item1['link'], $matches)) {
								$youtube_id = $matches[count($matches) - 1];
							}
					?>
			  <iframe width="560" height="400" src="https://www.youtube.com/embed/<?php echo $youtube_id.'?playlist='.$youtube_id.'&loop=1&autoplay=1&rel=0&controls=0&showinfo=0&feature=oembed&mute=0&wmode=opaque'; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
						<?php }
						if ($item1['video_type']=='vimeo'){ 
						$videoId = explode("vimeo.com/",$item1['vimeo_link'])[1];
						if(strpos($videoId, '&') !== false){
							$videoId = explode("&",$videoId)[0];
						}
						
						
						?>
							 <iframe width="560" height="315" src="https://player.vimeo.com/video/<?php echo $videoId.'?playlist='.$videoId.'&loop=1&autoplay=1&rel=0&controls=1&showinfo=0&feature=oembed&mute=0&wmode=opaque'; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
							
							
							<?php 
						}
					} ?>
			</div>
			<?php } ?>	
			</div>
			</div>

			

			<script>
			function openCity(evt, cityName) {
				var i, tabcontent, tablinks;
				tabcontent = document.getElementsByClassName("tabcontent");
				for (i = 0; i < tabcontent.length; i++) {
					tabcontent[i].style.display = "none";
				}
				tablinks = document.getElementsByClassName("tablinks");
				for (i = 0; i < tablinks.length; i++) {
					tablinks[i].className = tablinks[i].className.replace(" active", "");
				}
				document.getElementById(cityName).style.display = "block";
				evt.currentTarget.className += " active";
			}

			// Get the element with id="defaultOpen" and click on it
			document.getElementById("defaultOpen").click();
			</script>
					
		<?php
		
	}
}

/*=============Call this every widget ====================*/
Plugin::instance()->widgets_manager->register_widget_type( new Pt_Elementor_Icon_Latest() );