<div class="preview-meta">
<?php 
	$dh_ptp_my_pricing_table = do_shortcode("[easy-pricing-table id={$post->ID}]"); 
	if ($dh_ptp_my_pricing_table == "Pricing table does not exist. Please check your shortcode.")
	{
		echo "Preview not available. Please save as a draft first.";
	}
	else echo $dh_ptp_my_pricing_table;
?>
</div>