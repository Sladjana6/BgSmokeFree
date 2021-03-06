(function(wp){
    'use strict';
var el = wp.element.createElement,
    registerBlockType = wp.blocks.registerBlockType,
    withSelect = wp.data.withSelect,
    withState = wp.compose.withState,
    BlockControls = wp.editor.BlockControls,
    InspectorControls = wp.blocks.InspectorControls,
    Modal = wp.components.Modal,
    Button = wp.components.Button,
    __ = wp.i18n.__,
    Text = wp.components.TextControl,
    Dashicon = wp.components.Dashicon,
    aysSelect = wp.components.SelectControl;
    

var gpgMetaBlockField = function( props ) {
    var galleries = props.galleries;
    if(props.isSelected == false){        
        wp.data.dispatch( 'core/editor' ).updateBlockAttributes( props.clientId, {
            vichak: 'pakel',
            isOpen: true
        } );
    }
    if ( ! galleries ) {
            return __("Loading...");
        }
        if( typeof galleries != "object"){
            return galleries;
        }

        if ( galleries.length === 0 ) {
            return __("There are no galleries yet");
        }
        if(props.attributes.vichak == 'bacel'){            
            wp.data.dispatch( 'core/editor' ).updateBlockAttributes( props.clientId, {
                isOpen: true,                
                vichak: 'pakel'
            } );
        }
        var galleriner = [];
        galleriner.push({ label: __("-Select Gallery-"), value: ''});
        for(let i in galleries){
            let galleryData = {
                    value: galleries[i].id,
                    label: galleries[i].title,
                }
            galleriner.push(galleryData)
        }
        var aysElement = el(
            aysSelect, {
                className: 'ays_gpg_block_select',
                value: props.attributes.metaFieldValue,
                onChange: function( content ) {
                    wp.data.dispatch( 'core/editor' ).updateBlockAttributes( props.clientId, {
                        metaFieldValue: parseInt(content)
                    } );
                },
                options: galleriner
            },
        );
        var aysModal = (props.attributes.isOpen) ? el(
            Modal,
            {
                title: __('Select the Gallery'),
                onRequestClose: function(){
                    props.isOpen = false
                    wp.data.dispatch( 'core/editor' ).updateBlockAttributes( props.clientId, {
                        isOpen: false,
                        vichak: 'pakel'
                    } );
                }
            },
            el(
                "div",
                {
                    className: 'ays_gpg_block_container',        
                },
                aysElement,
                el(
                'div', {
                    className: 'ays_gpg_button_container'
                }, null,
                    el(
                        Button,
                        {
                            isDefault: true,
                            onClick: function(content){
                                wp.data.dispatch( 'core/editor' ).updateBlockAttributes( props.clientId, {
                                    shortcode: ("[gallery_p_gallery id='"+props.attributes.metaFieldValue+"']"),
                                    isOpen: false,
                                    vichak: 'pakel'
                                } );
                            }
                        },
                        __('Select')
                    ),
                ),
            ),
        ) : null;
        return el(
            wp.element.Fragment,
            {},
            el(
                BlockControls,
                props
            ),
            el(
                wp.editor.InspectorControls,
                {},
                el(
                    wp.components.PanelBody,
                    {},
                    el(
                        'div', {
                            className: 'ays_gpg_block_container'
                        }, null,
                        el(
                            Button,
                            {
                                isDefault: true,
                                onClick: function(content){
                                    wp.data.dispatch( 'core/editor' ).updateBlockAttributes( props.clientId, {
                                        isOpen: true,
                                        vichak: 'bacel'
                                    } );
                                }
                            },
                            __('Change Shortcode')
                        ),
                        aysModal,
                    ),
                ),
            ),
            el(
                Text,
                {
                    label: el( 'p', { style: { margin: 0 } },
                              el('span', {
                                    style: {
                                        display: 'inline-block',
                                        'font-size': '14px',
                                        'margin-right': '6px',
                                    }
                                }, "Gallery Shortcode"),
                              el( Dashicon, { 
                                icon: "shortcode",
                                className: 'svg_shortcode',
                            } ) ),
                    value: props.attributes.shortcode
                },
            ),
            
        );    
}
registerBlockType( 'gallery-photo-gallery/gallery', {
    title: __('Gallery - Photo Gallery'),
    category: 'common',
    icon: 'format-gallery',
    edit: withSelect( function( select ) {
        if(select( 'core/blocks' ).getBlockType( 'gallery-photo-gallery/gallery' ).attributes.idner &&
           (select( 'core/blocks' ).getBlockType( 'gallery-photo-gallery/gallery' ).attributes.idner != undefined ||
            select( 'core/blocks' ).getBlockType( 'gallery-photo-gallery/gallery' ).attributes.idner != null ) ){
            return {
                galleries: select( 'core/blocks' ).getBlockType( 'gallery-photo-gallery/gallery' ).attributes.idner
            };
        }else{
            return {
                galleries: __( "Something goes wrong please reload page" )
            };
        }
    } )(gpgMetaBlockField),

    save: function() {
        return null;           
    },
} );
})(wp);