jQuery(function() {	
	jQuery("#PrimaryPhone").mask("(999) 999-9999");
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
		
		jQuery('form').parsley(parsleyOptions);
		jQuery('#button-app-start').on('click', function(){
			Pace.restart();
			jQuery('#LeadInForm').parsley().validate();
			if(jQuery('#Agree:checked').length == 0){
				jQuery('#Agree').next().addClass('text-danger');
			}else{
				jQuery('#Agree').next().removeClass('text-danger');
				if(jQuery('#LeadInForm').parsley().isValid()){
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
	
	//Load function at the end.  Check AppController - pages_map function to see generated js 
	$(window).load(function(){
		 if ($.isFunction(window.ancillaryPageChangeCheck)){
		    ancillaryPageChangeCheck(6);
		} 
	});	
	//Page 1 - Lead In :: end
});