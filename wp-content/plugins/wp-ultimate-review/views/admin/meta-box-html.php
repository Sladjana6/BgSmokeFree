
<div class="xs-review-box ratting-update" id="xs-review-box">
    <?php
    // get review post author id
    $xs_author_user = isset($getMetaData->xs_post_author) ? $getMetaData->xs_post_author : $post->post_author;
    if(is_array($this->controls) AND sizeof($this->controls) > 0){
        // meta data from meta table
        foreach($this->controls AS $metaKey=>$metaValue):
             
            // CHeck filed enable
             $checkEnable = (isset($return_data_display_setting['form'][$metaKey]) && $return_data_display_setting['form'][$metaKey] == 'Yes') ? 'Yes' : 'No';
             if($checkEnable === 'Yes'){
              
                $metaData = isset($getMetaData->$metaKey) ? $getMetaData->$metaKey : '';
                
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
                
                // Input Options
                $inputOptions = (isset($metaValue) AND is_array($metaValue) AND array_key_exists('options', $metaValue)) ? $metaValue['options'] : [];
                
                $enableFiled = ['xs_reviwer_ratting', 'xs_reviw_title', 'xs_reviwer_name', 'xs_reviwer_email', 'xs_reviwer_website'];
                $displayFiled = 'display:none;';
                if( in_array($metaKey, $enableFiled) ){
                    $displayFiled = '';
                }
                // post review author changes
                $userStatus = 0;
                
                if(in_array($metaKey, array('xs_reviwer_name', 'xs_reviwer_email'))){
                    if($xs_author_user != 0){
                        $displayFiled = 'display:none;';
                        $userStatus = 1;
                    }
                }
				$review_score_limit = isset($getMetaData->review_score_limit) ? $getMetaData->review_score_limit : '5';
				$reviwerScoreStyle = isset($getMetaData->review_score_style) ? $getMetaData->review_score_style : 'point';
                    if( $inputType == 'select' ){
                    ?>
                    <div class="xs-review xs-<?php echo $inputType;?>" style="<?php echo $displayFiled;?>">
                        <label for="<?php echo $inputId;?>"> <?php echo esc_html__($inputTitle, 'wp-ultimate-review')?>
                            <select name="<?php echo $content_meta_key;?>[<?php echo $inputName;?>]" id="<?php echo $inputId;?>" class="widefat <?php echo $inputClass;?>">
                                <?php
                               for($ratting = 1; $ratting <= $review_score_limit; $ratting++ ):
                                ?>
                                    <option value="<?php echo $ratting;?>" <?php echo ($ratting == $metaData) ? 'selected' : '' ?> > <?php echo $ratting.' '; echo (isset($getMetaData->review_score_style) && $reviwerScoreStyle == 'percentage') ? '%' : $reviwerScoreStyle;?> </option>
                                <?php 
                                   
								endfor;
                                ?>
                            </select>
                        </label>
                    </div>
                    <?php
                    }else if( $inputType == 'radio' OR $inputType == 'checkbox' ){
                    ?>
                    <div class="xs-review xs-<?php echo $inputType;?>" style="<?php echo $displayFiled;?>">
                        <label for="<?php echo $inputId;?>"> <?php echo esc_html__($inputTitle, 'wp-ultimate-review')?></label><br/>
                        <?php
                        for($ratting = 1; $ratting <= $review_score_limit; $ratting++ ):
                        ?>
                            <label for="<?php echo $ratting;?>_label">
                                <input type="<?php echo $inputType;?>" id="<?php echo $ratting;?>_label" class="widefat <?php echo $inputClass;?>" name="<?php echo $content_meta_key;?>[<?php echo $inputName;?>]" value="<?php echo esc_html( $ratting ) ?>" <?php echo ($ratting == $metaData) ? 'checked' : '' ?> />
                                <?php echo $ratting; ?> 
                            </label>   
                        <?php 
                          
					   endfor;
                        ?>
                    </div>
                    <?php
                    }else{
                    ?>
                    <div class="xs-review xs-<?php echo $inputType;?>" style="<?php echo $displayFiled;?>">
                        <label for="<?php echo $inputId;?>"> <?php echo esc_html__($inputTitle, 'wp-ultimate-review')?>
                            <input type="<?php echo $inputType;?>" id="<?php echo $inputId;?>" class="widefat <?php echo $inputClass;?>" name="<?php echo $content_meta_key;?>[<?php echo $inputName;?>]" value="<?php echo esc_html( $metaData ) ?>" />
                        </label>
                    </div>
                <?php }
                if($userStatus == 1){
                    $user_info = get_userdata($xs_author_user);
                    $reviwerName = (isset($user_info->display_name) && strlen($user_info->display_name) > 0) ? $user_info->display_name : $user_info->first_name.' '.$user_info->last_name;
                    $reviwerEmail = isset($user_info->user_email) ? $user_info->user_email : '';
                    $userInfoData = '';
                    if($metaKey == 'xs_reviwer_name'){
                        $userInfoData = '<a href="'.esc_attr(get_edit_user_link( $xs_author_user )).'" target="_blank"> '.$reviwerName.' </a>';
                    }else if($metaKey == 'xs_reviwer_email'){
                        $userInfoData = '<a href="'.esc_attr(get_edit_user_link( $xs_author_user )).'" target="_blank"> '.$reviwerEmail.' </a>';
                    }
                   ?>
                    <div class="xs-review xs-reviwer-title" style="">
                        <?php echo $userInfoData;?>
                    </div>
                    <?php
                }
            
            }
        endforeach;
    }
    $postIdHidden = isset($getMetaData->xs_post_id) ? $getMetaData->xs_post_id : '';
    $postTypeHidden = isset($getMetaData->xs_post_type) ? $getMetaData->xs_post_type : '';
    $review_score_style = isset($getMetaData->review_score_style) ? $getMetaData->review_score_style : 'point';
    $review_score_limit = isset($getMetaData->review_score_limit) ? $getMetaData->review_score_limit : '5';
    $review_score_input = isset($getMetaData->review_score_input) ? $getMetaData->review_score_input : 'start';
    
    ?>
    <input type="hidden" value="<?php echo $postIdHidden;?>" name="<?php echo $content_meta_key;?>[xs_post_id]" />
    <input type="hidden" value="<?php echo $postTypeHidden;?>" name="<?php echo $content_meta_key;?>[xs_post_type]" />
    <input type="hidden" value="<?php echo $xs_author_user;?>" name="<?php echo $content_meta_key;?>[xs_post_author]" />
	<input type="hidden" value="<?php echo $review_score_style;?>" name="<?php echo $content_meta_key;?>[review_score_style]" />
	<input type="hidden" value="<?php echo $review_score_limit;?>" name="<?php echo $content_meta_key;?>[review_score_limit]" />
	<input type="hidden" value="<?php echo $review_score_input;?>" name="<?php echo $content_meta_key;?>[review_score_input]" />
</div>