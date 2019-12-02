<?php

require __DIR__ . '/vendor/autoload.php';

class Meow_Gallery_Custom_Links
{
	public $isEnabled = true;
	// use OB on the whole page, or only go through the the_content ($renderingMode will be ignored)
	public $isObMode = true;
	// 'HtmlDomParser' (less prone to break badly formatted HTML) or 'DiDom' (faster)
	public $parsingEngine = 'HtmlDomParser';
	public $enableLogs = false;

	public function __construct() {

		if ( is_admin() || $this->is_rest() ) {
			return;
		}
		$this->isObMode = get_option( 'mgcl_obmode', $this->isObMode );
		$this->parsingEngine = get_option( 'mgcl_parsing_engine', $this->parsingEngine );
		$this->enableLogs = get_option( 'mgcl_log', $this->enableLogs );
		if ( $this->isObMode ) {
			add_action( 'init', array( $this, 'start' ) );
			add_action( 'shutdown', array( $this, 'shutdown' ) );
			add_action( 'wp_footer', array( $this, 'unlink_lightboxes_script' ) ) ;
		}
		else {
			add_filter( 'the_content', array( $this, 'linkify' ), 100 );
			add_action( 'wp_footer', array( $this, 'unlink_lightboxes_script' ) ) ;
		}
	}

	function is_rest() {
		$prefix = rest_get_url_prefix() . '/';
		$method = $_SERVER['REQUEST_METHOD'];
		$uri = $_SERVER['REQUEST_URI'];
		if ( $method !== 'GET' && strpos( $uri, $prefix ) !== false ) {
			return true;
		}
		return false;
	}

	function init() {
		//add_action( 'init', array( $this, 'init' ) );
		// We don't need this now, we go through all the images.
		include "mgcl_extra.php";
		new Meow_Gallery_Custom_Links_Extra();
	}

	function start() {
		$this->isEnabled = apply_filters( 'gallery_custom_links_enabled', true );
		if ( $this->isEnabled && $this->isObMode )
			ob_start( array( $this, "linkify" ) );
	}

	// Clean the path from the domain and common folders
	// Originally written for the WP Retina 2x plugin
	function get_pathinfo_from_image_src( $image_src ) {
		$uploads = wp_upload_dir();
		$uploads_url = trailingslashit( $uploads['baseurl'] );
		if ( strpos( $image_src, $uploads_url ) === 0 )
			return ltrim( substr( $image_src, strlen( $uploads_url ) ), '/');
		else if ( strpos( $image_src, wp_make_link_relative( $uploads_url ) ) === 0 )
			return ltrim( substr( $image_src, strlen( wp_make_link_relative( $uploads_url ) ) ), '/');
		$img_info = parse_url( $image_src );
		return ltrim( $img_info['path'], '/' );
	}

	function resolve_image_id( $url ) {
		global $wpdb;
		$pattern = '/[_-]\d+x\d+(?=\.[a-z]{3,4}$)/';
		$url = preg_replace( $pattern, '', $url );
		$url = $this->get_pathinfo_from_image_src( $url );
		$query = $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE guid LIKE '%s'", '%' . $url . '%' );
		$attachment = $wpdb->get_col( $query );
		return empty( $attachment ) ? null : $attachment[0];
	}

	function linkify_element( $element ) {
		$mediaId = null;
		$url = null;

		// 1. If there is an Attachment ID
		$mediaId = $this->parsingEngine === 'HtmlDomParser' ? $element->{'data-attachment-id'} : $element->attr('data-attachment-id');

		// 2. Check if the wp-image-xxx class exists
		if ( empty( $mediaId ) ) {
			$classes = $this->parsingEngine === 'HtmlDomParser' ? $element->class : $element->attr('class');
			if ( preg_match( '/wp-image-([0-9]{1,10})/i', $classes, $matches ) )
				$mediaId = $matches[1];
		}

		// 3. Otherwise, resolve the ID from the URL
		if ( empty( $mediaId ) ) {
			$url = $this->parsingEngine === 'HtmlDomParser' ? $element->src : $element->attr('src');
			$mediaId = $this->resolve_image_id( $url );
		}

		if ( $this->enableLogs ) {
			error_log( 'Linker: Found img tag with classes: ' . $classes );
		}

		if ( $mediaId ) {
			$url = get_post_meta( $mediaId, '_gallery_link_url', true );
			if ( !empty( $url ) ) {
				$target = get_post_meta( $mediaId, '_gallery_link_target', true );
				$rel = get_post_meta( $mediaId, '_gallery_link_rel', true );
				if ( empty( $target ) )
					$target = '_self';
				$parent = $element->parent();

				if ( $this->enableLogs ) {
					error_log( 'Linker: Found Media ' . $mediaId . ' (URL: ' . $url . ')' );
				}

				// Let's look for the closest link tag enclosing the image
				$potentialLinkNode = $parent;
				$maxDepth = 5;
				do {
					if ( !empty( $potentialLinkNode ) && $potentialLinkNode->tag === 'a' ) {

						if ( $this->enableLogs ) {
							error_log( 'Linker: The current link (' . $potentialLinkNode->{'href'} . ') will be replaced.' );
						}

						if ( $this->parsingEngine === 'HtmlDomParser' ) {
							$potentialLinkNode->{'href'} = $url;
							$class = $potentialLinkNode->{'class'};
							$class = empty( $class ) ? 'custom-link no-lightbox' : ( $class . ' custom-link no-lightbox' );
							$potentialLinkNode->{'class'} = $class;
							$potentialLinkNode->{'onclick'} = 'event.stopPropagation()';
							$potentialLinkNode->{'target'} = $target;
							$potentialLinkNode->{'rel'} = $rel;
						}
						else {
							$potentialLinkNode->attr( 'href', $url );
							$class = $potentialLinkNode->attr( 'class' );
							$class = empty( $class ) ? 'custom-link no-lightbox' : ( $class . ' custom-link no-lightbox' );
							$potentialLinkNode->attr( 'class', $class );
							$potentialLinkNode->attr( 'onclick', 'event.stopPropagation()' );
							$potentialLinkNode->attr( 'target', $target );
							$potentialLinkNode->attr( 'rel', $rel );
						}
						return true;
					}
					if ( method_exists( $potentialLinkNode, 'parent' ) )
						$potentialLinkNode = $potentialLinkNode->parent();
					else
						break;
				}
				while ( $potentialLinkNode && $maxDepth-- >= 0 );

				// There is no link tag, so we add one and move the image under it
				if ( $this->enableLogs ) {
					error_log( 'Linker: Will embed the IMG tag.' );
				}
				if ( $this->parsingEngine === 'HtmlDomParser' ) {
					$element->outertext = '<a href="' . $url . '" class="custom-link no-lightbox" onclick="event.stopPropagation()" target="' . $target . '" rel="' . $rel . '">' . $element . '</a>';
				}
				else {
					if ( $parent->tag === 'figure' )
						$parent = $parent->parent();
					$a = new DiDom\Element('a');
					$a->attr( 'href', $url );
					$a->attr( 'class', 'custom-link no-lightbox' );
					$a->attr( 'onclick', 'event.stopPropagation()' );
					$a->attr( 'target', $target );
					$a->attr( 'rel', $rel );
					$a->appendChild( $parent->children() );
					foreach( $parent->children() as $img ) {
						$img->remove();
					}
					$parent->appendChild( $a );
				}
				return true;
			}
		}
		return false;
	}

	function linkify( $buffer ) {
		$this->isEnabled = apply_filters( 'gallery_custom_links_enabled', true );
		if ( !$this->isEnabled || !isset( $buffer ) || trim( $buffer ) === '' )
			return $buffer;

		if ( $this->parsingEngine === 'HtmlDomParser' ) {
			$html = new KubAT\PhpSimple\HtmlDomParser();
			$html = $html->str_get_html( $buffer, true, true, DEFAULT_TARGET_CHARSET, false );
		}
		else {
			$html = new DiDom\Document();
			$html->preserveWhiteSpace();
			if ( defined( 'LIBXML_HTML_NOIMPLIED' ) && defined( 'LIBXML_HTML_NODEFDTD' ) )
				$html->loadHtml( $buffer, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD );
			else
				$html->loadHtml( $buffer, 0 );
		}

		if ( empty( $html ) || is_bool( $html ) ) {
			return $buffer;
		}

		$hasChanges = false;
		$classes = array( '' ); // Get all images
		//$classes = apply_filters( 'gallery_custom_links_classes', array( '.entry-content', '.gallery', '.wp-block-gallery' ) );
		foreach ( $classes as $class ) {
			foreach ( $html->find( $class . ' img' ) as $element ) {
				$hasChanges = $this->linkify_element( $element ) || $hasChanges;
			}
		}
		$finalHtml = $this->parsingEngine === 'HtmlDomParser' ? $html : $html->html();
		return $hasChanges ? $finalHtml : $buffer;
	}

	function shutdown() {
		if ( !$this->isEnabled )
			return;
		@ob_end_flush();
	}

	function unlink_lightboxes_script() {
		?>
			<script>
				// Used by Gallery Custom Links to handle tenacious Lightboxes
				jQuery(document).ready(function () {

					function mgclInit() {
						if (jQuery.fn.off) {
							jQuery('.no-lightbox, .no-lightbox img').off('click'); // jQuery 1.7+
						}
						else {
							jQuery('.no-lightbox, .no-lightbox img').unbind('click'); // < jQuery 1.7
						}
						jQuery('a.no-lightbox').click(mgclOnClick);

						if (jQuery.fn.off) {
							jQuery('a.set-target').off('click'); // jQuery 1.7+
						}
						else {
							jQuery('a.set-target').unbind('click'); // < jQuery 1.7
						}
						jQuery('a.set-target').click(mgclOnClick);
					}

					function mgclOnClick() {
						if (!this.target || this.target == '' || this.target == '_self')
							window.location = this.href;
						else
							window.open(this.href,this.target);
						return false;
					}

					// From WP Gallery Custom Links
					// Reduce the number of  conflicting lightboxes
					function mgclAddLoadEvent(func) {
						var oldOnload = window.onload;
						if (typeof window.onload != 'function') {
							window.onload = func;
						} else {
							window.onload = function() {
								oldOnload();
								func();
							}
						}
					}

					mgclAddLoadEvent(mgclInit);
					mgclInit();

				});
			</script>
		<?php
	}
}

?>