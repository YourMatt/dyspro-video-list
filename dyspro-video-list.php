<?php
/*
Plugin Name: Dyspro Video List
Plugin URI:
Description: Creates a new video content type with simple retrieval through shortcodes.
Version: 0.9
Author: Dyspro Media
Author URI: http://dyspromedia.com
*/

// load configuration variables
require_once(dirname(__FILE__) . '/config.php');

// initialize objects
$dvl_plugin_manager = new dvl_plugin_manager ();
$dvl_shortcode_manager = new dvl_shortcode_manager ();
$dvl_options_manager = new dvl_options_manager ();

// add installation script
register_activation_hook (__FILE__, array ($dvl_plugin_manager, 'activate'));

// set up actions
add_action ('init', array ($dvl_plugin_manager, 'register_video_post_type'));
add_action ('add_meta_boxes', array ($dvl_options_manager, 'add_meta_boxes'));
add_action ('widgets_init', function () { register_widget ('dvl_widget'); });

// set up shortcodes
add_shortcode ('dvl_video_list', array ($dvl_shortcode_manager, 'build_video_list'));
