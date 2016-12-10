
<?php
$hoverEffects = array(
	'Push Up'					=>	'imghvr-push-up',
	'Push Down'					=>	'imghvr-push-down',
	'Push Left'					=>	'imghvr-push-left',
	'Push Right'				=>	'imghvr-push-right',
	'Slide Up'					=>	'imghvr-slide-up',
	'Slide Down'				=>	'imghvr-slide-down',
	'Slide Left'				=>	'imghvr-slide-left',
	'Slide Right'				=>	'imghvr-slide-right',
	'Slide Top Left'			=>	'imghvr-slide-top-left',
	'Slide Top Right'			=>	'imghvr-slide-top-right',
	'Slide Bottom Left'			=>	'imghvr-slide-bottom-left',
	'Slide Bottom Right'		=>	'imghvr-slide-bottom-right',
	'Reveal Up'					=>	'imghvr-reveal-up',
	'Reveal Down'				=>	'imghvr-reveal-down',
	'Reveal Left'				=>	'imghvr-reveal-left',
	'Reveal Right'				=>	'imghvr-reveal-right',
	'Reveal Top Left'			=>	'imghvr-reveal-top-left',
	'Reveal Top Right'			=>	'imghvr-reveal-top-right',
	'Reveal Bottom Left'		=>	'imghvr-reveal-bottom-left',
	'Reveal Bottom Right'		=>	'imghvr-reveal-bottom-right',
	'Fade'						=>	'imghvr-fade',
	'Fade In Up'				=>	'imghvr-fade-in-up',
	'Fade In Down'				=>	'imghvr-fade-in-down',
	'Fade In Left'				=>	'imghvr-fade-in-left',
	'Fade In Right'				=>	'imghvr-fade-in-right',
	'Hinge Up'					=>	'imghvr-hinge-up',
	'Hinge Down'				=>	'imghvr-hinge-down',
	'Hinge Left'				=>	'imghvr-hinge-left',
	'Hinge Right'				=>	'imghvr-hinge-right',
	'Flip Horizantal'			=>	'imghvr-flip-horiz',
	'Flip Verticle'				=>	'imghvr-flip-vert',
	'Flip Diagonal 1'			=>	'imghvr-flip-diag-1',
	'Flip Diagonal 2'			=>	'imghvr-flip-diag-2',
	'Shutter Out Horizantal'	=>	'imghvr-shutter-out-horiz',
	'Shutter Out Verticle'		=>	'imghvr-shutter-out-vert',
	'Shutter Out Diagonal 1'	=>	'imghvr-shutter-out-diag-1',
	'Shutter Out Diagonal 2'	=>	'imghvr-shutter-out-diag-2',
	'Shutter in Horizantal'		=>	'imghvr-shutter-in-horiz',
	'Shutter in Verticle'		=>	'imghvr-shutter-in-vert',
	'Shutter In Out Horizantal'	=>	'imghvr-shutter-in-out-horiz',
	'Shutter In Out Verticle'	=>	'imghvr-shutter-in-out-vert',
	'Shutter In Out Diagonal 1'	=>	'imghvr-shutter-in-out-diag-1',
	'Shutter In Out Diagonal 2'	=>	'imghvr-shutter-in-out-diag-2', 
);
$captionEffects = array(
	''							=>	'',
	'Fade'						=>	'ih-fade',
	'Fade Up'					=>	'ih-fade-up',
	'Fade Down'					=>	'ih-fade-down',
	'Fade Left'					=>	'ih-fade-left',
);

$settings_params = array(

	array(
		"type" 			=> "textfield", 
		"heading" 		=> __("Caption Heading"),
		"param_name" 	=> "caption_heading",
		"description" 	=> __("Give heading for caption"),
		
	),
	array(
		"type" 			=> "dropdown",
		"heading" 		=> __("Heading Effect"),
		"param_name" 	=> "heading_effect",
		"description" 	=> __("Select the effect for heading"),
		
		"value" 		=> $captionEffects,
	),

	array(
		"type" 			=> "textarea_html",
		"heading" 		=> __("Caption Description"),
		"param_name" 	=> "content",
		"description" 	=> __("Caption description for Image.You can also use html."),
		
	),

	array(
		"type" 			=> "dropdown",
		"heading" 		=> __("Description Effect"),
		"param_name" 	=> "caption_effect",
		"description" 	=> __("Select the effect for caption"),
		
		"value" 		=> $captionEffects,
	),

	
	array(
		"type" 			=> "textfield",
		"heading" 		=> __("URL"),
		"param_name" 	=> "caption_url",
		"description" 	=> __("Leave blank to disable link"),
		
	),
	array(
		"type" 			=> "textfield",
		"heading" 		=> __("Link Target"),
		"param_name" 	=> "caption_url_target",
		"description" 	=> __("Write _blank for opening link in new window and _self for same window."),
		
	),

	// Hover Effects Settings
	
	array(
		"type" 			=> 	"attach_image",
		"heading" 		=> 	__("Image"),
		"param_name" 	=> 	"ihe_image",
		"description" 	=> 	__("Select the image"),
		
	),
	
	array(
		"type" 			=> "dropdown",
		"heading" 		=> __("Hover Effect"),
		"param_name" 	=> "hover_effect",
		"description" 	=> __("Select the hover effect"),
		
		"value" 		=> $hoverEffects,
	),


	/**
	 * Pro Features
	 */
	array(
		"type" 			=> "textfield",
		"heading" 		=> __("Heading Font Size <a href='http://webdevocean.com/product/hover-effect-pack-vc-extension/' target='_blank'>Get Pro</a>"),
		"param_name" 	=> "caption_heading_size",
		"description" 	=> __("Font size(px) For Caption Heading (Default 22)."),
		"group" 		=> 'Pro Features',
	),

	array(
		"type" 			=> "textfield",
		"heading" 		=> __("Description Font Size <a href='http://webdevocean.com/product/hover-effect-pack-vc-extension/' target='_blank'>Get Pro</a>"),
		"param_name" 	=> "caption_description_size",
		"description" 	=> __("Font size(px) For Caption Description (Default 12)."),
		"group" 		=> 'Pro Features',
	),
	array(
		"type" 			=> "colorpicker",
		"heading" 		=> __("Caption Heading Color <a href='http://webdevocean.com/product/hover-effect-pack-vc-extension/' target='_blank'>Get Pro</a>"),
		"param_name" 	=> "caption_heading_color",
		"description" 	=> __("Caption heading Color"),
		"group" 		=> 'Pro Features',
	),
	array(
		"type" 			=> "colorpicker",
		"heading" 		=> __("Caption Description Color <a href='http://webdevocean.com/product/hover-effect-pack-vc-extension/' target='_blank'>Get Pro</a>"),
		"param_name" 	=> "caption_desc_color",
		"description" 	=> __("Description Text Color"),
		"group" 		=> 'Pro Features',
	),
	array(
		"type" => "dropdown",
		"heading" => "Responsive Width & Height <a href='http://webdevocean.com/product/hover-effect-pack-vc-extension/' target='_blank'>Get Pro</a>",
		"param_name" => "responsive_width_height",
		"value" => array(
			"Yes" => "yes",
			"No" => "no",
		),
		"description" => "If set yes the images will get width of griding else you can set custom width and height",
		"group" 		=> 'Pro Features',
	),
	array(
		"type" 			=> "textfield",
		"heading" 		=> __("Thumbnail Width"),
		"param_name" 	=> "thumb_width",
		"description" 	=> __("Set thumbnail height for the image."),
		"group" 		=> 'Pro Features',
		"dependency" => array("element" => "responsive_width_height", "value" => array("no"))
	),

	array(
		"type" 			=> "textfield",
		"heading" 		=> __("Thumbnail Height"),
		"param_name" 	=> "thumb_height",
		"description" 	=> __("Set thumbnail height for the image."),
		"group" 		=> 'Pro Features',
		"dependency" => array("element" => "responsive_width_height", "value" => array("no"))
	),

	array(
		"type" => "dropdown",
		"heading" => "Caption Background Type <a href='http://webdevocean.com/product/hover-effect-pack-vc-extension/' target='_blank'>Get Pro</a>",
		"param_name" => "caption_bg_type",
		"value" => array(
			"Color" => "color",
			"Image" => "image",
		),
		"description" => "",
		"group" 		=> 'Pro Features',
	),

	
	array(
		"type" 			=> "colorpicker",
		"heading" 		=> __("Caption Background Color"),
		"param_name" 	=> "caption_bg_color",
		"description" 	=> __("Choose background color for the caption."),
		"group" 		=> 'Pro Features',
		"dependency" => array("element" => "caption_bg_type", "value" => array("color"))
	),

	array(
		"type" 			=> 	"attach_image",
		"heading" 		=> 	__("Caption Background Image"),
		"param_name" 	=> 	"caption_bg_image",
		"description" 	=> 	__("Select the image"),
		"group" 		=> 	'Pro Features',
		"dependency" => array("element" => "caption_bg_type", "value" => array("image"))
	),
);

?>