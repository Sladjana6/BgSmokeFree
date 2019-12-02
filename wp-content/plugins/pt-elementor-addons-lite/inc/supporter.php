<?php
/**
 * Class Pt Elementor Supporter.php
 *
 * @author    paramthemes <paramthemes@gmail.com>
 * @copyright 2017 Param Themes
 * @license   Param Theme
 * @package   Elementor
 * @see       https://www.paramthemes.com
 */

	/**
	 * Post Data
	 *
	 * @param int $args Post data.
	 */
function pt_get_post_data( $args ) {
	$defaults = array(
		'posts_per_page'   => 5,
		'offset'           => 0,
		'category'         => '',
		'category_name'    => '',
		'orderby'          => 'date',
		'order'            => 'DESC',
		'include'          => '',
		'exclude'          => '',
		'post_type'        => 'post',
		'post_mime_type'   => '',
		'post_parent'      => '',
		'author'       => '',
		'author_name'      => '',
		'post_status'      => 'publish',
		'suppress_filters' => true,
	);

	$atts = wp_parse_args( $args,$defaults );

	$posts = get_posts( $atts );

	return $posts;
}
	/**
	 * Define Post Types Display settings.
	 */
function pt_get_post_types() {
	$pt_cpts = get_post_types(
		array(
			'public' => true,
			'show_in_nav_menus' => true,
		)
	);
	$eael_exclude_cpts = array( 'elementor_library', 'attachment', 'product' );

	foreach ( $eael_exclude_cpts as $exclude_cpt ) {
		unset( $pt_cpts[ $exclude_cpt ] );
	}

		$post_types = array_merge( $pt_cpts );
	return $post_types;
}
	/**
	 * Define Post Order By Display settings.
	 */
function pt_get_post_orderby_options() {
	$orderby = array(
		'ID' => 'Post Id',
		'author' => 'Post Author',
		'title' => 'Title',
		'date' => 'Date',
		'modified' => 'Last Modified Date',
		'parent' => 'Parent Id',
		'rand' => 'Random',
		'comment_count' => 'Comment Count',
		'menu_order' => 'Menu Order',
	);

	return $orderby;
}
	/**
	 * Post Setting
	 *
	 * @param int $settings Post data.
	 */
function pt_get_post_settings( $settings ) {
	$post_args['post_type'] = $settings['pt_post_type'];

	if ( 'post' === $settings['pt_post_type'] ) {
		$post_args['category'] = $settings['pt_category'];
	}

	$post_args['posts_per_page'] = $settings['num_posts'];
	$post_args['offset'] = $settings['post_offset'];
	$post_args['orderby'] = $settings['orderby'];
	$post_args['order'] = $settings['order'];

	return $post_args;
}
	/**
	 * Post Content By Id Setting
	 *
	 * @param int    $post_id Post data.
	 * @param string $excerpt_length Content.
	 *
	 * @return int the integer.
	 */
function pt_get_excerpt_by_id( $post_id, $excerpt_length ) {
	$the_post = get_post( $post_id );

	$the_excerpt = null;
	if ( $the_post ) {
		$the_excerpt = $the_post->post_excerpt ? $the_post->post_excerpt : $the_post->post_content;
	}

	$the_excerpt = strip_tags( strip_shortcodes( $the_excerpt ) );
	$words = explode( ' ', $the_excerpt, $excerpt_length + 1 );

	if ( count( $words ) > $excerpt_length ) :
		array_pop( $words );
		$the_excerpt = implode( ' ', $words );
		$the_excerpt .= '...';
	 endif;

	 return $the_excerpt;
}
	/**
	 * Define Post Category Content Display settings.
	 */
function pt_post_type_categories() {
	$terms = get_terms(
		array(
			'taxonomy' => 'category',
			'hide_empty' => true,
		)
	);

	if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
		foreach ( $terms as $term ) {
			$options[ $term->term_id ] = $term->name;
		}
	}

		return $options;
}
if ( function_exists( 'wpcf7' ) ) {
function pt_select_contact_form(){
    $wpcf7_form_list = get_posts(array(
        'post_type' => 'wpcf7_contact_form',
        'showposts' => 999,
    ));
    $posts = array();

    if ( ! empty( $wpcf7_form_list ) && ! is_wp_error( $wpcf7_form_list ) ){
    foreach ( $wpcf7_form_list as $post ) {
        $options[ $post->ID ] = $post->post_title;
    }
    return $options;
    }
	}
}
/**
 * Get Gravity Form [ if exists ]
 */

/*function pt_select_gravity_form() {

    $forms = RGFormsModel::get_forms( null, 'title' );
    foreach( $forms as $form ) {
      $options[ $form->id ] = $form->title;
    }
    return $options;

}
*//**
 * Get Ninja Form List
 * @return array
 */
 
function pt_select_ninja_form() {
    global $wpdb;
    $pt_nf_table_name = $wpdb->prefix.'nf3_forms';
    $forms = $wpdb->get_results( "SELECT id, title FROM $pt_nf_table_name" );
    foreach( $forms as $form ) {
        $options[$form->id] = $form->title;
    }
    return $options;
}
/**
 * Get WeForms Form List
 * @return array
 */
function pt_select_wpforms() {

    $wpuf_form_list = get_posts( array(
        'post_type' => 'wpforms',
        'showposts' => 999,
    ));
    $posts = array();

    if ( ! empty( $wpuf_form_list ) && ! is_wp_error( $wpuf_form_list ) ) {
        foreach ( $wpuf_form_list as $post ) {
            $options[ $post->ID ] = $post->post_title;
        }
        return $options;
    }

}
function pt_select_weforms() {

    $wpuf_form_list = get_posts( array(
        'post_type' => 'wpuf_contact_form',
        'showposts' => 999,
    ));
    $posts = array();

    if ( ! empty( $wpuf_form_list ) && ! is_wp_error( $wpuf_form_list ) ) {
        foreach ( $wpuf_form_list as $post ) {
            $options[ $post->ID ] = $post->post_title;
        }
        return $options;
    }

}
/**
 * Get caldera Form List
 * @return array
 */
/*function pt_select_caldera_form() {
    global $wpdb;
    $pt_cf_table_name = $wpdb->prefix.'cf_forms';
    $forms = $wpdb->get_results( "SELECT * FROM $pt_cf_table_name" );
    foreach( $forms as $form ) {
        $unserialize = unserialize( $form->config );
        $form_title = $unserialize['name'];
        $options[$form->form_id] = $form_title;
    }
    return $options;
}	
*/
	 

	 
function pt_get_all_post_type_options() {

    $post_types = get_post_types(array('public' => true), 'objects');

    $options = ['' => ''];

    foreach ($post_types as $post_type) {
        $options[$post_type->name] = $post_type->label;
    }

    return $options;
}
function pt_get_all_taxonomy_options() {

    global $wpdb;

    $results = array();

    foreach ($wpdb->get_results("
		SELECT terms.slug AS 'slug', terms.name AS 'label', termtaxonomy.taxonomy AS 'type'
		FROM $wpdb->terms AS terms
		JOIN $wpdb->term_taxonomy AS termtaxonomy ON terms.term_id = termtaxonomy.term_id
		LIMIT 100
	") as $result) {
        $results[$result->type . ':' . $result->slug] = $result->type . ':' . $result->label;
    }
    return $results;
}

function pt_build_query_args($settings) {

    $query_args = [
        'orderby' => $settings['orderby'],
        'order' => $settings['order'],
        'ignore_sticky_posts' => 1,
        'post_status' => 'publish',
    ];

    if (!empty($settings['post_in'])) {
        $query_args['post_type'] = 'any';
        $query_args['post__in'] = explode(',', $settings['post_in']);
        $query_args['post__in'] = array_map('intval', $query_args['post__in']);
    }
    else {
        if (!empty($settings['post_types'])) {
            $query_args['post_type'] = $settings['post_types'];
        }

        if (!empty($settings['tax_query'])) {
            $tax_queries = $settings['tax_query'];

            $query_args['tax_query'] = array();
            $query_args['tax_query']['relation'] = 'OR';
            foreach ($tax_queries as $tq) {
                list($tax, $term) = explode(':', $tq);

                if (empty($tax) || empty($term))
                    continue;
                $query_args['tax_query'][] = array(
                    'taxonomy' => $tax,
                    'field' => 'slug',
                    'terms' => $term
                );
            }
        }
    }

    $query_args['posts_per_page'] = $settings['posts_per_page'];

    $query_args['paged'] = max(1, get_query_var('paged'), get_query_var('page'));

    return $query_args;
}
function pt_get_taxonomies_map() {
    $map = array();
    $taxonomies = get_taxonomies();
    foreach ($taxonomies as $taxonomy) {
        $map [$taxonomy] = $taxonomy;
    }
    return $map;
}
function pt_get_terms($taxonomy) {

    global $wpdb;

    $term_coll = array();

    if (taxonomy_exists($taxonomy)) {
        $terms = get_terms($taxonomy); // Get all terms of a taxonomy

        if ($terms && !is_wp_error($terms)) {
            foreach ($terms as $term) {
                $term_coll[$term->term_id] = $term->name;
            }
        }
    }
    else {

        $qt = 'SELECT * FROM ' . $wpdb->terms . ' AS t INNER JOIN ' . $wpdb->term_taxonomy . ' AS tt ON t.term_id = tt.term_id WHERE tt.taxonomy =  "' . $taxonomy . '" AND tt.count > 0 ORDER BY  t.term_id DESC LIMIT 0 , 30';

        $terms = $wpdb->get_results($qt, ARRAY_A);

        if ($terms && !is_wp_error($terms)) {
            foreach ($terms as $term) {
                $term_coll[$term['term_id']] = $term['name'];
            }
        }
    }

    return $term_coll;
}

function pt_get_chosen_terms($terms_query) {

    $chosen_terms = array();
    $taxonomies = array();

    if (!empty($terms_query)) {
        foreach ($terms_query as $term_query) {
            list($taxonomy, $term_slug) = explode(':', $term_query);

            if (empty($taxonomy) || empty($term_slug))
                continue;
            $chosen_terms[] = get_term_by('slug', $term_slug, $taxonomy);

            if (!in_array($taxonomy, $taxonomies))
                $taxonomies[] = $taxonomy;
        }
    }

    // Remove duplicates
    $taxonomies = array_unique($taxonomies);

    return array($chosen_terms, $taxonomies);
}

function pt_entry_terms_list($taxonomy = 'category', $separator = ', ', $before = ' ', $after = ' ') {
    global $post;

    $output = '<span class="pt-' . $taxonomy . '-list">';
    $output .= get_the_term_list($post->ID, $taxonomy, $before, $separator, $after);
    $output .= '</span>';

    return $output;
}

function pt_get_taxonomy_info($taxonomies) {
    $output = '';
    $output .= '<span class="pt-terms">';
    $term_count = 0;
    foreach ($taxonomies as $taxonomy) {
        $terms = get_the_terms(get_the_ID(), $taxonomy);
        if (!empty($terms) && !is_wp_error($terms)) {
            foreach ($terms as $term) {
                if ($term_count != 0)
                    $output .= ', ';
                $term_link = get_term_link($term->slug, $taxonomy);
                if (!empty($term_link) && !is_wp_error($term_link))
                    $output .= '<a href="' . $term_link . '">' . $term->name . '</a>';
                else
                    $output .= $term->name;
                $term_count = $term_count + 1;
            }
        }
    }
    $output .= '</span>';
    return $output;
}

function pt_entry_published($format = null) {

    if (empty($format))
        $format = get_option('date_format');

    $published = '<span class="published"><abbr title="' . sprintf(get_the_time(esc_html__('l, F, Y, g:i a', 'elementor'))) . '">' . sprintf(get_the_time($format)) . '</abbr></span>';

    return $published;

    $link = '<span class="published">' . '<a href="' . get_day_link(get_the_time(esc_html__('Y', 'elementor')), get_the_time(esc_html__('m', 'elementor')), get_the_time(esc_html__('d', 'elementor'))) . '" title="' . sprintf(get_the_time(esc_html__('l, F, Y, g:i a', 'elementor'))) . '">' . '<span class="updated">' . get_the_time($format) . '</span>' . '</a></span>';

    return $link;
}

function pt_entry_author() {
    $author = '<span class="author vcard">' . esc_html__('By ', 'elementor') . '<a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '" title="' . esc_attr(get_the_author_meta('display_name')) . '">' . esc_html(get_the_author_meta('display_name')) . '</a></span>';
    return $author;
}


/* Return the css class name to help achieve the number of columns specified */



/*
* Converting string to boolean is a big one in PHP
*/
function pt_to_boolean($value) {
    if (!isset($value))
        return false;
    if ($value == 'true' || $value == '1')
        $value = true;
    elseif ($value == 'false' || $value == '0')
        $value = false;
    return (bool)$value; // Make sure you do not touch the value if the value is not a string
}

// get all registered taxonomies

function pt_color_luminance($hex, $percent) {

    // validate hex string

    $hex = preg_replace('/[^0-9a-f]/i', '', $hex);
    $new_hex = '#';

    if (strlen($hex) < 6) {
        $hex = $hex[0] + $hex[0] + $hex[1] + $hex[1] + $hex[2] + $hex[2];
    }

    // convert to decimal and change luminosity
    for ($i = 0; $i < 3; $i++) {
        $dec = hexdec(substr($hex, $i * 2, 2));
        $dec = min(max(0, $dec + $dec * $percent), 255);
        $new_hex .= str_pad(dechex($dec), 2, 0, STR_PAD_LEFT);
    }

    return $new_hex;
}




/**
 * Get system info
 *
 */
function pt_get_sysinfo() {
    global $wpdb;

    // Get theme info
    $theme_data = wp_get_theme();
    $theme = $theme_data->Name . ' ' . $theme_data->Version;

    $return = '### <strong>Begin System Info</strong> ###' . "\n\n";

    // Start with the basics...
    $return .= '-- Site Info' . "\n\n";
    $return .= 'Site URL:                 ' . site_url() . "\n";
    $return .= 'Home URL:                 ' . home_url() . "\n";
    $return .= 'Multisite:                ' . (is_multisite() ? 'Yes' : 'No') . "\n";

    // Theme info
    $plugin = get_plugin_data(LAE_PLUGIN_FILE);


    // Plugin configuration
    $return .= "\n" . '-- Plugin Configuration' . "\n\n";
    $return .= 'Name:                     ' . $plugin['Name'] . "\n";
    $return .= 'Version:                  ' . $plugin['Version'] . "\n";

    // WordPress configuration
    $return .= "\n" . '-- WordPress Configuration' . "\n\n";
    $return .= 'Version:                  ' . get_bloginfo('version') . "\n";
    $return .= 'Language:                 ' . (defined('WPLANG') && WPLANG ? WPLANG : 'en_US') . "\n";
    $return .= 'Permalink Structure:      ' . (get_option('permalink_structure') ? get_option('permalink_structure') : 'Default') . "\n";
    $return .= 'Active Theme:             ' . $theme . "\n";
    $return .= 'Show On Front:            ' . get_option('show_on_front') . "\n";

    // Only show page specs if frontpage is set to 'page'
    if (get_option('show_on_front') == 'page') {
        $front_page_id = get_option('page_on_front');
        $blog_page_id = get_option('page_for_posts');

        $return .= 'Page On Front:            ' . ($front_page_id != 0 ? get_the_title($front_page_id) . ' (#' . $front_page_id . ')' : 'Unset') . "\n";
        $return .= 'Page For Posts:           ' . ($blog_page_id != 0 ? get_the_title($blog_page_id) . ' (#' . $blog_page_id . ')' : 'Unset') . "\n";
    }

    $return .= 'ABSPATH:                  ' . ABSPATH . "\n";


    $return .= 'WP_DEBUG:                 ' . (defined('WP_DEBUG') ? WP_DEBUG ? 'Enabled' : 'Disabled' : 'Not set') . "\n";
    $return .= 'Memory Limit:             ' . WP_MEMORY_LIMIT . "\n";
    $return .= 'Registered Post Stati:    ' . implode(', ', get_post_stati()) . "\n";

    // Get plugins that have an update
    $updates = get_plugin_updates();

    // WordPress active plugins
    $return .= "\n" . '-- WordPress Active Plugins' . "\n\n";

    $plugins = get_plugins();
    $active_plugins = get_option('active_plugins', array());

    foreach ($plugins as $plugin_path => $plugin) {
        if (!in_array($plugin_path, $active_plugins))
            continue;

        $update = (array_key_exists($plugin_path, $updates)) ? ' (needs update - ' . $updates[$plugin_path]->update->new_version . ')' : '';
        $return .= $plugin['Name'] . ': ' . $plugin['Version'] . $update . "\n";
    }

    // WordPress inactive plugins
    $return .= "\n" . '-- WordPress Inactive Plugins' . "\n\n";

    foreach ($plugins as $plugin_path => $plugin) {
        if (in_array($plugin_path, $active_plugins))
            continue;

        $update = (array_key_exists($plugin_path, $updates)) ? ' (needs update - ' . $updates[$plugin_path]->update->new_version . ')' : '';
        $return .= $plugin['Name'] . ': ' . $plugin['Version'] . $update . "\n";
    }

    if (is_multisite()) {
        // WordPress Multisite active plugins
        $return .= "\n" . '-- Network Active Plugins' . "\n\n";

        $plugins = wp_get_active_network_plugins();
        $active_plugins = get_site_option('active_sitewide_plugins', array());

        foreach ($plugins as $plugin_path) {
            $plugin_base = plugin_basename($plugin_path);

            if (!array_key_exists($plugin_base, $active_plugins))
                continue;

            $update = (array_key_exists($plugin_path, $updates)) ? ' (needs update - ' . $updates[$plugin_path]->update->new_version . ')' : '';
            $plugin = get_plugin_data($plugin_path);
            $return .= $plugin['Name'] . ': ' . $plugin['Version'] . $update . "\n";
        }
    }

    // Server configuration (really just versioning)
    $return .= "\n" . '-- Webserver Configuration' . "\n\n";
    $return .= 'PHP Version:              ' . PHP_VERSION . "\n";
    $return .= 'MySQL Version:            ' . $wpdb->db_version() . "\n";
    $return .= 'Webserver Info:           ' . $_SERVER['SERVER_SOFTWARE'] . "\n";

    // PHP configs... now we're getting to the important stuff
    $return .= "\n" . '-- PHP Configuration' . "\n\n";
    $return .= 'Memory Limit:             ' . ini_get('memory_limit') . "\n";
    $return .= 'Upload Max Size:          ' . ini_get('upload_max_filesize') . "\n";
    $return .= 'Post Max Size:            ' . ini_get('post_max_size') . "\n";
    $return .= 'Upload Max Filesize:      ' . ini_get('upload_max_filesize') . "\n";
    $return .= 'Time Limit:               ' . ini_get('max_execution_time') . "\n";
    $return .= 'Max Input Vars:           ' . ini_get('max_input_vars') . "\n";
    $return .= 'Display Errors:           ' . (ini_get('display_errors') ? 'On (' . ini_get('display_errors') . ')' : 'N/A') . "\n";

    $return = apply_filters('edd_sysinfo_after_php_config', $return);

    // PHP extensions and such
    $return .= "\n" . '-- PHP Extensions' . "\n\n";
    $return .= 'cURL:                     ' . (function_exists('curl_init') ? 'Supported' : 'Not Supported') . "\n";
    $return .= 'fsockopen:                ' . (function_exists('fsockopen') ? 'Supported' : 'Not Supported') . "\n";
    $return .= 'SOAP Client:              ' . (class_exists('SoapClient') ? 'Installed' : 'Not Installed') . "\n";
    $return .= 'Suhosin:                  ' . (extension_loaded('suhosin') ? 'Installed' : 'Not Installed') . "\n";

    $return .= "\n" . '### End System Info ###';

    return $return;
}

/** Isotope filtering support for Portfolio pages **/

function pt_get_taxonomy_terms_filter($taxonomies, $chosen_terms = array()) {

    $output = '';
    $terms = array();

    if (empty($chosen_terms)) {

        foreach ($taxonomies as $taxonomy) {

            global $wp_version;

            if (version_compare($wp_version, '4.5', '>=')) {
                $taxonomy_terms = get_terms(array('taxonomy' => $taxonomy));
            }
            else {
                $taxonomy_terms = get_terms($taxonomy);
            }
            if (!empty($taxonomy_terms) && !is_wp_error($taxonomy_terms))
                $terms = array_merge($terms, $taxonomy_terms);
        }
    }
    else {
        $terms = $chosen_terms;
    }

    if (!empty($terms)) {

        $output .= '<div class="pt-taxonomy-filter">';

        $output .= '<div class="pt-filter-item segment-0 pt-active"><a data-value="*" href="#">' . esc_html__('All', 'elementor') . '</a></div>';

        $segment_count = 1;
        foreach ($terms as $term) {

            $output .= '<div class="pt-filter-item segment-' . intval($segment_count) . '"><a href="#" data-value=".term-' . intval($term->term_id) . '" title="' . esc_html__('View all items filed under ', 'elementor') . esc_attr($term->name) . '">' . esc_html($term->name) . '</a></div>';

            $segment_count++;
        }

        $output .= '</div>';

    }

    return $output;
}

function pt_woocommerce_product_categories(){
    $terms = get_terms( array(
        'taxonomy' => 'product_cat',
        'hide_empty' => true,
    ));

    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
    foreach ( $terms as $term ) {
        $options[ $term->slug ] = $term->name;
    }
    return $options;
    }
}

/**
 * WooCommerce Get Product By Id
 * @return array
 */
function pt_woocommerce_product_get_product_by_id(){
    $postlist = get_posts(array(
        'post_type' => 'product',
        'showposts' => 9999,
    ));
    $posts = array();

    if ( ! empty( $postlist ) && ! is_wp_error( $postlist ) ){
    foreach ( $postlist as $post ) {
        $options[ $post->ID ] = $post->post_title;
    }
    return $options;

    }
}

/**
 * WooCommerce Get Product Category By Id
 * @return array
 */
function pt_woocommerce_product_categories_by_id(){
    $terms = get_terms( array(
        'taxonomy' => 'product_cat',
        'hide_empty' => true,
    ));

    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
    foreach ( $terms as $term ) {
        $options[ $term->term_id ] = $term->name;
    }
    return $options;
    }

}
function get_elementor_page_list(){
		$pagelist = get_posts(array(
			'post_type' => 'elementor_library',
			'showposts' => 999,
		));
		
		if ( ! empty( $pagelist ) && ! is_wp_error( $pagelist ) ){
			foreach ( $pagelist as $post ) {
				$options[ $post->ID ] = __( $post->post_title, 'premium-addons-for-elementor' );
			}
			update_option( 'temp_count', $options );
			return $options;
		}
	}

function pt_get_column_class($column_size = 3) {

    $style_class = 'pt-threecol';

    $column_styles = array(
        1 => 'pt-twelvecol',
        2 => 'pt-sixcol',
        3 => 'pt-fourcol',
        4 => 'pt-threecol',
        5 => 'pt-onefifth',
        6 => 'pt-twocol',
        12 => 'pt-onecol'
    );

    if (array_key_exists($column_size, $column_styles) && !empty($column_styles[$column_size])) {
        $style_class = $column_styles[$column_size];
    }

    return $style_class;
}
    /**
     * Post Content By Id Setting
     *
     * @param int    $post_id Post data.
     * @param string $excerpt_length Content.
     *
     * @return int the integer.
     */
function pt_get_excerpt_by_id_lite( $post_id, $excerpt_length ) {
    $the_post = get_post( $post_id );

    $the_excerpt = null;
    if ( $the_post ) {
        $the_excerpt = $the_post->post_excerpt ? $the_post->post_excerpt : $the_post->post_content;
    }

    $the_excerpt = strip_tags( strip_shortcodes( $the_excerpt ) );
    $words = explode( ' ', $the_excerpt, $excerpt_length + 1 );

    if ( count( $words ) > $excerpt_length ) :
        array_pop( $words );
        $the_excerpt = implode( ' ', $words );
        $the_excerpt .= '...';
     endif;

     return $the_excerpt;
}
/**
 * Get Gravity Form [ if exists ]
 */

function pt_select_gravity_form() {
    $forms = RGFormsModel::get_forms( null, 'title' );
    foreach( $forms as $form ) {
      $options[ $form->id ] = $form->title;
    }
    return $options;

}