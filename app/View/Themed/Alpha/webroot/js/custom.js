jQuery(function() {	
	jQuery("#PrimaryPhone").mask("(999) 999-9999");
	jQuery("#Phone_TCPA").mask("(999) 999-9999");
	jQuery("#SecondaryPhone").mask("(999) 999-9999");
	jQuery("#WorkPhone").mask("(999) 999-9999");
	jQuery("#Ssn").mask("999-99-9999");
	jQuery("#ResidenceSinceDate").mask("99/9999");
	jQuery("#CoSsn").mask("999-99-9999");
	jQuery("#CoWorkPhone").mask("(999) 999-9999");
	jQuery("#CoPrimaryPhone").mask("(999) 999-9999");
	//Set Masks/Filters :: end
		
	//Page 1 - Lead In :: start
	if(jQuery('#LeadInForm').length>0){
		var parsleyOptions = {
			errorClass: 'has-error',
			successClass: 'has-success',
			errorsMessagesDisabled: true,
			classHandler: function(el) {
				if(el.$element[0].id == 'Agree'){
					return el.$element.next();
				}else{
					return el.$element.parent();	
				}
			}
		};
		
		//save Step in session as submission of stepwise form.
		saveSingleSession('Step',1);
		jQuery('#Zip').on("change", function() {
		  	getCityState(jQuery('#Zip').val(), 'zip'); 
		});

		jQuery('form').parsley(parsleyOptions);
		jQuery('#button-app-start').on('click', function(){
			Pace.restart();
			jQuery('#LeadInForm').parsley().validate();
			if(jQuery('#Agree:checked').length == 0){
				jQuery('#Agree').next().addClass('text-danger');
			}else{
				jQuery('#Agree').next().removeClass('text-danger');
				if(jQuery('#LeadInForm').parsley().isValid()){
					ga('send', 'event', 'Application', 'start', 'Loan Application');
					jQuery('#LeadInForm').submit();
				}
			}
		});
		
		jQuery('#Agree').on('click', function(){
			if(jQuery(this).is(':checked')){
				jQuery('#Agree').next().removeClass('text-danger');
			}else{
				jQuery('#Agree').next().addClass('text-danger');
			}
		});
	}

    jQuery('#ResidenceType').on('change', function(){
		if(jQuery(this).find(":selected").val() == 'Own Without Mortgage' )
		jQuery('#RentMortgage').attr('data-parsley-required', 'false');
	});

	//Load function at the end.  Check AppController - pages_map function to see generated js 
	$(window).load(function(){
		 if ($.isFunction(window.ancillaryPageChangeCheck)){
		    ancillaryPageChangeCheck(6);
		} 
	});	
	//Page 1 - Lead In :: end
});

/**
	 * Get the users city and state based on the zip code provided.
	 */
	function getCityState(zip,type){
		$.ajax({
			url: "https://service.leadstudio.com/getCityStatebyZip/"+zip+"/ajaxreceive",
		    jsonp: "true",
		    jsonpCallback: "ajaxreceive",
		    dataType: "jsonp",
		    crossDomain: true,
		    success: function( response ) {
		    			if(response.status == "error"){
		    				jQuery('#Zip').val('');
		    				//jQuery('#Zip').parsley().validate();
		    			}else{
			    			jQuery('#City').val(response.data.StateZip.city);
			    			saveSingleSession('City',response.data.StateZip.city);
				        	saveSingleSession('State',response.data.StateZip.state);
				        	//saveSingleTrackLead('State', response.data.StateZip.state);
				        	
				       }
		    }
		});
	}


	function saveSingleSession(variable, value){
		var sessiondata = {};
		sessiondata[variable] = value;
		jQuery.ajax({
			url: '/application/setSessionDataAjax',
			data: sessiondata,
			method:'post',
			headers:{
				'x-keyStone-nonce': nonce
			}
		});
	}
		function saveSingleTrackLead(variable, value){
		var trackdata = {};
		trackdata[variable] = value;
		jQuery.ajax({
			url: '/application/setTrackLeadAjax',
			data: trackdata,
			method:'post',
			headers:{
				'x-keyStone-nonce': nonce
			}
		});
	}
/*
	jQuery(document).ready(function(){
	   	//window.open(" http://heis20.com/?r=70a7404138");
	   	window.open(" http://heis20.com/?r=70a7404138", "_blank", "width=860,height=600");
	});*/