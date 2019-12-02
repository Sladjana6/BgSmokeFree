<div class="xs-review-box details-xs-review" id="xs-review-box">
	<div class="content-xs-review-box">
		<!-- Review overview enable-->
		<div class="xs-wp-review-field">
			<div class="xs-wp-review-field-label">
				<label for="xs-wp_review_type"><?php echo esc_html__('Overview Enable', 'wp-ultimate-review'); ?></label>
			</div>
			<div class="xs-wp-review-field-option">
				<input class="review_switch_button" type="checkbox" id="overview_enable" name="<?php echo $overview_setting_optionKey;?>[overview][enable]" value="Yes" <?php echo (isset($return_data_overview_setting->overview->enable) && $return_data_overview_setting->overview->enable == 'Yes') ? 'checked' : ''; ?> >	
				<label for="overview_enable" onclick="xs_review_show_hide(2);" class="review_switch_button_label small"> <?php echo esc_html__('Yes, No ', 'wp-ultimate-review')?></label>
			
			</div>
		</div>
	</div>
	
	<div id="xs_review_tr__2" class="content-xs-review-box deactive_tr  <?php echo isset($return_data_overview_setting->overview->enable) ? 'active_tr' : '';?>">
		<!-- Review Type-->
		
		<div class="xs-wp-review-field">
			<div class="xs-wp-review-field-label">
				<label for="xs-wp_review_type"> <?php echo esc_html__('Review Style', 'wp-ultimate-review'); ?></label>
			</div>
			<div class="xs-wp-review-field-option">
				<?php
					// global score styles
					$review_score_style = isset($return_data_global_setting['review_score_style']) ? $return_data_global_setting['review_score_style'] : 'star';
					
					// overview score style
					$selectReviewScoreStyle = isset($return_data_overview_setting->overview->style) ? $return_data_overview_setting->overview->style : $review_score_style;
					?>
				<select name="<?php echo $overview_setting_optionKey;?>[overview][style]" id="review_score_style_id" >					   
					<?php
					foreach($this->review_style AS $reviewStyleKey=>$reviewStyleValue):
					?>
					 <option value="<?php echo esc_html($reviewStyleKey);?>" <?php if($selectReviewScoreStyle == $reviewStyleKey){ echo 'selected';}?> > <?php echo esc_html__($reviewStyleValue, 'wp-ultimate-review');?> </option>
					<?php endforeach;?>
				</select>
			</div>
		</div>
		<!-- Overview Headding-->
		<div class="xs-wp-review-field">
			<div class="xs-wp-review-field-label">
				<label for="xs-wp_review_type"> <?php echo esc_html__('Heading', 'wp-ultimate-review'); ?></label>
			</div>
			<div class="xs-wp-review-field-option">
				<?php
					$selectOverviewHeading = isset($return_data_overview_setting->overview->heading) ? $return_data_overview_setting->overview->heading : 'Overview';
				?>
				<input type="text" placeholder="Overview heading" value="<?php echo $selectOverviewHeading;?>" name="<?php echo $overview_setting_optionKey;?>[overview][heading]">
				
			</div>
		</div>
		
		<div class="xs-wp-review-field">
			<div class="xs-wp-review-field-label">
				<label for="xs-wp_review_type"><?php echo esc_html__('Summary Enable', 'wp-ultimate-review'); ?></label>
			</div>
			<div class="xs-wp-review-field-option">
				<input class="review_switch_button" type="checkbox" id="overview_summary_enable" name="<?php echo $overview_setting_optionKey;?>[overview][summary][enable]" value="Yes" <?php echo (isset($return_data_overview_setting->overview->summary->enable) && $return_data_overview_setting->overview->summary->enable == 'Yes') ? 'checked' : ''; ?> >	
				<label for="overview_summary_enable" onclick="xs_review_show_hide(3);" class="review_switch_button_label small"> <?php echo esc_html__('Yes, No ', 'wp-ultimate-review')?></label>
			
			</div>
		</div>
		
		<div id="xs_review_tr__3" class="xs-wp-review-field deactive_tr  <?php echo isset($return_data_overview_setting->overview->summary->enable) ? 'active_tr' : '';?>">
			<div class="xs-wp-review-field-label">
				<label for="xs-wp_review_type"> </label>
			</div>
			<div class="xs-wp-review-field-option">
				<?php
					$selectOverviewSummary = isset($return_data_overview_setting->overview->summary->data) ? $return_data_overview_setting->overview->summary->data : '';
				?>
				<textarea type="text" placeholder="Overview summary" name="<?php echo $overview_setting_optionKey;?>[overview][summary][data]"><?php echo $selectOverviewSummary;?></textarea>
				
			</div>
		</div>
		<div class="xs-wp-review-field">
			<div class="xs-wp-review-field-label">
				<label for="xs-wp_review_type"><?php echo esc_html__('Average Enable', 'wp-ultimate-review'); ?></label>
			</div>
			<div class="xs-wp-review-field-option">
				<input class="review_switch_button" type="checkbox" id="overview_average_enable" name="<?php echo $overview_setting_optionKey;?>[overview][average][enable]" value="Yes" <?php echo (isset($return_data_overview_setting->overview->average->enable) && $return_data_overview_setting->overview->average->enable == 'Yes') ? 'checked' : ''; ?> >	
				<label for="overview_average_enable" onclick="xs_review_show_hide(3);" class="review_switch_button_label small"> <?php echo esc_html__('Yes, No ', 'wp-ultimate-review')?></label>
			
			</div>
		</div>
		<div class="xs-wp-review-field">
			<div class="xs-wp-review-field-label">
				<label for="xs-wp_review_type"><?php echo esc_html__('Rating Enable', 'wp-ultimate-review'); ?></label>
			</div>
			<div class="xs-wp-review-field-option">
				<input class="review_switch_button" type="checkbox" id="overview_ratting_enable" name="<?php echo $overview_setting_optionKey;?>[overview][ratting][enable]" value="Yes" <?php echo (isset($return_data_overview_setting->overview->ratting->enable) && $return_data_overview_setting->overview->ratting->enable == 'Yes') ? 'checked' : ''; ?> >	
				<label for="overview_ratting_enable" onclick="xs_review_show_hide(3);" class="review_switch_button_label small"> <?php echo esc_html__('Yes, No ', 'wp-ultimate-review')?></label>
			
			</div>
		</div>
		<div class="xs-wp-review-field">
			<div class="xs-wp-review-field-label">
				<label for="xs-wp_review_type"> <strong> <?php echo esc_html__('Shortcode Rating ', 'wp-ultimate-review'); ?></strong> </label>
			</div>
			<div class="xs-wp-review-field-option">
				<p class="xs-review-shortcode">
					[wp-reviews-rating post-id="<?php echo $post->ID;?>" ratting-show="yes" count-show="yes" vote-show="yes" vote-text="Votes" class=""]
				</p>
			</div>
		</div>
		
		<div class="xs-wp-review-field overview-item">
			<div class="xs-wp-review-field-label">
				<label for="xs-wp_review_type"> <strong><?php echo esc_html__('Review Itam', 'wp-ultimate-review'); ?></strong></label>
			</div>
			<?php
			$review_score_style_input = isset($return_data_global_setting['review_score_input']) ? $return_data_global_setting['review_score_input'] : 'star';
			
			$review_score_limit = isset($return_data_global_setting['review_score_limit']) ? $return_data_global_setting['review_score_limit'] : 5;
			
			if(in_array($selectReviewScoreStyle, ['percentage', 'pie']) ):
				$review_score_style_input = 'slider';
			endif;
			?>
			
		</div>
		
		<div class="repater-overview-item" id="repater_review_item">
			<button type="button" class="xs-review-btnAdd xs-review-add-button"><?php echo esc_html__('Add', 'wp-ultimate-review'); ?></button>
			<?php
				$selectOverviewReapter = isset($return_data_overview_setting->overview->item) ? count( $return_data_overview_setting->overview->item) : 3;
				$dataName = '';
				$dataRatting = '';
				for($rep = 0; $rep < $selectOverviewReapter; $rep++):
					$inceRep = $rep+1;
					
					$dynamiCkey = $rep;
					$dataName = isset($return_data_overview_setting->overview->item[$dynamiCkey]->name) ? $return_data_overview_setting->overview->item[$dynamiCkey]->name : '';
					
					$dataRatting = isset($return_data_overview_setting->overview->item[$dynamiCkey]->ratting) ? $return_data_overview_setting->overview->item[$dynamiCkey]->ratting : '3';
					
					$dataRattingRange = isset($return_data_overview_setting->overview->item[$dynamiCkey]->rat_range) ? $return_data_overview_setting->overview->item[$dynamiCkey]->rat_range : $review_score_limit;
			?>
			
			<div class="reapter-div-xs">
				<div class="xs-wp-review-field overview-item-repeater">
					<div class="xs-wp-review-field-label">
						<label for="xs_review_<?php echo $rep;?>_name" data-pattern-text="Itam Name +=1"> <?php echo esc_html__('Itam Name', 'wp-ultimate-review'); ?> </label>
					</div>
					<div class="xs-wp-review-field-option">
						<input type="text" value="<?php echo $dataName;?>" name="<?php echo $overview_setting_optionKey;?>[overview][item][<?php echo $rep;?>][name]" data-pattern-name="<?php echo $overview_setting_optionKey;?>[overview][item][++][name]" id="xs_review_<?php echo $rep;?>_name" data-pattern-id="xs_review_++_name" >
					</div>
				</div>
				<div class="xs-wp-review-field overview-item-repeater">
					<div class="xs-wp-review-field-label">
						<label for="xs_review_<?php echo $rep;?>_ratting" data-pattern-text="Ratting +=1"> <?php echo esc_html__('Ratting', 'wp-ultimate-review'); ?></label>
					</div>
					<div class="xs-wp-review-field-option">
						
						<div class="xs-review xs-select" >
								<?php if( in_array($review_score_style_input, array('star', 'square','movie', 'bar', 'pill')) ):?>
								<div class="xs-review-rating-stars text-center">
									<ul id="xs_review_stars" class="xs_review_stars">
										<?php for($ratting = 1; $ratting <= $dataRattingRange; $ratting++ ):?>
										  <li class="star-li <?php echo $review_score_style_input;?>  <?php if($ratting <= $dataRatting){echo 'selected';}?>" data-value="<?php echo $ratting;?>" onclick="click_xs_review_data()">
											<?php if($review_score_style_input == 'star'){?>
											<i class="xs-star dashicons-before dashicons-star-filled"></i>
											<?php }else{ echo '<span>'.$ratting.'<span>';}?>
										  </li>
										  <?php endfor;?>
									</ul>
									 <input type="number" class="right-review-ratting" value="<?php echo $dataRatting;?>" name="<?php echo $overview_setting_optionKey;?>[overview][item][<?php echo $rep;?>][ratting]" data-pattern-name="<?php echo $overview_setting_optionKey;?>[overview][item][++][ratting]" id="xs_review_<?php echo $rep;?>_ratting" data-pattern-id="xs_review_++_ratting" >
									
								</div>
								<?php endif;
								if($review_score_style_input == 'slider'):?>
								<div class="xs-review-rating-slider text-center">
									<div class="xs-slidecontainer">
									  <input type="range" min="1" max="<?php echo esc_html($dataRattingRange);?>" value="<?php echo $dataRatting;?>"  name="<?php echo $overview_setting_optionKey;?>[overview][item][<?php echo $rep;?>][ratting]" class="xs-slider-range" id="xs_review_range" data-pattern-name="<?php echo $overview_setting_optionKey;?>[overview][item][++][ratting]" id="xs_review_<?php echo $rep;?>_ratting" data-pattern-id="xs_review_++_ratting" onchange="click_xs_review_data_slider(this)">
									  	
									</div>
									<div id="review_data_show"> <?php echo $dataRatting;?></div>
								</div>
								<?php 	
								 endif;
								?>
							</div>
							
					</div>
				</div>
				<button type="button" class="xs-review-btnRemove xs-review-remove-button"><?php echo esc_html__('Remove', 'wp-ultimate-review'); ?></button>
			</div>
			<?php endfor; ?>
		</div>
	
	</div>
</div>

<script type="text/javascript">
/*Reapter data*/
jQuery(document).ready(function(){
	
	var numberOfRowXs = '<?php echo ($selectOverviewReapter - 1);?>';
	var numberOfRowXsKey = '<?php echo $overview_setting_optionKey;?>';
	
	$('#repater_review_item').repeater({
		  btnAddClass: 'xs-review-btnAdd',
		  btnRemoveClass: 'xs-review-btnRemove',
		  groupClass: 'reapter-div-xs',
		  minItems: 1,
		  maxItems: 0,
		  startingIndex: parseInt(numberOfRowXs),
		  showMinItemsOnLoad: false,
		  reindexOnDelete: true,
		  repeatMode: 'append',
		  animation: 'fade',
		  animationSpeed: 400,
		  animationEasing: 'swing',
		  clearValues: true
	  }, [] 
	  );
});
</script>