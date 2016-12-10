<?php 
/**
* Plugin Main Class
*/

class VC_Hover_Effects_Pack  
{
	
	function __construct()
	{
		add_action('vc_before_init', array($this, 'wdo_option_settings'));
		add_shortcode( 'hover-effects-pack-vc', array( $this, 'render_hover_pack_shortcode' ) );
		add_action( 'wp_enqueue_scripts', array($this, 'loading_hover_scripts') );
		add_action( 'init', array( $this, 'check_if_vc_is_install' ) );
		
	}

	function wdo_option_settings(){
		include 'includes/setting-options.php'; 


		$ihe_main_var = array(
			"name" => __("Hover Effects Pack"),
			"base" => "hover-effects-pack-vc",
			"category" => __('Content'),
			"description" => __('Insert Images with Hover Effects with captions'),
			"params" => $settings_params
		);

		vc_map($ihe_main_var);
	}

	function render_hover_pack_shortcode($attrs, $content = null){ 
		extract(shortcode_atts( array(
		    'caption_heading'				=> "",
		    'heading_effect'				=> "",
		    'caption_effect'				=> "",
		    "caption_heading_size"			=> "22",
		    "caption_description_size"		=> "12",
		    "caption_heading_color"			=> "#fff",
		    "caption_desc_color"			=> "#23282d",
		    "caption_url"					=> '',
		    "caption_url_target"			=> '',
		    "ihe_image"						=> '',
		    "responsive_width_height"		=> '',
		    "thumb_width"					=> "220",
		    "thumb_height"					=> "220",
		    "hover_effect"					=> 'imghvr-push-up',
		    "caption_bg_type"				=> 'color',
		    "caption_bg_color"				=> "#333",
		    "caption_bg_image"				=> '',
		), $attrs));
		// var_dump($caption_heading_bg);
		$content = wpb_js_remove_wpautop($content, true);
		if ($ihe_image != '') {
			$image_url = wp_get_attachment_url( $ihe_image );		
		}

		if ($caption_bg_image != '') {
			$bg_image_url = wp_get_attachment_url( $caption_bg_image );		
		}
		ob_start();
		include 'includes/render_hover_effects.php'; 
		return ob_get_clean();
	}

	function loading_hover_scripts(){
		wp_enqueue_style( 'image-hover-css', plugins_url( 'css/hover-advance.css' , __FILE__ ));
	}

	function check_if_vc_is_install(){
		if ( ! defined( 'WPB_VC_VERSION' ) ) {
            // Display notice that Visual Compser is required
            add_action('admin_notices', array( $this, 'showVcVersionNotice' ));
            return;
        }
	}

	function showVcVersionNotice() {
        $plugin_name = 'Image Hover Effects Visual Composer Extension';
        echo '
        <div class="updated">
          <p>'.sprintf(__('<strong>%s</strong> requires <strong><a href="http://codecanyon.net/item/visual-composer-page-builder-for-wordpress/242431?ref=labibahmed" target="_blank">Visual Composer</a></strong> plugin to be installed and activated on your site.', 'ich-vc'), $plugin_name).'</p>
        </div>';
    }
}
 ?>