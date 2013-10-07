<?php

include_once ( PTP_PLUGIN_PATH . 'includes/libraries/metaboxes/wpalchemy/MetaBox.php');

// global styles for the meta boxes
if (is_admin()){
	add_action('admin_enqueue_scripts', 'dh_ptp_metabox_styles');
	add_action('admin_enqueue_scripts', 'dh_ptp_metabox_js');
}

function dh_ptp_metabox_styles() {
	//add meta box styles
	wp_enqueue_style('wpalchemy-metabox', plugins_url() . '/easy-pricing-tables/assets/metaboxes/meta.css' );

	//add fontello icon
	wp_enqueue_style('fontello-icon', plugins_url() . '/easy-pricing-tables/assets/fontello/fontello.css' );

	//add bootstrap css for popover help boxes
	wp_enqueue_style('bootstrap-popover', plugins_url() . '/easy-pricing-tables/assets/bootstrap/css/bootstrap.css' );
}

function dh_ptp_metabox_js() {
	//add bootstrap js for popovers
	wp_enqueue_script( 'bootstrap-popover', plugins_url() . '/easy-pricing-tables/assets/bootstrap/js/bootstrap.min.js' );

	//activate popovers
	wp_enqueue_script( 'bootstrap-popover-activation', plugins_url() . '/easy-pricing-tables/assets/bootstrap/js/popover-activation.js' );

	//activate ui js
	wp_enqueue_script( 'ui-js', plugins_url() . '/easy-pricing-tables/assets/ui/ui.js', array( 'jquery' ) );

	//drag and drop
	//wp_enqueue_script( 'jquery_ui_sortable');
	//wp_enqueue_script( 'dh-ptp-update-order', plugins_url() . '/pricing-table-plugin/assets/draganddrop/update-order.js' );
}



/* eof */