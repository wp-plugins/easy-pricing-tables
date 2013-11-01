<?php
/*
	Plugin Name: Easy Pricing Tables
	Plugin URI: http://wordpress.org/plugins/easy-pricing-tables/
	Description: Create a Beautiful, Responsive and Highly Converting Pricing Table in Less Than 5 Minutes with Easy Pricing Tables for WordPress. No Coding Required.
	Author: David Hehenberger
	Version: 1.2
	Author URI: http://shoppingcartlabs.com/
 */

// define a constant to always include the absolute path
define( 'PTP_PLUGIN_PATH', plugin_dir_path( __FILE__ ));

// include post types
include ( PTP_PLUGIN_PATH . 'includes/post-types.php');

//include shortcodes
include ( PTP_PLUGIN_PATH . 'includes/shortcodes.php');

//inclue analytics
include ( PTP_PLUGIN_PATH . 'includes/analytics.php');


if(is_admin())
{
	
}

/**
 * include WPAlchemy setup script and spec
 */
include_once ( PTP_PLUGIN_PATH . 'includes/metaboxes/setup.php');
include_once ( PTP_PLUGIN_PATH . 'includes/metaboxes/spec.php');


// Add settings link on plugin page
function dh_ptp_plugin_settings_link($links) { 
  $settings_link = '<a href="post-new.php?post_type=easy-pricing-table">Add New Pricing Table</a>'; 
  array_unshift($links, $settings_link); 
  return $links; 
}
 
$plugin = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$plugin", 'dh_ptp_plugin_settings_link' );

