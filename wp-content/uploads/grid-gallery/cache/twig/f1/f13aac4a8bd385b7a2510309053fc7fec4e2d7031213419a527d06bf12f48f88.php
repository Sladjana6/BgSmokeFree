<?php

/* @ui/type.twig */
class __TwigTemplate_ad9ed3ad2e807abb5afad9afed77a8a6c3f2ab0cccdc3f8eff2e4c46ab59821b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 65
        echo "
";
        // line 78
        echo "
";
        // line 108
        echo "
";
        // line 141
        echo "
";
        // line 184
        echo "
";
    }

    // line 1
    public function getlist_view($__entities__ = null, $__sliderSettings__ = null, $__galleryId__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "entities" => $__entities__,
            "sliderSettings" => $__sliderSettings__,
            "galleryId" => $__galleryId__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 2
            echo "    ";
            $context["hlp"] = $this->loadTemplate("@core/helpers.twig", "@ui/type.twig", 2);
            // line 3
            echo "    ";
            $context["view"] = $this;
            // line 4
            echo "    ";
            ob_start();
            // line 5
            echo "    <tr class=\"ui-jqgrid-labels-custom\" role=\"rowheader\">
        <th scope=\"col\" id=\"check-all\" class=\"ui-state-default ui-th-column ui-th-ltr jqgh_ui-jqgrid-htable_id\">
            <input type=\"checkbox\" id=\"checkAll\" class=\"gg-checkbox\">
        </th>
        <th colspan=\"2\" scope=\"col\" class=\"ui-state-default ui-th-column ui-th-ltr jqgh_ui-jqgrid-htable_id\">
            ";
            // line 10
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Position")), "html", null, true);
            echo "
        </th>
        <th scope=\"col\" class=\"ui-state-default ui-th-column ui-th-ltr jqgh_ui-jqgrid-htable_id\">
        </th>
        <th scope=\"col\" class=\"ui-state-default ui-th-column ui-th-ltr jqgh_ui-jqgrid-htable_id\">
            ";
            // line 15
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Caption / Description")), "html", null, true);
            echo "
            ";
            // line 16
            echo $context["hlp"]->getshowTooltip(((((((("<b>" . call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Caption"))) . "</b>: ") . call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Add image caption. You may find detailed caption settings at Settings > Captions page"))) . "</br></br><b>") . call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Description"))) . "</b>: ") . call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Add image description. You may find detailed description settings at Settings > Captions page. Note: in order to show descriptions and to change the description settings 'Caption builder' option should be enabled first."))), "top", true);
            // line 19
            echo "
        </th>
        <th scope=\"col\" class=\"ui-state-default ui-th-column ui-th-ltr jqgh_ui-jqgrid-htable_id\">
            ";
            // line 22
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("SEO Alt / Title")), "html", null, true);
            echo "
            ";
            // line 23
            echo $context["hlp"]->getshowTooltip(call_user_func_array($this->env->getFunction('translate')->getCallable(), array(((((((("<b>" . call_user_func_array($this->env->getFunction('translate')->getCallable(), array("SEO Alt"))) . "</b>: ") . call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Add SEO keywords, separated by comma, or SEO-optimized sentences. They will appear under your image, when it opens in pop-up window."))) . "</br></br><b>") . call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Title"))) . "</b>: ") . call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Add text for title's attribute of image caption. Will be shown by hovering on caption."))))), "top", true);
            // line 26
            echo "
        </th>
        <th scope=\"col\" class=\"ui-state-default ui-th-column ui-th-ltr jqgh_ui-jqgrid-htable_id\">
            ";
            // line 29
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Options")), "html", null, true);
            echo "
            ";
            // line 30
            echo $context["hlp"]->getshowTooltip((((((((((((((((((((((((("<b>" . call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Link"))) . "</b>: ") . call_user_func_array($this->env->getFunction('translate')->getCallable(), array("You may add the link, which opens when clicking on your image thumbnail instead of pop-up window. Note: if you add video URL, this option will be inactive."))) . "</br><b>") . call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Video"))) . "</b>: ") . call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Here you may add the video url. After clicking on the image thumbnail, video will open in pop-up window instead of the image."))) . "</br><b>") . call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Categories"))) . "</b>: ") . call_user_func_array($this->env->getFunction('translate')->getCallable(), array("If you want to arrange your gallery by categories, you should add category names here and separate them by commas."))) . "</br><b>") . call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Linked images"))) . "</b>: ") . call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Here you may choose one or several linked images for this image thumbnail. Note: this option works only with Popup theme #7."))) . " <a target='_blank' href='https://supsystic.com/example/linked-images-popup/'>https://supsystic.com/example/linked-images-popup/</a></br><b>") . call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Crop"))) . "</b>: ") . call_user_func_array($this->env->getFunction('translate')->getCallable(), array("In some gallery types image thumbnails are cropped. Here you may select the crop position to be sure that the most important part of the image will be visible."))) . "</br><b>") . call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Image on hover"))) . "</b>: ") . call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Here you may add the image that will the original image when mouse cursor is over the thumbnail. Note: in order to make this feature work, you should enable 'Image on hover' option in Settings > Captions."))) . "</br><a target='_blank' href='https://supsystic.com/documentation/images-settings/'>https://supsystic.com/documentation/images-settings/</a>"), "top", true);
            // line 37
            echo "
        </th>
    </tr>
    ";
            $context["head"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 41
            echo "    <div id=\"sg-gallery-lang-tabs\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["environment"] ?? null), "getDispatcher", array(), "method"), "dispatch", array(0 => "tbs_lang_tabs"), "method"), "html", null, true);
            echo "</div>
    <form id=\"gallery-editor-hidden\" style=\"display: none;\">
        <input name=\"gallery_id\" value=\"";
            // line 43
            echo twig_escape_filter($this->env, ($context["galleryId"] ?? null), "html", null, true);
            echo "\" type=\"hidden\"/>
        <input name=\"action\" value=\"grid-gallery\" type=\"hidden\"/>
        <input name=\"route[module]\" value=\"photos\" type=\"hidden\"/>
        <input name=\"route[action]\" value=\"updateAttachment\" type=\"hidden\"/>
    </form>
    <table id=\"ui-jqgrid-htable-img\" class=\"ui-jqgrid-htable\" style=\"margin: 0 0 7px -5px; width: 100%;\">
        <thead class=\"jqgrid-head-nav\">
        ";
            // line 50
            echo twig_escape_filter($this->env, ($context["head"] ?? null), "html", null, true);
            echo "
        </thead>
        <tbody id=\"the-list\" data-sortable data-container=\"list\">
        ";
            // line 53
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["entities"] ?? null), "folders", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["folder"]) {
                // line 54
                echo "            ";
                echo $context["view"]->getlist_folder($context["folder"]);
                echo "
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['folder'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 56
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["entities"] ?? null), "images", array()));
            $context['_iterated'] = false;
            foreach ($context['_seq'] as $context["_key"] => $context["image"]) {
                // line 57
                echo "            ";
                echo $context["view"]->getlist_image($context["image"], ($context["sliderSettings"] ?? null), ($context["galleryId"] ?? null));
                echo "
        ";
                $context['_iterated'] = true;
            }
            if (!$context['_iterated']) {
                // line 59
                echo "            ";
                // line 60
                echo "        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['image'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 61
            echo "        </tbody>
    </table>

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

    // line 66
    public function getblock_view($__entities__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "entities" => $__entities__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 67
            echo "    ";
            $context["view"] = $this;
            // line 68
            echo "    <ul class=\"sg-photos\" data-sortable data-container=\"block\">
        ";
            // line 69
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["entities"] ?? null), "folders", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["folder"]) {
                // line 70
                echo "            ";
                echo $context["view"]->getblock_folder($context["folder"]);
                echo "
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['folder'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 72
            echo "
        ";
            // line 73
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["entities"] ?? null), "images", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["image"]) {
                // line 74
                echo "            ";
                echo $context["view"]->getblock_image($context["image"]);
                echo "
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['image'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 76
            echo "    </ul>
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

    // line 79
    public function getblock_folder($__folder__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "folder" => $__folder__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 80
            echo "    <li data-droppable class=\"gg-list-item\" data-entity data-entity-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["folder"] ?? null), "id", array()), "html", null, true);
            echo "\" data-entity-type=\"folder\"
        data-entity-info=\"";
            // line 81
            echo twig_escape_filter($this->env, twig_jsonencode_filter(($context["folder"] ?? null)));
            echo "\">
        <div class=\"gg-item\" style=\"z-index: 0;\">
            <div class=\"gg-check\">
                <input type=\"checkbox\" class=\"gg-checkbox\" data-observable>
            </div>
            <a href=\"";
            // line 86
            echo twig_escape_filter($this->env, $this->getAttribute(($context["environment"] ?? null), "generateUrl", array(0 => "photos", 1 => "view", 2 => array("folder_id" => $this->getAttribute(($context["folder"] ?? null), "id", array()), "view" => "block")), "method"), "html", null, true);
            echo "\">
                <img src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJYAAADIAQMAAAAwS4omAAAAA1BMVEXk5+pYcSvrAAAAG0lEQVRIie3BMQEAAADCoPVPbQwfoAAAAIC3AQ+gAAEq5xQCAAAAAElFTkSuQmCC\"
                     alt=\"\" width=\"150\" height=\"150\"/>

                <div style=\"position: absolute; top: 55px; left: 55px; color: #bdc3c7;\">
                    <i class=\"fa fa-folder-open-o\" style=\"font-size: 5em;\"></i>
                </div>

                <div class=\"gg-folder-photos\">
                    <i class=\"fa fa-picture-o\"></i> <span class=\"gg-folder-photos-num\">";
            // line 95
            echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute(($context["folder"] ?? null), "photos", array())), "html", null, true);
            echo "</span>
                </div>
            </a>

            <p>
                <span class=\"folder-title\">";
            // line 100
            echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute(($context["folder"] ?? null), "title", array())), "html", null, true);
            echo "</span>
                <small>
                    ";
            // line 102
            echo twig_escape_filter($this->env, $this->getAttribute(($context["folder"] ?? null), "date", array()), "html", null, true);
            echo "
                </small>
            </p>
        </div>
    </li>
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

    // line 109
    public function getblock_image($__image__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "image" => $__image__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 110
            echo "    <li class=\"gg-list-item\" data-entity data-entity-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["image"] ?? null), "id", array()), "html", null, true);
            echo "\" data-entity-type=\"photo\"
        data-entity-info=\"";
            // line 111
            echo twig_escape_filter($this->env, twig_jsonencode_filter(($context["image"] ?? null)));
            echo "\">
        <div class=\"gg-item\" style=\"z-index: 10;\">
            <div class=\"gg-check\">
                <input type=\"checkbox\" class=\"gg-checkbox\" data-observable>
            </div>
            <a data-colorbox href=\"";
            // line 116
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["image"] ?? null), "attachment", array()), "sizes", array()), "full", array()), "url", array()), "html", null, true);
            echo "\">
                ";
            // line 117
            if (twig_test_empty($this->getAttribute($this->getAttribute($this->getAttribute(($context["image"] ?? null), "attachment", array()), "sizes", array()), "thumbnail", array()))) {
                // line 118
                echo "                    ";
                $context["src"] = $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["image"] ?? null), "attachment", array()), "sizes", array()), "full", array()), "url", array());
                // line 119
                echo "                    ";
                if (($this->getAttribute($this->getAttribute(($context["image"] ?? null), "attachment", array()), "orientation", array()) == "landscape")) {
                    // line 120
                    echo "                        ";
                    $context["sizes"] = array("width" => 80, "height" => 60);
                    // line 121
                    echo "                    ";
                } else {
                    // line 122
                    echo "                        ";
                    $context["sizes"] = array("width" => 60, "height" => 80);
                    // line 123
                    echo "                    ";
                }
                // line 124
                echo "                ";
            } else {
                // line 125
                echo "                    ";
                $context["src"] = $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["image"] ?? null), "attachment", array()), "sizes", array()), "thumbnail", array()), "url", array());
                // line 126
                echo "                    ";
                $context["sizes"] = array("width" => 60, "height" => 60);
                // line 127
                echo "                ";
            }
            // line 128
            echo "                <img class=\"supsystic-lazy\" data-original=\"";
            echo twig_escape_filter($this->env, ($context["src"] ?? null), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["image"] ?? null), "attachment", array()), "title", array()), "html", null, true);
            echo "\" width=\"150\"
                     style=\"min-height:150px;max-height:150px;\"/>
            </a>

            <p title=\"";
            // line 132
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["image"] ?? null), "attachment", array()), "title", array()), "html", null, true);
            echo "\">
                ";
            // line 133
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["image"] ?? null), "attachment", array()), "title", array()), "html", null, true);
            echo "
                <small>
                    ";
            // line 135
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["image"] ?? null), "attachment", array()), "dateFormatted", array()), "html", null, true);
            echo "
                </small>
            </p>
        </div>
    </li>
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

    // line 142
    public function getlist_folder($__folder__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "folder" => $__folder__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 143
            echo "    <tr data-droppable data-entity data-entity-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["folder"] ?? null), "id", array()), "html", null, true);
            echo "\" data-entity-type=\"folder\"
        data-entity-info=\"";
            // line 144
            echo twig_escape_filter($this->env, twig_jsonencode_filter(($context["folder"] ?? null)));
            echo "\">
        <th scope=\"row\" class=\"check-column\">
            <label class=\"screen-reader-text\"
                   for=\"cb-select-";
            // line 147
            echo twig_escape_filter($this->env, $this->getAttribute(($context["folder"] ?? null), "id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, sprintf(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Select %s")), $this->getAttribute(($context["folder"] ?? null), "title", array())), "html", null, true);
            echo "</label>
            <input type=\"checkbox\" name=\"folder[]\" id=\"cb-select-";
            // line 148
            echo twig_escape_filter($this->env, $this->getAttribute(($context["folder"] ?? null), "id", array()), "html", null, true);
            echo "\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["folder"] ?? null), "id", array()), "html", null, true);
            echo "\"
                   data-observable>
        </th>
        <td class=\"column-icon media-icon\" style=\"position: relative;\">
            <a href=\"";
            // line 152
            echo twig_escape_filter($this->env, $this->getAttribute(($context["environment"] ?? null), "generateUrl", array(0 => "photos", 1 => "view", 2 => array("folder_id" => $this->getAttribute(($context["folder"] ?? null), "id", array()), "view" => "list")), "method"), "html", null, true);
            echo "\"
               data-colorbox>
                <img width=\"60\" height=\"60\"
                     src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJYAAADIAQMAAAAwS4omAAAAA1BMVEXk5+pYcSvrAAAAG0lEQVRIie3BMQEAAADCoPVPbQwfoAAAAIC3AQ+gAAEq5xQCAAAAAElFTkSuQmCC\"
                     class=\"attachment-80x60 supsystic-lazy\" alt=\"";
            // line 156
            echo twig_escape_filter($this->env, $this->getAttribute(($context["folder"] ?? null), "title", array()), "html", null, true);
            echo "\">
            </a>

            <div style=\"position: absolute; top: 20px; left: 31px; color: #bdc3c7; z-index: 100;\">
                <i class=\"fa fa-folder-open-o\" style=\"font-size: 3em;\"></i>
            </div>
        </td>
        <td class=\"title column-title\">
            <strong>
                <a href=\"";
            // line 165
            echo twig_escape_filter($this->env, $this->getAttribute(($context["environment"] ?? null), "generateUrl", array(0 => "photos", 1 => "view", 2 => array("folder_id" => $this->getAttribute(($context["folder"] ?? null), "id", array()), "view" => "list")), "method"), "html", null, true);
            echo "\">
                    <span class=\"folder-title\">";
            // line 166
            echo twig_title_string_filter($this->env, $this->getAttribute(($context["folder"] ?? null), "title", array()));
            echo "</span>
                </a>
            </strong>

            <p>
                <span class=\"gg-folder-photos-num\">
                    ";
            // line 172
            echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute(($context["folder"] ?? null), "photos", array())), "html", null, true);
            echo "
                </span>
                ";
            // line 174
            if ((twig_length_filter($this->env, $this->getAttribute(($context["folder"] ?? null), "photos", array())) == 1)) {
                // line 175
                echo "                    ";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("photo")), "html", null, true);
                echo "
                ";
            } else {
                // line 177
                echo "                    ";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("photos")), "html", null, true);
                echo "
                ";
            }
            // line 179
            echo "            </p>
        </td>
        <td class=\"date column-date\">";
            // line 181
            echo twig_escape_filter($this->env, $this->getAttribute(($context["folder"] ?? null), "date", array()), "html", null, true);
            echo "</td>
    </tr>
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

    // line 185
    public function getlist_image($__image__ = null, $__sliderSettings__ = null, $__galleryId__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "image" => $__image__,
            "sliderSettings" => $__sliderSettings__,
            "galleryId" => $__galleryId__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 186
            echo "    ";
            $context["hlp"] = $this->loadTemplate("@core/helpers.twig", "@ui/type.twig", 186);
            // line 187
            echo "
    ";
            // line 188
            $context["nonProMsg"] = "Available in PRO";
            // line 189
            echo "    <tr data-entity data-entity-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["image"] ?? null), "id", array()), "html", null, true);
            echo "\" data-settings=\"";
            echo twig_escape_filter($this->env, twig_jsonencode_filter(($context["sliderSettings"] ?? null)));
            echo "\" data-entity-type=\"photo\" data-entity-info=\"";
            echo twig_escape_filter($this->env, twig_jsonencode_filter(($context["image"] ?? null)));
            echo "\" class=\"ggImgInfoRow\">
        <th scope=\"row\" class=\"check-column ggImgVertMoveCol\">
            <i class=\"fa fa-arrows-v ggImgVerticalMove\" aria-hidden=\"true\"></i>
            <label class=\"screen-reader-text\"
                   for=\"cb-select-";
            // line 193
            echo twig_escape_filter($this->env, $this->getAttribute(($context["image"] ?? null), "id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, sprintf(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Select %s")), $this->getAttribute($this->getAttribute(($context["image"] ?? null), "attachment", array()), "title", array())), "html", null, true);
            echo "</label>
            <input type=\"checkbox\" name=\"image[]\" id=\"cb-select-";
            // line 194
            echo twig_escape_filter($this->env, $this->getAttribute(($context["image"] ?? null), "id", array()), "html", null, true);
            echo "\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["image"] ?? null), "id", array()), "html", null, true);
            echo "\" data-observable>
        </th>
        <td class=\"title column-title\">
            <input id=\"position-image-";
            // line 197
            echo twig_escape_filter($this->env, $this->getAttribute(($context["image"] ?? null), "id", array()), "html", null, true);
            echo "\" type=\"text\" disabled style=\"height:24px; width: 30px;\" value=\"";
            echo twig_escape_filter($this->env, ($this->getAttribute(($context["image"] ?? null), "position", array()) + 1), "html", null, true);
            echo "\">
        </td>
        <td class=\"column-icon media-icon top-align\">
            ";
            // line 200
            $context["remoteImgClass"] = "";
            // line 201
            echo "            ";
            $context["remoteLinkClass"] = "";
            // line 202
            echo "            ";
            $context["remoteImgType"] = "";
            // line 203
            echo "            ";
            if (($this->getAttribute($this->getAttribute(($context["image"] ?? null), "attachment", array(), "any", false, true), "isRemoteImage", array(), "any", true, true) && ($this->getAttribute($this->getAttribute(($context["image"] ?? null), "attachment", array()), "isRemoteImage", array()) == 1))) {
                // line 204
                echo "                ";
                $context["remoteImgClass"] = " remote-thumbnail";
                // line 205
                echo "                ";
                $context["remoteLinkClass"] = "remote-link";
                // line 206
                echo "                ";
                $context["remoteImgType"] = " data-cbox-photo=1";
                // line 207
                echo "            ";
            }
            // line 208
            echo "            <a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["image"] ?? null), "attachment", array()), "sizes", array()), "full", array()), "url", array()), "html", null, true);
            echo "\" data-colorbox class=\"";
            echo twig_escape_filter($this->env, ($context["remoteLinkClass"] ?? null), "html", null, true);
            echo "\"";
            echo twig_escape_filter($this->env, ($context["remoteImgType"] ?? null), "html", null, true);
            echo ">
                ";
            // line 209
            if (twig_test_empty($this->getAttribute($this->getAttribute($this->getAttribute(($context["image"] ?? null), "attachment", array()), "sizes", array()), "thumbnail", array()))) {
                // line 210
                echo "                    ";
                $context["src"] = $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["image"] ?? null), "attachment", array()), "sizes", array()), "full", array()), "url", array());
                // line 211
                echo "                    ";
                if (($this->getAttribute($this->getAttribute(($context["image"] ?? null), "attachment", array()), "orientation", array()) == "landscape")) {
                    // line 212
                    echo "                        ";
                    $context["sizes"] = array("width" => 120, "height" => 90);
                    // line 213
                    echo "                    ";
                } else {
                    // line 214
                    echo "                        ";
                    $context["sizes"] = array("width" => 90, "height" => 120);
                    // line 215
                    echo "                    ";
                }
                // line 216
                echo "                ";
            } else {
                // line 217
                echo "                    ";
                $context["src"] = $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["image"] ?? null), "attachment", array()), "sizes", array()), "thumbnail", array()), "url", array());
                // line 218
                echo "                    ";
                $context["sizes"] = array("width" => 90, "height" => 90);
                // line 219
                echo "                ";
            }
            // line 220
            echo "                <img width=\"100\" height=\"100\" data-original=\"";
            echo twig_escape_filter($this->env, ($context["src"] ?? null), "html", null, true);
            echo "\"
                     class=\"attachment-thumbnail supsystic-lazy";
            // line 221
            echo twig_escape_filter($this->env, ($context["remoteImgClass"] ?? null), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["image"] ?? null), "attachment", array()), "title", array()), "html", null, true);
            echo "\">
            </a>
        </td>
        <td class=\"title column-title top-align\" style=\"text-align: left; padding-left:15px !important;\">
            ";
            // line 225
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["image"] ?? null), "attachment", array()), "filename", array()), "html", null, true);
            echo "</br>
            ";
            // line 226
            echo twig_escape_filter($this->env, $this->getAttribute(($context["image"] ?? null), "gg_wp_upload_date", array()), "html", null, true);
            echo "</br>
            ";
            // line 227
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["image"] ?? null), "attachment", array()), "filesizeHumanReadable", array()), "html", null, true);
            echo "</br>
            ";
            // line 228
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["image"] ?? null), "attachment", array()), "width", array()), "html", null, true);
            echo "x";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["image"] ?? null), "attachment", array()), "height", array()), "html", null, true);
            echo "</br></br>
            <div class=\"gg-wraper-option-links\">
                ";
            // line 230
            if (($this->getAttribute(($context["environment"] ?? null), "isPro", array(), "method") == true)) {
                // line 231
                echo "                    <a href=\"#gg-attributes\" class=\"gg-option-links attributes-image\" data-image-id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["image"] ?? null), "id", array()), "html", null, true);
                echo "\" data-values=\"";
                echo twig_escape_filter($this->env, twig_jsonencode_filter($this->getAttribute(($context["image"] ?? null), "attributes", array())));
                echo "\">";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Attributes")), "html", null, true);
                echo "</a></br>
                ";
            }
            // line 233
            echo "                ";
            if (($this->getAttribute(($context["environment"] ?? null), "isPro", array(), "method") == false)) {
                // line 234
                echo "                    <a href=\"#\" class=\"gg-option-links\">";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Attributes")), "html", null, true);
                echo "</a>
                    <a href=\"http://supsystic.com/plugins/photo-gallery?utm_source=plugin&utm_medium=images_caption_attributes&utm_campaign=gallery\" target=\"_blank\">
                        ";
                // line 236
                echo ($context["nonProMsg"] ?? null);
                echo "
                    </a>
                    </br>
                ";
            }
            // line 240
            echo "                <a href=\"#gg-meta\" class=\"gg-option-links metadata-image\">";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Meta")), "html", null, true);
            echo "</a></br>
                <a href=\"#gg-replace\" class=\"gg-option-links replace-image\" data-image-id=\"";
            // line 241
            echo twig_escape_filter($this->env, $this->getAttribute(($context["image"] ?? null), "id", array()), "html", null, true);
            echo "\" data-attachment-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["image"] ?? null), "attachment", array()), "id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Replace")), "html", null, true);
            echo "</a></br>
                <a href=\"#gg-delete\" id=\"delete-image-";
            // line 242
            echo twig_escape_filter($this->env, $this->getAttribute(($context["image"] ?? null), "id", array()), "html", null, true);
            echo "\" class=\"gg-option-links\">";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Delete")), "html", null, true);
            echo "</a>
            </div></br>
        </td>
        <td class=\"title column-textarea top-align\">
            <form id=\"photo-editor-caption-";
            // line 246
            echo twig_escape_filter($this->env, $this->getAttribute(($context["image"] ?? null), "id", array()), "html", null, true);
            echo "\" class=\"photo-editor\" data-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["image"] ?? null), "id", array()), "html", null, true);
            echo "\">
                <textarea name=\"caption\" rows=\"2\" placeholder=\"";
            // line 247
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Caption")), "html", null, true);
            echo "\">";
            echo $this->getAttribute($this->getAttribute(($context["image"] ?? null), "attachment", array()), "caption", array());
            echo "</textarea></br>
                ";
            // line 248
            if (($this->getAttribute(($context["environment"] ?? null), "isPro", array(), "method") == false)) {
                // line 249
                echo "                    <span style=\"color:red\" class=\"description\">
                        <textarea name=\"\" disabled rows=\"5\" placeholder=\"Description\">";
                // line 250
                echo $this->getAttribute($this->getAttribute(($context["image"] ?? null), "attachment", array()), "captionDescription", array());
                echo "</textarea>
                        <a href=\"http://supsystic.com/plugins/photo-gallery?utm_source=plugin&utm_medium=images_caption_description&utm_campaign=gallery\" target=\"_blank\">
                            ";
                // line 252
                echo ($context["nonProMsg"] ?? null);
                echo "
                        </a>
                    </span>
                ";
            } else {
                // line 256
                echo "                    <textarea name=\"captionDescription\" rows=\"5\" placeholder=\"Description\">";
                echo $this->getAttribute($this->getAttribute(($context["image"] ?? null), "attachment", array()), "captionDescription", array());
                echo "</textarea>
                ";
            }
            // line 258
            echo "                ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["environment"] ?? null), "getDispatcher", array(), "method"), "dispatch", array(0 => "after_photo_attachment_form", 1 => array(0 => array(0 => "caption", 1 => "captionDescription"), 1 => $this->getAttribute($this->getAttribute(($context["image"] ?? null), "attachment", array()), "id", array()))), "method"), "html", null, true);
            echo "
            </form>
        </td>
        <td class=\"title column-textarea top-align\">
            <form id=\"photo-editor-seo-";
            // line 262
            echo twig_escape_filter($this->env, $this->getAttribute(($context["image"] ?? null), "id", array()), "html", null, true);
            echo "\" class=\"photo-editor\" data-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["image"] ?? null), "id", array()), "html", null, true);
            echo "\">
                <textarea name=\"alt\" rows=\"2\" placeholder=\"";
            // line 263
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("SEO Alt")), "html", null, true);
            echo "\">";
            if ( !twig_test_empty($this->getAttribute($this->getAttribute(($context["image"] ?? null), "attachment", array()), "alt", array()))) {
                if (($this->getAttribute($this->getAttribute(($context["image"] ?? null), "attachment", array()), "alt", array()) == " ")) {
                    echo "";
                } else {
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["image"] ?? null), "attachment", array()), "alt", array()), "html", null, true);
                }
            } else {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["image"] ?? null), "attachment", array()), "title", array()), "html", null, true);
            }
            echo "</textarea></br>
                <textarea name=\"description\" rows=\"5\" placeholder=\"";
            // line 264
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Title")), "html", null, true);
            echo "\">";
            echo $this->getAttribute($this->getAttribute(($context["image"] ?? null), "attachment", array()), "description", array());
            echo "</textarea>
                ";
            // line 265
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["environment"] ?? null), "getDispatcher", array(), "method"), "dispatch", array(0 => "after_photo_attachment_form", 1 => array(0 => array(0 => "alt", 1 => "description"), 1 => $this->getAttribute($this->getAttribute(($context["image"] ?? null), "attachment", array()), "id", array()))), "method"), "html", null, true);
            echo "
            </form>
        </td>
        <td class=\"title column-title top-align\" style=\"text-align: left; padding-left:15px !important; padding-right:5px !important;\">
            <form id=\"photo-editor-";
            // line 269
            echo twig_escape_filter($this->env, $this->getAttribute(($context["image"] ?? null), "id", array()), "html", null, true);
            echo "\" class=\"photo-editor attachment-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["image"] ?? null), "attachment", array()), "id", array()), "html", null, true);
            echo "\" data-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["image"] ?? null), "id", array()), "html", null, true);
            echo "\" style=\"margin-top: 0;\">
                <div class=\"gg-image-option-links\">
                    <div class=\"gg-wraper-option-links\" style=\"float: left\">
                        <a href=\"#gg-effect\" class=\"gg-option-links option-link\">";
            // line 272
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Choose effect")), "html", null, true);
            echo "</a></br>
                        <a href=\"#gg-linked\" class=\"gg-option-links option-link\">";
            // line 273
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Linked Images")), "html", null, true);
            echo "</a></br>
                        <a href=\"#gg-hover\" class=\"gg-option-links option-link\">";
            // line 274
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Image on Hover")), "html", null, true);
            echo "</a></br>
                        <a href=\"#gg-copy\" class=\"gg-option-links option-link\">";
            // line 275
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Copy to")), "html", null, true);
            echo "</a></br>
                        <a href=\"#gg-move\" class=\"gg-option-links option-link\">";
            // line 276
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Move to")), "html", null, true);
            echo "</a></br>
                    </div>
                    <div class=\"gg-wraper-option-links\" style=\"float: left\">
                        <a href=\"#gg-categories\" class=\"gg-option-links option-link\">";
            // line 279
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Categories")), "html", null, true);
            echo "</a></br>
                        <a href=\"#gg-video\" class=\"gg-option-links option-link\">";
            // line 280
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Video")), "html", null, true);
            echo "</a></br>
                        <a href=\"#gg-link\" class=\"gg-option-links option-link\">";
            // line 281
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Link")), "html", null, true);
            echo "</a></br>
                        <a href=\"#gg-rotate\" class=\"gg-option-links option-link\">";
            // line 282
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Rotate")), "html", null, true);
            echo "</a></br>
                        <a href=\"#gg-crop\" class=\"gg-option-links option-link\">";
            // line 283
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Crop")), "html", null, true);
            echo "</a></br>
                    </div>
                </div>
                <div class=\"gg-option-containers\" style=\"clear:both;\">
                    <div class=\"gg-effect-option gg-option-container ggSettingsDisplNone\">
                        <button class=\"button selectCaptionEffectBtn\" data-id=\"";
            // line 288
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["image"] ?? null), "attachment", array()), "id", array()), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Choose effect")), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Choose effect")), "html", null, true);
            echo "</button>
                        <input type=\"text\" class=\"captionEffectVal\" name=\"captionEffect\" data-id=\"";
            // line 289
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["image"] ?? null), "attachment", array()), "id", array()), "html", null, true);
            echo "\" value=\"";
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute(($context["image"] ?? null), "attachment", array(), "any", false, true), "captionEffect", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["image"] ?? null), "attachment", array(), "any", false, true), "captionEffect", array()), $this->getAttribute($this->getAttribute($this->getAttribute(($context["sliderSettings"] ?? null), "thumbnail", array()), "overlay", array()), "effect", array()))) : ($this->getAttribute($this->getAttribute($this->getAttribute(($context["sliderSettings"] ?? null), "thumbnail", array()), "overlay", array()), "effect", array()))), "html", null, true);
            echo "\" style=\"display: none;\" />
                    </div>
                    <div class=\"gg-copy-option gg-option-container ggSettingsDisplNone\">
                        <select class=\"copy-option\" style=\"width: 100%;\"></select></br>
                        <button class=\"button image-copy-btn\">";
            // line 293
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Apply")), "html", null, true);
            echo "</button>
                    </div>
                    <div class=\"gg-move-option gg-option-container ggSettingsDisplNone\">
                        <select class=\"copy-option\" style=\"width: 100%;\"></select></br>
                        <button class=\"button image-move-btn\">";
            // line 297
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Apply")), "html", null, true);
            echo "</button>
                    </div>
                    <div class=\"gg-link-option gg-option-container ggSettingsDisplNone\">
                        <input type=\"text\" name=\"link\" value=\"";
            // line 300
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["image"] ?? null), "attachment", array()), "external_link", array()), "html", null, true);
            echo "\" style=\"width: 100%;\" placeholder=\"";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("http://example.com/")), "html", null, true);
            echo "\"/></br>
                        <label>
                            <input type=\"checkbox\" name=\"target\" value=\"_blank\" ";
            // line 302
            if (($this->getAttribute($this->getAttribute(($context["image"] ?? null), "attachment", array()), "target", array()) == "_blank")) {
                echo " checked=\"checked\" ";
            }
            echo "/>
                            ";
            // line 303
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Open in new window")), "html", null, true);
            echo "
                        </label>
                        <label>
                            <input type=\"checkbox\" name=\"rel[]\" value=\"nofollow\" ";
            // line 306
            if (twig_in_filter("nofollow", $this->getAttribute($this->getAttribute(($context["image"] ?? null), "attachment", array()), "rel", array()))) {
                echo " checked=\"checked\" ";
            }
            echo "/>
                            ";
            // line 307
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Add nofollow attribute")), "html", null, true);
            echo "
                        </label>
                        <label>
                            <input type=\"checkbox\" name=\"rel[]\" value=\"noopener\" ";
            // line 310
            if (twig_in_filter("noopener", $this->getAttribute($this->getAttribute(($context["image"] ?? null), "attachment", array()), "rel", array()))) {
                echo " checked=\"checked\" ";
            }
            echo "/>
                            ";
            // line 311
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Add noopener attribute")), "html", null, true);
            echo "
                        </label>
                        <label>
                            <input type=\"checkbox\" name=\"rel[]\" value=\"noreferrer\" ";
            // line 314
            if (twig_in_filter("noreferrer", $this->getAttribute($this->getAttribute(($context["image"] ?? null), "attachment", array()), "rel", array()))) {
                echo " checked=\"checked\" ";
            }
            echo "/>
                            ";
            // line 315
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Add noreferrer attribute")), "html", null, true);
            echo "
                        </label>
                    </div>
                    <div class=\"gg-video-option gg-option-container ggSettingsDisplNone\">
                        <input type=\"text\"
                            ";
            // line 320
            if ($this->getAttribute(($context["environment"] ?? null), "isPro", array(), "method")) {
                // line 321
                echo "                                name=\"video\" value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["image"] ?? null), "attachment", array()), "video", array()), "html", null, true);
                echo "\"
                            ";
            } else {
                // line 323
                echo "                                disabled=\"disabled\"
                            ";
            }
            // line 325
            echo "                            style=\"width: 100%;\"
                            placeholder=\"";
            // line 326
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Video URL")), "html", null, true);
            echo "\"
                        >
                        ";
            // line 328
            if (($this->getAttribute(($context["environment"] ?? null), "isPro", array(), "method") == false)) {
                // line 329
                echo "                            <span style=\"color:red\" class=\"description\">
                                </br><a href=\"http://supsystic.com/plugins/photo-gallery?utm_source=plugin&utm_medium=video&utm_campaign=gallery\" target=\"_blank\">
                                    ";
                // line 331
                echo ($context["nonProMsg"] ?? null);
                echo "
                                </a>
                            </span>
                        ";
            }
            // line 335
            echo "                    </div>
                    <div class=\"gg-categories-option gg-option-container ggSettingsDisplNone\">
                        ";
            // line 337
            if (($this->getAttribute(($context["environment"] ?? null), "isPro", array(), "method") == false)) {
                // line 338
                echo "                            <input type=\"text\" disabled placeholder=\"Categories\" style=\"width: 70%;\">
                            <span style=\"color:red\" class=\"description\">
                                </br><a href=\"http://supsystic.com/plugins/photo-gallery?utm_source=plugin&utm_medium=imagescategories&utm_campaign=gallery\" target=\"_blank\">
                                    ";
                // line 341
                echo ($context["nonProMsg"] ?? null);
                echo "
                                </a>
                            </span>
                        ";
            } else {
                // line 345
                echo "                            <input type=\"text\" class=\"gg-tags\" id=\"tags-";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["image"] ?? null), "id", array()), "html", null, true);
                echo "\" data-id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["image"] ?? null), "id", array()), "html", null, true);
                echo "\" value=\"";
                echo twig_join_filter($this->getAttribute(($context["image"] ?? null), "tags", array()), ",");
                echo "\">
                        ";
            }
            // line 347
            echo "                    </div>
                    <div class=\"gg-linked-option gg-option-container ggSettingsDisplNone\">
                        ";
            // line 349
            if (($this->getAttribute(($context["environment"] ?? null), "isPro", array(), "method") == false)) {
                // line 350
                echo "                            <button class=\"button disabled\" disabled>";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Choose images")), "html", null, true);
                echo "</button>
                            <span style=\"color:red\" class=\"description\">
                                </br><a href=\"http://supsystic.com/plugins/photo-gallery?utm_source=plugin&utm_medium=linked_images&utm_campaign=gallery\" target=\"_blank\">
                                    ";
                // line 353
                echo ($context["nonProMsg"] ?? null);
                echo "
                                </a>
                            </span>
                        ";
            } else {
                // line 357
                echo "                            <button class=\"button selectLinkedImages\" data-id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["image"] ?? null), "id", array()), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Choose images")), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Choose images")), "html", null, true);
                echo "</button>
                            <input type=\"text\" name=\"linkedImages\" data-id=\"";
                // line 358
                echo twig_escape_filter($this->env, $this->getAttribute(($context["image"] ?? null), "id", array()), "html", null, true);
                echo "\" value=\"";
                echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute(($context["image"] ?? null), "attachment", array(), "any", false, true), "linkedImages", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["image"] ?? null), "attachment", array(), "any", false, true), "linkedImages", array()), "")) : ("")), "html", null, true);
                echo "\" style=\"display: none;\" />
                        ";
            }
            // line 360
            echo "                    </div>
                    <div class=\"gg-hover-option gg-option-container ggSettingsDisplNone\">
                        ";
            // line 362
            if (($this->getAttribute(($context["environment"] ?? null), "isPro", array(), "method") == false)) {
                // line 363
                echo "                            <button class=\"button disabled\" disabled=\"disabled\">";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Choose image")), "html", null, true);
                echo "</button>
                            <span class=\"description\">
                                </br><a href=\"http://supsystic.com/plugins/photo-gallery?utm_source=plugin&utm_medium=hover_caption_image_bg&utm_campaign=gallery\" target=\"_blank\">
                                    ";
                // line 366
                echo ($context["nonProMsg"] ?? null);
                echo "
                                </a>
                            </span>
                        ";
            } else {
                // line 370
                echo "                            <input id=\"hover-caption-image-inp-";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["image"] ?? null), "id", array()), "html", null, true);
                echo "\" type=\"text\" name=\"hoverCaptionImageInp\" value=\"";
                echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute(($context["image"] ?? null), "attachment", array(), "any", false, true), "hoverCaptionImage", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["image"] ?? null), "attachment", array(), "any", false, true), "hoverCaptionImage", array()), "")) : ("")), "html", null, true);
                echo "\"
                             style=\"width: 100%;\" readonly=\"readonly\"/></br>
                            <button class=\"button select-hover-caption-image\" data-image-id=\"";
                // line 372
                echo twig_escape_filter($this->env, $this->getAttribute(($context["image"] ?? null), "id", array()), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Choose image")), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Choose image")), "html", null, true);
                echo "</button>
                        ";
            }
            // line 374
            echo "                    </div>
                    <div class=\"gg-crop-option gg-option-container ggSettingsDisplNone\">
                        <label>Image crop position: </label></br>
                        ";
            // line 377
            $context["cropPositionList"] = array("left-top" => "Top Left", "center-top" => "Top Center", "right-top" => "Top Right", "left-center" => "Center Left", "center-center" => "Center Center", "right-center" => "Center Right", "left-bottom" => "Bottom Left", "center-bottom" => "Bottom Center", "right-bottom" => "Bottom Right");
            // line 388
            echo "                        <select name=\"cropPosition\">
                            ";
            // line 389
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["cropPositionList"] ?? null));
            foreach ($context['_seq'] as $context["value"] => $context["title"]) {
                // line 390
                echo "                                <option value=\"";
                echo twig_escape_filter($this->env, $context["value"], "html", null, true);
                echo "\" ";
                if (((($this->getAttribute($this->getAttribute(($context["image"] ?? null), "attachment", array(), "any", false, true), "cropPosition", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["image"] ?? null), "attachment", array(), "any", false, true), "cropPosition", array()), "center-center")) : ("center-center")) == $context["value"])) {
                    echo " selected=\"selected\" ";
                }
                echo ">";
                echo twig_escape_filter($this->env, $context["title"], "html", null, true);
                echo "</option>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['value'], $context['title'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 392
            echo "                        </select>
                    </div>
                    <div class=\"gg-rotate-option gg-option-container ggSettingsDisplNone\">
                        <select class=\"rotate-option\" style=\"width:100%\">
                            <option value=\"clockwise\" selected=\"selected\">";
            // line 396
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Rotate Clockwise")), "html", null, true);
            echo "</option>
                            <option value=\"counter\">";
            // line 397
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Rotate Counter-Clockwise")), "html", null, true);
            echo "</option>
                        </select></br>
                        <button class=\"button image-rotate-btn\">";
            // line 399
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Apply")), "html", null, true);
            echo "</button>
                    </div>
                </div>

                <input name=\"replace_attachment_id\" id=\"replace_attachment_id_";
            // line 403
            echo twig_escape_filter($this->env, $this->getAttribute(($context["image"] ?? null), "id", array()), "html", null, true);
            echo "\" type=\"hidden\"/>
                <input name=\"buttonLinkTitle\" value=\"";
            // line 404
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["image"] ?? null), "attachment", array()), "buttonLinkTitle", array()), "html", null, true);
            echo "\" type=\"hidden\"/>
                <input name=\"buttonLinkUrl\" value=\"";
            // line 405
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["image"] ?? null), "attachment", array()), "buttonLinkUrl", array()), "html", null, true);
            echo "\" type=\"hidden\"/>
                <input name=\"imageKeywords\" value=\"";
            // line 406
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["image"] ?? null), "attachment", array()), "imageKeywords", array()), "html", null, true);
            echo "\" type=\"hidden\"/>
            </form>
            <form id=\"photo-editor-hidden-";
            // line 408
            echo twig_escape_filter($this->env, $this->getAttribute(($context["image"] ?? null), "id", array()), "html", null, true);
            echo "\" style=\"display: none;\">
                <input name=\"image_id\" value=\"";
            // line 409
            echo twig_escape_filter($this->env, $this->getAttribute(($context["image"] ?? null), "id", array()), "html", null, true);
            echo "\" type=\"hidden\"/>
                <input name=\"attachment_id\" value=\"";
            // line 410
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["image"] ?? null), "attachment", array()), "id", array()), "html", null, true);
            echo "\" type=\"hidden\"/>
            </form>
        </td>
    </tr>
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
        return "@ui/type.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1161 => 410,  1157 => 409,  1153 => 408,  1148 => 406,  1144 => 405,  1140 => 404,  1136 => 403,  1129 => 399,  1124 => 397,  1120 => 396,  1114 => 392,  1099 => 390,  1095 => 389,  1092 => 388,  1090 => 377,  1085 => 374,  1076 => 372,  1068 => 370,  1061 => 366,  1054 => 363,  1052 => 362,  1048 => 360,  1041 => 358,  1032 => 357,  1025 => 353,  1018 => 350,  1016 => 349,  1012 => 347,  1002 => 345,  995 => 341,  990 => 338,  988 => 337,  984 => 335,  977 => 331,  973 => 329,  971 => 328,  966 => 326,  963 => 325,  959 => 323,  953 => 321,  951 => 320,  943 => 315,  937 => 314,  931 => 311,  925 => 310,  919 => 307,  913 => 306,  907 => 303,  901 => 302,  894 => 300,  888 => 297,  881 => 293,  872 => 289,  864 => 288,  856 => 283,  852 => 282,  848 => 281,  844 => 280,  840 => 279,  834 => 276,  830 => 275,  826 => 274,  822 => 273,  818 => 272,  808 => 269,  801 => 265,  795 => 264,  781 => 263,  775 => 262,  767 => 258,  761 => 256,  754 => 252,  749 => 250,  746 => 249,  744 => 248,  738 => 247,  732 => 246,  723 => 242,  715 => 241,  710 => 240,  703 => 236,  697 => 234,  694 => 233,  684 => 231,  682 => 230,  675 => 228,  671 => 227,  667 => 226,  663 => 225,  654 => 221,  649 => 220,  646 => 219,  643 => 218,  640 => 217,  637 => 216,  634 => 215,  631 => 214,  628 => 213,  625 => 212,  622 => 211,  619 => 210,  617 => 209,  608 => 208,  605 => 207,  602 => 206,  599 => 205,  596 => 204,  593 => 203,  590 => 202,  587 => 201,  585 => 200,  577 => 197,  569 => 194,  563 => 193,  551 => 189,  549 => 188,  546 => 187,  543 => 186,  529 => 185,  511 => 181,  507 => 179,  501 => 177,  495 => 175,  493 => 174,  488 => 172,  479 => 166,  475 => 165,  463 => 156,  456 => 152,  447 => 148,  441 => 147,  435 => 144,  430 => 143,  418 => 142,  397 => 135,  392 => 133,  388 => 132,  378 => 128,  375 => 127,  372 => 126,  369 => 125,  366 => 124,  363 => 123,  360 => 122,  357 => 121,  354 => 120,  351 => 119,  348 => 118,  346 => 117,  342 => 116,  334 => 111,  329 => 110,  317 => 109,  296 => 102,  291 => 100,  283 => 95,  271 => 86,  263 => 81,  258 => 80,  246 => 79,  230 => 76,  221 => 74,  217 => 73,  214 => 72,  205 => 70,  201 => 69,  198 => 68,  195 => 67,  183 => 66,  165 => 61,  159 => 60,  157 => 59,  149 => 57,  143 => 56,  134 => 54,  130 => 53,  124 => 50,  114 => 43,  108 => 41,  102 => 37,  100 => 30,  96 => 29,  91 => 26,  89 => 23,  85 => 22,  80 => 19,  78 => 16,  74 => 15,  66 => 10,  59 => 5,  56 => 4,  53 => 3,  50 => 2,  36 => 1,  31 => 184,  28 => 141,  25 => 108,  22 => 78,  19 => 65,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@ui/type.twig", "/storage/ssd1/084/10485084/public_html/wp-content/plugins/gallery-by-supsystic/src/GridGallery/Ui/views/type.twig");
    }
}
