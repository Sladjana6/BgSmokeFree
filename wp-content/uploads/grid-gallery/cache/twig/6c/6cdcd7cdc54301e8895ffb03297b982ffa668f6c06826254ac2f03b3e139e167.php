<?php

/* @galleries/shortcode/helpers.twig */
class __TwigTemplate_34221e0c7a9037633e659d73f76362aa68f5b34cf6fc8c8c7f8d8acc0c0fb95f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'ggFigureWidth' => array($this, 'block_ggFigureWidth'),
            'ggMosaicHiddenItem' => array($this, 'block_ggMosaicHiddenItem'),
            'a_attributes' => array($this, 'block_a_attributes'),
            'a_attributes_class_set' => array($this, 'block_a_attributes_class_set'),
            'a_attributes_href' => array($this, 'block_a_attributes_href'),
            'sggPopupLinkForDetailsButton' => array($this, 'block_sggPopupLinkForDetailsButton'),
            'figure_before' => array($this, 'block_figure_before'),
            'galleryTypeBlock' => array($this, 'block_galleryTypeBlock'),
            'figure_attributes' => array($this, 'block_figure_attributes'),
            'previewImageUrlVar' => array($this, 'block_previewImageUrlVar'),
            'imageAttributesStyleSize' => array($this, 'block_imageAttributesStyleSize'),
            'image_attributes' => array($this, 'block_image_attributes'),
            'figcaption_style' => array($this, 'block_figcaption_style'),
            'figcaption_class' => array($this, 'block_figcaption_class'),
            'figcaption_attributes' => array($this, 'block_figcaption_attributes'),
            'figcaption_wrap' => array($this, 'block_figcaption_wrap'),
            'ggImageCaptionEntry' => array($this, 'block_ggImageCaptionEntry'),
            'figcaption_after' => array($this, 'block_figcaption_after'),
            'figcaption_after_set_exif' => array($this, 'block_figcaption_after_set_exif'),
            'figure_after' => array($this, 'block_figure_after'),
            'oneGalleryImage' => array($this, 'block_oneGalleryImage'),
            'mosaicLastImageNumberWrapper' => array($this, 'block_mosaicLastImageNumberWrapper'),
            'mosaicFigcaptionWrapper' => array($this, 'block_mosaicFigcaptionWrapper'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        ob_start();
        // line 2
        echo "\t";
        if (($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "border", array()), "type", array()) != "none")) {
            // line 3
            echo "\t\tborder: ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "border", array()), "width", array()), "html", null, true);
            echo "px ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "border", array()), "type", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "border", array()), "color", array()), "html", null, true);
            echo ";
\t";
        }
        // line 5
        echo "\tborder-radius: ";
        echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "border", array()), "radius", array()) . twig_replace_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "border", array()), "radius_unit", array()), array(0 => "px", 1 => "%"))), "html", null, true);
        echo ";
\t";
        // line 6
        if (($this->getAttribute(($context["settings"] ?? null), "use_shadow", array()) == 1)) {
            // line 7
            echo "\t\tbox-shadow: ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "shadow", array()), "x", array()), "html", null, true);
            echo "px ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "shadow", array()), "y", array()), "html", null, true);
            echo "px ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "shadow", array()), "blur", array()), "html", null, true);
            echo "px ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "shadow", array()), "color", array()), "html", null, true);
            echo ";
\t";
        }
        // line 8
        echo ";

\t";
        // line 10
        if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "grid", array()) == "2")) {
            // line 11
            echo "\t\t";
            $context["newImageDistance"] = ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "distance", array()) / 2);
            // line 12
            echo "\t\tmargin: ";
            echo twig_escape_filter($this->env, ((array_key_exists("newImageDistance", $context)) ? (_twig_default_filter(($context["newImageDistance"] ?? null), 0)) : (0)), "html", null, true);
            echo "px;
\t";
        } else {
            // line 14
            echo "\t\tmargin: ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "distance", array()), "html", null, true);
            echo "px;
\t";
        }
        // line 18
        echo "\t";
        if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "grid", array()) == "2")) {
            // line 19
            echo "\t\theight:";
            echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "photo_height", array()) . twig_replace_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "photo_height_unit", array()), array(0 => "px", 1 => "%"))), "html", null, true);
            echo ";
\t";
        }
        // line 21
        echo "\t";
        $this->displayBlock('ggFigureWidth', $context, $blocks);
        $context["figureStyle"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 29
        echo "
";
        // line 30
        ob_start();
        // line 31
        echo "\t";
        if (($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array(), "any", false, true), "description", array(), "any", true, true) &&  !twig_test_empty($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "description", array())))) {
            // line 32
            echo "\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "description", array()), "html", null, true);
            echo "
\t";
        } else {
            // line 34
            echo "\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "title", array()), "html", null, true);
            echo "
\t";
        }
        $context["aTitle"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 37
        echo "
";
        // line 38
        if ((array_key_exists("mosaicParams", $context) && ($this->getAttribute(($context["mosaicParams"] ?? null), "photoCountLeft", array()) > 0))) {
            // line 39
            echo "\t";
            $context["is_ext_link"] = false;
        } else {
            // line 41
            echo "\t";
            $context["is_ext_link"] = ($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array(), "any", false, true), "external_link", array(), "any", true, true) &&  !twig_test_empty($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "external_link", array())));
        }
        // line 43
        echo "
";
        // line 44
        ob_start();
        // line 45
        echo "\t";
        if ((((($context["is_ext_link"] ?? null) == false) && ( !$this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array(), "any", false, true), "video", array(), "any", true, true) || twig_test_empty(twig_trim_filter($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "video", array()))))) && ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array()), "type", array()) == "0"))) {
            // line 46
            echo "\t\tgg-colorbox
\t";
        }
        // line 48
        echo "
\t";
        // line 49
        if ((($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array(), "any", false, true), "video", array(), "any", true, true) &&  !twig_test_empty(twig_trim_filter($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "video", array())))) && ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array()), "type", array()) == "0"))) {
            // line 50
            echo "\t\tgg-video
\t";
        }
        // line 52
        echo "
\t";
        // line 53
        if ((($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array()), "type", array()) == "2") && ((($context["is_ext_link"] ?? null) == false) || ($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array(), "any", false, true), "video", array(), "any", true, true) &&  !twig_test_empty(twig_trim_filter($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "video", array()))))))) {
            // line 54
            echo "\t\tpbox
\t";
        }
        $context["aClass"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 57
        echo "
";
        // line 58
        ob_start();
        // line 59
        echo "\t";
        if ((($context["is_ext_link"] ?? null) == true)) {
            // line 60
            echo "\t\t";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('force_http')->getCallable(), array($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "external_link", array()))), "html", null, true);
            echo "
\t\t";
            // line 61
            $context["link"] = true;
            // line 62
            echo "\t";
        } else {
            // line 63
            echo "\t\t";
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "url", array()) . "?gid=") . $this->getAttribute(($context["gallery"] ?? null), "id", array())), "html", null, true);
            echo "
\t";
        }
        $context["aHref"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 66
        echo "
";
        // line 67
        ob_start();
        // line 68
        echo "\t";
        if ((($context["link"] ?? null) && $this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array(), "any", false, true), "rel", array(), "any", true, true))) {
            // line 69
            echo "\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "rel", array()), "html", null, true);
            echo "
\t";
        }
        // line 71
        echo "\t";
        if (((($context["link"] ?? null) == false) && ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array()), "enabled", array()) == "false"))) {
            // line 72
            echo "\t\tnofollow
\t";
        }
        $context["aRel"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 75
        echo "
";
        // line 76
        ob_start();
        // line 77
        echo "
\t";
        // line 78
        ob_start();
        // line 79
        echo "\t\t";
        $this->displayBlock('ggMosaicHiddenItem', $context, $blocks);
        // line 81
        echo "\t";
        $context["ggMosaicHiddenItemVar"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 82
        echo "
\t";
        // line 84
        echo "\t";
        ob_start();
        // line 85
        echo "\t\t";
        $this->displayBlock('a_attributes', $context, $blocks);
        // line 118
        echo "\t";
        $context["var_a_attributes"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 119
        echo "
\t";
        // line 120
        ob_start();
        // line 121
        echo "\t\t";
        $this->displayBlock('figure_before', $context, $blocks);
        // line 126
        echo "\t";
        $context["var_figure_before"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 127
        echo "
\t";
        // line 128
        ob_start();
        // line 129
        echo "\t\t";
        $this->displayBlock('galleryTypeBlock', $context, $blocks);
        // line 152
        echo "\t";
        $context["galleryType"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 153
        echo "
\t";
        // line 154
        ob_start();
        // line 155
        echo "\t\t";
        $this->displayBlock('figure_attributes', $context, $blocks);
        // line 178
        echo "\t";
        $context["var_figure_attributes"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 179
        echo "
\t";
        // line 180
        list($context["width"], $context["height"], $context["crop"]) =         array(0, 0, 0);
        // line 181
        echo "
\t";
        // line 182
        if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "photo_width_unit", array()) == 0)) {
            // line 183
            echo "\t\t";
            $context["width"] = $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "photo_width", array());
            // line 184
            echo "\t";
        } else {
            // line 185
            echo "\t\t";
            // line 186
            echo "\t\t";
            if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "width_unit", array()) == 0)) {
                // line 187
                echo "\t\t\t";
                $context["width"] = round((($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "width", array()) / 100) * $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "photo_width", array())));
                // line 188
                echo "\t\t";
            } else {
                // line 189
                echo "\t\t\t";
                $context["width"] = null;
                // line 190
                echo "\t\t";
            }
            // line 191
            echo "\t";
        }
        // line 192
        echo "
\t";
        // line 193
        if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "photo_height_unit", array()) == 0)) {
            // line 194
            echo "\t\t";
            $context["height"] = $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "photo_height", array());
            // line 195
            echo "\t";
        } else {
            // line 196
            echo "\t\t";
            // line 197
            echo "\t\t";
            $context["height"] = null;
            // line 198
            echo "\t\t";
            // line 199
            echo "\t\t";
            // line 200
            echo "\t\t";
            // line 201
            echo "\t\t";
            // line 202
            echo "\t\t";
            // line 203
            echo "\t";
        }
        // line 204
        echo "
\t";
        // line 205
        if ((($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "grid", array()) == 0) || ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "grid", array()) == 3))) {
            // line 206
            echo "\t\t";
            $context["crop"] = 1;
            // line 207
            echo "\t";
        }
        // line 208
        echo "
\t";
        // line 209
        if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "grid", array()) == 1)) {
            // line 210
            echo "\t\t";
            $context["height"] = null;
            // line 211
            echo "\t";
        }
        // line 212
        echo "
\t";
        // line 213
        if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "grid", array()) == 2)) {
            // line 214
            echo "\t\t";
            $context["width"] = null;
            // line 215
            echo "\t";
        }
        // line 216
        echo "
\t";
        // line 217
        ob_start();
        // line 218
        echo "\t\t";
        $this->displayBlock('previewImageUrlVar', $context, $blocks);
        // line 225
        echo "\t";
        $context["previewImgUrl"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 226
        echo "
\t";
        // line 227
        ob_start();
        // line 228
        echo "\t\t";
        $this->displayBlock('imageAttributesStyleSize', $context, $blocks);
        // line 236
        echo "\t";
        $context["imageAttributesStyleSizeVar"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 237
        echo "
\t";
        // line 238
        ob_start();
        // line 239
        echo "\t\t";
        $this->displayBlock('image_attributes', $context, $blocks);
        // line 267
        echo "\t";
        $context["var_image_attributes"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 268
        echo "
\t";
        // line 269
        ob_start();
        // line 270
        echo "\t\t";
        $this->displayBlock('figcaption_style', $context, $blocks);
        // line 293
        echo "\t";
        $context["figcaptionStyle"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 294
        echo "
\t";
        // line 295
        ob_start();
        // line 296
        echo "\t\tclass=\"";
        $this->displayBlock('figcaption_class', $context, $blocks);
        echo "\"
\t\t";
        // line 297
        $this->displayBlock('figcaption_attributes', $context, $blocks);
        // line 305
        echo "\t";
        $context["var_figcaption_attributes"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 306
        echo "
\t";
        // line 307
        $context["prepareImgUrl"] = (($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "url", array()) . "?gid=") . $this->getAttribute(($context["gallery"] ?? null), "id", array()));
        // line 308
        echo "
\t";
        // line 309
        ob_start();
        // line 310
        echo "\t\t";
        $this->displayBlock('figcaption_wrap', $context, $blocks);
        // line 438
        echo "\t";
        $context["var_figcaption_wrap"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 439
        echo "
\t";
        // line 440
        ob_start();
        // line 441
        echo "\t\t";
        $this->displayBlock('figcaption_after', $context, $blocks);
        // line 481
        echo "\t";
        $context["var_figcaption_after"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 482
        echo "
\t";
        // line 483
        ob_start();
        // line 484
        echo "\t\t";
        $this->displayBlock('figure_after', $context, $blocks);
        // line 489
        echo "\t";
        $context["var_figure_after"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 490
        echo "
\t";
        // line 492
        echo "\t";
        $this->displayBlock('oneGalleryImage', $context, $blocks);
        // line 526
        echo "    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 21
    public function block_ggFigureWidth($context, array $blocks = array())
    {
        // line 22
        echo "\t\t";
        if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "grid", array()) == "2")) {
            // line 23
            echo "\t\t\twidth:auto;
\t\t";
        } else {
            // line 25
            echo "\t\t\twidth:";
            echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "photo_width", array()) . twig_replace_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "photo_width_unit", array()), array(0 => "px", 1 => "%"))), "html", null, true);
            echo ";
\t\t";
        }
        // line 27
        echo "\t";
    }

    // line 79
    public function block_ggMosaicHiddenItem($context, array $blocks = array())
    {
        // line 80
        echo "\t\t";
    }

    // line 85
    public function block_a_attributes($context, array $blocks = array())
    {
        // line 86
        echo "
\t\t\tid=\"gg-";
        // line 87
        echo twig_escape_filter($this->env, $this->getAttribute(($context["gallery"] ?? null), "id", array()), "html", null, true);
        echo "-";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["photo"] ?? null), "id", array()), "html", null, true);
        echo "\"

\t\t\t";
        // line 89
        $this->displayBlock('a_attributes_class_set', $context, $blocks);
        // line 92
        echo "
\t\t\t";
        // line 93
        echo twig_escape_filter($this->env, ($context["ggMosaicHiddenItemVar"] ?? null), "html", null, true);
        echo "
\t\t\t";
        // line 94
        $this->displayBlock('a_attributes_href', $context, $blocks);
        // line 98
        echo "
\t\t\t";
        // line 99
        if (($this->getAttribute(($context["settings"] ?? null), "disableImageTitle", array()) != 1)) {
            // line 100
            echo "\t\t\t\ttitle=\"";
            echo twig_escape_filter($this->env, twig_trim_filter(($context["aTitle"] ?? null)), "html", null, true);
            echo "\"
\t\t\t";
        }
        // line 102
        echo "
\t\t\t";
        // line 103
        $this->displayBlock('sggPopupLinkForDetailsButton', $context, $blocks);
        // line 116
        echo "\t\t\tstyle=\"border-radius: ";
        echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "border", array()), "radius", array()) . twig_replace_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "border", array()), "radius_unit", array()), array(0 => "px", 1 => "%"))), "html", null, true);
        echo ";\"
\t\t";
    }

    // line 89
    public function block_a_attributes_class_set($context, array $blocks = array())
    {
        // line 90
        echo "\t\t\t\tclass=\"gg-link ";
        echo twig_escape_filter($this->env, twig_trim_filter(($context["aClass"] ?? null)), "html", null, true);
        echo " ";
        if ((($this->getAttribute(($context["settings"] ?? null), "displayFirstPhoto", array()) == "on") && (($context["index"] ?? null) > 0))) {
            echo " hidden-item ";
        }
        echo "\"
\t\t\t";
    }

    // line 94
    public function block_a_attributes_href($context, array $blocks = array())
    {
        // line 95
        echo "\t\t\t\thref=\"";
        echo twig_escape_filter($this->env, htmlspecialchars_decode(twig_trim_filter(($context["aHref"] ?? null))), "html", null, true);
        echo "\"
\t\t\t\ttarget=\"";
        // line 96
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array(), "any", false, true), "target", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array(), "any", false, true), "target", array()), "_self")) : ("_self")), "html", null, true);
        echo "\"
\t\t\t";
    }

    // line 103
    public function block_sggPopupLinkForDetailsButton($context, array $blocks = array())
    {
        // line 104
        echo "\t\t\t\t";
        // line 105
        echo "\t\t\t\t";
        if ((($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array()), "type", array()) == "1") && (($context["link"] ?? null) == false))) {
            // line 106
            echo "\t\t\t\t\tdata-rel=\"prettyPhoto[pp_gal]\"
\t\t\t\t";
        } elseif (($this->getAttribute($this->getAttribute(        // line 107
($context["photo"] ?? null), "attachment", array()), "video", array()) == null)) {
            // line 108
            echo "\t\t\t\t\trel=\"";
            echo twig_escape_filter($this->env, twig_trim_filter(($context["aRel"] ?? null)), "html", null, true);
            echo "\"
\t\t\t\t";
        }
        // line 110
        echo "\t\t\t\t";
        // line 111
        echo "
\t\t\t\t";
        // line 112
        if ((($context["link"] ?? null) == true)) {
            // line 113
            echo "\t\t\t\t\tdata-type=\"link\"
\t\t\t\t";
        }
        // line 115
        echo "\t\t\t";
    }

    // line 121
    public function block_figure_before($context, array $blocks = array())
    {
        // line 122
        echo "\t\t\t";
        if (( !$this->getAttribute(($context["settings"] ?? null), "icons", array(), "any", true, true) || ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "enabled", array()) == "false"))) {
            // line 123
            echo "\t\t\t\t<a ";
            echo twig_escape_filter($this->env, ($context["var_a_attributes"] ?? null), "html", null, true);
            echo " >
\t\t\t";
        }
        // line 125
        echo "\t\t";
    }

    // line 129
    public function block_galleryTypeBlock($context, array $blocks = array())
    {
        // line 130
        echo "\t\t\t";
        if (($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "enabled", array()) == "false")) {
            // line 131
            echo "\t\t\t\t";
            if (($this->getAttribute(($context["settings"] ?? null), "icons", array(), "any", true, true) && ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "enabled", array()) == "true"))) {
                // line 132
                echo "\t\t\t\t\ticons
\t\t\t\t";
            } else {
                // line 134
                echo "\t\t\t\t\tnone
\t\t\t\t";
            }
            // line 136
            echo "\t\t\t";
        } else {
            // line 137
            echo "\t\t\t\t";
            if (($this->getAttribute(($context["settings"] ?? null), "icons", array(), "any", true, true) && ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "enabled", array()) == "true"))) {
                // line 138
                echo "\t\t\t\t\t";
                if ((($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "personal", array()) == "true") && twig_in_filter($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "captionEffect", array()), array(0 => "icons", 1 => "icons-scale", 2 => "icons-sodium-left", 3 => "icons-sodium-top", 4 => "icons-nitrogen-top")))) {
                    // line 139
                    echo "\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "captionEffect", array()), "html", null, true);
                    echo "
\t\t\t\t\t";
                } else {
                    // line 141
                    echo "\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "effect", array()), "html", null, true);
                    echo "
\t\t\t\t\t";
                }
                // line 143
                echo "\t\t\t\t";
            } else {
                // line 144
                echo "\t\t\t\t\t";
                if (($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "personal", array()) == "true")) {
                    // line 145
                    echo "\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array(), "any", false, true), "captionEffect", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array(), "any", false, true), "captionEffect", array()), $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "effect", array()))) : ($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "effect", array()))), "html", null, true);
                    echo "
\t\t\t\t\t";
                } else {
                    // line 147
                    echo "\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "effect", array()), "html", null, true);
                    echo "
\t\t\t\t\t";
                }
                // line 149
                echo "\t\t\t\t";
            }
            // line 150
            echo "\t\t\t";
        }
        // line 151
        echo "\t\t";
    }

    // line 155
    public function block_figure_attributes($context, array $blocks = array())
    {
        // line 156
        echo "\t\t\tclass=\"grid-gallery-caption
\t\t\t";
        // line 157
        if ((($this->getAttribute(($context["settings"] ?? null), "displayFirstPhoto", array()) == "on") && (($context["index"] ?? null) > 0))) {
            echo " hidden-item ";
        }
        // line 158
        echo "\t\t\t";
        echo twig_escape_filter($this->env, ($context["ggMosaicHiddenItemVar"] ?? null), "html", null, true);
        echo "
\t\t\t";
        // line 159
        if ((($this->getAttribute(($context["settings"] ?? null), "mouse_shadow", array()) == "1") && ($this->getAttribute(($context["settings"] ?? null), "use_shadow", array()) == "1"))) {
            // line 160
            echo "\t\t\t\tshadow-show
\t\t\t";
        }
        // line 162
        echo "\t\t\t";
        if ((($this->getAttribute(($context["settings"] ?? null), "mouse_shadow", array()) == "2") && ($this->getAttribute(($context["settings"] ?? null), "use_shadow", array()) == "1"))) {
            // line 163
            echo "\t\t\t\tshadow-hide
\t\t\t";
        }
        // line 164
        echo "\"
\t\t\tdata-grid-gallery-type=\"";
        // line 165
        echo twig_escape_filter($this->env, twig_trim_filter(($context["galleryType"] ?? null)), "html", null, true);
        echo "\"
\t\t\tdata-index=\"";
        // line 166
        echo twig_escape_filter($this->env, ($context["index"] ?? null), "html", null, true);
        echo "\"
\t\t\tstyle=\"display:none;";
        // line 167
        echo twig_escape_filter($this->env, twig_trim_filter(($context["figureStyle"] ?? null)), "html", null, true);
        echo "\"
\t\t\t\t";
        // line 168
        if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "enabled", array()) == "true")) {
            // line 169
            echo "\t\t\t\t\t";
            ob_start();
            // line 170
            echo "\t\t\t\t\t\t";
            if (twig_in_filter("icons", $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "effect", array()))) {
                // line 171
                echo "\t\t\t\t\t\t\t";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "effect", array()), "html", null, true);
                echo "
\t\t\t\t\t\t";
            } else {
                // line 173
                echo "\t\t\t\t\t\t\ticons
\t\t\t\t\t\t";
            }
            // line 175
            echo "\t\t\t\t\t";
            $context["galleryType"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 176
            echo "\t\t\t\t";
        }
        // line 177
        echo "\t\t";
    }

    // line 218
    public function block_previewImageUrlVar($context, array $blocks = array())
    {
        // line 219
        echo "\t\t\t";
        if (($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "isNotRealAttachment", array()) == 1)) {
            // line 220
            echo "\t\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "url", array()), "html", null, true);
            echo "
\t\t\t";
        } else {
            // line 222
            echo "\t\t\t\t";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('get_attachment')->getCallable(), array($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "id", array()), ($context["width"] ?? null), ($context["height"] ?? null), $this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "cropPosition", array()), (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array(), "any", false, true), "cropQuality", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array(), "any", false, true), "cropQuality", array()), "100")) : ("100")))), "html", null, true);
            echo "
\t\t\t";
        }
        // line 224
        echo "\t\t";
    }

    // line 228
    public function block_imageAttributesStyleSize($context, array $blocks = array())
    {
        // line 229
        echo "\t\t\t";
        if ((($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "photo_width_unit", array()) == 0) &&  !twig_test_empty($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "photo_width", array())))) {
            // line 230
            echo "\t\t\t\twidth:";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "photo_width", array()), "html", null, true);
            echo "px;
\t\t\t";
        }
        // line 232
        echo "\t\t\t";
        if ((($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "photo_height_unit", array()) == 0) &&  !twig_test_empty($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "photo_height", array())))) {
            // line 233
            echo "\t\t\t\theight:";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "photo_height", array()), "html", null, true);
            echo "px;
\t\t\t";
        }
        // line 235
        echo "\t\t";
    }

    // line 239
    public function block_image_attributes($context, array $blocks = array())
    {
        // line 240
        echo "\t\t\t";
        $context["imgSrcStr"] = htmlspecialchars_decode(twig_replace_filter(twig_trim_filter(($context["previewImgUrl"] ?? null)), "/%20\$/", ""));
        // line 241
        echo "\t\t\t";
        $context["imgClassStr"] = "ggImg";
        // line 242
        echo "\t\t\t";
        if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "lazyload", array()), "enabled", array()) == "1")) {
            // line 243
            echo "\t\t\t\tdata-gg-real-image-href=\"";
            echo twig_escape_filter($this->env, ($context["imgSrcStr"] ?? null), "html", null, true);
            echo "\"
\t\t\t\t";
            // line 245
            echo "\t\t\t\t\t";
            if ((($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "lazyload", array()), "hideLoader", array()) != "true") && twig_length_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "lazyload", array()), "defaultImgUrl", array())))) {
                // line 246
                echo "\t\t\t\t\t\t";
                $context["imgSrcStr"] = $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "lazyload", array()), "defaultImgUrl", array());
                // line 247
                echo "\t\t\t\t\t";
            } else {
                // line 248
                echo "\t\t\t\t\t\t";
                $context["imgSrcStr"] = $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "lazyload", array()), "leerImgUrl", array());
                // line 249
                echo "\t\t\t\t\t";
            }
            // line 250
            echo "\t\t\t\t\t";
            $context["imgClassStr"] = (($context["imgClassStr"] ?? null) . " ggLazyImg");
            // line 251
            echo "\t\t\t\t";
            // line 252
            echo "\t\t\t";
        }
        // line 253
        echo "\t\t\t";
        if (((($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "grid", array()) == 2) || ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "grid", array()) == 3)) || ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "grid", array()) == 4))) {
            // line 254
            echo "\t\t\t\t";
            $context["imgClassStr"] = (($context["imgClassStr"] ?? null) . " ggNotInitImg");
            // line 255
            echo "\t\t\t";
        }
        // line 256
        echo "\t\t\tsrc=\"";
        echo twig_escape_filter($this->env, ($context["imgSrcStr"] ?? null), "html", null, true);
        echo "\"
\t\t\tclass=\"";
        // line 257
        echo twig_escape_filter($this->env, ($context["imgClassStr"] ?? null), "html", null, true);
        echo "\"
\t\t\talt=\"";
        // line 258
        if ((twig_test_empty($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "alt", array())) || ($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "alt", array()) == " "))) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "title", array()), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "alt", array()), "html", null, true);
        }
        echo "\"
\t\t\t";
        // line 259
        if (($this->getAttribute(($context["settings"] ?? null), "disableImageTitle", array()) != 1)) {
            // line 260
            echo "\t\t\t\ttitle=\"";
            if ( !twig_test_empty($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "description", array()))) {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "description", array()), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "title", array()), "html", null, true);
            }
            echo "\"
\t\t\t";
        }
        // line 262
        echo "\t\t\tdata-description=\"";
        if ( !twig_test_empty($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "description", array()))) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "description", array()), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "title", array()), "html", null, true);
        }
        echo "\"
\t\t\tdata-caption=\"";
        // line 263
        if ( !twig_test_empty($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "caption", array()))) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "caption", array()));
        } else {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "title", array()));
        }
        echo "\"
\t\t\tdata-title=\"";
        // line 264
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "title", array()), "html", null, true);
        echo "\"
\t\t\tstyle=\"";
        // line 265
        echo twig_escape_filter($this->env, ($context["imageAttributesStyleSizeVar"] ?? null), "html", null, true);
        echo "\"
\t\t";
    }

    // line 270
    public function block_figcaption_style($context, array $blocks = array())
    {
        // line 271
        echo "\t\t\t";
        if (($this->getAttribute(($context["settings"] ?? null), "icons", array(), "any", true, true) && ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "enabled", array()) == "true"))) {
            // line 272
            echo "\t\t\t\tfont-family:";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "font_family", array()), "html", null, true);
            echo ";
\t\t\t\t";
            // line 273
            if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "overlay_enabled", array()) == "true")) {
                // line 274
                echo "\t\t\t\t\tbackground-color:";
                echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array(), "any", false, true), "overlay_color", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array(), "any", false, true), "overlay_color", array()), "#3498db")) : ("#3498db")), "html", null, true);
                echo ";
\t\t\t\t\theight : 100%;
\t\t\t\t\t";
                // line 277
                echo "\t\t\t\t";
            } else {
                // line 278
                echo "\t\t\t\t\theight : 100%;
\t\t\t\t\tbackground-color: transparent;
\t\t\t\t";
            }
            // line 281
            echo "\t\t\t";
        } else {
            // line 282
            echo "\t\t\t\tcolor:";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "foreground", array()), "html", null, true);
            echo ";
\t\t\t\tbackground-color:";
            // line 283
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "background", array()), "html", null, true);
            echo ";
\t\t\t\tfont-size:";
            // line 284
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "text_size", array()), "html", null, true);
            echo twig_escape_filter($this->env, twig_replace_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "text_size_unit", array()), array(0 => "px", 1 => "%", 2 => "em")), "html", null, true);
            echo ";
\t\t\t\ttext-align:";
            // line 285
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "text_align", array()), "html", null, true);
            echo ";
\t\t\t\tfont-family:";
            // line 286
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "font_family", array()), "html", null, true);
            echo ";
\t\t\t\t";
            // line 287
            if ((($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "effect", array()) == "none") || ($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "enabled", array()) == "false"))) {
                // line 288
                echo "\t\t\t\t\topacity:1;
\t\t\t\t\tbottom:0;
\t\t\t\t";
            }
            // line 291
            echo "\t\t\t";
        }
        // line 292
        echo "\t\t";
    }

    // line 296
    public function block_figcaption_class($context, array $blocks = array())
    {
    }

    // line 297
    public function block_figcaption_attributes($context, array $blocks = array())
    {
        // line 298
        echo "\t\t\t";
        if (($this->getAttribute(($context["settings"] ?? null), "icons", array(), "any", true, true) && ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "enabled", array()) == "true"))) {
            // line 299
            echo "\t\t\t\tdata-alpha=\"";
            echo twig_escape_filter($this->env, twig_trim_filter((($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array(), "any", false, true), "overlay_transparency", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array(), "any", false, true), "overlay_transparency", array()), 5)) : (5))), "html", null, true);
            echo "\"
\t\t\t";
        } else {
            // line 301
            echo "\t\t\t\tdata-alpha=\"";
            echo twig_escape_filter($this->env, twig_trim_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "transparency", array())), "html", null, true);
            echo "\"
\t\t\t";
        }
        // line 303
        echo "\t\t\tstyle=\"";
        echo twig_escape_filter($this->env, twig_trim_filter(($context["figcaptionStyle"] ?? null)), "html", null, true);
        echo "\"
\t\t";
    }

    // line 310
    public function block_figcaption_wrap($context, array $blocks = array())
    {
        // line 311
        echo "\t\t\t";
        // line 312
        echo "\t\t\t";
        if (($this->getAttribute(($context["settings"] ?? null), "icons", array(), "any", true, true) && ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "enabled", array()) == "true"))) {
            // line 313
            echo "\t\t\t\t<div
\t\t\t\t\t\tclass=\"hi-icon-wrap ";
            // line 314
            echo twig_escape_filter($this->env, twig_slice($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "effect", array()), 0, (($context["length"] ?? null) - 1)), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "effect", array()), "html", null, true);
            echo "\"
\t\t\t\t\t\tdata-margin=\"";
            // line 315
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array(), "any", false, true), "margin", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array(), "any", false, true), "margin", array()), 5)) : (5)), "html", null, true);
            echo "\"
\t\t\t\t>
\t\t\t\t\t";
            // line 318
            echo "\t\t\t\t\t";
            $context["showFewIconsVar"] = (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array(), "any", false, true), "showFewIcons", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array(), "any", false, true), "showFewIcons", array()), "default")) : ("default"));
            // line 319
            echo "\t\t\t\t\t";
            $context["isShowVideoIcon"] = 0;
            // line 320
            echo "\t\t\t\t\t";
            if (( !twig_test_empty($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "video", array())) && ((            // line 322
($context["showFewIconsVar"] ?? null) == "default") || ((            // line 324
($context["showFewIconsVar"] ?? null) == "params") && ($this->getAttribute($this->getAttribute(            // line 325
($context["settings"] ?? null), "icons", array()), "isVideoIcon", array()) == "1"))))) {
                // line 329
                echo "\t\t\t\t\t\t";
                $context["isShowVideoIcon"] = 1;
                // line 330
                echo "\t\t\t\t\t";
            }
            // line 331
            echo "
\t\t\t\t\t";
            // line 332
            $context["isShowLinkIcon"] = 0;
            // line 333
            echo "\t\t\t\t\t";
            if (( !twig_test_empty($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "external_link", array())) && ((            // line 335
($context["showFewIconsVar"] ?? null) == "default") || ((            // line 337
($context["showFewIconsVar"] ?? null) == "params") && ($this->getAttribute($this->getAttribute(            // line 338
($context["settings"] ?? null), "icons", array()), "isLinkIcon", array()) == "1"))))) {
                // line 342
                echo "\t\t\t\t\t\t";
                $context["isShowLinkIcon"] = 1;
                // line 343
                echo "\t\t\t\t\t";
            }
            // line 344
            echo "
\t\t\t\t\t";
            // line 345
            if ((($context["isShowVideoIcon"] ?? null) == 1)) {
                // line 346
                echo "\t\t\t\t\t\t";
                ob_start();
                // line 347
                echo "\t\t\t\t\t\t\t";
                if (twig_in_filter("youtu", $this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "video", array()))) {
                    // line 348
                    echo "\t\t\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, twig_replace_filter($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "video", array()), ($context["youtube"] ?? null)), "html", null, true);
                    echo "
\t\t\t\t\t\t\t\t";
                    // line 349
                    $context["videoSource"] = "youtube";
                    // line 350
                    echo "\t\t\t\t\t\t\t";
                } elseif (twig_in_filter("vimeo.com", $this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "video", array()))) {
                    // line 351
                    echo "\t\t\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, (call_user_func_array($this->env->getFilter('preg_replace')->getCallable(), array($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "video", array()), ($context["vimeoPattern"] ?? null), ($context["vimeoReplace"] ?? null))) . "?api=1"), "html", null, true);
                    echo "
\t\t\t\t\t\t\t\t";
                    // line 352
                    $context["videoSource"] = "vimeo";
                    // line 353
                    echo "\t\t\t\t\t\t\t";
                } else {
                    // line 354
                    echo "\t\t\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, twig_trim_filter($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "video", array())), "html", null, true);
                    echo "
\t\t\t\t\t\t\t";
                }
                // line 356
                echo "\t\t\t\t\t\t";
                $context["videoUrl"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 357
                echo "
\t\t\t\t\t\t";
                // line 358
                $context["videoIcon"] = ((twig_in_filter("youtu", $this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "video", array()))) ? ("icon-youtube") : ("icon-vimeo"));
                // line 359
                echo "
\t\t\t\t\t\t";
                // line 360
                ob_start();
                // line 361
                echo "\t\t\t\t\t\t\tmargin-left:";
                echo twig_escape_filter($this->env, ((($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array(), "any", false, true), "margin", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array(), "any", false, true), "margin", array()), 5)) : (5)) . "px"), "html", null, true);
                echo ";
\t\t\t\t\t\t\tmargin-right:";
                // line 362
                echo twig_escape_filter($this->env, ((($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array(), "any", false, true), "margin", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array(), "any", false, true), "margin", array()), 5)) : (5)) . "px"), "html", null, true);
                echo ";
\t\t\t\t\t\t";
                $context["iconStyle"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 364
                echo "
\t\t\t\t\t\t<a href=\"";
                // line 365
                echo twig_escape_filter($this->env, twig_trim_filter(($context["videoUrl"] ?? null)), "html", null, true);
                echo "\"
\t\t\t\t\t\t\tdata-id=\"gg-";
                // line 366
                echo twig_escape_filter($this->env, $this->getAttribute(($context["gallery"] ?? null), "id", array()), "html", null, true);
                echo "-";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["photo"] ?? null), "id", array()), "html", null, true);
                echo "\"
\t\t\t\t\t\t\t";
                // line 367
                if (($this->getAttribute(($context["settings"] ?? null), "disableImageTitle", array()) != 1)) {
                    // line 368
                    echo "\t\t\t\t\t\t\t\ttitle=\"";
                    echo twig_escape_filter($this->env, twig_trim_filter(($context["aTitle"] ?? null)), "html", null, true);
                    echo "\"
\t\t\t\t\t\t\t";
                }
                // line 370
                echo "
\t\t\t\t\t\t\tclass=\"hi-icon gg-video ";
                // line 371
                echo twig_escape_filter($this->env, ($context["videoIcon"] ?? null), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t\t\t\t";
                // line 372
                if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array()), "type", array()) == "2")) {
                    echo " pbox";
                }
                // line 373
                echo "\t\t\t\t\t\t\t\t\t\t\"
\t\t\t\t\t\t\tstyle=\"";
                // line 374
                echo twig_escape_filter($this->env, twig_trim_filter(($context["iconStyle"] ?? null)), "html", null, true);
                echo "\"
\t\t\t\t\t\t\tdata-video-source=\"";
                // line 375
                echo twig_escape_filter($this->env, ($context["videoSource"] ?? null), "html", null, true);
                echo "\"
\t\t\t\t\t\t\t\t";
                // line 377
                echo "\t\t\t\t\t\t\t\t";
                if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array()), "type", array()) == "1")) {
                    // line 378
                    echo "\t\t\t\t\t\t\t\t\tdata-rel=\"prettyPhoto[pp_gal]\"
\t\t\t\t\t\t\t\t";
                } else {
                    // line 380
                    echo "\t\t\t\t\t\t\t\t\t";
                    // line 381
                    echo "\t\t\t\t\t\t\t\t\trel=\"video\"
\t\t\t\t\t\t\t\t\t";
                    // line 383
                    echo "\t\t\t\t\t\t\t\t";
                }
                // line 384
                echo "\t\t\t\t\t\t>
\t\t\t\t\t\t\t";
                // line 386
                echo "\t\t\t\t\t\t</a>
\t\t\t\t\t";
            }
            // line 388
            echo "
\t\t\t\t\t";
            // line 389
            if ((($context["isShowLinkIcon"] ?? null) == 1)) {
                // line 390
                echo "\t\t\t\t\t\t<a
\t\t\t\t\t\t\t";
                // line 391
                if (($this->getAttribute(($context["settings"] ?? null), "disableImageTitle", array()) != 1)) {
                    // line 392
                    echo "\t\t\t\t\t\t\t\ttitle=\"";
                    echo twig_escape_filter($this->env, twig_trim_filter(($context["aTitle"] ?? null)), "html", null, true);
                    echo "\"
\t\t\t\t\t\t\t";
                }
                // line 394
                echo "\t\t\t\t\t\t\tdata-id=\"gg-";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["gallery"] ?? null), "id", array()), "html", null, true);
                echo "-";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["photo"] ?? null), "id", array()), "html", null, true);
                echo "\" href=\"";
                if (($this->getAttribute(($context["settings"] ?? null), "openByLink", array()) == "on")) {
                    echo " ";
                    echo twig_escape_filter($this->env, ($context["prepareImgUrl"] ?? null), "html", null, true);
                    echo " ";
                } else {
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "external_link", array()), "html", null, true);
                    echo " ";
                }
                echo " \" target=\"";
                echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array(), "any", false, true), "target", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array(), "any", false, true), "target", array()), "_self")) : ("_self")), "html", null, true);
                echo "\" class=\"hi-icon icon-link ";
                if ((($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array()), "type", array()) == "2") && ($this->getAttribute(($context["settings"] ?? null), "openByLink", array()) == "on"))) {
                    echo "pbox";
                }
                echo "\" style=\"";
                echo twig_escape_filter($this->env, twig_trim_filter(($context["iconStyle"] ?? null)), "html", null, true);
                echo "\"></a>
\t\t\t\t\t";
            }
            // line 396
            echo "
\t\t\t\t\t";
            // line 397
            $context["isShowPopupIcon"] = 0;
            // line 398
            echo "\t\t\t\t\t";
            if (((((            // line 399
($context["showFewIconsVar"] ?? null) == "default") && twig_test_empty(            // line 400
($context["videoUrl"] ?? null))) && twig_test_empty($this->getAttribute($this->getAttribute(            // line 401
($context["photo"] ?? null), "attachment", array()), "external_link", array()))) || ((            // line 404
($context["showFewIconsVar"] ?? null) == "params") && ($this->getAttribute($this->getAttribute(            // line 405
($context["settings"] ?? null), "icons", array()), "isPopupIcon", array()) == "1")))) {
                // line 408
                echo "\t\t\t\t\t\t";
                $context["isShowPopupIcon"] = 1;
                // line 409
                echo "\t\t\t\t\t";
            }
            // line 410
            echo "
\t\t\t\t\t";
            // line 411
            if ((($context["isShowPopupIcon"] ?? null) == 1)) {
                // line 412
                echo "\t\t\t\t\t\t<a
\t\t\t\t\t\t\t";
                // line 413
                if (($this->getAttribute(($context["settings"] ?? null), "disableImageTitle", array()) != 1)) {
                    // line 414
                    echo "\t\t\t\t\t\t\t\ttitle=\"";
                    echo twig_escape_filter($this->env, twig_trim_filter(($context["aTitle"] ?? null)), "html", null, true);
                    echo "\"
\t\t\t\t\t\t\t";
                }
                // line 416
                echo "\t\t\t\t\t\t\tdata-id=\"gg-";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["gallery"] ?? null), "id", array()), "html", null, true);
                echo "-";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["photo"] ?? null), "id", array()), "html", null, true);
                echo "\" href=\"";
                echo twig_escape_filter($this->env, ($context["prepareImgUrl"] ?? null), "html", null, true);
                echo "\" class=\"hi-icon icon-fullscreen gg-colorbox";
                if ((($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array()), "type", array()) == "2") &&  !array_key_exists("link", $context))) {
                    echo " pbox";
                }
                echo "\" style=\"";
                echo twig_escape_filter($this->env, twig_trim_filter(($context["iconStyle"] ?? null)), "html", null, true);
                echo "\"
\t\t\t\t\t\t\t\t";
                // line 417
                if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array()), "type", array()) == "1")) {
                    // line 418
                    echo "\t\t\t\t\t\t\tdata-rel=\"prettyPhoto[pp_gal]\"
\t\t\t\t\t\t\t\t";
                }
                // line 419
                echo ">Open in pop-up window</a>
\t\t\t\t\t";
            }
            // line 421
            echo "\t\t\t\t</div>
\t\t\t";
        }
        // line 423
        echo "
\t\t\t";
        // line 424
        if (( !$this->getAttribute(($context["settings"] ?? null), "icons", array(), "any", true, true) || ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "enabled", array()) == "false"))) {
            // line 425
            echo "\t\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "enabled", array()) == "true")) {
                // line 426
                echo "\t\t\t\t\t";
                $this->displayBlock('ggImageCaptionEntry', $context, $blocks);
                // line 435
                echo "\t\t\t\t";
            }
            // line 436
            echo "\t\t\t";
        }
        // line 437
        echo "\t\t";
    }

    // line 426
    public function block_ggImageCaptionEntry($context, array $blocks = array())
    {
        // line 427
        echo "\t\t\t\t\t\t";
        if ( !twig_test_empty($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "caption", array()))) {
            // line 428
            echo "\t\t\t\t\t\t\t<div class=\"gg-image-caption fitvidsignore ";
            if (($this->getAttribute(($context["settings"] ?? null), "rtl", array()) == true)) {
                echo "ggRtlClass";
            }
            echo "\" ";
            if (($this->getAttribute(($context["settings"] ?? null), "rtl", array()) == true)) {
                echo "dir=\"rtl\"";
            }
            echo " style=\"font-size:";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "text_size", array()), "html", null, true);
            echo twig_escape_filter($this->env, twig_replace_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "text_size_unit", array()), array(0 => "px", 1 => "%", 2 => "em")), "html", null, true);
            echo ";\">
\t\t\t\t\t\t\t\t<object type=\"none/none\">
\t\t\t\t\t\t\t\t\t";
            // line 430
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "caption", array()), "html", null, true);
            echo "
\t\t\t\t\t\t\t\t</object>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
        }
        // line 434
        echo "\t\t\t\t\t";
    }

    // line 441
    public function block_figcaption_after($context, array $blocks = array())
    {
        // line 442
        echo "\t\t\t";
        if ((($this->getAttribute(($context["settings"] ?? null), "icons", array(), "any", true, true) && ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "enabled", array()) == "true")) && ($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "enabled", array()) == "true"))) {
            // line 443
            echo "
\t\t\t\t";
            // line 444
            ob_start();
            // line 445
            echo "\t\t\t\t\tcolor:";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "foreground", array()), "html", null, true);
            echo ";
\t\t\t\t\tbackground-color:";
            // line 446
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "background", array()), "html", null, true);
            echo ";
\t\t\t\t\tfont-size:";
            // line 447
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "text_size", array()), "html", null, true);
            echo twig_escape_filter($this->env, twig_replace_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "text_size_unit", array()), array(0 => "px", 1 => "%", 2 => "em")), "html", null, true);
            echo ";
\t\t\t\t\tfont-family:";
            // line 448
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "font_family", array()), "html", null, true);
            echo ";
\t\t\t\t\t";
            // line 449
            if (($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "text_align", array()) != 3)) {
                // line 450
                echo "\t\t\t\t\t\ttext-align:";
                echo twig_escape_filter($this->env, twig_replace_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "text_align", array()), array(0 => "left", 1 => "right", 2 => "center")), "html", null, true);
                echo ";
\t\t\t\t\t";
            }
            // line 452
            echo "\t\t\t\t\t";
            if ((($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "effect", array()) == "none") || ($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "enabled", array()) == "false"))) {
                // line 453
                echo "\t\t\t\t\t\topacity:1;
\t\t\t\t\t\tbottom:0;
\t\t\t\t\t";
            }
            // line 456
            echo "\t\t\t\t\tvertical-align:";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "position", array()), "html", null, true);
            echo ";
\t\t\t\t";
            $context["captionStyle"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 458
            echo "
\t\t\t\t";
            // line 459
            if (( !twig_test_empty($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "caption", array())) || ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "tooltip", array()) == "false"))) {
                // line 460
                echo "\t\t\t\t\t<div
\t\t\t\t\t\t\tclass=\"caption-with-";
                // line 461
                if (twig_in_filter("icons", $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "effect", array()))) {
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "effect", array()), "html", null, true);
                } else {
                    echo "icons";
                }
                echo "\"
\t\t\t\t\t\t\tstyle=\"";
                // line 462
                echo twig_escape_filter($this->env, ($context["captionStyle"] ?? null), "html", null, true);
                echo "\"
\t\t\t\t\t\t\tdata-alpha=\"";
                // line 463
                echo twig_escape_filter($this->env, twig_trim_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "transparency", array())), "html", null, true);
                echo "\">
\t\t\t\t\t\t<div style=\"display: table; height:100%; width:100%;\">
\t\t\t\t\t\t\t";
                // line 465
                $context["ggCaptionText"] = $this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "title", array());
                // line 466
                echo "\t\t\t\t\t\t\t";
                $context["ggCaptionTextStyle"] = ((((("padding: 10px;display:table-cell;font-size:" . $this->getAttribute($this->getAttribute($this->getAttribute(                // line 467
($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "text_size", array())) . twig_replace_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "text_size_unit", array()), array(0 => "px", 1 => "%", 2 => "em"))) . ";vertical-align:") . $this->getAttribute($this->getAttribute($this->getAttribute(                // line 468
($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "position", array())) . ";");
                // line 469
                echo "\t\t\t\t\t\t\t";
                if ( !twig_test_empty($this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "caption", array()))) {
                    // line 470
                    echo "\t\t\t\t\t\t\t\t";
                    $context["ggCaptionText"] = $this->getAttribute($this->getAttribute(($context["photo"] ?? null), "attachment", array()), "caption", array());
                    // line 471
                    echo "\t\t\t\t\t\t\t\t";
                    $context["ggCaptionTextStyle"] = (($context["ggCaptionTextStyle"] ?? null) . "font-weight: 800;");
                    // line 472
                    echo "\t\t\t\t\t\t\t";
                }
                // line 473
                echo "\t\t\t\t\t\t\t";
                $this->displayBlock('figcaption_after_set_exif', $context, $blocks);
                // line 476
                echo "\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t";
            }
            // line 479
            echo "\t\t\t";
        }
        // line 480
        echo "\t\t";
    }

    // line 473
    public function block_figcaption_after_set_exif($context, array $blocks = array())
    {
        // line 474
        echo "\t\t\t\t\t\t\t\t<span style=\"";
        echo twig_escape_filter($this->env, ($context["ggCaptionTextStyle"] ?? null), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, ($context["ggCaptionText"] ?? null), "html", null, true);
        echo "</span>
\t\t\t\t\t\t\t";
    }

    // line 484
    public function block_figure_after($context, array $blocks = array())
    {
        // line 485
        echo "\t\t\t";
        if (( !$this->getAttribute(($context["settings"] ?? null), "icons", array(), "any", true, true) || ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "enabled", array()) == "false"))) {
            // line 486
            echo "\t\t\t\t</a>
\t\t\t";
        }
        // line 488
        echo "\t\t";
    }

    // line 492
    public function block_oneGalleryImage($context, array $blocks = array())
    {
        // line 493
        echo "\t\t";
        echo twig_escape_filter($this->env, ($context["var_figure_before"] ?? null), "html", null, true);
        echo "
\t\t<FIGURE ";
        // line 494
        echo twig_escape_filter($this->env, ($context["var_figure_attributes"] ?? null), "html", null, true);
        echo " >
\t\t\t<div class=\"crop
\t\t\t\t";
        // line 496
        if ((($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "shadow", array()), "overlay", array()) == "1") && ($this->getAttribute(($context["settings"] ?? null), "use_shadow", array()) == "1"))) {
            // line 497
            echo "\t\t\t\t\timage-overlay
\t\t\t\t";
        }
        // line 498
        echo "\"
\t\t\t\t style=\"
\t\t\t\t ";
        // line 500
        if ((($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "grid", array()) == "0") || ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "grid", array()) == "3"))) {
            // line 501
            echo "\t\t\t\t\t\t width:";
            echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "photo_width", array()) . twig_replace_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "photo_width_unit", array()), array(0 => "px", 1 => "%"))), "html", null, true);
            echo ";
\t\t\t\t\t\t height:";
            // line 502
            echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "photo_height", array()) . twig_replace_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "photo_height_unit", array()), array(0 => "px", 1 => "%"))), "html", null, true);
            echo ";
\t\t\t\t\t\t overflow:hidden;
\t\t\t\t ";
        }
        // line 504
        echo "\">

\t\t\t\t<img ";
        // line 506
        echo twig_escape_filter($this->env, ($context["var_image_attributes"] ?? null), "html", null, true);
        echo " />
\t\t\t</div>
\t\t\t";
        // line 508
        $this->displayBlock('mosaicLastImageNumberWrapper', $context, $blocks);
        // line 510
        echo "\t\t\t";
        $this->displayBlock('mosaicFigcaptionWrapper', $context, $blocks);
        // line 523
        echo "\t\t</FIGURE>
\t\t";
        // line 524
        echo twig_escape_filter($this->env, ($context["var_figure_after"] ?? null), "html", null, true);
        echo "
\t";
    }

    // line 508
    public function block_mosaicLastImageNumberWrapper($context, array $blocks = array())
    {
        // line 509
        echo "\t\t\t";
    }

    // line 510
    public function block_mosaicFigcaptionWrapper($context, array $blocks = array())
    {
        // line 511
        echo "\t\t\t\t<FIGCAPTION ";
        echo twig_escape_filter($this->env, ($context["var_figcaption_attributes"] ?? null), "html", null, true);
        echo "\t>
\t\t\t\t\t<div
\t\t\t\t\t\t\tclass=\"grid-gallery-figcaption-wrap\"
\t\t\t\t\t\t\tstyle=\"
\t\t\t\t\t\t\t";
        // line 515
        if (( !$this->getAttribute(($context["settings"] ?? null), "icons", array(), "any", true, true) || ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "enabled", array()) == "false"))) {
            // line 516
            echo "\t\t\t\t\t\t\t\t\tvertical-align:";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "position", array()), "html", null, true);
            echo ";
\t\t\t\t\t\t\t";
        }
        // line 517
        echo "\">
\t\t\t\t\t\t";
        // line 518
        echo twig_escape_filter($this->env, ($context["var_figcaption_wrap"] ?? null), "html", null, true);
        echo "
\t\t\t\t\t</div>
\t\t\t\t</FIGCAPTION>
\t\t\t\t";
        // line 521
        echo twig_escape_filter($this->env, ($context["var_figcaption_after"] ?? null), "html", null, true);
        echo "
\t\t\t";
    }

    public function getTemplateName()
    {
        return "@galleries/shortcode/helpers.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1597 => 521,  1591 => 518,  1588 => 517,  1582 => 516,  1580 => 515,  1572 => 511,  1569 => 510,  1565 => 509,  1562 => 508,  1556 => 524,  1553 => 523,  1550 => 510,  1548 => 508,  1543 => 506,  1539 => 504,  1533 => 502,  1528 => 501,  1526 => 500,  1522 => 498,  1518 => 497,  1516 => 496,  1511 => 494,  1506 => 493,  1503 => 492,  1499 => 488,  1495 => 486,  1492 => 485,  1489 => 484,  1480 => 474,  1477 => 473,  1473 => 480,  1470 => 479,  1465 => 476,  1462 => 473,  1459 => 472,  1456 => 471,  1453 => 470,  1450 => 469,  1448 => 468,  1447 => 467,  1445 => 466,  1443 => 465,  1438 => 463,  1434 => 462,  1426 => 461,  1423 => 460,  1421 => 459,  1418 => 458,  1412 => 456,  1407 => 453,  1404 => 452,  1398 => 450,  1396 => 449,  1392 => 448,  1387 => 447,  1383 => 446,  1378 => 445,  1376 => 444,  1373 => 443,  1370 => 442,  1367 => 441,  1363 => 434,  1356 => 430,  1341 => 428,  1338 => 427,  1335 => 426,  1331 => 437,  1328 => 436,  1325 => 435,  1322 => 426,  1319 => 425,  1317 => 424,  1314 => 423,  1310 => 421,  1306 => 419,  1302 => 418,  1300 => 417,  1285 => 416,  1279 => 414,  1277 => 413,  1274 => 412,  1272 => 411,  1269 => 410,  1266 => 409,  1263 => 408,  1261 => 405,  1260 => 404,  1259 => 401,  1258 => 400,  1257 => 399,  1255 => 398,  1253 => 397,  1250 => 396,  1224 => 394,  1218 => 392,  1216 => 391,  1213 => 390,  1211 => 389,  1208 => 388,  1204 => 386,  1201 => 384,  1198 => 383,  1195 => 381,  1193 => 380,  1189 => 378,  1186 => 377,  1182 => 375,  1178 => 374,  1175 => 373,  1171 => 372,  1167 => 371,  1164 => 370,  1158 => 368,  1156 => 367,  1150 => 366,  1146 => 365,  1143 => 364,  1138 => 362,  1133 => 361,  1131 => 360,  1128 => 359,  1126 => 358,  1123 => 357,  1120 => 356,  1114 => 354,  1111 => 353,  1109 => 352,  1104 => 351,  1101 => 350,  1099 => 349,  1094 => 348,  1091 => 347,  1088 => 346,  1086 => 345,  1083 => 344,  1080 => 343,  1077 => 342,  1075 => 338,  1074 => 337,  1073 => 335,  1071 => 333,  1069 => 332,  1066 => 331,  1063 => 330,  1060 => 329,  1058 => 325,  1057 => 324,  1056 => 322,  1054 => 320,  1051 => 319,  1048 => 318,  1043 => 315,  1037 => 314,  1034 => 313,  1031 => 312,  1029 => 311,  1026 => 310,  1019 => 303,  1013 => 301,  1007 => 299,  1004 => 298,  1001 => 297,  996 => 296,  992 => 292,  989 => 291,  984 => 288,  982 => 287,  978 => 286,  974 => 285,  969 => 284,  965 => 283,  960 => 282,  957 => 281,  952 => 278,  949 => 277,  943 => 274,  941 => 273,  936 => 272,  933 => 271,  930 => 270,  924 => 265,  920 => 264,  912 => 263,  903 => 262,  893 => 260,  891 => 259,  883 => 258,  879 => 257,  874 => 256,  871 => 255,  868 => 254,  865 => 253,  862 => 252,  860 => 251,  857 => 250,  854 => 249,  851 => 248,  848 => 247,  845 => 246,  842 => 245,  837 => 243,  834 => 242,  831 => 241,  828 => 240,  825 => 239,  821 => 235,  815 => 233,  812 => 232,  806 => 230,  803 => 229,  800 => 228,  796 => 224,  790 => 222,  784 => 220,  781 => 219,  778 => 218,  774 => 177,  771 => 176,  768 => 175,  764 => 173,  758 => 171,  755 => 170,  752 => 169,  750 => 168,  746 => 167,  742 => 166,  738 => 165,  735 => 164,  731 => 163,  728 => 162,  724 => 160,  722 => 159,  717 => 158,  713 => 157,  710 => 156,  707 => 155,  703 => 151,  700 => 150,  697 => 149,  691 => 147,  685 => 145,  682 => 144,  679 => 143,  673 => 141,  667 => 139,  664 => 138,  661 => 137,  658 => 136,  654 => 134,  650 => 132,  647 => 131,  644 => 130,  641 => 129,  637 => 125,  631 => 123,  628 => 122,  625 => 121,  621 => 115,  617 => 113,  615 => 112,  612 => 111,  610 => 110,  604 => 108,  602 => 107,  599 => 106,  596 => 105,  594 => 104,  591 => 103,  585 => 96,  580 => 95,  577 => 94,  566 => 90,  563 => 89,  556 => 116,  554 => 103,  551 => 102,  545 => 100,  543 => 99,  540 => 98,  538 => 94,  534 => 93,  531 => 92,  529 => 89,  522 => 87,  519 => 86,  516 => 85,  512 => 80,  509 => 79,  505 => 27,  499 => 25,  495 => 23,  492 => 22,  489 => 21,  484 => 526,  481 => 492,  478 => 490,  475 => 489,  472 => 484,  470 => 483,  467 => 482,  464 => 481,  461 => 441,  459 => 440,  456 => 439,  453 => 438,  450 => 310,  448 => 309,  445 => 308,  443 => 307,  440 => 306,  437 => 305,  435 => 297,  430 => 296,  428 => 295,  425 => 294,  422 => 293,  419 => 270,  417 => 269,  414 => 268,  411 => 267,  408 => 239,  406 => 238,  403 => 237,  400 => 236,  397 => 228,  395 => 227,  392 => 226,  389 => 225,  386 => 218,  384 => 217,  381 => 216,  378 => 215,  375 => 214,  373 => 213,  370 => 212,  367 => 211,  364 => 210,  362 => 209,  359 => 208,  356 => 207,  353 => 206,  351 => 205,  348 => 204,  345 => 203,  343 => 202,  341 => 201,  339 => 200,  337 => 199,  335 => 198,  332 => 197,  330 => 196,  327 => 195,  324 => 194,  322 => 193,  319 => 192,  316 => 191,  313 => 190,  310 => 189,  307 => 188,  304 => 187,  301 => 186,  299 => 185,  296 => 184,  293 => 183,  291 => 182,  288 => 181,  286 => 180,  283 => 179,  280 => 178,  277 => 155,  275 => 154,  272 => 153,  269 => 152,  266 => 129,  264 => 128,  261 => 127,  258 => 126,  255 => 121,  253 => 120,  250 => 119,  247 => 118,  244 => 85,  241 => 84,  238 => 82,  235 => 81,  232 => 79,  230 => 78,  227 => 77,  225 => 76,  222 => 75,  217 => 72,  214 => 71,  208 => 69,  205 => 68,  203 => 67,  200 => 66,  193 => 63,  190 => 62,  188 => 61,  183 => 60,  180 => 59,  178 => 58,  175 => 57,  170 => 54,  168 => 53,  165 => 52,  161 => 50,  159 => 49,  156 => 48,  152 => 46,  149 => 45,  147 => 44,  144 => 43,  140 => 41,  136 => 39,  134 => 38,  131 => 37,  124 => 34,  118 => 32,  115 => 31,  113 => 30,  110 => 29,  106 => 21,  100 => 19,  97 => 18,  91 => 14,  85 => 12,  82 => 11,  80 => 10,  76 => 8,  64 => 7,  62 => 6,  57 => 5,  47 => 3,  44 => 2,  42 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@galleries/shortcode/helpers.twig", "/storage/ssd1/084/10485084/public_html/wp-content/plugins/gallery-by-supsystic/src/GridGallery/Galleries/views/shortcode/helpers.twig");
    }
}
