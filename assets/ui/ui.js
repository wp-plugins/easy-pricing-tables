jQuery(document).ready(function($) {
    // You can use $() inside of this function
 

    $('.feature-button').click(function () {

    	// toggle active button via css
		function toggleButtonClasses(el)
		{
			$(el).toggleClass('ptp-icon-star-empty');
			$(el).toggleClass('ptp-icon-star');
		}

		//set the value of our hidden input
		function setInputValue(el)
		{
			if($(el).val()=="unfeatured" || $(el).val()=="")
				$(el).val("featured");
			else if($(el).val()=="featured")
				$(el).val("unfeatured");
		}

		function myButtonClickHandler(el)
		{
			
			toggleButtonClasses(el);
			// set the value of our helper input
			setInputValue(el.prev());

		}

    	/*if there is a previously active button, unpress it and change its value
    	var previously_selected_element = $('.ptp-icon-star')[0];
    	if (previously_selected_element != this[0])
    	{
    		myButtonClickHandler( previously_selected_element );
		}*/


		// use hasClass to figure out if current item is selected or not
    	if (!$(this).hasClass('ptp-icon-star')) {
			myButtonClickHandler($('.ptp-icon-star'));
    	}

		//keep the currently active button pressed and keep its value
		myButtonClickHandler( $(this));

    	

    	
	 	return false;
    })
});

