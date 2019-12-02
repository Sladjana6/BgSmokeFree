<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://ays-pro.com/
 * @since      1.0.0
 *
 * @package    Gallery_Photo_Gallery
 * @subpackage Gallery_Photo_Gallery/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Gallery_Photo_Gallery
 * @subpackage Gallery_Photo_Gallery/public
 * @author     AYS Pro LLC <info@ays-pro.com>
 */
class Gallery_Photo_Gallery_Public {

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $plugin_name       The name of the plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct( $plugin_name, $version ) {

        $this->plugin_name = $plugin_name;
        $this->version = $version;

    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_styles() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Gallery_Photo_Gallery_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Gallery_Photo_Gallery_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_style( 'gpg-fontawesome', 'https://use.fontawesome.com/releases/v5.4.1/css/all.css', array(), $this->version, 'all');
        wp_enqueue_style( $this->plugin_name . "-lightgallery", plugin_dir_url( __FILE__ ) . 'css/lightgallery.min.css', array(), $this->version, 'all' );
        wp_enqueue_style( $this->plugin_name . "-lg-transitions", plugin_dir_url( __FILE__ ) . 'css/lg-transitions.min.css', array(), $this->version, 'all' );
        wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/gallery-photo-gallery-public.css', array(), $this->version, 'all' );
        wp_enqueue_style( 'jquery.mosaic.min.css', plugin_dir_url( __FILE__ ) . 'css/jquery.mosaic.min.css?v=4', array(), $this->version, 'all' );
        wp_enqueue_style( 'masonry.pkgd.css', plugin_dir_url( __FILE__ ) . 'css/masonry.pkgd.css', array(), $this->version, 'all' );
        wp_enqueue_style( 'animate.css', plugin_dir_url( __FILE__ ) . 'css/animate.css', array(), $this->version, 'all' );
    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Gallery_Photo_Gallery_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Gallery_Photo_Gallery_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_script( 'jquery-effects-core' );
        wp_enqueue_script( 'jquery-ui-sortable' );
        wp_enqueue_media();
        wp_enqueue_script( $this->plugin_name.'-imagesloaded.min.js', 'https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js', array( 'jquery' ), $this->version, true );
        wp_enqueue_script( $this->plugin_name.'-picturefill.min.js', plugin_dir_url( __FILE__ ) . 'js/picturefill.min.js', array( 'jquery' ), $this->version, true );
        wp_enqueue_script( $this->plugin_name.'-lightgallery-all.min.js', plugin_dir_url( __FILE__ ) . 'js/lightgallery-all.min.js', array( 'jquery' ), $this->version, true );
        wp_enqueue_script( $this->plugin_name.'-jquery.mousewheel.min.js', plugin_dir_url( __FILE__ ) . 'js/jquery.mousewheel.min.js', array( 'jquery' ), $this->version, true );
        wp_enqueue_script( $this->plugin_name.'-jquery.mosaic.min.js', plugin_dir_url( __FILE__ ) . 'js/jquery.mosaic.min.js', array( 'jquery' ), $this->version, true );
        wp_enqueue_script( $this->plugin_name.'-masonry.pkgd.min.js', plugin_dir_url( __FILE__ ) . 'js/masonry.pkgd.min.js', array( 'jquery' ), $this->version, true );
        wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/gallery-photo-gallery-public.js', array( 'jquery' ), $this->version, true );

    }
    
    public function ays_initialize_gallery_shortcode(){
        add_shortcode( 'gallery_p_gallery', array($this, 'ays_generate_gallery') );
    }

    public function ays_generate_gallery( $attr ){
        
        global $wpdb;
        $id = ( isset($attr['id']) ) ? absint( intval( $attr['id'] ) ) : null;
        
        $gallery = $this->ays_get_gallery_by_id($id);
        if(!$gallery){
            return "[gallery_p_gallery id='".$id."']";
        }
        
        /*
         * Gallery global settings
         */
        $gallery_options = json_decode($gallery['options'],true);
        $gal_lightbox_options = json_decode($gallery['lightbox_options'],true);
        
        $images_loading = ($gallery_options['images_loading'] == '' || $gallery_options['images_loading'] == false) ? 'all_loaded' : $gallery_options['images_loading'];
        $ays_gallery_loader  = (!isset($gallery_options['gallery_loader'])) ? "default" : $gallery_options['gallery_loader'];

        $ays_images_border = (!isset($gallery_options['images_border']) ||
                            $gallery_options['images_border'] == false) ? '' : $gallery_options['images_border'];

        $ays_images_border_width    = (!isset($gallery_options['images_border_width']) ||
                                        $gallery_options['images_border_width'] == false) ? '1' : $gallery_options['images_border_width'];
        $ays_images_border_style    = (!isset($gallery_options['images_border_style']) ||
                                        $gallery_options['images_border_style'] == false) ? 'solid' : $gallery_options['images_border_style'];
        $ays_images_border_color    = (!isset($gallery_options['images_border_color']) ||
                                        $gallery_options['images_border_color'] == false) ? '#000000' : $gallery_options['images_border_color'];

        $ays_images_hover_effect = (!isset($gallery_options['images_hover_effect']) || 
                                    $gallery_options['images_hover_effect'] == '' ||
                                    $gallery_options['images_hover_effect'] == null) ? 'simple' : $gallery_options['images_hover_effect'];
        $ays_images_hover_dir_aware = (!isset($gallery_options['hover_dir_aware']) ||
                                      $gallery_options['hover_dir_aware'] == null ||
                                      $gallery_options['hover_dir_aware'] == "") ? "slide" : $gallery_options['hover_dir_aware'];
        $images_distance = !isset($gallery_options['images_distance']) ? '5' : $gallery_options['images_distance'];  
        $ays_gpg_lightbox_counter = (!isset($gal_lightbox_options['lightbox_counter']) ||
                                    $gal_lightbox_options['lightbox_counter'] == false) ? "true" : $gal_lightbox_options['lightbox_counter'];
        $ays_gpg_lightbox_autoplay = (!isset($gal_lightbox_options['lightbox_autoplay']) ||
                                    $gal_lightbox_options['lightbox_autoplay'] == false) ? "true" : $gal_lightbox_options['lightbox_autoplay'];
        $ays_gpg_lightbox_pause  = (!isset($gal_lightbox_options['lb_pause']) ||
                                    $gal_lightbox_options['lb_pause'] == '') ? "5000" : $gal_lightbox_options['lb_pause'];
        $images_hover_zoom = (!isset($gallery_options['hover_zoom']) ||
                              $gallery_options['hover_zoom'] == '' ||
                              $gallery_options['hover_zoom'] == false) ? 'no' : $gallery_options['hover_zoom'];
        $images_loading = ($gallery_options['images_loading'] == '' || $gallery_options['images_loading'] == false) ? 'all_loaded' : $gallery_options['images_loading'];

        //av
        $gallery_options['enable_light_box'] = isset($gallery_options['enable_light_box']) ? $gallery_options['enable_light_box'] : "off";

        $disable_lightbox = (isset($gallery_options['enable_light_box']) && $gallery_options['enable_light_box'] == "off" || $gallery_options['enable_light_box'] == "") ? true : false;
        
        /*
         * Gallery image settings
         */
        $columns        = (!isset($gallery_options['columns_count'])) ? 3 : $gallery_options['columns_count'];
        $view           = $gallery_options['view_type'];
        $images         = explode( "***", $gallery["images"]        );
        $image_titles   = explode( "***", $gallery["images_titles"] );
        $image_descs    = explode( "***", $gallery["images_descs"]  );
        $image_alts     = explode( "***", $gallery["images_alts"]   );
        $image_urls     = explode( "***", $gallery["images_urls"]   );
        
        if($columns == null || $columns == 0){
            $columns = 3;
        }
        if($images_hover_zoom == "yes"){
            $hover_zoom_In = "$(this).find('img').css({'transform': 'scale(1.15)', 'transition': '.5s ease-in-out'});";
            $hover_zoom_Out = "$(this).find('img').css({'transform': 'scale(1)', 'transition': '.5s ease-in-out'});";
        }else{
            $hover_zoom_In = "";
            $hover_zoom_Out = "";
        }
        switch($view){
            case 'grid':
                $gallery_item_class = ".ays_gallery_container_".$id." div.ays_grid_column_".$id;
                $gallery_view_selector = "#ays_grid_row_".$id;
                $gallery_lightbox_selector = "ays_grid_column_".$id;

                $column_width = 100 / $columns;
                break;
            case 'mosaic':                        
                $gallery_item_class = ".ays_gallery_container_".$id." .ays_mosaic_column_item_".$id;
                $gallery_view_selector = "#ays_mosaic_".$id;
                $gallery_lightbox_selector = "ays_mosaic_column_item_".$id;
                $column_width = 100 / $columns;
                break;
            case 'masonry':                        
                $gallery_item_class = ".ays_gallery_container_".$id." .ays_masonry_item_".$id;
                $gallery_view_selector = "#ays_masonry_grid_".$id;
                $gallery_lightbox_selector = "ays_masonry_item_".$id;
                $column_width = 100 / $columns;
                break;
            default:
                $gallery_item_class = ".ays_gallery_container_".$id." div.ays_grid_column_".$id;
                $gallery_view_selector = "#ays_grid_row_".$id;
                $gallery_lightbox_selector = "ays_grid_column_".$id;

                $column_width = 100 / $columns;
                break;
        }
        $hover_effect__simple_js = "";
        $ays_hover_dir_aware_js = "";
        if($ays_images_hover_effect == "simple"){
            $hover_effect = (!isset($gallery_options['hover_effect']) || $gallery_options['hover_effect'] == null) ? "fadeIn" : $gallery_options['hover_effect'];
            $hover_out_effect = str_replace("In", "Out", $hover_effect);
            $hover_effect__simple_js = "$(document).find('$gallery_item_class').hover(function(){
                                            $(this).find('.ays_hover_mask').css('animation-name', '".$hover_effect."');
                                            $(this).find('.ays_hover_mask').css('animation-duration', '.5s');
                                            $(this).find('.ays_hover_mask').css('opacity', '1');
                                            $hover_zoom_In
                                        }, 
                                        function(){
                                            $(this).find('.ays_hover_mask').css('animation-name', '".$hover_out_effect."');
                                            $(this).find('.ays_hover_mask').css('animation-duration', '.5s');
                                            $(this).find('.ays_hover_mask').css('opacity', '0');
                                            $hover_zoom_Out
                                        });";
        }elseif($ays_images_hover_effect == "dir_aware"){
            $ays_hover_dir_aware_js = "";
            
            if($ays_images_hover_dir_aware == "slide"){
                $ays_hover_dir_aware_js .= "
                $(document).find('$gallery_item_class').hover(function(e){
                                var ays_x = e.pageX - this.offsetLeft;
                                var ays_y = e.pageY - this.offsetTop;
                                var ays_edge = ays_closestEdge(ays_x,ays_y,this.clientWidth, this.clientHeight);
                                var ays_overlay = $(this).find('.ays_hover_mask');
                                var ays_hover_dir = ays_getDirectionKey(e, e.currentTarget);
                                switch(ays_edge) {
                                     case 'top':
                                        ays_overlay.css('display', 'flex');
                                        ays_overlay.css('animation', 'slideInDown .3s');$hover_zoom_In
                                     break;
                                     case 'right':
                                        ays_overlay.css('display', 'flex')
                                        ays_overlay.css('animation', 'slideInRight .3s');$hover_zoom_In
                                     break;
                                     case 'bottom':
                                        ays_overlay.css('display', 'flex')
                                        ays_overlay.css('animation', 'slideInUp .3s');$hover_zoom_In
                                     break;
                                     case 'left':
                                        ays_overlay.css('display', 'flex')
                                        ays_overlay.css('animation', 'slideInLeft .3s');$hover_zoom_In
                                     break;
                                }
                            },
                           function(e){
                                var ays_x = e.pageX - this.offsetLeft;
                                var ays_y = e.pageY - this.offsetTop;
                                var ays_edge = ays_closestEdge(ays_x,ays_y,this.clientWidth, this.clientHeight);
                                var ays_overlay = $(this).find('.ays_hover_mask');
                                var ays_hover_dir = ays_getDirectionKey(e, e.currentTarget);
                                    switch(ays_edge) {
                                 case 'top':
                                    ays_overlay.css('animation', 'slideOutUp .3s');$hover_zoom_Out
                                    setTimeout( function(){ ays_overlay.css('display', 'none');}, 250);
                                 break;
                                 case 'right':
                                    ays_overlay.css('animation', 'slideOutRight .3s');$hover_zoom_Out
                                    setTimeout( function(){ ays_overlay.css('display', 'none');}, 250);
                                 break;
                                 case 'bottom':
                                    ays_overlay.css('animation', 'slideOutDown .3s');$hover_zoom_Out
                                    setTimeout( function(){ ays_overlay.css('display', 'none');}, 250);
                                 break;
                                 case 'left':
                                    ays_overlay.css('animation', 'slideOutLeft .3s');$hover_zoom_Out
                                    setTimeout( function(){ ays_overlay.css('display', 'none'); }, 250);
                                 break;
                            }
                        });";
            }elseif($ays_images_hover_dir_aware == "rotate3d"){
                $ays_hover_dir_aware_js .= "
                            $(document).find('$gallery_item_class').hover(function(e){
                                var ays_x = e.pageX - this.offsetLeft;
                                var ays_y = e.pageY - this.offsetTop;
                                var ays_edge = ays_closestEdge(ays_x,ays_y,this.clientWidth, this.clientHeight);
                                var ays_overlay = $(this).find('div.ays_hover_mask');
                                var ays_hover_dir = ays_getDirectionKey(e, e.currentTarget);
                                        switch(ays_edge) {
                                     case 'top':
                                        ays_overlay.css('display', 'flex');
                                        ays_overlay.attr('class', 'ays_hover_mask animated in-top');$hover_zoom_In
                                     break;
                                     case 'right':
                                        ays_overlay.css('display', 'flex')
                                        ays_overlay.attr('class', 'ays_hover_mask animated in-right');$hover_zoom_In
                                     break;
                                     case 'bottom':
                                        ays_overlay.css('display', 'flex')
                                        ays_overlay.attr('class', 'ays_hover_mask animated in-bottom');$hover_zoom_In
                                     break;
                                     case 'left':
                                        ays_overlay.css('display', 'flex')
                                        ays_overlay.attr('class', 'ays_hover_mask animated in-left');$hover_zoom_In
                                     break;
                                }

                            },
                           function(e){
                                var ays_x = e.pageX - this.offsetLeft;
                                var ays_y = e.pageY - this.offsetTop;
                                var ays_edge = ays_closestEdge(ays_x,ays_y,this.clientWidth, this.clientHeight);
                                var ays_overlay = $(this).find('div.ays_hover_mask');
                                var ays_hover_dir = ays_getDirectionKey(e, e.currentTarget);
                                    switch(ays_edge) {
                                 case 'top':
                                    ays_overlay.attr('class', 'ays_hover_mask animated out-top');$hover_zoom_Out
                                    setTimeout( function(){ ays_overlay.css('opacity', '0');}, 350);
                                 break;
                                 case 'right':
                                    ays_overlay.attr('class', 'ays_hover_mask animated out-right');$hover_zoom_Out
                                    setTimeout( function(){ ays_overlay.css('opacity', '0');}, 350);
                                 break;
                                 case 'bottom':
                                    ays_overlay.attr('class', 'ays_hover_mask animated out-bottom');$hover_zoom_Out
                                    setTimeout( function(){ ays_overlay.css('opacity', '0');}, 350);
                                 break;
                                 case 'left':
                                    ays_overlay.attr('class', 'ays_hover_mask animated out-left');$hover_zoom_Out
                                    setTimeout( function(){ ays_overlay.css('opacity', '0'); }, 570);
                                 break;
                            }
                        });";
            }
        }
        
        if($images_loading == 'all_loaded'){
            $ays_gal_loader_display = "display: block";           
            $ays_images_all_loaded = "<div class='gpg_loader_".$id."'>
                    <img src='".AYS_GPG_PUBLIC_URL."images/$ays_gallery_loader.svg'>
                </div>";
            $ays_gal_loader_class = ".gpg_loader_".$id."";
        }else{
            $ays_images_all_loaded = '';
            $ays_gal_loader_display = "display: none";
        }
        
        if($images_loading == 'current_loaded'){
            $ays_gpg_lazy_load = "
            var this_image_load_counter = 0;
            $(document).find('.ays_gallery_container_".$id." .$gallery_lightbox_selector > img').each(function(e, img){
                var this_image = $(this);
                this_image.attr('src', aysGalleryImages_".$id."[e]);
                if(img.complete){
                    this_image.parent().find('.ays_image_loading_div').css({
                        'opacity': '1',
                        'animation-name': 'fadeOutDown',
                        'animation-duration': '1.2s',
                    });
                    setTimeout(function(){
                        this_image.parent().find('.ays_image_loading_div').css({
                            'display': 'none'
                        });                                  
                        this_image.parent().find('div.ays_hover_mask').css({
                            'display': 'flex'
                        });
                        this_image.css({
                            'opacity': '1',
                            'display': 'block',
                            'animation': 'fadeInRight .5s',
                            'z-index': 10000,
                        });
                        if(e === this_image_load_counter){
                            setTimeout(function(){
                                $(document).find('.ays_gallery_container_".$id." .mosaic_".$id."').Mosaic({
                                    innerGap: {$images_distance},
                                    refitOnResize: true,
                                    showTailWhenNotEnoughItemsForEvenOneRow: true,
                                    maxRowHeight: 250,
                                    maxRowHeightPolicy: 'tail'
                                });
                                aysgrid_".$id.".masonry('layout');
                                $(window).trigger('resize');
                            },400);
                        }
                        this_image_load_counter++;
                    }, 400);
                
                    if(e === this_image_load_counter){
                        setTimeout(function(){
                            $(document).find('.ays_gallery_container_".$id." .mosaic_".$id."').Mosaic({
                                innerGap: {$images_distance},
                                refitOnResize: true,
                                showTailWhenNotEnoughItemsForEvenOneRow: true,
                                maxRowHeight: 250,
                                maxRowHeightPolicy: 'tail'
                            });
                            aysgrid_".$id.".masonry('layout');
                            $(window).trigger('resize');
                        },400);
                    }
                }else{                        
                    img.onload = function(){
                        this_image.parent().find('.ays_image_loading_div').css({
                            'opacity': '1',
                            'animation-name': 'fadeOutDown',
                            'animation-duration': '1.2s',
                        });
                        setTimeout(function(){
                            this_image.parent().find('.ays_image_loading_div').css({
                                'display': 'none'
                            });                                  
                            this_image.parent().find('div.ays_hover_mask').css({
                                'display': 'flex'
                            });
                            this_image.css({
                                'opacity': '1',
                                'display': 'block',
                                'animation': 'fadeInUp .5s',
                                'z-index': 10000,
                            });
                            if(e === this_image_load_counter){
                                setTimeout(function(){
                                    $(document).find('.ays_gallery_container_".$id." .mosaic_".$id."').Mosaic({
                                        innerGap: {$images_distance},
                                        refitOnResize: true,
                                        showTailWhenNotEnoughItemsForEvenOneRow: true,
                                        maxRowHeight: 250,
                                        maxRowHeightPolicy: 'tail'
                                    });
                                    aysgrid_".$id.".masonry('layout');
                                    $(window).trigger('resize');
                                    var ays_gallery_containers = $(document).find('.ays_gallery_container_".$id."');
                                    ays_gallery_containers.css({
                                       position: 'static'
                                    });
                                    ays_gallery_containers.parents().each(function(){
                                        if($(this).css('position') == 'relative'){
                                            $(this).css({
                                                position: 'static'
                                            });
                                        }
                                    });
                                },400);
                                setTimeout(function(){
                                    $(document).find('.ays_gallery_container_".$id." .mosaic_".$id."').Mosaic({
                                        innerGap: {$images_distance},
                                        refitOnResize: true,
                                        showTailWhenNotEnoughItemsForEvenOneRow: true,
                                        maxRowHeight: 250,
                                        maxRowHeightPolicy: 'tail'
                                    });
                                    $(window).trigger('resize');
                                },2000);
                            }
                            this_image_load_counter++;
                        }, 400);
                
                    }
                }
            });";
            $ays_gpg_container_display_none_js = "";
            $ays_gpg_container_display_block_js = "";
            $ays_gpg_container_error_message_js = "";
            $ays_gal_loader_display_js = "";
            $ays_gal_loader_none_js = "";
            $ays_gpg_container_css = "display: block;";
            $ays_images_lazy_loader_css = ".ays_gallery_container_".$id." .ays_image_loading_div {
                                                display: flex;
                                            }";
            $ays_gpg_lazy_load_masonry = "aysgrid.masonry('layout');";
            $ays_gpg_lazy_load_mosaic = "$(document).find('.ays_gallery_container_".$id." .mosaic_".$id."').Mosaic({
                                            innerGap: {$images_distance},
                                            refitOnResize: true,
                                            showTailWhenNotEnoughItemsForEvenOneRow: true,
                                            maxRowHeight: 250,
                                            maxRowHeightPolicy: 'tail'
                                        });";
            $ays_gpg_lazy_load_mosaic_css = ".ays_mosaic_column_item_".$id." a>img {
                                                opacity: 0;
                                             }
                                             .ays_mosaic_column_item_".$id." a div.ays_hover_mask {
                                                display: none;
                                             }";
        }else{        
            $ays_gpg_lazy_load = '';
            $ays_gpg_container_display_none_js = "$(document).find('.ays_gallery_container_".$id."').css({'display': 'none'});";
            
            $ays_gal_loader_display_js = "$(document).find('".$ays_gal_loader_class."').css({'display': 'flex', 'animation-name': 'fadeIn'});";
            $ays_gal_loader_none_js = "$(document).find('".$ays_gal_loader_class."').css({'display': 'none', 'animation-name': 'fadeOut'});";
            $ays_gpg_container_display_block_js = "$(document).find('.ays_gallery_container_".$id."').css({'display': 'block', 'animation-name': 'fadeIn'});";
            $ays_gpg_container_error_message_js = "$(document).find('.ays_gallery_container_".$id."').prepend(errorImage);";
            $ays_gpg_container_css = "display: none;";
            $ays_images_lazy_loader_css = ".ays_gallery_container_".$id." .ays_image_loading_div {
                                                display: none;
                                            }";
            $ays_gpg_lazy_load_masonry = "";
            $ays_gpg_lazy_load_mosaic = "";
            $ays_gpg_lazy_load_mosaic_css = "";
        }        
        $gallery_view = $ays_images_all_loaded;
        $gallery_view .= "<script>
                            (function($){
                                'use strict';
                                $(document).ready(function(){
                                   var ays_gallery_containers = document.getElementsByClassName('ays_gallery_container_".$id."');
                                   var ays_gallery_container_".$id.";
                                   for(var ays_i = 0; ays_i < ays_gallery_containers.length; ays_i++){
                                       do{
                                            ays_gallery_container_".$id." = ays_gallery_containers[ays_i].parentElement.parentElement;
                                        }
                                        while(ays_gallery_container_".$id.".style.position === 'relative');
                                        ays_gallery_container_".$id.".style.position = 'static';
                                    }
                                });
                            })(jQuery);
                        </script>
                        <style>
                            
                            $ays_images_lazy_loader_css
                            
                            .ays_gallery_container_".$id." {
                                $ays_gpg_container_css
                            }
                            $ays_gpg_lazy_load_mosaic_css
                            .gpg_gal_loader_".$id." {
                                $ays_gal_loader_display
                                justify-content: center;
                                align-items: center;
                                animation-duration: .5s;
                                transition: .5s ease-in-out;
                                margin-bottom: 20px;
                                width: 50px;
                                height: 50px;
                                margin: auto !important;
                            }
                            .gpg_loader_".$id." {
                                $ays_gal_loader_display
                                justify-content: center;
                                align-items: center;
                                height: 100%;
                                animation-duration: .5s;
                                transition: .5s ease-in-out;
                                margin-bottom: 20px;
                            }
                            
                        </style>";
        if($ays_images_border === "on"){
            $show_images_with_border = "border: ".$ays_images_border_width."px ".$ays_images_border_style." ".$ays_images_border_color.";";
            $show_mosaic_border_js = "setTimeout(function(){
                                $(document).find('.ays_gallery_container_".$id." .mosaic_".$id." .ays_mosaic_column_item_".$id."').css('border', '".$ays_images_border_width."px ".$ays_images_border_style." ".$ays_images_border_color."');
                            }, 500);";
        }else{
            $show_images_with_border = "border: none";
            $show_mosaic_border_js = "";
        }
        $gallery_view .= "<div class='ays_gallery_body_".$id."'>";
            if($images_loading == 'current_loaded'){
                $gallery_view .= $this->ays_get_gallery_content($gallery, $gallery_options, $gal_lightbox_options, $id);
            }
        $gallery_view .= "</div>
        <script>
        (function($){";
            if($images_loading == 'all_loaded'){
                $gallery_view .= "
            $(document).ready(function(){
                setTimeout(function(ev){
                    var aysGalleryContent_".$id." = $(\"".$this->ays_get_gallery_content($gallery, $gallery_options, $gal_lightbox_options, $id)."\");
                    $(document).find('.ays_gallery_body_".$id."').append(aysGalleryContent_".$id."); 
                    $( window ).resize(function() {
                        $(document).find('.mosaic_".$id."').Mosaic({
                            innerGap: {$images_distance},
                            refitOnResize: true,
                            showTailWhenNotEnoughItemsForEvenOneRow: true,
                            maxRowHeight: 250,
                            maxRowHeightPolicy: 'tail'
                        });
                    });
                    $hover_effect__simple_js
                    $ays_hover_dir_aware_js
                    $(document).find('.$gallery_lightbox_selector').on('mouseover', function(){
                        if($(this).find('.ays_hover_mask .ays_image_title').length != 0){
                            $(this).find('.ays_hover_mask>div:first-child').css('margin-bottom', '40px');
                        }
                    });
                    $(document).find('.$gallery_lightbox_selector div.ays_hover_mask').find('.ays_image_url').on('click', function(e){
                        setTimeout(function(){
                            $(document).find('.lg-close.lg-icon').trigger('click');
                        },450);
                        window.open($(this).attr('data-url'),'_blank');
                    });
                    $ays_gal_loader_display_js
                    var aysgrid_".$id." = $('#ays_masonry_grid_".$id."').masonry({  
                        percentPosition: false,
                        itemSelector: '.ays_masonry_grid-item',
                        columnWidth: '.ays_masonry_item_".$id."',
                        transitionDuration: '.8s',
                        gutter: {$images_distance},
                        
                    });

                    $ays_gpg_lazy_load
                    $ays_gpg_lazy_load_mosaic

                    setTimeout(function(){
                        $(document).find('.ays_gallery_container_".$id." .mosaic_".$id."').Mosaic({
                            innerGap: {$images_distance},
                            refitOnResize: true,
                            showTailWhenNotEnoughItemsForEvenOneRow: true,
                            maxRowHeight: 250,
                            maxRowHeightPolicy: 'tail'
                        });
                        aysgrid_".$id.".masonry('layout');
                    },300);";
                    
                    if($disable_lightbox){
                       $gallery_view .= "$(document).find('$gallery_view_selector').lightGallery({
                            selector: '.$gallery_lightbox_selector',
                            share: false,
                            hash: false,
                            fullScreen: false,
                            autoplay: false,
                            pause: $ays_gpg_lightbox_pause,
                            mousewheel: false,
                            keyPress: false,
                            actualSize: false,
                            pager: false,
                            download: false,
                            autoplayControls: $ays_gpg_lightbox_autoplay,
                            counter: $ays_gpg_lightbox_counter,
                            showThumbByDefault: false,
                            getCaptionFromTitleOrAlt: false,
                            subHtmlSelectorRelative: true
                        });";
                    }
                    $gallery_view .= "$(document).find('.ays_gallery_container_".$id."').imagesLoaded()
                        .done( function( instance ){
                            $ays_gpg_container_display_block_js
                            $ays_gal_loader_none_js
                            $(document).find('.ays_gallery_container_".$id." .mosaic_".$id."').Mosaic({
                                innerGap: {$images_distance},
                                refitOnResize: true,
                                showTailWhenNotEnoughItemsForEvenOneRow: true,
                                maxRowHeight: 250,
                                maxRowHeightPolicy: 'tail'
                            });
                            setTimeout(function(){
                                aysgrid_".$id.".masonry('layout');
                            },300);
                            var ays_gallery_containers = $(document).find('.ays_gallery_container_".$id."');
                            ays_gallery_containers.css({
                               position: 'static'
                            });
                            $show_mosaic_border_js
                            $(window).trigger('resize');
                        })
                        .fail( function() {
                            var errorImage = $('<div><p>".__("Some of the images haven\'t been loaded", $this->plugin_name)."</p></div>');
                            $ays_gpg_container_error_message_js
                            $ays_gpg_container_display_block_js
                            $ays_gal_loader_none_js
                            $(document).find('.ays_masonry_item_".$id.">img, .ays_mosaic_column_item_".$id.">img, .ays_grid_column_".$id.">img').each(function(e, img){
                                if(img.getAttribute('src') == '' || img.getAttribute('src') == undefined){
                                    $(this).css('display', 'none');
                                    $(this).parent().find('.ays_hover_mask').remove();
                                    $(this).parent().find('.ays_image_loading_div').css({
                                        'opacity': '1',
                                        'animation-name': 'tada',
                                        'animation-duration': '.5s',
                                        'display': 'block',
                                        'padding-top': 'calc(".(($view == 'grid')?100:50)."% - 25px)',
                                    });
                                    $(this).parent().find('.ays_image_loading_div').find('img').css('position', 'static');
                                    $(this).parent().find('.ays_image_loading_div').find('img').attr('src', '".AYS_GPG_PUBLIC_URL."/images/error-404.png');
                                    var ays_err_massage = $('<span>Image not found!</span>');
                                    var img_parent = $(this).parent().find('.ays_image_loading_div').eq(0);
                                    img_parent.append(ays_err_massage);
                                    ".
                                    (($view == 'masonry')?"$(this).parent().css('height', '200px');":"")
                                    ."$(this).remove();
                                }
                            });
                            setTimeout(function(){
                                aysgrid_".$id.".masonry('layout');                                
                                $(window).trigger('resize');
                            },300);
                        });
                    },1000);
                });";
            }else{
                $gallery_view .= "
                window.addEventListener('load', function(e){
                    setTimeout(function(){
                    var aysGalleryImages_".$id." = JSON.parse(atob(options.galleryImages[0]));
                    $( window ).resize(function() {
                        $(document).find('.mosaic_".$id."').Mosaic({
                            innerGap: {$images_distance},
                            refitOnResize: true,
                            showTailWhenNotEnoughItemsForEvenOneRow: true,
                            maxRowHeight: 250,
                            maxRowHeightPolicy: 'tail'
                        });
                    });
                    $hover_effect__simple_js
                    $ays_hover_dir_aware_js
                    $(document).find('.$gallery_lightbox_selector').on('mouseover', function(){
                        if($(this).find('.ays_hover_mask .ays_image_title').length != 0){
                            $(this).find('.ays_hover_mask>div:first-child').css('margin-bottom', '40px');
                        }
                    });
                    $(document).find('.$gallery_lightbox_selector div.ays_hover_mask').find('.ays_image_url').on('click', function(e){
                        setTimeout(function(){
                            $(document).find('.lg-close.lg-icon').trigger('click');
                        },450);
                        window.open($(this).attr('data-url'),'_blank');
                    });
                    var aysgrid_".$id." = $('#ays_masonry_grid_".$id."').masonry({
                        percentPosition: false,
                        itemSelector: '.ays_masonry_grid-item',
                        columnWidth: '.ays_masonry_item_".$id."',
                        transitionDuration: '.8s',
                        gutter: {$images_distance},

                    });
                    $ays_gal_loader_display_js
                    $ays_gpg_lazy_load
                    $ays_gpg_lazy_load_mosaic";

                   if($disable_lightbox){
                       $gallery_view .= "$(document).find('$gallery_view_selector').lightGallery({
                            selector: '.$gallery_lightbox_selector',
                            share: false,
                            hash: false,
                            fullScreen: false,
                            autoplay: false,
                            pause: $ays_gpg_lightbox_pause,
                            mousewheel: false,
                            keyPress: false,
                            actualSize: false,
                            pager: false,
                            download: false,
                            autoplayControls: $ays_gpg_lightbox_autoplay,
                            counter: $ays_gpg_lightbox_counter,
                            showThumbByDefault: false,
                            getCaptionFromTitleOrAlt: false,
                            subHtmlSelectorRelative: true
                        });";

                   }
                $gallery_view .= "},1000);
                }, false);";
            }
        $gallery_view .= "
            })(jQuery);
        </script>";
        return $gallery_view;
    }

    public function ays_get_gallery_by_id( $id ) {
        global $wpdb;

        $sql = "SELECT * FROM {$wpdb->prefix}ays_gallery WHERE id={$id}";

        $result = $wpdb->get_row( $sql, "ARRAY_A" );

        return $result;
    }
    
    protected function ays_get_gallery_content($gallery, $gallery_options, $gal_lightbox_options, $id){
        global $wpdb;
//        $gallery_options = json_decode($gallery['options'],true);
//        $gal_lightbox_options = json_decode($gallery['lightbox_options'],true);
        $width = $gallery["width"];
        $title = $gallery["title"];
        $description = $gallery["description"];
        $custom_css = ($gallery['custom_css'] == '' || $gallery['custom_css'] === false) ? '' : $gallery["custom_css"];
        $hover_opacity = ($gallery_options['hover_opacity'] == '' || $gallery_options['hover_opacity'] === false) ? '0.5' : $gallery_options['hover_opacity'];
        $image_sizes = ($gallery_options['image_sizes'] == '' || $gallery_options['image_sizes'] === false) ? 'full_size' : $gallery_options['image_sizes'];
        $lightbox_color = ($gallery_options['lightbox_color'] == '' || $gallery_options['lightbox_color'] === false) ? '#27AE60' : $gallery_options['lightbox_color'];
        $images_orderby = ($gallery_options['images_orderby'] == '' || $gallery_options['images_orderby'] === false) ? 'noordering' : $gallery_options['images_orderby'];
        $ays_hover_icon = ($gallery_options['hover_icon'] == '' || $gallery_options['hover_icon'] == false) ? 'search_plus' : $gallery_options['hover_icon'];
        $show_title = ($gallery_options['show_title'] == '' || $gallery_options['show_title'] == false) ? '' : $gallery_options['show_title'];
        $show_title_on = ($gallery_options['show_title_on'] == '' || $gallery_options['show_title_on'] == false) ? 'gallery_image' : $gallery_options['show_title_on'];
        $show_with_date = ($gallery_options['show_with_date'] == '' || $gallery_options['show_with_date'] == false) ? '' : $gallery_options['show_with_date'];
        $images_distance = !isset($gallery_options['images_distance']) ? '5' : $gallery_options['images_distance'];
        
        $images_loading = ($gallery_options['images_loading'] == '' || $gallery_options['images_loading'] == false) ? 'all_loaded' : $gallery_options['images_loading'];
        
        $ays_gallery_loader  = (!isset($gallery_options['gallery_loader'])) ? "flower" : $gallery_options['gallery_loader'];
        
        $ays_thumb_height_mobile  = (!isset($gallery_options['thumb_height_mobile'])) ? "170" : $gallery_options['thumb_height_mobile'];
        $ays_thumb_height_desktop  = (!isset($gallery_options['thumb_height_desktop'])) ? "260" : $gallery_options['thumb_height_desktop'];
        
        $images_b_radius = (!isset($gallery_options['border_radius']) ||
                            $gallery_options['border_radius'] == '' ||
                            $gallery_options['border_radius'] == false) ? '0' : $gallery_options['border_radius'];
        $images_hover_icon_size = (!isset($gallery_options['hover_icon_size']) ||
                            $gallery_options['hover_icon_size'] == '' ||
                            $gallery_options['hover_icon_size'] == '0') ? '20' : $gallery_options['hover_icon_size'];
        $ays_images_border = (!isset($gallery_options['images_border']) ||
                            $gallery_options['images_border'] == false) ? '' : $gallery_options['images_border'];

        $ays_images_border_width    = (!isset($gallery_options['images_border_width']) ||
                                        $gallery_options['images_border_width'] == false) ? '1' : $gallery_options['images_border_width'];
        $ays_images_border_style    = (!isset($gallery_options['images_border_style']) ||
                                        $gallery_options['images_border_style'] == false) ? 'solid' : $gallery_options['images_border_style'];
        $ays_images_border_color    = (!isset($gallery_options['images_border_color']) ||
                                        $gallery_options['images_border_color'] == false) ? '#000000' : $gallery_options['images_border_color'];
        
        $ays_gpg_lightbox_counter = (!isset($gal_lightbox_options['lightbox_counter']) ||
                                    $gal_lightbox_options['lightbox_counter'] == false) ? "true" : $gal_lightbox_options['lightbox_counter'];
        $ays_gpg_lightbox_autoplay = (!isset($gal_lightbox_options['lightbox_autoplay']) ||
                                    $gal_lightbox_options['lightbox_autoplay'] == false) ? "true" : $gal_lightbox_options['lightbox_autoplay'];
        $ays_gpg_lightbox_pause  = (!isset($gal_lightbox_options['lb_pause']) ||
                                    $gal_lightbox_options['lb_pause'] == '') ? "5000" : $gal_lightbox_options['lb_pause'];
        $ays_show_caption = true;
        if(isset($gal_lightbox_options['lb_show_caption'])){
            switch($gal_lightbox_options['lb_show_caption']){
                case "true":
                    $ays_show_caption = true;
                break;
                case "false":
                    $ays_show_caption = false;
                break;
            }
        }
        
//        $lightbox_color_rgba = hexdec(trim($lightbox_color, '#'));s
        
        $show_gal_title = (!isset($gallery_options['show_gal_title'])) ? 'on' : $gallery_options['show_gal_title'];
        $show_gal_desc = (!isset($gallery_options['show_gal_desc'])) ? 'on' : $gallery_options['show_gal_desc'];
        
        $lightbox_color_rgba = $this->hex2rgba($lightbox_color, 0.5);
        
        $columns        = (!isset($gallery_options['columns_count'])) ? 3 : $gallery_options['columns_count'];
        $view           = $gallery_options['view_type'];
        $images         = explode( "***", $gallery["images"]        );
        $image_titles   = explode( "***", $gallery["images_titles"] );
        $image_descs    = explode( "***", $gallery["images_descs"]  );
        $image_alts     = explode( "***", $gallery["images_alts"]   );
        $image_urls     = explode( "***", $gallery["images_urls"]   );
        
        $ays_width = $width == 0 ? '100%' : $width.'px'; 

        if($columns == null || $columns == 0){
            $columns = 3;
        }
        switch($view){
            case 'grid':
                $gallery_item_class = ".ays_gallery_container_".$id." div.ays_grid_column_".$id;
                $gallery_view_selector = "#ays_grid_row_".$id;
                $gallery_lightbox_selector = "ays_grid_column_".$id;
                $column_width = (100 / $columns);
                break;
            case 'mosaic':
                $gallery_item_class = ".ays_gallery_container_".$id." .ays_mosaic_column_item_".$id;
                $gallery_view_selector = "#ays_mosaic_".$id;
                $gallery_lightbox_selector = "ays_mosaic_column_item_".$id;
                $column_width = 100 / $columns;
                break;
            case 'masonry':
                $gallery_item_class = ".ays_gallery_container_".$id." .ays_masonry_item_".$id;
                $gallery_view_selector = "#ays_masonry_grid_".$id;
                $gallery_lightbox_selector = "ays_masonry_item_".$id;
                $column_width = 100 / $columns;
                break;
            default:
                $gallery_item_class = ".ays_gallery_container_".$id." div.ays_grid_column_".$id;
                $gallery_view_selector = "#ays_grid_row_".$id;
                $gallery_lightbox_selector = "ays_grid_column_".$id;
                $column_width = 100 / $columns;
                break;
        }
        if($gallery["images_dates"] == '' || $gallery["images_dates"] == null){
            $image_dates = array();
            for($i=0; $i < count($images); $i++){
                $image_dates[] = time();
            }
        }else{
            $image_dates = explode( "***", $gallery["images_dates"]  );
        }
        
        if($image_dates == ''){
            $image_dates = array();
            for($i=0; $i < count($images); $i++){
                $image_dates[] = time();
            }
        }
        
        switch($ays_hover_icon){
            case 'search_plus':
                $hover_icon = "<i class='ays_fa ays_fa_for_gallery ays_fa_search_plus'></i>";
                break;
            case 'search':
                $hover_icon = "<i class='ays_fa ays_fa_for_gallery ays_fa_search'></i>";
                break;
            case 'plus':
                $hover_icon = "<i class='ays_fa ays_fa_for_gallery ays_fa_plus'></i>";
                break;
            case 'plus_circle':
                $hover_icon = "<i class='ays_fa ays_fa_for_gallery ays_fa_plus_circle'></i>";
                break;
            case 'plus_square_fas': 
                $hover_icon = "<i class='ays_fa ays_fa_for_gallery ays_fa_plus_square_fas'></i>";
                break;
            case 'plus_square_far':
                $hover_icon = "<i class='ays_fa ays_fa_for_gallery ays_fa_plus_square_far'></i>";
                break;
            case 'expand':
                $hover_icon = "<i class='ays_fa ays_fa_for_gallery ays_fa_expand'></i>";
                break;
            case 'image_fas':
                $hover_icon = "<i class='ays_fa ays_fa_for_gallery ays_fa_image_fas'></i>";
                break;
            case 'image_far':
                $hover_icon = "<i class='ays_fa ays_fa_for_gallery ays_fa_image_far'></i>";
                break;
            case 'images_fas':
                $hover_icon = "<i class='ays_fa ays_fa_for_gallery ays_fa_images_fas'></i>";
                break;
            case 'images_far':
                $hover_icon = "<i class='ays_fa ays_fa_for_gallery ays_fa_images_far'></i>";
                break;
            case 'eye_fas':
                $hover_icon = "<i class='ays_fa ays_fa_for_gallery ays_fa_eye_fas'></i>";
                break;
            case 'eye_far':
                $hover_icon = "<i class='ays_fa ays_fa_for_gallery ays_fa_eye_far'></i>";
                break;
            case 'camera_retro':
                $hover_icon = "<i class='ays_fa ays_fa_for_gallery ays_fa_camera_retro'></i>";
                break;
            case 'camera':
                $hover_icon = "<i class='ays_fa ays_fa_for_gallery ays_fa_camera'></i>";
                break;
            default:
                $hover_icon = "<i class='ays_fa ays_fa_for_gallery ays_fa_search_plus'></i>";
                break;
        }
        
        $ays_images_loader = "<img src='".AYS_GPG_PUBLIC_URL."images/$ays_gallery_loader.svg'>";
        switch($images_orderby){
            case 'title':
                array_multisort($image_titles, SORT_ASC, SORT_STRING, $images, $image_descs, $image_alts, $image_urls, $image_dates);
                break;
            case 'date':
                array_multisort($image_dates, SORT_ASC, SORT_NUMERIC, $images, $image_titles, $image_descs, $image_alts, $image_urls);
                break;
            case 'random':
                $images_indexes = range(0, count($images)-1);
                shuffle($images_indexes);
                array_multisort($images_indexes, $images, $image_titles, $image_descs, $image_alts, $image_urls, $image_dates);
                break;
        }
        $images_new     = array();
        $this_site_path = trim(get_site_url(), "https:");
        foreach($images as $i => $img){
            if(strpos(trim($img, "https:"), $this_site_path) !== false){ 
                $query = "SELECT * FROM `".$wpdb->prefix."posts` WHERE `post_type` = 'attachment' AND `guid` = '".$img."'";
                $result_img =  $wpdb->get_results( $query, "ARRAY_A" );
                $url_img = wp_get_attachment_image_src($result_img[0]['ID'], $image_sizes);
                if($url_img === false){
                   $images_new[] = $img;
                }else{
                   $images_new[] = $url_img[0];
                }
            }else{
                $images_new[] = $img;
            }
        }
        $images_count = count($images);
        
        if($show_gal_title == "on"){
            $show_gallery_title = "<h2 class='ays_gallery_title'>" . stripslashes($title) . "</h2>";
        }else{
            $show_gallery_title = "";
        }
        if($show_gal_desc == "on"){
            $show_gallery_desc = "<h4 class='ays_gallery_description'>" . stripslashes($description) . "</h4>";
        }else{
            $show_gallery_desc = "";
        }
        if($show_gal_title != "on" && $show_gal_desc != "on"){
            $show_gallery_head = "";
        }else{
            $show_gallery_head = "<div class='ays_gallery_header'>
                                    $show_gallery_title
                                    $show_gallery_desc
                                </div>";
        }
        if($ays_images_border === "on"){
            $show_images_with_border = "border: ".$ays_images_border_width."px ".$ays_images_border_style." ".$ays_images_border_color.";";
        }else{
            $show_images_with_border = "border: none";
        }
        $gallery_view = "<div class='ays_gallery_container_".$id."' style='width: ".$ays_width."'>".$show_gallery_head;
        
        switch( $view ){
            case "mosaic":
                
                $gallery_image_sizes = '';
                $gallery_view .= "<div class='mosaic_".$id."' id='ays_mosaic_".$id."' style='clear:both;'>";

                foreach ($images_new as $key => $mosaic_column){
                    if($show_title == 'on' && $image_titles[$key] != ''){
                        if($show_with_date == 'on'){
                            $ays_show_with_date = "<span>".date( "F d, Y", intval($image_dates[$key]))."</span>";
                        }else{
                            $ays_show_with_date = "";
                        }
                        $ays_show_title = "<div class='ays_image_title'>
                                                <span>".wp_unslash($image_titles[$key])."</span>
                                                $ays_show_with_date
                                             </div>";
                    }else{
                        $ays_show_title = '';
                    }

                    if($image_urls[$key] == ""){
                        $image_url = "";
                    }else{
                        $image_url = "<button type='button' data-url='".$image_urls[$key]."' class='ays_image_url'><i class='ays_fa ays_fa_for_gallery ays_fa_link'></i></button>";
                    }
                    
                    if($show_title_on == 'gallery_image'){
                        $hiconpos = ($show_title=='on')?" style='margin-bottom:40px;' ":"";
                        $show_title_in_hover = "<div class='ays_hover_mask animated'><div $hiconpos>".$hover_icon."".$image_url."</div></div> $ays_show_title ";
                    }elseif($show_title_on == 'image_hover'){
                        $show_title_in_hover = "<div class='ays_hover_mask animated'><div>".$hover_icon.$image_url."</div> $ays_show_title </div>";            
                    }
                    if($images_loading == 'current_loaded'){
                        $current_image = '';
                    }else{
                        $current_image = $mosaic_column;
                    }

                    $ays_caption = "";
                    $ays_data_sub_html = "";
                    if($ays_show_caption){
                        $ays_caption = "<div class='ays_caption_wrap'>
                                    <div class='ays_caption'>
                                        <h4>".$image_titles[$key]."</h4>
                                        <p>" . wp_unslash($image_descs[$key]) . "</p>
                                    </div>
                                </div>";
                        $ays_data_sub_html = " data-sub-html='.ays_caption_wrap' ";
                    }
                    $img_attr = getimagesize($mosaic_column);
                    $wh_attr = " width='".$img_attr[0]."' height='".$img_attr[1]."' ";
                    $gallery_view .= "<div class='item withImage ays_mosaic_column_item_".$id."' ".$wh_attr." data-src='" . $images[$key] . "' ".$ays_data_sub_html.">";
                         $gallery_view .= "<img src='" . $current_image . "' alt='" . wp_unslash($image_alts[$key]) . "' />
                            $ays_caption
                            <div class='ays_image_loading_div'>$ays_images_loader</div>
                             $show_title_in_hover
                            <a href='javascript:void(0);'></a>
                          </div>";
                }
                $gallery_view .= "</div>";
                break;
            case "grid":
                $gallery_view .= "<div class='ays_grid_row' id='ays_grid_row_".$id."'>";
                foreach ($images_new as $key => $image){
                    if($show_title == 'on' && $image_titles[$key] != ''){
                        if($show_with_date == 'on'){
                            $ays_show_with_date = "<span>".date( "F d, Y", intval($image_dates[$key]))."</span>";
                        }else{
                            $ays_show_with_date = "";
                        }
                        $ays_show_title = "<div class='ays_image_title'>
                                                <span>".wp_unslash($image_titles[$key])."</span>
                                                $ays_show_with_date
                                             </div>";
                    }else{
                        $ays_show_title = '';
                    }

                    if($image_urls[$key] == ""){
                        $image_url = "";
                    }else{
                        $image_url = "<button type='button' data-url='".$image_urls[$key]."' class='ays_image_url'><i class='ays_fa ays_fa_for_gallery ays_fa_link'></i></button>";
                    }
                    if($show_title_on == 'gallery_image'){
                        $hiconpos = ($show_title=='on')?" style='margin-bottom:40px;' ":"";
                        $show_title_in_hover = "<div class='ays_hover_mask animated'><div $hiconpos>".$hover_icon."".$image_url."</div></div> $ays_show_title ";
                    }elseif($show_title_on == 'image_hover'){
                        $show_title_in_hover = "<div class='ays_hover_mask animated'>
                            <div>".$hover_icon."".$image_url."</div>
                            $ays_show_title 
                        </div>";
                    }
                    if($images_loading == 'current_loaded'){
                        $current_image = '';
                    }else{
                        $current_image = $image;
                    }

                    $ays_caption = "";
                    $ays_data_sub_html = "";
                    if($ays_show_caption){
                        $ays_caption = "<div class='ays_caption_wrap'>
                                    <div class='ays_caption'>
                                        <h4>".$image_titles[$key]."</h4>
                                        <p>" . wp_unslash($image_descs[$key]) . "</p>
                                    </div>
                                </div>";
                        $ays_data_sub_html = " data-sub-html='.ays_caption_wrap' ";
                    }
                    $gallery_view .="<div class='ays_grid_column_".$id."' style='width: calc(".($column_width - 0.001)."% - ".($images_distance)."px);' data-src='" . $images[$key] . "' ".$ays_data_sub_html.">
                                    <img class='ays_gallery_image' src='" . $current_image . "' alt='" . wp_unslash($image_alts[$key]) . "'/>
                                    $ays_caption
                                    <div class='ays_image_loading_div'>$ays_images_loader</div>
                                    $show_title_in_hover
                                    <a href='javascript:void(0);'></a>
                                </div>";
                }
                $gallery_view .= "</div>";
                break;
            case "masonry":
                $gallery_view .= "<div class='ays_masonry_grid' id='ays_masonry_grid_".$id."'><div class='ays_masonry_grid-sizer'></div>";
                foreach($images_new as $key=>$image){
                    if($show_title == 'on' && $image_titles[$key] != ''){
                        if($show_with_date == 'on'){
                            $ays_show_with_date = "<span>".date( "F d, Y", intval($image_dates[$key]))."</span>";
                        }else{
                            $ays_show_with_date = "";
                        }
                        $ays_show_title = "<div class='ays_image_title'>
                                                <span>".wp_unslash($image_titles[$key])."</span>
                                                $ays_show_with_date
                                             </div>";
                    }else{
                        $ays_show_title = '';
                    }

                    if($image_urls[$key] == ""){
                        $image_url = "";
                    }else{
                        $image_url = "<button type='button' data-url='".$image_urls[$key]."' class='ays_image_url'><i class='ays_fa ays_fa_for_gallery ays_fa_link'></i></button>";
                    }
                    if($show_title_on == 'gallery_image'){
                        $hiconpos = ($show_title=='on')?" style='margin-bottom:40px;' ":"";
                        $show_title_in_hover = "<div class='ays_hover_mask animated'><div $hiconpos>".$hover_icon."".$image_url."</div></div> $ays_show_title ";
                    }elseif($show_title_on == 'image_hover'){
                        $show_title_in_hover = "<div class='ays_hover_mask animated'>
                            <div>".$hover_icon."".$image_url."</div>
                            $ays_show_title 
                        </div>";            
                    }

                    if($images_loading == 'current_loaded'){
                        $current_image = '';
                    }else{
                        $current_image = $image;
                    }
                    
                    $ays_caption = "";
                    $ays_data_sub_html = "";
                    if($ays_show_caption){
                        $ays_caption = "<div class='ays_caption_wrap'>
                                    <div class='ays_caption'>
                                        <h4>".$image_titles[$key]."</h4>
                                        <p>" . wp_unslash($image_descs[$key]) . "</p>
                                    </div>
                                </div>";
                        $ays_data_sub_html = " data-sub-html='.ays_caption_wrap' ";
                    }
                    $gallery_view .= "<div class='ays_masonry_grid-item ays_masonry_item_".$id."' data-src='" . $images[$key] . "' ".$ays_data_sub_html.">
                                <img src='". $current_image ."' alt='".$image_alts[$key]."' box-shadow: none;'>
                                $ays_caption
                                <div class='ays_image_loading_div'>$ays_images_loader</div>
                                $show_title_in_hover
                                <a href='javascript:void(0);'></a>
                            </div>";
                }
                $gallery_view .= "</div>";
                break;
            default:
                $gallery_view .= "<div class='ays_grid_row' id='ays_grid_row_".$id."'>";
                foreach ($images_new as $key => $image){
                    if($show_title == 'on' && $image_titles[$key] != ''){
                        if($show_with_date == 'on'){
                            $ays_show_with_date = "<span>".date( "F d, Y", intval($image_dates[$key]))."</span>";
                        }else{
                            $ays_show_with_date = "";
                        }
                        $ays_show_title = "<div class='ays_image_title'>
                                                <span>".wp_unslash($image_titles[$key])."</span>
                                                $ays_show_with_date
                                             </div>";
                    }else{
                        $ays_show_title = '';
                    }

                    if($image_urls[$key] == ""){
                        $image_url = "";
                    }else{
                        $image_url = "<button type='button' data-url='".$image_urls[$key]."' class='ays_image_url'><i class='ays_fa ays_fa_for_gallery ays_fa_link'></i></button>";
                    }
                    if($show_title_on == 'gallery_image'){
                        $hiconpos = ($show_title=='on')?" style='margin-bottom:40px;' ":"";
                        $show_title_in_hover = "<div class='ays_hover_mask animated'><div $hiconpos>".$hover_icon."".$image_url."</div></div> $ays_show_title ";
                    }elseif($show_title_on == 'image_hover'){
                        $show_title_in_hover = "<div class='ays_hover_mask animated'>
                            <div>".$hover_icon."".$image_url."</div>
                            $ays_show_title 
                        </div>";
                    }
                    if($images_loading == 'current_loaded'){
                        $current_image = '';
                    }else{
                        $current_image = $image;
                    }

                    $ays_caption = "";
                    $ays_data_sub_html = "";
                    if($ays_show_caption){
                        $ays_caption = "<div class='ays_caption_wrap'>
                                    <div class='ays_caption'>
                                        <h4>".$image_titles[$key]."</h4>
                                        <p>" . wp_unslash($image_descs[$key]) . "</p>
                                    </div>
                                </div>";
                        $ays_data_sub_html = " data-sub-html='.ays_caption_wrap' ";
                    }
                    $gallery_view .="<div class='ays_grid_column_".$id."' style='width: calc(".($column_width - 0.001)."% - ".($images_distance)."px);' data-src='" . $images[$key] . "' ".$ays_data_sub_html.">
                                    <img class='ays_gallery_image' src='" . $current_image . "' alt='" . wp_unslash($image_alts[$key]) . "'/>
                                    $ays_caption
                                    <div class='ays_image_loading_div'>$ays_images_loader</div>
                                    $show_title_in_hover
                                    <a href='javascript:void(0);'></a>
                                </div>";
                }
                $gallery_view .= "</div>";
                break;
        }
        if($images_loading == 'current_loaded'){           
            $gallery_view .= "<script>
                 if(typeof options === 'undefined'){
                    var options = [];
                }
                options.galleryImages = [];
                options.galleryImages.push('" . base64_encode(json_encode($images_new)) . "');
            </script>";
        }       
        
        $title_pos = (isset($gallery_options['title_position'])) ? $gallery_options['title_position'] : 'bottom';
        $date_on = ($gallery_options['show_with_date'] == 'on') ? 'max-height:50px;' : '';                
        $gallery_view .= "
        </div>
            <style>
                ".htmlentities($custom_css)."
                
                .lg-outer, .lg-backdrop {
                    z-index: 999999999999;
                }
                .ays_gallery_container_".$id." {
                    max-width: 100%;
                    transition: .5s ease-in-out;
                    animation-duration: .5s;
                    position: static!important;
                }
                .mosaic_".$id." {
                    padding: 6px;
                    max-width: 100%;
                }

                .mosaic_".$id." a {
                    width: 100%;
                    height: 100%;
                }

                .ays_masonry_item_".$id."{
                    width: calc(".($column_width - 0.001)."% - ".($images_distance)."px);
                    margin-bottom: {$images_distance}px;
                    position: relative;
                }                

                .ays_image_title {                    
                    ".$title_pos.": 0;
                    ".$date_on."
                }

                .ays_masonry_item_".$id." a, .ays_masonry_item_".$id.":hover,
                .mosaic_".$id." a, .mosaic_".$id.":hover {
                   box-shadow: none;
                }
                .ays_mosaic_column_item_".$id." {
                    font-size: 0;
                    margin-bottom: 0;
                    margin-right: 0;
                    overflow: hidden;
                    perspective: 200px;
                    box-sizing: border-box;
                }
                
                .ays_masonry_item_".$id." img,
                .ays_mosaic_column_item_".$id." img {
                    width: 100%;
                    max-width: 100%;
                    height: 100%;
                    margin: 0 auto;
                    object-fit: cover;
                }
                div.ays_grid_row div.ays_grid_column_".$id." {
                    height: {$ays_thumb_height_desktop}px;
                    min-height: {$ays_thumb_height_desktop}px;
                    background-size: cover;
                    margin-bottom: {$images_distance}px;
                    margin-right: {$images_distance}px;
                    background-position: center;
                    position: relative;
                    z-index: 2;
                    overflow: hidden;
                    transition: .5s ease-in-out;
                    perspective: 200px;
                }                
                
                div.ays_masonry_grid div.ays_masonry_item_".$id.",
                div.ays_grid_row div.ays_grid_column_".$id." {
                    $show_images_with_border
                }

                @media screen and (max-width: 768px){
                    div.ays_grid_row div.ays_grid_column_".$id." {
                        height: {$ays_thumb_height_mobile}px;
                        min-height: {$ays_thumb_height_mobile}px;
                    }
                }

                div.ays_grid_row div.ays_grid_column_".$id." > img {
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                    object-position: center center;
                }

                div.ays_masonry_grid div.ays_masonry_item_".$id." a,
                div.ays_grid_row div.ays_grid_column_".$id." a {
                    display: block;
                    z-index: 3;
                    box-shadow: none;
                }
                
                div.ays_grid_row div.ays_grid_column_".$id." a:hover{
                    box-shadow: none;
                }
                
                div.ays_masonry_grid div.ays_masonry_item_".$id.":hover,
                div.mosaic_".$id." div.ays_mosaic_column_item_".$id.":hover,
                div.ays_grid_row div.ays_grid_column_".$id.":hover{
                    cursor: pointer;
                }

                div.mosaic_".$id." .ays_mosaic_column_item_".$id." > div.ays_hover_mask {
                    font-size: 40px !important;
                }
                div.ays_masonry_grid div.ays_masonry_item_".$id." div.ays_hover_mask i.ays_fa,
                div.ays_masonry_grid div.ays_masonry_item_".$id." div.ays_hover_mask .ays_fa,
                div.ays_grid_row div.ays_grid_column_".$id." div.ays_hover_mask i.ays_fa,
                div.ays_grid_row div.ays_grid_column_".$id." div.ays_hover_mask .ays_fa,
                .mosaic_".$id." .ays_mosaic_column_item_".$id." div.ays_hover_mask i.ays_fa,
                .mosaic_".$id." .ays_mosaic_column_item_".$id." div.ays_hover_mask .ays_fa {
                    font-size: {$images_hover_icon_size}px !important;
                    opacity: 1 !important;
                }

                .ays_mosaic_column_".$id." {
                    width: 25%;
                    margin-right: 0;
                }
                div.ays_masonry_item_".$id.":hover > div.ays_hover_mask,
                div.mosaic_".$id." .ays_mosaic_column_item_".$id.":hover > div.ays_hover_mask,
                div.ays_grid_row div.ays_grid_column_".$id.":hover > div.ays_hover_mask {
                    opacity: 1 !important;
                    transition: all .5s;
                }
                
                div.mosaic_".$id." div.ays_mosaic_column_item_".$id.",
                div.ays_masonry_grid div.ays_masonry_item_".$id.",
                div.ays_grid_row div.ays_grid_column_".$id." {
                    border-radius: {$images_b_radius}px;
                }

                div.ays_masonry_item_".$id." div.ays_hover_mask,
                div.mosaic_".$id." div.ays_mosaic_column_item_".$id." div.ays_hover_mask,
                div.ays_grid_row div.ays_grid_column_".$id." div.ays_hover_mask {
                    background: rgba(0,0,0,".$hover_opacity.");
                }
                
                div.ays_masonry_grid div.ays_masonry_item_".$id." div.ays_hover_mask .ays_image_url,
                div.mosaic_".$id." div.ays_mosaic_column_item_".$id." div.ays_hover_mask .ays_image_url,
                div.ays_grid_row div.ays_grid_column_".$id." div.ays_hover_mask .ays_image_url {
                    position: relative;
                    z-index: 10000;
                    padding: 0;
                    margin: auto;
                    background-color: transparent;
                    margin-left: 10px;
                    outline: 0;
                    border: none;
                    box-shadow: none;
                }
                
                                
                div.ays_masonry_grid div.ays_masonry_item_".$id." div.ays_hover_mask .ays_image_url:hover *,
                div.mosaic_".$id." div.ays_mosaic_column_item_".$id." div.ays_hover_mask .ays_image_url:hover *,
                div.ays_grid_row div.ays_grid_column_".$id." div.ays_hover_mask .ays_image_url:hover * {
                    color: #ccc;
                }
                

                div.mosaic_".$id." a,
                div.ays_masonry_item_".$id." a,
                div.ays_grid_row div.ays_grid_column_".$id." a {
                    width: 100%;
                    height: 100%;
                    position: absolute;
                    top: 0;
                }
                
                div.ays_masonry_grid div.ays_masonry_item_".$id." .ays_image_title,
                div.mosaic_".$id." .ays_image_title,
                div.ays_grid_row div.ays_grid_column_".$id." .ays_image_title                
                {
                    background-color: ".$lightbox_color.";
                    background-color: ".$lightbox_color_rgba.";
                    z-index: 999999;
                }
                
            </style>";
        $gallery_view = trim(str_replace(array("\n", "\r"), '', $gallery_view));
        $gallery_view = trim(preg_replace('/\s+/', ' ', $gallery_view));
        return $gallery_view;
    }

    private function array_split($array, $pieces) {
        if ($pieces < 2)
            return array($array);
        $newCount = ceil(count($array)/$pieces);
        $a = array_slice($array, 0, $newCount);
        $b = $this->array_split(array_slice($array, $newCount), $pieces-1);
        return array_merge(array($a),$b);
    }
    
    private function hex2rgba( $color, $opacity = false ) {

        $default = 'rgba(39, 174, 96, 0.5)';
        /**
         * Return default if no color provided
         */
        if( empty( $color ) ) {
            return $default;
        }
        /**
         * Sanitize $color if "#" is provided
         */
        if ( $color[0] == '#' ) {
            $color = substr( $color, 1 );
        }

        /**
         * Check if color has 6 or 3 characters and get values
         */
        if ( strlen($color) == 6 ) {
            $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
            $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
            return $default;
        }

        /**
         * [$rgb description]
         * @var array
         */
        $rgb =  array_map( 'hexdec', $hex );
        /**
         * Check if opacity is set(rgba or rgb)
         */
        if( $opacity ) {
            if( abs( $opacity ) > 1 )
                $opacity = 1.0;
                $output = 'rgba( ' . implode( "," ,$rgb ) . ',' . $opacity . ' )';
        } else {
            $output = 'rgb( ' . implode( "," , $rgb ) . ' )';
        }
        /**
         * Return rgb(a) color string
         */
        return $output;
    }
}
