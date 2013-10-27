<?php

include_once ( PTP_PLUGIN_PATH . 'includes/libraries/metaboxes/wpalchemy/MetaBox.php');

// global styles for the meta boxes
if (is_admin()){
	add_action('admin_enqueue_scripts', 'dh_ptp_metabox_styles_and_scripts');
}

function dh_ptp_metabox_styles_and_scripts() {
	//add meta box styles
	wp_enqueue_style('wpalchemy-metabox', plugins_url() . '/easy-pricing-tables/assets/metaboxes/meta.css' );

	// fontello icons
	wp_enqueue_style('fontello-icon', plugins_url() . '/easy-pricing-tables/assets/fontello/fontello.css' );

	//JS for featured button
	wp_enqueue_script( 'featured-button-script', plugins_url() . '/easy-pricing-tables/assets/ui/featuredButtonClickHandler.js', array( 'jquery' ) );

	// Color Picker
	wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'color-picker-script', plugins_url() . '/easy-pricing-tables/assets/ui/mycolorpicker.js', array( 'wp-color-picker' ), false, true );

    // Jquery UI Tabs
	//wp_enqueue_style( 'jquery-ui' );
 	wp_enqueue_script("jquery-ui-tabs");
 	wp_enqueue_script( 'tabs-script', plugins_url() . '/easy-pricing-tables/assets/ui/mytabs.js', array('jquery', 'jquery-ui-tabs') );


	/** Bootstrap **/
	//add bootstrap css for popover help boxes
	wp_enqueue_style('bootstrap-popover', plugins_url() . '/easy-pricing-tables/assets/bootstrap/css/bootstrap.css' );
	//add bootstrap js for popovers
	wp_enqueue_script( 'bootstrap-popover', plugins_url() . '/easy-pricing-tables/assets/bootstrap/js/bootstrap.min.js' );
	//activate popovers
	wp_enqueue_script( 'bootstrap-popover-activation', plugins_url() . '/easy-pricing-tables/assets/bootstrap/js/popover-activation.js' );
}

/* eof */