<div id="xs_settings">
    <?php if($message_status == 'show'){?>
    <div class="admin-page-framework-admin-notice-animation-container">
        <div 0="XS_Social_Login_Settings" id="XS_Social_Login_Settings" class="updated admin-page-framework-settings-notice-message admin-page-framework-settings-notice-container notice is-dismissible" style="margin: 1em 0px; visibility: visible; opacity: 1;">
            <p><?php echo esc_html__(''.$message_text.' data have been updated.', 'wp-ultimate-review');?></p>
            <button type="button" class="notice-dismiss"><span class="screen-reader-text"><?php echo esc_html__('Dismiss this notice.', 'wp-ultimate-review');?></span></button>
        </div>
    </div>
    <?php }?>


    <div class="xs-settings-section_review">
        
        <form action="<?php echo esc_url(admin_url().'edit.php?post_type='.$this->post_type.'&page=xs_settings');?>" name="global_setting_review_form" method="post" id="global_setting_review_form">
        
        <!-- This code for Global Setting start -->  
        	<h3 class="settings-section-title">  <?php echo esc_html__('General Settings', 'wp-ultimate-review');?></h3>
            <table class="form-table">
				<tbody>
					<!-- Require Approval-->
					<tr>
						<th scope="row">
							<label for=""><?php echo esc_html__('Require Admin Approval ', 'wp-ultimate-review');?>
							</label>
						</th>
						<td> 
							<input class="review_switch_button" type="checkbox" id="review_require_approval" name="<?php echo $global_setting_optionKey;?>[require_approval]" value="Yes" <?php echo (isset($return_data_global_setting['require_approval']) && $return_data_global_setting['require_approval'] == 'Yes') ? 'checked' : ''; ?> >	
							<label for="review_require_approval"  class="review_switch_button_label small"> <?php echo __('Yes, No ', 'wp-ultimate-review')?></label>
                            
						</td>
                    </tr>
                    <!-- Require Login-->
                    <tr>
						<th scope="row">
							<label for=""><?php echo esc_html__('Restrict rating to registered users only ', 'wp-ultimate-review');?>
							</label>
						</th>
						<td> 
							<input class="review_switch_button" type="checkbox" id="reviw_require_login" name="<?php echo $global_setting_optionKey;?>[require_login]" value="Yes" <?php echo (isset($return_data_global_setting['require_login']) && $return_data_global_setting['require_login'] == 'Yes') ? 'checked' : ''; ?> >	
							<label for="reviw_require_login"  class="review_switch_button_label small"> <?php echo esc_html__('Yes, No ', 'wp-ultimate-review')?></label>
                            
						</td>
                    </tr>
					
					<!-- Review score style -->
					<tr>
						<th scope="row">
							<label for="review_score_style_id"><?php echo esc_html__('Review Score Style', 'wp-ultimate-review');?>
							</label>
						</th>
						<td> 
							
							<select name="<?php echo $global_setting_optionKey;?>[review_score_style]" id="review_score_style_id" >
                               
								<?php
								$selectReviewScoreStyle = isset($return_data_global_setting['review_score_style']) ? $return_data_global_setting['review_score_style'] : 'star';
                                foreach($this->review_style AS $reviewStyleKey=>$reviewStyleValue):
                                    
                                ?>
                                 <option value="<?php echo esc_html($reviewStyleKey);?>" <?php if($selectReviewScoreStyle == $reviewStyleKey){ echo 'selected';}?> > <?php echo esc_html__($reviewStyleValue, 'wp-ultimate-review');?> </option>
                                <?php endforeach;?>
							</select>
                               
                        </td>
                    </tr>
					
					<!-- Review score limit number -->
					<tr>
						<th scope="row">
							<label for="review_score_limit_id"><?php echo esc_html__('Review Score Limit', 'wp-ultimate-review');?>
							</label>
						</th>
						<td> 
							<input class="review_text_filed" type="number" required id="review_score_limit_id" min="1" max="100" step="1" name="<?php echo $global_setting_optionKey;?>[review_score_limit]" value="<?php echo (isset($return_data_global_setting['review_score_limit']) && $return_data_global_setting['review_score_limit'] != '0') ? $return_data_global_setting['review_score_limit'] : '5'; ?>" >
                        </td>
                    </tr>
					<!-- Review score input style -->
					
					<tr>
						<th scope="row">
							<label for="review_score_styleInput_id"><?php echo esc_html__('Review Score Input Style', 'wp-ultimate-review');?>
							</label>
						</th>
						<td> 
							<select name="<?php echo $global_setting_optionKey;?>[review_score_input]" id="review_score_styleInput_id" >
                                <?php
								$selectReviewScoreInput = isset($return_data_global_setting['review_score_input']) ? $return_data_global_setting['review_score_input'] : 'star';
                                foreach($this->review_type AS $reviewTypeKey=>$reviewTypeValue):
                                    
                                ?>
                                 <option value="<?php echo esc_html($reviewTypeKey);?>" <?php if($selectReviewScoreInput == $reviewTypeKey){ echo 'selected';}?> > <?php echo esc_html__($reviewTypeValue, 'wp-ultimate-review');?> </option>
                                <?php endforeach;?>
                            </select>
                        </td>
                    </tr>
                    <!-- Notification Section-->
                    <tr>
						<th scope="row">
							<label for=""><?php echo __('Send to adminstrator Email <br>['.$getAdminEmail.']', 'wp-ultimate-review');?>
							</label>
						</th>
						<td> 
							<input class="review_switch_button" type="checkbox" id="send_administrator_email" name="<?php echo $global_setting_optionKey;?>[send_administrator]" value="Yes" <?php echo (isset($return_data_global_setting['send_administrator']) && $return_data_global_setting['send_administrator'] == 'Yes') ? 'checked' : ''; ?> >	
							<label for="send_administrator_email"  class="review_switch_button_label small"> <?php echo esc_html__('Yes, No ', 'wp-ultimate-review')?></label>
						</td>
                    </tr>
                    <tr>
						<th scope="row">
							<label for=""><?php echo esc_html__('Send to Author Email', 'wp-ultimate-review');?>
							</label>
						</th>
						<td> 
							<input class="review_switch_button" type="checkbox" id="send_author_email" name="<?php echo $global_setting_optionKey;?>[send_author]" value="Yes" <?php echo (isset($return_data_global_setting['send_author']) && $return_data_global_setting['send_author'] == 'Yes') ? 'checked' : ''; ?> >	
							<label for="send_author_email"  class="review_switch_button_label small"> <?php echo esc_html__('Yes, No ', 'wp-ultimate-review')?></label>
						</td>
                    </tr>
               
                    <tr>
						<th >
						</th>
						<td> 
							<button type="submit" name="global_setting_review_form" class="xs-review-btn primary"><?php echo esc_html__('Save', 'wp-ultimate-review');?></button>
						</td>
					</tr>
                </tbody>
            </table>

            <!-- This code for Display Setting start -->
        	<h3 class="settings-section-title">  <?php echo esc_html__('Display Settings', 'wp-ultimate-review');?></h3>
            <table class="form-table" id="xs_setting_form_review">
				<tbody>
					<!-- Review Enable-->
					<tr>
						<th scope="row">
							<label for=""><?php echo esc_html__('Enable Review', 'wp-ultimate-review');?>
							</label>
						</th>
						<td> 
							<input class="review_switch_button" type="checkbox" id="page_enable" name="<?php echo $display_setting_optionKey;?>[page][enable]" value="Yes" <?php echo (isset($return_data_display_setting['page']['enable']) && $return_data_display_setting['page']['enable'] == 'Yes') ? 'checked' : ''; ?> >	
							<label for="page_enable" onclick="xs_review_show_hide(2);" class="review_switch_button_label small"> <?php echo esc_html__('Yes, No ', 'wp-ultimate-review')?></label>
						</td>
					</tr>
					<tr id="xs_review_tr__2" class="deactive_tr  <?php echo isset($return_data_display_setting['page']['enable']) ? 'active_tr' : '';?>">
						<th scope="row">
							
						</th>
						<td> 
							<?php
							if(is_array($this->page_enable) AND sizeof($this->page_enable) > 0 ):
								foreach($this->page_enable AS $keyPageEnable=>$pageEnableValue):
							?>
								<input class="review_text_filed" type="checkbox" id="page_enable__<?php echo $keyPageEnable;?>" name="<?php echo $display_setting_optionKey;?>[page][data][]" value="<?php echo $keyPageEnable;?>" <?php echo (isset($return_data_display_setting['page']['data']) && in_array($keyPageEnable, $return_data_display_setting['page']['data'])) ? 'checked' : ''; ?>>
                           		<label for="page_enable__<?php echo $keyPageEnable;?>"  class="review_text_filed_label"> <?php echo __(''.$pageEnableValue.' ', 'wp-ultimate-review')?></label> <br/>
							<?php	
								endforeach;
							endif;
							?>
						</td>	
					</tr>
					<!-- Review location -->
					<tr>
						<th scope="row">
							<label for="review_location_id"><?php echo esc_html__('Review Location', 'wp-ultimate-review');?>
							</label>
						</th>
						<td> 
							<?php
							 $selectReviewType = isset($return_data_display_setting['review_location']) ? $return_data_display_setting['review_location'] : 'after_content';
							?>
							<select name="<?php echo $display_setting_optionKey;?>[review_location]" id="review_location_id" onclick="xs_review_show_hide_2(this.value);" >
                                <option value="after_content" <?php if($selectReviewType == 'after_content'){ echo 'selected';}?> ><?php echo esc_html__('After Content', 'wp-ultimate-review');?> </option>
                                <option value="before_content" <?php if($selectReviewType == 'before_content'){ echo 'selected';}?> ><?php echo esc_html__('Before Content', 'wp-ultimate-review');?> </option>
                                <option value="custom_code" <?php if($selectReviewType == 'custom_code'){ echo 'selected';}?> ><?php echo esc_html__('Custom (use shortcode)', 'wp-ultimate-review');?> </option>
                            </select>
                        </td>
                    </tr>
					<tr id="xs_review_tr__custom_code" class="deactive_tr  <?php if($selectReviewType == 'custom_code') { echo 'active_tr'; } ?>">
						<th scope="row">
							
						</th>
						<td> 
							<input class="review_text_filed review_shortcode" type="text" id="wp_review_shortcode" value="[wp-reviews]" >
							<button type="button" onclick="copyTextData('wp_review_shortcode');" class="xs_copy_button"> <?php echo __('Copy '); ?></button>
						</td>	
					</tr>
					
					<!-- Display Review List Enable-->
					<tr>
						<th scope="row">
							<label for=""><?php echo esc_html__('Display Review with Comments', 'wp-ultimate-review');?>
							</label>
						</th>
						<td> 
							<input class="review_switch_button" type="checkbox" id="display_review_enable" name="<?php echo $display_setting_optionKey;?>[review_list][enable]" value="Yes" <?php echo (isset($return_data_display_setting['review_list']['enable']) && $return_data_display_setting['review_list']['enable'] == 'Yes') ? 'checked' : ''; ?> >	
							<label for="display_review_enable" class="review_switch_button_label small"> <?php echo esc_html__('Yes, No ', 'wp-ultimate-review')?></label>
						</td>
					</tr>
					<!-- Display Review Summery Enable-->
					
					<!-- Review per page shown data-->
					<tr>
						<th scope="row">
							<label for="review_shown_per_page"><?php echo esc_html__('Review Shown Per Page ', 'wp-ultimate-review');?>
							</label>
						</th>
						<td> 
							<input class="review_text_filed" type="number" required id="review_shown_per_page" name="<?php echo $display_setting_optionKey;?>[review_show_per]" value="<?php echo (isset($return_data_display_setting['review_show_per']) && $return_data_display_setting['review_show_per'] != '0') ? $return_data_display_setting['review_show_per'] : '10'; ?>" min="1" max="20" step="1">	
						</td>
					</tr>
					
                    <!-- Review form settings-->
					<tr>
						<th scope="row">
							<label for="review_shown_per_page"><?php echo esc_html__('Review Form Settings ', 'wp-ultimate-review');?>
							</label>
						</th>
						<td> 
						<?php
							if(is_array($this->controls) AND sizeof($this->controls) > 0):
								foreach($this->controls AS $metaKey=>$metaValue):
									// Input Title
									$inputTitle = (isset($metaValue) AND is_array($metaValue) AND array_key_exists('title_name', $metaValue)) ? $metaValue['title_name'] : '';
									$inputTitleText = $inputTitle;

									// input id
									$inputId = (isset($metaValue) AND is_array($metaValue) AND array_key_exists('id', $metaValue)) ? $metaValue['id'] : $metaKey;
									
									// input require
									$inputRequire = (isset($metaValue) AND is_array($metaValue) AND array_key_exists('require', $metaValue)) ? $metaValue['require'] : 'No';
									if($inputRequire === 'Yes'){
										//$inputTitleText .= '<em>(Required)</em> ';
									}
						?>
									<div class="review-switch-section">
										<input class="review_switch_button" onclick="xs_review_show_hide('<?php echo $metaKey;?>');" type="checkbox" id="<?php echo $inputId;?>" name="<?php echo $display_setting_optionKey;?>[form][<?php echo $metaKey;?>]" value="Yes" <?php echo (isset($return_data_display_setting['form'][$metaKey]) && $return_data_display_setting['form'][$metaKey] == 'Yes') ? 'checked' : ''; ?>>
										<label for="<?php echo $inputId;?>" class="review_switch_button_label small"> <?php echo __(''.$inputTitleText.' ', 'wp-ultimate-review')?></label>
										<span class="review-switch-text"> <?php echo __(''.$inputTitleText.' ', 'wp-ultimate-review')?> </span>
									</div>
									<?php 
									$displayEnableCLass = '';
									if( isset($return_data_display_setting['form'][$metaKey]) && $return_data_display_setting['form'][$metaKey] == 'Yes'){
										$displayEnableCLass = 'active_tr';
									}
									?>
									<div class="display-show-review-type deactive_tr <?php echo esc_attr($displayEnableCLass);?>" id="xs_review_tr__<?php echo $metaKey;?>">
										<div class="xs-review-display-label-box">
											<label for="label-test__<?php echo $metaKey;?>_name"> <?php echo esc_html__(' Label Name', 'wp-ultimate-review');?> <span class="dashicons-before dashicons-warning"></span></label><br/>
											<input class="review_text_filed" type="text" id="label-test__<?php echo $metaKey;?>_name" name="<?php echo $display_setting_optionKey;?>[form][<?php echo $metaKey;?>_data][label][name]" value="<?php echo (isset($return_data_display_setting['form'][$metaKey.'_data']['label']['name']) && $return_data_display_setting['form'][$metaKey.'_data']['label']['name'] != '') ? $return_data_display_setting['form'][$metaKey.'_data']['label']['name'] : $inputTitle; ?>" >		
										</div>
										
									</div>
						<?php
								endforeach;	
							endif;
						?>
							
						</td>
                    </tr>
					<!-- Review display settings-->
					<tr>
						<th scope="row">
							<label for="review_shown_per_page"><?php echo esc_html__('Review Display Layout ', 'wp-ultimate-review');?>
							</label>
						</th>
						<td> 
						<?php
							if(is_array($this->controls) AND sizeof($this->controls) > 0):
								// add new element of post date in array
								$this->controls['xs_reviwer_profile_image'] = ['title_name' => 'Reviwer Profile Image', 'type' => 'image', 'require' => 'No', 'options' => []] ;
								$this->controls['post_date'] = ['title_name' => 'Review Date', 'type' => 'date', 'require' => 'No', 'options' => []] ;
								foreach($this->controls AS $metaKey=>$metaValue):
									// Input Title
									$inputTitle = (isset($metaValue) AND is_array($metaValue) AND array_key_exists('title_name', $metaValue)) ? $metaValue['title_name'] : '';
									$inputTitleText = $inputTitle;

									// input id
									$inputId = (isset($metaValue) AND is_array($metaValue) AND array_key_exists('id', $metaValue)) ? $metaValue['id'] : $metaKey;
									
						?>
									<div class="review-switch-section">
										<span class="review-switch-text"><?php echo esc_html__('Enable "'.$inputTitle.'"', 'wp-ultimate-review');?></span>
										<input class="review_switch_button"  onclick="xs_review_show_hide('display_<?php echo $metaKey;?>');" type="checkbox" id="enable_display__<?= $metaKey;?>" name="<?php echo $display_setting_optionKey;?>[form][<?php echo $metaKey;?>_data][display][enable]" value="Yes" <?php echo (isset($return_data_display_setting['form'][$metaKey.'_data']['display']['enable']) && $return_data_display_setting['form'][$metaKey.'_data']['display']['enable'] == 'Yes') ? 'checked' : ''; ?> >	
										<label for="enable_display__<?= $metaKey;?>"  class="review_switch_button_label small"> <?php echo esc_html__('Yes, No ', 'wp-ultimate-review')?></label>
								
									</div>
									
									<?php 
									$displayEnableCLass1 = '';
									if( isset($return_data_display_setting['form'][$metaKey.'_data']['display']['enable']) && $return_data_display_setting['form'][$metaKey.'_data']['display']['enable'] == 'Yes'){
										$displayEnableCLass1 = 'active_tr';
									}
									?>
									
						<?php
								endforeach;	
							endif;
						?>
							
						</td>
                    </tr>
					
                    <tr>
						<th >
						</th>
						<td> 
							<button type="submit" name="display_setting_review_form" class="xs-review-btn primary"><?php echo esc_html__('Save', 'wp-ultimate-review');?></button>
						</td>
					</tr>
                </tbody>
            </table>

        </form> 
    </div>
</div>