<?php
/*
	Plugin Name: Easy Pricing Tables
	Plugin URI: http://wordpress.org/extend/plugins/plugin-name/
	Description: Easily create highly converting pricing tables.
	Author: David Hehenberger
	Version: 1.0.1
	Author URI: http://shoppingcartlabs.com/
 */

// define a constant to always include the absolute path
define( 'PTP_PLUGIN_PATH', plugin_dir_path( __FILE__ ));

// include post types
include ( PTP_PLUGIN_PATH . 'includes/post-types.php');

//include shortcodes
include ( PTP_PLUGIN_PATH . 'includes/shortcodes.php');

/**
 * include WPAlchemy setup script and spec
 */
include_once ( PTP_PLUGIN_PATH . 'includes/libraries/metaboxes/setup.php');
include_once ( PTP_PLUGIN_PATH . 'includes/libraries/metaboxes/spec.php');


