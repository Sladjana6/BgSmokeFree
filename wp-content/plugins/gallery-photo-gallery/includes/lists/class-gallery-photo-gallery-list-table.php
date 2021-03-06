<?php
ob_start();
class Galleries_List_Table extends WP_List_Table{
    private $plugin_name;
    /** Class constructor */
    public function __construct($plugin_name) {
        $this->plugin_name = $plugin_name;
        parent::__construct( array(
            "singular" => __( "Gallery", $this->plugin_name ), //singular name of the listed records
            "plural"   => __( "Galleries", $this->plugin_name ), //plural name of the listed records
            "ajax"     => false //does this table support ajax?
        ) );
        add_action( "admin_notices", array( $this, "gallery_notices" ) );

    }


    /**
     * Retrieve customers data from the database
     *
     * @param int $per_page
     * @param int $page_number
     *
     * @return mixed
     */
    public static function get_galleries( $per_page = 5, $page_number = 1 ) {

        global $wpdb;

        $sql = "SELECT * FROM {$wpdb->prefix}ays_gallery";

        if ( ! empty( $_REQUEST["orderby"] ) ) {
            $sql .= " ORDER BY " . esc_sql( $_REQUEST["orderby"] );
            $sql .= ! empty( $_REQUEST["order"] ) ? " " . esc_sql( $_REQUEST["order"] ) : " ASC";
        }

        $sql .= " LIMIT $per_page";
        $sql .= " OFFSET " . ( $page_number - 1 ) * $per_page;


        $result = $wpdb->get_results( $sql, "ARRAY_A" );

        return $result;
    }

    public function get_gallery_by_id( $id ){
        global $wpdb;

        $sql = "SELECT * FROM {$wpdb->prefix}ays_gallery WHERE id=" . absint( intval( $id ) );

        $result = $wpdb->get_row($sql, "ARRAY_A");

        return $result;
    }

    public function add_or_edit_gallery($data){
        global $wpdb;
        $gallery_table = $wpdb->prefix . "ays_gallery";
        
        if( isset($data["ays_gallery_action"]) && wp_verify_nonce( $data["ays_gallery_action"],"ays_gallery_action" ) ) {
                $id                     = ( $data["id"] != NULL ) ? absint( intval( $data["id"] ) ) : null;
                $title                  = wp_unslash(sanitize_text_field( $data["gallery_title"] ));
                $description            = wp_unslash(sanitize_text_field( $data["gallery_description"] ));
                $width                  = wp_unslash(sanitize_text_field( $data['gallery_width'] ));
                $height                 = 0;//absint( intval( $data["gallery_height"] ) );
                // die();
                $image_paths            = sanitize_text_field( implode( "***", $data["ays-image-path"] ) );
                $image_titles           = sanitize_text_field( implode( "***", $data["ays-image-title"] ) );
                $image_alts             = sanitize_text_field( implode( "***", $data["ays-image-alt"] ) );
                $image_descriptions     = sanitize_text_field( implode( "***", $data["ays-image-description"] ) );
                $image_external_urls    = sanitize_text_field( implode( "***", $data["ays-image-url"] ) );
                $images_dates           = sanitize_text_field( implode( "***", $data['ays-image-date'] ) );
                $view_type              = sanitize_text_field( $data['ays-view-type'] );
                $columns_count          = absint( intval( $data['ays-columns-count'] ) );
                $images_distance        = absint( intval( $data['ays-gpg-images-distance'] ) );
                $hover_effect           = sanitize_text_field( $data['ays_hover_simple'] );
                $hover_opacity          = sanitize_text_field( $data['ays-gpg-image-hover-opacity'] );
                $hover_icon             = sanitize_text_field( $data['ays-gpg-image-hover-icon'] );
                $image_sizes            = sanitize_text_field( $data['ays_image_sizes'] );
                $custom_css             = wp_unslash(sanitize_text_field( $data['gallery_custom_css'] ));
                $lightbox_color         = wp_unslash(sanitize_text_field( $data['ays-gpg-lightbox-color'] ));
                $images_orderby         = wp_unslash(sanitize_text_field( $data['ays_images_ordering'] ));
                $show_title             = wp_unslash(sanitize_text_field( isset($data['ays_gpg_show_title']) ? $data['ays_gpg_show_title'] : '' ));
                $show_title_on          = wp_unslash(sanitize_text_field( $data['ays_gpg_show_title_on'] ));
                $title_position         = wp_unslash(sanitize_text_field( $data['image_title_position'] ));
                $show_with_date         = wp_unslash(sanitize_text_field( isset($data['ays_gpg_show_with_date']) ? $data['ays_gpg_show_with_date'] : '' ));
                $ays_images_loading     = wp_unslash(sanitize_text_field( $data['ays_images_loading'] ));
                $ays_admin_pagination   = wp_unslash(sanitize_text_field( $data['ays_admin_pagination'] ));
                $ays_gpg_hover_zoom     = wp_unslash(sanitize_text_field( $data['ays_gpg_hover_zoom'] ));
                $ays_images_b_radius    = wp_unslash(sanitize_text_field( $data['ays-gpg-images-border-radius'] ));
                $ays_hover_icon_size    = wp_unslash(sanitize_text_field( $data['ays-gpg-hover-icon-size'] ));
                $ays_gpg_loader         = wp_unslash(sanitize_text_field( $data['ays_gpg_loader'] ));
                
                $ays_images_border      = wp_unslash(sanitize_text_field( isset($data['ays_gpg_images_border']) ? $data['ays_gpg_images_border'] : '' ));
                $ays_images_b_width     = wp_unslash(sanitize_text_field( $data['ays_gpg_images_border_width'] ));
                $ays_images_b_style     = wp_unslash(sanitize_text_field( $data['ays_gpg_images_border_style'] ));
                $ays_images_b_color     = wp_unslash(sanitize_text_field( $data['ays_gpg_border_color'] ));
                $thumb_height_mobile    = wp_unslash(sanitize_text_field( isset($data['ays-thumb-height-mobile']) ? $data['ays-thumb-height-mobile'] : '' ));
                $thumb_height_desktop   = wp_unslash(sanitize_text_field( isset($data['ays-thumb-height-desktop']) ? $data['ays-thumb-height-desktop'] : '' ));
            
                $ays_lightbox_counter   = wp_unslash(sanitize_text_field( $data['ays_gpg_lightbox_counter'] ));
                $ays_lightbox_autoplay  = wp_unslash(sanitize_text_field( $data['ays_gpg_lightbox_autoplay'] ));
                $ays_lg_pause           = wp_unslash(sanitize_text_field( $data['ays_gpg_lightbox_pause'] ));
                $ays_lg_show_caption    = wp_unslash(sanitize_text_field( $data['ays_gpg_show_caption'] ));
            
            
                $ays_show_gal_title     = wp_unslash(sanitize_text_field( $data['ays_gpg_title_show'] ));
                $ays_show_gal_desc      = wp_unslash(sanitize_text_field( $data['ays_gpg_desc_show'] ));
                $images_hover_effect    = sanitize_text_field( $data['ays_images_hover_effect'] );
                $hover_dir_aware        = sanitize_text_field( $data['ays_hover_dir_aware'] );

                $enable_light_box       = isset($data['av_light_box']) && $data['av_light_box'] == "on" ? "on" :"off";
            
                $options = array(
                    'columns_count'             => $columns_count,
                    'view_type'                 => $view_type,
                    'border_radius'             => $ays_images_b_radius,
                    'admin_pagination'          => $ays_admin_pagination,
                    'hover_zoom'                => $ays_gpg_hover_zoom,
                    'show_gal_title'            => $ays_show_gal_title,
                    'show_gal_desc'             => $ays_show_gal_desc,
                    "images_hover_effect"       => $images_hover_effect,
                    "hover_dir_aware"           => $hover_dir_aware,
                    "images_border"             => $ays_images_border,
                    "images_border_width"       => $ays_images_b_width,
                    "images_border_style"       => $ays_images_b_style,
                    "images_border_color"       => $ays_images_b_color,
                    "hover_effect"              => $hover_effect,
                    "hover_opacity"             => $hover_opacity,
                    "image_sizes"               => $image_sizes,
                    "lightbox_color"            => $lightbox_color,
                    "images_orderby"            => $images_orderby,
                    "hover_icon"                => $hover_icon,
                    "show_title"                => $show_title,
                    "show_title_on"             => $show_title_on,
                    "title_position"            => $title_position,
                    "show_with_date"            => $show_with_date,
                    "images_distance"           => $images_distance,
                    "images_loading"            => $ays_images_loading,
                    "gallery_loader"            => $ays_gpg_loader,
                    "hover_icon_size"           => $ays_hover_icon_size,
                    "thumb_height_mobile"       => $thumb_height_mobile,
                    "thumb_height_desktop"      => $thumb_height_desktop,
                    "enable_light_box"          => $enable_light_box,
                );
                $lightbox_options = array(
                    "lightbox_counter"          => $ays_lightbox_counter,
                    "lightbox_autoplay"         => $ays_lightbox_autoplay,
                    "lb_pause"                  => $ays_lg_pause,
                    "lb_show_caption"           => $ays_lg_show_caption,
                    
                );
                $submit_type = (isset($data['submit_type'])) ?  $data['submit_type'] : '';
                if( $id == null ){
                    $gallery_result = $wpdb->insert(
                        $gallery_table,
                        array(
                            "title"             => $title,
                            "description"       => $description,
                            "images"            => $image_paths,
                            "images_titles"     => $image_titles,
                            "images_descs"      => $image_descriptions,
                            "images_alts"       => $image_alts,
                            "images_urls"       => $image_external_urls,
                            "width"             => $width,
                            "height"            => $height,
                            "options"           => json_encode($options),
                            "lightbox_options"  => json_encode($lightbox_options),
                            "custom_css"        => $custom_css,
                            "images_dates"      => $images_dates
                        ),
                        array( "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%d", "%d", "%s", "%s", "%s", "%s" )
                    );
                    $message = "created";
                }else{
                    $gallery_result = $wpdb->update(
                        $gallery_table,
                        array(
                            "title"             => $title,
                            "description"       => $description,
                            "images"            => $image_paths,
                            "images_titles"     => $image_titles,
                            "images_descs"      => $image_descriptions,
                            "images_alts"       => $image_alts,
                            "images_urls"       => $image_external_urls,
                            "width"             => $width,
                            "height"            => $height,
                            "options"           => json_encode($options),
                            "lightbox_options"  => json_encode($lightbox_options),
                            "custom_css"        => $custom_css,
                            "images_dates"      => $images_dates
                        ),
                        array( "id" => $id ),
                        array( "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%d", "%d", "%s", "%s", "%s", "%s" ),
                        array( "%d" )
                    );
                    $message = "updated";
                }
                $ays_gpg_tab = isset($data['ays_gpg_settings_tab']) ? $data['ays_gpg_settings_tab'] : 'tab1';
                if( $gallery_result >= 0 ){
                    if($submit_type == ''){
                        $url = esc_url_raw( remove_query_arg(["action", "gallery"]  ) ) . "&status=" . $message . "&type=success";
                        wp_redirect( $url );
                        exit();
                    }else{
                        $url = esc_url_raw( add_query_arg() ) . "&ays_gpg_settings_tab=".$ays_gpg_tab."&status=" . $message . "&type=success";
                        wp_redirect( $url );
                        exit();
                    }
                }
        }
    }

    /**
     * Delete a customer record.
     *
     * @param int $id customer ID
     */
    public static function delete_galleries( $id ) {
        global $wpdb;
        $wpdb->delete(
            "{$wpdb->prefix}ays_gallery",
            array( "id" => $id ),
            array( "%d" )
        );
    }


    /**
     * Returns the count of records in the database.
     *
     * @return null|string
     */
    public static function record_count() {
        global $wpdb;

        $sql = "SELECT COUNT(*) FROM {$wpdb->prefix}ays_gallery";

        return $wpdb->get_var( $sql );
    }


    /** Text displayed when no customer data is available */
    public function no_items() {
        echo __( "There are no galleries yet.", $this->plugin_name );
    }


    /**
     * Render a column when no column specific method exist.
     *
     * @param array $item
     * @param string $column_name
     *
     * @return mixed
     */
    public function column_default( $item, $column_name ) {
        switch ( $column_name ) {
            case "title":
            case "description":
                return wp_unslash($item[ $column_name ]);
                break;
            case "shortcode":
            case "items":
            case "id":
                return $item[ $column_name ];
                break;
            default:
                return print_r( $item, true ); //Show the whole array for troubleshooting purposes
        }
    }

    /**
     * Render the bulk edit checkbox
     *
     * @param array $item
     *
     * @return string
     */
    function column_cb( $item ) {
        return sprintf(
            "<input type='checkbox' name='bulk-delete[]' value='%s' />", $item["id"]
        );
    }


    /**
     * Method for name column
     *
     * @param array $item an array of DB data
     *
     * @return string
     */
    function column_title( $item ) {
        $delete_nonce = wp_create_nonce( $this->plugin_name . "-delete-gallery" );

        $title = sprintf( "<a href='?page=%s&action=%s&gallery=%d'>".$item["title"]."</a>", esc_attr( $_REQUEST["page"] ), "edit", absint( $item["id"] ) );

        $actions = array(
            "edit" => sprintf( "<a href='?page=%s&action=%s&gallery=%d'>". __('Edit', $this->plugin_name) ."</a>", esc_attr( $_REQUEST["page"] ), "edit", absint( $item["id"] ) ),
            "delete" => sprintf( "<a href='?page=%s&action=%s&gallery=%s&_wpnonce=%s'>". __('Delete', $this->plugin_name) ."</a>", esc_attr( $_REQUEST["page"] ), "delete", absint( $item["id"] ), $delete_nonce )
        );

        return $title . $this->row_actions( $actions );
    }

    function column_shortcode( $item ) {
        return sprintf("<input type='text' onClick='this.setSelectionRange(0, this.value.length)' readonly value='[gallery_p_gallery id=%s]' style='width: 180px;' />", $item["id"]);
    }

    function column_items( $item ) {
       $item_count = explode('***', $item['images']);
       return count($item_count);
    } 

    /**
     *  Associative array of columns
     *
     * @return array
     */
    function get_columns() {
        $columns = array(
            "cb"                => "<input type='checkbox' />",
            "title"             => __( "Title", $this->plugin_name ),
            "description"       => __( "Description", $this->plugin_name ),
            "shortcode"         => __( "Shortcode", $this->plugin_name ),
            "items"             => __( "Items", $this->plugin_name ),
            "id"                => __( "ID", $this->plugin_name ),
        );

        return $columns;
    }


    /**
     * Columns to make sortable.
     *
     * @return array
     */
    public function get_sortable_columns() {
        $sortable_columns = array(
            "title"         => array( "title", true ),
            "id"            => array( "id", true ),
        );

        return $sortable_columns;
    }

    /**
     * Returns an associative array containing the bulk action
     *
     * @return array
     */
    public function get_bulk_actions() {
        $actions = array(
            "bulk-delete" => __("Delete", $this->plugin_name)
        );

        return $actions;
    }


    /**
     * Handles data query and filter, sorting, and pagination.
     */
    public function prepare_items() {

        $this->_column_headers = $this->get_column_info();

        /** Process bulk action */
        $this->process_bulk_action();

        $per_page     = $this->get_items_per_page( "galleries_per_page", 5 );
        $current_page = $this->get_pagenum();
        $total_items  = self::record_count();

        $this->set_pagination_args( array(
            "total_items" => $total_items, //WE have to calculate the total number of items
            "per_page"    => $per_page //WE have to determine how many items to show on a page
        ) );

        $this->items = self::get_galleries( $per_page, $current_page );
    }

    public function process_bulk_action() {
        //Detect when a bulk action is being triggered...
        $message = "deleted";
        if ( "delete" === $this->current_action() ) {

            // In our file that handles the request, verify the nonce.
            $nonce = esc_attr( $_REQUEST["_wpnonce"] );

            if ( ! wp_verify_nonce( $nonce, $this->plugin_name . "-delete-gallery" ) ) {
                die( "Go get a life script kiddies" );
            }
            else {
                self::delete_galleries( absint( $_GET["gallery"] ) );

                // esc_url_raw() is used to prevent converting ampersand in url to "#038;"
                // add_query_arg() return the current url

                $url = esc_url_raw( remove_query_arg(array("action", "gallery", "_wpnonce")  ) ) . "&status=" . $message . "&type=success";
                wp_redirect( $url );
                exit();
            }

        }

        // If the delete bulk action is triggered
        if ( ( isset( $_POST["action"] ) && $_POST["action"] == "bulk-delete" )
            || ( isset( $_POST["action2"] ) && $_POST["action2"] == "bulk-delete" )
        ) {

            $delete_ids = esc_sql( $_POST["bulk-delete"] );

            // loop over the array of record IDs and delete them
            foreach ( $delete_ids as $id ) {
                self::delete_galleries( $id );

            }

            // esc_url_raw() is used to prevent converting ampersand in url to "#038;"
            // add_query_arg() return the current url

            $url = esc_url_raw( remove_query_arg(array("action", "gallery", "_wpnonce")  ) ) . "&status=" . $message . "&type=success";
            wp_redirect( $url );
            exit();
        }
    }

    public function gallery_notices(){
        $status = (isset($_REQUEST["status"])) ? sanitize_text_field( $_REQUEST["status"] ) : "";
        $type = (isset($_REQUEST["type"])) ? sanitize_text_field( $_REQUEST["type"] ) : "";

        if ( empty( $status ) )
            return;

        if ( "created" == $status )
            $updated_message = esc_html( __( "Gallery created.", $this->plugin_name ) );
        elseif ( "updated" == $status )
            $updated_message = esc_html( __( "Gallery saved.", $this->plugin_name ) );
        elseif ( "deleted" == $status )
            $updated_message = esc_html( __( "Gallery deleted.", $this->plugin_name ) );
        elseif ( "error" == $status )
            $updated_message = __( "You're not allowed to add gallery for more galleries please checkout to ", $this->plugin_name )."<a href='http://ays-pro.com/index.php/wordpress/photo-gallery' target='_blank'>PRO ".__( "version", $this->plugin_name )."</a>.";

        if ( empty( $updated_message ) )
            return;

        ?>
        <div class="notice notice-<?php echo $type; ?> is-dismissible">
            <p> <?php echo $updated_message; ?> </p>
        </div>
        <?php
    }
}
