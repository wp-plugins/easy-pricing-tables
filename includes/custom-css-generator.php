<?php


/* Do something with the data entered */
add_action( 'save_post', 'dh_ptp_pricing_table_saved_handler', 0 );

/**
 * 1. check if this is the right post type and if user has the right to save
 * 2. if any css options changed, call dh_ptp_generate_css_string() and dh_ptp_generate_options_css_file()
 * @param  [type] $post_id [description]
 * @return [type]          [description]
 */
function dh_ptp_pricing_table_saved_handler($post_id){
	// Is this the right post type?
    $post_type = isset($_POST['post_type']) ? $_POST['post_type'] : '';
	if ( 'easy-pricing-table' == $post_type ) 
	{
		if ( !current_user_can( 'edit_page', $post_id ) )
		    return;
	}
	else
	{
	    return;
	}    

	// verify if this is an auto save routine. 
	// If it is our form has not been submitted, so we dont want to do anything
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
	  return;
	// OK, we're authenticated.

	// compare $_REQUEST data with data from database
	//get the meta info for this post type
	global $features_metabox;
	global $meta;
	$meta = get_post_meta($post_id, $features_metabox->get_the_id(), TRUE);


	/**
	 * Rounded Corners
	 */
	if(!empty($meta['rounded-corners']))
		$rounded_corners_old_value = $meta['rounded-corners'];
	else
		$rounded_corners_old_value = null;

	$rounded_corners_new_value = $_REQUEST['1_dh_ptp_settings']['rounded-corners'];

	/**
	 * Button Color
	 */
	if(!empty($meta['button-color']))
		$button_color_old_value = $meta['button-color'];
	else
		$button_color_old_value = null;

	$button_color_new_value = $_REQUEST['1_dh_ptp_settings']['button-color'];

	/**
	 * Button Border Color
	 */
	if(!empty($meta['button-border-color']))
		$button_border_color_old_value = $meta['button-border-color'];
	else
		$button_border_color_old_value = null;

	$button_border_color_new_value = $_REQUEST['1_dh_ptp_settings']['button-border-color'];

	/**
	 * Button Hover Color
	 */
	if(!empty($meta['button-hover-color']))
		$button_hover_color_old_value = $meta['button-hover-color'];
	else
		$button_hover_color_old_value = null;

	$button_hover_color_new_value = $_REQUEST['1_dh_ptp_settings']['button-hover-color'];

	/**
	 * Button Font Color
	 */
	if(!empty($meta['button-font-color']))
		$button_font_color_old_value = $meta['button-font-color'];
	else
		$button_font_color_old_value = null;

	$button_font_color_new_value = $_REQUEST['1_dh_ptp_settings']['button-font-color'];

	/**
	 * Featured Button Color
	 */
	if(!empty($meta['featured-button-color']))
		$featured_button_color_old_value = $meta['featured-button-color'];
	else
		$featured_button_color_old_value = null;

	$featured_button_color_new_value = $_REQUEST['1_dh_ptp_settings']['featured-button-color'];

	/**
	 * Featured Button Border Color
	 */
	if(!empty($meta['featured-button-border-color']))
		$featured_button_border_color_old_value = $meta['featured-button-border-color'];
	else
		$featured_button_border_color_old_value = null;

	$featured_button_border_color_new_value = $_REQUEST['1_dh_ptp_settings']['featured-button-border-color'];

	/**
	 * Featured Button Hover Color
	 */
	if(!empty($meta['featured-button-hover-color']))
		$featured_button_hover_color_old_value = $meta['featured-button-hover-color'];
	else
		$featured_button_hover_color_old_value = null;

	$featured_button_hover_color_new_value = $_REQUEST['1_dh_ptp_settings']['featured-button-hover-color'];

	/**
	 * Featured Button Font Color
	 */
	if(!empty($meta['featured-button-font-color']))
		$featured_button_font_color_old_value = $meta['featured-button-font-color'];
	else
		$featured_button_font_color_old_value = null;

	$featured_button_font_color_new_value = $_REQUEST['1_dh_ptp_settings']['featured-button-font-color'];

	/**
	 * Shall we write a new CSS file?
	 * Yes, if there were any changes.
	 */
	if ($rounded_corners_old_value != $rounded_corners_new_value || $button_color_old_value != $button_color_new_value || $button_border_color_old_value != $button_border_color_new_value 
		|| $button_hover_color_old_value != $button_hover_color_new_value || $button_font_color_old_value != $button_font_color_new_value || $featured_button_color_old_value != $featured_button_color_new_value ||
		$featured_button_border_color_old_value != $featured_button_border_color_new_value || $featured_button_hover_color_old_value != $featured_button_hover_color_new_value 
		|| $featured_button_font_color_old_value != $featured_button_font_color_new_value)
	{
		$css_string = dh_ptp_generate_css_string($rounded_corners_new_value, $button_color_new_value, $button_border_color_new_value, $button_hover_color_new_value, $button_font_color_new_value,
			$featured_button_color_new_value, $featured_button_border_color_new_value, $featured_button_hover_color_new_value, $featured_button_font_color_new_value);
		
		dh_ptp_generate_options_css_file($css_string);
	}

}

function dh_ptp_generate_css_string($rounded_corners_new_value, $button_color_new_value, $button_border_color_new_value, $button_hover_color_new_value, $button_font_color_new_value,
	$featured_button_color_new_value, $featured_button_border_color_new_value, $featured_button_hover_color_new_value, $featured_button_font_color_new_value)
{
	$css_string = 
"/*whatup*/
.ptp-most-popular{
  border-radius: " . $rounded_corners_new_value . "
}
.ptp-item-container{
  border-radius: " . $rounded_corners_new_value . "
}
.ptp-button{
  border-radius: " . $rounded_corners_new_value . "
}
.ptp-button{
  color: " . $button_font_color_new_value . "important;
  background-color: " . $button_color_new_value . ";
  border-bottom: " . $button_border_color_new_value . " 4px solid!important;
}
.ptp-button:hover {
  background: " . $button_hover_color_new_value . "; 
}
.ptp-highlight .ptp-button{
  color: " . $featured_button_font_color_new_value . "!important;
  background-color: " . $featured_button_color_new_value . ";
  border-bottom: " . $featured_button_border_color_new_value . " 4px solid!important;
}
.ptp-highlight .ptp-button:hover{
  background: " . $featured_button_hover_color_new_value . ";
}";

	return $css_string;

}

function dh_ptp_generate_options_css_file($css_string){
	//problem: what happens when the plugin gets updated??
	
	//open the css file
	

	//delete everything behind comment
	

	//append $css_string
	

	//save file
	//
	//
	

	/** Define some vars **/
	$uploads = wp_upload_dir();
	$css_file = plugins_url( 'assets/css/ptp-table-styles.css', dirname(__FILE__));

	/** Save on different directory if on multisite **/
	if(is_multisite()) {
		$dh_ptp_uploads_dir = trailingslashit($uploads['basedir']);
	} else {
		$dh_ptp_uploads_dir = trailingslashit($uploads['basedir']);
		//$dh_ptp_uploads_dir = $css_dir;
	}
	
	/** Capture CSS output **/
	ob_start();
	require($css_file);
	$css = ob_get_clean();

	$css .= $css_string;
	
	/** Write to options.css file **/
	WP_Filesystem();
	global $wp_filesystem;
	if ( ! $wp_filesystem->put_contents( $dh_ptp_uploads_dir . 'options.css', $css, 0644) ) {
	    return true;
	}
}