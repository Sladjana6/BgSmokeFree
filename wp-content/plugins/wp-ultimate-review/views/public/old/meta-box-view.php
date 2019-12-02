<?php 
if( (isset($return_data_display_setting['review_summery']['enable']) ? $return_data_display_setting['review_summery']['enable'] : 'No') == 'Yes' ){
    
?>
<div class="xs-review-box view-review-list overview-xs-review" id="xs-review-box">
	<h2 class="total-reivew-headding"> Overview </h2>
	<div class="xs-reviewer-details">
		<?php
		if ( $the_queryTotal->have_posts() ) {
			$overViewArray = [];
			while ( $the_queryTotal->have_posts() ) {
				$the_queryTotal->the_post();
				//echo $metaReviewID = $post->ID.' - ';
				$metaReviewID = $post->ID;
				$metaDataJson = get_post_meta( $metaReviewID, 'xs_public_review_data', false );
				if( is_array($metaDataJson) AND sizeof($metaDataJson) > 0) {
					$getMetaData = json_decode($metaDataJson[sizeof($metaDataJson) - 1]);
				}else{
					$getMetaData = [];
				}
				$xs_reviwer_rattingOver = isset($getMetaData->xs_reviwer_ratting) ? $getMetaData->xs_reviwer_ratting : '0';
				$reviwerStyleLimitOver = isset($getMetaData->review_score_limit) ? $getMetaData->review_score_limit : '5';
				
				$overViewArray['xs_reviwer_ratting'][] = $xs_reviwer_rattingOver;
				$overViewArray['review_score_limit'][] = $reviwerStyleLimitOver;
				
			}
			//echo '<pre>'; print_r($overViewArray); echo '</pre>';
			
			$rattingRatting = max($overViewArray['review_score_limit']);
			// count same values in array. Return array by unique.
			$arrayCountValues = array_count_values($overViewArray['xs_reviwer_ratting']);
			
			$totalRattingsSum = array_sum($overViewArray['xs_reviwer_ratting']);
			$totalRattingsCount = count($overViewArray['xs_reviwer_ratting']);
			
			$overViewTotal = round(($totalRattingsSum   / $totalRattingsCount), 2);
			
			?>
			<div class="xs-review-overview-list">
				<?php
				for($over = $rattingRatting; $over >= 1; $over--):
					$diferentNum = isset($arrayCountValues[$over]) ? $arrayCountValues[$over] : 0;
					$diferentNumValue = $over * $diferentNum;
					$persentance = ($diferentNumValue / $totalRattingsSum) * 100;
					
					?>
						<div class="percentange-label"><?= $over;?> Star <span> <?php echo round($persentance, 2);?> % </span></div>
						<div class="overview-bar">
							<div style="width:<?php echo $persentance;?>%;" class="percentange_check"><span class="show-per-data"></span></div>							
						</div>
						<div style="clear:both;"></div>
					<?php
				endfor;
				?>
			</div>
			<div class="xs-review-overview-list-right">
				<div class="total_overview_rattings">
					<span class="total_rattings_review"> <?php echo $overViewTotal;?>  </span> <br/>average based on <?php echo $totalRattingsCount;?> ratings
				</div>
				<div class="total_overview_rattings_text">SUPERD! </div>
				<div class="total_overview_rattings_value">
					<?php
					echo $this->ratting_view_star_point($overViewTotal, $rattingRatting);
					?>
				</div>
			</div>
			<?php
		}
		?>
	</div>
</div>
<?php }?>
<?php 
if( (isset($return_data_display_setting['review_list']['enable']) ? $return_data_display_setting['review_list']['enable'] : 'No') == 'Yes' ){
    
?>
<div class="xs-review-box view-review-list" id="xs-review-box">
	<h2 class="total-reivew-headding"> <?php echo $the_queryTotal->post_count; ?> Reviews</h2>
    <?php
	$postCount = 1;
    if ( $the_query->have_posts() ) {
        while ( $the_query->have_posts() ) {
            $the_query->the_post();
            $metaReviewID = $post->ID;
            $metaDataJson = get_post_meta( $metaReviewID, 'xs_public_review_data', false );
            if( is_array($metaDataJson) AND sizeof($metaDataJson) > 0) {
                $getMetaData = json_decode($metaDataJson[sizeof($metaDataJson) - 1]);
            }else{
                $getMetaData = [];
            }
            if($postCount != 1){
					echo '<div class="border-div"> </div>';
				}

            ?>
            <div class="xs-reviewer-details">
                <?php
				
				 // reviwer image	
				if( (isset($return_data_display_setting['form']['xs_reviwer_profile_image_data']['display']['enable']) && $return_data_display_setting['form']['xs_reviwer_profile_image_data']['display']['enable'] == 'Yes') ):
					echo '<div class="review-reviwer-image-section">';
					
					 $profileImage = get_avatar_url(isset($getMetaData->xs_post_author) ? $getMetaData->xs_post_author : 0);
					 if(strlen($profileImage) > 0){
					?>
					<div class="xs-reviewer-author-image">
						<img src="<?php echo esc_url($profileImage); ?>">
					</div>
					<?php	
					 }
					echo '</div>';
				endif;
				
				// reviwer details
				echo '<div class="review-reviwer-info-section">';
				 // reviwer name
				if( (isset($return_data_display_setting['form']['xs_reviwer_name_data']['display']['enable']) && $return_data_display_setting['form']['xs_reviwer_name_data']['display']['enable'] == 'Yes') ):
					if( isset($getMetaData->xs_reviwer_name) AND strlen($getMetaData->xs_reviwer_name) > 0): ?>
						<div class="xs-reviewer-author">
							<span class="xs_review_name" style="<?php echo $this->getStyles('xs_reviwer_name_data');?>" > <?php echo esc_html($getMetaData->xs_reviwer_name); ?> </span>
							<?php
							if((isset($return_data_display_setting['form']['xs_reviwer_email_data']['display']['enable']) && $return_data_display_setting['form']['xs_reviwer_email_data']['display']['enable'] == 'Yes') ):
								if( isset($getMetaData->xs_reviwer_email) AND strlen($getMetaData->xs_reviwer_email) > 0 ):
								?>
									<span class="xs_review_email" style="<?php echo $this->getStyles('xs_reviwer_email_data');?>" > - <?php echo esc_html($getMetaData->xs_reviwer_email); ?> </span>
								<?php	
								endif;
							endif;
							?>
						</div>
                <?php endif;
				endif;
				// author website
				 if( (isset($return_data_display_setting['form']['xs_reviwer_website_data']['display']['enable']) && $return_data_display_setting['form']['xs_reviwer_website_data']['display']['enable'] == 'Yes') ):
					if( isset($getMetaData->xs_reviwer_website) AND strlen($getMetaData->xs_reviwer_website) > 0): ?>
						<div class="xs-reviewer-website">
							<span style="<?php echo $this->getStyles('xs_reviwer_website_data');?>" > <?php echo esc_html($getMetaData->xs_reviwer_website); ?> </span>
						</div>
                <?php endif;
				endif;
				 // ratting
				if( (isset($return_data_display_setting['form']['xs_reviwer_ratting_data']['display']['enable']) && $return_data_display_setting['form']['xs_reviwer_ratting_data']['display']['enable'] == 'Yes') ):
					if( isset($getMetaData->xs_reviwer_ratting) AND $getMetaData->xs_reviwer_ratting > 0): 
					$reviwerStyleLimit = isset($getMetaData->review_score_limit) ? $getMetaData->review_score_limit : '5';
					$reviwerScoreStyle = isset($getMetaData->review_score_style) ? $getMetaData->review_score_style : 'point';
						if($reviwerScoreStyle == 'star'){
							echo $this->ratting_view_star_point($getMetaData->xs_reviwer_ratting, $reviwerStyleLimit);
						}else if($reviwerScoreStyle == 'point'){
							echo $this->ratting_view_point_per($getMetaData->xs_reviwer_ratting, $reviwerStyleLimit);
						}else if($reviwerScoreStyle == 'percentage'){
							echo $this->ratting_view_percentange_per($getMetaData->xs_reviwer_ratting, $reviwerStyleLimit);
						}else if($reviwerScoreStyle == 'pie'){
							echo $this->ratting_view_pie_per($getMetaData->xs_reviwer_ratting, $reviwerStyleLimit);
						}else{
							echo $this->ratting_view_star_point($getMetaData->xs_reviwer_ratting, $reviwerStyleLimit);
						}
					endif;
				endif;
				// ratting date 
				if( (isset($return_data_display_setting['form']['post_date_data']['display']['enable']) && $return_data_display_setting['form']['post_date_data']['display']['enable'] == 'Yes') ):
                      if( isset($post->post_date) AND strlen($post->post_date) > 2 ): ?>
                            <div class="xs-review-date">
                            <time style="<?php echo $this->getStyles('post_date_data');?>" datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo get_the_date('F d, Y'); ?></time>
                            </div>
                <?php endif;
                 endif;
				 // ratting title
				if( (isset($return_data_display_setting['form']['xs_reviw_title_data']['display']['enable']) && $return_data_display_setting['form']['xs_reviw_title_data']['display']['enable'] == 'Yes') ):
					if( isset($getMetaData->xs_reviw_title) AND strlen($getMetaData->xs_reviw_title) > 0): 
					
					?>
                    <div class="xs-review-title">
                        <h3 style="<?php echo $this->getStyles('xs_reviw_title_data');?>" > <?php echo esc_html($post->post_title); ?> </h3>
                    </div>
                <?php endif;
				endif;
				if( (isset($return_data_display_setting['form']['xs_reviw_summery_data']['display']['enable']) && $return_data_display_setting['form']['xs_reviw_summery_data']['display']['enable'] == 'Yes') ):
					if( isset($getMetaData->xs_reviw_summery) AND strlen($getMetaData->xs_reviw_summery) > 0): 
					
					?>
						<div class="xs-review-summery">
							<p style="<?php echo $this->getStyles('xs_reviw_summery_data');?>" > <?php echo esc_html($post->post_content); ?> </p>
						</div>
                <?php endif;
				endif;
				
				?>
				</div>
            </div>
            <?php
			$postCount++;
        }
		?>
		<div class="xs-review-pagination">
		<?php
			$this->xs_review_pagination( $paged, $the_query->max_num_pages); 
		?>
		</div>
		<?php
    }
	
    wp_reset_postdata();
    ?>
	
</div>

<?php
}
// end enable review list

$viewRattingPage = 'Yes';
if( (isset($return_data_global_setting['require_login']) ? $return_data_global_setting['require_login'] : 'No') == 'Yes' ){
    if(is_user_logged_in()){
        $viewRattingPage = 'Yes';
    }else{
        $viewRattingPage = 'No';
    }
}
if($viewRattingPage == 'Yes'):
?>
    <form action="<?php echo esc_url(get_permalink($post->ID));?>" name="xs_review_form_public_data" method="post" id="xs_review_form_public_data">
            
        <div class="xs-review-box public-xs-review-box" id="xs-review-box">
			<h2 class="write-reivew-headding"> Write a Review</h2>
            <?php
			if(isset($_SESSION['xs_review_message']) AND strlen($_SESSION['xs_review_message']) > 4){
			?>
			<div class="review_message_show">
				<p> <?php echo esc_html__($_SESSION['xs_review_message']);  unset($_SESSION['xs_review_message']); ?></p>
			</div>
			<?php			
			}
            if(is_array($this->controls) AND sizeof($this->controls) > 0){
                
                $showTextFiledWIthOutLogin = ['xs_reviwer_name', 'xs_reviwer_email'];

                foreach($this->controls AS $metaKey=>$metaValue):
                        
                    // CHeck filed enable
                    $checkEnable = (isset($return_data_display_setting['form'][$metaKey]) && $return_data_display_setting['form'][$metaKey] == 'Yes') ? 'Yes' : 'No';
                    $metaData = '';
                    $displayFiled = '';
                    // check login user or not
                    if(is_user_logged_in()){
                        if(in_array($metaKey, $showTextFiledWIthOutLogin) ){
							$displayFiled = 'display:none;';
							// current user information
							$current_user = wp_get_current_user();
							if($metaKey == 'xs_reviwer_name'){
								$metaData = (isset($current_user->display_name) && strlen($current_user->display_name) > 0) ? $current_user->display_name : $current_user->first_name.' '.$current_user->last_name;
							}else if($metaKey == 'xs_reviwer_email'){
								$metaData = isset($current_user->user_email) ? $current_user->user_email : '';
							}	
                        }
                    }
  
                    // check enable filed
                    if($checkEnable === 'Yes'){
                        
                        // input type, Example: text, checkbox, radio
                        $inputType = (isset($metaValue) AND is_array($metaValue) AND array_key_exists('type', $metaValue)) ? $metaValue['type'] : 'text';
                        
                        // input name
                        $inputName = (isset($metaValue) AND is_array($metaValue) AND array_key_exists('name', $metaValue)) ? $metaValue['name'] : $metaKey;
                        
                        // input id
                        $inputId = (isset($metaValue) AND is_array($metaValue) AND array_key_exists('id', $metaValue)) ? $metaValue['id'] : $metaKey;
                        
                        // input class
                        $inputClass = (isset($metaValue) AND is_array($metaValue) AND array_key_exists('class', $metaValue)) ? $metaValue['class'] : $metaKey;
                        
                        // Input Ttitle
                        $inputTitle = (isset($metaValue) AND is_array($metaValue) AND array_key_exists('title_name', $metaValue)) ? $metaValue['title_name'] : '';
                        $inputRequire = (isset($metaValue) AND is_array($metaValue) AND array_key_exists('require', $metaValue)) ? $metaValue['require'] : 'No';
                        
						// dynamic title
						$inputTitle = (isset($return_data_display_setting['form'][$metaKey.'_data']['label']['name']) && $return_data_display_setting['form'][$metaKey.'_data']['label']['name'] != '') ? $return_data_display_setting['form'][$metaKey.'_data']['label']['name'] : $inputTitle; 
						
                        // set require option in fileds
                        $requireSet = '';
                        if($inputRequire === 'Yes'){
                            //$inputTitle .= '<em>(Required)</em> ';
                            $requireSet = 'required';
                        }
                        // Input Options
                        $inputOptions = (isset($metaValue) AND is_array($metaValue) AND array_key_exists('options', $metaValue)) ? $metaValue['options'] : [];
                    
                        if( $metaKey == 'xs_reviwer_ratting'){
							$review_score_style = isset($return_data_global_setting['review_score_style']) ? $return_data_global_setting['review_score_style'] : 'star';
							$review_score_style_input = isset($return_data_global_setting['review_score_input']) ? $return_data_global_setting['review_score_input'] : 'star';
							
							$review_score_limit = isset($return_data_global_setting['review_score_limit']) ? $return_data_global_setting['review_score_limit'] : 5;
							
							if(in_array($review_score_style, ['percentage', 'pie']) ):
								$review_score_style_input = 'slider';
							endif;
						?>
							<div class="xs-review xs-<?php echo $inputType;?>" style="<?php echo $displayFiled;?>">
								<?php if( in_array($review_score_style_input, array('star', 'square','movie', 'bar', 'pill')) ):?>
								<div class="xs-review-rating-stars text-center">
									<ul id="xs_review_stars">
										<?php for($ratting = 1; $ratting <= $review_score_limit; $ratting++ ):?>
										  <li class="star-li <?php echo $review_score_style_input;?>  <?php if($ratting == 1){echo 'selected';}?>" data-value="<?php echo $ratting;?>">
											<?php if($review_score_style_input == 'star'){?>
											<i class="xs-star dashicons-before dashicons-star-filled"></i>
											<?php }else{ echo '<span>'.$ratting.'<span>';}?>
										  </li>
										  <?php endfor;?>
									</ul>
									 <div id="review_data_show"> </div>
									 <input type="hidden" id="ratting_review_hidden"  name="<?php echo $content_meta_key;?>[<?php echo $inputName;?>]" value="1" <?php echo $requireSet;?> />
								</div>
								<?php endif;
								if($review_score_style_input == 'slider'):?>
								<div class="xs-review-rating-slider text-center">
									<div class="xs-slidecontainer">
									  <input type="range" min="1" max="<?php echo esc_html($review_score_limit);?>" value="1"  name="<?php echo $content_meta_key;?>[<?php echo $inputName;?>]" class="xs-slider-range" id="xs_review_range">
									 
									</div>
									<div id="review_data_show"> </div>
								</div>
								<?php endif;
								
								?>
							</div>
						<?php	
                        }else if( $inputType == 'select' && $metaKey != 'xs_reviwer_ratting'){
                        ?>
                        <div class="xs-review xs-<?php echo $inputType;?>" style="<?php echo $displayFiled;?>">
                            <label for="<?php echo $inputId;?>" style="<?php echo $this->getStyles($metaKey.'_data', 'label');?>"> <?php echo __($inputTitle, 'wp-ultimate-review')?>
                                <select name="<?php echo $content_meta_key;?>[<?php echo $inputName;?>]" id="<?php echo $inputId;?>" class="widefat <?php echo esc_attr( $inputClass );?>" <?php echo $requireSet;?> >
                                    <?php
                                    if(is_array($inputOptions) AND sizeof($inputOptions) > 0 ):
                                        foreach($inputOptions AS $optionsKey=>$optionsValue):
                                    ?>
                                        <option value="<?php echo $optionsKey;?>" <?php echo (isset($optionsKey) && $optionsKey == $metaData) ? 'selected' : '' ?> > <?php echo $optionsValue;?> </option>
                                    <?php 
                                        endforeach;
                                    endif;
                                    ?>
                                </select>
                            </label>
                        </div>
                        <?php
                        }else if( ($inputType == 'radio' OR $inputType == 'checkbox') && $metaKey != 'xs_reviwer_ratting' ){
                        ?>
                        <div class="xs-review xs-<?php echo esc_attr( $inputType );?>" style="<?php echo $displayFiled;?>">
                            <label for="<?php echo $inputId;?>" style="<?php echo $this->getStyles($metaKey.'_data', 'label');?>" > <?php echo __($inputTitle, 'wp-ultimate-review')?></label><br/>
                            <?php
                            if(is_array($inputOptions) AND sizeof($inputOptions) > 0 ):
                                foreach($inputOptions AS $optionsKey=>$optionsValue):
                            ?>
                                <label for="<?php echo $optionsKey;?>">
                                    <input type="<?php echo $inputType;?>" id="<?php echo $optionsKey;?>" class="widefat <?php echo esc_attr( $inputClass );?>" name="<?php echo $content_meta_key;?>[<?php echo $inputName;?>]" value="<?php echo esc_html( $optionsKey ) ?>" <?php echo (isset($optionsKey) && $optionsKey == $metaData) ? 'checked' : '' ?> <?php echo $requireSet;?> />
                                    <?php echo esc_html__($optionsValue, 'wp-ultimate-review')?>
                                </label>   
                            <?php 
                                endforeach;
                            endif;
                            ?>
                        </div>
                        <?php
						}else if( $inputType == 'textarea' && $metaKey != 'xs_reviwer_ratting' ){
						?>
						<div class="xs-review xs-<?php echo $inputType;?>" style="<?php echo $displayFiled;?>">
                           <!-- <label for="<?php echo $inputId;?>" style="<?php echo $this->getStyles($metaKey.'_data', 'label');?>" > <?php echo __($inputTitle, 'wp-ultimate-review')?> -->
                                <textarea id="<?php echo $inputId;?>" class="widefat <?php echo esc_attr( $inputClass );?>" name="<?php echo $content_meta_key;?>[<?php echo $inputName;?>]" <?php echo $requireSet;?> placeholder="<?php echo esc_html($inputTitle);?>" ><?php echo esc_html( $metaData ) ?></textarea>
                            <!--</label>-->
                        </div> 
						<?php
                        }else{
                        ?>
                        <div class="xs-review xs-<?php echo $inputType;?>" style="<?php echo $displayFiled;?>">
                           <!-- <label for="<?php echo $inputId;?>" style="<?php echo $this->getStyles($metaKey.'_data', 'label');?>" > <?php echo __($inputTitle, 'wp-ultimate-review')?> -->
                                <input type="<?php echo $inputType;?>" placeholder="<?php echo esc_html($inputTitle);?>" id="<?php echo $inputId;?>" class="widefat <?php echo esc_attr( $inputClass );?>" name="<?php echo $content_meta_key;?>[<?php echo $inputName;?>]" value="<?php echo esc_html( $metaData ) ?>" <?php echo $requireSet;?> />
                            <!--</label>-->
                        </div>
                        <?php }
                    }
                endforeach;
            }
            ?>
            <input type="hidden" value="<?php echo $this->getPostId;?>" name="<?php echo $content_meta_key;?>[xs_post_id]" />
            <input type="hidden" value="<?php echo $this->getPostType;?>" name="<?php echo $content_meta_key;?>[xs_post_type]" />
            <input type="hidden" value="<?php echo get_current_user_id();?>" name="<?php echo $content_meta_key;?>[xs_post_author]" />

            <div class="xs-review xs-save-button">
                <button type="submit" name="xs_review_form_public_data" class="xs-btn primary"><?php echo esc_html__('Submit Review', 'wp-ultimate-review');?></button>
            </div>
        </div>
    </form>
    <?php endif;?>