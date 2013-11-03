<div id="dh_ptp_tabs_container" class="my_meta_control">
		<ul id="dh_ptp_metabox_tabs">
		    <li class="dh_ptp_tab_header"><a href="#dh_ptp_tabs_1">1. Create Content</a></li>
		    <li class="dh_ptp_tab_header"><a href="#dh_ptp_tabs_2">2. Design Table</a></li>
		    <li class="dh_ptp_tab_header"><a href="#dh_ptp_tabs_3">3. Publish Table</a></li>
	    </ul>
	    <!-- clear our floats -->
       	<div class="clear"></div>


	    <div id="dh_ptp_tabs_1" class="dh_ptp_tab">
			<h4>Pricing Table Columns</h4>
	       		<a href="#" style="float:right;" id="ptp-new-column" class="docopy-column button button-large">New Column</a>
	       		<div style="clear: both; margin-bottom:10px;"></div>

	       		<div id="all-columns-wrap">
			        <div class="column zero">
			        	<div class="ptp-title explaination-title">
				        	<strong>Plan Name</strong><i class="ptp-icon-help-circled" data-trigger="hover" data-html="true" data-placement="right" data-original-title="&lt;strong&gt;Plan Name&lt;/strong&gt;" data-content="
				            Enter your pricing plan - names here.
				            &lt;br/&gt;&lt;br/&gt; 
				            &lt;strong&gt;Best practice:&lt;/strong&gt;
				            &lt;br/&gt;
				            Avoid generic names such as &lt;em&gt;Bronze&lt;/em&gt;, &lt;em&gt;Silver&lt;/em&gt; and &lt;em&gt;Gold&lt;/em&gt;.&lt;br/&gt;
				            Instead, choose aspirational names like &lt;em&gt;Personal&lt;/em&gt;, &lt;em&gt;Small Business&lt;/em&gt; and &lt;em&gt;Enterprise&lt;/em&gt;.&lt;br/&gt;&lt;br/&gt;
				            Many people choose plans based on names, not features: A corporate buyer might choose &lt;em&gt;Enterprise&lt;/em&gt; even though &lt;em&gt;Personal&lt;/em&gt; might be sufficient for his use-case.
				            "></i>
				        </div>
				        <ul class="ptp-settings explaination-settings">
					        <li class="explaination-desc">
					            <strong>Pricing</strong><i class="ptp-icon-help-circled" data-trigger="hover" data-html="true" data-placement="right" data-original-title="&lt;strong&gt;Pricing&lt;/strong&gt;" data-content="
					            Enter your pricing options here.
					            "></i>
				            </li>
				            <li class="features explaination-desc">
				            	<strong>Plan Features</strong><i class="ptp-icon-help-circled" data-trigger="hover" data-html="true" data-placement="right" data-original-title="&lt;strong&gt;Features&lt;/strong&gt;" data-content="
					            Enter your features here (one per line).
					            &lt;br/&gt;&lt;br/&gt; 
					            &lt;strong&gt;Best practice:&lt;/strong&gt;
					            &lt;br/&gt;
					            Don't overwhelm users with too much content. Long pricing tables are confusing and difficult to read.
					            "></i>
					        </li>
					        <li class="explaination-desc">
					        	<strong>Button Text</strong><i class="ptp-icon-help-circled" data-trigger="hover" data-html="true" data-placement="right" data-original-title="&lt;strong&gt;Call To Action Text&lt;/strong&gt;" data-content="
					            Enter your call to action text here.
					            &lt;br/&gt;&lt;br/&gt; 
					            &lt;strong&gt;Best practice:&lt;/strong&gt;
					            &lt;br/&gt;
					            Here are some of the highest converting variations:;&lt;br/&gt; 
					            * Add To Cart&lt;br/&gt; 
					            * Sign Up&lt;br/&gt; 
					            * Sign Up Free&lt;br/&gt; 
					            * Start Free Trial"></i>
					        </li>
					        <li class="explaination-desc">
					        	<strong>Button URL</strong><i class="ptp-icon-help-circled" data-trigger="hover" data-html="true" data-placement="right" data-original-title="&lt;strong&gt;Call To Action URL&lt;/strong&gt;" data-content="
					            Enter your call to action URL here. This is usually either a payment link (e.g. PayPal) or a page where users can create an account.
					            "></i>
					        </li>
			        	</ul>
			        </div>

			    	<?php 
			    	/**
			    	 * the loop used to display our tables
			    	 */
			    	while($mb->have_fields_and_multi('column',array('length' => 2))): 
		    		?>
					<?php $mb->the_group_open(); ?>
						<div class="column">

				        	<div class="ptp-title plan-title">

				        		<?php $mb->the_field('feature');?>
					            <input type="hidden" name="<?php $mb->the_name(); ?>" value="<?php if(!is_null($metabox->get_the_value())){$mb->the_value();} elseif(!$mb->is_last()){ echo "unfeatured"; }?>" class="form-control" />
					
								<a onClick="buttonHandler(this)" class="button button-small feature-button <?php if($mb->get_the_value()=="featured"){echo "ptp-icon-star";}else {echo "ptp-icon-star-empty";}?>" data-trigger="hover" data-html="true" data-placement="right" data-original-title="&lt;strong&gt;Feature This Column&lt;/strong&gt;" data-content="Click this button to feature this column. A featured column appears bigger and includes the wording 'Most Popular'. You can only feature one column per table.">Feature</a>
		            			<button class="button button-small dodelete ptp-icon-trash" id="delete-button" data-trigger="hover" data-html="true" data-placement="right" data-original-title="&lt;strong&gt;Delete This Column&lt;/strong&gt;" data-content="Click this button to delete this column.">Delete</button>
					        	
					        	<?php $mb->the_field('planname');?>
					            <input id="plan-name" type="text" name="<?php $mb->the_name(); ?>" placeholder="e.g. Small Business" value="<?php echo $mb->the_value(); ?>" class="form-control">
					        </div>

					        <ul class="ptp-settings plan-settings">
						        <li>
						        	<?php $mb->the_field('planprice'); ?>
						            <input type="text" name="<?php $mb->the_name(); ?>" placeholder="e.g. $49/mo" value="<?php echo $mb->the_value(); ?>" class="form-control">
						        </li>
						        <li class="features">
						        	<?php $mb->the_field('planfeatures'); ?>
						            <textarea name="<?php $mb->the_name(); ?>" class="form-control" rows="7" placeholder="e.g. 1 Website                             30,000 Monthly Visits                             Unlimited Data Transfer                             5GB Storage""><?php echo $mb->the_value(); ?></textarea>
						        </li>

						        <li>
						        	<?php $mb->the_field('buttontext'); ?>
						            <input type="text" pla name="<?php $mb->the_name(); ?>" placeholder="e.g. Start A Free Trial" value="<?php  $mb->the_value(); ?>" class="form-control">
						        </li>

						        <li>
						        	<?php $mb->the_field('buttonurl'); ?>
						            <input type="text" placeholder="e.g. http://example.com/buy" name="<?php $mb->the_name(); ?>" value="<?php echo $mb->the_value();?>" class="form-control">
						        </li>
					    	</ul>
				        </div>	
			        <?php $mb->the_group_close(); ?>
		    		<?php endwhile; ?>

		       	</div>
	       	</div>

	       	<div id="dh_ptp_tabs_2" class="dh_ptp_tab">
		       	<div id="dh_ptp_design_tabs_container">
	       			<ul id="dh_ptp_design_tabs">
					    <li class="dh_ptp_tab_header"><a href="#designtabs1">Overall Styles</a></li>
					    <li class="dh_ptp_tab_header"><a href="#designtabs2">Font Styles</a></li>
					    <li class="dh_ptp_tab_header"><a href="#designtabs3">Button Colors</a></li>
				    </ul>	
		    	    <!-- clear our floats -->
       				<div class="clear"></div>

			       	<div id="designtabs1" class="dh_ptp_tab">
   				       	<h4>Overall Design</h4>
			       		<table>
				       		<! -- Rounded Corners -->
				       		<tr class="table-headline"><td><br/>Rounded Corners</td></tr>
					       	<tr>
					       		<td>Border Radius</td>
					        	<?php $mb->the_field('rounded-corners'); ?>
					        	<td><select name="<?php $metabox->the_name(); ?>">
									<option value="0px" <?php  
										if(!is_null($mb->get_the_value())) 
										{
							            	if($mb->get_the_value() == '0px')
							            	{
												echo 'selected';
							            	}
						            	}
						            	else {
						            		echo 'selected';
						            	}
									?> >No Rounded Corners</option>
									<?php
										for($i=1;$i<=20;++$i){

							            	if($mb->get_the_value() == $i . 'px')
							            	{
												echo '<option value="' . $i . 'px" selected>' . $i . 'px</option>';
							            	}
					            	 		else
												echo '<option value="' . $i . 'px" >' . $i . 'px</option>';

										}
									?>
								</select></td>
					       	</tr>
					       	<!-- commented out for now
				       		<tr class="table-headline"><td><br/>"Most Popular Area" Colors</td></tr>
					       	<tr>
					       		<td>Most Popular - Area Background Color</td>
					        	<?php $mb->the_field('most-popular-background-color'); ?>
					       		<td><input type="text" name="<?php $mb->the_name(); ?>" class="colorpicker-no-palettes" value="<?php 
								            if(!is_null($mb->get_the_value())) 
								            	echo $mb->the_value();
					            	 		else
					            	 			echo "#7f8c8d";
								            ?>
					       			" class="my-color-field" data-default-color="#7f8c8d" /></td>
					       	</tr>
					       	<tr>
					       		<td>Most Popular - Font Color</td>
					        	<?php $mb->the_field('most-popular-font-color'); ?>
					       		<td><input type="text" name="<?php $mb->the_name(); ?>" class="colorpicker-no-palettes" value="<?php 
								            if(!is_null($mb->get_the_value())) 
								            	echo $mb->the_value();
					            	 		else
					            	 			echo "#ffffff";
								            ?>
					       			" class="my-color-field" data-default-color="#ffffff" /></td>
					       	</tr>
					       	<tr class="table-headline"><td><br/>Table Colors</td></tr>
					       	<tr>
					       		<td>Most Popular - Area Background Color</td>
					        	<?php $mb->the_field('most-popular-background-color'); ?>
					       		<td><input type="text" name="<?php $mb->the_name(); ?>" class="colorpicker-no-palettes" value="<?php 
								            if(!is_null($mb->get_the_value())) 
								            	echo $mb->the_value();
					            	 		else
					            	 			echo "#7f8c8d";
								            ?>
					       			" class="my-color-field" data-default-color="#7f8c8d" /></td>
					       	</tr>
					       -->
				        </table>
			        </div>
		       		
		       		<div id="designtabs2" class="dh_ptp_tab">
		       			<h4>Font Styles</h4>
			       		<table>

					       	<table>
			       			<tr>
					       		<td>"Most Popular" Font Size</td>
					        	<td>
						        	<?php $mb->the_field('most-popular-font-size'); ?>
					        		<input class="form-control float-input" type="text" name="<?php $metabox->the_name(); ?>" value="<?php if(!is_null($mb->get_the_value())) echo $metabox->the_value(); else echo "0.9"; ?>"/>
								</td>
								<td>
									<?php $mb->the_field('most-popular-font-size-type'); ?>
									<select  name="<?php $metabox->the_name(); ?>">
										<option value="em" <?php  
											if(!is_null($mb->get_the_value())) 
											{
								            	if($mb->get_the_value() == 'em')
								            	{
													echo 'selected';
								            	}
							            	}
							            	else {
							            		echo 'selected';
							            	}
										?> >em</option>
										<option value="px" <?php  
											if(!is_null($mb->get_the_value())) 
											{
								            	if($mb->get_the_value() == 'px')
								            	{
													echo 'selected';
								            	}
							            	}
										?>>px</option>
									</select>
								</td>
					       	</tr>
					       	<tr>
					       		<td>"Plan Name" Font Size</td>
					        	<td>
						        	<?php $mb->the_field('plan-name-font-size'); ?>
					        		<input class="form-control float-input" type="text" name="<?php $metabox->the_name(); ?>" value="<?php if(!is_null($mb->get_the_value())) echo $metabox->the_value(); else echo "1"; ?>"/>
								</td>
								<td>
									<?php $mb->the_field('plan-name-font-size-type'); ?>
									<select  name="<?php $metabox->the_name(); ?>">
										<option value="em" <?php  
											if(!is_null($mb->get_the_value())) 
											{
								            	if($mb->get_the_value() == 'em')
								            	{
													echo 'selected';
								            	}
							            	}
							            	else {
							            		echo 'selected';
							            	}
										?> >em</option>
										<option value="px" <?php  
											if(!is_null($mb->get_the_value())) 
											{
								            	if($mb->get_the_value() == 'px')
								            	{
													echo 'selected';
								            	}
							            	}
										?>>px</option>
									</select>
								</td>
					       	</tr>
					       	<tr>
					       		<td>"Price" Font Size</td>
					        	<td>
						        	<?php $mb->the_field('price-font-size'); ?>
					        		<input class="form-control float-input" type="text" name="<?php $metabox->the_name(); ?>" value="<?php if(!is_null($mb->get_the_value())) echo $metabox->the_value(); else echo "1.25"; ?>"/>
								</td>
								<td>
									<?php $mb->the_field('price-font-size-type'); ?>
									<select  name="<?php $metabox->the_name(); ?>">
										<option value="em" <?php  
											if(!is_null($mb->get_the_value())) 
											{
								            	if($mb->get_the_value() == 'em')
								            	{
													echo 'selected';
								            	}
							            	}
							            	else {
							            		echo 'selected';
							            	}
										?> >em</option>
										<option value="px" <?php  
											if(!is_null($mb->get_the_value())) 
											{
								            	if($mb->get_the_value() == 'px')
								            	{
													echo 'selected';
								            	}
							            	}
										?>>px</option>
									</select>
								</td>
					       	</tr>
					       	<tr>
					       		<td>"Bullet Item (Feature)" Font Size</td>
					        	<td>
						        	<?php $mb->the_field('bullet-item-font-size'); ?>
					        		<input class="form-control float-input" type="text" name="<?php $metabox->the_name(); ?>" value="<?php if(!is_null($mb->get_the_value())) echo $metabox->the_value(); else echo "0.875"; ?>"/>
								</td>
								<td>
									<?php $mb->the_field('bullet-item-font-size-type'); ?>
									<select  name="<?php $metabox->the_name(); ?>">
										<option value="em" <?php  
											if(!is_null($mb->get_the_value())) 
											{
								            	if($mb->get_the_value() == 'em')
								            	{
													echo 'selected';
								            	}
							            	}
							            	else {
							            		echo 'selected';
							            	}
										?> >em</option>
										<option value="px" <?php  
											if(!is_null($mb->get_the_value())) 
											{
								            	if($mb->get_the_value() == 'px')
								            	{
													echo 'selected';
								            	}
							            	}
										?>>px</option>
									</select>
								</td>
					       	</tr>
					       	<tr>
					       		<td>"Button" Font Size</td>
					        	<td>
						        	<?php $mb->the_field('button-font-size'); ?>
					        		<input class="form-control float-input" type="text" name="<?php $metabox->the_name(); ?>" value="<?php if(!is_null($mb->get_the_value())) echo $metabox->the_value(); else echo "1"; ?>"/>
								</td>
								<td>
									<?php $mb->the_field('button-font-size-type'); ?>
									<select  name="<?php $metabox->the_name(); ?>">
										<option value="em" <?php  
											if(!is_null($mb->get_the_value())) 
											{
								            	if($mb->get_the_value() == 'em')
								            	{
													echo 'selected';
								            	}
							            	}
							            	else {
							            		echo 'selected';
							            	}
										?> >em</option>
										<option value="px" <?php  
											if(!is_null($mb->get_the_value())) 
											{
								            	if($mb->get_the_value() == 'px')
								            	{
													echo 'selected';
								            	}
							            	}
										?>>px</option>
									</select>
								</td>
					       	</tr>
				        </table>

		       		</div>

		       		<div id="designtabs3" class="dh_ptp_tab">
	       				<h4>Button Colors</h4>
		       			<table>
			       		<!-- Normal Buttons -->
				       	<tr class="table-headline"><td><br/>Button Color</td></tr>
				       	<tr>
				       		<td>Button Color</td>
				        	<?php $mb->the_field('button-color'); ?>
				       		<td><input type="text" name="<?php $mb->the_name(); ?>" class="button-color" value="<?php 
							            if(!is_null($mb->get_the_value())) 
							            	echo $mb->the_value();
				            	 		else
				            	 			echo "#3498db";
							            ?>
				       			" class="my-color-field form-control" data-default-color="#3498db" /></td>
				       	</tr>

				       	<tr>
				       		<td>Button Border Color</td>
				        	<?php $mb->the_field('button-border-color'); ?>
				       		<td><input type="text" name="<?php $mb->the_name(); ?>" class="button-border-color" value="<?php 
							            if(!is_null($mb->get_the_value())) 
							            	echo $mb->the_value();
				            	 		else
				            	 			echo "#2980b9";
							            ?>
				       			" class="my-color-field" data-default-color="#2980b9" /></td>
				       	</tr>

				       	<tr>
				       		<td>Button Hover Color</td>
				        	<?php $mb->the_field('button-hover-color'); ?>
				       		<td><input type="text" name="<?php $mb->the_name(); ?>" class="button-border-color" value="<?php 
							            if(!is_null($mb->get_the_value())) 
							            	echo $mb->the_value();
				            	 		else
				            	 			echo "#2980b9";
							            ?>
				       			" class="my-color-field" data-default-color="#2980b9" /></td>
				       	</tr>

						<tr>
				       		<td>Button Font Color</td>
				        	<?php $mb->the_field('button-font-color'); ?>
				       		<td><input type="text" name="<?php $mb->the_name(); ?>" class="colorpicker-no-palettes" value="<?php 
							            if(!is_null($mb->get_the_value())) 
							            	echo $mb->the_value();
				            	 		else
				            	 			echo "#ffffff";
							            ?>
				       			" class="my-color-field" data-default-color="#ffffff" /></td>
				       	</tr>

				       	<!-- Featured Buttons -->
				       	<tr class="table-headline"><td><br/>Button Color (Featured Column)</td></tr>
			       		<tr>
				       		<td>Featured-Button Color</td>
				        	<?php $mb->the_field('featured-button-color'); ?>
				       		<td><input type="text" name="<?php $mb->the_name(); ?>" class="button-color" value="<?php 
							            if(!is_null($mb->get_the_value())) 
							            	echo $mb->the_value();
				            	 		else
				            	 			echo "#e74c3c";
							            ?>
				       			" class="my-color-field form-control" data-default-color="#e74c3c" /></td>
				       	</tr>

				       	<tr>
				       		<td>Featured-Button Border Color</td>
				        	<?php $mb->the_field('featured-button-border-color'); ?>
				       		<td><input type="text" name="<?php $mb->the_name(); ?>" class="button-border-color" value="<?php 
							            if(!is_null($mb->get_the_value())) 
							            	echo $mb->the_value();
				            	 		else
				            	 			echo "#c0392b";
							            ?>
				       			" class="my-color-field" data-default-color="#c0392b" /></td>
				       	</tr>

				       	<tr>
				       		<td>Featured-Button Hover Color</td>
				        	<?php $mb->the_field('featured-button-hover-color'); ?>
				       		<td><input type="text" name="<?php $mb->the_name(); ?>" class="button-border-color" value="<?php 
							            if(!is_null($mb->get_the_value())) 
							            	echo $mb->the_value();
				            	 		else
				            	 			echo "#c0392b";
							            ?>
				       			" class="my-color-field" data-default-color="#c0392b" /></td>
				       	</tr>

						<tr>
				       		<td>Featured-Button Font Color</td>
				        	<?php $mb->the_field('featured-button-font-color'); ?>
				       		<td><input type="text" name="<?php $mb->the_name(); ?>" class="colorpicker-no-palettes" value="<?php 
							            if(!is_null($mb->get_the_value())) 
							            	echo $mb->the_value();
				            	 		else
				            	 			echo "#ffffff";
							            ?>
				       			" class="my-color-field" data-default-color="#ffffff" /></td>
				       	</tr>

			       	</table>
		       		</div>
	       		</div>

	       	</div>

	       	<div id="dh_ptp_tabs_3" class="dh_ptp_tab">
		       	<h4>How To Publish This Table</h4> 
		       	<p><strong>Step 1:</strong> Click 'Save Settings' below (big, blue button).</p>
		       	<p><strong>Step 2:</strong> Copy the shortcode below and paste it wherever you want your pricing table to appear.</p>
				<input type="text" readonly="readonly" onclick="this.select()" value="[easy-pricing-table id=&quot;<?php the_ID(); ?>&quot;]"/>

				<h4>Support</h4>
				<p>Feature requests? Questions? Problems? Email me at <a href="mailto:david@davidhehenberger.com" target="_top">david@davidhehenberger.com</a>.</p>
			</div>

			
			<div id="ptp-save-buttons">
				<div style="margin-left:10px;margin-right:10px;">
					<input style="float:left; " name="save" type="submit" class="button button-primary button-large" id="publish" accesskey="p" value="Save Settings">
					<a  style="float:left; margin-left:10px;" class="button button-large" href="<?php echo esc_url( get_permalink($post->ID) ); ?>" target="_blank" >View Pricing Table</a>
					<?php
						if ( current_user_can( "delete_post", $post->ID ) ) {
						        if ( !EMPTY_TRASH_DAYS )
						                $delete_text = __('Delete Permanently');
						        else
						                $delete_text = __('Move to Trash');
						        ?>
						<a  style="float:right; margin-left:10px;" class="button button-large dh-ptp-alert" href="<?php echo get_delete_post_link($post->ID); ?>"><?php echo $delete_text; ?></a>
						<?php
						} ?>
			       	<div class="clear"></div>
		       </div>
			</div>

</div>


