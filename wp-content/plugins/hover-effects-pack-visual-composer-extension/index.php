<?php 

	/*
	Plugin Name: Hover Effects Pack Visual Composer Extension
	Description: Add 200+ hover effects to images in visual composer with captions.
	Plugin URI: http://webdevocean.com
	Author: Labib Ahmed
	Author URI: http://webdevocean.com
	Version: 1.0
	License: GPL2
	Text Domain: vc-hover-pack
	*/
	
	/*
	
	    Copyright (C) 2016  Labib Ahmed  labib@najeebmediagroup.com
	*/
	include 'plugin.class.php';
	if (class_exists('VC_Hover_Effects_Pack')) {
	    $obj_init = new VC_Hover_Effects_Pack;
	}
 ?>