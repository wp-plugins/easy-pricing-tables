jQuery(document).ready(function($) {
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
    $('.button-font-color').wpColorPicker();    
    
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
