<?php

/*
Widget Name: Livemesh Odometers
Description: Display one or more animated odometer statistics in a multi-column grid.
Author: LiveMesh
Author URI: http://portfoliotheme.org
*/

class LVCA_Odometers {

    protected $_per_line;

    /**
     * Get things started
     */
    public function __construct() {

        add_action('wp_enqueue_scripts', array($this, 'load_scripts'));

        add_shortcode('lvca_odometers', array($this, 'shortcode_func'));

        add_shortcode('lvca_odometer_item', array($this, 'child_shortcode_func'));

        add_action('init', array($this, 'map_vc_element'));

        add_action('init', array($this, 'map_child_vc_element'));

    }

    function load_scripts() {

        wp_enqueue_script('lvca-waypoints', LVCA_PLUGIN_URL . 'assets/js/jquery.waypoints' . LVCA_BUNDLE_JS_SUFFIX . '.js', array('jquery'), LVCA_VERSION);

        wp_enqueue_script('lvca-stats', LVCA_PLUGIN_URL . 'assets/js/jquery.stats' . LVCA_BUNDLE_JS_SUFFIX . '.js', array('jquery'), LVCA_VERSION);

        wp_enqueue_script('lvca-odometers', plugin_dir_url(__FILE__) . 'js/odometer' . LVCA_BUNDLE_JS_SUFFIX . '.js', array('jquery'), LVCA_VERSION);

        wp_enqueue_style('lvca-odometers', plugin_dir_url(__FILE__) . 'css/style.css', array(), LVCA_VERSION);

    }

    public function shortcode_func($atts, $content = null, $tag) {

        $per_line = $style = '';

        extract(shortcode_atts(array(
            'per_line' => '4',

        ), $atts));

        $this->_per_line = $per_line;

        ob_start();

        ?>

        <div class="lvca-odometers lvca-container">

            <?php

            do_shortcode($content);

            ?>

        </div>

        <?php

        $output = ob_get_clean();

        return $output;
    }

    public function child_shortcode_func($atts, $content = null, $tag) {

        $stats_title = $start_value = $stop_value = $prefix = $suffix = $icon_image = $icon_type = $icon_family = '';
        extract(shortcode_atts(array(
            'icon_type' => 'icon',
            'icon_image' => '',
            'icon_family' => 'fontawesome',
            "icon_fontawesome" => '',
            "icon_openiconic" => '',
            "icon_typicons" => '',
            "icon_entypo" => '',
            "icon_linecons" => '',
            'stats_title' => '',
            'start_value' => '',
            'stop_value' => '',
            'suffix' => '',
            'prefix' => ''

        ), $atts));

        $column_style = lvca_get_column_class(intval($this->_per_line));

        $icon_type = esc_html($icon_type);

        if ($icon_type == 'icon' && !empty(${'icon_' . $icon_family}) && function_exists('vc_icon_element_fonts_enqueue'))
            vc_icon_element_fonts_enqueue($icon_family);

        $prefix = (!empty ($prefix)) ? '<span class="prefix">' . $prefix . '</span>' : '';
        $suffix = (!empty ($suffix)) ? '<span class="suffix">' . $suffix . '</span>' : '';

        ?>

        <div class="lvca-odometer <?php echo $column_style; ?>">

            <?php echo (!empty ($prefix)) ? '<span class="lvca-prefix">' . $prefix . '</span>' : ''; ?>

            <div class="lvca-number odometer" data-stop="<?php echo intval($stop_value); ?>">

                <?php echo intval($start_value); ?>

            </div>

            <?php echo (!empty ($suffix)) ? '<span class="lvca-suffix">' . $suffix . '</span>' : ''; ?>

            <?php $icon_type = esc_html($icon_type); ?>

            <?php $icon_html = ''; ?>

            <?php if ($icon_type == 'icon_image') : ?>

                <?php $icon_html = '<span class="lvca-image-wrapper">' . wp_get_attachment_image($icon_image, 'full', false, array('class' => 'lvca-image full')) . '</span>'; ?>

            <?php elseif (!empty(${'icon_' . $icon_family})): ?>

                <?php $icon_html = '<span class="lvca-icon-wrapper">' . lvca_get_icon(${'icon_' . $icon_family}) . '</span>'; ?>

            <?php endif; ?>

            <div class="lvca-stats-title-wrap">

                <div class="lvca-stats-title"><?php echo $icon_html . esc_html($stats_title); ?></div>

            </div>

        </div>

    <?php
    }

    function map_vc_element() {
        if (function_exists("vc_map")) {

            //Register "container" content element. It will hold all your inner (child) content elements
            vc_map(array(
                "name" => __("Livemesh Odometers", "livemesh-vc-addons"),
                "base" => "lvca_odometers",
                "as_parent" => array('only' => 'lvca_odometer_item'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
                "content_element" => true,
                "show_settings_on_create" => true,
                "category" => __("Livemesh VC Addons", "livemesh-vc-addons"),
                "is_container" => true,
                'description' => __('Display odometers in a multi-column grid.', 'livemesh-vc-addons'),
                "js_view" => 'VcColumnView',
                "icon" => 'icon-lvca-odometers',
                "params" => array(

                    array(
                        "type" => "lvca_number",
                        "param_name" => "per_line",
                        "value" => 4,
                        "min" => 1,
                        "max" => 5,
                        "suffix" => '',
                        "heading" => __("Columns per row", "livemesh-vc-addons"),
                        "description" => __("The number of columns to display per row of the odometers", "livemesh-vc-addons")
                    ),
                ),
            ));


        }
    }


    function map_child_vc_element() {
        if (function_exists("vc_map")) {
            vc_map(array(
                    "name" => __("Livemesh Odometer", "my-text-domain"),
                    "base" => "lvca_odometer_item",
                    "content_element" => true,
                    "as_child" => array('only' => 'lvca_odometers'), // Use only|except attributes to limit parent (separate multiple values with comma)
                    "icon" => 'icon-lvca-odometer',
                    "params" => array(
                        // add params same as with any other content element
                        array(
                            'type' => 'textfield',
                            'param_name' => 'stats_title',
                            "admin_label" => true,
                            'heading' => __('Title', 'livemesh-vc-addons'),
                            'description' => __('Title for the odometer stats.', 'livemesh-vc-addons'),
                        ),

                        array(
                            'type' => 'lvca_number',
                            'param_name' => 'start_value',
                            'heading' => __('Start Value', 'livemesh-vc-addons'),
                            'description' => __('The start value for the odometer stats.', 'livemesh-vc-addons'),
                        ),

                        array(
                            'type' => 'lvca_number',
                            'param_name' => 'stop_value',
                            'heading' => __('Stop Value', 'livemesh-vc-addons'),
                            'description' => __('The stop value for the odometer stats.', 'livemesh-vc-addons'),
                        ),

                        array(
                            'type' => 'textfield',
                            'param_name' => 'prefix',
                            'heading' => __('Prefix', 'livemesh-vc-addons'),
                            'description' => __('The prefix string for the odometer stats. Examples include currency symbols like $ to indicate a monetary value.', 'livemesh-vc-addons'),
                        ),

                        array(
                            'type' => 'textfield',
                            'param_name' => 'suffix',
                            'heading' => __('Suffix', 'livemesh-vc-addons'),
                            'description' => __('The suffix string for the odometer stats. Examples include strings like hr for hours or m for million.', 'livemesh-vc-addons'),
                        ),

                        array(
                            'type' => 'dropdown',
                            'param_name' => 'icon_type',
                            'heading' => __('Choose Icon Type', 'livemesh-vc-addons'),
                            'std' => 'icon',
                            'value' => array(
                                __('Icon', 'livemesh-vc-addons') => 'icon',
                                __('Icon Image', 'livemesh-vc-addons') => 'icon_image',
                            )
                        ),

                        array(
                            'type' => 'attach_image',
                            'param_name' => 'icon_image',
                            'heading' => __('Odometer Image.', 'livemesh-vc-addons'),
                            "dependency" => array('element' => "icon_type", 'value' => 'icon_image'),
                        ),

                        array(
                            'type' => 'dropdown',
                            'heading' => __('Icon library', 'livemesh-vc-addons'),
                            'value' => array(
                                __('Font Awesome', 'livemesh-vc-addons') => 'fontawesome',
                                __('Open Iconic', 'livemesh-vc-addons') => 'openiconic',
                                __('Typicons', 'livemesh-vc-addons') => 'typicons',
                                __('Entypo', 'livemesh-vc-addons') => 'entypo',
                                __('Linecons', 'livemesh-vc-addons') => 'linecons',
                            ),
                            'std' => 'fontawesome',
                            'param_name' => 'icon_family',
                            'description' => __('Select icon library.', 'livemesh-vc-addons'),
                            "dependency" => array('element' => "icon_type", 'value' => 'icon'),
                        ),
                        array(
                            'type' => 'iconpicker',
                            'heading' => __('Icon', 'livemesh-vc-addons'),
                            'param_name' => 'icon_fontawesome',
                            'value' => 'fa fa-info-circle',
                            'settings' => array(
                                'emptyIcon' => false,
                                // default true, display an "EMPTY" icon?
                                'iconsPerPage' => 4000,
                                // default 100, how many icons per/page to display
                            ),
                            'dependency' => array(
                                'element' => 'icon_family',
                                'value' => 'fontawesome',
                            ),
                            'description' => __('Select icon from library.', 'livemesh-vc-addons'),
                        ),
                        array(
                            'type' => 'iconpicker',
                            'heading' => __('Icon', 'livemesh-vc-addons'),
                            'param_name' => 'icon_openiconic',
                            'settings' => array(
                                'emptyIcon' => false,
                                // default true, display an "EMPTY" icon?
                                'type' => 'openiconic',
                                'iconsPerPage' => 4000,
                                // default 100, how many icons per/page to display
                            ),
                            'dependency' => array(
                                'element' => 'icon_family',
                                'value' => 'openiconic',
                            ),
                            'description' => __('Select icon from library.', 'livemesh-vc-addons'),
                        ),
                        array(
                            'type' => 'iconpicker',
                            'heading' => __('Icon', 'livemesh-vc-addons'),
                            'param_name' => 'icon_typicons',
                            'settings' => array(
                                'emptyIcon' => false,
                                // default true, display an "EMPTY" icon?
                                'type' => 'typicons',
                                'iconsPerPage' => 4000,
                                // default 100, how many icons per/page to display
                            ),
                            'dependency' => array(
                                'element' => 'icon_family',
                                'value' => 'typicons',
                            ),
                            'description' => __('Select icon from library.', 'livemesh-vc-addons'),
                        ),
                        array(
                            'type' => 'iconpicker',
                            'heading' => __('Icon', 'livemesh-vc-addons'),
                            'param_name' => 'icon_entypo',
                            'settings' => array(
                                'emptyIcon' => false,
                                // default true, display an "EMPTY" icon?
                                'type' => 'entypo',
                                'iconsPerPage' => 4000,
                                // default 100, how many icons per/page to display
                            ),
                            'dependency' => array(
                                'element' => 'icon_family',
                                'value' => 'entypo',
                            ),
                        ),
                        array(
                            'type' => 'iconpicker',
                            'heading' => __('Icon', 'livemesh-vc-addons'),
                            'param_name' => 'icon_linecons',
                            'settings' => array(
                                'emptyIcon' => false,
                                // default true, display an "EMPTY" icon?
                                'type' => 'linecons',
                                'iconsPerPage' => 4000,
                                // default 100, how many icons per/page to display
                            ),
                            'dependency' => array(
                                'element' => 'icon_family',
                                'value' => 'linecons',
                            ),
                            'description' => __('Select icon from library.', 'livemesh-vc-addons'),
                        ),
                    )
                )

            );

        }
    }

}

//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
if (class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_lvca_odometers extends WPBakeryShortCodesContainer {
    }
}
if (class_exists('WPBakeryShortCode')) {
    class WPBakeryShortCode_lvca_odometer_item extends WPBakeryShortCode {
    }
}