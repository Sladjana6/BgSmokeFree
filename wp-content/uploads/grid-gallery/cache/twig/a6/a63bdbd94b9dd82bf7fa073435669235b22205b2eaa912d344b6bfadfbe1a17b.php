<?php

/* @galleries/view.twig */
class __TwigTemplate_3ac4e21b66a11b9e0b1517732bb4aa785091bf3cb0a22aa02fe4afc443329b7d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("grid-gallery.twig", "@galleries/view.twig", 1);
        $this->blocks = array(
            'header' => array($this, 'block_header'),
            'content' => array($this, 'block_content'),
            'settingsCaptionsView' => array($this, 'block_settingsCaptionsView'),
            'settingsCaptionsIconsEnabledView' => array($this, 'block_settingsCaptionsIconsEnabledView'),
            'captionEffectInPro' => array($this, 'block_captionEffectInPro'),
            'settingsCaptionsIconsDisabledView' => array($this, 'block_settingsCaptionsIconsDisabledView'),
            'iconsEffects' => array($this, 'block_iconsEffects'),
            'settingsOtherPro' => array($this, 'block_settingsOtherPro'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "grid-gallery.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_header($context, array $blocks = array())
    {
        // line 4
        echo "    <nav id=\"supsystic-breadcrumbs\" class=\"supsystic-breadcrumbs\" style=\"float: left; padding: 20px 0 0 20px;\">
        ";
        // line 6
        echo "        ";
        // line 7
        echo "        <a href=\"";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["environment"] ?? null), "generateUrl", array(0 => "galleries"), "method"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Galleries")), "html", null, true);
        echo "</a>
        <i class=\"fa fa-angle-right\"></i>
        <a href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute(($context["environment"] ?? null), "generateUrl", array(0 => "galleries", 1 => "settings", 2 => array("gallery_id" => $this->getAttribute(($context["gallery"] ?? null), "id", array()))), "method"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["gallery"] ?? null), "title", array()), "html", null, true);
        echo "</a>
        <i class=\"fa fa-angle-right\"></i>
        <a href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute(($context["environment"] ?? null), "generateUrl", array(0 => "galleries", 1 => "view", 2 => array("gallery_id" => $this->getAttribute(($context["gallery"] ?? null), "id", array()))), "method"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Images List")), "html", null, true);
        echo "</a>
    </nav>

    <section class=\"sgg-all-img-info-sect\" id=\"single-gallery-head-toolbar\" style=\"margin-left: 75px;\">
    \t<div class=\"gg-settings-row\">
\t    \t<div class=\"gg-settings-block\">
\t\t    \t<ul class=\"supsystic-bar-controls\" style=\"padding-left: 20px;\">
\t\t            <li title=\"";
        // line 18
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Upload new images")), "html", null, true);
        echo "\">
\t\t                <button class=\"button button-primary gallery import-to-gallery\">
\t\t                    <i class=\"fa fa-fw fa-upload\"></i>
\t\t                    ";
        // line 21
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Add Images")), "html", null, true);
        echo "
\t\t                </button>
\t\t            </li>
\t\t            <li>
\t\t                <a href=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->getAttribute(($context["environment"] ?? null), "generateUrl", array(0 => "galleries", 1 => "sort", 2 => array("gallery_id" => $this->getAttribute(($context["gallery"] ?? null), "id", array()))), "method"), "html", null, true);
        echo "\"
\t\t                   class=\"button\">
\t\t                    <i class=\"fa fa-fw fa-sort\"></i>
\t\t\t\t\t\t\t";
        // line 28
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Grid View")), "html", null, true);
        echo "
\t\t                </a>
\t\t            </li>
\t\t        </ul>
        \t</div>
    \t\t<div class=\"gg-settings-block\">
\t\t    \t<ul class=\"supsystic-bar-controls\">
\t\t    \t\t<li>
\t\t            \t<a href=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->getAttribute(($context["environment"] ?? null), "generateUrl", array(0 => "galleries", 1 => "settings", 2 => array("gallery_id" => $this->getAttribute(($context["gallery"] ?? null), "id", array()))), "method"), "html", null, true);
        echo "\"
\t\t                \tclass=\"button\">
\t\t                    <i class=\"fa fa-fw fa-cogs\"></i>
\t\t\t\t\t\t\t";
        // line 39
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Settings")), "html", null, true);
        echo "
\t\t                </a>
\t\t            </li>

\t\t            <li>
\t\t                <a target=\"_blank\"
\t\t                   href=\"";
        // line 45
        echo twig_escape_filter($this->env, $this->getAttribute(($context["environment"] ?? null), "generateUrl", array(0 => "galleries", 1 => "preview", 2 => array("gallery_id" => $this->getAttribute(($context["gallery"] ?? null), "id", array()))), "method"), "html", null, true);
        echo "\"
\t\t                   class=\"button\" data-button=\"preview\">
\t\t                    <i class=\"fa fa-fw fa-eye\"></i>
\t\t                    ";
        // line 48
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Preview")), "html", null, true);
        echo "
\t\t                </a>
\t\t            </li>
\t\t        </ul>
        \t</div>
        </div>
    </section>
    <section class=\"supsystic-bar sgg-all-img-info-sect\" id=\"single-gallery-toolbar\" style=\"padding-bottom:0;\">
    \t<div class=\"gg-settings-row\">
    \t\t<div class=\"gg-settings-block\">
\t\t    \t<ul class=\"supsystic-bar-controls gg-checked-options\">
\t\t            <li id=\"checkedDoLi\" data-delete-confirm=\"";
        // line 59
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Are you sure you want to delete photo from this gallery?")), "html", null, true);
        echo "\">
\t\t\t\t\t\t<select name=\"checkedDo\" style=\"height: 34px;\">
\t\t\t\t\t\t\t<option value=\"rotate-clock\">";
        // line 61
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Rotate Clockwise")), "html", null, true);
        echo "</option>
\t\t\t\t\t\t\t<option value=\"rotate-cclock\">";
        // line 62
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Rotate Counter-Clockwise")), "html", null, true);
        echo "</option>
\t\t\t\t\t\t\t<option value=\"copy\">";
        // line 63
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Copy to")), "html", null, true);
        echo "</option>
\t\t\t\t\t\t\t<option value=\"move\">";
        // line 64
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Move to")), "html", null, true);
        echo "</option>
\t\t\t\t\t\t\t<option value=\"crop\">";
        // line 65
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Crop")), "html", null, true);
        echo "</option>
\t\t\t\t\t\t\t<option value=\"delete\">";
        // line 66
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Delete selected")), "html", null, true);
        echo "</option>
\t\t\t\t\t\t\t";
        // line 67
        if (($this->getAttribute(($context["environment"] ?? null), "isPro", array(), "method") == true)) {
            // line 68
            echo "\t\t\t\t\t\t\t\t<option value=\"new-category\">";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("New Category")), "html", null, true);
            echo "</option>
\t\t\t\t\t\t\t\t<option value=\"add-category\">";
            // line 69
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Add Category")), "html", null, true);
            echo "</option>
\t\t\t\t\t\t\t\t<option value=\"del-category\">";
            // line 70
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Delete Category")), "html", null, true);
            echo "</option>
\t\t\t\t\t\t\t";
        }
        // line 72
        echo "\t\t\t\t\t\t\t";
        if (((($this->getAttribute(($context["environment"] ?? null), "isPro", array(), "method") == true) && $this->getAttribute(($context["settings"] ?? null), "attributes", array(), "any", true, true)) && (twig_length_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "attributes", array()), "order", array())) > 0))) {
            // line 73
            echo "\t\t\t\t\t\t\t\t<optgroup label=\"Add Attributes\">
\t\t\t\t\t\t\t\t\t";
            // line 74
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "attributes", array()), "order", array()));
            foreach ($context['_seq'] as $context["index"] => $context["name"]) {
                // line 75
                echo "\t\t\t\t\t\t\t\t\t\t<option data-attribute value=\"";
                echo twig_escape_filter($this->env, $context["index"], "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $context["name"], "html", null, true);
                echo "</option>
\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['index'], $context['name'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 77
            echo "\t\t\t\t\t\t\t\t</optgroup>
\t\t\t\t\t\t\t";
        }
        // line 79
        echo "\t\t\t\t\t\t</select>
\t\t\t\t\t</li>
\t\t\t\t\t";
        // line 81
        if (($this->getAttribute(($context["environment"] ?? null), "isPro", array(), "method") == true)) {
            // line 82
            echo "\t\t\t\t\t\t<li class=\"gg-checked-container gg-checked-attributes ggSettingsDisplNone\">
\t\t\t\t\t\t\t<select id=\"gg-attribute-values\" style=\"height: 34px; width: 150px;\" data-values=\"";
            // line 83
            echo twig_escape_filter($this->env, twig_jsonencode_filter($this->getAttribute(($context["gallery"] ?? null), "attributes", array())), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li class=\"gg-checked-container gg-checked-new-category ggSettingsDisplNone\">
\t\t\t\t\t\t\t<input type=\"text\" id=\"gg-new-category\" style=\"width: 150px; height:34px;\" value=\"\" placeholder=\"Category name...\">
\t\t\t \t\t\t</li>
\t\t\t\t\t\t<li class=\"gg-checked-container gg-checked-add-category ggSettingsDisplNone\">
\t\t\t\t\t\t\t<select id=\"gg-categories-list\" style=\"height: 34px;\">
\t\t\t\t\t\t\t\t";
            // line 91
            if ((twig_length_filter($this->env, $this->getAttribute(($context["gallery"] ?? null), "tags", array())) > 0)) {
                echo "\t                    
\t\t\t\t\t\t\t\t\t";
                // line 92
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["gallery"] ?? null), "tags", array()));
                foreach ($context['_seq'] as $context["value"] => $context["title"]) {
                    // line 93
                    echo "\t\t\t\t\t\t\t\t\t\t<option value=\"";
                    echo twig_escape_filter($this->env, $context["title"], "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $context["title"], "html", null, true);
                    echo "</option>
\t\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['value'], $context['title'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 95
                echo "\t\t\t\t\t\t\t\t";
            }
            // line 96
            echo "\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li class=\"gg-checked-container gg-checked-del-category ggSettingsDisplNone\">
\t\t\t\t\t\t\t<select id=\"gg-categories-del\" style=\"height: 34px;\">
\t\t\t\t\t\t\t\t";
            // line 100
            if ((twig_length_filter($this->env, $this->getAttribute(($context["gallery"] ?? null), "tags", array())) > 0)) {
                echo "\t                    
\t\t\t\t\t\t\t\t\t";
                // line 101
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["gallery"] ?? null), "tags", array()));
                foreach ($context['_seq'] as $context["value"] => $context["title"]) {
                    // line 102
                    echo "\t\t\t\t\t\t\t\t\t\t<option value=\"";
                    echo twig_escape_filter($this->env, $context["title"], "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $context["title"], "html", null, true);
                    echo "</option>
\t\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['value'], $context['title'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 104
                echo "\t\t\t\t\t\t\t\t\t<option value=\"allcat\">";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("All Categories")), "html", null, true);
                echo "</option>
\t\t\t\t\t\t\t\t";
            }
            // line 106
            echo "\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t</li>
\t\t\t\t\t";
        }
        // line 109
        echo "\t\t\t\t\t<li class=\"gg-checked-copy gg-checked-move gg-checked-container ggSettingsDisplNone\">
\t\t\t\t\t\t<select id=\"gg-galleries-list\" style=\"height: 34px;\">
\t\t\t\t\t\t\t";
        // line 111
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["galleries"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["obj"]) {
            // line 112
            echo "\t\t\t\t\t\t\t\t";
            if (($this->getAttribute($context["obj"], "id", array()) != $this->getAttribute(($context["gallery"] ?? null), "id", array()))) {
                // line 113
                echo "\t\t\t\t\t\t\t\t\t<option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["obj"], "id", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["obj"], "title", array()), "html", null, true);
                echo "</option>
\t\t\t\t\t\t\t\t";
            }
            // line 115
            echo "\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['obj'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 116
        echo "\t\t\t\t\t\t</select>
\t\t\t\t\t</li>
\t\t\t\t\t<li class=\"gg-checked-crop gg-checked-container ggSettingsDisplNone\">
\t\t\t\t\t\t";
        // line 119
        $context["cropPositionList"] = array("left-top" => "Top Left", "center-top" => "Top Center", "right-top" => "Top Right", "left-center" => "Center Left", "center-center" => "Center Center", "right-center" => "Center Right", "left-bottom" => "Bottom Left", "center-bottom" => "Bottom Center", "right-bottom" => "Bottom Right");
        // line 130
        echo "\t\t\t\t\t\t<select id=\"gg-crop-positions\" style=\"height: 34px;\">
                            ";
        // line 131
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["cropPositionList"] ?? null));
        foreach ($context['_seq'] as $context["value"] => $context["title"]) {
            // line 132
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
        // line 134
        echo "                        </select>
\t\t\t\t\t</li>
\t\t\t\t\t<li>
\t\t\t\t\t\t<button class=\"button button-primary\" data-button=\"checkedbtn\" ";
        // line 137
        if (twig_test_empty($this->getAttribute(($context["gallery"] ?? null), "photos", array()))) {
            echo "disabled";
        }
        echo ">
\t\t\t\t\t\t\t<i class=\"fa fa-fw fa-check\"></i>
\t\t\t\t\t\t\t";
        // line 139
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Apply")), "html", null, true);
        echo "
\t\t\t\t\t\t</button>
\t\t\t\t\t</li>
\t\t        </ul>
        \t</div>

\t        <div class=\"gg-settings-block\">
\t\t        <ul class=\"supsystic-bar-controls\">
\t\t\t\t\t<li>
\t\t\t\t\t\t<input id=\"find-by-caption\" type=\"text\" style=\"height:34px; width: 150px;\" placeholder=\"";
        // line 148
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Search")), "html", null, true);
        echo "\">
\t\t\t\t\t</li>
\t\t\t\t\t<li class=\"separator\">|</li>
\t\t\t\t</ul>
\t\t        \t
\t\t        <ul class=\"supsystic-bar-controls\">
\t\t            <li title=\"";
        // line 154
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Sort By: ")), "html", null, true);
        echo "\">
\t\t\t\t\t\t";
        // line 155
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Sort By: ")), "html", null, true);
        echo "
\t\t                <select name=\"sortby\" style=\"height: 34px;\">
\t\t                    <option value=\"postion\" ";
        // line 157
        if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "sort", array()), "sortby", array()) == "position")) {
            echo "selected";
        }
        echo ">Position</option>
\t\t                    <option value=\"adate\" ";
        // line 158
        if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "sort", array()), "sortby", array()) == "adate")) {
            echo "selected";
        }
        echo ">Add date</option>
\t\t                    <option value=\"date\" ";
        // line 159
        if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "sort", array()), "sortby", array()) == "date")) {
            echo "selected";
        }
        echo ">Create date</option>
\t\t                    <option value=\"size\" ";
        // line 160
        if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "sort", array()), "sortby", array()) == "size")) {
            echo "selected";
        }
        echo ">Size</option>
\t\t                    <option value=\"name\" ";
        // line 161
        if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "sort", array()), "sortby", array()) == "name")) {
            echo "selected";
        }
        echo ">Name</option>
\t\t                    <option value=\"filename\" ";
        // line 162
        if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "sort", array()), "sortby", array()) == "filename")) {
            echo "selected";
        }
        echo ">File name</option>
\t\t\t\t\t\t\t";
        // line 163
        if (($this->getAttribute(($context["environment"] ?? null), "isPro", array(), "method") == true)) {
            echo "<option value=\"tags\" ";
            if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "sort", array()), "sortby", array()) == "tags")) {
                echo "selected";
            }
            echo ">Tags</option>";
        }
        // line 164
        echo "\t\t                    <option value=\"randomly\" ";
        if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "sort", array()), "sortby", array()) == "randomly")) {
            echo "selected";
        }
        echo ">Randomly</option>
\t\t                </select>
\t\t            </li>
\t\t\t\t\t<li id=\"sortToLi\" title=\"";
        // line 167
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Sort To: ")), "html", null, true);
        echo "\" style=\"";
        if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "sort", array()), "sortby", array()) == "randomly")) {
            echo " display:none; ";
        }
        echo " }}\">
\t\t\t\t\t\t<button class=\"button button-invisible\" data-button=\"sortbtn\">
\t\t\t\t\t\t\t<i class=\"fa fa-fw fa-arrow-";
        // line 169
        if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "sort", array()), "sortto", array()) == "asc")) {
            echo "up";
        } else {
            echo "down";
        }
        echo "\"></i>
\t\t\t\t\t\t</button>
\t\t\t\t\t</li>
\t\t        </ul>

\t\t        <ul class=\"supsystic-bar-controls\">
\t\t\t\t\t<li>
\t\t\t\t\t\t";
        // line 176
        if ((twig_length_filter($this->env, $this->getAttribute(($context["gallery"] ?? null), "photos", array())) > 0)) {
            // line 177
            echo "\t\t\t\t\t\t\t";
            $context["pagination_view"] = $this->loadTemplate("@galleries/helpers/pagination_view.twig", "@galleries/view.twig", 177);
            // line 178
            echo "\t\t\t\t\t\t\t";
            echo $context["pagination_view"]->getpaginationRender(($context["paginationSettings"] ?? null));
            echo "
\t\t\t\t\t\t";
        }
        // line 180
        echo "\t\t\t\t\t</li>
\t\t\t\t\t<li>
\t\t\t\t\t\t";
        // line 182
        echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute(($context["gallery"] ?? null), "photos", array())), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("media")), "html", null, true);
        echo "
\t\t\t\t\t</li>
\t\t\t\t</ul>
\t\t\t</div>
\t\t</div>

    </section>

";
    }

    // line 192
    public function block_content($context, array $blocks = array())
    {
        // line 193
        echo "    ";
        $context["importTypes"] = $this->loadTemplate("@galleries/shortcode/import.twig", "@galleries/view.twig", 193);
        // line 194
        echo "\t";
        $context["form"] = $this->loadTemplate("@core/form.twig", "@galleries/view.twig", 194);
        // line 195
        echo "
    ";
        // line 196
        if (( !array_key_exists("gallery", $context) || (null === ($context["gallery"] ?? null)))) {
            // line 197
            echo "        <p>";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("The gallery is does not exists")), "html", null, true);
            echo "</p>
    ";
        } else {
            // line 199
            echo "        ";
            if (twig_test_empty($this->getAttribute(($context["gallery"] ?? null), "photos", array()))) {
                // line 200
                echo "            <h2 style=\"text-align: center; color: #bfbfbf; margin: 50px 0 25px 0;\">
                <span style=\"margin-bottom: 20px; display: block;\">
                    ";
                // line 202
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Currently this gallery has no images")), "html", null, true);
                echo "
                </span>
                ";
                // line 204
                echo $context["importTypes"]->getshow("1000", $this->getAttribute(($context["gallery"] ?? null), "id", array()));
                echo "
            </h2>
        ";
            } else {
                // line 207
                echo "            ";
                $context["view"] = $this->loadTemplate("@ui/type.twig", "@galleries/view.twig", 207);
                // line 208
                echo "            ";
                $context["entity"] = array("images" => $this->getAttribute(($context["gallery"] ?? null), "photos", array()));
                // line 209
                echo "            ";
                $context["sliderSettings"] = ($context["settings"] ?? null);
                // line 210
                echo " 
            ";
                // line 211
                if ((($context["viewType"] ?? null) == "block")) {
                    // line 212
                    echo "                ";
                    echo $context["view"]->getblock_view(($context["entity"] ?? null));
                    echo "
            ";
                }
                // line 214
                echo "
            ";
                // line 215
                if ((($context["viewType"] ?? null) == "list")) {
                    // line 216
                    echo "                ";
                    echo $context["view"]->getlist_view(($context["entity"] ?? null), ($context["sliderSettings"] ?? null), $this->getAttribute(($context["gallery"] ?? null), "id", array()));
                    echo "
            ";
                }
                // line 218
                echo "        ";
            }
            // line 219
            echo "    ";
        }
        // line 220
        echo "
    ";
        // line 221
        echo $context["importTypes"]->getview_dialogs($this->getAttribute(($context["gallery"] ?? null), "id", array()));
        echo "

    <div id=\"linkedImagesDialog\" title=\"";
        // line 223
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Linked Images")), "html", null, true);
        echo "\" style=\"display:none;\">
        <div class=\"linked-images-action-buttons\">
            <button class=\"button add\">";
        // line 225
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Add images")), "html", null, true);
        echo "</button>
            <button class=\"button remove\">";
        // line 226
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Remove selected")), "html", null, true);
        echo "</button>
        </div>
        <div class=\"linked-attachments-list\">
            
        </div>
        <div class=\"loading-container\">
            <i class=\"fa fa-spinner fa-spin fa-2x\"></i>
        </div>
    </div>

    <div id=\"effectDialog\" title=\"";
        // line 236
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Select overlay effect")), "html", null, true);
        echo "\" style=\"display:none;\">
        <div id=\"effectsPreview\" style=\"margin-top: 10px;\">
            ";
        // line 238
        $context["effects"] = array("none" => "None", "center" => "Middle", "quarter-appear" => "Appear", "quarter-disappear" => "Disappear", "quarter-slide-up" => "Quarter Slide Up", "quarter-slide-side" => "Quarter Slide Side", "quarter-fall-in" => "Quarter Fall in", "quarter-two-step" => "Quarter Two-step", "quarter-zoom" => "Quarter Caption Zoom", "cover-fade" => "Cover Fade", "cover-push-right" => "Cover Push Right", "revolving-door-left" => "Revolving Door Left", "revolving-door-right" => "Revolving Door Right", "revolving-door-top" => "Revolving Door Top", "revolving-door-bottom" => "Revolving Door Bottom", "revolving-door-original-left" => "Revolving Door Original Left", "revolving-door-original-right" => "Revolving Door Original Right", "revolving-door-original-top" => "Revolving Door Original Top", "revolving-door-original-bottom" => "Revolving Door Original Bottom", "cover-slide-top" => "Cover Slide Top", "offset" => "Caption Offset", "guillotine-reverse" => "Guillotine Reverse", "half-slide" => "Half Slide", "sqkwoosh" => "Skwoosh", "tunnel" => "Tunnel", "direction-aware" => "Direction Aware", "phophorus-rotate" => "Phosphorus Rotate", "phophorus-offset" => "Phosphorus Offset", "phophorus-scale" => "Phosphorus Scale", "cube" => "Cube", "polaroid" => "Polaroid", "3d-cube" => "3D Cube", "show-on-hover" => "Show on Hover", "swing" => "Swing");
        // line 274
        echo "            ";
        $context["iconsWithCaptionsEffects"] = array("icons" => "Default", "icons-scale" => "Scale", "icons-sodium-left" => "Sodium Left", "icons-sodium-top" => "Sodium Top", "icons-nitrogen-top" => "Nitrogen Top");
        // line 281
        echo "            ";
        ob_start();
        // line 282
        echo "                border-radius: ";
        echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "border", array()), "radius", array()) . twig_replace_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "border", array()), "radius_unit", array()), array(0 => "px", 1 => "%"))), "html", null, true);
        echo ";
                ";
        // line 283
        if ((($this->getAttribute(($context["environment"] ?? null), "isPro", array(), "method") && $this->getAttribute(($context["settings"] ?? null), "icons", array(), "any", true, true)) && ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "enabled", array()) == "true"))) {
            // line 284
            echo "                    ";
            if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "overlay_enabled", array()) == "true")) {
                // line 285
                echo "                        background-color:";
                echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array(), "any", false, true), "overlay_color", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array(), "any", false, true), "overlay_color", array()), "#3498db")) : ("#3498db")), "html", null, true);
                echo ";
                    ";
            }
            // line 287
            echo "                ";
        } else {
            // line 288
            echo "                    color:";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "foreground", array()), "html", null, true);
            echo ";
                    background-color:";
            // line 289
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "background", array()), "html", null, true);
            echo ";
                    font-size:";
            // line 290
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "text_size", array()), "html", null, true);
            echo twig_escape_filter($this->env, twig_replace_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "text_size_unit", array()), array(0 => "px", 1 => "%", 2 => "em")), "html", null, true);
            echo ";
                    ";
            // line 291
            if (($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "text_align", array()) != 3)) {
                // line 292
                echo "                        text-align:";
                echo twig_escape_filter($this->env, twig_replace_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "text_align", array()), array(0 => "left", 1 => "right", 2 => "center")), "html", null, true);
                echo ";
                    ";
            }
            // line 294
            echo "                    ";
            if ((($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "effect", array()) == "none") || ($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "enabled", array()) == "false"))) {
                // line 295
                echo "                        ";
                // line 296
                echo "                        bottom:0;
                    ";
            }
            // line 298
            echo "                ";
        }
        // line 299
        echo "            ";
        $context["figcaptionStyle"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 300
        echo "
\t\t\t";
        // line 301
        $this->displayBlock('settingsCaptionsView', $context, $blocks);
        // line 411
        echo "        </div>
        <style>
            .hi-icon { 
                color: ";
        // line 414
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "color", array()), "html", null, true);
        echo " !important; 
                background: ";
        // line 415
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "background", array()), "html", null, true);
        echo " !important; 
            }
            .hi-icon:hover { 
                color: ";
        // line 418
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "hover_color", array()), "html", null, true);
        echo " !important; 
                background: ";
        // line 419
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "background_hover", array()), "html", null, true);
        echo " !important; 
            }
            .hi-icon { 
                width: ";
        // line 422
        echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "size", array()) * 2), "html", null, true);
        echo "px !important; 
                height: ";
        // line 423
        echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "size", array()) * 2), "html", null, true);
        echo "px !important; 
            }
            .hi-icon:before { 
                font-size: ";
        // line 426
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array(), "any", false, true), "size", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array(), "any", false, true), "size", array()), 16)) : (16)), "html", null, true);
        echo "px !important; 
                line-height: ";
        // line 427
        echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "size", array()) * 2), "html", null, true);
        echo "px !important; 
            }
        </style>
\t\t";
        // line 430
        $this->displayBlock('settingsOtherPro', $context, $blocks);
        // line 432
        echo "    </div>

\t<div id=\"ggImageMetaDialog\" title=\"";
        // line 434
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Meta Data")), "html", null, true);
        echo "\" style=\"display:none;\">
        <div class=\"image-meta-list\">
        </div>
    </div>

    ";
        // line 439
        if (($this->getAttribute(($context["environment"] ?? null), "isPro", array(), "method") == true)) {
            // line 440
            echo "    \t<div id=\"ggImageAttributesDialog\" class=\"supsystic-plugin\" title=\"";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Custom Attributes")), "html", null, true);
            echo "\" data-image-id=\"\" style=\"display:none;\">
        \t<div>
        \t\t<table>
        \t\t\t";
            // line 443
            if (($this->getAttribute(($context["settings"] ?? null), "attributes", array(), "any", true, true) && (twig_length_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "attributes", array()), "order", array())) > 0))) {
                // line 444
                echo "\t   \t\t\t\t\t";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "attributes", array()), "order", array()));
                foreach ($context['_seq'] as $context["index"] => $context["name"]) {
                    // line 445
                    echo "\t   \t\t\t\t\t\t<tr style=\"height:auto\">
\t   \t\t\t\t\t\t\t<td>
\t   \t\t\t\t\t\t\t\t";
                    // line 447
                    echo twig_escape_filter($this->env, $context["name"], "html", null, true);
                    echo "
\t   \t\t\t\t\t\t\t\t<input class=\"gg-attribute-names\" type=\"hidden\" value=\"";
                    // line 448
                    echo twig_escape_filter($this->env, $context["name"], "html", null, true);
                    echo "\">
\t   \t\t\t\t\t\t\t</td>
\t   \t\t\t\t\t\t\t<td>
\t   \t\t\t\t\t\t\t\t<select class=\"gg-attribute-values\" data-attribute=\"";
                    // line 451
                    echo twig_escape_filter($this->env, $context["index"], "html", null, true);
                    echo "\" style=\"height: 30px; width: 200px;\">
\t\t\t\t\t\t\t\t\t</select>
\t   \t\t\t\t\t\t\t</td>
\t   \t\t\t\t\t\t\t<td>
\t   \t\t\t\t\t\t\t\t<input class=\"gg-attribute-new\" type=\"text\" data-attribute=\"";
                    // line 455
                    echo twig_escape_filter($this->env, $context["index"], "html", null, true);
                    echo "\" style=\"height:30px; width: 100%;\" placeholder=\"";
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("New value")), "html", null, true);
                    echo "\">
\t   \t\t\t\t\t\t\t</td>
\t   \t\t\t\t\t\t</tr>
\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['index'], $context['name'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 459
                echo "        \t\t\t";
            } else {
                // line 460
                echo "\t        \t\t\t<tr>
\t\t\t\t\t\t\t";
                // line 461
                if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "attributes", array()), "enabled", array()) != "false")) {
                    // line 462
                    echo "\t\t\t\t\t\t\t\t<td colspan=\"3\">
\t\t\t\t\t\t\t\t\t";
                    // line 463
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("No custom attributes have been specified for the gallery.")), "html", null, true);
                    echo "
\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t";
                } else {
                    // line 466
                    echo "\t\t\t\t\t\t\t\t<td colspan=\"3\" style=\"color:red;\">
\t\t\t\t\t\t\t\t\t";
                    // line 467
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("You need enable attribute in gallery settings.")), "html", null, true);
                    echo "
\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t";
                }
                // line 470
                echo "\t        \t\t\t</tr>
        \t\t\t";
            }
            // line 472
            echo "        \t\t\t<tr style=\"height:auto\">
        \t\t\t\t<td colspan=\"3\">
        \t\t\t\t\t<hr>
        \t\t\t\t</td>
        \t\t\t</tr>
        \t\t\t<tr>
        \t\t\t\t<td>
        \t\t\t\t\t<span style=\"font-weight: bold\">";
            // line 479
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Button Link")), "html", null, true);
            echo "</span>
        \t\t\t\t</td>
        \t\t\t\t<td>
        \t\t\t\t\t<input id=\"ggButtonLinkUrl\" type=\"text\" style=\"height:30px; width: 100%;\" placeholder=\"";
            // line 482
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Url")), "html", null, true);
            echo "\">
        \t\t\t\t</td>
        \t\t\t\t<td>
        \t\t\t\t\t<input id=\"ggButtonLinkTitle\" type=\"text\" style=\"height:30px; width: 100%;\" placeholder=\"";
            // line 485
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Title")), "html", null, true);
            echo "\">
        \t\t\t\t</td>
        \t\t\t</tr>
        \t\t\t<tr>
        \t\t\t\t<td>
        \t\t\t\t\t<span style=\"font-weight: bold\">";
            // line 490
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Keywords")), "html", null, true);
            echo "</span>
        \t\t\t\t</td>
        \t\t\t\t<td colspan=\"2\">
        \t\t\t\t\t<input id=\"ggImageKeywords\" type=\"text\" style=\"height:30px; width: 100%;\">
        \t\t\t\t</td>
        \t\t\t</tr>
        \t\t</table>
        \t</div>
    \t</div>
    ";
        }
        // line 500
        echo "
";
    }

    // line 301
    public function block_settingsCaptionsView($context, array $blocks = array())
    {
        // line 302
        echo "\t\t\t\t";
        if (($this->getAttribute($this->getAttribute($this->getAttribute(($context["gallery"] ?? null), "settings", array()), "icons", array()), "enabled", array()) == "false")) {
            // line 303
            echo "\t\t\t\t\t";
            $this->displayBlock('settingsCaptionsIconsEnabledView', $context, $blocks);
            // line 379
            echo "\t\t\t\t";
        } else {
            // line 380
            echo "\t\t\t\t\t";
            $this->displayBlock('settingsCaptionsIconsDisabledView', $context, $blocks);
            // line 409
            echo "\t\t\t\t";
        }
        // line 410
        echo "\t\t\t";
    }

    // line 303
    public function block_settingsCaptionsIconsEnabledView($context, array $blocks = array())
    {
        // line 304
        echo "\t\t\t\t\t\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["effects"] ?? null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["type"] => $context["name"]) {
            // line 305
            echo "\t\t\t\t\t\t\t";
            if (($context["type"] == "direction-aware")) {
                // line 306
                echo "\t\t\t\t\t\t\t\t<figure class=\"grid-gallery-caption\" data-grid-gallery-type=\"";
                echo twig_escape_filter($this->env, $context["type"], "html", null, true);
                echo "\">
\t\t\t\t\t\t\t\t\t<div class=\"box\">
\t\t\t\t\t\t\t\t\t\t<div class=\"box__right\">Right ? Left</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"box__left\">Left ? Right</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"box__top\">Top ? Bottom</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"box__bottom\">Bottom ? Top</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"box__center\">
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<img data-src=\"holder.js/150x150?theme=industrial&text=";
                // line 314
                echo twig_escape_filter($this->env, $context["name"], "html", null, true);
                echo "\" class=\"dialog-image\">
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"select-element\">
\t\t\t\t\t\t\t\t\t\t";
                // line 317
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Select")), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</figure>
\t\t\t\t\t\t\t";
            } elseif (twig_in_filter(            // line 320
$context["type"], array(0 => "show-on-hover", 1 => "fade-in", 2 => "grow", 3 => "shrink", 4 => "rotate-z", 5 => "square-to-circle"))) {
                // line 321
                echo "\t\t\t\t\t\t\t\t";
                $this->displayBlock('captionEffectInPro', $context, $blocks);
                // line 338
                echo "\t\t\t\t\t\t\t";
            } elseif (($context["type"] == "3d-cube")) {
                // line 339
                echo "\t\t\t\t\t\t\t\t<figure class=\"grid-gallery-caption\" data-grid-gallery-type=\"";
                echo twig_escape_filter($this->env, $context["type"], "html", null, true);
                echo "\">
\t\t\t\t\t\t\t\t\t<div class=\"box-3d-cube-scene\" style=\"perspective: 300px;-webkit-perspective: 300px\">
\t\t\t\t\t\t\t\t\t\t<div class=\"box-3d-cube\"
\t\t\t\t\t\t\t\t\t\t\t style=\"
\t\t\t\t\t\t\t\t\t\t\t\t transform-origin:50% 50% -75px;
\t\t\t\t\t\t\t\t\t\t\t\t -ms-transform-origin: 50% 50% -75px;
\t\t\t\t\t\t\t\t\t\t\t\t -webkit-transform-origin: 50% 50% -75px;
\t\t\t\t\t\t\t\t\t\t\t\t width:150px; height:150px
\t\t\t\t\t\t\t\t\t\t\t \"
\t\t\t\t\t\t\t\t\t\t>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"face front\" style=\"width:150px; height:150px\">
\t\t\t\t\t\t\t\t\t\t\t\t<img data-src=\"holder.js/150x150?theme=industrial&text=";
                // line 350
                echo twig_escape_filter($this->env, $context["name"], "html", null, true);
                echo "\" class=\"dialog-image\">
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t<div style=\"";
                // line 352
                echo twig_escape_filter($this->env, twig_trim_filter(($context["figcaptionStyle"] ?? null)), "html", null, true);
                echo "width:150px; height:150px\" class=\"face back\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"grid-gallery-figcaption-wrap\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<span>";
                // line 354
                echo twig_escape_filter($this->env, $context["name"], "html", null, true);
                echo "</span>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"select-element\">
\t\t\t\t\t\t\t\t\t\t";
                // line 360
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Select")), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</figure>
\t\t\t\t\t\t\t";
            } else {
                // line 364
                echo "\t\t\t\t\t\t\t\t<figure class=\"grid-gallery-caption\" data-grid-gallery-type=\"";
                echo twig_escape_filter($this->env, $context["type"], "html", null, true);
                echo "\">
\t\t\t\t\t\t\t\t\t<img data-src=\"holder.js/150x150?theme=industrial&text=";
                // line 365
                echo twig_escape_filter($this->env, $context["name"], "html", null, true);
                echo "\" class=\"dialog-image\">
\t\t\t\t\t\t\t\t\t<figcaption style=\"";
                // line 366
                echo twig_escape_filter($this->env, twig_trim_filter(($context["figcaptionStyle"] ?? null)), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t\t\t\t<div class=\"grid-gallery-figcaption-wrap\">
\t\t\t\t\t\t\t\t\t\t\t<span>";
                // line 368
                echo twig_escape_filter($this->env, $context["name"], "html", null, true);
                echo "</span>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</figcaption>
\t\t\t\t\t\t\t\t\t<div class=\"select-element\">
\t\t\t\t\t\t\t\t\t\t";
                // line 372
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Select")), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</figure>
\t\t\t\t\t\t\t";
            }
            // line 376
            echo "\t\t\t\t\t\t";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['type'], $context['name'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 377
        echo "\t\t\t\t\t\t<div class=\"grid-gallery-clearfix\" style=\"clear: both;\"></div>
\t\t\t\t\t";
    }

    // line 321
    public function block_captionEffectInPro($context, array $blocks = array())
    {
        // line 322
        echo "\t\t\t\t\t\t\t\t<figure class=\"grid-gallery-caption available-in-pro\" data-grid-gallery-type=\"";
        echo twig_escape_filter($this->env, ($context["type"] ?? null), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t\t\t<a target=\"_blank\" href=\"";
        // line 323
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('getProUrl')->getCallable(), array("?utm_source=plugin&utm_medium=caption-show-on-hover&utm_campaign=gallery")), "html", null, true);
        echo "\" class=\"caption-available-in-pro-link\">
\t\t\t\t\t\t\t\t\t\t<img data-src=\"holder.js/150x150?theme=industrial&text=";
        // line 324
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "\" class=\"dialog-image\">
\t\t\t\t\t\t\t\t\t\t<figcaption style=\"";
        // line 325
        echo twig_escape_filter($this->env, twig_trim_filter(($context["figcaptionStyle"] ?? null)), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"grid-gallery-figcaption-wrap\" style=\"width:100%;height:100%;top:0;\">
\t\t\t\t\t\t\t\t\t\t\t\t<div style=\"display:table;width:100%;height:100%;\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<span ";
        // line 328
        if (($this->getAttribute(($context["settings"] ?? null), "rtl", array()) == true)) {
            echo "dir=\"rtl\" class=\"ggRtlClass\"";
        }
        echo " style=\"display:table-cell;font-size:";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "text_size", array()), "html", null, true);
        echo twig_escape_filter($this->env, twig_replace_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "text_size_unit", array()), array(0 => "px", 1 => "%", 2 => "em")), "html", null, true);
        echo ";padding:10px;vertical-align:";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "position", array()), "html", null, true);
        echo ";\">Caption</span>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</figcaption>
\t\t\t\t\t\t\t\t\t\t<div class=\"get-in-pro-element\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 333
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Pro Feature")), "html", null, true);
        echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t</figure>
\t\t\t\t\t\t\t\t";
    }

    // line 380
    public function block_settingsCaptionsIconsDisabledView($context, array $blocks = array())
    {
        // line 381
        echo "\t\t\t\t\t\t<div class=\"captions-effect-with-icons\" data-confirm=\"";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("This effect requires icons be enabled. Enable Icons?")), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t<h3>Captions effects with icons</h3>
\t\t\t\t\t\t\t";
        // line 383
        $this->displayBlock('iconsEffects', $context, $blocks);
        // line 407
        echo "\t\t\t\t\t\t</div>
\t\t\t\t\t";
    }

    // line 383
    public function block_iconsEffects($context, array $blocks = array())
    {
        // line 384
        echo "\t\t\t\t\t\t\t\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["iconsWithCaptionsEffects"] ?? null));
        foreach ($context['_seq'] as $context["type"] => $context["name"]) {
            // line 385
            echo "\t\t\t\t\t\t\t\t\t<figure class=\"grid-gallery-caption\" data-type=\"icons\" data-grid-gallery-type=\"";
            echo twig_escape_filter($this->env, $context["type"], "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t\t<img data-src=\"holder.js/150x150?theme=industrial&text=";
            // line 386
            echo twig_escape_filter($this->env, $context["name"], "html", null, true);
            echo "\" class=\"dialog-image\"/>
\t\t\t\t\t\t\t\t\t\t<figcaption style=\"";
            // line 387
            echo twig_escape_filter($this->env, twig_trim_filter(($context["figcaptionStyle"] ?? null)), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"hi-icon-wrap\" style=\"width: 48px; height: 48px; margin-top: 30%; position:relative;\">
\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\" class=\"hi-icon icon-link\" style=\"border:1px solid #ccc; border-radius:50%;margin:auto;position:absolute;left:0;right:0;top: 0;bottom: 0;\">
\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</figcaption>
\t\t\t\t\t\t\t\t\t\t<div class=\"caption-with-";
            // line 393
            echo twig_escape_filter($this->env, $context["type"], "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t\t\t<div style=\"display: table; height:100%; width:100%;\">
\t\t\t\t\t\t\t\t\t\t\t\t<span style=\"padding: 10px;display:table-cell;font-size:";
            // line 395
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "text_size", array()), "html", null, true);
            echo "
\t\t\t\t\t\t\t\t\t\t\t\tvertical-align:";
            // line 396
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "position", array()), "html", null, true);
            echo ";\">
\t\t\t\t\t\t\t\t\t\t\t\t\tCaption
\t\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"select-element\">
\t\t\t\t\t\t\t\t\t\t\t";
            // line 402
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Select")), "html", null, true);
            echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</figure>
\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['type'], $context['name'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 406
        echo "\t\t\t\t\t\t\t";
    }

    // line 430
    public function block_settingsOtherPro($context, array $blocks = array())
    {
        // line 431
        echo "\t\t";
    }

    public function getTemplateName()
    {
        return "@galleries/view.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1138 => 431,  1135 => 430,  1131 => 406,  1121 => 402,  1112 => 396,  1108 => 395,  1103 => 393,  1094 => 387,  1090 => 386,  1085 => 385,  1080 => 384,  1077 => 383,  1072 => 407,  1070 => 383,  1064 => 381,  1061 => 380,  1052 => 333,  1037 => 328,  1031 => 325,  1027 => 324,  1023 => 323,  1018 => 322,  1015 => 321,  1010 => 377,  996 => 376,  989 => 372,  982 => 368,  977 => 366,  973 => 365,  968 => 364,  961 => 360,  952 => 354,  947 => 352,  942 => 350,  927 => 339,  924 => 338,  921 => 321,  919 => 320,  913 => 317,  907 => 314,  895 => 306,  892 => 305,  874 => 304,  871 => 303,  867 => 410,  864 => 409,  861 => 380,  858 => 379,  855 => 303,  852 => 302,  849 => 301,  844 => 500,  831 => 490,  823 => 485,  817 => 482,  811 => 479,  802 => 472,  798 => 470,  792 => 467,  789 => 466,  783 => 463,  780 => 462,  778 => 461,  775 => 460,  772 => 459,  760 => 455,  753 => 451,  747 => 448,  743 => 447,  739 => 445,  734 => 444,  732 => 443,  725 => 440,  723 => 439,  715 => 434,  711 => 432,  709 => 430,  703 => 427,  699 => 426,  693 => 423,  689 => 422,  683 => 419,  679 => 418,  673 => 415,  669 => 414,  664 => 411,  662 => 301,  659 => 300,  656 => 299,  653 => 298,  649 => 296,  647 => 295,  644 => 294,  638 => 292,  636 => 291,  631 => 290,  627 => 289,  622 => 288,  619 => 287,  613 => 285,  610 => 284,  608 => 283,  603 => 282,  600 => 281,  597 => 274,  595 => 238,  590 => 236,  577 => 226,  573 => 225,  568 => 223,  563 => 221,  560 => 220,  557 => 219,  554 => 218,  548 => 216,  546 => 215,  543 => 214,  537 => 212,  535 => 211,  532 => 210,  529 => 209,  526 => 208,  523 => 207,  517 => 204,  512 => 202,  508 => 200,  505 => 199,  499 => 197,  497 => 196,  494 => 195,  491 => 194,  488 => 193,  485 => 192,  470 => 182,  466 => 180,  460 => 178,  457 => 177,  455 => 176,  441 => 169,  432 => 167,  423 => 164,  415 => 163,  409 => 162,  403 => 161,  397 => 160,  391 => 159,  385 => 158,  379 => 157,  374 => 155,  370 => 154,  361 => 148,  349 => 139,  342 => 137,  337 => 134,  322 => 132,  318 => 131,  315 => 130,  313 => 119,  308 => 116,  302 => 115,  294 => 113,  291 => 112,  287 => 111,  283 => 109,  278 => 106,  272 => 104,  261 => 102,  257 => 101,  253 => 100,  247 => 96,  244 => 95,  233 => 93,  229 => 92,  225 => 91,  214 => 83,  211 => 82,  209 => 81,  205 => 79,  201 => 77,  190 => 75,  186 => 74,  183 => 73,  180 => 72,  175 => 70,  171 => 69,  166 => 68,  164 => 67,  160 => 66,  156 => 65,  152 => 64,  148 => 63,  144 => 62,  140 => 61,  135 => 59,  121 => 48,  115 => 45,  106 => 39,  100 => 36,  89 => 28,  83 => 25,  76 => 21,  70 => 18,  58 => 11,  51 => 9,  43 => 7,  41 => 6,  38 => 4,  35 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@galleries/view.twig", "/storage/ssd1/084/10485084/public_html/wp-content/plugins/gallery-by-supsystic/src/GridGallery/Galleries/views/view.twig");
    }
}
