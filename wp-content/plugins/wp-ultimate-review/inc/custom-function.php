<?php
if ( ! defined( 'ABSPATH' ) ) die( 'Forbidden' ); 
if( !function_exists('review_kit_rating') ){
	
	function review_kit_rating(  $atts ){
		if (class_exists('\WurReview\App\Content')) {
			$return = \WurReview\App\Content::wur_review_kit_rating( $atts);
			return $return;
		}
	}
}

