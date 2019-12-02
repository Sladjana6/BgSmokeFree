<?php

/* @galleries/shortcode/gallery.twig */
class __TwigTemplate_2296ffb6ab1b493fa10c7cb0ed64cc1bb33f27081d70084bda0c0c221dd0b21b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'gallery_before' => array($this, 'block_gallery_before'),
            'gallery_attributes' => array($this, 'block_gallery_attributes'),
            'additionalGridGalleryClass' => array($this, 'block_additionalGridGalleryClass'),
            'photos_before' => array($this, 'block_photos_before'),
            'photos_attributes' => array($this, 'block_photos_attributes'),
            'photos_attributes_class' => array($this, 'block_photos_attributes_class'),
            'photos' => array($this, 'block_photos'),
            'photos_after' => array($this, 'block_photos_after'),
            'styleForEffectInclude' => array($this, 'block_styleForEffectInclude'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["style"] = $this->loadTemplate("@galleries/shortcode/style.twig", "@galleries/shortcode/gallery.twig", 1);
        // line 2
        echo "
";
        // line 3
        if ((array_key_exists("gallery", $context) &&  !twig_test_empty(($context["gallery"] ?? null)))) {
            // line 4
            echo "\t";
            $this->displayBlock('gallery_before', $context, $blocks);
            // line 14
            echo "
\t<div
\t\t";
            // line 16
            $this->displayBlock('gallery_attributes', $context, $blocks);
            // line 209
            echo ">

\t\t";
            // line 211
            if ((($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "preload", array()), "enabled", array()) == "true") || ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "preload", array()), "enabled", array()) == null))) {
                // line 212
                echo "\t\t\t";
                if (((($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "preload", array()), "icon_name", array()) == "default") || ($this->getAttribute(($context["environment"] ?? null), "isPro", array(), "method") != true)) || ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "preload", array()), "enabled", array()) == null))) {
                    // line 213
                    echo "\t\t\t\t<div class=\"gallery-loading\">
\t\t\t\t\t<div class=\"blocks\">
\t\t\t\t\t\t<div class=\"block\"></div>
\t\t\t\t\t\t<div class=\"block\"></div>
\t\t\t\t\t\t<div class=\"block\"></div>
\t\t\t\t\t\t<div class=\"block\"></div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t";
                } else {
                    // line 222
                    echo "\t\t\t\t<div class=\"gallery-loading\">
\t\t\t\t\t<div class=\"la-";
                    // line 223
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "preload", array()), "icon_name", array()), "html", null, true);
                    echo "\" style=\"color: ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "preload", array()), "background", array()), "html", null, true);
                    echo "\">
\t\t\t\t\t\t";
                    // line 224
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(range(1, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "preload", array()), "icon_items", array())));
                    foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                        // line 225
                        echo "\t\t\t\t\t\t\t<div></div>
\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 227
                    echo "\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t";
                }
                // line 230
                echo "\t\t";
            }
            // line 231
            echo "
\t\t";
            // line 232
            $this->displayBlock('photos_before', $context, $blocks);
            // line 234
            echo "
\t\t";
            // line 235
            if ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "socialSharing", array()), "enabled", array())) {
                // line 236
                echo "            <div id=\"social-share-html\" style=\"display:none;\">
                ";
                // line 237
                echo $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "socialSharing", array()), "html", array());
                echo "
                ";
                // line 239
                echo "            </div>
        ";
            }
            // line 241
            echo "
\t\t<div class=\"gallery-sharing-top\"></div>
\t\t<div
\t\t\t";
            // line 244
            $this->displayBlock('photos_attributes', $context, $blocks);
            // line 247
            echo ">

\t\t\t";
            // line 249
            $this->displayBlock('photos', $context, $blocks);
            // line 257
            echo "
\t\t\t<div class=\"grid-gallery-clearfix\"></div>
\t\t</div>
\t\t<div class=\"gallery-sharing-bottom\"></div>

\t\t<div class=\"grid-gallery-clearfix\"></div>

\t\t";
            // line 264
            $this->displayBlock('photos_after', $context, $blocks);
            // line 266
            echo "\t</div>
\t
\t<!-- Gallery by Supsystic plugin ";
            // line 268
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["environment"] ?? null), "getConfig", array(), "method"), "get", array(0 => "plugin_version"), "method"), "html", null, true);
            echo "  ";
            if (($this->getAttribute(($context["environment"] ?? null), "isPro", array(), "method") == true)) {
                echo " / ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["environment"] ?? null), "getConfig", array(), "method"), "get", array(0 => "pro_plugin_version"), "method"), "html", null, true);
            }
            echo " -->
";
        }
        // line 270
        echo "
";
        // line 271
        $this->displayBlock('styleForEffectInclude', $context, $blocks);
    }

    // line 4
    public function block_gallery_before($context, array $blocks = array())
    {
        // line 5
        echo "\t\t";
        if (($this->getAttribute(($context["settings"] ?? null), "icons", array(), "any", true, true) && ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "enabled", array()) == "true"))) {
            // line 6
            echo "\t\t\t<style>
\t\t\t\t #grid-gallery-";
            // line 7
            echo twig_escape_filter($this->env, $this->getAttribute(($context["gallery"] ?? null), "id", array()), "html", null, true);
            echo "-";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["gallery"] ?? null), "random_val", array()), "html", null, true);
            echo " .";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "effect", array()), "html", null, true);
            echo " .hi-icon { color: ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "color", array()), "html", null, true);
            echo " !important; background: ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "background", array()), "html", null, true);
            echo " !important; }
\t\t\t\t #grid-gallery-";
            // line 8
            echo twig_escape_filter($this->env, $this->getAttribute(($context["gallery"] ?? null), "id", array()), "html", null, true);
            echo "-";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["gallery"] ?? null), "random_val", array()), "html", null, true);
            echo " .";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "effect", array()), "html", null, true);
            echo " .hi-icon:hover { color: ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "hover_color", array()), "html", null, true);
            echo " !important; background: ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "background_hover", array()), "html", null, true);
            echo " !important; }
\t\t\t\t #grid-gallery-";
            // line 9
            echo twig_escape_filter($this->env, $this->getAttribute(($context["gallery"] ?? null), "id", array()), "html", null, true);
            echo "-";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["gallery"] ?? null), "random_val", array()), "html", null, true);
            echo " .hi-icon { width: ";
            echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "size", array()) * 2), "html", null, true);
            echo "px !important; height: ";
            echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "size", array()) * 2), "html", null, true);
            echo "px !important; }
\t\t\t\t #grid-gallery-";
            // line 10
            echo twig_escape_filter($this->env, $this->getAttribute(($context["gallery"] ?? null), "id", array()), "html", null, true);
            echo "-";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["gallery"] ?? null), "random_val", array()), "html", null, true);
            echo " .hi-icon:before { font-size: ";
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array(), "any", false, true), "size", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array(), "any", false, true), "size", array()), 16)) : (16)), "html", null, true);
            echo "px !important; line-height: ";
            echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "size", array()) * 2), "html", null, true);
            echo "px !important; }
\t\t\t</style>
\t\t";
        }
        // line 13
        echo "\t";
    }

    // line 16
    public function block_gallery_attributes($context, array $blocks = array())
    {
        // line 17
        echo "\t\t\tid=\"grid-gallery-";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["gallery"] ?? null), "id", array()), "html", null, true);
        echo "-";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["gallery"] ?? null), "random_val", array()), "html", null, true);
        echo "\"
\t\t\tdata-gg-id=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute(($context["gallery"] ?? null), "id", array()), "html", null, true);
        echo "\"
\t\t\tdata-title=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute(($context["gallery"] ?? null), "title", array()), "html", null, true);
        echo "\"
\t\t\tdata-grid-type=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "grid", array()), "html", null, true);
        echo "\"
\t\t\tdata-offset=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "distance", array()), "html", null, true);
        echo "\"
\t\t\tdata-area-position=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "position", array()), "html", null, true);
        echo "\"
\t\t\tdata-icons=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "enabled", array()), "html", null, true);
        echo "\"
\t\t\tdata-preloader=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "preload", array()), "enabled", array()), "html", null, true);
        echo "\"
\t\t\t";
        // line 25
        if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "grid", array()) == "2")) {
            // line 26
            echo " \t\t\t\tdata-width=\"auto\"
 \t\t\t";
        } else {
            // line 28
            echo " \t\t\t\tdata-width=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "photo_width", array()), "html", null, true);
            if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "photo_width_unit", array()) == 1)) {
                echo "%";
            }
            echo "\"
 \t\t\t";
        }
        // line 30
        echo "\t\t\tdata-height=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "photo_height", array()), "html", null, true);
        if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "photo_height_unit", array()) == 1)) {
            echo "%";
        }
        echo "\"
\t\t\tdata-padding=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "padding", array()), "html", null, true);
        echo "\"
\t\t\tdata-quicksand=\"";
        // line 32
        if ((($this->getAttribute(($context["settings"] ?? null), "categories", array(), "any", true, true) && ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "categories", array()), "enabled", array()) == "true")) && ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "quicksand", array()), "enabled", array()) == "1"))) {
            echo "enabled";
        } else {
            echo "disabled";
        }
        echo "\"
\t\t\tdata-quicksand-duration=\"";
        // line 33
        if ( !twig_test_empty($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "quicksand", array()), "duration", array()))) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "quicksand", array()), "duration", array()), "html", null, true);
        } else {
            echo "none";
        }
        echo "\"
\t\t\t";
        // line 34
        if (($this->getAttribute(($context["settings"] ?? null), "browserUrlTooltipHide", array(), "any", true, true) && ($this->getAttribute(($context["settings"] ?? null), "browserUrlTooltipHide", array()) == 1))) {
            // line 35
            echo "\t\t\t\tdata-popup-type=\"disable\"
\t\t\t";
        } else {
            // line 37
            echo "\t\t\t\t";
            if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array(), "any", false, true), "enabled", array(), "any", true, true) && ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array()), "enabled", array()) == "false"))) {
                // line 38
                echo "\t\t\t\t\tdata-popup-type=\"disable\"
\t\t\t\t";
            } else {
                // line 40
                echo "\t\t\t\t\tdata-popup-theme=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array()), "theme", array()), "html", null, true);
                echo "\"
\t\t\t\t";
            }
            // line 42
            echo "\t\t\t\t";
            if ((($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array()), "type", array()) == "0") && (($context["mobile"] ?? null) != "true"))) {
                // line 43
                echo "\t\t\t\t\tdata-popup-type=\"colorbox\"
\t\t\t\t\tdata-popup-fadeOut=\"";
                // line 44
                echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array(), "any", false, true), "fadeOut", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array(), "any", false, true), "fadeOut", array()), 300)) : (300)), "html", null, true);
                echo "\"
\t\t\t\t";
            }
            // line 46
            echo "\t\t\t\t";
            if (((($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array()), "type", array()) == "1") && (($context["mobile"] ?? null) != "true")) && ((($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array(), "any", false, true), "enabled", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array(), "any", false, true), "enabled", array()), "true")) : ("true")) == "true"))) {
                // line 47
                echo "\t\t\t\t\tdata-popup-type=\"pretty-photo\"
\t\t\t\t";
            }
            // line 49
            echo "\t\t\t\t";
            if (((($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array()), "type", array()) == "2") && (($context["mobile"] ?? null) != "true")) && ((($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array(), "any", false, true), "enabled", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array(), "any", false, true), "enabled", array()), "true")) : ("true")) == "true"))) {
                // line 50
                echo "\t\t\t\t\tdata-popup-type=\"photobox\"
\t\t\t\t";
            }
            // line 52
            echo "\t\t\t\t";
            if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "grid", array()) == "3")) {
                // line 53
                echo "\t\t\t\t\tdata-columns-number=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "general", array()), "columns", array()), "number", array()), "html", null, true);
                echo "\"
\t\t\t\t";
            }
            // line 55
            echo "\t\t\t\t";
            if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array()), "captions", array()) == "on")) {
                // line 56
                echo "\t\t\t\t\tdata-popup-captions=\"hide\"
\t\t\t\t";
            }
            // line 58
            echo "
\t\t\t\tdata-popup-image-text=\"";
            // line 59
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array(), "any", false, true), "imageText", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array(), "any", false, true), "imageText", array()), "title")) : ("title")), "html", null, true);
            echo "\"

\t\t\t\t";
            // line 61
            if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array()), "popupwidth", array()) == "")) {
                echo " 
\t\t\t\t\tdata-popup-widthsize=\"auto\"
\t\t\t\t";
            } else {
                // line 63
                echo " 
\t\t\t\t\tdata-popup-widthsize=\"";
                // line 64
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array()), "popupwidth", array()), "html", null, true);
                echo "\"
\t\t\t\t";
            }
            // line 66
            echo "
\t\t\t\t";
            // line 67
            if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array()), "popupheight", array()) == "")) {
                echo " 
\t\t\t\t\tdata-popup-heightsize=\"auto\"
\t\t\t\t";
            } else {
                // line 69
                echo " 
\t\t\t\t\tdata-popup-heightsize=\"";
                // line 70
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array()), "popupheight", array()), "html", null, true);
                echo "\"
\t\t\t\t";
            }
            // line 72
            echo "\t\t\t";
        }
        // line 73
        echo "
\t\t\t";
        // line 74
        $context["popup_i18n_words"] = array("close" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("close")), "next" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("next")), "previous" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("previous")), "start_slideshow" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("start slideshow")), "stop_slideshow" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("stop slideshow")), "image" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("image")), "of" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("of")), "prev" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("prev")), "cExpand" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Expand")), "cPrevious" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Previous")), "cNext" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Next")), "cExpandStr" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Expand the image")), "cRotate" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Rotate")), "cDetails" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Details")));
        // line 75
        echo "\t\t\tdata-popup-i18n-words=\"";
        echo twig_escape_filter($this->env, twig_jsonencode_filter(($context["popup_i18n_words"] ?? null)));
        echo "\"

            data-popup-slideshow=\"";
        // line 77
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array(), "any", false, true), "slideshow", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array(), "any", false, true), "slideshow", array()), "false")) : ("false")), "html", null, true);
        echo "\"
\t\t\tdata-popup-slideshow-speed=\"";
        // line 78
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array(), "any", false, true), "slideshowSpeed", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array(), "any", false, true), "slideshowSpeed", array()), 2500)) : (2500)), "html", null, true);
        echo "\"
\t\t\tdata-popup-hoverstop=\"";
        // line 79
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array(), "any", false, true), "popupHoverStop", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array(), "any", false, true), "popupHoverStop", array()), "true")) : ("true")), "html", null, true);
        echo "\"
\t\t\tdata-popup-slideshow-auto=\"";
        // line 80
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array(), "any", false, true), "slideshowAuto", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array(), "any", false, true), "slideshowAuto", array()), "false")) : ("false")), "html", null, true);
        echo "\"
\t\t\tdata-popup-background=\"";
        // line 81
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array()), "background", array()), "html", null, true);
        echo "\"
\t\t\tdata-popup-transparency=\"";
        // line 82
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array(), "any", false, true), "transparency", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array(), "any", false, true), "transparency", array()), 30)) : (30)), "html", null, true);
        echo "\"
\t\t\tdata-popup-disable-history=\"";
        // line 83
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array()), "disableHistory", array()), "html", null, true);
        echo "\"
\t\t\tdata-popup-disable-changed-url=\"";
        // line 84
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array()), "disableChangeUrl", array()), "html", null, true);
        echo "\"
\t\t\tdata-popup-border-type=\"";
        // line 85
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "popup", array()), "border", array()), "type", array()), "html", null, true);
        echo "\"
\t\t\tdata-popup-border-color=\"";
        // line 86
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "popup", array()), "border", array()), "color", array()), "html", null, true);
        echo "\"
\t\t\tdata-popup-border-width=\"";
        // line 87
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "popup", array()), "border", array()), "width", array()), "html", null, true);
        echo "\"
\t\t\tdata-popup-border-enable=\"";
        // line 88
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "popup", array()), "border", array()), "enable", array()), "html", null, true);
        echo "\"
\t\t\tdata-fullscreen=\"";
        // line 89
        echo (($this->getAttribute(($context["settings"] ?? null), "fullscreen", array())) ? ("true") : ("false"));
        echo "\"
\t\t\tdata-hide-tooltip=\"";
        // line 90
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "tooltip", array()), "html", null, true);
        echo "\"
\t\t\tdata-caption-font-family=\"";
        // line 91
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "font_family", array()), "html", null, true);
        echo "\"
\t\t\tdata-caption-text-size=\"";
        // line 92
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "text_size", array()), "html", null, true);
        echo twig_escape_filter($this->env, twig_replace_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "text_size_unit", array()), array(0 => "px", 1 => "%", 2 => "em")), "html", null, true);
        echo "\"
\t\t\tdata-is-mobile=\"";
        // line 93
        echo twig_escape_filter($this->env, ((array_key_exists("isMobile", $context)) ? (_twig_default_filter(($context["isMobile"] ?? null), "0")) : ("0")), "html", null, true);
        echo "\"
\t\t\tdata-caption-mobile=\"";
        // line 94
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array(), "any", false, true), "isMobile", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array(), "any", false, true), "isMobile", array()), "false")) : ("false")), "html", null, true);
        echo "\" ";
        // line 95
        echo "\t\t\tdata-hide-long-tltp-title=\"";
        echo ((($this->getAttribute(($context["settings"] ?? null), "hideLongTooltipTitles", array()) == "on")) ? ("1") : ("0"));
        echo "\"
\t\t\tdata-caption-disabled-on-mobile=\"";
        // line 96
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array(), "any", false, true), "isDisableMobileCaption", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array(), "any", false, true), "isDisableMobileCaption", array()), "false")) : ("false")), "html", null, true);
        echo "\"
\t\t\t";
        // line 97
        if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "lazyload", array()), "enabled", array()) == "1")) {
            echo " 
\t\t\t\tdata-lazyload-enable='1' 
\t\t\t\tdata-lazyload-effect=\"";
            // line 99
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "lazyload", array(), "any", false, true), "animationEffect", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "lazyload", array(), "any", false, true), "animationEffect", array()), "show")) : ("show")), "html", null, true);
            echo "\"
\t\t\t\tdata-lazyload-effect-duration=\"";
            // line 100
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "lazyload", array(), "any", false, true), "effectDuration", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "lazyload", array(), "any", false, true), "effectDuration", array()), "400")) : ("400")), "html", null, true);
            echo "\"
\t\t\t";
        }
        // line 102
        echo "\t\t\t";
        if (($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "effect", array()) == "polaroid")) {
            // line 103
            echo "\t\t\t\tdata-polaroid-animation=\"";
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array(), "any", false, true), "overlay", array(), "any", false, true), "polaroidAnimation", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array(), "any", false, true), "overlay", array(), "any", false, true), "polaroidAnimation", array()), "true")) : ("true")), "html", null, true);
            echo "\"
\t\t\t\tdata-polaroid-scattering=\"";
            // line 104
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array(), "any", false, true), "overlay", array(), "any", false, true), "polaroidScattering", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array(), "any", false, true), "overlay", array(), "any", false, true), "polaroidScattering", array()), "true")) : ("true")), "html", null, true);
            echo "\"
\t\t\t\tdata-polaroid-frame-width=\"";
            // line 105
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array(), "any", false, true), "overlay", array(), "any", false, true), "polaroidFrameWidth", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array(), "any", false, true), "overlay", array(), "any", false, true), "polaroidFrameWidth", array()), 20)) : (20)), "html", null, true);
            echo "\"
\t\t\t\t";
            // line 106
            if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "captionBuilder", array()), "enabled", array()) == "1")) {
                // line 107
                echo "\t\t\t\t\tdata-polaroid-caption-height=\"";
                echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "captionBuilder", array(), "any", false, true), "title", array(), "any", false, true), "height", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "captionBuilder", array(), "any", false, true), "title", array(), "any", false, true), "height", array()), 50)) : (50)), "html", null, true);
                echo "\"
\t\t\t\t";
            }
            // line 109
            echo "\t\t\t";
        }
        // line 110
        echo "\t\t\t";
        if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "grid", array()) == "3")) {
            // line 111
            echo "\t\t\t\tdata-responsive-colums=\"";
            echo twig_escape_filter($this->env, twig_jsonencode_filter((($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "general", array(), "any", false, true), "responsiveColumns", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "general", array(), "any", false, true), "responsiveColumns", array()), "")) : (""))));
            echo "\"
\t\t\t";
        }
        // line 113
        echo "\t\t\t";
        if (($this->getAttribute(($context["settings"] ?? null), "horizontalScroll", array(), "any", true, true) && ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "horizontalScroll", array()), "enabled", array()) == "true"))) {
            // line 114
            echo "\t\t\t\tdata-horizontal-scroll=\"";
            echo twig_escape_filter($this->env, twig_jsonencode_filter($this->getAttribute(($context["settings"] ?? null), "horizontalScroll", array())));
            echo "\"
\t\t\t";
        }
        // line 116
        echo "\t\t\t";
        if (($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "personal", array()) == "true")) {
            // line 117
            echo "\t\t\t\tdata-thumb-overlay-personal=\"1\"
\t\t\t";
        }
        // line 119
        echo "\t\t\tdata-popup-placement-type=\"";
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "popup", array(), "any", false, true), "placementType", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "popup", array(), "any", false, true), "placementType", array()), 0)) : (0)), "html", null, true);
        echo "\"

            ";
        // line 121
        $context["imageSharingButPos"] = $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "socialSharing", array()), "imageSharing", array()), "buttonsPosition", array());
        // line 122
        echo "            ";
        $context["imageSharingWrapperClass"] = (($context["imageSharingButPos"] ?? null) . " ");
        // line 123
        echo "            ";
        if (((($context["imageSharingButPos"] ?? null) == "top") || (($context["imageSharingButPos"] ?? null) == "bottom"))) {
            // line 124
            echo "                ";
            $context["imageSharingWrapperClass"] = (($context["imageSharingWrapperClass"] ?? null) . $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "socialSharing", array()), "imageSharing", array()), "buttonsAlignHorizontal", array()));
            // line 125
            echo "            ";
        } else {
            // line 126
            echo "                    ";
            $context["imageSharingWrapperClass"] = ((($context["imageSharingWrapperClass"] ?? null) . "vertical ") . $this->getAttribute($this->getAttribute($this->getAttribute(            // line 127
($context["settings"] ?? null), "socialSharing", array()), "imageSharing", array()), "buttonsAlignVertical", array()));
            // line 128
            echo "            ";
        }
        // line 129
        echo "
            ";
        // line 140
        echo "
            ";
        // line 141
        $context["socialSharing"] = array("enabled" => $this->getAttribute($this->getAttribute(        // line 142
($context["settings"] ?? null), "socialSharing", array()), "enabled", array()), "gallerySharing" => array("enabled" => $this->getAttribute($this->getAttribute($this->getAttribute(        // line 144
($context["settings"] ?? null), "socialSharing", array()), "gallerySharing", array()), "enabled", array()), "position" => $this->getAttribute($this->getAttribute($this->getAttribute(        // line 145
($context["settings"] ?? null), "socialSharing", array()), "gallerySharing", array()), "buttonsPosition", array())), "imageSharing" => array("enabled" => $this->getAttribute($this->getAttribute($this->getAttribute(        // line 148
($context["settings"] ?? null), "socialSharing", array()), "imageSharing", array()), "enabled", array()), "wrapperClass" => $this->getAttribute(        // line 149
$this, "getSocialSharingWrapperClass", array(0 => $this->getAttribute($this->getAttribute($this->getAttribute(        // line 150
($context["settings"] ?? null), "socialSharing", array()), "imageSharing", array()), "buttonsPosition", array()), 1 => $this->getAttribute($this->getAttribute($this->getAttribute(        // line 151
($context["settings"] ?? null), "socialSharing", array()), "imageSharing", array()), "buttonsAlignHorizontal", array()), 2 => $this->getAttribute($this->getAttribute($this->getAttribute(        // line 152
($context["settings"] ?? null), "socialSharing", array()), "imageSharing", array()), "buttonsAlignVertical", array())), "method")), "popupSharing" => array("enabled" => $this->getAttribute($this->getAttribute($this->getAttribute(        // line 156
($context["settings"] ?? null), "socialSharing", array()), "popupImageSharing", array()), "enabled", array()), "wrapperClass" => $this->getAttribute(        // line 157
$this, "getSocialSharingWrapperClass", array(0 => $this->getAttribute($this->getAttribute($this->getAttribute(        // line 158
($context["settings"] ?? null), "socialSharing", array()), "popupImageSharing", array()), "buttonsPosition", array()), 1 => $this->getAttribute($this->getAttribute($this->getAttribute(        // line 159
($context["settings"] ?? null), "socialSharing", array()), "popupImageSharing", array()), "buttonsAlignHorizontal", array()), 2 => $this->getAttribute($this->getAttribute($this->getAttribute(        // line 160
($context["settings"] ?? null), "socialSharing", array()), "popupImageSharing", array()), "buttonsAlignVertical", array())), "method")));
        // line 166
        echo "\t\t\tdata-social-sharing=\"";
        echo twig_escape_filter($this->env, twig_jsonencode_filter(($context["socialSharing"] ?? null)));
        echo "\"
\t\t\t";
        // line 167
        ob_start();
        // line 168
        echo "\t\t\t\t";
        $this->displayBlock('additionalGridGalleryClass', $context, $blocks);
        // line 175
        echo "\t\t\t";
        $context["varAdditionalGalleryClass"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 176
        echo "\t\t\tclass=\"grid-gallery
\t\t\t\t";
        // line 177
        echo twig_escape_filter($this->env, ($context["varAdditionalGalleryClass"] ?? null), "html", null, true);
        echo "
\t\t\t\t";
        // line 178
        if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbs", array()), "enable", array()) == "1")) {
            // line 179
            echo "\t\t\t\t\tgrid-gallery-thumbs
\t\t\t\t";
        }
        // line 181
        echo "
\t\t\t\t";
        // line 182
        if ((($this->getAttribute($this->getAttribute(($context["environment"] ?? null), "getConfig", array(), "method"), "get", array(0 => "optimizations"), "method") == 1) && ($this->getAttribute(($context["environment"] ?? null), "isPro", array(), "method") == false))) {
            // line 183
            echo "\t\t\t\t\t\toptimizations
\t\t\t\t";
        }
        // line 185
        echo "
\t\t\t\t";
        // line 186
        if (($this->getAttribute(($context["settings"] ?? null), "openByLink", array()) == "on")) {
            // line 187
            echo "\t\t\t\t    hidden-item
                ";
        }
        // line 189
        echo "
\t\t\t\t";
        // line 190
        if (($this->getAttribute(($context["settings"] ?? null), "displayFirstPhoto", array()) == "on")) {
            // line 191
            echo "\t\t\t\t    one-photo
                ";
        }
        // line 193
        echo "                \"
\t\t\tstyle=\"
\t\t\t\twidth:";
        // line 195
        echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "width", array()) . twig_replace_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "width_unit", array()), array(0 => "px", 1 => "%"))), "html", null, true);
        echo ";
\t\t\t\theight:";
        // line 196
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array(), "any", false, true), "height", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array(), "any", false, true), "height", array()), "auto")) : ("auto")), "html", null, true);
        echo "
\t\t\t\t\t";
        // line 197
        if ((($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "height", array()) != "auto") && ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "height", array()) != null))) {
            echo "px ";
        }
        echo ";
\t\t\t\t";
        // line 198
        if ((($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "position", array()) == "1") || ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "position", array()) == "left"))) {
            // line 199
            echo "\t\t\t\t\tfloat: left;
\t\t\t\t";
        }
        // line 201
        echo "\t\t\t\t";
        if ((($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "position", array()) == "2") || ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "position", array()) == "right"))) {
            // line 202
            echo "\t\t\t\t\tfloat: left;
\t\t\t\t";
        }
        // line 204
        echo "\t\t\t\t";
        if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "position", array()) == "center")) {
            // line 205
            echo "\t\t\t\tmargin-left:auto;
\t\t\t\tmargin-right:auto;
\t\t\t\t";
        }
        // line 208
        echo "\t\t\t";
        if ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "fullscreen", array()), "enabled", array())) {
            echo "position: fixed; z-index: 9999999; top: 0; left: 0; background-color: white;";
        } else {
            echo "position:relative;";
        }
        echo "\"
\t\t";
    }

    // line 168
    public function block_additionalGridGalleryClass($context, array $blocks = array())
    {
        // line 169
        echo "\t\t\t\t\t";
        if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "grid", array()) == "1")) {
            // line 170
            echo "\t\t\t\t\t\tgrid-gallery-fluid-height
\t\t\t\t\t";
        } else {
            // line 172
            echo "\t\t\t\t\t\tgrid-gallery-fixed
\t\t\t\t\t";
        }
        // line 174
        echo "\t\t\t\t";
    }

    // line 232
    public function block_photos_before($context, array $blocks = array())
    {
        // line 233
        echo "\t\t";
    }

    // line 244
    public function block_photos_attributes($context, array $blocks = array())
    {
        // line 245
        echo "\t\t\t\tid=\"photos-";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["gallery"] ?? null), "id", array()), "html", null, true);
        echo "\"
\t\t\t\tclass=\"grid-gallery-photos ";
        // line 246
        $this->displayBlock('photos_attributes_class', $context, $blocks);
        echo "\"
\t\t\t";
    }

    public function block_photos_attributes_class($context, array $blocks = array())
    {
    }

    // line 249
    public function block_photos($context, array $blocks = array())
    {
        // line 250
        echo "\t\t\t    ";
        $context["i"] = 0;
        // line 251
        echo "
\t\t\t\t";
        // line 252
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["gallery"] ?? null), "photos", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["photo"]) {
            // line 253
            echo "\t\t\t\t\t";
            $this->loadTemplate("@galleries/shortcode/helpers.twig", "@galleries/shortcode/gallery.twig", 253)->display(array("gallery" => ($context["gallery"] ?? null), "photo" => $context["photo"], "settings" => ($context["settings"] ?? null), "index" => ($context["i"] ?? null)));
            // line 254
            echo "\t\t\t\t    ";
            $context["i"] = (($context["i"] ?? null) + 1);
            // line 255
            echo "\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['photo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 256
        echo "\t\t\t";
    }

    // line 264
    public function block_photos_after($context, array $blocks = array())
    {
        // line 265
        echo "\t\t";
    }

    // line 271
    public function block_styleForEffectInclude($context, array $blocks = array())
    {
        // line 272
        echo "\t";
        $this->loadTemplate("@galleries/shortcode/style_for_effects.twig", "@galleries/shortcode/gallery.twig", 272)->display(array_merge($context, array("gallery" => ($context["gallery"] ?? null), "settings" => ($context["settings"] ?? null))));
    }

    // line 130
    public function getgetSocialSharingWrapperClass($__position__ = null, $__horizontalAlign__ = null, $__verticalAlign__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "position" => $__position__,
            "horizontalAlign" => $__horizontalAlign__,
            "verticalAlign" => $__verticalAlign__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 131
            echo "                ";
            $context["class"] = (($context["position"] ?? null) . " ");
            // line 132
            echo "                ";
            if (((($context["position"] ?? null) == "top") || (($context["position"] ?? null) == "bottom"))) {
                // line 133
                echo "                    ";
                $context["class"] = (($context["class"] ?? null) . ($context["horizontalAlign"] ?? null));
                // line 134
                echo "                ";
            } else {
                // line 135
                echo "                        ";
                $context["class"] = ((($context["class"] ?? null) . "vertical ") .                 // line 136
($context["verticalAlign"] ?? null));
                // line 137
                echo "                ";
            }
            // line 138
            echo "                ";
            echo twig_escape_filter($this->env, ($context["class"] ?? null), "html", null, true);
            echo "
            ";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "@galleries/shortcode/gallery.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  829 => 138,  826 => 137,  824 => 136,  822 => 135,  819 => 134,  816 => 133,  813 => 132,  810 => 131,  796 => 130,  791 => 272,  788 => 271,  784 => 265,  781 => 264,  777 => 256,  771 => 255,  768 => 254,  765 => 253,  761 => 252,  758 => 251,  755 => 250,  752 => 249,  742 => 246,  737 => 245,  734 => 244,  730 => 233,  727 => 232,  723 => 174,  719 => 172,  715 => 170,  712 => 169,  709 => 168,  698 => 208,  693 => 205,  690 => 204,  686 => 202,  683 => 201,  679 => 199,  677 => 198,  671 => 197,  667 => 196,  663 => 195,  659 => 193,  655 => 191,  653 => 190,  650 => 189,  646 => 187,  644 => 186,  641 => 185,  637 => 183,  635 => 182,  632 => 181,  628 => 179,  626 => 178,  622 => 177,  619 => 176,  616 => 175,  613 => 168,  611 => 167,  606 => 166,  604 => 160,  603 => 159,  602 => 158,  601 => 157,  600 => 156,  599 => 152,  598 => 151,  597 => 150,  596 => 149,  595 => 148,  594 => 145,  593 => 144,  592 => 142,  591 => 141,  588 => 140,  585 => 129,  582 => 128,  580 => 127,  578 => 126,  575 => 125,  572 => 124,  569 => 123,  566 => 122,  564 => 121,  558 => 119,  554 => 117,  551 => 116,  545 => 114,  542 => 113,  536 => 111,  533 => 110,  530 => 109,  524 => 107,  522 => 106,  518 => 105,  514 => 104,  509 => 103,  506 => 102,  501 => 100,  497 => 99,  492 => 97,  488 => 96,  483 => 95,  480 => 94,  476 => 93,  471 => 92,  467 => 91,  463 => 90,  459 => 89,  455 => 88,  451 => 87,  447 => 86,  443 => 85,  439 => 84,  435 => 83,  431 => 82,  427 => 81,  423 => 80,  419 => 79,  415 => 78,  411 => 77,  405 => 75,  403 => 74,  400 => 73,  397 => 72,  392 => 70,  389 => 69,  383 => 67,  380 => 66,  375 => 64,  372 => 63,  366 => 61,  361 => 59,  358 => 58,  354 => 56,  351 => 55,  345 => 53,  342 => 52,  338 => 50,  335 => 49,  331 => 47,  328 => 46,  323 => 44,  320 => 43,  317 => 42,  311 => 40,  307 => 38,  304 => 37,  300 => 35,  298 => 34,  290 => 33,  282 => 32,  278 => 31,  270 => 30,  261 => 28,  257 => 26,  255 => 25,  251 => 24,  247 => 23,  243 => 22,  239 => 21,  235 => 20,  231 => 19,  227 => 18,  220 => 17,  217 => 16,  213 => 13,  201 => 10,  191 => 9,  179 => 8,  167 => 7,  164 => 6,  161 => 5,  158 => 4,  154 => 271,  151 => 270,  141 => 268,  137 => 266,  135 => 264,  126 => 257,  124 => 249,  120 => 247,  118 => 244,  113 => 241,  109 => 239,  105 => 237,  102 => 236,  100 => 235,  97 => 234,  95 => 232,  92 => 231,  89 => 230,  84 => 227,  77 => 225,  73 => 224,  67 => 223,  64 => 222,  53 => 213,  50 => 212,  48 => 211,  44 => 209,  42 => 16,  38 => 14,  35 => 4,  33 => 3,  30 => 2,  28 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@galleries/shortcode/gallery.twig", "/storage/ssd1/084/10485084/public_html/wp-content/plugins/gallery-by-supsystic/src/GridGallery/Galleries/views/shortcode/gallery.twig");
    }
}
