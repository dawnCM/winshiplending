/**
 * Blind callback handler for jsonp call
 */
function ajaxreceive(e){
	return e.data;
}

/*
 * Excluded fields
 */
var excluded_fields = ["BankRoutingNumber", "BankAccountNumber", "Ssn", "CoSsn"];


jQuery(function() {
//Page 2 - Application :: start
	if(jQuery('#basicWizard').length>0){
		var parsleyOptions = {
			errorClass: 'has-error',
			successClass: 'has-success',
			errorsMessagesDisabled: true,
			classHandler: function(el) {
				return el.$element.parent();
			}
		};
				
		jQuery('#basicWizard').parsley(parsleyOptions);
				
		//Ignore hidden fields (tabs that are not dispayed)
		jQuery('#basicWizard').parsley('addListener', {
		    onFieldValidate: function(elem) {
		    	if(!jQuery( elem ).is(':visible')){
		            return true;
		        }
		        return false;
		    }
		});
		
		//To avoid duplicate field names, remove the tab that we won't use
		if(jQuery('div.payday').length>0){jQuery('#tab7').remove();}else{jQuery('#tab1').remove();}
		
		//Turn on additional vendor dropdown
		if(jQuery('div.personalloan').length>0){jQuery('.additional_lenders').toggle();}
				
		jQuery('#basicWizard').bootstrapWizard({
			onInit: function(tab, navigation, index){
				
			},
			onTabShow: function(tab, navigation, index) {
				tab.prevAll().addClass('done');
				tab.nextAll().removeClass('done');
				tab.removeClass('done');
					
				var total = navigation.find('li').length;
				var current = index + 1;		
							
				if(ismobile === true){window.scrollTo(0, 0);}
			
				if(index == 3 && jQuery('#CoApplicant').val()=='No'){
					$('#tab-content personal').css('height','auto');
				}
				
				//Make sure parsley knows when to validate address fields
				if(index == 3 && jQuery('#CoAppSameAddr').val()=='No'){
					jQuery('#CoAddress1').attr('data-parsley-required','true');
					jQuery('#CoCity').attr('data-parsley-required','true');
					jQuery('#CoState').attr('data-parsley-required','true');
					jQuery('#CoZip').attr('data-parsley-required','true');
					
					//show address div
					jQuery('#CoAppAddress').slideDown();
					$(".tab-content").css('height','auto');
		 
				}else if(index == 3 && (jQuery('#CoAppSameAddr').val()=='Yes' || jQuery('#CoAppSameAddr').val()=='')){
					jQuery('#CoAddress1').attr('data-parsley-required','false');
					jQuery('#CoCity').attr('data-parsley-required','false');
					jQuery('#CoState').attr('data-parsley-required','false');
					jQuery('#CoZip').attr('data-parsley-required','false');
				}
				
				if(index == 4){
					$(".tab-content").css('height','auto');
				}
				
				if(index == 5 && ismobile === false){
					$(".tab-content").css('height','390px');
				}
				
				if(index == 1 && ismobile === false){
					$(".tab-content").css('height','390px');
				}
				
				if(index == 2 && ismobile === false){
					$(".tab-content").css('height','390px');
				}
				
				if ($.isFunction(window.ancillaryPageChangeCheck)){
					ancillaryPageChangeCheck(index);
				}
			
				if(index == 4){
					updateOfferPhone();	
				}
					
			},
			onTabClick: function(tab, navigation, index) {
				return false;
			},
			onNext: function(tab, navigation, index) {
				Pace.restart();
				
				var total = navigation.find('li').length;
				var livetab = index;
				var current = index + 1;		
				
				
				
				if(index == 4 && jQuery('#CoApplicant').val()=='Yes'){
					jQuery('.btnnext').html('Finish');
				
					if(jQuery('#basicWizard').parsley().validate('step6') === false){
						return false;
					}
				}else if(index == 5 && jQuery('#CoApplicant').val()=='Yes'){
					if(jQuery('#basicWizard').parsley().validate('step'+index) === false ){
						return false;
					}else if(jQuery('#AgreeConsent:checked').length == 0){
						jQuery('#AgreeConsent').next().addClass('text-danger');
						return false;
					}
					jQuery('.btnnext').addClass('hide');
					jQuery('.btnprev').addClass('hide');
					jQuery('#p2_sec01_headline').addClass('hide');
				}else if(index == 5){
					if(jQuery('#basicWizard').parsley().validate('step'+index) === false ){
						return false;
					}else if(jQuery('#AgreeConsent:checked').length == 0){
						jQuery('#AgreeConsent').next().addClass('text-danger');
						return false;
					}
					jQuery('.btnnext').addClass('hide');
					jQuery('.btnprev').addClass('hide');
					jQuery('#p2_sec01_headline').addClass('hide');
				}else if(index == 3 && jQuery('#CoApplicant').val()=='No'){
					jQuery('.btnnext').html('Finish');
					if(jQuery('#basicWizard').parsley().validate('step'+index) === false){
						return false;
					}
				}else if(index == 3 && jQuery('div.payday').length>0){
					jQuery('.btnnext').html('Finish');
					if(jQuery('#basicWizard').parsley().validate('step'+index) === false){
						return false;
					}
				}else{
					if(jQuery('#basicWizard').parsley().validate('step'+index) === false){
						return false;
					}
				}
				
				//Final page, save hidden fields
				if(index == 5){
					saveSessioncb();
				}else{
					saveSession();
				}
				
				//Save data to Track lead
				saveTrackLead();
										
				//Non-Mobile
				if(index == 3 && (jQuery('#CoApplicant').val()=='No' || jQuery('#CoApplicant').val()=='' || jQuery('#CoApplicant').val()==undefined) ){
					jQuery('#basicWizard').bootstrapWizard('show', 3);
				}
				
				
			},
			onPrevious: function(tab, navigation, index) {
				var total = navigation.find('li').length;
				var livetab = index;
				var current = index + 1;
								
				if(index == 3 && (jQuery('#CoApplicant').val()=='No' || jQuery('#CoApplicant').val()=='' || jQuery('#CoApplicant').val()==undefined)){
					jQuery('#basicWizard').bootstrapWizard('show', 3);
				}
				jQuery('.btnnext').html('Next <span class="glyphicon glyphicon-chevron-right"></span>');
			}			
		});
	}
	
	//Make prev button take you to home page if on the first tab and you click it
	jQuery('.btnprev').on('click',function(){
		if(jQuery('#li1').hasClass('active')){
			window.location.replace('/');
		}
	});
	
	//If city is blank and you have a zip, lookup city and state
	if(jQuery('#City').val() == '' && jQuery('#Zip').val() != ''){
		getCityState(jQuery('#Zip').val(), 'zip');
	}
	
	//If employer city is blank and you have a zip, lookup city and state
	if(jQuery('#EmployerCity').val() == '' && jQuery('#EmployerZip').val() != ''){
		getCityState(jQuery('#EmployerZip').val(), 'employer');
	}
	
	//If you change the zip and city is blank, lookup city and state
	jQuery('#Zip').on('change', function(){
		getCityState(jQuery('#Zip').val(), 'zip');
	});
	
	//If you change the employer zip and city is blank, lookup city and state
	jQuery('#EmployerZip').on('change', function(){
		getCityState(jQuery('#EmployerZip').val(), 'employer');
	});
	
	//Validate phone numbers against the service
	jQuery('#PrimaryPhone, #SecondaryPhone, #WorkPhone, #CoPrimaryPhone').on('change', function(){
		var inst = jQuery(this);
	
		var phone = jQuery(inst).val().replace(/\D/g, '');
		var phone3 = phone.substr(6,4);
    	var phone2 = phone.substr(3,3);
    	var phone1 = phone.substr(0,3);
    	
    	if(phone1 == '800' || phone1 == '877' || phone1 == '888' || phone1 == '900'){
    		return true;
    	}else{
			jQuery.ajax({
				url: "https://service.leadstudio.com/npaNpxCheck/"+phone1+"/"+phone2+"/ajaxreceive",
			    jsonp: "true",
			    jsonpCallback: "ajaxreceive",
			    dataType: "jsonp",
			    crossDomain: true,
			    success: function( response ) {
			        if(response.data === true){
			        	jQuery(inst).val(phone1+phone2+phone3);
			        	return true
			        }else{
			        	jQuery(inst).val('');
			        }
			    }
			});
    	}
	});
	
	jQuery('#SecondaryPhone').on('change', function(){
		if(jQuery('#SecondaryPhone').val() != ''){
			var secondaryphonetype = jQuery('#PrimaryPhoneType').val() == 'Mobile' ? 'Home' : 'Mobile';
			jQuery('#SecondaryPhoneType').val(secondaryphonetype);
		}
	});
	
	jQuery('#ResidentSinceDate').datepicker({
	    startView: 2,
	    minViewMode: 1,
	    autoclose: true,
	    orientation: "auto",
	    startDate: "-80y",
	    endDate: "-0y",
	    disableTouchKeyboard: true,
	    todayHighlight:true
	});
	
	jQuery('#DateOfBirth').datepicker({
	    startView: 2,
	    minViewMode: 3,
	    autoclose: true,
	    orientation: "auto",
	    startDate: "-80y",
	    endDate: "-18y",
	    disableTouchKeyboard: true,
	    todayHighlight:true
	});
	
	jQuery('#EmploymentTime').datepicker({
	    startView: 2,
	    minViewMode: 1,
	    autoclose: true,
	    orientation: "auto",
	    startDate: "-80y",
	    endDate: "0y",
	    disableTouchKeyboard: true,
	    todayHighlight:true
	});
	
	jQuery('#Paydate1').datepicker({
	    startView: 3,
	    autoclose: true,
	    orientation: "auto",
	    startDate: "+1d",
	    endDate: "+32d",
	    daysOfWeekDisabled:[0,6],
	    disableTouchKeyboard: true,
	    todayHighlight:true
	}).on('show',function(e){
		//Do code hear.
	});
	
	jQuery('#CoEmploymentTime').datepicker({
	    startView: 2,
	    minViewMode: 1,
	    autoclose: true,
	    orientation: "auto",
	    startDate: "-80y",
	    endDate: "0y",
	    disableTouchKeyboard: true,
	    todayHighlight:true
	});
	
	jQuery('#CoDateOfBirth').datepicker({
	    startView: 2,
	    minViewMode: 3,
	    autoclose: true,
	    orientation: "auto",
	    startDate: "-80y",
	    endDate: "-18y",
	    disableTouchKeyboard: true,
	    todayHighlight:true
	});
	
	//If you change the Co-App zip lookup city and state
	jQuery('#CoZip').on('change', function(){
		getCityState(jQuery('#CoZip').val(), 'coapp');
	});
	
	jQuery('#CoApplicant').change(function(){
		(jQuery(this).val() == 'Yes') ? jQuery('#li6').fadeIn() : jQuery('#li6').fadeOut();
	});
	
	jQuery('#Paydate1').change(function(){
		var paydate2 = getPaydate2();
		saveSingleSession('Paydate2',paydate2);
		saveSingleTrackLead('Paydate2', paydate2);
	}); 
	
	jQuery('#removecoapp').on('click', function(){
		jQuery('#CoApplicant').val('No');
		saveSingleSession('CoApplicant','No');
		jQuery('#li6').fadeOut();
		jQuery('.btnnext').trigger('click');
	});
	
	jQuery('#CoAppSameAddr').change(function(){
		if(jQuery(this).val() == 'No'){
			jQuery('#CoAppAddress').slideDown();
			$(".tab-content").css('height','auto');
			jQuery('#CoAddress1').attr('data-parsley-required','true');
			jQuery('#CoCity').attr('data-parsley-required','true');
			jQuery('#CoZip').attr('data-parsley-required','true');
		}else{ 
			jQuery('#CoAppAddress').slideUp("slow", function(){
				$(".tab-content").css('height','390px');
			});
			
			jQuery('#CoAddress1').attr('data-parsley-required','false');
			jQuery('#CoCity').attr('data-parsley-required','false');
			jQuery('#CoZip').attr('data-parsley-required','false');
		}
	});
		
	//Validate dates on change
	jQuery('#DateOfBirth').datepicker().on('changeDate',function(e){
		jQuery('#DateOfBirth').parsley().validate()
		
	});
	
	jQuery('#EmploymentTime').datepicker().on('changeDate',function(e){
		jQuery('#EmploymentTime').parsley().validate()
	});
	
	jQuery('#CoEmploymentTime').datepicker().on('changeDate',function(e){
		jQuery('#CoEmploymentTime').parsley().validate()
	});
	
	jQuery('#ResidentSinceDate').datepicker().on('changeDate',function(e){
		jQuery('#ResidentSinceDate').parsley().validate()
	});
	
	jQuery('#AgreeConsent').on('click', function(){
		if(jQuery(this).is(':checked')){
			jQuery('#AgreeConsent').next().removeClass('text-danger');
		}else{
			jQuery('#AgreeConsent').next().addClass('text-danger');
		}
	});
	
	jQuery('#BankRoutingNumber').on('change', function(){
		if(jQuery('#BankRoutingNumber').val() != ''){
			getBankName(jQuery('#BankRoutingNumber').val());
		}
	});
	
	jQuery('#Email').on('change', function(){
  		if(jQuery('#Email').parsley().validate() == true && jQuery('#FirstName').parsley().validate() == true && jQuery('#LastName').parsley().validate() == true){
  			
  			send2Leadbyte();
  		}
	});
	
	/*
	 * Populate Primary phone to div on last page for offer
	 */
	function updateOfferPhone(){
		
		var phone = jQuery('#PrimaryPhone').val().replace(/\D/g, '');
		var phone3 = phone.substr(6,4);
    	var phone2 = phone.substr(3,3);
    	var phone1 = phone.substr(0,3);
    	
    	//add primary phone to span for offer on last page
		jQuery("#offer_phone").html(phone1+'-'+phone2+'-'+phone3);
	}
	
	/*
	 * Look up BankName from Routing number
	 */
	function getBankName(routing){
		$.ajax({
			url: "https://service.leadstudio.com/getBankInfobyABA/"+routing+"/ajaxreceive",
		    jsonp: "true",
		    jsonpCallback: "ajaxreceive",
		    dataType: "jsonp",
		    crossDomain: true,
		    success: function( response ) {
		    	if(response.status == 'success'){
		    		var bankname = response.data.BankRouting.name;
		    		bankname = bankname.replace('&','And').replace('\'','');
		    		jQuery('#BankName').val(bankname);
		    	}	
		    }
		    
		});	
	}
		
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
		    	switch(true){
		    		case type == 'zip':
		    			if(response.status == "error"){
		    				jQuery('#Zip').val('');
		    				jQuery('#Zip').parsley().validate();
		    			}else{
			    			jQuery('#City').val(response.data.StateZip.city);
				        	saveSingleSession('State',response.data.StateZip.state);
				        	saveSingleTrackLead('State', response.data.StateZip.state);
				       }
		    		break;
		    		
		    		case type == 'employer':
		    			if(response.status == "error"){
		    				jQuery('#EmployerZip').val('');
		    				jQuery('#EmployerZip').parsley().validate();
		    			}else{
			    			jQuery('#EmployerCity').val(response.data.StateZip.city);
				        	saveSingleSession('EmployerState',response.data.StateZip.state);
				        	saveSingleTrackLead('EmployerState', response.data.StateZip.state);
				       }
		    		break;
		    		
		    		case type == 'coapp':
		    			if(response.status == "error"){
		    				jQuery('#CoZip').val('');
		    				jQuery('#CoZip').parsley().validate();
		    			}else{
			    			jQuery('#CoCity').val(response.data.StateZip.city);
				        	saveSingleSession('CoState',response.data.StateZip.state);
				        	saveSingleTrackLead('CoState', response.data.StateZip.state);
				       }
		    		break;
		    	}
		    }
		});
	}
	
	function saveSession(){	
		jQuery.ajax({
			url: '/application/setSessionDataAjax',
			data: jQuery('#basicWizard').find(":input:not(:hidden)").serialize(),
			method:'post',
			headers:{
				'x-keyStone-nonce': nonce
			}
		});
	}
	
	//Final page submission, wait on save session then submit the lead
	function saveSessioncb(){
		jQuery.ajax({
			url: '/application/setSessionDataAjax',
			data: jQuery('#basicWizard').find(":input:not(:hidden)").serialize(),
			method:'post',
			headers:{
				'x-keyStone-nonce': nonce
			},
			complete: function(xhr, str){
				processLead(getHiddenFields());
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
	
	function send2Leadbyte(){
		var data = {};
		var site = jQuery("#Url").val();
		
		site = site.replace('https://', ""); 
		site = site.replace('http://', "");
		
		jQuery.ajax({
			url: 'https://service.leadstudio.com/send2Leadbyte/'+jQuery('#Email').val()+'/'+jQuery('#FirstName').val()+'/'+jQuery('#LastName').val()+'/'+jQuery('#IPAddress').val()+'/'+site,
		    method: 'GET',
		    crossDomain: true,
		    success: function( response ) {
		    	
		    }
		});
	}
	
	
	function processLead(data){
		Pace.track(function(){
			jQuery.ajax({
				url: '/application/processLead',
				data: data,
				method:'post',
				headers:{
					'x-keyStone-nonce': nonce
				},
				complete: function(xhr, str){
					var status = xhr.responseJSON.status;
					var redirect = xhr.responseJSON.redirect;
					console.log(xhr.responseJSON);
					
					if(status == 'success' && (redirect != '' && redirect != undefined) ){
						window.location.replace(decodeURIComponent(redirect));
					}else{
						window.location.replace('/application/fault');
					}
					
				}
			});
		});
	}
	
	/*
	 * Used for the form next, as you move the form
	 * @param data - populate with name value pair to override pulling data from form
	 */
	function saveTrackLead(){	
		var string;
		string = jQuery('#basicWizard').find(":input:not(:hidden)").filter(function(index, node){
			
			if(in_excluded_array(node.id)){
				return false;
			}
			return true;
			
		}).serialize();
		
		jQuery.ajax({
			url: '/application/setTrackLeadAjax',
			data: string,
			method:'post',
			headers:{
				'x-keyStone-nonce': nonce
			}
		});
	}
	
	
	/**
	 * returns name/value pairs for post to keystone 
	 */
	function getHiddenFields(){
		var str;
		var secondaryphone = 'SecondaryPhone='+getSecondaryPhone();
		var mobilephone = 'MobilePhone='+getSecondaryPhone();
		var residencetime = getResidenceTime();
		var employmenttime = getEmploymentTime();
		var age = getAge();
		var birthday = 'DateOfBirthMonth='+jQuery('#DateOfBirth').val().substr(0,2)+'&DateOfBirthDay='+jQuery('#DateOfBirth').val().substr(3,2)+'&DateOfBirthYear='+jQuery('#DateOfBirth').val().substr(6,4);
		var appType2 = getAppType2();
		var loanamountpl = checkLoanAmountPL();
		
		return secondaryphone+'&'+mobilephone+'&'+residencetime+'&'+employmenttime+'&'+age+'&'+birthday+'&'+appType2+'&'+loanamountpl;
	}
	
	function checkLoanAmountPL(){
		var apptype = jQuery('#AppType').val();
		if(apptype == 'personalloan'){
			return '&LoanAmountPersonal='+jQuery('#LoanAmount').val();			
		}else{
			return '';
		}	
	}
	
	//This tells our code that lead will be installment
	function getAppType2(){
		var apptype = jQuery('#AppType').val();
		
		if(apptype == 'personalloan'){
			if(jQuery('#swap').val() == 'true'){
				return '&AppType2=installment&LoanAmount=500';	
			}else{
				return '';
			}
			
		}else{
			return '';
		}
	}
	
	function getPaydate2(){
		var m1 = moment($('#Paydate1').val(),'MM/DD/YYYY');
		
		if(jQuery('#PayFrequency').val() == "weekly"){
			m1.add(7, 'days');
			
		}else if(jQuery('#PayFrequency').val() == "monthly"){
			m1.add(30, 'days');
			
		}else if(jQuery('#PayFrequency').val() == "bi-weekly"){
			m1.add(14, 'days');
			
		}else if(jQuery('#PayFrequency').val() == "semi-monthly"){
			m1.add(15, 'days');
			
		}
		
		var format = m1.format("MM")+"/"+m1.format("DD")+"/"+m1.format("YYYY");
		//check holiday
		//if(in_array(holiday_array, format)){
			//if(m1.day() == 5){//Friday so set at Thursday
				
			//}
		//}
		
		//Check weekends on paydate2
		if(m1.day() == 0){ //Sunday set to monday
			m1.add(1, 'd');	
		}
		
		if(m1.day() == 6){ //Saturday set to Friday
			m1.subtract(1, 'd');	
		}
		
		var date = m1.format("MM")+"/"+m1.format("DD")+"/"+m1.format("YYYY");
		return date;
	}

	function getAge(){
		var m1 = moment($('#DateOfBirth').val(),'MM/DD/YYYY');
		var m2 = moment(moment(),'MM/DD/YYYY');
		
		var years = parseInt(Math.floor(moment(m2,'MM/DD/YYYY').diff(moment(m1,'MM/DD/YYYY'), 'years', true)));;
		return 'Age='+years;	
	}
	
	function getEmploymentTime(){
		var m1 = moment(jQuery('#EmploymentTime').val(),'MM/YYYY');
		var m2 = moment().format('MM/YYYY');
		
		//Total months between today and move in date
		var mydiff1 = moment(m2,'MM/YYYY').diff(moment(m1,'MM/YYYY'), 'months', true);
		//Total years between today and move in date
		var mydiff2 = Math.floor(moment(m2,'MM/YYYY').diff(moment(m1,'MM/YYYY'), 'years', true));
		
		//Get month / year split between today and move in date
		var splitmonth = (mydiff1-(mydiff2*12));
		var emp_total_months = mydiff1;
		var emp_months = splitmonth;
		if(mydiff2 > 10){mydiff2 = 10;}
		var emp_total_years = mydiff2;
		return 	'EmploymentTotalMonths='+emp_total_months+'&EmploymentTimeMonth='+emp_months+'&EmploymentTimeYear='+emp_total_years;
	}
	
	function getResidenceTime(){
		var m1 = moment(jQuery('#ResidentSinceDate').val(),'MM/YYYY');
		var m2 = moment().format('MM/YYYY');
		
		//Total months between today and move in date
		var mydiff1 = moment(m2,'MM/YYYY').diff(moment(m1,'MM/YYYY'), 'months', true);
		//Total years between today and move in date
		var mydiff2 = Math.floor(moment(m2,'MM/YYYY').diff(moment(m1,'MM/YYYY'), 'years', true));
		
		//Get month / year split between today and move in date
		var splitmonth = (mydiff1-(mydiff2*12));
		var res_total_months = mydiff1;
		var res_months = splitmonth;
		if(mydiff2>10){mydiff2=10;}
		var res_total_years = mydiff2;
		return 	'ResidenceTotalMonths='+res_total_months+'&ResidenceTimeMonth='+res_months+'&ResidenceTimeYear='+res_total_years;
	}
	
	function getSecondaryPhone(){
		var phone = jQuery('#SecondaryPhone').val().replace(/\D/g, '');
		var phone3 = phone.substr(6,4);
    	var phone2 = phone.substr(3,3);
    	var phone1 = phone.substr(0,3);
    	return phone1+phone2+phone3;	
	}
	
	function in_excluded_array(item){
		if(excluded_fields instanceof Array){
	        for(var i=0; i<excluded_fields.length; i++){
	            if(excluded_fields[i]==item){
	                return true;
	            }
	        }
	        return false;
		}else{
			return false;
		}
		
	}

});