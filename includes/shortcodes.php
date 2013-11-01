<?php

// get the metabox info that relates to this shortcode
global $features_metabox;
$meta = '';


/**
 * execute on shortcode appearance
 * read more: http://pippinsplugins.com/listing-custom-post-type-entries-with-a-short-code/
 * @param  [type] $atts
 * @return [type]
 */
function dh_ptp_message_shortcode( $atts) {

	//load shortcode css
	wp_enqueue_style( 'ptp-styles', plugins_url( 'assets/pricing-tables/styles.css', dirname(__FILE__) ) );


	//add pricing table css to head
	//add_filter('wp_head', 'dh_ptp_css_to_head');


	// extract id shortcode
    extract(shortcode_atts( array('id' => ''), $atts));  

    if ($id != '' )
    {

    	//get the meta info for this post type
    	global $features_metabox;
		global $meta;
		$meta = get_post_meta($id, $features_metabox->get_the_id(), TRUE);


    	//return our pricing table html
		return dh_ptp_generate_pricing_table_html($id);
    }
    else
    {
    	return 'Pricing table does not exist. Please check your shortcode.';
    }
	
}

add_shortcode( 'easy-pricing-table', 'dh_ptp_message_shortcode' );

/**
 * Generate our pricing table HTML
 * @param  [type] $dh_ptp_pricing_table_id [description]
 * @return [type]                          [description]
 */
function dh_ptp_generate_pricing_table_html ($dh_ptp_pricing_table_id) {
	global $meta;

	// if meta contains values (this means the pricing table at our current id exists)
	if ($meta != "")
	{
		/**
		 * the string to be returned that includes the pricing table html
		 * @var string
		 */
		$pricing_table_html = '<div class="ptp-pricing-table" >';

		// set number of columns
		$number_of_columns;
		switch (count($meta['column'])) {
		 	case 1:
	 			$number_of_columns = "one-col";
	 			break;
			case 2:
	 			$number_of_columns = "two-col";
				break;
	 		case 3:
	 			$number_of_columns = "three-col";
	 			break;
 			case 4:
	 			$number_of_columns = "four-col";
	 			break;
 			case 5:
	 			$number_of_columns = "five-col";
	 			break;
 			case 6:
	 			$number_of_columns = "six-col";
	 			break;
			default:
	 			$number_of_columns = "more-col";
	 			break;
	 	}
		
		// set max number of features
		$dh_ptp_max_number_of_features = 0;

		$planfeatures;

		// get plan features
		foreach ($meta['column'] as $column) 
		{
			if(isset($column['planfeatures']))
			{
				$planfeatures = $column['planfeatures'];
				// get number of features
				$col_number_of_features = count( explode( "\n", $column['planfeatures'] ) );

				if ($col_number_of_features > $dh_ptp_max_number_of_features)
					$dh_ptp_max_number_of_features = $col_number_of_features;
			}
		}

		/* get all variables from custom settings */
		/** Settings **/
		// get rounded corner width
		if(isset($meta['rounded-corners']))
			$rounded_corner_with = $meta['rounded-corners'];
		else
			 $rounded_corner_with = '0px';	

		// get featured button font color
		if(isset($meta['featured-button-font-color']))
			$featured_button_font_color = $meta['featured-button-font-color'];
		else
			$featured_button_font_color = '#ffffff';

		// get featured button color
		if(isset($meta['featured-button-color']))
			$featured_button_color = $meta['featured-button-color'];
		else
			 $featured_button_color = '#3498db';

		// get featured button  border color
		if(isset($meta['featured-button-border-color']))
			$featured_button_border_color = $meta['featured-button-border-color'];
		else
			 $featured_button_border_color = '#2980b9';

		// get featured button hover color
		if(isset($meta['featured-button-hover-color']))
			$featured_button_hover_color = $meta['featured-button-hover-color'];
		else
			 $featured_button_hover_color = '#2980b9';

		// non-featured buttons
		// get  button font color
		if(!empty($meta['button-font-color']))
			$button_font_color = $meta['button-font-color'];
		else
			$button_font_color = '#ffffff';

		// get button color
		if(!empty($meta['button-color']))
			$button_color = $meta['button-color'];
		else
			 $button_color = '#e74c3c';

		// get button border color
		if(isset($meta['button-border-color']))
			$button_border_color = $meta['button-border-color'];
		else
			 $button_border_color = '#c0392b';

		// get button hover color
		if(isset($meta['button-hover-color']))
			$button_hover_color = $meta['button-hover-color'];
		else
			 $button_hover_color = '#c0392b';


		foreach ($meta['column'] as $column) 
		{
			// beneath ifs are to prevent 'undefined variable notice'. It wasn't possible to put this code into a function since the passing argument might be undefined.
			// get plan name
			if(isset($column['planname']))
				$planname = $column['planname'];
			else
				 $planname = '';	

			// get plan price
			if(isset($column['planprice']))
				$planprice = $column['planprice'];
			else
				 $planprice = '';	

			if(isset($column['planfeatures']))
			{
				$planfeatures = $column['planfeatures'];
			}
			else
				 $planfeatures = '';				

			// get plan price
			if(isset($column['buttonurl']))
				$buttonurl = $column['buttonurl'];
			else
				 $buttonurl = '';	

			// get plan price
			if(isset($column['buttontext']))
				$buttontext = $column['buttontext'];
			else
				 $buttontext = '';	

			// is plan featured
			if(isset($column['feature']))
				if ($column['feature'] == "featured")
				{
					$feature = "ptp-highlight";
					$feature_label = '<div class="ptp-most-popular" style="border-radius: ' . $meta['rounded-corners'] . ';">Most Popular</div>';
					
					//$button_style = 'color:' . $meta['featured-button-font-color'] . '!important;background-color:' . $meta['featured-button-color']. ';border-bottom: ' . $meta['featured-button-border-color'] . ' 4px solid!important;';
					//$button_hover_js = 'onMouseOver = "this.style.backgroundColor=\'' . $meta['featured-button-hover-color'] . '\'" onMouseOut = "this.style.backgroundColor=\'' . $meta['featured-button-color'] . '\'" ';
					// isset doesnt seem to work!!!
					$button_style = 'color:' . $featured_button_font_color . '!important;background-color:' . $featured_button_color . ';border-bottom: ' . $featured_button_border_color . ' 4px solid!important;';
					$button_hover_js = 'onMouseOver = "this.style.backgroundColor=\'' . $featured_button_hover_color . '\'" onMouseOut = "this.style.backgroundColor=\'' . $featured_button_color . '\'" ';
				
				}
				else
				{
					$feature = '';	
			 		$feature_label = '<div class="ptp-not-most-popular">&nbsp;</div>';

			 		$button_style = 'color:' . $button_font_color . '!important;background-color:' . $button_color . ';border-bottom: ' . $button_border_color . ' 4px solid!important;';
					$button_hover_js = 'onMouseOver = "this.style.backgroundColor=\'' . $button_hover_color . '\'" onMouseOut = "this.style.backgroundColor=\'' . $button_color . '\'" ';
			

					//$button_style = 'color:' . $meta['button-font-color'] . '!important;background-color:' . $meta['button-color']. ';border-bottom: ' . $meta['button-border-color'] . ' 4px solid!important;';
					//$button_hover_js = 'onMouseOver = "this.style.backgroundColor=\'' . $meta['button-hover-color'] . '\'" onMouseOut = "this.style.backgroundColor=\'' . $meta['button-color'] . '\'" ';
			 	}
			else
			{
				 $feature = '';	
				 $feature_label = '<div class="ptp-not-most-popular">&nbsp;</div>';


				$button_style = 'color:' . $button_font_color . '!important;background-color:' . $button_color . ';border-bottom: ' . $button_border_color . ' 4px solid!important;';
				$button_hover_js = 'onMouseOver = "this.style.backgroundColor=\'' . $button_hover_color . '\'" onMouseOut = "this.style.backgroundColor=\'' . $button_color . '\'" ';
			

				//$button_style = 'color:' . $meta['button-font-color'] . '!important;background-color:' . $meta['button-color']. ';border-bottom: ' . $meta['button-border-color'] . ' 4px solid!important;';
				//$button_hover_js = 'onMouseOver = "this.style.backgroundColor=\'' . $meta['button-hover-color'] . '\'" onMouseOut = "this.style.backgroundColor=\'' . $meta['button-color'] . '\'" ';
			}

			// create the html code
			$pricing_table_html .= '
			<div class="ptp-col ' . $number_of_columns . ' '. $feature . '">'
				. $feature_label .
				'<ul class="ptp-item-container " style="border-radius: ' . $meta['rounded-corners'] . ';">
					<li class="ptp-plan " style="border-top-right-radius: ' . $meta['rounded-corners'] . '; border-top-left-radius: ' . $meta['rounded-corners'] . ';">' . $planname . '</li>
			  		<li class="ptp-price ">' . $planprice . '</li>' 				  
			  		. dh_ptp_features_to_html($planfeatures,$dh_ptp_max_number_of_features) . '
		  			<li class="ptp-cta" style="border-bottom-right-radius: ' . $meta['rounded-corners'] . '; border-bottom-left-radius: ' . $meta['rounded-corners'] . ';">
		  				<a class="ptp-button " href="' . $buttonurl . '" ' . $button_hover_js . 'style="border-radius: ' . $meta['rounded-corners'] . ';' . $button_style .'">' . $buttontext . '</a>
		  			</li>
				</ul>
			</div>
			';
		}

		$pricing_table_html .= '</div>';

		return $pricing_table_html;

	}
	else
		return 'Pricing table does not exist. Please check your shortcode.';
}

/**
 * Generate HTML code for our features
 * @param  [type] $dh_ptp_plan_features [description]
 * @return [type]                       [description]
 */
function dh_ptp_features_to_html ($dh_ptp_plan_features, $dh_ptp_max_number_of_features){

	// the string to be returned
	$dh_ptp_feature_html = "";

	// explode string into a useable array
	$dh_ptp_features = explode("\n", $dh_ptp_plan_features);

	//how many features does this column have?
	$this_columns_number_of_features = count($dh_ptp_features);

	//add each feature to $dh_ptp_feature_html 
	for ($iterator=0; $iterator<$dh_ptp_max_number_of_features; $iterator++)
	{
		if ($iterator < $this_columns_number_of_features)
		{
			if ($dh_ptp_features[$iterator] == "") {
				$dh_ptp_feature_html .= '<li class="ptp-bullet-item ">&nbsp;</li>';
			}
			else
				$dh_ptp_feature_html .= '<li class="ptp-bullet-item ">' . $dh_ptp_features[$iterator] . '</li>';
		}
		else
			$dh_ptp_feature_html .= '<li class="ptp-bullet-item ">&nbsp;</li>';
	}

	// return the features html
	return $dh_ptp_feature_html;
}

// Add css to the header!
function dh_ptp_css_to_head() {
	//global $meta;

	// 				background-color: ' . $meta['button-color'] .';

	echo '<style type="text/css">
			.ptp-button{
				background-color: blue;
			  	border-bottom: #2980b9 4px solid!important;
			}

			.ptp-button:hover {
			  background: #0D2839; 
			}

			.ptp-highlight .ptp-button {
			  background-color: red;
			  border-color: #3B2D3D!important;
			  color: #333333!important;
			}
		 </style>';
}

