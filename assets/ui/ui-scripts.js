jQuery(document).ready(function($) {
    //nested tabs (design)
    $("#dh_ptp_design_tabs_container").tabs();
    //activate jquery ui tabs
    $("#dh_ptp_tabs_container").tabs();


    //drag and drop for columns
    $("#wpa_loop-column").sortable({ axis: "x" });

	//activate color pickers
    $('.button-color').wpColorPicker({
	    palettes: ['#1abc9c', '#2ecc71','#3498db', '#9b59b6', '#34495e', '#f1c40f', '#e67e22', '#e74c3c', '95a5a6']
    });
    $('.button-border-color').wpColorPicker({
    	    palettes: ['#16a085', '#27ae60','#2980b9', '#8e44ad', '#2c3e50', '#f39c12', '#d35400', '#c0392b', '7f8c8d']
    });
    $('.colorpicker-no-palettes').wpColorPicker();   


	 //make sure that only decimal numbers are allowed to input. 
	 //source: http://jqueryexamples4u.blogspot.in/2013/09/validate-input-field-allows-only-float.html
	 $('.float-input').keypress(function(event) {
	      if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
	        event.preventDefault();
	      } 
	});

});

//activate twitter bootstrap popover
jQuery(function ($)
  { 
    $(".ptp-icon-help-circled").popover();  
    $(".plan-title #delete-button").popover({placement:'top'});  
    $(".plan-title .feature-button").popover({placement:'top'});  
  });  


// handle clicks on featured button
function buttonHandler(el)
{
	// required for wordpress
	var $ = jQuery;

	// toggle active button via css
	function toggleButtonClasses(el)
	{
		$(el).toggleClass('ptp-icon-star-empty');
		$(el).toggleClass('ptp-icon-star');
	}
	
	//toggle the value of our hidden input
	function setInputValue(el)
	{
		if($(el).val()=="unfeatured" || $(el).val()=="")
			$(el).val("featured");
		else if($(el).val()=="featured")
			$(el).val("unfeatured");
	}

	// toggles the elements class and value
	function myButtonClickHandler(el)
	{
		
		toggleButtonClasses(el);
		setInputValue(el.prev());

	}

	// use hasClass to figure out if current item is selected or not
	if (!$(el).hasClass('ptp-icon-star')) {
		// if the clicked item is not featured, unfeature the currently featured item ('.ptp-icon-star') by sending it to myButtonClickHandler
		myButtonClickHandler($('.ptp-icon-star'));
	}

	//	feature the clicked item by sending it to myButtonClickHandler
	myButtonClickHandler( $(el));

 	return false;
}

// validate font size field
function validateFontSize(el){
	// required for wordpress
	var $ = jQuery;

	// http://stackoverflow.com/questions/10104755/string-validation-in-jquery
	// http://stackoverflow.com/questions/6029674/regex-for-positive-float-numbers
	if (/your regex/.test($(el).val()))
	{
	    // if regex pattern match => do nothing
	}
	else
	{
	    // else alert + put value back to previous
		alert($(el).val());
	}

	return false;
}